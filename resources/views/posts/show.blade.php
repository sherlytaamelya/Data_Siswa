<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IBUPEDIA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    .center-vertically {
        display: flex;
        align-items: center;
    }
    .text-section {
        padding-left: 20px;
    }
    .rounded-image {
        width: 250px;
        height: auto;
    }
</style>
</head>
<body style="background: linear-gradient(to right, #8a508f, #003f5c);">

<div class="container mt-5 mb-5">
    <div class="mt-4 p-5 text-white rounded" style="background: linear-gradient(to right, #003f5c, #8a508f);">
        <div class="row">
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/posts/'.$post->image) }}" class="rounded rounded-image">
            </div>
            <div class="col-md-7 center-vertically text-section">
                <div>
                    <h4 style="font-family: 'Satisfy', cursive; font-size: 50px;">{{ $post->name }}</h4>
                    <p class="mt-3" style="font-family: 'Kalam', cursive;">
                        <strong>Jurusan :</strong> {{ $post->jurusan }} <br>
                        <strong>No. HP :</strong> {{ $post->nomer }} <br>
                        <strong>Email :</strong> {{ $post->email }} <br>
                        <strong>Alamat :</strong> {!! nl2br(e($post->alamat)) !!}
                    </p>
                    <a href="/posts" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
