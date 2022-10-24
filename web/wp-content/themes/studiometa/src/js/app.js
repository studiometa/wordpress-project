import { Base, createApp, importWhenVisible } from '@studiometa/js-toolkit';
import { Figure, Accordion } from '@studiometa/ui';
import { isDev } from './config.js';

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
      Figure,
      Video: (app) => importWhenVisible(() => import('./molecules/Video.js'), 'Video', app),
      Accordion, // @todo lazyload
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
