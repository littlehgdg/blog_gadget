@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kategori</h1>
            </div>
            <div class="section-body">
                @if (count($errors)>0)
                    @foreach ($errors->all() as $error )
                    <div class="alert alert-danger" role="alert">
                        {{ $error}}
                      </div>                      
                    @endforeach
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session('success')}}
                  </div>                   
                @endif

                <form  action="{{route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Update Kategori</button>
                    </div>
                </form>                
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
