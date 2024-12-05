@extends('layout.admin_template')

@section('admin_menu')

    <div class="pagetitle">
        <h1>Data buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dasboard">Dasboard</a></li>
                <li class="breadcrumb-item active">Data buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <div class="form-group d-inline-flex">
                    <label for="pencarian"></label>
                    <input type="text" id="input" class="form-control" placeholder="cari disini..">
                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
                <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add
                    New</button>
            </div>

            <div class="card-body">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Buku</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="bookTable">
                        @if (count($books) > 0)
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->penulis }}</td>
                                    <td>
                                        @foreach ($book->categories as $data)
                                            {{ $data->name }},
                                        @endforeach
                                    </td>
                                    <td>{{ $book->status }}</td>
                                    <td><img style="max-height: 100%; max-width: 100px" src="/images/{{ $book->image }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $book->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteModalLabel{{ $book->id }}">Delete
                                                            Buku</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus Buku ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ url('/delete_buku', $book->id) }}">
                                                            <button type="button" class="btn btn-primary">Hapus</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/update_buku', $book->id) }}">
                                            <button type="button" class="btn btn-warning bg-warning">Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/insert_buku') }}" method="post" enctype="multipart/form-data" id="addBookForm">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Kode Buku</label>
                                <input type="text" name="book_code" class="form-control" id=""autocomplete="off"
                                    required></input>
                            </div>
                            <div class="form-group">
                                <label for="">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" id=""autocomplete="off"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">Sinopsis</label>
                                <textarea type="text" name="sinopsis" class="form-control" id=""autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <input type="text" name="penulis" class="form-control"
                                    id=""autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="categories[]" id="category-select" class="form-control select-multiple"
                                    multiple>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"
                                    id=""autocomplete="off" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary addBtn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Saat pengguna mengetik di input pencarian
            $("#input").keyup(function() {
                var strcari = $("#input").val();
                if (strcari != "") {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('ajax') }}", // Endpoint pencarian
                        data: {
                            judul: strcari // Mengirim input pencarian ke backend
                        },
                        success: function(data) {
                            // Mengganti isi tabel dengan hasil pencarian
                            $('#bookTable').html(data);
                        }
                    });
                } else {
                    // Jika tidak ada input pencarian, muat ulang semua data buku
                    readData();
                }
            });

            // Fungsi untuk memuat semua data buku
            function readData() {
                $.ajax({
                    url: "{{ url('read') }}",
                    success: function(data) {
                        $('#bookTable').html(data);
                    }
                });
            }
        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            $('#addBookForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route('addBook') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.addBtn').prop('disabled', true);
                    },
                    complete: function() {
                        $('.addBtn').prop('disabled', false);
                    },
                    success: function(data) {
                        if (data.success == true) {
                            printSuccessMsg(data.msg);
                        } else if (data.success == false) {
                            printSuccessMsg(data.msg);
                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;

                function printValidationErrorMsg(msg) {
                    $.each(msg, function(file_name, error) {
                        console.log(file_name, error);
                        $(document).find('#' + file_name + '_error').text(error);
                    });
                }

                function printErrorMsg(msg) {
                    $('#alert-danger').html('');
                    $('#alert-danger').css('display', 'block');
                    $('#alert-danger').append('' + msg + '')
                }

                function printErrorMsg(msg) {
                    $('#alert-danger').html('');
                    $('#alert-danger').css('display', 'block');
                    $('#alert-danger').append('' + msg + '')
                    document.getElementById('addBookForm').reset();
                }
            });
        });
    </script> --}}

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).on('shown.bs.modal', '#addModal', function() {
            $('.select-multiple').select2({
                dropdownParent: $('#addModal') // pastikan dropdown muncul dalam modal
            });
        });
        $(document).ready(function() {
            $('.select-multiple').select2({
                dropdownParent: $('#addModal') // agar dropdown berada dalam konteks modal
            });
        });
        $(document).ready(function() {
            $('#category-select').select2({
                dropdownParent: $('#addModal')
            });
        });
    </script>

@endsection
