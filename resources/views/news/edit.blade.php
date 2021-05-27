@extends('layouts.admin')
@section('title', 'Edit News')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">@yield('title')</h2>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Form controls</strong>
                </div>
                <form action="{{route('news.update', [$news->id])}}" enctype="multipart/form-data" method="POST">
                    @CSRF
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
                                    <small class="text-danger">@error('title') {{$message}}
                                        @enderror</small>
                                </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="customFile">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture" value="{{ $news->picture }}">
                                        <label class="custom-file-label" for="picture">{{ $news->picture }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="is_published" value="1" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Is Published</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" rows="4">{{ $news->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('news.index')}}" class="m-1 btn btn-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection