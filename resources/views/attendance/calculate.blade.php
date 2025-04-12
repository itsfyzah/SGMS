<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Attendance Percentage</title>
</head>
<body>
    <h1>Calculate Attendance Percentage</h1>

    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Attendance</th>
            <th>%</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['attendance'] }}</td>
            <td>{{ $student['attendance'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>