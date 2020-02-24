
<style type="text/css">
    table {
        font-size: 12px;
        margin: 0;
        padding: 0;
    }
</style>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataTables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">DataTables</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>                
                <div class="table-responsive p-3 ">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th> ID </th>
                                <th> User Name </th>
                                <th> User UDC Name </th>
                                <th> TrID </th>
                                <th> Sender No </th>
                                <th> Receive No </th>
                                <th> Amounts </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody class="listResult">

                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">             

            </div>
          </div>

        </div>
        <!---Container Fluid-->



        <script>

            listRecords();

            function listRecords(){
                var html='';
                var sl = 1;
                $.ajax({
                    url: 'admin/getAllAdvancePayment',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data){
                        for (var i = 0; i < data.length; i++) {

                            var sl = i+1;

                            html += '<tr class="data_tr_row">' +
                                        '<td>' + sl +  '</td>' +
                                        '<td>' + data[i].cus_full_name + '</td>' +
                                        '<td>' + data[i].un_bn_name + '</td>' +
                                        '<td>' + data[i].send_tr_iidd + '</td>' +
                                        '<td>' + data[i].pay_from_num + '</td>' +
                                        '<td>' + data[i].advnc_pay_receive_no + '</td>' +
                                        '<td>' + data[i].send_tk_amount + '</td>' +
                                        '<td>  <button type="button" dataID="'+data[i].advnc_pay_query_iidd+'" class="btn btn-success btn-xs SucBtn_ss" title="Success" id="inlineFormCustomSelect" ><i class="fa fa-check"></i> </button>                 <button type="button" ThisdataID="'+data[i].advnc_pay_query_iidd+'" class="btn btn-danger btn-xs delUser_Btn" title="Reject" id="inlineFormCustomSelect" ><i class="fa fa-times"></i> </button></td>' +
                                     ' </tr>'
                        }
                        $('.listResult').html(html);
                    }
                })
            }


            $(document).on('click', '.SucBtn_ss', function() {
                var ThisUser_rqs = $(this).attr('dataID');
                $.ajax({
                    url: 'admin/AdvancePaymentApprove?ThisUser_rqs='+ThisUser_rqs,
                    type: 'GET',
                    data: '',
                    success: function(response){ 
                        listRecords();
                     }
                });
            })

            $(document).on('click', '.delUser_Btn', function() {
                var ThisPay_rqs_idd = $(this).attr('ThisdataID');
                $.ajax({
                    url: 'admin/AdvPayReject_ss?ThisPay_rqs='+ThisPay_rqs_idd,
                    type: 'GET',
                    data: '',
                    success: function(response){ 
                        listRecords();
                     }
                });
            })
        </script>

