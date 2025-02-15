<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipregisterCcontroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\TrainerProfileController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainerScheduleController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserProfileController;
use App\Models\Footer;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'] )->name('welcome');

Route::get('/aboutus',[HomeController::class,'aboutus'])->name('partials.about');
Route::get('/herofeature',[Homecontroller::class,'herofeature'])->name('partials.hero');

Route::get('/subscription',[HomeController::class,'index'])->name('partials.subscription');

Route::get('/contact', [HomeController::class, 'contact'])->name('partials.contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/footer',[HomeController::class,'footer']);






/*****************************************************google auth *********************************************************/
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/google', [GoogleController::class, 'redirectTOGoogle'])->name('redirect.google');

/*****************************Admin panel ******************************************************************************************** */
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminindex'])->name('admin.dashboard');

    /*************************************usersmanagementdashboard******************************************************************/
    Route::get('/admin/users', [Usercontroller::class, 'index'])->name('admin.users.index');
    Route::get('/users-create', [Usercontroller::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [Usercontroller::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [Usercontroller::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}/update', [Usercontroller::class, 'update'])->name('admin.users.update');
    Route::get('/users/{id}/delete', [Usercontroller::class, 'delete'])->name('admin.users.delete');

    /************************************Subscription plan****************************************************************************************** */
    Route::get('/admin/plans', [PlansController::class, 'index'])->name('admin.plans.index');
    Route::get('/admin/plans-create', [PlansController::class, 'create'])->name('admin.plans.create');
    Route::post('/plans//store', [PlansController::class, 'store'])->name('admin.plans.store');
    Route::get('/plans/{id}/edit', [PlansController::class, 'edit'])->name('admin.plans.edit');
    Route::post('/plans/{id}/update', [PlansController::class, 'update'])->name('admin.plans.update');
    Route::get('/plans/{id}/delete', [PlansController::class, 'delete'])->name('admin.plans.delete');

    /*************************************Register MEMBER***************************************************************************************************************************************/
    Route::get('/admin/managemembers', [MembershipregisterCcontroller::class, 'index'])->name('admin.managemembers.index');
    Route::get('/admin/managemembers-create', [MembershipregisterCcontroller::class, 'create'])->name('admin.managemembers.create');
    Route::post('/admin/managemembers/store', [MembershipregisterCcontroller::class, 'store'])->name('admin.managemembers.store');
    Route::get('/admin/managemembers/{id}/edit', [MembershipregisterCcontroller::class, 'edit'])->name('admin.managemembers.edit');
    Route::post('/admin/managemembers/{id}/update', [MembershipregisterCcontroller::class, 'update'])->name('admin.managemembers.update');
    Route::get('/admin/managemembers/{id}/delete', [MembershipregisterCcontroller::class, 'delete'])->name('admin.managemembers.delete');
    Route::get('/admin/managemembers/{id}/show', [MembershipregisterCcontroller::class, 'show'])->name('admin.managemembers.show');

    /*************************************Manage trainer****************************************************************************************************************************************** */
    Route::get('/admin/managetrainers', [TrainerController::class, 'index'])->name('admin.managetrainers.index');
    Route::get('/managetrainers-create', [TrainerController::class, 'create'])->name('admin.managetrainers.create');
    Route::post('/managetrainers/store', [TrainerController::class, 'store'])->name('admin.managetrainers.store');
    Route::get('managetrainers/{id}/edit', [TrainerController::class, 'edit'])->name('admin.managetrainers.edit');
    Route::post('/managetrainers/{id}/update', [TrainerController::class, 'update'])->name('admin.managetrainers.update');
    Route::get('/managetrainers/{id}/delete', [TrainerController::class, 'delete'])->name('admin.managetrainers.delete');

    /****************************************routines manage****************************************************************************************** */
    Route::get('/admin/routines', [RoutineController::class, 'index'])->name('admin.routines.index');
    Route::get('/routines-create', [RoutineController::class, 'create'])->name('admin.routines.create');
    Route::post('routines/store', [RoutineController::class, 'store'])->name('admin.routines.store');
    Route::get('/routines/{id}/edit', [RoutineController::class, 'edit'])->name('admin.routines.edit');
    Route::get('/routines/{id}/show', [RoutineController::class, 'show'])->name('admin.routines.show');
    Route::post('/routines/{id}/update', [RoutineController::class, 'update'])->name('admin.routines.update');
    Route::get('/routines/{id}/delete', [RoutineController::class, 'delete'])->name('admin.routines.delete');

    /*********************************************Manage Attendance****************************************************************************** */
    Route::get('/admin/attendance', [AttendenceController::class, 'index'])->name('admin.attendances.index');
    Route::get('/attendances-create', [AttendenceController::class, 'create'])->name('admin.attendances.create');
    Route::post('/attendances/store', [AttendenceController::class, 'store'])->name('admin.attendances.store');
    Route::get('/attendances/{id}/edit', [AttendenceController::class, 'edit'])->name('admin.attendances.edit');
    Route::post('/attendances/{id}/update', [AttendenceController::class, 'update'])->name('admin.attendances.update');
    Route::get('/attendances/{id}/delete', [AttendenceController::class, 'delete'])->name('admin.attendances.delete');

    /**********************************************Health status****************************************************************************************************************/

    Route::get('/admin/health', [HealthController::class, 'index'])->name('admin.healthstatus.index');
    Route::get('/health-create', [HealthController::class, 'create'])->name('admin.healthstatus.create');
    Route::post('/health/store', [HealthController::class, 'store'])->name('admin.healthstatus.store');
    Route::get('/health/{id}/edit', [HealthController::class, 'edit'])->name('admin.healthstatus.edit');
    Route::post('/health/{id}/update', [HealthController::class, 'update'])->name('admin.healthstatus.update');
    Route::get('/health/{id}/delete', [HealthController::class, 'delete'])->name('admin.healthstatus.delete');
    Route::get('/health/{id}/show', [HealthController::class, 'show'])->name('admin.healthstatus.show');

    /***********************************************Payment Management******************************************************************************************************************************************** */
    Route::get('admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments-create', [PaymentController::class, 'create'])->name('admin.payments.create');
    Route::post('/payments/store', [PaymentController::class, 'store'])->name('admin.payments.store');
    Route::get('payments/{id}/show', [PaymentController::class, 'show'])->name('admin.payments.show');
    Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('admin.payments.edit');
    Route::post('/payments/{id}/update', [PaymentController::class, 'update'])->name('admin.payments.update');
    Route::get('/payments/{id}/delete', [PaymentController::class, 'delete'])->name('admin.payments.delete');


    /*************************Aboutus********************************** */
    Route::get('/admin/about',[AboutUsController::class,'index'])->name('admin.aboutus.index');
    Route::post('/admin/about',[AboutUsController::class,'update'])->name('admin.aboutus.update');

   /******************************footer ************************************************************************************ */
    Route::get('/admin/footer',[FooterController::class,'index'])->name('admin.footer.index');
    Route::post('/admin/footer',[FooterController::class,'update'])->name('admin.footer.update');
    /*******************************contact -message******************************************************************************* */
    Route::get('/admin/contact', [ContactController::class, 'show'])->name('admin.contacts.index');
    Route::get('/admin/contact/{id}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
    Route::get('/admin/contact/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::post('/admin/contact/send',[ContactController::class,'sendreply'])->name('admin.contacts.reply.send');
    /********************************************fronted  **********************************************************************************************/
    Route::get('/admin/herofeature',[FrontedController::class,'index'])->name('admin.herofeature.index');
    Route::post('/admin/herofeature',[FrontedController::class,'update'])->name('admin.herofeature.update');
    /*************************************Adminprofile************************************************************************************************ */
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});





Route::middleware('Trainer')->group(function () {
    Route::get('/trainers/dashboard', [DashboardController::class, 'trainerindex'])->name('trainers.dashboard');

    /************************************************ Trainer-schedule ************************************************************************************************************* */
    Route::get('/trainers/rouitnes', [TrainerScheduleController::class, 'index'])->name('trainers.routines.index');
    Route::post('/trainers/routines/store', [TrainerScheduleController::class, 'store'])->name('trainers.routines.store');
    Route::get('/trainers/{id}/edit', [TrainerScheduleController::class, 'edit'])->name('trainers.routines.edit');
    Route::post('/trainers/{id}/update', [TrainerScheduleController::class, 'update'])->name('trainers.routines.update');
    Route::get('/trainers/{id}/delete', [TrainerScheduleController::class, 'delete'])->name('trainers.routines.delete');

    Route::get('/trainers/membership', [TrainerController::class, 'trainershow'])->name('trainers.membership.index');
    Route::get('/trainers/memberhealth', [HealthController::class, 'memberhealth'])->name('trainers.memberhealth');



    Route::get('/trainers/profile', [TrainerProfileController::class, 'edit'])->name('trainers.profile.edit');
    Route::post('/trainers/profile', [TrainerProfileController::class, 'update'])->name('trainers.profile.update');
    Route::delete('/trainers/profile', [TrainerProfileController::class, 'destroy'])->name('trainers.profile.destroy');
});

Route::group(['middleware' => ['auth', 'member']], function () {
    Route::get('/members/dashboard', [DashboardController::class, 'memberindex'])->name('members.dashboard');

    
    Route::get('/members/payments', [UserPaymentController::class, 'index'])->name('members.payments.index');
    Route::get('/members/payments-create', [UserPaymentController::class, 'create'])->name('members.payments.create');
    Route::post('/members/payments/store', [UserPaymentController::class, 'store'])->name('members.payments.store');
 //   Route::get('/members/payments/verify', [UserPaymentController::class, 'verify']) ->name('members.payments.verify');
    Route::post('/payments/initiate', [UserPaymentController::class, 'initiate'])->name('members.payment.initiate');
    Route::get('/payments/success', [UserPaymentController::class, 'verify'])->name('members.payment.success');

    Route::get('/members/profile', [UserProfileController::class, 'edit'])->name('members.profile.edit');
    Route::post('/members/profile', [UserProfileController::class, 'update'])->name('members.profile.update');
    Route::delete('/members/profile', [UserProfileController::class, 'destroy'])->name('members.profile.destroy');

    Route::get('/member/memberindex', [RoutineController::class, 'memberindex'])->name('members.routine.memberindex');
    Route::get('/member/subscribedplan', [PlansController::class, 'memberplan'])->name('members.subscribedplan');
});

require __DIR__ . '/auth.php';
