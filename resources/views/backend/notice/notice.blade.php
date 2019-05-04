@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Notice Oluştur
                <small>Notice Ekle</small>
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
                    <form class="form-horizontal" id="noticeForm"  enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="coverImageShow" class="col-sm-2 control-label"></label>

                                <div class="col-sm-10">
                                    <img src="@if(isset($notice)){{asset($notice->notice_image)}}@else{{asset("image/uploadImage.png")}}@endif" alt="Yükleniyor" id="coverImageShow" style="height: 200px;width:300px;">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="coverImage" class="col-sm-2 control-label">notice Photo</label>

                                <div class="col-sm-10">
                                    <input name="coverImage" type="file" class="form-control" id="coverImage" value="@if(isset($notice)){{$notice->notice_image}}@endif">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="notice_title" class="col-sm-2 control-label">notice_title</label>

                                <div class="col-sm-10">
                                    <input name="notice_title" type="text" class="form-control" id="notice_title" placeholder="-notice_title" value="@if(isset($notice)){{$notice->notice_title}}@endif">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="notice_content" class="col-sm-2 control-label">notice_content</label>

                                <div class="col-sm-10">

                                    <textarea name="notice_content" class="form-control textarea" id="notice_content" placeholder="notice_content">@if(isset($notice)){{$notice->notice_content}}@endif</textarea>




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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/js/froala_editor.pkgd.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

    <script>

        CKEDITOR.replace( 'notice_content' );

        $("#submitButton").click(function () {




                    @if(isset($notice))
            var url ="{{route("backend.notice.update", ["id" => $notice->id])}}";
                    @else
            var url = "{{route("backend.notice.notice")}}";
                     @endif



            var form = new FormData($("#noticeForm")[0]);


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