<?php
	$assets = isset($assets) ? $assets : false;
	$showOnFirst = isset($showOnFirst) ? $showOnFirst : true;
	$features = isset($features) ? $features : [];
	$features = array_merge(option('michnhokn.cookie-banner.features'), $features);
?>
<?php if ($assets): ?>
	<?= css($kirby->url('media') . '/plugins/michnhokn/cookie-banner/cookie-banner.css') ?>
<?php endif; ?>
<section class="cookie-banner is-hidden"
	id="cookie-banner"
	data-show-on-first="<?= $showOnFirst ? 'true' : 'false' ?>"
	aria-labelledby="cookie-banner-title"
>
	<div class="cookie-banner__content">
		<p class="cookie-banner__title"
			id="cookie-banner-title"
		>
			<?= getCookieBannerTranslation('title') ?>
		</p>
		<p class="cookie-banner__text">
			<?= kti(getCookieBannerTranslation('text')) ?>
		</p>
		<div class="cookie-banner__options"
			id="cookie-options"
		>
			<?php snippet('cookie-banner-option', [
				'disabled' => true,
				'checked' => true,
				'key' => 'essential',
				'title' => getCookieBannerTranslation('essentialText')
			]) ?>
			<?php foreach ($features as $key => $title): ?>
				<?php snippet('cookie-banner-option', [
					'disabled' => false,
					'key' => $key,
					'title' => t($title, $title)
				]) ?>
			<?php endforeach; ?>
		</div>
		<div class="cookie-banner__buttons">
			<a class="cookie-banner__button cookie-banner__button--primary is-hidden"
				id="cookie-acknowledge"
				href="#"
			>
				<?= getCookieBannerTranslation('acknowledge') ?>
			</a>
			<a class="cookie-banner__button cookie-banner__button--primary"
				id="cookie-accept"
				href="#"
			>
				<?= getCookieBannerTranslation('acceptAll') ?>
			</a>
			<a class="cookie-banner__button"
				id="cookie-deny"
				href="#"
			>
				<?= getCookieBannerTranslation('denyAll') ?>
			</a>
			<a class="cookie-banner__button is-hidden"
				id="cookie-save"
				href="#"
			>
				<?= getCookieBannerTranslation('save') ?>
			</a>
		</div>
	</div>
</section>
<?php if ($assets): ?>
	<?= js($kirby->url('media') . '/plugins/michnhokn/cookie-banner/cookie-banner.js', ['defer' => true]) ?>
<?php endif; ?>

