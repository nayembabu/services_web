
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
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th> ID </th>
                        <th> App Status </th>
                        <th> Num type </th>
                        <th> Slip No </th>
                        <th> Birth Date </th>
                        <th> Person Name </th>
                        <th> Upload File </th>
                        <th> Requ Time </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody class="listRecords">

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

        	var fileUploadInputBtn = '<input type="file" class="form-control-file UpldFileThis" id="" name="file">';

        	listRecords();
        	function listRecords(){
        		var html='';
        		var sl = 1;
        		$.ajax({
        			url: 'admin/getAllReqforupload',
        			method: 'GET',
        			dataType: 'json',
        			success: function(data){
        				for (var i = 0; i < data.length; i++) {

							var requTime = data[i].requ_time_stamp;
							var devug = new Date(requTime*1000);
							// Hours part from the timestamp
							var hours = devug.getHours();
							// Minutes part from the timestamp
							var minutes = "0" + devug.getMinutes();
							// Seconds part from the timestamp
							var seconds = "0" + devug.getSeconds();
							var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

        					html += '<tr class="data_tr_row"><form method="post" action="" enctype="multipart/form-data" id="myform">' +
				                        '<td>' + data[i].requ_uniq_iiiid +  '</td>' +
				                        '<td>' + data[i].requ_emar_stats + '</td>' +
				                        '<td>' + data[i].requ_type + '</td>' +
				                        '<td>' + data[i].query_numbr + '</td>' +
				                        '<td>' + data[i].requ_birth + '</td>' +
				                        '<td>' + data[i].query_name_des + '</td>' +
				                        '<td>' + fileUploadInputBtn + '</td>' +
				                        '<td>' + formattedTime + '</td>' +
				                        '<td>  <button type="button" dataID="'+data[i].requ_uniq_iiiid+'" class="btn btn-success btn-xs SucBtn_ss" title="Success" id="inlineFormCustomSelect" ><i class="fa fa-check"></i> </button>          <button type="button" ThisdataID="'+data[i].requ_uniq_iiiid+'" class="btn btn-danger btn-xs delRequ_Btn" title="Reject" id="inlineFormCustomSelect" ><i class="fa fa-times"></i> </button>  </td>' +
				                     ' </form></tr>'
        				}
        				$('.listRecords').html(html);
        			}
        		})
        	}


        	$(document).on('click', '.SucBtn_ss', function() {

        		var thisAutoIdd = $(this).attr('dataID');
        		var fd = new FormData();
		        var UploadThisFile = $(this).parents('.data_tr_row').find('.UpldFileThis');                 
        		var files = $(UploadThisFile)[0].files[0];
        			fd.append('file', files);
        			fd.append('id', thisAutoIdd);
        			// console.log(fd);
        			$.ajax({
			            url: 'admin/fileUploadForThisIDD',
			            type: 'post',
			            data: fd,			            	
			            contentType: false,
			            processData: false,
			            success: function(response){
			                listRecords();
			            },
			        });

        	})

        	$(document).on('click', '.delRequ_Btn', function() {
                var This_Rqs_idd = $(this).attr('ThisdataID');
        		$.ajax({
                    url: 'admin/FormReject_s?ThisRqs_iddi='+This_Rqs_idd,
                    type: 'GET',
                    data: '',
                    success: function(response){ 
                        listRecords();
                     }
                });
        	})
        </script>



        <!--
	$("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });
        -->
