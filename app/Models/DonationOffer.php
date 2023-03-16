<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DonationOffer extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'status', 'blood_type', 'phone_number', 'location', 
        'weight', 'age', 'id_number',  'name' , 'deleted_at'];

    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];
}
