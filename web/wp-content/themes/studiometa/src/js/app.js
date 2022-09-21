import { Base, createApp } from '@studiometa/js-toolkit';
import { isDev } from './config.js';
import Component from './molecules/Component.js';

/**
 * Main App class.
 */
class App extends Base {
  /**
   * App config.
   * @returns {Object}
   */
  static config = {
    log: isDev(),
    name: 'App',
    components: {
      Component,
    },
  };

  /**
   * Log a nice message when app is ready.
   *
   * @returns {void}
   */
  mounted() {
    this.$log('mounted 🎉');
  }
}

export default createApp(App, document.body);
