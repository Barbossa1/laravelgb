<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsAddRequest;
use App\Models\NewsAddModel;
use Illuminate\Http\Request;

class NewsAddController extends Controller
{
    public function index()
    {
        return view('news.news_add');
    }

    public function addNews(NewsAddRequest $request)
    {
//        if ($request->hasFile('img')) {
//            $file = $request->file('img');
//            $fileName = $file->getClientOriginalName();
//
//            $data['img'] = $file->storeAs('news', $fileName, 'uploads');
//        }

        $news = new NewsAddModel();
        $news->news_name = $request->input('news_name');
        $news->news_author = $request->input('news_author');
        $news->news_text = $request->input('news_text');
        $news->news_img = $request->input('news_img');

        $news->save();

        return redirect()->route('news_add');
    }
}
