<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('styles_journey.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
     <script src="{{ asset('bootstrap.bundle.min.js') }}"></script> 
    <link rel="stylesheet" href="{{asset('bootstrap-icons.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
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
</style>
<body class="vh-100" dir="rtl">
  <div class="container-fluid  p-0 d-flex justify-content-center vh-100 align-items-center" dir="rtl">
    <div class="d-block mx-auto" style="max-width: 500px;">
        <h2 class="cong">احصل على رمز الـWiFi المجاني لمدة 24 ساعة. </h2>
        <form action="{{ route('costumer-data') }}" id="my-form" method="POST">
            <input type="text" hidden name="companyName" value="{{ request()->route('resturant') }}" >


          <label for="name" class="pri">الاسم الكامل</label>
          <input type="text" class="form-control d-block mx-auto mb-2 custom-input" name="CostumerName"  pattern="[\u0600-\u06FFA-Za-z\s]{3,}" required>
          <label for="phoneNumber" class="pri">رقم الهاتف</label>
          <input type="phone" class="form-control d-block mx-auto mb-2 custom-input" name="CostumerNumber" id="phone" required dir="ltr">
          <div id="phone-error" class="text-danger"></div>
          <div class="form-check mb-3">
            <a type="button" class="sec"       data-bs-toggle="popover" data-bs-placement="right"
            data-bs-custom-class="custom-popover"
            data-bs-title="الاحكام والشروط"
            data-bs-content="قد يتم استخدام هذه المعلومات لأغراض الدعاية و الأعلان و تزويدكم بعروضنا القادمة و الحصرية">
              الاحكام والشروط
            </a>
        </div>
          <button value="submit" id="submit-btn" class="btn mb-2 w-100 text-white custom-btn"> احصل على الرمز</button>
        </form>
        
    </div>
  </div>
  <script>

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

const phoneInput = document.getElementById('phone');
const phoneError = document.getElementById('phone-error');

phoneInput.addEventListener('input', () => {
  const value = phoneInput.value.trim();
  if (/^(07|\+9647)\d{9}$/.test(value)) {
    phoneError.textContent = '';
    phoneInput.setCustomValidity('');
  } else {

    phoneInput.setCustomValidity('Invalid phone number');
  }
});

phoneInput.addEventListener('invalid', (event) => {
  event.preventDefault();
  phoneError.textContent = 'يرجى ادخال رقم هاتف صالح';
});

  </script>
</body>
</html>