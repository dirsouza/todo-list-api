<?php

declare(strict_types=1);

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Completed extends Filter
{
    /**
     * @inheritDoc
     */
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->whereCompleted(request($this->filterName()));
    }
}
