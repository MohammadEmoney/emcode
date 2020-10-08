<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Month;
use App\Models\ReportCard;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['month' => 'sometimes|string|exists:months,name']);
        $month = Month::where('name', $request->month)->first();
        $monthId = $month ? $month->id : 1;
        $months = Month::all();
        $month = $months->where('name', $request->month)->first();
        $defaultMonth = $months->where('default', true)->first();
        $monthId  = $month ? $month->id : $defaultMonth->id;
        $reports = ReportCard::where('month_id' , $monthId)->with(['student', 'month'])->get()->sortBy(function($query){
            return $query->student->id;
         });
        return view('school.reports.index', compact('reports', 'months', 'monthId'));
    }

    public function report(ReportCard $report)
    {
        $process = [
            100 => 'خیلی خوب',
            75 => 'خوب',
            50 => 'قابل قبول',
            25 => 'نیاز به تلاش',
        ];
        return view('school.reports.show', compact('report', 'process'));
    }
}
