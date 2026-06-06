<?php
// Simple PHP backend
$visitor_ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="DNForge — AI Automation Learning Platform. Build automated content systems for Facebook, Instagram, YouTube and TikTok. Learn step by step from Level 1 to Full Empire.">
<title>DNForge — AI Automation Platform 2026</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=JetBrains+Mono:wght@300;400;600&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<!-- ══ FIREBASE SDK (v9 Compat Mode) ══ -->
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>
<!-- ══ MICROSOFT MSAL.js (OneDrive Auth) ══ -->
<script src="https://alcdn.msauth.net/browser/2.38.3/js/msal-browser.min.js"></script>
</head>
<body>

<!-- PRELOADER -->
<div id="pre">
  <div class="pre-name">DNForge</div>
  <div class="pre-bar"><div class="pre-fill"></div></div>
  <div class="pre-txt">Loading AI Engine...</div>
</div>

<!-- SCROLL BAR -->
<div id="sp"></div>

<!-- CURSOR -->
<div id="cur"></div><div id="cur-r"></div>

<!-- BG -->
<canvas id="cv"></canvas>
<div class="scan"></div><div class="vig"></div>

<!-- MOBILE MENU -->
<div id="mmenu">
  <a class="mm-a" href="#what" onclick="closeMob()">What is DNForge</a>
  <a class="mm-a" href="#pricing" onclick="closeMob()">Pricing</a>
  <a class="mm-a" href="#levels" onclick="closeMob()">Roadmap</a>
  <a class="mm-a" href="#revenue" onclick="closeMob()">Revenue</a>
  <a class="mm-a" href="#faq" onclick="closeMob()">FAQ</a>
  <a class="mm-a" href="mailto:moviesdn7@gmail.com" onclick="closeMob()">Contact</a>
  <div class="mm-btns">
    <button class="nbtn nsign" onclick="closeMob();openAuth('in')">Sign In</button>
    <button class="nbtn nget" onclick="closeMob();openAuth('up')">Get Started</button>
  </div>
</div>

<!-- NAVBAR -->
<nav id="nav">
  <a class="nlogo" href="#">
    <svg viewBox="0 0 48 48" fill="none">
      <polygon points="24,2 43,13 43,35 24,46 5,35 5,13" stroke="#c9982a" stroke-width="1.2" fill="rgba(201,152,42,0.05)"/>
      <polygon points="24,8 37,15.5 37,32.5 24,40 11,32.5 11,15.5" stroke="rgba(201,152,42,0.2)" stroke-width=".6" fill="none"/>
      <path d="M13 17L13 31L18 31C22 31 25 28 25 24C25 20 22 17 18 17Z" fill="none" stroke="#e8b84b" stroke-width="1.8" stroke-linejoin="round"/>
      <path d="M27 17L27 31M27 17L35 31M35 17L35 31" stroke="#e8b84b" stroke-width="1.8" stroke-linecap="round"/>
      <circle cx="24" cy="2" r="1.2" fill="#c9982a"/><circle cx="43" cy="13" r="1.2" fill="#c9982a"/>
      <circle cx="43" cy="35" r="1.2" fill="#c9982a"/><circle cx="24" cy="46" r="1.2" fill="#c9982a"/>
      <circle cx="5" cy="35" r="1.2" fill="#c9982a"/><circle cx="5" cy="13" r="1.2" fill="#c9982a"/>
    </svg>
    <div><div class="nlogo-n">DNForge</div><div class="nlogo-t">AI Automation Platform</div></div>
  </a>
  <ul class="nlinks">
    <li><a href="#what">Platform</a></li>
    <li><a href="#pricing">Pricing</a></li>
    <li><a href="#levels">Roadmap</a></li>
    <li><a href="#revenue">Revenue</a></li>
    <li><a href="#faq">FAQ</a></li>
  </ul>
  <div class="nright">
    <div class="nuser" id="n-user">
      <div class="nav-av" id="nav-av">D</div>
      <div><div class="nav-uname" id="nav-un">User</div><div class="nav-uplan" id="nav-up">Starter</div></div>
      <button class="ndbtn" onclick="openDash()">Dashboard</button>
    </div>
    <div id="n-auth">
      <button class="nbtn nsign" onclick="openAuth('in')">Sign In</button>
      <button class="nbtn nget" onclick="openAuth('up')">Get Started</button>
    </div>
    <button class="burger" id="burger" onclick="toggleMob()">
      <div class="bl"></div><div class="bl"></div><div class="bl"></div>
    </button>
  </div>
</nav>

<div class="page">

<!-- HERO -->
<section class="hero">
  <div class="orb orb1"></div><div class="orb orb2"></div>
  <div class="htag"><span class="hdot"></span>DNForge · AI Automation Platform · 2026<span class="hdot"></span></div>
  <h1 class="htitle">
    <span class="ht1">DN</span>
    <span class="ht2" data-t="FORGE">FORGE</span>
    <span class="ht3">EMPIRE</span>
  </h1>
  <p class="hsub">Learn automation. Build systems.<br><strong>Track real growth</strong> across Facebook · Instagram · YouTube · TikTok</p>
  <div class="hbtns">
    <button class="btn-g" onclick="openAuth('up')">Start Free — Level 1 →</button>
    <a href="#what" class="btn-o">Learn More</a>
  </div>
  <div class="hchips">
    <div class="chip"><span class="chip-d" style="background:var(--green)"></span>Learning Platform</div>
    <div class="chip"><span class="chip-d" style="background:var(--blue)"></span>SaaS Tools</div>
    <div class="chip"><span class="chip-d" style="background:var(--gold)"></span>Progress Tracker</div>
    <div class="chip"><span class="chip-d" style="background:var(--purple)"></span>5 Levels</div>
  </div>
  <div class="scroll-h"><div class="shl"></div><span class="sht">SCROLL</span></div>
</section>

<!-- STATS -->
<div class="stats reveal">
  <div class="st"><div class="st-n" data-t="5">0</div><div class="st-l">Platforms<br>Tracked</div></div>
  <div class="st"><div class="st-n" data-t="5">0</div><div class="st-l">Learning<br>Levels</div></div>
  <div class="st"><div class="st-n" data-t="24">0</div><div class="st-l">Hrs/Day<br>Automated</div></div>
  <div class="st"><div class="st-n">∞</div><div class="st-l">Growth<br>Potential</div></div>
</div>

<div class="divl"></div>

<!-- WHAT IS DNFORGE -->
<section class="sec reveal" id="what">
  <div class="sh"><div class="sh-bg">00</div><div><div class="sh-tag">About DNForge</div><div class="sh-t">What is DNForge?</div></div></div>
  <div class="what-g">
    <div class="wc">
      <span class="wc-icon">📚</span>
      <div class="wc-t">Learning Platform</div>
      <div class="wc-d">DNForge teaches you to build AI-powered content automation systems step by step. From complete beginner (Level 1) to running a full multi-channel content operation (Level 5).</div>
      <ul class="wc-list">
        <li>5 structured levels with clear milestones</li>
        <li>Step-by-step Python automation guides</li>
        <li>AI integration tutorials (Claude, OpenAI, SD)</li>
        <li>Facebook, YouTube, Instagram, TikTok API guides</li>
        <li>Weekly action plans for beginners</li>
      </ul>
    </div>
    <div class="wc">
      <span class="wc-icon">⚙️</span>
      <div class="wc-t">SaaS Tools Platform</div>
      <div class="wc-d">Beyond learning, DNForge gives you tools to connect your real social media accounts, track follower growth, monitor channel performance, and estimate potential earnings.</div>
      <ul class="wc-list">
        <li>Connect Facebook, Instagram, YouTube, TikTok</li>
        <li>Track follower & subscriber growth</li>
        <li>Monitor posts and estimated reach</li>
        <li>Earnings potential estimator</li>
        <li>Level progress dashboard</li>
      </ul>
    </div>
  </div>
  <div style="background:rgba(201,152,42,.05);border:1px solid var(--bd2);padding:20px 24px;margin-top:2px;font-family:'JetBrains Mono',monospace;font-size:10px;color:var(--dim2);letter-spacing:.5px;line-height:1.9">
    <strong style="color:var(--g2)">Important:</strong> DNForge is a learning platform and progress tracking tool. It teaches you how to build automation systems and tracks your growth. Income depends entirely on your content quality, consistency, niche choice, and platform eligibility — not on DNForge itself.
  </div>
</section>

<div class="divl"></div>

<!-- PRICING -->
<section class="sec reveal" id="pricing">
  <div class="sh"><div class="sh-bg">01</div><div><div class="sh-tag">Plans & Pricing</div><div class="sh-t">Choose Your Level</div></div></div>
  <div class="price-tabs-wrap">
    <div class="ptabs">
      <button class="ptab active" id="pt-mo" onclick="setP('mo')">Monthly</button>
      <button class="ptab" id="pt-yr" onclick="setP('yr')">Yearly<span class="sv">SAVE 22%</span></button>
    </div>
  </div>
  <div class="pgrid">
    <div class="pc">
      <div class="pc-tier">Level 1 Access</div>
      <div class="pc-name">Starter</div>
      <div class="pc-pw"><span class="pc-sym">$</span><span class="pc-amt">0</span></div>
      <div class="pc-per">Forever free</div>
      <div class="pc-note">&nbsp;</div>
      <div class="pc-d"></div>
      <div class="pc-feats">
        <div class="pf"><span class="pf-ok">✓</span>10 AI credits/month</div>
        <div class="pf"><span class="pf-ok">✓</span>1 page/channel tracking</div>
        <div class="pf"><span class="pf-ok">✓</span>Quote + image automation</div>
        <div class="pf"><span class="pf-ok">✓</span>Level 1 learning content</div>
        <div class="pf off"><span class="pf-no">✗</span>Auto scheduling</div>
        <div class="pf off"><span class="pf-no">✗</span>Video generation</div>
        <div class="pf off"><span class="pf-no">✗</span>Multi-platform</div>
      </div>
      <button class="pc-cta" onclick="openAuth('up')">Start Free →</button>
    </div>
    <div class="pc hot">
      <div class="pci">
        <div class="pc-tier">Level 1–2 Access</div>
        <div class="pc-name">Builder</div>
        <div class="pc-pw"><span class="pc-sym">$</span><span class="pc-amt" id="p-b">9</span></div>
        <div class="pc-per" id="pp-b">per month</div>
        <div class="pc-note" id="pn-b">First month FREE after signup</div>
        <div class="pc-d"></div>
        <div class="pc-feats">
          <div class="pf"><span class="pf-ok">✓</span>100 AI credits/month</div>
          <div class="pf"><span class="pf-ok">✓</span>Up to 5 pages/channels</div>
          <div class="pf"><span class="pf-ok">✓</span>Auto hashtag generation</div>
          <div class="pf"><span class="pf-ok">✓</span>Post scheduler (5×/day)</div>
          <div class="pf"><span class="pf-ok">✓</span>Analytics dashboard</div>
          <div class="pf"><span class="pf-ok">✓</span>Level 1–2 content</div>
          <div class="pf off"><span class="pf-no">✗</span>Video generation</div>
        </div>
        <button class="pc-cta" onclick="payNow('builder')">Get Builder →</button>
      </div>
    </div>
    <div class="pc">
      <div class="pc-tier">Level 1–3 Access</div>
      <div class="pc-name">Pro</div>
      <div class="pc-pw"><span class="pc-sym">$</span><span class="pc-amt" id="p-p">19</span></div>
      <div class="pc-per" id="pp-p">per month</div>
      <div class="pc-note" id="pn-p">&nbsp;</div>
      <div class="pc-d"></div>
      <div class="pc-feats">
        <div class="pf"><span class="pf-ok">✓</span>500 AI credits/month</div>
        <div class="pf"><span class="pf-ok">✓</span>Unlimited pages/channels</div>
        <div class="pf"><span class="pf-ok">✓</span>AI video generation (Runway)</div>
        <div class="pf"><span class="pf-ok">✓</span>AI voiceover (ElevenLabs)</div>
        <div class="pf"><span class="pf-ok">✓</span>Auto subtitles (Whisper)</div>
        <div class="pf"><span class="pf-ok">✓</span>Reels + Shorts pipeline</div>
        <div class="pf"><span class="pf-ok">✓</span>Level 1–3 content</div>
      </div>
      <button class="pc-cta" onclick="payNow('pro')">Get Pro →</button>
    </div>
    <div class="pc">
      <div class="pc-tier">Level 1–5 Access</div>
      <div class="pc-name">Empire</div>
      <div class="pc-pw"><span class="pc-sym">$</span><span class="pc-amt" id="p-e">49</span></div>
      <div class="pc-per" id="pp-e">per month</div>
      <div class="pc-note" id="pn-e">&nbsp;</div>
      <div class="pc-d"></div>
      <div class="pc-feats">
        <div class="pf"><span class="pf-ok">✓</span>Unlimited AI credits</div>
        <div class="pf"><span class="pf-ok">✓</span>All platforms automated</div>
        <div class="pf"><span class="pf-ok">✓</span>Multi-niche channel scaling</div>
        <div class="pf"><span class="pf-ok">✓</span>Advanced revenue analytics</div>
        <div class="pf"><span class="pf-ok">✓</span>Custom automation scripts</div>
        <div class="pf"><span class="pf-ok">✓</span>1-on-1 support with Dhiraj</div>
        <div class="pf"><span class="pf-ok">✓</span>All 5 levels content</div>
      </div>
      <button class="pc-cta" onclick="payNow('empire')">Get Empire →</button>
    </div>
  </div>
  <div class="pay-row">
    <span style="font-family:'JetBrains Mono',monospace;font-size:9px;color:var(--dim2)">Accepted payments:</span>
    <span class="pay-b">💳 PayPal</span>
    <span class="pay-b">🇳🇵 eSewa</span>
    <span class="pay-b">💜 Khalti</span>
    <span class="pay-b">🏦 Bank Transfer</span>
    <span class="pay-b">🌍 Wise/International</span>
  </div>
</section>

<div class="divl"></div>

<!-- LEVELS -->
<section class="sec" id="levels">
  <div class="sh reveal"><div class="sh-bg">02</div><div><div class="sh-tag">Learning Roadmap</div><div class="sh-t">5 Levels to Full Empire</div></div></div>
  <div class="lvl-w">
    <div class="lc l1"><div class="lc-left"><div class="lc-badge">LEVEL</div><div class="lc-num">1</div></div><div class="lc-body"><div class="lc-t">Basic Automation</div><div class="lc-d">Python → AI text → save file → upload to Facebook. One button, one post. This is where every creator starts. Master the pipeline before building anything else.</div><div class="lc-tags"><span class="ltg">AI Quote Gen</span><span class="ltg">Stable Diffusion</span><span class="ltg">Facebook API</span><span class="ltg">Python Basics</span></div></div><div class="lc-right"><div class="lc-st s-go"><span class="sd"></span>START HERE</div><div class="lc-bar"><div class="lc-bf"></div></div><div class="lc-wk">WEEK 1–4</div></div></div>
    <div class="lc l2"><div class="lc-left"><div class="lc-badge">LEVEL</div><div class="lc-num">2</div></div><div class="lc-body"><div class="lc-t">Smart Scheduling</div><div class="lc-d">AI auto-generates hashtags. Posts go live at peak engagement hours. One script manages 5+ Facebook pages. Analytics tracked automatically per page.</div><div class="lc-tags"><span class="ltg">Auto Hashtags</span><span class="ltg">Scheduler</span><span class="ltg">Multiple Pages</span><span class="ltg">Analytics</span></div></div><div class="lc-right"><div class="lc-st s-nx"><span class="sd"></span>BUILD NEXT</div><div class="lc-bar"><div class="lc-bf"></div></div><div class="lc-wk">MONTH 2</div></div></div>
    <div class="lc l3"><div class="lc-left"><div class="lc-badge">LEVEL</div><div class="lc-num">3</div></div><div class="lc-body"><div class="lc-t">Video Factory</div><div class="lc-d">Full short-form videos with AI voice (ElevenLabs). Auto subtitles via Whisper. Daily Reels, YouTube Shorts, and TikToks published without touching anything manually.</div><div class="lc-tags"><span class="ltg">Auto Videos</span><span class="ltg">AI Voice</span><span class="ltg">AI Subtitles</span><span class="ltg">Reels + Shorts</span></div></div><div class="lc-right"><div class="lc-st s-so"><span class="sd"></span>UPCOMING</div><div class="lc-bar"><div class="lc-bf"></div></div><div class="lc-wk">MONTH 3–4</div></div></div>
    <div class="lc l4"><div class="lc-left"><div class="lc-badge">LEVEL</div><div class="lc-num">4</div></div><div class="lc-body"><div class="lc-t">Multi-Channel Empire</div><div class="lc-d">One script → all platforms simultaneously. Multiple YouTube channels, Instagram accounts, Facebook pages. Different niches, same machine. <strong>Scale and systematize everything.</strong></div><div class="lc-tags"><span class="ltg">All Platforms</span><span class="ltg">Multi-Niche</span><span class="ltg">YouTube Auto</span><span class="ltg">Instagram Auto</span></div></div><div class="lc-right"><div class="lc-st s-tg"><span class="sd"></span>THE TARGET</div><div class="lc-bar"><div class="lc-bf"></div></div><div class="lc-wk">MONTH 5–6</div></div></div>
    <div class="lc l5"><div class="lc-left"><div class="lc-badge">LEVEL</div><div class="lc-num">5</div></div><div class="lc-body"><div class="lc-t">Full AI Media Company</div><div class="lc-d">100% automated operation. AI picks niches, creates content, analyzes performance, and optimizes itself. You review dashboards and make strategic decisions.</div><div class="lc-tags"><span class="ltg">Self-Optimizing</span><span class="ltg">Auto Analytics</span><span class="ltg">Revenue Tracking</span><span class="ltg">Full Autonomy</span></div></div><div class="lc-right"><div class="lc-st s-dr"><span class="sd"></span>THE DREAM</div><div class="lc-bar"><div class="lc-bf"></div></div><div class="lc-wk">YEAR 1+</div></div></div>
  </div>
</section>

<div class="divl"></div>

<!-- STACK -->
<section class="sec reveal">
  <div class="sh"><div class="sh-bg">03</div><div><div class="sh-tag">Platform Connections</div><div class="sh-t">Your Tech Stack</div></div></div>
  <div class="stack-g">
    <div class="sc sc-loc">
      <div class="sc-lbl"><span class="scb"></span>🖥 Local Machine</div>
      <div class="sc-item"><span class="sp"></span>Python — automation engine</div>
      <div class="sc-item"><span class="sp"></span>Ollama — free local LLM</div>
      <div class="sc-item"><span class="sp"></span>Stable Diffusion — image gen</div>
      <div class="sc-item"><span class="sp"></span>Whisper — auto subtitles</div>
      <div class="sc-item"><span class="sp"></span>Video editing pipeline</div>
    </div>
    <div class="sc sc-cld">
      <div class="sc-lbl"><span class="scb"></span>☁ Cloud APIs</div>
      <div class="sc-item"><span class="sp"></span>Claude — intelligent text</div>
      <div class="sc-item"><span class="sp"></span>OpenAI GPT — quotes & copy</div>
      <div class="sc-item"><span class="sp"></span>Runway — AI video gen</div>
      <div class="sc-item"><span class="sp"></span>ElevenLabs — AI voice</div>
      <div class="sc-item"><span class="sp"></span>Kling — video creation</div>
    </div>
    <div class="sc sc-out">
      <div class="sc-lbl"><span class="scb"></span>📤 Output Platforms</div>
      <div class="sc-item"><span class="sp"></span>Facebook Pages + In-Stream</div>
      <div class="sc-item"><span class="sp"></span>Instagram Feed + Reels</div>
      <div class="sc-item"><span class="sp"></span>YouTube Shorts + Long-form</div>
      <div class="sc-item"><span class="sp"></span>TikTok + TikTok Shop</div>
    </div>
  </div>
</section>

<div class="divl"></div>

<!-- REVENUE — REALISTIC COPY -->
<section class="sec reveal" id="revenue">
  <div class="sh"><div class="sh-bg">04</div><div><div class="sh-tag">Monetization Reality</div><div class="sh-t">How Creators Make Money</div></div></div>

  <div class="rev-disclaimer">
    <strong>DNForge does not guarantee income.</strong> Earnings depend entirely on your content quality, niche, consistency, country, audience engagement, watch time, platform eligibility, and monetization approval. The information below is educational — showing what is possible on each platform, not what you will earn.
  </div>

  <div class="rev-g">
    <div class="rv">
      <span class="rv-icon">📺</span>
      <div class="rv-t">YouTube</div>
      <div class="rv-d">Best for long-term, compounding content. Income can come from YouTube Partner Program ads, affiliate links in descriptions, channel memberships, and sponsorships. Requires 1,000 subscribers + 4,000 watch hours to qualify for monetization. RPM varies heavily by niche and country.</div>
      <div class="rv-note">Finance/Business: $8–15 RPM<br>Tech/Software: $5–12 RPM<br>Motivation/Quotes: $1.5–4 RPM<br>Entertainment: $0.5–2 RPM</div>
    </div>
    <div class="rv">
      <span class="rv-icon">📘</span>
      <div class="rv-t">Facebook</div>
      <div class="rv-d">Best for pages and video distribution. In-Stream ads require 10K followers + 600K one-minute views in 60 days. Monetization availability depends on your country, page standing, and content originality. Not available in all countries.</div>
      <div class="rv-note">In-Stream CPM: $0.50–$3 (country varies)<br>Stars (LIVE): varies by audience<br>Bonus programs: by invitation only<br>Reels: limited availability</div>
    </div>
    <div class="rv">
      <span class="rv-icon">📸</span>
      <div class="rv-t">Instagram</div>
      <div class="rv-d">Best for niche pages, brand collaborations, and affiliate products. Direct ad revenue is minimal. Real income comes from sponsored posts, affiliate links in bio, and selling your own or partner products. Engagement rate matters more than follower count.</div>
      <div class="rv-note">Sponsored posts: varies by niche + engagement<br>Affiliate links: 5–30% commission<br>Digital products: 100% margin<br>Brand deals: negotiated directly</div>
    </div>
    <div class="rv">
      <span class="rv-icon">🎵</span>
      <div class="rv-t">TikTok</div>
      <div class="rv-d">Best for fast organic discovery. Creator Fund pays very low rates. Real TikTok income comes from TikTok Shop affiliate commissions, LIVE gifts, Series subscriptions, and brand deals. Creator Rewards requires 10K followers + 100K views/30 days in supported countries.</div>
      <div class="rv-note">Creator Fund: $0.02–$0.04 per 1K views<br>TikTok Shop affiliate: 5–20% commission<br>LIVE gifts: audience dependent<br>Nepal eligibility: limited, check TikTok policy</div>
    </div>
    <div class="rv">
      <span class="rv-icon">🔗</span>
      <div class="rv-t">Affiliate Marketing</div>
      <div class="rv-d">Best beginner-friendly income path because you can earn before reaching platform monetization thresholds. Works by embedding affiliate links in post descriptions, bios, and pinned comments. Amazon, SaaS tools, and ClickBank are popular options.</div>
      <div class="rv-note">Amazon Associates: 1–10% per sale<br>SaaS tools: 20–40% recurring monthly<br>ClickBank digital: 50–75% commission<br>No minimum followers required</div>
    </div>
    <div class="rv">
      <span class="rv-icon">🏢</span>
      <div class="rv-t">DNForge Agency Model</div>
      <div class="rv-d">Once you master the DNForge system, you can offer it as a service to businesses that need content automation. This is separate from platform earnings — it's a direct service income stream. Value is in your skill, not DNForge itself.</div>
      <div class="rv-note">Service retainer: market rate<br>One-time setup: negotiated<br>Selling channels: 10–30× monthly revenue<br>Teaching/courses: your knowledge, your price</div>
    </div>
  </div>

  <!-- EARNINGS ESTIMATOR -->
  <div class="calc reveal">
    <div class="calc-t">📊 Earnings Estimator</div>
    <div class="calc-s">Estimate potential based on your numbers — not a guarantee</div>
    <div class="calc-disclaimer">⚠️ This is an educational tool only. Actual earnings depend on many factors outside DNForge's control including platform eligibility, content quality, audience engagement, and country of operation.</div>
    <div class="calc-row">
      <div class="cg"><label class="cg-l">Daily Views (all platforms)</label><input class="cf" id="cv-v" type="number" value="10000" oninput="calcE()"></div>
      <div class="cg"><label class="cg-l">Content Niche (RPM estimate)</label>
        <select class="cf" id="cv-n" onchange="calcE()">
          <option value="3">Motivation / Quotes (~$3 RPM)</option>
          <option value="5">Tech / Software (~$5 RPM)</option>
          <option value="10">Finance / Business (~$10 RPM)</option>
          <option value="4">Fitness / Health (~$4 RPM)</option>
          <option value="1.5">Entertainment (~$1.5 RPM)</option>
          <option value="8">Personal Finance (~$8 RPM)</option>
        </select>
      </div>
      <div class="cg"><label class="cg-l">Number of Channels / Pages</label><input class="cf" id="cv-c" type="number" value="3" min="1" max="50" oninput="calcE()"></div>
    </div>
    <div class="calc-res">
      <div class="cr"><div class="cr-v" id="cr-mo">$0</div><div class="cr-l">Monthly Est.</div></div>
      <div class="cr"><div class="cr-v" id="cr-6">$0</div><div class="cr-l">6 Months Est.</div></div>
      <div class="cr"><div class="cr-v" id="cr-yr">$0</div><div class="cr-l">Yearly Est.</div></div>
      <div class="cr"><div class="cr-v" id="cr-dy">$0</div><div class="cr-l">Daily Est.</div></div>
    </div>
  </div>
</section>

<div class="divl"></div>

<!-- TESTIMONIALS -->
<section class="sec reveal">
  <div class="sh"><div class="sh-bg">05</div><div><div class="sh-tag">Community</div><div class="sh-t">What Users Say</div></div></div>
  <div class="te-g">
    <div class="te"><div class="te-stars">★★★★★</div><p class="te-tx">"Completed Level 1 in 3 weeks. Now my Facebook page posts automatically every morning. It's not passive income yet — but the automation is real and working."</p><div class="te-au"><div class="te-av" style="background:var(--blue)">R</div><div><div class="te-n">Rahul Sharma</div><div class="te-r">Creator · India · Level 2</div></div></div></div>
    <div class="te"><div class="te-stars">★★★★★</div><p class="te-tx">"The learning roadmap is clear. I went from knowing nothing about Python to running a daily automation script. The step-by-step approach actually works for complete beginners."</p><div class="te-au"><div class="te-av" style="background:var(--green)">A</div><div><div class="te-n">Asmita Karki</div><div class="te-r">Student · Nepal · Level 1</div></div></div></div>
    <div class="te"><div class="te-stars">★★★★★</div><p class="te-tx">"The dashboard helped me track my channel growth across platforms in one place. Seeing the numbers weekly keeps me motivated. DNForge is a serious tool for serious creators."</p><div class="te-au"><div class="te-av" style="background:var(--purple)">K</div><div><div class="te-n">Karim Hassan</div><div class="te-r">Creator · UAE · Level 3</div></div></div></div>
  </div>
</section>

<div class="divl"></div>

<!-- WEEK PLAN -->
<section class="sec reveal">
  <div class="sh"><div class="sh-bg">06</div><div><div class="sh-tag">Action Plan</div><div class="sh-t">Your First 4 Weeks</div></div></div>
  <div class="week-g">
    <div class="wk"><div class="wk-n">W1</div><div class="wk-t">Python Basics</div><ul class="wk-list"><li>Install Python + VS Code</li><li>Learn print, variables, files</li><li>Save and read .txt files</li><li>Run your first script</li></ul></div>
    <div class="wk"><div class="wk-n">W2</div><div class="wk-t">AI Connection</div><ul class="wk-list"><li>Get OpenAI API key</li><li>Connect Python to AI</li><li>Generate + save quotes</li><li>Understand API calls</li></ul></div>
    <div class="wk"><div class="wk-n">W3</div><div class="wk-t">Image Generation</div><ul class="wk-list"><li>Set up Stable Diffusion</li><li>Generate images via code</li><li>Overlay text with Pillow</li><li>Build image pipeline</li></ul></div>
    <div class="wk"><div class="wk-n">W4</div><div class="wk-t">Facebook Upload</div><ul class="wk-list"><li>Get Facebook Graph API</li><li>Auto-post image + caption</li><li>Full pipeline end-to-end</li><li>🎉 Level 1 Complete!</li></ul></div>
  </div>
</section>

<div class="divl"></div>

<!-- FAQ -->
<section class="sec reveal" id="faq">
  <div class="sh"><div class="sh-bg">07</div><div><div class="sh-tag">Common Questions</div><div class="sh-t">FAQ</div></div></div>
  <div class="faq-l">
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Is DNForge free?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai">Yes. <strong>Level 1 Starter is completely free</strong> with limited AI credits (10/month). You can complete the full Level 1 curriculum, build your first automation script, and connect one platform at no cost. Paid plans (Builder, Pro, Empire) unlock more credits, more platforms, and higher level content.</div></div>
    </div>
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Does DNForge guarantee income?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai"><strong>No. DNForge does not guarantee any income.</strong> DNForge provides automation tools, learning content, and growth tracking. What you earn depends entirely on your content quality, niche, consistency, country, audience engagement, and platform monetization eligibility. We show what is possible — not what you will earn.</div></div>
    </div>
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Can I connect YouTube, Facebook, Instagram, and TikTok?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai">Yes. Platform connection is available through official APIs and OAuth. <strong>Facebook and Instagram</strong> use the Meta Graph API. <strong>YouTube</strong> uses YouTube Data API v3. <strong>TikTok</strong> uses TikTok for Developers API. Each platform requires API key setup and developer approval for certain features. DNForge guides you through this process at each level.</div></div>
    </div>
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Can I cancel my subscription anytime?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai">Yes. <strong>Email moviesdn7@gmail.com to cancel</strong> at any time. For monthly plans, cancellation takes effect at the end of the current billing month — you keep access until then. For yearly plans, you keep access until the plan expiry date. No hidden fees, no cancellation charges.</div></div>
    </div>
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Which payments are supported?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai">DNForge accepts <strong>PayPal</strong> (international), <strong>eSewa</strong> (Nepal), <strong>Khalti</strong> (Nepal), and <strong>bank transfer</strong> (SWIFT/local). After payment, email moviesdn7@gmail.com with your receipt and email address to activate your plan. Automated payment verification is on the development roadmap.</div></div>
    </div>
    <div class="fi">
      <button class="fi-q" onclick="toggleFaq(this)">Do I need coding experience?<span class="fi-ic">+</span></button>
      <div class="fi-a"><div class="fi-ai"><strong>No coding experience needed for Level 1.</strong> The curriculum starts from absolute zero — you'll begin with print("Hello World") and build up gradually. Level 1 takes approximately 4 weeks for a complete beginner. At Level 2+, basic Python knowledge from Level 1 is all you need. Advanced automation (Level 3+) involves more complex scripting, but DNForge teaches it step by step.</div></div>
    </div>
  </div>
</section>

<div class="divl"></div>

<!-- FINAL -->
<section class="final reveal">
  <div class="fg"></div>
  <div class="ftag">// Your Next Move</div>
  <div class="ftitle">Build the Machine.<br><span>Then let it work.</span></div>
  <div class="fsub">Start Level 1 this week. Don't rush. Don't skip steps.<br><em>One working script beats ten unfinished ideas.</em></div>
  <div class="ctr-r">
    <div class="cri"><div class="cri-n" data-t="5">0</div><div class="cri-l">Platforms</div></div>
    <div class="cri"><div class="cri-n" data-t="5">0</div><div class="cri-l">Levels</div></div>
    <div class="cri"><div class="cri-n" data-t="24">0</div><div class="cri-l">Hrs/Day Auto</div></div>
    <div class="cri"><div class="cri-n" data-t="1">0</div><div class="cri-l">Person Needed</div></div>
  </div>
  <button class="btn-g" onclick="openAuth('up')">Start Free Today →</button>
</section>

<footer>
  <div class="ft-l">
    <svg viewBox="0 0 30 30" width="26" height="26" fill="none"><polygon points="15,1.5 27,8.5 27,21.5 15,28.5 3,21.5 3,8.5" stroke="#c9982a" stroke-width="1" fill="rgba(201,152,42,.05)"/><path d="M8 11L8 19L11 19C14 19 16 17 16 15C16 13 14 11 11 11Z" fill="none" stroke="#e8b84b" stroke-width="1.4"/><path d="M18 11L18 19M18 11L23 19M23 11L23 19" stroke="#e8b84b" stroke-width="1.4" stroke-linecap="round"/></svg>
    <div><div class="ft-n">DNForge</div><div class="ft-t">AI Automation Platform</div></div>
  </div>
  <div class="ft-links">
    <a href="#what">Platform</a><a href="#pricing">Pricing</a>
    <a href="#faq">FAQ</a><a href="mailto:moviesdn7@gmail.com">Contact</a>
  </div>
  <div class="ft-copy">© <span>2026 DNForge</span> · All rights reserved.</div>
</footer>
<div class="ft-disc">DNForge is a learning platform and SaaS tool. It does not guarantee income, employment, or financial results. All earnings information is educational and based on publicly available platform data. Results depend on individual effort, content quality, and platform eligibility. By using DNForge you agree to our Terms of Service.</div>

</div><!-- .page -->

<button id="fb" onclick="window.location='mailto:moviesdn7@gmail.com'" title="Contact DN Team">✉️</button>
<div id="tw"></div>
<div id="ck">
  <div class="ck-t">DNForge uses cookies to remember your progress and improve your experience. <span>Learn more</span></div>
  <div class="ck-bs">
    <button class="ck-ok" onclick="acceptCk()">Accept</button>
    <button class="ck-no" onclick="document.getElementById('ck').classList.remove('show')">Decline</button>
  </div>
</div>

<!-- AUTH MODAL -->
<div id="auth-ov">
  <div class="abox">
    <div class="a-hd">
      <div class="a-ln">
        <svg viewBox="0 0 32 32" width="28" height="28" fill="none"><polygon points="16,1 29,8.5 29,23.5 16,31 3,23.5 3,8.5" stroke="#c9982a" stroke-width="1.2" fill="rgba(201,152,42,.06)"/><path d="M8 12L8 20L11 20C14 20 16 18 16 16C16 14 14 12 11 12Z" fill="none" stroke="#e8b84b" stroke-width="1.5"/><path d="M18 12L18 20M18 12L24 20M24 12L24 20" stroke="#e8b84b" stroke-width="1.5" stroke-linecap="round"/></svg>
        <div><div class="a-ln-n">DNForge</div><div class="a-ln-s">AI Automation Platform · 2026</div></div>
      </div>
      <button class="a-cl" onclick="closeAuth()">✕</button>
    </div>
    <div class="a-tabs">
      <button class="atab active" id="at-in" onclick="swTab('in')">Sign In</button>
      <button class="atab" id="at-up" onclick="swTab('up')">Create Account</button>
    </div>
    <div class="a-body">
      <!-- SIGN IN -->
      <div class="a-form active" id="f-in">
        <div class="a-social">
          <button class="s-btn" onclick="socialAuth('google')">🔵 Continue with Google</button>
          <button class="s-btn" onclick="socialAuth('microsoft')">🟦 Continue with Microsoft</button>
        </div>
        <div class="a-div">or email</div>
        <div class="ag"><label class="ag-l">Email Address</label><input class="ag-i" id="si-e" type="email" placeholder="your@email.com"></div>
        <div class="ag"><label class="ag-l">Password <span class="fgt">Forgot?</span></label><input class="ag-i" id="si-p" type="password" placeholder="••••••••"></div>
        <button class="a-sub" onclick="doSignIn()">Sign In to DNForge</button>
        <div class="a-sw">No account? <span onclick="swTab('up')">Create one free →</span></div>
      </div>
      <!-- SIGN UP -->
      <div class="a-form" id="f-up">
        <div class="a-social">
          <button class="s-btn" onclick="socialAuth('google')">🔵 Continue with Google</button>
          <button class="s-btn" onclick="socialAuth('microsoft')">🟦 Continue with Microsoft</button>
        </div>
        <div class="a-div">or email</div>
        <div class="a2c">
          <div class="ag"><label class="ag-l">Full Name</label><input class="ag-i" id="su-n" type="text" placeholder="Dhiraj Nepal"></div>
          <div class="ag"><label class="ag-l">Country</label><input class="ag-i" id="su-c" type="text" placeholder="Nepal"></div>
        </div>
        <div class="ag"><label class="ag-l">Email Address</label><input class="ag-i" id="su-e" type="email" placeholder="your@email.com"></div>
        <div class="ag"><label class="ag-l">Password (min 6 chars)</label>
          <input class="ag-i" id="su-p" type="password" placeholder="••••••••" oninput="checkPw()">
          <div class="pw-str"><div class="pw-b" id="pw1"></div><div class="pw-b" id="pw2"></div><div class="pw-b" id="pw3"></div><div class="pw-b" id="pw4"></div></div>
        </div>
        <div style="margin-bottom:14px">
          <div style="font-family:'JetBrains Mono',monospace;font-size:8px;letter-spacing:2px;color:var(--dim2);text-transform:uppercase;margin-bottom:10px">Choose Plan</div>
          <div class="plan-g">
            <div class="pp sel" id="pp-s" onclick="selPlan('starter')"><div class="pp-n">Starter</div><div class="pp-p">Free</div></div>
            <div class="pp" id="pp-b" onclick="selPlan('builder')"><div class="pp-n">Builder</div><div class="pp-p">$9/mo</div></div>
            <div class="pp" id="pp-p2" onclick="selPlan('pro')"><div class="pp-n">Pro</div><div class="pp-p">$19/mo</div></div>
            <div class="pp" id="pp-e" onclick="selPlan('empire')"><div class="pp-n">Empire</div><div class="pp-p">$49/mo</div></div>
          </div>
        </div>
        <div class="a-terms">By creating an account you agree to DNForge <span>Terms of Service</span> and <span>Privacy Policy</span>.</div>
        <button class="a-sub" onclick="doSignUp()">Create Free Account</button>
        <div class="a-sw">Have account? <span onclick="swTab('in')">Sign in →</span></div>
      </div>
    </div>
  </div>
</div>

<!-- DASHBOARD -->
<div id="dp">
  <div class="dp-ov" onclick="closeDash()"></div>
  <div class="dp-box">
    <div class="dp-bar"></div>
    <div class="dp-hd"><div class="dp-ht">My Dashboard</div><button class="dp-cl" onclick="closeDash()">✕</button></div>
    <div class="dp-tabs">
      <button class="dt active" onclick="swDash('overview')">Overview</button>
      <button class="dt" onclick="swDash('platforms')">Platforms</button>
      <button class="dt" onclick="swDash('progress')">Progress</button>
      <button class="dt" onclick="swDash('earnings')">Earnings</button>
    </div>
    <div class="dp-body">
      <!-- OVERVIEW -->
      <div class="dtc active" id="dt-overview">
        <div class="dp-wl"><div class="dp-av" id="dp-av">D</div><div><div class="dp-wn" id="dp-wn">Welcome!</div><div class="dp-wp" id="dp-wp">Starter Plan</div><div class="dp-we" id="dp-we">-</div></div></div>
        <div class="dp-cd">
          <div class="dp-ct">Your Level</div>
          <div class="ld-row">
            <div class="ld" id="ld1"><div class="ld-d">1</div><div class="ld-l">Basic</div></div>
            <div class="ld" id="ld2"><div class="ld-d">2</div><div class="ld-l">Schedule</div></div>
            <div class="ld" id="ld3"><div class="ld-d">3</div><div class="ld-l">Video</div></div>
            <div class="ld" id="ld4"><div class="ld-d">4</div><div class="ld-l">Empire</div></div>
            <div class="ld" id="ld5"><div class="ld-d">5</div><div class="ld-l">Full AI</div></div>
          </div>
          <div style="font-family:'JetBrains Mono',monospace;font-size:9px;color:var(--dim2);margin-top:8px">Active: <span id="dp-lvt" style="color:var(--g2)">Level 1 — Basic Automation</span></div>
        </div>
        <div class="dp-cd">
          <div class="dp-ct">AI Credits</div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px"><span style="font-size:12px;color:var(--dim2)">Used this month</span><span style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:var(--g2)" id="dp-cr">0 / 10</span></div>
          <div class="cb"><div class="cbf" id="dp-crf" style="width:0%"></div></div>
          <div style="font-family:'JetBrains Mono',monospace;font-size:8px;color:var(--dim);margin-top:6px">Resets 1st of every month</div>
        </div>
        <div class="dp-cd">
          <div class="dp-ct">This Month</div>
          <div class="dp-stats">
            <div class="dps"><div class="dps-v" id="dp-posts">0</div><div class="dps-l">Posts</div></div>
            <div class="dps"><div class="dps-v" id="dp-reach">0</div><div class="dps-l">Est. Reach</div></div>
            <div class="dps"><div class="dps-v" id="dp-earn">$0</div><div class="dps-l">Est. Income</div></div>
          </div>
        </div>
        <div class="ns"><div class="ns-t">📌 Next Action</div><div class="ns-d" id="dp-nxt">Install Python + VS Code on your laptop. Run your first print("Hello World") script.</div><button class="ns-b" onclick="closeDash()">Go Build It →</button></div>
      </div>
      <!-- PLATFORMS -->
      <div class="dtc" id="dt-platforms">
        <div class="dp-cd">
          <div class="dp-ct">Connected Platforms</div>
          <div class="plt-l" id="plt-l">
            <div class="pi" id="pi-fb"><span class="pi-ic">📘</span><span class="pi-nm">Facebook</span><button class="pi-btn" onclick="connPlt('fb')">+ Connect</button></div>
            <div class="pi" id="pi-ig"><span class="pi-ic">📸</span><span class="pi-nm">Instagram</span><button class="pi-btn" onclick="connPlt('ig')">+ Connect</button></div>
            <div class="pi" id="pi-yt"><span class="pi-ic">▶️</span><span class="pi-nm">YouTube</span><button class="pi-btn" onclick="connPlt('yt')">+ Connect</button></div>
            <div class="pi" id="pi-tt"><span class="pi-ic">🎵</span><span class="pi-nm">TikTok</span><button class="pi-btn" onclick="connPlt('tt')">+ Connect</button></div>
          </div>
        </div>
        <div class="dp-cd">
          <div class="dp-ct">Enter Your Stats (weekly update)</div>
          <div class="psf">
            <div class="psfr"><span class="psf-ic">📘</span><span class="psf-n">FB Followers</span><input class="psf-i" id="st-fb" type="number" placeholder="e.g. 1200" oninput="saveStats()"></div>
            <div class="psfr"><span class="psf-ic">📸</span><span class="psf-n">IG Followers</span><input class="psf-i" id="st-ig" type="number" placeholder="e.g. 800" oninput="saveStats()"></div>
            <div class="psfr"><span class="psf-ic">▶️</span><span class="psf-n">YT Subs</span><input class="psf-i" id="st-yt" type="number" placeholder="e.g. 400" oninput="saveStats()"></div>
            <div class="psfr"><span class="psf-ic">🎵</span><span class="psf-n">TT Followers</span><input class="psf-i" id="st-tt" type="number" placeholder="e.g. 600" oninput="saveStats()"></div>
          </div>
          <div style="font-family:'JetBrains Mono',monospace;font-size:8px;color:var(--dim);margin-top:10px">Saved locally to your device. Update weekly to track growth over time.</div>
        </div>
      </div>
      <!-- PROGRESS -->
      <div class="dtc" id="dt-progress">
        <div class="dp-cd">
          <div class="dp-ct">Empire Progress</div>
          <div class="pb-info"><span>Overall</span><span id="pp-pct">0%</span></div>
          <div class="pb"><div class="pbf" id="pp-bar" style="width:0%;background:var(--g2)"></div></div>
          <div style="margin-top:16px;display:flex;flex-direction:column;gap:10px" id="lv-cl"></div>
        </div>
        <div class="dp-cd">
          <div class="dp-ct">Platform Growth (from stats you entered)</div>
          <div class="ec">
            <div class="ecr"><span class="ecl">📘 Facebook</span><div class="ecbw"><div class="ecbf" id="gc-fb" style="width:0%;background:var(--blue)"></div></div><span class="ecv" id="gv-fb">0</span></div>
            <div class="ecr"><span class="ecl">📸 Instagram</span><div class="ecbw"><div class="ecbf" id="gc-ig" style="width:0%;background:var(--red)"></div></div><span class="ecv" id="gv-ig">0</span></div>
            <div class="ecr"><span class="ecl">▶️ YouTube</span><div class="ecbw"><div class="ecbf" id="gc-yt" style="width:0%;background:var(--red)"></div></div><span class="ecv" id="gv-yt">0</span></div>
            <div class="ecr"><span class="ecl">🎵 TikTok</span><div class="ecbw"><div class="ecbf" id="gc-tt" style="width:0%;background:var(--green)"></div></div><span class="ecv" id="gv-tt">0</span></div>
          </div>
        </div>
      </div>
      <!-- EARNINGS -->
      <div class="dtc" id="dt-earnings">
        <div style="background:rgba(201,152,42,.06);border:1px solid var(--bd2);padding:14px 16px;font-family:'JetBrains Mono',monospace;font-size:9px;color:var(--dim2);line-height:1.9;margin-bottom:0">⚠️ These are rough estimates only. Actual earnings depend on platform eligibility, content quality, engagement, and country. This is NOT a guarantee.</div>
        <div class="dp-cd">
          <div class="dp-ct">Estimated Monthly Earnings</div>
          <div class="ec">
            <div class="ecr"><span class="ecl">YT Ad Revenue</span><div class="ecbw"><div class="ecbf" id="e-yt" style="width:0%;background:var(--red)"></div></div><span class="ecv" id="ev-yt">$0</span></div>
            <div class="ecr"><span class="ecl">FB In-Stream</span><div class="ecbw"><div class="ecbf" id="e-fb" style="width:0%;background:var(--blue)"></div></div><span class="ecv" id="ev-fb">$0</span></div>
            <div class="ecr"><span class="ecl">Sponsorships</span><div class="ecbw"><div class="ecbf" id="e-sp" style="width:0%;background:var(--purple)"></div></div><span class="ecv" id="ev-sp">$0</span></div>
            <div class="ecr"><span class="ecl">Affiliate Est.</span><div class="ecbw"><div class="ecbf" id="e-af" style="width:0%;background:var(--green)"></div></div><span class="ecv" id="ev-af">$0</span></div>
          </div>
          <div style="margin-top:16px;padding:14px;background:rgba(201,152,42,.06);border:1px solid var(--bd2);text-align:center">
            <div style="font-family:'JetBrains Mono',monospace;font-size:8px;color:var(--dim2);letter-spacing:2px;text-transform:uppercase;margin-bottom:4px">Total Estimate</div>
            <div style="font-family:'Playfair Display',serif;font-size:32px;font-weight:900;color:var(--g2)" id="e-tot">$0</div>
            <div style="font-family:'JetBrains Mono',monospace;font-size:8px;color:var(--dim);margin-top:4px">Based on follower counts you entered</div>
          </div>
        </div>
        <div class="dp-cd">
          <div class="dp-ct">Realistic Timeline</div>
          <div style="display:flex;flex-direction:column;gap:7px;font-size:11px;color:var(--dim2);line-height:1.8">
            <div><span style="color:var(--green)">Month 1–2:</span> Building — $0 expected</div>
            <div><span style="color:var(--blue)">Month 3–4:</span> First content live — small or $0</div>
            <div><span style="color:var(--g2)">Month 5–6:</span> Consistency pays — varies</div>
            <div><span style="color:var(--orange)">Year 1:</span> Results vary based on effort + niche</div>
            <div><span style="color:var(--purple)">Year 2+:</span> Compound growth — depends on you</div>
          </div>
        </div>
      </div>
    </div>
    <button class="dp-lo" onclick="doLogout()">Sign Out</button>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
