<?php
$assets = isset($assets) ? $assets : false;
$showOnFirst = isset($showOnFirst) ? $showOnFirst : true;
$features = isset($features) ? $features : [];
$features = array_merge(option('michnhokn.cookie-banner.features'), $features);
?>
<?php if ($assets): ?>
    <?= css('media/plugins/michnhokn/cookie-banner/cookie-modal.css') ?>
<?php endif; ?>
<div class="cookie-modal cookie-modal--hidden" id="cookie-modal"
     data-show-on-first="<?= $showOnFirst ? 'true' : 'false' ?>">
    <div class="cookie-modal__content">
        <p class="cookie-modal__title"><?= getCookieModalTranslation('title') ?></p>
        <p class="cookie-modal__text"><?= kti(getCookieModalTranslation('text')) ?></p>
        <div class="cookie-modal__options">
            <?php snippet('cookie-modal-option', [
                'disabled' => true,
                'checked' => true,
                'key' => 'essential',
                'title' => getCookieModalTranslation('essentialText')
            ]) ?>
            <?php foreach ($features as $key => $title): ?>
                <?php snippet('cookie-modal-option', [
                    'disabled' => false,
                    'key' => $key,
                    'title' => t($title, $title)
                ]) ?>
            <?php endforeach; ?>
        </div>
        <div class="cookie-modal__buttons">
            <a href="#" class="cookie-modal__button primary" id="cookie-accept"
               title="<?= getCookieModalTranslation('acceptAll') ?>">
                <span><?= getCookieModalTranslation('acceptAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button" id="cookie-deny"
               title="<?= getCookieModalTranslation('denyAll') ?>">
                <span><?= getCookieModalTranslation('denyAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button hide" id="cookie-save"
               title="<?= getCookieModalTranslation('save') ?>">
                <span><?= getCookieModalTranslation('save') ?></span>
            </a>
        </div>
    </div>
</div>
<?php if ($assets): ?>
    <?= js('media/plugins/michnhokn/cookie-banner/cookie-modal.js', ['defer' => true]) ?>
<?php endif; ?>

