<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Core\ModuleController;
use App\Http\Controllers\Core\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Account\SigninController;
use App\Http\Controllers\Account\SignupController;
use App\Http\Controllers\Account\SignoutController;
use App\Http\Controllers\Account\TenantController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Account\RoleController;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Fursa\ApplicantController;
use App\Http\Controllers\Fursa\CompanyController;
use App\Http\Controllers\Fursa\DepertmentController;
use App\Http\Controllers\Fursa\JobApplcationController;
use App\Http\Controllers\Fursa\JobController;
use App\Http\Controllers\Fursa\JobPostingController;
use App\Http\Controllers\Fursa\JobStageController;
use App\Http\Controllers\Fursa\SignUpUsUserController;
use App\Http\Controllers\Fursa\SingUpCompanyController;
use App\Http\Controllers\Fursa\WorkFlowController;

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

Route::get('/',[HomeController::class, 'show'])->name('home.front');
//
Route::get('/signin', [SigninController::class, 'view'])->name('account.front.signin');
Route::post('/signin', [SigninController::class, 'authenticate'])->name('account.front.signin.submit');
//
Route::get('/signup', [SignupController::class, 'view'])->name('account.front.signup');
Route::get('/signup/company', [SignupController::class, 'views'])->name('account.front.signup.company');
//
Route::get('sign/create',[SingUpCompanyController::class,'view'])->name('companySignUp.view');
Route::post('sign/store',[SingUpCompanyController::class,'store'])->name('companySignUp.store');
//
Route::get('/signAsUser',[SignUpUsUserController::class,'index'])->name('signAsUser.index');
Route::post('/signAsUser/store',[SignUpUsUserController::class,'store'])->name('signAsUser.store');
//
Route::post('/signup', [SignupController::class, 'store']);



Route::get('/jobPost',function(){
    return view('front.jobPosting');
})->name('JonPosting');
//
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/platform/dashboard', [DashboardController::class, 'dashboardPlatform'])->name('dashboard.platform');
    Route::get('/platform/tenant', [DashboardController::class, 'dashboardTanant'])->name('dashboard.tenant');
    //
    Route::post('/signout', [SignoutController::class, 'signout'])->name('account.back.signout');
//
    Route::post('/upload',[HomeController::class,'upload'])->name('cheditor.upload');
//
    Route::get('/platform/account/tenants', [TenantController::class, 'index'])->name('account.back.tenants.index');
    Route::get('/platform/account/tenants/create', [TenantController::class, 'create'])->name('account.back.tenants.create');
    Route::post('/platform/account/tenants/store', [TenantController::class, 'store'])->name('account.back.tenants.store');
    Route::get('/platform/account/tenants/{id}/edit', [TenantController::class, 'edit'])->name('account.back.tenants.edit');
    Route::get('/platform/account/tenants/{id}/view', [TenantController::class, 'view'])->name('account.back.tenants.view');
    Route::get('/platform/account/tenants/{id}/delete', [TenantController::class, 'delete'])->name('account.back.tenants.delete');
    //
    Route::get('/platform/account/users', [UserController::class, 'index'])->name('account.back.users.index');
    Route::get('/platform/account/users/create', [UserController::class, 'create'])->name('account.back.users.create');
    Route::post('/platform/account/users/store', [UserController::class, 'store'])->name('account.back.users.store');
    Route::get('/platform/account/users/{id}/edit', [UserController::class, 'edit'])->name('account.back.users.edit');
    Route::get('/platform/account/users/{id}/view', [UserController::class, 'view'])->name('account.back.users.view');
    Route::get('/platform/account/users/{id}/delete', [UserController::class, 'delete'])->name('account.back.users.delete');
    //
    Route::get('/platform/account/roles', [RoleController::class, 'index'])->name('account.back.roles.index');
    Route::get('/platform/account/roles/create', [RoleController::class, 'create'])->name('account.back.roles.create');
    Route::post('/platform/account/roles/store', [RoleController::class, 'store'])->name('account.back.roles.store');
    Route::get('/platform/account/roles/{role}/edit', [RoleController::class, 'edit'])->name('account.back.roles.edit');
    Route::put('/platform/account/roles/{role}/update', [RoleController::class, 'update'])->name('account.back.roles.update');
    Route::get('/platform/account/roles/{role}/show', [RoleController::class, 'show'])->name('account.back.roles.show');
    Route::get('/platform/account/roles/{role}/delete', [RoleController::class, 'delete'])->name('account.back.roles.delete');
    Route::delete('/platform/account/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('account.back.roles.destroy');
    //

    Route::get('/depertment/{id}/delete', 'App\Http\Controllers\Fursa\DepertmentController@delete')->name('depertment.delete');
    Route::resource('/depertment', DepertmentController::class);
    //
    Route::resource('/tenant', CompanyController::class);
    // Route::resource('/tenant/reject', CompanyController::class);
    // Route::get('/tenant/{id}/delete', 'App\Http\Controllers\Fursa\CompanyController@delete')->name('tenant.delete');
    // Route::get('/acceptted',[CompanyController::class,'accepted'])->name('tenant.acceptted');
    // Route::get('/reject',[CompanyController::class,'reject'])->name('tenant.reject');

    Route::get('/companiesJob/{id}/delete', 'App\Http\Controllers\Fursa\JobController@delete')->name('companiesJob.delete');
    Route::resource('companiesJob', JobController::class);

    //
    Route::post('compaines/Application',[JobApplcationController::class,'store'])->name('Appliction.store');
    Route::get('compaines/Application',[JobApplcationController::class,'index'])->name('Appliction.index');
    Route::get('compaines/Application/{id}',[JobApplcationController::class,'show'])->name('Appliction.show');
    Route::get('compaines/Application/{id}/edit',[JobApplcationController::class,'edit'])->name('Appliction.edit');
    Route::put('compaines/Application/{id}/update',[JobApplcationController::class,'update'])->name('Appliction.update');
    //
    // 
    Route::post('compaines/Applicant/store',[ApplicantController::class,'store'])->name('Applicant.store');
    Route::get('compaines/Applicant',[ApplicantController::class,'index'])->name('Applicant.index');
    Route::get('compaines/Applicant/{id}',[ApplicantController::class,'show'])->name('Applicant.show');
    
    //
    // Route::get('compaines/Vacancy',[]);
    Route::get('compaines/jobStage',[JobStageController::class,'index'])->name('jobStage.index');
    Route::get('compaines/jobStage/create',[JobStageController::class,'create'])->name('jobStage.create');
    Route::post('compaines/jobStage/store',[JobStageController::class,'store'])->name('jobStage.store');

    //
    Route::get('compaines/wrokflow',[WorkFlowController::class,'index'])->name('wrokflow.index');
    Route::get('compaines/wrokflow/{id}',[WorkFlowController::class,'show'])->name('wrokflow.show');
    Route::put('compaines/wrokflow/update',[WorkFlowController::class,'update'])->name('wrokflow.update');

    //
    Route::get('user/view',[SignUpUsUserController::class,'view'])->name('user.jobApplied');
    
});
Route::get('compaines/jobPoting',[JobPostingController::class,'index'])->name('jobPoting.index');
Route::get('compaines/jobPoting/{id}',[JobPostingController::class,'show'])->name('jobPoting.show');
Route::get('compaines/jobPApplicant/{id}',[JobPostingController::class,'create'])->name('jobPoting.create');
