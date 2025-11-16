<!-- http://localhost/cems/lab04/ -->
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

    <?php include("include/topNav.php"); ?>

    <section>
        <h3>Event Listing</h3>

        <div class="filter-container">
            
                <tr>
                    <td>All</td>
                    <td>Filter 1</td>
                    <td>Filter 2</td>
                    <td>Filter 3</td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <table id="event_table" width="100%" border="1">
                <tr class="table-header">
                    <th>Festival</th>
                    <th>Sport</th>
                    <th>Workshop</th>
                </tr>
                <tr>
                    <td>Waterfall Hike<img src="img/event1.jpg" style="width:100%;"/></td>
                    <td>Jungle tracking<img src="img/event2.jpg" style="width:100%;"/></td>
                    <td>Makey makey boh<img src="img/event3.jpg" style="width:100%;"/></td>
                </tr>

                <tr>
                    <td>Kionsom Waterfall</td>
                    <td>KL Forest Eco Park</td>
                    <td>Melaka Heritage City</td>
                </tr>
                </table>
        </div>
    </section>

   

    <footer>
        <p>© 2025 Campus Event Management System | All Rights Reserved</p>
    </footer>

    <script>
        // Toggle mobile menu
        const menuIcon = document.getElementById('menu-icon');
        const navLinks = document.getElementById('nav-links');
        menuIcon.onclick = () => navLinks.classList.toggle('active');
    </script>
</body>
</html>
