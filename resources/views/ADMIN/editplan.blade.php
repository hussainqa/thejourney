@extends('layouts.admin')
@section('content')
    <div class="container-fluid ps-0" id="left">

    <form action="/admin/updateplan/{{$plan->id}}" method="POST" class="mt-5 p-5 w-100 mb-4 mx-auto" style="background-color: #222; max-width: 930px; border-radius: 0.375rem;">
    @csrf
    @method('put')
    <h2 class="text-center text-white">تعديل الخطة</h2>
    <div class="yellow mb-1 "></div>
    <div class="white mb-1"></div>
    <div class="yellow mb-5"></div>
    <div class="mb-3">
        <input class="form-control mt-4" type="text" id="name" name="name" placeholder="اسم الخطة" value="{{$plan->name}}">
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-sm">
            <input class="form-control mb-3" type="text" id="price" name="price" placeholder="سعر الخطة" value="{{$plan->price}}">
        </div>
        <div class="col-sm ">
            <input class="form-control" type="text" id="currency" name="currency" placeholder="العملة" value="{{$plan->currency}}">
        </div>
    </div>
    
    <div class="mb-3">
        <div id="editor-container" class="mb-4 bg-white">{!! $plan->features !!}</div>
        <input type="hidden" name="features" id="editor-content">
    </div>
    <button type="submit" class="btn btn-md btn-primary">تعديل</button>
</form>


</div>
<script>

    var quill = new Quill('#editor-container', {
        theme: 'snow'
    });

    document.querySelector('form').addEventListener('submit', function(event) {
        var editorContent = quill.root.innerHTML;
    
        if (editorContent.trim() === '' || editorContent === '<p><br></p>') {
            editorContent = '';
        }
    
        document.querySelector('#editor-content').value = editorContent;
    });
    
    </script>
@endsection