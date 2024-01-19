<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $collection = 'customers';
    protected $fillable = ['first_name','last_name', 'gender', 'age', 'mobile_number', 'email', 'city', 'login', 'car_model', 'salary'];
}
