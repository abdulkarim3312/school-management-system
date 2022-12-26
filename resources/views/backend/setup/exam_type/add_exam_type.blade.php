@extends('admin.admin_master')

@section('body')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Exam Type</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form action="{{ route('store.type.exam') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Exam Type Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                </div>	
                                </div> 
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                </div>   
                            </div>   
                        </div>
                    </div> 
                    </form>

                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection