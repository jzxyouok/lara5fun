<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller {


	/**
	 * 关于我
	 * @return Response
	 */
	public function about()
	{	

		$firstname = "三";
		$lastname = "张";
		$age  = "30";

		return view('pages.about',compact('firstname','lastname','age'));

	}

	 /**
     * 联系我
     * @return Response
     */
    public function contact()
    {
        return view('pages.contact');
    }

}
