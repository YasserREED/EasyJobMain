<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.manager');
    }
    public function index()
    {
        $payments = Payment::with(['user' => function ($q) {
            $q->select('id', 'name');
        }], 'discount')->get();
        $total = Payment::sum('tran_total');
        $total_month = Payment::whereMonth('created_at', Carbon::now()->month)->sum('tran_total');
        $total_weak = Payment::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('tran_total');

        return view('manager.payments', compact('payments', 'total', 'total_month', 'total_weak'));
    }
}
