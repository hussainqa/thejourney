@extends('layouts.admin1')
@section('content')
    <div class="container-fluid ps-0" id="left">

<form action="/admin/editabout" method="POST" enctype="multipart/form-data" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    @method('PUT')
    <h2 class="text-center text-white">تعديل المعلومات</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>

    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="title" name="title" placeholder="العنوان الرئيسي" value="{{$content->title}}">
        </div>
        <div class="col-sm ">
          <input class="form-control" type="file" id="image" name="image">
        </div>
    </div>
    <div class="mb-3">
        <div id="editor-container1" class="mb-4 bg-white">{!! $content->text1 !!}</div>
        <input type="hidden" name="text1" id="editor-content1">
    </div>
    <div class="mb-3">
        <div id="editor-container2" class="mb-4 bg-white">{!! $content->text2 !!}</div>
        <input type="hidden" name="text2" id="editor-content2">
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
</form>


</div>
<script>

var quill1 = new Quill('#editor-container1', {
    theme: 'snow'
});

var quill2 = new Quill('#editor-container2', {
    theme: 'snow'
});

document.querySelector('form').addEventListener('submit', function(event) {
    var editorContent1 = quill1.root.innerHTML;
    var editorContent2 = quill2.root.innerHTML;

    if (editorContent1.trim() === '' || editorContent1 === '<p><br></p>') {
        editorContent1 = '';
    }

    if (editorContent2.trim() === '' || editorContent2 === '<p><br></p>') {
        editorContent2 = '';
    }

    document.querySelector('#editor-content1').value = editorContent1;
    document.querySelector('#editor-content2').value = editorContent2;
});

</script>
@endsection