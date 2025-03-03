<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['keyword', 'description'];

    public function scopeSearch( Builder $query, ?string $search): Builder
    {
    if (!empty($search)) {
        return $query->where('keyword', 'like', "%{$search}%")
                     ->orWhere('description', 'like', "%{$search}%");
    }

    return $query;
    }
}
