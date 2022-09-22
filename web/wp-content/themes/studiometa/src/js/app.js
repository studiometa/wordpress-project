import { Base, createApp } from '@studiometa/js-toolkit';
import { Figure } from '@studiometa/ui';
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
      Video,
      Figure,
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
