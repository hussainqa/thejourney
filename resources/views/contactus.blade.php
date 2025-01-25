<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<style>
    body {
    background-color: #f1f1f1;
    padding-top: 75px;
  }
    .black {
    width: 100%;
    min-height: 3px;
    border-top: 5px solid #222;
  }

  .yellow {
    width: 100%;
    min-height: 3px;
    border-top: 4px solid #faad16;
  }
  input{
    background-color: transparent !important;
    border: 2px #222 solid !important;
    height: 30px  !important;
  }
  textarea{
    background-color: transparent !important;
    border: 2px #222 solid !important;
  }
  .card{
    border: 2px #222 solid !important;
    width: 30%;
  }
  
  form{
    width: 65%;
  }
  form button{
    background-color: #faad16 !important;
    color: #000 !important;
  }
  a{
    text-decoration: none !important;
    color: #222;
    line-height: 35px;
    word-break: break-all;
  }

    .nav-item a:focus{
        color:#000;
        font-weight: 500;
    }

  .bi{
    color: #faad16 !important;
    font-size: 20px;
  }
  .d-flex a{
    font-weight: 300;
    font-size: 13px;
  }
  .d-flex p{
    font-weight: 300;
    font-size: 13px;
  }
  
  .bt{
    bottom: 10px !important;
  }
  @media only screen and (max-width: 600px) {
    form{
        width: 100% !important;
    }
    .card{
        width: 100% !important;
    }
  }
</style>
<body>

@include('includes.navbar')

  <div class="container-fluid mb-4">
    <div class="row p-0">
        <div class="mx-auto" style="max-width: 950px;">
        <h1 class="text-center fw-bold mt-3"> تواصل معنا</h1>
        <div class="yellow"></div>
        <div class="black mt-1"></div>
        <div class="yellow mt-1"></div>
        <div class="d-flex  flex-wrap justify-content-between">
            <div class="card bg-transparent mt-3 p-3">
                <div class="card-body bg-transparent">
                    <h4 class="w-75">أين تجدنا</h4>
                    <p class="fw-light">معلومات الاتصال الخاصة بنا</p>
                    <div class="mt-4">
                        <div class="d-flex gap-4">
                            <i class="bi bi-telephone"></i>
                            <a href="#"> 07700886532</a>
                        </div>
                        <div class="d-flex gap-4 mt-2">
                            <i class="bi bi-envelope"></i>
                            <a href="#"> globaljourney@gmail.com</a>
                        </div>
                        <div class="d-flex gap-4 mt-2">
                            <i class="bi bi-geo-alt-fill"></i>
                            <p>Iraq, Baghdad, Mansour Business Avenue<p>
                        </div>
                    </div>
                    <div class="mt-5 d-flex gap-3 bt">
                        <a href="#">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <form action="/subscription" method="POST" class="form mt-3 ">
                @csrf
                <div class="d-flex gap-3">
                <input class="form-control p-1 col-sm w-100 shadow-none" type="text" placeholder="الإسم الكامل" name="name">
                <input class="form-control p-1 col-sm w-100 shadow-none" type="text" placeholder="رقم الهاتف" name="phoneNumber">
                </div>
                <div class="form-group mt-3">
                    <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="الموضوع" name="subject">
                </div>
                <div class="form-group mt-3">
                    <textarea id="" cols="30" rows="10" class="form-control" placeholder="ملاحظات" name="message"></textarea>
                </div>
                <button type="submit" class="mt-3 btn btn-sm w-100">إرسال</button>
            </form>
            
        </div>
    </div>
    </div>
  </div>
 @include('includes.footer')
</body>
</html>