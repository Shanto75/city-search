<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

                <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        
    </head>
    <body class="bg-dark">
 
        <div class="container p-5">
            
                        <div class="card card-success">
                            <div class="card-header">
                              <h3 class="card-title">City List</h3>
                            </div>
                            <table class="table table-bordered text-dark">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>City</th>
                                  <th>City Ascii</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($citylist as $city)
                                  <tr>
                                    <td>{{$city->id}}</td>
                                    <td>{{$city->city}}</td>
                                    <td>{{$city->city_ascii}}</td>
                                  </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                
                            {{-- {!! $citylist->links() !!} --}}
                
                          </div>

        </div>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}""></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}""></script>
    </body>
</html>
