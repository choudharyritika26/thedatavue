@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Edit Team</h1>
            <span>
                <h1 style="margin-top:-30px; margin-left:800px;"><a href="{{ route('team-index') }}">Back</a></h1>
            </span>
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
                            <h5 class="card-title">Team Form</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-team',$team->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="heading" class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading"
                                        value="{{ $team->heading }}"id="heading">
                                </div>

                                <div class="col-12">
                                    <label for="post" class="form-label">Post</label>
                                    <input type="text" class="form-control" name="post"
                                        value="{{ $team->post }}"id="post">
                                </div>

                                <div class="col-12">

                                    <label for="image" class="form-label">Image</label>
                                    <img src="{{ asset('storage/' . $team->image) }}" alt="" class="img-fluid mb-3"
                                        style="width: 200px;height:150px;">
                                    <input type="file" class="form-control" name="image" value="{{ $team->image }}"
                                        id="image">
                                </div>

                                <div class="card-action">
                                    <button class="btn btn-success" href="{{ route('team-index') }}">Submit</button>
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
