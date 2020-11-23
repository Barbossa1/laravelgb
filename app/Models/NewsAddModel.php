<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsAddModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "news_add_models";
    protected $fillable = [
        'id', 'news_name', 'news_author', 'news_text'
    ];
}
