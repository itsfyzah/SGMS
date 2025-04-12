<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Pass/Fail Status</title>
</head>
<body>
    <h1>Set Pass/Fail Status</h1>
    <form action="#" method="POST">
        @csrf
        <label for="student_name">Student Name:</label><br>
        <input type="text" id="student_name" name="student_name"><br><br>
        
        <label for="marks">Marks:</label><br>
        <input type="number" id="marks" name="marks"><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="pass">Pass</option>
            <option value="fail">Fail</option>
        </select><br><br>

        <input type="submit" value="Set Status">
    </form>
</body>
</html>