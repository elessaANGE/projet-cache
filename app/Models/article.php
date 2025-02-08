<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    public function getArticles()
    {
        return Cache::remember('articles', 60, function () {
            return Article::all();
        });
    }
}//utilise la méthode getArticles pour récupérer les articles de la base de données et les stocker dans la cache pendant 60 minutes.

