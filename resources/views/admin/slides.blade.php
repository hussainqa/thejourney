@extends('layouts.admin1')
@section('content')
    <div class="container-fluid ps-0" id="left">
@if(count($slides))
<div class="mt-5 p-0 pb-5" style="background-color: #222222; min-height: 200px; direction:ltr !important" >
     
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
          <div class="carousel-inner">
            @foreach($slides as $slide)
            <div class="carousel-item">
              <div class="carousel-content" dir="ltr">
              <a href="/admin/editslide/{{$slide->id}}" id="edit-btn" class="text-dark bg-light btn btn-sm">
                    <i class="fas fa-edit" class="text-white"></i>
                    </a>
                <div class="row d-flex justify-content-center align-items-center p-0 mx-0 mt-5 mb-5 flex-wrap">
                    
                  <div class="col-sm-5 text-white p-3" >
                      <div class="mx-auto d-block position-relative" style="width:95%; ">
                      <img src="{{ asset('stars.png') }}" class="d-inline mb-2" width="55px" height="55px" alt="">
                      <h1 class="d-inline fs-1 ps-2 me-2" style="font-weight: 900;">{{$slide->title}}</h1>
                      <p class=""style="margin-right:68px;">{{$slide->subtitle}}</p>
                      <div class="yellow mb-1"></div>
                      <div class="white mb-1"></div>
                      <div class="yellow mb-1"></div>
                      @if($slide->title2)
                      <h4 class="mb-3">{{$slide->title2}}</h4>
                      @endif
                      <p style="color: #F6F6F6; font-weight: 300; text-align: justify; max-width: 468px;">
                        {{$slide->paragraph1}} 
                      </p>
                      @if($slide->title3)
                      <h4 class="mb-3">{{$slide->title3}}</h4>
                      @endif
                      @if($slide->paragraph2)
                      <p style="color: #F6F6F6; font-weight: 300; text-align: justify; max-width: 468px;">
                        {!! $slide->paragraph2 !!}  
                      </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-5 text-white p-3" >
                    <img src="{{ asset($slide->image) }}" class="img-fluid d-block mx-auto" style="width:100% !important; max-width: 400px !important;" alt="">
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <a class="carousel-control-prev " href="#myCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon tog" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next " href="#myCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon tog" style="color: #faad16 !important;" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
    </div>
    </div>

@endif
<form action="/admin/addslide" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    <h2 class="text-center text-white">إضافة سلايد</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="title" name="title" placeholder="العنوان الرئيسي">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="subtitle" name="subtitle" placeholder="عنوان ثانوي">
        </div>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="text" id="title2" name="title2" placeholder="عنوان ثاني">
    </div>
    <div class="mb-3">
        <textarea class="form-control" type="text" id="paragraph1" cols="30" rows="6" name="paragraph1" placeholder="تفاصيل"></textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="text" id="title3" name="title3" placeholder="عنوان ثالث">
    </div>
    <div class="mb-3">
        <textarea class="form-control" type="text" id="paragraph2" cols="30" rows="6" name="paragraph2" placeholder="تفاصيل"></textarea>
    </div>
    <div class="mb-3 ">
        <input class="form-control mt-4" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-smd btn-primary">إضافة</button>
</form>


</div>
<script>
    window.onload = function() {
      const slides = document.getElementsByClassName('carousel-item');
      slides[0].className +=" active";
    }
  </script>
@endsection