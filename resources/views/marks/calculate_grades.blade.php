<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Grades</title>
</head>
<body>
    <h1>Calculate Grades</h1>
    <!-- Example input form for grade calculation -->
    <form action="#" method="POST">
        @csrf
        <label for="marks">Enter Marks:</label><br>
        <input type="number" id="marks" name="marks"><br><br>

        <label for="grade">Grade:</label><br>
        <input type="text" id="grade" name="grade" disabled><br><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>