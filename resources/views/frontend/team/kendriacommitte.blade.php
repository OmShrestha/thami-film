
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
<div class="container my-5">
      <!-- <small class="text-danger fw-semibold">Central Secretariat</small> -->
      <h3 class="text-center fw-semibold mb-4" style="color: #1e88e5;">केन्द्रीय कमिटि</h3>

      <div class="d-flex flex-column align-items-center">
        <!-- First row: Single member in the center -->
        @foreach($teams->take(2) as $team)
        <div class="row row-member justify-content-center mb-4">
          <div class="col-auto text-center">
            <div class="card col-card">
              <img
                src="{{asset('assets/frontend/images/teams/'.$team->image)}}"
                class="img-fluid member"
                alt="Chairman"
              />
              <h4 class="mt-2 h5 fw-semibold text-white">{{$team->name}}</h4>
              <p class="m-0 fw-semibold">{{$team->position}}</p>
              <p class="m-0 text-md-center py-1">{{$team->address}}</p>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Second row: Four members -->
        <div class="row row-member">
        @foreach($teams->skip(2) as $team)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3">
            <div class="card col-card">
            <img
                src="{{asset('assets/frontend/images/teams/'.$team->image)}}"
                class="img-fluid member"
                alt="Chairman"
              />
              <h4 class="mt-2 h5 fw-semibold text-white">{{$team->name}}</h4>
              <p class="m-0 fw-semibold">{{$team->position}}</p>
              <p class="m-0 text-md-center py-1">{{$team->address}}</p>
            </div>
          </div>
          @endforeach

        </div>
    </div>
</div>
@endsection