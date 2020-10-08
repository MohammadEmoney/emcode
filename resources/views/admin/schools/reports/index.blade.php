@extends('layouts.admin')

@section('title', 'Dashboard - Reports')

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
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <select class="form-control border-info" name="month" id="month">
                            @foreach($months as $month)
                                <option value="{{ $month->name }}" {{ $month->id == $monthId ? "selected" : "" }}>{{ $month->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">کارنامه های ماه {{ $month->name }}</h4>
            <p class="card-description">
              All the school in latest added order
            </p>
            <div class="table-responsive pt-3">
                <div class="schedule">

                    <table class="table table-striped" dir="rtl">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">جنسیت</th>
                            <th scope="col">کارنامه</th>
                            <th scope="col">حذف</th>
                            <th scope="col">ویرایش</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr class="table-warning">
                                <td>{{ $report->id }}</td>
                                <td>{{ $report->student->first_name }}</td>
                                <td>{{ $report->student->last_name }}</td>
                                <td>{{ $report->student->gender == "boy" ? "پسر" : "دختر" }}</td>
                                <td><a class="btn btn-info" href="{{ route('reports.show', $report->id) }}">کارنامه</a></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ route('reports.destroy', $report->id) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $report->id }}').submit();">
                                        حذف
                                    </a>

                                    <form id="delete-form-{{ $report->id }}" action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('reports.edit', $report->id) }}">ویرایش</a>
                                </td>
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
@section('scripts')
    <script>
        var route = "{{ url('/admin/reports') }}"
        $('#month').change(function() {
            window.location =  route + "?month=" + $(this).val();
            console.log(route + "?month=" + $(this).val());
        });
    </script>
@endsection
