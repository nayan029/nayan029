<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SlugHelper
{
    /*
     * @params url du document ajout�
     */
    public static function slug($string, $table, $type, $field = 'slug', $key = NULL, $value = NULL)
    {
        //$t = & get_instance();
        $slug = $string;
        $slug = strtolower($slug);
        $slug = preg_replace("/[^a-zA-Z-0-9]/", "", $slug);

        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key)
            $params["$key !="] = $value;

        while (DB::table($table)->where('type', $type)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
    public static function serviceslug($string, $table, $type, $field = 'slug', $key = NULL, $value = NULL)
    {
        //$t = & get_instance();
        // return $string;
        // die;
        $slug = $string;
        $slug = strtolower($slug);
        $slug = preg_replace("/[^a-zA-Z-0-9]/", "", $slug);

        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key)
            $params["$key !="] = $value;

        while (DB::table($table)->where('service_name', $type)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
    public static function otheResource($string, $table, $field = 'slug', $key = NULL, $value = NULL)
    {
        //$t = & get_instance();
        // return $string;
        // die;
        $slug = $string;
        $slug = strtolower($slug);
        $slug = preg_replace("/[^a-zA-Z-0-9]/", "", $slug);

        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key)
            $params["$key !="] = $value;

        while (DB::table($table)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
}
