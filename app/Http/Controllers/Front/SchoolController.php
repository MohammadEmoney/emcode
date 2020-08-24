<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['type' => 'sometimes|in:even,odd']);
        $type = $request->has('type') ? $request->type : 'even';
        $schedules = CourseSchedule::where('day_type', $type)->get();
        return view('school.index', compact('schedules'));
    }
}
