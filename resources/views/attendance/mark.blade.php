<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
</head>
<body>
    <h1>Mark Student Attendance</h1>

    <form action="#" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" id="date" name="date"><br><br>

        @foreach($students as $student)
        <label for="status_{{ $student->id }}">{{ $student->student_name }}:</label>
        <select name="status_{{ $student->id }}" id="status_{{ $student->id }}">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Late">Late</option>
        </select><br><br>
        @endforeach

        <input type="submit" value="Submit Attendance">
    </form>
</body>
</html>