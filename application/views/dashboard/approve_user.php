
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
                <div class="table-responsive p-3 listResult">
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

            var fileUploadInputBtn = '<input type="file" class="form-control-file UpldFileThis" id="" name="file">';

            var table_Head_er = '<table class="table align-items-center table-flush" id="dataTable"><thead class="thead-light"><tr><th> ID </th><th> User Name </th><th> User Mobile </th><th> User UDC Name </th><th> District </th><th> Upazilla </th><th> Email No </th><th> Full Address </th><th> Action </th></tr></thead><tbody class="">';

            listRecords();

            function listRecords(){
                var html='';
                var sl = 1;
                $.ajax({
                    url: 'admin/getAllReqUserForApprove',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data){
                        for (var i = 0; i < data.length; i++) {

                            var sl = i+1;

                            html += '<tr class="data_tr_row">' +
                                        '<td>' + sl +  '</td>' +
                                        '<td>' + data[i].cus_full_name + '</td>' +
                                        '<td>' + data[i].cus_mobile_no + '</td>' +
                                        '<td>' + data[i].un_bn_name + '</td>' +
                                        '<td>' + data[i].dis_bn_name + '</td>' +
                                        '<td>' + data[i].up_bn_name + '</td>' +
                                        '<td>' + data[i].cus_email + '</td>' +
                                        '<td>' + data[i].parmanent_addres + '</td>' +
                                        '<td>  <button type="button" dataID="'+data[i].id+'" class="btn btn-success btn-xs SucBtn_ss" title="Success" id="inlineFormCustomSelect" ><i class="fa fa-check"></i> </button>       <button type="button" ThisdataID="'+data[i].id+'" class="btn btn-danger btn-xs " title="Reject" id="inlineFormCustomSelect" ><i class="fa fa-times"></i> </button></td>' +
                                     ' </tr>'
                        }
                        $('.listResult').html(table_Head_er+''+html+'</tbody></table>');
                    }
                })
            }


            $(document).on('click', '.SucBtn_ss', function() {
                var ThisUser_rqs = $(this).attr('dataID');
                $.ajax({
                    url: 'admin/UserApproved_ss?ThisUser_rqs='+ThisUser_rqs,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data){ 
                        listRecords();
                     }
                })
            })
        </script>

