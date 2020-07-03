@extends('layouts.admin')

@section('title', 'Dashboard - words')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-success">
                <ul>
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body text-left ml-5">
                <a href="{{ route('words.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">words table</h4>
            <p class="card-description">
              All the words in latest added order
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
                        @foreach($words as $word)
                            <tr>
                                <td>
                                    {{ $word->id }}
                                </td>
                                <td>
                                    {{ $word->word }}
                                </td>
                                <td>
                                    {{ $word->word_id }}
                                </td>
                                <td>
                                    <ul>

                                        <li>
                                            {{ $word->shortdef }}
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="approved" data-id="{{ $word->id }}" type="checkbox" {{ ($word->approved) ? "checked" : "" }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" @if(!auth()->user()->can('delete', $word)) disabled @endif>
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                        <a @if(auth()->user()->can('update', $word)) href="{{ route('words.edit', $word->id) }}" @endif type="button" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('words.show', $word->id) }}"  type="button" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $words->links() }}
          </div>
        </div>
    </div>
</div>

@endsection
