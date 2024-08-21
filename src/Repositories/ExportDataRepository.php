<?php

namespace NespressoFTPOrderExport\Repositories;

use NespressoFTPOrderExport\Contracts\ExportDataRepositoryContract;
use NespressoFTPOrderExport\Models\TableRow;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;

class ExportDataRepository implements ExportDataRepositoryContract
{
    /**
     * @var DataBase
     */
    private $database;

    /**
     * @param DataBase $database
     */
    public function __construct(DataBase $database)
    {
        $this->database = $database;
    }

    /**
     * @param array $data
     * @return \Plenty\Modules\Plugin\DataBase\Contracts\Model
     */
    public function save(array $data)
    {
        $tableRow = pluginApp(TableRow::class);
        $tableRow->plentyOrderId    = (int)$data['plentyOrderId'];
        $tableRow->exportedData     = (string)$data['exportedData'];
        $tableRow->savedAt          = (string)$data['savedAt'];
        $tableRow->sentAt           = (string)$data['sentAt'];

        return $this->database->save($tableRow);
    }

    /**
     * @param $plentyOrderId
     * @return array|\Plenty\Modules\Plugin\DataBase\Contracts\Model[]|null
     */
    public function get($plentyOrderId)
    {
        $tableRow = $this->database->query(TableRow::class)
            ->where('plentyOrderId', '=', $plentyOrderId)
            ->get();

        return is_array($tableRow) ? $tableRow : null;
    }

    /**
     * @return TableRow[]
     */
    public function list()
    {
        return $this->database->query(TableRow::class)->get();
    }

}