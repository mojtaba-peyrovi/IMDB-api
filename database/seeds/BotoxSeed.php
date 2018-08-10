<?php

use Illuminate\Database\Seeder;

class BotoxSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'botox_name' => 'Botulinum ToxinA', 'price_per_unit' => '125.00', 'price_per_vial' => '3000.00', 'reward_points' => 50, 'popular' => 0, 'apply_btn' => 1, 'expire' => '2018-07-31', 'exclusive' => 0, 'exclusive_desc' => null, 'featured' => 0, 'featured_desc' => null, 'off_peak_available' => 0, 'about_offpeak' => null, 'about_package' => '<p>As people age, they tend to develop facial wrinkles. Some of these wrinkles are relatively minor and are known by such amusing names as &quot;crow&#39;s-feet&quot; and &quot;laugh-lines.&quot; But some lines may become major crevices with age such as the &quot;nasolabial folds&quot; that run from the side of the nose to the corner of the mouth. This is one of the first signs of aging. A great deal of research is being done to develop ways to treat facial wrinkles by either preventing them in the first place or by filling them in with some sort of biologic or synthetic materials.<br />
<br />
&nbsp;</p>
', 'clinic_name_id' => 4,],

        ];

        foreach ($items as $item) {
            \App\Botox::create($item);
        }
    }
}
