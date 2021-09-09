<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function checkComments(Request $request, $id)
    {
        $this->validateForm($request, $id);
        return redirect()->back()->withSuccess('Success. New comment added.');
    }

    public function validateForm($request, $id)
    {
        $valid = $request->validate(
            [
                'name' => ['required', 'min:4'],
                'comment' => ['required', 'min:10', 'max:50'],
            ]
        );

        $review = new Comment();

        $review->name = $request->input('name');
        $review->text = $request->input('comment');
        $review->post_id = (int) $id;

        $review->save();
    }
}
