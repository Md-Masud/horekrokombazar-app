<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@if(@isset($data))Edit Brand @else Add New
            Brand @endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ isset($data) ? route('admin.brand.update',$data->id) : route('admin.brand.store') }}"
          method="Post" enctype="multipart/form-data">
        @csrf
        @if (isset($data->id))
            @method('PUT')
        @endif
        <div class="modal-body">

            <div class="form-group">
                <label for="category_name">Brand Name</label>

                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? ''  }}">
                <small id="emailHelp" class="form-text text-muted">This is your main category</small>
            </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="category_name">Brand Logo</label>--}}
{{--                                    <input type="file" class="dropify" id="brand_logo" name="brand_logo" value="{{ $data->brand_logo ?? ''  }}">--}}
{{--                                </div>--}}
            <div class="form-group">
                <label for="brand-name">Brand Logo</label>
                <input type="file"  class="dropify" data-height="140"  name="brand_logo" >
                <input type="hidden" name="old_logo" value="{{ $data->brand_logo ?? ''}}">
            </div>
            {{--                                <div class="form-group">--}}
{{--                                    <label for="category_name">Show on Homepage</label>--}}
{{--                                    <select class="form-control" name="brand_font">--}}
{{--                                        <option value="'1"--}}
{{--                                        @if($data->brand_font==1)--}}
{{--                                        selected="" @endif--}}
{{--                                            >Yes</option>--}}
{{--                                        <option value="0"--}}
{{--                                                @if($data->brand_font==0)--}}
{{--                                                selected="" @endif--}}
{{--                                        >No</option>--}}
{{--                                    </select>--}}
{{--                                    <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>--}}
{{--                                </div>--}}
{{--        </div>--}}
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
        </div>
    </form>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();

</script>
