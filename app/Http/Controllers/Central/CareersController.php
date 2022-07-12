<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class CareersController extends Controller
{

    public function mainCareers()
    {
        return view('central.careers.mainCareers');
    }

}
