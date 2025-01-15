<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            margin-top: 20px;
        }
        .keypad button {
            padding: 20px;
            font-size: 24px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f7f7f7;
            cursor: pointer;
        }
        .keypad button:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="" required>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pin" class="form-label">PIN</label>
                                <input type="text" name="pin" id="pin" class="form-control" value="" required readonly>
                                @error('pin')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="keypad">
                                <button type="button" onclick="addToPin(1)">1</button>
                                <button type="button" onclick="addToPin(2)">2</button>
                                <button type="button" onclick="addToPin(3)">3</button>
                                <button type="button" onclick="addToPin(4)">4</button>
                                <button type="button" onclick="addToPin(5)">5</button>
                                <button type="button" onclick="addToPin(6)">6</button>
                                <button type="button" onclick="addToPin(7)">7</button>
                                <button type="button" onclick="addToPin(8)">8</button>
                                <button type="button" onclick="addToPin(9)">9</button>
                                <button type="button" onclick="addToPin(0)">0</button>
                                <button type="button" onclick="clearPin()">C</button>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Login</button>
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

    <script>
        function addToPin(number) {
            const pinField = document.getElementById('pin');
            pinField.value = pinField.value + number;
        }

        function clearPin() {
            const pinField = document.getElementById('pin');
            pinField.value = '';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
