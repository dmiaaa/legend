
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/Recruitment")
public class Recruitment extends HttpServlet {
	private static final long serialVersionUID = 1L;

	public Recruitment() {
		super();
	}

	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		response.setContentType("text/html;charset=UTF-8");

		// Get user inputs from the form
		String name = request.getParameter("name");
		String id = request.getParameter("id");
		int age = Integer.parseInt(request.getParameter("age"));
		String disease = request.getParameter("disease");

		// Check eligibility criteria
		boolean eligible = (age >= 18 && age <= 28) && "no".equals(disease);

		// Create the response message
		String message;
		if (eligible) {
			message = "Congratulations, " + name + "! You are eligible to become a new staff at McDonald's Merlimau.";
		} else {
			message = "Sorry, " + name + ". You are not eligible to become a new staff at McDonald's Merlimau.";
		}

		// Set the response header for Bahasa Malaysia
		response.setHeader("Accept-Language", "Bahasa Malaysia");

		// Generate the HTML response
		PrintWriter out = response.getWriter();
		out.println("<link rel='stylesheet' type='text/css' href='mcd.css'>");
		out.println("<img src=img/mcdd.png width=300 height=200 class=center >");
		out.println("<html><head><title>Recruitment Result</title></head><body>");
		out.println("<h1>Recruitment Result</h1>");
		out.println("<p>" + message + "</p>");
		out.println("</body></html>");
	}
}
