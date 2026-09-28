<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-intro">
    <div>
        <span class="section-kicker">Customer directory</span>
        <h2>Every customer, one reliable source.</h2>
        <p>These records are retrieved from the <code>customers</code> table through <code>CustomerModel</code>.</p>
    </div>
    <div class="record-count"><strong><?= count($customers) ?></strong><span>Total records</span></div>
</section>

<section class="table-card">
    <div class="table-toolbar">
        <div>
            <h3>Customer Accounts</h3>
            <p>Contact details and account creation dates</p>
        </div>
        <div class="toolbar-actions">
            <span class="source-pill"><span></span> MySQL live</span>
            <a class="button button-primary" href="<?= site_url('customers/new') ?>">Add customer</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="flash-success" role="status"><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <div class="table-scroll">
        <table>
            <caption class="sr-only">Customer account records retrieved from MySQL</caption>
            <thead>
                <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Email address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($customers === []): ?>
                    <tr><td class="empty-cell" colspan="6">No customer records found.</td></tr>
                <?php else: ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td data-label="Customer">
                                <div class="identity-cell">
                                    <span class="avatar avatar-coral"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></span>
                                    <div><strong><?= esc($customer['full_name']) ?></strong><small>ID #<?= esc(str_pad((string) $customer['id'], 4, '0', STR_PAD_LEFT)) ?></small></div>
                                </div>
                            </td>
                            <td data-label="Email"><a class="email-link" href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td>
                            <td data-label="Phone"><?= esc($customer['phone'] ?? '—') ?></td>
                            <td data-label="Created"><time datetime="<?= esc($customer['created_at']) ?>"><?= esc(date('M d, Y', strtotime($customer['created_at']))) ?></time></td>
                            <td data-label="Status"><span class="status-pill">Active</span></td>
                            <td data-label="Action"><a class="table-action" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
