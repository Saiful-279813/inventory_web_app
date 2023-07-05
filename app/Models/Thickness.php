<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thickness extends Model
{
    use HasFactory;
    protected $table = "thicknesses";
    protected $fillable = [
        'id', 'category_id', 'brand_id', 'size_id', 'name_en', 'name_bn', 'status', 'create_by_id', 'update_by_id', 'created_at', 'updated_at'
    ];

    public function createdBy(){
        return $this->belongsTo(Admin::class,'create_by_id','id')->select('id','name','phone');
    }

    public function updatedBy(){
        return $this->belongsTo(Admin::class,'update_by_id','id')->select('id','name','phone');
    }
}
