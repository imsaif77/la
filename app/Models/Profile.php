<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'user_id','address1','address2','city','state','country','zipcode',
    ];


    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }
}
