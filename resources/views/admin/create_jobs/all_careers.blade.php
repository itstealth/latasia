@extends('admin.admin_master')

@section('admin')
<div class="page-content">
<div class="container-fluid">

<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">List Careers</h4>
                                    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">List Careers</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                        <a href="{{route('add.careers')}}" class="btn btn-info sm" title="Edit Data "> Add Careers </a>
                        <!-- end page title -->
                        
                        
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <h4 class="card-title">Export Data</h4>
                                       
        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                
                                            <th>Sr </th>
                                            <th>Title</th>
                                            <th>Company Name</th>
                                            <th>Location</th>
					                         <th>Job Type</th>
                                             <th>Action</th>
                                                
                                            </tr>
                            </thead>
                            <tbody>  
                            @php($i=1)
                    @foreach($careers as $item)             
                        <tr>
                    <td>{{$i++ }}</td>
                    <td>{{ $item->v_title }}</td>
                    <td>{{ $item->company_name }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->v_type }}</td>
                    <td>
                    <a href="{{route('eidt.careers',$item->id) }}" class="btn btn-info sm" title="Edit Data "> <i class="fas fa-edit"></i> </a>
                    <a href="{{route('delete.careers',$item->id) }}" class="btn btn-danger sm" title="delete Data "> <i class="fas fa-trash-alt"></i> </a>
                    </td>              				
                    
                                    
                        
                        </tr>
                        @endforeach
                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

                        

                       
                       

                        

                        
                        
                    </div> <!-- container-fluid -->

</div>
</div>


@endsection