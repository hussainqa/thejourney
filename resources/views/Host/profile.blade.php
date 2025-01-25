@extends('layouts.Host')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $Host->name }}</h5>
              <p class="text-muted mb-1">{{ $Company->name }} موظف في </p>
              {{-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
              <div class="d-flex justify-content-center mb-2">
                <a type="button" href="{{ route('password.change') }}" class="btn btn-primary">تغيير الرمز</a>
                                <a class="btn btn-outline-primary ms-1" href="https://wa.me/+9647741767775?text=%D9%8A%D9%88%D8%AC%D8%AF%20%D8%AE%D9%84%D9%84%20%D9%81%D9%8A%20%D9%86%D8%B8%D8%A7%D9%85%20%D8%A7%D9%84%D9%87%D9%88%D8%AA%D8%B3%D8%A8%D9%88%D8%AA%20{{ $Company->name }}">الدعم الفني</a>

              </div>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://www.thejourney-iq.com</p>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">@thejourney.iq</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">@thejourney.iq</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $Host->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $Host->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(+964) {{ $Host->phone_number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(+964) {{ $Host->phone_number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Company</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $Company->name }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

