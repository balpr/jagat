<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JagatPlay KW | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/mode.css')}}">
    @stack('css')
    <link rel="icon" type="image/png" href="{{secure_asset('img/favicon-32x32.png')}}">
</head>

<body>
    <nav>
        <ul>
            <li><a href="#">Jagat Play</a></li>
            <li class="nav-link {{Request::is('/') ? 'nav-active' : ''}}">
                <a href="{{route('dashboard.index')}}">Home</a>
            </li>
            <li class="nav-link {{Request::is('modul/profil') ? 'nav-active' : ''}}">
                <a href="{{route('profile.index')}}">Profil</a>
            </li>
            <li class="nav-link {{Request::is('modul/listapp') ? 'nav-active' : ''}}">
                <a href="{{route('listapps.index')}}">List app</a>
            </li>
        </ul>
    </nav>
    <section>
        <div class="sb-left">
            <ul>
                <li><a href="#">PC</a></li>
                <li><a href="#">PlayStation</a></li>
                <li><a href="#">Nintendo</a></li>
                <li><a href="#">Gaming Gear</a></li>
                <li><a href="#">Top List</a></li>
                <li>
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" name="">
                            <div class="slider round"></div>
                        </label>
                        <em style="color: white;margin-left: 10px"> Enable Dark Mode!</em>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sb-mid">
            @yield('content')
        </div>
        <div class="sb-right">
            <ul>
                <li><input class="cari" type="text" name="cari"><button class="btn-cari">cari</button></li>
                <li>
                    <div style="height: 10px;width: 52px;background-color: white;float: left;margin-right: 20px;margin-top: 10px"></div>
                    <a style="font-size: 24px">Popular</a>
                    <div style="height: 10px;width: 52px;background-color: white;float: right;margin-top: 10px"></div>
                </li>
                <li class="hv"><a href="#isi1" class="pt">Gamer Genshin Impact Mobile Habiskan Uang Paling Banyak untuk Gacha Zhong Li!</a></li>
                <li class="hv"><a href="#isi2" class="pt">Epic Games Store Dituduh “Makan” Baterai Laptop</a></li>
                <li class="hv"><a href="#isi3" class="pt">Pemilik TikTok Gelontorkan 57 Triliun Rupiah untuk Beli Dev. Mobile Legends!</a></li>
                <li class="hv"><a href="#isi4" class="pt">Ikumi Nakamura Bangun Studio Dev. Indie Baru</a></li>
                <li class="hv"><a href="#isi5" class="pt">Nintendo Switch Pro Akan Dukung DLSS</a></li>
            </ul>
        </div>
    </section>
    <footer>
        <h4 style="text-align: center;">&copy;2021</h4>
    </footer>
</body>
<script src="{{secure_asset('js/mode.js')}}"></script>
@stack('script')

</html>