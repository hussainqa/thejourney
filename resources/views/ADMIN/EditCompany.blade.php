@extends('layouts.admin')

@section('content')
<div class="card text-center">
    <h5 class="card-header"> لأضافة شركة جديدة</h5>

<form method="POST" action="{{ route('Edit-Company',request()->route('id')) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="employee name" class="form-label">اسم الشركة</label>
      <input type="text" name="CompanyName" class="form-control" id="Group Name" value="{{ $company->name }}" aria-describedby="اسم الموظف">
      <div id="employeename" class="form-text"></div>
    </div>
    <input type="text" name="CompanyType" hidden class="form-control" value="{{ $company->type }}" id="Group Name" aria-describedby="اسم الموظف">
    <input type="text" name="UrlName"hidden class="form-control is-valid" oninput="validateInput()" id="validationServer01" value="{{ $company->UrlName }}" >

      <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اللوكو</label>
        <input type="hidden" name="logo" value="{{ $company->logo }}">
        <input class="form-control" type="file" id="CompanyLogo" name="DocumentLogo" value="{{ $company->logo }}"  accept="image/png, image/PNG, image/jpg, image/jpeg"  >
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 1</label>
        <input type="hidden" name="ad1" value="{{ $company->ad_1 }}">
        <input class="form-control" type="file" id="CompanyAd1" value="{{ $company->ad_1 }}" name="DocumentAd1"  accept="image/png, image/PNG, image/jpg, image/jpeg"  >
      </div>  <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 2</label>
        <input type="hidden" name="ad2" value="{{ $company->ad_2 }}">
        <input class="form-control" type="file" id="CompanyAd2" name="DocumentAd2" value="{{ $company->ad_2 }}"  accept="image/png, image/PNG, image/jpg, image/jpeg"  >
      </div>  <div class="mb-3">
        <label for="formFile" class="form-label">رفع صورة اعلان 3</label>
        <input type="hidden" name="ad3" value="{{ $company->ad_3 }}">
        <input class="form-control" type="file" id="CompanyAd3" name="DocumentAd3" value="{{ $company->ad_2 }}"  accept="image/png, image/PNG, image/jpg, image/jpeg" >
      </div>

    <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
