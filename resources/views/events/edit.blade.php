@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<form method="post" action="{{route('events.update', $event->id)}}" enctype="multipart/form-data">
			{{csrf_field()}}
			@method('PUT')
			<div class="col-md-8">
				<label>Title</label>
					<input type="text" name="title" value="{{$event->title}}" class="form-control">
					<br>
				<label>Description</label>
					<textarea class="form-control" name="description">{{$event->description}}</textarea> 
				<label>Image</label>
					<input type="file" name="image" class="form-control">
					<label>Current image</label>
					<img src="/upload/events/{{$event->image}}">
					<br>
					<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>

@endsection