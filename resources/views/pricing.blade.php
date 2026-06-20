@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pricing — Clever CMS</title>

 
</head>
<body>

  

  <!-- HERO -->
  <section class="pricing-hero">
    <div class="hero-tag">
      <span class="hero-dot"></span>
      Simple, transparent pricing
    </div>
    <h1>Plans that grow<br/><span>with your team</span></h1>
    <p>Start free, upgrade anytime. No hidden fees, no surprises — just the tools you need to publish smarter.</p>

    <div class="billing-toggle">
      <span>Monthly</span>
      <label class="toggle-switch">
        <input type="checkbox" id="billingToggle"/>
        <span class="toggle-slider"></span>
      </label>
      <span>Annual</span>
      <span class="save-badge">Save 20%</span>
    </div>
  </section>

  <!-- PRICING CARDS -->
  <section class="pricing-section">
    <div class="pricing-grid">

      <!-- Starter -->
      <div class="plan-card">
        <div class="plan-header">
          <div class="plan-icon icon-starter">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
          </div>
          <div class="plan-name">Starter</div>
          <div class="plan-desc">Perfect for individuals and small projects getting started.</div>
        </div>
        <div class="plan-price">
          <div class="price-amount" data-monthly="0" data-annual="0"><sup>$</sup><span class="price-val">0</span></div>
          <div class="price-period">Free forever · No credit card needed</div>
        </div>
        <a href="#" class="plan-cta cta-default">
          Get Started Free
          <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <div class="plan-divider"></div>
        <div class="features-label">What's included</div>
        <ul class="feature-list">
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Up to <strong>3 projects</strong></span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span><strong>1 team member</strong></span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>5 GB storage</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Drag-and-Drop Editor</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Community support</span>
          </li>
          <li>
            <span class="feat-icon feat-x"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span>
            <span style="color:var(--text-muted)">Analytics Dashboard</span>
          </li>
          <li>
            <span class="feat-icon feat-x"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span>
            <span style="color:var(--text-muted)">Custom Domain</span>
          </li>
          <li>
            <span class="feat-icon feat-x"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span>
            <span style="color:var(--text-muted)">API Access</span>
          </li>
        </ul>
      </div>

      <!-- Pro (Popular) -->
      <div class="plan-card popular">
        <div class="popular-badge">⚡ Most Popular</div>
        <div class="plan-header">
          <div class="plan-icon icon-pro">
            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
          <div class="plan-name">Pro</div>
          <div class="plan-desc">For growing teams who need more power and collaboration.</div>
        </div>
        <div class="plan-price">
          <div class="price-amount">
            <sup>$</sup><span class="price-val" data-monthly="29" data-annual="23">29</span>
            <span class="price-original" id="pro-original" style="display:none">$29</span>
          </div>
          <div class="price-period">per month · <span id="pro-billing">billed monthly</span></div>
          <div id="pro-save" style="display:none; margin-top:4px;">
            <span class="price-save">You save $72/year 🎉</span>
          </div>
        </div>
        <a href="#" class="plan-cta cta-popular">
          Start 14-Day Free Trial
          <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
        </a>
        <div class="plan-divider"></div>
        <div class="features-label">Everything in Starter, plus</div>
        <ul class="feature-list">
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span><span class="feat-highlight">Unlimited</span> projects</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Up to <strong>10 team members</strong></span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>50 GB storage</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Analytics Dashboard <span class="feat-new">NEW</span></span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Custom Domain</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Role-Based Access</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Priority email support</span>
          </li>
          <li>
            <span class="feat-icon feat-x"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span>
            <span style="color:var(--text-muted)">API Access</span>
          </li>
        </ul>
      </div>

      <!-- Enterprise -->
      <div class="plan-card">
        <div class="plan-header">
          <div class="plan-icon icon-enterprise">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <div class="plan-name">Enterprise</div>
          <div class="plan-desc">Custom solutions for large orgs with advanced security needs.</div>
        </div>
        <div class="plan-price">
          <div class="price-amount" style="font-size:2rem; letter-spacing:-1px;">Custom</div>
          <div class="price-period">Tailored to your team size</div>
        </div>
        <a href="#" class="plan-cta cta-enterprise">
          Contact Sales
          <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.59 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.56A16 16 0 0 0 16 16.61l.94-.94a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 24 18z"/></svg>
        </a>
        <div class="plan-divider"></div>
        <div class="features-label">Everything in Pro, plus</div>
        <ul class="feature-list">
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span><span class="feat-highlight">Unlimited</span> team members</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Unlimited storage</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Full API Access <span class="feat-new">NEW</span></span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>SSO / SAML Login</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Advanced security & audit logs</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>SLA guarantee (99.99% uptime)</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>Dedicated account manager</span>
          </li>
          <li>
            <span class="feat-icon feat-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
            <span>24/7 phone & chat support</span>
          </li>
        </ul>
      </div>

    </div>
  </section>

  <!-- COMPARISON TABLE -->
  <section class="compare-section">
    <div class="compare-header">
      <h2>Full feature comparison</h2>
      <p>Not sure which plan? Here's everything side by side.</p>
    </div>
    <div style="overflow-x:auto;">
      <table class="compare-table">
        <thead>
          <tr>
            <th style="width:38%">Feature</th>
            <th style="width:20%">Starter</th>
            <th style="width:20%" class="th-popular">Pro</th>
            <th style="width:22%">Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <tr class="group-head"><td colspan="4">Content & Publishing</td></tr>
          <tr>
            <td>Projects</td>
            <td class="center">3</td>
            <td class="center col-highlight">Unlimited</td>
            <td class="center">Unlimited</td>
          </tr>
          <tr>
            <td>Drag-and-Drop Editor</td>
            <td class="center"><span class="check-icon">✓</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>Custom Domain</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>Media Storage</td>
            <td class="center">5 GB</td>
            <td class="center col-highlight">50 GB</td>
            <td class="center">Unlimited</td>
          </tr>

          <tr class="group-head"><td colspan="4">Team & Collaboration</td></tr>
          <tr>
            <td>Team Members</td>
            <td class="center">1</td>
            <td class="center col-highlight">Up to 10</td>
            <td class="center">Unlimited</td>
          </tr>
          <tr>
            <td>Role-Based Access</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>SSO / SAML</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="x-icon">—</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>

          <tr class="group-head"><td colspan="4">Analytics & Insights</td></tr>
          <tr>
            <td>Basic Analytics</td>
            <td class="center"><span class="check-icon">✓</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>Advanced Dashboard</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>Audit Logs</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="x-icon">—</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>

          <tr class="group-head"><td colspan="4">Support</td></tr>
          <tr>
            <td>Community Support</td>
            <td class="center"><span class="check-icon">✓</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>Priority Email Support</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="check-icon">✓</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>24/7 Dedicated Support</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="x-icon">—</span></td>
            <td class="center"><span class="check-icon">✓</span></td>
          </tr>
          <tr>
            <td>SLA Uptime Guarantee</td>
            <td class="center"><span class="x-icon">—</span></td>
            <td class="center col-highlight"><span class="x-icon">—</span></td>
            <td class="center">99.99%</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- FAQ -->
  <section class="faq-section">
    <div class="faq-header">
      <h2>Frequently asked questions</h2>
      <p>Everything you need to know before getting started.</p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q">
          Can I switch plans at any time?
          <span class="faq-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
        </button>
        <div class="faq-a"><p>Yes! You can upgrade or downgrade your plan at any time from your account settings. When you upgrade, you'll be charged the prorated difference immediately. When you downgrade, the credit is applied to future billing cycles.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q">
          Is there a free trial for the Pro plan?
          <span class="faq-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
        </button>
        <div class="faq-a"><p>Absolutely. Every Pro plan starts with a 14-day free trial — no credit card required. You'll get full access to all Pro features during the trial period, and you can cancel at any time before the trial ends.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q">
          What happens to my data if I cancel?
          <span class="faq-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
        </button>
        <div class="faq-a"><p>Your data is yours. If you cancel, you'll have 30 days to export everything before it's permanently deleted. We'll send you reminders so you never lose important content unexpectedly.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q">
          Do you offer discounts for nonprofits or students?
          <span class="faq-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
        </button>
        <div class="faq-a"><p>Yes! We offer a 50% discount for verified nonprofits and educational institutions. Reach out to our support team with proof of eligibility and we'll apply the discount to your account right away.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q">
          What payment methods do you accept?
          <span class="faq-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
        </button>
        <div class="faq-a"><p>We accept all major credit and debit cards (Visa, Mastercard, Amex), as well as PayPal. Enterprise customers can also pay via bank transfer or invoice. All transactions are secured by Stripe.</p></div>
      </div>
    </div>
  </section>

  <!-- CTA BANNER -->
  <div class="cta-banner">
    <div class="cta-banner-text">
      <h2>Ready to build something <span>clever?</span></h2>
      <p>Join 4,200+ teams already growing with Clever CMS. Start free, no credit card required.</p>
    </div>
    <div class="cta-banner-actions">
      <a href="#" class="btn-banner-primary">
        <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
        Start for Free
      </a>
      <a href="#" class="btn-banner-ghost">Talk to Sales</a>
    </div>
  </div>



 

</body>
</html>

@endsection