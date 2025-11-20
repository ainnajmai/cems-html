<?php
session_start();

// Default form values
$category = $name = $email = $phone = $password = '';
$events = [];

// Populate form if in edit mode
if (isset($_GET['action']) && $_GET['action'] === 'edit' && !empty($_SESSION['registrations'])) {
    $record = $_SESSION['registrations'];
    $category = $record['category'] ?? '';
    $name = $record['name'] ?? '';
    $email = $record['email'] ?? '';
    $phone = $record['phone'] ?? '';
    $events = $record['events'] ?? [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">
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
    <?php include("include/topNav.php"); ?>

    <main>
        <section class="register-section">
            <h3>Register</h3>

            <!-- Show Edit link only if there is session data -->
            <?php if (!isset($_GET['action']) && !empty($_SESSION['registrations'])): ?>
                <a href="register.php?action=edit" class="edit-link">Edit?</a>
            <?php endif; ?>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'edit'): ?>
                <p style="text-align: center; color: #e075a8; font-weight: 600; margin-bottom: 16px;">
                    <i class="fas fa-edit"></i> Editing your registration
                </p>
            <?php endif; ?>

            <form action="register_action.php" method="post" name="registerForm">
                <fieldset>
                    <legend>Category</legend>
                    <label><input type="radio" name="category" value="staff" <?= ($category === 'staff') ? 'checked' : '' ?> required> Staff</label>
                    <label><input type="radio" name="category" value="student" <?= ($category === 'student') ? 'checked' : '' ?>> Student</label>
                    <label><input type="radio" name="category" value="public" <?= ($category === 'public') ? 'checked' : '' ?>> Public</label>
                </fieldset>

                <div>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required autocomplete="name" placeholder="Ain Najma" value="<?= htmlspecialchars($name) ?>">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="you@example.edu" value="<?= htmlspecialchars($email) ?>">
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="0112345678" value="<?= htmlspecialchars($phone) ?>">
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="6" maxlength="8" autocomplete="new-password" placeholder="Choose a password">
                </div>

                <div>
                    <label>Recommend event about:</label><br>
                    <?php
                    $allEvents = ['workshop','seminar','competition','festival','sport','course'];
                    foreach ($allEvents as $e):
                    ?>
                        <input type="checkbox" name="event[]" value="<?= $e ?>" <?= in_array($e, $events) ? 'checked' : '' ?>> <?= ucfirst($e) ?><br>
                    <?php endforeach; ?>
                </div>

                <div style="text-align:center; margin-top: 16px;">
                    <button type="submit" class="btn">Register</button>
                    <button type="reset" class="btn secondary">Reset</button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Campus Event Management System | All Rights Reserved</p>
    </footer>
</body>
</html>
