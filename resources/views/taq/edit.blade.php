@extends('main')

@section('title',"| Edit Tag")

@section('content')

<div class="row">
	<div class="col-md-8" >
		{!! Form::model($tags,['route'=>['taqs.update',$tags->id],'method'=>'PUT']) !!}
		{{Form::label('name','New Tag:')}}
		{{Form::text('name',null,['class'=>'form-control'])}}
		{{Form::submit('Change Tag',['class'=>'btn btn-success ','style'=>'margin-top:18px'])}}

		{!! Form::close() !!}
	</div>
</div>

@endsection
