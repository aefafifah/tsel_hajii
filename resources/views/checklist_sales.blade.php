<x-layouts>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Checklist</title>
    <style>
        /* Base Styles */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4ff, #d9eaff);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #004aad;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 30px;
            text-align: center;
            padding: 0 20px;
        }

        .sales-list {
            width: 90%;
            max-width: 420px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .sales-item {
            margin: 15px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .sales-item:hover {
            background-color: #e8f4ff;
            transform: translateY(-2px);
        }

        input[type="checkbox"] {
            accent-color: #004aad;
            transform: scale(1.3);
            cursor: pointer;
        }

        label {
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            flex: 1;
            margin-left: 10px;
            color: #333;
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #004aad, #007bff);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #003b8b, #0056b3);
            transform: translateY(-2px);
        }

        #result {
            width: 90%;
            max-width: 420px;
            margin-top: 25px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #checked-names {
            color: #004aad;
            font-weight: 600;
            font-size: 16px;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 22px;
            }

            button {
                font-size: 14px;
                padding: 10px 15px;
            }

            p {
                font-size: 14px;
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
</x-layouts>