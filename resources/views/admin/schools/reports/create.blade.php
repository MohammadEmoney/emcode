@extends('layouts.admin')

@section('title', 'Dashboard - Articles')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-success">
                <ul>
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $student->name }}</h4>
            <p class="card-description">
              Create Reports for the User
            </p>
            <div class="table-responsive pt-3">
                <div class="schedule">

                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <input type="hidden" class="form-control @error('password') is-invalid @enderror" id="name" name="student_id"  value="{{ $student->id }}" autofocus>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="course_grade">ماه</label>
                                    <select class="form-control" name="month_id" id="course_grade">
                                        @foreach($months as $month)
                                            <option value="{{ $month->id }}"  {{ $month->default ? "selected" : "" }}>{{ $month->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($courses as $course)
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="course_grade">{{ $course->name }}</label>
                                    <input type="hidden" class="form-control @error('password') is-invalid @enderror" id="{{ $course->name }}" name="course[{{ $course->name }}]" value="{{ $course->name }}" autofocus>
                                    <select class="form-control" name="course[{{ $course->name }}]" id="course_grade">
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade }}">{{ $grade }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">ثبت</button>
                        <a href="{{ route('students.show', $student->id) }}" type="button" class="btn btn-danger">لغو</a>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
