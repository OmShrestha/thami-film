<?php
use App\Http\Controllers\Admin\ApproachController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BasicController;
use App\Http\Controllers\Admin\BasicSettingsUpdateController;
use App\Http\Controllers\Admin\BcategoryController;
use App\Http\Controllers\Admin\GcategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogsectionController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\FAQCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ForgetController;
use App\Http\Controllers\Admin\GatewayController;
use App\Http\Controllers\Admin\HerosectionController;
use App\Http\Controllers\Admin\IntrosectionController;
use App\Http\Controllers\Admin\JcategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfoliosectionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PushController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RssFeedsController;
use App\Http\Controllers\Admin\ScategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicesectionController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SummernoteController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TopicsController;
use App\Http\Controllers\Admin\UlinkController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Routes for the Admin Panel and Administrators
 *
 * @category Backend Routes
 */

//Set session for site id for multi-site functionality
Route::get('site-session', [DashboardController::class, 'setSiteSession'])->name('admin.setSiteSession');

Route::get(config('onf.admin_login_url'), [App\Http\Controllers\Admin\LoginController::class, 'login'])
    ->name('admin.login')
    ->middleware('guest:admin');

Route::group(['middleware' => 'guest:admin'], function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.auth');

    Route::get('/mail-form', [ForgetController::class, 'mailForm'])->name('admin.forget.form');
    Route::post('/sendmail', [ForgetController::class, 'sendmail'])->name('admin.forget.mail');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'check.status', 'setLfmPath']], function () {

    // Summernote image upload
    Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('admin.summernote.upload');

    // Admin logout Route
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'check.permission:Dashboard'], function () {
        // Admin Dashboard Routes
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Admin Profile Routes
    Route::get('/changePassword', [ProfileController::class, 'changePass'])->name('admin.changePass');
    Route::post('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('admin.editProfile');
    Route::post('/propic/update', [ProfileController::class, 'updatePropic'])->name('admin.propic.update');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.updateProfile');

    Route::group(['middleware' => 'check.permission:Theme & Home'], function () {
        // Admin Home Version Setting Routes
        Route::get('/home-settings', [BasicController::class, 'homeSettings'])->name('admin.homeSettings');
        Route::post('/homeSettings/post', [BasicController::class, 'updateHomeSettings'])->name('admin.homeSettings.update');

        //Domains
        Route::get('/domains', [DomainController::class, 'index'])->name('admin.domains');
        Route::post('/domains/post', [DomainController::class, 'update'])->name('admin.domains.update');
    });

    Route::group(['middleware' => 'check.permission:Basic Settings'], function () {

        // Admin File Manager Routes
        Route::get('/file-manager', [BasicController::class, 'fileManager'])->name('admin.file-manager');

        // Admin Logo Routes
        Route::get('/logo', [BasicController::class, 'logo'])->name('admin.logo');
        Route::post('/logo/post', [BasicController::class, 'updatelogo'])->name('admin.logo.update');

        // Admin preloader Routes
        Route::get('/preloader', [BasicController::class, 'preloader'])->name('admin.preloader');
        Route::post('/preloader/post', [BasicController::class, 'updatepreloader'])->name('admin.preloader.update');

        // Admin Scripts Routes
        Route::get('/feature/settings', [BasicController::class, 'featuresettings'])->name('admin.featuresettings');
        Route::post('/feature/settings/update', [BasicController::class, 'updatefeatrue'])->name('admin.featuresettings.update');

        // Admin Basic Information Routes
        Route::get('/basicinfo', [BasicController::class, 'basicinfo'])->name('admin.basicinfo');
        Route::post('/basicinfo/post', [BasicController::class, 'updatebasicinfo'])->name('admin.basicinfo.update');

        // Admin Basic Settings for the website Routes
        Route::get('/update-settings', [BasicSettingsUpdateController::class, 'index'])->name('admin.update-settings');
        Route::post('/update-settings/post', [BasicSettingsUpdateController::class, 'update'])->name('admin.basic-settings.update');

        // Admin Email Settings Routes
        Route::get('/mail-from-admin', [EmailController::class, 'mailFromAdmin'])->name('admin.mailFromAdmin');
        Route::post('/mail-from-admin/update', [EmailController::class, 'updateMailFromAdmin'])->name('admin.mailfromadmin.update');
        Route::get('/mail-to-admin', [EmailController::class, 'mailToAdmin'])->name('admin.mailToAdmin');
        Route::post('/mail-to-admin/update', [EmailController::class, 'updateMailToAdmin'])->name('admin.mailtoadmin.update');

        // Admin Support Routes
        Route::get('/support', [BasicController::class, 'support'])->name('admin.support');
        Route::post('/support/{langid}/post', [BasicController::class, 'updatesupport'])->name('admin.support.update');

        // Admin Page Heading Routes
        Route::get('/heading', [BasicController::class, 'heading'])->name('admin.heading');
        Route::post('/heading/{langid}/update', [BasicController::class, 'updateheading'])->name('admin.heading.update');

        // Admin Scripts Routes
        Route::get('/script', [BasicController::class, 'script'])->name('admin.script');
        Route::post('/script/update', [BasicController::class, 'updatescript'])->name('admin.script.update');

        // Admin Social Routes
        Route::get('/social', [SocialController::class, 'index'])->name('admin.social.index');
        Route::post('/social/store', [SocialController::class, 'store'])->name('admin.social.store');
        Route::get('/social/{id}/edit', [SocialController::class, 'edit'])->name('admin.social.edit');
        Route::post('/social/update', [SocialController::class, 'update'])->name('admin.social.update');
        Route::post('/social/delete', [SocialController::class, 'delete'])->name('admin.social.delete');

        // Admin SEO Information Routes
        Route::get('/seo', [BasicController::class, 'seo'])->name('admin.seo');
        Route::post('/seo/{langid}/update', [BasicController::class, 'updateseo'])->name('admin.seo.update');

        // Admin Maintenance Mode Routes
        Route::get('/maintainance', [BasicController::class, 'maintainance'])->name('admin.maintainance');
        Route::post('/maintainance/update', [BasicController::class, 'updatemaintainance'])->name('admin.maintainance.update');

        // Admin Section Customization Routes
        Route::get('/sections', [BasicController::class, 'sections'])->name('admin.sections.index');
        Route::post('/sections/update', [BasicController::class, 'updatesections'])->name('admin.sections.update');

        // Admin Section Customization Routes
        Route::get('/sections', [BasicController::class, 'sections'])->name('admin.sections.index');
        Route::post('/sections/update', [BasicController::class, 'updatesections'])->name('admin.sections.update');

        // Admin Section Customization Routes
        Route::get('/sections', [BasicController::class, 'sections'])->name('admin.sections.index');
        Route::post('/sections/update', [BasicController::class, 'updatesections'])->name('admin.sections.update');

        // Admin Payment Gateways
        Route::get('/gateways', [GatewayController::class, 'index'])->name('admin.gateway.index');
        Route::post('/stripe/update', [GatewayController::class, 'stripeUpdate'])->name('admin.stripe.update');
        Route::post('/paypal/update', [GatewayController::class, 'paypalUpdate'])->name('admin.paypal.update');

        Route::get('/offline/gateways', [GatewayController::class, 'offline'])->name('admin.gateway.offline');
        Route::post('/offline/gateway/store', [GatewayController::class, 'store'])->name('admin.gateway.offline.store');
        Route::post('/offline/gateway/update', [GatewayController::class, 'update'])->name('admin.gateway.offline.update');
        Route::post('/offline/status', [GatewayController::class, 'status'])->name('admin.offline.status');
        Route::post('/offline/gateway/delete', [GatewayController::class, 'delete'])->name('admin.offline.gateway.delete');

        // Admin Language Routes
        Route::get('/languages', [LanguageController::class, 'index'])->name('admin.language.index');
        Route::get('/language/{id}/edit', [LanguageController::class, 'edit'])->name('admin.language.edit');
        Route::get('/language/{id}/edit/keyword', [LanguageController::class, 'editKeyword'])->name('admin.language.editKeyword');
        Route::post('/language/store', [LanguageController::class, 'store'])->name('admin.language.store');
        Route::post('/language/upload', [LanguageController::class, 'upload'])->name('admin.language.upload');
        Route::post('/language/{id}/uploadUpdate', [LanguageController::class, 'uploadUpdate'])->name('admin.language.uploadUpdate');
        Route::post('/language/{id}/default', [LanguageController::class, 'default'])->name('admin.language.default');
        Route::post('/language/{id}/delete', [LanguageController::class, 'delete'])->name('admin.language.delete');
        Route::post('/language/update', [LanguageController::class, 'update'])->name('admin.language.update');
        Route::post('/language/{id}/update/keyword', [LanguageController::class, 'updateKeyword'])->name('admin.language.updateKeyword');

        // Admin Sitemap Routes
        Route::get('/sitemap', [SitemapController::class, 'index'])->name('admin.sitemap.index');
        Route::post('/sitemap/store', [SitemapController::class, 'store'])->name('admin.sitemap.store');
        Route::get('/sitemap/{id}/update', [SitemapController::class, 'update'])->name('admin.sitemap.update');
        Route::post('/sitemap/{id}/delete', [SitemapController::class, 'delete'])->name('admin.sitemap.delete');
        Route::post('/sitemap/download', [SitemapController::class, 'download'])->name('admin.sitemap.download');

        // Admin Cache Clear Routes
        Route::get('/cache-clear', [CacheController::class, 'clear'])->name('admin.cache.clear');
    });

    Route::group(['middleware' => 'check.permission:Content Management'], function () {
        // Admin Hero Section (Static Version) Routes
        Route::get('/herosection/static', [HerosectionController::class, 'static'])->name('admin.herosection.static');
        Route::post('/herosection/{langid}/update', [HerosectionController::class, 'update'])->name('admin.herosection.update');

        // Admin Hero Section (Video Version) Routes
        Route::get('/herosection/video', [HerosectionController::class, 'video'])->name('admin.herosection.video');
        Route::post('/herosection/video/{langid}/update', [HerosectionController::class, 'videoupdate'])->name('admin.herosection.video.update');

        // Admin Hero Section (Slider Version) Routes
        Route::get('/herosection/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::post('/herosection/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/herosection/slider/{id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('/herosection/sliderupdate', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::post('/herosection/slider/delete', [SliderController::class, 'delete'])->name('admin.slider.delete');

        // Admin Feature Routes
        Route::get('/features', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::post('/feature/store', [FeatureController::class, 'store'])->name('admin.feature.store');
        Route::get('/feature/{id}/edit', [FeatureController::class, 'edit'])->name('admin.feature.edit');
        Route::post('/feature/update', [FeatureController::class, 'update'])->name('admin.feature.update');
        Route::post('/feature/delete', [FeatureController::class, 'delete'])->name('admin.feature.delete');

        // Admin Intro Section Routes
        Route::get('/introsection', [IntrosectionController::class, 'index'])->name('admin.introsection.index');
        Route::post('/introsection/{langid}/update', [IntrosectionController::class, 'update'])->name('admin.introsection.update');

        // Admin Service Section Routes
        Route::get('/servicesection', [ServicesectionController::class, 'index'])->name('admin.servicesection.index');
        Route::post('/servicesection/{langid}/update', [ServicesectionController::class, 'update'])->name('admin.servicesection.update');

        // Admin Approach Section Routes
        Route::get('/approach', [ApproachController::class, 'index'])->name('admin.approach.index');
        Route::post('/approach/store', [ApproachController::class, 'store'])->name('admin.approach.point.store');
        Route::get('/approach/{id}/pointedit', [ApproachController::class, 'pointedit'])->name('admin.approach.point.edit');
        Route::post('/approach/{langid}/update', [ApproachController::class, 'update'])->name('admin.approach.update');
        Route::post('/approach/pointupdate', [ApproachController::class, 'pointupdate'])->name('admin.approach.point.update');
        Route::post('/approach/pointdelete', [ApproachController::class, 'pointdelete'])->name('admin.approach.pointdelete');

        // Admin Statistic Section Routes
        Route::get('/statistics', [StatisticsController::class, 'index'])->name('admin.statistics.index');
        Route::post('/statistics/{langid}/upload', [StatisticsController::class, 'upload'])->name('admin.statistics.upload');
        Route::post('/statistics/store', [StatisticsController::class, 'store'])->name('admin.statistics.store');
        Route::get('/statistics/{id}/edit', [StatisticsController::class, 'edit'])->name('admin.statistics.edit');
        Route::post('/statistics/update', [StatisticsController::class, 'update'])->name('admin.statistics.update');
        Route::post('/statistics/delete', [StatisticsController::class, 'delete'])->name('admin.statistics.delete');

        // Admin Call to Action Section Routes
        Route::get('/cta', [CtaController::class, 'index'])->name('admin.cta.index');
        Route::post('/cta/{langid}/update', [CtaController::class, 'update'])->name('admin.cta.update');

        // Admin Portfolio Section Routes
        Route::get('/portfoliosection', [PortfoliosectionController::class, 'index'])->name('admin.portfoliosection.index');
        Route::post('/portfoliosection/{langid}/update', [PortfoliosectionController::class, 'update'])->name('admin.portfoliosection.update');

        // Admin Testimonial Routes
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
        Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::post('/testimonial/update', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::post('/testimonial/delete', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
        Route::post('/testimonialtext/{langid}/update', [TestimonialController::class, 'textupdate'])->name('admin.testimonialtext.update');

        // Admin Blog Section Routes
        Route::get('/blogsection', [BlogsectionController::class, 'index'])->name('admin.blogsection.index');
        Route::post('/blogsection/{langid}/update', [BlogsectionController::class, 'update'])->name('admin.blogsection.update');

        // Admin Partner Routes
        Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partner.index');
        Route::post('/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/partner/{id}/edit', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/partner/update', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::post('/partner/delete', [PartnerController::class, 'delete'])->name('admin.partner.delete');

        // Admin Award Routes
        Route::get('/awards', [AwardController::class, 'index'])->name('admin.award.index');
        Route::post('/award/store', [AwardController::class, 'store'])->name('admin.award.store');
        Route::get('/award/{id}/edit', [AwardController::class, 'edit'])->name('admin.award.edit');
        Route::post('/award/update', [AwardController::class, 'update'])->name('admin.award.update');
        Route::post('/award/delete', [AwardController::class, 'delete'])->name('admin.award.delete');

        // Admin Member Routes
        Route::get('/teams', [TeamController::class, 'index'])->name('admin.team.index');
        Route::get('/team/create', [TeamController::class, 'create'])->name('admin.team.create');
        Route::post('/team/store', [TeamController::class, 'store'])->name('admin.team.store');
        Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('admin.team.edit');
        Route::post('/team/update', [TeamController::class, 'update'])->name('admin.team.update');
        Route::post('/team/delete', [TeamController::class, 'delete'])->name('admin.team.delete');
        Route::post('/teamtext/{langid}/update', [TeamController::class, 'textupdate'])->name('admin.teamtext.update');
        Route::post('/team/feature', [TeamController::class, 'feature'])->name('admin.team.feature');

        // Admin Footer Logo Text Routes
        Route::get('/footers', [FooterController::class, 'index'])->name('admin.footer.index');
        Route::post('/footer/{langid}/update', [FooterController::class, 'update'])->name('admin.footer.update');

        // Admin Ulink Routes
        Route::get('/ulinks', [UlinkController::class, 'index'])->name('admin.ulink.index');
        Route::get('/ulink/create', [UlinkController::class, 'create'])->name('admin.ulink.create');
        Route::post('/ulink/store', [UlinkController::class, 'store'])->name('admin.ulink.store');
        Route::get('/ulink/{id}/edit', [UlinkController::class, 'edit'])->name('admin.ulink.edit');
        Route::post('/ulink/update', [UlinkController::class, 'update'])->name('admin.ulink.update');
        Route::post('/ulink/delete', [UlinkController::class, 'delete'])->name('admin.ulink.delete');

        // Service Settings Route
        Route::get('/service/settings', [ServiceController::class, 'settings'])->name('admin.service.settings');
        Route::post('/service/updateSettings', [ServiceController::class, 'updateSettings'])->name('admin.service.updateSettings');

        // Admin Service Category Routes
        Route::get('/scategorys', [ScategoryController::class, 'index'])->name('admin.scategory.index');
        Route::post('/scategory/store', [ScategoryController::class, 'store'])->name('admin.scategory.store');
        Route::get('/scategory/{id}/edit', [ScategoryController::class, 'edit'])->name('admin.scategory.edit');
        Route::post('/scategory/update', [ScategoryController::class, 'update'])->name('admin.scategory.update');
        Route::post('/scategory/delete', [ScategoryController::class, 'delete'])->name('admin.scategory.delete');
        Route::post('/scategory/bulk-delete', [ScategoryController::class, 'bulkDelete'])->name('admin.scategory.bulk.delete');
        Route::post('/scategory/feature', [ScategoryController::class, 'feature'])->name('admin.scategory.feature');

        // Admin Services Routes
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::post('/service/update', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::post('/service/delete', [ServiceController::class, 'delete'])->name('admin.service.delete');
        Route::post('/service/bulk-delete', [ServiceController::class, 'bulkDelete'])->name('admin.service.bulk.delete');
        Route::get('/service/{langid}/getcats', [ServiceController::class, 'getcats'])->name('admin.service.getcats');
        Route::post('/service/feature', [ServiceController::class, 'feature'])->name('admin.service.feature');
        Route::post('/service/sidebar', [ServiceController::class, 'sidebar'])->name('admin.service.sidebar');

        // Admin Portfolio Routes
        Route::get('/portfolios', [PortfolioController::class, 'index'])->name('admin.portfolio.index');
        Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
        Route::post('/portfolio/sliderstore', [PortfolioController::class, 'sliderstore'])->name('admin.portfolio.sliderstore');
        Route::post('/portfolio/sliderrmv', [PortfolioController::class, 'sliderrmv'])->name('admin.portfolio.sliderrmv');
        Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
        Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
        Route::get('/portfolio/{id}/images', [PortfolioController::class, 'images'])->name('admin.portfolio.images');
        Route::post('/portfolio/sliderupdate', [PortfolioController::class, 'sliderupdate'])->name('admin.portfolio.sliderupdate');
        Route::post('/portfolio/update', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
        Route::post('/portfolio/delete', [PortfolioController::class, 'delete'])->name('admin.portfolio.delete');
        Route::post('/portfolio/bulk-delete', [PortfolioController::class, 'bulkDelete'])->name('admin.portfolio.bulk.delete');
        Route::get('portfolio/{id}/getservices', [PortfolioController::class, 'getservices'])->name('admin.portfolio.getservices');
        Route::post('/portfolio/feature', [PortfolioController::class, 'feature'])->name('admin.portfolio.feature');

        // Admin Blog Category Routes
        Route::get('/bcategorys', [BcategoryController::class, 'index'])->name('admin.bcategory.index');
        Route::post('/bcategory/store', [BcategoryController::class, 'store'])->name('admin.bcategory.store');
        Route::post('/bcategory/update', [BcategoryController::class, 'update'])->name('admin.bcategory.update');
        Route::post('/bcategory/delete', [BcategoryController::class, 'delete'])->name('admin.bcategory.delete');
        Route::post('/bcategory/bulk-delete', [BcategoryController::class, 'bulkDelete'])->name('admin.bcategory.bulk.delete');

        // Admin Gallery Category Routes
        Route::get('/gcategorys', [GcategoryController::class, 'index'])->name('admin.gcategory.index');
        Route::get('/gallery/{langId}/get_categories', [GcategoryController::class, 'getCategories']);
        Route::post('/gcategory/store', [GcategoryController::class, 'store'])->name('admin.gallery.store_category');
        Route::post('/gcategory/update', [GcategoryController::class, 'update'])->name('admin.gallery.update_category');
        Route::post('/gcategory/delete', [GcategoryController::class, 'delete'])->name('admin.gallery.delete_category');
        Route::post('/gcategory/bulk-delete', [GcategoryController::class, 'bulkDelete'])->name('admin.gallery.bulk_delete_category');

        // Admin Subcategory Routes
        Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategory.index');
        Route::post('/subcategory/store', [SubcategoryController::class, 'store'])->name('admin.subcategory.store');
        Route::post('/subcategory/update', [SubcategoryController::class, 'update'])->name('admin.subcategory.update');
        Route::post('/subcategory/delete', [SubcategoryController::class, 'delete'])->name('admin.subcategory.delete');
        Route::post('/subcategory/bulk-delete', [SubcategoryController::class, 'bulkDelete'])->name('admin.subcategory.bulk.delete');

        // Admin Topics Routes
        Route::get('/topics', [TopicsController::class, 'index'])->name('admin.topic.index');
        Route::post('/topic/store', [TopicsController::class, 'store'])->name('admin.topic.store');
        Route::post('/topic/update', [TopicsController::class, 'update'])->name('admin.topic.update');
        Route::post('/topic/delete', [TopicsController::class, 'delete'])->name('admin.topic.delete');
        Route::post('/topic/bulk-delete', [TopicsController::class, 'bulkDelete'])->name('admin.topic.bulk.delete');

        // Admin Tags Routes
        Route::get('/tags', [TagsController::class, 'index'])->name('admin.tag.index');
        Route::post('/tag/store', [TagsController::class, 'store'])->name('admin.tag.store');
        Route::post('/tag/update', [TagsController::class, 'update'])->name('admin.tag.update');
        Route::post('/tag/delete', [TagsController::class, 'delete'])->name('admin.tag.delete');
        Route::post('/tag/bulk-delete', [TagsController::class, 'bulkDelete'])->name('admin.tag.bulk.delete');
  
          Route::get('/tags/search', [TagsController::class, 'search'])->name('admin.tags.search');
          Route::post('/tags/create', [TagsController::class, 'create'])->name('admin.tags.create');

        Route::get('/rtlcheck/{langid}', [LanguageController::class, 'rtlcheck'])->name('admin.rtlcheck');

         // Admin Blog Routes
         Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blog.index');
         Route::get('/blogs-ajax', [BlogController::class, 'getAjaxBlogs'])->name('admin.blog.ajax');
         Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
         Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
         Route::post('/blog/update', [BlogController::class, 'update'])->name('admin.blog.update');
         Route::post('/blog/delete', [BlogController::class, 'delete'])->name('admin.blog.delete');
         Route::post('/blog/bulk-delete', [BlogController::class, 'bulkDelete'])->name('admin.blog.bulk.delete');
         Route::get('/blog/{langid}/getcats', [BlogController::class, 'getcats'])->name('admin.blog.getcats');
         Route::post('/blog/sidebar', [BlogController::class, 'sidebar'])->name('admin.blog.sidebar');
         

        // Admin Gallery Routes
        Route::get('/galleries', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::post('/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::post('/gallery/update', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::post('/blog/delete', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
        Route::get('/blog/{langid}/getcats', [GalleryController::class, 'getcats'])->name('admin.gallery.getcats');
        Route::post('/blog/sidebar', [GalleryController::class, 'sidebar'])->name('admin.gallery.sidebar');

        // Admin News Category Routes
        Route::get('/news-category', [NewsCategoryController::class, 'index'])->name('admin.news-category.index');
        Route::post('/news-category/store', [NewsCategoryController::class, 'store'])->name('admin.news-category.store');
        Route::post('/news-category/update', [NewsCategoryController::class, 'update'])->name('admin.news-category.update');
        Route::post('/news-category/delete', [NewsCategoryController::class, 'delete'])->name('admin.news-category.delete');
        Route::post('/news-category/bulk-delete', [NewsCategoryController::class, 'bulkDelete'])->name('admin.news-category.bulk.delete');

        // Admin News Routes
        Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
        Route::post('/news/store', [NewsController::class, 'store'])->name('admin.news.store');
        Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
        Route::post('/news/update', [NewsController::class, 'update'])->name('admin.news.update');
        Route::post('/news/delete', [NewsController::class, 'delete'])->name('admin.news.delete');
        Route::post('/news/bulk-delete', [NewsController::class, 'bulkDelete'])->name('admin.news.bulk.delete');
        Route::get('/news/{langid}/getcats', [NewsController::class, 'getcats'])->name('admin.news.getcats');
        Route::post('/news/sidebar', [NewsController::class, 'sidebar'])->name('admin.news.sidebar');

        // Admin Blog Archive Routes
        Route::get('/archives', [ArchiveController::class, 'index'])->name('admin.archive.index');
        Route::post('/archive/store', [ArchiveController::class, 'store'])->name('admin.archive.store');
        Route::post('/archive/update', [ArchiveController::class, 'update'])->name('admin.archive.update');
        Route::post('/archive/delete', [ArchiveController::class, 'delete'])->name('admin.archive.delete');

        // Admin FAQ Settings Routes
        Route::get('/faq/settings', [FAQCategoryController::class, 'settings'])->name('admin.faq.settings');
        Route::post('/faq/update_settings', [FAQCategoryController::class, 'updateSettings'])->name('admin.faq.update_settings');
        // Admin FAQ Category Routes
        Route::get('/faq/categories', [FAQCategoryController::class, 'index'])->name('admin.faq.categories');
        Route::post('/faq/store_category', [FAQCategoryController::class, 'store'])->name('admin.faq.store_category');
        Route::post('/faq/update_category', [FAQCategoryController::class, 'update'])->name('admin.faq.update_category');
        Route::post('/faq/delete_category', [FAQCategoryController::class, 'delete'])->name('admin.faq.delete_category');
        Route::post('/faq/bulk_delete_category', [FAQCategoryController::class, 'bulkDelete'])->name('admin.faq.bulk_delete_category');
        // Admin FAQ Routes
        Route::get('/faqs', [FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
        Route::get('/faq/{langId}/get_categories', [FaqController::class, 'getCategories']);
        Route::post('/faq/store', [FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::post('/faq/update', [FaqController::class, 'update'])->name('admin.faq.update');
        Route::post('/faq/delete', [FaqController::class, 'delete'])->name('admin.faq.delete');
        Route::post('/faq/bulk-delete', [FaqController::class, 'bulkDelete'])->name('admin.faq.bulk.delete');

        // Admin Job Category Routes
        Route::get('/jcategorys', [JcategoryController::class, 'index'])->name('admin.jcategory.index');
        Route::post('/jcategory/store', [JcategoryController::class, 'store'])->name('admin.jcategory.store');
        Route::get('/jcategory/{id}/edit', [JcategoryController::class, 'edit'])->name('admin.jcategory.edit');
        Route::post('/jcategory/update', [JcategoryController::class, 'update'])->name('admin.jcategory.update');
        Route::post('/jcategory/delete', [JcategoryController::class, 'delete'])->name('admin.jcategory.delete');
        Route::post('/jcategory/bulk-delete', [JcategoryController::class, 'bulkDelete'])->name('admin.jcategory.bulk.delete');
        // Admin Jobs Routes
        Route::get('/jobs', [JobController::class, 'index'])->name('admin.job.index');
        Route::get('/job/create', [JobController::class, 'create'])->name('admin.job.create');
        Route::post('/job/store', [JobController::class, 'store'])->name('admin.job.store');
        Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('admin.job.edit');
        Route::post('/job/update', [JobController::class, 'update'])->name('admin.job.update');
        Route::post('/job/delete', [JobController::class, 'delete'])->name('admin.job.delete');
        Route::post('/job/bulk-delete', [JobController::class, 'bulkDelete'])->name('admin.job.bulk.delete');
        Route::get('/job/{langid}/getcats', [JobController::class, 'getcats'])->name('admin.job.getcats');

        // Admin Contact Routes
        Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::post('/contact/{langid}/post', [ContactController::class, 'update'])->name('admin.contact.update');
    });

    Route::group(['middleware' => 'check.permission:Content Management'], function () {
        // Admin Article Category Routes
        Route::get('/article_categories', [ArticleCategoryController::class, 'index'])->name('admin.article_category.index');
        Route::post('/article_category/store', [ArticleCategoryController::class, 'store'])->name('admin.article_category.store');
        Route::post('/article_category/update', [ArticleCategoryController::class, 'update'])->name('admin.article_category.update');
        Route::post('/article_category/delete', [ArticleCategoryController::class, 'delete'])->name('admin.article_category.delete');
        Route::post('/article_category/bulk_delete', [ArticleCategoryController::class, 'bulkDelete'])->name('admin.article_category.bulk_delete');

        // Admin Article Routes
        Route::get('/articles', [ArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/article/{langId}/get_categories', [ArticleController::class, 'getCategories']);
        Route::post('/article/store', [ArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/article/update', [ArticleController::class, 'update'])->name('admin.article.update');
        Route::post('/article/delete', [ArticleController::class, 'delete'])->name('admin.article.delete');
        Route::post('/article/bulk_delete', [ArticleController::class], 'bulkDelete')->name('admin.article.bulk_delete');
    });


    Route::group(['middleware' => 'check.permission:Menu Builder'], function () {
        // Mega Menus Management Routes
        Route::get('/megamenus', [MenuBuilderController::class, 'megamenus'])->name('admin.megamenus');
        Route::get('/megamenus/edit', [MenuBuilderController::class, 'megaMenuEdit'])->name('admin.megamenu.edit');
        Route::post('/megamenus/update', [MenuBuilderController::class, 'megaMenuUpdate'])->name('admin.megamenu.update');

        // Menus Builder Management Routes
        Route::get('/menu-builder', [MenuBuilderController::class, 'index'])->name('admin.menu_builder.index');
        Route::post('/menu-builder/update', [MenuBuilderController::class, 'update'])->name('admin.menu_builder.update');

        // Permalinks Routes
        Route::get('/permalinks', [MenuBuilderController::class, 'permalinks'])->name('admin.permalinks.index');
        Route::post('/permalinks/update', [MenuBuilderController::class, 'permalinksUpdate'])->name('admin.permalinks.update');
    });

    Route::group(['middleware' => 'check.permission:Announcement Popup'], function () {
        Route::get('popups', [PopupController::class, 'index'])->name('admin.popup.index');
        Route::get('popup/types', [PopupController::class, 'types'])->name('admin.popup.types');
        Route::get('popup/{id}/edit', [PopupController::class, 'edit'])->name('admin.popup.edit');
        Route::get('popup/create', [PopupController::class, 'create'])->name('admin.popup.create');
        Route::post('popup/store', [PopupController::class, 'store'])->name('admin.popup.store');
        Route::post('popup/delete', [PopupController::class, 'delete'])->name('admin.popup.delete');
        Route::post('popup/bulk-delete', [PopupController::class, 'bulkDelete'])->name('admin.popup.bulk.delete');
        Route::post('popup/status', [PopupController::class, 'status'])->name('admin.popup.status');
        Route::post('popup/update', [PopupController::class, 'update'])->name('admin.popup.update');
    });

    Route::group(['middleware' => 'check.permission:Pages'], function () {
        // Menu Manager Routes
        Route::get('/pages', [PageController::class, 'index'])->name('admin.page.index');
        Route::get('/page/settings', [PageController::class, 'settings'])->name('admin.page.settings');
        Route::post('/page/update-settings', [PageController::class, 'updateSettings'])->name('admin.page.updateSettings');
        Route::get('/page/create', [PageController::class, 'create'])->name('admin.page.create');
        Route::post('/page/store', [PageController::class, 'store'])->name('admin.page.store');
        Route::get('/page/{menuID}/edit', [PageController::class, 'edit'])->name('admin.page.edit');
        Route::post('/page/update', [PageController::class, 'update'])->name('admin.page.update');
        Route::post('/page/delete', [PageController::class, 'delete'])->name('admin.page.delete');
        Route::post('/page/bulk-delete', [PageController::class, 'bulkDelete'])->name('admin.page.bulk.delete');
        Route::post('/upload/pagebuilder', [PageController::class, 'uploadPbImage'])->name('admin.pb.upload');
        Route::post('/remove/img/pagebuilder', [PageController::class, 'removePbImage'])->name('admin.pb.remove');
        Route::post('/upload/tui/pagebuilder', [PageController::class, 'uploadPbTui'])->name('admin.pb.tui.upload');
    });

    // Page Builder Routes
    Route::get('/pagebuilder/content', [PageBuilderController::class, 'content'])->name('admin.pagebuilder.content');
    Route::post('/pagebuilder/save', [PageBuilderController::class, 'save'])->name('admin.pagebuilder.save');

    Route::group(['middleware' => 'check.permission:Users Management'], function () {
        // Admin Subscriber Routes
        Route::get('/subscribers', [SubscriberController::class, 'index'])->name('admin.subscriber.index');
        Route::get('/mail/subscriber', [SubscriberController::class, 'mailsubscriber'])->name('admin.mail.subscriber');
        Route::post('/subscribers/sendmail', [SubscriberController::class, 'subscsendmail'])->name('admin.subscribers.sendmail');
        Route::post('/subscriber/delete', [SubscriberController::class, 'delete'])->name('admin.subscriber.delete');
        Route::post('/subscriber/bulk-delete', [SubscriberController::class, 'bulkDelete'])->name('admin.subscriber.bulk.delete');
    });

    Route::group(['middleware' => 'check.permission:RSS Feeds'], function () {
        // Admin RSS feed Routes
        Route::get('/rss', [RssFeedsController::class, 'index'])->name('admin.rss.index');
        Route::get('/rss/feeds', [RssFeedsController::class, 'feed'])->name('admin.rss.feed');
        Route::get('/rss/create', [RssFeedsController::class, 'create'])->name('admin.rss.create');
        Route::post('/rss', [RssFeedsController::class, 'store'])->name('admin.rss.store');
        Route::get('/rss/edit/{id}', [RssFeedsController::class, 'edit'])->name('admin.rss.edit');
        Route::post('/rss/update', [RssFeedsController::class, 'update'])->name('admin.rss.update');
        Route::post('/rss/delete', [RssFeedsController::class, 'rssdelete'])->name('admin.rssfeed.delete');
        Route::post('/rss/feed/delete', [RssFeedsController::class, 'delete'])->name('admin.rss.delete');
        Route::post('/rss-posts/bulk/delete', [RssFeedsController::class, 'bulkDelete'])->name('admin.rss.bulk.delete');

        Route::get('rss-feed/update/{id}', [RssFeedsController::class, 'feedUpdate'])->name('admin.rss.feedUpdate');
        Route::get('rss-feed/cronJobUpdate', [RssFeedsController::class, 'cronJobUpdate'])->name('rss.cronJobUpdate');
    });

    Route::group(['middleware' => 'check.permission:Users Management'], function () {
        // Register User start
        Route::get('register/users', [RegisterUserController::class, 'index'])->name('admin.register.user');
        Route::get('register/users/add', [RegisterUserController::class, 'addNewUser'])->name('admin.register.user.add');
        Route::post('register/users/store', [RegisterUserController::class, 'storeNewUser'])->name('admin.register.user.store');
        Route::post('register/users/ban', [RegisterUserController::class, 'userban'])->name('register.user.ban');
        Route::post('register/users/email', [RegisterUserController::class, 'emailStatus'])->name('register.user.email');
        Route::get('register/user/details/{id}', [RegisterUserController::class, 'view'])->name('register.user.view');
        Route::post('register/user/delete', [RegisterUserController::class, 'delete'])->name('register.user.delete');
        Route::post('register/user/bulk-delete', [RegisterUserController::class, 'bulkDelete'])->name('register.user.bulk.delete');
        Route::get('register/user/{id}/changePassword', [RegisterUserController::class, 'changePass'])->name('register.user.changePass');
        Route::post('register/user/updatePassword', [RegisterUserController::class, 'updatePassword'])->name('register.user.updatePassword');
        //Register User end

        // Admin Push Notification Routes
        Route::get('/pushnotification/settings', [PushController::class, 'settings'])->name('admin.pushnotification.settings');
        Route::post('/pushnotification/update/settings', [PushController::class, 'updateSettings'])->name('admin.pushnotification.updateSettings');
        Route::get('/pushnotification/send', [PushController::class, 'send'])->name('admin.pushnotification.send');
        Route::post('/push', [PushController::class, 'push'])->name('admin.pushnotification.push');

        Route::group(['middleware' => 'check.permission:Role Management'], function () {
            // Admin Roles Routes
            Route::get('/roles', [RoleController::class, 'index'])->name('admin.role.index');
            Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
            Route::post('/role/update', [RoleController::class, 'update'])->name('admin.role.update');
            Route::post('/role/delete', [RoleController::class, 'delete'])->name('admin.role.delete');
            Route::get('role/{id}/permissions/manage', [RoleController::class, 'managePermissions'])->name('admin.role.permissions.manage');
            Route::post('role/permissions/update', [RoleController::class, 'updatePermissions'])->name('admin.role.permissions.update');
            Route::get('role/{id}/sites/manage', [RoleController::class, 'manageSitesAccess'])->name('admin.role.sites.manage');
            Route::post('role/sites/update', [RoleController::class, 'updateSitesAccess'])->name('admin.role.sites.update');
        });

        Route::group(['middleware' => 'check.permission:Users Management'], function () {
            // Admin Users Routes
            Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
            Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::post('/user/update', [UserController::class, 'update'])->name('admin.user.update');
            Route::post('/user/delete', [UserController::class, 'delete'])->name('admin.user.delete');
        });
    });

    Route::group(['middleware' => 'check.permission:Client Feedbacks'], function () {
        // Admin View Client Feedbacks Routes
        Route::get('/feedbacks', [FeedbackController::class, 'feedbacks'])->name('admin.client_feedbacks');
        Route::post('/delete_feedback', [FeedbackController::class, 'deleteFeedback'])->name('admin.delete_feedback');
        Route::post('/feedback/bulk-delete', [FeedbackController::class, 'bulkDelete'])->name('admin.feedback.bulk.delete');
    });

    Route::group(['middleware' => 'check.permission:Contacts', 'as' => 'admin.'], function () {
        // Admin View Contact Messages Routes
        Route::resource('/contacts', ContactMessagesController::class)->except(['create', 'store']);
        Route::post('admin/contacts/bulk-delete', [ContactMessagesController::class, 'bulkDelete'])->name('contacts.bulk.delete');
    });

});
