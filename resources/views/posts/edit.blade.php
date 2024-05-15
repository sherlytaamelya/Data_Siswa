<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @if($post->image)
                                <img src="{{ asset('/storage/posts/'.$post->image) }}" class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                            <!-- error message for image -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $post->name) }}" placeholder="Masukkan Nama">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JURUSAN</label>
                            <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
                                <option value="">Pilih Jurusan</option>
                                <option value="Rekayasa Perangkat Lunak" {{ old('jurusan', $post->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                <option value="Kuliner" {{ old('jurusan', $post->jurusan) == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                                <option value="Desain Pemodelan dan Informasi Bangunan" {{ old('jurusan', $post->jurusan) == 'Desain Pemodelan dan Informasi Bangunan' ? 'selected' : '' }}>Desain Pemodelan dan Informasi Bangunan</option>
                                <option value="Teknik Pengelasan" {{ old('jurusan', $post->jurusan) == 'Teknik Pengelasan' ? 'selected' : '' }}>Teknik Pengelasan</option>
                                <option value="Teknik Kontruksi Perumahan" {{ old('jurusan', $post->jurusan) == 'Teknik Kontruksi Perumahan' ? 'selected' : '' }}>Teknik Kontruksi Perumahan</option>
                                <option value="Akutansi Keuangan Lembaga" {{ old('jurusan', $post->jurusan) == 'Akutansi Keuangan Lembaga' ? 'selected' : '' }}>Akutansi Keuangan Lembaga</option>
                                <option value="Teknik Pendingin dan Tata Udara" {{ old('jurusan', $post->jurusan) == 'Teknik Pendingin dan Tata Udara' ? 'selected' : '' }}>Teknik Pendingin dan Tata Udara</option>
                            </select>
                            @error('jurusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NO. HP</label>
                            <input type="text" class="form-control @error('nomer') is-invalid @enderror" name="nomer" value="{{ old('nomer', $post->nomer) }}" placeholder="Masukkan Nomor HP">
                            @error('nomer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">EMAIL</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $post->email) }}" placeholder="Masukkan Email">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ALAMAT</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $post->alamat) }}" placeholder="Masukkan Alamat">
                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
