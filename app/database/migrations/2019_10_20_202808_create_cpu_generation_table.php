<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuGenerationTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_generation',
            null,
            [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 3,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'generation',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 30,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'series',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 30,
                            'after' => 'generation'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('generation', ['generation', 'series'], 'UNIQUE')
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '1',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8mb4_general_ci'
                ],
            ]
        );
    }

    /**
     * Reverse the migration.
     *
     * @param Pdo $connection
     */
    public function down(Pdo $connection)
    {
        $connection->dropTable('cpu_generation');
    }
}
