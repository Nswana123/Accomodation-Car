<?php

use App\Http\Controllers\ProfileController;
use App\Models\user_group;
use App\Models\permissions;
use App\Models\role_permissions;
use App\Models\User;
use App\Models\UnitSuite;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AccommodationProviderController;
use App\Http\Controllers\UnitSuiteController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\UnitTypeController;
use App\Http\Controllers\BookingController;
use App\Models\AccommodationProvider;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\SuiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $providers = AccommodationProvider::with(['images', 'unitType.units'])
    ->whereIn('type', ['Hotel', 'Apartment', 'Lodge', 'Boarding House'])
    ->orderByDesc('id') // or ->orderBy('id', 'desc')
    ->limit(4)
    ->get();

$carHireProviders = AccommodationProvider::with(['images', 'unitType.units'])
    ->where('type', 'Car Hire')
    ->orderByDesc('id')
    ->limit(4)
    ->get();

$suites = UnitSuite::with('provider.images')
    ->orderByDesc('id')
    ->limit(4)
    ->get();

    return view('welcome', compact('providers','carHireProviders','suites'));
});

Route::get('/dashboard', function () {
        $user = auth()->user();
    $permissions = $user->user_group->permissions;
    return view('dashboard', compact('permissions'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       //user groups
    Route::get('/setting', [SettingsController::class, 'userGroup'])->name('settings.usergroup');
    Route::post('/settings.create-usergroup', [SettingsController::class, 'createUserGroups'])->name('create-usergroup');
    Route::delete('/user-group/{id}', [SettingsController::class, 'DeleteUserGroup'])->name('delete-usergroup');
    Route::get('/settings.user-group/{id}', [SettingsController::class, 'editUserGroup'])->name('settings.editUsergroup');
    Route::put('/user-group/{id}/update', [SettingsController::class, 'updateUserGroup'])->name('settings.update');
    //permissions
    Route::get('/settings', [SettingsController::class, 'userRole'])->name('settings.userRole');
    Route::post('/settings.create-userRole', [SettingsController::class, 'createUserRole'])->name('create-userRole');
    Route::delete('/user-role/{id}', [SettingsController::class, 'DeleteUserRole'])->name('delete-userrole');
    Route::get('/settings.user-role/{id}', [SettingsController::class, 'editUserRole'])->name('settings.editUserRole');
    Route::put('/user-role/{id}/update', [SettingsController::class, 'updateUserRole'])->name('settings.updateRole');
    // User Management

    Route::get('/settings.users', [SettingsController::class, 'user'])->name('settings.user');
    Route::get('/settings.userlist', [SettingsController::class, 'userlist'])->name('settings.userlist');
    Route::post('/settings.create-user', [SettingsController::class, 'createUser'])->name('create-user');
    Route::get('/settings.user/{id}', [SettingsController::class, 'editUser'])->name('settings.editUser');
    Route::post('/users/{id}/update', [SettingsController::class, 'updateUser'])->name('setting.update');
    Route::patch('/settings/{id}/deactivate', [SettingsController::class, 'deactivate'])->name('deactivateUser');
    Route::patch('/settings/{id}/activate', [SettingsController::class, 'activate'])->name('activateUser');
    // System settings
    Route::get('/settings.systemSettings', [SettingsController::class, 'systemSettings'])->name('settings.systemSettings');
    Route::get('/settings.Settings', [SettingsController::class, 'Settings'])->name('settings.Settings');
    Route::post('/settings.create-settings', [SettingsController::class, 'createSettings'])->name('create-settings');
    Route::delete('/system-settings/{id}', [SettingsController::class, 'DeleteSettings'])->name('delete-settings');
   
    Route::post('/save-role-permissions', [SettingsController::class, 'store'])->name('saveRolePermissions');

    // providers
Route::resource('providers', AccommodationProviderController::class);
Route::resource('units', UnitController::class);
Route::delete('unit-images/{id}', [UnitController::class, 'deleteImage'])->name('unit-images.destroy');
Route::resource('unit_suites', UnitSuiteController::class);
Route::resource('amenities', AmenityController::class);
Route::delete('/provider-images/{id}', [AccommodationProviderController::class, 'destroyImage'])->name('provider-images.destroy');
Route::resource('unit_types', UnitTypeController::class);
Route::delete('unit-types/images/{id}', [UnitTypeController::class, 'destroyImage'])->name('unit-types.images.destroy');


//Booking 
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/get-unit-types/{providerId}', [BookingController::class, 'getUnitTypes']);
Route::get('/get-units/{unitTypeId}', [BookingController::class, 'getUnits']);
Route::post('/bookings/pay', [BookingController::class, 'processPayment'])->name('bookings.store');
});

Route::get('/accommodation', [AccommodationController::class, 'index'])->name('accommodation.index');
Route::get('/providers/{provider}', [AccommodationController::class, 'show'])->name('accommodation.show');
Route::get('/carhire/{provider}', [AccommodationController::class, 'showCarhire'])->name('car_hire.show');

Route::get('/car-hire', [AccommodationController::class, 'listCarHireProviders'])->name('car_hire.index');
Route::get('/suites', [SuiteController::class, 'index'])->name('suites.index');



require __DIR__.'/auth.php';
