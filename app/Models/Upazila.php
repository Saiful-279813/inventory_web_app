<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model 
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "upazilas";
    protected $fillable = [
        'id', 'district_id', 'name', 'bn_name'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function division()
    {
        return $this->belongsToThrough(Division::class, District::class);
    }
}
