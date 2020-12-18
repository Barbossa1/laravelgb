<?php

namespace App\Http\Controllers;

use App\Models\ScraperNewsModel;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class ScraperNewsController extends Controller
{
    private $titles = [];
    private $dates = [];
    private $links = [];
    private $image = [];

    public function get_news()
    {
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://www.rbc.ru/short_news');

        $crawler->filter('.js-news-feed-item')->each(function($node) {
            $node->filter('.item__title')->each(function ($title) {
                array_push($this->titles, $title->text());
            });
        });
        $crawler->filter('.js-news-feed-item')->each(function ($node) {
            $node->filter('.item__bottom')->each(function ($date) {
                array_push($this->dates, $date->text());
            });
        });
        $crawler->filter('.item__link')->each(function ($node) {
            $node->filter('a')->each(function ($link) {
                array_push($this->links, $link->attr("href"));
            });
        });
        $crawler->filter('.item__image')->each(function ($node) {
            $node->filter('img')->each(function ($link) {
                array_push($this->image, $link->attr("src"));
            });
        });

        $news = new ScraperNewsModel();
        return view('news.scraper_news', ['news' => $news->all()]);
//        print_r($news);
    }

    public function returnNews()
    {
        $allNews = [];

        $allNews['news_title'] = $this->titles;
        $allNews['news_date'] = $this->dates;
        $allNews['news_link'] = $this->links;
        $allNews['news_image'] = $this->image;

        return $allNews;
    }

    public function addScrNews()
    {
        $news = new ScraperNewsModel();
        $returnNews = $this->returnNews();

        if ($returnNews['news_title'] != $returnNews['news_title']) {
            foreach ($returnNews['news_title'] as $news_title) {
                $news->news_title = $news_title;
            }
        }

        foreach ($returnNews['news_date'] as $news_date) {
            $news->news_date = $news_date;
        }

        foreach ($returnNews['news_link'] as $news_link) {
            $news->news_link = $news_link;
        }

        foreach ($returnNews['news_image'] as $news_link) {
            $news->news_image = $news_link;
        }

        $news->save();

    }

    public function index()
    {
        //
    }

    public function show($id)
    {
        return view('news.scraper_show');
    }
}
