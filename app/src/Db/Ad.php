<?php

namespace Db;

/**
 * Class Ad
 * @package Db
 * @method string getId()
 * @method string getType()
 * @method string getDescription()
 * @method string getSize()
 * @method string getGardenSize()
 * @method string getScore()
 */
class Ad
{
    protected static string $tableName = 'ad';

    const COL_ID = 'id';
    const COL_TYPE = 'type';
    const COL_DESCRIPTION = 'description';
    const COL_SIZE = 'size';
    const COL_GARDEN_SIZE = 'garden_size';
    const COL_SCORE = 'score';


    protected static $pascalCasedProperties = [
    'Id' => 'id',
    'Type' => 'type',
    'Description' => 'description',
    'Size' => 'size',
    'GardenSize' => 'garden_size',
    'Score' => 'score'];

    protected static $snakeCasedProperties = [
    'id' => 'Id',
    'type' => 'Type',
    'description' => 'Description',
    'size' => 'Size',
    'garden_size' => 'GardenSize',
    'score' => 'Score'];

    protected static $relations = [];

    use EntityBody;
}
