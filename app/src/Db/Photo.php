<?php

namespace Db;

/**
 * Class Photo
 * @package Db
 * @method string getId()
 * @method string getUrl()
 * @method string getHd()
 * @method string getIdAd()
 */
class Photo
{
    protected static string $tableName = 'photo';

    const COL_ID = 'id';
    const COL_URL = 'url';
    const COL_HD = 'hd';
    const COL_ID_AD = 'id_ad';


    protected static $pascalCasedProperties = [
    'Id' => 'id',
    'Url' => 'url',
    'Hd' => 'hd',
    'IdAd' => 'id_ad'];

    protected static $snakeCasedProperties = [
    'id' => 'Id',
    'url' => 'Url',
    'hd' => 'Hd',
    'id_ad' => 'IdAd'];

    protected static $relations = [
['tableName' => 'ad', 'columnsInfo' => 'Db\Ad::getColumnsInfo', 'onCol1' => 'photo.id_ad', 'onCol2' => 'ad.id']];


    use EntityBody;
}
