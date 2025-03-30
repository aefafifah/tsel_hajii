<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        body {
            background-color: #f9f9f9;
        }
        .main-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0.5rem;
        }
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 90%;
            overflow-y: fixed;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 100%;
            max-width: 400px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
            margin: 0 auto;
        }
        .title-section {
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .title-section h1 {
            font-size: calc(1.2rem + 0.6vw);
            margin-bottom: 0.25rem;
        }
        .pin-display {
            display: flex;
            justify-content: center;
            gap: min(1.5vw, 8px);
            margin: 0.5rem 0;
        }
        .pin-display div {
            width: min(40px, 10vw);
            height: min(40px, 10vw);
            font-size: min(18px, 5vw);
            line-height: min(40px, 10vw);
            background-color: #eaeaea;
            border-radius: 50%;
            color: #333;
        }
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: min(2vw, 10px);
            max-width: min(280px, 90vw);
            margin: 0.5rem auto;
        }
        .keypad button {
            width: min(60px, 20vw);
            height: min(60px, 20vw);
            font-size: min(20px, 6vw);
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, rgb(33, 226, 62), #2575FC);
            border: none;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 0;
        }
        .card-body {
            padding: min(1rem, 3vw);
        }
        .btn-clear {
            background: linear-gradient(135deg, #ff4b4b, #ff0000) !important;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="content-wrapper">
            <div class="logo-container">
                <img src="{{ asset('admin_asset/img/photos/icon_login.png') }}" alt="Logo Login">
            </div>
            <div class="title-section">
                <h1>Masukkan Email dan PIN</h1>
                <p>Gunakan email dan PIN untuk login.</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="loginForm" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Anda" required>
                        </div>
                        
                        <div class="text-center">
                            <label for="pin" class="form-label">PIN:</label>
                            <div class="pin-display">
                                <div id="digit1">•</div>
                                <div id="digit2">•</div>
                                <div id="digit3">•</div>
                                <div id="digit4">•</div>
                                <div id="digit5">•</div>
                                <div id="digit6">•</div>
                            </div>
                            <input type="hidden" name="pin" id="hiddenPin">
                        </div>

                        <div class="keypad">
                            <button type="button" onclick="addDigit(1)">1</button>
                            <button type="button" onclick="addDigit(2)">2</button>
                            <button type="button" onclick="addDigit(3)">3</button>
                            <button type="button" onclick="addDigit(4)">4</button>
                            <button type="button" onclick="addDigit(5)">5</button>
                            <button type="button" onclick="addDigit(6)">6</button>
                            <button type="button" onclick="addDigit(7)">7</button>
                            <button type="button" onclick="addDigit(8)">8</button>
                            <button type="button" onclick="addDigit(9)">9</button>
                            <button type="button" class="btn-clear" onclick="clearPin()">C</button>
                            <button type="button" onclick="addDigit(0)">0</button>
                            <button type="submit">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    let pin = "";

    function addDigit(digit) {
        if (pin.length < 6) {
            pin += digit;
            updateDisplay();
        }
    }

    function clearPin() {
        pin = "";
        updateDisplay();
    }

    function updateDisplay() {
        for (let i = 1; i <= 6; i++) {
            document.getElementById(`digit${i}`).textContent = i <= pin.length ? "*" : "•";
        }
        document.getElementById("hiddenPin").value = pin;
    }

</script>

</body>
</html>
