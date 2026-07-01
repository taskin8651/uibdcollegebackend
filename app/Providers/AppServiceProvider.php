<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $websiteSetting = WebsiteSetting::firstOrCreate(['id' => 1], [
                'site_title' => 'B.D. College, Patna | Official Website',
                'college_name' => 'B.D. College, Patna',
                'college_name_hindi' => 'भुवनेश्वरी दयाल कॉलेज, पटना',
                'meta_description' => 'Official website of B.D. College, Patna.',
                'affiliation_text' => 'A Constituent Unit of Patliputra University, Patna',
                'aishe_code' => 'C-12847',
                'naac_text' => 'NAAC Accredited Grade B+ with CGPA 2.39/4',
                'address' => 'Near Gauriamath, Mithapur, Patna - 800001',
                'phone' => '06122209909',
                'alternate_phone' => '+91 7903912273',
                'email' => 'principalbdcollegepatna@gmail.com',
                'admission_url' => 'https://bdcollege.tcspatna.in/',
                'map_embed_url' => 'https://www.google.com/maps?q=B.D.%20College%2C%20Near%20Gauriamath%2C%20Mithapur%2C%20Patna%2C%20Bihar%20800001&output=embed',
                'map_direction_url' => 'https://www.google.com/maps/search/?api=1&query=B.D.%20College%20Near%20Gauriamath%20Mithapur%20Patna%20Bihar%20800001',
            ]);

            $view->with('websiteSetting', $websiteSetting);
        });
    }
}
