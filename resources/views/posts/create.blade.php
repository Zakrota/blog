@extends('main')
@section('title','laravel |Create Post')

@section('css')


{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}


@endsection
@section('content')

<div class="row">
	
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(array('route'=>'posts.store')) !!}
            {{Form::label('title','Title:',['class'=>'btn-h1-spacing '])}}
		  	{!!Form::text('title',null,array('class'=>'form-control'))!!}
		  	{{Form::label('slug','Slug:',['class'=>'btn-h1-spacing '])}}
		  	{!! Form::text('slug',null,array('class'=>'form-control')) !!}
		   {{Form::label('category_id','Category:',['class'=>'btn-h1-spacing '])}}
		   <select name="category_id" class="form-control">
               @foreach($categories as $category)
		    	     <option value="{{$category->id}}" >{{$category->name}}</option>
               @endforeach
		   </select>
          {{Form::label('tags','tags:',['class'=>'btn-h1-spacing '])}}
		    <select name="tags[]" class="form-control select2-multi" multiple="multiple">
               @foreach($tags as $tag)
		    	     <option value="{{$tag->id}}" >{{$tag->name}}</option>
               @endforeach
		   </select>
		   {{Form::label('Post_Body ','Post Body :',['class'=>'btn-h1-spacing '])}}
		   {!! Form::textarea('body',null,array('class'=>'form-control')) !!}
		   {!! Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px')) !!}
		   
		{!! Form::close() !!}

	</div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
	
	$('.select2-multi').select2();
</script>

@endsection