@extends('layouts.admin')
@section('title', 'Authors')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-11">
                    <h2 class="mb-2 page-title">@yield('title')</h2>
                </div>
                <div class="col-0">
                    <a href="{{route('authors.create')}}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <input type="text" hidden>
                            <!-- table -->
                            <table class="table datatables" id="author-table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Alamat</th>
                                        <th>Total Published News</th>
                                        <th>Terakhir diubah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $author)
                                    <input type="hidden" value="@php
                                                $count = 0;
                                            @endphp
                                            @foreach($author->news as $an)
                                                @if($an->is_published == 1)
                                                    {{ $count++ }}
                                                @endif
                                            @endforeach">
                                    
                                    
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td><a href="{{ $author->picture }}" target="_blank">Lihat Gambar</a></td>
                                        <td>{{ $author->address }}</td>
                                        <td>
                                            @php
                                                echo $count;
                                            @endphp
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($author->updated_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('authors.edit', [$author->id]) }}" class="btn btn-warning float-left m-1">Edit</a>
                                            <form class="float-left m-1" action="{{ route('authors.destroy', [$author->id]) }}" method="POST">
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
    $('#author-table').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
</script>
@endpush