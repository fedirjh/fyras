@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Posts Manafer</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('posts.create') }}" class="btn btn-secondary text-center">Add Post</a>
                    <table class="table table-responsive-sm table-striped mt-3">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Country</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $post)
                        <tr>
                          <td><strong>{{ $post->id }}</strong></td>
                          <td><strong>{{ $post->country }}</strong></td>
                          <td>{{ $post->location }}</td>
                          <td>{{ $post->type }}</td>
                          <td>
                            <!--<a href="{{ url('/posts/' . $post->id) }}" class="btn btn-block btn-primary">View</a>-->
                          </td>
                          <td>
                            <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
