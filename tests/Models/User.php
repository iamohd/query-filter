<?php

namespace Smartisan\QueryFilter\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Smartisan\QueryFilter\HasFilters;

class User extends Model
{
    use HasFactory;
    use HasFilters;

    protected $guarded = [];
}
