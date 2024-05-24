<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            
            if ($setting) {
                View::share('setting', $setting);
            } else {
                // Objek default dengan semua properti yang mungkin digunakan
                $defaultSetting = (object) [
                    'footer_description' => 'Default description',
                    'facebook' => 'Default facebook link',
                    'twitter' => 'Default twitter link',
                    'instagram' => 'Default instagram link',
                    'linkedin' => 'Default linkedin link',
                    'tentang_perusahaan' => 'Default company description',
                    'sejarah_perusahaan' => 'Default company history',
                    'alamat' => 'Default address',
                    'telepon' => 'Default phone number',
                    'email' => 'Default email',
                    'visi' => 'Default vision',
                    'misi' => 'Default mission',
                    // tambahkan properti lain yang diperlukan dengan nilai default
                ];
                View::share('setting', $defaultSetting);
            }
        }
    }
}

