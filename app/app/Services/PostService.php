<?

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService implements PostInterface
{
	public function addPost(array $data)
    {
    	$data['anon'] = (int) isset($data['anon']);
    	$data['link'] = $this->createUrl();
    	$data['user_id'] = Auth::check() ? Auth::user()->id : null;

    	$post = Post::create($data);

    	return $data['link'];
    }

	private function createUrl() 
  	{ 
    	$bytes = random_bytes(3);
		return bin2hex($bytes);
  	} 

  	public function getList()
  	{
  		 return Post::where('access', 0)->orderBy('id', 'desc')->get();
  	}

	public function getById($id)
	{
		return Post::where('link', $id)->get()->first();
	}

	public function getUserList()
	{
		return Post::where('user_id', Auth::user()->id)->get();
	}
  	public function timeAgo($posts, $isList) //Функция фильтрации записей, отметание записей с истекшим сроком 
    {
    	if(!$isList) //Если один пост
    	{
    		$posts = [$posts];
    	}
    	foreach ($posts as $key => $post) 
    	{
    		$time_ago = time() - strtotime($post->created_at);
			$minutes = round($time_ago/60);
			$hours = round($time_ago/60/60);
			$days = round($time_ago/60/60/24);
			$weeks = round($time_ago/60/60/24/7);
			if($time_ago < 60)
				$time_ago = 'Сейчас';
			elseif($time_ago < 3600)
				$time_ago = $minutes.' минут назад';
			elseif($time_ago < 86400)
				$time_ago = $hours.' часов назад';		
			else
				$time_ago = $days.' дней назад';  //Для отображения времени

			$authUser = Auth::check() ? Auth::user()->id : null;
			if(($post->exp_time == 0 && $minutes > 10) || ($post->exp_time == 1 && $hours > 1) || ($post->exp_time == 2 && $hours > 3) || ($post->exp_time == 3 && $days > 1) || ($post->exp_time == 4 && $weeks > 1) || ($post->exp_time == 5 && $weeks > 30 || ($post->access == 2 && $post->user_id !== $authUser)))
				unset($posts[$key]);   //если истекло время действия
			else
				$posts[$key]->time_ago = $time_ago;
		}
		if(count($posts) > 10)
		{
			$posts = array_slice($posts, 0, 10);
		}
		return $posts;
    }
}
