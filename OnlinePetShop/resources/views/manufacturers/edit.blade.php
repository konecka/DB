@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-header">
            Edit manufacturer
        </div>
        <div class="card">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('manufacturers.update', $manufacturer->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $manufacturer->name}}"/>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>

                    <input type="text" class="form-control" name="address" value="{{ $manufacturer->address}}" />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>

                    <input type="text" class="form-control" name="email" value="{{ $manufacturer->email}}" />
                </div>

                <div class="form-group">
                    <button name="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <a href="{{ route('manufacturers.index')}}" class="btn btn-danger iframe">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection