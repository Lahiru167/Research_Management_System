document
  .getElementById("loginForm")
  .addEventListener("submit", async (event) => {
    event.preventDefault(); // Prevent default form submission

    // Get input values
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Prepare the request payload
    const loginData = {
      username: username,
      password: password,
    };

    try {
      // Send a POST request to the Spring Boot backend
      const response = await fetch("http://localhost:8080/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(loginData),
      });

      if (response.ok) {
        // Parse the response
        const data = await response.json();

        // Handle success
        alert("Login successful!");
        console.log("Token:", data.token); // Example: JWT token
        // Redirect or save token if needed
      } else {
        // Handle errors
        const errorData = await response.json();
        alert(`Login failed: ${errorData.message}`);
      }
    } catch (error) {
      console.error("Error:", error);
      alert("An error occurred during login.");
    }
  });
