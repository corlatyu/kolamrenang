@extends('layout.masteruser')

@section('content')

        <h1 class="h3 mb-4 text-gray-800">User Dashboard</h1>

        <div class="row">

            <!-- Laporan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Pesanan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPesanan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
