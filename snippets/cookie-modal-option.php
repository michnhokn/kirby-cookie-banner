<?php $checked = $checked ?? ''; ?>
<?php $disabled = $disabled ?? false; ?>
<label class="cookie-modal__option <?php e($disabled, 'disabled'); ?>">
    <input class="cookie-modal__checkbox" type="checkbox" <?php e($checked, 'checked'); ?> <?php e($disabled,
        'disabled'); ?> data-cookie-id="<?= $key ?>">
    <span class="cookie-modal__check">
        <svg width="12" height="10" viewBox="0 0 12 10" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 5l3.3 3L11 1" stroke-width="2" fill="none" fill-rule="evenodd"></path>
        </svg>
    </span>
    <span class="cookie-modal__label"><?= $title ?></span>
</label>
