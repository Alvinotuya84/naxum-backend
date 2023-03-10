
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
            <i class="mdi mdi-account-group"></i>
            </span> Accounts List
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