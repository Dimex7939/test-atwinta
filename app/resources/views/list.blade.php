@if(!empty($posts))
@foreach($posts as $post)
<a href="/paste/{{$post->link}}">
	<div id="users">
		<p>{{$post->title}}</p>
		<p>{{$post->time_ago}}</p>
	</div>
</a>
@endforeach
@endif