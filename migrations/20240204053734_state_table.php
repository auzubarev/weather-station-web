<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class StateTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void {
        $table = $this->table('sensors_data');
        $table->addColumn('reading', 'double')
            ->addColumn('sensor_code', 'string')
            ->addColumn('measure_code', 'string')
            ->addColumn('timestamp', 'datetime')
            ->addTimestamps()
            ->addIndex(['reading'])
            ->addIndex(['sensor_code'])
            ->addIndex(['measure_code'])
            ->addIndex(['measure_code'])
            ->create();

        $table = $this->table('statistics');
        $table->addColumn('average', 'double')
            ->addColumn('minimum', 'double')
            ->addColumn('maximum', 'double')
            ->addColumn('sensor_code', 'string')
            ->addColumn('measure_code', 'string')
            ->addColumn('period', 'string')
            ->addColumn('start_time', 'datetime')
            ->addColumn('end_time', 'datetime')
            ->addTimestamps()
            ->addIndex(['average'])
            ->addIndex(['minimum'])
            ->addIndex(['maximum'])
            ->addIndex(['sensor_code'])
            ->addIndex(['measure_code'])
            ->addIndex(['period'])
            ->addIndex(['start_time'])
            ->addIndex(['end_time'])
            ->create();
    }
}
