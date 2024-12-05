@extends('layout.admin_template')

@section('admin_menu')
    <div class="container">
        <p class="container h1 text-primary">Update Category</p>
        <div>
            <form action="{{ url('/edit_category', $category->id) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="container form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Kode Buku" autocomplete="off"
                        value="{{ $category->name }}">
                </div>
                <div class="container mt-3">
                    <button type="submit" value="update" class="btn btn-success bg-success">Update</button></a>
                    <a href="/category"><button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
