<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Province;
class Municipality extends Model
{
    

    protected $table = 'municipality';

    protected $fillable = ['municipality_name', 'district_id', 'type'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function province(): BelongsTo{
        return $this->belongsTo(Province::class, 'province_id');

    }
}
