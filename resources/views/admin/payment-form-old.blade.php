@extends('layouts.dash')

@section('content')

<h3><i class="fa fa-angle-right"></i> Submit Payment</h3>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
            <form class="form-horizontal style-form" action="add-payment" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="col-sm-4">
                        <label>Bill</label>
                        <select name="recipient" id="recipient">
                            @foreach($utilities as $util)
                            <option value="{{$util->id}}">{{$util->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Bill Month</label>
                        <input name="month" id="month" type="month" class="form-control" value="{{$payment->month}}">
                    </div>
                    <div class="col-sm-4">
                        <label>Due Date</label>
                        <input name="due_date" id="due_date" type="date" class="form-control" value="{{$payment->due_date}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <label>Bill Amount</label>
                        <input name="amount" id="amount" type="text" class="form-control" value="{{$payment->amount}}">
                    </div>
                    <a class="btn btn-success" href="#" id="upload-image-button" value="{{$payment->image_url}}">Upload image of Payment</a>

                    <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

                    <script type="text/javascript">

                        var upload_ids = "";
                        cloudinary.applyUploadWidget(document.getElementById('upload-image-button'),
                            { upload_preset: 'o8ihsbiq', cloud_name: "{{env("CLOUDINARY_CLOUD_NAME", "")}}", api_key: "{{env("CLOUDINARY_KEY")}}",
                                button_class: "btn blue"},
                            function(error, result) {console.log(error, result)});

                        $(document).on('cloudinarywidgetsuccess', function(e, data) {
                            for(var i=0; i < data.length; i++){
                                var upload_id = data[i].public_id;
                                if(!upload_ids.length){
                                    upload_ids = upload_id;
                                } else{
                                    upload_ids += ", " + upload_id;
                                }
                            }

                            // update the field on the form
                            $("#upload_ids").val(upload_ids);
                        });
                        document.getElementById("upload_widget_opener").addEventListener("click", function() {

                            cloudinary.openUploadWidget({ cloud_name: 'demo', upload_preset: 'a5vxnzbp'},
                                function(error, result) { console.log(error, result) });

                        }, false);
                    </script>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" style="float:right;">Sumbit</button>
                </div>
            </form>
        </div>
    </div><!-- col-lg-12-->
</div><!-- /row -->


@endsection

