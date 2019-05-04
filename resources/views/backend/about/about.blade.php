@extends("layouts.backend")
@section("content")
    <div class="content-wrapper" style="background-image:url('{{asset("image/back.jpg")}}');">

    <h1>About Content </h1>

     <section class="content" >
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="aboutForm" enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="box-body">





                            <div class="form-group">
                                <label for="content" class="col-sm-2 control-label">content</label>

                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control textarea" id="content" placeholder="content">@if(isset($about)){{$about->content}}@endif</textarea>
                                </div>
                            </div>



                             <div class="form-group">
                                <label for="vision" class="col-sm-2 control-label">vision</label>

                                <div class="col-sm-10">
                                    <textarea name="vision" class="form-control " id="vision" placeholder="vision">@if(isset($about)){{$about->vision}}@endif</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mission" class="col-sm-2 control-label">mission</label>

                                <div class="col-sm-10">
                                    <textarea name="mission" class="form-control " id="mission" placeholder="mission">@if(isset($about)){{$about->mission}}@endif</textarea>
                                </div>
                            </div>



<ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Unit 1</a></li>
                                <li><a data-toggle="tab" href="#menu1">Unit 2</a></li>
                                <li><a data-toggle="tab" href="#menu2">Unit 3</a></li>
                                <li><a data-toggle="tab" href="#menu3">Unit 4</a></li>
                                <li><a data-toggle="tab" href="#menu4">Unit 5</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="home" class="tab-pane fade in active">
                                    <h3>Unit1</h3>
                                     <div class="form-group">
                                        <label for="unit_1" class="col-sm-2 control-label">unit 1 name </label>
                                        <div class="col-sm-3">
                                            <input name="unit_1" type="text" class="form-control" id="unit_1" placeholder="unit_1" value="{{$about->unit_1}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_1_content" class="col-sm-2 control-label">unit 1 content </label>

                                        <div class="col-sm-3">
                                            <textarea name="unit_1_content" type="textarea" class="form-control" id="unit_1_content" placeholder="unit_1_content">{{$about->unit_1_content}}
                                            </textarea>
                                        </div>
                                    </div>


                                </div>

                                <div id="menu1" class="tab-pane fade">
                                    <h3>Unit 2</h3>


                                    <div class="form-group">
                                        <label for="unit_2" class="col-sm-2 control-label">unit 2 name </label>

                                        <div class="col-sm-3">
                                            <input name="unit_2" type="text" class="form-control" id="unit_2" placeholder=" unit_2" value="{{$about->unit_2}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_2_content" class="col-sm-2 control-label">unit 2 content </label>

                                        <div class="col-sm-3">
                                            <textarea name="unit_2_content" type="textarea" class="form-control" id="unit_2_content" placeholder="unit_2_content">{{$about->unit_2_content}}
                                            </textarea>
                                        </div>
                                    </div>


                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>unit  3</h3>






                                    <div class="form-group">
                                        <label for="unit_3" class="col-sm-2 control-label">unit 3 name </label>

                                        <div class="col-sm-3">
                                            <input name="unit_3" type="text" class="form-control" id="unit_3" placeholder=" unit_3" value="{{$about->unit_3}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_3_content" class="col-sm-2 control-label">unit 3 content  </label>

                                        <div class="col-sm-3">
                                            <textarea name="unit_3_content" type="textarea" class="form-control" id="unit_3_content" placeholder="unit_3_content">{{$about->unit_3_content}}
                                            </textarea>
                                        </div>
                                    </div>

                                </div>



                                <div id="menu3" class="tab-pane fade">
                                    <h3>unit   4</h3>

                                    <div class="form-group">
                                        <label for="unit_4" class="col-sm-2 control-label">unit 4 name</label>

                                        <div class="col-sm-3">
                                            <input name="unit_4" type="text" class="form-control" id="unit_4" placeholder=" unit_4" value="{{$about->unit_4}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_4_content" class="col-sm-2 control-label">unit 4 content  </label>

                                        <div class="col-sm-3">
                                            <textarea name="unit_4_content" type="textarea" class="form-control" id="unit_4_content" placeholder="unit_4_content">{{$about->unit_4_content}}
                                            </textarea>
                                        </div>
                                    </div>




                                </div>
                                <div id="menu4" class="tab-pane fade">
                                    <h3>unit 5</h3>


                                    <div class="form-group">
                                        <label for="unit_5" class="col-sm-2 control-label">unit 5 name </label>

                                        <div class="col-sm-3">
                                            <input name="unit_5" type="text" class="form-control" id="unit_5" placeholder=" unit_5" value="{{$about->unit_5}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_5_content" class="col-sm-2 control-label">unit 5 content </label>

                                        <div class="col-sm-3">
                                             <textarea name="unit_5_content" type="textarea" class="form-control" id="unit_5_content" placeholder="unit_5_content">{{$about->unit_5_content}}
                                            </textarea>
                                        </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


    <script>


        CKEDITOR.replace( 'content' );





      $("#submitButton").click(function () {
                
            var url ="{{route("backend.about.update")}}";
                 

            var form = new FormData($("#aboutForm")[0]);
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