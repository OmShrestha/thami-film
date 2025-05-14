<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use App\Models\Home;
use App\Models\Language;
use App\Models\Timezone;
use App\Services\BasicSettingsService;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class BasicController extends Controller
{

    //constructor
    public function __construct(protected BasicSettingsService $bs)
    {
        $this->middleware('auth:admin');
    }

    public function fileManager()
    {
        return view('admin.basic.file-manager');
    }

    public function logo()
    {
        $data = [];
        return view('admin.basic.logo', $data);
    }

    public function updatelogo(Request $request)
    {
        $logo       = $request->logo;
        $favicon    = $request->favicon;
        $breadcrumb = $request->breadcrumb;

        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $extLogo     = pathinfo($logo, PATHINFO_EXTENSION);
        $extFav      = pathinfo($favicon, PATHINFO_EXTENSION);
        $extBread    = pathinfo($breadcrumb, PATHINFO_EXTENSION);

        $rules = [];

        if ($request->filled('logo')) {
            $rules['logo'] = [
                function ($attribute, $value, $fail) use ($extLogo, $allowedExts) {
                    if (!in_array($extLogo, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        if ($request->filled('favicon')) {
            $rules['favicon'] = [
                function ($attribute, $value, $fail) use ($extFav, $allowedExts) {
                    if (!in_array($extFav, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                },
            ];
        }

        if ($request->filled('breadcrumb')) {
            $rules['breadcrumb'] = [
                function ($attribute, $value, $fail) use ($extBread, $allowedExts) {
                    if (!in_array($extBread, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                },
            ];
        }

        $request->validate($rules);

        if ($request->filled('logo')) {
//            @unlink('assets/frontend/images/' . $this->bs->logo);
//            $filename = uniqid() . '.' . $extLogo;
//            @copy($logo, 'assets/frontend/images/' . $filename);
            updateSettingsValue('logo', $request->logo);
        }

        if ($request->filled('favicon')) {
//            @unlink('assets/frontend/images/' . $this->bs->favicon);
//            $filename = uniqid() . '.' . $extFav;
//            @copy($favicon, 'assets/frontend/images/' . $filename);
            updateSettingsValue('favicon', $request->favicon);
        }

        if ($request->filled('breadcrumb')) {
//            @unlink('assets/frontend/images/' . $this->bs->breadcrumb);
//            $filename = uniqid() . '.' . $extBread;
//            @copy($breadcrumb, 'assets/frontend/images/' . $filename);
            updateSettingsValue('breadcrumb', $request->breadcrumb);
        }

        $request->session()->flash('success', 'Images updated successfully!');
        return back();
    }


    public function featuresettings()
    {
        return view('admin.basic.features');
    }

    public function updatefeatrue(Request $request)
    {

        updateSettingsValue('is_user_panel', $request->is_user_panel);

        Session::flash('success', 'Updated successfully!');
        return back();
    }

    public function updatethemeversion(Request $request)
    {
        updateSettingsValue('theme_version', $request->theme_version);

        Session::flash('success', "$request->theme_version version activated successfully!");
        return "success";
    }


    public function homeSettings(Request $request)
    {
        $data['abs']    = BasicSetting::all();
        $data['themes'] = Home::all();

        return view('admin.themeHome.settings', $data);
    }

    public function updateHomeSettings(Request $request)
    {
        updateSettingsValue('home_version', $request->home_version);
        updateSettingsValue('theme_version', $request->theme_version);
        updateSettingsValue('home_page_pagebuilder', $request->home_page_pagebuilder);

        Session::flash('success', "Settings updated successfully!");
        return back();
    }

    public function preloader(Request $request)
    {
        return view('admin.basic.preloader');
    }

    public function updatepreloader(Request $request)
    {
        $preloader    = $request->preloader;
        $allowedExts  = array('jpg', 'png', 'jpeg', 'gif', 'svg');
        $extPreloader = pathinfo($preloader, PATHINFO_EXTENSION);

        $rules = [
            'preloader_status' => 'required'
        ];

        if ($request->filled('preloader')) {
            $rules['preloader'] = [
                function ($attribute, $value, $fail) use ($extPreloader, $allowedExts) {
                    if (!in_array($extPreloader, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, gif, svg images are allowed");
                    }
                }
            ];
        }

        $request->validate($rules);

        if ($request->filled('preloader')) {
            $filename = uniqid() . '.' . $extPreloader;
            @copy($preloader, 'assets/frontend/images/' . $filename);
        }

        if ($request->filled('preloader')) {
            @unlink('assets/frontend/images/' . $this->bs->preloader);
            updateSettingsValue('preloader', $filename);
        }

        updateSettingsValue('preloader_status', $request->preloader_status);

        Session::flash('success', 'Preloader updated successfully.');
        return back();
    }

    public function basicinfo(Request $request)
    {
        $data['timezones'] = Cache::rememberForever('timezones', function () {
            return Timezone::all();
        });

        return view('admin.basic.basicinfo', $data);
    }

    public function updatebasicinfo(Request $request)
    {
        $rules = [
            'website_title'                   => 'required',
            'base_color'                      => 'required',
            'secondary_base_color'            => 'required',
        ];

        $request->validate($rules);

        updateSettingsValue('website_title', $request->website_title);
        updateSettingsValue('primary_color', $request->base_color);
        updateSettingsValue('secondary_color', $request->secondary_base_color);
        updateSettingsValue('timezone', $request->timezone);
        updateSettingsValue('is_admin_dark', $request->is_admin_dark);

        // set timezone in .env
        if ($request->has('timezone') && $request->filled('timezone')) {
            $arr = ['TIMEZONE' => $request->timezone];
            setEnvironmentValue($arr);
            \Artisan::call('config:clear');
        }

        Session::flash('success', 'Basic information updated successfully!');
        return back();
    }

    public function seo(Request $request)
    {
        $lang            = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abe']     = $lang->basic_setting;

        return view('admin.basic.seo', $data);
    }

    public function updateseo(Request $request, $langid)
    {
        updateSettingsValue('home_meta_keywords', $request->home_meta_keywords);
        updateSettingsValue('home_meta_description', $request->home_meta_description);
        updateSettingsValue('services_meta_keywords', $request->services_meta_keywords);
        updateSettingsValue('services_meta_description', $request->services_meta_description);
        updateSettingsValue('portfolios_meta_keywords', $request->portfolios_meta_keywords);
        updateSettingsValue('portfolios_meta_description', $request->portfolios_meta_description);
        updateSettingsValue('team_meta_keywords', $request->team_meta_keywords);
        updateSettingsValue('team_meta_description', $request->team_meta_description);
        updateSettingsValue('career_meta_keywords', $request->career_meta_keywords);
        updateSettingsValue('career_meta_description', $request->career_meta_description);
        updateSettingsValue('gallery_meta_keywords', $request->gallery_meta_keywords);
        updateSettingsValue('gallery_meta_description', $request->gallery_meta_description);
        updateSettingsValue('faq_meta_keywords', $request->faq_meta_keywords);
        updateSettingsValue('faq_meta_description', $request->faq_meta_description);
        updateSettingsValue('blogs_meta_keywords', $request->blogs_meta_keywords);
        updateSettingsValue('blogs_meta_description', $request->blogs_meta_description);
        updateSettingsValue('contact_meta_keywords', $request->contact_meta_keywords);
        updateSettingsValue('contact_meta_description', $request->contact_meta_description);

        Session::flash('success', 'SEO information updated successfully!');
        return back();
    }

    public function support(Request $request)
    {
        $lang            = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs']     = $lang->basic_setting;

        return view('admin.basic.support', $data);
    }

    public function updatesupport(Request $request, $langid)
    {
        $request->validate([
            'support_email' => 'required|email|max:100',
            'support_phone' => 'required|max:300',
        ]);

        updateSettingsValue('support_email', $request->support_email);
        updateSettingsValue('support_phone', $request->support_phone);

        Session::flash('success', 'Support Informations updated successfully!');
        return back();
    }

    public function heading(Request $request)
    {
        $lang            = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs']     = $lang->basic_setting;

        return view('admin.basic.headings', $data);
    }

    public function updateheading(Request $request, $langid)
    {
        $request->validate([
            'service_title'               => 'nullable|max:300',
            'service_subtitle'            => 'nullable|max:400',
            'career_title'                => 'nullable|max:300',
            'career_subtitle'             => 'nullable|max:400',
            'event_calendar_title'        => 'nullable|max:300',
            'event_calendar_subtitle'     => 'nullable|max:400',
            'service_details_title'       => 'nullable|max:300',
            'portfolio_title'             => 'nullable|max:300',
            'portfolio_subtitle'          => 'nullable|max:400',
            'portfolio_details_title'     => 'nullable|max:400',
            'blog_details_title'          => 'nullable|max:300',
            'rss_details_title'           => 'nullable|max:300',
            'contact_title'               => 'nullable|max:300',
            'contact_subtitle'            => 'nullable|max:400',
            'gallery_title'               => 'nullable|max:300',
            'gallery_subtitle'            => 'nullable|max:400',
            'team_title'                  => 'nullable|max:300',
            'team_subtitle'               => 'nullable|max:400',
            'faq_title'                   => 'nullable|max:300',
            'faq_subtitle'                => 'nullable|max:400',
            'pricing_title'               => 'nullable|max:300',
            'pricing_subtitle'            => 'nullable|max:400',
            'blog_title'                  => 'nullable|max:300',
            'blog_subtitle'               => 'nullable|max:400',
            'rss_title'                   => 'nullable|max:300',
            'rss_subtitle'                => 'nullable|max:400',
            'quote_title'                 => 'nullable|max:300',
            'quote_subtitle'              => 'nullable|max:400',
            'error_title'                 => 'nullable|max:300',
            'error_subtitle'              => 'nullable|max:400',
            'product_title'               => 'nullable|max:300',
            'product_subtitle'            => 'nullable|max:400',
            'product_details_title'       => 'nullable|max:300',
            // 'product_details_subtitle' => 'nullable|max:400',
            'cart_title'                  => 'nullable|max:300',
            'cart_subtitle'               => 'nullable|max:400',
            'checkout_title'              => 'nullable|max:300',
            'checkout_subtitle'           => 'nullable|max:400',
            'event_title'                 => 'nullable|max:300',
            'event_subtitle'              => 'nullable|max:400',
            'cause_title'                 => 'nullable|max:300',
            'cause_subtitle'              => 'nullable|max:400',
            'knowledgebase_title'         => 'nullable|max:70',
            'knowledgebase_subtitle'      => 'nullable|max:70',
            'knowledgebase_details_title' => 'nullable|max:70',
            'client_feedback_title'       => 'nullable|max:70',
            'client_feedback_subtitle'    => 'nullable|max:70'
        ]);

        updateSettingsValue('service_title', $request->service_title);
        updateSettingsValue('service_subtitle', $request->service_subtitle);
        updateSettingsValue('service_details_title', $request->service_details_title);
        updateSettingsValue('portfolio_title', $request->portfolio_title);
        updateSettingsValue('portfolio_subtitle', $request->portfolio_subtitle);
        updateSettingsValue('portfolio_details_title', $request->portfolio_details_title);
        updateSettingsValue('blog_details_title', $request->blog_details_title);
        updateSettingsValue('contact_title', $request->contact_title);
        updateSettingsValue('contact_subtitle', $request->contact_subtitle);
        updateSettingsValue('gallery_title', $request->gallery_title);
        updateSettingsValue('gallery_subtitle', $request->gallery_subtitle);
        updateSettingsValue('team_title', $request->team_title);
        updateSettingsValue('team_subtitle', $request->team_subtitle);
        updateSettingsValue('faq_title', $request->faq_title);
        updateSettingsValue('faq_subtitle', $request->faq_subtitle);
        updateSettingsValue('blog_title', $request->blog_title);
        updateSettingsValue('blog_subtitle', $request->blog_subtitle);
        updateSettingsValue('quote_title', $request->quote_title);
        updateSettingsValue('quote_subtitle', $request->quote_subtitle);
        updateSettingsValue('error_title', $request->error_title);
        updateSettingsValue('error_subtitle', $request->error_subtitle);
        updateSettingsValue('event_title', $request->event_title);
        updateSettingsValue('event_subtitle', $request->event_subtitle);
        updateSettingsValue('event_details_title', $request->event_details_title);
        updateSettingsValue('event_calendar_title', $request->event_calendar_title);
        updateSettingsValue('event_calendar_subtitle', $request->event_calendar_subtitle);
        updateSettingsValue('rss_title', $request->rss_title);
        updateSettingsValue('rss_subtitle', $request->rss_subtitle);
        updateSettingsValue('rss_details_title', $request->blog_details_title);
        updateSettingsValue('knowledgebase_title', $request->knowledgebase_title);
        updateSettingsValue('knowledgebase_subtitle', $request->knowledgebase_subtitle);
        updateSettingsValue('knowledgebase_details_title', $request->knowledgebase_details_title);
        updateSettingsValue('client_feedback_title', $request->client_feedback_title);
        updateSettingsValue('client_feedback_subtitle', $request->client_feedback_subtitle);

        Session::flash('success', 'Page title & subtitles updated successfully!');
        return back();
    }

    public function script()
    {
        return view('admin.basic.scripts');
    }

    public function updatescript(Request $request)
    {
        updateSettingsValue('google_analytics_script', $request->google_analytics_script);
        updateSettingsValue('is_analytics', $request->is_analytics);
        updateSettingsValue('dynamic_css', $request->dynamic_css);
        updateSettingsValue('dynamic_js', $request->dynamic_js);
        updateSettingsValue('is_recaptcha', $request->is_recaptcha);
        updateSettingsValue('google_recaptcha_site_key', $request->google_recaptcha_site_key);
        updateSettingsValue('google_recaptcha_secret_key', $request->google_recaptcha_secret_key);
        updateSettingsValue('facebook_pixel_script', $request->facebook_pixel_script);
        updateSettingsValue('is_facebook_pixel', $request->is_facebook_pixel);
        updateSettingsValue('is_facebook_login', $request->is_facebook_login);
        updateSettingsValue('facebook_app_id', $request->facebook_app_id);
        updateSettingsValue('facebook_app_secret', $request->facebook_app_secret);
        updateSettingsValue('is_google_login', $request->is_google_login);
        updateSettingsValue('google_client_id', $request->google_client_id);
        updateSettingsValue('google_client_secret', $request->google_client_secret);

        Session::flash('success', 'Scripts updated successfully!');
        return back();
    }

    public function maintainance()
    {
        return view('admin.basic.maintainance');
    }

    public function updatemaintainance(Request $request)
    {
        $maintenance = $request->maintenance;
        $allowedExts = array('jpg', 'png', 'jpeg');
        $extLogo     = pathinfo($maintenance, PATHINFO_EXTENSION);

        $rules = [];

        if ($request->filled('maintenance')) {
            $rules['maintenance'] = [
                function ($attribute, $value, $fail) use ($extLogo, $allowedExts) {
                    if (!in_array($extLogo, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg image is allowed");
                    }
                }
            ];
        }

        $request->validate($rules);

        if ($request->filled('maintenance')) {
            @unlink('assets/frontend/images/maintainance.png');
            @copy($maintenance, 'assets/frontend/images/maintainance.png');
        }

        updateSettingsValue('maintenance_text', $request->maintenance_text);
        updateSettingsValue('maintenance_mode', $request->maintenance_mode);
        updateSettingsValue('secret_path', $request->secret_path);

        $down = "down";
        if ($request->filled('secret_path')) {
            $down .= " --secret=" . $request->secret_path;
        }

        if ($request->maintainance_mode == 1) {
            @unlink('core/storage/framework/down');
            Artisan::call($down);
        } else {
            Artisan::call('up');
        }

        Session::flash('success', 'Maintenance mode updated successfully!');
        return back();
    }


    public function sections(Request $request)
    {
        $data = [];
        return view('admin.home.sections', $data);
    }

    public function updatesections(Request $request)
    {
        updateSettingsValue('feature_section', $request->feature_section);
        updateSettingsValue('intro_section', $request->intro_section);
        updateSettingsValue('service_section', $request->service_section);
        updateSettingsValue('approach_section', $request->approach_section);
        updateSettingsValue('statistics_section', $request->statistics_section);
        updateSettingsValue('portfolio_section', $request->portfolio_section);
        updateSettingsValue('testimonial_section', $request->testimonial_section);
        updateSettingsValue('team_section', $request->team_section);
        updateSettingsValue('call_to_action_section', $request->call_to_action_section);
        updateSettingsValue('news_section', $request->news_section);
        updateSettingsValue('partner_section', $request->partner_section);
        updateSettingsValue('top_footer_section', $request->top_footer_section);
        updateSettingsValue('copyright_section', $request->copyright_section);

        Session::flash('success', 'Sections customized successfully!');
        return back();
    }

    public function cookiealert(Request $request)
    {
        $lang            = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abe']     = $lang->basic_setting;

        return view('admin.basic.cookie', $data);
    }

    public function updatecookie(Request $request, $langid)
    {
        $request->validate([
            'cookie_alert_status'      => 'required',
            'cookie_alert_text'        => 'required',
            'cookie_alert_button_text' => 'required|max:25',
        ]);

        updateSettingsValue('cookie_alert_status', $request->cookie_alert_status);
        updateSettingsValue('cookie_alert_text', str_replace('/' . '/assets/frontend/images/', "{base_url}/assets/frontend/images/", $request->cookie_alert_text));
        updateSettingsValue('cookie_alert_button_text', $request->cookie_alert_button_text);

        Session::flash('success', 'Cookie alert updated successfully!');
        return back();
    }
}
