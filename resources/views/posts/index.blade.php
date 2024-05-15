<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyData</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background: lightgray">
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">HALAMAN ADMIN</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">GAMBAR</th>
                                    <th style="text-align: center" scope="col">NAMA</th>
                                    <th style="text-align: center" scope="col">JURUSAN</th>
                                    <th style="text-align: center" scope="col">NO. HP</th>
                                    <th style="text-align: center" scope="col">EMAIL</th>
                                    <th style="text-align: center" scope="col">ALAMAT</th>
                                    <th style="text-align: center" scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $post->name }}</td>
                                    <td>
                                        @if($post->jurusan == 'Rekayasa Perangkat Lunak')
                                            RPL
                                        @elseif($post->jurusan == 'Kuliner')
                                            KUL
                                        @elseif($post->jurusan == 'Teknik Pengelasan')
                                            TP
                                        @elseif($post->jurusan == 'Teknik Kontruksi Perumahan')
                                            TKP
                                        @elseif($post->jurusan == 'Akutansi Keuangan Lembaga')
                                            AKL
                                        @elseif($post->jurusan == 'Teknik Pendingin dan Tata Udara')
                                            TPTU
                                        @elseif($post->jurusan == 'Desain Pemodelan dan Informasi Bangunan')
                                            DPIB
                                        @endif
                                    </td>
                                    <td>{{ $post->nomer }}</td>
                                    <td>{{ $post->email }}</td>
                                    <td>{!! $post->alamat !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark mb-2">SHOW</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary mb-2">EDIT</a>
                                            <br>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Siswa belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
