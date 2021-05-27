@extends('layouts.modul')
@section('title', 'ListApp')
@section('content')
<div class="wrapper">
	<header style="color: white">List App</header>
	<div class="inputField">
		<form action="#">
			<input type="text" placeholder="Tambahkan daftar" required />
		</form>
		<button>Add</button>
	</div>
	<ul class="todoList">

	</ul>
	<div class="info" style="color: white;font-weight: bold">
		<span>Total: <span class="total"></span> Data</span>
		<button>Hapus semua</button>
	</div>
</div>

@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/list.css')}}">
@endpush
@push('script')
<script src="{{asset('js/list.js')}}"></script>
@endpush