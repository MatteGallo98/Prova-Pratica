"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_shared_navbar_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Link: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.Link
  },
  methods: {
    logout: function logout() {
      document.getElementById("logout").submit();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "navbar navbar-expand-lg navbar-light bg-light",
  style: {
    "background-color": "#e3f2fd!important"
  }
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  "class": "navbar-brand brand",
  href: "/"
}, "BuyMe", -1
/* HOISTED */
);

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "navbar-toggler",
  type: "button",
  "data-toggle": "collapse",
  "data-target": "#navbarNav",
  "aria-controls": "navbarNav",
  "aria-expanded": "false",
  "aria-label": "Toggle navigation"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "navbar-toggler-icon"
})], -1
/* HOISTED */
);

var _hoisted_4 = {
  "class": "collapse navbar-collapse",
  id: "navbarNav"
};
var _hoisted_5 = {
  "class": "navbar-nav ms-auto"
};
var _hoisted_6 = {
  key: 0,
  "class": "nav-item"
};
var _hoisted_7 = ["href"];
var _hoisted_8 = {
  key: 1,
  "class": "nav-item"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  "class": "nav-link underline me-auto"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fa fa-shopping-cart",
  "aria-hidden": "true"
})], -1
/* HOISTED */
);

var _hoisted_10 = [_hoisted_9];
var _hoisted_11 = {
  key: 2,
  "class": "nav-item dropdown"
};
var _hoisted_12 = {
  id: "navbarDropdown",
  "class": "nav-link dropdown-toggle",
  href: "#",
  role: "button",
  "data-bs-toggle": "dropdown",
  "aria-haspopup": "true",
  "aria-expanded": "false"
};
var _hoisted_13 = {
  "class": "dropdown-menu dropdown-menu-end",
  "aria-labelledby": "navbarDropdown"
};
var _hoisted_14 = {
  key: 0
};
var _hoisted_15 = ["href"];
var _hoisted_16 = ["href"];
var _hoisted_17 = ["href"];
var _hoisted_18 = {
  key: 1
};
var _hoisted_19 = ["href"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("nav", _hoisted_1, [_hoisted_2, _hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_5, [!_ctx.$page.props.user ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    href: _ctx.route('login'),
    "class": "nav-link underline me-auto"
  }, "Log in", 8
  /* PROPS */
  , _hoisted_7)])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), _ctx.$page.props.user && !_ctx.$page.props.user.admin ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", _hoisted_8, _hoisted_10)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), _ctx.$page.props.user ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$page.props.user.name), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [_ctx.$page.props.user.admin ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    href: this.route('gest_utenti')
  }, " Gestione Utenti ", 8
  /* PROPS */
  , _hoisted_15), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    href: _ctx.route('gest_prodotti')
  }, " Gestione Prodotti ", 8
  /* PROPS */
  , _hoisted_16), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    href: _ctx.route('gest_ordini')
  }, " Gestione Ordini ", 8
  /* PROPS */
  , _hoisted_17)])) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    href: _ctx.route('gest_utenti')
  }, " Riepilogo Ordini ", 8
  /* PROPS */
  , _hoisted_19)])), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "dropdown-item",
    onClick: _cache[0] || (_cache[0] = function () {
      return $options.logout && $options.logout.apply($options, arguments);
    })
  }, "Logout")])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]);
}

/***/ }),

/***/ "./node_modules/vue-loader/dist/exportHelper.js":
/*!******************************************************!*\
  !*** ./node_modules/vue-loader/dist/exportHelper.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
// runtime helper for setting properties on components
// in a tree-shakable way
exports["default"] = (sfc, props) => {
    const target = sfc.__vccOpts || sfc;
    for (const [key, val] of props) {
        target[key] = val;
    }
    return target;
};


/***/ }),

/***/ "./resources/js/Pages/shared/navbar.vue":
/*!**********************************************!*\
  !*** ./resources/js/Pages/shared/navbar.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _navbar_vue_vue_type_template_id_108c8d7e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./navbar.vue?vue&type=template&id=108c8d7e */ "./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e");
/* harmony import */ var _navbar_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./navbar.vue?vue&type=script&lang=js */ "./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_Matteo_Gallini_Documents_Progetti_prova_pratica_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_Matteo_Gallini_Documents_Progetti_prova_pratica_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_navbar_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_navbar_vue_vue_type_template_id_108c8d7e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/shared/navbar.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js":
/*!**********************************************************************!*\
  !*** ./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_navbar_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_navbar_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./navbar.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e":
/*!****************************************************************************!*\
  !*** ./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_navbar_vue_vue_type_template_id_108c8d7e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_navbar_vue_vue_type_template_id_108c8d7e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./navbar.vue?vue&type=template&id=108c8d7e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/shared/navbar.vue?vue&type=template&id=108c8d7e");


/***/ })

}]);