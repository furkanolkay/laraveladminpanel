@extends("layouts.backend")

@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Galeri Ekle</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  id="galleryForm" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">



                            <div class="form-group">
                                <label for="files" class="col-sm-2 control-label">Gallery fotograf</label>

                                <div class="col-sm-10">
                                    <input required type="file" multiple name="images[]" id="images[]">
                                </div>
                            </div>








                            <div class="form-group">
                                <label for="gallery_category" class="col-sm-2 control-label">gallery_category</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="gallery_category" id="gallery_category">
                                        <option value="other">other</option>
                                        @foreach($category as $cate)
                                            <option value="{{$cate->id}}">{{$cate->category_year}}/{{$cate->category_place}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>












                        </div>






                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-info pull-right" id="submitButton" >Gönder</button>
                </div>
                <!-- /.box-footer -->
                </form>
            </div>
    </div>
    </section>
    </div>


@endsection

@push("customJs")
    <script>


        $("#submitButton").click(function () {

            var url = "{{route("backend.gallery.galleryAdd")}}";



            var form = new FormData($("#galleryForm")[0]);


            swal({
                title:'Yükleniyor..',
                html:
                    '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>'+
                    '<span class="sr-only">Loading..</span>',
                showCloseButton:false,
                showCancelButton:false,
                showConfirmButton:false,
                allowOutsideClick: false

            });









            $.ajax({
                type : "post",
                url  : url,
                data :form,
                processData : false,
                contentType: false,

                success:function (response) {
                    swal.close();
                    swal({
                        type:response.status,
                        title:response.title,
                        text:response.message

                    });

                },
                error:function (response) {
                    swal.close();
                    console.log(response);
                }


            });
        })






    </script>




@endpush

@push("customCss")

@endpush