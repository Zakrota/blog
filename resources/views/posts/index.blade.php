@extends('main')

@section('title','Laravel | Show All Post')

@section('content')

<div class="row">
		<div class="col-md-10">
		
				<h1>All Post</h1>
			
		</div>
		<div class="col-md-2">
			
			<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"> Create New Post</a>
		</div>
           
</div>
 <hr>
<div class="row">
	
		<div class="col-md-12">
		    <table class="table">
		    	<thead>
		    		<th>#</th>
		    		<th>Title</th>
		    		<th>body</th>
		    		<th>Create at</th>
		    		<th></th>

		    	</thead>
		    	<tbody>
		    	@foreach($posts as $post)
			    	<tr>
			    	    <th>{{ $post->id }}</th>
			    		<td>{{ $post->title }}</td>
			    		<td>{{ substr($post->body,0,30) }}{{ strlen($post->body) > 30 ? "..." : "" }}</td>
			    		<td>{{ date('M j ,Y', strtotime($post->created_at)) }}</td>
			    		<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-default">View</a><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-default">Edit</a></td>
			    	</tr>
		    	@endforeach

                 
		    	</tbody>

		    </table>
			
			<div class="text-center"> 

            {!!$posts->links()!!}
			</div>
		</div>
</div>

@stop