@extends('layouts.admin')

@section('title', 'Dashboard - Products')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-left ml-5">
                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Categories table</h4>
            <p class="card-description">
              All the Categories in latest added order
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
                                Parent Category
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    @if(isset($category->parent_id))
                                        {{ $category->parent->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ $category->image }}" alt="{{ $category->title }}" class="image" width="50px">
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                        <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('categories.show', $category->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
          </div>
        </div>
    </div>
</div>

@endsection
