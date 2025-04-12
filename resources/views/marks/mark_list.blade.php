<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark List</title>
</head>
<body>
    <h1>Mark List</h1>

    <!-- Paparkan senarai markah dalam bentuk jadual -->
    <table border="1">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        @if ($student->marks)
                            {{ $student->marks->score }} <!-- Gantikan 'score' dengan nama medan markah dalam jadual markah -->
                        @else
                            No marks available
                        @endif
                    </td>
                    <td><a href="#">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
