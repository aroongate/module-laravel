<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

$modules = config('modular.modules');
$path = config('modular.path');
$base_namespace = config('modular.base_namespace');

if ($modules) {
    foreach ($modules as $mod => $submodules) {
        foreach ($submodules as $key => $sub) {
            if (is_string($key)) {
                $sub = $key;
            }

            $relativePath = '/' . $mod . '/' . $sub;
            $routesPath = $path . $relativePath . '/Routes/web.php';

            if (file_exists($routesPath)) {
                Route::namespace("Modules\\$mod\\$sub\Controllers")->group($routesPath);
            }
        }
    }
}
