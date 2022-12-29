@extends('admin.admin_master')

@section('body')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
          
          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Search</strong></h4>
              </div>
    
              <div class="box-body">
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Year<span class="text-danger"></span></h5>
                    <div class="controls">
                        <select name="year_id" required="" class="form-control">
                            <option value="" selected="" disabled="">Select Year</option>
                            @foreach ($years as $year)
                             <option value="{{ $year->id }}">{{ $year->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Class<span class="text-danger"></span></h5>
                    <div class="controls">
                        <select name="class_id" required="" class="form-control">
                            <option value="" selected="" disabled="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <h5><span class="black"></span></h5>
                <div class="controls">
                  <button type="button" class="btn btn-rounded btn-dark mb-5 mt-3">Search</button>
                </div>
            </div> 
            </div>	
             </div>
              
              </div>
            </div>

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>Id No</th>
                              <th width="25%">Action</th> 
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->class_id }}</td>
                                <td>{{ $value->year_id }}</td>
                                <td>
                                    <a href="{{ route('student.year.edit', ['id' => $value->id]) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('student.year.delete', ['id' => $value->id]) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                         
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection