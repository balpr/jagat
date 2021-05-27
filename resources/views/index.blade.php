@extends('layouts.modul')
@section('title', 'Home')
@section('content')
<ul>
	@foreach($news as $news)
	<li>
		<h2 id="isi{{ $loop->iteration }}">{{ $news->title }}</h2>
		<hr>
		<div style="height: 60px;">
			<div style="padding: 10px;float: left;width: 400px">
				@foreach($news->authors as $a)
				<img src="{{ $a->picture }}" style="height: 40px;width: 40px;float: left;border-radius: 50%; margin-right: 10px">
				<h5>Author</h5>
				<h3> {{ $a->name }} </h3>
				@endforeach
			</div>
			<div style="padding: 10px;">
				<h5>Tanggal</h5>
				<h3>{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('dddd, D MMM Y') }}</h3>
			</div>
		</div>
		<hr>
		<div>
			<img src="{{ $news->picture }}" style="max-width: 100%;height: auto">
			<div style="padding: 40px">
				<p>{{$news->content}}</p>
			</div>
			<hr>
		</div>
	</li>
	@endforeach
</ul>
@endsection