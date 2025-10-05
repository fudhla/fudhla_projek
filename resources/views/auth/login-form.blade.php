<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BinaDesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 25px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            border: none;
        }

        .card-header {
            text-align: center;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            padding: 1.5rem;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 2rem;
            background: #ffffff;
        }

        .form-control {
            border-radius: 15px;
            border: 1px solid #d1d9ff;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #4facfe;
            box-shadow: 0 0 8px rgba(79, 172, 254, 0.3);
            outline: none;
        }

        .btn-primary {
            background: #4facfe;
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #00f2fe;
            color: #fff;
        }

        .alert-danger {
            border-radius: 12px;
            background-color: #ffd6d6;
            color: #a80000;
            border: none;
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    Login BinaDesa
                </div>
                <div class="card-body">

                    {{-- Pesan Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Login --}}
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
