<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class SplitCacheValuesCpuMetaTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l1_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            ),
            new Column(
                'l1_cache_data', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l1_cache_shared', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            ),
            new Column(
                'l1_cache_instruction', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l2_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            ),
            new Column(
                'l2_cache', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l3_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            ),
            new Column(
                'l3_cache', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            )
        );

        $connection->addColumn(
            'cpu_meta',
            null,
            new Column(
                'l2_cache_shared', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5,
                    'after' => 'l2_cache_core'
                ]
            )
        );

        $connection->addColumn(
            'cpu_meta',
            null,
            new Column(
                'l3_cache_shared', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5,
                    'after' => 'l3_cache_core'
                ]
            )
        );
    }

    /**
     * Reverse the migration.
     *
     * @param Pdo $connection
     */
    public function down(Pdo $connection)
    {
        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l1_cache_data', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            ),
            new Column(
                'l1_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l1_cache_instruction', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            ),
            new Column(
                'l1_cache_shared', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 3
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l2_cache', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            ),
            new Column(
                'l2_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_meta',
            null,
            new Column(
                'l3_cache', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            ),
            new Column(
                'l3_cache_core', // using kilobytes as unit
                [
                    'type' => Column::TYPE_INTEGER,
                    'unsigned' => true,
                    'size' => 5
                ]
            )
        );

        $connection->dropColumn('cpu_meta', null, 'l2_cache_shared');
        $connection->dropColumn('cpu_meta', null, 'l3_cache_shared');
    }
}
