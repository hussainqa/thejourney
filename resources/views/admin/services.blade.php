@extends('layouts.admin1')
@section('content')
    <div class="container-fluid ps-0" id="left">
@if(count($services))
        <h1 class="text-center mt-3">الخدمات الحالية</h1>
        <div class="cardsContainer">
@foreach($services as $service)

<div class="card p-4 h-100">
  <a href="/admin/editservice/{{$service->id}}" id="edit-btn" class="text-white  btn btn-sm">
    <i class="fas fa-edit" class="text-white"></i>
  </a>
  <form method="POST" action="{{route('deleteservice',$service->id)}}" style="max-height:30px; ">
    @csrf
    <button type="submit" id="delete-btn" class="text-danger btn btn-sm">
      <i class="fas fa-trash" class="text-white"></i>
    </button>
  </form>                   
  <img src="{{ asset($service->imagePath) }}" alt="" width="60px" class="d-block mx-auto mt-5">
  <h3 class="text-center fs-4 mt-2" style="color:#faad16; ">{{$service->title}}</h3>
  <p class="text-center fs-6" style="color:#f3f3f3;">{{$service->description}}</p>
</div>

@endforeach
</div>
@endif
<form action="/admin/addservice" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    <h2 class="text-center text-white">إضافة خدمة جديدة</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="key" name="key" placeholder="كلمة مفتاحية">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="title" name="title" placeholder="العنوان الرئيسي">
        </div>
    </div>
    
    <div class="mb-3">
        <textarea class="form-control" type="text" id="description" cols="30" rows="6" name="description" placeholder="التفاصيل"></textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="file" id="imagePath" name="imagePath" placeholder="Choose an Image">
    </div>
    <button type="submit" class="btn btn-md btn-primary">إضافة</button>
</form>


</div>

@endsection