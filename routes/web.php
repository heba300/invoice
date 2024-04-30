<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Invoices\Archive;
use App\Livewire\Invoices\InvoicesList;
use App\Livewire\Invoices\PaidInvoices;
use App\Livewire\Invoices\UnpaidInvoices;
use App\Livewire\Logout;
use App\Livewire\Products\ProductsList;
use App\Livewire\Reports\Client\ClientsData;
use App\Livewire\Reports\Invoice\InvoicesData;
use App\Livewire\Sections\SectionsList;
use App\Livewire\Users\UsersList;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/invoice-list', InvoicesList::class)->name('invoice-list');
    Route::get('/paid-invoices', PaidInvoices::class)->middleware('role:admin')->name('paid-invoice');
    Route::get('/unpaid_invoices', UnpaidInvoices::class)->name('unpaid-invoice');
    Route::get('/archived-invoices', Archive::class)->middleware('role:admin')->name('archived-invoices');
    Route::get('/section-list', SectionsList::class)->name('section-list');
    Route::get('/product-list', ProductsList::class)->name('product-list');
    Route::get('/invoices-reports', InvoicesData::class)->middleware('role:admin')->name('invoices-reports');
    Route::get('clients-report', ClientsData::class)->name('client-report');
    Route::get('users-list', UsersList::class)->middleware('role:admin')->name('users-list');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
});
