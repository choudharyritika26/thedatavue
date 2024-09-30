
@extends('admin.layout.app')

@section('style')
@endsection

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-top: 20px">Add Contact Us</h1>
      <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('contactus-index')}}">Back</a></h1></span>
      {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav> --}}
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          @if ($message = Session::get('Success'))
          <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
      @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contactus Form</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('store-contactus')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id="address">
                  @if ($errors->has('address'))
                  <span class="text-danger">{{$errors->first('address')}}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="comment">Email Id</label>
                  <input type="email" class="form-control" name="email_id" id="email">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
                
              </div>
                <div class="col-12">
                  <label for="phone" class="form-label">Phone No.</label>
                  <input type="text" class="form-control" name="phone_no" id="phone">
                  @if ($errors->has('phone'))
                  <span class="text-danger">{{$errors->first('phone')}}</span>
                  @endif
                </div>

                <div class="card-action">
                  <button class="btn btn-success"
                      href="{{route('contactus-index')}}">Submit</button>
                  {{-- <button class="btn btn-danger">Cancel</button> --}}
              </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection

  @section('script')
  @endsection