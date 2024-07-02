@extends('layout.masteradmin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>

    <div class="row">

        <!-- Total ALL Penjualan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total ALL Penjualan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahorder }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Penjualan Online Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Penjualan online
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPenjualanOnlineDisetujui }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Penjualan Offline Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Penjualan Offline
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adminOrdersCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menunggu Konfirmasi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Menunggu Konfirmasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahorderkonfirmasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart dan Kalender -->
        <div class="col-lg-6 mb-4">

            <!-- Box untuk chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Status Penjualan Tiket</h6>
                </div>
                <div class="card-body">
                    <div id="chart">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Box untuk kalender -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kalender 2024</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="tanggal">Pilih Tanggal</label>
                        <input type="text" id="tanggal" name="tanggal" class="form-control">
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('#tanggal', {
            dateFormat: 'Y-m-d', // Format tanggal yang diinginkan
            defaultDate: 'today', // Menetapkan tanggal hari ini sebagai tanggal default
            // Opsi tambahan Flatpickr bisa ditambahkan di sini
        });
    });
</script>
@endsection
