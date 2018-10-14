@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                       <div class="col col-md-10">
                         <form action="{{route('create')}}" method="post">
                            <div class="form-group">
                              <label>Create a new post</label>
                              <textarea class="form-control" rows="3" name="post_body"></textarea><br>
                              <button type="submit" name="submit" class="btn btn-primary btn-sm">Create Post</button>
                              @csrf
                            </div>
                         </form>
                       </div>
                      </div>
                </div>
            </div>

            <br>
          <div class="card">
            <div class="card-header h4">Your posts:</div>

            <div class="card-body">
              @foreach($posts as $post)
              <div class="row">
                <div class="col col-md-10">
                  {{$post->body}}
                </div>
                <div class="col col-md-2">
                  <a href="{{url('delete').'?id='.$post->id}}" class="btn btn-link btn-sm">
                    Delete
                  </a>
                  <a href="{{url('edit_page').'?id='.$post->id}}" class="btn btn-link btn-sm">
                    Edit
                  </a>
                </div>
              </div>
              <hr>
              @endforeach
            </div>   
          </div>
        </div>
    </div>
</div>
@endsection
