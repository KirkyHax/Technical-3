<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="form-card">
    <div class="form-heading">
        <span class="section-kicker">User accounts</span>
        <h2>Create a new user</h2>
        <p>The username must be unique. Avatars are added from the edit page after creation.</p>
    </div>

    <form action="<?= site_url('users') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-field">
                <label for="username">Username <span aria-hidden="true">*</span></label>
                <input id="username" name="username" type="text" maxlength="50" value="<?= esc(old('username')) ?>" required>
                <?php if (validation_show_error('username')): ?><p class="field-error"><?= validation_show_error('username') ?></p><?php endif; ?>
            </div>

            <div class="form-field">
                <label for="full_name">Full name <span aria-hidden="true">*</span></label>
                <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= esc(old('full_name')) ?>" required>
                <?php if (validation_show_error('full_name')): ?><p class="field-error"><?= validation_show_error('full_name') ?></p><?php endif; ?>
            </div>
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Save user</button>
            <a class="button button-secondary" href="<?= site_url('user-accounts') ?>">Cancel</a>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
