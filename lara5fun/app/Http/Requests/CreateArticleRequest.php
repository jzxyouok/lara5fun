<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * 创建文章的验证规则
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:5',
			'body'  => 'required',
			'published_at' => 'required|date'
		];
	}

}
