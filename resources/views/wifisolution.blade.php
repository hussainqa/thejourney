<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('styles.css')}}">

    <title>Document</title>
</head>
<style>
     body {
    background-color: #f1f1f1;
    padding-top: 61px;
    }
    .cont{
        width: 75%;
        margin: auto;
    }
    .line{
        width: 100%;
        border-top: 1px #000 solid;
    }
    .main-text{
        width: 45%;
    }
    .j-img{
        width: 45%;
    }
    p{
        text-align: justify !important;
        font-size: 15px;
        font-weight: 500;
    }
    .bg-yellow{
        background-color: #faad16;
    }
    .nav-item{
        margin-left: 15px;
    }
    .nav-item a{
        font-weight: 300;
        font-size: 14px;
        color: #222;
    }
    .nav-item a:focus{
        color:#000;
        font-weight: 500;
    }
    .li{
        font-weight: 500;
        font-size: 15px;
        text-align: justify;
    }
    ol{
        text-align: justify;
    }
    .dropdown-menu{
        background-color: #f1f1f1;
        backdrop-filter: blur(5px) !important;
    }
    .dropdown-menu li a{
        backdrop-filter: blur(10px) !important;
        font-weight: 500 !important;
    }
    @media only screen and (max-width: 768px) {
        .cont{
            width: 90%;
            display: block;
        }
        .main-text{
            width: 100%;
            margin: auto;
        }
        .j-img{
            width: 100%;
            margin-top: 50px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top"
    style="background-color: #f1f1f13a; backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px) !important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="thejourey.png" style="height: 35px; width: auto;" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">HOME</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SOLUTIONS
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/hotspot">Hotspot</a></li>
            <li><a class="dropdown-item" href="/wifisolution">Wi-Fi Solution</a></li>
            <li><a class="dropdown-item" href="/marketing">Marketing</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="/pricing">PLANS AND PRICING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contactus">CONTACT US</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="cont mb-4">
        <div class="d-flex mt-5 justify-content-between flex-wrap">
        
        <div class="mt-3 main-text">
        <h1 class="fw-bolder">Wi-Fi Solutions</h1>
        <div class="line"></div>
        <h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        <h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p><h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        </div>
        <img src="wifi.png" alt="" class="d-block j-img">
        
        </div>
         <h1>Features</h1>
         <h5 class="" style="text-align: justify;">We offer you many wonderful and distinctive Wi-Fi network solutions:</h5>
         <ol>
            <li class="li"> <b> Connection stability: </b> improving the stability of Wi-Fi networks, and the absence of interruptions and non-connection.</li>
            <li class="li"> <b> The problem of weak signal: </b> a final solution to the problem of weak Wi-Fi signal, as through our modern and advanced solutions, you will enjoy a strong communication network and not be affected by barriers, walls, and ceilings.</li>
            <li class="li"> <b> The problem of delayed communication: </b> a final solution to the problem of delayed communication, insufficient internet speed, interference with Wi-Fi signals, or the presence of malicious programs on connected devices.</li>
            <li class="li"> <b> The problem of non-contact: </b> a final solution to the problem of non-contact due to the failure of the devices to support large numbers of users, as our Wi-Fi solutions tolerate a very large number of phones and users, and the quality is not affected and there is a weakness in the Internet connection.</li>
        </ol>

        <div class="d-flex mt-5 justify-content-between flex-wrap">
        
            <div class="mt-3 main-text">
            <h1 class="fw-bolder">Network Solutions</h1>
            <div class="line"></div>
            <h3 class="mt-3">What is the importance of networks?</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
            <h3 class="mt-3">What is (IP Phone) and what features does it offer?</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
            <h3 class="mt-3">What are network monitoring systems?</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
            
            </div>
            <img src="wifi1.png" alt="" class="d-block j-img">
            
            </div>

            <h1>Features</h1>
         <h5 class="" style="text-align: justify;">We offer you many wonderful and distinctive Wi-Fi network solutions:</h5>
         <ol>
            <li class="li"> <b> Connection stability: </b> improving the stability of Wi-Fi networks, and the absence of interruptions and non-connection.</li>
            <li class="li"> <b> The problem of weak signal: </b> a final solution to the problem of weak Wi-Fi signal, as through our modern and advanced solutions, you will enjoy a strong communication network and not be affected by barriers, walls, and ceilings.</li>
            <li class="li"> <b> The problem of delayed communication: </b> a final solution to the problem of delayed communication, insufficient internet speed, interference with Wi-Fi signals, or the presence of malicious programs on connected devices.</li>
            <li class="li"> <b> The problem of non-contact: </b> a final solution to the problem of non-contact due to the failure of the devices to support large numbers of users, as our Wi-Fi solutions tolerate a very large number of phones and users, and the quality is not affected and there is a weakness in the Internet connection.</li>
        </ol>

    </div>
  </div>
</body>
</html>