@extends('layouts.app')

@section('title', 'Data comics')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Comics</h6>
    </div>
    <div class="card-body">
    @if (auth()->user()->role == 'Admin')
      <a href="{{ route('comics.create') }}" class="btn btn-primary mb-3">Add Comics</a>
      @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>#</th>
              <th>ISBN</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Published</th>
              <th>Available</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          @if($comics->count() > 0)
            @foreach ($comics as $row)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $row->isbn }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->author }}</td>
                <td>{{ $row->category }}</td>
                <td>{{ $row->published }}</td>
                <td>{{ $row->available }}</td>
                <td>
                @if ($row->available > 0)
                  @if($row->status == 'Available')
                        <span class="badge badge-success">Available</span>                 
                      @else
                        <span class="badge badge-danger">Unavailable</span>
                      @endif
                      @else
                        <span class="badge badge-danger">Unavailable</span>
                      @endif
                </td>
                <td>
                @if (auth()->user()->role == 'Customer')
                <form action="{{ route('comics.show', $row->id) }}" method="GET" class="btn btn-info p-0" style="justify-content: center; align-items: center;">
                        <button type="submit" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                            <i class="fa fa-book" style="font-size: 14px; color: white;"></i>
                        </button>
                    </form>
                  @endif
                @if (auth()->user()->role == 'Admin')
                <form action="{{ route('comics.show', $row->id) }}" method="GET" class="btn btn-info p-0" style="justify-content: center; align-items: center;">
                        <button type="submit" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                            <i class="fa fa-book" style="font-size: 14px; color: white;"></i>
                        </button>
                    </form>
                  
                      <form action="{{ route('comics.edit', $row->id) }}" method="GET" class="btn btn-warning p-0" style="justify-content: center; align-items: center;">
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
                    <form action="{{ route('comics.destroy', $row->id) }}" method="POST" id="delete-form{{$row->id}}">
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
                    <form action="{{ route('comics.destroy', $row->id) }}" method="POST" class="btn btn-danger p-0" id="delete-btn{{$row->id}}">
                      @csrf
                      @method('DELETE')
                      <button type="button" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border: none; background: none;">
                        <i class="fas fa-trash" style="color: white;" data-toggle="modal" data-target="#deleteModal{{$row->id}}"></i>
                      </button>
                    </form>
                    @endif 
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
            <div class="alert alert-danger">No Comics found</div>
          @endif
          </tbody>
        </table>

        <!-- Pagination links -->
        {{ $comics->links() }}
        
      </div>
    </div>
  </div>
@endsection
