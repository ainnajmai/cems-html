<?php
session_start();

// Get the data safely
$category = $_POST['category'] ?? '';
$name = htmlspecialchars($_POST['name'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$password = htmlspecialchars($_POST['password'] ?? '');
$events = $_POST['event'] ?? [];

// Store data in session for editing later
$_SESSION['registrations'] = [
    'category' => $category,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'events' => $events
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation | Campus Event Management System</title>
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

    <!-- Main Content -->
    <main>
        <section class="confirmation-section">
            <h2><i class="fas fa-check-circle"></i> Thank you for registering!</h2>
            
            <p><strong>Category:</strong> <?= ucfirst($category) ?></p>
            <p><strong>Name:</strong> <?= $name ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Phone:</strong> <?= $phone ?></p>
            
            <?php if (!empty($events)): ?>
                <p><strong>Interested Events:</strong></p>
                <ul>
                    <?php foreach ($events as $event): ?>
                        <li><?= htmlspecialchars(ucfirst($event)) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p><em>No event selected.</em></p>
            <?php endif; ?>

            <!-- Link to edit -->
            <a href="register.php?action=edit" class="edit-link">
                <i class="fas fa-edit"></i> Edit Registration
            </a>
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
        if (menuIcon && navLinks) {
            menuIcon.onclick = () => navLinks.classList.toggle('active');
        }
    </script>

</body>
</html>