@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Add User</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/users"><i class="zmdi zmdi-account-o"></i> Users</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    @include('partials.message')
                    <div class="header">
                        <h2><strong>Basic Info</strong></h2>
                    </div>
                    <div class="body">
                        @include('partials.errors')
                        <form method="POST" action="{{ route('users.update', ['id'=>$user->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row clearfix mb-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group-image text-center">
                                    <input type="file" name="avatar" class="form-control-image d-none">
                                    <a class="image-file-input" href="javascript:;"><img id="avatar_preview" class="rounded-circle img-raised" src="/images/{{$user->avatar}}" style="max-width:150px;"><i class="material-icons">camera_enhance</i></a>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email Address" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <select id="role" name="role" class="form-control show-tick" required>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}"
                                            @if($user->roles->first()->id == $role->id) selected @endif
                                        >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-round btn-md">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#avatar_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(function () {
        $(".image-file-input").on('click',function(){
            $(this).prev('input[type="file"]').trigger('click');
        })
        $(".form-control-image").change(function() {
            readURL(this);
        });
    });
</script>
@endsection
