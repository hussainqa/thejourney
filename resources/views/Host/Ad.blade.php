@extends('layouts.Host')

@section('content')

<div class=" d-flex justify-content-center flex-wrap gap-5 mb-4 mt-4 ">

        <div class="card text-center h-100 ">
            <img src="/storage/{{ $AD }}" class="card-img-top" style="max-height: 300px; object-fit: cover;" alt="Sunset Over the Sea"/>
            <div class="card-body">
                <p class="card-text">هذه الصورة هي الأعلان الحالي الذي يظهر لزبائنك في احد صفحات النظام </p>
            </div>
        </div>

    <!-- Use col-sm-12 for small screens (phones) -->
    <form method="POST" class="card h-100 text-center" action="{{ route('Edit-Host-Ad', ['id' => request()->route('id')]) }}" enctype="multipart/form-data">
        @csrf
        <div class="card-header">تعديل صورة الاعلان</div>
            <div class="card-body mt-5">
            <label for="formFileDisabled" class="form-label">ارفع هنا صورة اعلانك الجديدة </label>
            <input class="form-control mb-4" name="AdPhoto" type="file" accept="image/png, image/PNG, image/jpg, image/jpeg" id="formFileDisabled" />
            <button type="submit" class="btn btn-primary mt-4 w-100">تغيير</button>
        </div>
        <div class="card-footer" style="text-align: right;"><small> يرجى مراعاة قياسات صورة الاعلان  (9:16)</small></div>
        </form>
    </div>

    @endsection

