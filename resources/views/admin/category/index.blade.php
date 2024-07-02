@extends('layouts.app')

@section('title', 'Kategori')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori</h1>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session('success')}}
                  </div>                   
            @endif

            <a href="{{route('category.create')}}" class="btn btn-info btn-sm">Tambah Kategori</a>
            <br></br>
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr> 
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($category as $result => $hasil)
                            <tr>                             
                                <td>{{$result + $category->firstitem()}}</td>
                                <td>{{$hasil->name}}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $hasil->id )}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('category.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>   
                                </td>      
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                    {{ $category->links() }}
            <div class="section-body"> </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
