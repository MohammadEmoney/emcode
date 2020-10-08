@extends('layouts.front')

@section('title', 'ارزشیابی توصیفی ماهانه')

@section('content')


    <div class="container text-center">
        <h1>ارزشیابی توصیفی ماهانه کلاس اول ابتدایی</h1>
        <h2>
            <div class="row">
                <div class="col-4 mx-auto">
                    <div class="form-group">
                        <select class="form-control" name="month" id="month">
                            @foreach($months as $month)
                                <option value="{{ $month->name }}" {{ $month->id == $monthId ? "selected" : "" }}>{{ $month->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </h2>
        <div class="schedule table-responsive">

            <table class="table table-striped" dir="rtl">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">نام خانوادگی</th>
                        <th scope="col">کارنامه</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($reports->count())
                        @foreach($reports as $report)
                            <tr class="table-warning">
                                <td>{{ $report->student->id }}</td>
                                <td>{{ $report->student->first_name }}</td>
                                <td>{{ $report->student->last_name }}</td>
                                <td><a href="{{ route('student.report', $report->id) }}">Report</a></td>
                            </tr>
                        @endforeach
                    @else
                            <h1 class="text-danger">کارنامه ای وارد نشده است</h1>

                            <a href="{{ route('school.report') }}" class="btn btn-info">بازگشت به صفحه اول</a>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var route = "{{ url('/school/report') }}"
        $('#month').change(function() {
            window.location =  route + "?month=" + $(this).val();
            console.log(route + "?month=" + $(this).val());
        });
    </script>
@endsection
