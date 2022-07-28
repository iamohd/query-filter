<?php

namespace Smartisan\QueryFilter;

use Illuminate\Database\Eloquent\Builder;

trait HasFilters
{
    /**
     * Filter a result set.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Smartisan\QueryFilter\QueryFilter|string $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, $filters): Builder
    {
        if (is_string($filters)) {
            $filters = app($filters);
        }

        return $filters->apply($query);
    }
}
