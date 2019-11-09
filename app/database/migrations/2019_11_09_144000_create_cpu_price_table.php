<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class CreateCpuPriceTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->createTable(
            'cpu_price',
            null,
            [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER, // mediumint
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 8,
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
                        'price',
                        [
                            'type' => Column::TYPE_DECIMAL,
                            'default' => "00.00",
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 4,
                            'scale' => 2,
                            'after' => 'cpu'
                        ]
                    ),
                    new Column(
                        'seller',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'default' => "Unknown",
                            'notNull' => true,
                            'size' => 30,
                            'after' => 'price'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('cpu_price_fk', ['cpu'], null),
                ],
                'references' => [
                    new Reference(
                        'cpu_price_fk',
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
        $connection->dropTable('cpu_price');
    }
}
