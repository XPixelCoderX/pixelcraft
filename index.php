<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Pixel Craft Network | Minecraft Server</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600;700&family=Barlow+Condensed:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;700&display=swap" rel="stylesheet">
<style>
/* ================================================================
   DESIGN SYSTEM — PIXEL CRAFT NETWORK
   Aesthetic: Industrial Brutalist meets dark gaming editorial.
   Typefaces: Bebas Neue (display), Barlow Condensed (headings),
              Barlow (body), JetBrains Mono (code/mono).
   Palette: Near-black base, electric red accent, icy cyan data,
            acid-green status, muted amber for warnings.
================================================================ */

:root {
  /* Core Palette */
  --ink:        #080910;
  --ink-2:      #0d0f18;
  --ink-3:      #121420;
  --surface:    rgba(255,255,255,0.028);
  --surface-2:  rgba(255,255,255,0.05);
  --surface-3:  rgba(255,255,255,0.08);
  --glass:      rgba(12,14,24,0.75);

  /* Borders */
  --line:       rgba(255,255,255,0.07);
  --line-2:     rgba(255,255,255,0.12);
  --line-glow:  rgba(220,60,60,0.3);

  /* Text */
  --text:       #dde3ef;
  --text-muted: #6b7491;
  --text-dim:   #383f5a;
  --white:      #ffffff;

  /* Accents */
  --red:        #e03333;
  --red-dim:    #a02222;
  --red-glow:   rgba(224,51,51,0.18);
  --cyan:       #4dd8e8;
  --cyan-dim:   rgba(77,216,232,0.12);
  --green:      #3de2a0;
  --green-dim:  rgba(61,226,160,0.1);
  --amber:      #f0a832;
  --amber-dim:  rgba(240,168,50,0.1);
  --purple:     #9b73f8;
  --purple-dim: rgba(155,115,248,0.1);

  /* Typography */
  --font-display:   'Bebas Neue', 'Barlow Condensed', sans-serif;
  --font-heading:   'Barlow Condensed', sans-serif;
  --font-body:      'Barlow', sans-serif;
  --font-mono:      'JetBrains Mono', monospace;

  /* Geometry */
  --r-sm:  8px;
  --r-md:  14px;
  --r-lg:  22px;
  --r-xl:  36px;
  --r-pill: 999px;

  /* Motion */
  --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
  --ease-in-out-quart: cubic-bezier(0.76, 0, 0.24, 1);
  --t-fast: 0.15s;
  --t-mid:  0.3s;
  --t-slow: 0.6s;
}

/* ── Reset ── */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  font-family: var(--font-body);
  background: var(--ink);
  color: var(--text);
  overflow-x: hidden;
  line-height: 1.55;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  cursor: none;
}
a { color: inherit; text-decoration: none; }
button { font-family: inherit; cursor: none; }
input, textarea, select { font-family: inherit; }
img { display: block; max-width: 100%; }
ul { list-style: none; }

/* ── Custom Scrollbar ── */
::-webkit-scrollbar { width: 5px; height: 5px; }
::-webkit-scrollbar-track { background: var(--ink-2); }
::-webkit-scrollbar-thumb { background: rgba(224,51,51,0.4); border-radius: 5px; }
::-webkit-scrollbar-thumb:hover { background: var(--red); }
* { scrollbar-width: thin; scrollbar-color: rgba(224,51,51,0.4) var(--ink-2); }

/* ================================================================
   CURSOR
================================================================ */
#cursor {
  position: fixed;
  width: 10px;
  height: 10px;
  background: var(--red);
  border-radius: 50%;
  pointer-events: none;
  z-index: 9999;
  transform: translate(-50%, -50%);
  transition: width 0.18s var(--ease-out-expo),
              height 0.18s var(--ease-out-expo),
              opacity 0.2s;
  mix-blend-mode: normal;
}
#cursor-ring {
  position: fixed;
  width: 30px;
  height: 30px;
  border: 1.5px solid rgba(224,51,51,0.5);
  border-radius: 50%;
  pointer-events: none;
  z-index: 9998;
  transform: translate(-50%, -50%);
  transition: transform 0.1s linear,
              width 0.25s var(--ease-out-expo),
              height 0.25s var(--ease-out-expo),
              border-color 0.2s;
}
.cursor-expand #cursor { width: 18px; height: 18px; }
.cursor-expand #cursor-ring { width: 46px; height: 46px; border-color: rgba(224,51,51,0.35); }

/* ================================================================
   NOISE + VIGNETTE OVERLAYS
================================================================ */
#noise-overlay {
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.028;
  pointer-events: none;
  z-index: 1;
}
#vignette {
  position: fixed;
  inset: 0;
  background: radial-gradient(ellipse at center, transparent 40%, rgba(8,9,16,0.7) 100%);
  pointer-events: none;
  z-index: 1;
}

/* ================================================================
   PARTICLE CANVAS BACKGROUND
================================================================ */
#particle-canvas {
  position: fixed;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  opacity: 0.6;
}

/* ── Glow Blobs ── */
.blob {
  position: fixed;
  border-radius: 50%;
  filter: blur(140px);
  pointer-events: none;
  z-index: 0;
  opacity: 0.5;
}
.blob-a {
  width: 700px; height: 700px;
  background: rgba(224,51,51,0.07);
  top: -200px; left: -150px;
  animation: blobDrift 22s ease-in-out infinite alternate;
}
.blob-b {
  width: 550px; height: 550px;
  background: rgba(77,216,232,0.05);
  bottom: -100px; right: -100px;
  animation: blobDrift 28s ease-in-out infinite alternate-reverse;
}
.blob-c {
  width: 400px; height: 400px;
  background: rgba(155,115,248,0.04);
  top: 50%; left: 40%;
  animation: blobDrift 18s ease-in-out 4s infinite alternate;
}
@keyframes blobDrift {
  0%   { transform: translate(0, 0) scale(1); }
  33%  { transform: translate(60px, -40px) scale(1.06); }
  66%  { transform: translate(-30px, 60px) scale(0.95); }
  100% { transform: translate(40px, 20px) scale(1.04); }
}

/* All actual page content sits above */
.page { position: relative; z-index: 10; }

/* ================================================================
   NAVIGATION
================================================================ */
.nav {
  position: fixed;
  inset: 0 0 auto 0;
  z-index: 200;
  height: 68px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2.5rem;
  transition: background var(--t-mid), border-color var(--t-mid), backdrop-filter var(--t-mid);
}
.nav.solid {
  background: rgba(8,9,16,0.9);
  border-bottom: 1px solid var(--line);
  backdrop-filter: blur(20px) saturate(1.6);
}

.nav-logo {
  display: flex;
  align-items: center;
  gap: 11px;
  font-family: var(--font-display);
  font-size: 1.35rem;
  letter-spacing: 0.08em;
  color: var(--white);
}
.nav-logo-mark {
  width: 34px;
  height: 34px;
  background: var(--red);
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
  box-shadow: 0 0 18px rgba(224,51,51,0.4);
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 2px;
  background: rgba(255,255,255,0.035);
  border: 1px solid var(--line);
  border-radius: var(--r-pill);
  padding: 4px;
  backdrop-filter: blur(8px);
}
.nav-link {
  font-family: var(--font-heading);
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  color: var(--text-muted);
  padding: 6px 16px;
  border-radius: var(--r-pill);
  transition: all var(--t-fast);
  white-space: nowrap;
}
.nav-link:hover, .nav-link.active {
  background: rgba(255,255,255,0.08);
  color: var(--white);
}
.nav-link.active { color: var(--red); }

.nav-right {
  display: flex;
  align-items: center;
  gap: 10px;
}

/* Status pill */
.status-pill {
  display: flex;
  align-items: center;
  gap: 7px;
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.06em;
  border-radius: var(--r-pill);
  padding: 6px 14px;
  transition: all var(--t-fast);
}
.status-pill.online {
  background: var(--green-dim);
  border: 1px solid rgba(61,226,160,0.2);
  color: var(--green);
}
.status-pill.offline {
  background: rgba(224,51,51,0.08);
  border: 1px solid rgba(224,51,51,0.2);
  color: var(--red);
}
.status-pill.checking {
  background: var(--amber-dim);
  border: 1px solid rgba(240,168,50,0.2);
  color: var(--amber);
}
.status-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  flex-shrink: 0;
}
.status-pill.online .status-dot {
  background: var(--green);
  animation: pulseGreen 1.8s ease-in-out infinite;
}
.status-pill.offline .status-dot { background: var(--red); }
.status-pill.checking .status-dot { background: var(--amber); animation: pulseAmber 1s linear infinite; }
@keyframes pulseGreen {
  0%, 100% { box-shadow: 0 0 0 0 rgba(61,226,160,0.5); }
  50% { box-shadow: 0 0 0 5px rgba(61,226,160,0); }
}
@keyframes pulseAmber {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.4; }
}

.btn-nav {
  font-family: var(--font-heading);
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  padding: 7px 18px;
  border-radius: var(--r-pill);
  border: 1px solid var(--line-2);
  background: var(--surface);
  color: var(--text);
  transition: all var(--t-fast);
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.btn-nav:hover {
  background: var(--surface-2);
  border-color: var(--red);
  color: var(--white);
  box-shadow: 0 0 14px var(--red-glow);
}

/* ================================================================
   HERO SECTION
================================================================ */
.hero {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 120px 24px 80px;
  position: relative;
  overflow: hidden;
}

/* Scanlines effect on hero */
.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: repeating-linear-gradient(
    0deg,
    transparent,
    transparent 2px,
    rgba(0,0,0,0.04) 2px,
    rgba(0,0,0,0.04) 4px
  );
  pointer-events: none;
  z-index: 1;
}

/* Cross-hair decoration */
.hero-crosshair {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: min(700px, 90vw);
  height: min(700px, 90vw);
  pointer-events: none;
  z-index: 0;
}
.hero-crosshair::before,
.hero-crosshair::after {
  content: '';
  position: absolute;
  background: linear-gradient(90deg, transparent, rgba(224,51,51,0.15), transparent);
}
.hero-crosshair::before {
  width: 100%; height: 1px;
  top: 50%; left: 0;
}
.hero-crosshair::after {
  width: 1px; height: 100%;
  left: 50%; top: 0;
  background: linear-gradient(0deg, transparent, rgba(224,51,51,0.15), transparent);
}
.hero-ring {
  position: absolute;
  top: 50%; left: 50%;
  border-radius: 50%;
  border: 1px solid rgba(224,51,51,0.08);
  transform: translate(-50%,-50%);
  pointer-events: none;
}
.hero-ring-1 { width: 240px; height: 240px; animation: ringPulse 4s ease-in-out infinite; }
.hero-ring-2 { width: 460px; height: 460px; animation: ringPulse 4s ease-in-out 1.3s infinite; }
.hero-ring-3 { width: 680px; height: 680px; animation: ringPulse 4s ease-in-out 2.6s infinite; }
@keyframes ringPulse {
  0%, 100% { opacity: 0.3; transform: translate(-50%,-50%) scale(1); }
  50% { opacity: 0.7; transform: translate(-50%,-50%) scale(1.02); }
}

.hero-inner { position: relative; z-index: 2; }

.hero-label {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-family: var(--font-mono);
  font-size: 0.65rem;
  letter-spacing: 0.22em;
  color: var(--red);
  margin-bottom: 28px;
  opacity: 0;
  animation: fadeSlideUp 0.8s 0.1s var(--ease-out-expo) forwards;
}
.hero-label::before,
.hero-label::after {
  content: '';
  flex: 1;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--red));
  width: 40px;
}
.hero-label::after { background: linear-gradient(90deg, var(--red), transparent); }

.hero-title {
  font-family: var(--font-display);
  font-size: clamp(4.5rem, 13vw, 10rem);
  line-height: 0.88;
  letter-spacing: 0.04em;
  color: var(--white);
  margin-bottom: 6px;
  opacity: 0;
  animation: fadeSlideUp 1s 0.25s var(--ease-out-expo) forwards;
}
.hero-title-sub {
  font-family: var(--font-display);
  font-size: clamp(1.8rem, 5vw, 4rem);
  line-height: 1;
  letter-spacing: 0.12em;
  color: transparent;
  -webkit-text-stroke: 1px rgba(255,255,255,0.25);
  margin-bottom: 32px;
  opacity: 0;
  animation: fadeSlideUp 1s 0.4s var(--ease-out-expo) forwards;
}

.hero-desc {
  font-size: 1rem;
  color: var(--text-muted);
  max-width: 460px;
  margin: 0 auto 36px;
  font-weight: 400;
  line-height: 1.65;
  opacity: 0;
  animation: fadeSlideUp 0.9s 0.55s var(--ease-out-expo) forwards;
}

.hero-cta {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 48px;
  opacity: 0;
  animation: fadeSlideUp 0.9s 0.7s var(--ease-out-expo) forwards;
}

/* IP display bar */
.ip-bar {
  display: inline-flex;
  align-items: center;
  gap: 14px;
  border: 1px solid var(--line-2);
  border-radius: var(--r-pill);
  padding: 10px 20px;
  font-family: var(--font-mono);
  font-size: 0.82rem;
  color: var(--cyan);
  background: rgba(77,216,232,0.04);
  cursor: pointer;
  transition: all var(--t-fast);
  opacity: 0;
  animation: fadeSlideUp 0.9s 0.85s var(--ease-out-expo) forwards;
}
.ip-bar:hover {
  border-color: var(--cyan);
  background: rgba(77,216,232,0.08);
  box-shadow: 0 0 20px rgba(77,216,232,0.12);
}
.ip-bar.copied {
  border-color: var(--green);
  color: var(--green);
  background: var(--green-dim);
}
.ip-bar-sep {
  width: 1px;
  height: 16px;
  background: var(--line-2);
}
.ip-bar-action {
  font-size: 0.6rem;
  color: var(--text-muted);
  letter-spacing: 0.1em;
}

/* Hero scroll indicator */
.hero-scroll {
  position: absolute;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  font-family: var(--font-mono);
  font-size: 0.58rem;
  letter-spacing: 0.15em;
  color: var(--text-dim);
  z-index: 2;
  animation: fadeSlideUp 1s 1.2s var(--ease-out-expo) both;
}
.scroll-line {
  width: 1px;
  height: 36px;
  background: linear-gradient(to bottom, var(--red), transparent);
  animation: scrollDrop 1.5s ease-in-out infinite;
}
@keyframes scrollDrop {
  0%, 100% { opacity: 0.5; transform: scaleY(1); }
  50% { opacity: 1; transform: scaleY(1.2); }
}

/* ================================================================
   BUTTONS
================================================================ */
.btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-family: var(--font-heading);
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  padding: 11px 26px;
  border-radius: var(--r-pill);
  border: none;
  transition: all 0.22s var(--ease-out-expo);
  position: relative;
  overflow: hidden;
  white-space: nowrap;
}
.btn::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 50% 0%, rgba(255,255,255,0.12) 0%, transparent 65%);
  opacity: 0;
  transition: opacity var(--t-fast);
}
.btn:hover::after { opacity: 1; }

.btn-primary {
  background: var(--red);
  color: var(--white);
  box-shadow: 0 4px 22px rgba(224,51,51,0.3), inset 0 1px 0 rgba(255,255,255,0.15);
}
.btn-primary:hover {
  background: #f03838;
  transform: translateY(-2px);
  box-shadow: 0 8px 32px rgba(224,51,51,0.45), inset 0 1px 0 rgba(255,255,255,0.2);
}

.btn-outline {
  background: transparent;
  color: var(--text);
  border: 1px solid var(--line-2);
}
.btn-outline:hover {
  border-color: var(--red);
  color: var(--white);
  transform: translateY(-2px);
  box-shadow: 0 0 16px var(--red-glow);
}

.btn-ghost {
  background: var(--surface);
  color: var(--text);
  border: 1px solid var(--line);
}
.btn-ghost:hover {
  background: var(--surface-2);
  color: var(--white);
  border-color: var(--line-2);
  transform: translateY(-2px);
}

.btn-cyan {
  background: rgba(77,216,232,0.12);
  color: var(--cyan);
  border: 1px solid rgba(77,216,232,0.2);
}
.btn-cyan:hover {
  background: rgba(77,216,232,0.2);
  transform: translateY(-2px);
  box-shadow: 0 0 20px rgba(77,216,232,0.15);
}

.btn-sm { padding: 7px 16px; font-size: 0.72rem; }
.btn-lg { padding: 14px 34px; font-size: 0.9rem; }

/* ================================================================
   SECTION SCAFFOLDING
================================================================ */
.section {
  max-width: 1240px;
  margin: 0 auto;
  padding: 100px 24px;
}
.section-label {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.2em;
  color: var(--red);
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.section-label::before {
  content: '';
  width: 28px;
  height: 1px;
  background: var(--red);
}
.section-title {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 5vw, 4rem);
  letter-spacing: 0.03em;
  color: var(--white);
  line-height: 0.95;
  margin-bottom: 14px;
}
.section-desc {
  font-size: 0.95rem;
  color: var(--text-muted);
  max-width: 520px;
  line-height: 1.65;
}

/* ================================================================
   MARQUEE BAND
================================================================ */
.marquee-band {
  border-top: 1px solid var(--line);
  border-bottom: 1px solid var(--line);
  padding: 13px 0;
  overflow: hidden;
  background: rgba(255,255,255,0.012);
}
.marquee-track {
  display: flex;
  gap: 0;
  width: max-content;
  animation: marqueeRoll 30s linear infinite;
}
.marquee-band:hover .marquee-track { animation-play-state: paused; }
.marquee-item {
  display: flex;
  align-items: center;
  gap: 20px;
  padding: 0 20px;
  font-family: var(--font-heading);
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  color: var(--text-dim);
  white-space: nowrap;
}
.marquee-item .mdot {
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: var(--red);
  opacity: 0.4;
  flex-shrink: 0;
}
@keyframes marqueeRoll { to { transform: translateX(-50%); } }
.marquee-band.reverse .marquee-track { animation-direction: reverse; }

/* ================================================================
   STATUS PANEL (Live Server + Eagler)
================================================================ */
.status-section {
  max-width: 1240px;
  margin: 0 auto;
  padding: 0 24px 80px;
}
.status-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

.status-panel {
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  background: var(--surface);
  overflow: hidden;
  transition: border-color var(--t-mid);
}
.status-panel:hover { border-color: var(--line-2); }

.status-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 22px;
  border-bottom: 1px solid var(--line);
}
.status-panel-title {
  display: flex;
  align-items: center;
  gap: 10px;
  font-family: var(--font-heading);
  font-size: 0.88rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  color: var(--white);
}
.status-panel-icon {
  width: 30px;
  height: 30px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.9rem;
  flex-shrink: 0;
}
.panel-mc .status-panel-icon { background: rgba(77,216,232,0.1); }
.panel-eagler .status-panel-icon { background: var(--red-glow); }

.status-badge {
  display: flex;
  align-items: center;
  gap: 5px;
  font-family: var(--font-mono);
  font-size: 0.58rem;
  letter-spacing: 0.08em;
  padding: 4px 10px;
  border-radius: var(--r-pill);
}
.status-badge.online { background: var(--green-dim); color: var(--green); border: 1px solid rgba(61,226,160,0.18); }
.status-badge.offline { background: rgba(224,51,51,0.08); color: var(--red); border: 1px solid rgba(224,51,51,0.18); }
.status-badge.loading { background: var(--amber-dim); color: var(--amber); border: 1px solid rgba(240,168,50,0.18); }
.sbdot { width: 5px; height: 5px; border-radius: 50%; background: currentColor; }
.status-badge.online .sbdot { animation: pulseGreen 1.8s ease-in-out infinite; }

.status-panel-body { padding: 20px 22px; }

.stat-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 9px 0;
  border-bottom: 1px solid var(--line);
}
.stat-row:last-child { border-bottom: none; }
.stat-key {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.08em;
  color: var(--text-dim);
}
.stat-val {
  font-family: var(--font-mono);
  font-size: 0.75rem;
  font-weight: 500;
  color: var(--text);
}
.stat-val.cyan { color: var(--cyan); }
.stat-val.green { color: var(--green); }
.stat-val.red { color: var(--red); }
.stat-val.amber { color: var(--amber); }

.players-bar-wrap {
  margin-top: 16px;
}
.players-bar-label {
  display: flex;
  justify-content: space-between;
  font-family: var(--font-mono);
  font-size: 0.58rem;
  color: var(--text-dim);
  margin-bottom: 7px;
}
.players-bar {
  height: 3px;
  background: var(--surface-2);
  border-radius: 3px;
  overflow: hidden;
}
.players-bar-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--cyan), var(--green));
  border-radius: 3px;
  transition: width 0.8s var(--ease-out-expo);
}

/* Motd display */
.motd-box {
  margin-top: 14px;
  padding: 10px 14px;
  background: rgba(255,255,255,0.022);
  border-radius: var(--r-md);
  border: 1px solid var(--line);
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: var(--text-muted);
  line-height: 1.5;
  word-break: break-word;
}

/* Error box */
.error-box {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 14px;
  border-radius: var(--r-md);
  background: rgba(224,51,51,0.05);
  border: 1px solid rgba(224,51,51,0.12);
  font-family: var(--font-mono);
  font-size: 0.68rem;
  color: rgba(224,51,51,0.8);
  margin-top: 8px;
}

/* Loading skeleton */
.skel {
  background: linear-gradient(90deg, var(--surface) 25%, var(--surface-2) 50%, var(--surface) 75%);
  background-size: 200% 100%;
  animation: shimmer 1.5s infinite;
  border-radius: 4px;
  height: 12px;
}
@keyframes shimmer {
  0% { background-position: 200% 0; }
  100% { background-position: -200% 0; }
}

/* ================================================================
   GAME MODES SECTION
================================================================ */
.modes-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 40px;
  flex-wrap: wrap;
  gap: 20px;
}

.modes-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
}

.mode-card {
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  background: var(--surface);
  overflow: hidden;
  transition: border-color 0.3s, transform 0.3s var(--ease-out-expo), box-shadow 0.3s;
  cursor: pointer;
  position: relative;
}
.mode-card::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, var(--card-tint, rgba(224,51,51,0.04)), transparent 60%);
  opacity: 0;
  transition: opacity 0.3s;
  pointer-events: none;
}
.mode-card:hover {
  border-color: var(--card-accent, rgba(224,51,51,0.35));
  transform: translateY(-4px);
  box-shadow: 0 16px 40px -12px var(--card-shadow, rgba(224,51,51,0.15));
}
.mode-card:hover::after { opacity: 1; }
.mode-card.is-open {
  border-color: var(--card-accent, rgba(224,51,51,0.3));
}

/* Featured card spans 2 columns */
.mode-card.featured { grid-column: span 2; }

/* Color themes per mode */
.mode-lifesteal {
  --card-tint: rgba(224,51,51,0.06);
  --card-accent: rgba(224,51,51,0.4);
  --card-shadow: rgba(224,51,51,0.2);
  --card-color: var(--red);
}
.mode-pvp {
  --card-tint: rgba(240,168,50,0.05);
  --card-accent: rgba(240,168,50,0.3);
  --card-shadow: rgba(240,168,50,0.15);
  --card-color: var(--amber);
}
.mode-creative {
  --card-tint: rgba(155,115,248,0.05);
  --card-accent: rgba(155,115,248,0.3);
  --card-shadow: rgba(155,115,248,0.15);
  --card-color: var(--purple);
}
.mode-hardcore {
  --card-tint: rgba(224,51,51,0.08);
  --card-accent: rgba(160,30,30,0.5);
  --card-shadow: rgba(160,30,30,0.2);
  --card-color: #c02020;
}
.mode-bedwars {
  --card-tint: rgba(77,216,232,0.04);
  --card-accent: rgba(77,216,232,0.3);
  --card-shadow: rgba(77,216,232,0.15);
  --card-color: var(--cyan);
}
.mode-hub {
  --card-tint: rgba(61,226,160,0.04);
  --card-accent: rgba(61,226,160,0.28);
  --card-shadow: rgba(61,226,160,0.12);
  --card-color: var(--green);
}

.mode-card-top {
  padding: 22px 22px 18px;
}
.mode-icon-row {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 14px;
}
.mode-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--line);
  flex-shrink: 0;
}
.mode-badge {
  font-family: var(--font-mono);
  font-size: 0.55rem;
  letter-spacing: 0.1em;
  color: var(--card-color, var(--red));
  background: rgba(255,255,255,0.04);
  border: 1px solid currentColor;
  border-color: var(--card-accent, rgba(224,51,51,0.3));
  padding: 3px 9px;
  border-radius: var(--r-pill);
  opacity: 0.8;
}
.mode-name {
  font-family: var(--font-display);
  font-size: 1.6rem;
  letter-spacing: 0.05em;
  color: var(--white);
  line-height: 1;
  margin-bottom: 7px;
}
.mode-desc {
  font-size: 0.82rem;
  color: var(--text-muted);
  line-height: 1.6;
}

.mode-expand-btn {
  display: flex;
  align-items: center;
  gap: 6px;
  margin-top: 14px;
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.1em;
  color: var(--text-dim);
  transition: color var(--t-fast);
  background: none;
  border: none;
  padding: 0;
}
.mode-card:hover .mode-expand-btn { color: var(--card-color, var(--red)); }
.mode-expand-arrow {
  display: inline-block;
  transition: transform 0.3s var(--ease-out-expo);
  font-size: 0.65rem;
}
.mode-card.is-open .mode-expand-arrow { transform: rotate(180deg); }

.mode-card-bottom {
  border-top: 1px solid var(--line);
  background: rgba(255,255,255,0.014);
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.5s var(--ease-out-expo);
}
.mode-card.is-open .mode-card-bottom { max-height: 700px; }
.mode-card-bottom-inner { padding: 20px 22px 22px; }

.mode-stats-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
  gap: 10px;
  margin-bottom: 18px;
}
.mode-stat {
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--line);
  border-radius: var(--r-md);
  padding: 12px 14px;
}
.mode-stat-label {
  font-family: var(--font-mono);
  font-size: 0.55rem;
  letter-spacing: 0.08em;
  color: var(--text-dim);
  margin-bottom: 5px;
}
.mode-stat-value {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--card-color, var(--white));
  letter-spacing: 0.03em;
}

.mode-features {
  display: flex;
  flex-direction: column;
  gap: 7px;
}
.mode-feature {
  display: flex;
  align-items: flex-start;
  gap: 9px;
  font-size: 0.8rem;
  color: var(--text-muted);
  line-height: 1.45;
}
.mode-feature::before {
  content: '›';
  color: var(--card-color, var(--red));
  flex-shrink: 0;
  font-size: 0.9rem;
  margin-top: -1px;
}

/* ================================================================
   PLATFORM / PLAY SECTION
================================================================ */
.platforms-bg {
  background: var(--surface);
  border-top: 1px solid var(--line);
  border-bottom: 1px solid var(--line);
  padding: 100px 0;
  margin: 40px 0;
}
.platforms-inner { max-width: 1240px; margin: 0 auto; padding: 0 24px; }

.platforms-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
  margin-top: 50px;
}

.platform-card {
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  background: var(--ink-2);
  padding: 30px 24px;
  text-align: center;
  transition: all 0.3s var(--ease-out-expo);
  position: relative;
  overflow: hidden;
}
.platform-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: var(--platform-color, var(--red));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s var(--ease-out-expo);
}
.platform-card:hover {
  border-color: var(--platform-border, var(--line-2));
  transform: translateY(-6px);
  box-shadow: 0 20px 50px -20px var(--platform-shadow, rgba(0,0,0,0.3));
}
.platform-card:hover::before { transform: scaleX(1); }

.platform-java   { --platform-color: var(--amber);  --platform-border: rgba(240,168,50,0.3); --platform-shadow: rgba(240,168,50,0.15); }
.platform-bedrock{ --platform-color: var(--green);  --platform-border: rgba(61,226,160,0.3); --platform-shadow: rgba(61,226,160,0.12); }
.platform-browser{ --platform-color: var(--cyan);   --platform-border: rgba(77,216,232,0.3); --platform-shadow: rgba(77,216,232,0.15); }

.platform-icon-wrap {
  width: 56px;
  height: 56px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.6rem;
  margin: 0 auto 16px;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--line);
}
.platform-card h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  color: var(--white);
  margin-bottom: 8px;
}
.platform-card p {
  font-size: 0.82rem;
  color: var(--text-muted);
  line-height: 1.6;
  margin-bottom: 20px;
}
.platform-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.08em;
  color: var(--platform-color, var(--text-muted));
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--platform-border, var(--line));
  padding: 5px 12px;
  border-radius: var(--r-pill);
  margin-bottom: 14px;
}

.browser-launch-btns {
  display: flex;
  gap: 8px;
  justify-content: center;
  margin-top: 12px;
}
.browser-launch-btn {
  flex: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.06em;
  padding: 8px 12px;
  border-radius: var(--r-md);
  border: 1px solid;
  transition: all var(--t-fast);
}
.blb-tab {
  border-color: rgba(77,216,232,0.25);
  color: var(--cyan);
  background: rgba(77,216,232,0.06);
}
.blb-tab:hover { background: rgba(77,216,232,0.15); transform: translateY(-1px); }
.blb-embed {
  border-color: rgba(155,115,248,0.25);
  color: var(--purple);
  background: rgba(155,115,248,0.06);
}
.blb-embed:hover { background: rgba(155,115,248,0.15); transform: translateY(-1px); }

.ip-info-strip {
  margin-top: 50px;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  background: rgba(255,255,255,0.018);
  padding: 24px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
}
.ip-info-main {
  font-family: var(--font-mono);
  font-size: 1.2rem;
  color: var(--cyan);
  letter-spacing: 0.1em;
}
.ip-info-sub {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  color: var(--text-dim);
  letter-spacing: 0.08em;
  margin-top: 3px;
}

/* ================================================================
   FEATURES SECTION
================================================================ */
.features-layout {
  display: grid;
  grid-template-columns: 1fr 420px;
  gap: 60px;
  align-items: start;
}

.feature-list { display: flex; flex-direction: column; gap: 10px; }

.feature-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 16px 18px;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  background: var(--surface);
  transition: all var(--t-mid);
}
.feature-item:hover {
  border-color: var(--line-2);
  background: var(--surface-2);
  transform: translateX(5px);
}
.feature-item-icon {
  width: 38px;
  height: 38px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--line);
}
.feature-item h4 {
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--white);
  letter-spacing: 0.02em;
  margin-bottom: 3px;
}
.feature-item p { font-size: 0.8rem; color: var(--text-muted); line-height: 1.55; }

/* Spec card */
.spec-card {
  border: 1px solid var(--line);
  border-radius: var(--r-xl);
  background: var(--surface);
  padding: 28px;
  position: sticky;
  top: 90px;
}
.spec-card-title {
  font-family: var(--font-heading);
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  color: var(--text-muted);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.spec-card-title::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--line);
}

.spec-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 11px 0;
  border-bottom: 1px solid var(--line);
}
.spec-item:last-child { border-bottom: none; }
.spec-item-key {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.08em;
  color: var(--text-dim);
}
.spec-item-val {
  font-family: var(--font-mono);
  font-size: 0.72rem;
  color: var(--text);
  font-weight: 500;
}
.spec-item-val.live { color: var(--green); }
.spec-item-val.hl { color: var(--cyan); }
.spec-item-val.warn { color: var(--amber); }

/* Uptime blocks */
.uptime-row {
  margin-top: 20px;
  padding-top: 18px;
  border-top: 1px solid var(--line);
}
.uptime-label {
  font-family: var(--font-mono);
  font-size: 0.58rem;
  color: var(--text-dim);
  letter-spacing: 0.08em;
  margin-bottom: 9px;
}
.uptime-blocks {
  display: grid;
  grid-template-columns: repeat(15, 1fr);
  gap: 3px;
}
.uptime-block {
  height: 22px;
  border-radius: 4px;
  background: rgba(61,226,160,0.5);
  animation: blockIn 0.3s var(--ease-out-expo) backwards;
}
.uptime-block.partial { background: rgba(240,168,50,0.4); }
.uptime-block.down    { background: rgba(224,51,51,0.35); }
@keyframes blockIn {
  from { transform: scaleY(0); opacity: 0; }
}

/* ================================================================
   STAFF SECTION TEASER
================================================================ */
.staff-section {
  background: var(--surface);
  border-top: 1px solid var(--line);
  border-bottom: 1px solid var(--line);
  padding: 100px 0;
}
.staff-inner { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
.staff-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}
.staff-roles {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 28px;
}
.staff-role {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  border: 1px solid var(--line);
  border-radius: var(--r-md);
  background: rgba(255,255,255,0.022);
  transition: all var(--t-fast);
}
.staff-role:hover {
  border-color: var(--red);
  background: rgba(224,51,51,0.04);
}
.staff-role-name {
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--white);
  letter-spacing: 0.04em;
}
.staff-role-badge {
  font-family: var(--font-mono);
  font-size: 0.55rem;
  letter-spacing: 0.1em;
  padding: 3px 8px;
  border-radius: var(--r-pill);
  border: 1px solid;
}
.srb-open  { color: var(--green); border-color: rgba(61,226,160,0.3); background: var(--green-dim); }
.srb-limited { color: var(--amber); border-color: rgba(240,168,50,0.3); background: var(--amber-dim); }
.srb-closed { color: var(--text-dim); border-color: var(--line); }

.staff-info-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.staff-info-item {
  display: flex;
  gap: 14px;
  align-items: flex-start;
}
.staff-info-num {
  font-family: var(--font-display);
  font-size: 1.8rem;
  color: var(--red);
  line-height: 1;
  flex-shrink: 0;
  width: 40px;
}
.staff-info-item h4 {
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 3px;
}
.staff-info-item p { font-size: 0.8rem; color: var(--text-muted); line-height: 1.55; }

/* ================================================================
   CTA SECTION
================================================================ */
.cta-wrapper {
  max-width: 860px;
  margin: 0 auto;
  padding: 0 24px 100px;
}
.cta-box {
  border: 1px solid var(--line);
  border-radius: var(--r-xl);
  background: var(--surface);
  padding: 60px 48px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.cta-box::before {
  content: '';
  position: absolute;
  top: -80px;
  left: 50%;
  transform: translateX(-50%);
  width: 400px;
  height: 200px;
  background: radial-gradient(ellipse, rgba(224,51,51,0.08), transparent 70%);
  pointer-events: none;
}
.cta-box h2 {
  font-family: var(--font-display);
  font-size: clamp(2.5rem, 5vw, 4rem);
  letter-spacing: 0.05em;
  color: var(--white);
  line-height: 1;
  margin-bottom: 14px;
}
.cta-box p { font-size: 0.95rem; color: var(--text-muted); max-width: 400px; margin: 0 auto 32px; line-height: 1.65; }
.cta-btns { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
.cta-sub {
  margin-top: 22px;
  font-family: var(--font-mono);
  font-size: 0.65rem;
  color: var(--text-dim);
  letter-spacing: 0.06em;
}
.cta-sub span { color: var(--cyan); }

/* ================================================================
   FOOTER
================================================================ */
.site-footer {
  border-top: 1px solid var(--line);
  padding: 52px 24px 28px;
}
.footer-inner {
  max-width: 1240px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1.8fr 1fr 1fr 1fr;
  gap: 50px;
  padding-bottom: 40px;
  border-bottom: 1px solid var(--line);
}
.footer-brand p {
  font-size: 0.8rem;
  color: var(--text-muted);
  margin-top: 12px;
  max-width: 240px;
  line-height: 1.65;
}
.footer-col-title {
  font-family: var(--font-heading);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  color: var(--text-dim);
  margin-bottom: 14px;
}
.footer-col ul { display: flex; flex-direction: column; gap: 10px; }
.footer-col a {
  font-size: 0.82rem;
  color: var(--text-muted);
  transition: color var(--t-fast);
}
.footer-col a:hover { color: var(--white); }

.footer-bottom {
  max-width: 1240px;
  margin: 22px auto 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.08em;
  color: var(--text-dim);
  flex-wrap: wrap;
  gap: 10px;
}
.footer-bottom a { color: var(--red); }

/* ================================================================
   REVEAL ANIMATIONS
================================================================ */
@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(22px); }
  to   { opacity: 1; transform: translateY(0); }
}
.reveal {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.7s var(--ease-out-expo),
              transform 0.7s var(--ease-out-expo);
}
.reveal.in { opacity: 1; transform: translateY(0); }
.reveal-d1 { transition-delay: 0.08s; }
.reveal-d2 { transition-delay: 0.16s; }
.reveal-d3 { transition-delay: 0.24s; }
.reveal-d4 { transition-delay: 0.32s; }
.reveal-d5 { transition-delay: 0.40s; }
.reveal-d6 { transition-delay: 0.48s; }

/* ================================================================
   TOAST SYSTEM
================================================================ */
#toast-root {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 9990;
  display: flex;
  flex-direction: column;
  gap: 8px;
  pointer-events: none;
  max-width: 340px;
}
.toast {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 12px 16px;
  border-radius: var(--r-lg);
  border: 1px solid var(--line);
  background: rgba(10,11,20,0.96);
  backdrop-filter: blur(16px);
  font-family: var(--font-mono);
  font-size: 0.68rem;
  color: var(--text);
  line-height: 1.5;
  animation: toastIn 0.35s var(--ease-out-expo), toastOut 0.3s var(--ease-out-expo) 2.7s forwards;
  pointer-events: none;
}
.toast-icon { flex-shrink: 0; font-size: 0.9rem; }
.toast-ok  { border-color: rgba(61,226,160,0.25); }
.toast-err { border-color: rgba(224,51,51,0.25); }
.toast-wrn { border-color: rgba(240,168,50,0.25); }
@keyframes toastIn  { from { opacity:0; transform: translateY(12px) scale(0.95); } to { opacity:1; transform:none; } }
@keyframes toastOut { from { opacity:1; } to { opacity:0; transform: translateY(-8px); } }

/* ================================================================
   BROWSER OVERLAY (fullscreen embed)
================================================================ */
#browser-overlay {
  position: fixed;
  inset: 0;
  z-index: 600;
  display: flex;
  flex-direction: column;
  background: #000;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.45s var(--ease-out-expo);
}
#browser-overlay.open {
  opacity: 1;
  pointer-events: all;
}
.browser-bar {
  height: 50px;
  flex-shrink: 0;
  background: rgba(8,9,16,0.97);
  border-bottom: 1px solid var(--line);
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 0 16px;
}
.browser-bar-logo { font-family: var(--font-display); font-size: 0.95rem; letter-spacing: 0.06em; color: var(--white); flex-shrink: 0; }
.browser-bar-url {
  flex: 1;
  font-family: var(--font-mono);
  font-size: 0.65rem;
  color: var(--text-muted);
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--line);
  border-radius: var(--r-pill);
  padding: 5px 14px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.browser-close-btn {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.06em;
  background: rgba(224,51,51,0.08);
  border: 1px solid rgba(224,51,51,0.2);
  color: var(--red);
  border-radius: var(--r-pill);
  padding: 5px 14px;
  flex-shrink: 0;
  cursor: pointer;
  transition: all var(--t-fast);
}
.browser-close-btn:hover { background: rgba(224,51,51,0.18); }
.browser-loading-screen {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 14px;
  color: var(--text-muted);
  font-family: var(--font-mono);
  font-size: 0.72rem;
}
.spinner {
  width: 36px;
  height: 36px;
  border: 2px solid rgba(255,255,255,0.08);
  border-top-color: var(--red);
  border-radius: 50%;
  animation: spin 0.75s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }
#browser-frame {
  flex: 1;
  width: 100%;
  border: none;
  display: none;
}
/* slide-in animation for embed */
#browser-overlay.open .browser-bar,
#browser-overlay.open #browser-frame,
#browser-overlay.open .browser-loading-screen {
  animation: slideDown 0.5s var(--ease-out-expo) both;
}
@keyframes slideDown {
  from { opacity: 0; transform: translateY(-10px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ================================================================
   STAFF APPLICATION MODAL
================================================================ */
#app-backdrop {
  position: fixed;
  inset: 0;
  z-index: 400;
  background: rgba(8,9,16,0.88);
  backdrop-filter: blur(14px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 16px;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.35s var(--ease-out-expo);
}
#app-backdrop.open {
  opacity: 1;
  pointer-events: all;
}
#app-modal {
  width: 100%;
  max-width: 720px;
  max-height: 92vh;
  overflow-y: auto;
  background: var(--ink-2);
  border: 1px solid var(--line-2);
  border-radius: var(--r-xl);
  transform: translateY(28px) scale(0.97);
  transition: transform 0.4s var(--ease-out-expo);
  scrollbar-width: thin;
  scrollbar-color: rgba(224,51,51,0.25) transparent;
}
#app-backdrop.open #app-modal { transform: none; }
#app-modal::-webkit-scrollbar { width: 4px; }
#app-modal::-webkit-scrollbar-thumb { background: rgba(224,51,51,0.2); border-radius: 4px; }

.modal-header {
  position: sticky;
  top: 0;
  z-index: 10;
  background: var(--ink-2);
  border-bottom: 1px solid var(--line);
  padding: 22px 24px 18px;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 14px;
}
.modal-header-left {}
.modal-eyebrow {
  font-family: var(--font-mono);
  font-size: 0.58rem;
  letter-spacing: 0.16em;
  color: var(--red);
  margin-bottom: 4px;
}
.modal-title {
  font-family: var(--font-display);
  font-size: 1.7rem;
  letter-spacing: 0.05em;
  color: var(--white);
  line-height: 1;
}
.modal-close {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: var(--surface);
  border: 1px solid var(--line);
  color: var(--text-muted);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.9rem;
  cursor: pointer;
  transition: all var(--t-fast);
  flex-shrink: 0;
}
.modal-close:hover { background: rgba(224,51,51,0.1); border-color: var(--red); color: var(--red); }

/* Progress bar */
.progress-wrap {
  padding: 16px 24px 0;
}
.progress-bar {
  height: 3px;
  background: var(--surface-2);
  border-radius: 3px;
  overflow: hidden;
}
.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--red), var(--amber));
  border-radius: 3px;
  transition: width 0.4s var(--ease-out-expo);
}
.progress-info {
  display: flex;
  justify-content: space-between;
  margin-top: 7px;
  font-family: var(--font-mono);
  font-size: 0.58rem;
  color: var(--text-dim);
  padding-bottom: 16px;
  border-bottom: 1px solid var(--line);
}

/* Timer bar */
.timer-bar {
  margin: 14px 24px;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 16px;
  border: 1px solid rgba(77,216,232,0.15);
  border-radius: var(--r-md);
  background: rgba(77,216,232,0.03);
}
.timer-label {
  font-family: var(--font-mono);
  font-size: 0.58rem;
  letter-spacing: 0.1em;
  color: var(--text-dim);
  flex: 1;
}
.timer-val {
  font-family: var(--font-mono);
  font-size: 0.82rem;
  color: var(--cyan);
  letter-spacing: 0.06em;
}

/* Anti-paste notice */
.no-paste-banner {
  margin: 0 24px 4px;
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 11px 14px;
  border-radius: var(--r-md);
  background: rgba(240,168,50,0.05);
  border: 1px solid rgba(240,168,50,0.14);
}
.npb-icon { font-size: 0.85rem; flex-shrink: 0; }
.npb-text {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  color: rgba(240,168,50,0.75);
  line-height: 1.55;
  letter-spacing: 0.02em;
}

/* Form body */
.modal-body { padding: 18px 24px 0; }

/* Form sections */
.form-section { margin-bottom: 28px; }
.form-section-title {
  font-family: var(--font-heading);
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  color: var(--red);
  margin-bottom: 16px;
  padding-bottom: 8px;
  border-bottom: 1px solid var(--line);
  display: flex;
  align-items: center;
  gap: 8px;
}

/* Form groups */
.form-group { margin-bottom: 14px; }
.form-label {
  display: block;
  font-family: var(--font-heading);
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--text);
  letter-spacing: 0.02em;
  margin-bottom: 6px;
}
.qnum { font-family: var(--font-mono); font-size: 0.6rem; color: var(--text-dim); margin-right: 4px; }
.req  { color: var(--red); margin-left: 2px; }

.form-control {
  width: 100%;
  background: rgba(255,255,255,0.028);
  border: 1px solid var(--line);
  border-radius: var(--r-md);
  color: var(--text);
  font-size: 0.875rem;
  padding: 9px 13px;
  outline: none;
  transition: border-color var(--t-fast), background var(--t-fast), box-shadow var(--t-fast);
  -webkit-user-select: text;
  user-select: text;
}
.form-control:focus {
  border-color: rgba(224,51,51,0.4);
  background: rgba(224,51,51,0.03);
  box-shadow: 0 0 0 3px rgba(224,51,51,0.07);
}
textarea.form-control { resize: vertical; min-height: 90px; line-height: 1.6; }
select.form-control {
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23383f5a' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 36px;
}
select.form-control option { background: #0d0f18; color: var(--text); }

/* No-paste inputs */
.form-control.np { user-select: none; }
.form-control.np:focus { caret-color: var(--red); }

.form-hint {
  font-size: 0.7rem;
  color: var(--text-dim);
  margin-top: 5px;
  line-height: 1.4;
}
.form-hint.warn { color: rgba(240,168,50,0.7); }
.form-error {
  font-size: 0.7rem;
  color: var(--red);
  margin-top: 4px;
  display: none;
}
.form-group.err .form-control { border-color: rgba(224,51,51,0.5); }
.form-group.err .form-error  { display: block; }

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}

/* Typing test */
.typing-test-wrapper {
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  overflow: hidden;
  margin-bottom: 12px;
}
.typing-prompt-area {
  padding: 16px 18px;
  background: rgba(255,255,255,0.016);
  font-family: var(--font-mono);
  font-size: 0.78rem;
  line-height: 1.9;
  letter-spacing: 0.02em;
  min-height: 80px;
  border-bottom: 1px solid var(--line);
  user-select: none;
}
.tc        { color: var(--text-dim); transition: color 0.05s; }
.tc.ok     { color: var(--green); }
.tc.bad    { color: var(--red); background: rgba(224,51,51,0.1); border-radius: 2px; }
.tc.cur    { border-bottom: 2px solid var(--cyan); color: var(--white); }
.typing-input-area {
  padding: 12px 18px;
  border-bottom: 1px solid var(--line);
}
.typing-input {
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.82rem;
  caret-color: var(--red);
}
.typing-stats-row {
  display: flex;
  gap: 24px;
  padding: 10px 18px;
  flex-wrap: wrap;
}
.typing-stat {
  display: flex;
  flex-direction: column;
  gap: 2px;
}
.typing-stat-val {
  font-family: var(--font-display);
  font-size: 1.1rem;
  color: var(--white);
  letter-spacing: 0.04em;
}
.typing-stat-val.good { color: var(--green); }
.typing-stat-label {
  font-family: var(--font-mono);
  font-size: 0.55rem;
  letter-spacing: 0.08em;
  color: var(--text-dim);
}
.typing-status-row {
  padding: 8px 18px 12px;
  font-family: var(--font-mono);
  font-size: 0.62rem;
  color: var(--text-dim);
  letter-spacing: 0.06em;
}
.ts-ready   { color: var(--amber); }
.ts-running { color: var(--cyan); }
.ts-done    { color: var(--green); }

/* Submit footer */
.modal-footer {
  position: sticky;
  bottom: 0;
  background: var(--ink-2);
  border-top: 1px solid var(--line);
  padding: 18px 24px;
}
.modal-footer-note {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  color: var(--text-dim);
  line-height: 1.6;
  margin-bottom: 12px;
  letter-spacing: 0.02em;
}
.submit-btn {
  width: 100%;
  padding: 13px;
  font-family: var(--font-heading);
  font-size: 0.88rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  background: var(--red);
  color: var(--white);
  border: none;
  border-radius: var(--r-lg);
  cursor: pointer;
  transition: all 0.25s var(--ease-out-expo);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  box-shadow: 0 4px 20px rgba(224,51,51,0.25);
}
.submit-btn:hover {
  background: #f03838;
  transform: translateY(-2px);
  box-shadow: 0 8px 28px rgba(224,51,51,0.4);
}
.submit-btn:disabled {
  opacity: 0.45;
  cursor: not-allowed;
  transform: none;
  box-shadow: none;
}
.submit-spinner {
  width: 16px;
  height: 16px;
  border: 2px solid rgba(255,255,255,0.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: spin 0.7s linear infinite;
  display: none;
}
.submitting .submit-btn-text { display: none; }
.submitting .submit-spinner  { display: block; }

/* Result screen */
#app-result {
  padding: 60px 24px;
  text-align: center;
  display: none;
}
#app-result.show { display: block; }
.result-icon { font-size: 3.5rem; margin-bottom: 18px; }
.result-title {
  font-family: var(--font-display);
  font-size: 2rem;
  letter-spacing: 0.05em;
  color: var(--white);
  margin-bottom: 10px;
}
.result-desc { font-size: 0.88rem; color: var(--text-muted); max-width: 400px; margin: 0 auto; line-height: 1.65; }

/* ================================================================
   RESPONSIVE
================================================================ */
@media (max-width: 1024px) {
  .features-layout { grid-template-columns: 1fr; }
  .spec-card { position: static; }
  .footer-inner { grid-template-columns: 1fr 1fr; }
  .status-grid { grid-template-columns: 1fr; }
}
@media (max-width: 860px) {
  .modes-grid { grid-template-columns: 1fr 1fr; }
  .mode-card.featured { grid-column: span 2; }
  .platforms-grid { grid-template-columns: 1fr; }
  .staff-layout { grid-template-columns: 1fr; }
}
@media (max-width: 680px) {
  .nav-links { display: none; }
  .modes-grid { grid-template-columns: 1fr; }
  .mode-card.featured { grid-column: span 1; }
  .form-row { grid-template-columns: 1fr; }
  .footer-inner { grid-template-columns: 1fr; }
  .footer-bottom { flex-direction: column; text-align: center; }
  .cta-box { padding: 40px 24px; }
}
@media (max-width: 480px) {
  .hero-cta { flex-direction: column; align-items: center; }
  .ip-bar { font-size: 0.72rem; }
}
</style>
</head>
<body>

<!-- Visual overlays -->
<div id="noise-overlay"></div>
<div id="vignette"></div>

<!-- Ambient blobs -->
<div class="blob blob-a"></div>
<div class="blob blob-b"></div>
<div class="blob blob-c"></div>

<!-- Particle canvas -->
<canvas id="particle-canvas"></canvas>

<!-- Toast container -->
<div id="toast-root"></div>

<!-- Custom cursor -->
<div id="cursor"></div>
<div id="cursor-ring"></div>

<!-- ================================================================
     BROWSER EMBED OVERLAY
================================================================ -->
<div id="browser-overlay">
  <div class="browser-bar">
    <div class="browser-bar-logo">⛏ PIXEL CRAFT</div>
    <div class="browser-bar-url" id="browser-url">https://tuff.youcantblockthis.com/files/1_1UT13/WASM/</div>
    <button class="browser-close-btn" id="browser-close">✕ EXIT</button>
  </div>
  <div class="browser-loading-screen" id="browser-loading">
    <div class="spinner"></div>
    <span>Loading EaglercraftX — please wait</span>
  </div>
  <iframe id="browser-frame" src="" allow="fullscreen" title="Pixel Craft EaglercraftX"></iframe>
</div>

<!-- ================================================================
     STAFF APPLICATION MODAL
================================================================ -->
<div id="app-backdrop">
  <div id="app-modal">

    <!-- Result screen (hidden until submission) -->
    <div id="app-result">
      <div class="result-icon" id="result-icon">✅</div>
      <div class="result-title" id="result-title">Application Submitted</div>
      <div class="result-desc" id="result-desc">Your application has been sent to the Pixel Craft staff team. We will review it and contact you via Discord within 5–10 business days. Thank you for applying.</div>
    </div>

    <!-- Form container -->
    <div id="app-form-wrap">
      <!-- Sticky header -->
      <div class="modal-header">
        <div class="modal-header-left">
          <div class="modal-eyebrow">PIXEL CRAFT NETWORK · STAFF APPLICATIONS</div>
          <div class="modal-title">Apply for Staff</div>
        </div>
        <button class="modal-close" id="app-close">✕</button>
      </div>

      <!-- Progress -->
      <div class="progress-wrap">
        <div class="progress-bar"><div class="progress-fill" id="prog-fill" style="width:0%"></div></div>
        <div class="progress-info">
          <span id="prog-text">0 / 30 answered</span>
          <span id="prog-time">Time: 00:00</span>
        </div>
      </div>

      <!-- Timer -->
      <div class="timer-bar">
        <span style="font-size:0.9rem;">⏱</span>
        <div class="timer-label">APPLICATION SESSION TIMER</div>
        <div class="timer-val" id="timer-display">00:00</div>
      </div>

      <!-- Anti-paste notice -->
      <div class="no-paste-banner">
        <span class="npb-icon">⚠️</span>
        <p class="npb-text">Copy &amp; paste is <strong>disabled</strong> on all text fields except Discord User ID. Applications using AI-generated or copy-pasted responses will be automatically disqualified and the applicant blacklisted.</p>
      </div>

      <div class="modal-body">

        <!-- ── SECTION 1: Identity ── -->
        <div class="form-section">
          <div class="form-section-title">👤 IDENTITY &amp; CONTACT</div>

          <div class="form-group" id="fg-age">
            <label class="form-label"><span class="qnum">Q1.</span> How old are you?<span class="req">*</span></label>
            <input type="number" class="form-control np" id="q-age" min="10" max="80" placeholder="Enter your age" autocomplete="off">
            <div class="form-hint">Minimum age to apply is 13.</div>
            <div class="form-error">A valid age is required.</div>
          </div>

          <div class="form-row">
            <div class="form-group" id="fg-duser">
              <label class="form-label"><span class="qnum">Q2.</span> Discord Username<span class="req">*</span></label>
              <input type="text" class="form-control np" id="q-duser" placeholder="e.g. username#0000" autocomplete="off">
              <div class="form-hint warn">⚠ No copy/paste.</div>
              <div class="form-error">Discord username required.</div>
            </div>
            <div class="form-group" id="fg-did">
              <label class="form-label"><span class="qnum">Q3.</span> Discord User ID<span class="req">*</span></label>
              <input type="text" class="form-control" id="q-did" placeholder="e.g. 123456789012345678" autocomplete="off">
              <div class="form-hint">Paste allowed. Settings → Advanced → Developer Mode → right-click name.</div>
              <div class="form-error">Discord User ID required.</div>
            </div>
          </div>

          <div class="form-group" id="fg-mc">
            <label class="form-label"><span class="qnum">Q4.</span> Minecraft Username<span class="req">*</span></label>
            <input type="text" class="form-control np" id="q-mc" placeholder="e.g. PixelPlayer123" autocomplete="off">
            <div class="form-error">Minecraft username required.</div>
          </div>

          <div class="form-row">
            <div class="form-group" id="fg-tz">
              <label class="form-label"><span class="qnum">Q5.</span> Your Timezone<span class="req">*</span></label>
              <select class="form-control" id="q-tz">
                <option value="">Select timezone...</option>
                <option>EST (UTC−5)</option>
                <option>CST (UTC−6)</option>
                <option>MST (UTC−7)</option>
                <option>PST (UTC−8)</option>
                <option>GMT (UTC+0)</option>
                <option>CET (UTC+1)</option>
                <option>EET (UTC+2)</option>
                <option>IST (UTC+5:30)</option>
                <option>AWST (UTC+8)</option>
                <option>AEST (UTC+10)</option>
                <option>Other</option>
              </select>
              <div class="form-error">Please select a timezone.</div>
            </div>
            <div class="form-group" id="fg-country">
              <label class="form-label"><span class="qnum">Q6.</span> Country<span class="req">*</span></label>
              <input type="text" class="form-control np" id="q-country" placeholder="e.g. United States" autocomplete="off">
              <div class="form-error">Country is required.</div>
            </div>
          </div>
        </div>

        <!-- ── SECTION 2: Availability ── -->
        <div class="form-section">
          <div class="form-section-title">📅 AVAILABILITY</div>

          <div class="form-row">
            <div class="form-group" id="fg-tstart">
              <label class="form-label"><span class="qnum">Q7.</span> Available From (EST)<span class="req">*</span></label>
              <input type="time" class="form-control" id="q-tstart">
              <div class="form-hint">Typical daily online start time.</div>
              <div class="form-error">Start time required.</div>
            </div>
            <div class="form-group" id="fg-tend">
              <label class="form-label"><span class="qnum">Q8.</span> Available Until (EST)<span class="req">*</span></label>
              <input type="time" class="form-control" id="q-tend">
              <div class="form-hint">Typical daily online end time.</div>
              <div class="form-error">End time required.</div>
            </div>
          </div>

          <div class="form-group" id="fg-hours">
            <label class="form-label"><span class="qnum">Q9.</span> Hours per Day for Staff Duties<span class="req">*</span></label>
            <select class="form-control" id="q-hours">
              <option value="">Select...</option>
              <option>1–2 hours</option>
              <option>2–4 hours</option>
              <option>4–6 hours</option>
              <option>6+ hours</option>
            </select>
            <div class="form-error">Please select available hours.</div>
          </div>

          <div class="form-group" id="fg-days">
            <label class="form-label"><span class="qnum">Q10.</span> Days Available per Week<span class="req">*</span></label>
            <select class="form-control" id="q-days">
              <option value="">Select...</option>
              <option>1–2 days</option>
              <option>3–4 days</option>
              <option>5–6 days</option>
              <option>All 7 days</option>
            </select>
            <div class="form-error">Please select available days.</div>
          </div>
        </div>

        <!-- ── SECTION 3: Experience ── -->
        <div class="form-section">
          <div class="form-section-title">🎮 EXPERIENCE</div>

          <div class="form-group" id="fg-mcexp">
            <label class="form-label"><span class="qnum">Q11.</span> How long have you been playing Minecraft?<span class="req">*</span></label>
            <select class="form-control" id="q-mcexp">
              <option value="">Select...</option>
              <option>Less than 1 year</option>
              <option>1–2 years</option>
              <option>3–5 years</option>
              <option>5–8 years</option>
              <option>8+ years</option>
            </select>
            <div class="form-error">Please select Minecraft experience.</div>
          </div>

          <div class="form-group" id="fg-srvexp">
            <label class="form-label"><span class="qnum">Q12.</span> How long have you been on Pixel Craft Network?<span class="req">*</span></label>
            <select class="form-control" id="q-srvexp">
              <option value="">Select...</option>
              <option>Less than 1 week</option>
              <option>1–4 weeks</option>
              <option>1–3 months</option>
              <option>3–6 months</option>
              <option>6+ months</option>
            </select>
            <div class="form-error">Please select server experience.</div>
          </div>

          <div class="form-group" id="fg-staffyn">
            <label class="form-label"><span class="qnum">Q13.</span> Previous staff experience on other servers?<span class="req">*</span></label>
            <select class="form-control" id="q-staffyn" onchange="PCN.toggleStaffDetail(this.value)">
              <option value="">Select...</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
            <div class="form-error">Please select an option.</div>
          </div>

          <div class="form-group" id="fg-staffdetail" style="display:none">
            <label class="form-label"><span class="qnum">Q14.</span> Describe your previous staff experience<span class="req">*</span></label>
            <textarea class="form-control np" id="q-staffdetail" rows="4" placeholder="Server name, your role, player count, duration, main responsibilities..."></textarea>
            <div class="form-hint warn">⚠ Write in your own words — no copy/paste.</div>
            <div class="form-error">Please describe your staff experience.</div>
          </div>

          <div class="form-group" id="fg-position">
            <label class="form-label"><span class="qnum">Q15.</span> Position you are applying for<span class="req">*</span></label>
            <select class="form-control" id="q-position">
              <option value="">Select position...</option>
              <option>Helper</option>
              <option>Moderator</option>
              <option>Senior Moderator</option>
              <option>Builder</option>
              <option>Event Manager</option>
            </select>
            <div class="form-error">Please select a position.</div>
          </div>
        </div>

        <!-- ── SECTION 4: Typing Test ── -->
        <div class="form-section">
          <div class="form-section-title">⌨️ TYPING SPEED TEST</div>
          <p style="font-size:0.8rem;color:var(--text-muted);margin-bottom:14px;line-height:1.6;">Type the text below exactly to measure your words per minute. The timer starts on your first keystroke. Your recorded WPM will be submitted with your application.</p>

          <div class="typing-test-wrapper">
            <div class="typing-prompt-area" id="typing-prompt" aria-hidden="true"></div>
            <div class="typing-input-area">
              <input type="text" class="typing-input" id="typing-input" placeholder="Start typing here..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
            </div>
            <div class="typing-stats-row">
              <div class="typing-stat">
                <div class="typing-stat-val" id="t-wpm">—</div>
                <div class="typing-stat-label">WPM</div>
              </div>
              <div class="typing-stat">
                <div class="typing-stat-val" id="t-acc">—</div>
                <div class="typing-stat-label">ACCURACY</div>
              </div>
              <div class="typing-stat">
                <div class="typing-stat-val" id="t-time">0s</div>
                <div class="typing-stat-label">TIME</div>
              </div>
              <div class="typing-stat">
                <div class="typing-stat-val" id="t-words">0</div>
                <div class="typing-stat-label">WORDS</div>
              </div>
            </div>
            <div class="typing-status-row">
              <span id="t-status" class="ts-ready">◉ Ready — begin typing to start the test</span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label"><span class="qnum">Q16.</span> Recorded WPM (auto-filled)</label>
            <input type="text" class="form-control" id="q-wpm" placeholder="Complete the typing test above..." readonly>
            <div class="form-hint">Your last completed test result is recorded here. You may retake as many times as needed.</div>
          </div>
        </div>

        <!-- ── SECTION 5: Motivation ── -->
        <div class="form-section">
          <div class="form-section-title">💡 MOTIVATION &amp; FIT</div>

          <div class="form-group" id="fg-why">
            <label class="form-label"><span class="qnum">Q17.</span> Why do you want to be a staff member on Pixel Craft Network?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-why" rows="5" placeholder="Explain your genuine motivation in at least 4 full sentences..."></textarea>
            <div class="form-hint warn">⚠ Must be written in your own words. AI responses are detected and will result in disqualification.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-standout">
            <label class="form-label"><span class="qnum">Q18.</span> What makes you stand out from other applicants?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-standout" rows="4" placeholder="Specific skills, traits, or experience that differentiate you..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-strengths">
            <label class="form-label"><span class="qnum">Q19.</span> What are your strongest qualities as a potential staff member?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-strengths" rows="4" placeholder="Communication, patience, technical skill, conflict resolution..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-weakness">
            <label class="form-label"><span class="qnum">Q20.</span> What is your biggest weakness as a potential staff member?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-weakness" rows="3" placeholder="Be honest and specific. What do you need to improve?"></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>
        </div>

        <!-- ── SECTION 6: Scenarios ── -->
        <div class="form-section">
          <div class="form-section-title">🔥 SCENARIO QUESTIONS</div>

          <div class="form-group" id="fg-s1">
            <label class="form-label"><span class="qnum">Q21.</span> A player is suspected of using kill-aura in LifeSteal SMP. Walk through your exact response.<span class="req">*</span></label>
            <textarea class="form-control np" id="q-s1" rows="5" placeholder="Observation, spectating, evidence collection, escalation, punishment steps..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-s2">
            <label class="form-label"><span class="qnum">Q22.</span> A player is repeatedly sending racial slurs in public chat. What do you do?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-s2" rows="4" placeholder="Immediate action, evidence, punishment tier, logging the incident..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-s3">
            <label class="form-label"><span class="qnum">Q23.</span> Two players are fighting and one threatens to DDoS the server. How do you respond?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-s3" rows="4" placeholder="Immediate containment, escalation path, notification process..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-s4">
            <label class="form-label"><span class="qnum">Q24.</span> You witness a fellow staff member giving items to their friend on LifeSteal. What do you do?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-s4" rows="4" placeholder="Documentation, reporting process, approach to confrontation or escalation..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-s5">
            <label class="form-label"><span class="qnum">Q25.</span> A player DMs you directly claiming they were falsely banned. Describe your full process.<span class="req">*</span></label>
            <textarea class="form-control np" id="q-s5" rows="4" placeholder="Your reply to the player, appeal process, investigation steps..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>
        </div>

        <!-- ── SECTION 7: Technical ── -->
        <div class="form-section">
          <div class="form-section-title">🛠️ TECHNICAL &amp; COMMUNITY KNOWLEDGE</div>

          <div class="form-group" id="fg-rules">
            <label class="form-label"><span class="qnum">Q26.</span> List at least 4 server rules you know on Pixel Craft Network.<span class="req">*</span></label>
            <textarea class="form-control np" id="q-rules" rows="4" placeholder="Rule 1: No hacking or exploiting any bugs or glitches...&#10;Rule 2: Respect all players regardless of rank..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-record">
            <label class="form-label"><span class="qnum">Q27.</span> Are you able to screen-record evidence against rulebreakers?<span class="req">*</span></label>
            <select class="form-control" id="q-record">
              <option value="">Select...</option>
              <option>Yes, I can always record</option>
              <option>Yes, with occasional limitations</option>
              <option>No, I cannot record</option>
            </select>
            <div class="form-error">Please select an option.</div>
          </div>

          <div class="form-group" id="fg-plugins">
            <label class="form-label"><span class="qnum">Q28.</span> List any Minecraft moderation plugins or tools you have experience with.<span class="req">*</span></label>
            <textarea class="form-control np" id="q-plugins" rows="3" placeholder="e.g. LiteBans, CoreProtect, AdvancedBan, EssentialsX, DiscordSRV, FAWE..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group" id="fg-improve">
            <label class="form-label"><span class="qnum">Q29.</span> If you could improve one thing about Pixel Craft Network, what would it be and why?<span class="req">*</span></label>
            <textarea class="form-control np" id="q-improve" rows="4" placeholder="Be specific and constructive. Generic or vague answers will not score well."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
            <div class="form-error">This field is required.</div>
          </div>

          <div class="form-group">
            <label class="form-label"><span class="qnum">Q30.</span> Anything else you would like the team to know?</label>
            <textarea class="form-control np" id="q-extra" rows="3" placeholder="Optional — additional skills, relevant experience, or any final comments..."></textarea>
            <div class="form-hint warn">⚠ No copy/paste.</div>
          </div>
        </div>

      </div><!-- /modal-body -->

      <!-- Sticky submit footer -->
      <div class="modal-footer">
        <div class="modal-footer-note">By submitting you confirm all answers are truthful and written in your own words. Providing false information or using AI to answer questions will result in a permanent application blacklist. Your Discord ID is needed to contact you.</div>
        <button class="submit-btn" id="app-submit-btn" onclick="PCN.submitApp()">
          <span class="submit-btn-text">📨 SUBMIT APPLICATION</span>
          <div class="submit-spinner"></div>
        </button>
      </div>

    </div><!-- /app-form-wrap -->
  </div><!-- /app-modal -->
</div><!-- /app-backdrop -->

<!-- ================================================================
     PAGE CONTENT
================================================================ -->
<div class="page">

  <!-- ── Navigation ── -->
  <nav class="nav" id="main-nav">
    <a href="#" class="nav-logo">
      <div class="nav-logo-mark">⛏</div>
      PIXEL CRAFT
    </a>
    <div class="nav-links">
      <a class="nav-link active" href="#hero" data-scroll="hero">HOME</a>
      <a class="nav-link" href="#modes" data-scroll="modes">MODES</a>
      <a class="nav-link" href="#features" data-scroll="features">FEATURES</a>
      <a class="nav-link" href="#play" data-scroll="play">JOIN</a>
      <a class="nav-link" href="#staff-section" data-scroll="staff-section">STAFF</a>
    </div>
    <div class="nav-right">
      <div class="status-pill checking" id="nav-status">
        <div class="status-dot"></div>
        <span id="nav-status-text">CHECKING</span>
      </div>
      <a href="https://discord.gg/jqPt6a563h" target="_blank" class="btn-nav">💬 DISCORD</a>
    </div>
  </nav>

  <!-- ── Hero ── -->
  <section class="hero" id="hero">
    <div class="hero-crosshair" aria-hidden="true">
      <div class="hero-ring hero-ring-1"></div>
      <div class="hero-ring hero-ring-2"></div>
      <div class="hero-ring hero-ring-3"></div>
    </div>

    <div class="hero-inner">
      <div class="hero-label">PROFESSIONAL MINECRAFT NETWORK · SEASON 2</div>
      <h1 class="hero-title">PIXEL CRAFT</h1>
      <div class="hero-title-sub">NETWORK</div>
      <p class="hero-desc">Java · Bedrock · Browser. One server, zero compromise. LifeSteal, BedWars, Creative, Hardcore, and more.</p>

      <div class="hero-cta">
        <button class="btn btn-primary btn-lg" id="hero-copy-ip">📋 COPY SERVER IP</button>
        <button class="btn btn-outline btn-lg" id="hero-browser-btn">🕹 PLAY IN BROWSER</button>
        <a href="https://discord.gg/jqPt6a563h" target="_blank" class="btn btn-ghost btn-lg">💬 DISCORD</a>
      </div>

      <div class="ip-bar" id="ip-bar">
        <span style="font-size:0.8rem;opacity:0.6;">⚡</span>
        <span id="ip-text">play.pcsmp.net</span>
        <div class="ip-bar-sep"></div>
        <span class="ip-bar-action">CLICK TO COPY</span>
      </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
      <div class="scroll-line"></div>
      <span>SCROLL</span>
    </div>
  </section>

  <!-- ── Marquee 1 ── -->
  <div class="marquee-band">
    <div class="marquee-track" id="mq1"></div>
  </div>

  <!-- ── Live Status Panels ── -->
  <div class="status-section" id="status-section">
    <div class="section-label" style="margin-bottom:20px;">SERVER STATUS</div>
    <div class="status-grid">

      <!-- Minecraft API panel -->
      <div class="status-panel panel-mc reveal">
        <div class="status-panel-header">
          <div class="status-panel-title">
            <div class="status-panel-icon">☕</div>
            Minecraft Server
          </div>
          <div class="status-badge loading" id="mc-badge">
            <span class="sbdot"></span>
            <span id="mc-badge-text">CHECKING</span>
          </div>
        </div>
        <div class="status-panel-body" id="mc-body">
          <div class="stat-row"><span class="stat-key">HOST</span><span class="stat-val cyan">play.pcsmp.net</span></div>
          <div class="stat-row"><span class="stat-key">PLAYERS</span><span class="stat-val" id="mc-players"><span class="skel" style="width:60px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">VERSION</span><span class="stat-val" id="mc-version"><span class="skel" style="width:80px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">LATENCY</span><span class="stat-val" id="mc-latency"><span class="skel" style="width:50px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">LAST CHECK</span><span class="stat-val" id="mc-time"><span class="skel" style="width:70px;"></span></span></div>
          <div class="players-bar-wrap" id="mc-bar-wrap" style="display:none">
            <div class="players-bar-label">
              <span>PLAYER LOAD</span>
              <span id="mc-bar-pct">0%</span>
            </div>
            <div class="players-bar"><div class="players-bar-fill" id="mc-bar" style="width:0%"></div></div>
          </div>
          <div class="motd-box" id="mc-motd" style="display:none"></div>
          <div class="error-box" id="mc-error" style="display:none">
            <span>⚠</span>
            <span id="mc-error-msg">Unable to reach server.</span>
          </div>
        </div>
      </div>

      <!-- Eagler panel -->
      <div class="status-panel panel-eagler reveal reveal-d1">
        <div class="status-panel-header">
          <div class="status-panel-title">
            <div class="status-panel-icon">🌐</div>
            EaglercraftX (Browser)
          </div>
          <div class="status-badge loading" id="eagler-badge">
            <span class="sbdot"></span>
            <span id="eagler-badge-text">CHECKING</span>
          </div>
        </div>
        <div class="status-panel-body">
          <div class="stat-row"><span class="stat-key">DOMAIN</span><span class="stat-val cyan">pcsmp.net</span></div>
          <div class="stat-row"><span class="stat-key">STATUS</span><span class="stat-val" id="eagler-status"><span class="skel" style="width:70px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">ERROR CODE</span><span class="stat-val" id="eagler-code"><span class="skel" style="width:100px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">CHECKED AT</span><span class="stat-val" id="eagler-time"><span class="skel" style="width:70px;"></span></span></div>
          <div class="stat-row"><span class="stat-key">PLAY URL</span><span class="stat-val cyan" style="font-size:0.62rem;word-break:break-all;">tuff.youcantblockthis.com</span></div>
          <div style="margin-top:14px;display:flex;gap:8px;flex-wrap:wrap;">
            <button class="btn btn-cyan btn-sm" onclick="PCN.openBrowserNewTab()">↗ New Tab</button>
            <button class="btn btn-sm" style="background:var(--purple-dim);color:var(--purple);border:1px solid rgba(155,115,248,0.2);" onclick="PCN.openBrowserEmbed()">⛶ Embed</button>
          </div>
          <div class="error-box" id="eagler-error" style="display:none;margin-top:14px;">
            <span>⚠</span>
            <span id="eagler-error-msg">Unable to reach EaglercraftX status API.</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Game Modes ── -->
  <section class="section" id="modes">
    <div class="modes-header">
      <div>
        <div class="section-label reveal">GAME MODES</div>
        <h2 class="section-title reveal reveal-d1">Six Worlds.<br>One Network.</h2>
        <p class="section-desc reveal reveal-d2">Click any card to expand full details, rules, and statistics.</p>
      </div>
    </div>

    <div class="modes-grid">

      <!-- LifeSteal SMP — featured, spans 2 cols -->
      <div class="mode-card mode-lifesteal featured reveal" id="mc-lifesteal">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">⚔️</div>
            <span class="mode-badge">FEATURED · SEASON 2</span>
          </div>
          <div class="mode-name">LIFESTEAL SMP</div>
          <div class="mode-desc">High-stakes survival where every kill and every death permanently changes your health. Gain hearts from victories, lose them on death — reach zero and face elimination.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-lifesteal')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">SEASON</div><div class="mode-stat-value">2</div></div>
              <div class="mode-stat"><div class="mode-stat-label">START HEARTS</div><div class="mode-stat-value">10 ❤</div></div>
              <div class="mode-stat"><div class="mode-stat-label">MAX HEARTS</div><div class="mode-stat-value">30 ❤</div></div>
              <div class="mode-stat"><div class="mode-stat-label">GAIN / KILL</div><div class="mode-stat-value">+1 ❤</div></div>
              <div class="mode-stat"><div class="mode-stat-label">LOSE / DEATH</div><div class="mode-stat-value">−1 ❤</div></div>
              <div class="mode-stat"><div class="mode-stat-label">ELIMINATED AT</div><div class="mode-stat-value">0 ❤</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">All players start Season 2 with 10 hearts. The cap of 30 hearts cannot be exceeded by any means.</div>
              <div class="mode-feature">Alliances are permitted — but betrayal is legal. Trust nobody who hasn't earned it.</div>
              <div class="mode-feature">Eliminated players are fully reset and may rejoin the next cycle.</div>
              <div class="mode-feature">Season 2 adds new craftable heart crystals that temporarily boost capacity for 30 minutes.</div>
              <div class="mode-feature">Weekly tournaments: top leaderboard earns permanent cosmetic rewards.</div>
              <div class="mode-feature">Nether dimension features exclusive high-risk PvP zones with boosted drop rates.</div>
              <div class="mode-feature">Leaderboards track most kills, most hearts, longest survival streak, and most alliances formed.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Practice PvP -->
      <div class="mode-card mode-pvp reveal reveal-d1" id="mc-pvp">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">🏹</div>
            <span class="mode-badge">COMPETITIVE</span>
          </div>
          <div class="mode-name">PRACTICE PVP</div>
          <div class="mode-desc">ELO-based ranked duels, 12+ kits, and granular statistics. Improve your mechanics and climb the global leaderboard.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-pvp')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">KITS</div><div class="mode-stat-value">12+</div></div>
              <div class="mode-stat"><div class="mode-stat-label">ARENAS</div><div class="mode-stat-value">8</div></div>
              <div class="mode-stat"><div class="mode-stat-label">RANKED</div><div class="mode-stat-value">ELO</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">ELO-based matchmaking — face opponents at your exact skill tier, no stomping.</div>
              <div class="mode-feature">Kits include: Sword, Archer, Axe, Pot, UHC, Nodebuff, Sumo, and more.</div>
              <div class="mode-feature">Detailed stats: K/D ratio, average combo length, win rate, damage dealt.</div>
              <div class="mode-feature">Monthly ranked season resets with top-10 exclusive cosmetics.</div>
              <div class="mode-feature">1v1, 2v2, and party queue available around the clock.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Creative -->
      <div class="mode-card mode-creative reveal reveal-d2" id="mc-creative">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">🎨</div>
            <span class="mode-badge">BUILD</span>
          </div>
          <div class="mode-name">CREATIVE</div>
          <div class="mode-desc">Unrestricted 128×128 plot space with WorldEdit, schematics, and community showcases.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-creative')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">PLOT SIZE</div><div class="mode-stat-value">128×128</div></div>
              <div class="mode-stat"><div class="mode-stat-label">PLOTS</div><div class="mode-stat-value">Up to 4</div></div>
              <div class="mode-stat"><div class="mode-stat-label">WORLDEDIT</div><div class="mode-stat-value">✓</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">Full WorldEdit access for all players — //copy, //paste, //rotate, //flip, brushes.</div>
              <div class="mode-feature">Schematic import and export via /schematic command.</div>
              <div class="mode-feature">Merge up to 4 adjacent plots for large-scale projects.</div>
              <div class="mode-feature">Monthly community build showcases voted on by all players.</div>
              <div class="mode-feature">Invite trusted friends to collaborate directly on your plot.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Hardcore -->
      <div class="mode-card mode-hardcore reveal reveal-d3" id="mc-hardcore">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">💀</div>
            <span class="mode-badge">EXTREME</span>
          </div>
          <div class="mode-name">HARDCORE</div>
          <div class="mode-desc">Permadeath. One life. When you die, your world resets. Only the disciplined and patient survive.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-hardcore')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">DIFFICULTY</div><div class="mode-stat-value">HARD</div></div>
              <div class="mode-stat"><div class="mode-stat-label">ON DEATH</div><div class="mode-stat-value">RESET</div></div>
              <div class="mode-stat"><div class="mode-stat-label">HALL OF FAME</div><div class="mode-stat-value">✓</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">Permanent death — your world fully resets upon dying by any cause.</div>
              <div class="mode-feature">Leaderboard tracks longest surviving players in real-world days.</div>
              <div class="mode-feature">Hall of Fame immortalises milestones: 30, 90, 180, and 365+ days survived.</div>
              <div class="mode-feature">Weekly death recaps highlight the most dramatic deaths of that week.</div>
              <div class="mode-feature">Optional PvP zone exists beyond 5,000 blocks from spawn — enter at your own risk.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- BedWars -->
      <div class="mode-card mode-bedwars reveal reveal-d4" id="mc-bedwars">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">🛏️</div>
            <span class="mode-badge">TEAM</span>
          </div>
          <div class="mode-name">BEDWARS</div>
          <div class="mode-desc">Collect resources, defend your bed, and eliminate every other team. Classic execution with custom maps and mechanics.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-bedwars')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">QUEUES</div><div class="mode-stat-value">1s/2s/4s</div></div>
              <div class="mode-stat"><div class="mode-stat-label">MAPS</div><div class="mode-stat-value">15+</div></div>
              <div class="mode-stat"><div class="mode-stat-label">GENERATORS</div><div class="mode-stat-value">3-Tier</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">Solo, Duos, and Quads queues — play alone or bring your team.</div>
              <div class="mode-feature">Three-tiered resource generators: Iron, Gold, and Diamond island loot.</div>
              <div class="mode-feature">Upgrade system: bed defence, resource rate boosts, and team buffs.</div>
              <div class="mode-feature">Anti-rush grace period of 90 seconds per match start.</div>
              <div class="mode-feature">Seasonal BedWars rank with prestige cosmetics at the end of each season.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Minigames Hub -->
      <div class="mode-card mode-hub reveal reveal-d5" id="mc-hub">
        <div class="mode-card-top">
          <div class="mode-icon-row">
            <div class="mode-icon">🌀</div>
            <span class="mode-badge">HUB</span>
          </div>
          <div class="mode-name">MINIGAMES</div>
          <div class="mode-desc">SkyWars, The Bridge, KitPVP, TNT Run — rotating weekly events with global leaderboards.</div>
          <button class="mode-expand-btn" onclick="PCN.toggleMode('mc-hub')">
            SHOW MORE <span class="mode-expand-arrow">▼</span>
          </button>
        </div>
        <div class="mode-card-bottom">
          <div class="mode-card-bottom-inner">
            <div class="mode-stats-row">
              <div class="mode-stat"><div class="mode-stat-label">GAMES</div><div class="mode-stat-value">8+</div></div>
              <div class="mode-stat"><div class="mode-stat-label">EVENTS</div><div class="mode-stat-value">WEEKLY</div></div>
              <div class="mode-stat"><div class="mode-stat-label">BOARDS</div><div class="mode-stat-value">GLOBAL</div></div>
            </div>
            <div class="mode-features">
              <div class="mode-feature">SkyWars — island survival with randomised loot and chaos-mode option.</div>
              <div class="mode-feature">The Bridge — first to 5 goals in competitive 1v1 duels.</div>
              <div class="mode-feature">KitPVP — fast free-for-all with loot crates and killstreak rewards.</div>
              <div class="mode-feature">Spleef, Sumo, TNT Run, and Parkour Races — all with ghost replay.</div>
              <div class="mode-feature">Weekly community-voted special event announced every Monday in Discord.</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ── Marquee 2 ── -->
  <div class="marquee-band reverse">
    <div class="marquee-track" id="mq2"></div>
  </div>

  <!-- ── Play Anywhere ── -->
  <div class="platforms-bg" id="play">
    <div class="platforms-inner">
      <div class="section-label reveal">CROSSPLAY</div>
      <h2 class="section-title reveal reveal-d1">Play Anywhere.</h2>
      <p class="section-desc reveal reveal-d2">One server address connects Java, Bedrock, and browser. No compromise on which platform you use.</p>

      <div class="platforms-grid">

        <div class="platform-card platform-java reveal reveal-d1">
          <div class="platform-icon-wrap">☕</div>
          <h3>Java Edition</h3>
          <p>Full feature access, the best performance, and lowest latency. All game modes are available at their highest fidelity.</p>
          <div class="platform-tag">⭐ RECOMMENDED</div>
          <div style="margin-top:14px;">
            <button class="btn btn-ghost btn-sm" style="width:100%;" onclick="PCN.copyIP()">📋 Copy IP</button>
          </div>
        </div>

        <div class="platform-card platform-bedrock reveal reveal-d2">
          <div class="platform-icon-wrap">📱</div>
          <h3>Bedrock Edition</h3>
          <p>Windows, Xbox, PlayStation, Switch, and mobile. Fully crossplay with Java players on the same server.</p>
          <div class="platform-tag">✓ CROSSPLAY ENABLED</div>
          <div style="margin-top:14px;font-family:var(--font-mono);font-size:0.62rem;color:var(--text-dim);">Port: 19132</div>
        </div>

        <div class="platform-card platform-browser reveal reveal-d3">
          <div class="platform-icon-wrap">🌐</div>
          <h3>Browser (EaglercraftX)</h3>
          <p>No installation required. Open a tab and play instantly — works on any machine including school computers.</p>
          <div class="platform-tag" id="eagler-platform-tag">⬤ STATUS LOADING</div>
          <div class="browser-launch-btns">
            <button class="browser-launch-btn blb-tab" onclick="PCN.openBrowserNewTab()">↗ New Tab</button>
            <button class="browser-launch-btn blb-embed" onclick="PCN.openBrowserEmbed()">⛶ In Website</button>
          </div>
        </div>

      </div>

      <div class="ip-info-strip reveal">
        <div>
          <div class="ip-info-main">play.pcsmp.net</div>
          <div class="ip-info-sub">JAVA + BEDROCK PORT 19132 · EAGLERCRAFT BROWSER</div>
        </div>
        <button class="btn btn-primary" onclick="PCN.copyIP()">📋 Copy IP</button>
      </div>
    </div>
  </div>

  <!-- ── Features ── -->
  <section class="section" id="features">
    <div style="margin-bottom:50px;">
      <div class="section-label reveal">INFRASTRUCTURE</div>
      <h2 class="section-title reveal reveal-d1">Built Different.</h2>
      <p class="section-desc reveal reveal-d2">Custom plugins, enterprise connectivity, and a development team that ships weekly patches.</p>
    </div>

    <div class="features-layout">
      <div class="feature-list">

        <div class="feature-item reveal">
          <div class="feature-item-icon">🗣️</div>
          <div>
            <h4>Proximity Voice Chat</h4>
            <p>Spatial audio built directly into the client. Hear players around you in the game world — no Discord required, no mods needed.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d1">
          <div class="feature-item-icon">🛡️</div>
          <div>
            <h4>Multi-Layer Anti-Cheat</h4>
            <p>Automated detection combined with active staff moderation. Fair play is enforced across every game mode without exception.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d2">
          <div class="feature-item-icon">💰</div>
          <div>
            <h4>Player-Driven Economy</h4>
            <p>Auction house, custom player shops, and rare crate drops. The in-game currency is controlled by the community, not inflation.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d3">
          <div class="feature-item-icon">🔥</div>
          <div>
            <h4>Seasonal Content</h4>
            <p>Season 2 is live. Each season brings a reset, new mechanics, exclusive cosmetics, and an evolving meta.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d4">
          <div class="feature-item-icon">🔗</div>
          <div>
            <h4>True Crossplay</h4>
            <p>Java, Bedrock, and EaglercraftX share the same world state. Your progress, rank, and currency follow you across every platform.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d5">
          <div class="feature-item-icon">📡</div>
          <div>
            <h4>DDoS Protection</h4>
            <p>Enterprise-grade traffic scrubbing and automatic failover routing. Downtime from attacks is measured in seconds, not hours.</p>
          </div>
        </div>

        <div class="feature-item reveal">
          <div class="feature-item-icon">🔧</div>
          <div>
            <h4>Active Development</h4>
            <p>Weekly patches, a public roadmap, and community changelogs. Player feedback directly shapes what gets built next.</p>
          </div>
        </div>

        <div class="feature-item reveal reveal-d1">
          <div class="feature-item-icon">🏆</div>
          <div>
            <h4>Global Leaderboards</h4>
            <p>Every game mode has persistent stat tracking. Top performers each season receive exclusive rank cosmetics and Discord recognition.</p>
          </div>
        </div>

      </div>

      <!-- Spec card -->
      <div class="spec-card reveal reveal-d2">
        <div class="spec-card-title">LIVE SERVER DATA</div>

        <div class="spec-item">
          <span class="spec-item-key">ADDRESS</span>
          <span class="spec-item-val hl">play.pcsmp.net</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">STATUS</span>
          <span class="spec-item-val live" id="spec-status">—</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">PLAYERS</span>
          <span class="spec-item-val" id="spec-players">—</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">VERSION</span>
          <span class="spec-item-val" id="spec-version">—</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">EAGLERCRAFT</span>
          <span class="spec-item-val" id="spec-eagler">—</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">SEASON</span>
          <span class="spec-item-val" style="color:var(--red);">Season 2</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">LIFESTEAL MAX ❤</span>
          <span class="spec-item-val" style="color:var(--red);">30 hearts</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">LIFESTEAL START ❤</span>
          <span class="spec-item-val">10 hearts</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">CROSSPLAY</span>
          <span class="spec-item-val live">Java + Bedrock + Browser</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">ANTI-CHEAT</span>
          <span class="spec-item-val live">Active</span>
        </div>
        <div class="spec-item">
          <span class="spec-item-key">VOICE CHAT</span>
          <span class="spec-item-val live">Proximity</span>
        </div>

        <div class="uptime-row">
          <div class="uptime-label">30-DAY UPTIME RECORD</div>
          <div class="uptime-blocks" id="uptime-blocks"></div>
          <div style="display:flex;gap:14px;margin-top:8px;font-family:var(--font-mono);font-size:0.55rem;color:var(--text-dim);">
            <span style="color:rgba(61,226,160,0.6);">● Online</span>
            <span style="color:rgba(240,168,50,0.6);">● Partial</span>
            <span style="color:rgba(224,51,51,0.5);">● Down</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Staff Section ── -->
  <div class="staff-section" id="staff-section">
    <div class="staff-inner">
      <div class="staff-layout">
        <div>
          <div class="section-label reveal">JOIN THE TEAM</div>
          <h2 class="section-title reveal reveal-d1">Become Staff.</h2>
          <p class="section-desc reveal reveal-d2" style="margin-bottom:28px;">We are looking for dedicated, fair-minded players to help moderate and improve the Pixel Craft Network experience. Applications are reviewed within 5–10 business days.</p>

          <div class="staff-roles reveal reveal-d3">
            <div class="staff-role">
              <span class="staff-role-name">Helper</span>
              <span class="staff-role-badge srb-open">OPEN</span>
            </div>
            <div class="staff-role">
              <span class="staff-role-name">Moderator</span>
              <span class="staff-role-badge srb-open">OPEN</span>
            </div>
            <div class="staff-role">
              <span class="staff-role-name">Senior Moderator</span>
              <span class="staff-role-badge srb-limited">LIMITED</span>
            </div>
            <div class="staff-role">
              <span class="staff-role-name">Builder</span>
              <span class="staff-role-badge srb-open">OPEN</span>
            </div>
            <div class="staff-role">
              <span class="staff-role-name">Event Manager</span>
              <span class="staff-role-badge srb-limited">LIMITED</span>
            </div>
          </div>

          <div style="margin-top:28px;" class="reveal reveal-d4">
            <button class="btn btn-primary btn-lg" onclick="PCN.openApp()">📝 Apply Now — 30 Questions</button>
            <div style="font-family:var(--font-mono);font-size:0.6rem;color:var(--text-dim);margin-top:10px;letter-spacing:0.06em;">Anti-AI enforced · Webhook delivery · No copy/paste</div>
          </div>
        </div>

        <div class="staff-info-list">
          <div class="staff-info-item reveal">
            <div class="staff-info-num">01</div>
            <div>
              <h4>Complete the Application</h4>
              <p>30 questions covering identity, availability, experience, scenarios, and technical knowledge. All responses must be in your own words.</p>
            </div>
          </div>
          <div class="staff-info-item reveal reveal-d1">
            <div class="staff-info-num">02</div>
            <div>
              <h4>Review Period</h4>
              <p>Senior staff review each application individually within 5–10 business days. Submissions are sent directly to our private moderation Discord.</p>
            </div>
          </div>
          <div class="staff-info-item reveal reveal-d2">
            <div class="staff-info-num">03</div>
            <div>
              <h4>Discord Interview</h4>
              <p>Shortlisted applicants are contacted via Discord for a brief voice interview with the senior moderation team.</p>
            </div>
          </div>
          <div class="staff-info-item reveal reveal-d3">
            <div class="staff-info-num">04</div>
            <div>
              <h4>Two-Week Trial</h4>
              <p>Successful applicants enter a supervised 2-week trial period as Junior Staff before receiving full permissions and rank.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── CTA ── -->
  <div class="cta-wrapper">
    <div class="cta-box reveal">
      <h2>READY TO PLAY?</h2>
      <p>Join players already competing, building, and surviving on Pixel Craft Network. Season 2 is live now.</p>
      <div class="cta-btns">
        <button class="btn btn-primary btn-lg" onclick="PCN.copyIP()">📋 COPY SERVER IP</button>
        <button class="btn btn-outline btn-lg" onclick="PCN.openBrowserEmbed()">🕹 PLAY IN BROWSER</button>
        <a href="https://discord.gg/jqPt6a563h" target="_blank" class="btn btn-ghost btn-lg">💬 DISCORD</a>
      </div>
      <div class="cta-sub">Server: <span>play.pcsmp.net</span> · Java + Bedrock (port 19132) · Season 2</div>
    </div>
  </div>

  <!-- ── Footer ── -->
  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="#" class="nav-logo">
          <div class="nav-logo-mark" style="width:28px;height:28px;font-size:0.85rem;">⛏</div>
          PIXEL CRAFT
        </a>
        <p>Professional Minecraft Network. Play with purpose. Compete with integrity. Build without limits.</p>
      </div>
      <div class="footer-col">
        <div class="footer-col-title">GAME MODES</div>
        <ul>
          <li><a href="#modes" data-scroll="modes">LifeSteal SMP</a></li>
          <li><a href="#modes" data-scroll="modes">Practice PvP</a></li>
          <li><a href="#modes" data-scroll="modes">Creative</a></li>
          <li><a href="#modes" data-scroll="modes">Hardcore</a></li>
          <li><a href="#modes" data-scroll="modes">BedWars</a></li>
          <li><a href="#modes" data-scroll="modes">Minigames</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <div class="footer-col-title">PLAY</div>
        <ul>
          <li><a href="#play" data-scroll="play">Java Edition</a></li>
          <li><a href="#play" data-scroll="play">Bedrock Edition</a></li>
          <li><a href="javascript:void(0)" onclick="PCN.openBrowserNewTab()">Browser — New Tab</a></li>
          <li><a href="javascript:void(0)" onclick="PCN.openBrowserEmbed()">Browser — Embedded</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <div class="footer-col-title">COMMUNITY</div>
        <ul>
          <li><a href="https://discord.gg/jqPt6a563h" target="_blank">Discord Server</a></li>
          <li><a href="javascript:void(0)" onclick="PCN.openApp()">Staff Applications</a></li>
          <li><a href="#">Rules</a></li>
          <li><a href="#">Report a Player</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 PIXEL CRAFT NETWORK — ALL RIGHTS RESERVED</span>
      <span>play.pcsmp.net</span>
      <span>MADE FOR PLAYERS · BY PLAYERS</span>
    </div>
  </footer>

</div><!-- /.page -->

<!-- ================================================================
     JAVASCRIPT — PIXEL CRAFT NETWORK
================================================================ -->
<script>
/* ── Namespace ── */
const PCN = (() => {
  'use strict';

  /* ══════════════════════════════════════════════════
     CONSTANTS
  ══════════════════════════════════════════════════ */
  const MC_API      = 'https://api.mcsrvstat.us/2/play.pcsmp.net';
  const EAGLER_API  = 'https://topeaglerservers.com/api/status/pcsmp.net';
  const BROWSER_URL = 'https://tuff.youcantblockthis.com/files/1_1UT13/WASM/';
  const WEBHOOK_URL = 'https://discord.com/api/webhooks/1485019678517760100/6kt-k3wtBV-Hzl1n0SMaD9BctrbTlliaB1BhcOlhYiEgJTY08vp8XLpFPtZaOPzJ_Dbp';
  const SERVER_IP   = 'play.pcsmp.net';

  /* ══════════════════════════════════════════════════
     CURSOR
  ══════════════════════════════════════════════════ */
  const cur  = document.getElementById('cursor');
  const curR = document.getElementById('cursor-ring');
  let cx = -200, cy = -200, rx = -200, ry = -200;

  document.addEventListener('mousemove', e => { cx = e.clientX; cy = e.clientY; });

  (function loop() {
    rx += (cx - rx) * 0.13;
    ry += (cy - ry) * 0.13;
    cur.style.cssText  = `left:${cx}px;top:${cy}px;`;
    curR.style.cssText = `left:${rx}px;top:${ry}px;`;
    requestAnimationFrame(loop);
  })();

  function setCursorExpand(expand) {
    document.body.classList.toggle('cursor-expand', expand);
  }

  document.addEventListener('mouseover', e => {
    if (e.target.closest('a,button,.mode-card,.platform-card,.feature-item,.staff-role,.ip-bar')) setCursorExpand(true);
  });
  document.addEventListener('mouseout', e => {
    if (e.target.closest('a,button,.mode-card,.platform-card,.feature-item,.staff-role,.ip-bar')) setCursorExpand(false);
  });

  /* ══════════════════════════════════════════════════
     PARTICLE CANVAS BACKGROUND
  ══════════════════════════════════════════════════ */
  (function initParticles() {
    const canvas = document.getElementById('particle-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W = 0, H = 0, particles = [];

    const COLORS = ['rgba(224,51,51,', 'rgba(77,216,232,', 'rgba(61,226,160,', 'rgba(155,115,248,'];

    function resize() {
      W = canvas.width  = window.innerWidth;
      H = canvas.height = window.innerHeight;
    }

    function mkParticle() {
      const col = COLORS[Math.floor(Math.random() * COLORS.length)];
      return {
        x: Math.random() * W,
        y: Math.random() * H,
        r: Math.random() * 1.5 + 0.3,
        vx: (Math.random() - 0.5) * 0.25,
        vy: (Math.random() - 0.5) * 0.25,
        alpha: Math.random() * 0.35 + 0.05,
        col: col,
        twinkle: Math.random() * Math.PI * 2,
        twinkleSpeed: (Math.random() * 0.02) + 0.005,
      };
    }

    function init() {
      resize();
      const count = Math.floor((W * H) / 14000);
      particles = Array.from({ length: count }, mkParticle);
    }

    let t = 0;
    function draw() {
      ctx.clearRect(0, 0, W, H);
      t += 0.01;
      particles.forEach(p => {
        p.x += p.vx;
        p.y += p.vy;
        p.twinkle += p.twinkleSpeed;
        if (p.x < 0) p.x = W;
        if (p.x > W) p.x = 0;
        if (p.y < 0) p.y = H;
        if (p.y > H) p.y = 0;
        const a = p.alpha * (0.6 + 0.4 * Math.sin(p.twinkle));
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = p.col + a + ')';
        ctx.fill();
      });
      requestAnimationFrame(draw);
    }

    window.addEventListener('resize', () => { resize(); });
    init();
    draw();
  })();

  /* ══════════════════════════════════════════════════
     NAV SCROLL + ACTIVE LINK
  ══════════════════════════════════════════════════ */
  const mainNav = document.getElementById('main-nav');
  window.addEventListener('scroll', () => {
    mainNav.classList.toggle('solid', window.scrollY > 40);
  });

  document.querySelectorAll('[data-scroll]').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const id = link.dataset.scroll;
      const el = document.getElementById(id);
      if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  /* ══════════════════════════════════════════════════
     REVEAL OBSERVER
  ══════════════════════════════════════════════════ */
  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('in'); revealObs.unobserve(e.target); }
    });
  }, { threshold: 0.07 });
  document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

  /* ══════════════════════════════════════════════════
     TOAST
  ══════════════════════════════════════════════════ */
  function toast(msg, type = '') {
    const root = document.getElementById('toast-root');
    const el = document.createElement('div');
    const icons = { ok: '✓', err: '✕', wrn: '⚠' };
    el.className = 'toast' + (type ? ' toast-' + type : '');
    el.innerHTML = `<span class="toast-icon">${icons[type] || 'ℹ'}</span><span>${msg}</span>`;
    root.appendChild(el);
    setTimeout(() => el.remove(), 3200);
  }

  /* ══════════════════════════════════════════════════
     MARQUEE
  ══════════════════════════════════════════════════ */
  const MQ_ITEMS = [
    '⚔️ LIFESTEAL S2', '🏹 PRACTICE PVP', '🎨 CREATIVE', '💀 HARDCORE',
    '🛏️ BEDWARS', '🌀 MINIGAMES', '🌐 BROWSER PLAY', '🛡️ ANTI-CHEAT',
    '🗣️ PROXIMITY VOICE', '🔗 CROSSPLAY', '🏆 LEADERBOARDS', '🔥 SEASON 2',
    '📡 DDOS PROTECTED', '🔧 WEEKLY UPDATES', '💰 PLAYER ECONOMY', '24/7 ONLINE'
  ];

  function buildMarquee(id) {
    const el = document.getElementById(id);
    if (!el) return;
    [...MQ_ITEMS, ...MQ_ITEMS].forEach(t => {
      const item = document.createElement('div');
      item.className = 'marquee-item';
      item.innerHTML = `${t}<span class="mdot"></span>`;
      el.appendChild(item);
    });
  }
  buildMarquee('mq1');
  buildMarquee('mq2');

  /* ══════════════════════════════════════════════════
     UPTIME BLOCKS (decorative)
  ══════════════════════════════════════════════════ */
  (function buildUptime() {
    const grid = document.getElementById('uptime-blocks');
    if (!grid) return;
    const pattern = [
      1,1,1,1,1,1,1,1,1,1,1,1,1,1,
      1,1,1,1,1,1,1,1,1,1,1,1,1,1,0.5,1
    ].slice(0,30);
    pattern.forEach((v, i) => {
      const b = document.createElement('div');
      b.className = 'uptime-block' + (v === 0.5 ? ' partial' : v === 0 ? ' down' : '');
      b.style.animationDelay = (i * 0.04) + 's';
      grid.appendChild(b);
    });
  })();

  /* ══════════════════════════════════════════════════
     COPY IP
  ══════════════════════════════════════════════════ */
  function copyIP() {
    navigator.clipboard.writeText(SERVER_IP).catch(() => {});
    const bar = document.getElementById('ip-bar');
    const txt = document.getElementById('ip-text');
    if (bar) { bar.classList.add('copied'); }
    if (txt) { txt.textContent = '✓ Copied!'; }
    toast('Server IP copied to clipboard.', 'ok');
    setTimeout(() => {
      if (bar) bar.classList.remove('copied');
      if (txt) txt.textContent = SERVER_IP;
    }, 2200);
  }

  const ipBarEl   = document.getElementById('ip-bar');
  const heroCopy  = document.getElementById('hero-copy-ip');
  if (ipBarEl)  ipBarEl.addEventListener('click', copyIP);
  if (heroCopy) heroCopy.addEventListener('click', copyIP);

  /* ══════════════════════════════════════════════════
     BROWSER EMBED
  ══════════════════════════════════════════════════ */
  const overlay     = document.getElementById('browser-overlay');
  const bFrame      = document.getElementById('browser-frame');
  const bLoading    = document.getElementById('browser-loading');
  const bClose      = document.getElementById('browser-close');

  function openBrowserEmbed() {
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    bLoading.style.display = 'flex';
    bFrame.style.display   = 'none';
    bFrame.src = '';

    setTimeout(() => {
      bFrame.src = BROWSER_URL;
      bFrame.onload = () => {
        bLoading.style.display = 'none';
        bFrame.style.display   = 'block';
      };
    }, 500);
    toast('Loading EaglercraftX — this may take a moment.', '');
  }

  function closeBrowserOverlay() {
    overlay.classList.remove('open');
    document.body.style.overflow = '';
    setTimeout(() => { bFrame.src = ''; bFrame.style.display = 'none'; }, 500);
  }

  function openBrowserNewTab() {
    const w = window.open('about:blank', '_blank');
    if (w) { w.location.href = BROWSER_URL; toast('Opening EaglercraftX in a new tab.', 'ok'); }
    else toast('Pop-up blocked — please allow pop-ups for this site.', 'wrn');
  }

  if (bClose) bClose.addEventListener('click', closeBrowserOverlay);

  const heroBrowserBtn = document.getElementById('hero-browser-btn');
  if (heroBrowserBtn) heroBrowserBtn.addEventListener('click', () => {
    // Show choice prompt
    showBrowserChoice();
  });

  function showBrowserChoice() {
    const toastRoot = document.getElementById('toast-root');
    const existing = document.getElementById('browser-choice-panel');
    if (existing) { existing.remove(); return; }
    const panel = document.createElement('div');
    panel.id = 'browser-choice-panel';
    panel.style.cssText = [
      'background:rgba(13,15,24,0.98)',
      'border:1px solid rgba(224,51,51,0.25)',
      'border-radius:16px',
      'padding:16px 18px',
      'pointer-events:all',
      'backdrop-filter:blur(20px)',
      'max-width:260px',
    ].join(';');
    panel.innerHTML = `
      <div style="font-family:var(--font-mono);font-size:0.58rem;letter-spacing:0.14em;color:var(--text-dim);margin-bottom:12px;">HOW TO PLAY IN BROWSER</div>
      <div style="display:flex;flex-direction:column;gap:7px;">
        <button onclick="PCN.openBrowserNewTab();this.closest('#browser-choice-panel').remove();"
          style="cursor:pointer;text-align:left;background:rgba(77,216,232,0.08);border:1px solid rgba(77,216,232,0.2);border-radius:10px;padding:9px 12px;color:var(--cyan);font-family:var(--font-mono);font-size:0.66rem;letter-spacing:0.05em;transition:all 0.15s;"
          onmouseover="this.style.background='rgba(77,216,232,0.18)'" onmouseout="this.style.background='rgba(77,216,232,0.08)'">↗ New Tab (about:blank)</button>
        <button onclick="PCN.openBrowserEmbed();this.closest('#browser-choice-panel').remove();"
          style="cursor:pointer;text-align:left;background:rgba(155,115,248,0.08);border:1px solid rgba(155,115,248,0.2);border-radius:10px;padding:9px 12px;color:var(--purple);font-family:var(--font-mono);font-size:0.66rem;letter-spacing:0.05em;transition:all 0.15s;"
          onmouseover="this.style.background='rgba(155,115,248,0.18)'" onmouseout="this.style.background='rgba(155,115,248,0.08)'">⛶ Fullscreen In Website</button>
        <button onclick="this.closest('#browser-choice-panel').remove();"
          style="cursor:pointer;background:transparent;border:none;color:var(--text-dim);font-family:var(--font-mono);font-size:0.6rem;padding:4px;text-align:center;"
          onmouseover="this.style.color='var(--white)'" onmouseout="this.style.color='var(--text-dim)'">✕ Cancel</button>
      </div>`;
    toastRoot.appendChild(panel);
    setTimeout(() => { if (panel.parentNode) panel.remove(); }, 7000);
  }

  /* ══════════════════════════════════════════════════
     MC API FETCH
  ══════════════════════════════════════════════════ */
  function fmtTime() {
    return new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
  }

  function setMCBadge(state) {
    const badge = document.getElementById('mc-badge');
    const text  = document.getElementById('mc-badge-text');
    if (!badge || !text) return;
    badge.className = 'status-badge ' + state;
    text.textContent = state === 'online' ? 'ONLINE' : state === 'offline' ? 'OFFLINE' : 'CHECKING';
  }

  function setNavStatus(online) {
    const pill = document.getElementById('nav-status');
    const txt  = document.getElementById('nav-status-text');
    if (!pill || !txt) return;
    pill.className = 'status-pill ' + (online ? 'online' : 'offline');
    txt.textContent = online ? 'ONLINE' : 'OFFLINE';
  }

  async function fetchMC() {
    try {
      const t0 = Date.now();
      const res = await fetch(MC_API, { cache: 'no-cache' });
      const latency = Date.now() - t0;
      if (!res.ok) throw new Error('HTTP ' + res.status);
      const data = await res.json();

      const isOnline = data && data.online;
      setMCBadge(isOnline ? 'online' : 'offline');
      setNavStatus(isOnline);

      const pEl  = document.getElementById('mc-players');
      const vEl  = document.getElementById('mc-version');
      const lEl  = document.getElementById('mc-latency');
      const tEl  = document.getElementById('mc-time');
      const mEl  = document.getElementById('mc-motd');
      const errEl= document.getElementById('mc-error');
      const bWrap= document.getElementById('mc-bar-wrap');
      const bFill= document.getElementById('mc-bar');
      const bPct = document.getElementById('mc-bar-pct');

      const specSt = document.getElementById('spec-status');
      const specPl = document.getElementById('spec-players');
      const specVr = document.getElementById('spec-version');

      if (isOnline) {
        const online  = data.players ? data.players.online  : 0;
        const max     = data.players ? data.players.max     : 0;
        const version = data.version || '—';
        const motd    = data.motd && data.motd.clean ? data.motd.clean.join(' ') : '';

        if (pEl) { pEl.innerHTML = ''; pEl.textContent = `${online} / ${max}`; pEl.className = 'stat-val cyan'; }
        if (vEl) { vEl.innerHTML = ''; vEl.textContent = version; }
        if (lEl) { lEl.innerHTML = ''; lEl.textContent = latency + 'ms'; lEl.className = 'stat-val green'; }
        if (tEl) { tEl.innerHTML = ''; tEl.textContent = fmtTime(); }
        if (errEl) errEl.style.display = 'none';

        if (mEl && motd) { mEl.style.display = ''; mEl.textContent = motd; }

        if (bWrap && bFill && bPct) {
          bWrap.style.display = '';
          const pct = max > 0 ? Math.round((online / max) * 100) : 0;
          bFill.style.width = pct + '%';
          bPct.textContent  = pct + '%';
        }

        if (specSt) { specSt.textContent = '● ONLINE'; specSt.className = 'spec-item-val live'; }
        if (specPl) specPl.textContent = `${online} / ${max}`;
        if (specVr) specVr.textContent = version;

        // Counter in hero strip
        const cEl = document.querySelector('.counter-live');
        if (cEl) animateNum(cEl, online, 1200);

      } else {
        if (pEl) { pEl.innerHTML = ''; pEl.textContent = '—'; }
        if (vEl) { vEl.innerHTML = ''; vEl.textContent = '—'; }
        if (lEl) { lEl.innerHTML = ''; lEl.textContent = latency + 'ms'; }
        if (tEl) { tEl.innerHTML = ''; tEl.textContent = fmtTime(); }
        if (errEl) { errEl.style.display = 'flex'; document.getElementById('mc-error-msg').textContent = 'Server is currently offline.'; }
        if (specSt) { specSt.textContent = '● OFFLINE'; specSt.className = 'spec-item-val'; specSt.style.color = 'var(--red)'; }
        if (specPl) specPl.textContent = '0 / —';
      }
    } catch (err) {
      console.warn('MC API error:', err);
      setMCBadge('offline');
      const errEl = document.getElementById('mc-error');
      const tEl   = document.getElementById('mc-time');
      if (errEl) { errEl.style.display = 'flex'; document.getElementById('mc-error-msg').textContent = 'Failed to fetch server status.'; }
      if (tEl)  { tEl.innerHTML = ''; tEl.textContent = fmtTime(); }
    }
  }

  function animateNum(el, target, dur) {
    if (isNaN(target)) { el.textContent = '0'; return; }
    let start = null;
    function step(ts) {
      if (!start) start = ts;
      const p = Math.min((ts - start) / dur, 1);
      el.textContent = Math.floor(p * target);
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  /* ══════════════════════════════════════════════════
     EAGLER API FETCH
  ══════════════════════════════════════════════════ */
  function setEaglerBadge(state, label) {
    const badge = document.getElementById('eagler-badge');
    const text  = document.getElementById('eagler-badge-text');
    if (!badge || !text) return;
    badge.className = 'status-badge ' + state;
    text.textContent = label || state.toUpperCase();
  }

  async function fetchEagler() {
    try {
      const res = await fetch(EAGLER_API, { cache: 'no-cache' });
      if (!res.ok) throw new Error('HTTP ' + res.status);
      const data = await res.json();

      /*
        Expected shape:
        { success: bool, error?: string, code?: string,
          timestamp: string, server: { address: string, online: bool } }
      */
      const isOnline = data && data.server && data.server.online;
      const code     = data.code || (data.error ? 'ERROR' : '—');
      const ts       = data.timestamp ? new Date(data.timestamp).toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' }) : fmtTime();

      setEaglerBadge(isOnline ? 'online' : 'offline', isOnline ? 'ONLINE' : 'OFFLINE');

      const stEl   = document.getElementById('eagler-status');
      const cdEl   = document.getElementById('eagler-code');
      const tEl2   = document.getElementById('eagler-time');
      const errEl  = document.getElementById('eagler-error');
      const ptag   = document.getElementById('eagler-platform-tag');
      const specEg = document.getElementById('spec-eagler');

      if (stEl) { stEl.innerHTML = ''; stEl.textContent = isOnline ? '● Online' : '● Offline'; stEl.className = 'stat-val ' + (isOnline ? 'green' : 'red'); }
      if (cdEl) { cdEl.innerHTML = ''; cdEl.textContent = code; cdEl.className = 'stat-val' + (isOnline ? '' : ' amber'); }
      if (tEl2) { tEl2.innerHTML = ''; tEl2.textContent = ts; }

      if (errEl) {
        if (!isOnline && data.error) {
          errEl.style.display = 'flex';
          document.getElementById('eagler-error-msg').textContent = data.error;
        } else {
          errEl.style.display = 'none';
        }
      }

      if (ptag) {
        ptag.textContent = isOnline ? '⬤ ONLINE' : '⬤ OFFLINE';
        ptag.style.color = isOnline ? 'var(--green)' : 'var(--red)';
        ptag.style.borderColor = isOnline ? 'rgba(61,226,160,0.3)' : 'rgba(224,51,51,0.3)';
        ptag.style.background = isOnline ? 'var(--green-dim)' : 'rgba(224,51,51,0.06)';
      }

      if (specEg) { specEg.textContent = isOnline ? '● Online' : '● Offline'; specEg.className = 'spec-item-val ' + (isOnline ? 'live' : ''); if (!isOnline) specEg.style.color = 'var(--red)'; }

    } catch (err) {
      console.warn('Eagler API error:', err);
      setEaglerBadge('offline', 'ERROR');
      const errEl = document.getElementById('eagler-error');
      if (errEl) { errEl.style.display = 'flex'; document.getElementById('eagler-error-msg').textContent = 'Could not reach EaglercraftX status API.'; }
      const stEl = document.getElementById('eagler-status');
      const cdEl = document.getElementById('eagler-code');
      const tEl2 = document.getElementById('eagler-time');
      if (stEl) { stEl.innerHTML = ''; stEl.textContent = '—'; }
      if (cdEl) { cdEl.innerHTML = ''; cdEl.textContent = 'FETCH_ERROR'; cdEl.className = 'stat-val amber'; }
      if (tEl2) { tEl2.innerHTML = ''; tEl2.textContent = fmtTime(); }
    }
  }

  /* Initial fetch + polling */
  fetchMC();
  fetchEagler();
  setInterval(fetchMC,    60000);
  setInterval(fetchEagler, 90000);

  /* ══════════════════════════════════════════════════
     GAME MODE EXPAND / COLLAPSE
  ══════════════════════════════════════════════════ */
  function toggleMode(id) {
    const card = document.getElementById(id);
    if (!card) return;
    const isOpen = card.classList.contains('is-open');

    // Close all
    document.querySelectorAll('.mode-card.is-open').forEach(c => c.classList.remove('is-open'));

    if (!isOpen) {
      card.classList.add('is-open');
      setTimeout(() => card.scrollIntoView({ behavior: 'smooth', block: 'nearest' }), 120);
    }
  }

  /* ══════════════════════════════════════════════════
     STAFF APPLICATION — OPEN / CLOSE
  ══════════════════════════════════════════════════ */
  const appBackdrop  = document.getElementById('app-backdrop');
  const appModal     = document.getElementById('app-modal');
  const appClose     = document.getElementById('app-close');
  const appFormWrap  = document.getElementById('app-form-wrap');
  const appResult    = document.getElementById('app-result');

  let appStartEpoch  = null;
  let appStartMs     = null;
  let appTimerHandle = null;

  function fmtDuration(ms) {
    const s = Math.floor(ms / 1000);
    return String(Math.floor(s / 60)).padStart(2,'0') + ':' + String(s % 60).padStart(2,'0');
  }

  function startTimer() {
    appStartMs    = Date.now();
    appStartEpoch = new Date();
    clearInterval(appTimerHandle);
    appTimerHandle = setInterval(() => {
      const elapsed = Date.now() - appStartMs;
      const tDisp = document.getElementById('timer-display');
      const tProg = document.getElementById('prog-time');
      if (tDisp) tDisp.textContent = fmtDuration(elapsed);
      if (tProg) tProg.textContent = 'Time: ' + fmtDuration(elapsed);
      updateProgress();
    }, 1000);
  }

  function stopTimer() { clearInterval(appTimerHandle); }

  function getTimeTaken() { return appStartMs ? fmtDuration(Date.now() - appStartMs) : 'N/A'; }

  function fmtEST(date) {
    if (!date) return 'N/A';
    return date.toLocaleTimeString('en-US', { timeZone: 'America/New_York', hour12: true, hour: '2-digit', minute: '2-digit' });
  }

  function openApp() {
    appBackdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
    appResult.classList.remove('show');
    appFormWrap.style.display = '';
    if (!appStartMs) startTimer();
  }

  function closeApp() {
    appBackdrop.classList.remove('open');
    document.body.style.overflow = '';
  }

  if (appClose) appClose.addEventListener('click', closeApp);
  appBackdrop.addEventListener('click', e => { if (e.target === appBackdrop) closeApp(); });

  /* ── Anti-paste ── */
  function blockPaste(el) {
    ['paste','copy','cut'].forEach(ev => {
      el.addEventListener(ev, e => {
        e.preventDefault();
        toast('Copy/paste is disabled on this field.', 'wrn');
      });
    });
    el.addEventListener('contextmenu', e => e.preventDefault());
    el.addEventListener('drop', e => e.preventDefault());
  }

  document.querySelectorAll('.form-control.np').forEach(blockPaste);

  /* ── Toggle staff detail ── */
  function toggleStaffDetail(val) {
    const grp = document.getElementById('fg-staffdetail');
    const inp = document.getElementById('q-staffdetail');
    if (!grp) return;
    grp.style.display = val === 'yes' ? '' : 'none';
    if (inp) inp.required = val === 'yes';
  }

  /* ── Progress ── */
  const PROG_IDS = [
    'q-age','q-duser','q-did','q-mc','q-tz','q-country',
    'q-tstart','q-tend','q-hours','q-days',
    'q-mcexp','q-srvexp','q-staffyn','q-position',
    'q-wpm',
    'q-why','q-standout','q-strengths','q-weakness',
    'q-s1','q-s2','q-s3','q-s4','q-s5',
    'q-rules','q-record','q-plugins','q-improve',
    'q-staffdetail','q-extra'
  ];

  function updateProgress() {
    let filled = 0;
    const staffYn = (document.getElementById('q-staffyn') || {}).value;
    PROG_IDS.forEach(id => {
      if (id === 'q-staffdetail' && staffYn !== 'yes') { filled++; return; }
      if (id === 'q-extra') { filled++; return; } // optional
      const el = document.getElementById(id);
      if (el && (el.value || '').trim()) filled++;
    });
    const pct = Math.min(100, Math.round((filled / 30) * 100));
    const bar = document.getElementById('prog-fill');
    const txt = document.getElementById('prog-text');
    if (bar) bar.style.width = pct + '%';
    if (txt) txt.textContent = filled + ' / 30 answered';
  }

  document.querySelectorAll('#app-modal input, #app-modal textarea, #app-modal select').forEach(el => {
    el.addEventListener('input', updateProgress);
    el.addEventListener('change', updateProgress);
  });

  /* ══════════════════════════════════════════════════
     TYPING TEST
  ══════════════════════════════════════════════════ */
  const TYPING_TEXTS = [
    "Good staff members listen before they act, gather evidence before they punish, and always treat every player with the same degree of respect regardless of their rank or status on the server.",
    "Moderation requires a combination of patience, consistency, and clear communication because every decision you make sets a precedent for how the entire community perceives fairness.",
    "Being a fair and effective moderator means applying rules equally to all players, documenting incidents thoroughly, and escalating any situation you cannot handle independently to senior staff.",
    "The strength of a server community depends on the quality of its staff team, and quality staff are defined not by authority but by the trust they earn through consistent, fair, and transparent action."
  ];

  const chosenText   = TYPING_TEXTS[Math.floor(Math.random() * TYPING_TEXTS.length)];
  const promptEl     = document.getElementById('typing-prompt');
  const typingInpEl  = document.getElementById('typing-input');

  let typingStarted  = false;
  let typingDone     = false;
  let typingStart    = null;
  let typingTimer    = null;

  if (promptEl) {
    promptEl.innerHTML = '';
    chosenText.split('').forEach((ch, i) => {
      const s = document.createElement('span');
      s.className = 'tc';
      s.textContent = ch;
      s.id = 'tc' + i;
      promptEl.appendChild(s);
    });
    const first = document.getElementById('tc0');
    if (first) first.classList.add('cur');
  }

  if (typingInpEl) {
    /* Block paste on typing test */
    ['paste','copy','cut'].forEach(ev => {
      typingInpEl.addEventListener(ev, e => {
        e.preventDefault();
        toast('No pasting in the typing test!', 'wrn');
      });
    });
    typingInpEl.addEventListener('contextmenu', e => e.preventDefault());

    typingInpEl.addEventListener('input', function() {
      if (typingDone) return;
      const typed = this.value;

      if (!typingStarted && typed.length > 0) {
        typingStarted = true;
        typingStart   = Date.now();
        const stEl = document.getElementById('t-status');
        if (stEl) { stEl.textContent = '◉ Test running...'; stEl.className = 'ts-running'; }
        typingTimer = setInterval(() => {
          if (!typingStart) return;
          const elapsed = (Date.now() - typingStart) / 1000;
          const tEl = document.getElementById('t-time');
          if (tEl) tEl.textContent = Math.floor(elapsed) + 's';
          const words = typed.trim().split(/\s+/).filter(Boolean).length;
          const mins  = elapsed / 60;
          const wpm   = mins > 0 ? Math.round(words / mins) : 0;
          const wEl = document.getElementById('t-wpm');
          if (wEl) { wEl.textContent = wpm || '—'; wEl.className = 'typing-stat-val' + (wpm >= 40 ? ' good' : ''); }
          const wordEl = document.getElementById('t-words');
          if (wordEl) wordEl.textContent = words;
        }, 400);
      }

      // Update character colours
      for (let i = 0; i < chosenText.length; i++) {
        const span = document.getElementById('tc' + i);
        if (!span) continue;
        span.className = 'tc';
        if (i < typed.length) {
          span.classList.add(typed[i] === chosenText[i] ? 'ok' : 'bad');
        } else if (i === typed.length) {
          span.classList.add('cur');
        }
      }

      // Accuracy
      let correct = 0;
      for (let i = 0; i < Math.min(typed.length, chosenText.length); i++) {
        if (typed[i] === chosenText[i]) correct++;
      }
      const acc = typed.length > 0 ? Math.round((correct / typed.length) * 100) : 100;
      const aEl = document.getElementById('t-acc');
      if (aEl) aEl.textContent = acc + '%';

      // Check completion
      if (typed.length >= chosenText.length) {
        clearInterval(typingTimer);
        typingDone = true;
        this.disabled = true;

        const elapsed = (Date.now() - typingStart) / 1000;
        const promptWords = chosenText.trim().split(/\s+/);
        const typedWords  = typed.trim().split(/\s+/);
        let correctWords  = 0;
        promptWords.forEach((w, i) => { if (typedWords[i] === w) correctWords++; });
        const finalWPM = Math.round(correctWords / (elapsed / 60));
        const finalAcc = Math.round((correct / chosenText.length) * 100);

        const wEl   = document.getElementById('t-wpm');
        const aEl2  = document.getElementById('t-acc');
        const tEl   = document.getElementById('t-time');
        const stEl  = document.getElementById('t-status');
        const wpmFl = document.getElementById('q-wpm');

        if (wEl)  { wEl.textContent  = finalWPM; wEl.className = 'typing-stat-val' + (finalWPM >= 40 ? ' good' : ''); }
        if (aEl2) aEl2.textContent   = finalAcc + '%';
        if (tEl)  tEl.textContent    = Math.floor(elapsed) + 's';
        if (stEl) { stEl.textContent = `✓ Complete — ${finalWPM} WPM · ${finalAcc}% accuracy`; stEl.className = 'ts-done'; }
        if (wpmFl) wpmFl.value       = `${finalWPM} WPM (${finalAcc}% acc, ${Math.floor(elapsed)}s)`;

        updateProgress();
        toast(`Typing test complete: ${finalWPM} WPM`, 'ok');
      }
    });
  }

  /* ══════════════════════════════════════════════════
     FORM VALIDATION
  ══════════════════════════════════════════════════ */
  function validate() {
    let ok = true;
    const errors = [];

    function chk(fgId, qId, msg) {
      const el = document.getElementById(qId);
      const fg = document.getElementById(fgId);
      if (!el || !fg) return;
      const val = el.value.trim();
      if (!val) {
        fg.classList.add('err');
        const errEl = fg.querySelector('.form-error');
        if (errEl && msg) errEl.textContent = msg;
        errors.push(msg || qId);
        ok = false;
      } else {
        fg.classList.remove('err');
      }
    }

    chk('fg-age',     'q-age',     'Age is required.');
    chk('fg-duser',   'q-duser',   'Discord username required.');
    chk('fg-did',     'q-did',     'Discord User ID required.');
    chk('fg-mc',      'q-mc',      'Minecraft username required.');
    chk('fg-tz',      'q-tz',      'Timezone required.');
    chk('fg-country', 'q-country', 'Country required.');
    chk('fg-tstart',  'q-tstart',  'Start time required.');
    chk('fg-tend',    'q-tend',    'End time required.');
    chk('fg-hours',   'q-hours',   'Hours per day required.');
    chk('fg-days',    'q-days',    'Days per week required.');
    chk('fg-mcexp',   'q-mcexp',   'Minecraft experience required.');
    chk('fg-srvexp',  'q-srvexp',  'Server experience required.');
    chk('fg-staffyn', 'q-staffyn', 'Staff experience required.');
    chk('fg-position','q-position','Position required.');
    chk('fg-why',     'q-why',     'Q17 is required.');
    chk('fg-standout','q-standout','Q18 is required.');
    chk('fg-strengths','q-strengths','Q19 is required.');
    chk('fg-weakness','q-weakness','Q20 is required.');
    chk('fg-s1',      'q-s1',      'Q21 is required.');
    chk('fg-s2',      'q-s2',      'Q22 is required.');
    chk('fg-s3',      'q-s3',      'Q23 is required.');
    chk('fg-s4',      'q-s4',      'Q24 is required.');
    chk('fg-s5',      'q-s5',      'Q25 is required.');
    chk('fg-rules',   'q-rules',   'Q26 is required.');
    chk('fg-record',  'q-record',  'Q27 is required.');
    chk('fg-plugins', 'q-plugins', 'Q28 is required.');
    chk('fg-improve', 'q-improve', 'Q29 is required.');

    const staffYn = (document.getElementById('q-staffyn') || {}).value;
    if (staffYn === 'yes') chk('fg-staffdetail', 'q-staffdetail', 'Staff experience detail required.');

    // WPM check
    const wpmEl = document.getElementById('q-wpm');
    if (!wpmEl || !wpmEl.value.trim()) {
      errors.push('Please complete the typing test (Q16).');
      ok = false;
    }

    // Age minimum
    const ageVal = parseInt((document.getElementById('q-age') || {}).value);
    if (ageVal < 13) {
      errors.push('You must be at least 13 years old to apply.');
      ok = false;
    }

    return { ok, errors };
  }

  /* ══════════════════════════════════════════════════
     SUBMIT APPLICATION → DISCORD WEBHOOK
  ══════════════════════════════════════════════════ */
  async function submitApp() {
    const { ok, errors } = validate();
    if (!ok) {
      toast(`${errors.length} field${errors.length > 1 ? 's' : ''} need attention.`, 'err');
      const firstErr = document.querySelector('#app-modal .form-group.err');
      if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    const btn     = document.getElementById('app-submit-btn');
    const wrapper = btn.parentElement;
    wrapper.classList.add('submitting');
    btn.disabled = true;

    const g = id => {
      const el = document.getElementById(id);
      return el ? (el.value || '').trim() : 'N/A';
    };
    const trunc = (s, max) => s && s.length > max ? s.substring(0, max - 3) + '...' : (s || '');

    const startEst = fmtEST(appStartEpoch);
    const endEst   = fmtEST(new Date());
    const taken    = getTimeTaken();
    const staffYn  = g('q-staffyn');

    const embeds = [
      {
        title: `📋 Staff Application — ${g('q-position')}`,
        color: 0xe03333,
        description: `**Discord:** ${g('q-duser')} (\`${g('q-did')}\`)\n**Minecraft:** \`${g('q-mc')}\`\n**Season 2 Application**`,
        timestamp: new Date().toISOString(),
        footer: { text: 'Pixel Craft Network · Staff Applications System' },
        fields: [
          { name: '👤 Age',                value: g('q-age'),          inline: true },
          { name: '🌍 Country',            value: g('q-country'),       inline: true },
          { name: '⏰ Timezone',            value: g('q-tz'),            inline: true },
          { name: '🎯 Position',            value: g('q-position'),      inline: true },
          { name: '⌨️ WPM',                value: g('q-wpm'),           inline: true },
          { name: '🎮 Minecraft Exp',       value: g('q-mcexp'),         inline: true },
          { name: '🖥️ PCN Experience',     value: g('q-srvexp'),        inline: true },
          { name: '🛡️ Prior Staff',        value: staffYn === 'yes' ? 'Yes' : 'No', inline: true },
          { name: '📅 Hours/Day',           value: g('q-hours'),         inline: true },
          { name: '📅 Days/Week',           value: g('q-days'),          inline: true },
          { name: '🕐 Online Start (EST)',  value: g('q-tstart') + ' EST', inline: true },
          { name: '🕔 Online End (EST)',    value: g('q-tend') + ' EST',   inline: true },
          { name: '⏱️ App Start (EST)',     value: startEst,             inline: true },
          { name: '⏱️ App End (EST)',       value: endEst,               inline: true },
          { name: '⏳ Time Taken',          value: taken,                inline: true },
        ]
      },
      {
        title: '📝 Previous Staff Experience',
        color: 0xa78bfa,
        description: staffYn === 'yes' ? trunc(g('q-staffdetail'), 4096) : 'No prior staff experience.'
      },
      {
        title: '💡 Motivation',
        color: 0xe03333,
        fields: [
          { name: 'Q17. Why do you want to be staff?',             value: trunc(g('q-why'),       1024) },
          { name: 'Q18. What makes you stand out?',                value: trunc(g('q-standout'),  1024) },
          { name: 'Q19. Biggest strengths',                        value: trunc(g('q-strengths'), 1024) },
          { name: 'Q20. Biggest weakness',                         value: trunc(g('q-weakness'),  1024) },
        ]
      },
      {
        title: '🔥 Scenario Responses',
        color: 0xf87171,
        fields: [
          { name: 'Q21. Suspected hacker in LifeSteal',           value: trunc(g('q-s1'), 1024) },
          { name: 'Q22. Slurs in chat',                           value: trunc(g('q-s2'), 1024) },
          { name: 'Q23. DDoS threat',                             value: trunc(g('q-s3'), 1024) },
          { name: 'Q24. Staff member abusing perms',              value: trunc(g('q-s4'), 1024) },
          { name: 'Q25. False ban appeal',                        value: trunc(g('q-s5'), 1024) },
        ]
      },
      {
        title: '🛠️ Technical Knowledge',
        color: 0x3de2a0,
        fields: [
          { name: 'Q26. Server rules you know',                   value: trunc(g('q-rules'),   1024) },
          { name: 'Q27. Can screen record?',                      value: g('q-record') },
          { name: 'Q28. Plugin experience',                       value: trunc(g('q-plugins'), 1024) },
          { name: 'Q29. Suggested improvement',                   value: trunc(g('q-improve'), 1024) },
          { name: 'Q30. Additional comments',                     value: trunc(g('q-extra') || 'N/A', 1024) },
        ]
      }
    ];

    const payload = {
      username:   'PCN Staff Applications',
      content:    `🔔 **New Staff Application** — <@${g('q-did')}> applied for **${g('q-position')}**`,
      embeds:     embeds
    };

    try {
      const resp = await fetch(WEBHOOK_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });

      if (resp.ok || resp.status === 204) {
        stopTimer();
        appFormWrap.style.display = 'none';
        appResult.classList.add('show');
        document.getElementById('result-icon').textContent  = '✅';
        document.getElementById('result-title').textContent = 'Application Submitted';
        document.getElementById('result-desc').textContent  =
          'Your application has been delivered to the Pixel Craft moderation team. We will contact you via Discord within 5–10 business days. Thank you for applying.';
        appModal.scrollTo({ top: 0, behavior: 'smooth' });
        toast('Application submitted successfully!', 'ok');
      } else {
        throw new Error('Webhook status ' + resp.status);
      }
    } catch (err) {
      console.error('Submit error:', err);
      wrapper.classList.remove('submitting');
      btn.disabled = false;
      toast('Submission failed. Check your connection and try again.', 'err');
    }
  }

  /* ══════════════════════════════════════════════════
     PUBLIC API
  ══════════════════════════════════════════════════ */
  return {
    copyIP,
    openBrowserEmbed,
    openBrowserNewTab,
    openApp,
    closeApp,
    toggleMode,
    toggleStaffDetail,
    submitApp,
  };

})(); /* end PCN IIFE */
</script>

</body>
</html>
