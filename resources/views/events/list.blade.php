@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-4">
		<h3>List of all Events</h3>
	</div class="col-md-4 col-md-offset-4"><a href="{{route('events.add')}}" class="btn btn-primary">Create Event</a>
	
	<div class="col-md-12">
		 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Actions</th>
			</thead>

			<tbody>
				@foreach($allviews as $item)
				<tr>
					<td></td>
					<td>{{$item->title}}</td>
					<td>{{$item->description}}</td>
					<td>
						<img src="/upload/events/{{$item->image}}" title="{{$item->image}}" class="img-circle"></td>
					<td>
						

						<form action="{{route('events.destroy', $item->id)}}" method="post">

							@csrf
							@method("DELETE")

							<a href="#">View</a>
							<a href="{{route('events.edit', $item->id)}}">Edit</a>

							<button type="submit" class="btn btn-link" >Delete</button>


						</form>

						<!-- <a href="{{route('events.destroy', $item->id)}}">Delete</a> -->
					</td>

				</tr>
				@endforeach
			</tbody>
		</table> 
		</div>
	</div>
</div>
</div>
@endsection