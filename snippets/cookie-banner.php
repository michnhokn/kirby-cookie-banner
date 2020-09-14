<?php if (!isset(Cookie::get()['cookie_status'])): ?>
    <?= css('media/plugins/michnhokn/cookie-banner/cookie-banner.css') ?>
    <div class="cookie-banner">
        <div class="cookie-banner__content">
            <p class="cookie-banner__title"><?= h(option('michnhokn.cookie-banner.content.title')) ?></p>
            <p class="cookie-banner__text"><?= h(option('michnhokn.cookie-banner.content.text')) ?></p>
            <div class="cookie-banner__options">
                <label class="cookie-banner__option disabled" data-cookie-id="essential">
                    <input type="checkbox" checked disabled>
                    <span>Essentiell</span>
                </label>
                <?php foreach (option('michnhokn.cookie-banner.features') as $key => $cookie): ?>
                    <label class="cookie-banner__option" data-cookie-id="<?= h($key) ?>">
                        <input type="checkbox">
                        <span><?= h($cookie) ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <div class="cookie-banner__buttons">
                <a href="#" class="cookie-banner__button cookie-banner__button--accept"
                   id="cookie-banner__accept"><?= h(option('michnhokn.cookie-banner.content.acceptAll')) ?></a>
                <a href="#" class="cookie-banner__button cookie-banner__button--deny"
                   id="cookie-banner__deny"><?= h(option('michnhokn.cookie-banner.content.denyAll')) ?></a>
                <a href="#" class="cookie-banner__button cookie-banner__button--save cookie-banner__button--hide"
                   id="cookie-banner__save"><?= h(option('michnhokn.cookie-banner.content.save')) ?></a>
            </div>
        </div>
    </div>
    <?= js('media/plugins/michnhokn/cookie-banner/cookie-banner.js') ?>
<?php endif; ?>
