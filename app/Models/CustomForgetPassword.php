<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomForgetPassword extends Model
{
    use HasFactory;
    protected $table = 'custom_forget_passwords';
    protected $fillable = ['email' , 'code'];

}
