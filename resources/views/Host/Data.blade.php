@extends('layouts.Host')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-md-8">
        <form method="POST" class="row g-3 align-items-end" action="{{ route('Data-Date') }}">
            @csrf
            <div class="col-md-4">
                <label class="form-label" for="start_date">Start Date:</label>
                <input type="date" value="{{ $start_date }}" id="start_date" name="start_date" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="end_date">End Date:</label>
                <input type="date" value="{{ $end_date }}" id="end_date" name="end_date" class="form-control">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-md-8">
        <form method="POST" action="{{ route('Data-Date-Download') }}">
            @csrf
            <input type="hidden" name="start_date" value="{{ $start_date }}">
            <input type="hidden" name="end_date" value="{{ $end_date }}">
            <button type="submit" class="btn btn-success">Download Data</button>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الأسم</th>
                        <th scope="col">الرقم</th>
                        <th scope="col">تاريخ الدخول</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach ($Data as $Client )
                    <tr>
                        <th scope="row">{{ $counter }}</th>
                        <td>{{ $Client->data_1 }}</td>
                        <td>{{ $Client->data_2 }}</td>
                        <td>{{ $Client->created_at }}</td>
                    </tr>
                    @php
                    $counter++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<script>
    $(document).ready(function() {
      // Initialize the date picker
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd', // The date format you want to display
        autoclose: true,      // Close the date picker when a date is selected
        todayHighlight: true  // Highlight the current date
      });
    });
    </script>
