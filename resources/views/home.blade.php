@extends('layouts.master')
@section('page', 'Dashboard')
@section('content')
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                        <div class="col-auto mt-2">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pemasukan</h5>
                            <span
                                class="h2 font-weight-bold mb-0"><strong>Rp.{{ number_format($pemasukan) }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                        <div class="col-auto mt-2">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pengeluaran</h5>
                            <span
                                class="h2 font-weight-bold mb-0"><strong>Rp.{{ number_format($pengeluaran) }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

