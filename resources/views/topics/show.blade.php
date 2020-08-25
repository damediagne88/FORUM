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
@forelse($topic->comments as $comment)

<div class="well well-sm">
  {{ $comment->content}}<br>
  <span class="label label-success">Posté le  : {{ $comment->created_at->format('d/m/Y')}}</span>
<span class="label label-success">Autheur   : {{ $comment->user->name}}</span>
</div>

@empty
<div class="alert alert-dismissible alert-success">
  <strong> Aucun commentaire pour ce topic </strong> 
</div>
@endforelse
<div class="col-md-8">

</div>
</div>
</div>


<div class="container">
<div class="row">

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


@endsection