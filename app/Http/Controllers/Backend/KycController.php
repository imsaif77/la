<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kyc;

class KycController extends Controller
{
    public function index()
    {
        return view('backend.kyc.kyc');
    }

    public function kyc_application()
    {
        return view('backend.kyc.kyc');
    }
}
