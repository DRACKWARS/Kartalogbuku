<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function showAllData()
    {
        $category = Category::all();
        $books = Book::all();
        return view('admin.data_buku', compact('books', 'category'));
    }

    public function index()
    {
        $users = User::count();
        $books = Book::count();
        $category = Category::count();
        return view('admin.dasboard', compact('users', 'books', 'category'));
    }

    public function user()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function delete_user($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function update_buku($id)
    {
        $category = Category::all();
        $books = Book::find($id);
        return view('admin.update_buku', compact('books', 'category'));
    }

    public function update_category($id)
    {
        $category = Category::find($id);
        return view('admin.update_category', compact('category'));
    }

    public function edit_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->id = $request->id;
        $category->name = $request->name;

        $category->save();
        $category = Category::all();
        return redirect('category')->with('success', 'category berhasil diupdate');
    }

    public function insert_category(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->id = $request->id;
        $category->name = $request->name;

        $category->save();
        return redirect('category')->with('success', 'category berhasil ditambahkan');
    }
}
