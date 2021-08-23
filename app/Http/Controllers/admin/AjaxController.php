<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\Category;
use App\Models\admin\legalissue;
use App\Models\admin\location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	function __construct()
	{
	}
	public function getexitcategory(Request $request)
	{
		/*Record insert*/
		$auth = Auth::user();
		$data = Category::where('name', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitcategoryedit(Request $request)
	{
		/*Record insert update*/
		$auth = Auth::user();
		//	echo $request->id;
		//die();
		$data = Category::where('id', '!=', $request->id)->where('name', '=', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitadvicecategory(Request $request)
	{
		/*Record insert*/
		$auth = Auth::user();
		$data = adviceCategory::where('category_name', $request->name)->where('type', $request->type)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitadvicecategoryedit(Request $request)
	{
		/*Record insert update*/
		$auth = Auth::user();
		//	echo $request->id;
		//die();
		$data = adviceCategory::where('id', '!=', $request->id)->where('category_name', '=', $request->name)->where('type', '=', $request->type)->first();
		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitemail(Request $request)
	{
		return $exitdata = User::checkexitemail($request->email, $request->type);
		if ($exitdata) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitlocation(Request $request)
	{
		/*Record insert*/
		$auth = Auth::user();
		$data = location::where('name', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexitlocationedit(Request $request)
	{
		/*Record insert update*/
		$auth = Auth::user();
		//	echo $request->id;
		//die();
		$data = location::where('id', '!=', $request->id)->where('name', '=', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function getexistisuue(Request $request)
	{
		/*Record insert*/
		$auth = Auth::user();
		$data = legalissue::where('issue_name', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getexistisuueedit(Request $request)
	{
		/*Record insert update*/
		$auth = Auth::user();
		//	echo $request->id;
		//die();
		$data = legalissue::where('id', '!=', $request->id)->where('issue_name', '=', $request->name)->first();

		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function getsubissue(Request $request)
	{
		// return $request->all();
		$issue_id = $request->issue_id;
		$query = legalissue::where('category_id',$issue_id)->where('status','1')->orderBy('id', 'DESC')->get();

	   $html = "";	
       foreach($query as $querydata)
	   {
			$html .= '   <div class="col-md-3 "><div class="mitem3 sr-radio-card "> <input type="radio" name="issue-regarding" id="subissueid" class="sr-radio-card-inputs" value="'.$querydata->issue_name.'"><i class="fa fa-check-square-o sr-radio-icon"></i> <p class="sr-title2 mb-3">'.$querydata->issue_name.' </p></div>	  </div>';
	   }

		echo $html;
	}
}
