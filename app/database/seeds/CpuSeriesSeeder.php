<?php

use Yarak\DB\Seeders\Seeder;
use Forge\Models\CpuSeries as Series;

class CpuSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = array(
            'A4',
            'A6',
            'A8',
            'A10',
            'A12',
            'Athlon',
            'Athlon II',
            'Athlon II X2',
            'Athlon II X3',
            'Athlon II X4',
            'Athlon X2',
            'Athlon X4',
            'E2-Series',
            'E-Series',
            'FX',
            'Opteron',
            'Phenom II X2',
            'Phenom II X3',
            'Phenom II X4',
            'Phenom II X6',
            'Ryzen 3',
            'Ryzen 5',
            'Ryzen 7',
            'Ryzen 9',
            'Sempron',
            'Sempron X2',
            'Threadripper',
            'Atom',
            'Celeron',
            'Core 2 Duo',
            'Core 2 Extreme',
            'Core 2 Quad',
            'Core i3',
            'Core i5',
            'Core i7',
            'Core i7 Extreme',
            'Core i9',
            'Pentium',
            'Pentium Gold',
            'Xeon E',
            'Xeon E3',
            'Xeon E5'
        );

        foreach ($series as $current) {
            $record = new Series();
            $record->setSeries($current);

            $record->save();
        }
    }
}
