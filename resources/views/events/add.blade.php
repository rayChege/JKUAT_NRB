@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-6">
		<h1>Create New Event</h1>

		<form method="post" action="{{ route('events.store')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="col-md-8">
				<label>Title</label>
					<input type="text" name="title" value="" class="form-control">
					<br>
				<label>Description</label>
					<textarea name="description" class="form-control"></textarea>
					<br>
				<label>Image</label>
					<input type="file" name="image" class="form-control">
					<br>
					<button type="submit" class="btn btn-primary">Delete</button>

					<button type="submit" class="btn btn-primary">Submit</button>
				
			</div>
		</form>

	</div>
</div><!--end of row-->

</div>
@endsection