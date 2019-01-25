@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Departments</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>Id</th>
                            <th>Department Name</th>
                            </thead>
                            <tbody>
                            @foreach($dept as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
