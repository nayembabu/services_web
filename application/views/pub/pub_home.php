<!-- <?php

$costss_array=[];
$amnt_array=[];

 foreach ($user_amount as $total_amount) { 
	$amnt_array[] = $total_amount->payable_amount;
 }
$totalAmnt_s = array_sum($amnt_array);

  foreach ($servic_cost as $total_cost) {
	$costss_array[] = $total_cost->this_service_amount;
 }
 $totalCost_ss = array_sum($costss_array);

 $nowBalance = $totalAmnt_s - $totalCost_ss;
 ?>
 -->


<style type="text/css">
	.erro_show {
		font-size: 22px;
		color: red;
		text-align: center;
	}
	th {
		text-align: center;
	}
</style>


<h1> Total Banalce : <span class="now_balance_ss" style="font-weight: bold"></span></h1>

          <button type="button" onclick="window.location.href='auth/logout'" class="btn btn-secondary" data-dismiss="modal">Logout</button>

<div class="query_btn_ss"></div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AdvancePayModal">Pay Amount</button>
	
	<div class="form-row" style="width: 450px;">
		<div class="form-group col-md-6">
			<label for="inputEmail4"> Input Date </label>
			<input type="text" class="form-control datePick" id="inputEmail4" >
		</div>
		<div class="form-group col-md-4">
			<label for="inputPassword4">   </label>
			<input type="button" class="form-control search_by_date btn-primary" id="inputPassword4" value="SEARCH">
		</div>
	</div>

<table border="1" class="requ_data_table_s"></table>




<!-- Add New Request Modal -->
<div class="modal fade" id="requModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form >
        <div class="modal-body">

		    <div class="form-group ">
		      <label for="inputState">Select Service List</label>
		      <select id="inputState" class="form-control services_list_name">
		        <option value="">Select..</option>
		    <?php foreach ($servic_list as $servic) { ?>
		        <option value="<?php echo $servic->service_uniq_iddi; ?>" ser_rate="<?php echo $servic->service_rate; ?>"><?php echo $servic->service_name; ?></option>
		    <?php } ?>
		      </select>
		    </div>
		    <div class="App_Type_ssss"></div><br>
		    
		    <div class="form-group nid_sl_type"></div>


		    <div class="input_form_tag"></div>

		    <div class="erro_show"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary submit_btn_ss" style="display: none;">SUBMIT</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add New Request Modal -->





<!-- Advance Pay Modal -->
<div class="modal fade" id="AdvancePayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form >
        <div class="modal-body">

		    <div class="form-group ">
		      <label for="inputState"> Select Mobile Banking </label>
		      <select id="inputState" class="form-control mobile_banking_operator">
		        <option value="">Select..</option>	
		       <?php foreach ($mbl_bank as $mblbank) { ?>
		        <option value="<?php echo $mblbank->mbl_bank_uniq_iddidid; ?>"><?php echo $mblbank->operator_namess; ?> </option>
		       <?php } ?>	
		      </select>
		    </div>

		    <div class="operator_mbl_no_all"></div><br>

		    <div class="input_form_grup_with"></div>








        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary submit_btn_for_advance" >SUBMIT</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Advance Pay Modal -->

<script type="text/javascript">

	var argetRate = 0;

	getRequest();

	var nid_slip_form = '<div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4"> Number </label><input type="text" class="form-control slip_numbr" id="inputEmail4" placeholder="Type Number"></div><div class="form-group col-md-6"><label for="inputPassword4"> Birth Date </label><input type="text" class="form-control birth_date_f datePicker" id="inputPassword4" placeholder="Type Birth Date"></div></div><div class="form-group"><label for="inputAddress"> Person Name </label><input type="text" class="form-control persn_name_s" id="inputAddress" placeholder="Type Full Name of Person"></div>';

	var nidTypeStr = '<label for="inputState"> Nid Serial Type </label><select id="inputState" class="form-control services_opt_s"><option value="">Select..</option><option value="Slip"> Slip No </option><option value="Voter"> Voter No </option><option value="NID"> NID No </option></select>';

	var input_form_s_a = '<div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4"> Sender Number </label><input type="text" class="form-control send_num_sss" id="inputEmail4" placeholder="যে নাম্বার থেকে টাকা পাঠাইছেন।"></div><div class="form-group col-md-6"><label for="inputPassword4"> Receiver Number </label><input type="text" class="form-control birth_date_f recev_num_srs" id="inputPassword4" placeholder="যে নাম্বারে টাকা পাঠাইছে। "></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4"> Transection ID </label><input type="text" class="form-control tr_iidi_tr" id="inputEmail4" placeholder="Transection ID"></div><div class="form-group col-md-6"><label for="inputPassword4"> Amount  </label><input type="text" class="form-control birth_date_f tk_amount_ss" id="inputPassword4" placeholder=" Type Amount... "></div></div>';

	$('.mobile_banking_operator').change(function() {
		var mblBankOptIddidi = $(this).val();
		var html_data = '';

		$('.input_form_grup_with').html(input_form_s_a);

		$.ajax({
			url: 'pub/getMobileNoByOptIDDI?mbl_iidid='+mblBankOptIddidi,
			method: 'GET',
			dataType: 'json',
			success: function(mbl_num_list) {
				for (var i = 0; i < mbl_num_list.length; i++) {
					html_data = '<p style="color:green;">Personal Num : '+mbl_num_list[i].mbl_bank_num_per+'<span style="color:red;">  Agent Num : '+mbl_num_list[i].mbl_bank_num_agent+'</span></p>';
				}
			  $('.operator_mbl_no_all').html(html_data);

			}
		})
	})

	function getRequest() {
		var tbl_head = '<thead><tr><th> Sl No </th><th> Delivery Type </th><th> Number Type </th><th> Number</th><th> Name </th><th> Date Of Birth </th><th> Request Time </th><th> Status </th><th> Action </th><th> Upload Time </th></tr></thead>';
		var QurDate = $('.datePick').val();
		$.ajax({
			url: 'pub/getRequestByIDandDate?qurDate='+QurDate,
			method: 'GET',
			dataType: 'json',
			success: function (requ_data) {
				var full_data = '';
				var i;

				for (i = 0; i < requ_data.length; i++) {

					var requTime = requ_data[i].requ_time_stamp;
					var devug = new Date(requTime*1000);
					// Hours part from the timestamp
					var hours = devug.getHours();
					// Minutes part from the timestamp
					var minutes = "0" + devug.getMinutes();
					// Seconds part from the timestamp
					var seconds = "0" + devug.getSeconds();
					var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

					var UploadTime = requ_data[i].img_uplaod_time;
					var devugs = new Date(UploadTime*1000);
					// Hours part from the timestamp
					var hourss = devugs.getHours();
					// Minutes part from the timestamp
					var minutess = "0" + devugs.getMinutes();
					// Seconds part from the timestamp
					var secondss = "0" + devugs.getSeconds();
					var formattedTimes = hourss + ':' + minutess.substr(-2) + ':' + secondss.substr(-2);

					if (requTime == null) {
						requesTime_f = '';
					}else {
						requesTime_f = formattedTime;
					}

					if (UploadTime == null) {
						UploadTime_f = '';
					}else {
						UploadTime_f = formattedTimes;
					}
					var sl = i+1;
					var stsus = '';
					if (requ_data[i].status == 0) {
						stsus = 'Waiting';
					}else if (requ_data[i].status == 1) {
						stsus = 'Success';
					}else if (requ_data[i].status == 2) {
						stsus = 'Reject';
					}else {
						stsus = 'Something Error';
					}

					var img_checker = '';
					if (requ_data[i].img_upload_url == null) {
						img_checker = 'Wait for Processing';
					}else {
						img_checker = '<a href="'+requ_data[i].img_upload_url+'" download class="Down_btn" Dta_idRes="'+requ_data[i].requ_uniq_iiiid+'"> Download </a>'
					}

					full_data += '<tr><td> '+sl+' </td><td> '+requ_data[i].requ_emar_stats+' </td><td> '+requ_data[i].requ_type+' </td><td> '+requ_data[i].query_numbr+' </td><td> '+requ_data[i].query_name_des+' </td><td> '+requ_data[i].requ_birth+' </td><td> '+requesTime_f+' </td><td> '+stsus+' </td><td> '+img_checker+' </td><td> '+UploadTime_f+' </td></tr>';
				}
			$('.requ_data_table_s').html(tbl_head +' '+ full_data);	
			}

		})
	}


$('.services_list_name').change(function() {
	var services_Name = $(this).val();
	if (services_Name == '1') {
		$('.nid_sl_type').html(nidTypeStr);		
	}else {
		$('.nid_sl_type').html('');
	}

	$.ajax({
		url: 'pub/getServices_Info_s?ser_iidid='+services_Name,
		method: 'GET',
		data: '',
		dataType: 'json',
		success: function (requ_data) { 
			argetRate = requ_data.argent_rate;
			$('.App_Type_ssss').html('<div class="form-check form-check-inline"><input class="form-check-input normal_rate" type="radio" name="App_type" App_Attr="Normal" id="" value="'+requ_data.service_rate+'"><label class="form-check-label" for=""> Normal </label></div><div class="form-check form-check-inline"><input class="form-check-input argent_rate" type="radio" name="App_type" App_Attr="Argent" id="" value="'+requ_data.argent_rate+'"><label class="form-check-label" for=""> Argent </label></div><p style="border: 1px solid black;"> Normal Rate = '+requ_data.service_rate+' and Argent rate = '+requ_data.argent_rate+' <br>Normal Time = '+requ_data.normal_time_ss+' and Argent Time = '+requ_data.arget_rate_time_scs+'</p>');
		}
	})
})

$(document).on('change', '.services_opt_s', function() {
	var services_values = $(this).val();
//	var servicesss_rate = $('option:selected', this).attr('ser_rate');

	var servicesss_rate = $("input[name='App_type']:checked").val();

	if (services_values != '') {
		$('.input_form_tag').html(nid_slip_form);	
		$('.submit_btn_ss').css('display', 'block');
		$('.submit_btn_ss').click(function() {
			var slip_numbr 		= $('.slip_numbr').val();
			var birth_date_f 	= $('.birth_date_f').val();
			var persn_name_s 	= $('.persn_name_s').val();
			if (slip_numbr == '' || servicesss_rate == '') {
				$('.erro_show').html('Hei! Please Type Slip Number and argent or normal...');
			}else {
				saveNewReques_ss();
			}
		})
	}else {
		$('.input_form_tag').html('');
		$('.submit_btn_ss').css('display', 'none');
	}
}) 



	function saveNewReques_ss() {
		var slip_numbr 			= $('.slip_numbr').val();
		var birth_date_f 		= $('.birth_date_f').val();
		var persn_name_s 		= $('.persn_name_s').val();
		var services_opt_sss 	= $('.services_opt_s').val();
		var servicesss_rate 	= $("input[name='App_type']:checked").val();
		var services_list_name 	= $('.services_list_name').val();
		var App_type_text 		= $("input[name='App_type']:checked").attr('App_Attr');	
			$.ajax({
				url: 'pub/insert_new_request',
				method: 'POST',
				data: {
					slip_num: slip_numbr,
					br_date: birth_date_f,
					per_name: persn_name_s,
					servicesss_rate: servicesss_rate,
					services_list_name: services_list_name,
					App_type_text: App_type_text,
					services_opt_sss: services_opt_sss,
				},
				success: function() { 
					$('#requModel').modal('hide');
					getRequest();
					balanceQuery_s();
					$('.App_Type_ssss').html('');
					$('.input_form_tag').html('');
					$('.nid_sl_type').html('');
					$('.services_list_name').val('');
				$('.submit_btn_ss').css('display', 'none');
				}
			})

	}


	$('.search_by_date').click(function() {		
		getRequest();
	})
balanceQuery_s();
	function balanceQuery_s() {
		var now_ttl_balance = 0;
		$.ajax({
			url: 'pub/services_balance_query',
			method: 'GET',
			dataType: 'json',
		   success: function (balance_data) {    
				var amount_ttl_pay = balance_data.user_amount;
				var amount_ttl_cost = balance_data.servic_cost;		   	
		   		now_ttl_balance = amount_ttl_pay - amount_ttl_cost;

		   		if (now_ttl_balance > argetRate) {
		   			$('.query_btn_ss').html('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requModel">New Request</button>');
		   		}else {
		   			$('.query_btn_ss').html(' ');
		   		}

		   		$('.now_balance_ss').html(now_ttl_balance);
	
		    }
		})
	}


	$('.submit_btn_for_advance').click(function() {
		saveAdvancePayment();
	})


	function saveAdvancePayment() {
		var mblBankOptIdd 		= $('.mobile_banking_operator').val();
		var send_num_sss 		= $('.send_num_sss').val();
		var recev_num_srs 		= $('.recev_num_srs').val();
		var tr_iidi_tr 			= $('.tr_iidi_tr').val();
		var tk_amount_ss 		= $('.tk_amount_ss').val();

		$.ajax({
			url: 'pub/saveAdvancePaymentRequest',
			method: 'post',
			data: {
				mblBankOptIdd: mblBankOptIdd,
				send_num_sss: send_num_sss,
				recev_num_srs: recev_num_srs,
				tr_iidi_tr: tr_iidi_tr,
				tk_amount_ss: tk_amount_ss,
			},
		   success: function() {
				$('#AdvancePayModal').modal('hide');
			}
		})
	}

	$(document).on('click', '.Down_btn', function() {
		var thisRequIdd = $(this).attr('Dta_idRes');
		$.ajax({
			url: 'pub/saveDownloadStatus',
			method: 'post',
			data: {
				thisRequIdd: thisRequIdd,
			},
		   success: function() {
				getRequest();
			}
		})
	})

</script>