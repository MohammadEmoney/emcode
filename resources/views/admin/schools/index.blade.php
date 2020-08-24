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
                            @foreach($schedules as $schedule)
                            <tr class="table-warning">
                                <th scope="row" rowspan="2"><a href="{{ route('school.edit', $schedule->id) }}">{{ $schedule->day }} (هفته {{ $schedule->day_type == "even" ? "زوج" : "فرد" }})</a></th>
                                <td>{{ $schedule->class_first }}</td>
                                <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                                <td>{{ $schedule->class_second }}</td>
                                <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                                <td>{{ $schedule->class_third }}</td>
                                <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                                <td>{{ $schedule->class_forth }}</td>
                                <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                                <td>{{ $schedule->class_fifth }}</td>
                            </tr>
                            <tr class="table-info">
                                <td>{{ $schedule->class_first_time }}</td>
                                <td>{{ $schedule->class_second_time }}</td>
                                <td>{{ $schedule->class_third_time }}</td>
                                <td>{{ $schedule->class_forth_time }}</td>
                                <td>{{ $schedule->class_fifth_time }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
