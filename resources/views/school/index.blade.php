@extends('layouts.front')

@section('title', 'کلاس اول الف')

@section('content')


    <div class="container text-center">
        <h1>برنامه هفتگی کلاس اول ابتدایی</h1>
        <h2>روزهای <a href="/school?type={{ $schedules[0]->day_type == "even" ? "odd" : "even" }}">{{ $schedules[0]->day_type == "even" ? "زوج" : "فرد" }}</a></h2>
        <div class="schedule table-responsive">

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
                        <th scope="row" rowspan="2">{{ $schedule->day }}</th>
                        <td>{{ $schedule->class_first }}</td>
                        <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                        <td>{{ $schedule->class_second }}</td>
                        <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                        <td>{{ $schedule->class_third }}</td>
                        <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                        <td>{{ $schedule->class_forth }}</td>
                        <td rowspan="2" class="bg-success">{{ $schedule->break }} دقیقه</td>
                        <td>{{ $schedule->class_fifth ?: "غیر حضوری" }}</td>
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

@endsection
