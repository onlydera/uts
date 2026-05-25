<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Event; 

class WelcomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $categories = Category::all();
        $events = Event::all(); 
        
        
        return view('welcome', compact('partners', 'categories', 'events'));
    }
}