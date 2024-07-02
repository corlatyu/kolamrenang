<?php

use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TicketController; // Alias untuk AdminController
use App\Http\Controllers\User\TicketController as UserTicketController; // Alias untuk UserController

Route::get('/', function () {
    return view('welcome');
});

// Route untuk registrasi dan login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/kontak/simpan', [KontakController::class, 'simpanPesan'])->name('kontak.simpan');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup route untuk pengguna (user)
Route::middleware(['auth', 'role:user'])->group(function () {
    // Route yang sudah ada
    Route::get('/user', [UserController::class, 'index'])->name('dashboard.user.index');
    Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('user.edit.profile');
    Route::post('/user/profile/edit', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::get('/user/tickets/create', [UserTicketController::class, 'create'])->name('user.tickets.create');
    Route::post('/user/tickets/store', [UserTicketController::class, 'store'])->name('user.tickets.store');
    Route::get('/user/tickets', [UserTicketController::class, 'index'])->name('user.tickets.index');
    Route::delete('/user/tickets/{id}', [UserTicketController::class, 'destroy'])->name('user.tickets.destroy');
    Route::get('/user/tickets/{id}/qr', [UserTicketController::class, 'generateQRCode'])->name('user.tickets.qr');
    Route::get('/user/tickets/{id}/receipt', [UserTicketController::class, 'showReceipt'])->name('user.tickets.receipt');
});

// Grup route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route yang sudah ada
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard.admin.index');
    Route::get('/admin/manage', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/admin/users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
    Route::resource('products', ProductController::class);
    Route::get('/admin/kontakpesan', [KontakController::class, 'index'])->name('admin.kontakpesan.index');
    // Route resource untuk ticket hanya untuk admin
    Route::resource('ticket', TicketController::class)->except(['create', 'store', 'index', 'destroy']);
    Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy'); // Custom route untuk destroy
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
    // Rute untuk menampilkan halaman kasir
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
    // Rute untuk menyimpan pembelian tiket
    Route::post('/cashier', [CashierController::class, 'store'])->name('cashier.store');
    Route::get('/cashier/print/{ticket}', [CashierController::class, 'print'])->name('cashier.print');
    // Rute untuk mengunggah bukti pembayaran (tf)
    Route::post('/cashier/upload/{id}', [CashierController::class, 'uploadBuktiPembayaran'])->name('cashier.upload');
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/admin/transactions/print/{ticket}', [TransactionController::class, 'print'])->name('admin.transactions.print');
    Route::get('/admin/transactions/view/pdf', [TransactionController::class, 'view_pdf'])->name('view.transaksi.pdf');
    Route::get('/admin/users/export', function () {
        return Excel::download(new ExportUser(), 'users.xlsx');
    })->name('admin.users.export');
    Route::get('/admin/transactions/export', [TransactionController::class, 'export'])->name('admin.transactions.export');
    Route::get('/admin/manage/view/pdf', [AdminController::class, 'view_pdfuser'])->name('view.user.pdf');
});

// Fallback route jika pengguna mencoba mengakses rute yang tidak ada
Route::fallback(function () {
    return view('errors.404');
});
