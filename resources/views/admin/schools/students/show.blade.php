@extends('layouts.admin')

@section('title', "Dashboard - Student $student->name")

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
                <a href="{{ route('create.report', ['student_id' => $student->id]) }}" class="btn btn-primary btn-rounded btn-fw">افزودن کارنامه</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">{{ $student->name }}</h2>
            <p class="card-description">

            </p>
            <div class="table-responsive pt-3">
                <div class="schedule">
                    @if ($errors->any())
                        <div class="alert alert-success alert-dismissible m-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="table table-striped" dir="rtl">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام خانوادگی نام</th>
                            <th scope="col">ماه</th>
                            <th scope="col">اطلاعات بیشتر</th>
                            <th scope="col">حذف</th>
                            <th scope="col">ویرایش</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr class="table-warning">
                                <td>{{ $report->id }}</td>
                                <td>{{ $report->student->name }}</td>
                                <td>{{ $report->month->name }}</td>
                                <td><a class="btn btn-info" href="{{ route('reports.show', $report->id) }}">اطلاعات بیشتر</a></td>
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
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}">ویرایش</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col">
                            @if($student->next())
                                <a href="{{ route('students.show', $student->next()->id) }}" class="btn btn-primary"><span dir="ltr">{{ $student->next()->name }} &#187;</span></a>
                            @endif
                            @if($student->previous())
                                <a href="{{ route('students.show', $student->previous()->id) }}" class="btn btn-secondary"><span dir="ltr">&#171; {{ $student->previous()->name }}</span></a>
                            @endif
                      </div>
                  </div>

              </div>
          </div>
        </div>
    </div>
</div>

@endsection
