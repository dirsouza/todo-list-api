<?php

declare(strict_types=1);

namespace App\Factories;

use Illuminate\Database\Eloquent\Builder;

interface TaskableFactory
{
    /**
     * @return Builder
     */
    public function make(): Builder;
}
