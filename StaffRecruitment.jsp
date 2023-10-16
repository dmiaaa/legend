<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>McDonald's Merlimau Staff Recruitment</title>
<link rel="stylesheet" type="text/css" href="mcd.css">
</head>
<body>
<img src="img/mcdd.png" width="300" height="200" class="center" >
<h1>Staff Recruitment</h1>
    <form action="Recruitment" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="id">Identification Number:</label>
        <input type="text" id="id" name="id" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="disease">Do you have any diseases?</label><br><br>
        <input type="radio" name="disease" value="no" required>No
        <input type="radio" name="disease" value="yes">Yes<br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>