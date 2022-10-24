(self["webpackChunk_studiometa_wordpress_project"] = self["webpackChunk_studiometa_wordpress_project"] || []).push([["web_wp-content_themes_studiometa_src_js_molecules_Video_js"],{

/***/ "./web/wp-content/themes/studiometa/src/js/molecules/Video.js":
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Video)
/* harmony export */ });
/* harmony import */ var _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./node_modules/@studiometa/js-toolkit/Base/index.js");

class Video extends _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_0__.Base {
  onPlayClick() {
    this.playVideo();
  }
  onVideoCoverClick() {
    this.playVideo();
  }
  onVideoPlayerPause() {
    this.pauseVideo();
  }
  playVideo() {
    this.$refs.videoCover.style.opacity = 0;
    this.$refs.videoCover.style.pointerEvents = "none";
    this.$refs.play.style.opacity = 0;
    this.$refs.play.style.pointerEvents = "none";
    this.$refs.videoPlayer.play();
  }
  pauseVideo() {
    this.$refs.videoCover.style.opacity = 1;
    this.$refs.videoCover.style.pointerEvents = "auto";
    this.$refs.play.style.opacity = 1;
    this.$refs.play.style.pointerEvents = "auto";
    this.$refs.videoPlayer.pause();
  }
}
Video.config = {
  name: "Video",
  refs: ["play", "videoPlayer", "videoCover"]
};



if (true) {module.hot.accept(function(err) {
if (err) {
console.error(err);
}
});
}


/***/ })

}])
//# sourceMappingURL=web_wp-content_themes_studiometa_src_js_molecules_Video_js.js.map