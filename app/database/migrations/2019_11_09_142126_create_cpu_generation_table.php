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
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 5,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'codename',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'series',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'codename'
                        ]
                    ),
                    new Column(
                        'socket',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'series'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('cpu_generation_codename_fk', ['codename'], null),
                    new Index('cpu_generation_series_fk', ['series'], null),
                    new Index('cpu_generation_socket_fk', ['socket'], null)
                ],
                'references' => [
                    new Reference(
                        'cpu_generation_codename_fk',
                        [
                            'referencedTable' => 'cpu_codename',
                            'referencedSchema' => 'forge',
                            'columns' => ['codename'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'CASCADE'
                        ]
                    ),
                    new Reference(
                        'cpu_generation_series_fk',
                        [
                            'referencedTable' => 'cpu_series',
                            'referencedSchema' => 'forge',
                            'columns' => ['series'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'CASCADE'
                        ]
                    ),
                    new Reference(
                        'cpu_generation_socket_fk',
                        [
                            'referencedTable' => 'cpu_socket',
                            'referencedSchema' => 'forge',
                            'columns' => ['socket'],
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
        $connection->dropTable('cpu_generation');
    }
}
