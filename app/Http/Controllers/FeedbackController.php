<?php

namespace App\Http\Controllers;

use App\Models\FeedbackModel;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function check(FeedbackRequest $request)
    {
        $feedback = new FeedbackModel();
        $feedback->email = $request->input('email');
        $feedback->subject = $request->input('subject');
        $feedback->message = $request->input('message');

        $feedback->save();

        return redirect()->route('feedback');
    }
}
