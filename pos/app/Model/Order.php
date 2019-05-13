<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['payment_id', 'user_id', 'table_number','diskon', 'total', 'email',  'created_at'];
    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
