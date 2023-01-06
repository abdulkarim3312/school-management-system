@extends('admin.admin_master')

@section('body')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Roll Generator</strong></h4>
              </div>
    
              <div class="box-body">
             <form action="{{ route('roll.generate.store') }}" method="POST">
                @csrf
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <h5>Year<span class="text-danger"></span></h5>
                      <div class="controls">
                          <select name="year_id" id="year_id" required="" class="form-control">
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
                          <select name="class_id" id="class_id" required="" class="form-control">
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
                    <a id="search" class="btn btn-rounded btn-dark mb-5 mt-3" name="search">Search</a>
                  </div>
              </div> 
              </div>	
               </div>
            <div class="row d-none" id="roll-generate">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID NO</th>
                                <th>Student Name</th>
                                <th>Father's Name</th>
                                <th>Gender</th>
                                <th>Roll</th>
                            </tr>
                        </thead>
                        <tbody id="roll-generate-tr">

                        </tbody>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Roll Generator">
             </form>
              
              </div>
            </div>

           {{-- <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">

                  @if (!(@$search))
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if (Auth::user()->role == 'Admin')
                              <th>Code</th>
                              @endif 
                              <th width="25%">Action</th> 
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['student']['name'] }}</td>
                                <td>{{ $value['student']['id_no'] }}</td>
                                <td>{{ $value->roll }}</td>
                                <td>{{ $value['student_year']['name'] }}</td>
                                <td>{{ $value['student_class']['name'] }}</td>
                                <td>
                                  <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']): url('upload/no_image.jpg') }}" alt="" style="height: 60px; width:60px;">
                                </td>
                                <td>{{ $value['student']['code'] }}</td>
                                <td>
                                    <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-success">Promotion</a>
                                    <a href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                         
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                    </table>

                  @else

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if (Auth::user()->role == 'Admin')
                              <th>Code</th>
                              @endif 
                              <th width="25%">Action</th> 
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['student']['name'] }}</td>
                                <td>{{ $value['student']['id_no'] }}</td>
                                <td>{{ $value->roll }}</td>
                                <td>{{ $value['student_year']['name'] }}</td>
                                <td>{{ $value['student_class']['name'] }}</td>
                                <td>
                                  <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']): url('upload/no_image.jpg') }}" alt="" style="height: 60px; width:60px;">
                                </td>
                                <td>{{ $value['student']['code'] }}</td>
                                <td>
                                    <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-success">Promotion</a>
                                </td>
                            </tr>
                        @endforeach
                         
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                    </table>

                  @endif

                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->          
          </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).on('click','#search',function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
       $.ajax({
        url: "{{ route('student.registration.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#roll-generate').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.fname+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
            '</tr>';
          });
          html = $('#roll-generate-tr').html(html);
        }
      });
    });
  
  </script>

@endsection