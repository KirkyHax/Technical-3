<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="form-card">
    <div class="form-heading">
        <span class="section-kicker">User accounts</span>
        <h2>Edit user</h2>
        <p>Update the account and optionally upload a JPG or PNG avatar up to 2 MB.</p>
    </div>

    <form action="<?= site_url('users/' . $user['id']) ?>" method="post" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-field">
                <label for="username">Username <span aria-hidden="true">*</span></label>
                <input id="username" name="username" type="text" maxlength="50" value="<?= esc(old('username', $user['username'])) ?>" required>
                <?php if (validation_show_error('username')): ?><p class="field-error"><?= validation_show_error('username') ?></p><?php endif; ?>
            </div>

            <div class="form-field">
                <label for="full_name">Full name <span aria-hidden="true">*</span></label>
                <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= esc(old('full_name', $user['full_name'])) ?>" required>
                <?php if (validation_show_error('full_name')): ?><p class="field-error"><?= validation_show_error('full_name') ?></p><?php endif; ?>
            </div>

            <div class="form-field form-field-wide">
                <label for="avatar">Profile picture</label>
                <div class="avatar-upload-row">
                    <img class="avatar-preview" src="<?= base_url('uploads/avatars/' . ($user['avatar'] ?: 'placeholder.svg')) ?>" alt="Current avatar of <?= esc($user['full_name']) ?>">
                    <div>
                        <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
                        <small>JPG or PNG only, maximum 2 MB. The saved image is prepared as a 256 × 256 thumbnail.</small>
                    </div>
                </div>
                <?php if (validation_show_error('avatar')): ?><p class="field-error"><?= validation_show_error('avatar') ?></p><?php endif; ?>
            </div>
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Update user</button>
            <a class="button button-secondary" href="<?= site_url('user-accounts') ?>">Cancel</a>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
