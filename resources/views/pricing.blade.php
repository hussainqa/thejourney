<!DOCTYPE html>
<html lang="en">
<head>
 @include('includes.head')
</head>
<style>
    body{
        background-color: #f1f1f1;
    }
    .form-switch .form-check-input:not(:checked){
        background-color: #fff !important;
    }
    .card-btn{
        color: #222;
        padding: 4px 40px;
        background-color: #faad16;
        font-weight: 300 !important;
        font-family: cairo;
        font-size: 14px;
    }

    .nav-item{
        margin-left: 15px;
    }

    .nav-item a{
        font-weight: 300;
        font-size: 14px;
        color: #222;
    }

    .nav-item a:focus{
        color:#000;
        font-weight: 500;
    }

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
    .card:hover{
        cursor: pointer;
    }
    .card-footer{
      background-color:transparent; 
      border: none;
    }
    .card-footer .btn:hover{
        background-color: #faad16 !important;
        color: #222;

    }
  
     .active{
        background-color: #222 !important;
        border: #faad16 solid 2px;
        color: #f1f1f1;
     }
     li{
        font-weight: 500; 
        font-size: 14px;
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
<body>

@include('includes.navbar')

      <div class="container-fluid">
        <div class="row mt-2">
            <h1 class="fs-1 text-center mt-2 fw-bold mb-1" style="font-weight: bolder; color: #222; font-family: poppins;">الخطط والاسعار</h1>
            <p class="text-center fs-6" style="color: #777D92;">إختر الخطة التي تناسب احتياجاتك!</p>
            <div class="d-flex justify-content-center gap-2">
                <p class="fs-6" style="font-weight: 300; color: #000;">سنوي</p> 
                <p style="font-weight: 300; color: #000; font-size: 10px; line-height: 300%;">20% تخفيض</p>

                <div class="form-check form-switch"><input class="form-check-input shadow-none border-0" style="background-color: #faad16;" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked ></div>
                <p class="fs-6" style="font-weight: 300; color: #000;">شهري</p>
            </div>
            <div class="cardsContainer" id="myDIV">
            @foreach($plans as $plan)
            @unless($plan->currency)
            <div class="card bg-white" >
            @endunless
            @if($plan->currency)
            <div class="card bg-light" >
            @endif
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
                <div class="card-footer text-center">
                    <a href="/contactus" class="btn btn-small card-btn mt-5 w-100 mb-4" > CHOOSE PLAN</a>
                </div>
            </div>
            @endforeach
        </div>

      </div>
</div>
@include('includes.footer')
 
</body>
<script>
    window.onload = function() {
      const slides = document.getElementsByClassName('card');
      slides[1].className += " active";
    }
var header = document.getElementById("myDIV");
var cards = header.getElementsByClassName("card");
for (var i = 0; i < cards.length; i++) {
  cards[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
</html>