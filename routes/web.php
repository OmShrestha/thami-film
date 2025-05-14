<?php

use App\Http\Controllers\Admin\SummernoteController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DynamicController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\PortfoliosController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/**
 * Routes for the Website visitors
 * @category Frontend Routes
 */
Route::get('test-route', [TestController::class, 'index'])->name('site.test');

Route::get('/', [WelcomeController::class, 'index'])->name('frontend.index');
Route::get('about', [PagesController::class, 'about'])->name('frontend.about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.index');
Route::get('contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::get('lang/{lang}', [LanguageController::class, 'change'])->name('frontend.changeLanguage');
Route::get('/faq', function () {
    return view('frontend.faq');
});

Route::get('/who-we-are', function () {
    return view('frontend.whoweare');
});
Route::get('/pratham-adhibeshan', function () {
    return view('frontend.firstadhibeshan');
});
Route::get('/donate', function () {
    return view('frontend.donation');
});
Route::get('/membership', function () {
    return view('frontend.membership');
});
Route::get('/adhibeshan', function () {
    return view('frontend.adhibeshan');
});
Route::get('/antarimcommitte', function () {
    return view('frontend.antarimcommitte');
});

Route::get('/sansthasanthapan', function () {
    return view('frontend.sansthasanthapan');
});
Route::get('/sangathansangrachana', function () {
    return view('frontend.sangathansangrachana');
});

Route::get('/kendriasachivalaye', [TeamController::class, 'sachivalaye'])->name('frontend.sachivalaye');
Route::get('/kendriacommitte', [TeamController::class, 'committe'])->name('frontend.committe');
// Route::get('/kendriasachivalaye', function () {
//     return view('frontend.kendriasachivalaye');
// });
// Route::get('/kedriacommitte', function () {
//     return view('frontend.kendriacommitee');
// });
Route::get('/advisory', function () {
    return view('frontend.advisory');
});

Route::get('/anugamanbibag', function () {
    return view('frontend.anugamanbibag');
});

Route::get('/sangathanbibag', function () {
    return view('frontend.sangathanbibag');
});

Route::get('/schoolbibag', function () {
    return view('frontend.schoolbibag');
});

Route::get('/mahilabibag', function () {
    return view('frontend.mahilabibag');
});

Route::get('/mahilasasaktikaran', function () {
    return view('frontend.mahilasasaktikaran');
});

Route::get('/nrna', function () {
    return view('frontend.nrna');
});

Route::get('/arthikbibag', function () {
    return view('frontend.arthikbibag');
});

Route::get('/paryatanbibag', function () {
    return view('frontend.paryatanbibag');
});

Route::get('/kalasahitya', function () {
    return view('frontend.kalasahitya');
});

Route::get('/sramtaharojgar', function () {
    return view('frontend.sramtaharojgar');
});

Route::get('/gyanship', function () {
    return view('frontend.gyanship');
});

Route::get('/budhijivi', function () {
    return view('frontend.budhijivi');
});

Route::get('/udyog', function () {
    return view('frontend.udyog');
});
Route::get('/atiriktabibag', function () {
    return view('frontend.atiriktabibag');
});
Route::get('/budhijivi', function () {
    return view('frontend.atiriktabibag');
});

Route::get('/nepallagani', function () {
    return view('frontend.nepallagani');
});
Route::get('/yuwathakhelkud', function () {
    return view('frontend.yuwatathakhelkud');
});
Route::get('/kanunbibag', function () {
    return view('frontend.kanunbibag');
});

Route::get('/bidhharthibibag', function () {
    return view('frontend.bidhharthibibag');
});
Route::get('/swasthyebibag', function () {
    return view('frontend.swasthyebibag');
});

Route::get('/prachartathaprakashan', function () {
    return view('frontend.prachartathaprakashan');
});

Route::get('/karyalayabebasthapanbibag', function () {
    return view('frontend.karyalayabebasthapanbibag');
});

Route::get('/america', function () {
    return view('frontend.america');
});

Route::get('/europe', function () {
    return view('frontend.europe');
});

Route::get('/centralcountry', function () {
    return view('frontend.centralcountry');
});

Route::get('/asian', function () {
    return view('frontend.asian');
});

Route::get('/osinia', function () {
    return view('frontend.osinia');
});

Route::get('/donor-success/{amount}', [MemberController::class, 'donor_status'])->name('donor.success');
Route::post('/user-donate', [MemberController::class, 'donate'])->name('frontend.donate.user');
Route::post('/member-user', [MemberController::class, 'donate'])->name('frontend.member.user');
/**
 * Routes for the Blogs Posts
 * @category Blogs Routes
 */
Route::group(['as' => 'blogs.', 'middleware' => ['web', 'set.lang']], function () {
    Route::resource('/blogs', BlogsController::class)->only(['index']);
    Route::get('blogs/cat/{category}', [BlogsController::class, 'category'])->name('category');
    Route::get('blogs/tag/{tag}', [BlogsController::class, 'tag'])->name('tag');
    Route::get('blog/{blog}', [BlogsController::class, 'show'])->name('show');
});

/**
 * Routes for Services
 * @category Services Routes
 */
Route::group(['as' => 'frontend.', 'middleware' => ['web', 'set.lang']], function () {
    Route::resource('/services', ServicesController::class)->only(['index']);
    Route::get('service/cat/{category}', [ServicesController::class, 'category'])->name('service.category');
    Route::get('service/{category?}/{service}', [ServicesController::class, 'show'])->name('service.show');
});

/**
 * Routes for Portfolios
 * @category Portfolios Routes
 */
Route::group(['as' => 'frontend.', 'middleware' => ['web', 'set.lang']], function () {
    Route::resource('/portfolios', PortfoliosController::class)->only(['index', 'show']);
});

Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');

/**
 * Routes for the File and Media Manager
 * @category FileManager Routes
 */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin', 'setLfmPath']], function () {
    Lfm::routes();
    Route::post('summernote/upload', [SummernoteController::class, 'uploadFileManager'])->name('lfm.summernote.upload');
});

/**
 * Routes loaded from the database for dynamic permalink urls
 * @category Dynamic Page Builder Routes
 * @author Sushant <sushantp.com.np>
 */
Route::group(['middleware' => 'set.lang'], function () {
    Route::get('{slug}', [DynamicController::class, 'index'])->name('frontend.dynamicPage');
});
