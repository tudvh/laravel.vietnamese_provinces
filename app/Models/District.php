<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    protected $fillable = ['name', 'name_en', 'full_name', 'full_name_en', 'code_name', 'province_code', 'administrative_unit_id'];

    public function province()
    {
        return $this->hasOne(Province::class, 'code', 'province_code');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_code', 'code');
    }
}
