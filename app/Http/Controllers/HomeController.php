<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_featured', true)
                           ->orderBy('order')
                           ->take(6)
                           ->get();

        $posts = Post::where('is_published', true)
                     ->latest('published_at')
                     ->take(3)
                     ->get();

        return view('home.index', compact('projects', 'posts'));
    }
}