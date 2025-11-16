<!-- http://localhost/cems/lab03/register.html / http://localhost/cems/lab04/-->
 
 <?php
session_start();
// Initialize variables
$category = $name = $email = $phone = $password = '';
$events = [];
// Check if edit mode
if (isset($_GET['action']) && $_GET['action'] == 'edit' &&
 isset($_SESSION['registrations'])) {
 $record = $_SESSION['registrations'];
 // Populate variables except password
 $category = $record['category'];
 $name = $record['name'];
 $email = $record['email'];
 $phone = $record['phone'];
 $events = $record['events'];
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">
    //?v=<?= time(); ?> is used to force browser to load the latest CSS
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Campus Event Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- Hero Header -->
    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <img src="img/logo.jpg" class="logo" alt="CEMS Logo">
            <h1>Campus Event Management System</h1>
            <p>Organize, manage, and participate in campus events seamlessly</p>
        </div>
    </header>

    <!-- Navbar -->
    <?php 
    include("include/topNav.php")    ;
?>

    <!-- Main Content -->
    <main>
        <section class="register-section">
            <h3>Register</h3>
            <form action="register_action.php" method="post" name="registerForm">
            <!--"register_action.php tu untuk process value from the review form using the POST method"-->

                <fieldset>
                    <legend>Category</legend>
                    <label><input type="radio" name="category" value="staff" <?= ($category ===
'staff') ? 'checked' : '' ?> required> Staff</label>
                    <label><input type="radio" name="category" value="student"<?= ($category ===
'student') ? 'checked' : '' ?>> Student</label>
                    <label><input type="radio" name="category" value="public"<?= ($category ===
'public') ? 'checked' : '' ?>> Public</label>
                </fieldset>

                <div>
                    <label for="name">Full Name</label>
                    <br>
                    <input type="text" id="name" name="name" required autocomplete="name" placeholder="Ain Najma" value="<?= htmlspecialchars($name) ?>">
                </div>

                <div>  
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="you@example.edu" value="<?= htmlspecialchars($email) ?>">
                </div>

                <div>
                    <label for="phone">Phone</label><br>
                    <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+60 11-2624 7270 call me, urmila" value="<?= htmlspecialchars($phone) ?>">
                </div>

                <div>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required minlength="6" autocomplete="new-password" placeholder="Choose a password">
                </div>
                
                <div>
                    <label>Recommend event about:</label><br>
                    <input type="checkbox" name="event[]" value="workshop" <?=
in_array('workshop', $events) ? 'checked' : '' ?>> Workshop<br>
                    <input type="checkbox" name="event[]" value="seminar" <?=
in_array('seminar', $events) ? 'checked' : '' ?>> Seminar<br>
                    <input type="checkbox" name="event[]" value="competition" <?=
in_array('competition  ', $events) ? 'checked' : '' ?>> Competition<br>
                    <input type="checkbox" name="event[]" value="festival" <?=
in_array('festival', $events) ? 'checked' : '' ?>> Festival<br>
                    <input type="checkbox" name="event[]" value="sport" <?=
in_array('sport', $events) ? 'checked' : '' ?>> Sport<br>
                    <input type="checkbox" name="event[]" value="course" <?=
in_array('course', $events) ? 'checked' : '' ?>> Course<br>
                </div>
                
                <div style="text-align:center; margin-top: 16px;">
                    <button type="submit" class="btn">Register</button>
                    <button type="reset" class="btn secondary">Reset</button>
                </div>
            </form>
            <p id="output"></p>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Campus Event Management System | All Rights Reserved</p>
    </footer>

    <script>
  // Toggle mobile menu
  const menuIcon = document.getElementById('menu-icon');
  const navLinks = document.getElementById('nav-links');
  menuIcon.onclick = () => navLinks.classList.toggle('active');

  document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const output = document.getElementById("output");

    form.addEventListener("submit", function (e) {
      //e.preventDefault(); // Always prevent default first

      // Get input values
      const category = document.querySelector('input[name="category"]:checked');
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const phone = document.getElementById("phone").value.trim();
      const password = document.getElementById("password").value.trim();
      const checkboxes = document.querySelectorAll('input[name="event[]"]');
      let checkedEvents = [];

      //Validate at least one event selected
      for (const box of checkboxes) {
        if (box.checked) checkedEvents.push(box.value);
      }
      if (checkedEvents.length === 0) {
        output.style.color = "red";
        output.textContent = "Please select at least one recommended event.";
        return;
      }

      // Validate phone number (must be 10 digits and numeric)
      if (!/^\d{10}$/.test(phone)) {
        output.style.color = "red";
        output.textContent = "Phone number must be 10 digits and numeric only.";
        return;
      }

      // Validate password length (6–8 characters)
      if (password.length < 6 || password.length > 8) {
        output.style.color = "red";
        output.textContent = "Password must be between 6 and 8 characters.";
        return;
      }

      //If all good → Display all validated info
      output.style.color = "green";
      output.innerHTML = `
        <strong>Registration Successful!</strong><br><br>
        <b>Category:</b> ${category ? category.value : "N/A"}<br>
        <b>Name:</b> ${name}<br>
        <b>Email:</b> ${email}<br>
        <b>Phone:</b> ${phone}<br>
        <b>Events:</b> ${checkedEvents.join(", ")}<br>
      `;
    });
  });

    document.addEventListener("DOMContentLoaded", () => {
 const form = document.querySelector("form");
 form.addEventListener("submit", function (e) {
 const checkboxes = document.querySelectorAll('input[name="event[]"]');
 let checked = false;
 // Check if at least one checkbox is selected
 for (const box of checkboxes) {
 if (box.checked) {
 checked = true;
 break;
 }
 }
 if (!checked) {
 e.preventDefault(); // Stop form submission
 alert("Please select at least one recommended event.");
 const output = document.getElementById("output");
 output.style.color = "red";
 output.textContent = `Please select at least one recommended event.`;
 return;
 }
 });
 });
</script>

</body>
</html>




