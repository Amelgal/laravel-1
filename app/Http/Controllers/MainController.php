<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;

class MainController extends Controller
{

    public function checkComments(CommentStoreRequest $request, $id)
    {
        $this->validateForm($request, $id);
        return redirect()->back()->withSuccess('Success. New comment added.');
    }

    public function validateForm(CommentStoreRequest $request, $id)
    {
        $review = new Comment();

        $review->name = $request->input('name');
        $review->text = $request->input('comment');
        $review->post_id = (int) $id;

        $review->save();
    }
}
