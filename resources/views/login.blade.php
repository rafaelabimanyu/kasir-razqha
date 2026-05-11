<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Rumah Makan Padang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #7A1831 0%, #3a0915 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .login-container {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            padding: 45px 40px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        .logo-container {
            background-color: #7A1831;
            width: 85px;
            height: 85px;
            border-radius: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 8px 16px rgba(122, 24, 49, 0.25);
        }

        .logo-container svg {
            width: 45px;
            height: 45px;
        }

        h2 {
            color: #7A1831;
            font-size: 26px;
            font-weight: 700;
            margin: 0 0 8px 0;
            text-align: center;
        }

        p.subtitle {
            color: #6B7280;
            font-size: 15px;
            margin: 0 0 35px 0;
            text-align: center;
        }

        .form-group {
            width: 100%;
            margin-bottom: 22px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            text-align: left;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-wrapper svg {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            stroke: #9CA3AF;
            transition: stroke 0.2s;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px 14px 46px;
            border: 1px solid #D1D5DB;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            transition: all 0.2s;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            color: #111827;
        }

        .input-wrapper input::placeholder {
            color: #9CA3AF;
        }

        .input-wrapper:focus-within input {
            border-color: #7A1831;
            box-shadow: 0 0 0 3px rgba(122, 24, 49, 0.1);
        }

        .input-wrapper:focus-within svg {
            stroke: #7A1831;
        }

        .role-container {
            display: flex;
            background-color: #F3F4F6;
            border-radius: 12px;
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .role-btn {
            flex: 1;
            padding: 12px 0;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            background: transparent;
            color: #6B7280;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .role-btn.active {
            background-color: #7A1831;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #7A1831;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 10px rgba(122, 24, 49, 0.2);
            font-family: 'Inter', sans-serif;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #611025;
            box-shadow: 0 6px 14px rgba(122, 24, 49, 0.3);
            transform: translateY(-1px);
        }

        .submit-btn:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo-container">
        <!-- Modern minimalist Padang House Icon -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 14C4 14 7 11 12 11C17 11 20 14 20 14L20 20H4V14Z" fill="#E6C27A"/>
            <path d="M2 13C2 13 7 7 12 7C17 7 22 13 22 13" stroke="#E6C27A" stroke-width="2" stroke-linecap="round"/>
            <rect x="10" y="15" width="4" height="5" fill="#7A1831"/>
        </svg>
    </div>

    <h2>Rumah Makan Padang</h2>
    <p class="subtitle">Sistem Kasir Modern</p>

    <form action="/login" method="POST" style="width: 100%;">
        @csrf

        <div class="form-group">
            <label>Username</label>
            <div class="input-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
        </div>

        <div class="form-group">
            <label>Role</label>
            <div class="role-container">
                <button type="button" id="adminBtn" class="role-btn active">Administrator</button>
                <button type="button" id="kasirBtn" class="role-btn">Petugas Kasir</button>
            </div>
        </div>

        <input type="hidden" name="role" id="role" value="admin">

        <button type="submit" class="submit-btn">Masuk Sistem</button>
    </form>
</div>

<script>
    let roleInput = document.getElementById('role');
    let adminBtn = document.getElementById('adminBtn');
    let kasirBtn = document.getElementById('kasirBtn');

    adminBtn.onclick = () => {
        roleInput.value = 'admin';
        adminBtn.classList.add('active');
        kasirBtn.classList.remove('active');
    }

    kasirBtn.onclick = () => {
        roleInput.value = 'kasir';
        kasirBtn.classList.add('active');
        adminBtn.classList.remove('active');
    }
</script>

</body>
</html>