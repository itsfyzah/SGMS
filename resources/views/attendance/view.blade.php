<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance Status</title>
</head>
<body>
    <h1>Attendance Status</h1>

    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Exam Name</th>
            <th>Status</th>
        </tr>
        @foreach($attendance as $record)
        <tr>
            <td>{{ $record->student->student_name }}</td>
            <td>{{ $record->exam->exam_name }}</td>
            <td>{{ $record->status }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>