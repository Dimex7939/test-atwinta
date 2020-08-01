@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1>Ваши пасты</h1>
        <div class="col-md-8">
            @if(!empty($posts))
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header"><a href="/paste/{{$post->link}}">{{$post->title}}</a></div>

                <div class="card-body">
                    {{$post->time_ago}}
                </div>
            </div>
            @endforeach
            @else
                У вас нет своих паст
            @endif
        </div>
    </div>
</div>
@endsection
