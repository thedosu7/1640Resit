<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaStoreRequest;
use App\Models\Idea;
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
        return view('ideas.index');
    }

    public function store(IdeaStoreRequest $request){
        $data = $request->except(["_token"]);
        if($idea = Idea::create($data)){
            return redirect()->route('ideas.index')->with(['class' => 'success', 'message' => 'A new idea is created']);
        }
        else{
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error when creating idea']);
        }
        return view('ideas.index');
    }
}
