<?php

namespace Api\Modules\Blog;

use Core\Db\Persistence as DB;
use Core\Action;

class Read extends Action
{
    const STORE = 'blog';
    
    const DEFAULT_FIELDS =  [
        'title',
        'summary',
        'body',
        'tags'
    ];
    
    public static function process(array $params, DB $persistence): array
    {
        $criteria = self::getUserCriteria();
        
        $options = [
            'limit' => self::getLimit($params),
            'skip' => self::getSkip($params)
        ];
        
        $items = $persistence->read($criteria, self::STORE, $options);
        
        return ['success' => true, 'data' => $items ? $items : self::getDefaultResult(self::DEFAULT_FIELDS)];
    }
}
