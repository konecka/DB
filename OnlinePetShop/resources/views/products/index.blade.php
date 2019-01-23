@extends('layouts.app')

@section('content')


<div class="container">
    @if(Auth::check())

    <div class="card">
        <div class="card-header">
            <label>Products</label>
        </div>
        
        <div class="card-body">
            <?php $i = 0; ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Manufacturer</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($products as $product)
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <div>{{$product->name}}</div>
                        </td>
                        <td>
                            <div>{{$product->category}}</div>
                        </td>
                        <td>
                            <div>{{$product->manufacturer}}</div>
                        </td>
                        <td>
                            <div>{{$product->description}}</div>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id)}}" class="btn btn-warning iframe">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('products.destroy', $product->id)}}" class="btn btn-danger iframe">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
    @else
        <div class="alert alert-info">
            <a href="/login">You must be logged in.</a>
        </div>
    @endif
</div>
@endsection