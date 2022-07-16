<div class="modal login-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="login-text">
          <h2>Welcome Back!!!</h2>
          <form id="loginForm" action="{{url('login')}}" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email Address" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <!-- <div class="login-modal-link">
              <a href="#" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#forgotModal">Lost your password?</a>
            </div> -->
            <div class="login-modal-button">
              <button class="btn send-button" type="submit">Login Now</button>
              <a href="#" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#model-register">Register Now</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal login-modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="login-text">
          <h2>Forgot Password</h2>
          <form id="forgotForm" action="{{url('forgot_password')}}" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email Address" name="email">
            </div>
          </form>
          <div class="login-modal-button">
            <button class="btn send-button">Submit</button>
            <a href="#" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModalCenter">Login Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal login-modal fade" id="model-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="login-text">
          <h2>Join Today</h2>
          <form id="registerForm" action="{{url('register')}}" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Username" name="username">
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" placeholder="Email Address" name="email">
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control" placeholder="Password" name="password" id="reg-pwd">
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control" placeholder="Retype Password" name="confirm_password">
              </div>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1" name="accept">
              <label class="custom-control-label" for="customCheck1">I Agree with the <a href="{{url('terms')}}">Terms & Conditions</a></label>
              <label id="accept-error" class="error" for="accept" style="display:none"></label>
            </div>
            <div class="login-modal-button">
              <button class="btn send-button" type="submit">Register Now</button>
              <a href="#" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModalCenter">Login Now</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#registerForm').validate({
    ignore:"",
    rules: {
      email: {
        required: true,
        validEmail: true
      },
      username: {
        required: true,
        alphanumeric: true,
        minlength: 3,
        maxlength: 20
      },
      password: {
        required: true,
        minlength: 8,
        upper: true,
        specialchars: true,
        onenumeric: true,
        lower: true,
        noSpace: true
      },
      confirm_password: {
        required: true,
        equalTo: "#reg-pwd"
      },
      accept: {
        required: true
      }
    },
    messages: {
      email: {
        required: "Enter email"
      },
      username: {
        required: "Enter username",
        minlength: "Enter minimum 3 characters",
        maxlength: "Maximum length is 20 characters"
      },
      password: {
        required: "Enter password",
        minlength: "Enter minimum 8 characters"
      },
      confirm_password: {
        required: "Enter confirm password",
        equalTo: "Enter the same password"
      },
      accept: {
        required: "Please accept our terms"
      }
    }
  });

  $('#loginForm').validate({
    ignore:"",
    rules: {
      email: {
        required: true,
        validEmail: true
      },
      password: {
        required: true
      }
    },
    messages: {
      email: {
        required: "Enter email"
      },
      password: {
        required: "Enter password"
      },
    }
  });

  $('#forgotForm').validate({
    ignore:"",
    rules: {
      email: {
        required: true,
        validEmail: true
      }
    },
    messages: {
      email: {
        required: "Enter email"
      }
    }
  });
</script>