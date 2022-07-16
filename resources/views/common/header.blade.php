<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/user/images/HR-coin-favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/user/css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="/user/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/user/css/style.css" />
    <title>HRCrypto</title>
  </head>
  <body class="user-page">
    <header class="header1">
     
        <nav class="navbar navbar-expand-lg top-menu">
          <a class="navbar-brand" href="{{url('/')}}" ><img src="/user/images/logo.png"/></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path></svg></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Session::has('hrc_username'))
              <ul class="navbar-nav mr-auto">
                <!-- $userBalance = ""; -->
                <li class="nav-item"  ><a class="nav-link" href="{{url('dashboard')}}"><span class="h5 w-f">HRC Balance : <span class="text-success"> HRC</span> </span></a></li>
              </ul>
          @endif
            <ul class="navbar-nav ml-auto d-flex align-items-center">
              @if (Session::has('hrc_username')) 
              <li class="nav-item"><a class="nav-link" href="{{url('dashboard')}}">Dashboard </a></li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-text">
                    <span>Wallet</span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                  <a class="dropdown-item" href="{{url('receive')}}">Deposit</a>
                  <a class="dropdown-item" href="{{url('withdraw')}}">Withdraw</a>
                  <a class="dropdown-item" href="{{url('transfer')}}">Transfer</a>
                </div>
              </li>

              <li class="nav-item"><a class="nav-link" href="{{url('exchange')}}">Exchange</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('staking')}}">Staking</a></li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-text">
                    <span>Referral</span>
                  </div>
                </a>

              
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('referral')}}">Referral</a>
                  <a class="dropdown-item" href="{{url('income_plans')}}">Subscription Plans</a>
                  <a class="dropdown-item" href="{{url('sub_plans')}}">Subscription Plans2</a>

                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-text">
                    <span>Income</span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                  <a class="dropdown-item" href="{{url('income/refer')}}">Refer & Earn</a>
                  <a class="dropdown-item" href="{{url('income/global')}}">Global Club</a>
                  <a class="dropdown-item" href="{{url('income/infinity')}}">Infinity Level</a>
                  <a class="dropdown-item" href="{{url('income/royal')}}">Royal Referral</a>
                  <a class="dropdown-item" href="{{url('income/leadership')}}">LeaderShip Bonus</a>
                </div>
              </li>

              <li class="nav-item"><a class="nav-link" href="{{url('history')}}">History</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('contact_us')}}">Contact Us</a></li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-img"></div>
                  <div class="user-text">
                    <span>{{Session::get('hrc_username');}}</span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('settings')}}">Settings</a>
                  <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                </div>
              </li>
             @else
              <li class="nav-item mr-2 ml-2">
                <a href="{{url('login')}}" class="btn outline-btn">Sign In</a>
              </li>
              
            @endif
            </ul>
          </div>
        </nav>
      
    </header>