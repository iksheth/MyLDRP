<?php include('header.php') ?>


<!--**************** Head Section ************ -->

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<!--**************** Main Section ************ -->


<div class="wrapper wrapper-content animated fadeInRight">

    <!--**************** Section 0: Inline Search  ************ -->


    <!--**************** Section 1: Inline Search  ************ -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Send SMS & Email </h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>


                <div class="ibox-content">

                    <!--******************************** Row 1  ********************************-->
                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label text-center ">Enrollment Number of Student</label>

                                <div class="col-sm-10">
                                    <input id="enrol" type="text" class="form-control" id="name" name="name"
                                           placeholder="Please Enter Student`s Enrollemnt Number" value=""  maxlength="15">
                                </div>
                            </div>
                        </div>


                    </div>

                    <br>
                    <!--******************************** Row 2  ********************************-->
                    <div class="row">
                        <div class="col-sm-12">


                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label text-center">Message</label>

                                <div class="col-sm-10">
                                    <textarea id="msg" class="form-control" rows="4" name="message"></textarea>
                                </div>
                            </div>

                        </div>


                    </div>

                    <br>
                    <!--*********** Row 2 Ends ***********-->

                    <!--*********** Search Button ***********-->
                    <div class="row">

                        <button id="d_send_btn" type="button" class="btn btn-primary block pull-right k_dropdown"
                                style="margin-right: 15px">Send SMS & Email
                        </button>
                    </div>


                </div>


            </div>
        </div>


    </div>

    <!--**************** Section 2: Data Section  ************ -->


</div>

<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>

</div>
</div>


<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/jeditable/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/transition.js"></script>
<script type="text/javascript" src="js/collapse.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>
<!-- Page-Level Scripts -->
<script>


    $(document).ready(function () {


        $('#active_search').addClass('active');
        $('#active_search ul').addClass('collapse in');
        $('#d_send_btn').click(function () {
            send()
        });


    });


    //---------------------------------------------------------- SMS ---------//
    function send() {
        var enrol = $('#enrol').val();
        var msg = $('#msg').val();

        var myKeyVals = {enrol: enrol,msg: msg};

        $.ajax({
            type: "post",
            url: "ajax_snippates/SMS_mail_compose.php",
            data: myKeyVals,
//             contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: true,
            cache: false,
            success: function (response) {
                console.log(response['status']);
                if(response['status']=='True'){
                sms_status_toster_true('Message Sent')}
                else{
                    sms_status_toster_false('Message Sent Failed')
                }




            },
            error: function (x, e) {
                alert("error occur");
            }

        });

    }

    //------------------------------------------- Drop Down ----------------------------
    $(document.body).on('click', '.dropdown-menu li', function (event) {

        var $target = $(event.currentTarget);

        $target.closest('.btn-group')
            .find('[data-bind="label"]').text($target.text())
            .end()
            .children('.dropdown-toggle').dropdown('toggle');

        return false;

    });

    function sms_status_toster_true(msg)
    {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000,
//                            "positionClass": "toast-top-center",
            };
            toastr.info('Message is successfully sent', msg);



        }, 500);
    }

    function sms_status_toster_false(msg) {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.error('Please Check Details', msg);


        }, 500);
    }


</script>


</body>


</html>
