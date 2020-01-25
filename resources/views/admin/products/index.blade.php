@extends('layouts.admin')

@section('title', 'Dashboard - Products')

@section('content')
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
                                Price
                            </th>
                            <th>
                                On Sale
                            </th>
                            <th>
                                Send To Home
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
                                                <li>{{ \Carbon\Carbon::parse( $product->created_at )->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                   $ {{ $product->price }}
                                </td>
                                <td>
                                    @if($product->is_on_sale)
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    @else
                                        <i class="mdi mdi-close-circle-outline"></i>
                                    @endif
                                </td>
                                <td>
                                    {{-- <img src="{{ $product->image }}" alt="{{ $product->title }}" class="image" width="50px"> --}}
                                    <label class="switch">
                                        <input class="add_to_home" data-id="{{ $product->id }}" type="checkbox" {{ ($product->add_to_home) ? "checked" : "" }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary delete" data-id="{{ $product->id }}">
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
        var token = "{{ csrf_token() }}";

        $('.delete').on('click', function(){
            let $this = $(this);
            let thisRow = $(this).parent().parent().parent()
            let product_id = $this.data("id")

            $.ajax({
                url: "/admin/products/"+ product_id,
                type: "POST",
                data: {
                    _token : token,
                    _method: "DELETE"
                },
                success:function(){
                    thisRow.fadeOut();
                },
                error:function(error){
                    console.log(error);
                }
            })
        })

        $('.add_to_home').on('click', function(){
            let $this = $(this);
            let checkbox = $this.prop("checked")
            let product_id = $this.data("id")

            $.ajax({
                type:'PATCH',
                url:'/admin/products/add-to-home/'+ product_id,
                data:{
                    _token:token,
                    checkbox: checkbox,
                },
                success:function(data) {

                    console.log(data)
                },
                error:function(error){
                    !$this.prop("checked");
                    console.log(error)
                }
            });
        })
    </script>
@endsection
