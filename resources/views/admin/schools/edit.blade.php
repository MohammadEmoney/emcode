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
        <div class="card">
            <div class="card-body text-left ml-5">
                <a href="{{ route('school.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">school table</h4>
            <p class="card-description">
              All the school in latest added order
            </p>
            <div class="table-responsive pt-3">
                <div class="schedule">

                    <form action="{{ route('school.update', $school->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <table class="table table-striped" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">ایام هفته</th>
                                <th scope="col">زنگ اول</th>
                                <th scope="col">زنگ تفریح</th>
                                <th scope="col">زنگ دوم</th>
                                <th scope="col">زنگ تفریح</th>
                                <th scope="col">زنگ سوم</th>
                                <th scope="col">زنگ تفریح</th>
                                <th scope="col">زنگ چهارم</th>
                                <th scope="col">زنگ تفریح</th>
                                <th scope="col">زنگ پنجم</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="table-warning">
                                    <th scope="row" rowspan="2"><input type="text" class="form-control" name="day" value="{{ $school->day }}"></th>
                                    <td><input type="text" class="form-control" name="class_first" value="{{ $school->class_first }}"></td>
                                    <td rowspan="2" class="bg-success"><input type="number" class="form-control" name="break" value="{{ $school->break }}"> دقیقه</td>
                                    <td><input type="text" class="form-control" name="class_second" value="{{ $school->class_second }}"></td>
                                    <td rowspan="2" class="bg-success">{{ $school->break }} دقیقه</td>
                                    <td><input type="text" class="form-control" name="class_third" value="{{ $school->class_third }}"></td>
                                    <td rowspan="2" class="bg-success">{{ $school->break }} دقیقه</td>
                                    <td><input type="text" class="form-control" name="class_forth" value="{{ $school->class_forth }}"></td>
                                    <td rowspan="2" class="bg-success">{{ $school->break }} دقیقه</td>
                                    <td><input type="text" class="form-control" name="class_fifth" value="{{ $school->class_fifth }}"></td>
                                </tr>
                                <tr class="table-info">
                                    <td><input type="text" class="form-control" name="class_first_time" value="{{ $school->class_first_time }}"></td>
                                    <td><input type="text" class="form-control" name="class_second_time" value="{{ $school->class_second_time }}"></td>
                                    <td><input type="text" class="form-control" name="class_third_time" value="{{ $school->class_third_time }}"></td>
                                    <td><input type="text" class="form-control" name="class_forth_time" value="{{ $school->class_forth_time }}"></td>
                                    <td><input type="text" class="form-control" name="class_fifth_time" value="{{ $school->class_fifth_time }}"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">تایید</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
