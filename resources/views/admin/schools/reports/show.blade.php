@extends('layouts.admin')

@section('title', "Dashboard - Report {$report->student->name}")

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
                <a href="{{ route('create.report', ['student_id' => $report->student->id]) }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive pt-3">
                <div class="schedule">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">{{ $report->student->name }}</h4>
                            <p class="card-description">
                            </p>
                            <div class="table-responsive">
                              <table class="table table-striped">
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
                                            <td>{{ $grade }}</td>
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
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
