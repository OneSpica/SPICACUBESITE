<?php
session_start();

require 'dbcon.php';
// Use your specific database connection settings
$conn = new mysqli("localhost", "root", "", "rubiks_cube", "3307");

// 1. Pull only PLL types from the 'algorithm' table
$sql = "SELECT * FROM algorithm WHERE type = 'PLL' ORDER BY alg_id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spica Cube Site | PLL Algorithms</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
    <script defer src="js/bootstrap.bundle.min.js"></script>
</head>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
            /* Starts 30px lower */
        }

        to {
            opacity: 1;
            transform: translateY(0);
            /* Ends at its natural position */
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 0.1;
        }

        /* Matches your original 0.1 opacity */
    }

    body>*:not(nav):not(script) {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    nav {
        animation: fadeInFull 0.5s ease-in;
    }
</style>

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

    <div class="container my-5">
        <h2 class="mb-5 fw-bold text-center">PLL <span class="text-primary">Library</span></h2>
        <div class="alg-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="alg-card">
                    <div class="card-header-spica">
                        <span class="alg-name" role="button" data-bs-toggle="modal"
                            data-bs-target="#modal-<?php echo $row['alg_id']; ?>">
                            <?php echo htmlspecialchars($row['alg_name']); ?>
                        </span>
                        <span class="alg-badge">
                            <?php echo $row['type']; ?>
                        </span>
                    </div>

                    <!-- HARDCODED IMAGE LOGIC -->
                    <div class="alg-image-container py-3 text-center" role="button" data-bs-toggle="modal"
                        data-bs-target="#modal-<?php echo $row['alg_id']; ?>">
                        <?php
                        // Point to your local folder. We use the ID to find the right file.
                        $local_img = "assets/pll/" . $row['alg_id'] . ".png";

                        // Fallback: If the image doesn't exist yet, show the scrambled cube
                        if (!file_exists($local_img)) {
                            $local_img = "assets/scrambled.png";
                        }
                        ?>
                        <img src="<?php echo $local_img; ?>" alt="Cube Case" class="img-fluid" style="max-height: 120px;">
                    </div>

                    <div class="notation-box">
                        <?php echo htmlspecialchars($row['alg_steps']); ?>
                    </div>

                    <div class="card-footer-spica d-flex justify-content-between align-items-center">
                        <span class="text-muted small">
                            <?php echo $row['move_count']; ?> Moves
                        </span>
                        <button class="mastery-btn" onclick="markMastered(<?php echo $row['alg_id']; ?>)">
                            <i class="bi bi-check-circle"></i>
                        </button>
                    </div>
                </div>

                <!-- The Modal (Hardcoded Image inside too) -->
                <div class="modal fade" id="modal-<?php echo $row['alg_id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="background-color: var(--bg-dark); border: 1px solid var(--border-muted);">

                            <!-- ADD THIS HEADER FOR THE CLOSE BUTTON -->
                            <div class="modal-header border-0 pb-0">
                                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body text-center p-5 pt-0"> <!-- Added pt-0 to keep spacing tight -->
                                <img src="<?php echo $local_img; ?>" class="img-fluid mb-4" style="max-height: 200px;">
                                <h2 class="fw-bold text-white mb-3">
                                    <?php echo htmlspecialchars($row['alg_name']); ?>
                                </h2>

                                <div class="notation-box-large p-4 rounded-3 mb-4"
                                    style="background: rgba(0, 162, 255, 0.05); color: var(--primary); font-family: monospace; font-size: 1.3rem;">
                                    <?php echo htmlspecialchars($row['alg_steps']); ?>
                                </div>

                                <button class="spica-auth-btn-primary w-100"
                                    onclick="markMastered(<?php echo $row['alg_id']; ?>)">Mark as Mastered</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>



    </div>
</body>

</html>