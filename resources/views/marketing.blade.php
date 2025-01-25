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
        <h1 class="fw-bolder">Marketing and advertising</h1>
        <div class="line"></div>
        <h3 class="mt-3">What is our marketing?</h3>
        <p>Analyzing the market and developing strategies to deliver products or services to potential customers effectively. Marketing includes many activities such as consumer research, identifying the target audience, designing products, dealing with prices, promotion and distribution.
            any company or shop can use our marketing to achieve its goals and obtain high sales through our distinctive strategies and wonderful advertisements, where we show your product or service in a wonderful and attractive way that consumers cannot resist.</p>
        
        </div>
        <img src="m1.png" alt="" class="d-block j-img">
        
        </div>
         <h1>Features</h1>
         <p>
            If you are the owner of a company or a shop or the owner of a product or service and you need to advertise and sell it, then this matter has become very easy with the j-spot advertisement service, where you can advertise your service or product directly to customers and customers and attract their attention and introduce them to the product or service as our advertisements are distinguished With direct and specific targeting (targeted) and presenting it to interested customers for the purpose of increasing sales and reducing the cost of advertising while increasing customer awareness and educating them about your product or service to make potential customers customers who buy products and services
         </p>

        <div class="d-flex mt-5 justify-content-between flex-wrap">
            <img src="m2.png" alt="" class="d-block j-img">
            
            <div class="mt-3 main-text">
            <h1 class="fw-bolder">Data collection & analysis</h1>
            <div class="line"></div>
            <h3 class="mt-3">What is the data collection service?</h3>
            <p>It is one of the services provided by the Global Walk Company, through which it is possible to collect contact data and the names of customers and visitors.</p>
            </div>
            
            </div>

            <h1 class="mt-3" style="max-width:550px;">Some of the features of our Wi-Fi solutions!</h1>
            <p>If you are the owner of a company or a shop or the owner of a product or service and you need to advertise and sell it, then this matter has become very easy with the j-spot advertisement service, where you can advertise your service or product directly to customers and customers and attract their attention and introduce them to the product or service as our advertisements are distinguished With direct and specific targeting (targeted) and presenting it to interested customers for the purpose of increasing sales and reducing the cost of advertising while increasing customer awareness and educating them about your product or service to make potential customers customers who buy products and services</p>

    </div>
  </div>
</body>
</html>