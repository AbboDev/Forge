<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuSocketTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_socket',
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
                            'size' => 3,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'socket',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 15,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'alias',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 15,
                            'after' => 'socket'
                        ]
                    ),
                    new Column(
                        'pin',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'size' => 5,
                            'after' => 'alias'
                        ]
                    ),
                    new Column(
                        'package',
                        [
                            'type' => Column::TYPE_INTEGER, // enum
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 5,
                            'after' => 'pin'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('cpu_socket_package_fk', ['package'], null),
                ],
                'references' => [
                    new Reference(
                        'cpu_socket_package_fk',
                        [
                            'referencedTable' => 'cpu_socket_package',
                            'referencedSchema' => 'forge',
                            'columns' => ['package'],
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
        $connection->dropTable('cpu_socket');
    }
}
