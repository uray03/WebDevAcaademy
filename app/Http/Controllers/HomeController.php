<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class HomeController extends Controller
{   
    public function index()
    {
        $categories = Category::with(['courses.images'])->get();
    
        $latestCourses = \App\Models\Course::with('images')->latest()->take(6)->get();
    
        return view('home', compact('categories', 'latestCourses'));
    }
    
}
