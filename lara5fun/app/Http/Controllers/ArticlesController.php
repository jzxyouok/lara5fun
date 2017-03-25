<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Request;
// use Illuminate\Http\Request;

class ArticlesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except'=>['index','show']]);
	}

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
     * @param  [Object]   $article   [根据 ID 生成的文章实例]
     * @return Response
     */
    public function show(Article $article)
    {	
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

    	return redirect('articles')->with([
    		'flash_message' => "文章创建成功",
    		'flash_message_important' => true
    		]);
    }

    /**
     * 跳转到文章编辑界面
     * @param  [Object]   $article   [根据 ID 生成的文章实例]
     * @return Response
     */
    public function edit(Article $article)
    {
    	return view("articles.edit",compact('article'));
    }

    /**
     * 文章更新数据写入
     * @param  [Object]   $article   [根据 ID 生成的文章实例]
     * @param  CreateArticleRequest $request [验证]
     * @return url
     */
    public function update(Article $article,CreateArticleRequest $request)
    {	

    	$article->update($request->all());
    	return redirect('articles');
    }
}
