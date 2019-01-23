@extends('layouts.app')

@section('content')


<div class="container">
    @if(Auth::check())

    <div class="card">
        <div class="card-header">
            <label>Сategories</label>
        </div>
        
        <div class="card-body">

            <a href="{{ route('categories.create') }}" class="btn btn-success">
                <i class="fas fa-plus-square"></i> Create
            </a><br><br>

            <?php $i = 0; ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($categories as $category)
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <div>{{$category->name}}</div>
                        </td>
                        <td>
                            <div>{{$category->description}}</div>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-warning iframe">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('categories.destroy', $category->id)}}" class="btn btn-danger iframe">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->onEachSide(1)->links() }}
        </div>
    </div>
	@else
	    <div class="alert alert-info">
	        <a href="/login">You must be logged in.</a>
	    </div>
	@endif
</div>
@endsection

<!-- <script type="text/javascript">
    jQuery(document).ready(function(){
    jQuery('#submit').click(function(e){
       e.preventDefault();
       jQuery.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({
          url: "{{ url('/form') }}",
          method: 'post',
          data: {
             name: jQuery('#name').val(),
             description: jQuery('#description').val(),
          },
          success: function(data){
                jQuery.each(data.errors, function(key, value){
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').append('<p>'+value+'</p>');
                });
            }
            
          });
       });
    });
</script>
</body>
</html> -->