<x-supvis.supvislayouts>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6a11cb, #2575FC);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #fff;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            background: linear-gradient(135deg, #6a11cb, #2575FC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            color: #eef6ff;
            font-size: 16px;
            margin-bottom: 30px;
            text-align: center;
            padding: 0 20px;
        }

        .sales-list {
            width: 90%;
            max-width: 450px;
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
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .sales-item:hover {
            background-color: #e0f5eb;
            transform: translateY(-2px);
        }

        input[type="checkbox"] {
            accent-color: #2575FC;
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
            background: linear-gradient(135deg, #6a11cb, #2575FC);
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
            background: linear-gradient(135deg, #541ea0, #1a63c7);
            transform: translateY(-2px);
        }

        #result {
            width: 90%;
            max-width: 450px;
            margin-top: 25px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #checked-names {
            color: #2575FC;
            font-weight: 600;
            font-size: 16px;
        }
    </style>

    <body>
        <h1>Sales Checklist</h1>
        <p>Pilih nama sales yang sudah setor</p>

        <div class="sales-list">
            @foreach ($sales as $salesperson)
                <div class="sales-item">
                    <input type="checkbox" id="sales{{ $loop->index }}" value="{{ $salesperson->id }}"
                        class="setoran-checkbox" data-sales-id="{{ $salesperson->id }}"
                        {{ $salesperson->is_setoran ? 'checked' : '' }}>
                    <label for="sales{{ $loop->index }}">{{ $salesperson->name }}</label>
                </div>
            @endforeach
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
                        checkedNames.push(label.textContent.trim());
                        label.classList.add('completed');
                    } else {
                        label.classList.remove('completed');
                    }
                });

                document.getElementById('checked-names').textContent = checkedNames.length > 0 
                    ? `Sales yang sudah dichecklist: ${checkedNames.join(', ')}` 
                    : 'Tidak ada sales yang dichecklist.';
                document.getElementById('result').hidden = false;
            }
        </script>
    </body>
</x-supvis.supvislayouts>