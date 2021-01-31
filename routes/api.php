<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('tasks')->group(function () {
        Route::get('/', 'TodoListController@list')->name('tasks.list');
        Route::get('{id}', 'TodoListController@task')->name('tasks.task');
        Route::post('create', 'TodoListController@create')->name('tasks.create');
        Route::put('update/{id}', 'TodoListController@update')->name('tasks.update');
        Route::delete('delete/{id}', 'TodoListController@delete')->name('tasks.delete');
    });

});
