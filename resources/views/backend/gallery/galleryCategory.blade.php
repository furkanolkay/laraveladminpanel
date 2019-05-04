@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gallery Category Create
                <small>Category Add</small>
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
                    <form class="form-horizontal" id="categoryForm"  enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="box-body">




                            <div class="form-group">
                                <label for="category_title" class="col-sm-2 control-label">category_title</label>

                                <div class="col-sm-10">
                                    <input name="category_title" type="text" class="form-control" id="category_title" placeholder="-category_title" value="">
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="category_year" class="col-sm-2 control-label">category_year</label>

                                <div class="col-sm-10">
                                    <input id="category_year" name="category_year" type="text" class="form-control" placeholder="category_year" value="">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="category_place" class="col-sm-2 control-label">category_place</label>

                                <div class="col-sm-10">
                                    <input id="category_place" name="category_place" type="text" class="form-control" placeholder="category_place" value="">
                                </div>
                            </div>





                            <div class="form-group">
                                <label for="category_keywords" class="col-sm-2 control-label">category_keywords</label>

                                <div class="col-sm-10">
                                    <input id="category_keywords" name="category_keywords" type="text" class="form-control" placeholder="category_keywords" value="">
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




            var url = "{{route("backend.gallery.categoryAdd")}}";




            var form = new FormData($("#categoryForm")[0]);


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


    </script>
@endpush

@push("customCss")

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset("assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endpush