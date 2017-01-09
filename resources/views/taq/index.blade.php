@extends('main')

@section('title','| Item of Tags ')

@section('content')


<div class="row">
	
	<div class="col-md-8">
		<table class="table">		
			<thead> 
			    <tr>
					<th>#</th>
					<th>name</th>
				</tr>
			</thead>
			<tbody>
			@foreach($taqs as $tag)
			     <tr>
					<th>{{$tag->id}}</th>
					<td><a href="{{route('taqs.show',$tag->id)}}">{{$tag->name}}</a></td>
				 </tr>
			@endforeach
			</tbody>
		</table> 
	</div> <!-- end of table column  -->
	<div class="col-md-3">
		<div class="well">
			{{Form::open(['route'=>'taqs.store','method'=>'POST'])}}
	         <h2> New Category</h2>
	         {{Form::label('name',' Tag Name:')}}
	         {{Form::text('name',null,['class'=>'form-control'])}}
	         {{Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
			{{Form::close()}}
		</div>
	</div>
</div>


@endsection