@extends("layouts.backend")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gallery
                <small>Gallery List</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Responsive Hover Table</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-btn">
                                        <a href="{{route("backend.gallery.galleryAdd")}}" class="btn btn-primary" id="newSetting">Ekle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr id="settingTableHeader">
                                    <th>#</th>
                                    <th>Gallery title</th>
                                    <th>Gallery cate</th>
                                    <th>img</th>
                                </tr>
                                @php($i=1)
                                @foreach($gallery as $image)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$image->gallery_title}} </td>
                                        <td>{{$image->gallery_category}} </td>
                                        <td><img src="{{asset($image->gallery_image)}}" style="width:50px; height: 30px;"> </td>

                                        <td>
                                            <button class="btn btn-danger blogDelete" data-id="{{$image->id}}">Sil</button>

                                        </td>
                                    </tr>
                                    @php($i++)
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

@push("customJs")
    <script>
        $(".blogDelete").click(function () {
            var button = $(this);
            $.ajax({
                type : "post",
                url : "{{route("backend.gallery.gallerydelete")}}",
                data : {
                    _token : "{{csrf_token()}}",
                    id : button.data("id")
                },

                success : function (response) {
                    if (response.status == "success"){
                        button.closest("tr").remove();
                    }

                    console.log(response);
                },

                error : function (response) {
                    console.log(response)
                }
            })
        })














    </script>
@endpush

@push("customCss")

@endpush