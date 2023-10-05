

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/EmployeeScreeningServlet")
public class EmployeeScreeningServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
    
    public EmployeeScreeningServlet() {
        super();
    }

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out = response.getWriter();
		out.println("<link rel='stylesheet' type='text/css' href='Fatma.css'>");
		
		String name = request.getParameter("name");
        String id = request.getParameter("id");
        int age = Integer.parseInt(request.getParameter("age"));
        String address = request.getParameter("address");
        String phone = request.getParameter("phone");
        String nationality = request.getParameter("nationality");
        
        response.setContentType("text/html");

        if (isValidInput(name, id, age, address, phone, nationality)) {
            if (age >= 15 && age <= 64) {
                response.getWriter().println("Congratulations, " + name + "! You are eligible to work at Fatma Cafe.");
            } else {
                response.getWriter().println("Sorry, " + name + ". You are not in the eligible age group (15-64) to work at Fatma Cafe.");
            }
        } else {
        	 // Display a JavaScript alert with an error message
            response.getWriter().println("<script>alert('Invalid input. Please provide valid information.')</script>");
            // Redirect back to the form page (you may want to adjust the URL)
            response.getWriter().println("<script>window.history.back();</script>");
        }
	}
	 private boolean isValidInput(String name, String id, int age, String address, String phone, String nationality) {
		// Check if any of the fields are empty
		    if (name.isEmpty() || id.isEmpty() || address.isEmpty() || phone.isEmpty() || nationality.isEmpty()) {
		        return false;
		    }
	
		    // Check if phone number is in a valid format (10 digits with optional dashes)
		    String phoneRegex = "^(\\d{10}|\\d{3}-\\d{3}-\\d{4}|\\d{3}\\.\\d{3}\\.\\d{4})$";
		    if (!phone.matches(phoneRegex)) {
		        return false;
		    }
		    
		    return true; // All input is valid
	    }

}
