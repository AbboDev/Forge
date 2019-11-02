<?php

use Yarak\DB\Seeders\Seeder;
use Forge\Models\Manufacturer;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amd = new Manufacturer();
        $amd->setManufacturer('AMD');

        $amd->save();

        $intel = new Manufacturer();
        $intel->setManufacturer('Intel');

        $intel->save();
    }
}
