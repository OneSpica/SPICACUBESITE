<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spica Cube Site | Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid spica-stats-section">
        <section class="signup-container d-flex align-items-center justify-content-center">
            <div class="signup-card p-5">
                <h2 class="text-center mb-4 fw-bold">Join <span style="color: var(--primary);">Spica Cube</span></h2>
                <p class="text-center text-muted mb-5">Start tracking your OLL & PLL mastery.</p>

                <form action="process-signup.php" method="POST">
                    <div class="mb-4">
                        <label class="form-label text-muted small">Username</label>
                        <input type="text" name="username" class="spica-input w-100" required placeholder="Cuber123">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted small">Email Address</label>
                        <input type="email" name="email" class="spica-input w-100" required
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-5">
                        <label class="form-label text-muted small">Password</label>
                        <input type="password" name="password" class="spica-input w-100" required
                            placeholder="••••••••">
                    </div>

                    <!-- Reusing the strict Spica auth class for perfect consistency -->
                    <button type="submit" class="spica-auth-btn-primary w-100 border-0 mb-4">
                        Create Account
                    </button>


                    <p class="text-center text-muted small">
                        Already have an account? <a href="login.php" class="text-primary text-decoration-none">Log
                            In</a>
                    </p>
                </form>
            </div>
        </section>

    </div>
</body>

</html>