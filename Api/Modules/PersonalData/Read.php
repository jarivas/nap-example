<?php

namespace Api\Modules\PersonalData;

use Core\Db\Persistence as DB;
use Core\Action;

class Read extends Action
{
    const STORE = 'personalData';
    
    const DEFAULT_FIELDS =  [
        'firstName',
        'lastName',
        'emailAddress',
        'dateOfBirth',
        'industry',
        'headline',
        'summary',
        'location'
    ];
    
    public static function process(array $params, DB $persistence): array
    {
        $criteria = self::getUserCriteria();
        
        $item = $persistence->readOne($criteria, self::STORE);
        
        return ['success' => true, 'data' => $item ? $item : self::getDefaultResult(self::DEFAULT_FIELDS)];
    }
}
