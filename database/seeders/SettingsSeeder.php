<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [[
            'key' => 'copyrights_en',
            'value' => '2023 All Rights Reserved',
        ],[
            'key' => 'copyrights_ar',
            'value' => '2023 كل الحقوق محفوظة',
        ],[
            'key' => 'copyrights_en_lnk',
            'value' => 'Robusta',
        ],[
            'key' => 'copyrights_ar_lnk',
            'value' => 'روبوستا',
        ],[
            'key' => 'copyrights_lnk',
            'value' => 'https://robustagroup.com/studio',
        ],[
            'key' => 'logo',
            'value' => '1782883849603776.jpg',
        ],[
            'key' => 'favicon',
            'value' => '1782883849614877.jpg',
        ],[
            'key' => 'contact_us_to_email',
            'value' => 'contact@dev.net',
        ],[
            'key' => 'contact_us_subject',
            'value' => 'Mail from Robusta Contact Us',
        ]];

        foreach($settings as $setting){
            Settings::create($setting);
        }
    }
}
