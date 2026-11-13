<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataCheck | Upload Dataset</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #0f172a;
        }

        .card {
            width: 100%;
            max-width: 560px;
            padding: 36px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .brand {
            color: #2563eb;
            font-size: 20px;
            font-weight: bold;
        }

        p {
            color: #64748b;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 24px 0 12px;
            font-weight: bold;
        }

        input[type="file"] {
            width: 100%;
            padding: 18px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .message {
            margin-top: 20px;
            padding: 14px;
            border-radius: 8px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .hint {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <main class="card">
        <div class="brand">DataCheck</div>

        <h1>Upload your dataset</h1>

        <p>
            Upload a CSV file to get started.
            Dataset quality analysis is coming next.
        </p>

        @if (session('success'))
            <div class="message success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('datasets.upload') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label for="dataset">Choose a CSV file</label>

            <input
                type="file"
                id="dataset"
                name="dataset"
                accept=".csv"
                required
            >

            <p class="hint">
                Supported format: CSV | Maximum size: 5 MB
            </p>

            <button type="submit">Upload Dataset</button>
        </form>
    </main>
</body>
</html>