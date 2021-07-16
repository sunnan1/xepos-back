<?php

namespace App\Models;

use App\Models\Traits\EmployeeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory, EmployeeTrait;

    protected $fillable = ['first_name', 'last_name' , 'email' , 'company_id' , 'phone'];
}
