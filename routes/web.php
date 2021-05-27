<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Author;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\ModulController@index')->name('dashboard.index');
Route::get('/modul', 'App\Http\Controllers\ModulController@index');
Route::get('modul/profil', function () {
    return view('profile.index');
})->name('profile.index');
Route::get('modul/listapp', function () {
    return view('listapps.index');
})->name('listapps.index');

Route::get('admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::resource('admin/news', NewsController::class);
Route::resource('admin/authors', AuthorController::class);

Route::get('/attach', function () {
    $author = Author::find(10);
    $author->news()->attach([9,10,11]);

    return 'success';
});

// Route::get('/ceka', function () {
//     $author = Author::find(7);
//     $counter =0;
//     foreach($author->news as $an){
//         if($an->is_published = 1){
//             $counter++;
//         }
//     }
//     echo $counter;
// });

// Route::get('/cekn', function () {
//     $news = News::find(3);
//     foreach($news->authors as $a){
//         echo $a;
//     }
// });