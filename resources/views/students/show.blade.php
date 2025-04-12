<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <h1>Maklumat Pelajar</h1>
    <p><strong>Nama:</strong> {{ $student->name }}</p>
    <p><strong>Matric No:</strong> {{ $student->matric_no }}</p>
    <p><strong>Kelas:</strong> {{ $student->class }}</p>
    <p><strong>Jantina:</strong> {{ $student->gender }}</p>
    <p><strong>Admission Session:</strong> {{ $student->admission_session }}</p>
</body>
</html>
