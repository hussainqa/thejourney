<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.adminhead')
</head>
<style>

body {
    background-color: #f1f1f1;
    padding-top: 65px;
}

 
 @media (min-width:980px){
    #left{
        padding-right:280px;
    }

 }

 @media (max-width:980px){
    
    .sidebar{
        display: none !important;
    }

    body>.container-fluid{
        padding:0 !important;
    }

 }
.sidebar{
    position:fixed;
    display: block;
    right: 0;
    top:62.5px !important;
    direction: rtl;
    height: 100% !important;
    border-left: 1px solid #ddd;
    width: 280px;
}

.sidebar-item{
    display: block;
    padding: 16px ;
    border-bottom: solid 1px #ddd;
    width: 100% !important;
    color: #222;
    text-decoration: none;
}

.sidebar-item:hover{
    background-color: #f1f1f1;
    color: #000;
}
.navbar{
    border-bottom: #ddd solid 1px;
}
.text-yellow{
    color: #faad16;
}
input,textarea, select{
    border: solid 2px #ddd !important;
    background-color: #f1f1f1 !important;
}
body,.navbar,.container-fluid{
    direction: rtl ;
}

.white {
    width: 100%;
    min-height: 3px;
    border-top: 5px solid #000;
  }

  .yellow {
    width: 100%;
    min-height: 3px;
    border-top: 4px solid #faad16;
  }
  .carousel-control-next{
    height: 50% !important;
    margin-top:auto;
    margin-bottom:auto;
  }
  
  h3{
    border-bottom:1px solid #ddd;
    margin-bottom: 10px;
    padding:10px;
  }
  #editor-container,#editor-container1,#editor-container2{
    min-height: 150px;
    direction: ltr !important;
  }
  .ql-editor,.ql-snow{
    direction: ltr !important;
  }

  .solutions{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  .solution{
    display: flex;
    border: #fff solid 1px;
    border-radius: 4px;
    min-height: 10px;
    color: #faad16;
    text-decoration: none;
    justify-content: space-evenly;
  }
  .solution:hover{
    opacity: 0.9;
    transition: 0.3s;
    color: #faad16 !important;
    background-color: #ffffff22 !important;
  }

  .cardsContainer::-webkit-scrollbar{
    display: none;
  }

  .cardsContainer{
    max-width: 1000px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: auto;
    padding: 0 !important;
 }
 
 
  @media (max-width:768px){
    .cardsContainer{
            scroll-snap-type:x mandatory;
            grid-auto-flow: column !important;
            grid-auto-columns: 300px !important;
            overflow-x: scroll !important;
            grid-template-columns: none;
            width: 95% !important;
        }
    .tog{
      display: none;
    }
  }

  .card {
    margin-right: 5px;
    margin-left: 5px;
    background-color: #222;
    flex-wrap: nowrap;
    max-width: 100%;
    min-height: 0px !important;
    height: auto !important;
    scroll-snap-align: center;

  }
</style>
<body >
  @include('includes.adminnavbar')

  @include('includes.adminsidebar')

  
<div class="container-fluid ps-0" id="left">

<div class="row m-0 p-0">
      <div class="w-75 position-relative mx-auto">
        <h1 class="text-center fs-1 mt-5" style="font-weight: 900;" id="solutions">الحلول الحالية</h1>
      </div>
      <div class="cardsContainer mt-4 mb-4"
        style="max-width: 1000px !important;">
        @foreach($services as $service)
        
            
       
        <div class="card  h-100 solution-card">
          <div class="solutions p-4" id="solutions">
          <h3 class="text-center mb-0" style="color:#faad16; border:none;">{{$service->title}}</h3>
            @foreach($service['solutions'] as $solution)
            <a href="/admin/editsolution/{{$service->key}}/{{$solution['key']}}" class="solution p-2 fs-4"><img src="{{asset($solution['icon'])}}" style="height: 40px; width: 40px;"> {{ $solution['name']}}</a>
            @endforeach
          </div>
        </div>
        @endforeach
        
      </div>
      
<form action="/admin/addsolution" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto bg-light" style=" max-width: 930px; border-radius: 0.375rem; border: solid 1px #ddd;">
    @csrf
    <h2 class="text-center text-dark">إضافة حل جديد</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
    <h3 class="text-dark text-center">معلومات الحل</h3>
        <div class="col-sm mb-3">
        <select class="form-select" name="service_key" id="service_key">
          @foreach($services as $service)
            <option>{{$service->key}}</option>
          @endforeach
        </select>
        </div>
        <div class="col-sm ">
          <input type="text" class="form-control" name="sub_key" id="sub_key" placeholder="كلمة مفتاحية">
        </div>
    </div>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="file" class="form-control" id="icon" name="icon">
      </div>
      <div class="col-sm">
        <input class="form-control" type="text" id="name" name="name" placeholder="اسم الحل">
      </div>
    </div>
    <h3 class="text-center text-dark">القسم الاول</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title" id="title" placeholder="العنوان الرئيسي">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image" name="image">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container" class="mb-4 bg-white"></div>
        <input type="hidden" name="text" id="editor-content" >
    </div>
    <h3 class="text-center text-dark">القسم الثاني</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title1" id="title1" placeholder="عنوان اخر">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image1" name="image1">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container1" class="mb-4 bg-white"></div>
        <input type="hidden" name="text1" id="editor-content1" >
    </div>
    <h3 class="text-center text-dark">القسم الثالث</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title2" id="title2" placeholder="عنوان اخر">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image2" name="image2">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container2" class="mb-4 bg-white"></div>
        <input type="hidden" name="text2" id="editor-content2" >
    </div>
    <button type="submit" class="btn btn-md btn-primary">إضافة</button>
</form>


<script>
  var quill = new Quill('#editor-container', {
    theme: 'snow'
});

var quill1 = new Quill('#editor-container1', {
    theme: 'snow'
});

var quill2 = new Quill('#editor-container2', {
    theme: 'snow'
});

document.querySelector('form').addEventListener('submit', function(event) {
    var editorContent = quill.root.innerHTML;
    var editorContent1 = quill1.root.innerHTML;
    var editorContent2 = quill2.root.innerHTML;

    if (editorContent.trim() === '' || editorContent === '<p><br></p>') {
        editorContent = '';
    }

    if (editorContent1.trim() === '' || editorContent1 === '<p><br></p>') {
        editorContent1 = '';
    }

    if (editorContent2.trim() === '' || editorContent2 === '<p><br></p>') {
        editorContent2 = '';
    }

    document.querySelector('#editor-content').value = editorContent;
    document.querySelector('#editor-content1').value = editorContent1;
    document.querySelector('#editor-content2').value = editorContent2;
});

</script>

</div>
</body>
</html>