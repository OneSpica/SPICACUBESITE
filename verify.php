<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account | Spica Cube</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="signup-container d-flex align-items-center justify-content-center">
        <div class="signup-card p-5 text-center">
            <h2 class="fw-bold mb-3">Verify <span style="color: var(--primary);">Email</span></h2>
            <p class="text-muted mb-4">Please enter the 6-digit code sent to your email.</p>

            <!-- Display error messages if the OTP is wrong -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger py-2 small">Invalid or expired code. Please try again.</div>
            <?php endif; ?>

            <form action="process-verify.php" method="POST">
                <!-- Keep the user's email hidden so we know whose OTP to check -->
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">

                <div class="mb-4">
                    <input type="text" name="otp" class="spica-input w-100 text-center" maxlength="6" required
                        placeholder="0 0 0 0 0 0" style="font-size: 2rem; letter-spacing: 10px;">
                </div>

                <button type="submit" class="spica-btn-signup w-100 border-0 py-3 mb-3">
                    Verify Code
                </button>

                <p class="small text-muted">Didn't receive a code? <a href="#"
                        class="text-primary text-decoration-none">Resend</a></p>
            </form>
        </div>
    </section>
</body>

</html>