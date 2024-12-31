<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\District;
use App\Models\Municipality;

class Province extends Model
{
    protected $table = 'province'; 
    protected $primaryKey = 'province_id'; 
    public $timestamps = false; 


    protected $fillable = ['province_name'];

    public function districts(): HasMany{
        return $this->hasMany(District::class , 'province_id','district_id');
    }

    public function municipality(): HasMany{
        return $this->hasMany(Municipality::class);
    }
}
