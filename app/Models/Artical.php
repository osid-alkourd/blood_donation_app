<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'url' , 'image_url' , 'description' , 'user_id'];

    public static function validateRules(){
        return [
            'title' => ['required' , 'string' , 'max:70' , 'min:3'] , 
            'description' => ['required' , 'string', 'min:5'] , 
            'url' => ['required', 'string'],
            'image' => ['mimes:jpg,png'] , 

          ];
    }
}
