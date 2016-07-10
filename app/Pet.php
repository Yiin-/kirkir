<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $fillable = [
        'name',
        'user_id',
        'type_id',
        'breed_id',
        'is_female',
        'born_at',
        'description',
        'location',
    ];

    public function type()
    {
        return $this->belongsTo(PetType::class, 'type_id');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'pet_image');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
