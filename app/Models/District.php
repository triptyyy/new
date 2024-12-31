<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district'; 
    protected $primaryKey = 'district_id'; 

    
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'district_id');
    }
}
