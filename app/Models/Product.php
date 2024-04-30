<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'section_id',
        'updated_by',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
