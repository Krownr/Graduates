<?php

namespace App\Http\Controllers;

use App\Thesis;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_thesis(Request $request) {
        $search = $request->search;

        $theses = Thesis::where('topic', 'LIKE', "%{$search}%")->paginate(15);

        return view('theses.index', compact('theses', 'id'));
    }
}
