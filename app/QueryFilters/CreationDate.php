<?php

declare(strict_types=1);

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CreationDate extends Filter
{
    /**
     * @inheritDoc
     */
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->whereDate('created_at', request($this->filterName()));
    }
}
