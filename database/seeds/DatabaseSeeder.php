<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ClinicSeed::class);
        $this->call(BotoxSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);

    }
}
