<?

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VKService
{
	public function authVkUser()
	{
		$userVK = \Socialite::with('vkontakte')->user();

    	$email = $userVK->email == null ? $userVK->nickname : $userVK->email;

    	$user = User::where('vk_id', $userVK->id)->first();

    	if(empty($user))
    	{
    		$user = User::create([
	    		'name' => $userVK->name,
	    		'email' => $email,
	    		'password' => $userVK->token,
	    		'vk_id' => $userVK->id
    		]);
    	}
    	
    	Auth::login($user);
    
	}
}
