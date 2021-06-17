<?php


namespace Action\Ad;

use Nap\Action;

class Read extends Action
{

    /**
     * @param array $params
     * @return array
     */
    public static function process(array $params): array
    {
        return parent::responseOk(['$params' => $params]);
    }
}