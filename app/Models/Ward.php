<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';

    protected $fillable = ['name', 'name_en', 'full_name', 'full_name_en', 'code_name', 'district_code', 'administrative_unit_id'];

    public function district()
    {
        return $this->hasOne(District::class, 'code', 'district_code');
    }
}
