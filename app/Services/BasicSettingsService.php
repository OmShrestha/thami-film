<?php

namespace App\Services;

use App\Models\BasicSetting;
use Illuminate\Support\Facades\Cache;

class BasicSettingsService
{
    protected ?array $settings = null;

    protected function loadSettings(): void
    {
        Cache::remember('basic_settings', now()->addMinutes(0), function () {
            $settings = BasicSetting::get(['name', 'value']);

            foreach ($settings as $setting) {
                $this->settings[$setting->name] = $setting->value;
            }
        });
    }

    public function __get($name)
    {
        if ($this->settings === null) {
            $this->loadSettings();
        }
        return $this->settings[$name] ?? null;
    }
}
