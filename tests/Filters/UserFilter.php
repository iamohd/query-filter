<?php

namespace Smartisan\QueryFilter\Tests\Filters;

use Smartisan\QueryFilter\QueryFilter;

class UserFilter extends QueryFilter
{
    public function name($value)
    {
        return $this->builder->where('name', 'LIKE', "%$value%");
    }

    public function fullName($value)
    {
        return $this->builder->where('name', 'LIKE', "%$value%");
    }
}
