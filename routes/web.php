
<?php

use App\Http\Controllers\CheckNumber;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ReciveDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RigesterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\SendVerifyCode;


// روت home بیرون از گروه
Route::get('/', function () {
    return view(view: 'home');
})->name('home');

// بقیه روت‌ها داخل گروه با prefix /auth
Route::group(['prefix' => 'auth'], function () {

    Route::get('/{type}', function ($type) {
        $allowed = [
            'login'    => 'login',
            'register' => 'register',
            'forgot'   => 'forgot',
            'verify'   => 'verify',
            'set-username-password'=> 'set-username-password',
            'show-password' => 'show-username-password',
        ];

        if (! array_key_exists($type, $allowed)) {
            abort(404);
        }

        return view('auth.' . $allowed[$type], ['type' => $type]);
    })->name('auth.dynamic');

    Route::post('/Resumelogin', [LoginController::class, 'check'])->name('Resumelogin');

    Route::post('/ResumeRegister', function(){
        session(['TypeForAfterVerify' => 'register',
                'phone' => request()->input('phone')]);

        return app(CheckNumber::class)->check(request());
    })->name('ResumeRegister');

    Route::post('/VerifyCode', [SendVerifyCode::class, 'VerifyCode'])->name('VerifyCode');

    Route::post('/set-username-password', [RigesterController::class, 'PutData']
    )->name('set-username-password');

    Route::post('/Resumeforgot', function(){
        session(['TypeForAfterVerify' => 'forgot',]);

        return app(CheckNumber::class)->check(request());
    })->name('Resumeforgot');

    Route::post('/show-username-password', [ForgotController::class, 'CreateAndUpdatePassword']
    )->name('show-username-password');
});


Route::get('/shopping-cart', function () {
    return view(view: 'shopping-cart');
})->name('shopping-cart');


Route::get('/edit-profile', [ReciveDataController::class, 'ReciveAddresses']
)->name('edit-profile');


Route::get('/verify/edit-profile', [EditProfileController::class, 'EditCreditional']
)->name('verify-edit-profile');

Route::get('/edit-phone', function () {
    session(['ForRedirectrAfterVerify' => 'edit-phone',]);

    return redirect()->route('auth.dynamic', ['type' => 'register']);
})->name('edit-phone');


Route::get('/ticket', action: function () {
    return view(view: 'ticket');
})->name('ticket');

Route::get('/exit', function () {
    Auth::logout();
    return view(view: 'home');
})->name('exit');


Route::get('/add-address', function () {
    return view(view: 'address');
})->name('add-address');

Route::POST('/verify/address', [EditProfileController::class, 'UpdateAddress']
)->name('verify-addresa');

Route::get('/delete/address/{index}', [EditProfileController::class,'DeleteAddress'])
    ->name('DeleteAddress');



Route::get('/order-track', function(){
    return view('order-tracking');
})->name('order-track');


Route::get('/admin', function(){
    return view('admin-panel');
})->name('admin');

// Admin Products (front-end only)
Route::get('/admin/products', function(){
    return view('show-&-edit-products');
})->name('admin.products');


// Dashboard data endpoints
Route::get('/admin/orders-data', function(){
    return response()->json([
        'total' => 1250,
        'completed' => 72,
        'types' => [
            ['type' => 'پرداخت‌شده', 'percent' => 50, 'count' => 625],
            ['type' => 'در حال پردازش', 'percent' => 22, 'count' => 275],
            ['type' => 'ارسال‌شده', 'percent' => 20, 'count' => 250],
            ['type' => 'لغو‌شده', 'percent' => 8, 'count' => 100],
        ],
    ]);
})->name('admin.orders-data');

Route::get('/admin/comments-data', function(){
    return response()->json([
        ['author' => 'علی رضایی', 'date' => '1403/07/10', 'text' => 'خیلی عالی بود، ممنون!', 'rating' => 5],
        ['author' => 'مریم احمدی', 'date' => '1403/07/08', 'text' => 'کیفیت معمولی ولی ارسال سریع.', 'rating' => 3],
        ['author' => 'سارا موسوی', 'date' => '1403/07/05', 'text' => 'پشتیبانی خوب بود.', 'rating' => 4],
    ]);
})->name('admin.comments-data');





// Test route for product detail page
Route::get('/produce-show', function () {
    return view('produce-show');
});


Route::get('/add-product', function (Request $request) {
    $category = session('categoryinput'); // از session بخون
        $keys = config($category);
    return view('add-products' , compact('keys'));
})->name('add-products');



Route::POST('/show-and-edit-products', function (Request $request) {
    $categoryinput = $request->input('category');
    if ($categoryinput  == 'LabtopKeys') {
        $category = 'لپتاپ و اولترابوک' ;
    }
    elseif ($categoryinput  == 'MobileKeys') {
        $category = 'موبایل و تلفن هوشمند';
    }
    elseif ($categoryinput  == 'WatchKeys') {
        $category = 'ساعت هوشمند';
    }
    elseif ($categoryinput  == 'َAirPadKeys') {
        $category = 'ایرپاد و هندزفری';
    }
    else {
        $category = 'انتخاب نشده است';
    }
    Session::put('categoryinput', $categoryinput);
    Session::put('category', $category);
    return redirect(route('add-products'));

})->name('show-&-edit-products');

// Route::get('/test', function (Request $request) {
// dd($request);
// })->name('test');



Route::post('/test-upload', function (Request $request) {


        dd($request->all());

})->name('test');


Route::post('/test-upload', function (Request $request) {
    $paths = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            // ذخیره فایل در پوشه public/uploads
            $paths[] = $file->store('uploads', 'public');
        }
    }

    return response()->json([
        'message' => 'شما دارای دسترسی نمی باشید',
        'paths' => $paths,
    ]);
})->name('test');





Route::get('/products', function () {
    return view('products');
})->name('products');
