<?php

use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\becomeInstructorSectionController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\CourseLanguageController;
use App\Http\Controllers\Admin\CourseLevelController;
use App\Http\Controllers\Admin\CourseSubCategoryController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\InstructorRequestController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PaymentSettingsController;
use App\Http\Controllers\Admin\PayoutGatewayController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TopBarSectionController;
use App\Http\Controllers\Admin\VideoSectionController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Instructor\CourseContentController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\Instructor\InstructorOrderController;
use App\Http\Controllers\Instructor\InstructorProfileController;
use App\Http\Controllers\Instructor\InstructorWithdrawController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('course-list', [HomeController::class, 'courseList'])->name('course.list');
Route::get('course-details/{slug}', [HomeController::class, 'courseDetails'])->name('course.details');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('remove-item-cart/{cart_item_id}', [CartController::class, 'removeItemCart'])->name('cart.remove');

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('student.ssl.pay');
Route::post('/success', [SslCommerzPaymentController::class, 'success'])->withoutMiddleware([VerifyCsrfToken::class]);;
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->withoutMiddleware([VerifyCsrfToken::class]);;
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->withoutMiddleware([VerifyCsrfToken::class]);;
//SSLCOMMERZ END



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {



    Route::resource('payout', PayoutGatewayController::class);
    Route::get('smtp-settings', [SettingsController::class, 'smtpSettings'])->name('smtp-settings.index');
    Route::post('comission-settings/update', [SettingsController::class, 'comissionSettingsUpdate'])->name('comission-settings.update');
    Route::get('comission-settings', [SettingsController::class, 'comissionSettings'])->name('comission-settings.index');
    Route::post('logo-settings/update', [SettingsController::class, 'logoSettingsUpdate'])->name('logo-settings.update');
    Route::get('site-settings/logo-settings', [SettingsController::class, 'logoSettings'])->name('logo-settings.index');
    Route::post('general-settings/update', [SettingsController::class, 'generalSettingsUpdate'])->name('general-settings.update');
    Route::get('general-settings', [SettingsController::class, 'generalSettings'])->name('general-settings.index');


    Route::get('orders/show/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');


    Route::post('payment-settings/ssl', [PaymentSettingsController::class, 'sslSettingUpdate'])->name('payment-settings.ssl-update');
    Route::post('payment-settings/stripe', [PaymentSettingsController::class, 'stripeSettingUpdate'])->name('payment-settings.stripe-update');
    Route::post('payment-settings/paypal', [PaymentSettingsController::class, 'paypalSettingUpdate'])->name('payment-settings.paypal-update');
    Route::get('payment-settings', [PaymentSettingsController::class, 'index'])->name('payment-settings.index');


    Route::resource('topbar-section', TopBarSectionController::class);
    Route::resource('course', AdminCourseController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('video-section', VideoSectionController::class);
    Route::resource('become-instructor-section', becomeInstructorSectionController::class);
    Route::resource('news-letter', NewsLetterController::class);

    Route::resource('about-section', AboutSectionController::class);

    Route::resource('features', FeaturesController::class);

    Route::resource('sub-category', CourseSubCategoryController::class);

    Route::resource('category', CourseCategoryController::class);

    Route::resource('course-level', CourseLevelController::class);

    Route::resource('course-lang', CourseLanguageController::class);

    Route::resource('hero-section', HeroController::class);

    Route::resource('instructor-requests', InstructorRequestController::class);

    Route::resource('profile', AdminProfileController::class);

    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AdminDashboardController::class, 'destroy'])
        ->name('logout');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {


    Route::get('withdraw/create', [InstructorWithdrawController::class, 'create'])->name('withdraw.create');
    Route::get('withdraw', [InstructorWithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('orders', [InstructorOrderController::class, 'index'])->name('orders.index');


     Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });



    /**
     * Course Routes
     */

    Route::post('course/delete', [CourseController::class, 'delete'])->name('course.delete');

    Route::post('course-content-chpter-lesson/delete', [CourseContentController::class, 'deleteLesson'])->name('course-content-chapter-lesson.delete');
    Route::post('course-content-chpter-lesson/update', [CourseContentController::class, 'updateLesson'])->name('course-content-chapter-lesson.update');
    Route::get('course-content-chpter-lesson/edit', [CourseContentController::class, 'editLesson'])->name('course-content-chapter-lesson.edit');
    Route::post('course-content-chpter-lesson/store', [CourseContentController::class, 'storeLesson'])->name('course-content-chapter-lesson.store');
    Route::get('course-content-chpter-lesson/create', [CourseContentController::class, 'createLesson'])->name('course-content-chapter-lesson.create');


    Route::post('course-content-chpter/delete', [CourseContentController::class, 'deleteChapter'])->name('course-content-chapter.delete');
    Route::post('course-content-chpter/update', [CourseContentController::class, 'updateChapter'])->name('course-content-chapter.update');
    Route::get('course-content-chpter/edit', [CourseContentController::class, 'editChapter'])->name('course-content-chapter.edit');
    Route::post('course-content-chpter/store', [CourseContentController::class, 'storeChapter'])->name('course-content-chapter.store');
    Route::get('course-content-chpter/create', [CourseContentController::class, 'createChapter'])->name('course-content-chapter.create');

    Route::post('course/update/', [CourseController::class, 'update'])->name('course.update');
    Route::get('course/edit/{course_id}/', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('course/store-basic-info', [CourseController::class, 'storeBasicInfo'])->name('course.storeBasicInfo');
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::get('course', [CourseController::class, 'index'])->name('course.index');

    /**
     * Course Routes
     */

    Route::resource('profile', InstructorProfileController::class);
    Route::post('logout', [InstructorDashboardController::class, 'destroy'])
        ->name('logout');
    Route::get('dashboard', [InstructorDashboardController::class, 'dashboard'])->name('dashboard');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {



    Route::get('order/success', [OrderController::class, 'success'])->name('order.success');

    /**
     * Payment Routes 
     */

    Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');



    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
    /**
     * Payment Routes
     */


    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::resource('profile', StudentProfileController::class);
    Route::post('logout', [StudentDashboardController::class, 'destroy'])
        ->name('logout');
    Route::get('dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
});








require __DIR__ . '/auth.php';
