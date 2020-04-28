@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('colis.index')}}" class="btn btn-secondary text-center">Colis Manager</a>
                    <a href="{{route('posts.index')}}" class="btn btn-secondary text-center">Posts Manager</a>
                    <a href="{{route('token')}}" class="btn btn-secondary text-center">Token Manager</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
