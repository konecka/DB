@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-header">
            Add category
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
            <form method="post" action="{{ route('categories.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>

                    <input type="text" class="form-control" name="description" />
                </div>

                <div class="form-group">
                    <button name="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <a href="{{ route('categories.index')}}" class="btn btn-danger iframe">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection