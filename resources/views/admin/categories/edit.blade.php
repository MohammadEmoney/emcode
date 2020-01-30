@extends('layouts.admin')

@section('title', 'Dashboard - Edit Product')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit {{ $category->title }}</h4>
        <p class="card-description">
            @if($errors->any())
                <div class="alert alert-success">
                    <ul>
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </p>
        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ $category->title }}" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="">Select a parent</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Edit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
</div>
@endsection
