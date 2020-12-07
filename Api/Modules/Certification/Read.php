<?php

namespace Api\Modules\Certification;

use Core\Db\Persistence as DB;
use Core\Action;

class Read extends Action
{
    const STORE = 'certification';
    
    const DEFAULT_FIELDS =  [
        'name',
        'authority'
    ];
    
    public static function process(array $params, DB $persistence): array
    {
        $criteria = self::getUserCriteria();
        
        $items = $persistence->read($criteria, self::STORE);
        
        return ['success' => true, 'data' => $items ? $items : self::getDefaultResult(self::DEFAULT_FIELDS)];
    }
}
