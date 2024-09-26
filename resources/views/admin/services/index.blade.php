@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Services Tables</h1>
            <span>
                <h1 style="margin-top:-30px; margin-left:750px;"><a href="{{ route('add-services') }}">Add Services</a></h1>
            </span>
            {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav> --}}
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{!! html_entity_decode($item->description) !!}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                    class="img-fluid" style="width: 200px; height:150px;">
                                            </td>
                                            
                                            <td>
                                                <a href="{{ route('edit-services', $item->id) }}"> <i class="fa fa-edit"
                                                        style="font-size:30px"></i></a>
                                                <br>
                                                {{-- <a href="{{ route('delete-services', $item->id) }}" 
                                    class="btn btn-danger btn-sm">Delete</a> --}}
                                                {{-- <a href="{{ route('destroy-services', $item->id) }}"> <i
                                        class="fa fa-trash-o" style="font-size:30px"></i>
                                        
                                    </a> --}}
                                                <form action="{{ route('destroy-services', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    @method('delete')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="fa fa-trash-o text-danger"
                                                        style="font-size:25px"></button>
                                                </form>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('script')
@endsection
