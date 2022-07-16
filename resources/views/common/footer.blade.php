<div class="footer-content-area ">
  <div class="container">
    <div class="row d-flex mx-3 justify-content-between align-items-center">
      <div class="footer-logo"><a href="#"><img src="/user/images/hrc-logo.png" alt="logo">  </a><br><div class="white-t small">Copyright © 2021 - 2025 Hrnetwork, All Rights Reserved. </div></div>
      <div class=""><div class="footer-social-info fadeInUp text-right" data-wow-delay="0.4s">
        <a href="https://www.facebook.com/HR-Coin-100234695879384/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      </div>
      <ul class="bottom-menu">
        <li><a href="{{ url('privacy_policy') }}">Privacy Policy</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
    </div>

  </div>
  <hr style="border-top: 1px solid rgb(46 56 133);">
</div>
</div>
<!-- Optional JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/user/js/jquery.validate.min.js"></script>
<script src="/user/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  toastr.options = {
    positionClass: 'toast-top-center',
    preventDuplicates: true,
    timeOut: 4000
  };

  // $( document ).ready(function() {
  //   @if(Session::has('success')) 
  //   var sucess= "{{ Session::get('success') }}";
  //   toastr.success(sucess);
  //   @endif

  //   @if(Session::has('error'))
  //   var error= "{{ Session::get('error') }}";
  //   toastr.error(error);
  //   @endif
  // });

  function lettersKey(e){
    return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123);
  }

  function numKey(e){var h=e.which?e.which:event.keyCode;return h>31&&(46>h||h>57)?!1:!0}

  function startLoader(button, loader, form) {
    if($(form).valid() == true) {
      $(button).hide();
      $(loader).show();
    } else {
      $(button).show();
      $(loader).hide();
    }
  }

  function stopLoader(button, loader, form) {
    $(button).show();
    $(loader).hide();
  }
</script>
</body>
</html>