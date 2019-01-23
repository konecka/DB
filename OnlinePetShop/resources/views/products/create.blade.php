@extends('layouts.app')

@section('content')

<div class="card uper">
    <div class="card-header">
        Add Product
    </div>
    <div class="card-body">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br/>
        @endif

        <form method="post" action="{{ route('products.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="name">Category:</label>
                <input type="text" class="form-control" name="category_id"/>
            </div>
            <div class="form-group">
                <label for="name">Amount:</label>
                <input type="text" class="form-control" name="amount"/>
            </div>
            <div class="form-group">
                <label for="name">Manufacturer:</label>
                <input type="text" class="form-control" name="manufacturer"/>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
</div>
@endsection