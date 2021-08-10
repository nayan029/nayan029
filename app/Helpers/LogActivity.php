<?php


namespace App\Helpers;

use Request;
use App\LogActivity as LogActivityModel;


class LogActivity
{


	public static function addToLog($subject, $object_name, $object_id, $action,$new_data = "", $old_data = "")
	{
		$log = [];
		$log['object_name'] = $object_name;
		$log['object_id'] = $object_id;
		$log['action'] = $action;
		if (!empty($old_data)) {
			$log['old_data'] = $old_data;
		}
		if (!empty($new_data)) {
			$log['new_data'] = $new_data;
		}
		$log['subject'] = $subject;
		$log['url'] = Request::fullUrl();
		$log['method'] = Request::method();
		$log['ip'] = Request::ip();
		$log['agent'] = Request::header('user-agent');
		$log['created_by'] = auth()->check() ? auth()->user()->id : 1;
		LogActivityModel::create($log);
	}


	public static function logActivityLists()
	{
		return LogActivityModel::latest()->get();
	}
}
