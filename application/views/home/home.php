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







<!-- Login Modal -->
<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <div class="form-group">
            <label for="exampleFormControlInput1">Full Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Mobile Number</label>
            <input type="email" class="form-control mobile_no_dig" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
            
          <div class="form-group">
            <label for="exampleFormControlInput1">Full Address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          


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





<!-- <?php foreach ($div_info as $divs) {
  echo $divs->div_bn_name;
} ?> -->