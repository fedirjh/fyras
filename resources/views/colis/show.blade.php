@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header text-center" style=" border-bottom: 0; ">Coli : {{ $coli->rfidTag}}</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header text-center">
                    <h4>Sender</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name </label>
                      <input class="form-control" type="text" name="sender[name]" value="{{$sender->name}}" disabled>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Postal Adress</label>
                          <input class="form-control" type="text" name="sender[postalAdress]" value="{{$sender->postalAdress}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Postal Code</label>
                          <input class="form-control" type="number" name="sender[postalCode]" value="{{$sender->postalCode}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Town</label>
                          <input class="form-control" type="text" name="sender[town]" value="{{$sender->town}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>City</label>
                          <input class="form-control" type="text" name="sender[city]" value="{{$sender->city}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Country</label>
                          <input class="form-control" type="text" name="sender[country]" value="{{$sender->country}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Service Destination</label>
                          <input class="form-control" type="text" name="sender[serviceDestination]" value="{{$sender->serviceDestination}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mail</label>
                          <input class="form-control" type="email" name="sender[mail]" value="{{$sender->mail}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tel</label>
                          <input class="form-control" type="text" name="sender[tel]" value="{{$sender->tel}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fax</label>
                          <input class="form-control" type="text" name="sender[fax]" value="{{$sender->fax}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Contact Person</label>
                          <input class="form-control" type="text" name="sender[contactPerson]" value="{{$sender->contactPerson}}" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header text-center">
                    <h4>Reciever</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name </label>
                      <input class="form-control" type="text" name="reciever[name]" value="{{$reciever->name}}" disabled>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Postal Adress</label>
                          <input class="form-control" type="text" name="reciever[postalAdress]" value="{{$reciever->postalAdress}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Postal Code</label>
                          <input class="form-control" type="number" name="reciever[postalCode]" value="{{$reciever->postalCode}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Town</label>
                          <input class="form-control" type="text" name="reciever[town]" value="{{$reciever->town}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>City</label>
                          <input class="form-control" type="text" name="reciever[city]" value="{{$reciever->city}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Country</label>
                          <input class="form-control" type="text" name="reciever[country]" value="{{$reciever->country}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Service Destination</label>
                          <input class="form-control" type="text" name="reciever[serviceDestination]" value="{{$reciever->serviceDestination}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mail</label>
                          <input class="form-control" type="email" name="reciever[mail]" value="{{$reciever->mail}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tel</label>
                          <input class="form-control" type="text" name="reciever[tel]" value="{{$reciever->tel}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fax</label>
                          <input class="form-control" type="text" name="reciever[fax]" value="{{$reciever->fax}}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Contact Person</label>
                          <input class="form-control" type="text" name="reciever[contactPerson]" value="{{$reciever->contactPerson}}" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-header text-center">Transactions</div>
                <div class="card-body">
                  <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Time</th>
                      <th>Location</th>
                      <th>Country</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $transaction)
                      <tr>
                        <td><strong>{{ $transaction->id }}</strong></td>
                        <td><strong>{{ $transaction->created_at }}</strong></td>
                        <td>{{ \App\Post::find($transaction->post_id)->location }}</td>
                        <td>{{ \App\Post::find($transaction->post_id)->country }}</td>
                        <td>{{ \App\Post::find($transaction->post_id)->type }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
