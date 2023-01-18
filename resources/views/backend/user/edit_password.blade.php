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
                 <h4 class="box-title">Change Password</h4>

               </div>
               <!-- /.box-header -->
               <div class="box-body">

                <form action="{{ route('users.store') }}" method="POST" >
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Current password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="current_password" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>New password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Coniform password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" class="form-control" required data-validation-required-message="This field is required"> </div>
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
