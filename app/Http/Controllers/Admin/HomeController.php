<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post_count = Post::all()->count();
        $category_count = Category::all()->count();
        $user_count = User::all()->count();
        $contact_count = Contact::all()->count();

        return view('admin.home.index', [
            'post_count' => $post_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'contact_count' => $contact_count,
        ]);
    }
}
