@extends('layouts.app')

@section('content')


<div class="container">
    @if(Auth::check())

    <div class="card">
        <div class="card-header">
            <label>Manufacturers</label>
        </div>
        
        <div class="card-body">

            <a href="{{ route('manufacturers.create') }}" class="btn btn-success">
                <i class="fas fa-plus-square"></i> Create
            </a><br><br>

            <?php $i = 0; ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($manufacturers as $manufacturer)
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <div>{{$manufacturer->name}}</div>
                        </td>
                        <td>
                            <div>{{$manufacturer->address}}</div>
                        </td>
                        <td>
                            <div>{{$manufacturer->email}}</div>
                        </td>
                        <td>
                            <a href="{{ route('manufacturers.edit', $manufacturer->id)}}" class="btn btn-warning iframe">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('manufacturers.destroy', $manufacturer->id)}}" class="btn btn-danger iframe">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $manufacturers->onEachSide(1)->links() }}
        </div>
    </div>
	@else
	    <div class="alert alert-info">
	        <a href="/login">You must be logged in.</a>
	    </div>
	@endif
</div>
@endsection