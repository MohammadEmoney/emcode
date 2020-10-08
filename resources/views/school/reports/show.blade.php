@extends('layouts.front')

@section('title', 'ارزشیابی توصیفی ماهانه')

@section('content')


    <div class="container text-center my-5">
        <h1>ارزشیابی توصیفی ماهانه <span class="text-success">{{ $report->student->name }}</span></h1>
        <h3 class="text-secondary">ماه {{ $report->month->name }}</h3>
        <div class="schedule table-responsive">

            <table class="table table-striped" dir="rtl">
                <thead>
                  <tr>
                    <th>نام درسی</th>
                    <th>نمره</th>
                    <th>فرایند</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($report->grades) as $course => $grade)
                        @php
                            $pro = key(Arr::where($process, function ($value, $key) use ($grade) {
                                        return $value == $grade ? $key : 0;
                                    }));
                            $procolor = "";
                            if ($pro == 100) {
                                $procolor = "success";
                            }elseif ($pro == 75) {
                                $procolor = "warning";
                            }elseif ($pro == 50) {
                                $procolor = "primary";
                            }elseif ($pro == 25) {
                                $procolor = "danger";
                            }
                        @endphp
                        <tr>
                            <td class="py-1">{{ $course }}</td>
                            <td class="{{ $grade == "نیاز به تلاش" ? "text-danger" : ""}}">{{ $grade }}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-{{ $procolor ?? 'success' }}" role="progressbar" style="width: {{ $pro }}%" aria-valuenow="{{ $pro }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
