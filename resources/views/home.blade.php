@extends('layouts.app')
@section('content')
  
  <div class="container-fluid p-0 mt-3">
    @if($content)
    <div class="row d-flex gap-5 justify-content-evenly align-items-center p-0 m-0 flex-wrap  mt-5">
      <div class=" mt-6" style="width: 350px;">
        <h1 class="fs-1 fw-bold ">{{$content->title}}</h1>
        <p>{{$content->text}}</p>
        <div class="d-flex gap-3">
          <a href="/pricing" class="btn btn-sm bg-yellow" style=" padding: 4px 24px; color: #222222;">Get Started</a>
          <a href="/contactus" class="btn btn-sm "
            style=" padding: 4px 24px; color: #222222; border: solid 1px #8E8E8E;">Contact Us</a>
        </div>
      </div>
      <img src="{{ asset($content->image) }}" class="img-fluid " style="max-width: 400px !important;">
    </div>
    @endif
    <div class="mt-5 p-0 pb-5" style="background-color: #222222; min-height: 200px;">
      <img src="wave.png" alt="" class="m-0 p-0 "
        style="width: 100% !important; object-fit:contain; transform: rotate(0deg); margin-top: -41px !important; min-height:90px !important;">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
          <div class="carousel-inner">
            @foreach($slides as $slide)
            <div class="carousel-item">
              <div class="carousel-content">
                <div class="row d-flex justify-content-center align-items-center p-0 mx-0 mt-5 mb-5 flex-wrap">
                  <div class="col-sm-5 text-white p-3" >
                    <div class="mx-auto d-block position-relative" style="width:95%; ">
                      <img src="stars.png" class="d-inline mb-2" width="55px" height="55px" alt="">
                      <h1 class="d-inline fs-1 ps-2 me-2" style="font-weight: 900;">{{$slide->title}}</h1>
                      <p class=""style="margin-right:68px;">{{$slide->subtitle}}</p>
                      <div class="yello mb-1"></div>
                      <div class="white mb-1"></div>
                      <div class="yello mb-1"></div>
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
                        {{$slide->paragraph2}}  
                      </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-5 text-white p-3" >
                    <img src="{{asset($slide->image)}}" class="img-fluid d-block mx-auto" style="width:100% !important; max-width: 400px !important;" alt="">
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
    <div class="row m-0 p-0">
      <div class="w-75 position-relative mx-auto">
        <h1 class="text-center fs-1 mt-5" style="font-weight: 900;" id="solutions">الحلول والخدمات</h1>
        <p class="position-absolute text-center"
          style="top:88px; font-size: 18px; font-weight: 300 !important; color: #222222; left: 50%; transform: translate(-50%);">
        <div class="black mt-2 w-75 mx-auto mb-1"></div>
        <div class="yellow w-75 mx-auto mb-1"></div>
        <div class="black w-75 mx-auto mb-1"></div>
      </div>
      <div class="cardsContainer mt-4 mb-4"
        style="max-width: 1000px !important;">
        @foreach($services as $service)
        
            
       
        <div class="card  h-100 solution-card">
          <div class="card-body ">
          <img src="{{ $service->imagePath }}" alt="" width="60px" class="d-block mx-auto mt-3">
          <h3 class="text-center fs-4 mt-2" style="color: #faae16;">{{$service->title}}</h3>
          <p class="text-center fs-6" style="color:#f3f3f3;">{{$service->description}}</p>
          </div>
          
          <div class="solutions p-4 d-none" id="solutions">
            @foreach($service['solutions'] as $solution)
            <a href="/services/{{$service->key}}/{{$solution['key']}}" class="solution p-2 fs-4"><img src="{{$solution['icon']}}" style="height: 40px; width: 40px;"> {{ $solution['name']}}</a>
            @endforeach
          </div>
          <div class="card-footer text-center p-4">
            <button class="btn btn-sm fs-6 bg-yellow w-100 learn" style=" color: #222; padding: 4px 40px;" >إعرف المزيد</button>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="card w-100 p-3 mt-4 tog mx-auto mb-4" style="max-width: 1000px;">
        <div class="mx-auto d-flex flex-wrap position-relative ">
          <img src="stars.png" class="d-inline mb-2" width="55px" height="55px" alt="">
          <h1 class="d-inline fs-1 ps-2 pe-2 text-white" style="font-weight: 900;">إنضم الى المشوار الآن!</h1>
          <img src="stars.png" class="d-inline mb-2" width="55px" height="55px" alt="">
          </div>

          <p class="mx-auto"
            style="top:38px; color: #F6F6F6; font-weight: 300 !important;">تميز عن الاخرين!</p>

          <div class="white mb-1 w-75 mx-auto mw-100"></div>
          <div class="yello mb-1 w-75 mx-auto mw-100"></div>
          <div class="white mb-1 w-75 mx-auto mw-100"></div>
        
        <div class="d-flex justify-content-center flex-wrap gap-5 mb-4 mt-4 position-relative w-100">
          <a href="/pricing" class="btn btn-sm fs-6 bg-yellow " style=" color: #222; padding: 4px 50px; width:178px;">إبدأ الآن</a>
          <a href="/contactus" class="btn btn-sm fs-6 "
            style=" color: #f1f1f1; padding: 4px 50px; border: solid 1px #f1f1f1; width:178px;">تواصل معنا</a>
        </div>

      </div>
    </div>
  </div>
  <div class="customersCont pt-4 pb-4">
    <div class="customers">
    @foreach($customers as $customer)
      <img src="{{$customer->image}}" class="img-fluid" alt="">
    @endforeach
    </div>
  </div>
 

  <script>

    window.onload = function() {
      const slides = document.getElementsByClassName('carousel-item');
      slides[0].className += " active";
    }
    
    const solutionCards = document.querySelectorAll('.solution-card');

solutionCards.forEach(card => {
    const learnBtn = card.querySelector('.learn');
    const solutions = card.querySelector('.solutions');

    learnBtn.addEventListener('click', function() {
        card.querySelector('.card-body').classList.add('d-none');
        card.querySelector('.card-footer').classList.add('d-none');
        solutions.classList.remove('d-none');
    });
});

</script>
@endsection