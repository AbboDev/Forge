<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu',
            null,
            [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 5,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'part',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 30,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 40,
                            'after' => 'part'
                        ]
                    ),
                    new Column(
                        'model',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 5,
                            'after' => 'name'
                        ]
                    ),
                    new Column(
                        'released_date',
                        [
                            'type' => Column::TYPE_DATE,
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'model'
                        ]
                    ),
                    new Column(
                        'cores',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'released_date'
                        ]
                    ),
                    new Column(
                        'threads',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'cores'
                        ]
                    ),
                    new Column(
                        'l1_cache_data',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'threads'
                        ]
                    ),
                    new Column(
                        'l1_cache_instruction',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'l1_cache_data'
                        ]
                    ),
                    new Column(
                        'l2_cache',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'size' => 5,
                            'after' => 'l1_cache_instruction'
                        ]
                    ),
                    new Column(
                        'l3_cache',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'size' => 5,
                            'after' => 'l2_cache'
                        ]
                    ),
                    new Column(
                        'clock_speed',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'size' => 4,
                            'after' => 'l3_cache'
                        ]
                    ),
                    new Column(
                        'turbo_clock_speed',
                        [
                            'type' => Column::TYPE_INTEGER, // smallint
                            'unsigned' => true,
                            'size' => 4,
                            'after' => 'clock_speed'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('processor', ['model', 'name'], 'UNIQUE'),
                    new Index('id', ['id'], null)
                ],
                'references' => [
                    new Reference(
                        'cpu_model_fk',
                        [
                            'referencedTable' => 'cpu_model',
                            'referencedSchema' => 'forge',
                            'columns' => ['model'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'CASCADE'
                        ]
                    )
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
        $connection->dropTable('cpu');
    }
}
