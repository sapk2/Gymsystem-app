<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipregisterCcontroller;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);
Route::get('auth/google',[GoogleController::class,'redirectTOGoogle'])->name('redirect.google');
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminindex'])->name('admin.dashboard');

    /*************************************usersmanagementdashboard******************************************************************/ 
    Route::get('/admin/users',[Usercontroller::class,'index'])->name('admin.users.index');
    Route::get('/users-create',[Usercontroller::class,'create'])->name('admin.users.create');
    Route::post('/users/store',[Usercontroller::class,'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit',[Usercontroller::class,'edit'])->name('admin.users.edit');
    Route::post('/users/{id}/update',[Usercontroller::class,'update'])->name('admin.users.update');
    Route::get('/users/{id}/delete',[Usercontroller::class,'delete'])->name('admin.users.delete');

    /************************************Subscription plan****************************************************************************************** */
    Route::get('/admin/plans',[PlansController::class,'index'])->name('admin.plans.index');
    Route::get('/admin/plans-create',[PlansController::class,'create'])->name('admin.plans.create');
    Route::post('/plans//store',[PlansController::class,'store'])->name('admin.plans.store');
    Route::get('/plans/{id}/edit',[PlansController::class,'edit'])->name('admin.plans.edit');
    Route::post('/plans/{id}/update',[PlansController::class,'update'])->name('admin.plans.update');
    Route::get('/plans/{id}/delete',[PlansController::class,'delete'])->name('admin.plans.delete');

/*************************************Register MEMBER***************************************************************************************************************************************/
    Route::get('/admin/managemembers',[MembershipregisterCcontroller::class,'index'])->name('admin.managemembers.index');
    Route::get('/admin/managemembers-create',[MembershipregisterCcontroller::class,'create'])->name('admin.managemembers.create');
    Route::post('/admin/managemembers/store',[MembershipregisterCcontroller::class,'store'])->name('admin.managemembers.store');
    Route::get('/admin/managemembers/{id}/edit',[MembershipregisterCcontroller::class,'edit'])->name('admin.managemembers.edit');
    Route::get('/admin/managemembers/{id}/update',[MembershipregisterCcontroller::class,'update'])->name('admin.managemembers.update');
    Route::get('/admin/managemembers/{id}/delete',[MembershipregisterCcontroller::class,'delete'])->name('admin.managemembers.delete');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('Trainer')->group(function () {
    Route::get('/trainers/dashboard', [DashboardController::class, 'trainerindex'])->name('trainers.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware'=>['auth','member']],function(){
    Route::get('/members/dashboard',[DashboardController::class,'memberindex'])->name('members.dashboard');
});

require __DIR__.'/auth.php';
