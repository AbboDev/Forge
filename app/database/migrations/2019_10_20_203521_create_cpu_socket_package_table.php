<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuSocketPackageTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_socket_package', // enum workaround
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
                        'package',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 30,
                            'after' => 'id'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('package', ['package'], 'UNIQUE')
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
        $connection->dropTable('cpu_socket_package');
    }
}
