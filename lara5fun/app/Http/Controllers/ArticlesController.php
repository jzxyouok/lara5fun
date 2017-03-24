<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
// use Request;
// use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    /**
     * 显示文章列表
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
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

    /**
     * 创建文章
     * @return Response
     */
    public function create()
    {
    	return view('articles.create');
    }

    /**
     * 保存文章数据
     * @return url
     */
    public function store(CreateArticleRequest $request)
    {
    	$input = $request->all();  

    	Article::create($input);
    	return redirect('articles');
    }
}
