<?php

use App\Http\Livewire\Animals\AnimalsIndex;
use App\Http\Livewire\Animals\AnimalsShow;
use App\Http\Livewire\Barns\BarnsIndex;
use App\Http\Livewire\Barns\BarnsShow;
use App\Http\Livewire\Inseminations\InseminationsIndex;
use Illuminate\Support\Facades\Route;

// Animals
Route::get('/animals', AnimalsIndex::class)->name('animals.index');
Route::get('/animals-show/{animal}', AnimalsShow::class)->name('animals.show');

// Inseminations
Route::get('/inseminations', InseminationsIndex::class)->name('inseminations.index');

// Barns
Route::get('/barns', BarnsIndex::class)->name('barns.index');
Route::get('/barns-show/{barn}', BarnsShow::class)->name('barns.show');


