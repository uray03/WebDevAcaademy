<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->latest()->take(6)->get();
        return view('home', compact('courses'));
    }    
    
}
