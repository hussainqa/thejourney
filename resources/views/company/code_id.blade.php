<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('styles_journey.css') }}">
      <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
       <link rel="stylesheet" href="{{asset('bootstrap-icons.css')}}">
              <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

     <script src="{{ asset('bootstrap.min.js') }}"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    
    <title>Document</title>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LKY79M0DWL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LKY79M0DWL');
</script>
<style>

html,body,.container-fluid{
  background-color: transparent !important;
  height: 100vh;

}

#copy-indicator {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translate(-50%);
  display: flex;
  align-items: center;
  background-color: #000000;
  border-radius: 4px;
  padding: 5px 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  z-index: 999;
  opacity: 0;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}



#copy-indicator span {
  font-size: 12px;
  font-family: cairo;
  color: #808080;
}

</style>
<body class="vh-100">

    <div class="container-fluid  p-0 d-flex justify-content-center vh-100 align-items-center" dir="rtl">
      <div class="d-block mx-auto w-100" style="max-width: 500px;">
        <h3 class="cong">مبروك!</h3>
        <h4 class=" mb-3 pri">إليك رمز الإنترنت المجاني لمدة 24 ساعة.</h4>

    <div class="input-group mb-3 w-100" dir="ltr">
        <input type="text" class="form-control text-white" style="background-color: var(--btns-color); height: 40px; border-radius: 8px 0 0 8px; border: solid 1px var(--btns-color) !important;" id="myInput" value="{{ $code }}" >
        <button  class="btn " style="background-color: var(--btns-color); border: none !important; height: 40px; border-radius: 0 8px 8px 0; width: 60px; box-shadow: none !important;" type="button" onclick="copyText(document.getElementById('myInput'));"><i class="text-white fas fs-5 fa-clone fa-rotate-180"></i></button>
      </div>
      <p class="sec" style="margin-right: 10px;">انسخ الرمز</p>
      <div id="copy-indicator">
        <span>تم النسخ!</span>
      </div>
    </div>
</div>
<script>
   
    
          
          
  
  function copyText(input) {
    const copyIndicator = document.getElementById("copy-indicator");

var text = input.value;
var dummy = document.createElement("textarea");
dummy.value = text;
document.body.appendChild(dummy);
dummy.select();
document.execCommand("copy");
document.body.removeChild(dummy);


  
  copyIndicator.style.opacity = 1;
  setTimeout(function(){
    const copyIndicator = document.getElementById("copy-indicator");
    copyIndicator.style.opacity = 0;
  },3000);
}


</script>
</body>
</html>