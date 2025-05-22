<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Sakura falling animation */
        .sakura {
            position: fixed;
            pointer-events: none;
            z-index: 1;
        }

        .card {
            background-image: url('https://pbs.twimg.com/media/GHVrppMaoAATZFN.jpg:large');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
            transition: all 0.3s ease;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        .btn-primary {
            background-color: #2575fc;
            border: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .btn-primary:hover {
            background-color: #051677;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(5, 22, 119, 0.5);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            opacity: 0;
            transition: transform 0.6s, opacity 0.3s;
        }

        .btn-primary:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        .form-control-user {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control-user:focus {
            transform: translateY(-2px);
            border-color: #2575fc;
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.2);
        }

        .form-control-user::placeholder {
            color: #aaa;
            font-style: italic;
            transition: opacity 0.3s ease;
        }

        .form-control-user:focus::placeholder {
            opacity: 0.5;
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        /* Text animation for YOKOSO */
        .text-gradient {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #2575fc);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Form group animation */
        .form-group {
            transform: translateX(-20px);
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.2s;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .text-center h1 {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }


    </style>

    <div class="text-center">
        <script>
            const hour = new Date().getHours();
            const greeting = hour < 12 ? "Selamat Pagi" : hour < 18 ? "Selamat Siang" : "Selamat Malam";
            document.write(`<h1 class="h4 text-gray-900 mb-4">${greeting}</h1>`);
        </script>
    </div>

    <script>
        document.querySelector('.btn-primary').addEventListener('click', function () {
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            this.setAttribute('disabled', 'true');
        });
    </script>


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">YOKOSO</h1>
                                    </div>
                                    <form class="user" action="/sesi/login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email" value="{{Session::get('email')}}"
                                                placeholder="Masukan Alamat Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Masukan Password Anda" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">JOIN</button>


                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        // Sakura falling effect
        function createSakura() {
            const sakura = document.createElement('div');
            sakura.className = 'sakura';
            sakura.style.left = Math.random() * 100 + 'vw';
            sakura.style.animation = `fall ${Math.random() * 3 + 2}s linear forwards`;
            sakura.innerHTML = '🌸';
            document.body.appendChild(sakura);

            sakura.addEventListener('animationend', () => {
                sakura.remove();
            });
        }

        setInterval(createSakura, 300);

        // Floating particles effect
        function createParticles() {
            const particles = document.createElement('div');
            particles.className = 'particles';
            document.body.appendChild(particles);

            for(let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `float ${Math.random() * 3 + 2}s infinite`;
                particles.appendChild(particle);
            }
        }

        createParticles();

        // Add class for gradient text effect
        document.querySelector('.h4.text-gray-900').classList.add('text-gradient');

        // Input focus effects
        document.querySelectorAll('.form-control-user').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('input-focused');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('input-focused');
            });
        });

        // Button interaction enhancement
        document.querySelector('.btn-primary').addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });

        document.querySelector('.btn-primary').addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    </script>

    <style>
        @keyframes fall {
            from {
                transform: translateY(-10vh) rotate(0deg);
                opacity: 1;
            }
            to {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-20px) translateX(10px);
            }
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
        }

        .input-focused {
            transform: scale(1.02);
        }
    </style>
</body>

</html>
