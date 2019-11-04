<?php

use Phalcon\Db\Index;
use Phalcon\Db\Column;
use Phalcon\Db\Reference;
use Phalcon\Db\Adapter\Pdo;
use Yarak\Migrations\Migration;

class DropGenerationFromCpuSeriesTable implements Migration
{
    /**
     * Run the migration.
     *
     * @param Pdo $connection
     */
    public function up(Pdo $connection)
    {
        $connection->dropIndex('cpu_series', null, 'generation');

        $connection->dropColumn('cpu_series', null, 'generation');

        $connection->modifyColumn(
            'cpu_series',
            null,
            new Column(
                'series',
                [
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 30,
                    'after' => 'id'
                ]
            )
        );

        $connection->addIndex('cpu_series', null, new Index('series', ['series'], 'UNIQUE'));
    }

    /**
     * Reverse the migration.
     *
     * @param Pdo $connection
     */
    public function down(Pdo $connection)
    {
        $connection->dropIndex('cpu_series', null, 'series');

        $connection->addColumn(
            'cpu_series',
            null,
            new Column(
                'generation',
                [
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 30,
                    'after' => 'id'
                ]
            )
        );

        $connection->modifyColumn(
            'cpu_series',
            null,
            new Column(
                'series',
                [
                    'type' => Column::TYPE_VARCHAR,
                    'size' => 30,
                    'after' => 'generation'
                ]
            )
        );

        $connection->addIndex(
            'cpu_series',
            null,
            new Index('generation', ['generation', 'series'], 'UNIQUE')
        );
    }
}
