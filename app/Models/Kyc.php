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


    
    public static function documents($name=null)

    {

        $names = [

            'passport' => __('Passport'),

            'nidcard' => __('National ID Card'),

            'driving' => __('Driver’s License'),

        ];

        if($name) {

            return isset($names[$name]) ? $names[$name] : null;

        }

        return $names;

    }


    
    public static function kyc_fields($name = '')

    {

        $fields = [

            'kyc_opt_hide' => 0,

            'kyc_public' => 1,

            'kyc_before_email' => 0,

            'kyc_firstname' => array('show' => 1, 'req' => 1),

            'kyc_lastname' => array('show' => 1, 'req' => 1),

            'kyc_email' => array('show' => 1, 'req' => 1),

            'kyc_phone' => array('show' => 1, 'req' => 0),

            'kyc_dob' => array('show' => 1, 'req' => 0),

            'kyc_gender' => array('show' => 1, 'req' => 1),

            'kyc_country' => array('show' => 1, 'req' => 1),

            'kyc_state' => array('show' => 1, 'req' => 1),

            'kyc_city' => array('show' => 1, 'req' => 1),

            'kyc_zip' => array('show' => 1, 'req' => 1),

            'kyc_address1' => array('show' => 1, 'req' => 1),

            'kyc_address2' => array('show' => 1, 'req' => 0),

            'kyc_telegram' => array('show' => 1, 'req' => 0),

            'kyc_document_passport' => 1,

            'kyc_document_nidcard' => 1,

            'kyc_document_driving' => 1,

            'kyc_wallet' => array('show' => 1, 'req' => 1),



          



        ];

        if ($name == '') {

            return $fields;

        } else {

            return in_array($name, $fields);

        }

    }

}
