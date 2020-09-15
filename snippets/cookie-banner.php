<?php if (!isset(Cookie::get()['cookie_status'])): ?>
    <?= css('media/plugins/michnhokn/cookie-banner/cookie-banner.css') ?>
    <div class="cookie-banner">
        <div class="cookie-banner__content">
            <p class="cookie-banner__title"><?= t('michnhokn.cookie-banner.title') ?></p>
            <p class="cookie-banner__text"><?= kti(t('michnhokn.cookie-banner.text')) ?></p>
            <div class="cookie-banner__options">
                <?php snippet('cookie-banner-option', [
                    'disabled' => true,
                    'checked' => true,
                    'key' => 'essential',
                    'title' => t('michnhokn.cookie-banner.essentialText')
                ]) ?>
                <?php foreach (option('michnhokn.cookie-banner.features') as $key => $title): ?>
                    <?php snippet('cookie-banner-option', [
                        'disabled' => false,
                        'key' => $key,
                        'title' => h($title)
                    ]) ?>
                <?php endforeach; ?>
            </div>
            <div class="cookie-banner__buttons">
                <a href="#" class="cookie-banner__button cookie-banner__button--accept"
                   id="cookie-banner__accept"><?= t('michnhokn.cookie-banner.acceptAll') ?></a>
                <a href="#" class="cookie-banner__button cookie-banner__button--deny"
                   id="cookie-banner__deny"><?= t('michnhokn.cookie-banner.denyAll') ?></a>
                <a href="#" class="cookie-banner__button cookie-banner__button--save cookie-banner__button--hide"
                   id="cookie-banner__save"><?= t('michnhokn.cookie-banner.save') ?></a>
            </div>
        </div>
    </div>
    <?= js('media/plugins/michnhokn/cookie-banner/cookie-banner.js') ?>
<?php endif; ?>
