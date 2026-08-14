<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Sign In - DukaPro</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    rel="stylesheet"
>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        font-family:
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            Roboto,
            Helvetica,
            Arial,
            sans-serif;
        background: #f8fafc;
    }


    /* =========================================
       MAIN LAYOUT
    ========================================= */

    .login-wrapper {
        min-height: 100vh;
        display: flex;
    }


    /* =========================================
       LEFT BRAND PANEL
    ========================================= */

    .brand-panel {

        width: 48%;
        min-height: 100vh;

        background:
            linear-gradient(
                145deg,
                #0d6efd 0%,
                #084298 100%
            );

        color: #fff;

        padding: 55px;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        position: relative;
        overflow: hidden;
    }


    .brand-panel::before {

        content: "";

        position: absolute;

        width: 420px;
        height: 420px;

        border:
            1px solid
            rgba(255,255,255,0.12);

        border-radius: 50%;

        top: -150px;
        right: -130px;
    }


    .brand-panel::after {

        content: "";

        position: absolute;

        width: 520px;
        height: 520px;

        border:
            1px solid
            rgba(255,255,255,0.08);

        border-radius: 50%;

        bottom: -280px;
        left: -200px;
    }


    .brand-content,
    .brand-footer {

        position: relative;
        z-index: 2;

    }


    /* =========================================
       LOGO
    ========================================= */

    .brand-logo {

        display: flex;
        align-items: center;

        gap: 12px;

        font-size: 25px;
        font-weight: 700;

        letter-spacing: -0.5px;
    }


    .brand-logo-icon {

        width: 44px;
        height: 44px;

        background:
            rgba(255,255,255,0.15);

        border:
            1px solid
            rgba(255,255,255,0.2);

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }


    /* =========================================
       BRAND CONTENT
    ========================================= */

    .brand-main {

        max-width: 520px;

        margin-top: auto;
        margin-bottom: auto;
    }


    .brand-main .eyebrow {

        display: inline-flex;
        align-items: center;

        gap: 8px;

        font-size: 13px;
        font-weight: 600;

        letter-spacing: 0.8px;

        text-transform: uppercase;

        color:
            rgba(255,255,255,0.75);

        margin-bottom: 18px;
    }


    .eyebrow-dot {

        width: 7px;
        height: 7px;

        background: #8ec5ff;

        border-radius: 50%;
    }


    .brand-main h1 {

        font-size:
            clamp(38px, 4vw, 58px);

        line-height: 1.05;

        font-weight: 700;

        letter-spacing: -2px;

        margin-bottom: 22px;
    }


    .brand-main p {

        font-size: 17px;

        line-height: 1.7;

        color:
            rgba(255,255,255,0.78);

        max-width: 480px;

        margin-bottom: 35px;
    }


    /* =========================================
       FEATURES
    ========================================= */

    .feature-list {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;
    }


    .feature-item {

        padding: 9px 14px;

        border-radius: 8px;

        background:
            rgba(255,255,255,0.1);

        border:
            1px solid
            rgba(255,255,255,0.12);

        font-size: 13px;

        color:
            rgba(255,255,255,0.88);
    }


    .feature-item i {

        margin-right: 6px;

    }


    .brand-footer {

        color:
            rgba(255,255,255,0.55);

        font-size: 12px;
    }


    /* =========================================
       RIGHT LOGIN PANEL
    ========================================= */

    .login-panel {

        width: 52%;

        min-height: 100vh;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 40px;

        background: #ffffff;
    }


    .login-container {

        width: 100%;

        max-width: 440px;
    }


    /* =========================================
       MOBILE LOGO
    ========================================= */

    .mobile-logo {

        display: none;
    }


    /* =========================================
       HEADING
    ========================================= */

    .login-heading {

        margin-bottom: 30px;
    }


    .login-heading h2 {

        font-size: 30px;

        font-weight: 700;

        color: #172033;

        letter-spacing: -0.8px;

        margin-bottom: 8px;
    }


    .login-heading p {

        color: #6b7280;

        margin: 0;

        font-size: 14px;
    }


    /* =========================================
       ALERT
    ========================================= */

    .login-alert {

        border: 0;

        border-radius: 10px;

        font-size: 14px;

        margin-bottom: 22px;
    }


    /* =========================================
       FORM
    ========================================= */

    .form-group {

        margin-bottom: 21px;
    }


    .form-label {

        font-size: 13px;

        font-weight: 600;

        color: #374151;

        margin-bottom: 8px;
    }


    /* =========================================
       ROLE SELECTION
    ========================================= */

    .role-card {

        min-height: 78px;

        border:
            1px solid #d9dee7;

        border-radius: 10px;

        padding: 12px;

        display: flex;

        align-items: center;

        gap: 11px;

        cursor: pointer;

        background: #fff;

        transition:
            all 0.2s ease;
    }


    .role-card:hover {

        border-color: #a9c7f5;

        background: #f8fbff;
    }


    .btn-check:checked + .role-card {

        border-color: #0d6efd;

        background: #f3f8ff;

        box-shadow:
            0 0 0 2px
            rgba(13,110,253,0.08);
    }


    .role-icon {

        width: 40px;
        height: 40px;

        min-width: 40px;

        border-radius: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 18px;
    }


    .admin-icon {

        background: #eaf2ff;

        color: #0d6efd;
    }


    .cashier-icon {

        background: #eaf8f0;

        color: #198754;
    }


    .role-info {

        min-width: 0;
    }


    .role-title {

        font-size: 13px;

        font-weight: 650;

        color: #172033;

        line-height: 1.3;
    }


    .role-description {

        font-size: 11px;

        color: #8a93a3;

        margin-top: 3px;
    }


    /* =========================================
       INPUTS
    ========================================= */

    .input-wrapper {

        position: relative;
    }


    .input-icon {

        position: absolute;

        left: 15px;

        top: 50%;

        transform:
            translateY(-50%);

        color: #9ca3af;

        font-size: 17px;

        pointer-events: none;
    }


    .form-control {

        height: 50px;

        border:
            1px solid #d9dee7;

        border-radius: 10px;

        padding-left: 45px;

        padding-right: 45px;

        font-size: 14px;

        color: #1f2937;

        box-shadow: none;

        transition:
            all 0.2s ease;
    }


    .form-control::placeholder {

        color: #adb5bd;
    }


    .form-control:focus {

        border-color: #0d6efd;

        box-shadow:
            0 0 0 3px
            rgba(13,110,253,0.10);
    }


    /* =========================================
       PASSWORD TOGGLE
    ========================================= */

    .password-toggle {

        position: absolute;

        right: 14px;

        top: 50%;

        transform:
            translateY(-50%);

        border: 0;

        background: transparent;

        color: #9ca3af;

        padding: 4px;

        cursor: pointer;
    }


    .password-toggle:hover {

        color: #495057;
    }


    /* =========================================
       OPTIONS
    ========================================= */

    .login-options {

        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-top: 5px;

        margin-bottom: 25px;
    }


    .remember-label {

        display: flex;

        align-items: center;

        gap: 8px;

        font-size: 13px;

        color: #6b7280;

        cursor: pointer;
    }


    .remember-label input {

        width: 15px;

        height: 15px;

        accent-color: #0d6efd;
    }


    .forgot-link {

        font-size: 13px;

        color: #0d6efd;

        text-decoration: none;

        font-weight: 500;
    }


    .forgot-link:hover {

        text-decoration: underline;
    }


    /* =========================================
       LOGIN BUTTON
    ========================================= */

    .login-button {

        height: 51px;

        width: 100%;

        border: 0;

        border-radius: 10px;

        background: #0d6efd;

        color: #fff;

        font-size: 14px;

        font-weight: 600;

        transition:
            all 0.2s ease;

        box-shadow:
            0 5px 15px
            rgba(13,110,253,0.18);
    }


    .login-button:hover {

        background: #0b5ed7;

        transform:
            translateY(-1px);

        box-shadow:
            0 7px 18px
            rgba(13,110,253,0.22);
    }


    .login-button:active {

        transform:
            translateY(0);
    }


    /* =========================================
       SECURITY NOTE
    ========================================= */

    .security-note {

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 7px;

        margin-top: 25px;

        color: #9ca3af;

        font-size: 12px;
    }


    .security-note i {

        font-size: 14px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 991px) {

        .brand-panel {

            width: 42%;

            padding: 35px;
        }


        .login-panel {

            width: 58%;

            padding: 30px;
        }


        .brand-main h1 {

            font-size: 40px;
        }

    }


    @media (max-width: 767px) {

        .login-wrapper {

            display: block;
        }


        .brand-panel {

            display: none;
        }


        .login-panel {

            width: 100%;

            min-height: 100vh;

            padding: 25px;
        }


        .mobile-logo {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            font-size: 22px;

            font-weight: 700;

            color: #172033;

            margin-bottom: 45px;
        }


        .mobile-logo-icon {

            width: 38px;

            height: 38px;

            border-radius: 10px;

            background: #0d6efd;

            color: #fff;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .login-container {

            max-width: 440px;
        }


        .login-heading h2 {

            font-size: 27px;
        }


        .role-card {

            min-height: 72px;

            padding: 10px;
        }


        .role-title {

            font-size: 12px;
        }

    }

</style>
```

</head>

<body>

<div class="login-wrapper">

```
<!-- =========================================
     LEFT BRAND PANEL
========================================== -->

<div class="brand-panel">


    <div class="brand-content">

        <div class="brand-logo">

            <div class="brand-logo-icon">

                <i class="bi bi-grid-1x2-fill"></i>

            </div>

            <span>DukaPro</span>

        </div>

    </div>


    <div class="brand-main">


        <div class="eyebrow">

            <span class="eyebrow-dot"></span>

            Business Management Platform

        </div>


        <h1>

            Run your business

            <br>

            with confidence.

        </h1>


        <p>

            Manage products, inventory, purchases,
            sales and your point of sale from one
            centralized platform.

        </p>


        <div class="feature-list">


            <div class="feature-item">

                <i class="bi bi-box-seam"></i>

                Inventory

            </div>


            <div class="feature-item">

                <i class="bi bi-cart3"></i>

                Point of Sale

            </div>


            <div class="feature-item">

                <i class="bi bi-bar-chart"></i>

                Reports

            </div>


            <div class="feature-item">

                <i class="bi bi-people"></i>

                Customers

            </div>


        </div>

    </div>


    <div class="brand-footer">

        © <?= date('Y') ?> DukaPro.
        All rights reserved.

    </div>


</div>


<!-- =========================================
     LOGIN PANEL
========================================== -->

<div class="login-panel">


    <div class="login-container">


        <!-- Mobile Logo -->

        <div class="mobile-logo">

            <div class="mobile-logo-icon">

                <i class="bi bi-grid-1x2-fill"></i>

            </div>

            DukaPro

        </div>


        <!-- Heading -->

        <div class="login-heading">

            <h2>

                Welcome back

            </h2>

            <p>

                Choose your account type and sign in
                to continue.

            </p>

        </div>


        <!-- Error -->

        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger login-alert">

                <i class="bi bi-exclamation-circle me-2"></i>

                <?= esc(
                    session()->getFlashdata('error')
                ) ?>

            </div>

        <?php endif; ?>


        <!-- Login Form -->

        <form
            method="POST"
            action="<?= base_url('login') ?>"
        >

            <?= csrf_field() ?>


            <!-- Account Type -->

            <div class="form-group">

                <label class="form-label mb-3">

                    Sign in as

                </label>


                <div class="row g-2">


                    <!-- Administrator -->

                    <div class="col-6">


                        <input
                            type="radio"
                            class="btn-check"
                            name="login_role"
                            id="roleAdmin"
                            value="Administrator"
                            autocomplete="off"
                            checked
                        >


                        <label
                            for="roleAdmin"
                            class="role-card"
                        >


                            <div
                                class="role-icon admin-icon"
                            >

                                <i
                                    class="bi bi-shield-lock"
                                ></i>

                            </div>


                            <div class="role-info">

                                <div class="role-title">

                                    Administrator

                                </div>

                                <div class="role-description">

                                    Manage ERP

                                </div>

                            </div>


                        </label>


                    </div>


                    <!-- Cashier -->

                    <div class="col-6">


                        <input
                            type="radio"
                            class="btn-check"
                            name="login_role"
                            id="roleCashier"
                            value="Cashier"
                            autocomplete="off"
                        >


                        <label
                            for="roleCashier"
                            class="role-card"
                        >


                            <div
                                class="role-icon cashier-icon"
                            >

                                <i
                                    class="bi bi-shop"
                                ></i>

                            </div>


                            <div class="role-info">

                                <div class="role-title">

                                    Cashier

                                </div>

                                <div class="role-description">

                                    Point of Sale

                                </div>

                            </div>


                        </label>


                    </div>


                </div>

            </div>


            <!-- Email -->

            <div class="form-group">


                <label
                    for="email"
                    class="form-label"
                >

                    Email address

                </label>


                <div class="input-wrapper">


                    <i
                        class="bi bi-envelope input-icon"
                    ></i>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="you@example.com"
                        value="<?= old('email') ?>"
                        autocomplete="email"
                        required
                        autofocus
                    >


                </div>


            </div>


            <!-- Password -->

            <div class="form-group">


                <label
                    for="password"
                    class="form-label"
                >

                    Password

                </label>


                <div class="input-wrapper">


                    <i
                        class="bi bi-lock input-icon"
                    ></i>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >


                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                        aria-label="Show password"
                    >

                        <i class="bi bi-eye"></i>

                    </button>


                </div>


            </div>


            <!-- Options -->

            <div class="login-options">


                <label class="remember-label">


                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >


                    Remember me


                </label>


                <a
                    href="#"
                    class="forgot-link"
                >

                    Forgot password?

                </a>


            </div>


            <!-- Submit -->

            <button
                type="submit"
                class="login-button"
            >

                <i
                    class="bi bi-box-arrow-in-right me-2"
                ></i>

                Sign In

            </button>


            <!-- Security -->

            <div class="security-note">


                <i
                    class="bi bi-shield-check"
                ></i>


                Secure access to your DukaPro
                workspace


            </div>


        </form>


    </div>


</div>
```

</div>

<script>


    const passwordInput =
        document.getElementById('password');


    const togglePassword =
        document.getElementById('togglePassword');


    togglePassword.addEventListener(
        'click',
        function () {


            const icon =
                this.querySelector('i');


            if (
                passwordInput.type === 'password'
            ) {


                passwordInput.type = 'text';


                icon.classList.remove(
                    'bi-eye'
                );


                icon.classList.add(
                    'bi-eye-slash'
                );


                this.setAttribute(
                    'aria-label',
                    'Hide password'
                );


            } else {


                passwordInput.type =
                    'password';


                icon.classList.remove(
                    'bi-eye-slash'
                );


                icon.classList.add(
                    'bi-eye'
                );


                this.setAttribute(
                    'aria-label',
                    'Show password'
                );

            }

        }
    );

</script>

</body>

</html>
