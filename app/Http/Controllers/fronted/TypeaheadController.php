<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\court;
use App\Models\admin\legalservices;
use App\Models\admin\MainLegalQuery;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;


class TypeaheadController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = " ";
    }
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

    public function queryService(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $subcategory = $request->subcategory;

        if (isset($name) && isset($category) && isset($subcategory)) {
            if ($category == '2') {

                if ($subcategory == '3') {
                    $researchone = MainLegalQuery::searchResearchPapaers($name);
                    $researchcount = count($researchone);

                    if ($researchcount > 0) {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  $researchone;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    } else {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  NULL;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    }
                } elseif ($subcategory == '4') {
                    $notesone = MainLegalQuery::searchNotes($name);
                    $notescount = count($notesone);
                    if ($notescount > 0) {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  $notesone;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    } else {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  NULL;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    }
                } elseif ($subcategory == '5') {
                    $bareone = MainLegalQuery::searchBarsActs($name);
                    $barecount = count($bareone);
                    if ($barecount > 0) {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  $bareone;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    } else {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_data'] =  NULL;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    }
                }
            }

            if ($category == '1') {
                // return $request->all();
                if ($subcategory == '2') {
                    $docs = legalservices::getDocumentationByName($name);
                    $docscount = count($docs);

                    if ($docscount > 0) {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_datatwo'] =  $docs;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    } else {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_datatwo'] =  NULL;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    }
                }
                if ($subcategory == '1') {
                    # code...
                    $aid = legalservices::getAidByName($name);
                    $aidscount = count($aid);
                    if ($aidscount > 0) {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_datatwo'] =  $aid;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    } else {
                        $this->data['title'] = "Search Results";
                        $this->data['name'] = $name;
                        $this->data['query_datatwo'] =  NULL;
                        $this->data['category_id'] =  $category;
                        $this->data['sitesetting'] = sitesetting::getrecordbyid();
                        return view('fronted.headerSearch', $this->data);
                    }
                }
                //    if ($aidscount < 0 && $docscount < 0) {
                //         $this->data['title'] = "Search Results";
                //         $this->data['name'] = $name;
                //         $this->data['query_datatwo'] =  '';
                //         return view('fronted.headerSearch', $this->data);
                //     }
            }
        }
        if (isset($name) && isset($category)) {
            // return $request->all();
            if ($category == '1') {

                $docs = legalservices::getDocumentationByName($name);
                $aid = legalservices::getAidByName($name);

                $docscount = count($docs);
                $aidscount = count($aid);


                if ($docscount > 0) {

                    $this->data['title'] = "Search Results";
                    $this->data['name'] = $name;
                    $this->data['query_datatwo'] =  $docs;
                    $this->data['category_id'] =  $category;
                    $this->data['sitesetting'] = sitesetting::getrecordbyid();
                    return view('fronted.headerSearch', $this->data);
                } elseif ($aidscount > 0) {
                    $this->data['title'] = "Search Results";
                    $this->data['name'] = $name;
                    $this->data['query_datatwo'] =  $aid;
                    $this->data['category_id'] =  $category;
                    $this->data['sitesetting'] = sitesetting::getrecordbyid();
                    return view('fronted.headerSearch', $this->data);
                }

                // return "yes";
            }

            if ($category == '2') {
                # code...
                // return "Ss";
                $researchone = MainLegalQuery::searchResearchPapaers($name);
                $notesone = MainLegalQuery::searchNotes($name);
                $bareone = MainLegalQuery::searchBarsActs($name);

                $researchcount = count($researchone);
                $notescount = count($notesone);
                $barecount = count($bareone);

                if ($researchcount > 0) {
                    $this->data['title'] = "Search Results";
                    $this->data['name'] = $name;
                    $this->data['query_data'] =  $researchone;
                    $this->data['category_id'] =  $category;
                    $this->data['sitesetting'] = sitesetting::getrecordbyid();
                    return view('fronted.headerSearch', $this->data);
                } elseif ($notescount > 0) {
                    $this->data['title'] = "Search Results";
                    $this->data['name'] = $name;
                    $this->data['query_data'] =  $notesone;
                    $this->data['category_id'] =  $category;
                    $this->data['sitesetting'] = sitesetting::getrecordbyid();
                    return view('fronted.headerSearch', $this->data);
                } elseif ($barecount > 0) {
                    $this->data['title'] = "Search Results";
                    $this->data['name'] = $name;
                    $this->data['query_data'] =  $bareone;
                    $this->data['category_id'] =  $category;
                    $this->data['sitesetting'] = sitesetting::getrecordbyid();
                    return view('fronted.headerSearch', $this->data);
                }
            }
        }

        if (isset($name) && $category == '1') {
            // return "yes";
            $datanewt = legalservices::searchAllData($name);
            $this->data['title'] = "Search Results";
            $this->data['name'] = $name;
            $this->data['query_datatwo'] =  $datanewt;
            $this->data['sitesetting'] = sitesetting::getrecordbyid();
            return view('fronted.headerSearch', $this->data);
        }

        if (isset($name) && $category == '2') {
            // return "yes";
            $datanewo = MainLegalQuery::serachAllData($name);
            $this->data['title'] = "Search Results";
            $this->data['name'] = $name;
            $this->data['query_datatwo'] =  $datanewo;
            $this->data['sitesetting'] = sitesetting::getrecordbyid();
            return view('fronted.headerSearch', $this->data);
        }

        if (isset($name)) {
            // $datanew = array_merge($datanewo, $datanewt);
            // $this->data['query_data'] = json_decode(json_encode($datanew), true);
            // $this->data['category_id'] =  $category;

            $datanewo = MainLegalQuery::serachAllData($name);
            $datanewt = legalservices::searchAllData($name);
            $this->data['title'] = "Search Results";
            $this->data['name'] = $name;
            $this->data['query_data'] =  $datanewo;
            $this->data['query_datatwo'] =  $datanewt;
            $this->data['sitesetting'] = sitesetting::getrecordbyid();
            return view('fronted.headerSearch', $this->data);
        }

        if (isset($category) && isset($subcategory)) {

            if ($category = '1') {
                if ($subcategory == '1') {
                    return redirect('all-aids');
                } elseif ($subcategory == '2') {
                    return redirect('all-docs');
                }
            }

            if ($category = '2') {
                if ($subcategory == '3') {
                    return redirect('all-querys-paper');
                } elseif ($subcategory == '4') {
                    return redirect('all-querys-notes');
                } elseif ($subcategory == '5') {
                    return redirect('all-querys-acts');
                }
            }
        } else {
            return redirect()->back();
        }

        if (!isset($name) && !isset($category) && !isset($subcategory)) {
            return redirect()->back();
        }
    }
}
