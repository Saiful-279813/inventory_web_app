<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = "stocks";
    protected $fillable = [
        'id', 'category_id', 'brand_id', 'size_id', 'thickness_id', 'stock_value', 'last_price', 'status', 'create_by_id', 'update_by_id', 'created_at', 'updated_at'
    ];

    public function createdBy(){
        return $this->belongsTo(Admin::class,'create_by_id','id')->select('id','name','phone');
    }

    public function updatedBy(){
        return $this->belongsTo(Admin::class,'update_by_id','id')->select('id','name','phone');
    }

}
