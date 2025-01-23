<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Checklist</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; 
            min-height: 100vh;
            padding-top: 50px; 
        }

        h1 {
            color: #01579b;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }

        p {
            color: #546e7a;
            font-size: 16px;
            margin-bottom: 30px;
            text-align: center;
            padding: 0 20px;
        }

        .sales-list {
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 0px;  
        }

        .sales-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            height: 40px;
            padding: 0 12px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .sales-item:hover {
            background-color: #f0f4c3;
            transform: translateY(-2px);
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #81c784;
            margin-right: 15px;
            cursor: pointer;
        }

        label {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            flex: 1;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #0288d1, #039be5);
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #0277bd, #0288d1);
            transform: translateY(-2px);
        }

        #result {
            width: 100%;
            max-width: 400px;
            margin-top: 25px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #checked-names {
            color: #01579b;
            font-weight: 600;
            font-size: 16px;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 24px;
            }

            button {
                font-size: 14px;
                padding: 10px 15px;
            }

            p {
                font-size: 14px;
            }

            .sales-item {
                padding: 10px 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Sales Checklist</h1>
    <p>Pilih nama sales yang sudah menyelesaikan tugasnya.</p>

    <div class="sales-list">
        <div class="sales-item">
            <input type="checkbox" id="sales1" value="Aef">
            <label for="sales1">Aef</label>
        </div>
        <div class="sales-item">
            <input type="checkbox" id="sales2" value="Billy">
            <label for="sales2">Billy</label>
        </div>
        <div class="sales-item">
            <input type="checkbox" id="sales3" value="Yuan">
            <label for="sales3">Yuan</label>
        </div>
        <div class="sales-item">
            <input type="checkbox" id="sales4" value="Nira">
            <label for="sales4">Nira</label>
        </div>
    </div>

    <button onclick="submitChecklist()">Submit Checklist</button>

    <div id="result" hidden>
        <h2>Checklist Result</h2>
        <p id="checked-names">Tidak ada sales yang dichecklist.</p>
    </div>

    <script>
        function submitChecklist() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const checkedNames = [];

            checkboxes.forEach(checkbox => {
                const label = checkbox.nextElementSibling;
                if (checkbox.checked) {
                    checkedNames.push(checkbox.value);
                    label.classList.add('completed');
                } else {
                    label.classList.remove('completed');
                }
            });

            const resultDiv = document.getElementById('result');
            const namesParagraph = document.getElementById('checked-names');

            if (checkedNames.length > 0) {
                namesParagraph.textContent = `Sales yang sudah dichecklist: ${checkedNames.join(', ')}`;
            } else {
                namesParagraph.textContent = 'Tidak ada sales yang dichecklist.';
            }

            resultDiv.hidden = false;
        }
    </script>
</body>
</html>
