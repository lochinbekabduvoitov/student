@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        	<!-- Main content -->
		<section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit User</h4>

               </div>
               <!-- /.box-header -->
               <div class="box-body">

                <form action="{{ route('users.update' , $data->id) }}" method="POST" >
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="usertype" id="select" required class="form-control">
                                        <option >Select Role</option>
                                        <option value="Admin"  {{($data->usertype == 'Admin' ? "selected": "" )}}>Admin</option>
                                        <option value="User" {{($data->usertype == 'User' ? "selected": "" )}}>User</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" value="{{$data->email}}" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>

                    </div>

                    <input type="submit" class="btn btn-info btn-rounded" value="Update">

                </form>




               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->

           </section>
           <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->


@endsection
