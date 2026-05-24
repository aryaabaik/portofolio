<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Post;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_projects' => Project::count(),
            'total_posts'    => Post::count(),
            'total_contacts' => Contact::count(),
            'unread'         => Contact::where('is_read', false)->count(),
        ];
        return view('admin.dashboard', $data);
    }
}