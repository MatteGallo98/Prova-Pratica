"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Layout_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=script&lang=js":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=script&lang=js ***!
  \*******************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'layout'
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13":
/*!***********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13 ***!
  \***********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<nav class=\"navbar navbar-expand-lg navbar-light bg-light\" style=\"background-color:#e3f2fd !important;\"><a class=\"navbar-brand brand\" href=\"/\">BuyMe</a><button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button><div class=\"collapse navbar-collapse\" id=\"navbarNav\"><!--&lt;ul class=&quot;navbar-nav ms-auto&quot;&gt;\r\n            @guest @if (Route::has(&#39;login&#39;)) @auth\r\n            &lt;li class=&quot;nav-item&quot;&gt;\r\n            &lt;a href=&quot;{{ url(&#39;/dashboard&#39;) }}&quot; class=&quot;nav-link underline me-auto&quot;\r\n                &gt;Dashboard&lt;/a\r\n            &gt;\r\n            &lt;/li&gt;\r\n            @else\r\n            &lt;li class=&quot;nav-item&quot;&gt;\r\n            &lt;a href=&quot;{{ route(&#39;login&#39;) }}&quot; class=&quot;nav-link underline me-auto&quot;\r\n                &gt;Log in&lt;/a\r\n            &gt;\r\n            &lt;/li&gt;\r\n            @endauth @endif @else @if(Auth::user()-&gt;admin === 0)\r\n            &lt;li class=&quot;nav-item&quot;&gt;\r\n            &lt;a class=&quot;nav-link underline me-auto&quot;\r\n                &gt;&lt;i class=&quot;fa fa-shopping-cart&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i\r\n            &gt;&lt;/a&gt;\r\n            &lt;/li&gt;\r\n            @endif\r\n            &lt;li class=&quot;nav-item dropdown&quot;&gt;\r\n            &lt;a\r\n                id=&quot;navbarDropdown&quot;\r\n                class=&quot;nav-link dropdown-toggle&quot;\r\n                href=&quot;#&quot;\r\n                role=&quot;button&quot;\r\n                data-bs-toggle=&quot;dropdown&quot;\r\n                aria-haspopup=&quot;true&quot;\r\n                aria-expanded=&quot;false&quot;\r\n                v-pre\r\n            &gt;\r\n                {{ Auth::user()-&gt;name }}\r\n            &lt;/a&gt;\r\n\r\n            &lt;div\r\n                class=&quot;dropdown-menu dropdown-menu-end&quot;\r\n                aria-labelledby=&quot;navbarDropdown&quot;\r\n            &gt;\r\n                @if(Auth::user()-&gt;admin === 1)\r\n                &lt;a class=&quot;dropdown-item&quot; href=&quot;{{ route(&#39;gest_utenti&#39;) }}&quot;&gt;\r\n                Gestione Utenti\r\n                &lt;/a&gt;\r\n                &lt;a class=&quot;dropdown-item&quot; href=&quot;{{ route(&#39;gest_prodotti&#39;) }}&quot;&gt;\r\n                Gestione Prodotti\r\n                &lt;/a&gt;\r\n                &lt;a class=&quot;dropdown-item&quot; href=&quot;{{ route(&#39;gest_ordini&#39;) }}&quot;&gt;\r\n                Gestione Ordini\r\n                &lt;/a&gt;\r\n                @else\r\n                &lt;a class=&quot;dropdown-item&quot; href=&quot;{{ route(&#39;gest_utenti&#39;) }}&quot;&gt;\r\n                Riepilogo Ordini\r\n                &lt;/a&gt;\r\n                @endif\r\n\r\n                &lt;a\r\n                class=&quot;dropdown-item&quot;\r\n                href=&quot;{{ route(&#39;logout&#39;) }}&quot;\r\n                onclick=&quot;event.preventDefault();\r\n                                                            document.getElementById(&#39;logout-form&#39;).submit();&quot;\r\n                &gt;\r\n                {{ __(&quot;Logout&quot;) }}\r\n                &lt;/a&gt;\r\n\r\n                &lt;form\r\n                id=&quot;logout-form&quot;\r\n                action=&quot;{{ route(&#39;logout&#39;) }}&quot;\r\n                method=&quot;POST&quot;\r\n                class=&quot;d-none&quot;\r\n                &gt;\r\n                @csrf\r\n                &lt;/form&gt;\r\n            &lt;/div&gt;\r\n            &lt;/li&gt;\r\n        &lt;/ul&gt;--></div></nav>", 1);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [_hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")]);
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

/***/ "./resources/js/Pages/Layout.vue":
/*!***************************************!*\
  !*** ./resources/js/Pages/Layout.vue ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layout_vue_vue_type_template_id_7edced13__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Layout.vue?vue&type=template&id=7edced13 */ "./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13");
/* harmony import */ var _Layout_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Layout.vue?vue&type=script&lang=js */ "./resources/js/Pages/Layout.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_Matteo_Gallini_Documents_Progetti_prova_pratica_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_Matteo_Gallini_Documents_Progetti_prova_pratica_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Layout_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Layout_vue_vue_type_template_id_7edced13__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Layout.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Layout.vue?vue&type=script&lang=js":
/*!***************************************************************!*\
  !*** ./resources/js/Pages/Layout.vue?vue&type=script&lang=js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Layout.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13":
/*!*********************************************************************!*\
  !*** ./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13 ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_template_id_7edced13__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_template_id_7edced13__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Layout.vue?vue&type=template&id=7edced13 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Layout.vue?vue&type=template&id=7edced13");


/***/ })

}]);