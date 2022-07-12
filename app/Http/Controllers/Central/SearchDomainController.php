<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class SearchDomainController extends Controller
{

    public function domainSearch()
    {
        return view('central.search.domainSearch');
    }

}
