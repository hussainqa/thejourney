<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Log In</title>
</head>
<style>
input{
    padding: 10px 8px !important;
}

.btn{
    height:48px;
}
.spacing{
    width:980px !important;
    margin:auto;
    padding-top:138px;
}

.toggle{
    width:435px;
    margin-right:0;
}
.img-align{
    margin-right: auto;
    display: block;
}
@media only screen and (max-width: 1000px) {
    .spacing{
        width:860px !important;
    }
}

@media only screen and (max-width: 890px) {
    .spacing{
        width:100% !important;
        padding-top:72px !important;
    }
    .toggle{
        margin-right: auto !important;
        margin-left:auto !important;
    }

    .col-sm-6{
        width:100% !important;
    }
    .img-align{
        margin:auto !important;
    }
}
@media only screen and (max-width: 512px) {
    .toggle{
        width: 100% !important;
    }
}
</style>
<body class="vh-100" dir="rtl">
    <div class="container-fluid vh-100 bg-light ">
        <div class="row spacing">
            <div class="bg-white shadow card p-0 toggle">
            <form method="POST" action="/adminAuthentication/store">
                @csrf
                <h4 class="text-center card-header bg-dark text-white" style="height:58px;" >التسجيل</h4>
                <div class="card-body">
                 
                <div class="mb-3">
                    <input type="text" class="form-control" id="firstName" name="name" placeholder="الاسم" value="{{old('name')}}">
                        @error('firstName')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>

                 <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="البريد الالكتروني" value="{{old('email')}}">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" value="{{old('password')}}">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>
  

                 <button type="submit" class="btn w-100" style="background-color: #faad16;">تسجيل</button>
                 <div class="mb-3"></div>
                 
            </form>
            </div>
            <div class="card-footer bg-dark text-white"><p class="text-center">هل لديك حساب بالفعل؟ <a href="/login" class="text-primary text-decoration-none">تسجيل الدخول</a></p></div>
            </div>
            <div class="me-auto col-sm-6 mt-5">
                <img src="{{ asset('thejourey.png') }}" class="img-fluid img-align mt-4" alt="">
            </div>
        </div>
    </div>
</body>
</html>