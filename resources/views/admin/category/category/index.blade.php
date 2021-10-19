@extends('layouts.backend.app')
@section('title','Category')
@push('css')
  <!-- DataTables -->
{{--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">--}}
{{--  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">--}}
{{--  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">--}}
{{--  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">--}}
@endpush
@section('admin_content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> + Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All categories list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Icon</th>
                      <th>Home Page</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($categories as $key=>$category)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->slug}}</td>
{{--                      <td><img src="{{ asset($row->icon) }}" height="32" width="32"></td>--}}
{{--                      <td>--}}
{{--                         @if($row->home_page==1)--}}
{{--                           <span class="badge badge-success">Home Page</span>--}}
{{--                         @endif   --}}
{{--                      </td>--}}
                      <td>
                      	<a href="#" class="btn btn-info btn-sm edit" data-id="{{ $category->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>


                          <a href="{{ route('admin.category.destroy',$category->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>

                      </td>
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
</div>

{{-- category insert modal --}}
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.category.store')}}" method="Post" enctype="multipart/form-data">
      	@csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="name" required="">
            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
          </div>
          <div class="form-group">
            <label for="category_name">Category Icon</label>
            <input type="file" class="dropify" id="icon" name="icon" >
          </div>
          <div class="form-group">
            <label for="category_name">Show on Homepage</label>
           <select class="form-control" name="home_page">
             <option value="1">Yes</option>
             <option value="0">No</option>
           </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">

      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();

</script>
<script type="text/javascript">
    $('body').on('click','.edit', function(){
        let cat_id=$(this).data('id');
        $.get("/admin/category/edit/"+cat_id, function(data){
            $("#modal_body").html(data);
        });
    });

</script>

@push('js')
{{--    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>--}}

{{--    <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>--}}


{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#example1").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
{{--            $('#example2').DataTable({--}}
{{--                "paging": true,--}}
{{--                "lengthChange": false,--}}
{{--                "searching": false,--}}
{{--                "ordering": true,--}}
{{--                "info": true,--}}
{{--                "autoWidth": false,--}}
{{--                "responsive": true,--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endpush
@endsection
