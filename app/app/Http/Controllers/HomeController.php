<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $postService;

    public function __construct(PostInterface $postService)
    {
        $this->middleware('auth');
        $this->postService = $postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postService->getUserList();
        $posts = $this->postService->timeAgo($posts, true); 
        return view('home', ['posts' => $posts]);
    }
}
