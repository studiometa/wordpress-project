import { Base } from '@studiometa/js-toolkit';

/**
 * Homepage class.
 */
export default class Video extends Base {
  /**
   * Class config
   * @type {Object}
   */
  static config = {
    name: 'Video',
    refs: ['play', 'videoPlayer', 'videoCover'],
  };

  /**
   * Open child panel
   * @returns {void}
   */
  onPlayClick() {
    this.playVideo();
  }

  /**
   * Click on video cover
   * @returns {void}
   */
  onVideoCoverClick() {
    this.playVideo();
  }

  /**
   * Pause video when user pause video
   * @returns {void}
   */
  onVideoPlayerPause() {
    this.pauseVideo();
  }

  /**
   * Play video !
   * @returns {void}
   */
  playVideo() {
    this.$refs.videoCover.style.opacity = 0;
    this.$refs.videoCover.style.pointerEvents = 'none';
    this.$refs.play.style.opacity = 0;
    this.$refs.play.style.pointerEvents = 'none';
    this.$refs.videoPlayer.play();
  }

  /**
   * Pause video !
   * @returns {void}
   */
  pauseVideo() {
    this.$refs.videoCover.style.opacity = 1;
    this.$refs.videoCover.style.pointerEvents = 'auto';
    this.$refs.play.style.opacity = 1;
    this.$refs.play.style.pointerEvents = 'auto';
    this.$refs.videoPlayer.pause();
  }
}
