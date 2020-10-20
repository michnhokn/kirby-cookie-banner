import './cookie-modal.scss';
import Cookies from 'js-cookie';
import u from 'umbrellajs/umbrella.esm';

class CookieModal {
  constructor() {
    this.$COOKIE_MODAL = u('#cookie-modal');
    this.$FEATURES = u('.cookie-modal__checkbox');
    this.$ACCEPT_BUTTON = u('#cookie-accept');
    this.$DENY_BUTTON = u('#cookie-deny');
    this.$SAVE_BUTTON = u('#cookie-save');

    this.MODAL_OPEN = false;
    this.MINUMUM_FEATURES = ['essential'];
    this.MAXIMUM_FEATURES = [];
    this.CUSTOM_FEATURES = [];

    this.initCookieModal().then(_ => {
      this.registerHooks();
    });
  }

  initCookieModal() {
    const _this = this;
    return new Promise(resolve => {
      _this.loadMaximumFeatures();
      _this.loadCustomFeatures();
      if (_this.CUSTOM_FEATURES.length === 0) {
        _this.openCookieModal();
      }
      resolve();
    });
  }

  registerHooks() {
    const _this = this;
    _this.$FEATURES.on('change', _ => _this.updateCustomFeatures());
    _this.$ACCEPT_BUTTON.on('click', _ => _this.save(_this.MAXIMUM_FEATURES));
    _this.$DENY_BUTTON.on('click', _ => _this.save(_this.MINUMUM_FEATURES));
    _this.$SAVE_BUTTON.on('click', _ => _this.save(_this.CUSTOM_FEATURES));
    u('body').on('cookies:update', _ => {
      _this.loadCustomFeatures();
      _this.openCookieModal();
    });
  }

  loadMaximumFeatures() {
    const _this = this;
    _this.$FEATURES.each(feature => {
      _this.MAXIMUM_FEATURES.push(u(feature).data('cookie-id').toLowerCase());
    });
  }

  loadCustomFeatures() {
    const _this = this;
    if (Cookies.get('cookie_status')) {
      _this.CUSTOM_FEATURES = Cookies.get('cookie_status').split(',');
      _this.$FEATURES.filter(feature => {
        return _this.CUSTOM_FEATURES.indexOf(u(feature).data('cookie-id')) > -1;
      }).attr({checked: true});
      _this.updateButtons();
    }
  }

  updateCustomFeatures() {
    const _this = this;
    _this.CUSTOM_FEATURES = [];
    _this.$FEATURES.filter(feature => u(feature).is(':checked')).each(f => {
      _this.CUSTOM_FEATURES.push(u(f).data('cookie-id'));
    });
    _this.updateButtons();
  }

  save(features) {
    const _this = this;
    event.preventDefault();
    u('body').trigger('cookies:saved', features);
    _this.setCookie(features);
    _this.CUSTOM_FEATURES = features;
    _this.closeCookieModal();
  }

  updateButtons() {
    let _this = this;
    if (_this.CUSTOM_FEATURES.length > 1) {
      _this.$ACCEPT_BUTTON.addClass('hide');
      _this.$DENY_BUTTON.addClass('hide');
      _this.$SAVE_BUTTON.removeClass('hide');
    } else {
      _this.$ACCEPT_BUTTON.removeClass('hide');
      _this.$DENY_BUTTON.removeClass('hide');
      _this.$SAVE_BUTTON.addClass('hide');
    }
  }

  setCookie(features) {
    Cookies.set('cookie_status', features.join(','), {expires: 365});
  }

  closeCookieModal() {
    const _this = this;
    _this.$COOKIE_MODAL.addClass('cookie-modal--hidden');
    _this.MODAL_OPEN = false;
  }

  openCookieModal() {
    const _this = this;
    _this.$COOKIE_MODAL.removeClass('cookie-modal--hidden');
    _this.MODAL_OPEN = true;
  }
}

u(document).on('DOMContentLoaded', _ => new CookieModal());
