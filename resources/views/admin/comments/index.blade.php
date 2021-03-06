@extends('layouts.admin')

@section('title', 'Dashboard - Comments')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-left ml-5">
                {{-- <a href="{{ route('comments.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Comments table</h4>
            <p class="card-description">
              All the Comments in latest added order
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
                                Username
                            </th>
                            <th>
                                Article
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
                        @foreach($comments as $comment)
                            <tr>
                                <td>
                                    {{ $comment->id }}
                                </td>
                                <td>
                                    {{ $comment->title }}
                                </td>
                                <td>
                                    {{ $comment->name }}
                                </td>
                                <td>
                                    {{ $comment->article->title }}
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="approved" data-id="{{ $comment->id }}" type="checkbox" {{ ($comment->approved) ? "checked" : "" }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group flex-row-reverse" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                        <a href="{{ route('comments.edit', $comment->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('comments.show', $comment->id) }}" type="button" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $comments->links() }}
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

        $('.approved').on('click', function(){
            let $this = $(this);
            let checkbox = $this.prop("checked")
            let comment_id = $this.data("id")

            $.ajax({
                type:'POST',
                url:'/admin/comment/approval/'+ comment_id,
                data:{
                    _token:token,
                    checkbox: checkbox,
                },
                success:function(data) {
                    !$this.prop("checked");
                    console.log(data.approve)
                },
                error:function(error){
                    // !$this.prop("checked");
                    console.log(error)
                }
            });
        })
    </script>
@endsection
