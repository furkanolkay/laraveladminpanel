@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Slider Oluştur
                <small>Slider Ekle</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">---------</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="mainsliderForm"  enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="coverImageShow" class="col-sm-2 control-label"></label>

                                <div class="col-sm-10">
                                    <img src="{{asset("image/uploadImage.png")}}" alt="Yükleniyor" id="coverImageShow" style="height: 200px;width:300px;">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Sponsor-Photo</label>

                                <div class="col-sm-10">
                                    <input name="coverImage" type="file" class="form-control" id="coverImage">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="slider_title" class="col-sm-2 control-label">slider_title-Name</label>

                                <div class="col-sm-10">
                                    <input name="slider_title" type="text" class="form-control" id="slider_title" placeholder="-slider_title" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="slider_content" class="col-sm-2 control-label">slider_content</label>

                                <div class="col-sm-10">
                                    <input id="slider_content" name="slider_content" type="text" class="form-control" placeholder="slider_content" value="">
                                </div>
                            </div>



                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <button type="button" class="btn btn-info pull-right" id="submitButton">Kaydet</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push("customJs")
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset("assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script>


        $("#submitButton").click(function () {

            var url = "{{route("backend.mainslider.mainslider")}}";



            var form = new FormData($("#mainsliderForm")[0]);


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
                        type:"success",
                        title:"Başarılı",
                        text:"Başarıyla Eklendi"

                    });

                },
                error:function (response) {
                    swal.close();
                    console.log(response);
                }


            });
        })

        $("#coverImage").change(function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#coverImageShow').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endpush

@push("customCss")

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset("assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endpush