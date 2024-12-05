<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function updatestatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive', // Validasi agar status sesuai dengan pilihan yang ada
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update status langsung dengan nilai yang diterima dari request
        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diubah.');
    }


    public function login()
    {
        return view("login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function profile()
    {
        $users = User::all();
        return view("profile", compact('users'));
    }

    public function index()
    {
        dd('ini halaman buku');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active please contact admin!');
                return redirect('/login');
            }
            if (Auth::user()->role_id == 1) {
                return redirect('dasboard');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }


    public function regis()
    {
        return view("regis");
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;

        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('status', 'success ');
        Session::flash('message', 'Register success , Wait admin for approval');
        return redirect('regis');
    }

    // public function addBook(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'id' => 'required',
    //         'judul' => 'required',
    //         'sinopsis' => 'required',
    //         'penulis' => 'required',
    //         'genre' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['msg' => $validator->errors()->toArray()]);
    //     } else {
    //         try {
    //             return response()->json(['success' => true, 'msg' => '']);
    //         } catch (\Exception $e) {
    //             return response()->json(['success' => false, 'msg' => $e->getMessage()]);
    //         }
    //     }
    // }

    public function insert_buku(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
        ]);

        $category = Category::all();
        $books = new Book;
        $books->book_code = $request->book_code;
        $books->judul = $request->judul;
        $books->sinopsis = $request->sinopsis;
        $books->penulis = $request->penulis;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('images', $imagename);
        $books->image = $imagename;

        $books->save();
        $books->categories()->sync($request->categories);

        return redirect('/data_buku')->with('success', 'Data buku berhasil ditambahkan');
    }

    public function delete_buku($id)
    {
        // Cari buku berdasarkan ID
        $books = Book::findOrFail($id);

        // Hapus relasi kategori di tabel pivot
        $books->categories()->detach();

        // Hapus buku
        $books->delete();

        return redirect()->back()->with('success', 'Data buku berhasil dihapus');
    }


    public function edit_buku(Request $request, $id)
    {
        $books = Book::find($id);
        $books->id = $request->id;
        $books->book_code = $request->book_code;
        $books->judul = $request->judul;
        $books->sinopsis = $request->sinopsis;
        $books->penulis = $request->penulis;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('images', $imagename);
        $books->image = $imagename;

        $books->categories()->sync($request->categories);

        $books->save();
        $books = Book::all();
        return redirect('data_buku')->with('success', 'Data buku berhasil diupdate');
    }

    public function ajax(Request $request)
    {
        $query = $request->get('judul'); // Mengambil input dari pencarian

        // Memodifikasi query untuk mencocokkan dengan judul, penulis, atau genre
        $results = DB::table('books')
            ->where('judul', 'like', '%' . $query . '%')
            ->orWhere('penulis', 'like', '%' . $query . '%')
            ->orWhere('genre', 'like', '%' . $query . '%')
            ->get();

        // Jika ada data, tampilkan sebagai baris tabel
        if ($results->count() > 0) {
            $output = '';
            foreach ($results as $book) {
                $output .= '
            <tr>
                <td>' . $book->id . '</td>
                <td>' . $book->book_code . '</td>
                <td>' . $book->judul . '</td>
                <td>' . $book->penulis . '</td>
                <td>' . $book->genre . '</td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                    <a href="' . url('/update', $book->id) . '">
                        <button type="button" class="btn btn-warning bg-warning">Edit</button>
                    </a>
                </td>
            </tr>';
            }
            return response($output); // Kembalikan hasil pencarian sebagai HTML
        } else {
            // Jika tidak ada data, tampilkan pesan 'Tidak ada data'
            return response('<tr><td colspan="6">Tidak ada data ditemukan</td></tr>');
        }
    }




    public function read()
    {
        $books = Book::all();  // Ambil semua data buku
        $output = '';
        foreach ($books as $book) {
            $output .= '
        <tr>
            <td>' . $book->id . '</td>
            <td>' . $book->book_code . '</td>
            <td>' . $book->judul . '</td>
            <td>' . $book->penulis . '</td>
            <td>' . $book->genre . '</td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                <a href="' . url('/update', $book->id) . '">
                    <button type="button" class="btn btn-warning bg-warning">Edit</button>
                </a>
            </td>
        </tr>';
        }
        return response($output);  // Kembalikan hasil sebagai HTML
    }
}
