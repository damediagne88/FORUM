@extends('layouts.app')



@section('content')

<div class="container">

<div class="alert alert-dismissible label-primary col-md-12">

<blockquote>
  <p>{{$topic->title}}</p>
  <small style="color:black;">{{ $topic->content}} </small>
</blockquote>

<span class="label label-success">Posté le  : {{ $topic->created_at->format('d/m/Y à H:m')}}</span>
<span class="label label-success">Autheur   : {{ $topic->user->name}}</span>

</div>   

</div>

<div class="container">
<div class="row">
@can('update',$topic)
<div class="col-md-2 col-xs-3">
<button type="submit" class="btn btn-primary"><a href="{{ route('topics.edit',$topic)}}"><span style="color:white;">EDITER</span></a></button>
</div>
@endcan

<div class="col-md-2 col-xs-3 ">
@can('delete',$topic)
<form method="post" action="{{ route('topics.destroy',$topic) }}">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-primary">DELETE</button>
</form>
@endcan
</div>

</div>


</div>
<hr>

<div class="container">
<div class="row">

<p> Ce topic à  {{ $topic->comments->count()}} Comment(s)</p>
@forelse($topic->comments as $comment)

<div class="well well-sm">
  {{ $comment->content}}<br>
  <span class="label label-success">Posté le  : {{ $comment->created_at->format('d/m/Y')}}</span>
<span class="label label-success">Autheur   : {{ $comment->user->name}}</span>
<solution-button></solution-button>
</div>

@foreach($comment->comments as $commentReply)

<div style="margin-left:50px;" class="well well-sm">
  {{$commentReply->content}}<br>
  <span class="label label-success">Posté le  : {{ $commentReply->created_at->format('d/m/Y')}}</span>
<span class="label label-success">Autheur   : {{ $commentReply->user->name}}</span>
</div>

@endforeach


@auth

<h4>Répondre a ce comment</h4>

<form  class="form-horizontal" method="post" action="{{ route('comments.storeReply',$comment)}}">
@csrf
<div class="form-group ">
<div class="col-lg-10 ">
        <textarea class="form-control" rows="3" id="replyComment" name="replyComment" placeholder="Répondre a ce commentaire"></textarea>
        @if($errors->has('replyComment'))
        <p style="color:red;">{{ $errors->first('replyComment')}}</p>
        @endif
      </div>
</div>
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">REPONDRE</button>
      </div>
    </div>
 
</form>
@endauth

@empty
<div class="alert alert-dismissible alert-success">
  <strong> Aucun commentaire pour ce topic </strong> 
</div>
@endforelse
</div>
</div>

@auth
<div class="container">
<div class="row">
<h1>Posté un Commentaire</h1>
<div class="col-md-8">
<form class="form-horizontal" method="post" action="{{ route('comments.store',$topic)}}">

@csrf
  <fieldset>
    <legend>COMMENTAIRES</legend>

    
    <div class="form-group">
      <label for="content" class="col-lg-2 control-label">COMMENTAIRES</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="content" name="content" placeholder="votre commentaire"></textarea>
        @if($errors->has('content'))
        <p style="color:red;">{{ $errors->first('content')}}</p>
        @endif
      </div>
    </div>
  
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">CANCEL</button>
        <button type="submit" class="btn btn-primary">CREATE</button>
      </div>
    </div>


  </fieldset>

  
</form>
</div>

</div>
</div>

@endauth
@endsection