<?php

namespace App\Http\Controllers;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $searchterm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(\App\Product::class, ['name', 'description']) //apply search on field name and description
            //Config partial match or exactly match
            ->registerModel(\App\Category::class, function (ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addExactSearchableAttribute('name') // only return results that exactly match
                    ->addSearchableAttribute('description'); // return results for partial matches
            })
            ->perform($searchterm);

        return view('search', compact('searchResults', 'searchterm'));
    }
}
