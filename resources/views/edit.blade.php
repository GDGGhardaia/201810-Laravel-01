@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <div class="row">
            <div class="col col-md-10">
              <form action="{{route('editPost')}}" method="post">
                <div class="form-group">
                  <label>Edit post</label>
                    <textarea class="form-control" rows="3" name="body">{{$post->body}}</textarea>
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-sm">
                      Save changes
                    </button>
                    @csrf
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection
