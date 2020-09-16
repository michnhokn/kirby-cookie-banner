<?php $assets = isset($assets) ? $assets : false; ?>
<?php if ($assets): ?>
    <?= css('media/plugins/michnhokn/cookie-banner/cookie-modal.css') ?>
<?php endif; ?>
<div class="cookie-modal cookie-modal--hidden" id="cookie-modal">
    <div class="cookie-modal__content">
        <p class="cookie-modal__title"><?= t('michnhokn.cookie-banner.title') ?></p>
        <p class="cookie-modal__text"><?= kti(t('michnhokn.cookie-banner.text')) ?></p>
        <div class="cookie-modal__options">
            <?php snippet('cookie-modal-option', [
                'disabled' => true,
                'checked' => true,
                'key' => 'essential',
                'title' => t('michnhokn.cookie-banner.essentialText')
            ]) ?>
            <?php foreach (option('michnhokn.cookie-banner.features') as $key => $title): ?>
                <?php snippet('cookie-modal-option', [
                    'disabled' => false,
                    'key' => $key,
                    'title' => t($title, $title)
                ]) ?>
            <?php endforeach; ?>
        </div>
        <div class="cookie-modal__buttons">
            <a href="#" class="cookie-modal__button primary" id="cookie-accept"
               title="<?= t('michnhokn.cookie-banner.acceptAll') ?>">
                <span><?= t('michnhokn.cookie-banner.acceptAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button" id="cookie-deny"
               title="<?= t('michnhokn.cookie-banner.denyAll') ?>">
                <span><?= t('michnhokn.cookie-banner.denyAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button hide" id="cookie-save"
               title="<?= t('michnhokn.cookie-banner.save') ?>">
                <span><?= t('michnhokn.cookie-banner.save') ?></span>
            </a>
        </div>
    </div>
</div>
<?php if ($assets): ?>
    <?= js('media/plugins/michnhokn/cookie-banner/cookie-modal.js', ['defer' => true]) ?>
<?php endif; ?>

