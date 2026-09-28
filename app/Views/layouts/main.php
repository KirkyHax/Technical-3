<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Database-backed CodeIgniter point-of-sale account directory.">
    <title><?= esc($title ?? 'POS Console') ?> | Northstar POS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand" href="<?= site_url('/') ?>" aria-label="Northstar POS overview">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" role="img">
                        <path d="M12 2.5 14.55 9 21.5 12l-6.95 3L12 21.5 9.45 15 2.5 12l6.95-3L12 2.5Z"/>
                    </svg>
                </span>
                <span>
                    <strong>Northstar</strong>
                    <small>POS Console</small>
                </span>
            </a>

            <nav class="primary-nav" aria-label="Primary navigation">
                <p class="nav-label">Workspace</p>
                <a class="nav-link <?= ($activePage ?? '') === 'overview' ? 'is-active' : '' ?>" href="<?= site_url('/') ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13h6V4H4v9Zm0 7h6v-5H4v5Zm10 0h6v-9h-6v9Zm0-16v5h6V4h-6Z"/></svg>
                    Overview
                </a>
                <a class="nav-link <?= ($activePage ?? '') === 'customers' ? 'is-active' : '' ?>" href="<?= site_url('customer-accounts') ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM8 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 0c-2.67 0-8 1.34-8 4v3h12v-3c0-2.66-2.67-4-4-4ZM8 15c-3.11 0-6 1.54-6 4v1h4v-3c0-.73.25-1.39.68-1.98A9.74 9.74 0 0 1 8 15Z"/></svg>
                    Customer Accounts
                </a>
                <a class="nav-link <?= ($activePage ?? '') === 'users' ? 'is-active' : '' ?>" href="<?= site_url('user-accounts') ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0 2c-4.42 0-8 2.24-8 5v3h16v-3c0-2.76-3.58-5-8-5Z"/></svg>
                    User Accounts
                </a>
            </nav>

            <div class="sidebar-note">
                <span class="status-dot" aria-hidden="true"></span>
                <div>
                    <strong>Database online</strong>
                    <small>MySQL / Query Builder</small>
                </div>
            </div>
        </aside>

        <main class="main-panel">
            <header class="topbar">
                <div>
                    <p class="eyebrow">IT0049 · Technical Formative Assessment 3</p>
                    <h1><?= esc($title ?? 'POS Console') ?></h1>
                </div>
                <div class="topbar-meta">
                    <span class="live-badge"><span></span> Live data</span>
                    <span class="date-chip"><?= date('M d, Y') ?></span>
                </div>
            </header>

            <div class="page-content">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>
</body>
</html>
