<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@if(@isset($data))Edit ChildCategory @else Add New
            ChildCategory @endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ isset($data) ? route('admin.childcategory.update',$data->id) : route('admin.childcategory.store') }}"
    method="Post" enctype="multipart/form-data">

        @csrf
        @if (isset($data->id))
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <select class="form-control" id="category_id" name="category_id" required="">
                    <option>Select Category</option>
                    @foreach($categories as $row)
                        <option value="{{ $row->id }}"
                                @isset($data)
                                @if($row->id==$data->category_id)
                                selected=""
                            @endif
                            @endisset
                        >
                            {{ $row->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id" required="">

                    @if(@isset($data))
                        @foreach($subcategories as $row)

                        <option value="{{ $row->id }}"
                                @isset($data)
                                @if($row->id==$data->sub_category_id)
                                selected=""
                            @endif
                            @endisset
                        >
                            {{ $row->name }}</option>

                    @endforeach
                    @endif
                </select>

            </div>
            <div class="form-group">
                <label for="category_name">ChildCategory Name</label>

                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? ''}}">
                <small id="emailHelp" class="form-text text-muted">This is your main category</small>
           </div>

       </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">
                @isset($data)
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>Update</span>
                @else
                    <i class="fas fa-plus-circle"></i>
                    <span>Create</span>
                @endisset
            </button>
        </div>

    </form >
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">

    $(document).ready(function (){
        $("#category_id").change(function (){
           let cat_id=this.value;
          $.get('/admin/cat?category='+cat_id,function (data){
               $('#subcategory_id').html(data);
           })
        })
    })

</script>



