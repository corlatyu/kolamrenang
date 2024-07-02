<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Explore Indonesia - Wisata Indonesia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Google Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;

        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 600;
            color: #333333;
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 16px;
            font-weight: 500;
            color: #555555;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #007bff;
        }

                /* Style untuk memberikan jarak ke bawah pada section */
                .section-with-margin {
            margin-bottom: 50px; /* Sesuaikan dengan kebutuhan Anda */
            margin-top: 25px;
        }

                /* Media query untuk mode mobile */
                @media (max-width: 767px) {
            .section-with-margin {
                margin-bottom: 80px; /* Sesuaikan dengan kebutuhan Anda */
                margin-top: 50px;
            }
        }

        /* Style untuk mengatur gambar pada perangkat mobile */
@media (max-width: 768px) {
    .col-md-5 .carousel-inner {
        display: none; /* Sembunyikan gambar pada perangkat mobile */
    }
}
        /* Style untuk membuat gambar menjadi lingkaran */
        .carousel-item img {
            border-radius: 3%; /* Mengatur border-radius menjadi 50% untuk membuat gambar menjadi lingkaran */
            overflow: hidden; /* Mengatur overflow agar gambar tetap terlihat dalam bentuk lingkaran */
        }


        .carousel-inner img {
    max-width: 100%;
    height: auto;
    max-height: 500px; /* Sesuaikan dengan kebutuhan */
}

/* Style untuk mengatur ukuran dan posisi kolom */
.col-md-7 {
    max-width: 100%; /* Sesuaikan ukuran maksimum kolom */
    position: relative; /* Mengatur posisi relatif */
    left: 50px; /* Menggeser elemen ke kanan sejauh 30px */
}

/* Style untuk mengatur teks pada kolom */
.col-md-7 h1 {
    font-size: 3.5rem; /* Ukuran font untuk judul */
    font-weight: bold; /* Ketebalan font untuk judul */
    margin-bottom: 1rem; /* Jarak bawah untuk judul */
}

.col-md-7 p {
    font-size: 1.2rem; /* Ukuran font untuk paragraf */
    margin-bottom: 1.5rem; /* Jarak bawah untuk paragraf */
}

/* Style untuk mengatur tombol */
.col-md-7 .btn {
    font-size: 1.2rem; /* Ukuran font untuk tombol */
}

/* Style untuk mengatur ukuran dan posisi kolom pada perangkat mobile */
@media (max-width: 768px) {
    .col-md-7 {
        max-width: 100%; /* Sesuaikan ukuran maksimum kolom */
        position: static; /* Kembalikan posisi ke statis untuk tata letak alaminya */
        margin-top: 30px; /* Berikan margin atas untuk memberi jarak antara kolom dengan gambar */
    }

    /* Style untuk mengatur teks pada kolom pada perangkat mobile */
    .col-md-7 h1 {
        font-size: 2.5rem; /* Ukuran font untuk judul */
    }

    .col-md-7 p {
        font-size: 1rem; /* Ukuran font untuk paragraf */
    }

    /* Style untuk mengatur tombol pada perangkat mobile */
    .col-md-7 .btn {
        font-size: 1rem; /* Ukuran font untuk tombol */
    }
}

/* Style untuk mengatur ukuran dan posisi kolom pada perangkat tablet */
@media (min-width: 768px) and (max-width: 992px) {
    .col-md-7 {
        max-width: 100%; /* Sesuaikan ukuran maksimum kolom */
        position: static; /* Kembalikan posisi ke statis untuk tata letak alaminya */
        margin-top: 30px; /* Berikan margin atas untuk memberi jarak antara kolom dengan gambar */
    }

    /* Style untuk mengatur teks pada kolom pada perangkat tablet */
    .col-md-7 h1 {
        font-size: 3rem; /* Ukuran font untuk judul */
    }

    .col-md-7 p {
        font-size: 1.1rem; /* Ukuran font untuk paragraf */
    }

    /* Style untuk mengatur tombol pada perangkat tablet */
    .col-md-7 .btn {
        font-size: 1.1rem; /* Ukuran font untuk tombol */
    }
}

/* ////// */

/* Animasi untuk judul */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animasi untuk paragraf */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Animasi untuk tombol */
@keyframes bounceIn {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}



/* Warna teks saat hover */
.col-md-7 h1:hover {
    color: #007bff; /* Ubah warna teks menjadi biru saat hover */
}



/* ///// */

/* CSS untuk bagian informasi kontak yang lebih menarik */

.contact-info-section {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.contact-info-section h2 {
    font-size: 2.5rem;
    color: #333;
    text-align: center;
    margin-bottom: 40px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.contact-info-section p {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
}

.contact-info-section .row {
    margin-top: 30px;
}

.contact-info-section .col-md-6 {
    margin-bottom: 30px;
}

.contact-info-section h3 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
    text-transform: capitalize;
}

/* Style untuk ikon kontak */
.contact-info-section .fa {
    margin-right: 10px;
    font-size: 24px;
    color: #007bff; /* Ubah warna ikon sesuai keinginan */
}

/* Responsive styles */
@media (max-width: 768px) {
    .contact-info-section h2 {
        font-size: 2rem;
    }

    .contact-info-section h3 {
        font-size: 1.5rem;
    }
}

/* Style untuk form kontak */
.contact-info-section .form-group label {
    font-weight: bold;
}

.contact-info-section input[type="text"],
.contact-info-section input[type="email"],
.contact-info-section textarea {
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    width: 100%;
}

.contact-info-section textarea {
    resize: none;
}

.contact-info-section button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.contact-info-section button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Style untuk informasi kontak */
.contact-info-section .contact-details {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.contact-info-section .contact-details h3 {
    margin-top: 0;
}

.contact-info-section .contact-details ul {
    padding-left: 20px;
}

.contact-info-section .contact-details ul li {
    list-style: none;
    margin-bottom: 10px;
}

.contact-info-section .contact-details ul li i {
    margin-right: 10px;
    color: #007bff;
}

/* Tambahkan aturan CSS ini di dalam media query untuk tampilan mobile */
@media (max-width: 768px) {
    .row {
        display: flex;
        flex-direction: column; /* Mengatur arah susunan menjadi vertikal */
    }

    .col {
        width: 100%; /* Mengisi lebar kolom penuh */
    }

    .col.peding-100 {
        margin-bottom: 20px; /* Tambahkan margin bawah pada kolom formulir */
    }

    .col.peding-30 {
        margin-top: 20px; /* Tambahkan margin atas pada kolom informasi kontak */
    }
}


    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">SpwK Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#popular-destinations">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero d-flex align-items-center justify-content-center section-with-margin">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <!-- Carousel Wrapper -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/header.png') }}" class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/header2.png') }}" class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/header3.png') }}" class="d-block w-100" alt="Slide 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- End of Carousel Wrapper -->
                </div>
                <div class="col-md-7">
                    <h1 class="display-4 fw-bold mb-4">Tunggu Apalagi? Pesan Tiketmu Secara Online</h1>
                    <p class="lead">Nikmati pengalaman berenang yang menyegarkan dengan kemudahan memesan tiket secara online di kolam renang kami.</p>
                    <a href="#" class="btn btn-primary btn-lg">Explore Now</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="popular-destinations" class="popular-destinations my-5">
        <div class="container">
            <h2 class="text-center mb-5">Destinasi Wisata Kolam Renang</h2>
            <div class="row">
                @if (\App\Models\Product::all()->isEmpty())
                    <div class="col-md-12">
                        <p class="text-center">Tidak ada kolam renang yang tersedia.</p>
                    </div>
                @else
                    @foreach(\App\Models\Product::all() as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Placeholder image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->price }}</p>
                                </div>
                                <div class="card-footer">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
    
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel{{ $item->id }}">Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="view_nama_kolam">Nama Kolam:</label>
                                                    <input type="text" class="form-control" id="view_nama_kolam" name="view_nama_kolam" value="{{ $item->nama_kolam }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_desa">Desa:</label>
                                                    <input type="text" class="form-control" id="view_desa" name="view_desa" value="{{ $item->desa }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_status_kolam">Status Kolam:</label>
                                                    <input type="text" class="form-control" id="view_status_kolam" name="view_status_kolam" value="{{ $item->status_kolam }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_notlp_kolam">Nomor Telepon Kolam:</label>
                                                    <input type="tel" class="form-control" id="view_notlp_kolam" name="view_notlp_kolam" value="{{ $item->notlp_kolam }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_tiket_kolam">Tiket Kolam:</label>
                                                    <input type="text" class="form-control" id="view_tiket_kolam" name="view_tiket_kolam" value="{{ $item->tiket_kolam }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group text-center">
                                                    <label for="view_foto">Foto</label>
                                                    <img id="view_foto" src="{{ asset('images/' . $item->foto) }}" alt="Foto Kolam" class="rounded mx-auto d-block" style="width: 300px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_alamat_kolam">Alamat Kolam:</label>
                                            <input type="text" class="form-control" id="view_alamat_kolam" name="view_alamat_kolam" value="{{ $item->alamat_kolam }}" readonly>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_deskripsi_kolam">Deskripsi Kolam:</label>
                                            <textarea class="form-control" id="view_deskripsi_kolam" name="view_deskripsi_kolam" readonly>{{ $item->deskripsi_kolam }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_fasilitas_kolam">Fasilitas Kolam:</label>
                                            <textarea class="form-control" id="view_fasilitas_kolam" name="view_fasilitas_kolam" readonly>{{ $item->fasilitas_kolam }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    
    

    {{-- <section class="popular-destinations my-5">
        <div class="container">
            <h2 class="text-center mb-5">Destinasi Wisata Monumen Sejarah</h2>
            <div class="row">
                @if (\App\Models\MonumenSejarah::all()->isEmpty())
                    <div class="col-md-12">
                        <p class="text-center">Tidak ada monumen yang tersedia.</p>
                    </div>
                @else
                    @foreach(\App\Models\MonumenSejarah::take(3)->get() as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images_monumen/' . $item->foto) }}" class="card-img-top" alt="Placeholder image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_monumen }}</h5>
                                    <p class="card-text">{{ $item->deskripsi_monumen }}</p>
                                </div>
                                <div class="card-footer">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#monumenModal{{ $item->id_monumen }}">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
    
                        <!-- Modal -->
                        <div class="modal fade" id="monumenModal{{ $item->id_monumen }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id_monumen }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel{{ $item->id_monumen }}">Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="view_nama_monumen">Nama Monumen:</label>
                                                    <input type="text" class="form-control" id="view_nama_monumen" name="view_nama_monumen" value="{{ $item->nama_monumen }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_desa">Desa:</label>
                                                    <input type="text" class="form-control" id="view_desa" name="view_desa" value="{{ $item->desa }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_status_monumen">Status:</label>
                                                    <input type="text" class="form-control" id="view_status_monumen" name="view_status_monumen" value="{{ $item->status_monumen }}" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="view_tiket_monumen">Tiket:</label>
                                                    <input type="text" class="form-control" id="view_tiket_monumen" name="view_tiket_monumen" value="{{ $item->tiket_monumen }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group text-center">
                                                    <label for="view_foto">Foto</label>
                                                    <img id="view_foto" src="{{ asset('images_monumen/' . $item->foto) }}" alt="Foto Monumen" class="rounded mx-auto d-block" style="width: 300px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_alamat_monumen">Alamat:</label>
                                            <input type="text" class="form-control" id="view_alamat_monumen" name="view_alamat_monumen" value="{{ $item->alamat_monumen }}" readonly>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_deskripsi_monumen">Deskripsi:</label>
                                            <textarea class="form-control" id="view_deskripsi_monumen" name="view_deskripsi_monumen" readonly>{{ $item->deskripsi_monumen }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="view_fasilitas_monumen">Fasilitas:</label>
                                            <textarea class="form-control" id="view_fasilitas_monumen" name="view_fasilitas_monumen" readonly>{{ $item->fasilitas_monumen }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
     --}}
    <section id="kontak" class="contact-info-section py-5">
        <div class="container badan">
       
            <div class="row">
              <div class="col peding-100">
                <h1>Kontak Kami</h1>
                <p>
                  Silahkan tinggalkan pesan anda, pada kolom yang tersedia.
                </p>
                <ul class="list-unstyled">
                    <li>
                        <i class="fas fa-map-marker-alt"></i> Alamat: Jl. Kebraon No. 18, Kota Surabaya, Indonesia
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i> Telepon: +62 822-9333-1156
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i> Email: spwk@gmail.com.com
                    </li>
                </ul>
              </div>
       
              <div class="col peding-30">
                @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
                @endif
                <form method="post" action="{{ route('kontak.simpan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Anda:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail Anda:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan Anda:</label>
                        <textarea name="pesan" id="pesan" class="form-control @error('pesan') is-invalid @enderror"
                            cols="30" rows="7">{{ old('pesan') }}</textarea>
                        @error('pesan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input class="btn btn-primary" type="submit" value="POST">

                   

                </form>
              </div>
            </div>
       
          </div>
    </section>
    



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
  


  
</body>

</html>
