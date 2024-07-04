<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link
      rel="icon"
      href="<?php echo base_url()?>assets/img/mjlogo.png"
      type="image/x-icon"
    />
    <!-- Add Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?office') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .content {
            position: relative;
            z-index: 1;
        }
        h2 {
            font-size: 48px;
            color: #fff;
            margin-bottom: 20px; /* Adjusted margin */
            letter-spacing: 1px;
            animation: fadeInDown 1s ease;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 40px; /* Increased top margin */
        }
        .btn {
            padding: 15px 30px;
            font-size: 18px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h2>Welcome to Employee Management System</h2>
            <div class="btn-container">
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-primary">Admin</a>
                <a href="<?php echo base_url('employee'); ?>" class="btn btn-primary">Employee</a>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap 5 JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        const offsetTop = targetElement.offsetTop;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
