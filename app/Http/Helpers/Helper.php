<?php

use App\Mail\CriticalErrorReport;
use App\Models\BasicSetting;
use App\Models\CourseInstructor;
use App\Models\Language;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 *  Send a critical email
 * @param $e
 */
function sendCriticalErrorEmail($e): void
{
    $senderEmail = config('mail.from.address');
    $emails      = implode(',', array_unique(array_filter(['sushantpoudelofficial@gmail.com']))) ?? $senderEmail;

    $browser = request()->server('HTTP_USER_AGENT');
    Mail::to($emails)->send(new CriticalErrorReport($e, $browser));
}

/**
 *  Return the value of the settings
 * @param $settingName
 */
if (!function_exists('getSettingsValue')) {
    function getSettingsValue($settingName)
    {
        $setting = BasicSetting::where('name', $settingName)->first(['value']);

        if ($setting) return $setting->value;

        dd("Settings $settingName not found");
    }
}

if (!function_exists('getSettingsCommaSeparatedValueAsArray')) {
    function getSettingsCommaSeparatedValueAsArray($settingName): array
    {
        return array_map('trim', array_filter(explode(',', getSettingsValue($settingName))));
    }
}

/**
 *  Update the value of the settings
 * @param $settingName
 * @param $settingValue
 */
if (!function_exists('updateSettingsValue')) {
    function updateSettingsValue($settingName, $settingValue): void
    {
        if (!auth()->check()) abort(403);

        $setting = BasicSetting::where('name', $settingName)->first();

        if ($setting) {
            $setting->update(['value' => $settingValue]);
        } else {
            Log::error("Settings $settingName not found. Please create it first");
            dump("Settings $settingName not found. Please create it first");
        }
    }
}

if (!function_exists('storeImagePathFromURL')) {
    function storeImagePathFromURL($image): string
    {
        return ltrim(str_replace(
            parse_url($image, PHP_URL_HOST) . '/',
            '',
            parse_url($image, PHP_URL_PATH)
        ), '/');
    }
}

if (!function_exists('sanitizeHtml')) {
    function sanitizeHtml($html): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,h1,h2,h3,h4,h5,h6,ul,ol,li,blockquote,pre,code,span,em,strong,del,ins,a[href],img[src|alt],table,thead,tbody,tr,th,td,hr,br,b,i,u,sup,sub');
        $purifier = new HTMLPurifier($config);

        return ($purifier->purify($html));
    }
}

if (!function_exists('loadImageFor')) {
    function loadImageFor($imageName): string
    {
        // If AWS is used, use the following code as the full image url path is saved in the database.
        return (config('onf.admin_image_path') . $imageName);

        // If AWS is not used, use the following code and return the image from the local storage
//        if (!str_starts_with($imageName, '/')) $imageName .= '/';
//        return asset(config('wom-academy.blog_image_path') . $imageName);
    }
}



if (!function_exists('displayDateFor')) {
    function displayDateFor($date): string
    {
        $date = Carbon::parse($date);

        if ($date->diffInDays(now()) > 2)
            return $date->format('M d');
        elseif ($date->diffInYears(now()) > 0)
            return $date->format('d M, Y');
        else
            return $date->diffForHumans();
    }
}


/**
 *  Returns the new logo for Twitter X
 *
 * @param string $height
 * @return string
 */
if (!function_exists('twitterLogo')) {
    function twitterLogo($height = '1em', $color = 'black'): string
    {
        return '<svg fill="' . $color . '" xmlns="http://www.w3.org/2000/svg" height="' . $height . '" viewBox="0 0 512 512">
              <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
              </svg>';
    }
}

if (!function_exists('getLang')) {
    function getLang(): Language
    {
        if( session()->has('lang')){
         return   Language::where('code', session()->get('lang'))->first();
        }else{
            return Language::where('is_default', 1)->first();
        }
    }
}

if (!function_exists('setEnvironmentValue')) {
    function setEnvironmentValue(array $values): bool
    {

        $envFile = app()->environmentFilePath();
        $str     = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str               .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition       = strpos($str, "$envKey=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine           = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "$envKey=$envValue\n";
                } else {
                    $str = str_replace($oldLine, "$envKey=$envValue", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
}

if (!function_exists('convertUtf8')) {
    function convertUtf8($value)
    {
        return mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8' ? $value : mb_convert_encoding($value, 'UTF-8');
    }
}

if (!function_exists('make_slug')) {
    function make_slug($string): string
    {
        $slug = preg_replace('/\s+/u', '-', trim($string));
        $slug = str_replace("/", "-", $slug);
        $slug = str_replace("?", "-", $slug);
        $slug = str_replace("&", "-", $slug);
        $slug = str_replace("%", "-", $slug);
        $slug = str_replace("@", "-", $slug);
        $slug = str_replace("#", "-", $slug);
        $slug = str_replace("$", "-", $slug);
        $slug = str_replace("*", "-", $slug);
        $slug = str_replace("!", "-", $slug);
        $slug = str_replace(":", "", $slug);
        $slug = str_replace(";", "", $slug);
        $slug = str_replace(",", "", $slug);
        $slug = str_replace(".", "", $slug);
        $slug = str_replace("(", "", $slug);
        $slug = str_replace(")", "", $slug);
        $slug = str_replace("[", "", $slug);
        $slug = str_replace("]", "", $slug);
        $slug = str_replace("'", "", $slug);
        $slug = str_replace('"', "", $slug);
        $slug = str_replace('`', "", $slug);
        $slug = str_replace('‘', "", $slug);
        $slug = str_replace('’', "", $slug);
        $slug = str_replace('“', "", $slug);
        $slug = str_replace('”', "", $slug);
        return strtolower($slug);
    }
}

if (!function_exists('make_input_name')) {
    function make_input_name($string): array|string|null
    {
        return preg_replace('/\s+/u', '_', trim($string));
    }
}

if (!function_exists('slug_create')) {
    function slug_create($val): array|string|null
    {
        return make_slug($val);
    }
}

if (!function_exists('replaceBaseUrl')) {
    function replaceBaseUrl($content): array|string
    {
        return str_replace("{base_url}", url('/'), $content);
    }
}

if (!function_exists('convertHtml')) {
    function convertHtml($content): array|string
    {
        return str_replace("{base_url}", url('/'), $content);
    }
}

if (!function_exists('getSiteUrlBySession')) {
    function getSiteUrlBySession(): string
    {
        return session('siteName')
            ? 'https://' . collect(config('sites'))->firstWhere('name', session('siteName'))['domains'][0]
            : '';
    }
}

if (!function_exists('hex2rgb')) {
    function hex2rgb($colour): false|array
    {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('red' => $r, 'green' => $g, 'blue' => $b);
    }
}

/**
 *  Returns the Menu Link Href
 *
 * @param string $height
 * @return string
 */
if (!function_exists('getHref')) {
    function getHref($link)
    {
        if ($link["type"] == 'home') {
            $href = route('frontend.index');
        } else if ($link["type"] == 'courses' || $link["type"] == 'courses-megamenu') {
            $href = route('courses');
        } else if ($link["type"] == 'gallery') {
            $href = route('frontend.gallery');
        } else if ($link["type"] == 'faq') {
            $href = route('frontend.faq');
        } else if ($link["type"] == 'blogs' || $link["type"] == 'blogs-megamenu') {
            $href = route('frontend.blogs.index');
        } else if ($link["type"] == 'contact') {
            $href = route('frontend.contact');
        } else if ($link["type"] == 'custom') {
            if (empty($link["href"])) {
                $href = "#";
            } else {
                $href = $link["href"];
            }
        } else {
            $pageid = (int)$link["type"];
            $page   = Page::find($pageid);
            $href   = !empty($page) ? route('frontend.dynamicPage', [$page->slug]) : '#';
        }

        return $href;
    }
}
