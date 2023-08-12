@extends('admin.layout.app')

@section('containt')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-8 mx-auto py-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">User aprove table</h2>
                            <p class="card-title-desc">
                                Add <code>.table-bordered</code> for borders on all sides of the table and cells.
                            </p>    
                            
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">

                                    <thead>
                                        <tr>
                                            <th>Si No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach ($users as $item)
                                        @if ($item->role == 0)
                                            <tbody>
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>
                                                        @if ($item->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Panding</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->is_active)
                                                            <form action="{{ route('user.deactive', $item) }}" method="get"
                                                                style='float: left; padding: 5px;'>
                                                                <!-- @csrf -->
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Painding User">
                                                                    <i class="mdi mdi-close-octagon-outline"></i></button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('user.active', $item) }}" method="get"
                                                                style='float: left; padding: 5px;'>
                                                                <!-- @csrf -->
                                                                <button type="submit" class="btn btn-success"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Active User">
                                                                    <i class="mdi mdi-cloud-check"></i></button>
                                                            </form>
                                                        @endif

                                                        <form action="{{ route('user.deactive', $item) }}" method="get"
                                                            style='float: left; padding: 5px;'>
                                                            <!-- @csrf -->
                                                            <button type="submit" class="btn btn-primary"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="View User">
                                                                <i class="fa fa-book-dead"></i></button>
                                                        </form>
                                                        <form action="{{ route('user.delete', $item) }}" method="get"
                                                            style='float: left; padding: 5px;'>
                                                            <!-- @csrf -->
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete User">
                                                                <i class="fa fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection