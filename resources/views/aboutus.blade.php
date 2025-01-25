@extends('layouts.app')
@section('content')
    <div class="container-fluid">
    <div class="cont mb-4">
        <div class="d-flex mt-5 justify-content-between flex-wrap">
        
        <div class="mt-3 main-text">
        <h1 class="fw-bolder">{{ $content->title }}</h1>
        <div class="line"></div>
        <div class="mt-3">
            {!! $content->text1 !!}
        </div>
        </div>
        <img src="{{ $content->image }}" alt="" class="d-block j-img">
        
        </div>
        <div class="mt-5 mx-auto">
            {!! $content->text2 !!}
      </div>
        <div class="d-flex gap-3">
            <a href="/pricing" class="btn btn-sm bg-yellow" style=" padding: 4px 24px; color: #222222; min-width:115px">أبدأ الآن</a>
            <a href="/contactus" class="btn btn-sm ms-3"
              style=" padding: 4px 24px; color: #222222; border: solid 1px #8E8E8E;">تواصل معنا</a>
  
          </div>
    </div>
  </div>
@endsection