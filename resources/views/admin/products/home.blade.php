@extends('layouts.admin')

@section('title', 'Dashboard - Products')

@section('content')
<h1>To Dos:</h1>
<ul>
    <li><strong>make unique product position</strong></li>
    <li><strong>add limit for position</strong></li>
    <li><strong>get default postion on updating add to home</strong></li>
    <li><strong>use drang and drop to change postion and update using ajax</strong></li>
    <li><strong></strong></li>
</ul>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-left ml-5">
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Products table</h4>
            <p class="card-description">
              All the products in latest added order
            </p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                            #
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Position
                            </th>
                            <th>
                                On Sale
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{ $product->id }}
                                </td>
                                <td>
                                    <div class="tooltips">
                                        {{ $product->title }}
                                        <div class="tooltiptext">
                                            <ul>
                                                <li>{{ $product->user->name }}</li>
                                                <li>{{ $product->created_at }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control postion-input" value="{{ $product->position }}" data-id="{{ $product->id }}" readonly>
                                </td>
                                <td>
                                    @if($product->is_on_sale)
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    @else
                                        <i class="mdi mdi-close-circle-outline"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                        <a href="{{ route('products.edit', $product->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i>
                                        </a>
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

@endsection

@section('scripts')
    <script>

        $('.postion-input').on('click', function(){
            $(this).removeAttr("readonly");
            console.log('ok');

        })

        $('.postion-input').on('change', function(){
            $(this).attr("readonly", true);
            console.log('its ok');
            var product_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var position = $(this).val();
            console.log(position);
            console.log(token);
            console.log(product_id);
            $.ajax({
                type: "PATCH",
                url: "/admin/products/position/" + product_id,
                data: {
                    _token : token,
                    position: position
                },
                success:function(data){
                    console.log(data);
                },
                error:function(err){
                    console.log('err');
                    console.log(err);
                }
            })
        })
    </script>
@endsection
