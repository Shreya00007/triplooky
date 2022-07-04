<!DOCTYPE html>
<html>
<head>
  <title>Triplooky | Login</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="assets/canilari-1/Canilari-Pro.ttf" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{url('')}}/front-assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="{{url('')}}/front-assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{url('')}}/front-assets/assets/canilari-1/Canilari-Ornaments.ttf" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('')}}/front-assets/assets/css/style.css" rel="stylesheet">
  <script src="{{url('')}}/front-assets/assets/js/custom.js?cache=<?php echo time() ?>"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
    body{
      font-family: 'Poppins', sans-serif!important;
    }
    .wrapper {
  background-image: url('../front-assets/assets/img/pic.jpg');
  left: 0;
  position: relative;
  width: 100%;
  height: 100vh;
  margin-top: 0px;
  overflow: hidden;
  background-size: cover;

}
.wrapper.form-success .container h6 {
  font-size: 18px;
  color: #111;
  /*transform: translateY(100px);*/
}
.wrapper-section {
    width: 450px;
  margin: 0 auto;
  background: #ffffff;
  padding: 16px 0px;
   text-align: center;
  border-radius: 2px; 
  box-shadow: 0px 0px 10px -1px rgba(0,0,0,0.5);
  position: absolute;
  left:50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 99;
}
.wrapper-section img{
  /*height: 111px;
  width: 117px;*/
  object-position: center;
  object-fit: cover;
}

.wrapper-section h6 {
    font-size: 28px;
    color: #094D80;
   /* transition-duration: 2s;
    transition-timing-function: ease-in-out;*/
      letter-spacing:0.7px;
      padding-top:10px;
}
.wrapper-section p{
letter-spacing: 0.38px;
color: #606060;
font-size: 15px;
}
form {
  padding: 0px 24px;
  position: relative;
  z-index: 2;
}
form label{
  letter-spacing: 0.45px;
  font-size: 18px;
  color:#000000;
}
form input {
    outline: 0;
    letter-spacing: 0.5px;
    color: #C7C7C7;
    width: 300px;
    border-radius: 5px;
    padding: 10px 15px;
    /*margin: 10px auto 10px auto;*/
    display: block; 
    font-size: 20px;
     transition-duration: 0.5s;
   
}
/*form input:hover {
  background-color: rgba(17, 17, 17, 0.4);
}*/
form input:focus {
  background-color: #fff;
  /*width: 300px;*/
  color: #000;
}

.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  border-radius: 150px;
  -webkit-animation: square 50s infinite;
  animation: square 50s infinite;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
.bg-bubbles li:nth-child(1) {
  left: 10%;
}
.bg-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  animation-delay: 0s;
  animation-duration: 7s;
}
.bg-bubbles li:nth-child(3) {
  left: 25%;
  animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}
.bg-bubbles li:nth-child(5) {
  left: 70%;
}
.bg-bubbles li:nth-child(6) {
  left: 80%;
  width: 12px;
  height: 12px;
  animation-delay: 30s;
  background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  animation-delay: 7s;
}
.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  animation-delay: 15s;
  animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  animation-delay: 2s;
  animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  animation-delay: 11s;
}
.bg-bubbles li:nth-child(11) {
  left: 25%;
  width: 60px;
  height: 60px;
  animation-delay: 2s;
}
@-webkit-keyframes square {
  0% {
    transform: translateY(0);
    background-color: rgba(255, 255, 255, 0);
  }
  100% {
    transform: translateY(-100px);
    background-color: #ffffff;
  }
}
@keyframes square {
  0% {
    transform: translateY(0);
    background-color: #ffffff;
  }
  100% {
    transform: translateY(-500px);
    background-color: rgba(255, 255, 255, 0);
  }
}
.form-group {
    margin-bottom: 20px;
}
#ch input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

#ch label {
  position: relative;
  cursor: pointer;
}

#ch label:before {
  content:'';
  -webkit-appearance: none;
  background-color: transparent;
  border: 1px solid #707070;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  padding: 7px;
  display: inline-block;
  position: relative;
  vertical-align: top;
  cursor: pointer;
  margin-right: 10px;
}

#ch input:checked + label:after {
  content: '';
  display: block;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 16px;
  height: 16px;
  background: #0079bf;
}
#ch label{
  font-size: 14px;
  color:#707070;
}
.ft{
  color: #ED1B24;
  font-size: 14px;
}
.ft:hover{
  color: #ED1B24;
}
#login-button {
    width: 100%;
    background: #084E7F;
    border-radius: 5px;
    color: #ffffff;
    text-align: center;
    box-shadow: 0px 3px 6px #00000029;
    height: 50px;
    border: none;
}
.login-bottom{
  padding:0px 24px;
}
.login-bottom p{
 color:#707070;
 font-size:12px;
 letter-spacing: 0.45px;
 text-align: center; 
}
.or-section{
  text-align: center;
  position: relative;
}
.or-section span {
    display: inline-block;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border: 1px solid #707070;
    text-align: center;
    font-size: 12px;
    padding: 3px 0px;
    position: relative;
    z-index: 99;
    background: #ffffff
}
.or-section:after, .or-section:before{
  content: '';
  width:50%;
  height: 1px;
  background: #707070;
  top:50%;
  position: absolute;
}
.or-section:after{
  left:0;
}
.or-section:before{
  right: 0;
}
.s-around{
  justify-content: space-around;
}
.social{
   font-size: 32px;
}
.fb{
  color:#3B5998;
}
.twit{
  color:#1DA1F2;
}
.pit{
  color:#E71D27;
}
input.input-place::placeholder{
  color:red !important ;
}
input.input-place{
  border: 1px solid red;
}
input.input-place:focus{
  border: 1px solid red;
}

  </style>
</head>
<body>
<div class="wrapper">
  <div class="container">
    <div class="wrapper-section">
    <img src="{{url('')}}/front-assets/assets/img/newtriplogo.svg" width="100"> 
   
    <h6 class="name" style="font-size:22px;">Welcome to Triplooky</h6>
    <p>Please login to your account.</p>

    <form class="form text-left" id="user-login-form">
      @csrf
      <div class="form-group">
        <label style="margin-bottom:0px">E-mail<span style="color: #ED1B24">*</span></label>
          <input type="email" id="user" class="form-control shadow-none" placeholder="Enter your email address" name="email">
      </div>
      <div class="form-group">
          <label style="margin-bottom:0px">Password<span style="color: #ED1B24">*</span></label>
        <input type="password" class="form-control shadow-none" placeholder="Password" name="password">
    </div>
    <div class="d-flex" style="align-items:center;justify-content:space-between;">
      <div class="form-group" id="ch">
          <input type="checkbox" id="rem">
          <label for="rem">Remember me</label>
        </div>
        <div class="form-group">
          <a href="/forgotpass" class="ft">Forgot Password?</a>
        </div>
    </div>
      <button type="submit" id="login-button">Login</button>
    </form>
    <div class="login-bottom">
    <hr />
    <p>Don't have an account?<a href="/signup">Sign Up</a></p>
    <div class="or-section">
      <span>OR</span>
    </div>
    <div class="d-flex mt-2 s-around">
      <a href="#" target="_blank" class="social fb "><i class="fab fa-facebook-square"></i></a>
      <a href="#" target="_blank" class="social twit "><i class="fab fa-twitter-square"></i></a>
      <a href="#" target="_blank" class="social pit "><i class="fab fa-pinterest"></i></a>
    </div>
</div>

  </div>
  </div>
  
  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js "></script>
<script src="{{url('')}}/front-assets/assets/js/custom.js?cache=<?php echo time() ?>"></script>

</html>