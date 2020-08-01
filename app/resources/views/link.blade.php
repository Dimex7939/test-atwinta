@extends('layouts.layout')
@section('title', 'Ссылка на код')

@section('content')
<form>
		<p class="text-center">Ваша ссылка на код</p>
		<div id="linkDiv">
			<p id="link"><a href="/paste/{{$link}}">{{Request::root().'/paste/'.$link}}
 </a></p>
		</div>
		<div class="text-center mt-3 mb-5">
			<button id="copy" type="button" class="btn btn-warning">Скопировать</button>
		</div>
		<div class="text-center" id="mainBtnLink">
		<a href="{{ route('form-add') }}"><button type="button" class="btn btn-primary">На главную</button></a>
		</div>
	</form>
</div>
<script>
	copy.onclick = function() {
    navigator.clipboard.writeText(document.getElementById("link").textContent)
  	.then(() => {
    	alert('Ссылка скопирована!');
  	})
  	.catch(err => {
    	console.log('Что-то пошло не так:( :', err);
  	});
  };
</script>
@endsection