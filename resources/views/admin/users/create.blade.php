@extends('layouts.admin')

@section('title', 'Dashboard - Create User')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Article</h4>
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
        <form class="forms-sample" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="name" name="name" placeholder="Username" value="{{ old('name') }}" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}" autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role_id" id="role">
                    <option value="">Select a Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ ( old("role_id") == $role->id ) ? 'selected':'' }} >
                        {{ $role->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="imgInp" >
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                    <img src="" alt="" id="image-output">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
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
