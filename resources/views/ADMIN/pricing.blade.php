@extends('layouts.admin1')

@section('content')
<style>
    .card{
        border: #222 solid 1px;
        min-height: 0px !important;
        height: auto !important;
        max-width: 250px; 
        background-color: #f6f6f6; 
        min-width: 200px;
        margin-right: 5px;
        margin-left: 5px;
    }

    .card-body>ul{
        margin-top: 1.5rem !important;
     }
     .card-body>ul>li{
        margin-top: 0.5rem !important;
     }

     .cardsContainer{
        max-width: 1000px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin: auto;
        padding: 0 !important;
        margin-bottom: 40px;
     }
     @media (max-width:930px) {
        .cardsContainer{
            scroll-snap-type:x mandatory;
            grid-auto-flow: column !important;
            grid-auto-columns: 250px !important;
            overflow-x: scroll !important;
            grid-template-columns: none;
            width: 95% !important;
        }
     }

    .cardsContainer::-webkit-scrollbar{
        display: none;
    }
</style>
    <div class="container-fluid ps-0" id="left">
@if(count($plans))
        <h1 class="text-center mt-3">الخطط الحالية</h1>
        <div class="cardsContainer" id="myDIV">
            @foreach($plans as $plan)
            <div class="card bg-light" >
                <a href="/admin/editplan/{{$plan->id}}" id="edit-btn" class="text-dark  btn btn-sm">
                    <i class="fas fa-edit" class="text-white"></i>
                  </a>
                  <form method="POST" action="/admin/deleteplan/{{$plan->id}}" style="max-height:30px; ">
                    @csrf
                    <button type="submit" id="delete-btn" class="text-danger btn btn-sm">
                      <i class="fas fa-trash" class="text-white"></i>
                    </button>
                  </form>  
                <div class="card-body p-4" >
                    <h6 class="fs-5 text-center">{{$plan->name}}</h6>
                    <h3 class="fw-bold mt-3 text-center">{{$plan->price}}</h3>
                    @if($plan->currency)
                    <p class="text-center" style="font-size: 14px; font-weight: 300;">{{$plan->currency}}</p>
                    @endif
                     <div class="mt-4">
                        {!! $plan->features !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
@endif
<form action="/admin/addplan" method="POST" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;" id="form">
    @csrf
    <h2 class="text-center text-white">إضافة خطة جديدة</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>
    <div class="mb-3">
        <input class="form-control mt-4" type="text" id="name" name="name" placeholder="اسم الخطة">
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="price" name="price" placeholder="سعر الخطة">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="currency" name="currency" placeholder="العملة">
        </div>
    </div>
    
    <div class="mb-3">
        <div id="editor-container" class="mb-4 bg-white"></div>
        <input type="hidden" name="features" id="editor-content">
    </div>
    <button type="submit" class="btn btn-md btn-primary">إضافة</button>
</form>


</div>
<script>

    var quill = new Quill('#editor-container', {
        theme: 'snow'
    });

    document.querySelector('#form').addEventListener('submit', function(event) {
        var editorContent = quill.root.innerHTML;
    
        if (editorContent.trim() === '' || editorContent === '<p><br></p>') {
            editorContent = '';
        }
    
        document.querySelector('#editor-content').value = editorContent;
    });
    
    </script>
    
@endsection