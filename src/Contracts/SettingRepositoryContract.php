<?php

namespace NespressoFTPOrderExport\Contracts;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;
use NespressoFTPOrderExport\Models\Setting;

interface SettingRepositoryContract
{
    /**
     * @param $key
     * @param $value
     *
     * @return Model
     */
    public function save($key, $value): Model;

    /**
     * @param $key
     *
     * @return string|null
     */
    public function get($key);

    /**
     * @return Setting[]
     */
    public function list();

}
