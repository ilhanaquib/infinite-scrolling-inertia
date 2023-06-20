<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $comments = Comment::with('user')->paginate(5);

        return Inertia::render('Comments', [
            'comments' => $comments
        ]);
    }
}
