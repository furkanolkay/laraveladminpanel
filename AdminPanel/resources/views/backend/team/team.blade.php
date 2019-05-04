@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Member Create
                <small>Member Add</small>
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
                    <form class="form-horizontal" id="teamForm"  enctype='multipart/form-data'>
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
                                <label for="team_year" class="col-sm-2 control-label">Member-Year</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="team_year" id="team_year">
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




                            <div class="form-group">
                                <label for="member_name" class="col-sm-2 control-label">member-Name</label>

                                <div class="col-sm-10">
                                    <input name="member_name" type="text" class="form-control" id="member_name" placeholder="member name" value="">
                                </div>
                            </div>






                            <div class="form-group">
                                <label for="member_duty" class="col-sm-2 control-label">member_duty </label>

                                <div class="col-sm-10">
                                    <input id="member_duty" name="member_duty" type="text" class="form-control" placeholder="member_duty" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="member_department" class="col-sm-2 control-label">member_department </label>

                                <div class="col-sm-10">
                                    <input id="member_department" name="member_department" type="text" class="form-control" placeholder="member_department" value="">
                                </div>
                            </div>

                           <h1> Sosyal MEDYA</h1>

                            <div class="form-group">
                                <label for="member_linkedin" class="col-sm-2 control-label">member_linkedin </label>

                                <div class="col-sm-10">
                                    <input id="member_linkedin" name="member_linkedin" type="text" class="form-control" placeholder="member_linkedin" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="member_instagram" class="col-sm-2 control-label">member_instagram </label>

                                <div class="col-sm-10">
                                    <input id="member_instagram" name="member_instagram" type="text" class="form-control" placeholder="member_instagram" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="member_twitter" class="col-sm-2 control-label">member_twitter </label>

                                <div class="col-sm-10">
                                    <input id="member_twitter" name="member_twitter" type="text" class="form-control" placeholder="member_twitter" value="">
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

            var url = "{{route("backend.team.team")}}";



            var form = new FormData($("#teamForm")[0]);


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