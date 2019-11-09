<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuMetaTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_meta',
            null,
            [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 5,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'cpu',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 5,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'cores',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'cpu'
                        ]
                    ),
                    new Column(
                        'threads',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'cores'
                        ]
                    ),
                    new Column(
                        'l1_cache_data', // using kilobytes as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'threads'
                        ]
                    ),
                    new Column(
                        'l1_cache_instruction', // using kilobytes as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'l1_cache_data'
                        ]
                    ),
                    new Column(
                        'l2_cache', // using kilobytes as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 5,
                            'after' => 'l1_cache_instruction'
                        ]
                    ),
                    new Column(
                        'l3_cache', // using kilobytes as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 5,
                            'after' => 'l2_cache'
                        ]
                    ),
                    new Column(
                        'clock_speed', // using megahertz as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 4,
                            'after' => 'l3_cache'
                        ]
                    ),
                    new Column(
                        'turbo_clock_speed', // using megahertz as unit
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 4,
                            'after' => 'clock_speed'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('cpu_meta_fk', ['cpu'], 'UNIQUE'),
                ],
                'references' => [
                    new Reference(
                        'cpu_meta_fk',
                        [
                            'referencedTable' => 'cpu',
                            'referencedSchema' => 'forge',
                            'columns' => ['cpu'],
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
        $connection->dropTable('cpu_meta');
    }
}
