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
        $this->data['user_data'] = MainLegalQuery::searchResearchPapaers($query);
        return view('fronted.responsedataquery', $this->data);
    }

    public function autocompleteSearchSecond(Request $request)
    {
        $query = $request->get('query');
        $this->data['user_data'] = MainLegalQuery::searchNotes($query);
        return view('fronted.responsedataquery', $this->data);
    }

    public function autocompleteSearchThirds(Request $request)
    {
        $query = $request->get('query');
        $this->data['user_data'] = MainLegalQuery::searchBarsActs($query);
        return view('fronted.responsedataquery', $this->data);
    }

    public function searchDocs(Request $request)
    {
        $query = $request->get('query');
        $this->data['user_data'] = legalservices::getDocumentationByName($query);
        return view('fronted.datadocs', $this->data);
    }
    public function searchAid(Request $request)
    {
        $query = $request->get('query');
        $this->data['user_data'] = legalservices::getAidByName($query);
        return view('fronted.dataaids', $this->data);
    }
}
