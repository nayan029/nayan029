<?php
namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\legalservices;
use App\Models\admin\MainLegalQuery;
use Illuminate\Http\Request;


class TypeaheadController extends Controller
{ 
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $this->data['user_data'] = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '1')->where('status', '1')->get();
        //   return response()->json($filterResult);
        // $filterResult = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '1')->where('status', '1')->get();
            
        return view('fronted.responsedataquery', $this->data);
        //   return $filterResult;
    } 

    public function autocompleteSearchSecond(Request $request)
    {
          $query = $request->get('query');
          $this->data['user_data'] = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '2')->where('status', '1')->get();
        //   return response()->json($filterResult);
        // $filterResult = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '1')->where('status', '1')->get();
            
        return view('fronted.responsedataquery', $this->data);
        //   return $filterResult;
    } 

    public function autocompleteSearchThirds(Request $request)
    {
          $query = $request->get('query');
          $this->data['user_data'] = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '3')->where('status', '1')->get();
        //   return response()->json($filterResult);
        // $filterResult = MainLegalQuery::where('title', 'LIKE', '%'. $query. '%')->where('legal_query_type_id', '1')->where('status', '1')->get();
            
        return view('fronted.responsedataquery', $this->data);
        //   return $filterResult;
    } 
}