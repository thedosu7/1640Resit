<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IdeaStoreRequest;
use App\Http\Requests\IdeaUpdateRequest;
use App\Models\Attachment;
use App\Models\Idea;
use App\Models\Mission;
use App\Models\Comment;
use App\Models\Semester;
use Illuminate\Http\Request;

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
        $ideas = Idea::withCount('comments')->paginate(5);
        return view(
            'ideas.index',
            compact(['missions', 'ideas'])
        );
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
        return redirect()->back()->with(['class' => 'success', 'message' => 'Create Idea success']);
    }

    public function details(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);
        $current_mission_id = Mission::findOrFail($idea->mission_id)->id;
        $current_semester_end_day = Semester::findOrFail($current_mission_id)->end_day;
        $comments = Comment::where('idea_id', '=', $idea->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('ideas.details', compact('idea', 'comments', 'current_semester_end_day'));
    }

    public function edit($id)
    {
        $idea = Idea::findOrFail($id);
        return view('ideas.edit',compact('idea'));
    }

    
    public function update(IdeaUpdateRequest $request,$id)
    {
        $idea = Idea::findOrFail($id);
        
        if($idea->user->id != auth()->user()->id) abort(404);

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
        $attached_files = Attachment::where('idea_id', $id)->delete();
        $idea->delete();
        return redirect()->back()->with(['class' => 'success', 'message' => 'Your idea is deleted']);
    }
}
