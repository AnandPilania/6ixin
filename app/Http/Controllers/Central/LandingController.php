<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function mainLanding()
    {
        return view('central.landing.mainLanding');
    }

}
