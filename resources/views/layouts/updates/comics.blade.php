@if (auth()->user()->role == 'Reader')
@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List of Available Comics</h6>
    </div>
    <div class="card-body">
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
                            </div>
                        </td>
                    </tr>
            @endforeach
          @else
            <div class="alert alert-danger">No Comics found</div>
          @endif
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
@endsection
@elseif (auth()->user()->role == 'Admin')
<!-- <div class="card shadow mb-4"> -->
    <div class="card-header py-3">
      <!-- <h6 class="m-0 font-weight-bold text-primary">Comics</h6> -->
    </div>
    <div class="card-body">
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
            </div>
            @endforeach
          @else
            <div class="alert alert-danger">No Comics found</div>
          @endif
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
@endif
