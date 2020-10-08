@extends('layouts.admin')

@section('title', 'Dashboard - Edit Month')

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
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">انتخاب ماه</h4>
            <p class="card-description">
              ماه پیشفرض را انتخاب کنید
            </p>
            <div class="">
                @if($errors->any())
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
                <div class="schedule">

                    <form action="{{ route('default.month') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" name="default" id="">
                                        @foreach ($months as $month)
                                            <option value="{{ $month->id }}" {{ $month->default ? "selected" : "" }}>{{ $month->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">تایید</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
