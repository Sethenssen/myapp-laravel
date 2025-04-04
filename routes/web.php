<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function (Request $request) {
  return [
    #"name" => $_GET['name'],
    #"path" => $request->path(),
    #"url" => $request->url(),
    #"all" => $request->all(),
    "nom" => $request->input('name', 'John Doe'),
    "article" => "Article 1"
  ];
});

Route::get('/blog/{slug}-{id}', function (string $slug, string $id, Request $request) {
  return [
    "slug" => $slug,
    "id" => $id,
    "name" => $request->input('name')
  ];
})->where([
  "id" => "[0-9]+",
  "slug" => "[a-zA-Z0-9\-]+"
]);
