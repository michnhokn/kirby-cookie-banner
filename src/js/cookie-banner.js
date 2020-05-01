import '../scss/cookie-banner.scss';
import Cookies from 'js-cookie';

class CookieBanner {
  constructor() {
    this.CLASSES = {
      buttonHide: 'cookie-banner__button--hide',
    };
    this.SELECTOS = {
      cookieBanner: '.cookie-banner',
      options: '.cookie-banner__option',
      acceptButton: '#cookie-banner__accept',
      denyButton: '#cookie-banner__deny',
      saveButton: '#cookie-banner__save',
    };

    this.SAVE_BUTTON_ACTIVE = false;

    this.registerHooks();
  }

  registerHooks() {
    let _this = this,
      $options = document.querySelectorAll(_this.SELECTOS.options),
      $acceptButton = document.querySelector(_this.SELECTOS.acceptButton),
      $denyButton = document.querySelector(_this.SELECTOS.denyButton),
      $saveButton = document.querySelector(_this.SELECTOS.saveButton);
    $options.forEach(option => {
      option.addEventListener('change', event => {
        _this.checkOptions();
      });
    });
    $acceptButton.addEventListener('click', _ => _this.onAcceptAll());
    $denyButton.addEventListener('click', _ => _this.onDenyAll());
    $saveButton.addEventListener('click', _ => _this.onCustom());
  }

  onAcceptAll() {
    let _this = this, options = _this.getOptions('all');
    _this.setCookie(options);
    _this.triggerEvent('cookies:all', options);
    _this.hideCookieBanner();
  }

  onDenyAll() {
    let _this = this, options = _this.getOptions();
    _this.setCookie(options);
    _this.triggerEvent('cookies:deny', options);
    _this.hideCookieBanner();
  }

  onCustom() {
    let _this = this, options = _this.getOptions('custom');
    _this.setCookie(options);
    _this.triggerEvent('cookies:custom', options);
    _this.hideCookieBanner();
  }

  updateButtons() {
    let _this = this;
    if (_this.SAVE_BUTTON_ACTIVE) {
      _this.addClass(_this.SELECTOS.acceptButton, _this.CLASSES.buttonHide);
      _this.addClass(_this.SELECTOS.denyButton, _this.CLASSES.buttonHide);
      _this.removeClass(_this.SELECTOS.saveButton, _this.CLASSES.buttonHide);
    } else {
      _this.removeClass(_this.SELECTOS.acceptButton, _this.CLASSES.buttonHide);
      _this.removeClass(_this.SELECTOS.denyButton, _this.CLASSES.buttonHide);
      _this.addClass(_this.SELECTOS.saveButton, _this.CLASSES.buttonHide);
    }
  }

  checkOptions() {
    let _this = this, oneIsActive = false,
      activeOptions = _this.SELECTOS.options + ':not(.disabled)';
    document.querySelectorAll(activeOptions).forEach(option => {
      if (option.querySelector('input').checked) {
        oneIsActive = true;
      }
    });
    _this.SAVE_BUTTON_ACTIVE = oneIsActive;
    _this.updateButtons();
  }

  getOptions(status) {
    let _this = this, optionsString = '';
    document.querySelectorAll(_this.SELECTOS.options).forEach(option => {
      switch (status) {
        case 'all':
          optionsString += option.dataset.cookieId + ',';
          break;
        case 'custom':
          if (option.querySelector('input').checked) {
            optionsString += option.dataset.cookieId + ',';
          }
          break;
        default:
          optionsString = 'essential';
          break;
      }

    });
    return optionsString;
  }

  setCookie(options) {
    Cookies.set('cookie_status', options, {expires: 365, secure: true});
  }

  triggerEvent(name, data) {
    let _this = this, event = new CustomEvent(name, {detail: data});
    document.querySelector('body').dispatchEvent(event);
  }

  hideCookieBanner() {
    let _this = this;
    document.querySelector(_this.SELECTOS.cookieBanner).remove();
  }

  addClass(selector, classname) {
    document.querySelector(selector).classList.add(classname);
  }

  removeClass(selector, classname) {
    document.querySelector(selector).classList.remove(classname);
  }
}

document.addEventListener('DOMContentLoaded', function() {
  new CookieBanner();
});
