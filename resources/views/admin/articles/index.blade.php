@extends('layouts.admin')

@section('title', 'Dashboard - Articles')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-left ml-5">
                <a href="{{ route('articles.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Articles table</h4>
            <p class="card-description">
              All the Articles in latest added order
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
                                Category
                            </th>
                            <th>
                                Short Description
                            </th>
                            <th>
                                Approved
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>
                                    {{ $article->id }}
                                </td>
                                <td>
                                    {{ $article->title }}
                                </td>
                                <td>
                                    @if(isset($article->categories))
                                        @foreach ($article->categories as $category)
                                            {{ $category->title }} @if(next($article->categories)) {{ " ," }} @endif
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $article->short_description }}
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="approved" data-id="{{ $article->id }}" type="checkbox" {{ ($article->approved) ? "checked" : "" }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                        <a href="{{ route('articles.edit', $article->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('articles.show', $article->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
          </div>
        </div>
    </div>
</div>

@endsection
