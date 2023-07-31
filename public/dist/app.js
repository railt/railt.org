(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./resources/assets/app.js":
/*!*********************************!*\
  !*** ./resources/assets/app.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./resources/assets/styles/app.scss");
/* harmony import */ var _core_Application__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./core/Application */ "./resources/assets/core/Application.js");


if (!String.prototype.replaceAt) {
  String.prototype.replaceAt = function (index, replacement) {
    return this.substr(0, index) + replacement + this.substr(index + replacement.length);
  };
}
var app = new _core_Application__WEBPACK_IMPORTED_MODULE_1__["default"]();
app.boot();

/***/ }),

/***/ "./resources/assets/core/Application.js":
/*!**********************************************!*\
  !*** ./resources/assets/core/Application.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Application)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string.js */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! knockout */ "./node_modules/knockout/build/output/knockout-latest.js");
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(knockout__WEBPACK_IMPORTED_MODULE_18__);


















function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }

var Application = /*#__PURE__*/function () {
  function Application() {
    _classCallCheck(this, Application);
  }
  _createClass(Application, [{
    key: "boot",
    value: function boot() {
      var nodes = document.querySelectorAll('[data-vm]');
      var _iterator = _createForOfIteratorHelper(nodes),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var node = _step.value;
          var vm = __webpack_require__("./resources/assets/vm sync recursive ^\\.\\/.*\\.js$")("./".concat(node.getAttribute('data-vm'), ".js"))["default"];
          knockout__WEBPACK_IMPORTED_MODULE_18___default().applyBindings(new vm(), node);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    }
  }]);
  return Application;
}();


/***/ }),

/***/ "./resources/assets/vm/HeaderViewModel.js":
/*!************************************************!*\
  !*** ./resources/assets/vm/HeaderViewModel.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ HeaderViewModel)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.weak-set.js */ "./node_modules/core-js/modules/es.weak-set.js");
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! knockout */ "./node_modules/knockout/build/output/knockout-latest.js");
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(knockout__WEBPACK_IMPORTED_MODULE_12__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }












function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _classPrivateMethodInitSpec(obj, privateSet) { _checkPrivateRedeclaration(obj, privateSet); privateSet.add(obj); }
function _checkPrivateRedeclaration(obj, privateCollection) { if (privateCollection.has(obj)) { throw new TypeError("Cannot initialize the same private elements twice on an object"); } }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _classPrivateMethodGet(receiver, privateSet, fn) { if (!privateSet.has(receiver)) { throw new TypeError("attempted to get private field on non-instance"); } return fn; }

var STICKY_TOP = 1;
var _onScroll = /*#__PURE__*/new WeakSet();
var HeaderViewModel = /*#__PURE__*/_createClass(function HeaderViewModel() {
  var _this = this;
  _classCallCheck(this, HeaderViewModel);
  _classPrivateMethodInitSpec(this, _onScroll);
  /**
   * @type {KnockoutObservable<boolean>}
   */
  _defineProperty(this, "sticky", knockout__WEBPACK_IMPORTED_MODULE_12___default().observable(false));
  window.addEventListener('scroll', function (e) {
    return _classPrivateMethodGet(_this, _onScroll, _onScroll2).call(_this, e);
  });
});
function _onScroll2() {
  this.sticky(window.scrollY > STICKY_TOP);
}


/***/ }),

/***/ "./resources/assets/vm/MenuViewModel.js":
/*!**********************************************!*\
  !*** ./resources/assets/vm/MenuViewModel.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ MenuViewModel)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_weak_map_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.weak-map.js */ "./node_modules/core-js/modules/es.weak-map.js");
/* harmony import */ var core_js_modules_es_weak_map_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_weak_map_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string.js */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var core_js_modules_es_symbol_async_iterator_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! core-js/modules/es.symbol.async-iterator.js */ "./node_modules/core-js/modules/es.symbol.async-iterator.js");
/* harmony import */ var core_js_modules_es_symbol_async_iterator_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_async_iterator_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var core_js_modules_es_symbol_to_string_tag_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! core-js/modules/es.symbol.to-string-tag.js */ "./node_modules/core-js/modules/es.symbol.to-string-tag.js");
/* harmony import */ var core_js_modules_es_symbol_to_string_tag_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_string_tag_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var core_js_modules_es_json_to_string_tag_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! core-js/modules/es.json.to-string-tag.js */ "./node_modules/core-js/modules/es.json.to-string-tag.js");
/* harmony import */ var core_js_modules_es_json_to_string_tag_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_json_to_string_tag_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var core_js_modules_es_math_to_string_tag_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! core-js/modules/es.math.to-string-tag.js */ "./node_modules/core-js/modules/es.math.to-string-tag.js");
/* harmony import */ var core_js_modules_es_math_to_string_tag_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_math_to_string_tag_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_25___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_25__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_26___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_26__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_27___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_27__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_28___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_28__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_29___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_29__);
/* harmony import */ var core_js_modules_es_array_reverse_js__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! core-js/modules/es.array.reverse.js */ "./node_modules/core-js/modules/es.array.reverse.js");
/* harmony import */ var core_js_modules_es_array_reverse_js__WEBPACK_IMPORTED_MODULE_30___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_reverse_js__WEBPACK_IMPORTED_MODULE_30__);
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! knockout */ "./node_modules/knockout/build/output/knockout-latest.js");
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_31___default = /*#__PURE__*/__webpack_require__.n(knockout__WEBPACK_IMPORTED_MODULE_31__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }































function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _classPrivateFieldInitSpec(obj, privateMap, value) { _checkPrivateRedeclaration(obj, privateMap); privateMap.set(obj, value); }
function _checkPrivateRedeclaration(obj, privateCollection) { if (privateCollection.has(obj)) { throw new TypeError("Cannot initialize the same private elements twice on an object"); } }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _classPrivateFieldGet(receiver, privateMap) { var descriptor = _classExtractFieldDescriptor(receiver, privateMap, "get"); return _classApplyDescriptorGet(receiver, descriptor); }
function _classExtractFieldDescriptor(receiver, privateMap, action) { if (!privateMap.has(receiver)) { throw new TypeError("attempted to " + action + " private field on non-instance"); } return privateMap.get(receiver); }
function _classApplyDescriptorGet(receiver, descriptor) { if (descriptor.get) { return descriptor.get.call(receiver); } return descriptor.value; }

var _menu = /*#__PURE__*/new WeakMap();
var MenuViewModel = /*#__PURE__*/function () {
  function MenuViewModel() {
    var _this = this;
    _classCallCheck(this, MenuViewModel);
    /**
     * @type {KnockoutObservable<string>}
     */
    _defineProperty(this, "query", knockout__WEBPACK_IMPORTED_MODULE_31___default().observable('').extend({
      throttle: 300
    }));
    /**
     * @type {KnockoutObservable<boolean>}
     */
    _defineProperty(this, "shown", knockout__WEBPACK_IMPORTED_MODULE_31___default().observable(false).extend({
      throttle: 300
    }));
    /**
     * @type {KnockoutObservableArray<Object>}
     */
    _defineProperty(this, "results", knockout__WEBPACK_IMPORTED_MODULE_31___default().observableArray());
    /**
     * @type {[KnockoutObservable<boolean>]}
     */
    _classPrivateFieldInitSpec(this, _menu, {
      writable: true,
      value: []
    });
    this.query.subscribe( /*#__PURE__*/function () {
      var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(value) {
        var form, response, results, _iterator, _step, result, _iterator2, _step2, query;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              if (!(value.length < 2)) {
                _context.next = 3;
                break;
              }
              _this.results([]);
              return _context.abrupt("return");
            case 3:
              form = new FormData();
              form.append('query', value);
              _context.prev = 5;
              _context.next = 8;
              return fetch('/docs/search.json', {
                method: 'POST',
                body: form
              });
            case 8:
              response = _context.sent;
              _context.next = 11;
              return response.json();
            case 11:
              results = _context.sent;
              _iterator = _createForOfIteratorHelper(results);
              try {
                for (_iterator.s(); !(_step = _iterator.n()).done;) {
                  result = _step.value;
                  _iterator2 = _createForOfIteratorHelper(result.found);
                  try {
                    for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
                      query = _step2.value;
                      result.title = result.title.replace(query, "<span>".concat(query, "</span>"));
                    }
                  } catch (err) {
                    _iterator2.e(err);
                  } finally {
                    _iterator2.f();
                  }
                }
              } catch (err) {
                _iterator.e(err);
              } finally {
                _iterator.f();
              }
              _this.results(results);
              _context.next = 21;
              break;
            case 17:
              _context.prev = 17;
              _context.t0 = _context["catch"](5);
              _this.results([]);
              console.error(_context.t0);
            case 21:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[5, 17]]);
      }));
      return function (_x) {
        return _ref.apply(this, arguments);
      };
    }());
  }
  _createClass(MenuViewModel, [{
    key: "focus",
    value: function focus() {
      this.shown(true);
    }
  }, {
    key: "blur",
    value: function blur() {
      this.shown(false);
    }

    /**
     * @param {number} id
     * @returns {KnockoutObservable<boolean>}
     */
  }, {
    key: "menu",
    value: function menu(id) {
      if (!_classPrivateFieldGet(this, _menu)[id]) {
        var defaultValue = localStorage.getItem("menu-shown-".concat(id));
        defaultValue = defaultValue === null || defaultValue === '1';
        _classPrivateFieldGet(this, _menu)[id] = knockout__WEBPACK_IMPORTED_MODULE_31___default().observable(!!defaultValue);
      }
      return _classPrivateFieldGet(this, _menu)[id];
    }

    /**
     * @param {number} id
     * @returns {boolean}
     */
  }, {
    key: "toggle",
    value: function toggle(id) {
      var status = this.menu(id);
      localStorage.setItem("menu-shown-".concat(id), status() ? '0' : '1');
      status(!status());
      return false;
    }
  }]);
  return MenuViewModel;
}();


/***/ }),

/***/ "./resources/assets/vm/SplashViewModel.js":
/*!************************************************!*\
  !*** ./resources/assets/vm/SplashViewModel.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ SplashViewModel)
/* harmony export */ });
/* harmony import */ var core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");
/* harmony import */ var core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.weak-set.js */ "./node_modules/core-js/modules/es.weak-set.js");
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string.js */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! knockout */ "./node_modules/knockout/build/output/knockout-latest.js");
/* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(knockout__WEBPACK_IMPORTED_MODULE_16__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
















function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _classPrivateMethodInitSpec(obj, privateSet) { _checkPrivateRedeclaration(obj, privateSet); privateSet.add(obj); }
function _checkPrivateRedeclaration(obj, privateCollection) { if (privateCollection.has(obj)) { throw new TypeError("Cannot initialize the same private elements twice on an object"); } }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _classPrivateMethodGet(receiver, privateSet, fn) { if (!privateSet.has(receiver)) { throw new TypeError("attempted to get private field on non-instance"); } return fn; }

var TITLE = 'Rail';
var _titleAnimationTick = /*#__PURE__*/new WeakSet();
var _letterAnimationTick = /*#__PURE__*/new WeakSet();
var _onScroll = /*#__PURE__*/new WeakSet();
var SplashViewModel = /*#__PURE__*/_createClass(function SplashViewModel() {
  var _this = this;
  _classCallCheck(this, SplashViewModel);
  _classPrivateMethodInitSpec(this, _onScroll);
  _classPrivateMethodInitSpec(this, _letterAnimationTick);
  _classPrivateMethodInitSpec(this, _titleAnimationTick);
  /**
   * @type {KnockoutObservable<number>}
   */
  _defineProperty(this, "firstLayerY", knockout__WEBPACK_IMPORTED_MODULE_16___default().observable(0));
  /**
   * @type {KnockoutObservable<number>}
   */
  _defineProperty(this, "secondLayerY", knockout__WEBPACK_IMPORTED_MODULE_16___default().observable(0));
  /**
   * @type {KnockoutObservable<string>}
   */
  _defineProperty(this, "title", knockout__WEBPACK_IMPORTED_MODULE_16___default().observable('&nbsp;'));
  /**
   * @type {KnockoutObservable<boolean>}
   */
  _defineProperty(this, "ready", knockout__WEBPACK_IMPORTED_MODULE_16___default().observable(false));
  window.addEventListener('scroll', function (e) {
    return requestAnimationFrame(function () {
      return _classPrivateMethodGet(_this, _onScroll, _onScroll2).call(_this, e);
    });
  });
  setTimeout(function () {
    return _classPrivateMethodGet(_this, _titleAnimationTick, _titleAnimationTick2).call(_this, TITLE);
  }, 300);
});
function _titleAnimationTick2(buffer) {
  if (buffer.length === 0) {
    this.ready(true);
    this.title('Rail<span>t</span>');
    return;
  }
  this.title(this.title() + buffer.substr(0, 1));
  _classPrivateMethodGet(this, _letterAnimationTick, _letterAnimationTick2).call(this, buffer.substr(1));
}
function _letterAnimationTick2(buffer) {
  var _this2 = this;
  var title = this.title();
  var letter = Math.random().toString(36).substr(2, 1);
  this.title("".concat(title, "<span>").concat(letter, "</span>"));
  setTimeout(function () {
    _this2.title(title);
    if (Math.random() >= 0.2) {
      _classPrivateMethodGet(_this2, _letterAnimationTick, _letterAnimationTick2).call(_this2, buffer);
    } else {
      _classPrivateMethodGet(_this2, _titleAnimationTick, _titleAnimationTick2).call(_this2, buffer);
    }
  }, 40);
}
function _onScroll2() {
  this.firstLayerY(window.scrollY / 1.5);
  this.secondLayerY(window.scrollY / 2);
}


/***/ }),

/***/ "./resources/assets/styles/app.scss":
/*!******************************************!*\
  !*** ./resources/assets/styles/app.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/vm sync recursive ^\\.\\/.*\\.js$":
/*!************************************************!*\
  !*** ./resources/assets/vm/ sync ^\.\/.*\.js$ ***!
  \************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./HeaderViewModel.js": "./resources/assets/vm/HeaderViewModel.js",
	"./MenuViewModel.js": "./resources/assets/vm/MenuViewModel.js",
	"./SplashViewModel.js": "./resources/assets/vm/SplashViewModel.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./resources/assets/vm sync recursive ^\\.\\/.*\\.js$";

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_concat_js-node_modules_core-js_modules_es_array-f2552e"], () => (__webpack_exec__("./resources/assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUMsU0FBQWhQLFdBQUEsRUFFVztFQUNSLElBQUksQ0FBQ3VQLFdBQVcsQ0FBQzFQLE1BQU0sQ0FBQ00sT0FBTyxHQUFHLEdBQUcsQ0FBQztFQUN0QyxJQUFJLENBQUNxUCxZQUFZLENBQUMzUCxNQUFNLENBQUNNLE9BQU8sR0FBRyxDQUFDLENBQUM7QUFDekM7Ozs7Ozs7Ozs7Ozs7QUNwRUo7Ozs7Ozs7Ozs7O0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL0FwcGxpY2F0aW9uLmpzIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvdm0vSGVhZGVyVmlld01vZGVsLmpzIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvdm0vTWVudVZpZXdNb2RlbC5qcyIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL3ZtL1NwbGFzaFZpZXdNb2RlbC5qcyIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL3N0eWxlcy9hcHAuc2Nzcz83ZTUxIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvdm0vIHN5bmMgXlxcLlxcLy4qXFwuanMkIl0sInNvdXJjZXNDb250ZW50IjpbIlxuaW1wb3J0IFwiLi9zdHlsZXMvYXBwLnNjc3NcIjtcbmltcG9ydCBBcHBsaWNhdGlvbiBmcm9tIFwiLi9jb3JlL0FwcGxpY2F0aW9uXCI7XG5cbmlmICghU3RyaW5nLnByb3RvdHlwZS5yZXBsYWNlQXQpIHtcbiAgICBTdHJpbmcucHJvdG90eXBlLnJlcGxhY2VBdCA9IGZ1bmN0aW9uIChpbmRleCwgcmVwbGFjZW1lbnQpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuc3Vic3RyKDAsIGluZGV4KSArIHJlcGxhY2VtZW50ICsgdGhpcy5zdWJzdHIoaW5kZXggKyByZXBsYWNlbWVudC5sZW5ndGgpO1xuICAgIH07XG59XG5cbmNvbnN0IGFwcCA9IG5ldyBBcHBsaWNhdGlvbigpO1xuYXBwLmJvb3QoKTtcbiIsIlxuaW1wb3J0IGtvIGZyb20gXCJrbm9ja291dFwiO1xuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBBcHBsaWNhdGlvbiB7XG4gICAgYm9vdCgpIHtcbiAgICAgICAgbGV0IG5vZGVzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdm1dJyk7XG5cbiAgICAgICAgZm9yIChsZXQgbm9kZSBvZiBub2Rlcykge1xuICAgICAgICAgICAgbGV0IHZtID0gcmVxdWlyZShgLi4vdm0vJHtub2RlLmdldEF0dHJpYnV0ZSgnZGF0YS12bScpfS5qc2ApLmRlZmF1bHQ7XG5cbiAgICAgICAgICAgIGtvLmFwcGx5QmluZGluZ3MobmV3IHZtKCksIG5vZGUpO1xuICAgICAgICB9XG4gICAgfVxufVxuIiwiXG5pbXBvcnQga28gZnJvbSBcImtub2Nrb3V0XCI7XG5cbmNvbnN0IFNUSUNLWV9UT1AgPSAxO1xuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBIZWFkZXJWaWV3TW9kZWwge1xuICAgIC8qKlxuICAgICAqIEB0eXBlIHtLbm9ja291dE9ic2VydmFibGU8Ym9vbGVhbj59XG4gICAgICovXG4gICAgc3RpY2t5ID0ga28ub2JzZXJ2YWJsZShmYWxzZSk7XG5cbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIChlKSA9PiB0aGlzLiNvblNjcm9sbChlKSk7XG4gICAgfVxuXG4gICAgI29uU2Nyb2xsKCkge1xuICAgICAgICB0aGlzLnN0aWNreSh3aW5kb3cuc2Nyb2xsWSA+IFNUSUNLWV9UT1ApO1xuICAgIH1cbn1cbiIsIlxuaW1wb3J0IGtvIGZyb20gXCJrbm9ja291dFwiO1xuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBNZW51Vmlld01vZGVsIHtcbiAgICAvKipcbiAgICAgKiBAdHlwZSB7S25vY2tvdXRPYnNlcnZhYmxlPHN0cmluZz59XG4gICAgICovXG4gICAgcXVlcnkgPSBrby5vYnNlcnZhYmxlKCcnKVxuICAgICAgICAuZXh0ZW5kKHsgdGhyb3R0bGU6IDMwMCB9KTtcblxuICAgIC8qKlxuICAgICAqIEB0eXBlIHtLbm9ja291dE9ic2VydmFibGU8Ym9vbGVhbj59XG4gICAgICovXG4gICAgc2hvd24gPSBrby5vYnNlcnZhYmxlKGZhbHNlKVxuICAgICAgICAuZXh0ZW5kKHsgdGhyb3R0bGU6IDMwMCB9KTtcblxuICAgIC8qKlxuICAgICAqIEB0eXBlIHtLbm9ja291dE9ic2VydmFibGVBcnJheTxPYmplY3Q+fVxuICAgICAqL1xuICAgIHJlc3VsdHMgPSBrby5vYnNlcnZhYmxlQXJyYXkoKTtcblxuICAgIC8qKlxuICAgICAqIEB0eXBlIHtbS25vY2tvdXRPYnNlcnZhYmxlPGJvb2xlYW4+XX1cbiAgICAgKi9cbiAgICAjbWVudSA9IFtdO1xuXG4gICAgY29uc3RydWN0b3IoKSB7XG4gICAgICAgIHRoaXMucXVlcnkuc3Vic2NyaWJlKGFzeW5jIHZhbHVlID0+IHtcbiAgICAgICAgICAgIGlmICh2YWx1ZS5sZW5ndGggPCAyKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5yZXN1bHRzKFtdKTtcblxuICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgbGV0IGZvcm0gPSBuZXcgRm9ybURhdGEoKTtcbiAgICAgICAgICAgIGZvcm0uYXBwZW5kKCdxdWVyeScsIHZhbHVlKTtcblxuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICBsZXQgcmVzcG9uc2UgPSBhd2FpdCBmZXRjaCgnL2RvY3Mvc2VhcmNoLmpzb24nLCB7XG4gICAgICAgICAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICAgICAgICAgICAgICBib2R5OiBmb3JtXG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICBsZXQgcmVzdWx0cyA9IGF3YWl0IHJlc3BvbnNlLmpzb24oKTtcblxuICAgICAgICAgICAgICAgIGZvciAobGV0IHJlc3VsdCBvZiByZXN1bHRzKSB7XG4gICAgICAgICAgICAgICAgICAgIGZvciAobGV0IHF1ZXJ5IG9mIHJlc3VsdC5mb3VuZCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgcmVzdWx0LnRpdGxlID0gcmVzdWx0LnRpdGxlXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLnJlcGxhY2UocXVlcnksIGA8c3Bhbj4ke3F1ZXJ5fTwvc3Bhbj5gKVxuICAgICAgICAgICAgICAgICAgICAgICAgO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgdGhpcy5yZXN1bHRzKHJlc3VsdHMpO1xuICAgICAgICAgICAgfSBjYXRjaCAoZSkge1xuICAgICAgICAgICAgICAgIHRoaXMucmVzdWx0cyhbXSk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5lcnJvcihlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgZm9jdXMoKSB7XG4gICAgICAgIHRoaXMuc2hvd24odHJ1ZSk7XG4gICAgfVxuXG4gICAgYmx1cigpIHtcbiAgICAgICAgdGhpcy5zaG93bihmYWxzZSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQHBhcmFtIHtudW1iZXJ9IGlkXG4gICAgICogQHJldHVybnMge0tub2Nrb3V0T2JzZXJ2YWJsZTxib29sZWFuPn1cbiAgICAgKi9cbiAgICBtZW51KGlkKSB7XG4gICAgICAgIGlmICghIHRoaXMuI21lbnVbaWRdKSB7XG4gICAgICAgICAgICBsZXQgZGVmYXVsdFZhbHVlID0gbG9jYWxTdG9yYWdlLmdldEl0ZW0oYG1lbnUtc2hvd24tJHtpZH1gKTtcblxuICAgICAgICAgICAgZGVmYXVsdFZhbHVlID0gZGVmYXVsdFZhbHVlID09PSBudWxsIHx8IGRlZmF1bHRWYWx1ZSA9PT0gJzEnO1xuXG4gICAgICAgICAgICB0aGlzLiNtZW51W2lkXSA9IGtvLm9ic2VydmFibGUoISFkZWZhdWx0VmFsdWUpO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIHRoaXMuI21lbnVbaWRdO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEBwYXJhbSB7bnVtYmVyfSBpZFxuICAgICAqIEByZXR1cm5zIHtib29sZWFufVxuICAgICAqL1xuICAgIHRvZ2dsZShpZCkge1xuICAgICAgICBsZXQgc3RhdHVzID0gdGhpcy5tZW51KGlkKTtcblxuICAgICAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbShgbWVudS1zaG93bi0ke2lkfWAsIHN0YXR1cygpID8gJzAnIDogJzEnKTtcblxuICAgICAgICBzdGF0dXMoISBzdGF0dXMoKSk7XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cbn1cbiIsIlxuaW1wb3J0IGtvIGZyb20gXCJrbm9ja291dFwiO1xuXG5jb25zdCBUSVRMRSA9ICdSYWlsJztcblxuZXhwb3J0IGRlZmF1bHQgY2xhc3MgU3BsYXNoVmlld01vZGVsIHtcbiAgICAvKipcbiAgICAgKiBAdHlwZSB7S25vY2tvdXRPYnNlcnZhYmxlPG51bWJlcj59XG4gICAgICovXG4gICAgZmlyc3RMYXllclkgPSBrby5vYnNlcnZhYmxlKDApO1xuXG4gICAgLyoqXG4gICAgICogQHR5cGUge0tub2Nrb3V0T2JzZXJ2YWJsZTxudW1iZXI+fVxuICAgICAqL1xuICAgIHNlY29uZExheWVyWSA9IGtvLm9ic2VydmFibGUoMCk7XG5cbiAgICAvKipcbiAgICAgKiBAdHlwZSB7S25vY2tvdXRPYnNlcnZhYmxlPHN0cmluZz59XG4gICAgICovXG4gICAgdGl0bGUgPSBrby5vYnNlcnZhYmxlKCcmbmJzcDsnKTtcblxuICAgIC8qKlxuICAgICAqIEB0eXBlIHtLbm9ja291dE9ic2VydmFibGU8Ym9vbGVhbj59XG4gICAgICovXG4gICAgcmVhZHkgPSBrby5vYnNlcnZhYmxlKGZhbHNlKTtcblxuICAgIGNvbnN0cnVjdG9yKCkge1xuICAgICAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgKGUpID0+XG4gICAgICAgICAgICByZXF1ZXN0QW5pbWF0aW9uRnJhbWUoKCkgPT4gdGhpcy4jb25TY3JvbGwoZSkpXG4gICAgICAgICk7XG5cbiAgICAgICAgc2V0VGltZW91dCgoKSA9PiB0aGlzLiN0aXRsZUFuaW1hdGlvblRpY2soVElUTEUpLCAzMDApO1xuICAgIH1cblxuICAgICN0aXRsZUFuaW1hdGlvblRpY2soYnVmZmVyKSB7XG4gICAgICAgIGlmIChidWZmZXIubGVuZ3RoID09PSAwKSB7XG4gICAgICAgICAgICB0aGlzLnJlYWR5KHRydWUpO1xuICAgICAgICAgICAgdGhpcy50aXRsZSgnUmFpbDxzcGFuPnQ8L3NwYW4+Jyk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnRpdGxlKHRoaXMudGl0bGUoKSArIGJ1ZmZlci5zdWJzdHIoMCwgMSkpO1xuXG4gICAgICAgIHRoaXMuI2xldHRlckFuaW1hdGlvblRpY2soYnVmZmVyLnN1YnN0cigxKSk7XG4gICAgfVxuXG4gICAgI2xldHRlckFuaW1hdGlvblRpY2soYnVmZmVyKSB7XG4gICAgICAgIGNvbnN0IHRpdGxlID0gdGhpcy50aXRsZSgpO1xuICAgICAgICBjb25zdCBsZXR0ZXIgPSBNYXRoLnJhbmRvbSgpXG4gICAgICAgICAgICAudG9TdHJpbmcoMzYpXG4gICAgICAgICAgICAuc3Vic3RyKDIsIDEpO1xuXG4gICAgICAgIHRoaXMudGl0bGUoYCR7dGl0bGV9PHNwYW4+JHtsZXR0ZXJ9PC9zcGFuPmApO1xuXG4gICAgICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgICAgICAgdGhpcy50aXRsZSh0aXRsZSk7XG5cbiAgICAgICAgICAgIGlmIChNYXRoLnJhbmRvbSgpID49IDAuMikge1xuICAgICAgICAgICAgICAgIHRoaXMuI2xldHRlckFuaW1hdGlvblRpY2soYnVmZmVyKTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgdGhpcy4jdGl0bGVBbmltYXRpb25UaWNrKGJ1ZmZlcik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0sIDQwKTtcbiAgICB9XG5cbiAgICAjb25TY3JvbGwoKSB7XG4gICAgICAgIHRoaXMuZmlyc3RMYXllclkod2luZG93LnNjcm9sbFkgLyAxLjUpO1xuICAgICAgICB0aGlzLnNlY29uZExheWVyWSh3aW5kb3cuc2Nyb2xsWSAvIDIpO1xuICAgIH1cbn1cbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyIsInZhciBtYXAgPSB7XG5cdFwiLi9IZWFkZXJWaWV3TW9kZWwuanNcIjogXCIuL3Jlc291cmNlcy9hc3NldHMvdm0vSGVhZGVyVmlld01vZGVsLmpzXCIsXG5cdFwiLi9NZW51Vmlld01vZGVsLmpzXCI6IFwiLi9yZXNvdXJjZXMvYXNzZXRzL3ZtL01lbnVWaWV3TW9kZWwuanNcIixcblx0XCIuL1NwbGFzaFZpZXdNb2RlbC5qc1wiOiBcIi4vcmVzb3VyY2VzL2Fzc2V0cy92bS9TcGxhc2hWaWV3TW9kZWwuanNcIlxufTtcblxuXG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dChyZXEpIHtcblx0dmFyIGlkID0gd2VicGFja0NvbnRleHRSZXNvbHZlKHJlcSk7XG5cdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKGlkKTtcbn1cbmZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpIHtcblx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhtYXAsIHJlcSkpIHtcblx0XHR2YXIgZSA9IG5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIgKyByZXEgKyBcIidcIik7XG5cdFx0ZS5jb2RlID0gJ01PRFVMRV9OT1RfRk9VTkQnO1xuXHRcdHRocm93IGU7XG5cdH1cblx0cmV0dXJuIG1hcFtyZXFdO1xufVxud2VicGFja0NvbnRleHQua2V5cyA9IGZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0S2V5cygpIHtcblx0cmV0dXJuIE9iamVjdC5rZXlzKG1hcCk7XG59O1xud2VicGFja0NvbnRleHQucmVzb2x2ZSA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZTtcbm1vZHVsZS5leHBvcnRzID0gd2VicGFja0NvbnRleHQ7XG53ZWJwYWNrQ29udGV4dC5pZCA9IFwiLi9yZXNvdXJjZXMvYXNzZXRzL3ZtIHN5bmMgcmVjdXJzaXZlIF5cXFxcLlxcXFwvLipcXFxcLmpzJFwiOyJdLCJuYW1lcyI6WyJBcHBsaWNhdGlvbiIsIlN0cmluZyIsInByb3RvdHlwZSIsInJlcGxhY2VBdCIsImluZGV4IiwicmVwbGFjZW1lbnQiLCJzdWJzdHIiLCJsZW5ndGgiLCJhcHAiLCJib290Iiwia28iLCJfY2xhc3NDYWxsQ2hlY2siLCJfY3JlYXRlQ2xhc3MiLCJrZXkiLCJ2YWx1ZSIsIm5vZGVzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiX2l0ZXJhdG9yIiwiX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIiLCJfc3RlcCIsInMiLCJuIiwiZG9uZSIsIm5vZGUiLCJ2bSIsInJlcXVpcmUiLCJjb25jYXQiLCJnZXRBdHRyaWJ1dGUiLCJhcHBseUJpbmRpbmdzIiwiZXJyIiwiZSIsImYiLCJkZWZhdWx0IiwiU1RJQ0tZX1RPUCIsIl9vblNjcm9sbCIsIldlYWtTZXQiLCJIZWFkZXJWaWV3TW9kZWwiLCJfdGhpcyIsIl9jbGFzc1ByaXZhdGVNZXRob2RJbml0U3BlYyIsIl9kZWZpbmVQcm9wZXJ0eSIsIm9ic2VydmFibGUiLCJ3aW5kb3ciLCJhZGRFdmVudExpc3RlbmVyIiwiX2NsYXNzUHJpdmF0ZU1ldGhvZEdldCIsIl9vblNjcm9sbDIiLCJjYWxsIiwic3RpY2t5Iiwic2Nyb2xsWSIsIl9yZWdlbmVyYXRvclJ1bnRpbWUiLCJleHBvcnRzIiwiT3AiLCJPYmplY3QiLCJoYXNPd24iLCJoYXNPd25Qcm9wZXJ0eSIsImRlZmluZVByb3BlcnR5Iiwib2JqIiwiZGVzYyIsIiRTeW1ib2wiLCJTeW1ib2wiLCJpdGVyYXRvclN5bWJvbCIsIml0ZXJhdG9yIiwiYXN5bmNJdGVyYXRvclN5bWJvbCIsImFzeW5jSXRlcmF0b3IiLCJ0b1N0cmluZ1RhZ1N5bWJvbCIsInRvU3RyaW5nVGFnIiwiZGVmaW5lIiwiZW51bWVyYWJsZSIsImNvbmZpZ3VyYWJsZSIsIndyaXRhYmxlIiwid3JhcCIsImlubmVyRm4iLCJvdXRlckZuIiwic2VsZiIsInRyeUxvY3NMaXN0IiwicHJvdG9HZW5lcmF0b3IiLCJHZW5lcmF0b3IiLCJnZW5lcmF0b3IiLCJjcmVhdGUiLCJjb250ZXh0IiwiQ29udGV4dCIsIm1ha2VJbnZva2VNZXRob2QiLCJ0cnlDYXRjaCIsImZuIiwiYXJnIiwidHlwZSIsIkNvbnRpbnVlU2VudGluZWwiLCJHZW5lcmF0b3JGdW5jdGlvbiIsIkdlbmVyYXRvckZ1bmN0aW9uUHJvdG90eXBlIiwiSXRlcmF0b3JQcm90b3R5cGUiLCJnZXRQcm90byIsImdldFByb3RvdHlwZU9mIiwiTmF0aXZlSXRlcmF0b3JQcm90b3R5cGUiLCJ2YWx1ZXMiLCJHcCIsImRlZmluZUl0ZXJhdG9yTWV0aG9kcyIsImZvckVhY2giLCJtZXRob2QiLCJfaW52b2tlIiwiQXN5bmNJdGVyYXRvciIsIlByb21pc2VJbXBsIiwiaW52b2tlIiwicmVzb2x2ZSIsInJlamVjdCIsInJlY29yZCIsInJlc3VsdCIsIl90eXBlb2YiLCJfX2F3YWl0IiwidGhlbiIsInVud3JhcHBlZCIsImVycm9yIiwicHJldmlvdXNQcm9taXNlIiwiY2FsbEludm9rZVdpdGhNZXRob2RBbmRBcmciLCJzdGF0ZSIsIkVycm9yIiwiZG9uZVJlc3VsdCIsImRlbGVnYXRlIiwiZGVsZWdhdGVSZXN1bHQiLCJtYXliZUludm9rZURlbGVnYXRlIiwic2VudCIsIl9zZW50IiwiZGlzcGF0Y2hFeGNlcHRpb24iLCJhYnJ1cHQiLCJtZXRob2ROYW1lIiwidW5kZWZpbmVkIiwiVHlwZUVycm9yIiwiaW5mbyIsInJlc3VsdE5hbWUiLCJuZXh0IiwibmV4dExvYyIsInB1c2hUcnlFbnRyeSIsImxvY3MiLCJlbnRyeSIsInRyeUxvYyIsImNhdGNoTG9jIiwiZmluYWxseUxvYyIsImFmdGVyTG9jIiwidHJ5RW50cmllcyIsInB1c2giLCJyZXNldFRyeUVudHJ5IiwiY29tcGxldGlvbiIsInJlc2V0IiwiaXRlcmFibGUiLCJpdGVyYXRvck1ldGhvZCIsImlzTmFOIiwiaSIsImRpc3BsYXlOYW1lIiwiaXNHZW5lcmF0b3JGdW5jdGlvbiIsImdlbkZ1biIsImN0b3IiLCJjb25zdHJ1Y3RvciIsIm5hbWUiLCJtYXJrIiwic2V0UHJvdG90eXBlT2YiLCJfX3Byb3RvX18iLCJhd3JhcCIsImFzeW5jIiwiUHJvbWlzZSIsIml0ZXIiLCJrZXlzIiwidmFsIiwib2JqZWN0IiwicmV2ZXJzZSIsInBvcCIsInNraXBUZW1wUmVzZXQiLCJwcmV2IiwiY2hhckF0Iiwic2xpY2UiLCJzdG9wIiwicm9vdFJlY29yZCIsInJ2YWwiLCJleGNlcHRpb24iLCJoYW5kbGUiLCJsb2MiLCJjYXVnaHQiLCJoYXNDYXRjaCIsImhhc0ZpbmFsbHkiLCJmaW5hbGx5RW50cnkiLCJjb21wbGV0ZSIsImZpbmlzaCIsIl9jYXRjaCIsInRocm93biIsImRlbGVnYXRlWWllbGQiLCJvIiwiYWxsb3dBcnJheUxpa2UiLCJpdCIsIkFycmF5IiwiaXNBcnJheSIsIl91bnN1cHBvcnRlZEl0ZXJhYmxlVG9BcnJheSIsIkYiLCJfZSIsIm5vcm1hbENvbXBsZXRpb24iLCJkaWRFcnIiLCJzdGVwIiwiX2UyIiwibWluTGVuIiwiX2FycmF5TGlrZVRvQXJyYXkiLCJ0b1N0cmluZyIsImZyb20iLCJ0ZXN0IiwiYXJyIiwibGVuIiwiYXJyMiIsImFzeW5jR2VuZXJhdG9yU3RlcCIsImdlbiIsIl9uZXh0IiwiX3Rocm93IiwiX2FzeW5jVG9HZW5lcmF0b3IiLCJhcmdzIiwiYXJndW1lbnRzIiwiYXBwbHkiLCJpbnN0YW5jZSIsIkNvbnN0cnVjdG9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJ0YXJnZXQiLCJwcm9wcyIsImRlc2NyaXB0b3IiLCJfdG9Qcm9wZXJ0eUtleSIsInByb3RvUHJvcHMiLCJzdGF0aWNQcm9wcyIsIl9jbGFzc1ByaXZhdGVGaWVsZEluaXRTcGVjIiwicHJpdmF0ZU1hcCIsIl9jaGVja1ByaXZhdGVSZWRlY2xhcmF0aW9uIiwic2V0IiwicHJpdmF0ZUNvbGxlY3Rpb24iLCJoYXMiLCJfdG9QcmltaXRpdmUiLCJpbnB1dCIsImhpbnQiLCJwcmltIiwidG9QcmltaXRpdmUiLCJyZXMiLCJOdW1iZXIiLCJfY2xhc3NQcml2YXRlRmllbGRHZXQiLCJyZWNlaXZlciIsIl9jbGFzc0V4dHJhY3RGaWVsZERlc2NyaXB0b3IiLCJfY2xhc3NBcHBseURlc2NyaXB0b3JHZXQiLCJhY3Rpb24iLCJnZXQiLCJfbWVudSIsIldlYWtNYXAiLCJNZW51Vmlld01vZGVsIiwiZXh0ZW5kIiwidGhyb3R0bGUiLCJvYnNlcnZhYmxlQXJyYXkiLCJxdWVyeSIsInN1YnNjcmliZSIsIl9yZWYiLCJfY2FsbGVlIiwiZm9ybSIsInJlc3BvbnNlIiwicmVzdWx0cyIsIl9pdGVyYXRvcjIiLCJfc3RlcDIiLCJfY2FsbGVlJCIsIl9jb250ZXh0IiwiRm9ybURhdGEiLCJhcHBlbmQiLCJmZXRjaCIsImJvZHkiLCJqc29uIiwiZm91bmQiLCJ0aXRsZSIsInJlcGxhY2UiLCJ0MCIsImNvbnNvbGUiLCJfeCIsImZvY3VzIiwic2hvd24iLCJibHVyIiwibWVudSIsImlkIiwiZGVmYXVsdFZhbHVlIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsInRvZ2dsZSIsInN0YXR1cyIsInNldEl0ZW0iLCJUSVRMRSIsIl90aXRsZUFuaW1hdGlvblRpY2siLCJfbGV0dGVyQW5pbWF0aW9uVGljayIsIlNwbGFzaFZpZXdNb2RlbCIsInJlcXVlc3RBbmltYXRpb25GcmFtZSIsInNldFRpbWVvdXQiLCJfdGl0bGVBbmltYXRpb25UaWNrMiIsImJ1ZmZlciIsInJlYWR5IiwiX2xldHRlckFuaW1hdGlvblRpY2syIiwiX3RoaXMyIiwibGV0dGVyIiwiTWF0aCIsInJhbmRvbSIsImZpcnN0TGF5ZXJZIiwic2Vjb25kTGF5ZXJZIl0sInNvdXJjZVJvb3QiOiIifQ==