<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaStoreRequest;
use App\Models\Idea;
use App\Models\Mission;
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
        $missions = Mission::all();
        $ideas = Idea::withCount('comments')->paginate(5);
        return view(
            'ideas.index',compact(['missions','ideas'])
        );
    }

    public function storeIdea(Request $request)
    {
        $input = $request->except('_token');
        $input['user_id'] = auth()->user()->id;
        Idea::create($input);
        return redirect()->back()->with(['class' => 'success', 'message' => 'Create Idea success']);
    }

    public function changeIdea($id)
    {
        //find id to update
        $idea = Idea::findOrFail($id);
        return view('', compact('idea'));
    }

    public function updateIdea(IdeaStoreRequest $request, $id)
    {
        $dataCategory = Idea::findOrFail($id);
        $data = $request->all();
        $dataCategory->update($data);
        return redirect('');
    }

    public function deleteIdea($id)
    {
        $data = Idea::findOrFail($id);
        $data->delete();
        return redirect('')->with('flash_message', 'Category deleted!');
    }
}
