<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_product extends Model
{
    use HasFactory;
    protected $table = 'status_product';
    protected $guarded = [];
    public function status_product() {
        return $this->hasOne(Order::class, 'status', 'id');
    }
    
}
