<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\CvService;
use App\Models\Contact;
use App\Models\CvFree;


use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.manager');
    }

    public function index()
    {
        $userCount = User::count();
        $CVCount = CvService::count();
        $FreeCVCount = CvFree::count();


        $chart_options = [
            'chart_title' => 'العدد الشهري للمستخدمين الجدد',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);


        $chart_options2 = [
            'chart_title' => 'إحصائيات المبيعات اليومية',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Payment',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'continuous_time' => true, // show continuous timeline including dates without data
        ];
        $chart2 = new LaravelChart($chart_options2);


        return view('manager.home', compact('userCount', 'CVCount', 'FreeCVCount', 'chart1', 'chart2'));
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('manager.users', compact('users'));
    }

    public function contact()
    {
        $contacts = Contact::paginate(20);
        return view('manager.contact', compact('contacts'));
    }
}
