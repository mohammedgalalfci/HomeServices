<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\ServiceDetailsComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminServiceCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategory;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminServicesByCategory;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminEditService;

use App\Http\Livewire\Sprovider\SproviderDashboardComponent;

use App\Http\Livewire\Customer\CustomerDashboardComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{slug}',ServiceDetailsComponent::class)->name('home.service_details');
// ->name('home.service_categories');
/** Route Customer */
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});

/** Route Sproviser */
Route::middleware(['auth:sanctum', 'verified','authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

/** Route Admin */
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories',AdminServiceCategoriesComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-categories/add',AdminAddServiceCategory::class)->name('admin.add_service_categories');
    Route::get('/admin/service-categories/edit/{id}',AdminEditServiceCategory::class)->name('admin.edit_service_categories');
    Route::get('/admin/all-services',AdminServicesComponent::class)->name('admin.services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategory::class)->name('admin.services_by_category');
    Route::get('/admin/service/add',AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{slug}',AdminEditService::class)->name('admin.edit_service');

});
