<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance Status</title>
</head>
<body>
    <h1>View Attendance Status</h1>

    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Status</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['status'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>