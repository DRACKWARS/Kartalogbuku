@extends('layout.admin_template')

@section('admin_menu')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="p-3 text-center card info-card sales-card"
                            style="border: 1px solid #ddd; border-radius: 8px;">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill" style="font-size: 4rem; margin-right: 50px;"></i>
                                <div>
                                    <h6 style="margin: 0;">Users</h6>
                                    <h5 style="margin: 0;">{{ $users }}</h5>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="p-3 text-center card info-card sales-card"
                            style="border: 1px solid #ddd; border-radius: 8px;">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-bookmark-fill" style="font-size: 4rem; margin-right: 50px;"></i>
                                <div>
                                    <h6 style="margin: 0;">Books</h6>
                                    <h5 style="margin: 0;">{{ $books }}</h5>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="p-3 text-center card info-card sales-card"
                            style="border: 1px solid #ddd; border-radius: 8px;">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-task" style="font-size: 4rem; margin-right: 50px;"></i>
                                <div>
                                    <h6 style="margin: 0;">Category</h6>
                                    <h5 style="margin: 0;">{{ $category }}</h5>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
