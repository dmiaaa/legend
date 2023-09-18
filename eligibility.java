
import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class eligibility extends HttpServlet {
	private static final long serialVersionUID = 1L;

	public eligibility() {
		super();
	}

	@Override
	public void init() throws ServletException {
		super.init();
		System.out.println("System is starting...");
	}

	@Override
	public void destroy() {
		System.out.println("The system is destroyed");
	}

	protected void service(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		response.getWriter().append("Served at: ").append(request.getContextPath());
		String age = request.getParameter("age");
		response.setContentType("text/html");

		PrintWriter out = response.getWriter();
		out.println("<link rel='stylesheet' type='text/css' href='style.css'>");
		out.println("<html><body>");
		out.print("<p>");
		if ("below".equals(age)) {
			out.println("You are not eligible to vote for the general election");
		} else if ("above".equals(age)) {
			out.println("You are eligible to vote for the general election");
		} else {
			out.println("Invalid age parameter");
		}

		out.println("</body></html>");
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {

		doGet(request, response);
	}

}
