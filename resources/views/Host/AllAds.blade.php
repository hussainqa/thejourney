@extends('layouts.Host')

@section('content')
<div class="row pt-3">
    @php
    $index = 1; // Initialize the index variable with 1
    @endphp

@for ($i=0;$i<=8;$i+=2)
    @if ($ADS[$i]==0)

    <div class="col-sm-6 col-md-4 col-lg-3 disabled-div text-center">
        <div class="card">
            @if ($ADS[$i+1]==null)
            <img src="\assets\thejourey.png" class="card-img-top" alt="Fissure in Sandstone"/>

                @else
            <img src="/storage/{{ $ADS[$i+1] }}" class="card-img-top" alt="Fissure in Sandstone"/>

                @endif
                <div class="card-body">

                    <h5 class="card-title">هذا الأعلان معطل</h5>
                    <p class="card-text">لا تمتلك الصلاحيات الكافية لتغيير هذا الاعلان لأمتلاك الصلاحيات الكافية يرجى التواصل مع مزود الخدمة</p>

              <a href="/DashboardHost/Ad/{{$index}}" class="btn btn-primary">تعديل</a>
            </div>
          </div>
    </div>

    @else
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card text-center">
            @if ($ADS[$i+1]==null)
            <img src="\assets\thejourey.png" class="card-img-top" alt="Fissure in Sandstone"/>
            @else
            <img src="/storage/{{ $ADS[$i+1] }}" class="card-img-top" alt="Fissure in Sandstone"/>
            @endif
                <div class="card-body">
                    <h5 class="card-title">هذا الاعلان فعال</h5>
                    <p class="card-text">تمتلك الصلاحيات الكافية لتغيير و تنزيل هذا الاعلان </p>
                  <a href="/DashboardHost/Ad/{{$index}}" class="btn btn-primary">تعديل</a>
            </div>
          </div>
    </div>

    @endif
    @php
    $index++; // Increment the index variable in each iteration
    @endphp

@endfor

</div>
@endsection
