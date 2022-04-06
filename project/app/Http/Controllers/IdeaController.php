<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaStoreRequest;
use App\Http\Requests\IdeaUpdateRequest;
use App\Jobs\SendEmailCreateIdea;
use App\Models\Attachment;
use App\Models\Idea;
use App\Models\Mission;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\ViewIdeaEvent;

class IdeaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $missions = Mission::where('end_at', '>=', now())->get();
        $all_missions = Mission::get();
        //Search by key
        $user_input = $request->input('search');
        $found_ideas_count = 0;
        $found_ideas = DB::table('ideas')
            ->where('title', 'LIKE', "%{$user_input}%")
            ->orWhere('content', 'LIKE', "%{$user_input}%")->get();
        $found_ideas_count = count($found_ideas);
        //Search by mission
        $selected_mission_id = $request->mission_id;
        if ($selected_mission_id != 0) {
            $found_ideas = $found_ideas->where('mission_id', $selected_mission_id);
        }
        //Search by condition:
        $selected_filter = $request->filter;
        switch ($selected_filter) {
                //Search ideas with order by number of likes
            case "likes":
                $ideas = Idea::query()
                    ->joinReactionCounterOfType('Like')
                    ->orderBy('reaction_like_count', 'desc')
                    ->paginate(5);
                break;
                //Search ideas with order by number of dislikes
            case "dislikes":
                $ideas = Idea::query()
                    ->joinReactionCounterOfType('Dislike')
                    ->orderBy('reaction_dislike_count', 'desc')
                    ->paginate(5);
                break;
                //Search ideas with order by number of views
            case "views":

                break;
                //Search ideas with order by comments
            case "comments":
                
                break;
                //Search ideas with order by posted time
            case "recently":
                $ideas = Idea::withCount('comments')->orderBy('created_at', 'desc')->paginate(5);
                break;
            default:
                $ideas = Idea::withCount('comments')->paginate(5);
                break;
        }
        //
        return view(
            'ideas.index',
            compact(['missions', 'ideas', 'found_ideas_count', 'found_ideas', 'all_missions'])
        );
    }

    //Search by key function
    protected function searchByKey(Request $request)
    {
    }

    public function store(IdeaStoreRequest $request)
    {
        $mission = Mission::find($request->mission_id);
        if (!$mission) {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Mission not found']);
        }
        if (now() > $mission->end_at) {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Mission close']);
        }
        $input = $request->except('_token');
        $input['user_id'] = auth()->user()->id;
        $idea = Idea::create($input);
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $custom_file_name = time() . '-' . $file->getClientOriginalName();
                $filename = $file->storeAs('public/idea/' . $idea->id, $custom_file_name);
                Attachment::create([
                    'name' => $file->getClientOriginalName(),
                    'direction' => 'storage/idea/' . $idea->id . '/' . $custom_file_name,
                    'idea_id' => $idea->id,
                ]);
            }
        }
        $Coordinator_role = Role::where('name', '=', Role::ROLE_QA_Coordinator)->first()->id;
        $users = User::where('role_id', $Coordinator_role)->get();
        SendEmailCreateIdea::dispatch($idea, $users)->delay(now());
        return redirect()->back()->with(['class' => 'success', 'message' => 'Create Idea success']);
    }

    public function details(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);
        $current_mission_id = Mission::findOrFail($idea->mission_id)->id;
        $current_semester_end_day = Semester::findOrFail($current_mission_id)->end_day;
        $comments = Comment::where('idea_id', '=', $idea->id)->orderBy('created_at', 'desc')->paginate(5);
        //Fire event
        event(new ViewIdeaEvent($idea));
        return view('ideas.details', compact('idea', 'comments', 'current_semester_end_day'));
    }

    public function edit($id)
    {
        $idea = Idea::findOrFail($id);
        return view('ideas.edit', compact('idea'));
    }


    public function update(IdeaUpdateRequest $request, $id)
    {
        $idea = Idea::findOrFail($id);

        if ($idea->user->id != auth()->user()->id) abort(404);

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $custom_file_name = time() . '-' . $file->getClientOriginalName();
                $filename = $file->storeAs('public/idea/' . $idea->id, $custom_file_name);
                Attachment::create([
                    'name' => $file->getClientOriginalName(),
                    'direction' => 'storage/idea/' . $idea->id . '/' . $custom_file_name,
                    'idea_id' => $idea->id,
                ]);
            }
        }
        $idea->update([
            'content' => $request->content
        ]);
        return redirect()->back()->with(['class' => 'success', 'message' => 'Update success']);
    }

    public function delete($id)
    {
        $idea = Idea::findOrFail($id);
        //$idea->user_id->delete();
        //$idea->mission_id->delete();
        $comments = Comment::where('idea_id', $id);
        $comments->delete();
        $attached_files = Attachment::where('idea_id', $id);
        $attached_files->delete();
        $idea->delete();
        return redirect()->route('ideas.index')->with(['class' => 'success', 'message' => 'Your idea is deleted']);
    }

    public function deleteAttachment($id)
    {
        $attached_files = Attachment::find($id);
        $attached_files->delete();
        return redirect()->back()->with(['class' => 'success', 'message' => 'Your idea is deleted']);
    }
}