@extends('layout.admin_template')

@section('admin_menu')
    <div class="container">
        <p class="container h1 text-primary">Update Buku</p>
        <div>
            <form action="{{ url('/edit_buku', $books->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container form-group">
                    <label>Kode Buku</label>
                    <input type="text" name="book_code" class="form-control" placeholder="Kode Buku" autocomplete="off"
                        value="{{ $books->book_code }}">
                </div>
                <div class="container form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="judul" autocomplete="off"
                        value="{{ $books->judul }}">
                </div>
                <div class="container form-group">
                    <label>Sinopsis</label>
                    <textarea type="text" name="sinopsis" class="form-control" autocomplete="off" value="{{ $books->sinopsis }}"></textarea>
                </div>
                <div class="container form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="penulis" autocomplete="off"
                        value="{{ $books->penulis }}">
                </div>
                <div class="container form-group">
                    <label>Imange</label>
                    <input type="file" name="image" class="form-control" id=""autocomplete="off">
                </div>
                <div class="container form-group">
                    <label>Current Imange</label><br>
                    <img style="max-height: 100%; max-width: 100px" src="{{ asset('images/' . $books->image) }}">
                </div>
                <div class="container form-group">
                    <label>Category</label>
                    <select name="categories[]" id="category-select" class="form-control select-multiple" multiple>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container form-group">
                    <label>Current Category</label>
                    <ul>
                        @foreach ($books->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="container mt-3">
                    <button type="submit" value="update" class="btn btn-success bg-success">Update</button></a>
                    <a href="/data_buku"><button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
