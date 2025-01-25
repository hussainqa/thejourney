@extends('layouts.Host')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="assets\admin-panel.png" class="img-thumbnail img-fluid" alt="Admin Panel">
                <a href="{{ route('index-data') }}">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>

            <div class="card-body">
              <h5 class="card-title">معلومات الزبائن</h5>
              <p class="card-text">ادارة و عرض معلومات الزبائن و امكانية تنزيلها </p>
              <a href="{{ route('index-data') }}" class="btn btn-primary">اضغط هنا </a>
            </div>
          </div>

    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="assets\online-advertising.png" class="img-thumbnail img-fluid" alt="Admin Panel">
                <a href="{{ route('index-total-ads') }}">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>

            <div class="card-body">
              <h5 class="card-title">الأعلانات</h5>
              <p class="card-text"> ادارة و عرض الاعلانات داخل النظام و تغييرها   </p>
              <a href="{{ route('index-total-ads') }}" class="btn btn-primary">اضغط هنا </a>
            </div>
          </div>

    </div>

    </div>
      @endsection
