@extends('layout.template')

@section('content')
    <section style="background: #1dc7cd">
        <div class="container py-3">
            <div id="novelCarousel" class="carousel slide" data-bs-ride="carousel"
                style="border: 5px solid #ff9900; border-radius: 10px; padding: 20px;">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/400x460" class="img-fluid rounded-start"
                                        alt="Perjodohan Bisnis">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-light">
                                        <h5 class="card-title">Perjodohan Bisnis</h5>
                                        <p class="card-text"><small class="text-muted">Nelly Nurul Awaliyah • 5958x
                                                Dibaca</small></p>
                                        <span class="badge bg-secondary">Bahasa Indonesia</span>
                                        <p class="mt-2 card-text">
                                            150 Bab <br>
                                            Zoya Amrani Sukma harus menikah dengan pria tampan yang dingin. Zoya adalah
                                            wanita
                                            karir yang mandiri dan memiliki perusahaan sendiri. Dia dijodohkan dengan Gio,
                                            pria
                                            tampan yang sulit untuk Zoya tebak. "Kita menikah hanya karena..."
                                        </p>
                                        <button class="btn btn-read">Baca Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/400x460" class="img-fluid rounded-start"
                                        alt="Judul Novel Lain">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-light">
                                        <h5 class="card-title">Judul Novel Lain</h5>
                                        <p class="card-text"><small class="text-muted">Penulis Lain • 3000x Dibaca</small>
                                        </p>
                                        <span class="badge bg-secondary">Bahasa Indonesia</span>
                                        <p class="mt-2 card-text">
                                            100 Bab <br>
                                            Kisah menarik tentang cinta dan perjuangan yang penuh dengan konflik emosional.
                                        </p>
                                        <button class="btn btn-read">Baca Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Navigasi Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#novelCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#novelCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="novel" class="py-5">
        <div class="container">
            <!-- Section Title -->
            <div class="mb-4 text-center">
                <h2 class="fw-bold">Novel Baru Update</h2>
            </div>

            <!-- Swiper -->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid"
                            alt="Rasa Selain Luka">
                        <h5 class="fw-bold">Rasa Selain Luka</h5>
                        <p class="mb-0 text-muted">by RATU SERINI</p>
                        <p class="text-danger">230x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Vampire Madam">
                        <h5 class="fw-bold">Vampire Madam</h5>
                        <p class="mb-0 text-muted">by Lady Akhelois</p>
                        <p class="text-danger">875x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid"
                            alt="Satu Malam Bersama Pak Bos">
                        <h5 class="fw-bold">Satu Malam Bersama Pak Bos</h5>
                        <p class="mb-0 text-muted">by Trias Wardani</p>
                        <p class="text-danger">2348x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Duda Pengganti">
                        <h5 class="fw-bold">Duda Pengganti</h5>
                        <p class="mb-0 text-muted">by NityShu</p>
                        <p class="text-danger">1412x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                    <div class="text-center swiper-slide">
                        <img src="https://via.placeholder.com/200x300" class="mb-3 rounded img-fluid" alt="Missing Love">
                        <h5 class="fw-bold">Missing Love</h5>
                        <p class="mb-0 text-muted">by Widia Alunski</p>
                        <p class="text-danger">1463x Dibaca</p>
                    </div>
                </div>
                <!-- Pagination -->
                {{-- <div class="mt-3 swiper-pagination"></div> --}}
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            speed: 600,
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });
    </script>
@endsection
