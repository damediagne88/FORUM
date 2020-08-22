@extends('layouts.app')

@section('content')

<div class="container">

@if ($topics->count() > 0)
     
@foreach($topics as $topic)
<div class="alert alert-dismissible label-primary col-md-8">



<blockquote>
  <p><a href="{{ route('topics.show',$topic)}}">{{ $topic->title}}</a></p>
  <small style="color:black;">{{ $topic->content}} </small>
</blockquote>

<span class="label label-success">Posté le  : {{ $topic->created_at->format('d/m/Y à H:m')}}</span>
<span class="label label-success">Autheur   : {{ $topic->user->name}}</span>


</div>   

@endforeach

@else
<p>Il y'a pas de topic disponible pour le moment ! </p>
@endif


</div>

<div class="container"> 
{{ $topics->links()}}
</div>

@endsection