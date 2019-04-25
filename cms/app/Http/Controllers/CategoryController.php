<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('created_at', 'desc')->get();
    	return view('categories.index', compact('categories'));
    }
}
