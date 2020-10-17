<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'image'];

    //Accessor use to get value according to need
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }

    //Mutators use to store value according to need wheter uppercase or encrypt password
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }
}
