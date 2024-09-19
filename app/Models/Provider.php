<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function scopeOrdered($query, $order = 'desc', $column = 'created_at')
    {
        return $query->orderBy($column, $order);
    }
}
