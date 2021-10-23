<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@if(@isset($data))Edit SubCategory @else Add New
            SubCategory @endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ isset($data) ? route('admin.subcategory.update',$data->id) : route('admin.subcategory.store') }}"
          method="Post" enctype="multipart/form-data">
        @csrf
        @if (isset($data->id))
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <select class="form-control" name="category_id" required="">
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
                <label for="category_name">SubCategory Name</label>

                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? ''  }}">
                <small id="emailHelp" class="form-text text-muted">This is your main category</small>
            </div>
            {{--                    <div class="form-group">--}}
            {{--                        <label for="category_name">Category Icon</label>--}}
            {{--                        <input type="file" class="dropify" id="icon" name="icon" >--}}
            {{--                    </div>--}}
            {{--                    <div class="form-group">--}}
            {{--                        <label for="category_name">Show on Homepage</label>--}}
            {{--                        <select class="form-control" name="home_page">--}}
            {{--                            <option value="1">Yes</option>--}}
            {{--                            <option value="0">No</option>--}}
            {{--                        </select>--}}
            {{--                        <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>--}}
            {{--                    </div>--}}
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
    </form>
</div>


