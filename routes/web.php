<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CompanyController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\RepairTypeController;
use App\Notifications\BookRepairNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Livewire\Account\ResetPassword;
use App\Http\Livewire\Admin\CustomerInquiries;
use App\Http\Controllers\GoogleReviewController;
use App\Http\Livewire\PaymentMethods\Klarna;
use App\Http\Livewire\PaymentMethods\Paypal;
use Illuminate\Http\Request;
use App\Http\Livewire\Guest\Quotation\Index;


use App\Http\Livewire\Guest\Sell\Categories;
use App\Http\Livewire\Guest\Sell\Models;
use App\Http\Livewire\Guest\Sell\ModelDetail;
use App\Http\Livewire\Guest\Sell\ProductSpecs;
use App\Http\Livewire\Guest\Sell\BookingForm;
use App\Http\Livewire\Guest\FreeRepairBooking;
use App\Http\Livewire\Guest\QuotationForm;

Route::get('/repair/{category_slug}/{device_slug}/{model_slug}/{repair_slug}/free-repair-booking', FreeRepairBooking::class)
    ->name('free-repair-booking');

// ✅ SEO Routes - Using slugs for quotation
Route::get('/quotation/{category}/{device}/{modal}/{repair}', QuotationForm::class)->name('quotation.livewire');


Route::get('/admin/repair/prices/print', \App\Http\Controllers\Admin\Repair\RepairPrintController::class)
    ->name('admin.repair.prices.print');
    
// Sell ka main page (navbar se yahi open hoga)
Route::get('/sell', Categories::class)->name('guest.sell.categories');

// ✅ SEO URLs - Using slugs instead of IDs
Route::get('/sell/{category}', Models::class)
    ->name('guest.sell.models');

Route::get('/repairguide', function () {
    return view('repairguide');
})->name('repair-guide');

Route::get('/sell/model/{modal}', ModelDetail::class)
    ->name('guest.sell.model-detail');

Route::get('/sell/product-specs/{product}', ProductSpecs::class)
    ->name('guest.sell.product-specs');

Route::get('/sell/booking/{product}', BookingForm::class)
    ->name('guest.sell.booking-form');
    
    

Route::get('/quotation', Index::class)->name('guest.quotation'); 

Route::get('/klarna-success', function (Request $request) {
    $klarnaComponent = app(Klarna::class);
    $klarnaComponent->handleKlarnaSuccess($request->query('session_id'));
    return redirect('/success'); // Redirect to a success page
})->name('klarna.success');

// Route::get('/payment/success', function (Request $request) {
//     $paypalComponent = app(Paypal::class);
//     $paypalComponent->confirmPayment($request->query('paymentId'), $request->query('PayerID'));
//     return redirect('/success'); // Redirect to a success page
// })->name('payment.success');
Route::get('/paypal-success', \App\Http\Livewire\PaymentMethods\PaypalSuccess::class)
    ->name('paypal.success');

Route::get('/success', function () {
    return view('success'); // Create a success.blade.php view
})->name('success');
Route::get('/store-repair-price/{device}/{modal}/{repair}/{price}', [App\Http\Livewire\Guest\RepairTypes::class, 'storeRepairPrice'])->name('store-repair-price');

Route::get('/google-reviews', [GoogleReviewController::class, 'showReviews']);
Route::get('password/reset', ResetPassword::class)->name('password.request');
Route::post('password/email', [ResetPassword::class, 'sendResetLinkEmailRepairTypes'])->name('password.email');
Route::get('password/reset/{token}', ResetPassword::class)->name('password.reset');
Route::post('password/reset', [ResetPassword::class, 'resetPassword'])->name('password.update');
Route::get('/show-log', [LogController::class, 'showLog'])->name('show.log');

// Route::get('/', [MainController::class, 'home'])->name('home');

// routes/web.php

// routes/web.php

// routes/web.php

// routes/web.php
// routes /web.php



// routes/web.php


// routes/web.php

// routes/web.php

// routes/web.php




// routes/web.php


// routes/web.php

// routes/web.php

// routes/web.php


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

// ðŸ—ƒ Clear All Cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache cleared!';
});

// ðŸš€ Clear Config Cache
Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    return 'Configuration cache cleared!';
});

Route::post('/clear-session', function () {
    session()->flush();
    return response()->json(['status' => 'Session cleared']);
})->name('clear.session');


use App\Http\Controllers\ContactController;

Route::resource('contacts', ContactController::class);
Route::get('/admin/customer-inquiries', CustomerInquiries::class)->name('customer-inquiries');


use App\Http\Livewire\Guest\detail;

Route::get('/detail', Detail::class)->name('detail');



use App\Http\Livewire\Guest\special;

Route::get('/special', Special::class)->name('special');


// use App\Http\Livewire\Guest\checkout;

// // Route::get('/checkout', Checkout::class)->name('checkout');
// Route::get('/checkout/{productSpec}', checkout::class)->name('checkout');

Route::get('/checkout/{productSpec}', \App\Http\Livewire\Guest\checkout::class)->name('checkout');

// Route::get(
//     '/guest-accessories-products',
//     App\Http\Livewire\Guest\Accessories\Index::class
// )->name('guest-accessories-products');

// Route::get(
//     '/guest-accessories-product/specs/{model}',
//     \App\Http\Livewire\Guest\Accessories\ProductSpecs::class
// )->name('guest-accessories-product-specs');

Route::get('/accessories', App\Http\Livewire\Guest\Accessories\Index::class)->name('guest-accessories-products');
Route::get('/accessories/{category_slug}/{device_slug}/{model_slug}', \App\Http\Livewire\Guest\Accessories\ProductSpecs::class)->name('guest-accessories-product-specs');
 
// 301 Redirects - purane URLs toot na jayein
Route::redirect('/guest-accessories-products', '/accessories', 301);
Route::get('/guest-accessories-product/specs/{model}', function ($model) {
    $m = \App\Models\Modal::where('slug', $model)
        ->orWhere('id', $model)
        ->with('device_type.category')
        ->first();
    if (!$m) abort(404);
    return redirect()->route('guest-accessories-product-specs', [
        'category_slug' => $m->device_type->category->slug ?? \Illuminate\Support\Str::slug($m->device_type->category->name ?? 'accessories'),
        'device_slug'   => $m->device_type->slug ?? \Illuminate\Support\Str::slug($m->device_type->name ?? 'device'),
        'model_slug'    => $m->slug ?? $m->id,
    ], 301);
});
 

// Route::get(
//     '/guest-accessories-products',
//     App\Http\Livewire\Guest\sell\Index::class
// )->name('guest-accessories-products');

// Route::get(
//     '/guest-accessories-product/specs/{model}',
//     \App\Http\Livewire\Guest\sell\ProductSpecs::class
// )->name('guest-accessories-product-specs');

// use App\Http\Livewire\Guest\khuram;

// Route::get('/accessroires', Khuram::class)->name('khuram');




use App\Http\Livewire\Guest\value;

Route::get('/value', Value::class)->name('value');




use App\Http\Livewire\Guest\selling;

Route::get('/selling', Selling::class)->name('selling');



use App\Http\Livewire\Guest\goldmines;

Route::get('/goldmines', Goldmines::class)->name('goldmines');



use App\Http\Livewire\Guest\secrets;

Route::get('/secrets', Secrets::class)->name('secrets');


































Route::redirect('/mastering', '/');
Route::redirect('/insights', '/');
Route::redirect('/makeover', '/');
Route::redirect('/beyond', '/');
Route::redirect('/reviving', '/');
Route::redirect('/science', '/');
Route::redirect('/choices', '/');

Route::redirect('/gadget', '/');
Route::redirect('/wisdom', '/');
Route::redirect('/galore', '/');
Route::redirect('/treasures', '/');
Route::redirect('/central', '/');
Route::redirect('/marvelsh', '/');
Route::redirect('/cash', '/');
Route::redirect('/tips', '/');














// use App\Http\Livewire\Guest\tips;

// Route::get('/tips', Tips::class)->name('home');


// use Illuminate\Support\Facades\Route;



use App\Http\Livewire\Guest\tech;

Route::get('/tech', Tech::class)->name('tech');







use App\Http\Livewire\Guest\store;

Route::get('/store', Store::class)->name('store');


use App\Http\Livewire\Guest\blog;

Route::get('/blog', Blog::class)->name('blog');

use App\Http\Livewire\Guest\aboutus;

Route::get('/aboutus', AboutUs::class)->name('aboutus');



Route::get('/', function () {

    return view('home');
})->name('home');


Route::get('/migrate', function () {
    Illuminate\Support\Facades\Artisan::call('migrate');
    dd('migrated!');
});

Route::get('/clear', function () {
    Illuminate\Support\Facades\Artisan::call('config:clear');
    Illuminate\Support\Facades\Artisan::call('cache:clear');
    Illuminate\Support\Facades\Artisan::call('view:clear');
    Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('cleared!');
});

Route::get('/work', function () {
    Illuminate\Support\Facades\Artisan::call('queue:work --tries=3');
    dd('queue worker started!');
});



//collection form
Route::get('collection-form', App\Http\Livewire\Guest\CollectionForm::class)->name('collection-form');
// Modal Route
Route::get('sample-device-types/{modals_name}', [App\Http\Livewire\Components\Nav\DeviceTypes::class, 'products']);
//others
Route::get('/other-device-booking/{type}/{device?}/{modal?}', App\Http\Livewire\Guest\Others\BookingForm::class)->name('other-device-booking');

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('customer-inquiries', App\Http\Livewire\Admin\CustomerInquiries::class)->name('admin.customer-inquiries');
    Route::get('/admin/repair-quotations', App\Http\Livewire\Admin\RepairQuotations\Index::class)->name('admin.repair-quotations');
Route::get('/admin/free-repair-bookings', App\Http\Livewire\Admin\FreeRepairBookings\Index::class)->name('admin.free-repair-bookings');


    //policy terms and condition
    Route::get('policy-terms-and-condition', App\Http\Livewire\Admin\TermsPolicy::class)->name('policy-terms-and-conditon');

    //device-type
    Route::get('device-type-index', App\Http\Livewire\DeviceType\Index::class)->name('device-type-index');
    Route::get('device-type-create', App\Http\Livewire\DeviceType\Create::class)->name('device-type-create');
    Route::get('device-type-edit/{deviceType}', App\Http\Livewire\DeviceType\Edit::class)->name('device-type-edit');

    //modals
    Route::get('modal-index', App\Http\Livewire\Modal\Index::class)->name('modal-index');
    Route::get('modal-create', App\Http\Livewire\Modal\Create::class)->name('modal-create');
    Route::get('modal-edit/{modal}', App\Http\Livewire\Modal\Edit::class)->name('modal-edit');

    //repair
    Route::get('repair-index', App\Http\Livewire\Repair\Index::class)->name('repair-index');
    Route::get('repair-create', App\Http\Livewire\Repair\Create::class)->name('repair-create');
    Route::get('repair-master', App\Http\Livewire\Repair\MasterTypes::class)->name('repair-master');

    Route::get('profile', App\Http\Livewire\Repair\Edit::class)->name('profile.edit');

    // Device-Type
    Route::get('Device-view', [CategoryController::class, 'index'])->name('Device-view');
    Route::get('Device/create', [CategoryController::class, 'create'])->name('Create-Device');
    Route::post('Device/store', [CategoryController::class, 'store'])->name('store-Device');
    Route::get('Device/edit/{id}', [CategoryController::class, 'edit'])->name('Device-Edit');
    Route::post('device/update/{id}', [CategoryController::class, 'update'])->name('device-update');
    Route::get('Device/delete/{id}', [CategoryController::class, 'destroy'])->name('Device-delete');

    // companies
    Route::get('/companies-view', [CompanyController::class, 'index'])->name('companies-view');
    Route::get('/companies-create', [CompanyController::class, 'create'])->name('companies-create');
    Route::post('companies-store', [CompanyController::class, 'store'])->name('companies-store');
    Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('company-Edit');
    Route::post('company/update/{id}', [CompanyController::class, 'update'])->name('company-update');
    Route::get('company/delete/{id}', [CompanyController::class, 'destroy'])->name('company-delete');

    // Modal
    Route::get('/Modal-view', [ModalController::class, 'index'])->name('Modal-view');
    Route::get('Modal/create', [ModalController::class, 'create'])->name('Modal-create');
    Route::post('Modal/store', [ModalController::class, 'store'])->name('Modal-store');
    Route::get('Modal/edit/{id}', [ModalController::class, 'edit'])->name('Modal-Edit');
    Route::post('Modal/update/{id}', [ModalController::class, 'update'])->name('Modal-update');
    Route::get('modal/delete/{id}', [ModalController::class, 'destroy'])->name('Modal-delete');

    // Repairtype
    Route::get('/Repair-view', [RepairTypeController::class, 'index'])->name('Repair-view');
    Route::get('Repair/create', [RepairTypeController::class, 'create'])->name('Repair-create');
    Route::post('Repair/store', [RepairTypeController::class, 'store'])->name('Repair-store');
    Route::get('Repair/edit/{id}', [RepairTypeController::class, 'edit'])->name('Repair-Edit');
    Route::post('Repair/update/{id}', [RepairTypeController::class, 'update'])->name('Modal-update');
    Route::get('modal/delete/{id}', [RepairTypeController::class, 'destroy'])->name('Modal-delete');
    Route::post('product/import', [ProductController::class, 'import'])->name('import');
    Route::get('/export-product', [ProductController::class, 'export'])->name('export-product');
    Route::get('/selectCat', [RepairTypeController::class, 'selectCat'])->name('/selectCat');


    // Site Settings
    Route::get('settings/view', [SiteSettingController::class, 'index'])->name('settingsV');
    Route::get('settings/create', [SiteSettingController::class, 'create'])->name('settingsC');
    Route::post('settings/store', [SiteSettingController::class, 'store'])->name('settingsS');
    Route::get('settings/edit/{id}', [SiteSettingController::class, 'edit'])->name('settingsE');
    Route::post('settings/update/{id}', [SiteSettingController::class, 'update'])->name('settingsU');
    Route::post('settings/delete/{id}', [SiteSettingController::class, 'destroy'])->name('settingsD');

    // Address
    Route::get('address/view', [AddressController::class, 'index'])->name('addressV');
    Route::get('address/create', [AddressController::class, 'create'])->name('addressC');
    Route::post('address/store', [AddressController::class, 'store'])->name('addressS');
    Route::get('address/edit/{id}', [AddressController::class, 'edit'])->name('addressE');
    Route::post('address/update/{id}', [AddressController::class, 'update'])->name('addressU');
    Route::post('address/delete/{id}', [AddressController::class, 'destroy'])->name('addressD');
    // Landing Page Management
    Route::get('landing-s1/view', [LandingPageController::class, 'index'])->name('landing.s1V');
    Route::get('landing-s1/create', [LandingPageController::class, 'create'])->name('landing.s1C');
    Route::post('landing-s1/store', [LandingPageController::class, 'store'])->name('landing.s1S');
    Route::get('landing-s1/edit/{id}', [LandingPageController::class, 'edit'])->name('landing.s1E');
    Route::post('landing-s1/update/{id}', [LandingPageController::class, 'update'])->name('landing.s1U');
    Route::post('landing-s1/delete/{id}', [LandingPageController::class, 'destroy'])->name('landing.s1D');
    Route::get('heading/create', [LandingPageController::class, 'headingC'])->name('SectionOneHeadingC');
    Route::post('heading/store', [LandingPageController::class, 'headingS'])->name('SectionOneHeadingS');
    Route::post('heading/update/{id}', [LandingPageController::class, 'headingU'])->name('SectionOneHeadingU');
    Route::get('heading/edit/{id}', [LandingPageController::class, 'headingE'])->name('SectionOneHeadingE');
    // Blogs
    Route::get('blog/view', [BlogController::class, 'index'])->name('blogV');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blogC');
    Route::post('blog/store', [BlogController::class, 'store'])->name('blogS');
    Route::get('blog/edit/{edit}', [BlogController::class, 'edit'])->name('blogE');
    Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blogU');
    Route::get('blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blogD');
    // blog heading post
    Route::get('/BlogPost/{id}', [BlogPostController::class, 'edit'])->name('BlogPost');
    Route::post('postblogs/update/{id}', [BlogPostController::class, 'update'])->name('postblogs/update/{id}');

    //Testing

    Route::get('/company-view', [CompanyController::class, 'index'])->name('company-view');
    Route::post('/create-company', [CompanyController::class, 'create']);

    Route::get('/company-modal', [ModalController::class, 'index'])->name('company-modal');
    Route::post('/create-modal', [ModalController::class, 'create']);

    Route::get('/repair-type-view', [RepairTypeController::class, 'index'])->name('repair-type');
    Route::post('/create-repair_type', [RepairTypeController::class, 'create']);
    Route::get('/searchCat', [RepairTypeController::class, 'searchCat'])->name('/searchcat');

    Route::post('/create-price', [PriceController::class, 'create']);

    //show-services
    Route::get('show-services', App\Http\Livewire\Admin\Service\ShowServices::class)->name('show-services');

    //sell
    // Route::get('categories-list/{type}', App\Http\Livewire\Sell\Categories::class)->name('repair-create');
    // Route::get('device-types/{type}', App\Http\Livewire\Admin\Sell\Device::class)->name('device-types');



});

Route::group(['middleware' => 'auth'], function () {
    Route::get('customer-inquiries', App\Http\Livewire\Admin\CustomerInquiries::class)->name('admin.customer-inquiries');

    Route::get('/admin-dashboard', App\Http\Livewire\Admin\Dashboard::class)->name('admin-dashboard');
    //buy
    Route::get('/buy-categories', App\Http\Livewire\Admin\Buy\Category\Index::class)->name('buy-categories');
    Route::get('/buy-devices/{category?}', App\Http\Livewire\Admin\Buy\Device\Index::class)->name('buy-devices');
    Route::get('/buy-models/{device?}', App\Http\Livewire\Admin\Buy\Model\Index::class)->name('buy-models');
    Route::get('/buy-models-add-ons', App\Http\Livewire\Admin\Buy\Addon\Index::class)->name('buy-models-add-ons');

    //accessories
    Route::get('/accessories-categories', App\Http\Livewire\Admin\Accessories\Category\Index::class)->name('accessories-categories');
    Route::get('/accessories-devices/{category?}', App\Http\Livewire\Admin\Accessories\Device\Index::class)->name('accessories-devices');
    Route::get('/accessories-models/{device?}', App\Http\Livewire\Admin\Accessories\Model\Index::class)->name('accessories-models');
    Route::get('/accessories-models-add-ons', App\Http\Livewire\Admin\Accessories\Addon\Index::class)->name('accessories-models-add-ons');

    //sell
    Route::get('/sell-categories', App\Http\Livewire\Admin\Sell\Category\Index::class)->name('sell-categories');
    Route::get('/sell-devices/{category?}', App\Http\Livewire\Admin\Sell\Device\Index::class)->name('sell-devices');
    Route::get('/sell-models/{device?}', App\Http\Livewire\Admin\Sell\Model\Index::class)->name('sell-models');
    Route::get('/sell-models-add-ons', App\Http\Livewire\Admin\Sell\Addon\Index::class)->name('sell-models-add-ons');

    //repair
    Route::get('/repair-categories', App\Http\Livewire\Admin\Repair\Category\Index::class)->name('repair-categories');
    Route::get('/repair-devices/{category?}', App\Http\Livewire\Admin\Repair\Device\Index::class)->name('repair-devices');
    Route::get('/repair-models/{device?}', App\Http\Livewire\Admin\Repair\Model\Index::class)->name('repair-models');
    Route::get('/repair-models-add-ons', App\Http\Livewire\Admin\Repair\Addon\Index::class)->name('repair-models-add-ons');

    //Change Password
    Route::get('/change-password', \App\Http\Livewire\Account\ChangePassword::class)->name('change-password');
    Route::post('/change-password', [\App\Http\Livewire\Account\ChangePassword::class, 'update'])->name('update-password');
    //orders
    Route::get('/orders', App\Http\Livewire\Admin\Orders\Index::class)->name('orders');
    Route::get('/orders-details/{orderDetails}', App\Http\Livewire\Admin\Orders\View::class)->name('orders-details');

    Route::get('repair-price', App\Http\Livewire\Admin\Repair\RepairPrice\Index::class)->name('repair-price');
    Route::get('repair-create-repair-price', App\Http\Livewire\Admin\Repair\RepairPrice\Create::class)->name('repair-create-price');
    Route::get('repair-master-repair-types', App\Http\Livewire\Admin\Repair\RepairPrice\MasterTypes::class)->name('repair-master-type');

    Route::get('/settings', App\Http\Livewire\Admin\Settings\PaymentMethods::class)->name('payment-methods-settings');
    Route::get('/branches', App\Http\Livewire\Admin\Settings\Branches\Index::class)->name('branches-settings');
    Route::get('/edit-branches/{branchId}', App\Http\Livewire\Admin\Settings\Branches\Edit::class)->name('edit-branches');
    Route::get('/create-branches', App\Http\Livewire\Admin\Settings\Branches\Create::class)->name('create-branches');
    Route::get('/services-settings', App\Http\Livewire\Admin\Settings\ServicesSettings::class)->name('services-settings');
    Route::get('/site-settings', App\Http\Livewire\Admin\Settings\SiteSettings\SiteSettings::class)->name('site-settings');
    Route::get('/website-contents', App\Http\Livewire\Admin\WebsiteContents\Index::class)->name('website-contents');
     Route::get('/add-staff', \App\Http\Livewire\Admin\AddStaff::class)->name('add-staff');


});
//payment paypal redirect routes
Route::get('/paypal-success', App\Http\Livewire\PaymentMethods\PaypalSuccess::class)->name('payment.success');
Route::get('/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('payment.cancel');

Route::get('/klarna-success', App\Http\Livewire\PaymentMethods\KlarnaSuccess::class)->name('klarna.success');


//guest repair
// Route::get('/guest-sell-categories', App\Http\Livewire\Guest\Sell\Categories::class)->name('guest-sell-categories');
// Route::get('/guest-sell-device-types/{category?}', App\Http\Livewire\Guest\Sell\DeviceTypes::class)->name('guest-sell-device-types');
// Route::get('/guest-sell-models/{device}', App\Http\Livewire\Guest\Sell\Models::class)->name('guest-sell-models');
// Route::get('/guest-sell-model-detail/{model}', App\Http\Livewire\Guest\Sell\ModelDetail::class)->name('guest-sell-model-detail');
// Route::get('/guest-sell-booking-form/{model}', App\Http\Livewire\Guest\Sell\BookingForm::class)->name('guest-sell-booking-form');
// NEW SEO Routes — Sell
Route::get('/sell', App\Http\Livewire\Guest\Sell\Categories::class)->name('guest-sell-categories');
Route::get('/sell/{category_slug}', App\Http\Livewire\Guest\Sell\DeviceTypes::class)->name('guest-sell-device-types');
Route::get('/sell/{category_slug}/{device_slug}', App\Http\Livewire\Guest\Sell\Models::class)->name('guest-sell-models');
Route::get('/sell/{category_slug}/{device_slug}/{model_slug}', App\Http\Livewire\Guest\Sell\ModelDetail::class)->name('guest-sell-model-detail');
 
// 301 Redirects — purane URLs Google mein hain, toot na jayein
Route::redirect('/guest-sell-categories', '/sell', 301);
 
Route::get('/guest-sell-device-types/{category}', function ($category) {
    $cat = \App\Models\Category::where('id', $category)
        ->orWhere('slug', $category)->first();
    if (!$cat) abort(404);
    return redirect()->route('guest-sell-device-types', [
        'category_slug' => $cat->slug ?? \Illuminate\Support\Str::slug($cat->name),
    ], 301);
});
 
Route::get('/guest-sell-models/{device}', function ($device) {
    $dev = \App\Models\DeviceType::where('id', $device)
        ->orWhere('slug', $device)->with('category')->first();
    if (!$dev) abort(404);
    return redirect()->route('guest-sell-models', [
        'category_slug' => $dev->category->slug ?? \Illuminate\Support\Str::slug($dev->category->name ?? 'phones'),
        'device_slug'   => $dev->slug ?? \Illuminate\Support\Str::slug($dev->name),
    ], 301);
});
 
Route::get('/guest-sell-model-detail/{model}', function ($model) {
    $m = \App\Models\Modal::where('id', $model)
        ->orWhere('slug', $model)->with('device_type.category')->first();
    if (!$m) abort(404);
    return redirect()->route('guest-sell-model-detail', [
        'category_slug' => $m->device_type->category->slug ?? \Illuminate\Support\Str::slug($m->device_type->category->name ?? 'phones'),
        'device_slug'   => $m->device_type->slug ?? \Illuminate\Support\Str::slug($m->device_type->name ?? 'device'),
        'model_slug'    => $m->slug ?? $m->id,
    ], 301);
});
Route::get('/guest-sell-booking-form/{model}', App\Http\Livewire\Guest\Sell\BookingForm::class)->name('guest-sell-booking-form');


//guest buy
// Route::get('/guest-buy-products', App\Http\Livewire\Guest\Buy\Index::class)->name('guest-buy-products');
// Route::get('/guest-buy-product/specs/{model}', App\Http\Livewire\Guest\Buy\ProductSpecs::class)->name('guest-buy-product-specs');
Route::get('/buy', App\Http\Livewire\Guest\Buy\Index::class)->name('guest-buy-products');
Route::get('/buy/{category_slug}/{device_slug}/{model_slug}', \App\Http\Livewire\Guest\Buy\ProductSpecs::class)->name('guest-buy-product-specs');
Route::redirect('/guest-buy-products', '/buy', 301);
Route::get('/guest-buy-product/specs/{model}', function ($model) {
    $m = \App\Models\Modal::where('slug', $model)->orWhere('id', $model)->with('device_type.category')->first();
    if (!$m) abort(404);
    return redirect()->route('guest-buy-product-specs', [
        'category_slug' => $m->device_type->category->slug ?? \Illuminate\Support\Str::slug($m->device_type->category->name ?? 'phones'),
        'device_slug'   => $m->device_type->slug ?? \Illuminate\Support\Str::slug($m->device_type->name ?? 'device'),
        'model_slug'    => $m->slug ?? $m->id,
    ], 301);
});
 

//guest accessories
// Route::get('/guest-accessories-products', App\Http\Livewire\Guest\Accessories\Index::class)->name('guest-accessories-products');
// Route::get('/guest-accessories-product/specs/{model}', App\Http\Livewire\Guest\Accessories\ProductSpecs::class)->name('guest-accessories-product-specs');
//guest repair
Route::get('categories', App\Http\Livewire\Guest\Categories::class)->name('categories');
Route::get('device-types/{category?}', App\Http\Livewire\Guest\DeviceTyps::class)->name('device-types');

Route::get('{device}/models', App\Http\Livewire\Guest\Modals::class)->name('modals');
Route::get('{device}/{modal}/repair_types', App\Http\Livewire\Guest\RepairTypes::class)->name('repair-types');
Route::get('repair/{device}/{modal}/{repair}', App\Http\Livewire\Guest\RepairDetail::class)->name('repair-detail');
Route::get('thank-you', App\Http\Livewire\Guest\ThankYou::class)->name('thank-you');

Route::get('/booking-confirmation', function () {
    $booking = session()->get('booking_confirmation');
    if (!$booking) return redirect()->to('/');
    session()->forget('booking_confirmation');
    return view('booking-confirmation', compact('booking'));
})->name('booking.confirmation');



use App\Http\Controllers\NewsletterController;
 
// Frontend - subscribe (AJAX)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
 
// Admin - view subscribers
// Route::get('/admin/newsletter/subscribers', [NewsletterController::class, 'showEmails'])->name('newsletter.emails');
Route::get('/admin/newsletter/subscribers', function () {
    return view('livewire.admin.newsletter-subscribers');
})->name('newsletter.emails');
 
// Admin - send broadcast email
Route::post('/admin/newsletter/broadcast', [NewsletterController::class, 'sendBroadcastEmail'])->name('newsletter.broadcast');
 
 
Route::get('/pricing', App\Http\Livewire\Repair\PriceIndex::class)->name('pricingV');
Route::get('/terms-and-conditions', App\Http\Livewire\Guest\TermsAndConditions::class)->name('terms-and-conditions');
Route::get('/privacy-policy', App\Http\Livewire\Guest\PrivacyPolicy::class)->name('privacy-and-policy');
Route::get('/stores', App\Http\Livewire\Guest\Stores\Index::class)->name('stores');
Route::get('/mobile-repairing/{branchSlug}', App\Http\Livewire\Guest\Stores\StoreDetails::class)->name('store-details');
// Route::get('/privacy-policy', function (){
//     return view('frontend.sections.privacy_policy');
// });
// Route::get('/terms-and-conditions', function (){
//     return view('frontend.sections.term_conditions');
// });

Route::get('blogs', [MainController::class, 'blogs'])->name('blogsView');
Route::get('blogs/detail/{id}', [MainController::class, 'blogsDetail'])->name('blogsDetail');
Route::get('/about-fone', [MainController::class, 'aboutFone'])->name('aboutFoneV');
Route::get('/faq', [MainController::class, 'faq'])->name('faqV');
Route::get('/lifeblood', [MainController::class, 'lifeBlood'])->name('lifeBloodV');
Route::get('/battery', [MainController::class, 'battery'])->name('batteryV');

//Account

Route::get('/admin-login', App\Http\Livewire\Account\Login::class)->name('login');

//command
Route::get('/discover-components', function (Request $request) {
    // Call the Livewire component discovery command
    Artisan::call('optimize:clear');
    // Artisan::call('livewire:discover');

    // Redirect back or return a response
    return back()->with('message', 'Livewire components discovered successfully.');
});
