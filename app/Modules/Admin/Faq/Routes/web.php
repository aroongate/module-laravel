<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'faq'], function () {
    Route::get('/', ['App\Modules\Admin\Faq\Controllers\FaqController', 'index'])->name('faqs.index');
});
