<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request) {

        \Log::debug('comment ' . $request);
        $comment = new Comment();

        $comment->user_id = $request->input('user_id');
        $comment->gallery_id = $request->input('gallery_id');
        $comment->content = $request->input('content');

        $comment->save();

        return $comment;
    }

    public function destroy($id) {

        $comment = Comment::find($id);
        $comment->delete();

        return new JsonResponse(true);
    }
}
