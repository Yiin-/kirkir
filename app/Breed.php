<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';
    protected $fillable = [
        'pet_type_id',
        'name',
        'image_id',
    ];

    public function type()
    {
        return $this->belongsTo(PetType::class);
    }

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
