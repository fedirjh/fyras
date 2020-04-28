<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 70vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .content {
                text-align: center;
            }

            .form input:hover {
                box-shadow: 0 1px 6px 0 rgba(32,33,36,0.28);
                border-color: rgba(223,225,229,0);
            }
            .form input {
                background: #fff;
                display: flex;
                border: 1px solid #dfe1e5;
                box-shadow: none;
                border-radius: 24px;
                z-index: 3;
                height: 44px;
                margin: 0 auto;
                width: 482px;
                padding: 0 1rem;
            }
            .btn {
              display: inline-block;
                background-color: #f2f2f2;
                border: 1px solid #dfe1e5;
                border-radius: 4px;
                color: #5F6368;
                font-family: arial,sans-serif;
                font-size: 14px;
                margin: 11px 4px;
                padding: 0 16px;
                line-height: 33px;
                height: 36px;
                min-width: 54px;
                text-align: center;
                cursor: pointer;
                user-select: none;
                text-decoration: none;
            }
            input:focus {
                    outline: none;
            }
            a.btn {
                height: 34px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
              <form class="form" action="/search" method="post">
                @csrf
                <input type="text" name="q" value="{{ $q ?? '' }}" required>
                <button type="submit" class="btn">Search</button>
                @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn">Administration</a>
                        @else
                            <a href="{{ route('login') }}" class="btn">Login</a>
                        @endauth
                @endif
              </form>
              @if(isset($error))
              <div class="card mt-4">
                <div class="card-body">
                  {{$error}}
                </div>
            </div>
              @endif
              @if(isset($transactions))
                <div class="card mt-4">
                  <div class="card-header text-center">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($transactions as $transaction)
                        <tr>
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
              @endif
            </div>
        </div>
    </body>
</html>
