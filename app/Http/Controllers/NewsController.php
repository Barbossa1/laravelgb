<?php

namespace App\Http\Controllers;

use App\Models\NewsAddModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = new NewsAddModel();
        return view('news.news', ['news' => $news->all()]);
    }

    public function show($id)
    {
        $news = NewsAddModel::where('id', $id)->first();
        return view('news.show', ['news' => $news]);
    }
}
