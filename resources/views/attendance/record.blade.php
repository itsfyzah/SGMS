<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Attendance</title>
</head>
<body>
    <h1>Record Attendance</h1>
    
    <form action="#" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" id="date" name="date"><br><br>

        @foreach ($students as $student)
        <label for="status_{{ $student['name'] }}">{{ $student['name'] }}:</label>
        <select id="status_{{ $student['name'] }}" name="status_{{ $student['name'] }}">
            <option value="Present" {{ $student['status'] == 'Present' ? 'selected' : '' }}>Present</option>
            <option value="Absent" {{ $student['status'] == 'Absent' ? 'selected' : '' }}>Absent</option>
            <option value="Late" {{ $student['status'] == 'Late' ? 'selected' : '' }}>Late</option>
        </select><br><br>
        @endforeach

        <input type="submit" value="Submit">
    </form>
</body>
</html>