@extends('layouts.layout')
@section('title', 'Добавить пасту')

@section('content')
<form method="post" action="/add">
	@foreach ($errors->all() as $error)
			    <li class="error">{{ $error }}</li>
			@endforeach
		<div class="row">
			<div class="col-md-10">
				@csrf
				<div class="row ml-2"><p class="mr-3 mt-3">Название текста</p><input type="text" name="title" placeholder="Введите название"></div>
				<textarea name="paste" id="" cols="30" rows="15" class="form-control my-3"></textarea>
				<div class="row ml-2 mt-3">
					<div>
						<p class="mr-3">Время доступа по ссылке</p>
						<select class="form-control" name="exp_time" id="timeAccess">
						  <option value="0">10 минут</option>
						  <option value="1">1 час</option>
						  <option value="2">3 часа</option>
						  <option value="3">1 день</option>
						  <option value="4">1 неделя</option>
						  <option value="5">1 месяц</option>
						  <option value="6">Без ограничений</option>
						</select>
					</div>
					<div class="ml-4">
						<p class="mr-3">Ограничение доступа</p>
						<select class="form-control" name="access" id="limitAccess">
						  <option value="0">Доступна всем, видна в списках</option>
						  <option value="1">Доступна только по ссылке</option>
						  <option value="2">Доступна только мне</option>
						</select>
					</div>
					<div class="ml-5">
						<p>Имя</p>
						<input type="text" name="name" class="form-control" {{Auth::check() ? 'readonly' : ''}} value="{{Auth::check() ? Auth::user()->name : '' }}">
					</div>
					<div class="ml-5">
						Анонимно
						<div class="form-check ml-4">
						  <label class="form-check-label">
						    <input type="checkbox" name="anon" class="form-check-input" value="1">
						  </label>
						</div>
					</div>
					<div class="ml-5 mt-4" id="btnLinkPage">
						<button type="submit" name="add" class="btn btn-success">Добавить</button>
					</div>
				</div>

			</div>
			<div class="col-md-2" id="rightBlock">
				@include('list')
			</div>
		</div>
	</form>
@endsection