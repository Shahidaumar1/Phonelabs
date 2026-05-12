<?php
// why-choose-us.php - Phone Repair Website Section
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Choose Us - Phone Repair Experts</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,600;0,700;0,800;1,400&family=Barlow+Condensed:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --blue: #00AEEF;
            --blue-dark: #0090C8;
            --blue-light: #E6F7FD;
            --white: #ffffff;
            --text-dark: #1a1a2e;
            --text-mid: #444466;
            --text-light: #7788aa;
            --bg: #f8faff;
        }

        body {
            font-family: 'Barlow', sans-serif;
            background: var(--white);
            color: var(--text-dark);
        }

        /* ── SECTION ── */
        .wcu-section {
            background: var(--white);
            padding: 70px 20px 60px;
            position: relative;
            overflow: hidden;
        }

        /* subtle grid background */
        .wcu-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(0,174,239,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,174,239,0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        .wcu-inner {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* ── BOTTOM TITLE BAND ── */
        .wcu-title-band {
            text-align: center;
            margin-bottom: 50px;
        }

        .wcu-title-band .tag {
            display: inline-block;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 18px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .wcu-title-band h2 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(30px, 5vw, 46px);
            font-weight: 800;
            line-height: 1.1;
            text-transform: uppercase;
            color: var(--text-dark);
        }

        .wcu-title-band h2 span {
            color: var(--blue);
        }

        .wcu-title-band p {
            margin-top: 10px;
            font-size: 15px;
            color: var(--text-light);
        }

        .wcu-title-band p u {
            color: var(--blue);
            text-decoration: none;
            border-bottom: 1.5px solid var(--blue);
        }

        /* ── DIAGRAM GRID ── */
        .wcu-diagram {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 0;
            align-items: center;
            justify-items: center;
            min-height: 380px;
        }

        /* CENTER COLUMN */
        .wcu-center {
            grid-column: 2;
            grid-row: 1 / 3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }

        .wcu-center-img {
            position: relative;
            width: 200px;
            height: 200px;
        }

        /* Big "?" shape made with CSS */
        .qmark {
            width: 180px;
            height: 180px;
            background: linear-gradient(145deg, var(--blue) 0%, var(--blue-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 110px;
            font-weight: 800;
            color: white;
            box-shadow: 0 12px 40px rgba(0,174,239,0.35), 0 2px 8px rgba(0,174,239,0.2);
            position: relative;
            user-select: none;
            animation: floatQ 3s ease-in-out infinite;
        }

        @keyframes floatQ {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* technician silhouette inside circle */
        .qmark-person {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 64px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        /* ── FEATURE CARDS ── */
        .wcu-feature {
            display: flex;
            flex-direction: column;
            max-width: 250px;
            padding: 18px 22px;
            background: var(--white);
            border: 1.5px solid rgba(0,174,239,0.15);
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,174,239,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            cursor: default;
        }

        .wcu-feature:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0,174,239,0.18);
            border-color: rgba(0,174,239,0.45);
        }

        /* Left cards align right text, right cards align left */
        .wcu-feature.left  { text-align: right; align-items: flex-end; }
        .wcu-feature.right { text-align: left;  align-items: flex-start; }

        .wcu-feature .feat-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 12px;
            flex-shrink: 0;
            transition: background 0.3s, color 0.3s;
        }

        .wcu-feature:hover .feat-icon {
            background: var(--blue);
            color: var(--white);
        }

        .wcu-feature h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .wcu-feature h3 span {
            color: var(--blue);
        }

        .wcu-feature p {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.6;
        }

        /* ── ARROWS (SVG lines connecting cards to center) ── */
        .wcu-arrows {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        /* Connector arrow decorators via pseudo-elements on cards */
        .wcu-feature.left::after,
        .wcu-feature.right::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30px;
            height: 2px;
            background: var(--blue);
            opacity: 0.35;
        }
        .wcu-feature.left::after  { right: -30px; }
        .wcu-feature.right::after { left: -30px; }

        /* Row wrappers */
        .wcu-row {
            display: contents;
        }

        /* Explicit grid placement */
        .feat-tl { grid-column: 1; grid-row: 1; justify-self: end; }
        .feat-bl { grid-column: 1; grid-row: 2; justify-self: end; }
        .feat-tr { grid-column: 3; grid-row: 1; justify-self: start; }
        .feat-br { grid-column: 3; grid-row: 2; justify-self: start; }

        /* Arrow cells */
        .arrow-tl { grid-column: 1; grid-row: 1; justify-self: end; align-self: center; pointer-events: none; }
        .arrow-bl { grid-column: 1; grid-row: 2; justify-self: end; align-self: center; pointer-events: none; }
        .arrow-tr { grid-column: 3; grid-row: 1; justify-self: start; align-self: center; pointer-events: none; }
        .arrow-br { grid-column: 3; grid-row: 2; justify-self: start; align-self: center; pointer-events: none; }

        /* ── SVG CONNECTORS (absolute overlay) ── */
        .diagram-wrap {
            position: relative;
        }

        /* ── BOTTOM STATS STRIP ── */
        .wcu-stats {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .stat-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--blue-light);
            border: 1px solid rgba(0,174,239,0.2);
            border-radius: 50px;
            padding: 10px 22px;
        }

        .stat-pill .sp-num {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: var(--blue);
            line-height: 1;
        }

        .stat-pill .sp-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-mid);
            line-height: 1.3;
            max-width: 80px;
        }

        /* ── HASHTAG ── */
        .wcu-hashtag {
            text-align: center;
            margin-top: 28px;
            font-size: 15px;
            font-weight: 700;
            color: var(--blue);
            letter-spacing: 0.5px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 860px) {
            .wcu-diagram {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .wcu-center { grid-column: 1; grid-row: 1; padding: 30px 0 20px; }
            .feat-tl, .feat-bl { grid-column: 1; justify-self: center; }
            .feat-tr, .feat-br { grid-column: 1; justify-self: center; }
            .feat-tl { grid-row: 2; }
            .feat-tr { grid-row: 3; }
            .feat-bl { grid-row: 4; }
            .feat-br { grid-row: 5; }

            .wcu-feature.left,
            .wcu-feature.right {
                text-align: left;
                align-items: flex-start;
                max-width: 320px;
                width: 100%;
            }

            .wcu-feature.left::after,
            .wcu-feature.right::after { display: none; }
        }

        @media (max-width: 500px) {
            .wcu-stats { flex-direction: column; align-items: center; }
            .stat-pill { width: 100%; max-width: 260px; }
        }
    </style>
</head>
<body>

<section class="wcu-section">
    <div class="wcu-inner">

        <!-- Title Band -->
        <div class="wcu-title-band">
            <div class="tag">Why Choose Us</div>
            <h2>How Our <span>Repair Service</span><br>Impacts Your Experience</h2>
            <p>Can your broken phone survive without a <u>professional repair strategy?</u></p>
        </div>

        <!-- Diagram -->
        <div class="diagram-wrap">
            <div class="wcu-diagram">

                <!-- TOP LEFT -->
                <div class="wcu-feature left feat-tl">
                    <div class="feat-icon"><i class="fas fa-tools"></i></div>
                    <h3>Certified <span>Expert Technicians</span></h3>
                    <p>Trained professionals with 5+ years of experience fixing all phone brands and models.</p>
                </div>

                <!-- CENTER -->
                <div class="wcu-center">
                    <div class="wcu-center-img">
                        <div class="qmark">?</div>
                    </div>
                </div>

                <!-- TOP RIGHT -->
                <div class="wcu-feature right feat-tr">
                    <div class="feat-icon"><i class="fas fa-heart"></i></div>
                    <h3>Builds <span>Trust with Customers</span></h3>
                    <p>We keep you informed every step of the repair — no surprises, no hidden fees.</p>
                </div>

                <!-- BOTTOM LEFT -->
                <div class="wcu-feature left feat-bl">
                    <div class="feat-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Establishes <span>Reliability &amp; Warranty</span></h3>
                    <p>All repairs come with a 90-day warranty. We stand behind every fix we make.</p>
                </div>

                <!-- BOTTOM RIGHT -->
                <div class="wcu-feature right feat-br">
                    <div class="feat-icon"><i class="fas fa-redo-alt"></i></div>
                    <h3>Improves <span>Customer Loyalty</span></h3>
                    <p>Our after-care support and loyalty discounts keep customers coming back for life.</p>
                </div>

            </div><!-- .wcu-diagram -->
        </div><!-- .diagram-wrap -->

        <!-- Stats Strip -->
        <div class="wcu-stats">
            <div class="stat-pill">
                <span class="sp-num">5K+</span>
                <span class="sp-label">Phones Repaired</span>
            </div>
            <div class="stat-pill">
                <span class="sp-num">98%</span>
                <span class="sp-label">Customer Satisfaction</span>
            </div>
            <div class="stat-pill">
                <span class="sp-num">30min</span>
                <span class="sp-label">Average Repair Time</span>
            </div>
            <div class="stat-pill">
                <span class="sp-num">90</span>
                <span class="sp-label">Day Repair Warranty</span>
            </div>
        </div>

        <!-- Hashtag -->
        <div class="wcu-hashtag">#FixItFast &nbsp;|&nbsp; #TrustedRepair &nbsp;|&nbsp; #YourPhoneOurPriority</div>

    </div><!-- .wcu-inner -->
</section>

</body>
</html>