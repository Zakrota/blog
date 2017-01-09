@extends('main')
@section('title','| Blog Edit Post')

@section('css')

{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<div class="row">
{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}

	<div class="col-md-8">
	    <label >Title :</label>
    	{{Form::text('title',null,['class'=>'form-control'])}}
        <label>Slug :</label>
    	
    	{{ Form::text('slug', null ,['class'=>'form-control']) }}
    	{{Form::label('category_id','Category:')}}
    	{{Form::select('category_id',$categories,null,['class'=>'form-control select2-multi'])}}
    	{{Form::label('tags','tags:')}}
    	{{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
        <label>Body :</label>
	    {{Form::textarea('body',null,['class'=>'form-control'])}}

	</div>

	<div class="row">
		
		<div class="col-md-4">
		    <div class="well">
		           
					<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{date('M j,Y | h:ia ',strtotime($post->created_at))}}</dd>
					</dl>
					<dl class="dl-horizontal">
					<dt>Updated At:</dt>
					<dd>{{date('M j,Y | h:ia ',strtotime($post->updated_at))}}</dd>
					</dl>
			
			<hr>
			<div class="row">
					<div class="col-md-6">
					{{Html::linkRoute('posts.show','Cancel',array($post->id),array('class' => 'btn btn-danger btn-block'))}}
						
					</div>
					<div class="col-md-6">
					{{Form::submit('Save Change',['class' => 'btn btn-success btn-block'])}}
					

					</div>
           </div>
           </div>
		</div>
	</div>
		{{Form::close()}}
</div>
@stop

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-multi').select2().val({!! json_encode($post->taq()->getRelatedIds()) !!}).trigger('change');
</script>
@endsection