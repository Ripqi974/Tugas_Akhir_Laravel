<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Manajemen Mobil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header text-center bg-danger text-white">
                        <h4 class="fw-bold">Login Admin</h4>
                    </div>

                    <div class="card-body">

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.proses') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input 
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="{{ old('username') }}"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input 
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="form-check mb-3">
                                <input 
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                >
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <button 
                                type="submit"
                                class="btn btn-danger w-100"
                            >
                                Login
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>