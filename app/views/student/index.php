<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Student Hub</title>

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
            top: 200px;
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

        .nav-links .btn-nav {
            color: var(--text);

            background: var(--lava);

            padding: 0.55rem 1rem;

            border-radius: 6px;

            text-decoration: none;

            font-size: 0.85rem;
            font-weight: 500;

            transition:
                background 0.2s,
                box-shadow 0.2s;
        }

        .nav-links .btn-nav:hover {
            background: var(--lava-dim);

            box-shadow:
                0 0 20px var(--lava-glow-strong);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            padding: 7rem 2rem 5rem;

            text-align: center;

            position: relative;
            z-index: 1;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;

            background: rgba(221,72,20,0.1);

            border: 1px solid var(--border-hot);

            color: #f97316;

            font-size: 0.75rem;
            font-weight: 600;

            letter-spacing: 0.08em;

            text-transform: uppercase;

            padding: 0.35rem 0.9rem;

            border-radius: 999px;

            margin-bottom: 2rem;

            font-family: var(--mono);
        }

        .badge::before {
            content: '';

            width: 6px;
            height: 6px;

            background: var(--lava);

            border-radius: 50%;

            box-shadow: 0 0 8px var(--lava);

            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                box-shadow: 0 0 8px var(--lava);
            }

            50% {
                opacity: 0.5;
                box-shadow: 0 0 3px var(--lava);
            }
        }

        h1 {
            font-size: clamp(3rem, 8vw, 6rem);

            font-weight: 800;

            line-height: 1;

            letter-spacing: -0.04em;

            margin-bottom: 1.5rem;
        }

        h1 .main {
            color: var(--lava);
        }

        h1 .outline {
            color: transparent;

            -webkit-text-stroke:
                1.5px rgba(255,255,255,0.3);
        }

        .hero p {
            font-size: 1.15rem;

            color: var(--text-muted);

            max-width: 520px;

            margin: 0 auto 2.5rem;

            line-height: 1.7;

            font-weight: 400;
        }

        /* =========================
           BUTTONS
        ========================= */

        .hero-actions {
            display: flex;
            justify-content: center;
            align-items: center;

            gap: 0.75rem;

            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 0.5rem;

            padding: 0.75rem 1.5rem;

            border-radius: 8px;

            font-family: var(--sans);

            font-size: 0.9rem;
            font-weight: 600;

            text-decoration: none;

            transition: all 0.2s;

            cursor: pointer;
        }

        .btn-primary {
            background: var(--lava);

            color: #fff;

            box-shadow:
                0 0 0 0 var(--lava-glow);
        }

        .btn-primary:hover {
            background: var(--lava-dim);

            box-shadow:
                0 0 30px var(--lava-glow-strong),
                0 4px 15px rgba(0,0,0,0.3);

            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;

            color: var(--text-muted);

            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            color: var(--text);

            border-color: rgba(255,255,255,0.2);

            background: var(--bg3);
        }

        /* =========================
           STUDENT HUB SECTION
        ========================= */

        .student-section {
            max-width: 1100px;

            margin: 0 auto;

            padding: 5rem 2rem;

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

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);

            font-weight: 800;

            letter-spacing: -0.03em;

            line-height: 1.1;

            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);

            font-size: 1rem;

            line-height: 1.7;

            max-width: 600px;
        }

        /* =========================
           STUDENT CARDS
        ========================= */

        .cards {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 1px;

            background: var(--border);

            border: 1px solid var(--border);

            border-radius: 16px;

            overflow: hidden;

            margin-top: 3rem;
        }

        .card {
            background: var(--bg);

            padding: 2rem;

            transition: background 0.2s;

            position: relative;
        }

        .card:hover {
            background: var(--bg2);
        }

        .card::before {
            content: '';

            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    var(--lava-glow-strong),
                    transparent
                );

            opacity: 0;

            transition: opacity 0.3s;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-icon {
            width: 40px;
            height: 40px;

            background: rgba(221,72,20,0.1);

            border: 1px solid var(--border-hot);

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;

            margin-bottom: 1rem;
        }

        .card h3 {
            font-size: 1rem;

            font-weight: 700;

            margin-bottom: 0.5rem;

            letter-spacing: -0.01em;
        }

        .card p {
            font-size: 0.875rem;

            color: var(--text-muted);

            line-height: 1.6;
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
            max-width: 1100px;

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

        @media (max-width: 768px) {

            .cards {
                grid-template-columns: 1fr;
            }

            nav {
                padding: 1rem 1.5rem;
            }

            .hero {
                padding: 5rem 1.5rem 3rem;
            }

            .student-section {
                padding: 3rem 1.5rem;
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

        <a href="#" class="nav-logo">

            <div class="icon">
                🎓
            </div>

            My Student Hub

        </a>


        <div class="nav-links">

            <a href="#" class="btn-nav">
                View Profile
            </a>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================= -->

    <div class="hero">

        <div class="badge">
            STUDENT PORTAL
        </div>


        <h1>

            <span class="main">
                MY STUDENT
            </span>

            <br>

            <span class="outline">
                HUB
            </span>

        </h1>


        <p>
            Welcome to My Student Hub, your simple and organized
            space for managing student information and activities.
        </p>


        <div class="hero-actions">

            <a href="#" class="btn btn-primary">
                Explore Hub →
            </a>

            <a href="#" class="btn btn-ghost">
                Learn More
            </a>

        </div>

    </div>


    <!-- =========================
         STUDENT HUB
    ========================= -->

    <section class="student-section">

        <div class="section-label">
            // student hub
        </div>


        <h2 class="section-title">
            Everything you need.
        </h2>


        <p class="section-desc">
            This is my student hub page. Use this space to organize
            student information, activities, and other important resources.
        </p>


        <div class="cards">


            <!-- PROFILE -->

            <div class="card">

                <div class="card-icon">
                    👤
                </div>

                <h3>
                    Student Profile
                </h3>

                <p>
                    View and manage your student information
                    and profile details.
                </p>

            </div>


            <!-- SUBJECTS -->

            <div class="card">

                <div class="card-icon">
                    📚
                </div>

                <h3>
                    My Subjects
                </h3>

                <p>
                    Keep track of your subjects, classes,
                    and academic activities.
                </p>

            </div>


            <!-- ACTIVITIES -->

            <div class="card">

                <div class="card-icon">
                    📋
                </div>

                <p>
                    Mabuhay Mahaltana! Stay updated with your student activities,
                </p>

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