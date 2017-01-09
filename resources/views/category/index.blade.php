@extends('main')

@section('title','| Item of Category ')

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
			@foreach($categories as $category)
			     <tr>
					<th>{{$category->id}}</th>
					<td>{{$category->name}}</td>
				 </tr>
			@endforeach
			</tbody>
		</table> 
	</div> <!-- end of table column  -->
	<div class="col-md-3">
		<div class="well">
			{{Form::open(['route'=>'categories.store','method'=>'POST'])}}
	         <h2> New Category</h2>
	         {{Form::label('name',' Category Name:')}}
	         {{Form::text('name',null,['class'=>'form-control'])}}
	         {{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
			{{Form::close()}}
		</div>
	</div>
</div>


@endsection