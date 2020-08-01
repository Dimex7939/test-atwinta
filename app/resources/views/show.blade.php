@extends('layouts.layout')
@section('title', 'Просмотр')

@section('content')
@if(!empty($post))
@section('title', $post->title)
<form>
	<div class="row">
		<div class="col-md-10" id="viewLeftBlock">
			<div class="row ml-2"><p class="mr-3 mt-3">{{$post->title}}</p></div>
			<textarea name="" id="" cols="30" rows="15" class="form-control my-3" disabled="">{{$post->paste}}</textarea>
			<p>Был опубликован: {{$post->anon ? 'анонимно' : $post->name}} {{$post->time_ago}}</p>
			<div class="text-center mt-3">
			<button class="btn btn-primary"><a href="/">На главную</a></button>
			</div>
		</div>
		<div class="col-md-2" id="rightBlock">
			@include('list')
		</div>
	</div>
</form>
@else
<h1>Код недоступен</h1>
@endif
@endsection