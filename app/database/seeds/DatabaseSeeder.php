<?php

use Yarak\DB\Seeders\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ManufacturerSeeder::class);

        $this->call(CpuSeriesSeeder::class);
        $this->call(CpuCodenameSeeder::class);

        $this->call(CpuSocketPackageSeeder::class);
        $this->call(CpuSocketSeeder::class);
    }
}
