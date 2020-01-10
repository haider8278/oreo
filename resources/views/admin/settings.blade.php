@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Settings</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                        <h2><strong>Basic Settings</strong></h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="/settings" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6 class="mt-4">Branding</h6>
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                    <input type="text" name="title" class="form-control" value="{{$setting->title}}" placeholder="Brand Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input id="logo" type="file" name="logo" class="form-control" placeholder="Logo">
                                        <span style="margin-top: -20px;" class="input-group-addon p-0 border-0">
                                            <img src="/images/{{$setting->logo}}" alt="Thumbnail Image" style="width: 70px;vertical-align: top;" class="rounded-circle img-raised">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="theme">Theme Color</label>
                                    <select id="theme" name="theme" class="form-control show-tick">
                                        <option value="purple" @if($setting->theme == 'purple') selected @endif>Purple</option>
                                        <option value="blue" @if($setting->theme == 'blue') selected @endif>Blue</option>
                                        <option value="cyan"@if($setting->theme == 'cyan') selected @endif>Cyan</option>
                                        <option value="green"@if($setting->theme == 'green') selected @endif>Green</option>
                                        <option value="orange"@if($setting->theme == 'orange') selected @endif>Orange</option>
                                        <option value="blush"@if($setting->theme == 'blush') selected @endif>Blush</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-round">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Roles</strong></h2>
                    </div>
                    <div class="body">
                        <button type="button" class="btn btn-primary btn-round waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Add New Role</button>
                        <table class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Role</td>
                                    <td>Created</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add User Role</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/settings/addRole" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                            <input type="text" name="name" class="form-control"  placeholder="Role Name" required>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-round">Save</button>
                            <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
