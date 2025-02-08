<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class articleControlleur extends Controller
{
    public function index()
    {
        $articles = Article::getArticles();
        return view('articles.index2', compact('articles'));
    }
}//Ce contrôleur utilise la méthode getArticles du modèle Article pour récupérer les articles de la cache.


