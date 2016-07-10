<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    protected $table = 'pet_types';
    protected $fillable = [
        'name',
        'description',
        'image_id',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'type_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
