<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
    	$article = new Article($input);
    	Auth::user()->articles()->save($article);
    	return redirect('articles');
    }

    /**
     * 跳转到文章编辑界面
     * @param  [int] $id [文章 ID]
     * @return Response
     */
    public function edit($id)
    {
    	$article = Article::findOrFail($id);
    	return view("articles.edit",compact('article'));
    }

    /**
     * 文章更新数据写入
     * @param  [int]               $id      [用户 ID]
     * @param  CreateArticleRequest $request [验证]
     * @return url
     */
    public function update($id,CreateArticleRequest $request)
    {	
    	$article = Article::findOrFail($id);
    	$article->update($request->all());

    	return redirect('articles');
    }
}
