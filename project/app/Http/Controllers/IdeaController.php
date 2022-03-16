<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaStoreRequest;
use App\Models\Idea;
use Illuminate\Pagination\Paginator;
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
    public function index()
    {
        $ideas = Idea::paginate(3);
        return view('ideas.index', compact('ideas'));
    }

    public function store(IdeaStoreRequest $request){
        /*
        if($idea = Idea::create($data)){
            return redirect()->route('ideas.index')->with(['class' => 'success', 'message' => 'A new idea is created']);
        }
        else{
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error when creating idea']);
        }
        return view('ideas.index');
        */
    }

    public function storeIdea(IdeaStoreRequest $request){

        $input = $request->all();
        Idea::create($input);
        echo"Successfully Create Category";
        return redirect('ideas.index');
    }

    public function changeIdea($id){
        //find id to update
        $idea = Idea::findOrFail($id);
        return view('', compact('idea'));
    }

    public function updateIdea(IdeaStoreRequest $request, $id){
        $dataCategory = Idea::findOrFail($id);
        $data = $request -> all();
        $dataCategory->update($data);
        return redirect('');
    }

    public function deleteIdea($id)
    {
        $data = Idea::findOrFail($id);
        $data -> delete();
        return redirect('')->with('flash_message', 'Category deleted!');  
    }
}
