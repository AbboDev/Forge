<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class RenameCpuGenerationTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->query("SET foreign_key_checks = 0;
        CREATE TABLE IF NOT EXISTS cpu_series LIKE cpu_generation;
        INSERT INTO cpu_series SELECT * FROM cpu_generation;
        DROP TABLE cpu_generation;");
    }

    /**
     * Reverse the migration.
     *
     * @param Pdo $connection
     */
    public function down(Pdo $connection)
    {
        $connection->query("SET foreign_key_checks = 0;
        CREATE TABLE IF NOT EXISTS cpu_generation LIKE cpu_series;
        INSERT INTO cpu_generation SELECT * FROM cpu_series;
        DROP TABLE cpu_series;");
    }
}
