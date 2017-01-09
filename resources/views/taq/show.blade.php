@extends('main')

@section('title',"| $tags->name Tag")

@section('content')


<div class="row">
	<div class="col-md-8">
		<h1>{{ $tags->name}} Tag <small>{{$tags->post->count()}} Posts</small></h1>
	</div>
	<div class="col-md-2">
		<a href="{{route('taqs.edit',$tags->id)}}" class="btn btn-block btn-xm btn-primary pull-right" style="margin-top: 20px;"><b>Edit</b></a>
	</div>
	<div class="col-md-2">
		{{Form::open(['route'=>['taqs.destroy',$tags->id],'method'=>'DELETE'])}}
         {{Form::submit('Delete',['class'=>'btn btn-danger btn-block','style'=>'margin-top:20px;'])}}
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
				<th>#</th>
				<th>Title</th>
				<th>Tags</th>
				<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($tags->post as $post)
				<tr>
					<th>{{$post->id}}</th>
					<td>{{$post->title}}</td>
					<td>
					@foreach($post->taq as $tag)
					<span class="label label-default">{{$tag->name}}</span>
					@endforeach

					</td>
					<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default">view</a></td>

				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection