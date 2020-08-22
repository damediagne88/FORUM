@extends('layouts.app')

@section('content')

<div class="container">

<div class="alert alert-dismissible label-primary col-md-8">



<blockquote>
  <p>{{$topic->title}}</p>
  <small style="color:black;">{{ $topic->content}} </small>
</blockquote>

<span class="label label-success">Posté le  : {{ $topic->created_at->format('d/m/Y à H:m')}}</span>
<span class="label label-success">Autheur   : {{ $topic->user->name}}</span>

</div>   



</div>

<div class="container">
<a href="{{ route('topics.edit',$topic)}}"><span class="label label-success">EDITER</span></a>
</div>


@endsection