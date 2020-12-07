<?php

namespace Api\Modules\Social;

use Core\Db\Persistence as DB;
use Core\Action;

class Read extends Action
{
    const STORE = 'social';
    
    const DEFAULT_FIELDS =  [
        'name',
        'url',
        'icon'
    ];
    
    public static function process(array $params, DB $persistence): array
    {
        $criteria = self::getUserCriteria();
        
        $items = $persistence->read($criteria, self::STORE);
        
        return ['success' => true, 'data' => $items ? $items : self::getDefaultResult(self::DEFAULT_FIELDS)];
    }
}
