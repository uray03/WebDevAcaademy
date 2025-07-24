<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $courses = $category->courses()->latest()->paginate(9);

        return view('categories.show', compact('category', 'courses'));
    }
}
