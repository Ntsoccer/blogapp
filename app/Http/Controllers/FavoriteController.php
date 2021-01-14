<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;


class FavoriteController extends Controller
{

    public function store(Post $blog,Request $request)
    {
        $blog=Post::find($request->post_id);
        $blog->users()->attach(Auth::id());

        return redirect('blog/index');
    }

    public function destroy(Post $blog,Request $request)
    {
        $blog=Post::find($request->post_id);
        $blog->users()->detach(Auth::id());

        return redirect('blog/index');
    }
}