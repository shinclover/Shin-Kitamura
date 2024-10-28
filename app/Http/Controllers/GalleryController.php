<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class GalleryController extends Controller
{
    public function gallery(Post $post)
    {
        $image_urls = Post::getPostWithImage();
        return view('dashboard')->with(['image_urls'=>$image_urls]);
    }
}

