<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
    <title>Employee Screening System</title>
    <link rel="stylesheet" type="text/css" href="Fatma.css">
</head>
<body>
    
    <div class="container">
      <div class="text">
         Welcome to Fatma Cafe Employee Screening
      </div>
      <form action="EmployeeScreeningServlet" method="post">
         <div class="form-row">
            <div class="input-data">
               <input type="text" id="name" name="name" required>
               <div class="underline"></div>
               <label for="name">Name</label>
            </div>
            <div class="input-data">
               <input type="text" id="id" name="id" required>
               <div class="underline"></div>
               <label for="id">Identification Number</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="number" id="age" name="age" required>
               <div class="underline"></div>
               <label for="age">Age</label>
            </div>
            <div class="input-data">
               <input type="text" id="address" name="address" required>
               <div class="underline"></div>
               <label for="address">Address</label>
            </div>
         </div>
         
         <div class="form-row">
            <div class="input-data">
               <input type="text" id="phone" name="phone" required>
               <div class="underline"></div>
               <label for="phone">Phone Number</label>
            </div>
            <div class="input-data">
               <input type="text" id="nationality" name="nationality" required>
               <div class="underline"></div>
               <label for="nationality">Nationality</label>
            </div>
         </div>
         
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="submit">
               </div>
            </div>
      </form>
      </div>
  
</body>
</html>
