<?php

namespace Trungpv1601\SimpleCrudGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Trungpv1601\SimpleCrudGenerator\SimpleCrudGenerator
 */
class SimpleCrudGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'simple-crud-generator';
    }
}
