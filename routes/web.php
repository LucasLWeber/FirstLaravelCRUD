<?php

use App\Livewire\SearchZipcode;
use Illuminate\Support\Facades\Route;

Route::get('/', SearchZipcode::class)->name('search-zipcode');
