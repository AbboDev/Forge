<?php

use Yarak\DB\Seeders\Seeder;
use Forge\Models\CpuSocket as Socket;
use Forge\Models\CpuSocketPackage as Package;

class CpuSocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = array();

        $sockets = array(
            array("LGA 2066","R4",null,"1","LGA"),
            array("TR4",null,null,"1","LGA"),
            array("SP3",null,null,"1","LGA"),
            array("AM4",null,null,"1","PGA"),
            array("LGA 3647",null,null,"1","LGA"),
            array("LGA 1151v2",null,null,"1","LGA"),
            array("LGA 1151","H4",null,"1","LGA"),
            array("AM1",null,null,"1","PGA"),
            array("FM2+",null,null,"1","PGA"),
            array("rPGA 946B/947","G3",null,"1","rPGA"),
            array("LGA 1150","H3",null,"1","LGA"),
            array("FM2",null,null,"1","PGA"),
            array("LGA 1356","B2",null,"1","LGA"),
            array("AM3+",null,null,"1","PGA"),
            array("FS1",null,null,"1","PGA"),
            array("FM1",null,null,"1","PGA"),
            array("rPGA 988B","G2",null,"1","rPGA"),
            array("LGA 2011","R",null,"1","LGA"),
            array("LGA 1155","H2",null,"1","LGA"),
            array("LGA 1567","LS",null,"1","LGA"),
            array("LGA 1248",null,null,"1","LGA"),
            array("C32",null,null,"1","LGA"),
            array("G34",null,null,"1","LGA"),
            array("LGA 1156","H",null,"1","LGA"),
            array("AM3",null,null,"1","PGA"),
            array("rPGA 988A","G1",null,"1","rPGA"),
            array("LGA 1366","B",null,"1","LGA"),
            array("441",null,null,"1","PGA"),
            array("P",null,null,"1","PGA"),
            array("AM2+",null,null,"1","PGA"),
            array("F","L",null,"1","LGA"),
            array("AM2",null,null,"1","PGA"),
            array("S1",null,null,"1","PGA"),
            array("LGA 771","J",null,"1","LGA"),
            array("M",null,null,"1","PGA"),
            array("LGA 775","T",null,"1","LGA"),
            array("939",null,null,"1","PGA"),
            array("479",null,null,"1","PGA"),
            array("940",null,null,"1","PGA"),
            array("754",null,null,"1","PGA"),
            array("604",null,null,"1","PGA"),
            array("PAC611",null,null,"1","PGA"),
            array("563",null,null,"1","PGA"),
            array("478","N",null,"1","PGA"),
            array("603",null,null,"1","PGA"),
            array("PAC418",null,null,"1","PGA"),
            array("495",null,null,"1","PGA"),
            array("423",null,null,"1","PGA"),
            array("A","462",null,"1","PGA"),
            array("370",null,null,"1","PGA"),
            array("Slot B",null,null,"1","Slot"),
            array("Slot A",null,null,"1","Slot"),
            array("615",null,null,"1","PGA"),
            array("Slot 2",null,null,"1","Slot"),
            array("Super 7",null,null,"1","PGA"),
            array("587",null,null,"1","PGA"),
            array("Slot 1",null,null,"1","Slot"),
            array("499",null,null,"1","PGA"),
            array("431",null,null,"1","PGA"),
            array("8",null,null,"1","PGA"),
            array("7",null,null,"1","PGA"),
            array("463","NexGen",null,"1","PGA"),
            array("6",null,null,"1","PGA"),
            array("5",null,null,"1","PGA"),
            array("4",null,null,"1","PGA"),
            array("3",null,null,"1","PGA"),
            array("2",null,null,"1","PGA"),
            array("1",null,null,"1","PGA"),
            array("PGA 168",null,null,"1","PGA"),
            array("PLCC",null,null,"1","PLCC"),
            array("DIP",null,null,"1","DIP")
        );

        foreach ($sockets as $socket) {
            $record = new Socket();
            $record->setSocket($socket[0]);
            $record->setAlias($socket[1]);
            $record->setLithography($socket[2]);
            $record->setPin($socket[3]);


            if (in_array($socket[4], $packages)) {
                $package = $packages[array_search($socket[4])];
            } else {
                $package = Package::findFirstByPackage($socket[4])->id;
            }

            $record->setPackage($package);

            $record->save();
        }
    }
}
