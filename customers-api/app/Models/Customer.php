<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postalCode',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getPostalCodeAttribute($value)
    {
        return $value;
    }

    public function setPostalCodeAttribute($value)
    {
        $this->attributes['postal_code'] = $value;
    }

    protected $appends = ['postalCode'];

    public function toArray()
    {
        $array = parent::toArray();
        $array['postalCode'] = $this->postal_code;
        unset($array['postal_code']);
        return $array;
    }
}
