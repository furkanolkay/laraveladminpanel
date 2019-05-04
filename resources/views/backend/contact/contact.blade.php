@extends("layouts.backend")
@section("content")
    <div class="content-wrapper">

        <h1>About Content </h1>

        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="contactForm" enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="box-body">



                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Contact Info</a></li>
                                <li><a data-toggle="tab" href="#menu1">Social Media</a></li>

                            </ul>

                            <div class="tab-content">

                                <div id="home" class="tab-pane fade in active">
                                    <h3>Contact Info</h3>


                                    <div class="form-group">
                                        <label for="c_location" class="col-sm-2 control-label">Location</label>
                                        <div class="col-sm-3">
                                            <input name="c_location" type="text" class="form-control" id="c_location" placeholder="c_location" value="{{$contact->c_location}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number" class="col-sm-2 control-label">Phone Number </label>
                                        <div class="col-sm-3">
                                            <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="phone_number" value="{{$contact->phone_number}}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="mail_adress" class="col-sm-2 control-label">Mail Adress </label>
                                        <div class="col-sm-3">
                                            <input name="mail_adress" type="text" class="form-control" id="mail_adress" placeholder="mail_adress" value="{{$contact->mail_adress}}">
                                        </div>
                                    </div>







                                </div>



                                <div id="menu1" class="tab-pane fade">
                                    <h3>Social Media</h3>


                                    <div class="form-group">
                                        <label for="web_sites" class="col-sm-2 control-label">Web Sites </label>

                                        <div class="col-sm-3">
                                            <input name="web_sites" type="text" class="form-control" id="web_sites" placeholder="web_site" value="{{$contact->web_sites}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="c_instagram" class="col-sm-2 control-label">Instagram </label>

                                        <div class="col-sm-3">
                                            <input name="c_instagram" type="text" class="form-control" id="c_instagram" placeholder="c_instagram" value="{{$contact->c_instagram}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="c_twitter" class="col-sm-2 control-label">Twitter </label>

                                        <div class="col-sm-3">
                                            <input name="c_twitter" type="text" class="form-control" id="c_twitter" placeholder="c_twitter" value="{{$contact->c_twitter}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="c_facebook" class="col-sm-2 control-label">Facebook </label>

                                        <div class="col-sm-3">
                                            <input name="c_facebook" type="text" class="form-control" id="c_facebook" placeholder="c_facebook" value="{{$contact->c_facebook}}">
                                        </div>
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
    <script>


        $("#submitButton").click(function () {

            var url ="{{route("backend.contact.update")}}";


            var form = new FormData($("#contactForm")[0]);
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