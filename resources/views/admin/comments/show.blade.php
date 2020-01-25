@extends('layouts.admin')

@section('title', 'Dashboard - Comment')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-right ml-5">
                {{-- <a href="{{ route('comments.create') }}" class="btn btn-primary btn-rounded btn-fw">Add + </a> --}}
                Approve: <a href="#" class="approve">@if($comment->approved) <i class="mdi mdi-check-circle-outline" data-approve="1"> @else <i class="mdi mdi-close-circle-outline" data-approve="0"> @endif</i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $comment->title }} </h4>
            <p class="card-description">
                {{ $comment->name }} - {{ \Carbon\Carbon::parse($comment->updated_at)->diffForHumans() }}
            </p>
            <div>
                {{ $comment->body }}
            </div>
          </div>
          <div class="card-footer">{{ $comment->email }}</div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $('.approve').on('click', function(){
            let $this = $(this);
            let comment_id = "{{ $comment->id }}";
            let token = "{{ csrf_token() }}";
            let approve = $this.children().data('approve');
            console.log(approve);
            $.ajax({
                url:"/admin/comment/approval/"+ comment_id,
                method: "POST",
                type:"json",
                data:{
                    _token: token,
                    approve: approve
                },
                success:function(res){
                    console.log(res);
                    if(res.approve){
                        $this.html('<i class="mdi mdi-check-circle-outline" data-approve="1"></i>')
                    }else{
                        $this.html('<i class="mdi mdi-close-circle-outline" data-approve="0"></i>')
                    }
                }
            })
        })
    </script>
@endsection
