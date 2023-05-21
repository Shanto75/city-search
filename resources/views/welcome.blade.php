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
        <h1 class="p-5 text-center">CITY Search</h1>
        <div class="container p-5">
            
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">City List</h3>
                </div>
                <table class="table table-bordered text-dark">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>State ID</th>
                      <th>State Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($statelist as $state)
                      <tr>
                        <td>{{$state->id}}</td>
                        <td>{{$state->state_id}}</td>
                        <td>{{$state->state_name}}</td>
                        <td>
                          {{-- <button id="{{$city->id}}" onclick="getcitydata(this.id)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            view
                          </button> --}}
                          <a href="{{url('citylist', ['stateid'=>$state->state_id])}}" class="btn btn-primary" >view citys</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
    
                {!! $statelist->links() !!}
    
              </div>

            <a class="btn btn-primary mb-4 float-right" href="{{route('admin.home')}}">Go to Admin Section</a>
            <div class="input-group">
                <input type="search" name="search" id="search" class="form-control form-control-lg search" placeholder="Type city state or county name here">
                <div class="input-group-append">
                    <button onclick="search()" type="submit" class="btn btn-lg btn-default">
                        search
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            
            <div class="pt-5">
                <ul class="list-group search-result">

                </ul>
            </div>
        </div>

          <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">City Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="modalinfo">
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>

        <script>
            let citydata = '';
            async function search(){
                let search = document.querySelector(".search").value;
                let url = `{{url('')}}/search/${search}`;
                if(search != ''){
                    try {
                        let res = await fetch(url);
                        citydata = await res.json();

                        citylist = "";
                        citydata.forEach((data)=>{
                            let cityinfo = `
                                <li class="list-group-item list-group-item-dark">
                                    ID:${data.id} City: ${data.city} State: ${data.state_name} County: ${data.county_name} 
                                    <button id="${data.id}" onclick="viewcityinfo(this.id)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        view
                                    </button>
                                </li>`;
                            citylist += cityinfo
                        })
                        document.querySelector(".search-result").innerHTML = citylist;
                        console.log(citydata);

                    } catch (error) {
                        console.log(error);
                        alert(error)
                    }
                }
            }

            function viewcityinfo(id){
                let data = citydata.filter((data)=>{
                  return data.id == id;
                })[0];
                // console.log(data[0].city);
                let cityinfo = `
                <ul class="list-group text-dark">
                <li class="list-group-item"><b>city: </b> ${data.city}</li>
                <li class="list-group-item"><b>city ascii: </b> ${data.city_ascii}</li>
                <li class="list-group-item"><b>county_fips: </b> ${data.county_fips}</li>
                <li class="list-group-item"><b>county_name: </b> ${data.county_name}</li>
                <li class="list-group-item"><b>density: </b> ${data.density}</li>
                <li class="list-group-item"><b>incorporated: </b> ${data.incorporated}</li>
                <li class="list-group-item"><b>lat: </b> ${data.lat}</li>
                <li class="list-group-item"><b>lng: </b> ${data.lng}</li>
                <li class="list-group-item"><b>military: </b> ${data.military}</li>
                <li class="list-group-item"><b>population: </b> ${data.population}</li>
                <li class="list-group-item"><b>ranking: </b> ${data.ranking}</li>
                <li class="list-group-item"><b>source: </b> ${data.source}</li>
                <li class="list-group-item"><b>state_id: </b> ${data.state_id}</li>
                <li class="list-group-item"><b>state_name: </b> ${data.state_name}</li>
                <li class="list-group-item"><b>timezone: </b> ${data.timezone}</li>
                <li class="list-group-item"><b>zips: </b> ${data.zips}</li>
                </ul>
                `;
                document.querySelector(".modalinfo").innerHTML = cityinfo;
                // console.log(data);
            }
        </script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}""></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}""></script>
    </body>
</html>
