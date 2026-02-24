<?php

namespace Database\Seeders;

use App\Models\Basicinfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Basicinfo::updateOrCreate(
        // Condition to check if a record already exists
            ['site_name' => 'My Website'],

            // Values to update or insert
            [
                'dark_logo'           => 'backend/upload/logo/176095397868f6067ab5b25.png',
                'light_logo'          => 'backend/upload/logo/176095397868f6067ab5b25.png',
                'phone_1'             => '+880123456789',
                'phone_2'             => '+880987654321',
                'mail'                => 'info@mywebsite.com',
                'address'             => '123 Main Street, Dhaka, Bangladesh',
                'fb_link'             => 'https://facebook.com/mywebsite',
                'insta_link'          => 'https://instagram.com/mywebsite',
                'twitter_link'        => 'https://twitter.com/mywebsite',
                'youtube_link'        => 'https://youtube.com/mywebsite',
                'vimeo_link'          => 'https://vimeo.com/mywebsite',
                'linkedin_link'       => 'https://linkedin.com/company/mywebsite',
                'skype_link'          => 'skype:mywebsite?chat',
                'about_text'          => 'This is a sample about text for the website.',
                'opening_hours_text'  => 'Mon-Fri: 9am - 6pm, Sat: 10am - 4pm',
                'copyright_text'      => '© 2026 My Website. All rights reserved.',
            ]
        );
    }
}
