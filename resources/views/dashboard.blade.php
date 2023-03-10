
@extends('layouts.app')
@section('content')

                <div class="page-header">

                    @if (session('success'))
    <div  id="alert-success" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
            <a href="{{route('users.index')}}" class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Accounts <i class="mdi mdi-account-group mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{App\Models\User::where('role',null)->get()->count()}}</h2>
                </a>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <a href="" class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Accounts Logged In  <i class="mdi mdi-account-check mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">95,5741</h2>
                    <h6 class="card-text">Percentage logins 5%</h6>
                </a>
                </div>
              </div>
            </div>
<div class="row">
</div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Accounts</h4>
                    <div class="table-responsive">
                        <div id="accounts" data-accounts="{{$accounts}}"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


@endsection