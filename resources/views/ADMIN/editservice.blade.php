@extends('layouts.admin')
@section('content')
<div class="container-fluid ps-0" id="left">
<form action="/admin/updateservice/{{$service->id}}" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    @method('PUT')
    <h2 class="text-center text-white">تعديل الخدمة</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="key" name="key" placeholder="كلمة مفتاحية" value="{{$service->key}}">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="title" name="title" placeholder="العنوان الرئيسي" value="{{$service->title}}">
        </div>
    </div>
    
    <div class="mb-3">
        <textarea class="form-control" type="text" id="description" cols="30" rows="6" name="description" placeholder="التفاصيل">{{$service->description}}</textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="file" id="imagePath" name="imagePath" placeholder="Choose an Image">
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
</form>


</div>
@endsection