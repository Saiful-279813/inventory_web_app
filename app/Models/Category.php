<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id', 'name_en', 'name_bn', 'status', 'create_by_id', 'created_at', 'updated_at'
    ];
}
