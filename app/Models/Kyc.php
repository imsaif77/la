<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kyc;


class Kyc extends Model
{
    use HasFactory;

    protected $table = 'kycs';

    protected $guarded =[];


    public function user()

    {

        return $this->belongsTo('App\Models\User', 'user_id', 'id');

    }

}
