<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    // DELETE POST
    public function deletePost(Post $post)
    {
        if(auth()->user()->id === $post['user_id'])
        {
            $post->delete();
        }  
        return redirect('/');
    }

    // UPDATE POST
   public function acutallyUpdatePost(Post $post, Request $request)
   {

    // check if the auther who wants to update
     if(auth()->user()->id !== $post['user_id'])
     {
        return redirect('/');
     }

     $incomingFields = $request->validate([
        'title' => 'required',
        'body' => 'required'
    ]);

    $incomingFields['title'] = strip_tags($incomingFields['title']);
    $incomingFields['body'] = strip_tags($incomingFields['body']);  
    
    $post -> update($incomingFields);
    return redirect('/');

    }


// retrive the post to be updated
    public function showEditScreen(Post $post)
    {
        if(auth()->user()->id !== $post['user_id'])
        {
            return redirect('/');
        }
        return view('edit-post', ['post'=>$post]);
    }

    
// New Post
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate(
            ['title'=> 'required',
            'body'=> 'required'
            ]
        
        );

        $incomingFields['title']=strip_tags($incomingFields['title']);
        $incomingFields['body']=strip_tags($incomingFields['body']);
        $incomingFields['user_id']= auth()->id();
        Post::create($incomingFields);
        return redirect('/');

    }
}
