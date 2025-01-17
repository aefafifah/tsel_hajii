
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<title>Login</title>
    <link href="BILLY FRONT END/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .pin-display {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .pin-display div {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            background-color: #eaeaea;
            border-radius: 50%;
            color: #333;
        }
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            justify-content: center;
            max-width: 300px;
            margin: auto;
        }
        .keypad button {
            width: 80px;
            height: 80px;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #6A11CB, #2575FC);
            border: none;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.1s ease;
        }
        .keypad button:active {
            transform: scale(0.95);
        }
        .btn-clear {
            background-color: #f44336 !important;
        }
    </style>
</head>
<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100 m-0">
                <div class="col-12 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Masukkan Email dan PIN</h1>
                            <p class="lead">Gunakan email dan PIN untuk login.</p>
                        </div>
                        <div class="card p-4">
                            <div class="card-body">
                                <form id="loginForm" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <!-- Email Input -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Anda" required>
                                    </div>
                                    <!-- PIN Display -->
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
                                    <!-- Keypad -->
                                    <div class="keypad mt-4">
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
                                        <button type="submit" class="btn btn-primary">OK</button>
                                    </div>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
            const pinLength = pin.length;
            for (let i = 1; i <= 6; i++) {
                const digitElement = document.getElementById(`digit${i}`);
                if (i <= pinLength) {
                    digitElement.textContent = "*";
                } else {
                    digitElement.textContent = "•";
                }
            }
            document.getElementById("hiddenPin").value = pin;
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            if (pin.length !== 4 && pin.length !== 6) {
                event.preventDefault();
                alert('PIN harus terdiri dari 4 atau 6 digit!');
            }
        });
    </script>
</body>
</html>
