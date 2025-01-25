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
          <li class="nav-item">
            <a class="nav-link" href="/#solutions">SOLUTIONS</a>
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
        <h1 class="fw-bolder m-0">HOTSPOT</h1>
        <p class="mb-2">For Restaurants, cafes and Bars</p>
        <div class="line"></div>
        <h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        <h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p><h3 class="mt-3">What do You need to know about Hotspot?</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        </div>
        <img src="hotspot.png" alt="" class="d-block j-img">
        
        </div>
         <h1>Features</h1>
         <h5 class="ms-5" style="text-align: justify;">Owners of restaurants, cafes, cafes, and bars can benefit from the distinguished services provided by hotspot to develop their business and provide an environment full of comfort for customers, through:</h5>
         <ol>
            <li class="li"> Electronic menu and smart menu</li>
            <li class="li"> Collecting customer data, knowing their opinions and evaluating them for drinks, drinks and service </li>
            <li class="li"> Displaying social media pages to customers and increasing followers </li>
            <li class="li"> Presenting new services, meals and drinks to customers to urge them to try them, and discounts on meals can also be offered (ad space) </li>
            <li class="li"> Giving a modern character to restaurants, cafes, cafes, and bars, similar to the contemporary world-class restaurants, cafes, cafes, and bars. </li>
        </ol>

        <div class="d-flex mt-5 justify-content-between flex-wrap">
        
            <div class="mt-3 main-text">
            <h1 class="fw-bolder m-0">Menu</h1>
            <p class="mb-2">For Restaurants, cafes and Bars</p>
            <div class="line"></div>
            <h3 class="mt-3">What menus does j-spot provide?</h3>
            <p>It is one of the services provided by the Global Journey Company, through which it is possible to collect contact data and the names of customers and visitors.</p>
            
            </div>
            <img src="menu.png" alt="" class="d-block j-img">
            
            </div>

            <h2 class="fw-bolder">Hotspot offers two types of menus:</h2>
            <ol>
                <li class="fw-bold fs-4">Smart Menu</li>
                <p>it is one of the solutions offered by the journey Company to the owners of restaurants, cafes, cafes, bars, and every business that requires a menu, as this menu is not just a regular menu, as it is easy to use and open through the QR code, and also the customer can order through the menu without the need to ask the waiter, as it is directly linked The cashier, with also the possibility of requesting a waiter through which this list gives a modern and sophisticated character, similar to modern international restaurants, and provides comfort and ease for both the customer and the business owner.</p>
                <li class="fw-bold fs-4">Electronic Menu</li>
                <p>It is one of the solutions offered by Al-Mishwar International Company to the owners of restaurants, cafes, cafes, bars, and every business that requires a menu, as the electronic menu can be opened through a QR code.</p>

            </ol>
    </div>
  </div>
</body>
</html>