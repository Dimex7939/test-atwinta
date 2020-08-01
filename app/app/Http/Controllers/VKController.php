<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\VKService;
use Illuminate\Support\Facades\Auth;

class VKController extends Controller
{

	protected $vkService;

    public function __construct(VKService $vkService) 
    {
        $this->vkService = $vkService;
    }

    public function vk()
    {
    	return \Socialite::with('vkontakte')->redirect();
    }

    public function vkRedirect()
    {
    	$this->vkService->authVkUser();
    	if(Auth::Check())
    	{
    		return \Redirect::route('form-add');
    	}
    }
}
