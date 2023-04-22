
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>

html,body,.container-fluid{
  background-color: transparent !important;
  height: 100vh;

}
</style>
<body class="vh-100">

    <div class="container-fluid  p-0 d-flex justify-content-center vh-100 align-items-center" dir="rtl">
      <div class="d-block mx-auto w-100" style="max-width: 500px;">
        <h3 class="cong">مبروك!</h3>
        <h4 class=" mb-3 pri">إليك رمز الإنترنت المجاني لمدة 24 ساعة.</h4>

    <div class="input-group mb-3 w-100" dir="ltr">
        <input type="text" class="form-control text-white" style="background-color: var(--btns-color); height: 40px; border-radius: 8px 0 0 8px; border: solid 1px var(--btns-color) !important;" id="myInput" value="{{ $code }}" >
        <button  class="btn" style="background-color: var(--btns-color); border: none !important; height: 40px; border-radius: 0 8px 8px 0; width: 60px; box-shadow: none !important;" type="button" onclick="myFunction()"><i class="text-white fas fs-5 fa-clone fa-rotate-180"></i></button>
      </div>
      <p class="sec" style="margin-right: 10px;">انسخ الرمز</p>
    </div>
</div>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            navigator.clipboard.writeText(copyText.value);
        }


    </script>
</body>
</html>
