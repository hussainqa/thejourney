@extends('layouts.admin1')
@section('content')
<div class="container-fluid ps-0" id="left">
<form action="{{ route('updatesolution', ['service' => $solution->service_key, 'solution' => $solution->sub_key]) }}" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto bg-light" style=" max-width: 930px; border-radius: 0.375rem; border: solid 1px #ddd;">
    @csrf
    <h2 class="text-center text-dark">تعديل الحل</h2>
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
          <input type="text" class="form-control" name="sub_key" id="sub_key" placeholder="كلمة مفتاحية" value="{{$solution->sub_key}}">
        </div>
    </div>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="file" class="form-control" id="icon" name="icon">
      </div>
      <div class="col-sm">
        <input class="form-control" type="text" id="name" name="name" placeholder="اسم الحل" value="{{$solution->name}}">
      </div>
    </div>
    <h3 class="text-center text-dark">القسم الاول</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title" id="title" placeholder="العنوان الرئيسي" value="{{$solution->title}}">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image" name="image">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container" class="mb-4 bg-white">{!! $solution->text !!}</div>
        <input type="hidden" name="text" id="editor-content" >
    </div>
    <h3 class="text-center text-dark">القسم الثاني</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title1" id="title1" placeholder="عنوان اخر" value="{{$solution->title1}}">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image1" name="image1">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container1" class="mb-4 bg-white">{!! $solution->text1 !!}</div>
        <input type="hidden" name="text1" id="editor-content1">
    </div>
    <h3 class="text-center text-dark">القسم الثالث</h3>
    <div class="mb-3 row">
      <div class="col-sm mb-3">
        <input type="text" class="form-control" name="title2" id="title2" placeholder="عنوان اخر" value="{{$solution->title2}}">
      </div>
      <div class="col-sm">
      <input type="file" class="form-control" id="image2" name="image2">
      </div>
    </div>
    <div class="mb-3">
        <div id="editor-container2" class="mb-4 bg-white">{!! $solution->text2 !!}</div>
        <input type="hidden" name="text2" id="editor-content2" >
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
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
@endsection