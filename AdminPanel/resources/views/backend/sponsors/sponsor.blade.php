@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sponsor Oluştur
                <small>Sponsor Ekle</small>
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
                    <form class="form-horizontal" id="sponsorForm"  enctype='multipart/form-data'>
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
                                <label for="sponsor_name" class="col-sm-2 control-label">Sponsor-Name</label>

                                <div class="col-sm-10">
                                    <input name="sponsor_name" type="text" class="form-control" id="sponsor_name" placeholder="Sponsor-Name" value="@if(isset($sponsor)){{$sponsor->sponsor_name}}@endif">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sponsor_link1" class="col-sm-2 control-label">Sponsor-link</label>

                                <div class="col-sm-10">
                                    <input
                                     id="sponsor_link1" name="sponsor_link1" type="text" class="form-control" placeholder="Sponsor-link" value="@if(isset($sponsor)){{$sponsor->sponsor_link}}@endif">
                                </div>
                            </div>


                            
                           
                            <div class="form-group">
                                <label for="sponsor_year" class="col-sm-2 control-label">Sponsor-Year</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="sponsor_year" id="sponsor_year">
                                        <option value="2017-2018">2017-2018</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                        <option value="2024-2025">2024-2025</option> 
                                        <option value="2025-2026">2025-2026</option>
                                        <option value="2026-2027">2026-2027</option>
                                        <option value="2027-2028">2027-2028</option>
                                        <option value="2028-2029">2028-2029</option>
                                    </select>

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

            var url = "{{route("backend.sponsors.sponsor")}}";



            var form = new FormData($("#sponsorForm")[0]);


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