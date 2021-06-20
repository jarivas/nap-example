<?php


namespace Helpers;

use Db\Ad as DbAd;

trait AdHelper
{
    protected static string $orderBy = DbAd::COL_SCORE . ' DESC';

    protected static function getPagination(array $params): array
    {
        $limit = intval($params['pageSize']); //intval just in case it uses default value
        $offset = (intval($params['page']) - 1) * $limit; //intval just in case it uses default value

        return [$limit, $offset];
    }
}