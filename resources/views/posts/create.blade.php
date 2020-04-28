@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Add Post</div>

                <div class="card-body">

                    <form action="{{route('posts.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Country</label>
                        <input class="form-control" type="text" name="country" value="" required>
                      </div>
                      <div class="form-group">
                        <label>Location</label>
                        <input class="form-control" type="text" name="location" value="" required>
                      </div>
                      <div class="form-group">
                        <label>Type</label>
                        <input class="form-control" type="text" name="type" value="" required>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-secondary">Add Post</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
