@extends('layouts.admin1')
@section('content')
<div class="container-fluid ps-0" id="left">
<form action="{{route('updateslide', $slide->id)}}" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    @method('PUT')
    <h2 class="text-center text-white">تعديل السلايد</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="title" name="title" placeholder="العنوان الرئيسي" value="{{$slide->title}}">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="subtitle" name="subtitle" placeholder="عنوان ثانوي" value="{{$slide->subtitle}}">
        </div>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="text" id="title2" name="title2" placeholder="عنوان ثاني" value="{{$slide->title2}}">
    </div>
    <div class="mb-3">
        <textarea class="form-control" type="text" id="paragraph1" cols="30" rows="6" name="paragraph1" placeholder="تفاصيل">{{$slide->paragraph1}}</textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="text" id="title3" name="title3" placeholder="عنوان ثالث" value="{{$slide->title3}}">
    </div>
    <div class="mb-3">
    <textarea class="form-control" type="text" id="paragraph2" cols="30" rows="6" name="paragraph2" placeholder="تفاصيل">{{$slide->paragraph2}}</textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="file" id="image" name="image" placeholder="Choose an Image">
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
</form>
</div>

@endsection