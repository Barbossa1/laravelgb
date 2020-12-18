<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScraperNewsModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "scraper_news";
    protected $fillable = [
        'id', 'news_title', 'news_date', 'news_link', 'news_image'
    ];
}
