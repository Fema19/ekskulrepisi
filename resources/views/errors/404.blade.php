<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #FF6363;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .error-container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            animation: fadeIn 0.5s ease-in;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }

        .error-message {
            font-size: 1.5rem;
            color: #343a40;
            margin-bottom: 2rem;
        }

        .error-description {
            color: #6c757d;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .back-button {
            background: linear-gradient(45deg, var(--primary-color), #ff7676);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(255, 99, 99, 0.2);
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 99, 99, 0.3);
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .error-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <i class="fas fa-compass error-icon"></i>
        <div class="error-code">404</div>
        <h1 class="error-message">Halaman Tidak Ditemukan</h1>
        <p class="error-description">
            Maaf, halaman yang Anda cari tidak dapat ditemukan.
            Mungkin halaman telah dipindahkan atau dihapus.
        </p>
        <a href="{{ url('/') }}" class="back-button">
            <i class="fas fa-home"></i>
            Kembali ke Beranda
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
