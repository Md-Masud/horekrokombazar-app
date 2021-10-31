<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([

                'meta_title'=>"bangla",
                'meta_author'=>"bangladesh",
                'meta_tag'=>"english",
                'meta_description'=>"bangladesh",
                'meta_keyword'=>"123",
                'google_verification'=>"ban",
                'google_analytics'=>"eng",
                'alexa_verification'=>"ko",
                'google_adsense'=>"kk",
        ]);
    }
}
