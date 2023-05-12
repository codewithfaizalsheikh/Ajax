<?php

namespace App\Models;
use App\Models\invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
