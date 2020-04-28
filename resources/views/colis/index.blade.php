@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Colis Manager</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('colis.create') }}" class="btn btn-secondary text-center">Add Coli</a>
                    <table class="table table-responsive-sm table-striped mt-3">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>RFID TAG</th>
                        <th>Sender</th>
                        <th>Reciever</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($colis as $coli)
                        <tr>
                          <td><strong>{{ $coli->id }}</strong></td>
                          <td><strong>{{ $coli->rfidTag }}</strong></td>
                          <td>{{ \App\Individual::find($coli->sender_id)->name }}</td>
                          <td>{{ \App\Individual::find($coli->reciever_id)->name }}</td>
                          <td>
                            <a href="{{ url('/colis/' . $coli->id) }}" class="btn btn-block btn-primary">View</a>
                          </td>
                          <td>
                            <form action="{{ route('colis.destroy', $coli->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $colis->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
