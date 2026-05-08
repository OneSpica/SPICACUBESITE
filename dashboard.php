<?php
session_start();

// If the session 'user_id' isn't set, they aren't logged in!
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=unauthorized");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Spica Cube</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard-body">

    <!-- 1. Sidebar -->
    <div class="spica-sidebar">
        <a class="spica-brand d-flex align-items-center" href="#">
            <!-- Geometric Cube Icon -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://w3.org" class="me-2">
                <path d="M12 2L3 7V17L12 22L21 17V7L12 2Z" stroke="var(--primary)" stroke-width="2"
                    stroke-linejoin="round" />
                <path d="M12 22V12" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" />
                <path d="M21 7L12 12L3 7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            SPICA CUBE SITE
        </a>
        <nav class="sidebar-nav px-3">
            <a href="dashboard.php" class="nav-link active">📊 Overview</a>
            <a href="mastery.php" class="nav-link">🏆 My Mastery</a>
            <a href="settings.php" class="nav-link">⚙️ Settings</a>
            <hr class="border-muted">
            <a href="logout.php" class="nav-link text-danger">🚪 Logout</a>
        </nav>
    </div>

    <!-- 2. Main Content -->
    <main class="dashboard-main">
        <header class="p-4 d-flex justify-content-between align-items-center border-bottom border-muted">
            <h2 class="fw-bold mb-0">Welcome back, <span class="text-primary">
                    <?php echo $_SESSION['username']; ?>
                </span></h2>
            <div class="user-badge bg-light p-2 rounded-pill px-3 border border-muted">
                Level 1 Cuber
            </div>
        </header>

        <div class="p-4">
            <div class="row g-4">
                <!-- Simple Stat Cards -->
                <div class="col-md-4">
                    <div class="stat-card p-4 rounded-3 h-100">
                        <h5 class="text-muted small text-uppercase">Total Learned</h5>
                        <h2 class="display-5 fw-bold text-primary">12/78</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="stat-card p-4 rounded-3 h-100">
                        <h5 class="text-muted small text-uppercase">Recent Practice</h5>
                        <p class="mb-0">You mastered the <b>T-Perm</b> 2 hours ago! 🚀</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>