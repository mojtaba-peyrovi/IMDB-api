<?php

use Illuminate\Database\Seeder;

class ClinicSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 3, 'clinic_name' => 'Bangkok Hospital', 'logo' => '/tmp/phpLIcNap', 'city' => 'Bangkok', 'area' => 'Petchaburi', 'location_address' => 'Bangkok Hospital, ซอย วิจัย 7 ถนน เพชรบุรีตัดใหม่ Bang Kapi, Huai Khwang, กรุงเทพมหานคร Thailand', 'location_latitude' => 13.7492451, 'location_longitude' => 100.5834962,],
            ['id' => 4, 'clinic_name' => 'Samitivej Hospital', 'logo' => '/tmp/php4Td3pe', 'city' => 'Bangkok', 'area' => 'Sukhumvit', 'location_address' => 'Samitivej Sukhumvit Hospital, Klang Alley, Khlong Tan Nuea, Watthana, Bangkok, Thailand', 'location_latitude' => 13.735052, 'location_longitude' => 100.576692,],

        ];

        foreach ($items as $item) {
            \App\Clinic::create($item);
        }
    }
}
