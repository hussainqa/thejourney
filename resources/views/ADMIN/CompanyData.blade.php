@extends('layouts.admin')
@section('content')
<table class="table" id="companiesTable">
    <thead>
        <tr>
            <th><a href="{{ route('exportData', ['id' => request()->route('id')]) }}" class="btn btn-info">تنزيل المعلومات</a></th>
        </tr>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم الشركة</th>
        <th scope="col">اسم المسخدم </th>
        <th scope="col">رقمه</th>
        <th scope="col">تاريخ التسجيل</th>




      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d )
      <tr>
        <th scope="row">{{ $d->id }}</th>
        <td id="companyname">{{ $company->name }}</td>
        <td id="data_1">{{ $d->data_1 }}</td>
        <td id="data_2">{{ $d->data_2 }}</td>
        <td id="data_1">{{ $d->created_at }}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
