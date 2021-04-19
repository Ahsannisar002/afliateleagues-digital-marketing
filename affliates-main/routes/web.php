<?php

	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;

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

	Route::middleware('guest')->group(function () {
		Route::get('/', 'IndexController@index');
		Route::get('/about_us', 'IndexController@about_us')->name('about_us');
		Route::get('/contact_us', 'IndexController@contact_us')->name('contact_us');
		Route::get('/terms', 'IndexController@terms_and_conditions')->name('terms_and_conditions');
		Route::get('/admin/login', 'Admin\AdminController@showLoginForm');
	});

	Auth::routes();
	Route::prefix('admin')->namespace('Admin')->group(function () {
		Route::post('/login', 'AdminController@login');
		Route::middleware('admin')->group(function () {
			Route::get('/dashboard', 'AdminController@showDashboard');
			Route::prefix('resources')->group(function () {
				Route::group(['middleware' => ['role:super-admin,admin']], function () {
					Route::resource('admins', 'AdminController');
					Route::resource('balances', 'BalanceController');
					Route::get('/admins/{admin}/assign-role', 'RolesController@showAssignRoleToAdminForm')->name('admins.assignRole.create');
					Route::post('/admins/assign-role', 'RolesController@assignRoleToAdmin')->name('admins.assignRole.post');
					Route::get('/admins/{admin}/give-permission', 'PermissionsController@showGivePermissionToAdminForm')->name('admins.givePermission.create');
					Route::post('/admins/give-permission', 'PermissionsController@givePermissionToAdmin')->name('admins.givePermission.post');
					Route::post('/getAdminDetailsForDestroying', 'AdminController@getAdminDetailsForDestroying');
					Route::get('/users/{user}/assign-role', 'RolesController@showAssignRoleToUsersForm')->name('users.assignRole.create');
					Route::post('/users/assign-role', 'RolesController@assignRoleToUsers')->name('users.assignRole.post');
					Route::get('/users/{user}/give-permission', 'PermissionsController@showGivePermissionToUsersForm')->name('users.givePermission.create');
					Route::post('/users/give-permission', 'PermissionsController@givePermissionToUsers')->name('users.givePermission.post');
				});
				Route::post('/getUserDetailsForDestroying', 'UserController@getUserDetailsForDestroying');
				Route::resource('users', 'UserController');
			});
			Route::prefix('memberships')->group(function () {
				Route::get('pending', 'UserMembershipController@indexPending')->name('memberships.pending');
				Route::put('{pending_memberships}/approve', 'UserMembershipController@approve')->name('memberships.approve');
				Route::get('{pending_memberships}/edit_for_rejection', 'UserMembershipController@rejection')->name('memberships.rejection');
				Route::put('{pending_memberships}/reject', 'UserMembershipController@reject')->name('memberships.reject');
			});
			Route::resource('memberships', 'MembershipController');
			Route::resource('payment-gateways', 'PaymentGatewayController');
			Route::post('/getLinkDetailsForDestroying', 'LinkController@getLinkDetailsForDestroying');
			Route::post('/getMembershipDetailsForDestroying', 'MembershipController@getMembershipDetailsForDestroying');
			Route::get('/users/documents', 'documentsApprovingController@show')->name('users.documents');
			Route::put('/users/{user}/document/approve', 'documentsApprovingController@approve')->name('users.documents.approve');
			Route::put('/users/{user}/document/reject', 'documentsApprovingController@reject')->name('users.documents.reject');

			Route::group(['middleware' => ['role:super-admin,admin']], function () {
				Route::resource('roles', 'RolesController');
				Route::prefix('roles')->group(function () {
					Route::get('/{role}/assignPermission', 'RolesController@showAssignPermission')->name('roles.assignPermission.create');
					Route::post('/assignPermission', 'RolesController@AssignPermission')->name('roles.assignPermission.post');
				});
				Route::prefix('withdraws')->group(function () {
					Route::get('/pending', 'WithdrawController@pending')->name('withdraws.pending');
					Route::put('{withdraw}/approve', 'WithdrawController@approve')->name('withdraws.approve');
					Route::put('{withdraw}/reject', 'WithdrawController@reject')->name('withdraws.reject');
				});
				Route::resource('withdraws', 'WithdrawController');
				Route::resource('titles', 'TitleController');
				Route::prefix('titles')->group(function () {
					Route::get('/{title}/assignData', 'TitleController@showAssignData')->name('titles.assignData.create');
					Route::post('/assignData', 'TitleController@AssignData')->name('titles.assignData.post');
					Route::get('/{title}/assignVideo', 'TitleController@showAssignVideo')->name('titles.assignVideo.create');
					Route::post('/assignVideo', 'TitleController@AssignVideo')->name('titles.assignVideo.post');
					Route::get('/{title}/assignImage', 'TitleController@showAssignImage')->name('titles.assignImage.create');
					Route::post('/assignImage', 'TitleController@AssignImage')->name('titles.assignImage.post');
				});
				Route::post('/getTitleDetailsForDestroying', 'TitleController@getTitleDetailsForDestroying');
				Route::post('/getServiceDetailsForDestroying', 'ServicesController@getServiceDetailsForDestroying');
				Route::post('/getGatewayDetailsForDestroying', 'RatesController@getGatewayDetailsForDestroying');
				Route::post('/getRoleDetailsForDestroying', 'RolesController@getRoleDetailsForDestroying');
				Route::post('/getPermissionDetailsForDestroying', 'PermissionsController@getPermissionDetailsForDestroying');
				Route::resource('permissions', 'PermissionsController');
				Route::prefix('permissions')->group(function () {
					Route::get('/{permission}/assignRole', 'PermissionsController@showAssignRole')->name('permissions.assignRole.create');
					Route::post('/assignRole', 'PermissionsController@AssignRole')->name('permissions.assignRole.post');
				});
				Route::get('/transactions', 'TransactionController@index');
				Route::get('/create-points', 'TransactionsController@showPointsCreationForm')->name('create-points.create');
				Route::post('/create-points', 'TransactionsController@createPoints')->name('create-points.post');
			});
			Route::get('/settings/change-password', 'SettingsController@showChangePassword');
			Route::post('/change-password', 'SettingsController@changePassword')->name('admin.change-password.post');
			Route::post('/logout', 'AdminController@logout')->name('admins.logout');
			Route::any('{query}', function () {
				return redirect('/admin/dashboard');
			})->where('query', '.*');
		});
	});
	Route::middleware(['auth'])->group(function () {
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		Route::get('/profile', 'ProfileController@edit')->name('profile');
		Route::patch('/profile/{user}', 'ProfileController@update');
		Route::get('/transactions', 'TransactionsController@index')->name('transactions');
		Route::get('/withdraw', 'WithdrawController@create')->name('withdraw.create');
		Route::post('/withdraw/{user}', 'WithdrawController@store')->name('withdraw.store');
		Route::prefix('/network')->group(function () {
			Route::get('/direct-referrals', 'NetworkController@directReferralsIndex');
			Route::get('/referral-link', 'NetworkController@referralLinkShow');
			Route::get('/tree', 'NetworkController@treeShow');
			Route::post('/treeview', 'NetworkController@treeview');
		});
		Route::prefix('/settings')->group(function () {
			Route::get('/change-password', 'SettingsController@showChangePassword')->name('settings.change-password');
			Route::post('/change-password', 'SettingsController@changePassword');
		});
		Route::get('/courses', 'CoursesController@index')->name('courses.index');
		Route::get('/course/{membership}', 'CoursesController@show')->name('courses.show');
		Route::get('/course/content/{title}', 'CoursesController@detail')->name('courses.title.detail');
		Route::prefix('course')->group(function () {
			Route::get('/detail/{membership}', 'CoursesController@detail')->name('course.detail');
		});
		Route::prefix('purchase')->group(function () {
			Route::get('/package', 'MembershipController@create')->name('membership.create');
			Route::post('/package', 'MembershipController@store')->name('membership.post');
		});
		Route::post('/getPackagePrice', 'MembershipController@getPackagePrice');
		Route::any('{query}',
			function () {
				return redirect('/dashboard');
			})
			->where('query', '.*');
	});
