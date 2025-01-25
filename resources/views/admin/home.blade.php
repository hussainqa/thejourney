@extends('layouts.admin1')

@section('content')
    <div class="container-fluid ps-0" id="left">

@if($content)
<div class="card border-0 rounded-0">
<div class=" d-flex justify-content-evenly align-items-center p-0  flex-wrap mb-4 mt-4">
      <div class=" mt-6" style="width: 350px;">
        <h1 class="fs-1 fw-bold ">{{$content->title}}</h1>
        <p>{{$content->text}}</p>
      </div>

      <img src="{{asset($content->image)}}" class="img-fluid mt-img " style="max-width: 400px !important;">

</div>
</div>
@endif
<form action="/admin/edithome" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    @method('PUT')
    <h2 class="text-center text-white">تعديل الصفحة الرئيسية</h2>

    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="mb-3">
        <input class="form-control mt-4" type="text" id="title" name="title" placeholder="Title" value="{{$content->title}}">
    </div>
    <div class="mb-3">
        <textarea class="form-control" type="text" id="text" cols="30" rows="6" name="text" placeholder="Text">{{$content->text}}</textarea>
    </div>
    
    <div class="mb-3 ">
        <input class="form-control mt-4" type="file" id="image" name="image" placeholder="Choose an Image">
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
</form>
 




<div class="customersCont pt-4 pb-4">
    <div class="customers h-100">
      @foreach($customers as $customer)
      <div id="customer" class="h-100">
      <form method="POST" action="{{route('deletecustomer',$customer->id)}}">
          @csrf
          <button type="submit" id="delete-btn" class="text-danger btn btn-sm">
            <i class="fas fa-trash" class="text-white"></i>
          </button>
      </form>
        <img src="{{ asset($customer->image) }}" class="img-fluid" alt="">
      </div>
      @endforeach
      <form method="POST" action="/admin/addcustomer" id="uploadForm" enctype="multipart/form-data">
          @csrf
          <button id="customButton" class="w-100 h-100 custom-button"><i class="fa-solid fa-plus" style="font-size:60px"></i></button>
          <input type="file" name="image" id="fileInput" style="display: none;">
      </form>
    </div>
  </div>

<script>
  const customButton = document.getElementById("customButton");
  const fileInput = document.getElementById("fileInput");
  const uploadForm = document.getElementById("uploadForm");

  customButton.addEventListener("click", function(event) {
    // Prevent the default button click behavior
    event.preventDefault();

    // Simulate a click on the hidden file input
    fileInput.click();
  });

  fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
      // Disable the button to prevent further clicks
      customButton.disabled = true;

      // Submit the form
      uploadForm.submit();
    }
  });
</script>

@endsection