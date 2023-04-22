@extends('layouts.admin')

@section('content')
<div class="card text-center">
    <h5 class="card-header"> لأضافة شركة جديدة</h5>

<form method="POST" action="{{ route('Add-Company') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="employee name" class="form-label">اسم الشركة</label>
      <input type="text" name="CompanyName" class="form-control " id="Group Name" aria-describedby="اسم الموظف">
      <div id="employeename" class="form-text">اسم الشركة باللغة العربية </div>
    </div>

    <div class="mb-3">
        <label for="employee name" class="form-label">company name</label>
        <input type="text" name="UrlName" class="form-control is-valid" oninput="validateInput()" id="validationServer01" value="resturant-1" >
        <div id="employeename" class="form-text">اسم الشركة باللغة الأنكليزية و بدون فواصل</div>
        <div class="valid-feedback">
            مثال لأسم المطعم
          </div>
        <div id="validationMessage" class="form-text invalid-feedback"></div>

      </div>


    <div class="mb-3">
        <label for="employee name" class="form-label">النوع</label><div class="dropdown card">
            <button class="form-select text-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                الأنواع
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($Types as $type )
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompanyType[]" value="{{ $type -> TypeName }}" id="{{ $type -> id }}">
                    <label class="form-check-label" for="{{ $type -> id }}">
                        {{ $type -> TypeName }}
                    </label>

                </div>
                @endforeach
            </ul>
        </div><div id="employeename" class="form-text">شركة ام مطعم ام فندق</div>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اللوكو</label>
        <input class="form-control" type="file" id="CompanyLogo" name="DocumentFile" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 1</label>
        <input class="form-control" type="file" id="CompanyAd1" name="DocumentAd1" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
      </div>  <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 2</label>
        <input class="form-control" type="file" id="CompanyAd2" name="DocumentAd2" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
      </div>  <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 3</label>
        <input class="form-control" type="file" id="CompanyAd3" name="DocumentAd3" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
      </div>

    <button type="submit" id="formButton" class="btn btn-primary" disabled>تأكيد</button>
  </form>
</div>

@endsection


<script>
    function validateInput() {
      const inputField = document.getElementById("validationServer01");
      const myButton = document.getElementById("formButton");

      const inputValue = inputField.value.trim(); // remove any leading or trailing spaces

      // check if input field is empty
      if (inputValue === "") {
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        myButton.setAttribute("disabled", "");
        displayValidationMessage("يرجى ادخال اسم للمطعم");
        return;
      }

      // check if input value contains spaces
      if (/\s/.test(inputValue)) {
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        myButton.setAttribute("disabled", "");
        displayValidationMessage("يرجى حذف الفواصل بين الأحرف");
        return;
      }

      // check if input value contains non-English letters or numbers
      if (/[^a-zA-Z0-9]/.test(inputValue)) {
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        myButton.setAttribute("disabled", "");
        displayValidationMessage("الأسم يجب ان يكون باللغة الأنكليزية");
        return;
      }

      // validation passed
      inputField.classList.remove("is-invalid");
      inputField.classList.add("is-valid");
      myButton.removeAttribute("disabled");
      displayValidationMessage("يمكنك المواصلة");
    }

    function displayValidationMessage(message) {
      const validationMessage = document.getElementById("validationMessage");
      validationMessage.textContent = message;
    }
    document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("searchForm");
  form.style.display = "none";
});
    </script>
