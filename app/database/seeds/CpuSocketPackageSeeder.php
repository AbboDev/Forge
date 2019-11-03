<?php

use Yarak\DB\Seeders\Seeder;
use Forge\Models\CpuSocketPackage as Package;

class CpuSocketPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lga = new Package();
        $lga->setPackage('LGA');

        $lga->save();

        $pga = new Package();
        $pga->setPackage('PGA');

        $pga->save();

        $slot = new Package();
        $slot->setPackage('Slot');

        $slot->save();

        $plcc = new Package();
        $plcc->setPackage('PLCC');

        $plcc->save();

        $dip = new Package();
        $dip->setPackage('DIP');

        $dip->save();

        $rpga = new Package();
        $rpga->setPackage('rPGA');

        $rpga->save();
    }
}
