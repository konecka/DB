@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-header">
            Edit product
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
            <form method="post" action="{{ route('products.update', $manufacturer->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name}}"/>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{category->name}}</option>
                        @endforeach
                    </select>

                    <!-- <input type="text" class="form-control" name="address" value="{{ $product->address}}" /> -->
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>

                    <input type="text" class="form-control" name="email" value="{{ $product->email}}" />
                </div>

                <div class="form-group">
                    <button name="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <a href="{{ route('products.index')}}" class="btn btn-danger iframe">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection