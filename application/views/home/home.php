<style type="text/css">
  .slct_opt {
    margin-left: 20px;
  }
</style>


<!-- Button trigger for login modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
  Login
</button>
<!-- Button trigger for login modal -->


<!-- Button trigger for signup modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signUp">
  Signup
</button>
<!-- Button trigger for signup modal -->




<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="auth/login" method="post">
        <div class="modal-body">

            <input type="text" name="identity" placeholder="Type Your Username">
            <input type="text" name="password" placeholder="Type Your Password">
            
          


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Login Modal -->







<!-- Signup Modal -->
<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="login/cus_signup" method="post">
        <div class="modal-body">

          <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" class="form-control" id="" name="full_name" placeholder="Type Full Name">
          </div>

          <div class="form-group">
            <label for="">User Name</label>
            <input type="text" class="form-control" id="" name="usr_name" placeholder="Type User Name No Space">
          </div>

          <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" name="email_no" id="" placeholder="Type Email ">
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control mobile_no_dig" name="password" id="" placeholder="name@example.com">
          </div>

          <div class="form-group">
            <label for="">Mobile Number</label>
            <input type="text" name="mobile_no" class="form-control mobile_no_dig" id="" placeholder="name@example.com">
          </div>

        <div class="" style="border: 1px solid black; margin-left: 45px; border-radius: 10px;">
            <label for="" style="margin-left: 10px;">আপনি কোন ইউনিয়নের উদ্যোক্তা</label>
            <div class="form-group slct_opt">
              <label for="">Select Division</label>
              <select class="form-control select_2 div_select" name="div_iidd" id="">
                <option value=""> Select..... </option>
              <?php foreach ($div_info as $div) { ?>
                <option value="<?php echo $div->div_id; ?>"> <?php echo $div->div_bn_name; ?> </option>
              <?php } ?>
              </select>
            </div>

            <div class="form-group slct_opt">
              <label for="">Select District</label>
              <select class="form-control select_2 dis_select" name="dis_idi" id="">
                <option> Select.. </option>
              </select>
            </div>
              
            <div class="form-group slct_opt">
              <label for="">Select Upazilla</label>
              <select class="form-control select_2 upz_select" name="up_iddii" id="">
                <option> Select.. </option>
              </select>
            </div>

            <div class="form-group slct_opt">
              <label for="">Select Union</label>
              <select class="form-control select_2 un_select" name="un_iiidd" id="">
                <option value=""> Select.. </option>
              </select>
            </div>
          </div><br><br>

          <div class="form-group">
            <label for="">Full Address</label>
            <input type="text" class="form-control" name="full_address" id="" placeholder="name@example.com">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Signup Modal -->






<script type="text/javascript">
  $('.div_select').change(function() {
    var div_iidd = $(this).val();
    var i;
    var html = '';
      $.ajax({
        url: 'login/getDistricById?div_id='+div_iidd,
        method: 'GET',
        data: '',
        dataType: 'json',
        success: function (dis_data) {

          for (i=0; i<dis_data.length; i++) {
            html += '<option value="'+dis_data[i].dis_id+'" >'+dis_data[i].dis_bn_name+'</option>';
          }
          $('.dis_select').html('<option> Select.................. </option>'+html);
         }
      })
  })

  $('.dis_select').change(function() {
    var dis_iidd = $(this).val();
    var n;
    var up_full_data = '';
      $.ajax({
        url: 'login/getUpazillaById?dis_iid='+dis_iidd,
        method: 'GET',
        data: '',
        dataType: 'json',
        success: function (up_data) {

          for (n=0; n<up_data.length; n++) {
            up_full_data += '<option value="'+up_data[n].up_id+'" >'+up_data[n].up_bn_name+'</option>';
          }
          $('.upz_select').html('<option> Select.................. </option>'+up_full_data);
         }
      })
  })

  $('.upz_select').change(function() {
    var up_iidd = $(this).val();
    var n;
    var un_f_data = '';
      $.ajax({
        url: 'login/getUnionById?up_iid='+up_iidd,
        method: 'GET',
        data: '',
        dataType: 'json',
        success: function (un_data) {

          for (n=0; n<un_data.length; n++) {
            un_f_data += '<option value="'+un_data[n].un_id+'" >'+un_data[n].un_bn_name+'</option>';
          }
          $('.un_select').html('<option> Select.................. </option>'+un_f_data);
         }
      })
  })
</script>