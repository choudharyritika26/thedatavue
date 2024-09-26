
@extends('admin.layout.app')

@section('style')
@endsection

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-top: 20px">Add Portfolio</h1>
      <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('portfolio-index')}}">Back</a></h1></span>
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
              <h5 class="card-title">Portfolio Form</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('store-portfolio')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="heading" class="form-label">Heading</label>
                  <input type="text" class="form-control" name="heading" id="heading">
                  {{-- @if ($errors->has('heading'))
                  <span class="text-danger">{{$errors->first('heading')}}</span>
                  @endif --}}
                </div>

                <div class="form-group">
                  <label for="comment">Description</label>
                  <textarea class="form-control" id="comment" name="description" rows="3"></textarea>
                  {{-- @if ($errors->has('description'))
                      <span class="text-danger">{{$errors->first('description')}}</span>
                      @endif --}}
              </div>
                <div class="col-12">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image" id="image">
                  @if ($errors->has('image'))
                  <span class="text-danger">{{$errors->first('image')}}</span>
                  @endif
                </div>

                <div class="card-action">
                  <button class="btn btn-success"
                      href="{{route('portfolio-index')}}">Submit</button>
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