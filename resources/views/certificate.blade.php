    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Highrich">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highrich</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="user/js/additional-methods.min.js" ></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="/user/js/jquery.min.js"></script>
<script src="/user/js/TweenMax.min.js"></script>
<script src="/user/js/underscore-min.js"></script>
<script src="/user/js/acript.js"></script>

<div class="confirm">
    <div class="regcnfrm">
           <div class="oiu">
                <div class="flx hy">
                   <div class="icon"><img src="/master/images/Asset4.png">
                   </div>
                    <div class="bn">
                        <div class="congrats">
                          <h1>Congratulations!</h1>
                        </div>
                    </div>
                       <br>
                    <div class="capt">
                        <h3 style="font-family: 'Pacifico', cursive;"><span id="c_email"></span></h3>
                        <p>
                           Your Registration has been  Successfully Completed!!<br>
                           Your User ID is <span style="font-weight:bolder;font-size:20px;" id="c_username"></span>
                        </p>
                    </div>
                </div>
                            <!-- <div class="detils">
                            
                             <div class="frm">
                                 <span>Username</span>
                                 <div>HRC12345</div>
                             </div>
                              <div class="frm">
                                 <span>Password</span>
                                 <div>HRC12345</div>
                             </div>
                            </div> -->
                     <button><a href="login">Login</a></button>
                            <p style="font-size: 13px;">If you have any questions, write to us - <a style="color: #ffff00" href="#">support@hrc.com</a><br>
                            we’re always hapy to help out.</p>
            </div>
                        <span class="prltve"><img src="/master/images/bog.png"></span>
    </div>
</div>

<style>
.congrats {
    position: absolute;
    top: 80px;
    left: 0;
    right: 0;
}
h1 {
    transform-origin: 50% 50%;
    font-size: 50px;
    font-family: 'Sigmar One', cursive;
    cursor: pointer;
    z-index: 2;
    position: absolute;
    top: 0;
    text-align: center;
    width: 100%;
}

.blob {
    height: 50px;
    width: 50px;
    color: #ffcc00;
    position: absolute;
    top: 45%;
    left: 45%;
    z-index: 1;
    font-size: 30px;
    display: none;  
}
    .icon img {
    width: 145px;
}
    .regcnfrm button {
    background: #d5aa57;
    border: none;
    padding: 13px 44px;
    font-size: 16px;
    color: black;
    border-radius: 9px;
    margin-bottom: 16px;
}
    .frm {
    margin-bottom: 15px;
}
    .frm span {
    margin-bottom: 8px;
    display: block;
}
    .frm div {
    background: #0d6057;
    padding: 12px;
    border-radius: 13px;
    box-shadow: rgb(0 0 0 / 20%) 0px 7px 29px 0px;
}
    .detils {
    tew: initial;
    text-align: left;
}
    span.prltve {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
}
    .regcnfrm {
    position: relative;
    overflow: hidden;
}
    .icon {
    margin-bottom: 34px;
}
    .txt h3 {
    color: black;
    font-size: 14px;
    text-align: justify;
    margin: 0;
}
    .fx {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
    span.ol p {
    color: black;
    line-height: 22px;
    font-size: 14px;
    font-weight: 400;
}
    .para p {
    color: black;
}
    body {
    height: 100vh !important;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .flx.brt {
    margin-bottom: 11px;
}
   .hy {
    margin-bottom: 29px;
}
    .log a img {
    width: 143px;
    margin-top: 11px;
}
    .ol{
        text-align: left;
    display: block;
    margin-left: 14px;
    margin-top: 6px;
    }
    .fdr button {
          background: #084561;
    border: none;
    color: white;
    padding: 10px 54px;
    border-radius: 50px;
    width: 100%;
    margin-top: 12px;
    margin-bottom: 7px;
}
    .brt{
             border-bottom: solid 1px #d1ccd9;
    padding-bottom: 8px;
    margin-bottom: 8px;
    }
    .frst1 h3 span {
    font-weight: 100;
        color: #000000;
    margin-bottom: 2px;
    display: inline-block;
        font-size: 16px;
}
    .frst1 h3 {
      font-size: 16px;
    text-align: center;
        color: black;
}
  .capt h3 {
font-size: 30px;
    font-weight: 400;
    text-align: center;
    line-height: 31px;
    color: #ffffff;
    margin-bottom: 26px;
}
 .capt h3 span {
      font-size: 22px;
    line-height: 25px;
}
.regcnfrm {
    
    /* align-items: center; */
    /* width: 100%; */
    margin: auto;
    max-width:32em;
        width: 32em;
    position: relative;
    padding: 0;
    box-sizing: border-box;
    color: #fff;
        z-index: -4;
    background-clip: padding-box;
       border: solid 2px #125248 !important;
    border-radius: 1em;
          padding: 42px 40px;
          z-index:2000;
}
.oiu {
    position: relative;
    z-index: 1000;
}
/* .regcnfrm:before {
        content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: -1;
    margin: -3px;
    border-radius: inherit;    background: linear-gradient(to right, #10b0ad, #20b6b3);
}*/
body{
      background:#072823 url(/master/images/bg.jpg);
    background-size: cover;
    height: 100%;
    background-repeat: no-repeat;
    text-align: center;
    color: #000;
  font-family: 'Roboto', sans-serif;
}
.confirm {
    display: flex;
    align-items: center;
    height: 100vh;
}
@media only screen and (max-width: 800px) {
    .icon {
    margin-right: 0;
}
    .capt h3 {
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    line-height: 23px;
}
    .icon img {
  
    margin-bottom: 22px;
}
    body{
        height: inherit !important;
        display: inherit;
    margin: 14px;
    }
    .regcnfrm {
   
    max-width: 100%;
    width: 100%;
   
    padding: 27px 27px;
}
.icon {
    margin-bottom: 0;
}
.flx {
    display: inherit;
    align-items: center;
    justify-content: center !important;
}
}
.capt p {
    font-size: 14px;
    line-height: 23px;
}
.frm span {
    margin-bottom: 8px;
    display: block;
    font-size: 14px;
}
</style>

<script>

    $( window ).on('load', function() 
    {
      $.ajax(
      {
          
          url:"{{url('certificatedata')}}",
          type: "GET",
          dataType : 'json',
          success: function(result)
          {  
            //   alert(result);
              $('#c_email').text(result[1]); 
              $('#c_username').text(result[0]); 
          }
      });
    });    
</script> 
