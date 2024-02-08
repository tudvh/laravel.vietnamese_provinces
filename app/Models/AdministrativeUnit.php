<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeUnit extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'full_name_en', 'short_name', 'short_name_en', 'code_name', 'code_name_en'];
}
