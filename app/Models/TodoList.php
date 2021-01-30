<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use SoftDeletes;

    protected $table = 'todo_list';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeTasks(Builder $query): Builder
    {
        return $query->whereArchived(false);
    }
}
