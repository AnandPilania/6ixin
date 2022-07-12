<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function mainInfo()
    {
        return view('central.info.mainInfo');
    }

}
