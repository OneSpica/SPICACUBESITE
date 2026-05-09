<!DOCTYPE html>
<html lang="en">

<!-- change 123 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spica Cube Site | Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top px-3 custom-nav">
        <div class="container">
            <!-- Unique Brand Class -->
            <a class="spica-brand d-flex align-items-center" href="index.php">
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


            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto search-form">
                    <input class="form-control me-2 spica-input" type="search" placeholder="Search...">
                    <!-- Unique Search Button Class -->
                    <button class="spica-search-btn" type="submit">Search</button>
                </form>

                <ul class="navbar-nav ms-3">
                    <li class="nav-item"><a class="nav-link spica-nav-link" href="#">OLL</a></li>
                    <li class="nav-item"><a class="nav-link spica-nav-link" href="pll.php">PLL</a></li>
                    <li class="nav-item"><a class="nav-link spica-nav-link" href="auth.php">GET STARTED
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="d-flex justify-content-center gap-2 mt-4 filter-group">
        <!-- Note: 'active' starts on the first button -->
        <button class="btn btn-outline-custom rounded-pill px-3">All</button>
        <button class="btn btn-outline-custom rounded-pill px-3">OLLs</button>
        <button class="btn btn-outline-custom rounded-pill px-3">PLLs</button>
        <button class="btn btn-outline-custom rounded-pill px-3">4-LLL (4-Look Last Layer)</button>
    </div>


    <!-- Hero Section -->
    <div class="container-fluid hero-section py-5">
        <div class="container text-center py-5">
            <h1 class="display-3 fw-bold text-white mb-3">Master Every
                <span style="color: color-mix(in srgb, var(--primary), blue 35%);">Case.</span>
            </h1>
            <p class="lead mb-4" style="color: var(--text-muted);">
                The ultimate library for OLL and PLL algorithms. Fast, clean, and mobile-ready.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="#algorithms" class="btn btn-lg px-4 gap-3"
                    style="background-color: var(--primary); color: var(--bg-dark);">Explore PLL</a>
                <a href="#algorithms" class="btn btn-outline-light btn-lg px-4">Explore OLL</a>
            </div>
        </div>
    </div>

    <div class="container-fluid spica-stats-section">
        <div class="container py-5">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="p-4 rounded-3 stat-card">
                                <h4 style="color: var(--secondary);">57</h4>
                                <p class="mb-0 text-muted">OLL Cases</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 rounded-3 stat-card">
                                <h4 style="color: var(--secondary);">21</h4>
                                <p class="mb-0 text-muted">PLL Cases</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-4 rounded-3 stat-card">
                                <h4 style="color: var(--success);">100+</h4>
                                <p class="mb-0 text-muted">Finger-trick Variations & F2L</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center text-md-start">
                    <h2 class="display-1 fw-bold" style="color: var(--primary);">200+</h2>
                    <h3 class="text-white">Professional Algorithms</h3>
                    <p class="lead" style="color: var(--text-muted);">
                        From beginner-friendly OLLs to advanced PLL variations.
                        Everything you need to reach sub-20.
                    </p>
                </div>

            </div>
        </div>
    </div>


</body>

</html>