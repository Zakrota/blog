@extends('main')

@section('title','Laravel | Show Post')

@section('content')
<div class="row">
	<div class="col-md-8">

	<h1>{{$post->title}}</h1>

	<p class="lead"> {{$post->body}}</p>
	<div class="tags">
		@foreach($post->taq as $tags)
		<span class="label label-default">{{$tags->name}}</span>

		@endforeach
	</div>
	</div>

	<div class="row">
		
		<div class="col-md-4">
		    <div class="well">
		            <dl class="dl-horizontal">
					<lable>slug url:</lable>
					<p><a href="{{url('blog/'.$post->slug)}}">{{ route('blog.single',$post->slug) }}</a></p>
					</dl>
					<dl class="dl-horizontal">
					<lable>Category:</lable>
					<p>{{ $post->category->name }}</p>
					</dl>
					<dl class="dl-horizontal">
					<lable>Create At:</lable>
					<p>{{date('M j,Y | h:ia ',strtotime($post->created_at))}}</p>
					</dl>
					<dl class="dl-horizontal">
					<lable>Updated At:</lable>
					<p>{{date('M j,Y | h:ia ',strtotime($post->updated_at))}}</p>
					</dl>
			
			<hr>
			<div class="row">
					<div class="col-md-6">
					{{ Html::linkRoute('posts.edit','Edit',array($post->id),array('class' => 'btn btn-primary btn-block')) }}
						
					</div>
					<div class="col-md-6">
					{{ Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) }}
					{{ Form::submit('Delete',['class' => 'btn btn-danger btn-block']) }}
					{{ Form::close() }}

					</div>

           </div>
          <hr>
           <div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index','<< All Posts',[],array('class' => 'btn btn-default btn-block')) }}
							
					</div>
			</div>
          </div>
		</div>
	</div>
		
</div>




@endsection