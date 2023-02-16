<?php

namespace Smartisan\QueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    /**
     * HTTP request object.
     */
    protected Request $request;

    /**
     * Eloquent builder instance.
     */
    protected Builder $builder;

    /**
     * Create a new query filter instance.
     */
    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    /**
     * Apply applicable eloquent query builder filters.
     */
    public function apply(): Builder
    {
        foreach ($this->filters() as $name => $value) {
            $name = Str::camel($name);

            if (! method_exists($this, $name) ||
                in_array($name, ['apply', 'filters'])) {
                continue;
            }

            $this->$name($value);
        }

        return $this->builder;
    }

    /**
     * Get all request filters data.
     */
    public function filters(): array
    {
        return $this->request->query();
    }
}
