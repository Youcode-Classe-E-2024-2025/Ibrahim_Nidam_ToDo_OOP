<?php require_once "header.php"; ?>
<style>
        .container.active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }
        .container.active .sign-in-container {
            transform: translateX(100%);
        }
        .container.active .overlay-container {
            transform: translateX(-100%);
        }
        .container.active .overlay {
            transform: translateX(50%);
        }
        .container.active .overlay-left {
            transform: translateX(0);
        }
        .container.active .overlay-right {
            transform: translateX(20%);
        }
    </style>
</head>
<body>
    <div class="font-['Montserrat'] bg-[#f6f5f7] flex justify-center items-center min-h-screen -mt-5 mb-[50px]">
        <div class="container bg-white rounded-[10px] shadow-[0_14px_28px_rgba(0,0,0,0.25)] relative overflow-hidden w-[768px] max-w-full min-h-[480px]" id="container">
            <div class="form-container sign-up-container absolute top-0 h-full transition-all duration-1000 ease-in-out left-0 w-1/2 opacity-0 z-[1]">
                <form method="POST" action="index.php?action=signUp" class="bg-white flex items-center justify-center flex-col px-[50px] h-full text-center">
                    <h1 class="font-bold m-0">Create Account</h1>
                    <div class="social-container my-5 mx-0">
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" name="name" placeholder="Name" class="bg-[#eee] border-none py-3 px-[15px] my-2 mx-0 w-full" />
                    <input type="email" name="email" placeholder="Email" class="bg-[#eee] border-none py-3 px-[15px] my-2 mx-0 w-full" />
                    <input type="password" name="password" placeholder="Password" class="bg-[#eee] border-none py-3 px-[15px] my-2 mx-0 w-full" />
                    <button class="rounded-[20px] border border-[rgb(96,150,186)] bg-[rgb(96,150,186)] text-white text-xs font-bold py-3 px-[45px] tracking-[1px] uppercase cursor-pointer">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container absolute top-0 h-full transition-all duration-1000 ease-in-out left-0 w-1/2 z-[2]">
                <form method="POST" action="index.php?action=login" class="bg-white flex items-center justify-center flex-col px-[50px] h-full text-center">
                    <h1 class="font-bold m-0">Sign in</h1>
                    <div class="social-container my-5 mx-0">
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social border border-[#DDDDDD] rounded-full inline-flex justify-center items-center m-[0_5px] h-[40px] w-[40px] no-underline text-[#333]"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" name="email" placeholder="Email" class="bg-[#eee] border-none py-3 px-[15px] my-2 mx-0 w-full" />
                    <input type="password" name="password" placeholder="Password" class="bg-[#eee] border-none py-3 px-[15px] my-2 mx-0 w-full" />
                    <a href="#" class="text-[#333] no-underline">Forgot your password?</a>
                    <button class="rounded-[20px] border border-[rgb(96,150,186)] bg-[rgb(96,150,186)] text-white text-xs font-bold py-3 px-[45px] tracking-[1px] uppercase cursor-pointer">Sign In</button>
                </form>
            </div>
            <div class="overlay-container absolute top-0 left-1/2 w-1/2 h-full overflow-hidden transition-transform duration-1000 ease-in-out z-[100]">
                <div class="overlay bg-[rgb(96,150,186,0.4)] bg-gradient-to-r from-[rgb(96,150,186)] to-[rgb(96,150,186,0.4)] text-white relative left-[-100%] h-full w-[200%] transform translate-x-0 transition-transform duration-1000 ease-in-out">
                    <div class="overlay-panel overlay-left absolute flex items-center justify-center flex-col px-10 text-center top-0 h-full w-1/2 transform -translate-x-[20%] transition-transform duration-1000 ease-in-out">
                        <h1 class="font-bold m-0">Welcome Back!</h1>
                        <p class="text-sm leading-5 tracking-[0.5px] my-5 mx-0">To keep connected with us please login with your personal info</p>
                        <button class="ghost rounded-[20px] border border-white bg-transparent text-white text-xs font-bold py-3 px-[45px] tracking-[1px] uppercase cursor-pointer" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right absolute right-0 flex items-center justify-center flex-col px-10 text-center top-0 h-full w-1/2 transform translate-x-0 transition-transform duration-1000 ease-in-out">
                        <h1 class="font-bold m-0">Hello, Friend!</h1>
                        <p class="text-sm leading-5 tracking-[0.5px] my-5 mx-0">Enter your personal details and start your journey with us</p>
                        <button class="ghost rounded-[20px] border border-white bg-transparent text-white text-xs font-bold py-3 px-[45px] tracking-[1px] uppercase cursor-pointer" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>

    

<?php require_once 'footer.php'; ?>
