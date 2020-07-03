@extends('layouts.admin')

@section('title', 'Dashboard - Create Article')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Word</h4>
        <p class="card-description">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </p>
        <form class="forms-sample" method="POST" action="{{ route('words.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="word">Word</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="word" name="word" placeholder="word" value="{{ old('word') }}" autofocus>
                @error('word')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{ route('words.index') }}" class="btn btn-light">Cancel</a>
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
