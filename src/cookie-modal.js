import './cookie-modal.scss';
import Cookies from 'js-cookie';

function element(selector) {
  return document.querySelector(selector);
}

function allElements(selector) {
  return document.querySelectorAll(selector);
}

function triggerEvent(eventName, data = {}) {
  let customEvent = null;
  if (window.CustomEvent && typeof window.CustomEvent === 'function') {
    customEvent = new CustomEvent(eventName, {detail: data});
  } else {
    customEvent = document.createEvent('CustomEvent');
    customEvent.initCustomEvent(eventName, true, true, data);
  }
  document.querySelector('body').dispatchEvent(customEvent);
}

class CookieModal {
  constructor() {
    this.$COOKIE_MODAL = element('#cookie-modal');
    this.$FEATURES = allElements('.cookie-modal__checkbox');
    this.$ACCEPT_BUTTON = element('#cookie-accept');
    this.$DENY_BUTTON = element('#cookie-deny');
    this.$SAVE_BUTTON = element('#cookie-save');

    this.MODAL_OPEN = false;
    this.MINUMUM_FEATURES = ['essential'];
    this.MAXIMUM_FEATURES = [];
    this.CUSTOM_FEATURES = [];
    this.SHOW_ON_FIRST = this.$COOKIE_MODAL.dataset.showOnFirst === 'true';

    this.initCookieModal().then(_ => this.registerHooks());
  }

  initCookieModal() {
    const _this = this;
    return new Promise(resolve => {
      _this.loadMaximumFeatures();
      _this.loadCustomFeatures();
      if (_this.CUSTOM_FEATURES.length === 0 && this.SHOW_ON_FIRST) {
        _this.openCookieModal();
      }
      resolve();
    });
  }

  registerHooks() {
    const _this = this;
    Array.prototype.forEach.call(_this.$FEATURES, feature => {
      feature.addEventListener('change', _ => _this.updateCustomFeatures());
    });
    _this.$ACCEPT_BUTTON.addEventListener(
      'click',
      _ => _this.save(_this.MAXIMUM_FEATURES),
    );
    _this.$DENY_BUTTON.addEventListener(
      'click',
      _ => _this.save(_this.MINUMUM_FEATURES),
    );
    _this.$SAVE_BUTTON.addEventListener(
      'click',
      _ => _this.save(_this.CUSTOM_FEATURES),
    );
    element('body').addEventListener('cookies:update', _ => {
      _this.loadCustomFeatures();
      _this.openCookieModal();
    });
  }

  loadMaximumFeatures() {
    const _this = this;
    Array.prototype.forEach.call(_this.$FEATURES, feature => {
      const featureKey = feature.dataset.cookieId.toLowerCase();
      _this.MAXIMUM_FEATURES.push(featureKey);
    });
  }

  loadCustomFeatures() {
    const _this = this;
    if (Cookies.get('cookie_status')) {
      _this.CUSTOM_FEATURES = Cookies.get('cookie_status').split(',');
      const activeFeatures = Array.prototype.filter.call(_this.$FEATURES,
        feature => {
          const featureKey = feature.dataset.cookieId.toLowerCase();
          return _this.CUSTOM_FEATURES.indexOf(featureKey) > -1;
        });
      Array.prototype.forEach.call(activeFeatures, feature => {
        feature.setAttribute('checked', true);
      });
      _this.updateButtons();
    }
  }

  updateCustomFeatures() {
    const _this = this;
    _this.CUSTOM_FEATURES = [];
    const checkedFeatures = Array.prototype.filter.call(
      _this.$FEATURES,
      feature => feature.checked,
    );
    Array.prototype.forEach.call(checkedFeatures, feature => {
      const featureKey = feature.dataset.cookieId.toLowerCase();
      _this.CUSTOM_FEATURES.push(featureKey);
    });
    _this.updateButtons();
  }

  save(features) {
    const _this = this;
    event.preventDefault();
    triggerEvent('cookies:saved', features);
    _this.setCookie(features);
    _this.CUSTOM_FEATURES = features;
    _this.closeCookieModal();
  }

  updateButtons() {
    let _this = this;
    if (_this.CUSTOM_FEATURES.length > 1) {
      _this.$ACCEPT_BUTTON.classList.add('hide');
      _this.$DENY_BUTTON.classList.add('hide');
      _this.$SAVE_BUTTON.classList.remove('hide');
    } else {
      _this.$ACCEPT_BUTTON.classList.remove('hide');
      _this.$DENY_BUTTON.classList.remove('hide');
      _this.$SAVE_BUTTON.classList.add('hide');
    }
  }

  setCookie(features) {
    Cookies.set('cookie_status', features.join(','), {expires: 365});
  }

  closeCookieModal() {
    const _this = this;
    _this.$COOKIE_MODAL.classList.add('cookie-modal--hidden');
    _this.MODAL_OPEN = false;
  }

  openCookieModal() {
    const _this = this;
    _this.$COOKIE_MODAL.classList.remove('cookie-modal--hidden');
    _this.MODAL_OPEN = true;
  }
}

document.addEventListener('DOMContentLoaded', _ => new CookieModal());
