<?php


namespace Action\Ad;

use Nap\Action;
use Db\Ad as DbAd;
use Db\Photo as DbPhoto;
use Helpers\AdHelper;

class ReadAll extends Action
{
    use AdHelper;

    /**
     * @param array $params
     * @return array
     */
    public static function process(array $params): array
    {
        $result = [];
        list($limit, $offset) = self::getPagination($params);

        $ads = DbAd::get([], [], '', [], self::$orderBy, $limit, $offset);

        foreach ($ads as $ad) {
            $where = [
                [
                    'operator' => 'AND',
                    'condition' => DbPhoto::COL_ID_AD . ' = ' . $ad->getId()
                ]
            ];

            $result[] = [
                'ad' => $ad,
                'photos' =>DbPhoto::get([DbPhoto::COL_URL, DbPhoto::COL_HD], $where)
            ];
        }

        return parent::responseOk($result);
    }
}