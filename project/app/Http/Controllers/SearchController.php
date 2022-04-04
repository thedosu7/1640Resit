<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    public function search(Request $request)
    {
      // Get the search value from the request
        $search = $request->input('search');

    // Search in the title and body columns from the posts table
        $ideas = Idea::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search_idea', compact('ideas'));
        
    }
}
