<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spica Cube | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="signup-container d-flex align-items-center justify-content-center">
        <div class="signup-card p-5">
            <h2 class="text-center mb-4 fw-bold">Welcome Back to <span style="color: var(--primary);">Spica</span></h2>
            <p class="text-center text-muted mb-5">Sign in to resume your training.</p>

            <!-- Show error message if login fails -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger py-2 small text-center">Invalid username or password.</div>
            <?php endif; ?>

            <form action="process-login.php" method="POST">
                <div class="mb-4">
                    <label class="form-label text-muted small">Username or Email</label>
                    <input type="text" name="identifier" class="spica-input w-100" required placeholder="Cuber123">
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-between">
                        <label class="form-label text-muted small">Password</label>
                        <a href="forgot-password.php" class="text-primary text-decoration-none small">Forgot?</a>
                    </div>
                    <input type="password" name="password" class="spica-input w-100" required placeholder="••••••••">
                </div>

                <button type="submit" class="spica-auth-btn-primary w-100 border-0 mb-4">
                    Sign In
                </button>

                <p class="text-center text-muted small">
                    New to Spica? <a href="signup.php" class="text-primary text-decoration-none">Create Account</a>
                </p>
            </form>
        </div>
    </section>
</body>

</html>