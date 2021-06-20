<?php

namespace Db;

/**
 * Class Keyword
 * @package Db
 * @method string getId()
 * @method string getWord()
 */
class Keyword
{
    protected static string $tableName = 'keyword';

    const COL_ID = 'id';
    const COL_WORD = 'word';


    protected static $pascalCasedProperties = [
    'Id' => 'id',
    'Word' => 'word'];

    protected static $snakeCasedProperties = [
    'id' => 'Id',
    'word' => 'Word'];

    protected static $relations = [];

    use EntityBody;
}
