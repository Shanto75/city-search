@extends('admin.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">City Info Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">City Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-6">

            @if (session()->has('massage'))
              <div class="bg-success alert alert-dismissible fade show" role="alert">
                  <h6 class="text-center text-white"><strong>{{ session()->get('massage') }}</strong>
                  </h6>
              </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  action="{{route('admin.save.city')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="city" class="custom-file-input" id="exampleInputFile" required>
                          <label class="custom-file-label" for="exampleInputFile" required>Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>

          </div>
          <!-- /.col-md-6 -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">City List</h3>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>City</th>
                  <th>City Ascii</th>
                  <th>State Id</th>
                  <th>State Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($citylist as $city)
                  <tr>
                    <td>{{$city->id}}</td>
                    <td>{{$city->city}}</td>
                    <td>{{$city->city_ascii}}</td>
                    <td>{{$city->state_id}}</td>
                    <td>{{$city->state_name}}</td>
                    <td>
                      <button id="{{$city->id}}" onclick="getcitydata(this.id)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        view
                      </button>
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>

            {!! $citylist->links() !!}

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">City Details</h5>
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
  async function getcitydata(id){
    let url = `{{url('')}}/admin/citydata/${id}`;
    try {
        let res = await fetch(url);
        let data = await res.json();
        let cityinfo = `
        <ul class="list-group">
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
        console.log(data);
    } catch (error) {
        console.log(error);
    }
  }
</script>

@endsection