<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Services\PostInterface;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostInterface $postService) 
    {
        $this->postService = $postService;
    }

    public function index()
    {
    	$posts = $this->postService->getList();

    	$posts = $this->postService->timeAgo($posts, true); 

    	return view('index', compact('posts'));
    }

    public function add(PostRequest $request)
    {
        $data = $request->validated();
    	$link = $this->postService->addPost($data);
    	return view('link', ['link'=> $link]);
    }

    public function show($id)
    {
    	$post = $this->postService->getById($id);

    	$posts = $this->postService->getList();

    	$posts = $this->postService->timeAgo($posts, true);

    	$post = $this->postService->timeAgo($post, false);

        if(!empty($post))
        {
    	   $post = $post[0];
        }
		
	    return view('show', ['posts'=> $posts, 'post'=> $post]);
    }

    public function link($link)
    {
        return view('link', compact('link'));
    }
}
