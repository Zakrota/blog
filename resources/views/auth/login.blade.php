@extends('main')
@section('title','| Login')
@section('content')


<div class="row">
	
   <div class="col-md-6 col-md-offset-3">
   	
   	{!!  Form::open() !!}
      
	     {{ Form::label('email', 'Email :') }}
	      {{Form::email('email',null,['class'=>'form-control'])}}
	      {{ Form::label('password', 'Password :') }}
	      {{Form::password('password',['class'=>'form-control'])}}
	      {{Form::checkbox('rememeber')}}{{ Form::label('rmemeber', 'Remember me') }}
	      {{Form::submit('login',['class'=>'btn btn-primary btn-block '])}}
           <a href="/password/reset">Forget My Password</a>
          
   	{!!  Form::close() !!}

   </div>

</div>
@endsection