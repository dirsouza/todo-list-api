<?php

declare(strict_types=1);

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class Filter
{
    /**
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function handle(Builder $builder, Closure $next): Builder
    {
        if (!request()->has($this->filterName())) {
            return $next($builder);
        }

        return $this->applyFilter($next($builder));
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    protected abstract function applyFilter(Builder $builder): Builder;

    /**
     * @return string
     */
    protected function filterName(): string
    {
        return Str::snake(class_basename($this));
    }
}
