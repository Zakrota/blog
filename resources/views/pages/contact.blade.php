@extends('main')
@section('title','Laravel |Contact ME')

@section('content')
<div class="row">
	
	<div class="col-md-12">
		<h1>Contact ME</h1>
		<hr>
		<div class="form-group">
			
			<label>Email:</label>
			<input type="text" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			
			<label>Subject:</label>
			<input type="text" name="subject" id="subject" class="form-control">
		</div>
		<div class="form-group">
			
			<label>Massege:</label>
			<textarea name="massege" id="massege" class="form-control"> Enter Your Massege</textarea>
		</div>
		<input type="submit" value="Send Massege" class="btn btn-success ">
	</div>
</div>
@endsection