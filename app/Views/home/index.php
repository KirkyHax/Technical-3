<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero-card">
    <div class="hero-copy">
        <span class="section-kicker">From arrays to a real database</span>
        <h2>Your account data now persists.</h2>
        <p>Customers and system users are loaded from MySQL through dedicated CodeIgniter Models and Query Builder.</p>
        <div class="hero-actions">
            <a class="button button-primary" href="<?= site_url('customer-accounts') ?>">View customers</a>
            <a class="button button-secondary" href="<?= site_url('user-accounts') ?>">View users</a>
        </div>
    </div>
    <div class="database-visual" aria-hidden="true">
        <div class="db-ring db-ring-one"></div>
        <div class="db-ring db-ring-two"></div>
        <div class="db-core">
            <svg viewBox="0 0 24 24"><path d="M12 3C7.58 3 4 4.34 4 6v12c0 1.66 3.58 3 8 3s8-1.34 8-3V6c0-1.66-3.58-3-8-3Zm0 2c3.87 0 6 .98 6 1s-2.13 1-6 1-6-.98-6-1 2.13-1 6-1Zm0 14c-3.87 0-6-.98-6-1v-2.04C7.45 16.62 9.63 17 12 17s4.55-.38 6-1.04V18c0 .02-2.13 1-6 1Zm0-4c-3.87 0-6-.98-6-1v-2.04C7.45 12.62 9.63 13 12 13s4.55-.38 6-1.04V14c0 .02-2.13 1-6 1Zm0-4c-3.87 0-6-.98-6-1V8c1.45.66 3.63 1 6 1s4.55-.34 6-1v2c0 .02-2.13 1-6 1Z"/></svg>
        </div>
    </div>
</section>

<section class="metric-grid" aria-label="Database record totals">
    <article class="metric-card metric-coral">
        <div class="metric-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM8 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 0c-2.67 0-8 1.34-8 4v3h12v-3c0-2.66-2.67-4-4-4ZM8 15c-3.11 0-6 1.54-6 4v1h4v-3c0-.73.25-1.39.68-1.98A9.74 9.74 0 0 1 8 15Z"/></svg>
        </div>
        <div>
            <p>Customer accounts</p>
            <strong><?= esc((string) $customerCount) ?></strong>
        </div>
        <a href="<?= site_url('customer-accounts') ?>" aria-label="Open customer accounts">↗</a>
    </article>

    <article class="metric-card metric-blue">
        <div class="metric-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0 2c-4.42 0-8 2.24-8 5v3h16v-3c0-2.76-3.58-5-8-5Z"/></svg>
        </div>
        <div>
            <p>User accounts</p>
            <strong><?= esc((string) $userCount) ?></strong>
        </div>
        <a href="<?= site_url('user-accounts') ?>" aria-label="Open user accounts">↗</a>
    </article>

    <article class="metric-card metric-ink">
        <div class="metric-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 17 4 12l1.41-1.41L9 14.17l9.59-9.58L20 6 9 17Z"/></svg>
        </div>
        <div>
            <p>Data source</p>
            <strong class="metric-text">MySQL</strong>
        </div>
        <span class="verified-label">Verified</span>
    </article>
</section>

<section class="content-grid">
    <article class="panel-card">
        <div class="panel-heading">
            <div>
                <span class="section-kicker">Latest activity</span>
                <h3>Newest customer</h3>
            </div>
            <a class="text-link" href="<?= site_url('customer-accounts') ?>">See all</a>
        </div>

        <?php if ($latestCustomer !== null): ?>
            <div class="latest-account">
                <span class="avatar avatar-coral"><?= esc(strtoupper(substr($latestCustomer['full_name'], 0, 1))) ?></span>
                <div>
                    <strong><?= esc($latestCustomer['full_name']) ?></strong>
                    <span><?= esc($latestCustomer['email']) ?></span>
                </div>
                <time datetime="<?= esc($latestCustomer['created_at']) ?>"><?= esc(date('M d', strtotime($latestCustomer['created_at']))) ?></time>
            </div>
        <?php else: ?>
            <p class="empty-state">No customer records are available yet.</p>
        <?php endif; ?>
    </article>

    <article class="panel-card architecture-card">
        <div class="panel-heading">
            <div>
                <span class="section-kicker">Application flow</span>
                <h3>MVC + Query Builder</h3>
            </div>
        </div>
        <div class="flow-line" aria-label="Model to controller to view data flow">
            <span>MySQL</span><b>→</b><span>Model</span><b>→</b><span>Controller</span><b>→</b><span>View</span>
        </div>
    </article>
</section>
<?= $this->endSection() ?>
