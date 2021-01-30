<?php

declare(strict_types=1);

namespace App\Strategies;

use Illuminate\Database\Eloquent\Builder;

interface TaskableStrategy
{
    /**
     * @return Builder
     */
    public function getTasks(): Builder;
}
