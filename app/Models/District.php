<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'districts';
    protected $fillable = [
        'id', 'division_id', 'name', 'bn_name'
    ];

    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
