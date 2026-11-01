
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Patient Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f6fb;
            color: #212529;
        }

        .navbar-clinic {
            background: #15fc98;
        }

        .page-container {
            padding: 48px 18px;
        }

        .total-card, .content-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .total-card {
            width: 365px;
            max-width: 100%;
            padding: 24px;
        }

        .content-card {
            padding: 36px;
        }

        .btn-clinic {
            background: #02e381;
            color: white;
        }

        .btn-clinic:hover {
            background: #6bf9bb;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-clinic navbar-dark">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand fw-bold fs-3" href="{{ route('patients.index') }}">
                Clinic Patient Records
            </a>

            <div class="d-flex gap-3">
                <a href="{{ route('patients.index') }}" class="btn btn-outline-light">
                    Patient List
                </a>
                <a href="{{ route('patients.create') }}" class="btn btn-light">
                    + Register Patient
                </a>
            </div>
        </div>
    </nav>

    <main class="page-container">
        @yield('content')
    </main>
</body>
</html>
