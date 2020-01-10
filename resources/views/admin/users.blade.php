@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Users</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                <a class="btn bg-black btn-icon btn-round hidden-sm-down float-right ml-3" href="/users/create">
                    <i class="zmdi zmdi-plus mt-2"></i>
                </a>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    @include('partials.message')
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->roles()->first()->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td><a href="{{ route('users.edit', ['id'=>$user->id]) }}"><i class="material-icons text-success">edit</i></a><form class="d-inline" method="POST" action="{{ route('users.destroy', ['id'=>$user->id]) }}" style="vertical-align: super;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-icon btn-round btn-simple border-0 text-danger" type="submit" ><i class="material-icons">delete</i></button>
                                    </form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Large Size -->
<div class="modal fade" id="addsetting" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card m-0">
                    <div class="header">
                        <h2><strong>Add Setting</strong></h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="/settings">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="key" class="form-control" placeholder="Setting Label">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="value" class="form-control" placeholder="Setting Value">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
@endsection
