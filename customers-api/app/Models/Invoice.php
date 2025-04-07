<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerId',
        'amount',
        'status',
        'billedDate',
        'paidDate',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function getCustomerIdAttribute($value)
    {
        return $value;
    }

    public function setCustomerIdAttribute($value)
    {
        $this->attributes['customer_id'] = $value;
    }

    public function getBilledDateAttribute($value)
    {
        return $value;
    }

    public function setBilledDateAttribute($value)
    {
        $this->attributes['billed_date'] = $value;
    }

    public function getPaidDateAttribute($value)
    {
        return $value;
    }

    public function setPaidDateAttribute($value)
    {
        $this->attributes['paid_date'] = $value;
    }

    protected $appends = ['customer_id', 'billed_date', 'paid_date'];

    public function toArray()
    {
        $array = parent::toArray();
        $array['customerId'] = $this->customer_id;
        $array['billedDate'] = $this->billed_date;
        $array['paiddDate'] = $this->paid_date;
        unset($array['customer_id']);
        unset($array['billed_date']);
        unset($array['paid_date']);
        return $array;
    }
}
