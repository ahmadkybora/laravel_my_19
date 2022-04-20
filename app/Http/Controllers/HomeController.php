<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function articles()
    {
        $articles = Article::all();
        return response()->json([
            'state' => true,
            'message' => 'Success',
            'data' => $articles,
        ]);
    }
}
