<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    /**
     * 显示文章列表
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * 显示某篇文章
     * @param  [int] $id [文章 ID]
     * @return Response
     */
    public function show($id)
    {
    	$article = Article::findOrFail($id);
    	return view('articles.show',compact('article'));
    }
}
