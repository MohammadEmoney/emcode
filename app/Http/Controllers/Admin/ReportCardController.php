<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Month;
use App\Models\ReportCard;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportCardController extends Controller
{
    public $grades = [
        'خیلی خوب', 'خوب', 'قابل قبول', 'نیاز به تلاش',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.schools.reports.index', compact('reports', 'months', 'monthId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id)
    {
        $student = Student::findOrFail($student_id);
        $months = Month::all();
        $courses = Course::all();
        $grades = $this->grades;
        return view('admin.schools.reports.create', compact('student', 'months', 'courses', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'month_id' => 'required|integer|exists:months,id',
            'course' => 'required|array',
            'course.*' => 'required|string',
        ]);
        ReportCard::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'month_id' => $request->month_id,
            ],
            [
            'grades' => json_encode($request->course),
            ]
        );

        return redirect()->route('students.show', $request->student_id)->withErrors(['با موفقیت ساخته شد']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ReportCard $report)
    {
        $process = [
            100 => 'خیلی خوب',
            75 => 'خوب',
            50 => 'قابل قبول',
            25 => 'نیاز به تلاش',
        ];


        return view('admin.schools.reports.show', compact('report', 'process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportCard $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->withErrors(['با موفقیت حذف شد']);
    }
}
