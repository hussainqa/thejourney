@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    @if($solution)
    <div class="cont mb-4">
        <div class="row mt-2 gap-5">
        
        <div class="mt-3 col-md">
      
        <h1 class="fw-bolder">{{$solution->title}}</h1>
        <p class="mb-2"> {{$serviceName}}</p>
        <div class="line"></div>
        <div class="mt-3">
          {!! $solution->text !!}
        </div>
        </div>
        <div class="col-md">
        <img src="{{ asset($solution->image) }}" alt="" class="img-fluid sol-img mt-3">
        </div>
        </div>

        <div class="row mt-5 gap-5">
          <div class="mt-3 col-md">
          @if($solution->title1)
          <h1 class="fw-bolder">{{$solution->title1}}</h1>
          @endif
          @if($solution->text1)
          <div class="mt-1">
            {!! $solution->text1 !!}
          </div>
          @endif
          </div>
          @if($solution->image1)
          <div class="col-md">
          <img src="{{ asset($solution->image1) }}" alt="" class="img-fluid sol-img">
          </div>
          @endif
          </div>

          <div class="row mt-5 gap-5">
        
            <div class="mt-3 col-md">
            @if($solution->title2)
            <h1 class="fw-bolder">{{$solution->title2}}</h1>
            <div class="line"></div>
            @endif
            @if($solution->text2)
            <div class="mt-3">
              {!! $solution->text2 !!}
            </div>
            @endif
            </div>
            @if($solution->image2)
            <div class="col-md">
            <img src="{{ asset($solution->image2) }}" alt="" class="img-fluid sol-img">
            </div>
            @endif
            </div>
    </div>
    @endif

  </div>
  @endsection