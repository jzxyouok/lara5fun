<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $dates = ['published_at'];

	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id',
	];

	/**
	 * 发布时间修改器
	 * @param 日期的原始数据
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
	}

	/**
	 * 文章发布时间筛选
	 * @param  Model $query 文章实例
	 */
	public function scopePublished($query)
	{
		$query->where('published_at','<=',Carbon::now());
	}

	/**
	 * 多篇文章同属于一个作者
	 * @return Model
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
