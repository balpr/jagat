@extends('layouts.modul')
@section('title', 'Profile')
@section('content')
<div style="padding: 48px;">
	<h2 style="font-weight: bold;">Profil</h2>
	<div style="height: 400px; width: 700px; border-radius: 10px; background-color: #293a4b; ">
		<div style="padding: 50px; color: white;">
			<img src="{{asset('img/profil.jpg')}}" style="height: auto; width: 200px; float: left; margin-right: 20px; border-radius: 10px">
			<div style="background-color: white; margin-left: 240px; border-radius: 10px">
				<table style="font-size: 16px; color: #293a4b; font-weight: bold;padding: 30px">
					<tr>
						<td>Nama</td>
						<td>: Achmad Iqbal Priranda</td>
					</tr>
					<tr>
						<td>NIM</td>
						<td>: 201910370311272</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: iqbalp@webmail.umm.ac.id</td>
					</tr>
					<tr>
						<td>Telp</td>
						<td>: 089692222843</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection