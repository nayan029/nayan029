<?php

namespace App\Providers;

use App\Models\admin\legalenquiry;
use App\Models\admin\legalissue;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        // Using view composer to set following variables globally
        view()->composer('*', function ($view) {

            // $listLegalGuides = DB::table('legal_services')->where('deleted_at', NULL)->where('category_id', '1')->limit(6)->get();
            // $view->with('listLegalGuides', $listLegalGuides);

            // $listLegalGuidesfirst = legalissue::select('legal_services.*', 'legal_advice_qa_category.category_name as service_name')
            //     ->leftjoin('legal_advice_qa_category', function ($join) {
            //         $join->on('legal_services.service_name', '=', 'legal_advice_qa_category.category_name');
            //     })
            //     ->where('category_id', '1')
            //     ->orderBy("legal_issue.id", 'desc')
            //     ->limit('6');
            // $view->with('listLegalGuidesfirst', $listLegalGuidesfirst);
            $lawyersql = User::getNewLawyerData();
            $customersql = User::getNewCustomerrData();
            $legalenquirysql = legalenquiry::getnotificationNewEnquiry();
            return  $view->with('lawyerNotification', $lawyersql)->with('customerNotification', $customersql)->with('enquiryNotification', $legalenquirysql);
        });
        // 
    }
}
