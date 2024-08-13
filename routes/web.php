<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('contacts');
});

// Route::post('contacts?search=1', [ContactController::class, 'search'])->name('contacts.search');

Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');

Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Route::put('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
