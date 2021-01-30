<?php

declare(strict_types=1);

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Search extends Filter
{
    /**
     * @inheritDoc
     */
    protected function applyFilter(Builder $builder): Builder
    {
        $search = request($this->filterName());

        return $builder->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    }
}
