<!DOCTYPE html>
<html lang="en" > 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('dark.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
   <script src="{{ asset('bootstrap.bundle.min.js') }}"></script> 
  <link rel="stylesheet" href="{{asset('bootstrap-icons.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<style>
  body{
    color: #fff;
  }

  ::-webkit-scrollbar {
   width: 10px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
   
  border-radius: 5px;
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
  background: #aaa; 
  border-radius: 5px;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
  background: #888; 
  }


html,body,.container-fluid{
  background-color: transparent !important;
  height: 100vh;
}

#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background-color: rgba(0,0,0,0);
  backdrop-filter: blur(5px);
background-image: url('{{ asset("assets/Spinner-1s-214px.gif") }}') !important;
  z-index: 10000;
  background-size: 50px 50px;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
<body class="vh-100" dir="rtl">
<div class="container-fluid  p-0 d-flex justify-content-center vh-100 align-items-center bg-color" dir="rtl">
    <div class="d-block mx-auto " style="max-width: 500px;">
        <h2 class="cong">احصل على رمز الـWiFi المجاني لمدة 24 ساعة. </h2>
 
        <form action="{{ route('costumer-data-new') }}" id="my-form" method="POST">
          <label for="name" class="pri">الاسم الكامل</label>
          <input type="text" class="form-control d-block mx-auto mb-2 custom-input" name="CostumerName"  pattern="[\u0600-\u06FFA-Za-z]{3,}" required>
          <input type="hidden"  name="dark" value="0" >
          
          <label for="phoneNumber" class="pri">رقم الهاتف</label>
          <input type="phone" class="form-control d-block mx-auto mb-2 custom-input" name="CostumerNumber" id="phone" required dir="ltr">
          <div id="phone-error" class="text-danger"></div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input float-end ms-2 me-1 " style="margin-top: 7px;" dir="rtl" id="check">
    <a type="button" class="sec"   data-bs-toggle="popover" data-bs-placement="left"
            data-bs-custom-class="custom-popover"
            data-bs-title="الاحكام والشروط"
            data-bs-content="قد يتم استخدام هذه البيانات لأغراض الدعاية والإعلان وتحسين الاقتراحات المقدمة للزبائن وتزويدهم بأحدث العروض والخدمات.
            إدخال معلوماتكم يعني الموافقة على الشروط والاحكام
">
              الاحكام والشروط
            </a>
          <div id="check-error" class="text-danger"></div>
            
        </div>
                    <input type="text" hidden name="companyName" value="{{ request()->route('resturant') }}" >

          <input type="submit" value="احصل على الرمز" class="btn mb-2 w-100 text-white custom-btn" id="sub-btn">
        </form>
        </div>
    <div id="loader"></div>

  </div>
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

const phoneInput = document.getElementById('phone');
const phoneError = document.getElementById('phone-error');
const btn = document.getElementById('sub-btn');
const loader = document.getElementById("loader");
const acceptCheckbox = document.getElementById("check");
const checkError = document.getElementById('check-error');
btn.addEventListener('click', () => {
  const value = phoneInput.value.trim();
  if (/^(07|\+9647)\d{9}$/.test(value)) {
    phoneError.textContent = '';
    phoneInput.setCustomValidity('');
    
    
   
    if(acceptCheckbox.checked){
      checkError.textContent = '';
      acceptCheckbox.setCustomValidity('');
      loader.style.display= "block";
      btn.disabled = true;
    
      document.getElementById("my-form").submit();
    }else{
      acceptCheckbox.setCustomValidity('Unchecked');
    }
  } else {
    
    phoneInput.setCustomValidity('Invalid phone number');
  }
});

phoneInput.addEventListener('invalid', (event) => {
  event.preventDefault();
  phoneError.textContent = 'يرجى ادخال رقم هاتف صالح';
});

acceptCheckbox.addEventListener('invalid', (event) => {
  event.preventDefault();
  checkError.textContent = 'يرجى الموافقة على الاحكام والشروط';
});


  </script>
  

</body>
</html>