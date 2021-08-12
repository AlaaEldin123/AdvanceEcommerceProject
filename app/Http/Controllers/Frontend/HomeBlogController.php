<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Blog\BlogPostCategory;
class HomeBlogController extends Controller
{
    public function AddBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost= BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));
    }// end method


    public function DetailsBlogPost($id){
    $blogcategory = BlogPostCategory::latest()->get();

    $blogpost = BlogPost::findOrFail($id);
    return view('frontend.blog.blog_deatils',compact('blogpost','blogcategory'));


    }


}
