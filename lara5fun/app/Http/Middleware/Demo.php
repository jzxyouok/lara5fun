<?php namespace App\Http\Middleware;

use Closure;

class Demo {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{	
		if ($request->has('foo')) {  // 判断参数 foo 是否有数据
			return redirect('articles');
		}
		
		return $next($request);
	}

}
