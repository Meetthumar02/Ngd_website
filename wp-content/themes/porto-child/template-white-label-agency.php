<?php
/**
 * Template Name: White Label Agency
 * Description: High-converting White Label Development landing page for NGD Technolab
 */

// Enqueue page-specific styles and scripts
function ngd_enqueue_white_label_assets() {
    $theme_uri = get_stylesheet_directory_uri();
    wp_enqueue_style(
        'ngd-white-label-agency-css',
        $theme_uri . '/css/white-label-agency.css',
        array(),
        '1.2.2'
    );
    wp_enqueue_script(
        'ngd-white-label-agency-js',
        $theme_uri . '/js/white-label-agency.js',
        array(),
        '1.2.1',
        true
    );
}
add_action('wp_enqueue_scripts', 'ngd_enqueue_white_label_assets', 30);

// Disable Porto breadcrumbs & page title, and force fullwidth
add_filter('porto_meta_layout', function($layout) {
    return array('widewidth', '', '');
});
add_filter('porto_show_breadcrumbs', '__return_false');
global $porto_settings;
if (isset($porto_settings)) {
    $porto_settings['show-breadcrumbs'] = false;
    $porto_settings['show-pagetitle'] = false;
}

get_header();
?>

<main class="wl-page-wrapper">

  <!-- ==========================================================================
       1. HERO SECTION (INTERACTIVE MOUSE PARALLAX)
       ========================================================================== -->
  <section class="wl-hero-section">
    <div class="wl-container">
      <div class="wl-hero-grid">
        
        <!-- Left Content -->
        <div class="wl-hero-content wl-reveal in-view">
          <div class="wl-badge-pill">
            <span class="wl-badge-dot"></span>
            White-Label Development Partnership
          </div>
          
          <h1 class="wl-hero-headline">
            White-Label Development Shipped Under <span class="brand-span">Your Brand.</span>
          </h1>
          
          <p class="wl-hero-subline">
            You stay the face, they never see us. Scalable web, mobile, and AI engineering for high-growth agencies with 100% brand invisibility, ironclad NDAs, and zero hiring overhead.
          </p>
          
          <div class="wl-hero-ctas">
            <a href="#wl-contact" class="wl-btn wl-btn-primary">
              <span>Book Discovery Call</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a href="#wl-models" class="wl-btn wl-btn-secondary">
              <span>Explore Partnership Models</span>
            </a>
          </div>
          
          <div class="wl-hero-features-list">
            <div class="wl-hero-feature-item">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
              <span>100% Bi-Directional NDA</span>
            </div>
            <div class="wl-hero-feature-item">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <span>You Own 100% Code & IP</span>
            </div>
            <div class="wl-hero-feature-item">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
              <span>Dedicated Ghost Pods</span>
            </div>
          </div>
        </div>

        <!-- Right Interactive 3D Parallax Stage -->
        <div class="wl-hero-interactive-stage">
          
          <!-- Floating Badge 1: Clutch Rating -->
          <div class="wl-float-badge wl-float-badge-1">
            <div class="wl-float-icon-wrap wl-icon-green">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <div class="wl-float-text">
              <span class="wl-num">4.9 / 5.0 Rating</span>
              <span class="wl-label">Clutch Agency Partner</span>
            </div>
          </div>

          <!-- Main 3D Card (Tilt responsive to cursor) -->
          <div class="wl-parallax-card-main">
            <div class="wl-terminal-header">
              <span class="wl-terminal-dot wl-dot-red"></span>
              <span class="wl-terminal-dot wl-dot-yellow"></span>
              <span class="wl-terminal-dot wl-dot-green"></span>
              <span class="wl-terminal-title">ngd-white-label.config</span>
            </div>
            
            <div class="wl-partner-badge-row">
              <div class="wl-partner-icon-circle">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.71 8.71l-2.42-2.42a2.003 2.003 0 0 0-2.83 0L14.5 8.25l-1.04-1.04a2.003 2.003 0 0 0-2.83 0L8.21 9.63l-.75-.75a1.996 1.996 0 0 0-2.83 0L2.29 11.21a2.003 2.003 0 0 0 0 2.83l5.04 5.04c.75.75 1.98.78 2.77.08l.06-.08 3.54-3.54 2.83 2.83c.78.78 2.05.78 2.83 0l4.35-4.35a2.003 2.003 0 0 0 0-2.83l-2-2.48z"></path></svg>
              </div>
              <div class="wl-partner-info">
                <h4>Partner Delivery Pod</h4>
                <p>Client Visibility: 0% (Ghost Mode)</p>
              </div>
            </div>

            <div class="wl-code-snippet">
              <div class="wl-code-comment">// Active Project Pipeline</div>
              <div><span class="wl-code-key">"agency_brand"</span>: <span class="wl-code-val">"YOUR_AGENCY"</span>,</div>
              <div><span class="wl-code-key">"client_facing"</span>: <span class="wl-code-val">"You (100%)"</span>,</div>
              <div><span class="wl-code-key">"dev_engine"</span>: <span class="wl-code-val">"NGD Technolab"</span>,</div>
              <div><span class="wl-code-key">"nda_enforced"</span>: <span class="wl-code-val">true</span>,</div>
              <div><span class="wl-code-key">"status"</span>: <span class="wl-code-val">"Shipping Sprint 4"</span></div>
            </div>
          </div>

          <!-- Floating Badge 2: Retained Margin -->
          <div class="wl-float-badge wl-float-badge-2">
            <div class="wl-float-icon-wrap wl-icon-blue">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <div class="wl-float-text">
              <span class="wl-num">+65% - 75%</span>
              <span class="wl-label">Agency Gross Margin</span>
            </div>
          </div>

          <!-- Floating Badge 3: Deployed Products -->
          <div class="wl-float-badge wl-float-badge-3">
            <div class="wl-float-icon-wrap wl-icon-purple">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
            <div class="wl-float-text">
              <span class="wl-num">250+ Products</span>
              <span class="wl-label">Shipped Invisibly</span>
            </div>
          </div>

        </div>

      </div>

      <!-- Trust Strip Under Fold -->
      <div class="wl-trust-strip wl-reveal">
        <div class="wl-trust-grid">
          <div class="wl-trust-item">
            <span class="wl-metric">4.9 <span class="star-icon">★</span></span>
            <span class="wl-desc">Clutch & G2 Verified</span>
          </div>
          <div class="wl-trust-item">
            <span class="wl-metric">10+ Years</span>
            <span class="wl-desc">Agency Dev Partnerships</span>
          </div>
          <div class="wl-trust-item">
            <span class="wl-metric">75+ Devs</span>
            <span class="wl-desc">Full-Time Senior Engineers</span>
          </div>
          <div class="wl-trust-item">
            <span class="wl-metric">250+ Apps</span>
            <span class="wl-desc">Deployed On Stores & Web</span>
          </div>
          <div class="wl-trust-item">
            <span class="wl-metric">100%</span>
            <span class="wl-desc">Confidential & Ghost-Operated</span>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- ==========================================================================
       2. "WHAT IS WHITE-LABEL" MICRO-EXPLAINER
       ========================================================================== -->
  <section class="wl-explainer-section">
    <div class="wl-container">
      <div class="wl-explainer-box wl-reveal">
        <div class="wl-explainer-text">
          <div class="wl-badge-pill">The Definition</div>
          <h3>What Is True White-Label Development?</h3>
          <p>
            White-label development means we serve as your agency's dedicated, invisible engineering department. You own the client relationship, pitch the project, and determine the pricing. We design, code, QA, and deploy the entire solution behind the scenes under your brand.
          </p>
          <p>
            Your clients will never see NGD's name, email, or domain. We plug into your Slack, ClickUp, or Jira, commit to your repositories, and follow your project management cadence.
          </p>
        </div>

        <div class="wl-explainer-pillars">
          <div class="wl-pillar-card">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--wl-primary)" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            <h4>Ghost Invisibility</h4>
            <p>Zero public credits. We never mention your projects on our portfolio.</p>
          </div>
          <div class="wl-pillar-card">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--wl-primary)" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            <h4>Non-Compete Bound</h4>
            <p>Strict legal clauses barring us from ever soliciting or pitching your clients.</p>
          </div>
          <div class="wl-pillar-card">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--wl-primary)" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <h4>Immediate IP Transfer</h4>
            <p>You and your client own 100% of the repository, source code, and assets.</p>
          </div>
          <div class="wl-pillar-card">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--wl-primary)" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
            <h4>Wholesale Margins</h4>
            <p>Predictable partner rates that leave you with 60% to 75% gross profit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       3. WORKFLOW INTEGRATION (3-STEP PIPELINE)
       ========================================================================== -->
  <section class="wl-workflow-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Frictionless Workflow</div>
        <h2 class="wl-section-title">How It Slots Into Your Agency's <span class="highlight">Existing Pipeline</span></h2>
        <p class="wl-section-subtitle">
          You don't need to change how you work. We integrate directly into your existing communication channels and client delivery cadence.
        </p>
      </div>

      <div class="wl-workflow-grid">
        <div class="wl-workflow-card wl-reveal wl-delay-1">
          <div class="wl-step-number-badge">01</div>
          <h3>Your Client Needs Development</h3>
          <p>
            Your client asks for a custom mobile app, complex web platform, or AI integration. You scope high-level goals and close the contract under your agency's standard terms.
          </p>
        </div>

        <div class="wl-workflow-card wl-reveal wl-delay-2">
          <div class="wl-step-number-badge">02</div>
          <h3>You Plug In NGD Ghost Pod</h3>
          <p>
            You hand the technical brief to your dedicated NGD project team. We set up sprints, architecture, and join your Slack/Teams using your company email domain.
          </p>
        </div>

        <div class="wl-workflow-card wl-reveal wl-delay-3">
          <div class="wl-step-number-badge">03</div>
          <h3>We Execute, You Take The Credit</h3>
          <p>
            We engineer, QA, and deploy the solution. You present the milestone demos, bill your client at full retail rate, and keep the healthy margin spread.
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       4. PAIN POINTS ("WHY THIS MATTERS")
       ========================================================================== -->
  <section class="wl-pain-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">The Agency Dilemma</div>
        <h2 class="wl-section-title">Sound Like Challenges You Face <span class="highlight">Every Quarter?</span></h2>
        <p class="wl-section-subtitle">
          Running an agency shouldn't mean taking on unpredictable engineering headaches and bloated payroll risks.
        </p>
      </div>

      <div class="wl-pain-grid">
        <div class="wl-pain-card wl-reveal wl-delay-1">
          <div class="wl-pain-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>
          <h3>Turning Down Lucrative Tech Projects</h3>
          <p>
            Your clients want custom mobile apps or backend systems, but because your team focuses on design, SEO, or branding, you leave tens of thousands on the table.
          </p>
        </div>

        <div class="wl-pain-card wl-reveal wl-delay-2">
          <div class="wl-pain-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          </div>
          <h3>Unreliable Freelancers & Ghosting</h3>
          <p>
            Freelancers miss deadlines, write spaghetti code, or disappear halfway through a release, leaving you to apologize to an angry client and fix broken code.
          </p>
        </div>

        <div class="wl-pain-card wl-reveal wl-delay-3">
          <div class="wl-pain-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7.5" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
          </div>
          <h3>Can't Justify In-House Senior Payroll</h3>
          <p>
            Hiring full-time senior mobile and cloud developers costs $120k+ per head. When project flow dips, developer salaries crush your agency's operating profit.
          </p>
        </div>

        <div class="wl-pain-card wl-reveal wl-delay-4">
          <div class="wl-pain-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
          </div>
          <h3>Referral Fee Leakage</h3>
          <p>
            Referring clients to external dev agencies only gets you a meager 10% referral fee while surrendering total control of the client relationship.
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       5. WHO IT'S FOR (AUDIENCE SEGMENTATION)
       ========================================================================== -->
  <section class="wl-audience-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Audience Alignment</div>
        <h2 class="wl-section-title">Tailored For Agencies That Want To <span class="highlight">Scale Delivery</span></h2>
        <p class="wl-section-subtitle">
          We partner with specialized agencies across the globe to turn their designs, strategies, and client relationships into fully functioning digital software.
        </p>
      </div>

      <div class="wl-audience-grid">
        <div class="wl-audience-card wl-reveal wl-delay-1">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
          </div>
          <h3>UI/UX & Product Design Studios</h3>
          <p>
            You create stunning Figma prototypes. We transform them into pixel-perfect React, Flutter, and iOS apps without compromising a single design detail.
          </p>
        </div>

        <div class="wl-audience-card wl-reveal wl-delay-2">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
          </div>
          <h3>Marketing, SEO & Growth Agencies</h3>
          <p>
            Expand into high-retainer custom portal development, mobile apps, and automated marketing tool integrations for your existing growth clients.
          </p>
        </div>

        <div class="wl-audience-card wl-reveal wl-delay-3">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
          </div>
          <h3>No-Code, Webflow & Shopify Shops</h3>
          <p>
            When your clients outgrow no-code limits and need custom APIs, native apps, or heavy database logic, we build the complex custom backend.
          </p>
        </div>

        <div class="wl-audience-card wl-reveal wl-delay-1">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
          </div>
          <h3>Fractional CTOs & Tech Consultants</h3>
          <p>
            You provide high-level tech advisory and strategy. We provide the disciplined engineering pods that execute your architectural blueprints.
          </p>
        </div>

        <div class="wl-audience-card wl-reveal wl-delay-2">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </div>
          <h3>Creative & Branding Agencies</h3>
          <p>
            Sell digital products alongside new brand rollouts. Offer web platforms and mobile apps without ever learning to manage developers.
          </p>
        </div>

        <div class="wl-audience-card wl-reveal wl-delay-3">
          <div class="wl-audience-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
          </div>
          <h3>Venture Studios & Incubators</h3>
          <p>
            Accelerate MVP builds for portfolio startups with battle-tested agile pods that ship fast, iterate quickly, and maintain clean scalable codebases.
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       6. WHAT WE DELIVER (CORE OFFERINGS & TECH TAGS)
       ========================================================================== -->
  <section class="wl-services-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Capabilities</div>
        <h2 class="wl-section-title">What We Ship Under <span class="highlight">Your Agency's Name</span></h2>
        <p class="wl-section-subtitle">
          Full-cycle development from architecture to deployment across modern mobile, web, cloud, and artificial intelligence stacks.
        </p>
      </div>

      <div class="wl-services-grid">
        <!-- 1. Mobile App Development -->
        <div class="wl-service-block wl-reveal wl-delay-1">
          <div class="wl-service-header">
            <div class="wl-service-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
            </div>
            <div class="wl-service-title">
              <h3>Mobile App Development</h3>
            </div>
          </div>
          <div class="wl-service-desc">
            Native iOS & Android apps and high-performance cross-platform Flutter/React Native solutions. We handle Apple App Store & Google Play submissions on your developer accounts.
          </div>
          <div class="wl-tech-tag-row">
            <span class="wl-tech-tag">Flutter</span>
            <span class="wl-tech-tag">React Native</span>
            <span class="wl-tech-tag">Swift (iOS)</span>
            <span class="wl-tech-tag">Kotlin (Android)</span>
            <span class="wl-tech-tag">FlutterFlow</span>
            <span class="wl-tech-tag">BLE & IoT</span>
          </div>
        </div>

        <!-- 2. Web & Cloud Applications -->
        <div class="wl-service-block wl-reveal wl-delay-2">
          <div class="wl-service-header">
            <div class="wl-service-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            </div>
            <div class="wl-service-title">
              <h3>Web & Cloud Applications</h3>
            </div>
          </div>
          <div class="wl-service-desc">
            Scalable custom web apps, customer portals, SaaS platforms, and headless eCommerce backends with bulletproof cloud infrastructure and real-time database architecture.
          </div>
          <div class="wl-tech-tag-row">
            <span class="wl-tech-tag">React.js</span>
            <span class="wl-tech-tag">Next.js</span>
            <span class="wl-tech-tag">Node.js</span>
            <span class="wl-tech-tag">PHP / Laravel</span>
            <span class="wl-tech-tag">Python</span>
            <span class="wl-tech-tag">AWS & GCP</span>
          </div>
        </div>

        <!-- 3. Custom Software & ERP/CRM -->
        <div class="wl-service-block wl-reveal wl-delay-1">
          <div class="wl-service-header">
            <div class="wl-service-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            </div>
            <div class="wl-service-title">
              <h3>Custom Software, ERP & CRM</h3>
            </div>
          </div>
          <div class="wl-service-desc">
            Tailored enterprise business automation systems, internal operational tooling, custom billing/CRM systems, and legacy software modernizations built to scale.
          </div>
          <div class="wl-tech-tag-row">
            <span class="wl-tech-tag">Custom CRM</span>
            <span class="wl-tech-tag">ERP Modules</span>
            <span class="wl-tech-tag">REST / GraphQL APIs</span>
            <span class="wl-tech-tag">Microservices</span>
            <span class="wl-tech-tag">Docker</span>
            <span class="wl-tech-tag">PostgreSQL</span>
          </div>
        </div>

        <!-- 4. AI & Intelligent Automation -->
        <div class="wl-service-block wl-reveal wl-delay-2">
          <div class="wl-service-header">
            <div class="wl-service-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            </div>
            <div class="wl-service-title">
              <h3>AI & Intelligent Automation</h3>
            </div>
          </div>
          <div class="wl-service-desc">
            Give your agency an instant AI offering. We build custom LLM workflows, autonomous AI agents, enterprise RAG knowledge bases, and smart conversational bots for your clients.
          </div>
          <div class="wl-tech-tag-row">
            <span class="wl-tech-tag">OpenAI & Claude</span>
            <span class="wl-tech-tag">RAG Pipelines</span>
            <span class="wl-tech-tag">LangChain</span>
            <span class="wl-tech-tag">Vector DBs</span>
            <span class="wl-tech-tag">AI Chatbots</span>
            <span class="wl-tech-tag">Agentic AI</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       7. THE ECONOMICS & MARGIN SECTION (INTERACTIVE CALCULATOR)
       ========================================================================== -->
  <section class="wl-margin-section" id="wl-economics">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">The Economics</div>
        <h2 class="wl-section-title">Transparent Margins: <span class="highlight">What Your Agency Makes</span></h2>
        <p class="wl-section-subtitle">
          We don't hide our rates. You pay our wholesale partner rate, you bill your standard market rate, and your agency keeps 100% of the difference.
        </p>
      </div>

      <div class="wl-margin-card-wrapper wl-reveal">
        <div class="wl-margin-columns">
          <!-- Left: Rate Comparison -->
          <div>
            <h3>The Direct Margin Mechanism</h3>
            <p style="color: var(--wl-slate-600); line-height: 1.6; margin-bottom: 24px;">
              Most US, UK, and European agencies bill engineering at $90 to $160+/hour. With NGD's wholesale partner pricing starting at $32/hour, you retain high gross margins without adding a single dollar of permanent overhead.
            </p>

            <div class="wl-margin-rate-cards">
              <div class="wl-rate-card">
                <div class="wl-rate-title">You Bill Client</div>
                <div class="wl-rate-val">$120/hr</div>
              </div>
              <div class="wl-rate-card">
                <div class="wl-rate-title">You Pay NGD</div>
                <div class="wl-rate-val">$32/hr</div>
              </div>
              <div class="wl-rate-card highlight">
                <div class="wl-rate-title">Your Retained Margin</div>
                <div class="wl-rate-val">+$88/hr</div>
              </div>
            </div>

            <div style="margin-top: 24px; padding: 16px; background: #fff; border-radius: var(--wl-radius-md); border: 1px solid var(--wl-border); display: flex; align-items: center; gap: 12px;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <span style="font-size: 0.92rem; color: var(--wl-slate-700); font-weight: 500;">
                No setup fees, no long-term lock-in, scale up or down sprint-by-sprint.
              </span>
            </div>
          </div>

          <!-- Right: Interactive Margin Calculator -->
          <div class="wl-calculator-box">
            <h3>Interactive Margin Estimator</h3>
            <p>Drag the sliders below to see your potential retained revenue.</p>

            <div class="wl-slider-group">
              <div class="wl-slider-label-row">
                <span>Your Client Billing Rate:</span>
                <strong id="wlRateLabel" style="color: #38bdf8;">$120/hr</strong>
              </div>
              <input type="range" min="60" max="200" step="5" value="120" class="wl-slider-input" id="wlRateSlider">
            </div>

            <div class="wl-slider-group">
              <div class="wl-slider-label-row">
                <span>Monthly Billable Hours:</span>
                <strong id="wlHoursLabel" style="color: #38bdf8;">160 hrs/mo</strong>
              </div>
              <input type="range" min="80" max="640" step="20" value="160" class="wl-slider-input" id="wlHoursSlider">
            </div>

            <div class="wl-calc-result-box">
              <div class="wl-calc-annual-title">Annual Retained Gross Profit</div>
              <div class="wl-calc-annual-val" id="wlAnnualProfit">$168,960</div>
              <div style="font-size: 0.9rem; color: #94a3b8;">
                Monthly Profit: <strong id="wlMonthlyProfit" style="color: #fff;">$14,080</strong> (<span id="wlMarginPct" style="color: #4ade80;">73% Margin</span>)
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       8. CONFIDENTIALITY & NON-COMPETE GUARANTEE
       ========================================================================== -->
  <section class="wl-guarantee-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Ironclad Trust</div>
        <h2 class="wl-section-title">Contractually Bound: <span class="highlight">We Never Touch Your Clients</span></h2>
        <p class="wl-section-subtitle">
          Your agency's client relationships are your most valuable asset. We treat client confidentiality with structural, legally enforceable protections.
        </p>
      </div>

      <div class="wl-guarantee-grid">
        <div class="wl-guarantee-card wl-reveal wl-delay-1">
          <div class="wl-guarantee-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          </div>
          <h3>Strict Bi-Directional NDA</h3>
          <p>
            Signed before we look at a single wireframe or requirement document. Complete non-disclosure backed by formal legal jurisdiction.
          </p>
        </div>

        <div class="wl-guarantee-card wl-reveal wl-delay-2">
          <div class="wl-guarantee-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <h3>Non-Solicitation Agreement</h3>
          <p>
            Legally binding contract clauses prohibiting NGD from ever communicating directly with, pitching, or accepting work from your clients.
          </p>
        </div>

        <div class="wl-guarantee-card wl-reveal wl-delay-3">
          <div class="wl-guarantee-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
          </div>
          <h3>100% Code & IP Ownership</h3>
          <p>
            All repositories, licenses, API keys, and build assets belong unconditionally to your agency. We hold zero claim over any code written.
          </p>
        </div>

        <div class="wl-guarantee-card wl-reveal wl-delay-4">
          <div class="wl-guarantee-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </div>
          <h3>Ghost Channel Setup</h3>
          <p>
            Need us on client calls? We join as your "Senior Engineering Team" using your agency's email handles, Slack, and Zoom domains.
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       9. ENGAGEMENT & PARTNERSHIP MODELS
       ========================================================================== -->
  <section class="wl-models-section" id="wl-models">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Flexible Models</div>
        <h2 class="wl-section-title">Partnership Structures Designed For <span class="highlight">Your Control</span></h2>
        <p class="wl-section-subtitle">
          Choose how you want to work with us based on your agency's project volume, control preferences, and cash-flow cadence.
        </p>
      </div>

      <div class="wl-models-grid">
        <!-- Model 1: Dedicated Pod -->
        <div class="wl-model-card featured wl-reveal wl-delay-1">
          <div class="wl-model-header">
            <h3>Dedicated Pods</h3>
            <div class="wl-model-best-for">Best for: Growing Agency Pipelines</div>
            <p class="wl-model-desc">
              A full-time pod of developers, QA, and lead engineer dedicated 100% to your agency's continuous project flow.
            </p>
          </div>
          <ul class="wl-model-features">
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> 160 hrs/month per engineer</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Direct daily standup integration</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Lowest effective hourly rate</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Zero hiring & equipment costs</li>
          </ul>
          <a href="#wl-contact" class="wl-btn wl-btn-primary">Build Your Pod</a>
        </div>

        <!-- Model 2: Staff Augmentation -->
        <div class="wl-model-card wl-reveal wl-delay-2">
          <div class="wl-model-header">
            <h3>Staff Augmentation</h3>
            <div class="wl-model-best-for">Best for: Immediate Dev Bandwidth</div>
            <p class="wl-model-desc">
              Plug individual senior engineers into your existing technical team on a flexible time-and-material basis.
            </p>
          </div>
          <ul class="wl-model-features">
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Specialized stack matching</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Flexible billing per hour/sprint</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Immediate 48-hour onboarding</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Managed directly by your PM</li>
          </ul>
          <a href="#wl-contact" class="wl-btn wl-btn-secondary">Request Profiles</a>
        </div>

        <!-- Model 3: Fixed-Price Milestone -->
        <div class="wl-model-card wl-reveal wl-delay-3">
          <div class="wl-model-header">
            <h3>Fixed-Price Milestones</h3>
            <div class="wl-model-best-for">Best for: Clearly Defined Scopes</div>
            <p class="wl-model-desc">
              Fixed budget, locked timeline, and guaranteed deliverables for MVPs and defined client project briefs.
            </p>
          </div>
          <ul class="wl-model-features">
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Guaranteed budget & scope cap</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Milestone payment schedule</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Full QA & bug-fix warranty</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Zero unexpected cost creep</li>
          </ul>
          <a href="#wl-contact" class="wl-btn wl-btn-secondary">Get Fixed Quote</a>
        </div>

        <!-- Model 4: Monthly Retainer -->
        <div class="wl-model-card wl-reveal wl-delay-4">
          <div class="wl-model-header">
            <h3>Monthly Dev Retainer</h3>
            <div class="wl-model-best-for">Best for: Ongoing Client Support</div>
            <p class="wl-model-desc">
              Sell high-margin monthly maintenance and feature enhancement retainers to your clients while we handle SLA tickets.
            </p>
          </div>
          <ul class="wl-model-features">
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Guaranteed monthly dev pool</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Priority bug-fix SLA</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> OS & security dependency updates</li>
            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> High-margin recurring revenue</li>
          </ul>
          <a href="#wl-contact" class="wl-btn wl-btn-secondary">Setup Retainer</a>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       10. PROCESS (HOW WE WORK)
       ========================================================================== -->
  <section class="wl-process-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">The Process</div>
        <h2 class="wl-section-title">A Predictable Pipeline From <span class="highlight">Brief To Release</span></h2>
        <p class="wl-section-subtitle">
          Six disciplined steps that replace freelancer chaos with professional agile engineering execution.
        </p>
      </div>

      <div class="wl-process-grid">
        <div class="wl-process-card wl-reveal wl-delay-1">
          <div class="wl-process-step-tag">Step 01</div>
          <h3>Confidential Scoping & NDA</h3>
          <p>We execute mutual non-disclosure agreements, review your client's design or wireframes, and establish architectural feasibility.</p>
        </div>

        <div class="wl-process-card wl-reveal wl-delay-2">
          <div class="wl-process-step-tag">Step 02</div>
          <h3>Wholesale Estimate & Timeline</h3>
          <p>We provide a clear wholesale estimate breakdown that you can easily mark up and present directly into your client proposal.</p>
        </div>

        <div class="wl-process-card wl-reveal wl-delay-3">
          <div class="wl-process-step-tag">Step 03</div>
          <h3>Ghost Setup & Tool Onboarding</h3>
          <p>We set up repository permissions, join your internal communication channels under your agency domain, and align on sprint cadence.</p>
        </div>

        <div class="wl-process-card wl-reveal wl-delay-1">
          <div class="wl-process-step-tag">Step 04</div>
          <h3>Agile 2-Week Sprints & QA</h3>
          <p>Our engineers build in bi-weekly sprints with automated CI/CD builds, dual-layer QA verification, and clean documentation.</p>
        </div>

        <div class="wl-process-card wl-reveal wl-delay-2">
          <div class="wl-process-step-tag">Step 05</div>
          <h3>White-Label Demo Support</h3>
          <p>We supply white-labeled staging links, test builds, and release notes so you can effortlessly showcase milestone progress to your client.</p>
        </div>

        <div class="wl-process-card wl-reveal wl-delay-3">
          <div class="wl-process-step-tag">Step 06</div>
          <h3>Store Launch & Ongoing Warranty</h3>
          <p>We publish to iOS/Android stores and production clouds under your developer accounts, backed by our 30-day post-launch warranty.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       11. DATA SECURITY & QUALITY ASSURANCE
       ========================================================================== -->
  <section class="wl-security-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Security & QA</div>
        <h2 class="wl-section-title">Enterprise Security Standards <span class="highlight">Baked In</span></h2>
        <p class="wl-section-subtitle">
          Ensure peace of mind when delivering solutions for your most demanding enterprise, fintech, and healthcare clients.
        </p>
      </div>

      <div class="wl-security-grid">
        <div class="wl-security-card wl-reveal wl-delay-1">
          <div class="wl-security-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <h3>Dual-Layer QA</h3>
          <p>Every PR passes automated unit testing and rigorous manual exploratory QA before demo.</p>
        </div>

        <div class="wl-security-card wl-reveal wl-delay-2">
          <div class="wl-security-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          </div>
          <h3>SOC2 & GDPR Principles</h3>
          <p>Development practices aligned with global data privacy and strict access control guidelines.</p>
        </div>

        <div class="wl-security-card wl-reveal wl-delay-3">
          <div class="wl-security-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
          </div>
          <h3>Encrypted Repositories</h3>
          <p>We work directly in your GitHub/GitLab organizations with zero external code caching.</p>
        </div>

        <div class="wl-security-card wl-reveal wl-delay-4">
          <div class="wl-security-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
          </div>
          <h3>Automated Backups</h3>
          <p>Continuous database snapshots, staging rollbacks, and multi-region disaster recovery plans.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       12. SOCIAL PROOF & TESTIMONIALS
       ========================================================================== -->
  <section class="wl-proof-section">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Proven Track Record</div>
        <h2 class="wl-section-title">What Agency Leaders Say About <span class="highlight">Partnering With Us</span></h2>
        <p class="wl-section-subtitle">
          Real feedback from agency owners who scaled their engineering delivery without the overhead of in-house hiring.
        </p>
      </div>

      <div class="wl-testimonials-grid">
        <div class="wl-testimonial-card wl-reveal wl-delay-1">
          <div class="wl-stars-row">★★★★★</div>
          <p class="wl-quote-text">
            "NGD has been our silent engineering arm for over 3 years. We've shipped 12 native apps and 4 enterprise platforms under our brand. Our clients think we have a 40-person dev team in London."
          </p>
          <div class="wl-author-meta">
            <div class="wl-author-avatar">MA</div>
            <div class="wl-author-info">
              <h4>Managing Director</h4>
              <p>Design & UX Studio, London UK</p>
            </div>
          </div>
        </div>

        <div class="wl-testimonial-card wl-reveal wl-delay-2">
          <div class="wl-stars-row">★★★★★</div>
          <p class="wl-quote-text">
            "Before NGD, we kept turning down $80k+ custom software requests because we were purely a digital marketing shop. Today, custom development drives 45% of our agency's annual profit."
          </p>
          <div class="wl-author-meta">
            <div class="wl-author-avatar">TC</div>
            <div class="wl-author-info">
              <h4>Founder & CEO</h4>
              <p>Growth & Performance Agency, Austin TX</p>
            </div>
          </div>
        </div>

        <div class="wl-testimonial-card wl-reveal wl-delay-3">
          <div class="wl-stars-row">★★★★★</div>
          <p class="wl-quote-text">
            "The ironclad NDA and ghost workflow gave us 100% confidence. Their team attended sprint calls under our email handles and delivered flawless Flutter code on time and on budget."
          </p>
          <div class="wl-author-meta">
            <div class="wl-author-avatar">SL</div>
            <div class="wl-author-info">
              <h4>Head of Technology</h4>
              <p>Creative Consultancy, Sydney AU</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       13. FAQ ACCORDION SECTION
       ========================================================================== -->
  <section class="wl-faq-section" id="wl-faq">
    <div class="wl-container">
      <div class="wl-section-header wl-reveal">
        <div class="wl-badge-pill">Got Questions?</div>
        <h2 class="wl-section-title">Frequently Asked <span class="highlight">Questions</span></h2>
        <p class="wl-section-subtitle">
          Everything you need to know about partnering with NGD as your white-label engineering team.
        </p>
      </div>

      <div class="wl-faq-accordion-list">
        <!-- Q1 -->
        <div class="wl-faq-item active wl-reveal">
          <button class="wl-faq-question">
            <span>How does white-label development work in practice?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer" style="max-height: 200px;">
            <p>
              You manage the client relationship, discovery, and account strategy. We handle the technical architecture, coding, testing, and deployment. We work entirely in your project management tools (Slack, Jira, ClickUp) using your company domain email addresses. Your clients never know NGD exists.
            </p>
          </div>
        </div>

        <!-- Q2 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>Will your developers ever contact our client directly?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              Absolutely not. Our master partnership agreement includes a legally binding, strict non-compete and non-solicitation clause. We will never contact, market to, or accept direct projects from your clients. If you request our engineers to attend technical client meetings, we join strictly under your agency's name.
            </p>
          </div>
        </div>

        <!-- Q3 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>Who owns the source code and intellectual property?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              You and your client own 100% of all intellectual property, source code, database schemas, and design assets from day one. All code is committed directly to your agency's Git repositories (GitHub, GitLab, Bitbucket).
            </p>
          </div>
        </div>

        <!-- Q4 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>How does pricing and margin work?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              We charge wholesale partner rates (typically $28 - $38/hr depending on technology and seniority) or fixed milestone quotes. You bill your clients at your standard retail rates ($90 - $160+/hr). Your agency retains the full margin difference—typically 60% to 75% gross profit.
            </p>
          </div>
        </div>

        <!-- Q5 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>Can you sign our agency's custom NDA and contract?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              Yes. We routinely review and sign partner agency NDAs and MSA agreements before receiving project documentation. If you don't have an agreement ready, we can provide our standard, attorney-drafted partner non-disclosure agreement.
            </p>
          </div>
        </div>

        <!-- Q6 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>How do you handle time zone overlap and communication?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              Our engineering pods maintain daily overlapping work hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones. We communicate natively in English via Slack, Teams, ClickUp, and Jira.
            </p>
          </div>
        </div>

        <!-- Q7 -->
        <div class="wl-faq-item wl-reveal">
          <button class="wl-faq-question">
            <span>What happens after the application or website launches?</span>
            <span class="wl-faq-toggle-icon">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </button>
          <div class="wl-faq-answer">
            <p>
              Every launch includes a complimentary 30-day bug-fix and deployment warranty. Afterward, you can transition the project to an ongoing monthly maintenance retainer where we handle OS updates, security patches, and incremental feature requests.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ==========================================================================
       14. FINAL CONVERSION BLOCK (CTA)
       ========================================================================== -->
  <section class="wl-cta-section" id="wl-contact">
    <div class="wl-container">
      <div class="wl-cta-banner wl-reveal">
        <div class="wl-cta-content">
          <div class="wl-badge-pill" style="background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2); color: #60a5fa;">
            Scale Your Agency
          </div>
          <h2>Ready To Offer Full-Scale Development Without The Overhead?</h2>
          <p>
            Schedule a 20-minute confidential partner discovery call. We'll discuss your upcoming pipeline, share our agency rate card, and set up your ghost engineering team.
          </p>
          <div class="wl-cta-actions">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="wl-btn wl-btn-primary" style="background: #0066ff; color: #fff;">
              <span>Schedule Partner Discovery Call</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a href="mailto:info@ngdtechnolab.com?subject=Agency%20Partner%20Rate%20Card%20Request" class="wl-btn wl-btn-secondary" style="background: rgba(255,255,255,0.1); color: #fff !important; border-color: rgba(255,255,255,0.25);">
              <span>Request Agency Rate Sheet</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
