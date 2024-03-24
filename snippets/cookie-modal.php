<?php use Michnhokn\CookieBanner;

if ($assets ?? false): ?>
    <?= css(CookieBanner::asset('cookie-banner.css')) ?>
    <?= js(CookieBanner::asset('cookie-banner.js'), ['defer' => true]) ?>
<?php endif; ?>
<div class="cookie-modal cookie-modal--hidden" id="cookie-modal"
     data-show-on-first="<?= ($showOnFirst ?? true) ? 'true' : 'false' ?>">
    <div class="cookie-modal__content">
        <p class="cookie-modal__title"><?= CookieBanner::translate('title') ?></p>
        <p class="cookie-modal__text"><?= kti(CookieBanner::translate('text')) ?></p>
        <div class="cookie-modal__options">
            <?php snippet('cookie-modal-option', [
                'disabled' => true,
                'checked' => true,
                'key' => 'essential',
                'title' => CookieBanner::translate('essentialText')
            ]) ?>
            <?php foreach (CookieBanner::availableFeatures($features ?? []) as $key => $title): ?>
                <?php snippet('cookie-modal-option', [
                    'disabled' => false,
                    'key' => $key,
                    'title' => t($title, $title)
                ]) ?>
            <?php endforeach; ?>
        </div>
        <div class="cookie-modal__buttons">
            <a href="#" class="cookie-modal__button primary" id="cookie-accept"
               title="<?= CookieBanner::translate('acceptAll') ?>">
                <span><?= CookieBanner::translate('acceptAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button" id="cookie-deny"
               title="<?= CookieBanner::translate('denyAll') ?>">
                <span><?= CookieBanner::translate('denyAll') ?></span>
            </a>
            <a href="#" class="cookie-modal__button hide" id="cookie-save"
               title="<?= CookieBanner::translate('save') ?>">
                <span><?= CookieBanner::translate('save') ?></span>
            </a>
        </div>
    </div>
</div>

