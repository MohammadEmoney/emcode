@extends('layouts.admin')

@section('title', 'Dashboard - Comment')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-right ml-5">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $user->name }} </h4>
            <p class="card-description">
                {{ $user->name }} - {{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
            </p>
            <div class="w-100 text-center">
                @if($user->image)
                    <img class="w-25" src="{{ $user->image }}" alt="">
                @else
                    <img class="w-25" src="/img/user.png" alt="">
                @endif
            </div>
          </div>
          <div class="card-footer">{{ $user->email }}</div>
        </div>
    </div>
</div>

@endsection
