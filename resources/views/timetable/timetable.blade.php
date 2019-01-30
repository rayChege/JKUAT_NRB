@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-6">
		<h1>Create New Timetable</h1>

		<form method="post" action="{{ route('timetables.store')}}" enctype="multipart/form-data">

			{{csrf_field()}}
			<div class="col-md-8">
				<label>Year ID</label>
				
					<select name="year_id" class="form-control">
						<option>
							select an year
						</option>
						@foreach($year as $item)
						<option value="{{$item->id}}">
							{{ $item->name}}
						</option>
						@endforeach
					</select>
					<br>
				<label>Department ID</label>
					
					<select name="department_id" class="form-control">
						<option>
							select a department
						</option>
						@foreach($ray as $item)
						<option value="{{$item->id}}">
							{{ $item->name}}
						</option>
						@endforeach
					</select>
					<br>
				<label>Document name</label>
					<input type="file" name="document_name" class="form-control">
					<br>
					
					<button type="submit" class="btn btn-primary">Submit</button>
				
			</div>
		</form>

	</div>
</div><!--end of row-->

</div>
@endsection