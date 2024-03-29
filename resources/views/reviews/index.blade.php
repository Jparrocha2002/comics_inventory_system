@extends('layouts.app')
 
@section('title', 'Reviews')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
    <h6 class="m-0 font-weight-bold text-primary">Reviews</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Add New Review</a>
      @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Rating</th>
              <th>Feedback</th>
              <th>Rater Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($reviews->count() > 0)
            @foreach ($reviews as $row)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $row->title }}</td>
                <td>{{ $row->rating }}</td>
                <td>{{ $row->feedback }}</td>
                <td>{{ $row->rater_name }}</td>
                <td>
                <form action="{{ route('reviews.show', $row->id) }}" method="GET" class="btn btn-info p-0" style="justify-content: center; align-items: center;">
                        <button type="submit" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                            <i class="fa fa-book" style="font-size: 14px; color: white;"></i>
                        </button>
                    </form>
                  
                      <form action="{{ route('reviews.edit', $row->id) }}" method="GET" class="btn btn-warning p-0" style="justify-content: center; align-items: center;">
                        <button type="submit" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                            <i class="fa fa-edit" style="font-size: 14px; color: white;"></i>
                        </button>
                    </form>

                    <div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$row->id}}"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{$row->id}}">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('reviews.destroy', $row->id) }}" method="POST" id="delete-form{{$row->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{$row->id}})">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            $('#delete-form'+id).submit();
        }
    </script>
               

<!-- Button to Trigger Delete Confirmation Modal -->
              <form action="{{ route('reviews.destroy', $row->id) }}" method="POST" class="btn btn-danger p-0" id="delete-btn{{$row->id}}">
                @csrf
                @method('DELETE')
                <button type="button" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                  <i class="fas fa-trash" style="color: white;" data-toggle="modal" data-target="#deleteModal{{$row->id}}"></i>
                </button>
              </form>
                  
                  <!-- <form action="{{ route('comics.destroy', $row->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                                      <i class="fas fa-trash" style="color: white;"></i>
                                  </button>
                              </form> -->
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                    <div class="alert alert-danger">No Users found</div>
                @endif()
        </tbody>
    </table>
@endsection