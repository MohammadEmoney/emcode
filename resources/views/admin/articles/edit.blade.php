@extends('layouts.admin')

@section('title', 'Dashboard - Edit Article')

@section('content')
    @if($errors->any())
        <div class="alert alert-success">
            <ul>
                <li>{{ $errors->first() }}</li>
            </ul>
        </div>
    @endif
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit {{ $article->title }}</h4>
        <p class="card-description">

        </p>
        <form class="forms-sample" method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ $article->title }}" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="short_description" name="short_description" placeholder="Short Description" value="{{ $article->short_description }}" autofocus>
                @error('short_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="categories[]" id="category" multiple>
                    <option value="">Select a category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ ( $article->categories->contains($cat->id) ) ? 'selected':'' }}>{{ $cat->title }}
                        </option>
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
                @if($article->image)
                    <div class="input-group col-xs-12">
                        <img src="{{ $article->image }}" width="200" class="thumbnail" alt="">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>File</label>
                <input type="file" name="zip_files[]" class="file-upload-default" multiple>
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                @if($article->file)
                    <div>
                        @php $file = explode("/",$article->file) @endphp
                        <a href="{{ $article->file }}" download>
                            {{ end($file) }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="content" rows="4">{{ $article->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{ route('articles.index') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        // Ckeditor
        CKEDITOR.replace( 'description' , {
            removePlugins: 'easyimage',
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                $('#image-output').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
@endsection
