@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Add Coli</div>

                <div class="card-body">

                    <form action="{{route('colis.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>RFID TAG</label>
                        <input class="form-control" type="text" name="id" value="" required>
                      </div>
                      <div class="form-group">
                        <label>Poste</label>
                        <select class="form-control" type="select" name="post_id" required>
                          @foreach(\App\Post::all() as $post)
                            <option value="{{$post->id}}">{{$post->location}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Sender</h4>
                          <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="sender[name]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Postal Adress</label>
                            <input class="form-control" type="text" name="sender[postalAdress]" value="">
                          </div>
                          <div class="form-group">
                            <label>Postal Code</label>
                            <input class="form-control" type="number" name="sender[postalCode]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Town</label>
                            <input class="form-control" type="text" name="sender[town]" value="">
                          </div>
                          <div class="form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="sender[city]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" name="sender[country]" value="">
                          </div>
                          <div class="form-group">
                            <label>Service Destination</label>
                            <input class="form-control" type="text" name="sender[serviceDestination]" value="">
                          </div>
                          <div class="form-group">
                            <label>Mail</label>
                            <input class="form-control" type="email" name="sender[mail]" value="">
                          </div>
                          <div class="form-group">
                            <label>Tel</label>
                            <input class="form-control" type="text" name="sender[tel]" value="">
                          </div>
                          <div class="form-group">
                            <label>Fax</label>
                            <input class="form-control" type="text" name="sender[fax]" value="">
                          </div>
                          <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control" type="text" name="sender[contactPerson]" value="" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h4>Reciever</h4>
                          <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="reciever[name]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Postal Adress</label>
                            <input class="form-control" type="text" name="reciever[postalAdress]" value="">
                          </div>
                          <div class="form-group">
                            <label>Postal Code</label>
                            <input class="form-control" type="number" name="reciever[postalCode]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Town</label>
                            <input class="form-control" type="text" name="reciever[town]" value="">
                          </div>
                          <div class="form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="reciever[city]" value="" required>
                          </div>
                          <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" name="reciever[country]" value="">
                          </div>
                          <div class="form-group">
                            <label>Service Destination</label>
                            <input class="form-control" type="text" name="reciever[serviceDestination]" value="">
                          </div>
                          <div class="form-group">
                            <label>Mail</label>
                            <input class="form-control" type="email" name="reciever[mail]" value="">
                          </div>
                          <div class="form-group">
                            <label>Tel</label>
                            <input class="form-control" type="text" name="reciever[tel]" value="">
                          </div>
                          <div class="form-group">
                            <label>Fax</label>
                            <input class="form-control" type="text" name="reciever[fax]" value="">
                          </div>
                          <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control" type="text" name="reciever[contactPerson]" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-secondary">Add Coli</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
