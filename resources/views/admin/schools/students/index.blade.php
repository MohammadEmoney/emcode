@extends('layouts.admin')

@section('title', 'Dashboard - Students')

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
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
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
                            @foreach($students as $student)
                            <tr class="table-warning">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->gender == "boy" ? "پسر" : "دختر" }}</td>
                                <td><a class="btn btn-info" href="{{ route('students.show', $student->id) }}">کارنامه</a></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ route('students.destroy', $student->id) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $student->id }}').submit();">
                                        حذف
                                    </a>

                                    <form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: none;">
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
        </div>
    </div>
</div>

@endsection
