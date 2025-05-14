<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Menu;
use App\Models\Scategory;
use App\Models\Social;
use App\Models\Ulink;
use App\Services\BasicSettingsService;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BasicSettingsService::class, fn() => new BasicSettingsService());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        if (!app()->runningInConsole()) {
            try {
                $langs = $this->loadLanguages();
                $this->composeViews($langs);
            } catch (Exception $e) {
                $this->handleException($e);
            }
        }
    }

    /**
     * Load languages and cache them.
     */
    protected function loadLanguages(): mixed
    {
        $languages = Language::get(['id', 'name', 'code', 'is_default']);
        //print_r($languages->toArray());die;

        View::share('langs', $languages);

        return $languages;
    }

    /**
     * Compose views with necessary data.
     * @throws BindingResolutionException
     */
    protected function composeViews($langs): void
    {
        View::share('categories', $this->getCategories());
        View::share('socials', $this->getSocialMedia());
        View::share('menus', $this->getMenus($langs->first()->id));
        View::share('uLinks', $this->getUsefulLinks());

        view()->composer('*', function ($view) use ($langs) {
            $currentLang = $this->getCurrentLanguage($langs);
            $view->with('currentLang', $currentLang);

            $view->with('bs', app(BasicSettingsService::class));
        });
    }

    /**
     * Get the current language, cached.
     * @param $langs
     * @return Language
     */
    protected function getCurrentLanguage($langs): Language
    {
        return session()->has('lang')
            ? $langs->where('code', session('lang'))->first()
            : $langs->where('is_default', 1)->first();
    }

    /**
     * Get menus for the current language.
     *
     * @param int $languageId
     * @return string
     */
    protected function getMenus(int $languageId): string
    {
        $menu = Menu::where('language_id', $languageId)->first();
        return $menu ? $menu->menus : json_encode([]);
    }

    /**
     * Get categories for the current site and language.
     *
     * @return Collection
     */
    protected function getCategories(): Collection
    {
        return Scategory::orderByDesc('views_count')->get(['id', 'name', 'slug']);
    }

    /**
     * Handle exceptions by sending a critical error email.
     *
     * @param Exception $e
     */
    protected function handleException(Exception $e): void
    {
        sendCriticalErrorEmail($e);
    }

    protected function getSocialMedia()
    {
        return Cache::remember('socialMedia', 60 * 22, fn() => Social::get(['icon', 'url']));
    }

    protected function getUsefulLinks()
    {
        return Cache::remember('usefulLinks', 60 * 22, function () {
            return Ulink::get(['name', 'url']);
        });
    }

}
