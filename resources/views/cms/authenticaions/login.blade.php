<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<title>Login | Future Generation Properties</title>
<link rel="shortcut icon" href="{{url('')}}/assets/img/favicon.png">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{ url('') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/theme-checkbox-radio.css">
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

    
body {
  background:   url("{{url('')}}/assets/images/login-bg-img1.jpg") no-repeat center center;
  background-size: 110% 110%;
	/* animation: gradient 20s ease infinite; */
	height: 100vh;
}
/* body {
  background: linear-gradient(100deg, #333333 20%, #e20810 100%);
  background-size: 400% 400%;
	animation: gradient 10s ease infinite;
	height: 100vh;
} */

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

@import url('https://fonts.googleapis.com/css?family=Open+Sans');

* {
  font-family: 'Open Sans', sans-serif;
}


.box {
  width: 400px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(0, 0, 0, 0.8);
  padding: 40px;
  box-sizing: border-box;
  box-shadow: 0px 15px 25px rgba(0, 0, 0, .5);
  border-radius: 10px;
}

.box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.box p {
  margin-bottom: 0;
}

.box p:nth-child(even) {
  margin-top: 0;
}

.box a {
  color: #9a9d9e;
  font-size: 14px;
  text-decoration: none;
}

.box .input-box {
  position: relative;
}

.box .input-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  margin-bottom: 30px;
  color: #fff;
  border: 1px solid #000;
  border: none;
  border-bottom-style: solid;
  outline: none;
  letter-spacing: 1px;
  background: transparent;
}

.box .input-box label {
  position: absolute;
  color: #fff;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}

.box .input-box input:focus ~ label,
.box .input-box input:valid ~ label{
  top: -18px;
  left: 0;
  color: #fff;
  font-size: 12px;
}

.box .submit {
  background: transparent;
  border: none;
  outline: none;
  background: white;
  color: black;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

#logged-in {
  width: 100%;
  height: auto;
  text-align: center;
  margin: auto;
  position: absolute;
  top: 50px;
  display: none;
}

.login-true {
  opacity: 0;
}
</style>
<body>
<div class="login">
  <div class="mt-20">
  <div id="main" class="main-container">
    <div class="box">
      <div class="row mb-5 ml-1">
        <img src="{{url('')}}/assets/images/header.png" width="200px" height="70px" style="margin: auto;">
        
        @if(Session::has('error'))
          <p class="error text-center mt-5">Invalid Login Credentials! Please Try Again</p>
        @endif
      </div>
      <form  action="{{ route('login.store') }}" method="POST"  class="text-left">
        @csrf
        <div class="input-box">
          <input id="user-name" type="text" name="email" required="">
          <label>Username</label>
        </div>
        <div class="input-box">
          <input id="user-pass" type="password" name="password" required="">
          <label>Password</label>
        </div>
        <div class="text-center">
          <button class="submit"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg> LOGIN</button>
        </div>
      </form>
      <!-- <p><a href="#">Lost your password?</a></p>
      <p><a href="#">Register</a></p> -->
      <p class="text-center mt-4" style="color: white;"> Copyright © 2022 | <a href="#" >Future Generations Properties</a></p>
    </div>
    </div>
  </div>
</div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ url('') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ url('') }}/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('') }}/assets/js/authentication/form-1.js"></script>

</body>
</html>