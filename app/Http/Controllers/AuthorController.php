<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function search (Request $request) {
        
        $validated = $request->validate([
            'search' => 'string'
        ]);
        $authors = Author::all('name');

        $filtered = $authors->filter(fn ($value, $key) => Str::startsWith($value->name, $validated['search']));

        // dd($filtered);
        // back()->with($filtered);
        return response()->json($filtered->toJson());

    }
}
