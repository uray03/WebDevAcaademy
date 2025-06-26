<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat</title>
    <style>
        body { text-align: center; font-family: Arial, sans-serif; padding: 50px; }
        h1 { font-size: 48px; margin-bottom: 10px; }
        p { font-size: 20px; margin: 5px 0; }
        .line { margin: 20px auto; width: 80%; border-top: 2px solid #000; }
    </style>
</head>
<body>
    <h1>SERTIFIKAT</h1>
    <p>Menyatakan bahwa</p>
    <h2>{{ $user->name }}</h2>
    <p>telah menyelesaikan kuis dengan skor</p>
    <h2>{{ $score }}%</h2>
    <div class="line"></div>
    <p>Tanggal: {{ $date }}</p>
</body>
</html>
