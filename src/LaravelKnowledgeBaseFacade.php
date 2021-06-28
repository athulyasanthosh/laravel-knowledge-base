<?php

namespace Athulya\LaravelKnowledgeBase;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Athulya\LaravelKnowledgeBase\LaravelKnowledgeBase
 */
class LaravelKnowledgeBaseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'knowledge-base';
    }
}
