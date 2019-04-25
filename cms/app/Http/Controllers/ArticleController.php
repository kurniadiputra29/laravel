<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\User;

class ArticleController extends Controller
{
    public function index()
    {
    	$articles = Article::all();

    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
    	$users = User::all();
    	return view('articles.create', compact('users'));
    }

    public function store(Request $request)
    {
    	Article::create($request->all());

    	return redirect('articles');

    }
}
