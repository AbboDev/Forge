<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuModelTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_model',
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
                        'manufacturer',
                        [
                            'type' => Column::TYPE_INTEGER, // enum
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'generation',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'manufacturer'
                        ]
                    ),
                    new Column(
                        'codename',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'generation'
                        ]
                    ),
                    new Column(
                        'socket',
                        [
                            'type' => Column::TYPE_INTEGER, // tinyint
                            'unsigned' => true,
                            'size' => 3,
                            'after' => 'codename'
                        ]
                    ),
                    new Column(
                        'released_date',
                        [
                            'type' => Column::TYPE_DATE,
                            'size' => 1,
                            'after' => 'socket'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('cpu_model_manufacturer_fk', ['manufacturer'], null),
                    new Index('cpu_model_generation_fk', ['generation'], null),
                    new Index('cpu_model_codename_fk', ['codename'], null),
                    new Index('cpu_model_socket_fk', ['socket'], null)
                ],
                'references' => [
                    new Reference(
                        'cpu_model_manufacturer_fk',
                        [
                            'referencedTable' => 'manufacturer',
                            'referencedSchema' => 'forge',
                            'columns' => ['manufacturer'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'CASCADE'
                        ]
                    ),
                    new Reference(
                        'cpu_model_generation_fk',
                        [
                            'referencedTable' => 'cpu_generation',
                            'referencedSchema' => 'forge',
                            'columns' => ['generation'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'CASCADE'
                        ]
                    ),
                    new Reference(
                        'cpu_model_codename_fk',
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
                        'cpu_model_socket_fk',
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
        $connection->dropTable('cpu_model');
    }
}
