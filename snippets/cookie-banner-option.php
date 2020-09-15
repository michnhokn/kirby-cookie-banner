<?php $checked = $checked ?? ''; ?>
<?php $disabled = $disabled ?? false; ?>
<label class="cookie-banner__option <?php e($disabled, 'disabled'); ?>" data-cookie-id="<?= $key ?>">
    <input class="cookie-banner__checkbox" type="checkbox" <?php e($checked, 'checked'); ?> <?php e($disabled,
        'disabled'); ?>>
    <span class="cookie-banner__check">
        <svg width="12" height="10" viewBox="0 0 12 10" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 5l3.3 3L11 1" stroke-width="2" fill="none" fill-rule="evenodd"></path>
        </svg>
    </span>
    <span class="cookie-banner__label"><?= $title ?></span>
</label>
