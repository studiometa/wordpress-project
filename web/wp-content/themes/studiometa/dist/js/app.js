(self["webpackChunk_studiometa_wordpress_project"] = self["webpackChunk_studiometa_wordpress_project"] || []).push([["js/app"],{

/***/ "./web/wp-content/themes/studiometa/src/js/app.js":
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ app_default)
/* harmony export */ });
/* harmony import */ var _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("./node_modules/@studiometa/js-toolkit/Base/index.js");
/* harmony import */ var _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("./node_modules/@studiometa/js-toolkit/helpers/importWhenVisible.js");
/* harmony import */ var _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("./node_modules/@studiometa/js-toolkit/helpers/createApp.js");
/* harmony import */ var _studiometa_ui__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("./node_modules/@studiometa/ui/atoms/Figure/Figure.js");
/* harmony import */ var _config_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./web/wp-content/themes/studiometa/src/js/config.js");



class App extends _studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_1__.Base {
  mounted() {
    this.$log("mounted \u{1F389}");
  }
}
App.config = {
  log: (0,_config_js__WEBPACK_IMPORTED_MODULE_0__.isDev)(),
  name: "App",
  components: {
    Figure: _studiometa_ui__WEBPACK_IMPORTED_MODULE_2__.Figure,
    Video: (app) => (0,_studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_3__["default"])(() => __webpack_require__.e(/* import() */ "web_wp-content_themes_studiometa_src_js_molecules_Video_js").then(__webpack_require__.bind(__webpack_require__, "./web/wp-content/themes/studiometa/src/js/molecules/Video.js")), "Video", app),
    Accordion: (app) => (0,_studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_3__["default"])(() => __webpack_require__.e(/* import() */ "web_wp-content_themes_studiometa_src_js_molecules_Accordion_js").then(__webpack_require__.bind(__webpack_require__, "./web/wp-content/themes/studiometa/src/js/molecules/Accordion.js")), "Accordion", app)
  }
};
var app_default = (0,_studiometa_js_toolkit__WEBPACK_IMPORTED_MODULE_4__["default"])(App, document.body);



if (true) {module.hot.accept(function(err) {
if (err) {
console.error(err);
}
});
}


/***/ }),

/***/ "./web/wp-content/themes/studiometa/src/js/config.js":
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ config_default),
/* harmony export */   "isDev": () => (/* binding */ isDev)
/* harmony export */ });
const isDev = () => !window.location.hostname.startsWith("www.");
var config_default = {
  isDev
};



if (true) {module.hot.accept(function(err) {
if (err) {
console.error(err);
}
});
}


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors"], () => (__webpack_exec__("./node_modules/webpack-hot-middleware/client.js?reload=true"), __webpack_exec__("./web/wp-content/themes/studiometa/src/js/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
])
//# sourceMappingURL=app.js.map