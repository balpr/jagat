@extends('layouts.admin')
@section('title', 'News')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-11">
                    <h2 class="mb-2 page-title">@yield('title')</h2>
                </div>
                <div class="col-0">
                    <a href="{{route('news.create')}}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            <table class="table datatables" id="news-table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Konten</th>
                                        <th>Published</th>
                                        <th>Author</th>
                                        <th>Dibuat pada</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $news)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $news->title }}</td>
                                        <td><a href="{{ $news->picture }}" target="_blank">Lihat gambar</a></td>
                                        <td>{{ $news->content }}</td>
                                        <td>
                                            @if($news->is_published == 1)
                                            <a class="btn btn-sm btn-success" style="pointer-events: none;">Published</a>
                                            @else
                                            <a class="btn btn-sm btn-danger" style="pointer-events: none;">Not Published</a>
                                            @endif
                                        </td>
                                        <td>@foreach($news->authors as $a) {{$a->name}} @endforeach</td>
                                        <td>{{ $news->created_at }}</td>
                                        <td>
                                            <a href="{{ route('news.edit', [$news->id]) }}" class="btn btn-warning float-left m-1">Edit</a>
                                            <form class="float-left m-1" action="{{ route('news.destroy', [$news->id]) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- simple table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
@push('css')
<link rel="stylesheet" href="{{secure_asset('css/dataTables.bootstrap4.css')}}">
@endpush
@push('script')
<script src="{{secure_asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{secure_asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $('#news-table').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
</script>
@endpush