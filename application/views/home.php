<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 100px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 18px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn:hover {
            background-color: #0056b3;
        }
        h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Employee Management System</h2>
        <div class="btn-container">
            <a href="<?php echo base_url('admin'); ?>" class="btn btn-primary">Admin</a>
            <a href="<?php echo base_url('employee'); ?>" class="btn btn-primary">Employee</a>
        </div>
    </div>

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
