@extends('layouts.admin')

@section('title', 'Dashboard - Edit Product')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit {{ $product->title }}</h4>
        <p class="card-description">

        </p>
        <form class="forms-sample" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ $product->title }}" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="short_description" name="short_description" placeholder="Short Description" value="{{ $product->short_description }}" autofocus>
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
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="price" name="price" placeholder="Price" value="{{ $product->price }}" autofocus>
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
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="discount" name="discount" placeholder="Discount" value="{{ $product->discount }}" autofocus>
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
                        <option value="{{ $cat->id }}" {{ ($cat->id == $product->category->id) ? "selected" : "" }}>{{ $cat->name }}</option>
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
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $product->image }}" alt="image" class="img-thumbnail rounded m-2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Background Image</label>
                <input type="file" name="bg_img" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $product->bg_img }}" alt="image" class="img-thumbnail rounded m-2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>File</label>
                <input type="file" name="file" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a src="{{ $product->file }}" class="img-thumbnail rounded m-2" download>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Gallery</label>
                <input type="file" name="gallery[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Images">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                <div class="row">
                    @foreach(json_decode($product->gallery) as $img)
                        <div class="col-md-3">
                            <div class="edit-gallery">
                                <img src="{{ $img }}" alt="image" class="img-thumbnail rounded m-2">
                                <button type="button" class="btn btn-dark btn-rounded btn-icon del-btn">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" name="add_to_home" class="add_to_home" {{ $product->add_to_home ? "checked" : "" }}>
                        Add to home?
                    <i class="input-helper"></i></label>
                </div>
            </div>
            <div class="form-group position">
                <label for="position">Position <em>(Higher rate goes first)</em></label>
                <input type="number" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="position" value="{{ isset($product->position) ? $product->position : null }}" autofocus>
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
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

    var token = "{{ csrf_token() }}"
    //Delete Image
    $(".del-btn").click(function(e){
            let thisRow = $(this).parent().parent()
            let src = $(this).prev().attr('src')
            let id = "{{ $product->id }}"

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
            $.ajax({
                url: "/admin/products/delete/image/"+ id,
                type: 'POST',
                dataType: 'JSON',
                data:{
                    _method: 'PATCH',
                    src: src
                },
                success:function(res){
                    thisRow.fadeOut();
                }
            })
        });
</script>
@endsection
