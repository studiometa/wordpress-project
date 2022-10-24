import { Base, createApp } from '@studiometa/js-toolkit';
import { Figure, Accordion } from '@studiometa/ui';
import { isDev } from './config.js';
import Video from './molecules/Video.js';

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
      Video, // @todo lazyload
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
