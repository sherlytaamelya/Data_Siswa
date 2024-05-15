<?php

namespace App\Http\Controllers;

// import model "post"
use App\Models\Post;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(): View
    {
        // Order posts by 'jurusan'
        $posts = Post::orderByRaw("CASE 
                        WHEN jurusan = 'Akutansi Keuangan Lembaga' THEN 1 
                        WHEN jurusan = 'Desain Pemodelan dan Informasi Bangunan' THEN 2
                        WHEN jurusan = 'Kuliner' THEN 3
                        WHEN jurusan = 'Rekayasa Perangkat Lunak' THEN 4
                        WHEN jurusan = 'Teknik Kontruksi Perumahan' THEN 5
                        WHEN jurusan = 'Teknik Pengelasan' THEN 6
                        WHEN jurusan = 'Teknik Pendingin dan Tata Udara' THEN 7
                        ELSE 8
                    END")->paginate(5);

        // Render view with posts
        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:1',
            'jurusan' => 'required|min:1',
            'nomer' => 'required|min:10|max:12|regex:/^[0-9+]*$/',
            'email' => 'required|email|min:5',
            'alamat' => 'required|min:5'
        ]);

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // Create post
        Post::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'jurusan' => $request->jurusan,
            'nomer' => $request->nomer,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        // Redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Render view with post
        return view('posts.show', compact('post'));
    }

    public function destroy($id): RedirectResponse
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Delete image
        Storage::delete('public/posts/' . $post->image);

        // Delete post
        $post->delete();

        // Redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function edit(string $id): View
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Render view with post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:1',
            'jurusan' => 'required|min:1',
            'nomer' => 'required|min:10|max:12|regex:/^[0-9+]*$/',
            'email' => 'required|email|min:5',
            'alamat' => 'required|min:5'
        ]);

        // Get post by ID
        $post = Post::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/posts', $image->hashName());

            // Delete old image 
            Storage::delete('public/posts/' . $post->image);

            // Update post with new image
            $post->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'jurusan' => $request->jurusan,
                'nomer' => $request->nomer,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);
        } else {
            // Update post without image
            $post->update([
                'name' => $request->name,
                'jurusan' => $request->jurusan,
                'nomer' => $request->nomer,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);
        }

        // Redirect to index
        return redirect()->route('posts.index')->with('success', 'Data Berhasil Diubah!');
    }
}
