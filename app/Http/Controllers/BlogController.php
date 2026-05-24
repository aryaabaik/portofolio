<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index(Request $request)
{
    $query = Post::where('is_published', true);

    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->category) {
        $query->where('category', $request->category);
    }

    $posts = $query->latest('published_at')->paginate(6)->withQueryString();

    $categories = Post::where('is_published', true)
                      ->distinct()
                      ->pluck('category');

    return view('blog.index', compact('posts', 'categories'));
}

    public function show(Post $post)
    {
        abort_if(!$post->is_published, 404);
        return view('blog.show', compact('post'));
    }
}