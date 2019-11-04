<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class RenameCpuManufacturerTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->query("SET foreign_key_checks = 0;
        CREATE TABLE IF NOT EXISTS manufacturer LIKE cpu_manufacturer;
        INSERT INTO manufacturer SELECT * FROM cpu_manufacturer;
        DROP TABLE cpu_manufacturer;");
    }

    /**
     * Reverse the migration.
     *
     * @param Pdo $connection
     */
    public function down(Pdo $connection)
    {
        $connection->query("SET foreign_key_checks = 0;
        CREATE TABLE IF NOT EXISTS cpu_manufacturer LIKE manufacturer;
        INSERT INTO cpu_manufacturer SELECT * FROM manufacturer;
        DROP TABLE manufacturer;");
    }
}
