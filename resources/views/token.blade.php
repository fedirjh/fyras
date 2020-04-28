@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">This Is Your Token</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">{{$token}}</p>
                    <form class="text-center" action="{{route('generate')}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-secondary">Genrate New Token</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
