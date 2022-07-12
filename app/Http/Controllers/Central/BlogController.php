<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function mainBlog()
    {
        return view('central.blog.mainBlog');
    }

}
