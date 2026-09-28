<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="form-card">
    <div class="form-heading">
        <span class="section-kicker">Customer accounts</span>
        <h2>Edit customer</h2>
        <p>Update the saved contact information for this account.</p>
    </div>

    <form action="<?= site_url('customers/' . $customer['id']) ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-field form-field-wide">
                <label for="full_name">Full name <span aria-hidden="true">*</span></label>
                <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= esc(old('full_name', $customer['full_name'])) ?>" required>
                <?php if (validation_show_error('full_name')): ?><p class="field-error"><?= validation_show_error('full_name') ?></p><?php endif; ?>
            </div>

            <div class="form-field">
                <label for="email">Email address <span aria-hidden="true">*</span></label>
                <input id="email" name="email" type="email" maxlength="100" value="<?= esc(old('email', $customer['email'])) ?>" required>
                <?php if (validation_show_error('email')): ?><p class="field-error"><?= validation_show_error('email') ?></p><?php endif; ?>
            </div>

            <div class="form-field">
                <label for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" maxlength="20" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
                <?php if (validation_show_error('phone')): ?><p class="field-error"><?= validation_show_error('phone') ?></p><?php endif; ?>
            </div>
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Update customer</button>
            <a class="button button-secondary" href="<?= site_url('customer-accounts') ?>">Cancel</a>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
