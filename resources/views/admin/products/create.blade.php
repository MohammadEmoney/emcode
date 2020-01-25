@extends('layouts.admin')

@section('title', 'Dashboard - Create Product')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Product</h4>
        <p class="card-description">
            @foreach ($errors->all() as $message)
                {{ $message }}
            @endforeach
        </p>
        <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="short_description" name="short_description" placeholder="Short Description" value="{{ old('short_description') }}" autofocus>
                @error('short_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="price" name="price" placeholder="Price" value="{{ old('price') }}" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount">Disount</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="discount" name="discount" placeholder="Discount" value="{{ old('discount') }}" autofocus>
                        @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Image</label>
                <div class="input-group col-xs-12">
                    <input type="file" class="imgInp form-control" name="image" placeholder="Upload Image" id="imgInp">
                    <input type="hidden" name="crop" value="" id="input-crop">
                </div>
                <img src="" alt="" id="image-output">
                <button class="btn btn-primary crop-img" type="button" id="crop-img">crop</button>
            </div>

            <div class="form-group">
                <label>Backgroud Image</label>
                <div class="input-group col-xs-12">
                    <input type="file" name="bg_img" class="bgInp form-control" >
                    <input type="hidden" name="bg_crop" value="" id="bg-input-crop">
                </div>
                <img src="" alt="" id="bg-output">
                <button class="btn btn-primary crop-bg" type="button" id="crop-bg">crop</button>
            </div>
            <div class="form-group">
                <label>Gallery</label>
                <input type="file" name="gallery[]" class="file-upload-default" multiple>
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Images">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
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
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" name="add_to_home" class="add_to_home">
                        Add to home?
                    <i class="input-helper"></i></label>
                </div>
            </div>
            <div class="form-group position">
                <label for="position">Position <em>(Higher rate goes first)</em></label>
                <input type="number" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="position" value="{{ old('position') }}" autofocus>
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control ckeditor" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>

</div>

@endsection

@section('scripts')
<script>

    ClassicEditor.create( document.querySelector( '#description' ), {
        image: {
            // You need to configure the image toolbar, too, so it uses the new style buttons.
            toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

            styles: [
                // This option is equal to a situation where no style is applied.
                'full',

                // This represents an image aligned to the left.
                'alignLeft',

                // This represents an image aligned to the right.
                'alignRight'
            ]
        }
    } )
    .then( editor => {
        // editor.execute( 'imageUpload', { file: file } );
        // console.log( editor );
    } )
    .catch( error => {
        // console.error( error );
    } );

    // let cropper = new Cropper();

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-output').attr('src', e.target.result);
                // imgCropper(e)
                crop();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function bgReadUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#bg-output').attr('src', e.target.result);
                // imgCropper(e)
                bgCrop();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".imgInp").on( 'change', function() {
        readURL(this);
    });

    $(".bgInp").on( 'change', function() {
        bgReadUrl(this);
    });

    function crop(){
        var size;
        $('#image-output').Jcrop({
            aspectRatio: 1,
            setSelect: [0,0,500,500],
            onChange: function(c){
                size = {x:c.x,y:c.y,w:c.w,h:c.h};
                console.log(size);
            }
        });
        $("#crop-img").on( 'click' , function(){
            console.log('cliked on save')
            $("#input-crop").val([size.x,size.y, size.w, size.h]);
        });

    }



    function bgCrop(){
        var bgsize;
        $('#bg-output').Jcrop({
            aspectRatio: 16/4,
            setSelect: [0,0,200,200],
            onChange: function(c){
                bgsize = {x:c.x,y:c.y,w:c.w,h:c.h};
                console.log(bgsize);
            }
        });

        $("#crop-bg").on( 'click' , function(){
            console.log('cliked on save')
            $("#bg-input-crop").val([bgsize.x,bgsize.y, bgsize.w, bgsize.h]);
        });
    }

    $('.position').hide();

    $('.add_to_home').on('change', function(){
        if($(this).is(":checked")){
            console.log('checked')
            $('.position').fadeIn();
        }else{
            console.log('not checked')
            $('.position').fadeOut();
        }
    })
</script>
@endsection
