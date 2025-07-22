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
use App\Http\Controllers\Admin\TopBarSectionController;
use App\Http\Controllers\Admin\VideoSectionController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Instructor\CourseContentController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\Instructor\InstructorProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

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





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

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


    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::resource('profile', StudentProfileController::class);
    Route::post('logout', [StudentDashboardController::class, 'destroy'])
        ->name('logout');
    Route::get('dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
});








require __DIR__ . '/auth.php';
