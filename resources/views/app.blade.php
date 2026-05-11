<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RM Padang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f9f9f9;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 20px 60px;
            background: #8B0000;
            color: white;
        }

        .navbar nav a {
            margin-left: 30px;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        /* HERO */
        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('/images/bg.jpg') center/cover;
            display: flex;
            align-items: center;
            padding: 60px;
            color: white;
        }

        .hero h2 {
            font-size: 48px;
        }

        .hero p {
            margin: 15px 0;
        }

        .hero button {
            padding: 12px 25px;
            border: none;
            background: gold;
            font-weight: bold;
            cursor: pointer;
        }

        /* MENU */
        .menu {
            padding: 60px;
            text-align: center;
        }

        .menu h2 {
            margin-bottom: 30px;
        }

        .menu-list {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .card {
            width: 250px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            color: #8B0000;
            font-weight: bold;
            margin-bottom: 15px;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            text-align: center;
            background: #8B0000;
            color: white;
        }
    </style>
</head>
<body>

<header class="navbar">
    <h1>RM Padang</h1>
    <nav>
        <a href="#">Home</a>
        <a href="#">Menu</a>
        <a href="#">Kontak</a>
    </nav>
</header>

@yield('content')

<footer>
    © 2026 RM Padang
</footer>

</body>
</html>