@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">
<form class="form-horizontal" method="post" action="{{ route('topics.update',$topic)}}">

@csrf
@method('PUT')
  <fieldset>
    <legend>CREATE NEW TOPICS</legend>
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $topic->title }}" placeholder="Title">
        @if($errors->has('title'))

        <p style="color:red;">{{ $errors->first('title')}}</p>

        @endif
      </div>
    </div>
    
    <div class="form-group">
      <label for="content" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="content" name="content">{{  $topic->content}}
        </textarea>
        @if($errors->has('content'))

        <p style="color:red;">{{ $errors->first('content')}}</p>

        @endif
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