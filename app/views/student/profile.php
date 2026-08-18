<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Student Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700;800&family=Unbounded:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --lava: #dd4814;
            --lava-dim: #b83a10;
            --lava-glow: rgba(221,72,20,0.15);
            --lava-glow-strong: rgba(221,72,20,0.25);

            --bg: #0a0a0b;
            --bg2: #111113;
            --bg3: #18181b;

            --border: rgba(255,255,255,0.07);
            --border-hot: rgba(221,72,20,0.35);

            --text: #f4f4f5;
            --text-muted: #71717a;
            --text-dim: #3f3f46;

            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =========================
           GRID BACKGROUND
        ========================= */

        body::after {
            content: '';
            position: fixed;
            inset: 0;

            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);

            background-size: 60px 60px;

            pointer-events: none;
            z-index: 0;

            mask-image: radial-gradient(
                ellipse 80% 60% at 50% 0%,
                black 30%,
                transparent 100%
            );
        }

        /* =========================
           GLOW ORBS
        ========================= */

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }

        .orb-1 {
            width: 600px;
            height: 600px;
            top: -200px;
            left: -100px;

            background: radial-gradient(
                circle,
                rgba(221,72,20,0.12) 0%,
                transparent 70%
            );
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            top: 300px;
            right: -100px;

            background: radial-gradient(
                circle,
                rgba(221,72,20,0.07) 0%,
                transparent 70%
            );
        }

        /* =========================
           NAVIGATION
        ========================= */

        nav {
            position: relative;
            z-index: 10;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 1.5rem 2rem;

            border-bottom: 1px solid var(--border);

            backdrop-filter: blur(12px);
            background: rgba(10,10,11,0.6);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;

            font-size: 1.1rem;
            font-weight: 700;

            color: var(--text);
            text-decoration: none;
        }

        .nav-logo .icon {
            width: 28px;
            height: 28px;

            background: var(--lava);

            border-radius: 6px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;

            box-shadow: 0 0 20px var(--lava-glow-strong);
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .btn-nav {
            color: var(--text);

            background: var(--lava);

            padding: 0.55rem 1rem;

            border-radius: 6px;

            text-decoration: none;

            font-size: 0.85rem;
            font-weight: 500;

            transition: background 0.2s, box-shadow 0.2s;
        }

        .btn-nav:hover {
            background: var(--lava-dim);

            box-shadow:
                0 0 20px var(--lava-glow-strong);
        }

        /* =========================
           PROFILE SECTION
        ========================= */

        .profile-section {
            max-width: 900px;

            margin: 0 auto;

            padding: 6rem 2rem;

            position: relative;

            z-index: 1;
        }

        .section-label {
            font-family: var(--mono);

            font-size: 0.72rem;

            font-weight: 500;

            color: var(--lava);

            text-transform: uppercase;

            letter-spacing: 0.12em;

            margin-bottom: 0.75rem;
        }

        .profile-title {
            font-size: clamp(2rem, 5vw, 3.5rem);

            font-weight: 800;

            letter-spacing: -0.03em;

            line-height: 1.1;

            margin-bottom: 0.75rem;
        }

        .profile-title .orange {
            color: var(--lava);
        }

        .profile-description {
            color: var(--text-muted);

            font-size: 0.95rem;

            line-height: 1.7;

            margin-bottom: 3rem;
        }

        /* =========================
           PROFILE CARD
        ========================= */

        .profile-card {
            background: var(--bg2);

            border: 1px solid var(--border);

            border-radius: 16px;

            overflow: hidden;

            box-shadow:
                0 20px 50px rgba(0,0,0,0.3);
        }

        .profile-header {
            display: flex;

            align-items: center;

            gap: 1.5rem;

            padding: 2rem;

            background:
                linear-gradient(
                    135deg,
                    rgba(221,72,20,0.12),
                    transparent
                );

            border-bottom: 1px solid var(--border);
        }

        .profile-icon {
            width: 75px;
            height: 75px;

            flex-shrink: 0;

            background: var(--lava);

            border: 1px solid var(--border-hot);

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1.8rem;
            font-weight: 800;

            box-shadow:
                0 0 30px var(--lava-glow-strong);
        }

        .profile-header h2 {
            font-size: 1.2rem;

            font-weight: 700;

            margin-bottom: 0.5rem;
        }

        .profile-header p {
            font-family: var(--mono);

            color: var(--lava);

            font-size: 0.75rem;

            text-transform: uppercase;

            letter-spacing: 0.08em;
        }

        /* =========================
           INFORMATION
        ========================= */

        .profile-info {
            padding: 0.5rem 2rem 1.5rem;
        }

        .info-row {
            display: grid;

            grid-template-columns: 180px 1fr;

            gap: 1rem;

            padding: 1.25rem 0;

            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-family: var(--mono);

            font-size: 0.72rem;

            color: var(--lava);

            text-transform: uppercase;

            letter-spacing: 0.05em;
        }

        .info-value {
            color: var(--text);

            font-size: 0.85rem;

            line-height: 1.6;
        }

        /* =========================
           BUTTON
        ========================= */

        .profile-actions {
            display: flex;

            justify-content: center;

            padding: 0 2rem 2rem;
        }

        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 0.75rem 1.5rem;

            border-radius: 8px;

            font-family: var(--sans);

            font-size: 0.85rem;

            font-weight: 600;

            text-decoration: none;

            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--lava);

            color: #fff;
        }

        .btn-primary:hover {
            background: var(--lava-dim);

            box-shadow:
                0 0 30px var(--lava-glow-strong);

            transform: translateY(-1px);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            border-top: 1px solid var(--border);

            padding: 2rem;

            position: relative;

            z-index: 1;
        }

        .footer-inner {
            max-width: 900px;

            margin: 0 auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            flex-wrap: wrap;

            gap: 1rem;
        }

        .footer-meta {
            font-family: var(--mono);

            font-size: 0.75rem;

            color: var(--text-dim);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 650px) {

            nav {
                padding: 1rem 1.5rem;
            }

            .profile-section {
                padding: 4rem 1.5rem;
            }

            .profile-header {
                flex-direction: column;

                text-align: center;
            }

            .info-row {
                grid-template-columns: 1fr;

                gap: 0.4rem;
            }

            .profile-info {
                padding: 0.5rem 1.5rem 1.5rem;
            }

            .profile-actions {
                padding: 0 1.5rem 1.5rem;
            }

            .footer-inner {
                flex-direction: column;

                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- GLOW BACKGROUND -->

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>


    <!-- =========================
         NAVIGATION
    ========================= -->

    <nav>

        <a href="/student" class="nav-logo">

            <div class="icon">
                🎓
            </div>

            My Student Hub

        </a>


        <div class="nav-links">

            <a href="/student" class="btn-nav">
                Student Hub
            </a>

        </div>

    </nav>


    <section class="profile-section">

    

        <h1 class="profile-title">
            My <span class="orange">Profile.</span>
        </h1>

        <div class="profile-card">

            <div class="profile-header">

                <div class="profile-icon">
                    A
                </div>

                <div>

                    <h2>
                       <?= $name ?>
                    </h2>

                    <p>
                        Student Profile
                    </p>

                </div>

            </div>


            <!-- INFORMATION -->

            <div class="profile-info">

                <div class="info-row">

                    <div class="info-label">
                        Student ID
                    </div>

                    <div class="info-value">
                        <?= $student_id ?>
                    </div>

                </div>


                <div class="info-row">

                    <div class="info-label">
                        Full Name
                    </div>

                    <div class="info-value">
                        <?= $name ?>
                    </div>

                </div>


                <div class="info-row">

                    <div class="info-label">
                        Course
                    </div>

                    <div class="info-value">
                        <?= $course ?>
                    </div>

                </div>


                <div class="info-row">

                    <div class="info-label">
                        Year Level
                    </div>

                    <div class="info-value">
                        <?= $year ?>
                    </div>

                </div>


                <div class="info-row">

                    <div class="info-label">
                        Section
                    </div>

                    <div class="info-value">
                        <?= $section ?>
                    </div>

                </div>


                <div class="info-row">

                    <div class="info-label">
                        Email
                    </div>

                    <div class="info-value">
                        <?= $email ?>
                    </div>

                </div>

            </div>


            <!-- BACK BUTTON -->

            <div class="profile-actions">

                <a href="/student" class="btn btn-primary">
                    ← Back to Student Hub
                </a>

            </div>

        </div>

    </section>


  

    <footer>

        <div class="footer-inner">

            <div class="footer-meta">
                My Student Hub — Student Portal
            </div>

            <div class="footer-meta">
                © 2026
            </div>

        </div>

    </footer>

</body>
</html>