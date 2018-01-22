<?php include('header.php') ?>


<!--**************** Main Section ************ -->
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

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>

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

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">4</td>
                                <td class="center">X</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Editable Table in- combination with jEditable</h5>

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
                    <div class="">
                        <a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Add a new
                            row</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover " id="editable">
                        <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">5</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.5
                            </td>
                            <td>Win 95+</td>
                            <td class="center">5.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 6
                            </td>
                            <td>Win 98+</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td class="center">7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td class="center">1.9</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape 7.2</td>
                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape Browser 8</td>
                            <td>Win 98SE+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape Navigator 9</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.1</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.2</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.2</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.3</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.4</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.4</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.5</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.6</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.7</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.8</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Seamonkey 1.1</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Epiphany 2.20</td>
                            <td>Gnome</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 1.2</td>
                            <td>OSX.3</td>
                            <td class="center">125.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 1.3</td>
                            <td>OSX.3</td>
                            <td class="center">312.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 2.0</td>
                            <td>OSX.4+</td>
                            <td class="center">419.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 3.0</td>
                            <td>OSX.4+</td>
                            <td class="center">522.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>OmniWeb 5.5</td>
                            <td>OSX.4+</td>
                            <td class="center">420</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>iPod Touch / iPhone</td>
                            <td>iPod</td>
                            <td class="center">420.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>S60</td>
                            <td>S60</td>
                            <td class="center">413</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 7.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 7.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 8.0</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 8.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.0</td>
                            <td>Win 95+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.2</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.5</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera for Wii</td>
                            <td>Wii</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Nokia N800</td>
                            <td>N800</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Nintendo DS browser</td>
                            <td>Nintendo DS</td>
                            <td class="center">8.5</td>
                            <td class="center">C/A<sup>1</sup></td>
                        </tr>
                        <tr class="gradeC">
                            <td>KHTML</td>
                            <td>Konqureror 3.1</td>
                            <td>KDE 3.1</td>
                            <td class="center">3.1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>KHTML</td>
                            <td>Konqureror 3.3</td>
                            <td>KDE 3.3</td>
                            <td class="center">3.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>KHTML</td>
                            <td>Konqureror 3.5</td>
                            <td>KDE 3.5</td>
                            <td class="center">3.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Tasman</td>
                            <td>Internet Explorer 4.5</td>
                            <td>Mac OS 8-9</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Tasman</td>
                            <td>Internet Explorer 5.1</td>
                            <td>Mac OS 7.6-9</td>
                            <td class="center">1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Tasman</td>
                            <td>Internet Explorer 5.2</td>
                            <td>Mac OS 8-X</td>
                            <td class="center">1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Misc</td>
                            <td>NetFront 3.1</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Misc</td>
                            <td>NetFront 3.4</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Links</td>
                            <td>Text only</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Lynx</td>
                            <td>Text only</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Misc</td>
                            <td>IE Mobile</td>
                            <td>Windows Mobile 6</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeU">
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td class="center">-</td>
                            <td class="center">U</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
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

<script src="js/plugins/dataTables/datatables.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<!-- Page-Level Scripts -->
<script>

    var img_data = 'data:image/png;base64,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'

    $(document).ready(function () {
        $('#active_search').addClass('active');
        $('#active_search ul').addClass('collapse in');


        $('.dataTables-example').DataTable({

            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Subject Name'},
                {
                    extend: 'pdf',
                    title: 'LDRP-ITR',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    filename: 'MyLDRP',
                    customize: function (doc) {

                        var cols = [];
                        cols[0] = {text: 'Left part', alignment: 'left', margin: [20]};
                        cols[1] = {text: 'Right part', alignment: 'right', margin: [0, 0, 20]};
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer'] = objFooter;
//                         doc.content[1].table.alignment='center';
                        doc.content.splice(0, 0, {
                            header: 'simple text',
                            margin: [0, 0, 0, 10],
                            alignment: 'center',
                            image: img_data,
                            width: 70, height: 70,
                        });
                    }, alignment: 'center',


                },

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]


        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable('http://webapplayers.com/example_ajax.php', {
            "callback": function (sValue, y) {
                var aPos = oTable.fnGetPosition(this);
                oTable.fnUpdate(sValue, aPos[0], aPos[1]);
            },
            "submitdata": function (value, settings) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition(this)[2]
                };
            },

            "width": "90%",
            "height": "100%"
        });


    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData([
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row"]);

    }


</script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.5/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Apr 2016 17:36:43 GMT -->
</html>
