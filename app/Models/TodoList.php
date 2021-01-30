<?php

declare(strict_types=1);

namespace App\Models;

use App\QueryFilters\Archived;
use App\QueryFilters\Completed;
use App\QueryFilters\CreationDate;
use App\QueryFilters\Search;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pipeline\Pipeline;

class TodoList extends Model
{
    use SoftDeletes;

    protected $table = 'todo_list';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function scopeAllTasks(Builder $query): Builder
    {
        return app(Pipeline::class)
            ->send($query)
            ->through([
                Search::class,
                CreationDate::class,
                Archived::class,
                Completed::class
            ])
            ->thenReturn();
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeTasks(Builder $query): Builder
    {
        return $query->whereArchived(false);
    }
}
