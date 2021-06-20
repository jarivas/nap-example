<?php


namespace Action\Ad;

use Nap\Action;
use Db\Ad as DbAd;

class ReadTotalScore extends Action
{

    /**
     * @param array $params
     * @return array
     */
    public static function process(array $params): array
    {
       return parent::responseOk(DbAd::get(['sum(' . DbAd::COL_SCORE . ') as TotalScore']));
    }
}