@extends('layouts.admin')
@section('title', 'Edit Author')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">@yield('title')</h2>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Form controls</strong>
                </div>
                <form action="{{ route('authors.update', [$author->id]) }}" enctype="multipart/form-data" method="POST">
                    @CSRF
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $author->name }}">
                                    <small class="text-danger">@error('name') {{$message}}
                                        @enderror</small>
                                </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="customFile">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture" value="{{ $author->picture }}">
                                        <label class="custom-file-label" for="picture">{{ $author->picture }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" name="address" id="address" rows="2">{{ $author->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('authors.index')}}" class="m-1 btn btn-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection