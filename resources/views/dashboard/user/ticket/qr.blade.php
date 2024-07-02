@extends('layout.masteruser')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">QR Code Tiket</h6>
        </div>
        <div class="card-body">
            <div class="text-center mt-4 mb-4">
                {!! $qrcode !!}
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
