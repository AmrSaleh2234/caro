var vendorModule =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/vendor.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@popperjs/core/dist/umd/popper.min.js":
/*!************************************************************!*\
  !*** ./node_modules/@popperjs/core/dist/umd/popper.min.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/**
 * @popperjs/core v2.11.7 - MIT License
 */

!function (e, t) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? t(exports) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (t),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function (e) {
  "use strict";

  function t(e) {
    if (null == e) return window;
    if ("[object Window]" !== e.toString()) {
      var t = e.ownerDocument;
      return t && t.defaultView || window;
    }
    return e;
  }
  function n(e) {
    return e instanceof t(e).Element || e instanceof Element;
  }
  function r(e) {
    return e instanceof t(e).HTMLElement || e instanceof HTMLElement;
  }
  function o(e) {
    return "undefined" != typeof ShadowRoot && (e instanceof t(e).ShadowRoot || e instanceof ShadowRoot);
  }
  var i = Math.max,
    a = Math.min,
    s = Math.round;
  function f() {
    var e = navigator.userAgentData;
    return null != e && e.brands && Array.isArray(e.brands) ? e.brands.map(function (e) {
      return e.brand + "/" + e.version;
    }).join(" ") : navigator.userAgent;
  }
  function c() {
    return !/^((?!chrome|android).)*safari/i.test(f());
  }
  function p(e, o, i) {
    void 0 === o && (o = !1), void 0 === i && (i = !1);
    var a = e.getBoundingClientRect(),
      f = 1,
      p = 1;
    o && r(e) && (f = e.offsetWidth > 0 && s(a.width) / e.offsetWidth || 1, p = e.offsetHeight > 0 && s(a.height) / e.offsetHeight || 1);
    var u = (n(e) ? t(e) : window).visualViewport,
      l = !c() && i,
      d = (a.left + (l && u ? u.offsetLeft : 0)) / f,
      h = (a.top + (l && u ? u.offsetTop : 0)) / p,
      m = a.width / f,
      v = a.height / p;
    return {
      width: m,
      height: v,
      top: h,
      right: d + m,
      bottom: h + v,
      left: d,
      x: d,
      y: h
    };
  }
  function u(e) {
    var n = t(e);
    return {
      scrollLeft: n.pageXOffset,
      scrollTop: n.pageYOffset
    };
  }
  function l(e) {
    return e ? (e.nodeName || "").toLowerCase() : null;
  }
  function d(e) {
    return ((n(e) ? e.ownerDocument : e.document) || window.document).documentElement;
  }
  function h(e) {
    return p(d(e)).left + u(e).scrollLeft;
  }
  function m(e) {
    return t(e).getComputedStyle(e);
  }
  function v(e) {
    var t = m(e),
      n = t.overflow,
      r = t.overflowX,
      o = t.overflowY;
    return /auto|scroll|overlay|hidden/.test(n + o + r);
  }
  function y(e, n, o) {
    void 0 === o && (o = !1);
    var i,
      a,
      f = r(n),
      c = r(n) && function (e) {
        var t = e.getBoundingClientRect(),
          n = s(t.width) / e.offsetWidth || 1,
          r = s(t.height) / e.offsetHeight || 1;
        return 1 !== n || 1 !== r;
      }(n),
      m = d(n),
      y = p(e, c, o),
      g = {
        scrollLeft: 0,
        scrollTop: 0
      },
      b = {
        x: 0,
        y: 0
      };
    return (f || !f && !o) && (("body" !== l(n) || v(m)) && (g = (i = n) !== t(i) && r(i) ? {
      scrollLeft: (a = i).scrollLeft,
      scrollTop: a.scrollTop
    } : u(i)), r(n) ? ((b = p(n, !0)).x += n.clientLeft, b.y += n.clientTop) : m && (b.x = h(m))), {
      x: y.left + g.scrollLeft - b.x,
      y: y.top + g.scrollTop - b.y,
      width: y.width,
      height: y.height
    };
  }
  function g(e) {
    var t = p(e),
      n = e.offsetWidth,
      r = e.offsetHeight;
    return Math.abs(t.width - n) <= 1 && (n = t.width), Math.abs(t.height - r) <= 1 && (r = t.height), {
      x: e.offsetLeft,
      y: e.offsetTop,
      width: n,
      height: r
    };
  }
  function b(e) {
    return "html" === l(e) ? e : e.assignedSlot || e.parentNode || (o(e) ? e.host : null) || d(e);
  }
  function x(e) {
    return ["html", "body", "#document"].indexOf(l(e)) >= 0 ? e.ownerDocument.body : r(e) && v(e) ? e : x(b(e));
  }
  function w(e, n) {
    var r;
    void 0 === n && (n = []);
    var o = x(e),
      i = o === (null == (r = e.ownerDocument) ? void 0 : r.body),
      a = t(o),
      s = i ? [a].concat(a.visualViewport || [], v(o) ? o : []) : o,
      f = n.concat(s);
    return i ? f : f.concat(w(b(s)));
  }
  function O(e) {
    return ["table", "td", "th"].indexOf(l(e)) >= 0;
  }
  function j(e) {
    return r(e) && "fixed" !== m(e).position ? e.offsetParent : null;
  }
  function E(e) {
    for (var n = t(e), i = j(e); i && O(i) && "static" === m(i).position;) i = j(i);
    return i && ("html" === l(i) || "body" === l(i) && "static" === m(i).position) ? n : i || function (e) {
      var t = /firefox/i.test(f());
      if (/Trident/i.test(f()) && r(e) && "fixed" === m(e).position) return null;
      var n = b(e);
      for (o(n) && (n = n.host); r(n) && ["html", "body"].indexOf(l(n)) < 0;) {
        var i = m(n);
        if ("none" !== i.transform || "none" !== i.perspective || "paint" === i.contain || -1 !== ["transform", "perspective"].indexOf(i.willChange) || t && "filter" === i.willChange || t && i.filter && "none" !== i.filter) return n;
        n = n.parentNode;
      }
      return null;
    }(e) || n;
  }
  var D = "top",
    A = "bottom",
    L = "right",
    P = "left",
    M = "auto",
    k = [D, A, L, P],
    W = "start",
    B = "end",
    H = "viewport",
    T = "popper",
    R = k.reduce(function (e, t) {
      return e.concat([t + "-" + W, t + "-" + B]);
    }, []),
    S = [].concat(k, [M]).reduce(function (e, t) {
      return e.concat([t, t + "-" + W, t + "-" + B]);
    }, []),
    V = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];
  function q(e) {
    var t = new Map(),
      n = new Set(),
      r = [];
    function o(e) {
      n.add(e.name), [].concat(e.requires || [], e.requiresIfExists || []).forEach(function (e) {
        if (!n.has(e)) {
          var r = t.get(e);
          r && o(r);
        }
      }), r.push(e);
    }
    return e.forEach(function (e) {
      t.set(e.name, e);
    }), e.forEach(function (e) {
      n.has(e.name) || o(e);
    }), r;
  }
  function C(e) {
    return e.split("-")[0];
  }
  function N(e, t) {
    var n = t.getRootNode && t.getRootNode();
    if (e.contains(t)) return !0;
    if (n && o(n)) {
      var r = t;
      do {
        if (r && e.isSameNode(r)) return !0;
        r = r.parentNode || r.host;
      } while (r);
    }
    return !1;
  }
  function I(e) {
    return Object.assign({}, e, {
      left: e.x,
      top: e.y,
      right: e.x + e.width,
      bottom: e.y + e.height
    });
  }
  function _(e, r, o) {
    return r === H ? I(function (e, n) {
      var r = t(e),
        o = d(e),
        i = r.visualViewport,
        a = o.clientWidth,
        s = o.clientHeight,
        f = 0,
        p = 0;
      if (i) {
        a = i.width, s = i.height;
        var u = c();
        (u || !u && "fixed" === n) && (f = i.offsetLeft, p = i.offsetTop);
      }
      return {
        width: a,
        height: s,
        x: f + h(e),
        y: p
      };
    }(e, o)) : n(r) ? function (e, t) {
      var n = p(e, !1, "fixed" === t);
      return n.top = n.top + e.clientTop, n.left = n.left + e.clientLeft, n.bottom = n.top + e.clientHeight, n.right = n.left + e.clientWidth, n.width = e.clientWidth, n.height = e.clientHeight, n.x = n.left, n.y = n.top, n;
    }(r, o) : I(function (e) {
      var t,
        n = d(e),
        r = u(e),
        o = null == (t = e.ownerDocument) ? void 0 : t.body,
        a = i(n.scrollWidth, n.clientWidth, o ? o.scrollWidth : 0, o ? o.clientWidth : 0),
        s = i(n.scrollHeight, n.clientHeight, o ? o.scrollHeight : 0, o ? o.clientHeight : 0),
        f = -r.scrollLeft + h(e),
        c = -r.scrollTop;
      return "rtl" === m(o || n).direction && (f += i(n.clientWidth, o ? o.clientWidth : 0) - a), {
        width: a,
        height: s,
        x: f,
        y: c
      };
    }(d(e)));
  }
  function F(e, t, o, s) {
    var f = "clippingParents" === t ? function (e) {
        var t = w(b(e)),
          o = ["absolute", "fixed"].indexOf(m(e).position) >= 0 && r(e) ? E(e) : e;
        return n(o) ? t.filter(function (e) {
          return n(e) && N(e, o) && "body" !== l(e);
        }) : [];
      }(e) : [].concat(t),
      c = [].concat(f, [o]),
      p = c[0],
      u = c.reduce(function (t, n) {
        var r = _(e, n, s);
        return t.top = i(r.top, t.top), t.right = a(r.right, t.right), t.bottom = a(r.bottom, t.bottom), t.left = i(r.left, t.left), t;
      }, _(e, p, s));
    return u.width = u.right - u.left, u.height = u.bottom - u.top, u.x = u.left, u.y = u.top, u;
  }
  function U(e) {
    return e.split("-")[1];
  }
  function z(e) {
    return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y";
  }
  function X(e) {
    var t,
      n = e.reference,
      r = e.element,
      o = e.placement,
      i = o ? C(o) : null,
      a = o ? U(o) : null,
      s = n.x + n.width / 2 - r.width / 2,
      f = n.y + n.height / 2 - r.height / 2;
    switch (i) {
      case D:
        t = {
          x: s,
          y: n.y - r.height
        };
        break;
      case A:
        t = {
          x: s,
          y: n.y + n.height
        };
        break;
      case L:
        t = {
          x: n.x + n.width,
          y: f
        };
        break;
      case P:
        t = {
          x: n.x - r.width,
          y: f
        };
        break;
      default:
        t = {
          x: n.x,
          y: n.y
        };
    }
    var c = i ? z(i) : null;
    if (null != c) {
      var p = "y" === c ? "height" : "width";
      switch (a) {
        case W:
          t[c] = t[c] - (n[p] / 2 - r[p] / 2);
          break;
        case B:
          t[c] = t[c] + (n[p] / 2 - r[p] / 2);
      }
    }
    return t;
  }
  function Y(e) {
    return Object.assign({}, {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0
    }, e);
  }
  function G(e, t) {
    return t.reduce(function (t, n) {
      return t[n] = e, t;
    }, {});
  }
  function J(e, t) {
    void 0 === t && (t = {});
    var r = t,
      o = r.placement,
      i = void 0 === o ? e.placement : o,
      a = r.strategy,
      s = void 0 === a ? e.strategy : a,
      f = r.boundary,
      c = void 0 === f ? "clippingParents" : f,
      u = r.rootBoundary,
      l = void 0 === u ? H : u,
      h = r.elementContext,
      m = void 0 === h ? T : h,
      v = r.altBoundary,
      y = void 0 !== v && v,
      g = r.padding,
      b = void 0 === g ? 0 : g,
      x = Y("number" != typeof b ? b : G(b, k)),
      w = m === T ? "reference" : T,
      O = e.rects.popper,
      j = e.elements[y ? w : m],
      E = F(n(j) ? j : j.contextElement || d(e.elements.popper), c, l, s),
      P = p(e.elements.reference),
      M = X({
        reference: P,
        element: O,
        strategy: "absolute",
        placement: i
      }),
      W = I(Object.assign({}, O, M)),
      B = m === T ? W : P,
      R = {
        top: E.top - B.top + x.top,
        bottom: B.bottom - E.bottom + x.bottom,
        left: E.left - B.left + x.left,
        right: B.right - E.right + x.right
      },
      S = e.modifiersData.offset;
    if (m === T && S) {
      var V = S[i];
      Object.keys(R).forEach(function (e) {
        var t = [L, A].indexOf(e) >= 0 ? 1 : -1,
          n = [D, A].indexOf(e) >= 0 ? "y" : "x";
        R[e] += V[n] * t;
      });
    }
    return R;
  }
  var K = {
    placement: "bottom",
    modifiers: [],
    strategy: "absolute"
  };
  function Q() {
    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
    return !t.some(function (e) {
      return !(e && "function" == typeof e.getBoundingClientRect);
    });
  }
  function Z(e) {
    void 0 === e && (e = {});
    var t = e,
      r = t.defaultModifiers,
      o = void 0 === r ? [] : r,
      i = t.defaultOptions,
      a = void 0 === i ? K : i;
    return function (e, t, r) {
      void 0 === r && (r = a);
      var i,
        s,
        f = {
          placement: "bottom",
          orderedModifiers: [],
          options: Object.assign({}, K, a),
          modifiersData: {},
          elements: {
            reference: e,
            popper: t
          },
          attributes: {},
          styles: {}
        },
        c = [],
        p = !1,
        u = {
          state: f,
          setOptions: function setOptions(r) {
            var i = "function" == typeof r ? r(f.options) : r;
            l(), f.options = Object.assign({}, a, f.options, i), f.scrollParents = {
              reference: n(e) ? w(e) : e.contextElement ? w(e.contextElement) : [],
              popper: w(t)
            };
            var s,
              p,
              d = function (e) {
                var t = q(e);
                return V.reduce(function (e, n) {
                  return e.concat(t.filter(function (e) {
                    return e.phase === n;
                  }));
                }, []);
              }((s = [].concat(o, f.options.modifiers), p = s.reduce(function (e, t) {
                var n = e[t.name];
                return e[t.name] = n ? Object.assign({}, n, t, {
                  options: Object.assign({}, n.options, t.options),
                  data: Object.assign({}, n.data, t.data)
                }) : t, e;
              }, {}), Object.keys(p).map(function (e) {
                return p[e];
              })));
            return f.orderedModifiers = d.filter(function (e) {
              return e.enabled;
            }), f.orderedModifiers.forEach(function (e) {
              var t = e.name,
                n = e.options,
                r = void 0 === n ? {} : n,
                o = e.effect;
              if ("function" == typeof o) {
                var i = o({
                    state: f,
                    name: t,
                    instance: u,
                    options: r
                  }),
                  a = function a() {};
                c.push(i || a);
              }
            }), u.update();
          },
          forceUpdate: function forceUpdate() {
            if (!p) {
              var e = f.elements,
                t = e.reference,
                n = e.popper;
              if (Q(t, n)) {
                f.rects = {
                  reference: y(t, E(n), "fixed" === f.options.strategy),
                  popper: g(n)
                }, f.reset = !1, f.placement = f.options.placement, f.orderedModifiers.forEach(function (e) {
                  return f.modifiersData[e.name] = Object.assign({}, e.data);
                });
                for (var r = 0; r < f.orderedModifiers.length; r++) if (!0 !== f.reset) {
                  var o = f.orderedModifiers[r],
                    i = o.fn,
                    a = o.options,
                    s = void 0 === a ? {} : a,
                    c = o.name;
                  "function" == typeof i && (f = i({
                    state: f,
                    options: s,
                    name: c,
                    instance: u
                  }) || f);
                } else f.reset = !1, r = -1;
              }
            }
          },
          update: (i = function i() {
            return new Promise(function (e) {
              u.forceUpdate(), e(f);
            });
          }, function () {
            return s || (s = new Promise(function (e) {
              Promise.resolve().then(function () {
                s = void 0, e(i());
              });
            })), s;
          }),
          destroy: function destroy() {
            l(), p = !0;
          }
        };
      if (!Q(e, t)) return u;
      function l() {
        c.forEach(function (e) {
          return e();
        }), c = [];
      }
      return u.setOptions(r).then(function (e) {
        !p && r.onFirstUpdate && r.onFirstUpdate(e);
      }), u;
    };
  }
  var $ = {
    passive: !0
  };
  var ee = {
    name: "eventListeners",
    enabled: !0,
    phase: "write",
    fn: function fn() {},
    effect: function effect(e) {
      var n = e.state,
        r = e.instance,
        o = e.options,
        i = o.scroll,
        a = void 0 === i || i,
        s = o.resize,
        f = void 0 === s || s,
        c = t(n.elements.popper),
        p = [].concat(n.scrollParents.reference, n.scrollParents.popper);
      return a && p.forEach(function (e) {
        e.addEventListener("scroll", r.update, $);
      }), f && c.addEventListener("resize", r.update, $), function () {
        a && p.forEach(function (e) {
          e.removeEventListener("scroll", r.update, $);
        }), f && c.removeEventListener("resize", r.update, $);
      };
    },
    data: {}
  };
  var te = {
      name: "popperOffsets",
      enabled: !0,
      phase: "read",
      fn: function fn(e) {
        var t = e.state,
          n = e.name;
        t.modifiersData[n] = X({
          reference: t.rects.reference,
          element: t.rects.popper,
          strategy: "absolute",
          placement: t.placement
        });
      },
      data: {}
    },
    ne = {
      top: "auto",
      right: "auto",
      bottom: "auto",
      left: "auto"
    };
  function re(e) {
    var n,
      r = e.popper,
      o = e.popperRect,
      i = e.placement,
      a = e.variation,
      f = e.offsets,
      c = e.position,
      p = e.gpuAcceleration,
      u = e.adaptive,
      l = e.roundOffsets,
      h = e.isFixed,
      v = f.x,
      y = void 0 === v ? 0 : v,
      g = f.y,
      b = void 0 === g ? 0 : g,
      x = "function" == typeof l ? l({
        x: y,
        y: b
      }) : {
        x: y,
        y: b
      };
    y = x.x, b = x.y;
    var w = f.hasOwnProperty("x"),
      O = f.hasOwnProperty("y"),
      j = P,
      M = D,
      k = window;
    if (u) {
      var W = E(r),
        H = "clientHeight",
        T = "clientWidth";
      if (W === t(r) && "static" !== m(W = d(r)).position && "absolute" === c && (H = "scrollHeight", T = "scrollWidth"), W = W, i === D || (i === P || i === L) && a === B) M = A, b -= (h && W === k && k.visualViewport ? k.visualViewport.height : W[H]) - o.height, b *= p ? 1 : -1;
      if (i === P || (i === D || i === A) && a === B) j = L, y -= (h && W === k && k.visualViewport ? k.visualViewport.width : W[T]) - o.width, y *= p ? 1 : -1;
    }
    var R,
      S = Object.assign({
        position: c
      }, u && ne),
      V = !0 === l ? function (e, t) {
        var n = e.x,
          r = e.y,
          o = t.devicePixelRatio || 1;
        return {
          x: s(n * o) / o || 0,
          y: s(r * o) / o || 0
        };
      }({
        x: y,
        y: b
      }, t(r)) : {
        x: y,
        y: b
      };
    return y = V.x, b = V.y, p ? Object.assign({}, S, ((R = {})[M] = O ? "0" : "", R[j] = w ? "0" : "", R.transform = (k.devicePixelRatio || 1) <= 1 ? "translate(" + y + "px, " + b + "px)" : "translate3d(" + y + "px, " + b + "px, 0)", R)) : Object.assign({}, S, ((n = {})[M] = O ? b + "px" : "", n[j] = w ? y + "px" : "", n.transform = "", n));
  }
  var oe = {
    name: "computeStyles",
    enabled: !0,
    phase: "beforeWrite",
    fn: function fn(e) {
      var t = e.state,
        n = e.options,
        r = n.gpuAcceleration,
        o = void 0 === r || r,
        i = n.adaptive,
        a = void 0 === i || i,
        s = n.roundOffsets,
        f = void 0 === s || s,
        c = {
          placement: C(t.placement),
          variation: U(t.placement),
          popper: t.elements.popper,
          popperRect: t.rects.popper,
          gpuAcceleration: o,
          isFixed: "fixed" === t.options.strategy
        };
      null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign({}, t.styles.popper, re(Object.assign({}, c, {
        offsets: t.modifiersData.popperOffsets,
        position: t.options.strategy,
        adaptive: a,
        roundOffsets: f
      })))), null != t.modifiersData.arrow && (t.styles.arrow = Object.assign({}, t.styles.arrow, re(Object.assign({}, c, {
        offsets: t.modifiersData.arrow,
        position: "absolute",
        adaptive: !1,
        roundOffsets: f
      })))), t.attributes.popper = Object.assign({}, t.attributes.popper, {
        "data-popper-placement": t.placement
      });
    },
    data: {}
  };
  var ie = {
    name: "applyStyles",
    enabled: !0,
    phase: "write",
    fn: function fn(e) {
      var t = e.state;
      Object.keys(t.elements).forEach(function (e) {
        var n = t.styles[e] || {},
          o = t.attributes[e] || {},
          i = t.elements[e];
        r(i) && l(i) && (Object.assign(i.style, n), Object.keys(o).forEach(function (e) {
          var t = o[e];
          !1 === t ? i.removeAttribute(e) : i.setAttribute(e, !0 === t ? "" : t);
        }));
      });
    },
    effect: function effect(e) {
      var t = e.state,
        n = {
          popper: {
            position: t.options.strategy,
            left: "0",
            top: "0",
            margin: "0"
          },
          arrow: {
            position: "absolute"
          },
          reference: {}
        };
      return Object.assign(t.elements.popper.style, n.popper), t.styles = n, t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow), function () {
        Object.keys(t.elements).forEach(function (e) {
          var o = t.elements[e],
            i = t.attributes[e] || {},
            a = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce(function (e, t) {
              return e[t] = "", e;
            }, {});
          r(o) && l(o) && (Object.assign(o.style, a), Object.keys(i).forEach(function (e) {
            o.removeAttribute(e);
          }));
        });
      };
    },
    requires: ["computeStyles"]
  };
  var ae = {
      name: "offset",
      enabled: !0,
      phase: "main",
      requires: ["popperOffsets"],
      fn: function fn(e) {
        var t = e.state,
          n = e.options,
          r = e.name,
          o = n.offset,
          i = void 0 === o ? [0, 0] : o,
          a = S.reduce(function (e, n) {
            return e[n] = function (e, t, n) {
              var r = C(e),
                o = [P, D].indexOf(r) >= 0 ? -1 : 1,
                i = "function" == typeof n ? n(Object.assign({}, t, {
                  placement: e
                })) : n,
                a = i[0],
                s = i[1];
              return a = a || 0, s = (s || 0) * o, [P, L].indexOf(r) >= 0 ? {
                x: s,
                y: a
              } : {
                x: a,
                y: s
              };
            }(n, t.rects, i), e;
          }, {}),
          s = a[t.placement],
          f = s.x,
          c = s.y;
        null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += f, t.modifiersData.popperOffsets.y += c), t.modifiersData[r] = a;
      }
    },
    se = {
      left: "right",
      right: "left",
      bottom: "top",
      top: "bottom"
    };
  function fe(e) {
    return e.replace(/left|right|bottom|top/g, function (e) {
      return se[e];
    });
  }
  var ce = {
    start: "end",
    end: "start"
  };
  function pe(e) {
    return e.replace(/start|end/g, function (e) {
      return ce[e];
    });
  }
  function ue(e, t) {
    void 0 === t && (t = {});
    var n = t,
      r = n.placement,
      o = n.boundary,
      i = n.rootBoundary,
      a = n.padding,
      s = n.flipVariations,
      f = n.allowedAutoPlacements,
      c = void 0 === f ? S : f,
      p = U(r),
      u = p ? s ? R : R.filter(function (e) {
        return U(e) === p;
      }) : k,
      l = u.filter(function (e) {
        return c.indexOf(e) >= 0;
      });
    0 === l.length && (l = u);
    var d = l.reduce(function (t, n) {
      return t[n] = J(e, {
        placement: n,
        boundary: o,
        rootBoundary: i,
        padding: a
      })[C(n)], t;
    }, {});
    return Object.keys(d).sort(function (e, t) {
      return d[e] - d[t];
    });
  }
  var le = {
    name: "flip",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t = e.state,
        n = e.options,
        r = e.name;
      if (!t.modifiersData[r]._skip) {
        for (var o = n.mainAxis, i = void 0 === o || o, a = n.altAxis, s = void 0 === a || a, f = n.fallbackPlacements, c = n.padding, p = n.boundary, u = n.rootBoundary, l = n.altBoundary, d = n.flipVariations, h = void 0 === d || d, m = n.allowedAutoPlacements, v = t.options.placement, y = C(v), g = f || (y === v || !h ? [fe(v)] : function (e) {
            if (C(e) === M) return [];
            var t = fe(e);
            return [pe(e), t, pe(t)];
          }(v)), b = [v].concat(g).reduce(function (e, n) {
            return e.concat(C(n) === M ? ue(t, {
              placement: n,
              boundary: p,
              rootBoundary: u,
              padding: c,
              flipVariations: h,
              allowedAutoPlacements: m
            }) : n);
          }, []), x = t.rects.reference, w = t.rects.popper, O = new Map(), j = !0, E = b[0], k = 0; k < b.length; k++) {
          var B = b[k],
            H = C(B),
            T = U(B) === W,
            R = [D, A].indexOf(H) >= 0,
            S = R ? "width" : "height",
            V = J(t, {
              placement: B,
              boundary: p,
              rootBoundary: u,
              altBoundary: l,
              padding: c
            }),
            q = R ? T ? L : P : T ? A : D;
          x[S] > w[S] && (q = fe(q));
          var N = fe(q),
            I = [];
          if (i && I.push(V[H] <= 0), s && I.push(V[q] <= 0, V[N] <= 0), I.every(function (e) {
            return e;
          })) {
            E = B, j = !1;
            break;
          }
          O.set(B, I);
        }
        if (j) for (var _ = function _(e) {
            var t = b.find(function (t) {
              var n = O.get(t);
              if (n) return n.slice(0, e).every(function (e) {
                return e;
              });
            });
            if (t) return E = t, "break";
          }, F = h ? 3 : 1; F > 0; F--) {
          if ("break" === _(F)) break;
        }
        t.placement !== E && (t.modifiersData[r]._skip = !0, t.placement = E, t.reset = !0);
      }
    },
    requiresIfExists: ["offset"],
    data: {
      _skip: !1
    }
  };
  function de(e, t, n) {
    return i(e, a(t, n));
  }
  var he = {
    name: "preventOverflow",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t = e.state,
        n = e.options,
        r = e.name,
        o = n.mainAxis,
        s = void 0 === o || o,
        f = n.altAxis,
        c = void 0 !== f && f,
        p = n.boundary,
        u = n.rootBoundary,
        l = n.altBoundary,
        d = n.padding,
        h = n.tether,
        m = void 0 === h || h,
        v = n.tetherOffset,
        y = void 0 === v ? 0 : v,
        b = J(t, {
          boundary: p,
          rootBoundary: u,
          padding: d,
          altBoundary: l
        }),
        x = C(t.placement),
        w = U(t.placement),
        O = !w,
        j = z(x),
        M = "x" === j ? "y" : "x",
        k = t.modifiersData.popperOffsets,
        B = t.rects.reference,
        H = t.rects.popper,
        T = "function" == typeof y ? y(Object.assign({}, t.rects, {
          placement: t.placement
        })) : y,
        R = "number" == typeof T ? {
          mainAxis: T,
          altAxis: T
        } : Object.assign({
          mainAxis: 0,
          altAxis: 0
        }, T),
        S = t.modifiersData.offset ? t.modifiersData.offset[t.placement] : null,
        V = {
          x: 0,
          y: 0
        };
      if (k) {
        if (s) {
          var q,
            N = "y" === j ? D : P,
            I = "y" === j ? A : L,
            _ = "y" === j ? "height" : "width",
            F = k[j],
            X = F + b[N],
            Y = F - b[I],
            G = m ? -H[_] / 2 : 0,
            K = w === W ? B[_] : H[_],
            Q = w === W ? -H[_] : -B[_],
            Z = t.elements.arrow,
            $ = m && Z ? g(Z) : {
              width: 0,
              height: 0
            },
            ee = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0
            },
            te = ee[N],
            ne = ee[I],
            re = de(0, B[_], $[_]),
            oe = O ? B[_] / 2 - G - re - te - R.mainAxis : K - re - te - R.mainAxis,
            ie = O ? -B[_] / 2 + G + re + ne + R.mainAxis : Q + re + ne + R.mainAxis,
            ae = t.elements.arrow && E(t.elements.arrow),
            se = ae ? "y" === j ? ae.clientTop || 0 : ae.clientLeft || 0 : 0,
            fe = null != (q = null == S ? void 0 : S[j]) ? q : 0,
            ce = F + ie - fe,
            pe = de(m ? a(X, F + oe - fe - se) : X, F, m ? i(Y, ce) : Y);
          k[j] = pe, V[j] = pe - F;
        }
        if (c) {
          var ue,
            le = "x" === j ? D : P,
            he = "x" === j ? A : L,
            me = k[M],
            ve = "y" === M ? "height" : "width",
            ye = me + b[le],
            ge = me - b[he],
            be = -1 !== [D, P].indexOf(x),
            xe = null != (ue = null == S ? void 0 : S[M]) ? ue : 0,
            we = be ? ye : me - B[ve] - H[ve] - xe + R.altAxis,
            Oe = be ? me + B[ve] + H[ve] - xe - R.altAxis : ge,
            je = m && be ? function (e, t, n) {
              var r = de(e, t, n);
              return r > n ? n : r;
            }(we, me, Oe) : de(m ? we : ye, me, m ? Oe : ge);
          k[M] = je, V[M] = je - me;
        }
        t.modifiersData[r] = V;
      }
    },
    requiresIfExists: ["offset"]
  };
  var me = {
    name: "arrow",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t,
        n = e.state,
        r = e.name,
        o = e.options,
        i = n.elements.arrow,
        a = n.modifiersData.popperOffsets,
        s = C(n.placement),
        f = z(s),
        c = [P, L].indexOf(s) >= 0 ? "height" : "width";
      if (i && a) {
        var p = function (e, t) {
            return Y("number" != typeof (e = "function" == typeof e ? e(Object.assign({}, t.rects, {
              placement: t.placement
            })) : e) ? e : G(e, k));
          }(o.padding, n),
          u = g(i),
          l = "y" === f ? D : P,
          d = "y" === f ? A : L,
          h = n.rects.reference[c] + n.rects.reference[f] - a[f] - n.rects.popper[c],
          m = a[f] - n.rects.reference[f],
          v = E(i),
          y = v ? "y" === f ? v.clientHeight || 0 : v.clientWidth || 0 : 0,
          b = h / 2 - m / 2,
          x = p[l],
          w = y - u[c] - p[d],
          O = y / 2 - u[c] / 2 + b,
          j = de(x, O, w),
          M = f;
        n.modifiersData[r] = ((t = {})[M] = j, t.centerOffset = j - O, t);
      }
    },
    effect: function effect(e) {
      var t = e.state,
        n = e.options.element,
        r = void 0 === n ? "[data-popper-arrow]" : n;
      null != r && ("string" != typeof r || (r = t.elements.popper.querySelector(r))) && N(t.elements.popper, r) && (t.elements.arrow = r);
    },
    requires: ["popperOffsets"],
    requiresIfExists: ["preventOverflow"]
  };
  function ve(e, t, n) {
    return void 0 === n && (n = {
      x: 0,
      y: 0
    }), {
      top: e.top - t.height - n.y,
      right: e.right - t.width + n.x,
      bottom: e.bottom - t.height + n.y,
      left: e.left - t.width - n.x
    };
  }
  function ye(e) {
    return [D, L, A, P].some(function (t) {
      return e[t] >= 0;
    });
  }
  var ge = {
      name: "hide",
      enabled: !0,
      phase: "main",
      requiresIfExists: ["preventOverflow"],
      fn: function fn(e) {
        var t = e.state,
          n = e.name,
          r = t.rects.reference,
          o = t.rects.popper,
          i = t.modifiersData.preventOverflow,
          a = J(t, {
            elementContext: "reference"
          }),
          s = J(t, {
            altBoundary: !0
          }),
          f = ve(a, r),
          c = ve(s, o, i),
          p = ye(f),
          u = ye(c);
        t.modifiersData[n] = {
          referenceClippingOffsets: f,
          popperEscapeOffsets: c,
          isReferenceHidden: p,
          hasPopperEscaped: u
        }, t.attributes.popper = Object.assign({}, t.attributes.popper, {
          "data-popper-reference-hidden": p,
          "data-popper-escaped": u
        });
      }
    },
    be = Z({
      defaultModifiers: [ee, te, oe, ie]
    }),
    xe = [ee, te, oe, ie, ae, le, he, me, ge],
    we = Z({
      defaultModifiers: xe
    });
  e.applyStyles = ie, e.arrow = me, e.computeStyles = oe, e.createPopper = we, e.createPopperLite = be, e.defaultModifiers = xe, e.detectOverflow = J, e.eventListeners = ee, e.flip = le, e.hide = ge, e.offset = ae, e.popperGenerator = Z, e.popperOffsets = te, e.preventOverflow = he, Object.defineProperty(e, "__esModule", {
    value: !0
  });
});

/***/ }),

/***/ "./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js":
/*!****************************************************************!*\
  !*** ./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap v4.6.2 (https://getbootstrap.com/)
  * Copyright 2011-2022 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
!function (t, e) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? e(exports, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (e),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function (t, e) {
  "use strict";

  function n(t) {
    return t && "object" == _typeof(t) && "default" in t ? t : {
      "default": t
    };
  }
  var i = n(e);
  function o(t, e) {
    for (var n = 0; n < e.length; n++) {
      var i = e[n];
      i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
    }
  }
  function r(t, e, n) {
    return e && o(t.prototype, e), n && o(t, n), Object.defineProperty(t, "prototype", {
      writable: !1
    }), t;
  }
  function a() {
    return a = Object.assign ? Object.assign.bind() : function (t) {
      for (var e = 1; e < arguments.length; e++) {
        var n = arguments[e];
        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
      }
      return t;
    }, a.apply(this, arguments);
  }
  function s(t, e) {
    return s = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) {
      return t.__proto__ = e, t;
    }, s(t, e);
  }
  var l = "transitionend";
  var u = {
    TRANSITION_END: "bsTransitionEnd",
    getUID: function getUID(t) {
      do {
        t += ~~(1e6 * Math.random());
      } while (document.getElementById(t));
      return t;
    },
    getSelectorFromElement: function getSelectorFromElement(t) {
      var e = t.getAttribute("data-target");
      if (!e || "#" === e) {
        var n = t.getAttribute("href");
        e = n && "#" !== n ? n.trim() : "";
      }
      try {
        return document.querySelector(e) ? e : null;
      } catch (t) {
        return null;
      }
    },
    getTransitionDurationFromElement: function getTransitionDurationFromElement(t) {
      if (!t) return 0;
      var e = i["default"](t).css("transition-duration"),
        n = i["default"](t).css("transition-delay"),
        o = parseFloat(e),
        r = parseFloat(n);
      return o || r ? (e = e.split(",")[0], n = n.split(",")[0], 1e3 * (parseFloat(e) + parseFloat(n))) : 0;
    },
    reflow: function reflow(t) {
      return t.offsetHeight;
    },
    triggerTransitionEnd: function triggerTransitionEnd(t) {
      i["default"](t).trigger(l);
    },
    supportsTransitionEnd: function supportsTransitionEnd() {
      return Boolean(l);
    },
    isElement: function isElement(t) {
      return (t[0] || t).nodeType;
    },
    typeCheckConfig: function typeCheckConfig(t, e, n) {
      for (var i in n) if (Object.prototype.hasOwnProperty.call(n, i)) {
        var o = n[i],
          r = e[i],
          a = r && u.isElement(r) ? "element" : null === (s = r) || "undefined" == typeof s ? "" + s : {}.toString.call(s).match(/\s([a-z]+)/i)[1].toLowerCase();
        if (!new RegExp(o).test(a)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + a + '" but expected type "' + o + '".');
      }
      var s;
    },
    findShadowRoot: function findShadowRoot(t) {
      if (!document.documentElement.attachShadow) return null;
      if ("function" == typeof t.getRootNode) {
        var e = t.getRootNode();
        return e instanceof ShadowRoot ? e : null;
      }
      return t instanceof ShadowRoot ? t : t.parentNode ? u.findShadowRoot(t.parentNode) : null;
    },
    jQueryDetection: function jQueryDetection() {
      if ("undefined" == typeof i["default"]) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
      var t = i["default"].fn.jquery.split(" ")[0].split(".");
      if (t[0] < 2 && t[1] < 9 || 1 === t[0] && 9 === t[1] && t[2] < 1 || t[0] >= 4) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
    }
  };
  u.jQueryDetection(), i["default"].fn.emulateTransitionEnd = function (t) {
    var e = this,
      n = !1;
    return i["default"](this).one(u.TRANSITION_END, function () {
      n = !0;
    }), setTimeout(function () {
      n || u.triggerTransitionEnd(e);
    }, t), this;
  }, i["default"].event.special[u.TRANSITION_END] = {
    bindType: l,
    delegateType: l,
    handle: function handle(t) {
      if (i["default"](t.target).is(this)) return t.handleObj.handler.apply(this, arguments);
    }
  };
  var f = "bs.alert",
    d = i["default"].fn.alert,
    c = function () {
      function t(t) {
        this._element = t;
      }
      var e = t.prototype;
      return e.close = function (t) {
        var e = this._element;
        t && (e = this._getRootElement(t)), this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e);
      }, e.dispose = function () {
        i["default"].removeData(this._element, f), this._element = null;
      }, e._getRootElement = function (t) {
        var e = u.getSelectorFromElement(t),
          n = !1;
        return e && (n = document.querySelector(e)), n || (n = i["default"](t).closest(".alert")[0]), n;
      }, e._triggerCloseEvent = function (t) {
        var e = i["default"].Event("close.bs.alert");
        return i["default"](t).trigger(e), e;
      }, e._removeElement = function (t) {
        var e = this;
        if (i["default"](t).removeClass("show"), i["default"](t).hasClass("fade")) {
          var n = u.getTransitionDurationFromElement(t);
          i["default"](t).one(u.TRANSITION_END, function (n) {
            return e._destroyElement(t, n);
          }).emulateTransitionEnd(n);
        } else this._destroyElement(t);
      }, e._destroyElement = function (t) {
        i["default"](t).detach().trigger("closed.bs.alert").remove();
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this),
            o = n.data(f);
          o || (o = new t(this), n.data(f, o)), "close" === e && o[e](this);
        });
      }, t._handleDismiss = function (t) {
        return function (e) {
          e && e.preventDefault(), t.close(this);
        };
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.alert.data-api", '[data-dismiss="alert"]', c._handleDismiss(new c())), i["default"].fn.alert = c._jQueryInterface, i["default"].fn.alert.Constructor = c, i["default"].fn.alert.noConflict = function () {
    return i["default"].fn.alert = d, c._jQueryInterface;
  };
  var h = "bs.button",
    p = i["default"].fn.button,
    m = "active",
    g = '[data-toggle^="button"]',
    _ = 'input:not([type="hidden"])',
    v = ".btn",
    b = function () {
      function t(t) {
        this._element = t, this.shouldAvoidTriggerChange = !1;
      }
      var e = t.prototype;
      return e.toggle = function () {
        var t = !0,
          e = !0,
          n = i["default"](this._element).closest('[data-toggle="buttons"]')[0];
        if (n) {
          var o = this._element.querySelector(_);
          if (o) {
            if ("radio" === o.type) if (o.checked && this._element.classList.contains(m)) t = !1;else {
              var r = n.querySelector(".active");
              r && i["default"](r).removeClass(m);
            }
            t && ("checkbox" !== o.type && "radio" !== o.type || (o.checked = !this._element.classList.contains(m)), this.shouldAvoidTriggerChange || i["default"](o).trigger("change")), o.focus(), e = !1;
          }
        }
        this._element.hasAttribute("disabled") || this._element.classList.contains("disabled") || (e && this._element.setAttribute("aria-pressed", !this._element.classList.contains(m)), t && i["default"](this._element).toggleClass(m));
      }, e.dispose = function () {
        i["default"].removeData(this._element, h), this._element = null;
      }, t._jQueryInterface = function (e, n) {
        return this.each(function () {
          var o = i["default"](this),
            r = o.data(h);
          r || (r = new t(this), o.data(h, r)), r.shouldAvoidTriggerChange = n, "toggle" === e && r[e]();
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.button.data-api", g, function (t) {
    var e = t.target,
      n = e;
    if (i["default"](e).hasClass("btn") || (e = i["default"](e).closest(v)[0]), !e || e.hasAttribute("disabled") || e.classList.contains("disabled")) t.preventDefault();else {
      var o = e.querySelector(_);
      if (o && (o.hasAttribute("disabled") || o.classList.contains("disabled"))) return void t.preventDefault();
      "INPUT" !== n.tagName && "LABEL" === e.tagName || b._jQueryInterface.call(i["default"](e), "toggle", "INPUT" === n.tagName);
    }
  }).on("focus.bs.button.data-api blur.bs.button.data-api", g, function (t) {
    var e = i["default"](t.target).closest(v)[0];
    i["default"](e).toggleClass("focus", /^focus(in)?$/.test(t.type));
  }), i["default"](window).on("load.bs.button.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-toggle="buttons"] .btn')), e = 0, n = t.length; e < n; e++) {
      var i = t[e],
        o = i.querySelector(_);
      o.checked || o.hasAttribute("checked") ? i.classList.add(m) : i.classList.remove(m);
    }
    for (var r = 0, a = (t = [].slice.call(document.querySelectorAll('[data-toggle="button"]'))).length; r < a; r++) {
      var s = t[r];
      "true" === s.getAttribute("aria-pressed") ? s.classList.add(m) : s.classList.remove(m);
    }
  }), i["default"].fn.button = b._jQueryInterface, i["default"].fn.button.Constructor = b, i["default"].fn.button.noConflict = function () {
    return i["default"].fn.button = p, b._jQueryInterface;
  };
  var y = "carousel",
    E = "bs.carousel",
    w = i["default"].fn[y],
    T = "active",
    C = "next",
    S = "prev",
    N = "slid.bs.carousel",
    D = ".active.carousel-item",
    A = {
      interval: 5e3,
      keyboard: !0,
      slide: !1,
      pause: "hover",
      wrap: !0,
      touch: !0
    },
    k = {
      interval: "(number|boolean)",
      keyboard: "boolean",
      slide: "(boolean|string)",
      pause: "(string|boolean)",
      wrap: "boolean",
      touch: "boolean"
    },
    I = {
      TOUCH: "touch",
      PEN: "pen"
    },
    O = function () {
      function t(t, e) {
        this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(e), this._element = t, this._indicatorsElement = this._element.querySelector(".carousel-indicators"), this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent), this._addEventListeners();
      }
      var e = t.prototype;
      return e.next = function () {
        this._isSliding || this._slide(C);
      }, e.nextWhenVisible = function () {
        var t = i["default"](this._element);
        !document.hidden && t.is(":visible") && "hidden" !== t.css("visibility") && this.next();
      }, e.prev = function () {
        this._isSliding || this._slide(S);
      }, e.pause = function (t) {
        t || (this._isPaused = !0), this._element.querySelector(".carousel-item-next, .carousel-item-prev") && (u.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null;
      }, e.cycle = function (t) {
        t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval));
      }, e.to = function (t) {
        var e = this;
        this._activeElement = this._element.querySelector(D);
        var n = this._getItemIndex(this._activeElement);
        if (!(t > this._items.length - 1 || t < 0)) if (this._isSliding) i["default"](this._element).one(N, function () {
          return e.to(t);
        });else {
          if (n === t) return this.pause(), void this.cycle();
          var o = t > n ? C : S;
          this._slide(o, this._items[t]);
        }
      }, e.dispose = function () {
        i["default"](this._element).off(".bs.carousel"), i["default"].removeData(this._element, E), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null;
      }, e._getConfig = function (t) {
        return t = a({}, A, t), u.typeCheckConfig(y, t, k), t;
      }, e._handleSwipe = function () {
        var t = Math.abs(this.touchDeltaX);
        if (!(t <= 40)) {
          var e = t / this.touchDeltaX;
          this.touchDeltaX = 0, e > 0 && this.prev(), e < 0 && this.next();
        }
      }, e._addEventListeners = function () {
        var t = this;
        this._config.keyboard && i["default"](this._element).on("keydown.bs.carousel", function (e) {
          return t._keydown(e);
        }), "hover" === this._config.pause && i["default"](this._element).on("mouseenter.bs.carousel", function (e) {
          return t.pause(e);
        }).on("mouseleave.bs.carousel", function (e) {
          return t.cycle(e);
        }), this._config.touch && this._addTouchEventListeners();
      }, e._addTouchEventListeners = function () {
        var t = this;
        if (this._touchSupported) {
          var e = function e(_e2) {
              t._pointerEvent && I[_e2.originalEvent.pointerType.toUpperCase()] ? t.touchStartX = _e2.originalEvent.clientX : t._pointerEvent || (t.touchStartX = _e2.originalEvent.touches[0].clientX);
            },
            n = function n(e) {
              t._pointerEvent && I[e.originalEvent.pointerType.toUpperCase()] && (t.touchDeltaX = e.originalEvent.clientX - t.touchStartX), t._handleSwipe(), "hover" === t._config.pause && (t.pause(), t.touchTimeout && clearTimeout(t.touchTimeout), t.touchTimeout = setTimeout(function (e) {
                return t.cycle(e);
              }, 500 + t._config.interval));
            };
          i["default"](this._element.querySelectorAll(".carousel-item img")).on("dragstart.bs.carousel", function (t) {
            return t.preventDefault();
          }), this._pointerEvent ? (i["default"](this._element).on("pointerdown.bs.carousel", function (t) {
            return e(t);
          }), i["default"](this._element).on("pointerup.bs.carousel", function (t) {
            return n(t);
          }), this._element.classList.add("pointer-event")) : (i["default"](this._element).on("touchstart.bs.carousel", function (t) {
            return e(t);
          }), i["default"](this._element).on("touchmove.bs.carousel", function (e) {
            return function (e) {
              t.touchDeltaX = e.originalEvent.touches && e.originalEvent.touches.length > 1 ? 0 : e.originalEvent.touches[0].clientX - t.touchStartX;
            }(e);
          }), i["default"](this._element).on("touchend.bs.carousel", function (t) {
            return n(t);
          }));
        }
      }, e._keydown = function (t) {
        if (!/input|textarea/i.test(t.target.tagName)) switch (t.which) {
          case 37:
            t.preventDefault(), this.prev();
            break;
          case 39:
            t.preventDefault(), this.next();
        }
      }, e._getItemIndex = function (t) {
        return this._items = t && t.parentNode ? [].slice.call(t.parentNode.querySelectorAll(".carousel-item")) : [], this._items.indexOf(t);
      }, e._getItemByDirection = function (t, e) {
        var n = t === C,
          i = t === S,
          o = this._getItemIndex(e),
          r = this._items.length - 1;
        if ((i && 0 === o || n && o === r) && !this._config.wrap) return e;
        var a = (o + (t === S ? -1 : 1)) % this._items.length;
        return -1 === a ? this._items[this._items.length - 1] : this._items[a];
      }, e._triggerSlideEvent = function (t, e) {
        var n = this._getItemIndex(t),
          o = this._getItemIndex(this._element.querySelector(D)),
          r = i["default"].Event("slide.bs.carousel", {
            relatedTarget: t,
            direction: e,
            from: o,
            to: n
          });
        return i["default"](this._element).trigger(r), r;
      }, e._setActiveIndicatorElement = function (t) {
        if (this._indicatorsElement) {
          var e = [].slice.call(this._indicatorsElement.querySelectorAll(".active"));
          i["default"](e).removeClass(T);
          var n = this._indicatorsElement.children[this._getItemIndex(t)];
          n && i["default"](n).addClass(T);
        }
      }, e._updateInterval = function () {
        var t = this._activeElement || this._element.querySelector(D);
        if (t) {
          var e = parseInt(t.getAttribute("data-interval"), 10);
          e ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = e) : this._config.interval = this._config.defaultInterval || this._config.interval;
        }
      }, e._slide = function (t, e) {
        var n,
          o,
          r,
          a = this,
          s = this._element.querySelector(D),
          l = this._getItemIndex(s),
          f = e || s && this._getItemByDirection(t, s),
          d = this._getItemIndex(f),
          c = Boolean(this._interval);
        if (t === C ? (n = "carousel-item-left", o = "carousel-item-next", r = "left") : (n = "carousel-item-right", o = "carousel-item-prev", r = "right"), f && i["default"](f).hasClass(T)) this._isSliding = !1;else if (!this._triggerSlideEvent(f, r).isDefaultPrevented() && s && f) {
          this._isSliding = !0, c && this.pause(), this._setActiveIndicatorElement(f), this._activeElement = f;
          var h = i["default"].Event(N, {
            relatedTarget: f,
            direction: r,
            from: l,
            to: d
          });
          if (i["default"](this._element).hasClass("slide")) {
            i["default"](f).addClass(o), u.reflow(f), i["default"](s).addClass(n), i["default"](f).addClass(n);
            var p = u.getTransitionDurationFromElement(s);
            i["default"](s).one(u.TRANSITION_END, function () {
              i["default"](f).removeClass(n + " " + o).addClass(T), i["default"](s).removeClass("active " + o + " " + n), a._isSliding = !1, setTimeout(function () {
                return i["default"](a._element).trigger(h);
              }, 0);
            }).emulateTransitionEnd(p);
          } else i["default"](s).removeClass(T), i["default"](f).addClass(T), this._isSliding = !1, i["default"](this._element).trigger(h);
          c && this.cycle();
        }
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this).data(E),
            o = a({}, A, i["default"](this).data());
          "object" == _typeof(e) && (o = a({}, o, e));
          var r = "string" == typeof e ? e : o.slide;
          if (n || (n = new t(this, o), i["default"](this).data(E, n)), "number" == typeof e) n.to(e);else if ("string" == typeof r) {
            if ("undefined" == typeof n[r]) throw new TypeError('No method named "' + r + '"');
            n[r]();
          } else o.interval && o.ride && (n.pause(), n.cycle());
        });
      }, t._dataApiClickHandler = function (e) {
        var n = u.getSelectorFromElement(this);
        if (n) {
          var o = i["default"](n)[0];
          if (o && i["default"](o).hasClass("carousel")) {
            var r = a({}, i["default"](o).data(), i["default"](this).data()),
              s = this.getAttribute("data-slide-to");
            s && (r.interval = !1), t._jQueryInterface.call(i["default"](o), r), s && i["default"](o).data(E).to(s), e.preventDefault();
          }
        }
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return A;
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.carousel.data-api", "[data-slide], [data-slide-to]", O._dataApiClickHandler), i["default"](window).on("load.bs.carousel.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-ride="carousel"]')), e = 0, n = t.length; e < n; e++) {
      var o = i["default"](t[e]);
      O._jQueryInterface.call(o, o.data());
    }
  }), i["default"].fn[y] = O._jQueryInterface, i["default"].fn[y].Constructor = O, i["default"].fn[y].noConflict = function () {
    return i["default"].fn[y] = w, O._jQueryInterface;
  };
  var x = "collapse",
    j = "bs.collapse",
    L = i["default"].fn[x],
    P = "show",
    F = "collapse",
    R = "collapsing",
    B = "collapsed",
    H = "width",
    M = '[data-toggle="collapse"]',
    q = {
      toggle: !0,
      parent: ""
    },
    Q = {
      toggle: "boolean",
      parent: "(string|element)"
    },
    W = function () {
      function t(t, e) {
        this._isTransitioning = !1, this._element = t, this._config = this._getConfig(e), this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));
        for (var n = [].slice.call(document.querySelectorAll(M)), i = 0, o = n.length; i < o; i++) {
          var r = n[i],
            a = u.getSelectorFromElement(r),
            s = [].slice.call(document.querySelectorAll(a)).filter(function (e) {
              return e === t;
            });
          null !== a && s.length > 0 && (this._selector = a, this._triggerArray.push(r));
        }
        this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle();
      }
      var e = t.prototype;
      return e.toggle = function () {
        i["default"](this._element).hasClass(P) ? this.hide() : this.show();
      }, e.show = function () {
        var e,
          n,
          o = this;
        if (!(this._isTransitioning || i["default"](this._element).hasClass(P) || (this._parent && 0 === (e = [].slice.call(this._parent.querySelectorAll(".show, .collapsing")).filter(function (t) {
          return "string" == typeof o._config.parent ? t.getAttribute("data-parent") === o._config.parent : t.classList.contains(F);
        })).length && (e = null), e && (n = i["default"](e).not(this._selector).data(j)) && n._isTransitioning))) {
          var r = i["default"].Event("show.bs.collapse");
          if (i["default"](this._element).trigger(r), !r.isDefaultPrevented()) {
            e && (t._jQueryInterface.call(i["default"](e).not(this._selector), "hide"), n || i["default"](e).data(j, null));
            var a = this._getDimension();
            i["default"](this._element).removeClass(F).addClass(R), this._element.style[a] = 0, this._triggerArray.length && i["default"](this._triggerArray).removeClass(B).attr("aria-expanded", !0), this.setTransitioning(!0);
            var s = "scroll" + (a[0].toUpperCase() + a.slice(1)),
              l = u.getTransitionDurationFromElement(this._element);
            i["default"](this._element).one(u.TRANSITION_END, function () {
              i["default"](o._element).removeClass(R).addClass("collapse show"), o._element.style[a] = "", o.setTransitioning(!1), i["default"](o._element).trigger("shown.bs.collapse");
            }).emulateTransitionEnd(l), this._element.style[a] = this._element[s] + "px";
          }
        }
      }, e.hide = function () {
        var t = this;
        if (!this._isTransitioning && i["default"](this._element).hasClass(P)) {
          var e = i["default"].Event("hide.bs.collapse");
          if (i["default"](this._element).trigger(e), !e.isDefaultPrevented()) {
            var n = this._getDimension();
            this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", u.reflow(this._element), i["default"](this._element).addClass(R).removeClass("collapse show");
            var o = this._triggerArray.length;
            if (o > 0) for (var r = 0; r < o; r++) {
              var a = this._triggerArray[r],
                s = u.getSelectorFromElement(a);
              null !== s && (i["default"]([].slice.call(document.querySelectorAll(s))).hasClass(P) || i["default"](a).addClass(B).attr("aria-expanded", !1));
            }
            this.setTransitioning(!0), this._element.style[n] = "";
            var l = u.getTransitionDurationFromElement(this._element);
            i["default"](this._element).one(u.TRANSITION_END, function () {
              t.setTransitioning(!1), i["default"](t._element).removeClass(R).addClass(F).trigger("hidden.bs.collapse");
            }).emulateTransitionEnd(l);
          }
        }
      }, e.setTransitioning = function (t) {
        this._isTransitioning = t;
      }, e.dispose = function () {
        i["default"].removeData(this._element, j), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null;
      }, e._getConfig = function (t) {
        return (t = a({}, q, t)).toggle = Boolean(t.toggle), u.typeCheckConfig(x, t, Q), t;
      }, e._getDimension = function () {
        return i["default"](this._element).hasClass(H) ? H : "height";
      }, e._getParent = function () {
        var e,
          n = this;
        u.isElement(this._config.parent) ? (e = this._config.parent, "undefined" != typeof this._config.parent.jquery && (e = this._config.parent[0])) : e = document.querySelector(this._config.parent);
        var o = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
          r = [].slice.call(e.querySelectorAll(o));
        return i["default"](r).each(function (e, i) {
          n._addAriaAndCollapsedClass(t._getTargetFromElement(i), [i]);
        }), e;
      }, e._addAriaAndCollapsedClass = function (t, e) {
        var n = i["default"](t).hasClass(P);
        e.length && i["default"](e).toggleClass(B, !n).attr("aria-expanded", n);
      }, t._getTargetFromElement = function (t) {
        var e = u.getSelectorFromElement(t);
        return e ? document.querySelector(e) : null;
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this),
            o = n.data(j),
            r = a({}, q, n.data(), "object" == _typeof(e) && e ? e : {});
          if (!o && r.toggle && "string" == typeof e && /show|hide/.test(e) && (r.toggle = !1), o || (o = new t(this, r), n.data(j, o)), "string" == typeof e) {
            if ("undefined" == typeof o[e]) throw new TypeError('No method named "' + e + '"');
            o[e]();
          }
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return q;
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.collapse.data-api", M, function (t) {
    "A" === t.currentTarget.tagName && t.preventDefault();
    var e = i["default"](this),
      n = u.getSelectorFromElement(this),
      o = [].slice.call(document.querySelectorAll(n));
    i["default"](o).each(function () {
      var t = i["default"](this),
        n = t.data(j) ? "toggle" : e.data();
      W._jQueryInterface.call(t, n);
    });
  }), i["default"].fn[x] = W._jQueryInterface, i["default"].fn[x].Constructor = W, i["default"].fn[x].noConflict = function () {
    return i["default"].fn[x] = L, W._jQueryInterface;
  };
  var U = "undefined" != typeof window && "undefined" != typeof document && "undefined" != typeof navigator,
    V = function () {
      for (var t = ["Edge", "Trident", "Firefox"], e = 0; e < t.length; e += 1) if (U && navigator.userAgent.indexOf(t[e]) >= 0) return 1;
      return 0;
    }(),
    Y = U && window.Promise ? function (t) {
      var e = !1;
      return function () {
        e || (e = !0, window.Promise.resolve().then(function () {
          e = !1, t();
        }));
      };
    } : function (t) {
      var e = !1;
      return function () {
        e || (e = !0, setTimeout(function () {
          e = !1, t();
        }, V));
      };
    };
  function z(t) {
    return t && "[object Function]" === {}.toString.call(t);
  }
  function K(t, e) {
    if (1 !== t.nodeType) return [];
    var n = t.ownerDocument.defaultView.getComputedStyle(t, null);
    return e ? n[e] : n;
  }
  function X(t) {
    return "HTML" === t.nodeName ? t : t.parentNode || t.host;
  }
  function G(t) {
    if (!t) return document.body;
    switch (t.nodeName) {
      case "HTML":
      case "BODY":
        return t.ownerDocument.body;
      case "#document":
        return t.body;
    }
    var e = K(t),
      n = e.overflow,
      i = e.overflowX,
      o = e.overflowY;
    return /(auto|scroll|overlay)/.test(n + o + i) ? t : G(X(t));
  }
  function $(t) {
    return t && t.referenceNode ? t.referenceNode : t;
  }
  var J = U && !(!window.MSInputMethodContext || !document.documentMode),
    Z = U && /MSIE 10/.test(navigator.userAgent);
  function tt(t) {
    return 11 === t ? J : 10 === t ? Z : J || Z;
  }
  function et(t) {
    if (!t) return document.documentElement;
    for (var e = tt(10) ? document.body : null, n = t.offsetParent || null; n === e && t.nextElementSibling;) n = (t = t.nextElementSibling).offsetParent;
    var i = n && n.nodeName;
    return i && "BODY" !== i && "HTML" !== i ? -1 !== ["TH", "TD", "TABLE"].indexOf(n.nodeName) && "static" === K(n, "position") ? et(n) : n : t ? t.ownerDocument.documentElement : document.documentElement;
  }
  function nt(t) {
    return null !== t.parentNode ? nt(t.parentNode) : t;
  }
  function it(t, e) {
    if (!(t && t.nodeType && e && e.nodeType)) return document.documentElement;
    var n = t.compareDocumentPosition(e) & Node.DOCUMENT_POSITION_FOLLOWING,
      i = n ? t : e,
      o = n ? e : t,
      r = document.createRange();
    r.setStart(i, 0), r.setEnd(o, 0);
    var a,
      s,
      l = r.commonAncestorContainer;
    if (t !== l && e !== l || i.contains(o)) return "BODY" === (s = (a = l).nodeName) || "HTML" !== s && et(a.firstElementChild) !== a ? et(l) : l;
    var u = nt(t);
    return u.host ? it(u.host, e) : it(t, nt(e).host);
  }
  function ot(t) {
    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "top",
      n = "top" === e ? "scrollTop" : "scrollLeft",
      i = t.nodeName;
    if ("BODY" === i || "HTML" === i) {
      var o = t.ownerDocument.documentElement,
        r = t.ownerDocument.scrollingElement || o;
      return r[n];
    }
    return t[n];
  }
  function rt(t, e) {
    var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
      i = ot(e, "top"),
      o = ot(e, "left"),
      r = n ? -1 : 1;
    return t.top += i * r, t.bottom += i * r, t.left += o * r, t.right += o * r, t;
  }
  function at(t, e) {
    var n = "x" === e ? "Left" : "Top",
      i = "Left" === n ? "Right" : "Bottom";
    return parseFloat(t["border" + n + "Width"]) + parseFloat(t["border" + i + "Width"]);
  }
  function st(t, e, n, i) {
    return Math.max(e["offset" + t], e["scroll" + t], n["client" + t], n["offset" + t], n["scroll" + t], tt(10) ? parseInt(n["offset" + t]) + parseInt(i["margin" + ("Height" === t ? "Top" : "Left")]) + parseInt(i["margin" + ("Height" === t ? "Bottom" : "Right")]) : 0);
  }
  function lt(t) {
    var e = t.body,
      n = t.documentElement,
      i = tt(10) && getComputedStyle(n);
    return {
      height: st("Height", e, n, i),
      width: st("Width", e, n, i)
    };
  }
  var ut = function ut(t, e) {
      if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
    },
    ft = function () {
      function t(t, e) {
        for (var n = 0; n < e.length; n++) {
          var i = e[n];
          i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
        }
      }
      return function (e, n, i) {
        return n && t(e.prototype, n), i && t(e, i), e;
      };
    }(),
    dt = function dt(t, e, n) {
      return e in t ? Object.defineProperty(t, e, {
        value: n,
        enumerable: !0,
        configurable: !0,
        writable: !0
      }) : t[e] = n, t;
    },
    ct = Object.assign || function (t) {
      for (var e = 1; e < arguments.length; e++) {
        var n = arguments[e];
        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
      }
      return t;
    };
  function ht(t) {
    return ct({}, t, {
      right: t.left + t.width,
      bottom: t.top + t.height
    });
  }
  function pt(t) {
    var e = {};
    try {
      if (tt(10)) {
        e = t.getBoundingClientRect();
        var n = ot(t, "top"),
          i = ot(t, "left");
        e.top += n, e.left += i, e.bottom += n, e.right += i;
      } else e = t.getBoundingClientRect();
    } catch (t) {}
    var o = {
        left: e.left,
        top: e.top,
        width: e.right - e.left,
        height: e.bottom - e.top
      },
      r = "HTML" === t.nodeName ? lt(t.ownerDocument) : {},
      a = r.width || t.clientWidth || o.width,
      s = r.height || t.clientHeight || o.height,
      l = t.offsetWidth - a,
      u = t.offsetHeight - s;
    if (l || u) {
      var f = K(t);
      l -= at(f, "x"), u -= at(f, "y"), o.width -= l, o.height -= u;
    }
    return ht(o);
  }
  function mt(t, e) {
    var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
      i = tt(10),
      o = "HTML" === e.nodeName,
      r = pt(t),
      a = pt(e),
      s = G(t),
      l = K(e),
      u = parseFloat(l.borderTopWidth),
      f = parseFloat(l.borderLeftWidth);
    n && o && (a.top = Math.max(a.top, 0), a.left = Math.max(a.left, 0));
    var d = ht({
      top: r.top - a.top - u,
      left: r.left - a.left - f,
      width: r.width,
      height: r.height
    });
    if (d.marginTop = 0, d.marginLeft = 0, !i && o) {
      var c = parseFloat(l.marginTop),
        h = parseFloat(l.marginLeft);
      d.top -= u - c, d.bottom -= u - c, d.left -= f - h, d.right -= f - h, d.marginTop = c, d.marginLeft = h;
    }
    return (i && !n ? e.contains(s) : e === s && "BODY" !== s.nodeName) && (d = rt(d, e)), d;
  }
  function gt(t) {
    var e = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
      n = t.ownerDocument.documentElement,
      i = mt(t, n),
      o = Math.max(n.clientWidth, window.innerWidth || 0),
      r = Math.max(n.clientHeight, window.innerHeight || 0),
      a = e ? 0 : ot(n),
      s = e ? 0 : ot(n, "left"),
      l = {
        top: a - i.top + i.marginTop,
        left: s - i.left + i.marginLeft,
        width: o,
        height: r
      };
    return ht(l);
  }
  function _t(t) {
    var e = t.nodeName;
    if ("BODY" === e || "HTML" === e) return !1;
    if ("fixed" === K(t, "position")) return !0;
    var n = X(t);
    return !!n && _t(n);
  }
  function vt(t) {
    if (!t || !t.parentElement || tt()) return document.documentElement;
    for (var e = t.parentElement; e && "none" === K(e, "transform");) e = e.parentElement;
    return e || document.documentElement;
  }
  function bt(t, e, n, i) {
    var o = arguments.length > 4 && void 0 !== arguments[4] && arguments[4],
      r = {
        top: 0,
        left: 0
      },
      a = o ? vt(t) : it(t, $(e));
    if ("viewport" === i) r = gt(a, o);else {
      var s = void 0;
      "scrollParent" === i ? "BODY" === (s = G(X(e))).nodeName && (s = t.ownerDocument.documentElement) : s = "window" === i ? t.ownerDocument.documentElement : i;
      var l = mt(s, a, o);
      if ("HTML" !== s.nodeName || _t(a)) r = l;else {
        var u = lt(t.ownerDocument),
          f = u.height,
          d = u.width;
        r.top += l.top - l.marginTop, r.bottom = f + l.top, r.left += l.left - l.marginLeft, r.right = d + l.left;
      }
    }
    var c = "number" == typeof (n = n || 0);
    return r.left += c ? n : n.left || 0, r.top += c ? n : n.top || 0, r.right -= c ? n : n.right || 0, r.bottom -= c ? n : n.bottom || 0, r;
  }
  function yt(t) {
    return t.width * t.height;
  }
  function Et(t, e, n, i, o) {
    var r = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : 0;
    if (-1 === t.indexOf("auto")) return t;
    var a = bt(n, i, r, o),
      s = {
        top: {
          width: a.width,
          height: e.top - a.top
        },
        right: {
          width: a.right - e.right,
          height: a.height
        },
        bottom: {
          width: a.width,
          height: a.bottom - e.bottom
        },
        left: {
          width: e.left - a.left,
          height: a.height
        }
      },
      l = Object.keys(s).map(function (t) {
        return ct({
          key: t
        }, s[t], {
          area: yt(s[t])
        });
      }).sort(function (t, e) {
        return e.area - t.area;
      }),
      u = l.filter(function (t) {
        var e = t.width,
          i = t.height;
        return e >= n.clientWidth && i >= n.clientHeight;
      }),
      f = u.length > 0 ? u[0].key : l[0].key,
      d = t.split("-")[1];
    return f + (d ? "-" + d : "");
  }
  function wt(t, e, n) {
    var i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null,
      o = i ? vt(e) : it(e, $(n));
    return mt(n, o, i);
  }
  function Tt(t) {
    var e = t.ownerDocument.defaultView.getComputedStyle(t),
      n = parseFloat(e.marginTop || 0) + parseFloat(e.marginBottom || 0),
      i = parseFloat(e.marginLeft || 0) + parseFloat(e.marginRight || 0);
    return {
      width: t.offsetWidth + i,
      height: t.offsetHeight + n
    };
  }
  function Ct(t) {
    var e = {
      left: "right",
      right: "left",
      bottom: "top",
      top: "bottom"
    };
    return t.replace(/left|right|bottom|top/g, function (t) {
      return e[t];
    });
  }
  function St(t, e, n) {
    n = n.split("-")[0];
    var i = Tt(t),
      o = {
        width: i.width,
        height: i.height
      },
      r = -1 !== ["right", "left"].indexOf(n),
      a = r ? "top" : "left",
      s = r ? "left" : "top",
      l = r ? "height" : "width",
      u = r ? "width" : "height";
    return o[a] = e[a] + e[l] / 2 - i[l] / 2, o[s] = n === s ? e[s] - i[u] : e[Ct(s)], o;
  }
  function Nt(t, e) {
    return Array.prototype.find ? t.find(e) : t.filter(e)[0];
  }
  function Dt(t, e, n) {
    return (void 0 === n ? t : t.slice(0, function (t, e, n) {
      if (Array.prototype.findIndex) return t.findIndex(function (t) {
        return t.name === n;
      });
      var i = Nt(t, function (t) {
        return t.name === n;
      });
      return t.indexOf(i);
    }(t, 0, n))).forEach(function (t) {
      t["function"] && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
      var n = t["function"] || t.fn;
      t.enabled && z(n) && (e.offsets.popper = ht(e.offsets.popper), e.offsets.reference = ht(e.offsets.reference), e = n(e, t));
    }), e;
  }
  function At() {
    if (!this.state.isDestroyed) {
      var t = {
        instance: this,
        styles: {},
        arrowStyles: {},
        attributes: {},
        flipped: !1,
        offsets: {}
      };
      t.offsets.reference = wt(this.state, this.popper, this.reference, this.options.positionFixed), t.placement = Et(this.options.placement, t.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), t.originalPlacement = t.placement, t.positionFixed = this.options.positionFixed, t.offsets.popper = St(this.popper, t.offsets.reference, t.placement), t.offsets.popper.position = this.options.positionFixed ? "fixed" : "absolute", t = Dt(this.modifiers, t), this.state.isCreated ? this.options.onUpdate(t) : (this.state.isCreated = !0, this.options.onCreate(t));
    }
  }
  function kt(t, e) {
    return t.some(function (t) {
      var n = t.name;
      return t.enabled && n === e;
    });
  }
  function It(t) {
    for (var e = [!1, "ms", "Webkit", "Moz", "O"], n = t.charAt(0).toUpperCase() + t.slice(1), i = 0; i < e.length; i++) {
      var o = e[i],
        r = o ? "" + o + n : t;
      if ("undefined" != typeof document.body.style[r]) return r;
    }
    return null;
  }
  function Ot() {
    return this.state.isDestroyed = !0, kt(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.position = "", this.popper.style.top = "", this.popper.style.left = "", this.popper.style.right = "", this.popper.style.bottom = "", this.popper.style.willChange = "", this.popper.style[It("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this;
  }
  function xt(t) {
    var e = t.ownerDocument;
    return e ? e.defaultView : window;
  }
  function jt(t, e, n, i) {
    var o = "BODY" === t.nodeName,
      r = o ? t.ownerDocument.defaultView : t;
    r.addEventListener(e, n, {
      passive: !0
    }), o || jt(G(r.parentNode), e, n, i), i.push(r);
  }
  function Lt(t, e, n, i) {
    n.updateBound = i, xt(t).addEventListener("resize", n.updateBound, {
      passive: !0
    });
    var o = G(t);
    return jt(o, "scroll", n.updateBound, n.scrollParents), n.scrollElement = o, n.eventsEnabled = !0, n;
  }
  function Pt() {
    this.state.eventsEnabled || (this.state = Lt(this.reference, this.options, this.state, this.scheduleUpdate));
  }
  function Ft() {
    var t, e;
    this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = (t = this.reference, e = this.state, xt(t).removeEventListener("resize", e.updateBound), e.scrollParents.forEach(function (t) {
      t.removeEventListener("scroll", e.updateBound);
    }), e.updateBound = null, e.scrollParents = [], e.scrollElement = null, e.eventsEnabled = !1, e));
  }
  function Rt(t) {
    return "" !== t && !isNaN(parseFloat(t)) && isFinite(t);
  }
  function Bt(t, e) {
    Object.keys(e).forEach(function (n) {
      var i = "";
      -1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(n) && Rt(e[n]) && (i = "px"), t.style[n] = e[n] + i;
    });
  }
  var Ht = U && /Firefox/i.test(navigator.userAgent);
  function Mt(t, e, n) {
    var i = Nt(t, function (t) {
        return t.name === e;
      }),
      o = !!i && t.some(function (t) {
        return t.name === n && t.enabled && t.order < i.order;
      });
    if (!o) {
      var r = "`" + e + "`",
        a = "`" + n + "`";
      console.warn(a + " modifier is required by " + r + " modifier in order to work, be sure to include it before " + r + "!");
    }
    return o;
  }
  var qt = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
    Qt = qt.slice(3);
  function Wt(t) {
    var e = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
      n = Qt.indexOf(t),
      i = Qt.slice(n + 1).concat(Qt.slice(0, n));
    return e ? i.reverse() : i;
  }
  var Ut = {
      placement: "bottom",
      positionFixed: !1,
      eventsEnabled: !0,
      removeOnDestroy: !1,
      onCreate: function onCreate() {},
      onUpdate: function onUpdate() {},
      modifiers: {
        shift: {
          order: 100,
          enabled: !0,
          fn: function fn(t) {
            var e = t.placement,
              n = e.split("-")[0],
              i = e.split("-")[1];
            if (i) {
              var o = t.offsets,
                r = o.reference,
                a = o.popper,
                s = -1 !== ["bottom", "top"].indexOf(n),
                l = s ? "left" : "top",
                u = s ? "width" : "height",
                f = {
                  start: dt({}, l, r[l]),
                  end: dt({}, l, r[l] + r[u] - a[u])
                };
              t.offsets.popper = ct({}, a, f[i]);
            }
            return t;
          }
        },
        offset: {
          order: 200,
          enabled: !0,
          fn: function fn(t, e) {
            var n,
              i = e.offset,
              o = t.placement,
              r = t.offsets,
              a = r.popper,
              s = r.reference,
              l = o.split("-")[0];
            return n = Rt(+i) ? [+i, 0] : function (t, e, n, i) {
              var o = [0, 0],
                r = -1 !== ["right", "left"].indexOf(i),
                a = t.split(/(\+|\-)/).map(function (t) {
                  return t.trim();
                }),
                s = a.indexOf(Nt(a, function (t) {
                  return -1 !== t.search(/,|\s/);
                }));
              a[s] && -1 === a[s].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
              var l = /\s*,\s*|\s+/,
                u = -1 !== s ? [a.slice(0, s).concat([a[s].split(l)[0]]), [a[s].split(l)[1]].concat(a.slice(s + 1))] : [a];
              return u = u.map(function (t, i) {
                var o = (1 === i ? !r : r) ? "height" : "width",
                  a = !1;
                return t.reduce(function (t, e) {
                  return "" === t[t.length - 1] && -1 !== ["+", "-"].indexOf(e) ? (t[t.length - 1] = e, a = !0, t) : a ? (t[t.length - 1] += e, a = !1, t) : t.concat(e);
                }, []).map(function (t) {
                  return function (t, e, n, i) {
                    var o = t.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                      r = +o[1],
                      a = o[2];
                    return r ? 0 === a.indexOf("%") ? ht("%p" === a ? n : i)[e] / 100 * r : "vh" === a || "vw" === a ? ("vh" === a ? Math.max(document.documentElement.clientHeight, window.innerHeight || 0) : Math.max(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * r : r : t;
                  }(t, o, e, n);
                });
              }), u.forEach(function (t, e) {
                t.forEach(function (n, i) {
                  Rt(n) && (o[e] += n * ("-" === t[i - 1] ? -1 : 1));
                });
              }), o;
            }(i, a, s, l), "left" === l ? (a.top += n[0], a.left -= n[1]) : "right" === l ? (a.top += n[0], a.left += n[1]) : "top" === l ? (a.left += n[0], a.top -= n[1]) : "bottom" === l && (a.left += n[0], a.top += n[1]), t.popper = a, t;
          },
          offset: 0
        },
        preventOverflow: {
          order: 300,
          enabled: !0,
          fn: function fn(t, e) {
            var n = e.boundariesElement || et(t.instance.popper);
            t.instance.reference === n && (n = et(n));
            var i = It("transform"),
              o = t.instance.popper.style,
              r = o.top,
              a = o.left,
              s = o[i];
            o.top = "", o.left = "", o[i] = "";
            var l = bt(t.instance.popper, t.instance.reference, e.padding, n, t.positionFixed);
            o.top = r, o.left = a, o[i] = s, e.boundaries = l;
            var u = e.priority,
              f = t.offsets.popper,
              d = {
                primary: function primary(t) {
                  var n = f[t];
                  return f[t] < l[t] && !e.escapeWithReference && (n = Math.max(f[t], l[t])), dt({}, t, n);
                },
                secondary: function secondary(t) {
                  var n = "right" === t ? "left" : "top",
                    i = f[n];
                  return f[t] > l[t] && !e.escapeWithReference && (i = Math.min(f[n], l[t] - ("right" === t ? f.width : f.height))), dt({}, n, i);
                }
              };
            return u.forEach(function (t) {
              var e = -1 !== ["left", "top"].indexOf(t) ? "primary" : "secondary";
              f = ct({}, f, d[e](t));
            }), t.offsets.popper = f, t;
          },
          priority: ["left", "right", "top", "bottom"],
          padding: 5,
          boundariesElement: "scrollParent"
        },
        keepTogether: {
          order: 400,
          enabled: !0,
          fn: function fn(t) {
            var e = t.offsets,
              n = e.popper,
              i = e.reference,
              o = t.placement.split("-")[0],
              r = Math.floor,
              a = -1 !== ["top", "bottom"].indexOf(o),
              s = a ? "right" : "bottom",
              l = a ? "left" : "top",
              u = a ? "width" : "height";
            return n[s] < r(i[l]) && (t.offsets.popper[l] = r(i[l]) - n[u]), n[l] > r(i[s]) && (t.offsets.popper[l] = r(i[s])), t;
          }
        },
        arrow: {
          order: 500,
          enabled: !0,
          fn: function fn(t, e) {
            var n;
            if (!Mt(t.instance.modifiers, "arrow", "keepTogether")) return t;
            var i = e.element;
            if ("string" == typeof i) {
              if (!(i = t.instance.popper.querySelector(i))) return t;
            } else if (!t.instance.popper.contains(i)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), t;
            var o = t.placement.split("-")[0],
              r = t.offsets,
              a = r.popper,
              s = r.reference,
              l = -1 !== ["left", "right"].indexOf(o),
              u = l ? "height" : "width",
              f = l ? "Top" : "Left",
              d = f.toLowerCase(),
              c = l ? "left" : "top",
              h = l ? "bottom" : "right",
              p = Tt(i)[u];
            s[h] - p < a[d] && (t.offsets.popper[d] -= a[d] - (s[h] - p)), s[d] + p > a[h] && (t.offsets.popper[d] += s[d] + p - a[h]), t.offsets.popper = ht(t.offsets.popper);
            var m = s[d] + s[u] / 2 - p / 2,
              g = K(t.instance.popper),
              _ = parseFloat(g["margin" + f]),
              v = parseFloat(g["border" + f + "Width"]),
              b = m - t.offsets.popper[d] - _ - v;
            return b = Math.max(Math.min(a[u] - p, b), 0), t.arrowElement = i, t.offsets.arrow = (dt(n = {}, d, Math.round(b)), dt(n, c, ""), n), t;
          },
          element: "[x-arrow]"
        },
        flip: {
          order: 600,
          enabled: !0,
          fn: function fn(t, e) {
            if (kt(t.instance.modifiers, "inner")) return t;
            if (t.flipped && t.placement === t.originalPlacement) return t;
            var n = bt(t.instance.popper, t.instance.reference, e.padding, e.boundariesElement, t.positionFixed),
              i = t.placement.split("-")[0],
              o = Ct(i),
              r = t.placement.split("-")[1] || "",
              a = [];
            switch (e.behavior) {
              case "flip":
                a = [i, o];
                break;
              case "clockwise":
                a = Wt(i);
                break;
              case "counterclockwise":
                a = Wt(i, !0);
                break;
              default:
                a = e.behavior;
            }
            return a.forEach(function (s, l) {
              if (i !== s || a.length === l + 1) return t;
              i = t.placement.split("-")[0], o = Ct(i);
              var u = t.offsets.popper,
                f = t.offsets.reference,
                d = Math.floor,
                c = "left" === i && d(u.right) > d(f.left) || "right" === i && d(u.left) < d(f.right) || "top" === i && d(u.bottom) > d(f.top) || "bottom" === i && d(u.top) < d(f.bottom),
                h = d(u.left) < d(n.left),
                p = d(u.right) > d(n.right),
                m = d(u.top) < d(n.top),
                g = d(u.bottom) > d(n.bottom),
                _ = "left" === i && h || "right" === i && p || "top" === i && m || "bottom" === i && g,
                v = -1 !== ["top", "bottom"].indexOf(i),
                b = !!e.flipVariations && (v && "start" === r && h || v && "end" === r && p || !v && "start" === r && m || !v && "end" === r && g),
                y = !!e.flipVariationsByContent && (v && "start" === r && p || v && "end" === r && h || !v && "start" === r && g || !v && "end" === r && m),
                E = b || y;
              (c || _ || E) && (t.flipped = !0, (c || _) && (i = a[l + 1]), E && (r = function (t) {
                return "end" === t ? "start" : "start" === t ? "end" : t;
              }(r)), t.placement = i + (r ? "-" + r : ""), t.offsets.popper = ct({}, t.offsets.popper, St(t.instance.popper, t.offsets.reference, t.placement)), t = Dt(t.instance.modifiers, t, "flip"));
            }), t;
          },
          behavior: "flip",
          padding: 5,
          boundariesElement: "viewport",
          flipVariations: !1,
          flipVariationsByContent: !1
        },
        inner: {
          order: 700,
          enabled: !1,
          fn: function fn(t) {
            var e = t.placement,
              n = e.split("-")[0],
              i = t.offsets,
              o = i.popper,
              r = i.reference,
              a = -1 !== ["left", "right"].indexOf(n),
              s = -1 === ["top", "left"].indexOf(n);
            return o[a ? "left" : "top"] = r[n] - (s ? o[a ? "width" : "height"] : 0), t.placement = Ct(e), t.offsets.popper = ht(o), t;
          }
        },
        hide: {
          order: 800,
          enabled: !0,
          fn: function fn(t) {
            if (!Mt(t.instance.modifiers, "hide", "preventOverflow")) return t;
            var e = t.offsets.reference,
              n = Nt(t.instance.modifiers, function (t) {
                return "preventOverflow" === t.name;
              }).boundaries;
            if (e.bottom < n.top || e.left > n.right || e.top > n.bottom || e.right < n.left) {
              if (!0 === t.hide) return t;
              t.hide = !0, t.attributes["x-out-of-boundaries"] = "";
            } else {
              if (!1 === t.hide) return t;
              t.hide = !1, t.attributes["x-out-of-boundaries"] = !1;
            }
            return t;
          }
        },
        computeStyle: {
          order: 850,
          enabled: !0,
          fn: function fn(t, e) {
            var n = e.x,
              i = e.y,
              o = t.offsets.popper,
              r = Nt(t.instance.modifiers, function (t) {
                return "applyStyle" === t.name;
              }).gpuAcceleration;
            void 0 !== r && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
            var a,
              s,
              l = void 0 !== r ? r : e.gpuAcceleration,
              u = et(t.instance.popper),
              f = pt(u),
              d = {
                position: o.position
              },
              c = function (t, e) {
                var n = t.offsets,
                  i = n.popper,
                  o = n.reference,
                  r = Math.round,
                  a = Math.floor,
                  s = function s(t) {
                    return t;
                  },
                  l = r(o.width),
                  u = r(i.width),
                  f = -1 !== ["left", "right"].indexOf(t.placement),
                  d = -1 !== t.placement.indexOf("-"),
                  c = e ? f || d || l % 2 == u % 2 ? r : a : s,
                  h = e ? r : s;
                return {
                  left: c(l % 2 == 1 && u % 2 == 1 && !d && e ? i.left - 1 : i.left),
                  top: h(i.top),
                  bottom: h(i.bottom),
                  right: c(i.right)
                };
              }(t, window.devicePixelRatio < 2 || !Ht),
              h = "bottom" === n ? "top" : "bottom",
              p = "right" === i ? "left" : "right",
              m = It("transform");
            if (s = "bottom" === h ? "HTML" === u.nodeName ? -u.clientHeight + c.bottom : -f.height + c.bottom : c.top, a = "right" === p ? "HTML" === u.nodeName ? -u.clientWidth + c.right : -f.width + c.right : c.left, l && m) d[m] = "translate3d(" + a + "px, " + s + "px, 0)", d[h] = 0, d[p] = 0, d.willChange = "transform";else {
              var g = "bottom" === h ? -1 : 1,
                _ = "right" === p ? -1 : 1;
              d[h] = s * g, d[p] = a * _, d.willChange = h + ", " + p;
            }
            var v = {
              "x-placement": t.placement
            };
            return t.attributes = ct({}, v, t.attributes), t.styles = ct({}, d, t.styles), t.arrowStyles = ct({}, t.offsets.arrow, t.arrowStyles), t;
          },
          gpuAcceleration: !0,
          x: "bottom",
          y: "right"
        },
        applyStyle: {
          order: 900,
          enabled: !0,
          fn: function fn(t) {
            var e, n;
            return Bt(t.instance.popper, t.styles), e = t.instance.popper, n = t.attributes, Object.keys(n).forEach(function (t) {
              !1 !== n[t] ? e.setAttribute(t, n[t]) : e.removeAttribute(t);
            }), t.arrowElement && Object.keys(t.arrowStyles).length && Bt(t.arrowElement, t.arrowStyles), t;
          },
          onLoad: function onLoad(t, e, n, i, o) {
            var r = wt(o, e, t, n.positionFixed),
              a = Et(n.placement, r, e, t, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
            return e.setAttribute("x-placement", a), Bt(e, {
              position: n.positionFixed ? "fixed" : "absolute"
            }), n;
          },
          gpuAcceleration: void 0
        }
      }
    },
    Vt = function () {
      function t(e, n) {
        var i = this,
          o = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
        ut(this, t), this.scheduleUpdate = function () {
          return requestAnimationFrame(i.update);
        }, this.update = Y(this.update.bind(this)), this.options = ct({}, t.Defaults, o), this.state = {
          isDestroyed: !1,
          isCreated: !1,
          scrollParents: []
        }, this.reference = e && e.jquery ? e[0] : e, this.popper = n && n.jquery ? n[0] : n, this.options.modifiers = {}, Object.keys(ct({}, t.Defaults.modifiers, o.modifiers)).forEach(function (e) {
          i.options.modifiers[e] = ct({}, t.Defaults.modifiers[e] || {}, o.modifiers ? o.modifiers[e] : {});
        }), this.modifiers = Object.keys(this.options.modifiers).map(function (t) {
          return ct({
            name: t
          }, i.options.modifiers[t]);
        }).sort(function (t, e) {
          return t.order - e.order;
        }), this.modifiers.forEach(function (t) {
          t.enabled && z(t.onLoad) && t.onLoad(i.reference, i.popper, i.options, t, i.state);
        }), this.update();
        var r = this.options.eventsEnabled;
        r && this.enableEventListeners(), this.state.eventsEnabled = r;
      }
      return ft(t, [{
        key: "update",
        value: function value() {
          return At.call(this);
        }
      }, {
        key: "destroy",
        value: function value() {
          return Ot.call(this);
        }
      }, {
        key: "enableEventListeners",
        value: function value() {
          return Pt.call(this);
        }
      }, {
        key: "disableEventListeners",
        value: function value() {
          return Ft.call(this);
        }
      }]), t;
    }();
  Vt.Utils = ("undefined" != typeof window ? window : global).PopperUtils, Vt.placements = qt, Vt.Defaults = Ut;
  var Yt = Vt,
    zt = "dropdown",
    Kt = "bs.dropdown",
    Xt = i["default"].fn[zt],
    Gt = new RegExp("38|40|27"),
    $t = "disabled",
    Jt = "show",
    Zt = "dropdown-menu-right",
    te = "hide.bs.dropdown",
    ee = "hidden.bs.dropdown",
    ne = "click.bs.dropdown.data-api",
    ie = "keydown.bs.dropdown.data-api",
    oe = '[data-toggle="dropdown"]',
    re = ".dropdown-menu",
    ae = {
      offset: 0,
      flip: !0,
      boundary: "scrollParent",
      reference: "toggle",
      display: "dynamic",
      popperConfig: null
    },
    se = {
      offset: "(number|string|function)",
      flip: "boolean",
      boundary: "(string|element)",
      reference: "(string|element)",
      display: "string",
      popperConfig: "(null|object)"
    },
    le = function () {
      function t(t, e) {
        this._element = t, this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners();
      }
      var e = t.prototype;
      return e.toggle = function () {
        if (!this._element.disabled && !i["default"](this._element).hasClass($t)) {
          var e = i["default"](this._menu).hasClass(Jt);
          t._clearMenus(), e || this.show(!0);
        }
      }, e.show = function (e) {
        if (void 0 === e && (e = !1), !(this._element.disabled || i["default"](this._element).hasClass($t) || i["default"](this._menu).hasClass(Jt))) {
          var n = {
              relatedTarget: this._element
            },
            o = i["default"].Event("show.bs.dropdown", n),
            r = t._getParentFromElement(this._element);
          if (i["default"](r).trigger(o), !o.isDefaultPrevented()) {
            if (!this._inNavbar && e) {
              if ("undefined" == typeof Yt) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
              var a = this._element;
              "parent" === this._config.reference ? a = r : u.isElement(this._config.reference) && (a = this._config.reference, "undefined" != typeof this._config.reference.jquery && (a = this._config.reference[0])), "scrollParent" !== this._config.boundary && i["default"](r).addClass("position-static"), this._popper = new Yt(a, this._menu, this._getPopperConfig());
            }
            "ontouchstart" in document.documentElement && 0 === i["default"](r).closest(".navbar-nav").length && i["default"](document.body).children().on("mouseover", null, i["default"].noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), i["default"](this._menu).toggleClass(Jt), i["default"](r).toggleClass(Jt).trigger(i["default"].Event("shown.bs.dropdown", n));
          }
        }
      }, e.hide = function () {
        if (!this._element.disabled && !i["default"](this._element).hasClass($t) && i["default"](this._menu).hasClass(Jt)) {
          var e = {
              relatedTarget: this._element
            },
            n = i["default"].Event(te, e),
            o = t._getParentFromElement(this._element);
          i["default"](o).trigger(n), n.isDefaultPrevented() || (this._popper && this._popper.destroy(), i["default"](this._menu).toggleClass(Jt), i["default"](o).toggleClass(Jt).trigger(i["default"].Event(ee, e)));
        }
      }, e.dispose = function () {
        i["default"].removeData(this._element, Kt), i["default"](this._element).off(".bs.dropdown"), this._element = null, this._menu = null, null !== this._popper && (this._popper.destroy(), this._popper = null);
      }, e.update = function () {
        this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate();
      }, e._addEventListeners = function () {
        var t = this;
        i["default"](this._element).on("click.bs.dropdown", function (e) {
          e.preventDefault(), e.stopPropagation(), t.toggle();
        });
      }, e._getConfig = function (t) {
        return t = a({}, this.constructor.Default, i["default"](this._element).data(), t), u.typeCheckConfig(zt, t, this.constructor.DefaultType), t;
      }, e._getMenuElement = function () {
        if (!this._menu) {
          var e = t._getParentFromElement(this._element);
          e && (this._menu = e.querySelector(re));
        }
        return this._menu;
      }, e._getPlacement = function () {
        var t = i["default"](this._element.parentNode),
          e = "bottom-start";
        return t.hasClass("dropup") ? e = i["default"](this._menu).hasClass(Zt) ? "top-end" : "top-start" : t.hasClass("dropright") ? e = "right-start" : t.hasClass("dropleft") ? e = "left-start" : i["default"](this._menu).hasClass(Zt) && (e = "bottom-end"), e;
      }, e._detectNavbar = function () {
        return i["default"](this._element).closest(".navbar").length > 0;
      }, e._getOffset = function () {
        var t = this,
          e = {};
        return "function" == typeof this._config.offset ? e.fn = function (e) {
          return e.offsets = a({}, e.offsets, t._config.offset(e.offsets, t._element)), e;
        } : e.offset = this._config.offset, e;
      }, e._getPopperConfig = function () {
        var t = {
          placement: this._getPlacement(),
          modifiers: {
            offset: this._getOffset(),
            flip: {
              enabled: this._config.flip
            },
            preventOverflow: {
              boundariesElement: this._config.boundary
            }
          }
        };
        return "static" === this._config.display && (t.modifiers.applyStyle = {
          enabled: !1
        }), a({}, t, this._config.popperConfig);
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this).data(Kt);
          if (n || (n = new t(this, "object" == _typeof(e) ? e : null), i["default"](this).data(Kt, n)), "string" == typeof e) {
            if ("undefined" == typeof n[e]) throw new TypeError('No method named "' + e + '"');
            n[e]();
          }
        });
      }, t._clearMenus = function (e) {
        if (!e || 3 !== e.which && ("keyup" !== e.type || 9 === e.which)) for (var n = [].slice.call(document.querySelectorAll(oe)), o = 0, r = n.length; o < r; o++) {
          var a = t._getParentFromElement(n[o]),
            s = i["default"](n[o]).data(Kt),
            l = {
              relatedTarget: n[o]
            };
          if (e && "click" === e.type && (l.clickEvent = e), s) {
            var u = s._menu;
            if (i["default"](a).hasClass(Jt) && !(e && ("click" === e.type && /input|textarea/i.test(e.target.tagName) || "keyup" === e.type && 9 === e.which) && i["default"].contains(a, e.target))) {
              var f = i["default"].Event(te, l);
              i["default"](a).trigger(f), f.isDefaultPrevented() || ("ontouchstart" in document.documentElement && i["default"](document.body).children().off("mouseover", null, i["default"].noop), n[o].setAttribute("aria-expanded", "false"), s._popper && s._popper.destroy(), i["default"](u).removeClass(Jt), i["default"](a).removeClass(Jt).trigger(i["default"].Event(ee, l)));
            }
          }
        }
      }, t._getParentFromElement = function (t) {
        var e,
          n = u.getSelectorFromElement(t);
        return n && (e = document.querySelector(n)), e || t.parentNode;
      }, t._dataApiKeydownHandler = function (e) {
        if (!(/input|textarea/i.test(e.target.tagName) ? 32 === e.which || 27 !== e.which && (40 !== e.which && 38 !== e.which || i["default"](e.target).closest(re).length) : !Gt.test(e.which)) && !this.disabled && !i["default"](this).hasClass($t)) {
          var n = t._getParentFromElement(this),
            o = i["default"](n).hasClass(Jt);
          if (o || 27 !== e.which) {
            if (e.preventDefault(), e.stopPropagation(), !o || 27 === e.which || 32 === e.which) return 27 === e.which && i["default"](n.querySelector(oe)).trigger("focus"), void i["default"](this).trigger("click");
            var r = [].slice.call(n.querySelectorAll(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)")).filter(function (t) {
              return i["default"](t).is(":visible");
            });
            if (0 !== r.length) {
              var a = r.indexOf(e.target);
              38 === e.which && a > 0 && a--, 40 === e.which && a < r.length - 1 && a++, a < 0 && (a = 0), r[a].focus();
            }
          }
        }
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return ae;
        }
      }, {
        key: "DefaultType",
        get: function get() {
          return se;
        }
      }]), t;
    }();
  i["default"](document).on(ie, oe, le._dataApiKeydownHandler).on(ie, re, le._dataApiKeydownHandler).on(ne + " keyup.bs.dropdown.data-api", le._clearMenus).on(ne, oe, function (t) {
    t.preventDefault(), t.stopPropagation(), le._jQueryInterface.call(i["default"](this), "toggle");
  }).on(ne, ".dropdown form", function (t) {
    t.stopPropagation();
  }), i["default"].fn[zt] = le._jQueryInterface, i["default"].fn[zt].Constructor = le, i["default"].fn[zt].noConflict = function () {
    return i["default"].fn[zt] = Xt, le._jQueryInterface;
  };
  var ue = "bs.modal",
    fe = i["default"].fn.modal,
    de = "modal-open",
    ce = "fade",
    he = "show",
    pe = "modal-static",
    me = "hidden.bs.modal",
    ge = "show.bs.modal",
    _e = "focusin.bs.modal",
    ve = "resize.bs.modal",
    be = "click.dismiss.bs.modal",
    ye = "keydown.dismiss.bs.modal",
    Ee = "mousedown.dismiss.bs.modal",
    we = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
    Te = {
      backdrop: !0,
      keyboard: !0,
      focus: !0,
      show: !0
    },
    Ce = {
      backdrop: "(boolean|string)",
      keyboard: "boolean",
      focus: "boolean",
      show: "boolean"
    },
    Se = function () {
      function t(t, e) {
        this._config = this._getConfig(e), this._element = t, this._dialog = t.querySelector(".modal-dialog"), this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollbarWidth = 0;
      }
      var e = t.prototype;
      return e.toggle = function (t) {
        return this._isShown ? this.hide() : this.show(t);
      }, e.show = function (t) {
        var e = this;
        if (!this._isShown && !this._isTransitioning) {
          var n = i["default"].Event(ge, {
            relatedTarget: t
          });
          i["default"](this._element).trigger(n), n.isDefaultPrevented() || (this._isShown = !0, i["default"](this._element).hasClass(ce) && (this._isTransitioning = !0), this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), i["default"](this._element).on(be, '[data-dismiss="modal"]', function (t) {
            return e.hide(t);
          }), i["default"](this._dialog).on(Ee, function () {
            i["default"](e._element).one("mouseup.dismiss.bs.modal", function (t) {
              i["default"](t.target).is(e._element) && (e._ignoreBackdropClick = !0);
            });
          }), this._showBackdrop(function () {
            return e._showElement(t);
          }));
        }
      }, e.hide = function (t) {
        var e = this;
        if (t && t.preventDefault(), this._isShown && !this._isTransitioning) {
          var n = i["default"].Event("hide.bs.modal");
          if (i["default"](this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
            this._isShown = !1;
            var o = i["default"](this._element).hasClass(ce);
            if (o && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), i["default"](document).off(_e), i["default"](this._element).removeClass(he), i["default"](this._element).off(be), i["default"](this._dialog).off(Ee), o) {
              var r = u.getTransitionDurationFromElement(this._element);
              i["default"](this._element).one(u.TRANSITION_END, function (t) {
                return e._hideModal(t);
              }).emulateTransitionEnd(r);
            } else this._hideModal();
          }
        }
      }, e.dispose = function () {
        [window, this._element, this._dialog].forEach(function (t) {
          return i["default"](t).off(".bs.modal");
        }), i["default"](document).off(_e), i["default"].removeData(this._element, ue), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._isTransitioning = null, this._scrollbarWidth = null;
      }, e.handleUpdate = function () {
        this._adjustDialog();
      }, e._getConfig = function (t) {
        return t = a({}, Te, t), u.typeCheckConfig("modal", t, Ce), t;
      }, e._triggerBackdropTransition = function () {
        var t = this,
          e = i["default"].Event("hidePrevented.bs.modal");
        if (i["default"](this._element).trigger(e), !e.isDefaultPrevented()) {
          var n = this._element.scrollHeight > document.documentElement.clientHeight;
          n || (this._element.style.overflowY = "hidden"), this._element.classList.add(pe);
          var o = u.getTransitionDurationFromElement(this._dialog);
          i["default"](this._element).off(u.TRANSITION_END), i["default"](this._element).one(u.TRANSITION_END, function () {
            t._element.classList.remove(pe), n || i["default"](t._element).one(u.TRANSITION_END, function () {
              t._element.style.overflowY = "";
            }).emulateTransitionEnd(t._element, o);
          }).emulateTransitionEnd(o), this._element.focus();
        }
      }, e._showElement = function (t) {
        var e = this,
          n = i["default"](this._element).hasClass(ce),
          o = this._dialog ? this._dialog.querySelector(".modal-body") : null;
        this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), i["default"](this._dialog).hasClass("modal-dialog-scrollable") && o ? o.scrollTop = 0 : this._element.scrollTop = 0, n && u.reflow(this._element), i["default"](this._element).addClass(he), this._config.focus && this._enforceFocus();
        var r = i["default"].Event("shown.bs.modal", {
            relatedTarget: t
          }),
          a = function a() {
            e._config.focus && e._element.focus(), e._isTransitioning = !1, i["default"](e._element).trigger(r);
          };
        if (n) {
          var s = u.getTransitionDurationFromElement(this._dialog);
          i["default"](this._dialog).one(u.TRANSITION_END, a).emulateTransitionEnd(s);
        } else a();
      }, e._enforceFocus = function () {
        var t = this;
        i["default"](document).off(_e).on(_e, function (e) {
          document !== e.target && t._element !== e.target && 0 === i["default"](t._element).has(e.target).length && t._element.focus();
        });
      }, e._setEscapeEvent = function () {
        var t = this;
        this._isShown ? i["default"](this._element).on(ye, function (e) {
          t._config.keyboard && 27 === e.which ? (e.preventDefault(), t.hide()) : t._config.keyboard || 27 !== e.which || t._triggerBackdropTransition();
        }) : this._isShown || i["default"](this._element).off(ye);
      }, e._setResizeEvent = function () {
        var t = this;
        this._isShown ? i["default"](window).on(ve, function (e) {
          return t.handleUpdate(e);
        }) : i["default"](window).off(ve);
      }, e._hideModal = function () {
        var t = this;
        this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._showBackdrop(function () {
          i["default"](document.body).removeClass(de), t._resetAdjustments(), t._resetScrollbar(), i["default"](t._element).trigger(me);
        });
      }, e._removeBackdrop = function () {
        this._backdrop && (i["default"](this._backdrop).remove(), this._backdrop = null);
      }, e._showBackdrop = function (t) {
        var e = this,
          n = i["default"](this._element).hasClass(ce) ? ce : "";
        if (this._isShown && this._config.backdrop) {
          if (this._backdrop = document.createElement("div"), this._backdrop.className = "modal-backdrop", n && this._backdrop.classList.add(n), i["default"](this._backdrop).appendTo(document.body), i["default"](this._element).on(be, function (t) {
            e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._triggerBackdropTransition() : e.hide());
          }), n && u.reflow(this._backdrop), i["default"](this._backdrop).addClass(he), !t) return;
          if (!n) return void t();
          var o = u.getTransitionDurationFromElement(this._backdrop);
          i["default"](this._backdrop).one(u.TRANSITION_END, t).emulateTransitionEnd(o);
        } else if (!this._isShown && this._backdrop) {
          i["default"](this._backdrop).removeClass(he);
          var r = function r() {
            e._removeBackdrop(), t && t();
          };
          if (i["default"](this._element).hasClass(ce)) {
            var a = u.getTransitionDurationFromElement(this._backdrop);
            i["default"](this._backdrop).one(u.TRANSITION_END, r).emulateTransitionEnd(a);
          } else r();
        } else t && t();
      }, e._adjustDialog = function () {
        var t = this._element.scrollHeight > document.documentElement.clientHeight;
        !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px");
      }, e._resetAdjustments = function () {
        this._element.style.paddingLeft = "", this._element.style.paddingRight = "";
      }, e._checkScrollbar = function () {
        var t = document.body.getBoundingClientRect();
        this._isBodyOverflowing = Math.round(t.left + t.right) < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth();
      }, e._setScrollbar = function () {
        var t = this;
        if (this._isBodyOverflowing) {
          var e = [].slice.call(document.querySelectorAll(we)),
            n = [].slice.call(document.querySelectorAll(".sticky-top"));
          i["default"](e).each(function (e, n) {
            var o = n.style.paddingRight,
              r = i["default"](n).css("padding-right");
            i["default"](n).data("padding-right", o).css("padding-right", parseFloat(r) + t._scrollbarWidth + "px");
          }), i["default"](n).each(function (e, n) {
            var o = n.style.marginRight,
              r = i["default"](n).css("margin-right");
            i["default"](n).data("margin-right", o).css("margin-right", parseFloat(r) - t._scrollbarWidth + "px");
          });
          var o = document.body.style.paddingRight,
            r = i["default"](document.body).css("padding-right");
          i["default"](document.body).data("padding-right", o).css("padding-right", parseFloat(r) + this._scrollbarWidth + "px");
        }
        i["default"](document.body).addClass(de);
      }, e._resetScrollbar = function () {
        var t = [].slice.call(document.querySelectorAll(we));
        i["default"](t).each(function (t, e) {
          var n = i["default"](e).data("padding-right");
          i["default"](e).removeData("padding-right"), e.style.paddingRight = n || "";
        });
        var e = [].slice.call(document.querySelectorAll(".sticky-top"));
        i["default"](e).each(function (t, e) {
          var n = i["default"](e).data("margin-right");
          "undefined" != typeof n && i["default"](e).css("margin-right", n).removeData("margin-right");
        });
        var n = i["default"](document.body).data("padding-right");
        i["default"](document.body).removeData("padding-right"), document.body.style.paddingRight = n || "";
      }, e._getScrollbarWidth = function () {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure", document.body.appendChild(t);
        var e = t.getBoundingClientRect().width - t.clientWidth;
        return document.body.removeChild(t), e;
      }, t._jQueryInterface = function (e, n) {
        return this.each(function () {
          var o = i["default"](this).data(ue),
            r = a({}, Te, i["default"](this).data(), "object" == _typeof(e) && e ? e : {});
          if (o || (o = new t(this, r), i["default"](this).data(ue, o)), "string" == typeof e) {
            if ("undefined" == typeof o[e]) throw new TypeError('No method named "' + e + '"');
            o[e](n);
          } else r.show && o.show(n);
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return Te;
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (t) {
    var e,
      n = this,
      o = u.getSelectorFromElement(this);
    o && (e = document.querySelector(o));
    var r = i["default"](e).data(ue) ? "toggle" : a({}, i["default"](e).data(), i["default"](this).data());
    "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
    var s = i["default"](e).one(ge, function (t) {
      t.isDefaultPrevented() || s.one(me, function () {
        i["default"](n).is(":visible") && n.focus();
      });
    });
    Se._jQueryInterface.call(i["default"](e), r, this);
  }), i["default"].fn.modal = Se._jQueryInterface, i["default"].fn.modal.Constructor = Se, i["default"].fn.modal.noConflict = function () {
    return i["default"].fn.modal = fe, Se._jQueryInterface;
  };
  var Ne = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
    De = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
    Ae = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i;
  function ke(t, e, n) {
    if (0 === t.length) return t;
    if (n && "function" == typeof n) return n(t);
    for (var i = new window.DOMParser().parseFromString(t, "text/html"), o = Object.keys(e), r = [].slice.call(i.body.querySelectorAll("*")), a = function a(t, n) {
        var i = r[t],
          a = i.nodeName.toLowerCase();
        if (-1 === o.indexOf(i.nodeName.toLowerCase())) return i.parentNode.removeChild(i), "continue";
        var s = [].slice.call(i.attributes),
          l = [].concat(e["*"] || [], e[a] || []);
        s.forEach(function (t) {
          (function (t, e) {
            var n = t.nodeName.toLowerCase();
            if (-1 !== e.indexOf(n)) return -1 === Ne.indexOf(n) || Boolean(De.test(t.nodeValue) || Ae.test(t.nodeValue));
            for (var i = e.filter(function (t) {
                return t instanceof RegExp;
              }), o = 0, r = i.length; o < r; o++) if (i[o].test(n)) return !0;
            return !1;
          })(t, l) || i.removeAttribute(t.nodeName);
        });
      }, s = 0, l = r.length; s < l; s++) a(s);
    return i.body.innerHTML;
  }
  var Ie = "tooltip",
    Oe = "bs.tooltip",
    xe = i["default"].fn.tooltip,
    je = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
    Le = ["sanitize", "whiteList", "sanitizeFn"],
    Pe = "fade",
    Fe = "show",
    Re = "show",
    Be = "out",
    He = "hover",
    Me = "focus",
    qe = {
      AUTO: "auto",
      TOP: "top",
      RIGHT: "right",
      BOTTOM: "bottom",
      LEFT: "left"
    },
    Qe = {
      animation: !0,
      template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
      trigger: "hover focus",
      title: "",
      delay: 0,
      html: !1,
      selector: !1,
      placement: "top",
      offset: 0,
      container: !1,
      fallbackPlacement: "flip",
      boundary: "scrollParent",
      customClass: "",
      sanitize: !0,
      sanitizeFn: null,
      whiteList: {
        "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
        a: ["target", "href", "title", "rel"],
        area: [],
        b: [],
        br: [],
        col: [],
        code: [],
        div: [],
        em: [],
        hr: [],
        h1: [],
        h2: [],
        h3: [],
        h4: [],
        h5: [],
        h6: [],
        i: [],
        img: ["src", "srcset", "alt", "title", "width", "height"],
        li: [],
        ol: [],
        p: [],
        pre: [],
        s: [],
        small: [],
        span: [],
        sub: [],
        sup: [],
        strong: [],
        u: [],
        ul: []
      },
      popperConfig: null
    },
    We = {
      animation: "boolean",
      template: "string",
      title: "(string|element|function)",
      trigger: "string",
      delay: "(number|object)",
      html: "boolean",
      selector: "(string|boolean)",
      placement: "(string|function)",
      offset: "(number|string|function)",
      container: "(string|element|boolean)",
      fallbackPlacement: "(string|array)",
      boundary: "(string|element)",
      customClass: "(string|function)",
      sanitize: "boolean",
      sanitizeFn: "(null|function)",
      whiteList: "object",
      popperConfig: "(null|object)"
    },
    Ue = {
      HIDE: "hide.bs.tooltip",
      HIDDEN: "hidden.bs.tooltip",
      SHOW: "show.bs.tooltip",
      SHOWN: "shown.bs.tooltip",
      INSERTED: "inserted.bs.tooltip",
      CLICK: "click.bs.tooltip",
      FOCUSIN: "focusin.bs.tooltip",
      FOCUSOUT: "focusout.bs.tooltip",
      MOUSEENTER: "mouseenter.bs.tooltip",
      MOUSELEAVE: "mouseleave.bs.tooltip"
    },
    Ve = function () {
      function t(t, e) {
        if ("undefined" == typeof Yt) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
        this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = t, this.config = this._getConfig(e), this.tip = null, this._setListeners();
      }
      var e = t.prototype;
      return e.enable = function () {
        this._isEnabled = !0;
      }, e.disable = function () {
        this._isEnabled = !1;
      }, e.toggleEnabled = function () {
        this._isEnabled = !this._isEnabled;
      }, e.toggle = function (t) {
        if (this._isEnabled) if (t) {
          var e = this.constructor.DATA_KEY,
            n = i["default"](t.currentTarget).data(e);
          n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), i["default"](t.currentTarget).data(e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n);
        } else {
          if (i["default"](this.getTipElement()).hasClass(Fe)) return void this._leave(null, this);
          this._enter(null, this);
        }
      }, e.dispose = function () {
        clearTimeout(this._timeout), i["default"].removeData(this.element, this.constructor.DATA_KEY), i["default"](this.element).off(this.constructor.EVENT_KEY), i["default"](this.element).closest(".modal").off("hide.bs.modal", this._hideModalHandler), this.tip && i["default"](this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, this._activeTrigger = null, this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null;
      }, e.show = function () {
        var t = this;
        if ("none" === i["default"](this.element).css("display")) throw new Error("Please use show on visible elements");
        var e = i["default"].Event(this.constructor.Event.SHOW);
        if (this.isWithContent() && this._isEnabled) {
          i["default"](this.element).trigger(e);
          var n = u.findShadowRoot(this.element),
            o = i["default"].contains(null !== n ? n : this.element.ownerDocument.documentElement, this.element);
          if (e.isDefaultPrevented() || !o) return;
          var r = this.getTipElement(),
            a = u.getUID(this.constructor.NAME);
          r.setAttribute("id", a), this.element.setAttribute("aria-describedby", a), this.setContent(), this.config.animation && i["default"](r).addClass(Pe);
          var s = "function" == typeof this.config.placement ? this.config.placement.call(this, r, this.element) : this.config.placement,
            l = this._getAttachment(s);
          this.addAttachmentClass(l);
          var f = this._getContainer();
          i["default"](r).data(this.constructor.DATA_KEY, this), i["default"].contains(this.element.ownerDocument.documentElement, this.tip) || i["default"](r).appendTo(f), i["default"](this.element).trigger(this.constructor.Event.INSERTED), this._popper = new Yt(this.element, r, this._getPopperConfig(l)), i["default"](r).addClass(Fe), i["default"](r).addClass(this.config.customClass), "ontouchstart" in document.documentElement && i["default"](document.body).children().on("mouseover", null, i["default"].noop);
          var d = function d() {
            t.config.animation && t._fixTransition();
            var e = t._hoverState;
            t._hoverState = null, i["default"](t.element).trigger(t.constructor.Event.SHOWN), e === Be && t._leave(null, t);
          };
          if (i["default"](this.tip).hasClass(Pe)) {
            var c = u.getTransitionDurationFromElement(this.tip);
            i["default"](this.tip).one(u.TRANSITION_END, d).emulateTransitionEnd(c);
          } else d();
        }
      }, e.hide = function (t) {
        var e = this,
          n = this.getTipElement(),
          o = i["default"].Event(this.constructor.Event.HIDE),
          r = function r() {
            e._hoverState !== Re && n.parentNode && n.parentNode.removeChild(n), e._cleanTipClass(), e.element.removeAttribute("aria-describedby"), i["default"](e.element).trigger(e.constructor.Event.HIDDEN), null !== e._popper && e._popper.destroy(), t && t();
          };
        if (i["default"](this.element).trigger(o), !o.isDefaultPrevented()) {
          if (i["default"](n).removeClass(Fe), "ontouchstart" in document.documentElement && i["default"](document.body).children().off("mouseover", null, i["default"].noop), this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1, i["default"](this.tip).hasClass(Pe)) {
            var a = u.getTransitionDurationFromElement(n);
            i["default"](n).one(u.TRANSITION_END, r).emulateTransitionEnd(a);
          } else r();
          this._hoverState = "";
        }
      }, e.update = function () {
        null !== this._popper && this._popper.scheduleUpdate();
      }, e.isWithContent = function () {
        return Boolean(this.getTitle());
      }, e.addAttachmentClass = function (t) {
        i["default"](this.getTipElement()).addClass("bs-tooltip-" + t);
      }, e.getTipElement = function () {
        return this.tip = this.tip || i["default"](this.config.template)[0], this.tip;
      }, e.setContent = function () {
        var t = this.getTipElement();
        this.setElementContent(i["default"](t.querySelectorAll(".tooltip-inner")), this.getTitle()), i["default"](t).removeClass("fade show");
      }, e.setElementContent = function (t, e) {
        "object" != _typeof(e) || !e.nodeType && !e.jquery ? this.config.html ? (this.config.sanitize && (e = ke(e, this.config.whiteList, this.config.sanitizeFn)), t.html(e)) : t.text(e) : this.config.html ? i["default"](e).parent().is(t) || t.empty().append(e) : t.text(i["default"](e).text());
      }, e.getTitle = function () {
        var t = this.element.getAttribute("data-original-title");
        return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t;
      }, e._getPopperConfig = function (t) {
        var e = this;
        return a({}, {
          placement: t,
          modifiers: {
            offset: this._getOffset(),
            flip: {
              behavior: this.config.fallbackPlacement
            },
            arrow: {
              element: ".arrow"
            },
            preventOverflow: {
              boundariesElement: this.config.boundary
            }
          },
          onCreate: function onCreate(t) {
            t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t);
          },
          onUpdate: function onUpdate(t) {
            return e._handlePopperPlacementChange(t);
          }
        }, this.config.popperConfig);
      }, e._getOffset = function () {
        var t = this,
          e = {};
        return "function" == typeof this.config.offset ? e.fn = function (e) {
          return e.offsets = a({}, e.offsets, t.config.offset(e.offsets, t.element)), e;
        } : e.offset = this.config.offset, e;
      }, e._getContainer = function () {
        return !1 === this.config.container ? document.body : u.isElement(this.config.container) ? i["default"](this.config.container) : i["default"](document).find(this.config.container);
      }, e._getAttachment = function (t) {
        return qe[t.toUpperCase()];
      }, e._setListeners = function () {
        var t = this;
        this.config.trigger.split(" ").forEach(function (e) {
          if ("click" === e) i["default"](t.element).on(t.constructor.Event.CLICK, t.config.selector, function (e) {
            return t.toggle(e);
          });else if ("manual" !== e) {
            var n = e === He ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN,
              o = e === He ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
            i["default"](t.element).on(n, t.config.selector, function (e) {
              return t._enter(e);
            }).on(o, t.config.selector, function (e) {
              return t._leave(e);
            });
          }
        }), this._hideModalHandler = function () {
          t.element && t.hide();
        }, i["default"](this.element).closest(".modal").on("hide.bs.modal", this._hideModalHandler), this.config.selector ? this.config = a({}, this.config, {
          trigger: "manual",
          selector: ""
        }) : this._fixTitle();
      }, e._fixTitle = function () {
        var t = _typeof(this.element.getAttribute("data-original-title"));
        (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""));
      }, e._enter = function (t, e) {
        var n = this.constructor.DATA_KEY;
        (e = e || i["default"](t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), i["default"](t.currentTarget).data(n, e)), t && (e._activeTrigger["focusin" === t.type ? Me : He] = !0), i["default"](e.getTipElement()).hasClass(Fe) || e._hoverState === Re ? e._hoverState = Re : (clearTimeout(e._timeout), e._hoverState = Re, e.config.delay && e.config.delay.show ? e._timeout = setTimeout(function () {
          e._hoverState === Re && e.show();
        }, e.config.delay.show) : e.show());
      }, e._leave = function (t, e) {
        var n = this.constructor.DATA_KEY;
        (e = e || i["default"](t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), i["default"](t.currentTarget).data(n, e)), t && (e._activeTrigger["focusout" === t.type ? Me : He] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = Be, e.config.delay && e.config.delay.hide ? e._timeout = setTimeout(function () {
          e._hoverState === Be && e.hide();
        }, e.config.delay.hide) : e.hide());
      }, e._isWithActiveTrigger = function () {
        for (var t in this._activeTrigger) if (this._activeTrigger[t]) return !0;
        return !1;
      }, e._getConfig = function (t) {
        var e = i["default"](this.element).data();
        return Object.keys(e).forEach(function (t) {
          -1 !== Le.indexOf(t) && delete e[t];
        }), "number" == typeof (t = a({}, this.constructor.Default, e, "object" == _typeof(t) && t ? t : {})).delay && (t.delay = {
          show: t.delay,
          hide: t.delay
        }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), u.typeCheckConfig(Ie, t, this.constructor.DefaultType), t.sanitize && (t.template = ke(t.template, t.whiteList, t.sanitizeFn)), t;
      }, e._getDelegateConfig = function () {
        var t = {};
        if (this.config) for (var e in this.config) this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
        return t;
      }, e._cleanTipClass = function () {
        var t = i["default"](this.getTipElement()),
          e = t.attr("class").match(je);
        null !== e && e.length && t.removeClass(e.join(""));
      }, e._handlePopperPlacementChange = function (t) {
        this.tip = t.instance.popper, this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(t.placement));
      }, e._fixTransition = function () {
        var t = this.getTipElement(),
          e = this.config.animation;
        null === t.getAttribute("x-placement") && (i["default"](t).removeClass(Pe), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e);
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this),
            o = n.data(Oe),
            r = "object" == _typeof(e) && e;
          if ((o || !/dispose|hide/.test(e)) && (o || (o = new t(this, r), n.data(Oe, o)), "string" == typeof e)) {
            if ("undefined" == typeof o[e]) throw new TypeError('No method named "' + e + '"');
            o[e]();
          }
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return Qe;
        }
      }, {
        key: "NAME",
        get: function get() {
          return Ie;
        }
      }, {
        key: "DATA_KEY",
        get: function get() {
          return Oe;
        }
      }, {
        key: "Event",
        get: function get() {
          return Ue;
        }
      }, {
        key: "EVENT_KEY",
        get: function get() {
          return ".bs.tooltip";
        }
      }, {
        key: "DefaultType",
        get: function get() {
          return We;
        }
      }]), t;
    }();
  i["default"].fn.tooltip = Ve._jQueryInterface, i["default"].fn.tooltip.Constructor = Ve, i["default"].fn.tooltip.noConflict = function () {
    return i["default"].fn.tooltip = xe, Ve._jQueryInterface;
  };
  var Ye = "bs.popover",
    ze = i["default"].fn.popover,
    Ke = new RegExp("(^|\\s)bs-popover\\S+", "g"),
    Xe = a({}, Ve.Default, {
      placement: "right",
      trigger: "click",
      content: "",
      template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
    }),
    Ge = a({}, Ve.DefaultType, {
      content: "(string|element|function)"
    }),
    $e = {
      HIDE: "hide.bs.popover",
      HIDDEN: "hidden.bs.popover",
      SHOW: "show.bs.popover",
      SHOWN: "shown.bs.popover",
      INSERTED: "inserted.bs.popover",
      CLICK: "click.bs.popover",
      FOCUSIN: "focusin.bs.popover",
      FOCUSOUT: "focusout.bs.popover",
      MOUSEENTER: "mouseenter.bs.popover",
      MOUSELEAVE: "mouseleave.bs.popover"
    },
    Je = function (t) {
      var e, n;
      function o() {
        return t.apply(this, arguments) || this;
      }
      n = t, (e = o).prototype = Object.create(n.prototype), e.prototype.constructor = e, s(e, n);
      var a = o.prototype;
      return a.isWithContent = function () {
        return this.getTitle() || this._getContent();
      }, a.addAttachmentClass = function (t) {
        i["default"](this.getTipElement()).addClass("bs-popover-" + t);
      }, a.getTipElement = function () {
        return this.tip = this.tip || i["default"](this.config.template)[0], this.tip;
      }, a.setContent = function () {
        var t = i["default"](this.getTipElement());
        this.setElementContent(t.find(".popover-header"), this.getTitle());
        var e = this._getContent();
        "function" == typeof e && (e = e.call(this.element)), this.setElementContent(t.find(".popover-body"), e), t.removeClass("fade show");
      }, a._getContent = function () {
        return this.element.getAttribute("data-content") || this.config.content;
      }, a._cleanTipClass = function () {
        var t = i["default"](this.getTipElement()),
          e = t.attr("class").match(Ke);
        null !== e && e.length > 0 && t.removeClass(e.join(""));
      }, o._jQueryInterface = function (t) {
        return this.each(function () {
          var e = i["default"](this).data(Ye),
            n = "object" == _typeof(t) ? t : null;
          if ((e || !/dispose|hide/.test(t)) && (e || (e = new o(this, n), i["default"](this).data(Ye, e)), "string" == typeof t)) {
            if ("undefined" == typeof e[t]) throw new TypeError('No method named "' + t + '"');
            e[t]();
          }
        });
      }, r(o, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return Xe;
        }
      }, {
        key: "NAME",
        get: function get() {
          return "popover";
        }
      }, {
        key: "DATA_KEY",
        get: function get() {
          return Ye;
        }
      }, {
        key: "Event",
        get: function get() {
          return $e;
        }
      }, {
        key: "EVENT_KEY",
        get: function get() {
          return ".bs.popover";
        }
      }, {
        key: "DefaultType",
        get: function get() {
          return Ge;
        }
      }]), o;
    }(Ve);
  i["default"].fn.popover = Je._jQueryInterface, i["default"].fn.popover.Constructor = Je, i["default"].fn.popover.noConflict = function () {
    return i["default"].fn.popover = ze, Je._jQueryInterface;
  };
  var Ze = "scrollspy",
    tn = "bs.scrollspy",
    en = i["default"].fn[Ze],
    nn = "active",
    on = "position",
    rn = ".nav, .list-group",
    an = {
      offset: 10,
      method: "auto",
      target: ""
    },
    sn = {
      offset: "number",
      method: "string",
      target: "(string|element)"
    },
    ln = function () {
      function t(t, e) {
        var n = this;
        this._element = t, this._scrollElement = "BODY" === t.tagName ? window : t, this._config = this._getConfig(e), this._selector = this._config.target + " .nav-link," + this._config.target + " .list-group-item," + this._config.target + " .dropdown-item", this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, i["default"](this._scrollElement).on("scroll.bs.scrollspy", function (t) {
          return n._process(t);
        }), this.refresh(), this._process();
      }
      var e = t.prototype;
      return e.refresh = function () {
        var t = this,
          e = this._scrollElement === this._scrollElement.window ? "offset" : on,
          n = "auto" === this._config.method ? e : this._config.method,
          o = n === on ? this._getScrollTop() : 0;
        this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), [].slice.call(document.querySelectorAll(this._selector)).map(function (t) {
          var e,
            r = u.getSelectorFromElement(t);
          if (r && (e = document.querySelector(r)), e) {
            var a = e.getBoundingClientRect();
            if (a.width || a.height) return [i["default"](e)[n]().top + o, r];
          }
          return null;
        }).filter(Boolean).sort(function (t, e) {
          return t[0] - e[0];
        }).forEach(function (e) {
          t._offsets.push(e[0]), t._targets.push(e[1]);
        });
      }, e.dispose = function () {
        i["default"].removeData(this._element, tn), i["default"](this._scrollElement).off(".bs.scrollspy"), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null;
      }, e._getConfig = function (t) {
        if ("string" != typeof (t = a({}, an, "object" == _typeof(t) && t ? t : {})).target && u.isElement(t.target)) {
          var e = i["default"](t.target).attr("id");
          e || (e = u.getUID(Ze), i["default"](t.target).attr("id", e)), t.target = "#" + e;
        }
        return u.typeCheckConfig(Ze, t, sn), t;
      }, e._getScrollTop = function () {
        return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
      }, e._getScrollHeight = function () {
        return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
      }, e._getOffsetHeight = function () {
        return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
      }, e._process = function () {
        var t = this._getScrollTop() + this._config.offset,
          e = this._getScrollHeight(),
          n = this._config.offset + e - this._getOffsetHeight();
        if (this._scrollHeight !== e && this.refresh(), t >= n) {
          var i = this._targets[this._targets.length - 1];
          this._activeTarget !== i && this._activate(i);
        } else {
          if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear();
          for (var o = this._offsets.length; o--;) this._activeTarget !== this._targets[o] && t >= this._offsets[o] && ("undefined" == typeof this._offsets[o + 1] || t < this._offsets[o + 1]) && this._activate(this._targets[o]);
        }
      }, e._activate = function (t) {
        this._activeTarget = t, this._clear();
        var e = this._selector.split(",").map(function (e) {
            return e + '[data-target="' + t + '"],' + e + '[href="' + t + '"]';
          }),
          n = i["default"]([].slice.call(document.querySelectorAll(e.join(","))));
        n.hasClass("dropdown-item") ? (n.closest(".dropdown").find(".dropdown-toggle").addClass(nn), n.addClass(nn)) : (n.addClass(nn), n.parents(rn).prev(".nav-link, .list-group-item").addClass(nn), n.parents(rn).prev(".nav-item").children(".nav-link").addClass(nn)), i["default"](this._scrollElement).trigger("activate.bs.scrollspy", {
          relatedTarget: t
        });
      }, e._clear = function () {
        [].slice.call(document.querySelectorAll(this._selector)).filter(function (t) {
          return t.classList.contains(nn);
        }).forEach(function (t) {
          return t.classList.remove(nn);
        });
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this).data(tn);
          if (n || (n = new t(this, "object" == _typeof(e) && e), i["default"](this).data(tn, n)), "string" == typeof e) {
            if ("undefined" == typeof n[e]) throw new TypeError('No method named "' + e + '"');
            n[e]();
          }
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "Default",
        get: function get() {
          return an;
        }
      }]), t;
    }();
  i["default"](window).on("load.bs.scrollspy.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-spy="scroll"]')), e = t.length; e--;) {
      var n = i["default"](t[e]);
      ln._jQueryInterface.call(n, n.data());
    }
  }), i["default"].fn[Ze] = ln._jQueryInterface, i["default"].fn[Ze].Constructor = ln, i["default"].fn[Ze].noConflict = function () {
    return i["default"].fn[Ze] = en, ln._jQueryInterface;
  };
  var un = "bs.tab",
    fn = i["default"].fn.tab,
    dn = "active",
    cn = "fade",
    hn = "show",
    pn = ".active",
    mn = "> li > .active",
    gn = function () {
      function t(t) {
        this._element = t;
      }
      var e = t.prototype;
      return e.show = function () {
        var t = this;
        if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && i["default"](this._element).hasClass(dn) || i["default"](this._element).hasClass("disabled") || this._element.hasAttribute("disabled"))) {
          var e,
            n,
            o = i["default"](this._element).closest(".nav, .list-group")[0],
            r = u.getSelectorFromElement(this._element);
          if (o) {
            var a = "UL" === o.nodeName || "OL" === o.nodeName ? mn : pn;
            n = (n = i["default"].makeArray(i["default"](o).find(a)))[n.length - 1];
          }
          var s = i["default"].Event("hide.bs.tab", {
              relatedTarget: this._element
            }),
            l = i["default"].Event("show.bs.tab", {
              relatedTarget: n
            });
          if (n && i["default"](n).trigger(s), i["default"](this._element).trigger(l), !l.isDefaultPrevented() && !s.isDefaultPrevented()) {
            r && (e = document.querySelector(r)), this._activate(this._element, o);
            var f = function f() {
              var e = i["default"].Event("hidden.bs.tab", {
                  relatedTarget: t._element
                }),
                o = i["default"].Event("shown.bs.tab", {
                  relatedTarget: n
                });
              i["default"](n).trigger(e), i["default"](t._element).trigger(o);
            };
            e ? this._activate(e, e.parentNode, f) : f();
          }
        }
      }, e.dispose = function () {
        i["default"].removeData(this._element, un), this._element = null;
      }, e._activate = function (t, e, n) {
        var o = this,
          r = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? i["default"](e).children(pn) : i["default"](e).find(mn))[0],
          a = n && r && i["default"](r).hasClass(cn),
          s = function s() {
            return o._transitionComplete(t, r, n);
          };
        if (r && a) {
          var l = u.getTransitionDurationFromElement(r);
          i["default"](r).removeClass(hn).one(u.TRANSITION_END, s).emulateTransitionEnd(l);
        } else s();
      }, e._transitionComplete = function (t, e, n) {
        if (e) {
          i["default"](e).removeClass(dn);
          var o = i["default"](e.parentNode).find("> .dropdown-menu .active")[0];
          o && i["default"](o).removeClass(dn), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1);
        }
        i["default"](t).addClass(dn), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), u.reflow(t), t.classList.contains(cn) && t.classList.add(hn);
        var r = t.parentNode;
        if (r && "LI" === r.nodeName && (r = r.parentNode), r && i["default"](r).hasClass("dropdown-menu")) {
          var a = i["default"](t).closest(".dropdown")[0];
          if (a) {
            var s = [].slice.call(a.querySelectorAll(".dropdown-toggle"));
            i["default"](s).addClass(dn);
          }
          t.setAttribute("aria-expanded", !0);
        }
        n && n();
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this),
            o = n.data(un);
          if (o || (o = new t(this), n.data(un, o)), "string" == typeof e) {
            if ("undefined" == typeof o[e]) throw new TypeError('No method named "' + e + '"');
            o[e]();
          }
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }]), t;
    }();
  i["default"](document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function (t) {
    t.preventDefault(), gn._jQueryInterface.call(i["default"](this), "show");
  }), i["default"].fn.tab = gn._jQueryInterface, i["default"].fn.tab.Constructor = gn, i["default"].fn.tab.noConflict = function () {
    return i["default"].fn.tab = fn, gn._jQueryInterface;
  };
  var _n = "bs.toast",
    vn = i["default"].fn.toast,
    bn = "hide",
    yn = "show",
    En = "showing",
    wn = "click.dismiss.bs.toast",
    Tn = {
      animation: !0,
      autohide: !0,
      delay: 500
    },
    Cn = {
      animation: "boolean",
      autohide: "boolean",
      delay: "number"
    },
    Sn = function () {
      function t(t, e) {
        this._element = t, this._config = this._getConfig(e), this._timeout = null, this._setListeners();
      }
      var e = t.prototype;
      return e.show = function () {
        var t = this,
          e = i["default"].Event("show.bs.toast");
        if (i["default"](this._element).trigger(e), !e.isDefaultPrevented()) {
          this._clearTimeout(), this._config.animation && this._element.classList.add("fade");
          var n = function n() {
            t._element.classList.remove(En), t._element.classList.add(yn), i["default"](t._element).trigger("shown.bs.toast"), t._config.autohide && (t._timeout = setTimeout(function () {
              t.hide();
            }, t._config.delay));
          };
          if (this._element.classList.remove(bn), u.reflow(this._element), this._element.classList.add(En), this._config.animation) {
            var o = u.getTransitionDurationFromElement(this._element);
            i["default"](this._element).one(u.TRANSITION_END, n).emulateTransitionEnd(o);
          } else n();
        }
      }, e.hide = function () {
        if (this._element.classList.contains(yn)) {
          var t = i["default"].Event("hide.bs.toast");
          i["default"](this._element).trigger(t), t.isDefaultPrevented() || this._close();
        }
      }, e.dispose = function () {
        this._clearTimeout(), this._element.classList.contains(yn) && this._element.classList.remove(yn), i["default"](this._element).off(wn), i["default"].removeData(this._element, _n), this._element = null, this._config = null;
      }, e._getConfig = function (t) {
        return t = a({}, Tn, i["default"](this._element).data(), "object" == _typeof(t) && t ? t : {}), u.typeCheckConfig("toast", t, this.constructor.DefaultType), t;
      }, e._setListeners = function () {
        var t = this;
        i["default"](this._element).on(wn, '[data-dismiss="toast"]', function () {
          return t.hide();
        });
      }, e._close = function () {
        var t = this,
          e = function e() {
            t._element.classList.add(bn), i["default"](t._element).trigger("hidden.bs.toast");
          };
        if (this._element.classList.remove(yn), this._config.animation) {
          var n = u.getTransitionDurationFromElement(this._element);
          i["default"](this._element).one(u.TRANSITION_END, e).emulateTransitionEnd(n);
        } else e();
      }, e._clearTimeout = function () {
        clearTimeout(this._timeout), this._timeout = null;
      }, t._jQueryInterface = function (e) {
        return this.each(function () {
          var n = i["default"](this),
            o = n.data(_n);
          if (o || (o = new t(this, "object" == _typeof(e) && e), n.data(_n, o)), "string" == typeof e) {
            if ("undefined" == typeof o[e]) throw new TypeError('No method named "' + e + '"');
            o[e](this);
          }
        });
      }, r(t, null, [{
        key: "VERSION",
        get: function get() {
          return "4.6.2";
        }
      }, {
        key: "DefaultType",
        get: function get() {
          return Cn;
        }
      }, {
        key: "Default",
        get: function get() {
          return Tn;
        }
      }]), t;
    }();
  i["default"].fn.toast = Sn._jQueryInterface, i["default"].fn.toast.Constructor = Sn, i["default"].fn.toast.noConflict = function () {
    return i["default"].fn.toast = vn, Sn._jQueryInterface;
  }, t.Alert = c, t.Button = b, t.Carousel = O, t.Collapse = W, t.Dropdown = le, t.Modal = Se, t.Popover = Je, t.Scrollspy = ln, t.Tab = gn, t.Toast = Sn, t.Tooltip = Ve, t.Util = u, Object.defineProperty(t, "__esModule", {
    value: !0
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/jquery/dist/jquery.js":
/*!********************************************!*\
  !*** ./node_modules/jquery/dist/jquery.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
 * jQuery JavaScript Library v3.7.0
 * https://jquery.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2023-05-11T18:29Z
 */
(function (global, factory) {
  "use strict";

  if (( false ? undefined : _typeof(module)) === "object" && _typeof(module.exports) === "object") {
    // For CommonJS and CommonJS-like environments where a proper `window`
    // is present, execute the factory and get jQuery.
    // For environments that do not have a `window` with a `document`
    // (such as Node.js), expose a factory as module.exports.
    // This accentuates the need for the creation of a real `window`.
    // e.g. var jQuery = require("jquery")(window);
    // See ticket trac-14549 for more info.
    module.exports = global.document ? factory(global, true) : function (w) {
      if (!w.document) {
        throw new Error("jQuery requires a window with a document");
      }
      return factory(w);
    };
  } else {
    factory(global);
  }

  // Pass this if window is not defined yet
})(typeof window !== "undefined" ? window : this, function (window, noGlobal) {
  // Edge <= 12 - 13+, Firefox <=18 - 45+, IE 10 - 11, Safari 5.1 - 9+, iOS 6 - 9.1
  // throw exceptions when non-strict code (e.g., ASP.NET 4.5) accesses strict mode
  // arguments.callee.caller (trac-13335). But as of jQuery 3.0 (2016), strict mode should be common
  // enough that all such attempts are guarded in a try block.
  "use strict";

  var arr = [];
  var getProto = Object.getPrototypeOf;
  var _slice = arr.slice;
  var flat = arr.flat ? function (array) {
    return arr.flat.call(array);
  } : function (array) {
    return arr.concat.apply([], array);
  };
  var push = arr.push;
  var indexOf = arr.indexOf;
  var class2type = {};
  var toString = class2type.toString;
  var hasOwn = class2type.hasOwnProperty;
  var fnToString = hasOwn.toString;
  var ObjectFunctionString = fnToString.call(Object);
  var support = {};
  var isFunction = function isFunction(obj) {
    // Support: Chrome <=57, Firefox <=52
    // In some browsers, typeof returns "function" for HTML <object> elements
    // (i.e., `typeof document.createElement( "object" ) === "function"`).
    // We don't want to classify *any* DOM node as a function.
    // Support: QtWeb <=3.8.5, WebKit <=534.34, wkhtmltopdf tool <=0.12.5
    // Plus for old WebKit, typeof returns "function" for HTML collections
    // (e.g., `typeof document.getElementsByTagName("div") === "function"`). (gh-4756)
    return typeof obj === "function" && typeof obj.nodeType !== "number" && typeof obj.item !== "function";
  };
  var isWindow = function isWindow(obj) {
    return obj != null && obj === obj.window;
  };
  var document = window.document;
  var preservedScriptAttributes = {
    type: true,
    src: true,
    nonce: true,
    noModule: true
  };
  function DOMEval(code, node, doc) {
    doc = doc || document;
    var i,
      val,
      script = doc.createElement("script");
    script.text = code;
    if (node) {
      for (i in preservedScriptAttributes) {
        // Support: Firefox 64+, Edge 18+
        // Some browsers don't support the "nonce" property on scripts.
        // On the other hand, just using `getAttribute` is not enough as
        // the `nonce` attribute is reset to an empty string whenever it
        // becomes browsing-context connected.
        // See https://github.com/whatwg/html/issues/2369
        // See https://html.spec.whatwg.org/#nonce-attributes
        // The `node.getAttribute` check was added for the sake of
        // `jQuery.globalEval` so that it can fake a nonce-containing node
        // via an object.
        val = node[i] || node.getAttribute && node.getAttribute(i);
        if (val) {
          script.setAttribute(i, val);
        }
      }
    }
    doc.head.appendChild(script).parentNode.removeChild(script);
  }
  function toType(obj) {
    if (obj == null) {
      return obj + "";
    }

    // Support: Android <=2.3 only (functionish RegExp)
    return _typeof(obj) === "object" || typeof obj === "function" ? class2type[toString.call(obj)] || "object" : _typeof(obj);
  }
  /* global Symbol */
  // Defining this global in .eslintrc.json would create a danger of using the global
  // unguarded in another place, it seems safer to define global only for this module

  var version = "3.7.0",
    rhtmlSuffix = /HTML$/i,
    // Define a local copy of jQuery
    jQuery = function jQuery(selector, context) {
      // The jQuery object is actually just the init constructor 'enhanced'
      // Need init if jQuery is called (just allow error to be thrown if not included)
      return new jQuery.fn.init(selector, context);
    };
  jQuery.fn = jQuery.prototype = {
    // The current version of jQuery being used
    jquery: version,
    constructor: jQuery,
    // The default length of a jQuery object is 0
    length: 0,
    toArray: function toArray() {
      return _slice.call(this);
    },
    // Get the Nth element in the matched element set OR
    // Get the whole matched element set as a clean array
    get: function get(num) {
      // Return all the elements in a clean array
      if (num == null) {
        return _slice.call(this);
      }

      // Return just the one element from the set
      return num < 0 ? this[num + this.length] : this[num];
    },
    // Take an array of elements and push it onto the stack
    // (returning the new matched element set)
    pushStack: function pushStack(elems) {
      // Build a new jQuery matched element set
      var ret = jQuery.merge(this.constructor(), elems);

      // Add the old object onto the stack (as a reference)
      ret.prevObject = this;

      // Return the newly-formed element set
      return ret;
    },
    // Execute a callback for every element in the matched set.
    each: function each(callback) {
      return jQuery.each(this, callback);
    },
    map: function map(callback) {
      return this.pushStack(jQuery.map(this, function (elem, i) {
        return callback.call(elem, i, elem);
      }));
    },
    slice: function slice() {
      return this.pushStack(_slice.apply(this, arguments));
    },
    first: function first() {
      return this.eq(0);
    },
    last: function last() {
      return this.eq(-1);
    },
    even: function even() {
      return this.pushStack(jQuery.grep(this, function (_elem, i) {
        return (i + 1) % 2;
      }));
    },
    odd: function odd() {
      return this.pushStack(jQuery.grep(this, function (_elem, i) {
        return i % 2;
      }));
    },
    eq: function eq(i) {
      var len = this.length,
        j = +i + (i < 0 ? len : 0);
      return this.pushStack(j >= 0 && j < len ? [this[j]] : []);
    },
    end: function end() {
      return this.prevObject || this.constructor();
    },
    // For internal use only.
    // Behaves like an Array's method, not like a jQuery method.
    push: push,
    sort: arr.sort,
    splice: arr.splice
  };
  jQuery.extend = jQuery.fn.extend = function () {
    var options,
      name,
      src,
      copy,
      copyIsArray,
      clone,
      target = arguments[0] || {},
      i = 1,
      length = arguments.length,
      deep = false;

    // Handle a deep copy situation
    if (typeof target === "boolean") {
      deep = target;

      // Skip the boolean and the target
      target = arguments[i] || {};
      i++;
    }

    // Handle case when target is a string or something (possible in deep copy)
    if (_typeof(target) !== "object" && !isFunction(target)) {
      target = {};
    }

    // Extend jQuery itself if only one argument is passed
    if (i === length) {
      target = this;
      i--;
    }
    for (; i < length; i++) {
      // Only deal with non-null/undefined values
      if ((options = arguments[i]) != null) {
        // Extend the base object
        for (name in options) {
          copy = options[name];

          // Prevent Object.prototype pollution
          // Prevent never-ending loop
          if (name === "__proto__" || target === copy) {
            continue;
          }

          // Recurse if we're merging plain objects or arrays
          if (deep && copy && (jQuery.isPlainObject(copy) || (copyIsArray = Array.isArray(copy)))) {
            src = target[name];

            // Ensure proper type for the source value
            if (copyIsArray && !Array.isArray(src)) {
              clone = [];
            } else if (!copyIsArray && !jQuery.isPlainObject(src)) {
              clone = {};
            } else {
              clone = src;
            }
            copyIsArray = false;

            // Never move original objects, clone them
            target[name] = jQuery.extend(deep, clone, copy);

            // Don't bring in undefined values
          } else if (copy !== undefined) {
            target[name] = copy;
          }
        }
      }
    }

    // Return the modified object
    return target;
  };
  jQuery.extend({
    // Unique for each copy of jQuery on the page
    expando: "jQuery" + (version + Math.random()).replace(/\D/g, ""),
    // Assume jQuery is ready without the ready module
    isReady: true,
    error: function error(msg) {
      throw new Error(msg);
    },
    noop: function noop() {},
    isPlainObject: function isPlainObject(obj) {
      var proto, Ctor;

      // Detect obvious negatives
      // Use toString instead of jQuery.type to catch host objects
      if (!obj || toString.call(obj) !== "[object Object]") {
        return false;
      }
      proto = getProto(obj);

      // Objects with no prototype (e.g., `Object.create( null )`) are plain
      if (!proto) {
        return true;
      }

      // Objects with prototype are plain iff they were constructed by a global Object function
      Ctor = hasOwn.call(proto, "constructor") && proto.constructor;
      return typeof Ctor === "function" && fnToString.call(Ctor) === ObjectFunctionString;
    },
    isEmptyObject: function isEmptyObject(obj) {
      var name;
      for (name in obj) {
        return false;
      }
      return true;
    },
    // Evaluates a script in a provided context; falls back to the global one
    // if not specified.
    globalEval: function globalEval(code, options, doc) {
      DOMEval(code, {
        nonce: options && options.nonce
      }, doc);
    },
    each: function each(obj, callback) {
      var length,
        i = 0;
      if (isArrayLike(obj)) {
        length = obj.length;
        for (; i < length; i++) {
          if (callback.call(obj[i], i, obj[i]) === false) {
            break;
          }
        }
      } else {
        for (i in obj) {
          if (callback.call(obj[i], i, obj[i]) === false) {
            break;
          }
        }
      }
      return obj;
    },
    // Retrieve the text value of an array of DOM nodes
    text: function text(elem) {
      var node,
        ret = "",
        i = 0,
        nodeType = elem.nodeType;
      if (!nodeType) {
        // If no nodeType, this is expected to be an array
        while (node = elem[i++]) {
          // Do not traverse comment nodes
          ret += jQuery.text(node);
        }
      } else if (nodeType === 1 || nodeType === 9 || nodeType === 11) {
        return elem.textContent;
      } else if (nodeType === 3 || nodeType === 4) {
        return elem.nodeValue;
      }

      // Do not include comment or processing instruction nodes

      return ret;
    },
    // results is for internal usage only
    makeArray: function makeArray(arr, results) {
      var ret = results || [];
      if (arr != null) {
        if (isArrayLike(Object(arr))) {
          jQuery.merge(ret, typeof arr === "string" ? [arr] : arr);
        } else {
          push.call(ret, arr);
        }
      }
      return ret;
    },
    inArray: function inArray(elem, arr, i) {
      return arr == null ? -1 : indexOf.call(arr, elem, i);
    },
    isXMLDoc: function isXMLDoc(elem) {
      var namespace = elem && elem.namespaceURI,
        docElem = elem && (elem.ownerDocument || elem).documentElement;

      // Assume HTML when documentElement doesn't yet exist, such as inside
      // document fragments.
      return !rhtmlSuffix.test(namespace || docElem && docElem.nodeName || "HTML");
    },
    // Support: Android <=4.0 only, PhantomJS 1 only
    // push.apply(_, arraylike) throws on ancient WebKit
    merge: function merge(first, second) {
      var len = +second.length,
        j = 0,
        i = first.length;
      for (; j < len; j++) {
        first[i++] = second[j];
      }
      first.length = i;
      return first;
    },
    grep: function grep(elems, callback, invert) {
      var callbackInverse,
        matches = [],
        i = 0,
        length = elems.length,
        callbackExpect = !invert;

      // Go through the array, only saving the items
      // that pass the validator function
      for (; i < length; i++) {
        callbackInverse = !callback(elems[i], i);
        if (callbackInverse !== callbackExpect) {
          matches.push(elems[i]);
        }
      }
      return matches;
    },
    // arg is for internal usage only
    map: function map(elems, callback, arg) {
      var length,
        value,
        i = 0,
        ret = [];

      // Go through the array, translating each of the items to their new values
      if (isArrayLike(elems)) {
        length = elems.length;
        for (; i < length; i++) {
          value = callback(elems[i], i, arg);
          if (value != null) {
            ret.push(value);
          }
        }

        // Go through every key on the object,
      } else {
        for (i in elems) {
          value = callback(elems[i], i, arg);
          if (value != null) {
            ret.push(value);
          }
        }
      }

      // Flatten any nested arrays
      return flat(ret);
    },
    // A global GUID counter for objects
    guid: 1,
    // jQuery.support is not used in Core but other projects attach their
    // properties to it so it needs to exist.
    support: support
  });
  if (typeof Symbol === "function") {
    jQuery.fn[Symbol.iterator] = arr[Symbol.iterator];
  }

  // Populate the class2type map
  jQuery.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (_i, name) {
    class2type["[object " + name + "]"] = name.toLowerCase();
  });
  function isArrayLike(obj) {
    // Support: real iOS 8.2 only (not reproducible in simulator)
    // `in` check used to prevent JIT error (gh-2145)
    // hasOwn isn't used here due to false negatives
    // regarding Nodelist length in IE
    var length = !!obj && "length" in obj && obj.length,
      type = toType(obj);
    if (isFunction(obj) || isWindow(obj)) {
      return false;
    }
    return type === "array" || length === 0 || typeof length === "number" && length > 0 && length - 1 in obj;
  }
  function nodeName(elem, name) {
    return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase();
  }
  var pop = arr.pop;
  var sort = arr.sort;
  var splice = arr.splice;
  var whitespace = "[\\x20\\t\\r\\n\\f]";
  var rtrimCSS = new RegExp("^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$", "g");

  // Note: an element does not contain itself
  jQuery.contains = function (a, b) {
    var bup = b && b.parentNode;
    return a === bup || !!(bup && bup.nodeType === 1 && (
    // Support: IE 9 - 11+
    // IE doesn't have `contains` on SVG.
    a.contains ? a.contains(bup) : a.compareDocumentPosition && a.compareDocumentPosition(bup) & 16));
  };

  // CSS string/identifier serialization
  // https://drafts.csswg.org/cssom/#common-serializing-idioms
  var rcssescape = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g;
  function fcssescape(ch, asCodePoint) {
    if (asCodePoint) {
      // U+0000 NULL becomes U+FFFD REPLACEMENT CHARACTER
      if (ch === "\0") {
        return "\uFFFD";
      }

      // Control characters and (dependent upon position) numbers get escaped as code points
      return ch.slice(0, -1) + "\\" + ch.charCodeAt(ch.length - 1).toString(16) + " ";
    }

    // Other potentially-special ASCII characters get backslash-escaped
    return "\\" + ch;
  }
  jQuery.escapeSelector = function (sel) {
    return (sel + "").replace(rcssescape, fcssescape);
  };
  var preferredDoc = document,
    pushNative = push;
  (function () {
    var i,
      Expr,
      outermostContext,
      sortInput,
      hasDuplicate,
      push = pushNative,
      // Local document vars
      document,
      documentElement,
      documentIsHTML,
      rbuggyQSA,
      matches,
      // Instance-specific data
      expando = jQuery.expando,
      dirruns = 0,
      done = 0,
      classCache = createCache(),
      tokenCache = createCache(),
      compilerCache = createCache(),
      nonnativeSelectorCache = createCache(),
      sortOrder = function sortOrder(a, b) {
        if (a === b) {
          hasDuplicate = true;
        }
        return 0;
      },
      booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|" + "loop|multiple|open|readonly|required|scoped",
      // Regular expressions

      // https://www.w3.org/TR/css-syntax-3/#ident-token-diagram
      identifier = "(?:\\\\[\\da-fA-F]{1,6}" + whitespace + "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
      // Attribute selectors: https://www.w3.org/TR/selectors/#attribute-selectors
      attributes = "\\[" + whitespace + "*(" + identifier + ")(?:" + whitespace +
      // Operator (capture 2)
      "*([*^$|!~]?=)" + whitespace +
      // "Attribute values must be CSS identifiers [capture 5] or strings [capture 3 or capture 4]"
      "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" + whitespace + "*\\]",
      pseudos = ":(" + identifier + ")(?:\\((" +
      // To reduce the number of selectors needing tokenize in the preFilter, prefer arguments:
      // 1. quoted (capture 3; capture 4 or capture 5)
      "('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|" +
      // 2. simple (capture 6)
      "((?:\\\\.|[^\\\\()[\\]]|" + attributes + ")*)|" +
      // 3. anything else (capture 2)
      ".*" + ")\\)|)",
      // Leading and non-escaped trailing whitespace, capturing some non-whitespace characters preceding the latter
      rwhitespace = new RegExp(whitespace + "+", "g"),
      rcomma = new RegExp("^" + whitespace + "*," + whitespace + "*"),
      rleadingCombinator = new RegExp("^" + whitespace + "*([>+~]|" + whitespace + ")" + whitespace + "*"),
      rdescend = new RegExp(whitespace + "|>"),
      rpseudo = new RegExp(pseudos),
      ridentifier = new RegExp("^" + identifier + "$"),
      matchExpr = {
        ID: new RegExp("^#(" + identifier + ")"),
        CLASS: new RegExp("^\\.(" + identifier + ")"),
        TAG: new RegExp("^(" + identifier + "|[*])"),
        ATTR: new RegExp("^" + attributes),
        PSEUDO: new RegExp("^" + pseudos),
        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" + whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i"),
        bool: new RegExp("^(?:" + booleans + ")$", "i"),
        // For use in libraries implementing .is()
        // We use this for POS matching in `select`
        needsContext: new RegExp("^" + whitespace + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace + "*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i")
      },
      rinputs = /^(?:input|select|textarea|button)$/i,
      rheader = /^h\d$/i,
      // Easily-parseable/retrievable ID or TAG or CLASS selectors
      rquickExpr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
      rsibling = /[+~]/,
      // CSS escapes
      // https://www.w3.org/TR/CSS21/syndata.html#escaped-characters
      runescape = new RegExp("\\\\[\\da-fA-F]{1,6}" + whitespace + "?|\\\\([^\\r\\n\\f])", "g"),
      funescape = function funescape(escape, nonHex) {
        var high = "0x" + escape.slice(1) - 0x10000;
        if (nonHex) {
          // Strip the backslash prefix from a non-hex escape sequence
          return nonHex;
        }

        // Replace a hexadecimal escape sequence with the encoded Unicode code point
        // Support: IE <=11+
        // For values outside the Basic Multilingual Plane (BMP), manually construct a
        // surrogate pair
        return high < 0 ? String.fromCharCode(high + 0x10000) : String.fromCharCode(high >> 10 | 0xD800, high & 0x3FF | 0xDC00);
      },
      // Used for iframes; see `setDocument`.
      // Support: IE 9 - 11+, Edge 12 - 18+
      // Removing the function wrapper causes a "Permission Denied"
      // error in IE/Edge.
      unloadHandler = function unloadHandler() {
        setDocument();
      },
      inDisabledFieldset = addCombinator(function (elem) {
        return elem.disabled === true && nodeName(elem, "fieldset");
      }, {
        dir: "parentNode",
        next: "legend"
      });

    // Support: IE <=9 only
    // Accessing document.activeElement can throw unexpectedly
    // https://bugs.jquery.com/ticket/13393
    function safeActiveElement() {
      try {
        return document.activeElement;
      } catch (err) {}
    }

    // Optimize for push.apply( _, NodeList )
    try {
      push.apply(arr = _slice.call(preferredDoc.childNodes), preferredDoc.childNodes);

      // Support: Android <=4.0
      // Detect silently failing push.apply
      // eslint-disable-next-line no-unused-expressions
      arr[preferredDoc.childNodes.length].nodeType;
    } catch (e) {
      push = {
        apply: function apply(target, els) {
          pushNative.apply(target, _slice.call(els));
        },
        call: function call(target) {
          pushNative.apply(target, _slice.call(arguments, 1));
        }
      };
    }
    function find(selector, context, results, seed) {
      var m,
        i,
        elem,
        nid,
        match,
        groups,
        newSelector,
        newContext = context && context.ownerDocument,
        // nodeType defaults to 9, since context defaults to document
        nodeType = context ? context.nodeType : 9;
      results = results || [];

      // Return early from calls with invalid selector or context
      if (typeof selector !== "string" || !selector || nodeType !== 1 && nodeType !== 9 && nodeType !== 11) {
        return results;
      }

      // Try to shortcut find operations (as opposed to filters) in HTML documents
      if (!seed) {
        setDocument(context);
        context = context || document;
        if (documentIsHTML) {
          // If the selector is sufficiently simple, try using a "get*By*" DOM method
          // (excepting DocumentFragment context, where the methods don't exist)
          if (nodeType !== 11 && (match = rquickExpr.exec(selector))) {
            // ID selector
            if (m = match[1]) {
              // Document context
              if (nodeType === 9) {
                if (elem = context.getElementById(m)) {
                  // Support: IE 9 only
                  // getElementById can match elements by name instead of ID
                  if (elem.id === m) {
                    push.call(results, elem);
                    return results;
                  }
                } else {
                  return results;
                }

                // Element context
              } else {
                // Support: IE 9 only
                // getElementById can match elements by name instead of ID
                if (newContext && (elem = newContext.getElementById(m)) && find.contains(context, elem) && elem.id === m) {
                  push.call(results, elem);
                  return results;
                }
              }

              // Type selector
            } else if (match[2]) {
              push.apply(results, context.getElementsByTagName(selector));
              return results;

              // Class selector
            } else if ((m = match[3]) && context.getElementsByClassName) {
              push.apply(results, context.getElementsByClassName(m));
              return results;
            }
          }

          // Take advantage of querySelectorAll
          if (!nonnativeSelectorCache[selector + " "] && (!rbuggyQSA || !rbuggyQSA.test(selector))) {
            newSelector = selector;
            newContext = context;

            // qSA considers elements outside a scoping root when evaluating child or
            // descendant combinators, which is not what we want.
            // In such cases, we work around the behavior by prefixing every selector in the
            // list with an ID selector referencing the scope context.
            // The technique has to be used as well when a leading combinator is used
            // as such selectors are not recognized by querySelectorAll.
            // Thanks to Andrew Dupont for this technique.
            if (nodeType === 1 && (rdescend.test(selector) || rleadingCombinator.test(selector))) {
              // Expand context for sibling selectors
              newContext = rsibling.test(selector) && testContext(context.parentNode) || context;

              // We can use :scope instead of the ID hack if the browser
              // supports it & if we're not changing the context.
              // Support: IE 11+, Edge 17 - 18+
              // IE/Edge sometimes throw a "Permission denied" error when
              // strict-comparing two documents; shallow comparisons work.
              // eslint-disable-next-line eqeqeq
              if (newContext != context || !support.scope) {
                // Capture the context ID, setting it first if necessary
                if (nid = context.getAttribute("id")) {
                  nid = jQuery.escapeSelector(nid);
                } else {
                  context.setAttribute("id", nid = expando);
                }
              }

              // Prefix every selector in the list
              groups = tokenize(selector);
              i = groups.length;
              while (i--) {
                groups[i] = (nid ? "#" + nid : ":scope") + " " + toSelector(groups[i]);
              }
              newSelector = groups.join(",");
            }
            try {
              push.apply(results, newContext.querySelectorAll(newSelector));
              return results;
            } catch (qsaError) {
              nonnativeSelectorCache(selector, true);
            } finally {
              if (nid === expando) {
                context.removeAttribute("id");
              }
            }
          }
        }
      }

      // All others
      return select(selector.replace(rtrimCSS, "$1"), context, results, seed);
    }

    /**
     * Create key-value caches of limited size
     * @returns {function(string, object)} Returns the Object data after storing it on itself with
     *	property name the (space-suffixed) string and (if the cache is larger than Expr.cacheLength)
     *	deleting the oldest entry
     */
    function createCache() {
      var keys = [];
      function cache(key, value) {
        // Use (key + " ") to avoid collision with native prototype properties
        // (see https://github.com/jquery/sizzle/issues/157)
        if (keys.push(key + " ") > Expr.cacheLength) {
          // Only keep the most recent entries
          delete cache[keys.shift()];
        }
        return cache[key + " "] = value;
      }
      return cache;
    }

    /**
     * Mark a function for special use by jQuery selector module
     * @param {Function} fn The function to mark
     */
    function markFunction(fn) {
      fn[expando] = true;
      return fn;
    }

    /**
     * Support testing using an element
     * @param {Function} fn Passed the created element and returns a boolean result
     */
    function assert(fn) {
      var el = document.createElement("fieldset");
      try {
        return !!fn(el);
      } catch (e) {
        return false;
      } finally {
        // Remove from its parent by default
        if (el.parentNode) {
          el.parentNode.removeChild(el);
        }

        // release memory in IE
        el = null;
      }
    }

    /**
     * Returns a function to use in pseudos for input types
     * @param {String} type
     */
    function createInputPseudo(type) {
      return function (elem) {
        return nodeName(elem, "input") && elem.type === type;
      };
    }

    /**
     * Returns a function to use in pseudos for buttons
     * @param {String} type
     */
    function createButtonPseudo(type) {
      return function (elem) {
        return (nodeName(elem, "input") || nodeName(elem, "button")) && elem.type === type;
      };
    }

    /**
     * Returns a function to use in pseudos for :enabled/:disabled
     * @param {Boolean} disabled true for :disabled; false for :enabled
     */
    function createDisabledPseudo(disabled) {
      // Known :disabled false positives: fieldset[disabled] > legend:nth-of-type(n+2) :can-disable
      return function (elem) {
        // Only certain elements can match :enabled or :disabled
        // https://html.spec.whatwg.org/multipage/scripting.html#selector-enabled
        // https://html.spec.whatwg.org/multipage/scripting.html#selector-disabled
        if ("form" in elem) {
          // Check for inherited disabledness on relevant non-disabled elements:
          // * listed form-associated elements in a disabled fieldset
          //   https://html.spec.whatwg.org/multipage/forms.html#category-listed
          //   https://html.spec.whatwg.org/multipage/forms.html#concept-fe-disabled
          // * option elements in a disabled optgroup
          //   https://html.spec.whatwg.org/multipage/forms.html#concept-option-disabled
          // All such elements have a "form" property.
          if (elem.parentNode && elem.disabled === false) {
            // Option elements defer to a parent optgroup if present
            if ("label" in elem) {
              if ("label" in elem.parentNode) {
                return elem.parentNode.disabled === disabled;
              } else {
                return elem.disabled === disabled;
              }
            }

            // Support: IE 6 - 11+
            // Use the isDisabled shortcut property to check for disabled fieldset ancestors
            return elem.isDisabled === disabled ||
            // Where there is no isDisabled, check manually
            elem.isDisabled !== !disabled && inDisabledFieldset(elem) === disabled;
          }
          return elem.disabled === disabled;

          // Try to winnow out elements that can't be disabled before trusting the disabled property.
          // Some victims get caught in our net (label, legend, menu, track), but it shouldn't
          // even exist on them, let alone have a boolean value.
        } else if ("label" in elem) {
          return elem.disabled === disabled;
        }

        // Remaining elements are neither :enabled nor :disabled
        return false;
      };
    }

    /**
     * Returns a function to use in pseudos for positionals
     * @param {Function} fn
     */
    function createPositionalPseudo(fn) {
      return markFunction(function (argument) {
        argument = +argument;
        return markFunction(function (seed, matches) {
          var j,
            matchIndexes = fn([], seed.length, argument),
            i = matchIndexes.length;

          // Match elements found at the specified indexes
          while (i--) {
            if (seed[j = matchIndexes[i]]) {
              seed[j] = !(matches[j] = seed[j]);
            }
          }
        });
      });
    }

    /**
     * Checks a node for validity as a jQuery selector context
     * @param {Element|Object=} context
     * @returns {Element|Object|Boolean} The input node if acceptable, otherwise a falsy value
     */
    function testContext(context) {
      return context && typeof context.getElementsByTagName !== "undefined" && context;
    }

    /**
     * Sets document-related variables once based on the current document
     * @param {Element|Object} [node] An element or document object to use to set the document
     * @returns {Object} Returns the current document
     */
    function setDocument(node) {
      var subWindow,
        doc = node ? node.ownerDocument || node : preferredDoc;

      // Return early if doc is invalid or already selected
      // Support: IE 11+, Edge 17 - 18+
      // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
      // two documents; shallow comparisons work.
      // eslint-disable-next-line eqeqeq
      if (doc == document || doc.nodeType !== 9 || !doc.documentElement) {
        return document;
      }

      // Update global variables
      document = doc;
      documentElement = document.documentElement;
      documentIsHTML = !jQuery.isXMLDoc(document);

      // Support: iOS 7 only, IE 9 - 11+
      // Older browsers didn't support unprefixed `matches`.
      matches = documentElement.matches || documentElement.webkitMatchesSelector || documentElement.msMatchesSelector;

      // Support: IE 9 - 11+, Edge 12 - 18+
      // Accessing iframe documents after unload throws "permission denied" errors (see trac-13936)
      // Support: IE 11+, Edge 17 - 18+
      // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
      // two documents; shallow comparisons work.
      // eslint-disable-next-line eqeqeq
      if (preferredDoc != document && (subWindow = document.defaultView) && subWindow.top !== subWindow) {
        // Support: IE 9 - 11+, Edge 12 - 18+
        subWindow.addEventListener("unload", unloadHandler);
      }

      // Support: IE <10
      // Check if getElementById returns elements by name
      // The broken getElementById methods don't pick up programmatically-set names,
      // so use a roundabout getElementsByName test
      support.getById = assert(function (el) {
        documentElement.appendChild(el).id = jQuery.expando;
        return !document.getElementsByName || !document.getElementsByName(jQuery.expando).length;
      });

      // Support: IE 9 only
      // Check to see if it's possible to do matchesSelector
      // on a disconnected node.
      support.disconnectedMatch = assert(function (el) {
        return matches.call(el, "*");
      });

      // Support: IE 9 - 11+, Edge 12 - 18+
      // IE/Edge don't support the :scope pseudo-class.
      support.scope = assert(function () {
        return document.querySelectorAll(":scope");
      });

      // Support: Chrome 105 - 111 only, Safari 15.4 - 16.3 only
      // Make sure the `:has()` argument is parsed unforgivingly.
      // We include `*` in the test to detect buggy implementations that are
      // _selectively_ forgiving (specifically when the list includes at least
      // one valid selector).
      // Note that we treat complete lack of support for `:has()` as if it were
      // spec-compliant support, which is fine because use of `:has()` in such
      // environments will fail in the qSA path and fall back to jQuery traversal
      // anyway.
      support.cssHas = assert(function () {
        try {
          document.querySelector(":has(*,:jqfake)");
          return false;
        } catch (e) {
          return true;
        }
      });

      // ID filter and find
      if (support.getById) {
        Expr.filter.ID = function (id) {
          var attrId = id.replace(runescape, funescape);
          return function (elem) {
            return elem.getAttribute("id") === attrId;
          };
        };
        Expr.find.ID = function (id, context) {
          if (typeof context.getElementById !== "undefined" && documentIsHTML) {
            var elem = context.getElementById(id);
            return elem ? [elem] : [];
          }
        };
      } else {
        Expr.filter.ID = function (id) {
          var attrId = id.replace(runescape, funescape);
          return function (elem) {
            var node = typeof elem.getAttributeNode !== "undefined" && elem.getAttributeNode("id");
            return node && node.value === attrId;
          };
        };

        // Support: IE 6 - 7 only
        // getElementById is not reliable as a find shortcut
        Expr.find.ID = function (id, context) {
          if (typeof context.getElementById !== "undefined" && documentIsHTML) {
            var node,
              i,
              elems,
              elem = context.getElementById(id);
            if (elem) {
              // Verify the id attribute
              node = elem.getAttributeNode("id");
              if (node && node.value === id) {
                return [elem];
              }

              // Fall back on getElementsByName
              elems = context.getElementsByName(id);
              i = 0;
              while (elem = elems[i++]) {
                node = elem.getAttributeNode("id");
                if (node && node.value === id) {
                  return [elem];
                }
              }
            }
            return [];
          }
        };
      }

      // Tag
      Expr.find.TAG = function (tag, context) {
        if (typeof context.getElementsByTagName !== "undefined") {
          return context.getElementsByTagName(tag);

          // DocumentFragment nodes don't have gEBTN
        } else {
          return context.querySelectorAll(tag);
        }
      };

      // Class
      Expr.find.CLASS = function (className, context) {
        if (typeof context.getElementsByClassName !== "undefined" && documentIsHTML) {
          return context.getElementsByClassName(className);
        }
      };

      /* QSA/matchesSelector
      ---------------------------------------------------------------------- */

      // QSA and matchesSelector support

      rbuggyQSA = [];

      // Build QSA regex
      // Regex strategy adopted from Diego Perini
      assert(function (el) {
        var input;
        documentElement.appendChild(el).innerHTML = "<a id='" + expando + "' href='' disabled='disabled'></a>" + "<select id='" + expando + "-\r\\' disabled='disabled'>" + "<option selected=''></option></select>";

        // Support: iOS <=7 - 8 only
        // Boolean attributes and "value" are not treated correctly in some XML documents
        if (!el.querySelectorAll("[selected]").length) {
          rbuggyQSA.push("\\[" + whitespace + "*(?:value|" + booleans + ")");
        }

        // Support: iOS <=7 - 8 only
        if (!el.querySelectorAll("[id~=" + expando + "-]").length) {
          rbuggyQSA.push("~=");
        }

        // Support: iOS 8 only
        // https://bugs.webkit.org/show_bug.cgi?id=136851
        // In-page `selector#id sibling-combinator selector` fails
        if (!el.querySelectorAll("a#" + expando + "+*").length) {
          rbuggyQSA.push(".#.+[+~]");
        }

        // Support: Chrome <=105+, Firefox <=104+, Safari <=15.4+
        // In some of the document kinds, these selectors wouldn't work natively.
        // This is probably OK but for backwards compatibility we want to maintain
        // handling them through jQuery traversal in jQuery 3.x.
        if (!el.querySelectorAll(":checked").length) {
          rbuggyQSA.push(":checked");
        }

        // Support: Windows 8 Native Apps
        // The type and name attributes are restricted during .innerHTML assignment
        input = document.createElement("input");
        input.setAttribute("type", "hidden");
        el.appendChild(input).setAttribute("name", "D");

        // Support: IE 9 - 11+
        // IE's :disabled selector does not pick up the children of disabled fieldsets
        // Support: Chrome <=105+, Firefox <=104+, Safari <=15.4+
        // In some of the document kinds, these selectors wouldn't work natively.
        // This is probably OK but for backwards compatibility we want to maintain
        // handling them through jQuery traversal in jQuery 3.x.
        documentElement.appendChild(el).disabled = true;
        if (el.querySelectorAll(":disabled").length !== 2) {
          rbuggyQSA.push(":enabled", ":disabled");
        }

        // Support: IE 11+, Edge 15 - 18+
        // IE 11/Edge don't find elements on a `[name='']` query in some cases.
        // Adding a temporary attribute to the document before the selection works
        // around the issue.
        // Interestingly, IE 10 & older don't seem to have the issue.
        input = document.createElement("input");
        input.setAttribute("name", "");
        el.appendChild(input);
        if (!el.querySelectorAll("[name='']").length) {
          rbuggyQSA.push("\\[" + whitespace + "*name" + whitespace + "*=" + whitespace + "*(?:''|\"\")");
        }
      });
      if (!support.cssHas) {
        // Support: Chrome 105 - 110+, Safari 15.4 - 16.3+
        // Our regular `try-catch` mechanism fails to detect natively-unsupported
        // pseudo-classes inside `:has()` (such as `:has(:contains("Foo"))`)
        // in browsers that parse the `:has()` argument as a forgiving selector list.
        // https://drafts.csswg.org/selectors/#relational now requires the argument
        // to be parsed unforgivingly, but browsers have not yet fully adjusted.
        rbuggyQSA.push(":has");
      }
      rbuggyQSA = rbuggyQSA.length && new RegExp(rbuggyQSA.join("|"));

      /* Sorting
      ---------------------------------------------------------------------- */

      // Document order sorting
      sortOrder = function sortOrder(a, b) {
        // Flag for duplicate removal
        if (a === b) {
          hasDuplicate = true;
          return 0;
        }

        // Sort on method existence if only one input has compareDocumentPosition
        var compare = !a.compareDocumentPosition - !b.compareDocumentPosition;
        if (compare) {
          return compare;
        }

        // Calculate position if both inputs belong to the same document
        // Support: IE 11+, Edge 17 - 18+
        // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
        // two documents; shallow comparisons work.
        // eslint-disable-next-line eqeqeq
        compare = (a.ownerDocument || a) == (b.ownerDocument || b) ? a.compareDocumentPosition(b) :
        // Otherwise we know they are disconnected
        1;

        // Disconnected nodes
        if (compare & 1 || !support.sortDetached && b.compareDocumentPosition(a) === compare) {
          // Choose the first element that is related to our preferred document
          // Support: IE 11+, Edge 17 - 18+
          // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
          // two documents; shallow comparisons work.
          // eslint-disable-next-line eqeqeq
          if (a === document || a.ownerDocument == preferredDoc && find.contains(preferredDoc, a)) {
            return -1;
          }

          // Support: IE 11+, Edge 17 - 18+
          // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
          // two documents; shallow comparisons work.
          // eslint-disable-next-line eqeqeq
          if (b === document || b.ownerDocument == preferredDoc && find.contains(preferredDoc, b)) {
            return 1;
          }

          // Maintain original order
          return sortInput ? indexOf.call(sortInput, a) - indexOf.call(sortInput, b) : 0;
        }
        return compare & 4 ? -1 : 1;
      };
      return document;
    }
    find.matches = function (expr, elements) {
      return find(expr, null, null, elements);
    };
    find.matchesSelector = function (elem, expr) {
      setDocument(elem);
      if (documentIsHTML && !nonnativeSelectorCache[expr + " "] && (!rbuggyQSA || !rbuggyQSA.test(expr))) {
        try {
          var ret = matches.call(elem, expr);

          // IE 9's matchesSelector returns false on disconnected nodes
          if (ret || support.disconnectedMatch ||
          // As well, disconnected nodes are said to be in a document
          // fragment in IE 9
          elem.document && elem.document.nodeType !== 11) {
            return ret;
          }
        } catch (e) {
          nonnativeSelectorCache(expr, true);
        }
      }
      return find(expr, document, null, [elem]).length > 0;
    };
    find.contains = function (context, elem) {
      // Set document vars if needed
      // Support: IE 11+, Edge 17 - 18+
      // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
      // two documents; shallow comparisons work.
      // eslint-disable-next-line eqeqeq
      if ((context.ownerDocument || context) != document) {
        setDocument(context);
      }
      return jQuery.contains(context, elem);
    };
    find.attr = function (elem, name) {
      // Set document vars if needed
      // Support: IE 11+, Edge 17 - 18+
      // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
      // two documents; shallow comparisons work.
      // eslint-disable-next-line eqeqeq
      if ((elem.ownerDocument || elem) != document) {
        setDocument(elem);
      }
      var fn = Expr.attrHandle[name.toLowerCase()],
        // Don't get fooled by Object.prototype properties (see trac-13807)
        val = fn && hasOwn.call(Expr.attrHandle, name.toLowerCase()) ? fn(elem, name, !documentIsHTML) : undefined;
      if (val !== undefined) {
        return val;
      }
      return elem.getAttribute(name);
    };
    find.error = function (msg) {
      throw new Error("Syntax error, unrecognized expression: " + msg);
    };

    /**
     * Document sorting and removing duplicates
     * @param {ArrayLike} results
     */
    jQuery.uniqueSort = function (results) {
      var elem,
        duplicates = [],
        j = 0,
        i = 0;

      // Unless we *know* we can detect duplicates, assume their presence
      //
      // Support: Android <=4.0+
      // Testing for detecting duplicates is unpredictable so instead assume we can't
      // depend on duplicate detection in all browsers without a stable sort.
      hasDuplicate = !support.sortStable;
      sortInput = !support.sortStable && _slice.call(results, 0);
      sort.call(results, sortOrder);
      if (hasDuplicate) {
        while (elem = results[i++]) {
          if (elem === results[i]) {
            j = duplicates.push(i);
          }
        }
        while (j--) {
          splice.call(results, duplicates[j], 1);
        }
      }

      // Clear input after sorting to release objects
      // See https://github.com/jquery/sizzle/pull/225
      sortInput = null;
      return results;
    };
    jQuery.fn.uniqueSort = function () {
      return this.pushStack(jQuery.uniqueSort(_slice.apply(this)));
    };
    Expr = jQuery.expr = {
      // Can be adjusted by the user
      cacheLength: 50,
      createPseudo: markFunction,
      match: matchExpr,
      attrHandle: {},
      find: {},
      relative: {
        ">": {
          dir: "parentNode",
          first: true
        },
        " ": {
          dir: "parentNode"
        },
        "+": {
          dir: "previousSibling",
          first: true
        },
        "~": {
          dir: "previousSibling"
        }
      },
      preFilter: {
        ATTR: function ATTR(match) {
          match[1] = match[1].replace(runescape, funescape);

          // Move the given value to match[3] whether quoted or unquoted
          match[3] = (match[3] || match[4] || match[5] || "").replace(runescape, funescape);
          if (match[2] === "~=") {
            match[3] = " " + match[3] + " ";
          }
          return match.slice(0, 4);
        },
        CHILD: function CHILD(match) {
          /* matches from matchExpr["CHILD"]
          	1 type (only|nth|...)
          	2 what (child|of-type)
          	3 argument (even|odd|\d*|\d*n([+-]\d+)?|...)
          	4 xn-component of xn+y argument ([+-]?\d*n|)
          	5 sign of xn-component
          	6 x of xn-component
          	7 sign of y-component
          	8 y of y-component
          */
          match[1] = match[1].toLowerCase();
          if (match[1].slice(0, 3) === "nth") {
            // nth-* requires argument
            if (!match[3]) {
              find.error(match[0]);
            }

            // numeric x and y parameters for Expr.filter.CHILD
            // remember that false/true cast respectively to 0/1
            match[4] = +(match[4] ? match[5] + (match[6] || 1) : 2 * (match[3] === "even" || match[3] === "odd"));
            match[5] = +(match[7] + match[8] || match[3] === "odd");

            // other types prohibit arguments
          } else if (match[3]) {
            find.error(match[0]);
          }
          return match;
        },
        PSEUDO: function PSEUDO(match) {
          var excess,
            unquoted = !match[6] && match[2];
          if (matchExpr.CHILD.test(match[0])) {
            return null;
          }

          // Accept quoted arguments as-is
          if (match[3]) {
            match[2] = match[4] || match[5] || "";

            // Strip excess characters from unquoted arguments
          } else if (unquoted && rpseudo.test(unquoted) && (
          // Get excess from tokenize (recursively)
          excess = tokenize(unquoted, true)) && (
          // advance to the next closing parenthesis
          excess = unquoted.indexOf(")", unquoted.length - excess) - unquoted.length)) {
            // excess is a negative index
            match[0] = match[0].slice(0, excess);
            match[2] = unquoted.slice(0, excess);
          }

          // Return only captures needed by the pseudo filter method (type and argument)
          return match.slice(0, 3);
        }
      },
      filter: {
        TAG: function TAG(nodeNameSelector) {
          var expectedNodeName = nodeNameSelector.replace(runescape, funescape).toLowerCase();
          return nodeNameSelector === "*" ? function () {
            return true;
          } : function (elem) {
            return nodeName(elem, expectedNodeName);
          };
        },
        CLASS: function CLASS(className) {
          var pattern = classCache[className + " "];
          return pattern || (pattern = new RegExp("(^|" + whitespace + ")" + className + "(" + whitespace + "|$)")) && classCache(className, function (elem) {
            return pattern.test(typeof elem.className === "string" && elem.className || typeof elem.getAttribute !== "undefined" && elem.getAttribute("class") || "");
          });
        },
        ATTR: function ATTR(name, operator, check) {
          return function (elem) {
            var result = find.attr(elem, name);
            if (result == null) {
              return operator === "!=";
            }
            if (!operator) {
              return true;
            }
            result += "";
            if (operator === "=") {
              return result === check;
            }
            if (operator === "!=") {
              return result !== check;
            }
            if (operator === "^=") {
              return check && result.indexOf(check) === 0;
            }
            if (operator === "*=") {
              return check && result.indexOf(check) > -1;
            }
            if (operator === "$=") {
              return check && result.slice(-check.length) === check;
            }
            if (operator === "~=") {
              return (" " + result.replace(rwhitespace, " ") + " ").indexOf(check) > -1;
            }
            if (operator === "|=") {
              return result === check || result.slice(0, check.length + 1) === check + "-";
            }
            return false;
          };
        },
        CHILD: function CHILD(type, what, _argument, first, last) {
          var simple = type.slice(0, 3) !== "nth",
            forward = type.slice(-4) !== "last",
            ofType = what === "of-type";
          return first === 1 && last === 0 ?
          // Shortcut for :nth-*(n)
          function (elem) {
            return !!elem.parentNode;
          } : function (elem, _context, xml) {
            var cache,
              outerCache,
              node,
              nodeIndex,
              start,
              dir = simple !== forward ? "nextSibling" : "previousSibling",
              parent = elem.parentNode,
              name = ofType && elem.nodeName.toLowerCase(),
              useCache = !xml && !ofType,
              diff = false;
            if (parent) {
              // :(first|last|only)-(child|of-type)
              if (simple) {
                while (dir) {
                  node = elem;
                  while (node = node[dir]) {
                    if (ofType ? nodeName(node, name) : node.nodeType === 1) {
                      return false;
                    }
                  }

                  // Reverse direction for :only-* (if we haven't yet done so)
                  start = dir = type === "only" && !start && "nextSibling";
                }
                return true;
              }
              start = [forward ? parent.firstChild : parent.lastChild];

              // non-xml :nth-child(...) stores cache data on `parent`
              if (forward && useCache) {
                // Seek `elem` from a previously-cached index
                outerCache = parent[expando] || (parent[expando] = {});
                cache = outerCache[type] || [];
                nodeIndex = cache[0] === dirruns && cache[1];
                diff = nodeIndex && cache[2];
                node = nodeIndex && parent.childNodes[nodeIndex];
                while (node = ++nodeIndex && node && node[dir] || (
                // Fallback to seeking `elem` from the start
                diff = nodeIndex = 0) || start.pop()) {
                  // When found, cache indexes on `parent` and break
                  if (node.nodeType === 1 && ++diff && node === elem) {
                    outerCache[type] = [dirruns, nodeIndex, diff];
                    break;
                  }
                }
              } else {
                // Use previously-cached element index if available
                if (useCache) {
                  outerCache = elem[expando] || (elem[expando] = {});
                  cache = outerCache[type] || [];
                  nodeIndex = cache[0] === dirruns && cache[1];
                  diff = nodeIndex;
                }

                // xml :nth-child(...)
                // or :nth-last-child(...) or :nth(-last)?-of-type(...)
                if (diff === false) {
                  // Use the same loop as above to seek `elem` from the start
                  while (node = ++nodeIndex && node && node[dir] || (diff = nodeIndex = 0) || start.pop()) {
                    if ((ofType ? nodeName(node, name) : node.nodeType === 1) && ++diff) {
                      // Cache the index of each encountered element
                      if (useCache) {
                        outerCache = node[expando] || (node[expando] = {});
                        outerCache[type] = [dirruns, diff];
                      }
                      if (node === elem) {
                        break;
                      }
                    }
                  }
                }
              }

              // Incorporate the offset, then check against cycle size
              diff -= last;
              return diff === first || diff % first === 0 && diff / first >= 0;
            }
          };
        },
        PSEUDO: function PSEUDO(pseudo, argument) {
          // pseudo-class names are case-insensitive
          // https://www.w3.org/TR/selectors/#pseudo-classes
          // Prioritize by case sensitivity in case custom pseudos are added with uppercase letters
          // Remember that setFilters inherits from pseudos
          var args,
            fn = Expr.pseudos[pseudo] || Expr.setFilters[pseudo.toLowerCase()] || find.error("unsupported pseudo: " + pseudo);

          // The user may use createPseudo to indicate that
          // arguments are needed to create the filter function
          // just as jQuery does
          if (fn[expando]) {
            return fn(argument);
          }

          // But maintain support for old signatures
          if (fn.length > 1) {
            args = [pseudo, pseudo, "", argument];
            return Expr.setFilters.hasOwnProperty(pseudo.toLowerCase()) ? markFunction(function (seed, matches) {
              var idx,
                matched = fn(seed, argument),
                i = matched.length;
              while (i--) {
                idx = indexOf.call(seed, matched[i]);
                seed[idx] = !(matches[idx] = matched[i]);
              }
            }) : function (elem) {
              return fn(elem, 0, args);
            };
          }
          return fn;
        }
      },
      pseudos: {
        // Potentially complex pseudos
        not: markFunction(function (selector) {
          // Trim the selector passed to compile
          // to avoid treating leading and trailing
          // spaces as combinators
          var input = [],
            results = [],
            matcher = compile(selector.replace(rtrimCSS, "$1"));
          return matcher[expando] ? markFunction(function (seed, matches, _context, xml) {
            var elem,
              unmatched = matcher(seed, null, xml, []),
              i = seed.length;

            // Match elements unmatched by `matcher`
            while (i--) {
              if (elem = unmatched[i]) {
                seed[i] = !(matches[i] = elem);
              }
            }
          }) : function (elem, _context, xml) {
            input[0] = elem;
            matcher(input, null, xml, results);

            // Don't keep the element
            // (see https://github.com/jquery/sizzle/issues/299)
            input[0] = null;
            return !results.pop();
          };
        }),
        has: markFunction(function (selector) {
          return function (elem) {
            return find(selector, elem).length > 0;
          };
        }),
        contains: markFunction(function (text) {
          text = text.replace(runescape, funescape);
          return function (elem) {
            return (elem.textContent || jQuery.text(elem)).indexOf(text) > -1;
          };
        }),
        // "Whether an element is represented by a :lang() selector
        // is based solely on the element's language value
        // being equal to the identifier C,
        // or beginning with the identifier C immediately followed by "-".
        // The matching of C against the element's language value is performed case-insensitively.
        // The identifier C does not have to be a valid language name."
        // https://www.w3.org/TR/selectors/#lang-pseudo
        lang: markFunction(function (lang) {
          // lang value must be a valid identifier
          if (!ridentifier.test(lang || "")) {
            find.error("unsupported lang: " + lang);
          }
          lang = lang.replace(runescape, funescape).toLowerCase();
          return function (elem) {
            var elemLang;
            do {
              if (elemLang = documentIsHTML ? elem.lang : elem.getAttribute("xml:lang") || elem.getAttribute("lang")) {
                elemLang = elemLang.toLowerCase();
                return elemLang === lang || elemLang.indexOf(lang + "-") === 0;
              }
            } while ((elem = elem.parentNode) && elem.nodeType === 1);
            return false;
          };
        }),
        // Miscellaneous
        target: function target(elem) {
          var hash = window.location && window.location.hash;
          return hash && hash.slice(1) === elem.id;
        },
        root: function root(elem) {
          return elem === documentElement;
        },
        focus: function focus(elem) {
          return elem === safeActiveElement() && document.hasFocus() && !!(elem.type || elem.href || ~elem.tabIndex);
        },
        // Boolean properties
        enabled: createDisabledPseudo(false),
        disabled: createDisabledPseudo(true),
        checked: function checked(elem) {
          // In CSS3, :checked should return both checked and selected elements
          // https://www.w3.org/TR/2011/REC-css3-selectors-20110929/#checked
          return nodeName(elem, "input") && !!elem.checked || nodeName(elem, "option") && !!elem.selected;
        },
        selected: function selected(elem) {
          // Support: IE <=11+
          // Accessing the selectedIndex property
          // forces the browser to treat the default option as
          // selected when in an optgroup.
          if (elem.parentNode) {
            // eslint-disable-next-line no-unused-expressions
            elem.parentNode.selectedIndex;
          }
          return elem.selected === true;
        },
        // Contents
        empty: function empty(elem) {
          // https://www.w3.org/TR/selectors/#empty-pseudo
          // :empty is negated by element (1) or content nodes (text: 3; cdata: 4; entity ref: 5),
          //   but not by others (comment: 8; processing instruction: 7; etc.)
          // nodeType < 6 works because attributes (2) do not appear as children
          for (elem = elem.firstChild; elem; elem = elem.nextSibling) {
            if (elem.nodeType < 6) {
              return false;
            }
          }
          return true;
        },
        parent: function parent(elem) {
          return !Expr.pseudos.empty(elem);
        },
        // Element/input types
        header: function header(elem) {
          return rheader.test(elem.nodeName);
        },
        input: function input(elem) {
          return rinputs.test(elem.nodeName);
        },
        button: function button(elem) {
          return nodeName(elem, "input") && elem.type === "button" || nodeName(elem, "button");
        },
        text: function text(elem) {
          var attr;
          return nodeName(elem, "input") && elem.type === "text" && (
          // Support: IE <10 only
          // New HTML5 attribute values (e.g., "search") appear
          // with elem.type === "text"
          (attr = elem.getAttribute("type")) == null || attr.toLowerCase() === "text");
        },
        // Position-in-collection
        first: createPositionalPseudo(function () {
          return [0];
        }),
        last: createPositionalPseudo(function (_matchIndexes, length) {
          return [length - 1];
        }),
        eq: createPositionalPseudo(function (_matchIndexes, length, argument) {
          return [argument < 0 ? argument + length : argument];
        }),
        even: createPositionalPseudo(function (matchIndexes, length) {
          var i = 0;
          for (; i < length; i += 2) {
            matchIndexes.push(i);
          }
          return matchIndexes;
        }),
        odd: createPositionalPseudo(function (matchIndexes, length) {
          var i = 1;
          for (; i < length; i += 2) {
            matchIndexes.push(i);
          }
          return matchIndexes;
        }),
        lt: createPositionalPseudo(function (matchIndexes, length, argument) {
          var i;
          if (argument < 0) {
            i = argument + length;
          } else if (argument > length) {
            i = length;
          } else {
            i = argument;
          }
          for (; --i >= 0;) {
            matchIndexes.push(i);
          }
          return matchIndexes;
        }),
        gt: createPositionalPseudo(function (matchIndexes, length, argument) {
          var i = argument < 0 ? argument + length : argument;
          for (; ++i < length;) {
            matchIndexes.push(i);
          }
          return matchIndexes;
        })
      }
    };
    Expr.pseudos.nth = Expr.pseudos.eq;

    // Add button/input type pseudos
    for (i in {
      radio: true,
      checkbox: true,
      file: true,
      password: true,
      image: true
    }) {
      Expr.pseudos[i] = createInputPseudo(i);
    }
    for (i in {
      submit: true,
      reset: true
    }) {
      Expr.pseudos[i] = createButtonPseudo(i);
    }

    // Easy API for creating new setFilters
    function setFilters() {}
    setFilters.prototype = Expr.filters = Expr.pseudos;
    Expr.setFilters = new setFilters();
    function tokenize(selector, parseOnly) {
      var matched,
        match,
        tokens,
        type,
        soFar,
        groups,
        preFilters,
        cached = tokenCache[selector + " "];
      if (cached) {
        return parseOnly ? 0 : cached.slice(0);
      }
      soFar = selector;
      groups = [];
      preFilters = Expr.preFilter;
      while (soFar) {
        // Comma and first run
        if (!matched || (match = rcomma.exec(soFar))) {
          if (match) {
            // Don't consume trailing commas as valid
            soFar = soFar.slice(match[0].length) || soFar;
          }
          groups.push(tokens = []);
        }
        matched = false;

        // Combinators
        if (match = rleadingCombinator.exec(soFar)) {
          matched = match.shift();
          tokens.push({
            value: matched,
            // Cast descendant combinators to space
            type: match[0].replace(rtrimCSS, " ")
          });
          soFar = soFar.slice(matched.length);
        }

        // Filters
        for (type in Expr.filter) {
          if ((match = matchExpr[type].exec(soFar)) && (!preFilters[type] || (match = preFilters[type](match)))) {
            matched = match.shift();
            tokens.push({
              value: matched,
              type: type,
              matches: match
            });
            soFar = soFar.slice(matched.length);
          }
        }
        if (!matched) {
          break;
        }
      }

      // Return the length of the invalid excess
      // if we're just parsing
      // Otherwise, throw an error or return tokens
      if (parseOnly) {
        return soFar.length;
      }
      return soFar ? find.error(selector) :
      // Cache the tokens
      tokenCache(selector, groups).slice(0);
    }
    function toSelector(tokens) {
      var i = 0,
        len = tokens.length,
        selector = "";
      for (; i < len; i++) {
        selector += tokens[i].value;
      }
      return selector;
    }
    function addCombinator(matcher, combinator, base) {
      var dir = combinator.dir,
        skip = combinator.next,
        key = skip || dir,
        checkNonElements = base && key === "parentNode",
        doneName = done++;
      return combinator.first ?
      // Check against closest ancestor/preceding element
      function (elem, context, xml) {
        while (elem = elem[dir]) {
          if (elem.nodeType === 1 || checkNonElements) {
            return matcher(elem, context, xml);
          }
        }
        return false;
      } :
      // Check against all ancestor/preceding elements
      function (elem, context, xml) {
        var oldCache,
          outerCache,
          newCache = [dirruns, doneName];

        // We can't set arbitrary data on XML nodes, so they don't benefit from combinator caching
        if (xml) {
          while (elem = elem[dir]) {
            if (elem.nodeType === 1 || checkNonElements) {
              if (matcher(elem, context, xml)) {
                return true;
              }
            }
          }
        } else {
          while (elem = elem[dir]) {
            if (elem.nodeType === 1 || checkNonElements) {
              outerCache = elem[expando] || (elem[expando] = {});
              if (skip && nodeName(elem, skip)) {
                elem = elem[dir] || elem;
              } else if ((oldCache = outerCache[key]) && oldCache[0] === dirruns && oldCache[1] === doneName) {
                // Assign to newCache so results back-propagate to previous elements
                return newCache[2] = oldCache[2];
              } else {
                // Reuse newcache so results back-propagate to previous elements
                outerCache[key] = newCache;

                // A match means we're done; a fail means we have to keep checking
                if (newCache[2] = matcher(elem, context, xml)) {
                  return true;
                }
              }
            }
          }
        }
        return false;
      };
    }
    function elementMatcher(matchers) {
      return matchers.length > 1 ? function (elem, context, xml) {
        var i = matchers.length;
        while (i--) {
          if (!matchers[i](elem, context, xml)) {
            return false;
          }
        }
        return true;
      } : matchers[0];
    }
    function multipleContexts(selector, contexts, results) {
      var i = 0,
        len = contexts.length;
      for (; i < len; i++) {
        find(selector, contexts[i], results);
      }
      return results;
    }
    function condense(unmatched, map, filter, context, xml) {
      var elem,
        newUnmatched = [],
        i = 0,
        len = unmatched.length,
        mapped = map != null;
      for (; i < len; i++) {
        if (elem = unmatched[i]) {
          if (!filter || filter(elem, context, xml)) {
            newUnmatched.push(elem);
            if (mapped) {
              map.push(i);
            }
          }
        }
      }
      return newUnmatched;
    }
    function setMatcher(preFilter, selector, matcher, postFilter, postFinder, postSelector) {
      if (postFilter && !postFilter[expando]) {
        postFilter = setMatcher(postFilter);
      }
      if (postFinder && !postFinder[expando]) {
        postFinder = setMatcher(postFinder, postSelector);
      }
      return markFunction(function (seed, results, context, xml) {
        var temp,
          i,
          elem,
          matcherOut,
          preMap = [],
          postMap = [],
          preexisting = results.length,
          // Get initial elements from seed or context
          elems = seed || multipleContexts(selector || "*", context.nodeType ? [context] : context, []),
          // Prefilter to get matcher input, preserving a map for seed-results synchronization
          matcherIn = preFilter && (seed || !selector) ? condense(elems, preMap, preFilter, context, xml) : elems;
        if (matcher) {
          // If we have a postFinder, or filtered seed, or non-seed postFilter
          // or preexisting results,
          matcherOut = postFinder || (seed ? preFilter : preexisting || postFilter) ?
          // ...intermediate processing is necessary
          [] :
          // ...otherwise use results directly
          results;

          // Find primary matches
          matcher(matcherIn, matcherOut, context, xml);
        } else {
          matcherOut = matcherIn;
        }

        // Apply postFilter
        if (postFilter) {
          temp = condense(matcherOut, postMap);
          postFilter(temp, [], context, xml);

          // Un-match failing elements by moving them back to matcherIn
          i = temp.length;
          while (i--) {
            if (elem = temp[i]) {
              matcherOut[postMap[i]] = !(matcherIn[postMap[i]] = elem);
            }
          }
        }
        if (seed) {
          if (postFinder || preFilter) {
            if (postFinder) {
              // Get the final matcherOut by condensing this intermediate into postFinder contexts
              temp = [];
              i = matcherOut.length;
              while (i--) {
                if (elem = matcherOut[i]) {
                  // Restore matcherIn since elem is not yet a final match
                  temp.push(matcherIn[i] = elem);
                }
              }
              postFinder(null, matcherOut = [], temp, xml);
            }

            // Move matched elements from seed to results to keep them synchronized
            i = matcherOut.length;
            while (i--) {
              if ((elem = matcherOut[i]) && (temp = postFinder ? indexOf.call(seed, elem) : preMap[i]) > -1) {
                seed[temp] = !(results[temp] = elem);
              }
            }
          }

          // Add elements to results, through postFinder if defined
        } else {
          matcherOut = condense(matcherOut === results ? matcherOut.splice(preexisting, matcherOut.length) : matcherOut);
          if (postFinder) {
            postFinder(null, results, matcherOut, xml);
          } else {
            push.apply(results, matcherOut);
          }
        }
      });
    }
    function matcherFromTokens(tokens) {
      var checkContext,
        matcher,
        j,
        len = tokens.length,
        leadingRelative = Expr.relative[tokens[0].type],
        implicitRelative = leadingRelative || Expr.relative[" "],
        i = leadingRelative ? 1 : 0,
        // The foundational matcher ensures that elements are reachable from top-level context(s)
        matchContext = addCombinator(function (elem) {
          return elem === checkContext;
        }, implicitRelative, true),
        matchAnyContext = addCombinator(function (elem) {
          return indexOf.call(checkContext, elem) > -1;
        }, implicitRelative, true),
        matchers = [function (elem, context, xml) {
          // Support: IE 11+, Edge 17 - 18+
          // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
          // two documents; shallow comparisons work.
          // eslint-disable-next-line eqeqeq
          var ret = !leadingRelative && (xml || context != outermostContext) || ((checkContext = context).nodeType ? matchContext(elem, context, xml) : matchAnyContext(elem, context, xml));

          // Avoid hanging onto element
          // (see https://github.com/jquery/sizzle/issues/299)
          checkContext = null;
          return ret;
        }];
      for (; i < len; i++) {
        if (matcher = Expr.relative[tokens[i].type]) {
          matchers = [addCombinator(elementMatcher(matchers), matcher)];
        } else {
          matcher = Expr.filter[tokens[i].type].apply(null, tokens[i].matches);

          // Return special upon seeing a positional matcher
          if (matcher[expando]) {
            // Find the next relative operator (if any) for proper handling
            j = ++i;
            for (; j < len; j++) {
              if (Expr.relative[tokens[j].type]) {
                break;
              }
            }
            return setMatcher(i > 1 && elementMatcher(matchers), i > 1 && toSelector(
            // If the preceding token was a descendant combinator, insert an implicit any-element `*`
            tokens.slice(0, i - 1).concat({
              value: tokens[i - 2].type === " " ? "*" : ""
            })).replace(rtrimCSS, "$1"), matcher, i < j && matcherFromTokens(tokens.slice(i, j)), j < len && matcherFromTokens(tokens = tokens.slice(j)), j < len && toSelector(tokens));
          }
          matchers.push(matcher);
        }
      }
      return elementMatcher(matchers);
    }
    function matcherFromGroupMatchers(elementMatchers, setMatchers) {
      var bySet = setMatchers.length > 0,
        byElement = elementMatchers.length > 0,
        superMatcher = function superMatcher(seed, context, xml, results, outermost) {
          var elem,
            j,
            matcher,
            matchedCount = 0,
            i = "0",
            unmatched = seed && [],
            setMatched = [],
            contextBackup = outermostContext,
            // We must always have either seed elements or outermost context
            elems = seed || byElement && Expr.find.TAG("*", outermost),
            // Use integer dirruns iff this is the outermost matcher
            dirrunsUnique = dirruns += contextBackup == null ? 1 : Math.random() || 0.1,
            len = elems.length;
          if (outermost) {
            // Support: IE 11+, Edge 17 - 18+
            // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
            // two documents; shallow comparisons work.
            // eslint-disable-next-line eqeqeq
            outermostContext = context == document || context || outermost;
          }

          // Add elements passing elementMatchers directly to results
          // Support: iOS <=7 - 9 only
          // Tolerate NodeList properties (IE: "length"; Safari: <number>) matching
          // elements by id. (see trac-14142)
          for (; i !== len && (elem = elems[i]) != null; i++) {
            if (byElement && elem) {
              j = 0;

              // Support: IE 11+, Edge 17 - 18+
              // IE/Edge sometimes throw a "Permission denied" error when strict-comparing
              // two documents; shallow comparisons work.
              // eslint-disable-next-line eqeqeq
              if (!context && elem.ownerDocument != document) {
                setDocument(elem);
                xml = !documentIsHTML;
              }
              while (matcher = elementMatchers[j++]) {
                if (matcher(elem, context || document, xml)) {
                  push.call(results, elem);
                  break;
                }
              }
              if (outermost) {
                dirruns = dirrunsUnique;
              }
            }

            // Track unmatched elements for set filters
            if (bySet) {
              // They will have gone through all possible matchers
              if (elem = !matcher && elem) {
                matchedCount--;
              }

              // Lengthen the array for every element, matched or not
              if (seed) {
                unmatched.push(elem);
              }
            }
          }

          // `i` is now the count of elements visited above, and adding it to `matchedCount`
          // makes the latter nonnegative.
          matchedCount += i;

          // Apply set filters to unmatched elements
          // NOTE: This can be skipped if there are no unmatched elements (i.e., `matchedCount`
          // equals `i`), unless we didn't visit _any_ elements in the above loop because we have
          // no element matchers and no seed.
          // Incrementing an initially-string "0" `i` allows `i` to remain a string only in that
          // case, which will result in a "00" `matchedCount` that differs from `i` but is also
          // numerically zero.
          if (bySet && i !== matchedCount) {
            j = 0;
            while (matcher = setMatchers[j++]) {
              matcher(unmatched, setMatched, context, xml);
            }
            if (seed) {
              // Reintegrate element matches to eliminate the need for sorting
              if (matchedCount > 0) {
                while (i--) {
                  if (!(unmatched[i] || setMatched[i])) {
                    setMatched[i] = pop.call(results);
                  }
                }
              }

              // Discard index placeholder values to get only actual matches
              setMatched = condense(setMatched);
            }

            // Add matches to results
            push.apply(results, setMatched);

            // Seedless set matches succeeding multiple successful matchers stipulate sorting
            if (outermost && !seed && setMatched.length > 0 && matchedCount + setMatchers.length > 1) {
              jQuery.uniqueSort(results);
            }
          }

          // Override manipulation of globals by nested matchers
          if (outermost) {
            dirruns = dirrunsUnique;
            outermostContext = contextBackup;
          }
          return unmatched;
        };
      return bySet ? markFunction(superMatcher) : superMatcher;
    }
    function compile(selector, match /* Internal Use Only */) {
      var i,
        setMatchers = [],
        elementMatchers = [],
        cached = compilerCache[selector + " "];
      if (!cached) {
        // Generate a function of recursive functions that can be used to check each element
        if (!match) {
          match = tokenize(selector);
        }
        i = match.length;
        while (i--) {
          cached = matcherFromTokens(match[i]);
          if (cached[expando]) {
            setMatchers.push(cached);
          } else {
            elementMatchers.push(cached);
          }
        }

        // Cache the compiled function
        cached = compilerCache(selector, matcherFromGroupMatchers(elementMatchers, setMatchers));

        // Save selector and tokenization
        cached.selector = selector;
      }
      return cached;
    }

    /**
     * A low-level selection function that works with jQuery's compiled
     *  selector functions
     * @param {String|Function} selector A selector or a pre-compiled
     *  selector function built with jQuery selector compile
     * @param {Element} context
     * @param {Array} [results]
     * @param {Array} [seed] A set of elements to match against
     */
    function select(selector, context, results, seed) {
      var i,
        tokens,
        token,
        type,
        find,
        compiled = typeof selector === "function" && selector,
        match = !seed && tokenize(selector = compiled.selector || selector);
      results = results || [];

      // Try to minimize operations if there is only one selector in the list and no seed
      // (the latter of which guarantees us context)
      if (match.length === 1) {
        // Reduce context if the leading compound selector is an ID
        tokens = match[0] = match[0].slice(0);
        if (tokens.length > 2 && (token = tokens[0]).type === "ID" && context.nodeType === 9 && documentIsHTML && Expr.relative[tokens[1].type]) {
          context = (Expr.find.ID(token.matches[0].replace(runescape, funescape), context) || [])[0];
          if (!context) {
            return results;

            // Precompiled matchers will still verify ancestry, so step up a level
          } else if (compiled) {
            context = context.parentNode;
          }
          selector = selector.slice(tokens.shift().value.length);
        }

        // Fetch a seed set for right-to-left matching
        i = matchExpr.needsContext.test(selector) ? 0 : tokens.length;
        while (i--) {
          token = tokens[i];

          // Abort if we hit a combinator
          if (Expr.relative[type = token.type]) {
            break;
          }
          if (find = Expr.find[type]) {
            // Search, expanding context for leading sibling combinators
            if (seed = find(token.matches[0].replace(runescape, funescape), rsibling.test(tokens[0].type) && testContext(context.parentNode) || context)) {
              // If seed is empty or no tokens remain, we can return early
              tokens.splice(i, 1);
              selector = seed.length && toSelector(tokens);
              if (!selector) {
                push.apply(results, seed);
                return results;
              }
              break;
            }
          }
        }
      }

      // Compile and execute a filtering function if one is not provided
      // Provide `match` to avoid retokenization if we modified the selector above
      (compiled || compile(selector, match))(seed, context, !documentIsHTML, results, !context || rsibling.test(selector) && testContext(context.parentNode) || context);
      return results;
    }

    // One-time assignments

    // Support: Android <=4.0 - 4.1+
    // Sort stability
    support.sortStable = expando.split("").sort(sortOrder).join("") === expando;

    // Initialize against the default document
    setDocument();

    // Support: Android <=4.0 - 4.1+
    // Detached nodes confoundingly follow *each other*
    support.sortDetached = assert(function (el) {
      // Should return 1, but returns 4 (following)
      return el.compareDocumentPosition(document.createElement("fieldset")) & 1;
    });
    jQuery.find = find;

    // Deprecated
    jQuery.expr[":"] = jQuery.expr.pseudos;
    jQuery.unique = jQuery.uniqueSort;

    // These have always been private, but they used to be documented
    // as part of Sizzle so let's maintain them in the 3.x line
    // for backwards compatibility purposes.
    find.compile = compile;
    find.select = select;
    find.setDocument = setDocument;
    find.escape = jQuery.escapeSelector;
    find.getText = jQuery.text;
    find.isXML = jQuery.isXMLDoc;
    find.selectors = jQuery.expr;
    find.support = jQuery.support;
    find.uniqueSort = jQuery.uniqueSort;

    /* eslint-enable */
  })();

  var dir = function dir(elem, _dir, until) {
    var matched = [],
      truncate = until !== undefined;
    while ((elem = elem[_dir]) && elem.nodeType !== 9) {
      if (elem.nodeType === 1) {
        if (truncate && jQuery(elem).is(until)) {
          break;
        }
        matched.push(elem);
      }
    }
    return matched;
  };
  var _siblings = function siblings(n, elem) {
    var matched = [];
    for (; n; n = n.nextSibling) {
      if (n.nodeType === 1 && n !== elem) {
        matched.push(n);
      }
    }
    return matched;
  };
  var rneedsContext = jQuery.expr.match.needsContext;
  var rsingleTag = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

  // Implement the identical functionality for filter and not
  function winnow(elements, qualifier, not) {
    if (isFunction(qualifier)) {
      return jQuery.grep(elements, function (elem, i) {
        return !!qualifier.call(elem, i, elem) !== not;
      });
    }

    // Single element
    if (qualifier.nodeType) {
      return jQuery.grep(elements, function (elem) {
        return elem === qualifier !== not;
      });
    }

    // Arraylike of elements (jQuery, arguments, Array)
    if (typeof qualifier !== "string") {
      return jQuery.grep(elements, function (elem) {
        return indexOf.call(qualifier, elem) > -1 !== not;
      });
    }

    // Filtered directly for both simple and complex selectors
    return jQuery.filter(qualifier, elements, not);
  }
  jQuery.filter = function (expr, elems, not) {
    var elem = elems[0];
    if (not) {
      expr = ":not(" + expr + ")";
    }
    if (elems.length === 1 && elem.nodeType === 1) {
      return jQuery.find.matchesSelector(elem, expr) ? [elem] : [];
    }
    return jQuery.find.matches(expr, jQuery.grep(elems, function (elem) {
      return elem.nodeType === 1;
    }));
  };
  jQuery.fn.extend({
    find: function find(selector) {
      var i,
        ret,
        len = this.length,
        self = this;
      if (typeof selector !== "string") {
        return this.pushStack(jQuery(selector).filter(function () {
          for (i = 0; i < len; i++) {
            if (jQuery.contains(self[i], this)) {
              return true;
            }
          }
        }));
      }
      ret = this.pushStack([]);
      for (i = 0; i < len; i++) {
        jQuery.find(selector, self[i], ret);
      }
      return len > 1 ? jQuery.uniqueSort(ret) : ret;
    },
    filter: function filter(selector) {
      return this.pushStack(winnow(this, selector || [], false));
    },
    not: function not(selector) {
      return this.pushStack(winnow(this, selector || [], true));
    },
    is: function is(selector) {
      return !!winnow(this,
      // If this is a positional/relative selector, check membership in the returned set
      // so $("p:first").is("p:last") won't return true for a doc with two "p".
      typeof selector === "string" && rneedsContext.test(selector) ? jQuery(selector) : selector || [], false).length;
    }
  });

  // Initialize a jQuery object

  // A central reference to the root jQuery(document)
  var rootjQuery,
    // A simple way to check for HTML strings
    // Prioritize #id over <tag> to avoid XSS via location.hash (trac-9521)
    // Strict HTML recognition (trac-11290: must start with <)
    // Shortcut simple #id case for speed
    rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,
    init = jQuery.fn.init = function (selector, context, root) {
      var match, elem;

      // HANDLE: $(""), $(null), $(undefined), $(false)
      if (!selector) {
        return this;
      }

      // Method init() accepts an alternate rootjQuery
      // so migrate can support jQuery.sub (gh-2101)
      root = root || rootjQuery;

      // Handle HTML strings
      if (typeof selector === "string") {
        if (selector[0] === "<" && selector[selector.length - 1] === ">" && selector.length >= 3) {
          // Assume that strings that start and end with <> are HTML and skip the regex check
          match = [null, selector, null];
        } else {
          match = rquickExpr.exec(selector);
        }

        // Match html or make sure no context is specified for #id
        if (match && (match[1] || !context)) {
          // HANDLE: $(html) -> $(array)
          if (match[1]) {
            context = context instanceof jQuery ? context[0] : context;

            // Option to run scripts is true for back-compat
            // Intentionally let the error be thrown if parseHTML is not present
            jQuery.merge(this, jQuery.parseHTML(match[1], context && context.nodeType ? context.ownerDocument || context : document, true));

            // HANDLE: $(html, props)
            if (rsingleTag.test(match[1]) && jQuery.isPlainObject(context)) {
              for (match in context) {
                // Properties of context are called as methods if possible
                if (isFunction(this[match])) {
                  this[match](context[match]);

                  // ...and otherwise set as attributes
                } else {
                  this.attr(match, context[match]);
                }
              }
            }
            return this;

            // HANDLE: $(#id)
          } else {
            elem = document.getElementById(match[2]);
            if (elem) {
              // Inject the element directly into the jQuery object
              this[0] = elem;
              this.length = 1;
            }
            return this;
          }

          // HANDLE: $(expr, $(...))
        } else if (!context || context.jquery) {
          return (context || root).find(selector);

          // HANDLE: $(expr, context)
          // (which is just equivalent to: $(context).find(expr)
        } else {
          return this.constructor(context).find(selector);
        }

        // HANDLE: $(DOMElement)
      } else if (selector.nodeType) {
        this[0] = selector;
        this.length = 1;
        return this;

        // HANDLE: $(function)
        // Shortcut for document ready
      } else if (isFunction(selector)) {
        return root.ready !== undefined ? root.ready(selector) :
        // Execute immediately if ready is not present
        selector(jQuery);
      }
      return jQuery.makeArray(selector, this);
    };

  // Give the init function the jQuery prototype for later instantiation
  init.prototype = jQuery.fn;

  // Initialize central reference
  rootjQuery = jQuery(document);
  var rparentsprev = /^(?:parents|prev(?:Until|All))/,
    // Methods guaranteed to produce a unique set when starting from a unique set
    guaranteedUnique = {
      children: true,
      contents: true,
      next: true,
      prev: true
    };
  jQuery.fn.extend({
    has: function has(target) {
      var targets = jQuery(target, this),
        l = targets.length;
      return this.filter(function () {
        var i = 0;
        for (; i < l; i++) {
          if (jQuery.contains(this, targets[i])) {
            return true;
          }
        }
      });
    },
    closest: function closest(selectors, context) {
      var cur,
        i = 0,
        l = this.length,
        matched = [],
        targets = typeof selectors !== "string" && jQuery(selectors);

      // Positional selectors never match, since there's no _selection_ context
      if (!rneedsContext.test(selectors)) {
        for (; i < l; i++) {
          for (cur = this[i]; cur && cur !== context; cur = cur.parentNode) {
            // Always skip document fragments
            if (cur.nodeType < 11 && (targets ? targets.index(cur) > -1 :
            // Don't pass non-elements to jQuery#find
            cur.nodeType === 1 && jQuery.find.matchesSelector(cur, selectors))) {
              matched.push(cur);
              break;
            }
          }
        }
      }
      return this.pushStack(matched.length > 1 ? jQuery.uniqueSort(matched) : matched);
    },
    // Determine the position of an element within the set
    index: function index(elem) {
      // No argument, return index in parent
      if (!elem) {
        return this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
      }

      // Index in selector
      if (typeof elem === "string") {
        return indexOf.call(jQuery(elem), this[0]);
      }

      // Locate the position of the desired element
      return indexOf.call(this,
      // If it receives a jQuery object, the first element is used
      elem.jquery ? elem[0] : elem);
    },
    add: function add(selector, context) {
      return this.pushStack(jQuery.uniqueSort(jQuery.merge(this.get(), jQuery(selector, context))));
    },
    addBack: function addBack(selector) {
      return this.add(selector == null ? this.prevObject : this.prevObject.filter(selector));
    }
  });
  function sibling(cur, dir) {
    while ((cur = cur[dir]) && cur.nodeType !== 1) {}
    return cur;
  }
  jQuery.each({
    parent: function parent(elem) {
      var parent = elem.parentNode;
      return parent && parent.nodeType !== 11 ? parent : null;
    },
    parents: function parents(elem) {
      return dir(elem, "parentNode");
    },
    parentsUntil: function parentsUntil(elem, _i, until) {
      return dir(elem, "parentNode", until);
    },
    next: function next(elem) {
      return sibling(elem, "nextSibling");
    },
    prev: function prev(elem) {
      return sibling(elem, "previousSibling");
    },
    nextAll: function nextAll(elem) {
      return dir(elem, "nextSibling");
    },
    prevAll: function prevAll(elem) {
      return dir(elem, "previousSibling");
    },
    nextUntil: function nextUntil(elem, _i, until) {
      return dir(elem, "nextSibling", until);
    },
    prevUntil: function prevUntil(elem, _i, until) {
      return dir(elem, "previousSibling", until);
    },
    siblings: function siblings(elem) {
      return _siblings((elem.parentNode || {}).firstChild, elem);
    },
    children: function children(elem) {
      return _siblings(elem.firstChild);
    },
    contents: function contents(elem) {
      if (elem.contentDocument != null &&
      // Support: IE 11+
      // <object> elements with no `data` attribute has an object
      // `contentDocument` with a `null` prototype.
      getProto(elem.contentDocument)) {
        return elem.contentDocument;
      }

      // Support: IE 9 - 11 only, iOS 7 only, Android Browser <=4.3 only
      // Treat the template element as a regular one in browsers that
      // don't support it.
      if (nodeName(elem, "template")) {
        elem = elem.content || elem;
      }
      return jQuery.merge([], elem.childNodes);
    }
  }, function (name, fn) {
    jQuery.fn[name] = function (until, selector) {
      var matched = jQuery.map(this, fn, until);
      if (name.slice(-5) !== "Until") {
        selector = until;
      }
      if (selector && typeof selector === "string") {
        matched = jQuery.filter(selector, matched);
      }
      if (this.length > 1) {
        // Remove duplicates
        if (!guaranteedUnique[name]) {
          jQuery.uniqueSort(matched);
        }

        // Reverse order for parents* and prev-derivatives
        if (rparentsprev.test(name)) {
          matched.reverse();
        }
      }
      return this.pushStack(matched);
    };
  });
  var rnothtmlwhite = /[^\x20\t\r\n\f]+/g;

  // Convert String-formatted options into Object-formatted ones
  function createOptions(options) {
    var object = {};
    jQuery.each(options.match(rnothtmlwhite) || [], function (_, flag) {
      object[flag] = true;
    });
    return object;
  }

  /*
   * Create a callback list using the following parameters:
   *
   *	options: an optional list of space-separated options that will change how
   *			the callback list behaves or a more traditional option object
   *
   * By default a callback list will act like an event callback list and can be
   * "fired" multiple times.
   *
   * Possible options:
   *
   *	once:			will ensure the callback list can only be fired once (like a Deferred)
   *
   *	memory:			will keep track of previous values and will call any callback added
   *					after the list has been fired right away with the latest "memorized"
   *					values (like a Deferred)
   *
   *	unique:			will ensure a callback can only be added once (no duplicate in the list)
   *
   *	stopOnFalse:	interrupt callings when a callback returns false
   *
   */
  jQuery.Callbacks = function (options) {
    // Convert options from String-formatted to Object-formatted if needed
    // (we check in cache first)
    options = typeof options === "string" ? createOptions(options) : jQuery.extend({}, options);
    var
      // Flag to know if list is currently firing
      firing,
      // Last fire value for non-forgettable lists
      memory,
      // Flag to know if list was already fired
      _fired,
      // Flag to prevent firing
      _locked,
      // Actual callback list
      list = [],
      // Queue of execution data for repeatable lists
      queue = [],
      // Index of currently firing callback (modified by add/remove as needed)
      firingIndex = -1,
      // Fire callbacks
      fire = function fire() {
        // Enforce single-firing
        _locked = _locked || options.once;

        // Execute callbacks for all pending executions,
        // respecting firingIndex overrides and runtime changes
        _fired = firing = true;
        for (; queue.length; firingIndex = -1) {
          memory = queue.shift();
          while (++firingIndex < list.length) {
            // Run callback and check for early termination
            if (list[firingIndex].apply(memory[0], memory[1]) === false && options.stopOnFalse) {
              // Jump to end and forget the data so .add doesn't re-fire
              firingIndex = list.length;
              memory = false;
            }
          }
        }

        // Forget the data if we're done with it
        if (!options.memory) {
          memory = false;
        }
        firing = false;

        // Clean up if we're done firing for good
        if (_locked) {
          // Keep an empty list if we have data for future add calls
          if (memory) {
            list = [];

            // Otherwise, this object is spent
          } else {
            list = "";
          }
        }
      },
      // Actual Callbacks object
      self = {
        // Add a callback or a collection of callbacks to the list
        add: function add() {
          if (list) {
            // If we have memory from a past run, we should fire after adding
            if (memory && !firing) {
              firingIndex = list.length - 1;
              queue.push(memory);
            }
            (function add(args) {
              jQuery.each(args, function (_, arg) {
                if (isFunction(arg)) {
                  if (!options.unique || !self.has(arg)) {
                    list.push(arg);
                  }
                } else if (arg && arg.length && toType(arg) !== "string") {
                  // Inspect recursively
                  add(arg);
                }
              });
            })(arguments);
            if (memory && !firing) {
              fire();
            }
          }
          return this;
        },
        // Remove a callback from the list
        remove: function remove() {
          jQuery.each(arguments, function (_, arg) {
            var index;
            while ((index = jQuery.inArray(arg, list, index)) > -1) {
              list.splice(index, 1);

              // Handle firing indexes
              if (index <= firingIndex) {
                firingIndex--;
              }
            }
          });
          return this;
        },
        // Check if a given callback is in the list.
        // If no argument is given, return whether or not list has callbacks attached.
        has: function has(fn) {
          return fn ? jQuery.inArray(fn, list) > -1 : list.length > 0;
        },
        // Remove all callbacks from the list
        empty: function empty() {
          if (list) {
            list = [];
          }
          return this;
        },
        // Disable .fire and .add
        // Abort any current/pending executions
        // Clear all callbacks and values
        disable: function disable() {
          _locked = queue = [];
          list = memory = "";
          return this;
        },
        disabled: function disabled() {
          return !list;
        },
        // Disable .fire
        // Also disable .add unless we have memory (since it would have no effect)
        // Abort any pending executions
        lock: function lock() {
          _locked = queue = [];
          if (!memory && !firing) {
            list = memory = "";
          }
          return this;
        },
        locked: function locked() {
          return !!_locked;
        },
        // Call all callbacks with the given context and arguments
        fireWith: function fireWith(context, args) {
          if (!_locked) {
            args = args || [];
            args = [context, args.slice ? args.slice() : args];
            queue.push(args);
            if (!firing) {
              fire();
            }
          }
          return this;
        },
        // Call all the callbacks with the given arguments
        fire: function fire() {
          self.fireWith(this, arguments);
          return this;
        },
        // To know if the callbacks have already been called at least once
        fired: function fired() {
          return !!_fired;
        }
      };
    return self;
  };
  function Identity(v) {
    return v;
  }
  function Thrower(ex) {
    throw ex;
  }
  function adoptValue(value, resolve, reject, noValue) {
    var method;
    try {
      // Check for promise aspect first to privilege synchronous behavior
      if (value && isFunction(method = value.promise)) {
        method.call(value).done(resolve).fail(reject);

        // Other thenables
      } else if (value && isFunction(method = value.then)) {
        method.call(value, resolve, reject);

        // Other non-thenables
      } else {
        // Control `resolve` arguments by letting Array#slice cast boolean `noValue` to integer:
        // * false: [ value ].slice( 0 ) => resolve( value )
        // * true: [ value ].slice( 1 ) => resolve()
        resolve.apply(undefined, [value].slice(noValue));
      }

      // For Promises/A+, convert exceptions into rejections
      // Since jQuery.when doesn't unwrap thenables, we can skip the extra checks appearing in
      // Deferred#then to conditionally suppress rejection.
    } catch (value) {
      // Support: Android 4.0 only
      // Strict mode functions invoked without .call/.apply get global-object context
      reject.apply(undefined, [value]);
    }
  }
  jQuery.extend({
    Deferred: function Deferred(func) {
      var tuples = [
        // action, add listener, callbacks,
        // ... .then handlers, argument index, [final state]
        ["notify", "progress", jQuery.Callbacks("memory"), jQuery.Callbacks("memory"), 2], ["resolve", "done", jQuery.Callbacks("once memory"), jQuery.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", jQuery.Callbacks("once memory"), jQuery.Callbacks("once memory"), 1, "rejected"]],
        _state = "pending",
        _promise = {
          state: function state() {
            return _state;
          },
          always: function always() {
            deferred.done(arguments).fail(arguments);
            return this;
          },
          "catch": function _catch(fn) {
            return _promise.then(null, fn);
          },
          // Keep pipe for back-compat
          pipe: function pipe( /* fnDone, fnFail, fnProgress */
          ) {
            var fns = arguments;
            return jQuery.Deferred(function (newDefer) {
              jQuery.each(tuples, function (_i, tuple) {
                // Map tuples (progress, done, fail) to arguments (done, fail, progress)
                var fn = isFunction(fns[tuple[4]]) && fns[tuple[4]];

                // deferred.progress(function() { bind to newDefer or newDefer.notify })
                // deferred.done(function() { bind to newDefer or newDefer.resolve })
                // deferred.fail(function() { bind to newDefer or newDefer.reject })
                deferred[tuple[1]](function () {
                  var returned = fn && fn.apply(this, arguments);
                  if (returned && isFunction(returned.promise)) {
                    returned.promise().progress(newDefer.notify).done(newDefer.resolve).fail(newDefer.reject);
                  } else {
                    newDefer[tuple[0] + "With"](this, fn ? [returned] : arguments);
                  }
                });
              });
              fns = null;
            }).promise();
          },
          then: function then(onFulfilled, onRejected, onProgress) {
            var maxDepth = 0;
            function resolve(depth, deferred, handler, special) {
              return function () {
                var that = this,
                  args = arguments,
                  mightThrow = function mightThrow() {
                    var returned, then;

                    // Support: Promises/A+ section 2.3.3.3.3
                    // https://promisesaplus.com/#point-59
                    // Ignore double-resolution attempts
                    if (depth < maxDepth) {
                      return;
                    }
                    returned = handler.apply(that, args);

                    // Support: Promises/A+ section 2.3.1
                    // https://promisesaplus.com/#point-48
                    if (returned === deferred.promise()) {
                      throw new TypeError("Thenable self-resolution");
                    }

                    // Support: Promises/A+ sections 2.3.3.1, 3.5
                    // https://promisesaplus.com/#point-54
                    // https://promisesaplus.com/#point-75
                    // Retrieve `then` only once
                    then = returned && (
                    // Support: Promises/A+ section 2.3.4
                    // https://promisesaplus.com/#point-64
                    // Only check objects and functions for thenability
                    _typeof(returned) === "object" || typeof returned === "function") && returned.then;

                    // Handle a returned thenable
                    if (isFunction(then)) {
                      // Special processors (notify) just wait for resolution
                      if (special) {
                        then.call(returned, resolve(maxDepth, deferred, Identity, special), resolve(maxDepth, deferred, Thrower, special));

                        // Normal processors (resolve) also hook into progress
                      } else {
                        // ...and disregard older resolution values
                        maxDepth++;
                        then.call(returned, resolve(maxDepth, deferred, Identity, special), resolve(maxDepth, deferred, Thrower, special), resolve(maxDepth, deferred, Identity, deferred.notifyWith));
                      }

                      // Handle all other returned values
                    } else {
                      // Only substitute handlers pass on context
                      // and multiple values (non-spec behavior)
                      if (handler !== Identity) {
                        that = undefined;
                        args = [returned];
                      }

                      // Process the value(s)
                      // Default process is resolve
                      (special || deferred.resolveWith)(that, args);
                    }
                  },
                  // Only normal processors (resolve) catch and reject exceptions
                  process = special ? mightThrow : function () {
                    try {
                      mightThrow();
                    } catch (e) {
                      if (jQuery.Deferred.exceptionHook) {
                        jQuery.Deferred.exceptionHook(e, process.error);
                      }

                      // Support: Promises/A+ section 2.3.3.3.4.1
                      // https://promisesaplus.com/#point-61
                      // Ignore post-resolution exceptions
                      if (depth + 1 >= maxDepth) {
                        // Only substitute handlers pass on context
                        // and multiple values (non-spec behavior)
                        if (handler !== Thrower) {
                          that = undefined;
                          args = [e];
                        }
                        deferred.rejectWith(that, args);
                      }
                    }
                  };

                // Support: Promises/A+ section 2.3.3.3.1
                // https://promisesaplus.com/#point-57
                // Re-resolve promises immediately to dodge false rejection from
                // subsequent errors
                if (depth) {
                  process();
                } else {
                  // Call an optional hook to record the error, in case of exception
                  // since it's otherwise lost when execution goes async
                  if (jQuery.Deferred.getErrorHook) {
                    process.error = jQuery.Deferred.getErrorHook();

                    // The deprecated alias of the above. While the name suggests
                    // returning the stack, not an error instance, jQuery just passes
                    // it directly to `console.warn` so both will work; an instance
                    // just better cooperates with source maps.
                  } else if (jQuery.Deferred.getStackHook) {
                    process.error = jQuery.Deferred.getStackHook();
                  }
                  window.setTimeout(process);
                }
              };
            }
            return jQuery.Deferred(function (newDefer) {
              // progress_handlers.add( ... )
              tuples[0][3].add(resolve(0, newDefer, isFunction(onProgress) ? onProgress : Identity, newDefer.notifyWith));

              // fulfilled_handlers.add( ... )
              tuples[1][3].add(resolve(0, newDefer, isFunction(onFulfilled) ? onFulfilled : Identity));

              // rejected_handlers.add( ... )
              tuples[2][3].add(resolve(0, newDefer, isFunction(onRejected) ? onRejected : Thrower));
            }).promise();
          },
          // Get a promise for this deferred
          // If obj is provided, the promise aspect is added to the object
          promise: function promise(obj) {
            return obj != null ? jQuery.extend(obj, _promise) : _promise;
          }
        },
        deferred = {};

      // Add list-specific methods
      jQuery.each(tuples, function (i, tuple) {
        var list = tuple[2],
          stateString = tuple[5];

        // promise.progress = list.add
        // promise.done = list.add
        // promise.fail = list.add
        _promise[tuple[1]] = list.add;

        // Handle state
        if (stateString) {
          list.add(function () {
            // state = "resolved" (i.e., fulfilled)
            // state = "rejected"
            _state = stateString;
          },
          // rejected_callbacks.disable
          // fulfilled_callbacks.disable
          tuples[3 - i][2].disable,
          // rejected_handlers.disable
          // fulfilled_handlers.disable
          tuples[3 - i][3].disable,
          // progress_callbacks.lock
          tuples[0][2].lock,
          // progress_handlers.lock
          tuples[0][3].lock);
        }

        // progress_handlers.fire
        // fulfilled_handlers.fire
        // rejected_handlers.fire
        list.add(tuple[3].fire);

        // deferred.notify = function() { deferred.notifyWith(...) }
        // deferred.resolve = function() { deferred.resolveWith(...) }
        // deferred.reject = function() { deferred.rejectWith(...) }
        deferred[tuple[0]] = function () {
          deferred[tuple[0] + "With"](this === deferred ? undefined : this, arguments);
          return this;
        };

        // deferred.notifyWith = list.fireWith
        // deferred.resolveWith = list.fireWith
        // deferred.rejectWith = list.fireWith
        deferred[tuple[0] + "With"] = list.fireWith;
      });

      // Make the deferred a promise
      _promise.promise(deferred);

      // Call given func if any
      if (func) {
        func.call(deferred, deferred);
      }

      // All done!
      return deferred;
    },
    // Deferred helper
    when: function when(singleValue) {
      var
        // count of uncompleted subordinates
        remaining = arguments.length,
        // count of unprocessed arguments
        i = remaining,
        // subordinate fulfillment data
        resolveContexts = Array(i),
        resolveValues = _slice.call(arguments),
        // the primary Deferred
        primary = jQuery.Deferred(),
        // subordinate callback factory
        updateFunc = function updateFunc(i) {
          return function (value) {
            resolveContexts[i] = this;
            resolveValues[i] = arguments.length > 1 ? _slice.call(arguments) : value;
            if (! --remaining) {
              primary.resolveWith(resolveContexts, resolveValues);
            }
          };
        };

      // Single- and empty arguments are adopted like Promise.resolve
      if (remaining <= 1) {
        adoptValue(singleValue, primary.done(updateFunc(i)).resolve, primary.reject, !remaining);

        // Use .then() to unwrap secondary thenables (cf. gh-3000)
        if (primary.state() === "pending" || isFunction(resolveValues[i] && resolveValues[i].then)) {
          return primary.then();
        }
      }

      // Multiple arguments are aggregated like Promise.all array elements
      while (i--) {
        adoptValue(resolveValues[i], updateFunc(i), primary.reject);
      }
      return primary.promise();
    }
  });

  // These usually indicate a programmer mistake during development,
  // warn about them ASAP rather than swallowing them by default.
  var rerrorNames = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;

  // If `jQuery.Deferred.getErrorHook` is defined, `asyncError` is an error
  // captured before the async barrier to get the original error cause
  // which may otherwise be hidden.
  jQuery.Deferred.exceptionHook = function (error, asyncError) {
    // Support: IE 8 - 9 only
    // Console exists when dev tools are open, which can happen at any time
    if (window.console && window.console.warn && error && rerrorNames.test(error.name)) {
      window.console.warn("jQuery.Deferred exception: " + error.message, error.stack, asyncError);
    }
  };
  jQuery.readyException = function (error) {
    window.setTimeout(function () {
      throw error;
    });
  };

  // The deferred used on DOM ready
  var readyList = jQuery.Deferred();
  jQuery.fn.ready = function (fn) {
    readyList.then(fn)

    // Wrap jQuery.readyException in a function so that the lookup
    // happens at the time of error handling instead of callback
    // registration.
    ["catch"](function (error) {
      jQuery.readyException(error);
    });
    return this;
  };
  jQuery.extend({
    // Is the DOM ready to be used? Set to true once it occurs.
    isReady: false,
    // A counter to track how many items to wait for before
    // the ready event fires. See trac-6781
    readyWait: 1,
    // Handle when the DOM is ready
    ready: function ready(wait) {
      // Abort if there are pending holds or we're already ready
      if (wait === true ? --jQuery.readyWait : jQuery.isReady) {
        return;
      }

      // Remember that the DOM is ready
      jQuery.isReady = true;

      // If a normal DOM Ready event fired, decrement, and wait if need be
      if (wait !== true && --jQuery.readyWait > 0) {
        return;
      }

      // If there are functions bound, to execute
      readyList.resolveWith(document, [jQuery]);
    }
  });
  jQuery.ready.then = readyList.then;

  // The ready event handler and self cleanup method
  function completed() {
    document.removeEventListener("DOMContentLoaded", completed);
    window.removeEventListener("load", completed);
    jQuery.ready();
  }

  // Catch cases where $(document).ready() is called
  // after the browser event has already occurred.
  // Support: IE <=9 - 10 only
  // Older IE sometimes signals "interactive" too soon
  if (document.readyState === "complete" || document.readyState !== "loading" && !document.documentElement.doScroll) {
    // Handle it asynchronously to allow scripts the opportunity to delay ready
    window.setTimeout(jQuery.ready);
  } else {
    // Use the handy event callback
    document.addEventListener("DOMContentLoaded", completed);

    // A fallback to window.onload, that will always work
    window.addEventListener("load", completed);
  }

  // Multifunctional method to get and set values of a collection
  // The value/s can optionally be executed if it's a function
  var access = function access(elems, fn, key, value, chainable, emptyGet, raw) {
    var i = 0,
      len = elems.length,
      bulk = key == null;

    // Sets many values
    if (toType(key) === "object") {
      chainable = true;
      for (i in key) {
        access(elems, fn, i, key[i], true, emptyGet, raw);
      }

      // Sets one value
    } else if (value !== undefined) {
      chainable = true;
      if (!isFunction(value)) {
        raw = true;
      }
      if (bulk) {
        // Bulk operations run against the entire set
        if (raw) {
          fn.call(elems, value);
          fn = null;

          // ...except when executing function values
        } else {
          bulk = fn;
          fn = function fn(elem, _key, value) {
            return bulk.call(jQuery(elem), value);
          };
        }
      }
      if (fn) {
        for (; i < len; i++) {
          fn(elems[i], key, raw ? value : value.call(elems[i], i, fn(elems[i], key)));
        }
      }
    }
    if (chainable) {
      return elems;
    }

    // Gets
    if (bulk) {
      return fn.call(elems);
    }
    return len ? fn(elems[0], key) : emptyGet;
  };

  // Matches dashed string for camelizing
  var rmsPrefix = /^-ms-/,
    rdashAlpha = /-([a-z])/g;

  // Used by camelCase as callback to replace()
  function fcamelCase(_all, letter) {
    return letter.toUpperCase();
  }

  // Convert dashed to camelCase; used by the css and data modules
  // Support: IE <=9 - 11, Edge 12 - 15
  // Microsoft forgot to hump their vendor prefix (trac-9572)
  function camelCase(string) {
    return string.replace(rmsPrefix, "ms-").replace(rdashAlpha, fcamelCase);
  }
  var acceptData = function acceptData(owner) {
    // Accepts only:
    //  - Node
    //    - Node.ELEMENT_NODE
    //    - Node.DOCUMENT_NODE
    //  - Object
    //    - Any
    return owner.nodeType === 1 || owner.nodeType === 9 || !+owner.nodeType;
  };
  function Data() {
    this.expando = jQuery.expando + Data.uid++;
  }
  Data.uid = 1;
  Data.prototype = {
    cache: function cache(owner) {
      // Check if the owner object already has a cache
      var value = owner[this.expando];

      // If not, create one
      if (!value) {
        value = {};

        // We can accept data for non-element nodes in modern browsers,
        // but we should not, see trac-8335.
        // Always return an empty object.
        if (acceptData(owner)) {
          // If it is a node unlikely to be stringify-ed or looped over
          // use plain assignment
          if (owner.nodeType) {
            owner[this.expando] = value;

            // Otherwise secure it in a non-enumerable property
            // configurable must be true to allow the property to be
            // deleted when data is removed
          } else {
            Object.defineProperty(owner, this.expando, {
              value: value,
              configurable: true
            });
          }
        }
      }
      return value;
    },
    set: function set(owner, data, value) {
      var prop,
        cache = this.cache(owner);

      // Handle: [ owner, key, value ] args
      // Always use camelCase key (gh-2257)
      if (typeof data === "string") {
        cache[camelCase(data)] = value;

        // Handle: [ owner, { properties } ] args
      } else {
        // Copy the properties one-by-one to the cache object
        for (prop in data) {
          cache[camelCase(prop)] = data[prop];
        }
      }
      return cache;
    },
    get: function get(owner, key) {
      return key === undefined ? this.cache(owner) :
      // Always use camelCase key (gh-2257)
      owner[this.expando] && owner[this.expando][camelCase(key)];
    },
    access: function access(owner, key, value) {
      // In cases where either:
      //
      //   1. No key was specified
      //   2. A string key was specified, but no value provided
      //
      // Take the "read" path and allow the get method to determine
      // which value to return, respectively either:
      //
      //   1. The entire cache object
      //   2. The data stored at the key
      //
      if (key === undefined || key && typeof key === "string" && value === undefined) {
        return this.get(owner, key);
      }

      // When the key is not a string, or both a key and value
      // are specified, set or extend (existing objects) with either:
      //
      //   1. An object of properties
      //   2. A key and value
      //
      this.set(owner, key, value);

      // Since the "set" path can have two possible entry points
      // return the expected data based on which path was taken[*]
      return value !== undefined ? value : key;
    },
    remove: function remove(owner, key) {
      var i,
        cache = owner[this.expando];
      if (cache === undefined) {
        return;
      }
      if (key !== undefined) {
        // Support array or space separated string of keys
        if (Array.isArray(key)) {
          // If key is an array of keys...
          // We always set camelCase keys, so remove that.
          key = key.map(camelCase);
        } else {
          key = camelCase(key);

          // If a key with the spaces exists, use it.
          // Otherwise, create an array by matching non-whitespace
          key = key in cache ? [key] : key.match(rnothtmlwhite) || [];
        }
        i = key.length;
        while (i--) {
          delete cache[key[i]];
        }
      }

      // Remove the expando if there's no more data
      if (key === undefined || jQuery.isEmptyObject(cache)) {
        // Support: Chrome <=35 - 45
        // Webkit & Blink performance suffers when deleting properties
        // from DOM nodes, so set to undefined instead
        // https://bugs.chromium.org/p/chromium/issues/detail?id=378607 (bug restricted)
        if (owner.nodeType) {
          owner[this.expando] = undefined;
        } else {
          delete owner[this.expando];
        }
      }
    },
    hasData: function hasData(owner) {
      var cache = owner[this.expando];
      return cache !== undefined && !jQuery.isEmptyObject(cache);
    }
  };
  var dataPriv = new Data();
  var dataUser = new Data();

  //	Implementation Summary
  //
  //	1. Enforce API surface and semantic compatibility with 1.9.x branch
  //	2. Improve the module's maintainability by reducing the storage
  //		paths to a single mechanism.
  //	3. Use the same single mechanism to support "private" and "user" data.
  //	4. _Never_ expose "private" data to user code (TODO: Drop _data, _removeData)
  //	5. Avoid exposing implementation details on user objects (eg. expando properties)
  //	6. Provide a clear path for implementation upgrade to WeakMap in 2014

  var rbrace = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
    rmultiDash = /[A-Z]/g;
  function getData(data) {
    if (data === "true") {
      return true;
    }
    if (data === "false") {
      return false;
    }
    if (data === "null") {
      return null;
    }

    // Only convert to a number if it doesn't change the string
    if (data === +data + "") {
      return +data;
    }
    if (rbrace.test(data)) {
      return JSON.parse(data);
    }
    return data;
  }
  function dataAttr(elem, key, data) {
    var name;

    // If nothing was found internally, try to fetch any
    // data from the HTML5 data-* attribute
    if (data === undefined && elem.nodeType === 1) {
      name = "data-" + key.replace(rmultiDash, "-$&").toLowerCase();
      data = elem.getAttribute(name);
      if (typeof data === "string") {
        try {
          data = getData(data);
        } catch (e) {}

        // Make sure we set the data so it isn't changed later
        dataUser.set(elem, key, data);
      } else {
        data = undefined;
      }
    }
    return data;
  }
  jQuery.extend({
    hasData: function hasData(elem) {
      return dataUser.hasData(elem) || dataPriv.hasData(elem);
    },
    data: function data(elem, name, _data) {
      return dataUser.access(elem, name, _data);
    },
    removeData: function removeData(elem, name) {
      dataUser.remove(elem, name);
    },
    // TODO: Now that all calls to _data and _removeData have been replaced
    // with direct calls to dataPriv methods, these can be deprecated.
    _data: function _data(elem, name, data) {
      return dataPriv.access(elem, name, data);
    },
    _removeData: function _removeData(elem, name) {
      dataPriv.remove(elem, name);
    }
  });
  jQuery.fn.extend({
    data: function data(key, value) {
      var i,
        name,
        data,
        elem = this[0],
        attrs = elem && elem.attributes;

      // Gets all values
      if (key === undefined) {
        if (this.length) {
          data = dataUser.get(elem);
          if (elem.nodeType === 1 && !dataPriv.get(elem, "hasDataAttrs")) {
            i = attrs.length;
            while (i--) {
              // Support: IE 11 only
              // The attrs elements can be null (trac-14894)
              if (attrs[i]) {
                name = attrs[i].name;
                if (name.indexOf("data-") === 0) {
                  name = camelCase(name.slice(5));
                  dataAttr(elem, name, data[name]);
                }
              }
            }
            dataPriv.set(elem, "hasDataAttrs", true);
          }
        }
        return data;
      }

      // Sets multiple values
      if (_typeof(key) === "object") {
        return this.each(function () {
          dataUser.set(this, key);
        });
      }
      return access(this, function (value) {
        var data;

        // The calling jQuery object (element matches) is not empty
        // (and therefore has an element appears at this[ 0 ]) and the
        // `value` parameter was not undefined. An empty jQuery object
        // will result in `undefined` for elem = this[ 0 ] which will
        // throw an exception if an attempt to read a data cache is made.
        if (elem && value === undefined) {
          // Attempt to get data from the cache
          // The key will always be camelCased in Data
          data = dataUser.get(elem, key);
          if (data !== undefined) {
            return data;
          }

          // Attempt to "discover" the data in
          // HTML5 custom data-* attrs
          data = dataAttr(elem, key);
          if (data !== undefined) {
            return data;
          }

          // We tried really hard, but the data doesn't exist.
          return;
        }

        // Set the data...
        this.each(function () {
          // We always store the camelCased key
          dataUser.set(this, key, value);
        });
      }, null, value, arguments.length > 1, null, true);
    },
    removeData: function removeData(key) {
      return this.each(function () {
        dataUser.remove(this, key);
      });
    }
  });
  jQuery.extend({
    queue: function queue(elem, type, data) {
      var queue;
      if (elem) {
        type = (type || "fx") + "queue";
        queue = dataPriv.get(elem, type);

        // Speed up dequeue by getting out quickly if this is just a lookup
        if (data) {
          if (!queue || Array.isArray(data)) {
            queue = dataPriv.access(elem, type, jQuery.makeArray(data));
          } else {
            queue.push(data);
          }
        }
        return queue || [];
      }
    },
    dequeue: function dequeue(elem, type) {
      type = type || "fx";
      var queue = jQuery.queue(elem, type),
        startLength = queue.length,
        fn = queue.shift(),
        hooks = jQuery._queueHooks(elem, type),
        next = function next() {
          jQuery.dequeue(elem, type);
        };

      // If the fx queue is dequeued, always remove the progress sentinel
      if (fn === "inprogress") {
        fn = queue.shift();
        startLength--;
      }
      if (fn) {
        // Add a progress sentinel to prevent the fx queue from being
        // automatically dequeued
        if (type === "fx") {
          queue.unshift("inprogress");
        }

        // Clear up the last queue stop function
        delete hooks.stop;
        fn.call(elem, next, hooks);
      }
      if (!startLength && hooks) {
        hooks.empty.fire();
      }
    },
    // Not public - generate a queueHooks object, or return the current one
    _queueHooks: function _queueHooks(elem, type) {
      var key = type + "queueHooks";
      return dataPriv.get(elem, key) || dataPriv.access(elem, key, {
        empty: jQuery.Callbacks("once memory").add(function () {
          dataPriv.remove(elem, [type + "queue", key]);
        })
      });
    }
  });
  jQuery.fn.extend({
    queue: function queue(type, data) {
      var setter = 2;
      if (typeof type !== "string") {
        data = type;
        type = "fx";
        setter--;
      }
      if (arguments.length < setter) {
        return jQuery.queue(this[0], type);
      }
      return data === undefined ? this : this.each(function () {
        var queue = jQuery.queue(this, type, data);

        // Ensure a hooks for this queue
        jQuery._queueHooks(this, type);
        if (type === "fx" && queue[0] !== "inprogress") {
          jQuery.dequeue(this, type);
        }
      });
    },
    dequeue: function dequeue(type) {
      return this.each(function () {
        jQuery.dequeue(this, type);
      });
    },
    clearQueue: function clearQueue(type) {
      return this.queue(type || "fx", []);
    },
    // Get a promise resolved when queues of a certain type
    // are emptied (fx is the type by default)
    promise: function promise(type, obj) {
      var tmp,
        count = 1,
        defer = jQuery.Deferred(),
        elements = this,
        i = this.length,
        resolve = function resolve() {
          if (! --count) {
            defer.resolveWith(elements, [elements]);
          }
        };
      if (typeof type !== "string") {
        obj = type;
        type = undefined;
      }
      type = type || "fx";
      while (i--) {
        tmp = dataPriv.get(elements[i], type + "queueHooks");
        if (tmp && tmp.empty) {
          count++;
          tmp.empty.add(resolve);
        }
      }
      resolve();
      return defer.promise(obj);
    }
  });
  var pnum = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source;
  var rcssNum = new RegExp("^(?:([+-])=|)(" + pnum + ")([a-z%]*)$", "i");
  var cssExpand = ["Top", "Right", "Bottom", "Left"];
  var documentElement = document.documentElement;
  var isAttached = function isAttached(elem) {
      return jQuery.contains(elem.ownerDocument, elem);
    },
    composed = {
      composed: true
    };

  // Support: IE 9 - 11+, Edge 12 - 18+, iOS 10.0 - 10.2 only
  // Check attachment across shadow DOM boundaries when possible (gh-3504)
  // Support: iOS 10.0-10.2 only
  // Early iOS 10 versions support `attachShadow` but not `getRootNode`,
  // leading to errors. We need to check for `getRootNode`.
  if (documentElement.getRootNode) {
    isAttached = function isAttached(elem) {
      return jQuery.contains(elem.ownerDocument, elem) || elem.getRootNode(composed) === elem.ownerDocument;
    };
  }
  var isHiddenWithinTree = function isHiddenWithinTree(elem, el) {
    // isHiddenWithinTree might be called from jQuery#filter function;
    // in that case, element will be second argument
    elem = el || elem;

    // Inline style trumps all
    return elem.style.display === "none" || elem.style.display === "" &&
    // Otherwise, check computed style
    // Support: Firefox <=43 - 45
    // Disconnected elements can have computed display: none, so first confirm that elem is
    // in the document.
    isAttached(elem) && jQuery.css(elem, "display") === "none";
  };
  function adjustCSS(elem, prop, valueParts, tween) {
    var adjusted,
      scale,
      maxIterations = 20,
      currentValue = tween ? function () {
        return tween.cur();
      } : function () {
        return jQuery.css(elem, prop, "");
      },
      initial = currentValue(),
      unit = valueParts && valueParts[3] || (jQuery.cssNumber[prop] ? "" : "px"),
      // Starting value computation is required for potential unit mismatches
      initialInUnit = elem.nodeType && (jQuery.cssNumber[prop] || unit !== "px" && +initial) && rcssNum.exec(jQuery.css(elem, prop));
    if (initialInUnit && initialInUnit[3] !== unit) {
      // Support: Firefox <=54
      // Halve the iteration target value to prevent interference from CSS upper bounds (gh-2144)
      initial = initial / 2;

      // Trust units reported by jQuery.css
      unit = unit || initialInUnit[3];

      // Iteratively approximate from a nonzero starting point
      initialInUnit = +initial || 1;
      while (maxIterations--) {
        // Evaluate and update our best guess (doubling guesses that zero out).
        // Finish if the scale equals or crosses 1 (making the old*new product non-positive).
        jQuery.style(elem, prop, initialInUnit + unit);
        if ((1 - scale) * (1 - (scale = currentValue() / initial || 0.5)) <= 0) {
          maxIterations = 0;
        }
        initialInUnit = initialInUnit / scale;
      }
      initialInUnit = initialInUnit * 2;
      jQuery.style(elem, prop, initialInUnit + unit);

      // Make sure we update the tween properties later on
      valueParts = valueParts || [];
    }
    if (valueParts) {
      initialInUnit = +initialInUnit || +initial || 0;

      // Apply relative offset (+=/-=) if specified
      adjusted = valueParts[1] ? initialInUnit + (valueParts[1] + 1) * valueParts[2] : +valueParts[2];
      if (tween) {
        tween.unit = unit;
        tween.start = initialInUnit;
        tween.end = adjusted;
      }
    }
    return adjusted;
  }
  var defaultDisplayMap = {};
  function getDefaultDisplay(elem) {
    var temp,
      doc = elem.ownerDocument,
      nodeName = elem.nodeName,
      display = defaultDisplayMap[nodeName];
    if (display) {
      return display;
    }
    temp = doc.body.appendChild(doc.createElement(nodeName));
    display = jQuery.css(temp, "display");
    temp.parentNode.removeChild(temp);
    if (display === "none") {
      display = "block";
    }
    defaultDisplayMap[nodeName] = display;
    return display;
  }
  function showHide(elements, show) {
    var display,
      elem,
      values = [],
      index = 0,
      length = elements.length;

    // Determine new display value for elements that need to change
    for (; index < length; index++) {
      elem = elements[index];
      if (!elem.style) {
        continue;
      }
      display = elem.style.display;
      if (show) {
        // Since we force visibility upon cascade-hidden elements, an immediate (and slow)
        // check is required in this first loop unless we have a nonempty display value (either
        // inline or about-to-be-restored)
        if (display === "none") {
          values[index] = dataPriv.get(elem, "display") || null;
          if (!values[index]) {
            elem.style.display = "";
          }
        }
        if (elem.style.display === "" && isHiddenWithinTree(elem)) {
          values[index] = getDefaultDisplay(elem);
        }
      } else {
        if (display !== "none") {
          values[index] = "none";

          // Remember what we're overwriting
          dataPriv.set(elem, "display", display);
        }
      }
    }

    // Set the display of the elements in a second loop to avoid constant reflow
    for (index = 0; index < length; index++) {
      if (values[index] != null) {
        elements[index].style.display = values[index];
      }
    }
    return elements;
  }
  jQuery.fn.extend({
    show: function show() {
      return showHide(this, true);
    },
    hide: function hide() {
      return showHide(this);
    },
    toggle: function toggle(state) {
      if (typeof state === "boolean") {
        return state ? this.show() : this.hide();
      }
      return this.each(function () {
        if (isHiddenWithinTree(this)) {
          jQuery(this).show();
        } else {
          jQuery(this).hide();
        }
      });
    }
  });
  var rcheckableType = /^(?:checkbox|radio)$/i;
  var rtagName = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i;
  var rscriptType = /^$|^module$|\/(?:java|ecma)script/i;
  (function () {
    var fragment = document.createDocumentFragment(),
      div = fragment.appendChild(document.createElement("div")),
      input = document.createElement("input");

    // Support: Android 4.0 - 4.3 only
    // Check state lost if the name is set (trac-11217)
    // Support: Windows Web Apps (WWA)
    // `name` and `type` must use .setAttribute for WWA (trac-14901)
    input.setAttribute("type", "radio");
    input.setAttribute("checked", "checked");
    input.setAttribute("name", "t");
    div.appendChild(input);

    // Support: Android <=4.1 only
    // Older WebKit doesn't clone checked state correctly in fragments
    support.checkClone = div.cloneNode(true).cloneNode(true).lastChild.checked;

    // Support: IE <=11 only
    // Make sure textarea (and checkbox) defaultValue is properly cloned
    div.innerHTML = "<textarea>x</textarea>";
    support.noCloneChecked = !!div.cloneNode(true).lastChild.defaultValue;

    // Support: IE <=9 only
    // IE <=9 replaces <option> tags with their contents when inserted outside of
    // the select element.
    div.innerHTML = "<option></option>";
    support.option = !!div.lastChild;
  })();

  // We have to close these tags to support XHTML (trac-13200)
  var wrapMap = {
    // XHTML parsers do not magically insert elements in the
    // same way that tag soup parsers do. So we cannot shorten
    // this by omitting <tbody> or other required elements.
    thead: [1, "<table>", "</table>"],
    col: [2, "<table><colgroup>", "</colgroup></table>"],
    tr: [2, "<table><tbody>", "</tbody></table>"],
    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
    _default: [0, "", ""]
  };
  wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
  wrapMap.th = wrapMap.td;

  // Support: IE <=9 only
  if (!support.option) {
    wrapMap.optgroup = wrapMap.option = [1, "<select multiple='multiple'>", "</select>"];
  }
  function getAll(context, tag) {
    // Support: IE <=9 - 11 only
    // Use typeof to avoid zero-argument method invocation on host objects (trac-15151)
    var ret;
    if (typeof context.getElementsByTagName !== "undefined") {
      ret = context.getElementsByTagName(tag || "*");
    } else if (typeof context.querySelectorAll !== "undefined") {
      ret = context.querySelectorAll(tag || "*");
    } else {
      ret = [];
    }
    if (tag === undefined || tag && nodeName(context, tag)) {
      return jQuery.merge([context], ret);
    }
    return ret;
  }

  // Mark scripts as having already been evaluated
  function setGlobalEval(elems, refElements) {
    var i = 0,
      l = elems.length;
    for (; i < l; i++) {
      dataPriv.set(elems[i], "globalEval", !refElements || dataPriv.get(refElements[i], "globalEval"));
    }
  }
  var rhtml = /<|&#?\w+;/;
  function buildFragment(elems, context, scripts, selection, ignored) {
    var elem,
      tmp,
      tag,
      wrap,
      attached,
      j,
      fragment = context.createDocumentFragment(),
      nodes = [],
      i = 0,
      l = elems.length;
    for (; i < l; i++) {
      elem = elems[i];
      if (elem || elem === 0) {
        // Add nodes directly
        if (toType(elem) === "object") {
          // Support: Android <=4.0 only, PhantomJS 1 only
          // push.apply(_, arraylike) throws on ancient WebKit
          jQuery.merge(nodes, elem.nodeType ? [elem] : elem);

          // Convert non-html into a text node
        } else if (!rhtml.test(elem)) {
          nodes.push(context.createTextNode(elem));

          // Convert html into DOM nodes
        } else {
          tmp = tmp || fragment.appendChild(context.createElement("div"));

          // Deserialize a standard representation
          tag = (rtagName.exec(elem) || ["", ""])[1].toLowerCase();
          wrap = wrapMap[tag] || wrapMap._default;
          tmp.innerHTML = wrap[1] + jQuery.htmlPrefilter(elem) + wrap[2];

          // Descend through wrappers to the right content
          j = wrap[0];
          while (j--) {
            tmp = tmp.lastChild;
          }

          // Support: Android <=4.0 only, PhantomJS 1 only
          // push.apply(_, arraylike) throws on ancient WebKit
          jQuery.merge(nodes, tmp.childNodes);

          // Remember the top-level container
          tmp = fragment.firstChild;

          // Ensure the created nodes are orphaned (trac-12392)
          tmp.textContent = "";
        }
      }
    }

    // Remove wrapper from fragment
    fragment.textContent = "";
    i = 0;
    while (elem = nodes[i++]) {
      // Skip elements already in the context collection (trac-4087)
      if (selection && jQuery.inArray(elem, selection) > -1) {
        if (ignored) {
          ignored.push(elem);
        }
        continue;
      }
      attached = isAttached(elem);

      // Append to fragment
      tmp = getAll(fragment.appendChild(elem), "script");

      // Preserve script evaluation history
      if (attached) {
        setGlobalEval(tmp);
      }

      // Capture executables
      if (scripts) {
        j = 0;
        while (elem = tmp[j++]) {
          if (rscriptType.test(elem.type || "")) {
            scripts.push(elem);
          }
        }
      }
    }
    return fragment;
  }
  var rtypenamespace = /^([^.]*)(?:\.(.+)|)/;
  function returnTrue() {
    return true;
  }
  function returnFalse() {
    return false;
  }
  function _on(elem, types, selector, data, fn, one) {
    var origFn, type;

    // Types can be a map of types/handlers
    if (_typeof(types) === "object") {
      // ( types-Object, selector, data )
      if (typeof selector !== "string") {
        // ( types-Object, data )
        data = data || selector;
        selector = undefined;
      }
      for (type in types) {
        _on(elem, type, selector, data, types[type], one);
      }
      return elem;
    }
    if (data == null && fn == null) {
      // ( types, fn )
      fn = selector;
      data = selector = undefined;
    } else if (fn == null) {
      if (typeof selector === "string") {
        // ( types, selector, fn )
        fn = data;
        data = undefined;
      } else {
        // ( types, data, fn )
        fn = data;
        data = selector;
        selector = undefined;
      }
    }
    if (fn === false) {
      fn = returnFalse;
    } else if (!fn) {
      return elem;
    }
    if (one === 1) {
      origFn = fn;
      fn = function fn(event) {
        // Can use an empty set, since event contains the info
        jQuery().off(event);
        return origFn.apply(this, arguments);
      };

      // Use same guid so caller can remove using origFn
      fn.guid = origFn.guid || (origFn.guid = jQuery.guid++);
    }
    return elem.each(function () {
      jQuery.event.add(this, types, fn, data, selector);
    });
  }

  /*
   * Helper functions for managing events -- not part of the public interface.
   * Props to Dean Edwards' addEvent library for many of the ideas.
   */
  jQuery.event = {
    global: {},
    add: function add(elem, types, handler, data, selector) {
      var handleObjIn,
        eventHandle,
        tmp,
        events,
        t,
        handleObj,
        special,
        handlers,
        type,
        namespaces,
        origType,
        elemData = dataPriv.get(elem);

      // Only attach events to objects that accept data
      if (!acceptData(elem)) {
        return;
      }

      // Caller can pass in an object of custom data in lieu of the handler
      if (handler.handler) {
        handleObjIn = handler;
        handler = handleObjIn.handler;
        selector = handleObjIn.selector;
      }

      // Ensure that invalid selectors throw exceptions at attach time
      // Evaluate against documentElement in case elem is a non-element node (e.g., document)
      if (selector) {
        jQuery.find.matchesSelector(documentElement, selector);
      }

      // Make sure that the handler has a unique ID, used to find/remove it later
      if (!handler.guid) {
        handler.guid = jQuery.guid++;
      }

      // Init the element's event structure and main handler, if this is the first
      if (!(events = elemData.events)) {
        events = elemData.events = Object.create(null);
      }
      if (!(eventHandle = elemData.handle)) {
        eventHandle = elemData.handle = function (e) {
          // Discard the second event of a jQuery.event.trigger() and
          // when an event is called after a page has unloaded
          return typeof jQuery !== "undefined" && jQuery.event.triggered !== e.type ? jQuery.event.dispatch.apply(elem, arguments) : undefined;
        };
      }

      // Handle multiple events separated by a space
      types = (types || "").match(rnothtmlwhite) || [""];
      t = types.length;
      while (t--) {
        tmp = rtypenamespace.exec(types[t]) || [];
        type = origType = tmp[1];
        namespaces = (tmp[2] || "").split(".").sort();

        // There *must* be a type, no attaching namespace-only handlers
        if (!type) {
          continue;
        }

        // If event changes its type, use the special event handlers for the changed type
        special = jQuery.event.special[type] || {};

        // If selector defined, determine special event api type, otherwise given type
        type = (selector ? special.delegateType : special.bindType) || type;

        // Update special based on newly reset type
        special = jQuery.event.special[type] || {};

        // handleObj is passed to all event handlers
        handleObj = jQuery.extend({
          type: type,
          origType: origType,
          data: data,
          handler: handler,
          guid: handler.guid,
          selector: selector,
          needsContext: selector && jQuery.expr.match.needsContext.test(selector),
          namespace: namespaces.join(".")
        }, handleObjIn);

        // Init the event handler queue if we're the first
        if (!(handlers = events[type])) {
          handlers = events[type] = [];
          handlers.delegateCount = 0;

          // Only use addEventListener if the special events handler returns false
          if (!special.setup || special.setup.call(elem, data, namespaces, eventHandle) === false) {
            if (elem.addEventListener) {
              elem.addEventListener(type, eventHandle);
            }
          }
        }
        if (special.add) {
          special.add.call(elem, handleObj);
          if (!handleObj.handler.guid) {
            handleObj.handler.guid = handler.guid;
          }
        }

        // Add to the element's handler list, delegates in front
        if (selector) {
          handlers.splice(handlers.delegateCount++, 0, handleObj);
        } else {
          handlers.push(handleObj);
        }

        // Keep track of which events have ever been used, for event optimization
        jQuery.event.global[type] = true;
      }
    },
    // Detach an event or set of events from an element
    remove: function remove(elem, types, handler, selector, mappedTypes) {
      var j,
        origCount,
        tmp,
        events,
        t,
        handleObj,
        special,
        handlers,
        type,
        namespaces,
        origType,
        elemData = dataPriv.hasData(elem) && dataPriv.get(elem);
      if (!elemData || !(events = elemData.events)) {
        return;
      }

      // Once for each type.namespace in types; type may be omitted
      types = (types || "").match(rnothtmlwhite) || [""];
      t = types.length;
      while (t--) {
        tmp = rtypenamespace.exec(types[t]) || [];
        type = origType = tmp[1];
        namespaces = (tmp[2] || "").split(".").sort();

        // Unbind all events (on this namespace, if provided) for the element
        if (!type) {
          for (type in events) {
            jQuery.event.remove(elem, type + types[t], handler, selector, true);
          }
          continue;
        }
        special = jQuery.event.special[type] || {};
        type = (selector ? special.delegateType : special.bindType) || type;
        handlers = events[type] || [];
        tmp = tmp[2] && new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)");

        // Remove matching events
        origCount = j = handlers.length;
        while (j--) {
          handleObj = handlers[j];
          if ((mappedTypes || origType === handleObj.origType) && (!handler || handler.guid === handleObj.guid) && (!tmp || tmp.test(handleObj.namespace)) && (!selector || selector === handleObj.selector || selector === "**" && handleObj.selector)) {
            handlers.splice(j, 1);
            if (handleObj.selector) {
              handlers.delegateCount--;
            }
            if (special.remove) {
              special.remove.call(elem, handleObj);
            }
          }
        }

        // Remove generic event handler if we removed something and no more handlers exist
        // (avoids potential for endless recursion during removal of special event handlers)
        if (origCount && !handlers.length) {
          if (!special.teardown || special.teardown.call(elem, namespaces, elemData.handle) === false) {
            jQuery.removeEvent(elem, type, elemData.handle);
          }
          delete events[type];
        }
      }

      // Remove data and the expando if it's no longer used
      if (jQuery.isEmptyObject(events)) {
        dataPriv.remove(elem, "handle events");
      }
    },
    dispatch: function dispatch(nativeEvent) {
      var i,
        j,
        ret,
        matched,
        handleObj,
        handlerQueue,
        args = new Array(arguments.length),
        // Make a writable jQuery.Event from the native event object
        event = jQuery.event.fix(nativeEvent),
        handlers = (dataPriv.get(this, "events") || Object.create(null))[event.type] || [],
        special = jQuery.event.special[event.type] || {};

      // Use the fix-ed jQuery.Event rather than the (read-only) native event
      args[0] = event;
      for (i = 1; i < arguments.length; i++) {
        args[i] = arguments[i];
      }
      event.delegateTarget = this;

      // Call the preDispatch hook for the mapped type, and let it bail if desired
      if (special.preDispatch && special.preDispatch.call(this, event) === false) {
        return;
      }

      // Determine handlers
      handlerQueue = jQuery.event.handlers.call(this, event, handlers);

      // Run delegates first; they may want to stop propagation beneath us
      i = 0;
      while ((matched = handlerQueue[i++]) && !event.isPropagationStopped()) {
        event.currentTarget = matched.elem;
        j = 0;
        while ((handleObj = matched.handlers[j++]) && !event.isImmediatePropagationStopped()) {
          // If the event is namespaced, then each handler is only invoked if it is
          // specially universal or its namespaces are a superset of the event's.
          if (!event.rnamespace || handleObj.namespace === false || event.rnamespace.test(handleObj.namespace)) {
            event.handleObj = handleObj;
            event.data = handleObj.data;
            ret = ((jQuery.event.special[handleObj.origType] || {}).handle || handleObj.handler).apply(matched.elem, args);
            if (ret !== undefined) {
              if ((event.result = ret) === false) {
                event.preventDefault();
                event.stopPropagation();
              }
            }
          }
        }
      }

      // Call the postDispatch hook for the mapped type
      if (special.postDispatch) {
        special.postDispatch.call(this, event);
      }
      return event.result;
    },
    handlers: function handlers(event, _handlers) {
      var i,
        handleObj,
        sel,
        matchedHandlers,
        matchedSelectors,
        handlerQueue = [],
        delegateCount = _handlers.delegateCount,
        cur = event.target;

      // Find delegate handlers
      if (delegateCount &&
      // Support: IE <=9
      // Black-hole SVG <use> instance trees (trac-13180)
      cur.nodeType &&
      // Support: Firefox <=42
      // Suppress spec-violating clicks indicating a non-primary pointer button (trac-3861)
      // https://www.w3.org/TR/DOM-Level-3-Events/#event-type-click
      // Support: IE 11 only
      // ...but not arrow key "clicks" of radio inputs, which can have `button` -1 (gh-2343)
      !(event.type === "click" && event.button >= 1)) {
        for (; cur !== this; cur = cur.parentNode || this) {
          // Don't check non-elements (trac-13208)
          // Don't process clicks on disabled elements (trac-6911, trac-8165, trac-11382, trac-11764)
          if (cur.nodeType === 1 && !(event.type === "click" && cur.disabled === true)) {
            matchedHandlers = [];
            matchedSelectors = {};
            for (i = 0; i < delegateCount; i++) {
              handleObj = _handlers[i];

              // Don't conflict with Object.prototype properties (trac-13203)
              sel = handleObj.selector + " ";
              if (matchedSelectors[sel] === undefined) {
                matchedSelectors[sel] = handleObj.needsContext ? jQuery(sel, this).index(cur) > -1 : jQuery.find(sel, this, null, [cur]).length;
              }
              if (matchedSelectors[sel]) {
                matchedHandlers.push(handleObj);
              }
            }
            if (matchedHandlers.length) {
              handlerQueue.push({
                elem: cur,
                handlers: matchedHandlers
              });
            }
          }
        }
      }

      // Add the remaining (directly-bound) handlers
      cur = this;
      if (delegateCount < _handlers.length) {
        handlerQueue.push({
          elem: cur,
          handlers: _handlers.slice(delegateCount)
        });
      }
      return handlerQueue;
    },
    addProp: function addProp(name, hook) {
      Object.defineProperty(jQuery.Event.prototype, name, {
        enumerable: true,
        configurable: true,
        get: isFunction(hook) ? function () {
          if (this.originalEvent) {
            return hook(this.originalEvent);
          }
        } : function () {
          if (this.originalEvent) {
            return this.originalEvent[name];
          }
        },
        set: function set(value) {
          Object.defineProperty(this, name, {
            enumerable: true,
            configurable: true,
            writable: true,
            value: value
          });
        }
      });
    },
    fix: function fix(originalEvent) {
      return originalEvent[jQuery.expando] ? originalEvent : new jQuery.Event(originalEvent);
    },
    special: {
      load: {
        // Prevent triggered image.load events from bubbling to window.load
        noBubble: true
      },
      click: {
        // Utilize native event to ensure correct state for checkable inputs
        setup: function setup(data) {
          // For mutual compressibility with _default, replace `this` access with a local var.
          // `|| data` is dead code meant only to preserve the variable through minification.
          var el = this || data;

          // Claim the first handler
          if (rcheckableType.test(el.type) && el.click && nodeName(el, "input")) {
            // dataPriv.set( el, "click", ... )
            leverageNative(el, "click", true);
          }

          // Return false to allow normal processing in the caller
          return false;
        },
        trigger: function trigger(data) {
          // For mutual compressibility with _default, replace `this` access with a local var.
          // `|| data` is dead code meant only to preserve the variable through minification.
          var el = this || data;

          // Force setup before triggering a click
          if (rcheckableType.test(el.type) && el.click && nodeName(el, "input")) {
            leverageNative(el, "click");
          }

          // Return non-false to allow normal event-path propagation
          return true;
        },
        // For cross-browser consistency, suppress native .click() on links
        // Also prevent it if we're currently inside a leveraged native-event stack
        _default: function _default(event) {
          var target = event.target;
          return rcheckableType.test(target.type) && target.click && nodeName(target, "input") && dataPriv.get(target, "click") || nodeName(target, "a");
        }
      },
      beforeunload: {
        postDispatch: function postDispatch(event) {
          // Support: Firefox 20+
          // Firefox doesn't alert if the returnValue field is not set.
          if (event.result !== undefined && event.originalEvent) {
            event.originalEvent.returnValue = event.result;
          }
        }
      }
    }
  };

  // Ensure the presence of an event listener that handles manually-triggered
  // synthetic events by interrupting progress until reinvoked in response to
  // *native* events that it fires directly, ensuring that state changes have
  // already occurred before other listeners are invoked.
  function leverageNative(el, type, isSetup) {
    // Missing `isSetup` indicates a trigger call, which must force setup through jQuery.event.add
    if (!isSetup) {
      if (dataPriv.get(el, type) === undefined) {
        jQuery.event.add(el, type, returnTrue);
      }
      return;
    }

    // Register the controller as a special universal handler for all event namespaces
    dataPriv.set(el, type, false);
    jQuery.event.add(el, type, {
      namespace: false,
      handler: function handler(event) {
        var result,
          saved = dataPriv.get(this, type);
        if (event.isTrigger & 1 && this[type]) {
          // Interrupt processing of the outer synthetic .trigger()ed event
          if (!saved) {
            // Store arguments for use when handling the inner native event
            // There will always be at least one argument (an event object), so this array
            // will not be confused with a leftover capture object.
            saved = _slice.call(arguments);
            dataPriv.set(this, type, saved);

            // Trigger the native event and capture its result
            this[type]();
            result = dataPriv.get(this, type);
            dataPriv.set(this, type, false);
            if (saved !== result) {
              // Cancel the outer synthetic event
              event.stopImmediatePropagation();
              event.preventDefault();
              return result;
            }

            // If this is an inner synthetic event for an event with a bubbling surrogate
            // (focus or blur), assume that the surrogate already propagated from triggering
            // the native event and prevent that from happening again here.
            // This technically gets the ordering wrong w.r.t. to `.trigger()` (in which the
            // bubbling surrogate propagates *after* the non-bubbling base), but that seems
            // less bad than duplication.
          } else if ((jQuery.event.special[type] || {}).delegateType) {
            event.stopPropagation();
          }

          // If this is a native event triggered above, everything is now in order
          // Fire an inner synthetic event with the original arguments
        } else if (saved) {
          // ...and capture the result
          dataPriv.set(this, type, jQuery.event.trigger(saved[0], saved.slice(1), this));

          // Abort handling of the native event by all jQuery handlers while allowing
          // native handlers on the same element to run. On target, this is achieved
          // by stopping immediate propagation just on the jQuery event. However,
          // the native event is re-wrapped by a jQuery one on each level of the
          // propagation so the only way to stop it for jQuery is to stop it for
          // everyone via native `stopPropagation()`. This is not a problem for
          // focus/blur which don't bubble, but it does also stop click on checkboxes
          // and radios. We accept this limitation.
          event.stopPropagation();
          event.isImmediatePropagationStopped = returnTrue;
        }
      }
    });
  }
  jQuery.removeEvent = function (elem, type, handle) {
    // This "if" is needed for plain objects
    if (elem.removeEventListener) {
      elem.removeEventListener(type, handle);
    }
  };
  jQuery.Event = function (src, props) {
    // Allow instantiation without the 'new' keyword
    if (!(this instanceof jQuery.Event)) {
      return new jQuery.Event(src, props);
    }

    // Event object
    if (src && src.type) {
      this.originalEvent = src;
      this.type = src.type;

      // Events bubbling up the document may have been marked as prevented
      // by a handler lower down the tree; reflect the correct value.
      this.isDefaultPrevented = src.defaultPrevented || src.defaultPrevented === undefined &&
      // Support: Android <=2.3 only
      src.returnValue === false ? returnTrue : returnFalse;

      // Create target properties
      // Support: Safari <=6 - 7 only
      // Target should not be a text node (trac-504, trac-13143)
      this.target = src.target && src.target.nodeType === 3 ? src.target.parentNode : src.target;
      this.currentTarget = src.currentTarget;
      this.relatedTarget = src.relatedTarget;

      // Event type
    } else {
      this.type = src;
    }

    // Put explicitly provided properties onto the event object
    if (props) {
      jQuery.extend(this, props);
    }

    // Create a timestamp if incoming event doesn't have one
    this.timeStamp = src && src.timeStamp || Date.now();

    // Mark it as fixed
    this[jQuery.expando] = true;
  };

  // jQuery.Event is based on DOM3 Events as specified by the ECMAScript Language Binding
  // https://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
  jQuery.Event.prototype = {
    constructor: jQuery.Event,
    isDefaultPrevented: returnFalse,
    isPropagationStopped: returnFalse,
    isImmediatePropagationStopped: returnFalse,
    isSimulated: false,
    preventDefault: function preventDefault() {
      var e = this.originalEvent;
      this.isDefaultPrevented = returnTrue;
      if (e && !this.isSimulated) {
        e.preventDefault();
      }
    },
    stopPropagation: function stopPropagation() {
      var e = this.originalEvent;
      this.isPropagationStopped = returnTrue;
      if (e && !this.isSimulated) {
        e.stopPropagation();
      }
    },
    stopImmediatePropagation: function stopImmediatePropagation() {
      var e = this.originalEvent;
      this.isImmediatePropagationStopped = returnTrue;
      if (e && !this.isSimulated) {
        e.stopImmediatePropagation();
      }
      this.stopPropagation();
    }
  };

  // Includes all common event props including KeyEvent and MouseEvent specific props
  jQuery.each({
    altKey: true,
    bubbles: true,
    cancelable: true,
    changedTouches: true,
    ctrlKey: true,
    detail: true,
    eventPhase: true,
    metaKey: true,
    pageX: true,
    pageY: true,
    shiftKey: true,
    view: true,
    "char": true,
    code: true,
    charCode: true,
    key: true,
    keyCode: true,
    button: true,
    buttons: true,
    clientX: true,
    clientY: true,
    offsetX: true,
    offsetY: true,
    pointerId: true,
    pointerType: true,
    screenX: true,
    screenY: true,
    targetTouches: true,
    toElement: true,
    touches: true,
    which: true
  }, jQuery.event.addProp);
  jQuery.each({
    focus: "focusin",
    blur: "focusout"
  }, function (type, delegateType) {
    function focusMappedHandler(nativeEvent) {
      if (document.documentMode) {
        // Support: IE 11+
        // Attach a single focusin/focusout handler on the document while someone wants
        // focus/blur. This is because the former are synchronous in IE while the latter
        // are async. In other browsers, all those handlers are invoked synchronously.

        // `handle` from private data would already wrap the event, but we need
        // to change the `type` here.
        var handle = dataPriv.get(this, "handle"),
          event = jQuery.event.fix(nativeEvent);
        event.type = nativeEvent.type === "focusin" ? "focus" : "blur";
        event.isSimulated = true;

        // First, handle focusin/focusout
        handle(nativeEvent);

        // ...then, handle focus/blur
        //
        // focus/blur don't bubble while focusin/focusout do; simulate the former by only
        // invoking the handler at the lower level.
        if (event.target === event.currentTarget) {
          // The setup part calls `leverageNative`, which, in turn, calls
          // `jQuery.event.add`, so event handle will already have been set
          // by this point.
          handle(event);
        }
      } else {
        // For non-IE browsers, attach a single capturing handler on the document
        // while someone wants focusin/focusout.
        jQuery.event.simulate(delegateType, nativeEvent.target, jQuery.event.fix(nativeEvent));
      }
    }
    jQuery.event.special[type] = {
      // Utilize native event if possible so blur/focus sequence is correct
      setup: function setup() {
        var attaches;

        // Claim the first handler
        // dataPriv.set( this, "focus", ... )
        // dataPriv.set( this, "blur", ... )
        leverageNative(this, type, true);
        if (document.documentMode) {
          // Support: IE 9 - 11+
          // We use the same native handler for focusin & focus (and focusout & blur)
          // so we need to coordinate setup & teardown parts between those events.
          // Use `delegateType` as the key as `type` is already used by `leverageNative`.
          attaches = dataPriv.get(this, delegateType);
          if (!attaches) {
            this.addEventListener(delegateType, focusMappedHandler);
          }
          dataPriv.set(this, delegateType, (attaches || 0) + 1);
        } else {
          // Return false to allow normal processing in the caller
          return false;
        }
      },
      trigger: function trigger() {
        // Force setup before trigger
        leverageNative(this, type);

        // Return non-false to allow normal event-path propagation
        return true;
      },
      teardown: function teardown() {
        var attaches;
        if (document.documentMode) {
          attaches = dataPriv.get(this, delegateType) - 1;
          if (!attaches) {
            this.removeEventListener(delegateType, focusMappedHandler);
            dataPriv.remove(this, delegateType);
          } else {
            dataPriv.set(this, delegateType, attaches);
          }
        } else {
          // Return false to indicate standard teardown should be applied
          return false;
        }
      },
      // Suppress native focus or blur if we're currently inside
      // a leveraged native-event stack
      _default: function _default(event) {
        return dataPriv.get(event.target, type);
      },
      delegateType: delegateType
    };

    // Support: Firefox <=44
    // Firefox doesn't have focus(in | out) events
    // Related ticket - https://bugzilla.mozilla.org/show_bug.cgi?id=687787
    //
    // Support: Chrome <=48 - 49, Safari <=9.0 - 9.1
    // focus(in | out) events fire after focus & blur events,
    // which is spec violation - http://www.w3.org/TR/DOM-Level-3-Events/#events-focusevent-event-order
    // Related ticket - https://bugs.chromium.org/p/chromium/issues/detail?id=449857
    //
    // Support: IE 9 - 11+
    // To preserve relative focusin/focus & focusout/blur event order guaranteed on the 3.x branch,
    // attach a single handler for both events in IE.
    jQuery.event.special[delegateType] = {
      setup: function setup() {
        // Handle: regular nodes (via `this.ownerDocument`), window
        // (via `this.document`) & document (via `this`).
        var doc = this.ownerDocument || this.document || this,
          dataHolder = document.documentMode ? this : doc,
          attaches = dataPriv.get(dataHolder, delegateType);

        // Support: IE 9 - 11+
        // We use the same native handler for focusin & focus (and focusout & blur)
        // so we need to coordinate setup & teardown parts between those events.
        // Use `delegateType` as the key as `type` is already used by `leverageNative`.
        if (!attaches) {
          if (document.documentMode) {
            this.addEventListener(delegateType, focusMappedHandler);
          } else {
            doc.addEventListener(type, focusMappedHandler, true);
          }
        }
        dataPriv.set(dataHolder, delegateType, (attaches || 0) + 1);
      },
      teardown: function teardown() {
        var doc = this.ownerDocument || this.document || this,
          dataHolder = document.documentMode ? this : doc,
          attaches = dataPriv.get(dataHolder, delegateType) - 1;
        if (!attaches) {
          if (document.documentMode) {
            this.removeEventListener(delegateType, focusMappedHandler);
          } else {
            doc.removeEventListener(type, focusMappedHandler, true);
          }
          dataPriv.remove(dataHolder, delegateType);
        } else {
          dataPriv.set(dataHolder, delegateType, attaches);
        }
      }
    };
  });

  // Create mouseenter/leave events using mouseover/out and event-time checks
  // so that event delegation works in jQuery.
  // Do the same for pointerenter/pointerleave and pointerover/pointerout
  //
  // Support: Safari 7 only
  // Safari sends mouseenter too often; see:
  // https://bugs.chromium.org/p/chromium/issues/detail?id=470258
  // for the description of the bug (it existed in older Chrome versions as well).
  jQuery.each({
    mouseenter: "mouseover",
    mouseleave: "mouseout",
    pointerenter: "pointerover",
    pointerleave: "pointerout"
  }, function (orig, fix) {
    jQuery.event.special[orig] = {
      delegateType: fix,
      bindType: fix,
      handle: function handle(event) {
        var ret,
          target = this,
          related = event.relatedTarget,
          handleObj = event.handleObj;

        // For mouseenter/leave call the handler if related is outside the target.
        // NB: No relatedTarget if the mouse left/entered the browser window
        if (!related || related !== target && !jQuery.contains(target, related)) {
          event.type = handleObj.origType;
          ret = handleObj.handler.apply(this, arguments);
          event.type = fix;
        }
        return ret;
      }
    };
  });
  jQuery.fn.extend({
    on: function on(types, selector, data, fn) {
      return _on(this, types, selector, data, fn);
    },
    one: function one(types, selector, data, fn) {
      return _on(this, types, selector, data, fn, 1);
    },
    off: function off(types, selector, fn) {
      var handleObj, type;
      if (types && types.preventDefault && types.handleObj) {
        // ( event )  dispatched jQuery.Event
        handleObj = types.handleObj;
        jQuery(types.delegateTarget).off(handleObj.namespace ? handleObj.origType + "." + handleObj.namespace : handleObj.origType, handleObj.selector, handleObj.handler);
        return this;
      }
      if (_typeof(types) === "object") {
        // ( types-object [, selector] )
        for (type in types) {
          this.off(type, selector, types[type]);
        }
        return this;
      }
      if (selector === false || typeof selector === "function") {
        // ( types [, fn] )
        fn = selector;
        selector = undefined;
      }
      if (fn === false) {
        fn = returnFalse;
      }
      return this.each(function () {
        jQuery.event.remove(this, types, fn, selector);
      });
    }
  });
  var
    // Support: IE <=10 - 11, Edge 12 - 13 only
    // In IE/Edge using regex groups here causes severe slowdowns.
    // See https://connect.microsoft.com/IE/feedback/details/1736512/
    rnoInnerhtml = /<script|<style|<link/i,
    // checked="checked" or checked
    rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,
    rcleanScript = /^\s*<!\[CDATA\[|\]\]>\s*$/g;

  // Prefer a tbody over its parent table for containing new rows
  function manipulationTarget(elem, content) {
    if (nodeName(elem, "table") && nodeName(content.nodeType !== 11 ? content : content.firstChild, "tr")) {
      return jQuery(elem).children("tbody")[0] || elem;
    }
    return elem;
  }

  // Replace/restore the type attribute of script elements for safe DOM manipulation
  function disableScript(elem) {
    elem.type = (elem.getAttribute("type") !== null) + "/" + elem.type;
    return elem;
  }
  function restoreScript(elem) {
    if ((elem.type || "").slice(0, 5) === "true/") {
      elem.type = elem.type.slice(5);
    } else {
      elem.removeAttribute("type");
    }
    return elem;
  }
  function cloneCopyEvent(src, dest) {
    var i, l, type, pdataOld, udataOld, udataCur, events;
    if (dest.nodeType !== 1) {
      return;
    }

    // 1. Copy private data: events, handlers, etc.
    if (dataPriv.hasData(src)) {
      pdataOld = dataPriv.get(src);
      events = pdataOld.events;
      if (events) {
        dataPriv.remove(dest, "handle events");
        for (type in events) {
          for (i = 0, l = events[type].length; i < l; i++) {
            jQuery.event.add(dest, type, events[type][i]);
          }
        }
      }
    }

    // 2. Copy user data
    if (dataUser.hasData(src)) {
      udataOld = dataUser.access(src);
      udataCur = jQuery.extend({}, udataOld);
      dataUser.set(dest, udataCur);
    }
  }

  // Fix IE bugs, see support tests
  function fixInput(src, dest) {
    var nodeName = dest.nodeName.toLowerCase();

    // Fails to persist the checked state of a cloned checkbox or radio button.
    if (nodeName === "input" && rcheckableType.test(src.type)) {
      dest.checked = src.checked;

      // Fails to return the selected option to the default selected state when cloning options
    } else if (nodeName === "input" || nodeName === "textarea") {
      dest.defaultValue = src.defaultValue;
    }
  }
  function domManip(collection, args, callback, ignored) {
    // Flatten any nested arrays
    args = flat(args);
    var fragment,
      first,
      scripts,
      hasScripts,
      node,
      doc,
      i = 0,
      l = collection.length,
      iNoClone = l - 1,
      value = args[0],
      valueIsFunction = isFunction(value);

    // We can't cloneNode fragments that contain checked, in WebKit
    if (valueIsFunction || l > 1 && typeof value === "string" && !support.checkClone && rchecked.test(value)) {
      return collection.each(function (index) {
        var self = collection.eq(index);
        if (valueIsFunction) {
          args[0] = value.call(this, index, self.html());
        }
        domManip(self, args, callback, ignored);
      });
    }
    if (l) {
      fragment = buildFragment(args, collection[0].ownerDocument, false, collection, ignored);
      first = fragment.firstChild;
      if (fragment.childNodes.length === 1) {
        fragment = first;
      }

      // Require either new content or an interest in ignored elements to invoke the callback
      if (first || ignored) {
        scripts = jQuery.map(getAll(fragment, "script"), disableScript);
        hasScripts = scripts.length;

        // Use the original fragment for the last item
        // instead of the first because it can end up
        // being emptied incorrectly in certain situations (trac-8070).
        for (; i < l; i++) {
          node = fragment;
          if (i !== iNoClone) {
            node = jQuery.clone(node, true, true);

            // Keep references to cloned scripts for later restoration
            if (hasScripts) {
              // Support: Android <=4.0 only, PhantomJS 1 only
              // push.apply(_, arraylike) throws on ancient WebKit
              jQuery.merge(scripts, getAll(node, "script"));
            }
          }
          callback.call(collection[i], node, i);
        }
        if (hasScripts) {
          doc = scripts[scripts.length - 1].ownerDocument;

          // Reenable scripts
          jQuery.map(scripts, restoreScript);

          // Evaluate executable scripts on first document insertion
          for (i = 0; i < hasScripts; i++) {
            node = scripts[i];
            if (rscriptType.test(node.type || "") && !dataPriv.access(node, "globalEval") && jQuery.contains(doc, node)) {
              if (node.src && (node.type || "").toLowerCase() !== "module") {
                // Optional AJAX dependency, but won't run scripts if not present
                if (jQuery._evalUrl && !node.noModule) {
                  jQuery._evalUrl(node.src, {
                    nonce: node.nonce || node.getAttribute("nonce")
                  }, doc);
                }
              } else {
                // Unwrap a CDATA section containing script contents. This shouldn't be
                // needed as in XML documents they're already not visible when
                // inspecting element contents and in HTML documents they have no
                // meaning but we're preserving that logic for backwards compatibility.
                // This will be removed completely in 4.0. See gh-4904.
                DOMEval(node.textContent.replace(rcleanScript, ""), node, doc);
              }
            }
          }
        }
      }
    }
    return collection;
  }
  function _remove(elem, selector, keepData) {
    var node,
      nodes = selector ? jQuery.filter(selector, elem) : elem,
      i = 0;
    for (; (node = nodes[i]) != null; i++) {
      if (!keepData && node.nodeType === 1) {
        jQuery.cleanData(getAll(node));
      }
      if (node.parentNode) {
        if (keepData && isAttached(node)) {
          setGlobalEval(getAll(node, "script"));
        }
        node.parentNode.removeChild(node);
      }
    }
    return elem;
  }
  jQuery.extend({
    htmlPrefilter: function htmlPrefilter(html) {
      return html;
    },
    clone: function clone(elem, dataAndEvents, deepDataAndEvents) {
      var i,
        l,
        srcElements,
        destElements,
        clone = elem.cloneNode(true),
        inPage = isAttached(elem);

      // Fix IE cloning issues
      if (!support.noCloneChecked && (elem.nodeType === 1 || elem.nodeType === 11) && !jQuery.isXMLDoc(elem)) {
        // We eschew jQuery#find here for performance reasons:
        // https://jsperf.com/getall-vs-sizzle/2
        destElements = getAll(clone);
        srcElements = getAll(elem);
        for (i = 0, l = srcElements.length; i < l; i++) {
          fixInput(srcElements[i], destElements[i]);
        }
      }

      // Copy the events from the original to the clone
      if (dataAndEvents) {
        if (deepDataAndEvents) {
          srcElements = srcElements || getAll(elem);
          destElements = destElements || getAll(clone);
          for (i = 0, l = srcElements.length; i < l; i++) {
            cloneCopyEvent(srcElements[i], destElements[i]);
          }
        } else {
          cloneCopyEvent(elem, clone);
        }
      }

      // Preserve script evaluation history
      destElements = getAll(clone, "script");
      if (destElements.length > 0) {
        setGlobalEval(destElements, !inPage && getAll(elem, "script"));
      }

      // Return the cloned set
      return clone;
    },
    cleanData: function cleanData(elems) {
      var data,
        elem,
        type,
        special = jQuery.event.special,
        i = 0;
      for (; (elem = elems[i]) !== undefined; i++) {
        if (acceptData(elem)) {
          if (data = elem[dataPriv.expando]) {
            if (data.events) {
              for (type in data.events) {
                if (special[type]) {
                  jQuery.event.remove(elem, type);

                  // This is a shortcut to avoid jQuery.event.remove's overhead
                } else {
                  jQuery.removeEvent(elem, type, data.handle);
                }
              }
            }

            // Support: Chrome <=35 - 45+
            // Assign undefined instead of using delete, see Data#remove
            elem[dataPriv.expando] = undefined;
          }
          if (elem[dataUser.expando]) {
            // Support: Chrome <=35 - 45+
            // Assign undefined instead of using delete, see Data#remove
            elem[dataUser.expando] = undefined;
          }
        }
      }
    }
  });
  jQuery.fn.extend({
    detach: function detach(selector) {
      return _remove(this, selector, true);
    },
    remove: function remove(selector) {
      return _remove(this, selector);
    },
    text: function text(value) {
      return access(this, function (value) {
        return value === undefined ? jQuery.text(this) : this.empty().each(function () {
          if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
            this.textContent = value;
          }
        });
      }, null, value, arguments.length);
    },
    append: function append() {
      return domManip(this, arguments, function (elem) {
        if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
          var target = manipulationTarget(this, elem);
          target.appendChild(elem);
        }
      });
    },
    prepend: function prepend() {
      return domManip(this, arguments, function (elem) {
        if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
          var target = manipulationTarget(this, elem);
          target.insertBefore(elem, target.firstChild);
        }
      });
    },
    before: function before() {
      return domManip(this, arguments, function (elem) {
        if (this.parentNode) {
          this.parentNode.insertBefore(elem, this);
        }
      });
    },
    after: function after() {
      return domManip(this, arguments, function (elem) {
        if (this.parentNode) {
          this.parentNode.insertBefore(elem, this.nextSibling);
        }
      });
    },
    empty: function empty() {
      var elem,
        i = 0;
      for (; (elem = this[i]) != null; i++) {
        if (elem.nodeType === 1) {
          // Prevent memory leaks
          jQuery.cleanData(getAll(elem, false));

          // Remove any remaining nodes
          elem.textContent = "";
        }
      }
      return this;
    },
    clone: function clone(dataAndEvents, deepDataAndEvents) {
      dataAndEvents = dataAndEvents == null ? false : dataAndEvents;
      deepDataAndEvents = deepDataAndEvents == null ? dataAndEvents : deepDataAndEvents;
      return this.map(function () {
        return jQuery.clone(this, dataAndEvents, deepDataAndEvents);
      });
    },
    html: function html(value) {
      return access(this, function (value) {
        var elem = this[0] || {},
          i = 0,
          l = this.length;
        if (value === undefined && elem.nodeType === 1) {
          return elem.innerHTML;
        }

        // See if we can take a shortcut and just use innerHTML
        if (typeof value === "string" && !rnoInnerhtml.test(value) && !wrapMap[(rtagName.exec(value) || ["", ""])[1].toLowerCase()]) {
          value = jQuery.htmlPrefilter(value);
          try {
            for (; i < l; i++) {
              elem = this[i] || {};

              // Remove element nodes and prevent memory leaks
              if (elem.nodeType === 1) {
                jQuery.cleanData(getAll(elem, false));
                elem.innerHTML = value;
              }
            }
            elem = 0;

            // If using innerHTML throws an exception, use the fallback method
          } catch (e) {}
        }
        if (elem) {
          this.empty().append(value);
        }
      }, null, value, arguments.length);
    },
    replaceWith: function replaceWith() {
      var ignored = [];

      // Make the changes, replacing each non-ignored context element with the new content
      return domManip(this, arguments, function (elem) {
        var parent = this.parentNode;
        if (jQuery.inArray(this, ignored) < 0) {
          jQuery.cleanData(getAll(this));
          if (parent) {
            parent.replaceChild(elem, this);
          }
        }

        // Force callback invocation
      }, ignored);
    }
  });
  jQuery.each({
    appendTo: "append",
    prependTo: "prepend",
    insertBefore: "before",
    insertAfter: "after",
    replaceAll: "replaceWith"
  }, function (name, original) {
    jQuery.fn[name] = function (selector) {
      var elems,
        ret = [],
        insert = jQuery(selector),
        last = insert.length - 1,
        i = 0;
      for (; i <= last; i++) {
        elems = i === last ? this : this.clone(true);
        jQuery(insert[i])[original](elems);

        // Support: Android <=4.0 only, PhantomJS 1 only
        // .get() because push.apply(_, arraylike) throws on ancient WebKit
        push.apply(ret, elems.get());
      }
      return this.pushStack(ret);
    };
  });
  var rnumnonpx = new RegExp("^(" + pnum + ")(?!px)[a-z%]+$", "i");
  var rcustomProp = /^--/;
  var getStyles = function getStyles(elem) {
    // Support: IE <=11 only, Firefox <=30 (trac-15098, trac-14150)
    // IE throws on elements created in popups
    // FF meanwhile throws on frame elements through "defaultView.getComputedStyle"
    var view = elem.ownerDocument.defaultView;
    if (!view || !view.opener) {
      view = window;
    }
    return view.getComputedStyle(elem);
  };
  var swap = function swap(elem, options, callback) {
    var ret,
      name,
      old = {};

    // Remember the old values, and insert the new ones
    for (name in options) {
      old[name] = elem.style[name];
      elem.style[name] = options[name];
    }
    ret = callback.call(elem);

    // Revert the old values
    for (name in options) {
      elem.style[name] = old[name];
    }
    return ret;
  };
  var rboxStyle = new RegExp(cssExpand.join("|"), "i");
  (function () {
    // Executing both pixelPosition & boxSizingReliable tests require only one layout
    // so they're executed at the same time to save the second computation.
    function computeStyleTests() {
      // This is a singleton, we need to execute it only once
      if (!div) {
        return;
      }
      container.style.cssText = "position:absolute;left:-11111px;width:60px;" + "margin-top:1px;padding:0;border:0";
      div.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;" + "margin:auto;border:1px;padding:1px;" + "width:60%;top:1%";
      documentElement.appendChild(container).appendChild(div);
      var divStyle = window.getComputedStyle(div);
      pixelPositionVal = divStyle.top !== "1%";

      // Support: Android 4.0 - 4.3 only, Firefox <=3 - 44
      reliableMarginLeftVal = roundPixelMeasures(divStyle.marginLeft) === 12;

      // Support: Android 4.0 - 4.3 only, Safari <=9.1 - 10.1, iOS <=7.0 - 9.3
      // Some styles come back with percentage values, even though they shouldn't
      div.style.right = "60%";
      pixelBoxStylesVal = roundPixelMeasures(divStyle.right) === 36;

      // Support: IE 9 - 11 only
      // Detect misreporting of content dimensions for box-sizing:border-box elements
      boxSizingReliableVal = roundPixelMeasures(divStyle.width) === 36;

      // Support: IE 9 only
      // Detect overflow:scroll screwiness (gh-3699)
      // Support: Chrome <=64
      // Don't get tricked when zoom affects offsetWidth (gh-4029)
      div.style.position = "absolute";
      scrollboxSizeVal = roundPixelMeasures(div.offsetWidth / 3) === 12;
      documentElement.removeChild(container);

      // Nullify the div so it wouldn't be stored in the memory and
      // it will also be a sign that checks already performed
      div = null;
    }
    function roundPixelMeasures(measure) {
      return Math.round(parseFloat(measure));
    }
    var pixelPositionVal,
      boxSizingReliableVal,
      scrollboxSizeVal,
      pixelBoxStylesVal,
      reliableTrDimensionsVal,
      reliableMarginLeftVal,
      container = document.createElement("div"),
      div = document.createElement("div");

    // Finish early in limited (non-browser) environments
    if (!div.style) {
      return;
    }

    // Support: IE <=9 - 11 only
    // Style of cloned element affects source element cloned (trac-8908)
    div.style.backgroundClip = "content-box";
    div.cloneNode(true).style.backgroundClip = "";
    support.clearCloneStyle = div.style.backgroundClip === "content-box";
    jQuery.extend(support, {
      boxSizingReliable: function boxSizingReliable() {
        computeStyleTests();
        return boxSizingReliableVal;
      },
      pixelBoxStyles: function pixelBoxStyles() {
        computeStyleTests();
        return pixelBoxStylesVal;
      },
      pixelPosition: function pixelPosition() {
        computeStyleTests();
        return pixelPositionVal;
      },
      reliableMarginLeft: function reliableMarginLeft() {
        computeStyleTests();
        return reliableMarginLeftVal;
      },
      scrollboxSize: function scrollboxSize() {
        computeStyleTests();
        return scrollboxSizeVal;
      },
      // Support: IE 9 - 11+, Edge 15 - 18+
      // IE/Edge misreport `getComputedStyle` of table rows with width/height
      // set in CSS while `offset*` properties report correct values.
      // Behavior in IE 9 is more subtle than in newer versions & it passes
      // some versions of this test; make sure not to make it pass there!
      //
      // Support: Firefox 70+
      // Only Firefox includes border widths
      // in computed dimensions. (gh-4529)
      reliableTrDimensions: function reliableTrDimensions() {
        var table, tr, trChild, trStyle;
        if (reliableTrDimensionsVal == null) {
          table = document.createElement("table");
          tr = document.createElement("tr");
          trChild = document.createElement("div");
          table.style.cssText = "position:absolute;left:-11111px;border-collapse:separate";
          tr.style.cssText = "border:1px solid";

          // Support: Chrome 86+
          // Height set through cssText does not get applied.
          // Computed height then comes back as 0.
          tr.style.height = "1px";
          trChild.style.height = "9px";

          // Support: Android 8 Chrome 86+
          // In our bodyBackground.html iframe,
          // display for all div elements is set to "inline",
          // which causes a problem only in Android 8 Chrome 86.
          // Ensuring the div is display: block
          // gets around this issue.
          trChild.style.display = "block";
          documentElement.appendChild(table).appendChild(tr).appendChild(trChild);
          trStyle = window.getComputedStyle(tr);
          reliableTrDimensionsVal = parseInt(trStyle.height, 10) + parseInt(trStyle.borderTopWidth, 10) + parseInt(trStyle.borderBottomWidth, 10) === tr.offsetHeight;
          documentElement.removeChild(table);
        }
        return reliableTrDimensionsVal;
      }
    });
  })();
  function curCSS(elem, name, computed) {
    var width,
      minWidth,
      maxWidth,
      ret,
      isCustomProp = rcustomProp.test(name),
      // Support: Firefox 51+
      // Retrieving style before computed somehow
      // fixes an issue with getting wrong values
      // on detached elements
      style = elem.style;
    computed = computed || getStyles(elem);

    // getPropertyValue is needed for:
    //   .css('filter') (IE 9 only, trac-12537)
    //   .css('--customProperty) (gh-3144)
    if (computed) {
      // Support: IE <=9 - 11+
      // IE only supports `"float"` in `getPropertyValue`; in computed styles
      // it's only available as `"cssFloat"`. We no longer modify properties
      // sent to `.css()` apart from camelCasing, so we need to check both.
      // Normally, this would create difference in behavior: if
      // `getPropertyValue` returns an empty string, the value returned
      // by `.css()` would be `undefined`. This is usually the case for
      // disconnected elements. However, in IE even disconnected elements
      // with no styles return `"none"` for `getPropertyValue( "float" )`
      ret = computed.getPropertyValue(name) || computed[name];
      if (isCustomProp && ret) {
        // Support: Firefox 105+, Chrome <=105+
        // Spec requires trimming whitespace for custom properties (gh-4926).
        // Firefox only trims leading whitespace. Chrome just collapses
        // both leading & trailing whitespace to a single space.
        //
        // Fall back to `undefined` if empty string returned.
        // This collapses a missing definition with property defined
        // and set to an empty string but there's no standard API
        // allowing us to differentiate them without a performance penalty
        // and returning `undefined` aligns with older jQuery.
        //
        // rtrimCSS treats U+000D CARRIAGE RETURN and U+000C FORM FEED
        // as whitespace while CSS does not, but this is not a problem
        // because CSS preprocessing replaces them with U+000A LINE FEED
        // (which *is* CSS whitespace)
        // https://www.w3.org/TR/css-syntax-3/#input-preprocessing
        ret = ret.replace(rtrimCSS, "$1") || undefined;
      }
      if (ret === "" && !isAttached(elem)) {
        ret = jQuery.style(elem, name);
      }

      // A tribute to the "awesome hack by Dean Edwards"
      // Android Browser returns percentage for some values,
      // but width seems to be reliably pixels.
      // This is against the CSSOM draft spec:
      // https://drafts.csswg.org/cssom/#resolved-values
      if (!support.pixelBoxStyles() && rnumnonpx.test(ret) && rboxStyle.test(name)) {
        // Remember the original values
        width = style.width;
        minWidth = style.minWidth;
        maxWidth = style.maxWidth;

        // Put in the new values to get a computed value out
        style.minWidth = style.maxWidth = style.width = ret;
        ret = computed.width;

        // Revert the changed values
        style.width = width;
        style.minWidth = minWidth;
        style.maxWidth = maxWidth;
      }
    }
    return ret !== undefined ?
    // Support: IE <=9 - 11 only
    // IE returns zIndex value as an integer.
    ret + "" : ret;
  }
  function addGetHookIf(conditionFn, hookFn) {
    // Define the hook, we'll check on the first run if it's really needed.
    return {
      get: function get() {
        if (conditionFn()) {
          // Hook not needed (or it's not possible to use it due
          // to missing dependency), remove it.
          delete this.get;
          return;
        }

        // Hook needed; redefine it so that the support test is not executed again.
        return (this.get = hookFn).apply(this, arguments);
      }
    };
  }
  var cssPrefixes = ["Webkit", "Moz", "ms"],
    emptyStyle = document.createElement("div").style,
    vendorProps = {};

  // Return a vendor-prefixed property or undefined
  function vendorPropName(name) {
    // Check for vendor prefixed names
    var capName = name[0].toUpperCase() + name.slice(1),
      i = cssPrefixes.length;
    while (i--) {
      name = cssPrefixes[i] + capName;
      if (name in emptyStyle) {
        return name;
      }
    }
  }

  // Return a potentially-mapped jQuery.cssProps or vendor prefixed property
  function finalPropName(name) {
    var _final = jQuery.cssProps[name] || vendorProps[name];
    if (_final) {
      return _final;
    }
    if (name in emptyStyle) {
      return name;
    }
    return vendorProps[name] = vendorPropName(name) || name;
  }
  var
    // Swappable if display is none or starts with table
    // except "table", "table-cell", or "table-caption"
    // See here for display values: https://developer.mozilla.org/en-US/docs/CSS/display
    rdisplayswap = /^(none|table(?!-c[ea]).+)/,
    cssShow = {
      position: "absolute",
      visibility: "hidden",
      display: "block"
    },
    cssNormalTransform = {
      letterSpacing: "0",
      fontWeight: "400"
    };
  function setPositiveNumber(_elem, value, subtract) {
    // Any relative (+/-) values have already been
    // normalized at this point
    var matches = rcssNum.exec(value);
    return matches ?
    // Guard against undefined "subtract", e.g., when used as in cssHooks
    Math.max(0, matches[2] - (subtract || 0)) + (matches[3] || "px") : value;
  }
  function boxModelAdjustment(elem, dimension, box, isBorderBox, styles, computedVal) {
    var i = dimension === "width" ? 1 : 0,
      extra = 0,
      delta = 0,
      marginDelta = 0;

    // Adjustment may not be necessary
    if (box === (isBorderBox ? "border" : "content")) {
      return 0;
    }
    for (; i < 4; i += 2) {
      // Both box models exclude margin
      // Count margin delta separately to only add it after scroll gutter adjustment.
      // This is needed to make negative margins work with `outerHeight( true )` (gh-3982).
      if (box === "margin") {
        marginDelta += jQuery.css(elem, box + cssExpand[i], true, styles);
      }

      // If we get here with a content-box, we're seeking "padding" or "border" or "margin"
      if (!isBorderBox) {
        // Add padding
        delta += jQuery.css(elem, "padding" + cssExpand[i], true, styles);

        // For "border" or "margin", add border
        if (box !== "padding") {
          delta += jQuery.css(elem, "border" + cssExpand[i] + "Width", true, styles);

          // But still keep track of it otherwise
        } else {
          extra += jQuery.css(elem, "border" + cssExpand[i] + "Width", true, styles);
        }

        // If we get here with a border-box (content + padding + border), we're seeking "content" or
        // "padding" or "margin"
      } else {
        // For "content", subtract padding
        if (box === "content") {
          delta -= jQuery.css(elem, "padding" + cssExpand[i], true, styles);
        }

        // For "content" or "padding", subtract border
        if (box !== "margin") {
          delta -= jQuery.css(elem, "border" + cssExpand[i] + "Width", true, styles);
        }
      }
    }

    // Account for positive content-box scroll gutter when requested by providing computedVal
    if (!isBorderBox && computedVal >= 0) {
      // offsetWidth/offsetHeight is a rounded sum of content, padding, scroll gutter, and border
      // Assuming integer scroll gutter, subtract the rest and round down
      delta += Math.max(0, Math.ceil(elem["offset" + dimension[0].toUpperCase() + dimension.slice(1)] - computedVal - delta - extra - 0.5

      // If offsetWidth/offsetHeight is unknown, then we can't determine content-box scroll gutter
      // Use an explicit zero to avoid NaN (gh-3964)
      )) || 0;
    }
    return delta + marginDelta;
  }
  function getWidthOrHeight(elem, dimension, extra) {
    // Start with computed style
    var styles = getStyles(elem),
      // To avoid forcing a reflow, only fetch boxSizing if we need it (gh-4322).
      // Fake content-box until we know it's needed to know the true value.
      boxSizingNeeded = !support.boxSizingReliable() || extra,
      isBorderBox = boxSizingNeeded && jQuery.css(elem, "boxSizing", false, styles) === "border-box",
      valueIsBorderBox = isBorderBox,
      val = curCSS(elem, dimension, styles),
      offsetProp = "offset" + dimension[0].toUpperCase() + dimension.slice(1);

    // Support: Firefox <=54
    // Return a confounding non-pixel value or feign ignorance, as appropriate.
    if (rnumnonpx.test(val)) {
      if (!extra) {
        return val;
      }
      val = "auto";
    }

    // Support: IE 9 - 11 only
    // Use offsetWidth/offsetHeight for when box sizing is unreliable.
    // In those cases, the computed value can be trusted to be border-box.
    if ((!support.boxSizingReliable() && isBorderBox ||
    // Support: IE 10 - 11+, Edge 15 - 18+
    // IE/Edge misreport `getComputedStyle` of table rows with width/height
    // set in CSS while `offset*` properties report correct values.
    // Interestingly, in some cases IE 9 doesn't suffer from this issue.
    !support.reliableTrDimensions() && nodeName(elem, "tr") ||
    // Fall back to offsetWidth/offsetHeight when value is "auto"
    // This happens for inline elements with no explicit setting (gh-3571)
    val === "auto" ||
    // Support: Android <=4.1 - 4.3 only
    // Also use offsetWidth/offsetHeight for misreported inline dimensions (gh-3602)
    !parseFloat(val) && jQuery.css(elem, "display", false, styles) === "inline") &&
    // Make sure the element is visible & connected
    elem.getClientRects().length) {
      isBorderBox = jQuery.css(elem, "boxSizing", false, styles) === "border-box";

      // Where available, offsetWidth/offsetHeight approximate border box dimensions.
      // Where not available (e.g., SVG), assume unreliable box-sizing and interpret the
      // retrieved value as a content box dimension.
      valueIsBorderBox = offsetProp in elem;
      if (valueIsBorderBox) {
        val = elem[offsetProp];
      }
    }

    // Normalize "" and auto
    val = parseFloat(val) || 0;

    // Adjust for the element's box model
    return val + boxModelAdjustment(elem, dimension, extra || (isBorderBox ? "border" : "content"), valueIsBorderBox, styles,
    // Provide the current computed size to request scroll gutter calculation (gh-3589)
    val) + "px";
  }
  jQuery.extend({
    // Add in style property hooks for overriding the default
    // behavior of getting and setting a style property
    cssHooks: {
      opacity: {
        get: function get(elem, computed) {
          if (computed) {
            // We should always get a number back from opacity
            var ret = curCSS(elem, "opacity");
            return ret === "" ? "1" : ret;
          }
        }
      }
    },
    // Don't automatically add "px" to these possibly-unitless properties
    cssNumber: {
      animationIterationCount: true,
      aspectRatio: true,
      borderImageSlice: true,
      columnCount: true,
      flexGrow: true,
      flexShrink: true,
      fontWeight: true,
      gridArea: true,
      gridColumn: true,
      gridColumnEnd: true,
      gridColumnStart: true,
      gridRow: true,
      gridRowEnd: true,
      gridRowStart: true,
      lineHeight: true,
      opacity: true,
      order: true,
      orphans: true,
      scale: true,
      widows: true,
      zIndex: true,
      zoom: true,
      // SVG-related
      fillOpacity: true,
      floodOpacity: true,
      stopOpacity: true,
      strokeMiterlimit: true,
      strokeOpacity: true
    },
    // Add in properties whose names you wish to fix before
    // setting or getting the value
    cssProps: {},
    // Get and set the style property on a DOM Node
    style: function style(elem, name, value, extra) {
      // Don't set styles on text and comment nodes
      if (!elem || elem.nodeType === 3 || elem.nodeType === 8 || !elem.style) {
        return;
      }

      // Make sure that we're working with the right name
      var ret,
        type,
        hooks,
        origName = camelCase(name),
        isCustomProp = rcustomProp.test(name),
        style = elem.style;

      // Make sure that we're working with the right name. We don't
      // want to query the value if it is a CSS custom property
      // since they are user-defined.
      if (!isCustomProp) {
        name = finalPropName(origName);
      }

      // Gets hook for the prefixed version, then unprefixed version
      hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName];

      // Check if we're setting a value
      if (value !== undefined) {
        type = _typeof(value);

        // Convert "+=" or "-=" to relative numbers (trac-7345)
        if (type === "string" && (ret = rcssNum.exec(value)) && ret[1]) {
          value = adjustCSS(elem, name, ret);

          // Fixes bug trac-9237
          type = "number";
        }

        // Make sure that null and NaN values aren't set (trac-7116)
        if (value == null || value !== value) {
          return;
        }

        // If a number was passed in, add the unit (except for certain CSS properties)
        // The isCustomProp check can be removed in jQuery 4.0 when we only auto-append
        // "px" to a few hardcoded values.
        if (type === "number" && !isCustomProp) {
          value += ret && ret[3] || (jQuery.cssNumber[origName] ? "" : "px");
        }

        // background-* props affect original clone's values
        if (!support.clearCloneStyle && value === "" && name.indexOf("background") === 0) {
          style[name] = "inherit";
        }

        // If a hook was provided, use that value, otherwise just set the specified value
        if (!hooks || !("set" in hooks) || (value = hooks.set(elem, value, extra)) !== undefined) {
          if (isCustomProp) {
            style.setProperty(name, value);
          } else {
            style[name] = value;
          }
        }
      } else {
        // If a hook was provided get the non-computed value from there
        if (hooks && "get" in hooks && (ret = hooks.get(elem, false, extra)) !== undefined) {
          return ret;
        }

        // Otherwise just get the value from the style object
        return style[name];
      }
    },
    css: function css(elem, name, extra, styles) {
      var val,
        num,
        hooks,
        origName = camelCase(name),
        isCustomProp = rcustomProp.test(name);

      // Make sure that we're working with the right name. We don't
      // want to modify the value if it is a CSS custom property
      // since they are user-defined.
      if (!isCustomProp) {
        name = finalPropName(origName);
      }

      // Try prefixed name followed by the unprefixed name
      hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName];

      // If a hook was provided get the computed value from there
      if (hooks && "get" in hooks) {
        val = hooks.get(elem, true, extra);
      }

      // Otherwise, if a way to get the computed value exists, use that
      if (val === undefined) {
        val = curCSS(elem, name, styles);
      }

      // Convert "normal" to computed value
      if (val === "normal" && name in cssNormalTransform) {
        val = cssNormalTransform[name];
      }

      // Make numeric if forced or a qualifier was provided and val looks numeric
      if (extra === "" || extra) {
        num = parseFloat(val);
        return extra === true || isFinite(num) ? num || 0 : val;
      }
      return val;
    }
  });
  jQuery.each(["height", "width"], function (_i, dimension) {
    jQuery.cssHooks[dimension] = {
      get: function get(elem, computed, extra) {
        if (computed) {
          // Certain elements can have dimension info if we invisibly show them
          // but it must have a current display style that would benefit
          return rdisplayswap.test(jQuery.css(elem, "display")) && (
          // Support: Safari 8+
          // Table columns in Safari have non-zero offsetWidth & zero
          // getBoundingClientRect().width unless display is changed.
          // Support: IE <=11 only
          // Running getBoundingClientRect on a disconnected node
          // in IE throws an error.
          !elem.getClientRects().length || !elem.getBoundingClientRect().width) ? swap(elem, cssShow, function () {
            return getWidthOrHeight(elem, dimension, extra);
          }) : getWidthOrHeight(elem, dimension, extra);
        }
      },
      set: function set(elem, value, extra) {
        var matches,
          styles = getStyles(elem),
          // Only read styles.position if the test has a chance to fail
          // to avoid forcing a reflow.
          scrollboxSizeBuggy = !support.scrollboxSize() && styles.position === "absolute",
          // To avoid forcing a reflow, only fetch boxSizing if we need it (gh-3991)
          boxSizingNeeded = scrollboxSizeBuggy || extra,
          isBorderBox = boxSizingNeeded && jQuery.css(elem, "boxSizing", false, styles) === "border-box",
          subtract = extra ? boxModelAdjustment(elem, dimension, extra, isBorderBox, styles) : 0;

        // Account for unreliable border-box dimensions by comparing offset* to computed and
        // faking a content-box to get border and padding (gh-3699)
        if (isBorderBox && scrollboxSizeBuggy) {
          subtract -= Math.ceil(elem["offset" + dimension[0].toUpperCase() + dimension.slice(1)] - parseFloat(styles[dimension]) - boxModelAdjustment(elem, dimension, "border", false, styles) - 0.5);
        }

        // Convert to pixels if value adjustment is needed
        if (subtract && (matches = rcssNum.exec(value)) && (matches[3] || "px") !== "px") {
          elem.style[dimension] = value;
          value = jQuery.css(elem, dimension);
        }
        return setPositiveNumber(elem, value, subtract);
      }
    };
  });
  jQuery.cssHooks.marginLeft = addGetHookIf(support.reliableMarginLeft, function (elem, computed) {
    if (computed) {
      return (parseFloat(curCSS(elem, "marginLeft")) || elem.getBoundingClientRect().left - swap(elem, {
        marginLeft: 0
      }, function () {
        return elem.getBoundingClientRect().left;
      })) + "px";
    }
  });

  // These hooks are used by animate to expand properties
  jQuery.each({
    margin: "",
    padding: "",
    border: "Width"
  }, function (prefix, suffix) {
    jQuery.cssHooks[prefix + suffix] = {
      expand: function expand(value) {
        var i = 0,
          expanded = {},
          // Assumes a single number if not a string
          parts = typeof value === "string" ? value.split(" ") : [value];
        for (; i < 4; i++) {
          expanded[prefix + cssExpand[i] + suffix] = parts[i] || parts[i - 2] || parts[0];
        }
        return expanded;
      }
    };
    if (prefix !== "margin") {
      jQuery.cssHooks[prefix + suffix].set = setPositiveNumber;
    }
  });
  jQuery.fn.extend({
    css: function css(name, value) {
      return access(this, function (elem, name, value) {
        var styles,
          len,
          map = {},
          i = 0;
        if (Array.isArray(name)) {
          styles = getStyles(elem);
          len = name.length;
          for (; i < len; i++) {
            map[name[i]] = jQuery.css(elem, name[i], false, styles);
          }
          return map;
        }
        return value !== undefined ? jQuery.style(elem, name, value) : jQuery.css(elem, name);
      }, name, value, arguments.length > 1);
    }
  });
  function Tween(elem, options, prop, end, easing) {
    return new Tween.prototype.init(elem, options, prop, end, easing);
  }
  jQuery.Tween = Tween;
  Tween.prototype = {
    constructor: Tween,
    init: function init(elem, options, prop, end, easing, unit) {
      this.elem = elem;
      this.prop = prop;
      this.easing = easing || jQuery.easing._default;
      this.options = options;
      this.start = this.now = this.cur();
      this.end = end;
      this.unit = unit || (jQuery.cssNumber[prop] ? "" : "px");
    },
    cur: function cur() {
      var hooks = Tween.propHooks[this.prop];
      return hooks && hooks.get ? hooks.get(this) : Tween.propHooks._default.get(this);
    },
    run: function run(percent) {
      var eased,
        hooks = Tween.propHooks[this.prop];
      if (this.options.duration) {
        this.pos = eased = jQuery.easing[this.easing](percent, this.options.duration * percent, 0, 1, this.options.duration);
      } else {
        this.pos = eased = percent;
      }
      this.now = (this.end - this.start) * eased + this.start;
      if (this.options.step) {
        this.options.step.call(this.elem, this.now, this);
      }
      if (hooks && hooks.set) {
        hooks.set(this);
      } else {
        Tween.propHooks._default.set(this);
      }
      return this;
    }
  };
  Tween.prototype.init.prototype = Tween.prototype;
  Tween.propHooks = {
    _default: {
      get: function get(tween) {
        var result;

        // Use a property on the element directly when it is not a DOM element,
        // or when there is no matching style property that exists.
        if (tween.elem.nodeType !== 1 || tween.elem[tween.prop] != null && tween.elem.style[tween.prop] == null) {
          return tween.elem[tween.prop];
        }

        // Passing an empty string as a 3rd parameter to .css will automatically
        // attempt a parseFloat and fallback to a string if the parse fails.
        // Simple values such as "10px" are parsed to Float;
        // complex values such as "rotate(1rad)" are returned as-is.
        result = jQuery.css(tween.elem, tween.prop, "");

        // Empty strings, null, undefined and "auto" are converted to 0.
        return !result || result === "auto" ? 0 : result;
      },
      set: function set(tween) {
        // Use step hook for back compat.
        // Use cssHook if its there.
        // Use .style if available and use plain properties where available.
        if (jQuery.fx.step[tween.prop]) {
          jQuery.fx.step[tween.prop](tween);
        } else if (tween.elem.nodeType === 1 && (jQuery.cssHooks[tween.prop] || tween.elem.style[finalPropName(tween.prop)] != null)) {
          jQuery.style(tween.elem, tween.prop, tween.now + tween.unit);
        } else {
          tween.elem[tween.prop] = tween.now;
        }
      }
    }
  };

  // Support: IE <=9 only
  // Panic based approach to setting things on disconnected nodes
  Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
    set: function set(tween) {
      if (tween.elem.nodeType && tween.elem.parentNode) {
        tween.elem[tween.prop] = tween.now;
      }
    }
  };
  jQuery.easing = {
    linear: function linear(p) {
      return p;
    },
    swing: function swing(p) {
      return 0.5 - Math.cos(p * Math.PI) / 2;
    },
    _default: "swing"
  };
  jQuery.fx = Tween.prototype.init;

  // Back compat <1.8 extension point
  jQuery.fx.step = {};
  var fxNow,
    inProgress,
    rfxtypes = /^(?:toggle|show|hide)$/,
    rrun = /queueHooks$/;
  function schedule() {
    if (inProgress) {
      if (document.hidden === false && window.requestAnimationFrame) {
        window.requestAnimationFrame(schedule);
      } else {
        window.setTimeout(schedule, jQuery.fx.interval);
      }
      jQuery.fx.tick();
    }
  }

  // Animations created synchronously will run synchronously
  function createFxNow() {
    window.setTimeout(function () {
      fxNow = undefined;
    });
    return fxNow = Date.now();
  }

  // Generate parameters to create a standard animation
  function genFx(type, includeWidth) {
    var which,
      i = 0,
      attrs = {
        height: type
      };

    // If we include width, step value is 1 to do all cssExpand values,
    // otherwise step value is 2 to skip over Left and Right
    includeWidth = includeWidth ? 1 : 0;
    for (; i < 4; i += 2 - includeWidth) {
      which = cssExpand[i];
      attrs["margin" + which] = attrs["padding" + which] = type;
    }
    if (includeWidth) {
      attrs.opacity = attrs.width = type;
    }
    return attrs;
  }
  function createTween(value, prop, animation) {
    var tween,
      collection = (Animation.tweeners[prop] || []).concat(Animation.tweeners["*"]),
      index = 0,
      length = collection.length;
    for (; index < length; index++) {
      if (tween = collection[index].call(animation, prop, value)) {
        // We're done with this property
        return tween;
      }
    }
  }
  function defaultPrefilter(elem, props, opts) {
    var prop,
      value,
      toggle,
      hooks,
      oldfire,
      propTween,
      restoreDisplay,
      display,
      isBox = "width" in props || "height" in props,
      anim = this,
      orig = {},
      style = elem.style,
      hidden = elem.nodeType && isHiddenWithinTree(elem),
      dataShow = dataPriv.get(elem, "fxshow");

    // Queue-skipping animations hijack the fx hooks
    if (!opts.queue) {
      hooks = jQuery._queueHooks(elem, "fx");
      if (hooks.unqueued == null) {
        hooks.unqueued = 0;
        oldfire = hooks.empty.fire;
        hooks.empty.fire = function () {
          if (!hooks.unqueued) {
            oldfire();
          }
        };
      }
      hooks.unqueued++;
      anim.always(function () {
        // Ensure the complete handler is called before this completes
        anim.always(function () {
          hooks.unqueued--;
          if (!jQuery.queue(elem, "fx").length) {
            hooks.empty.fire();
          }
        });
      });
    }

    // Detect show/hide animations
    for (prop in props) {
      value = props[prop];
      if (rfxtypes.test(value)) {
        delete props[prop];
        toggle = toggle || value === "toggle";
        if (value === (hidden ? "hide" : "show")) {
          // Pretend to be hidden if this is a "show" and
          // there is still data from a stopped show/hide
          if (value === "show" && dataShow && dataShow[prop] !== undefined) {
            hidden = true;

            // Ignore all other no-op show/hide data
          } else {
            continue;
          }
        }
        orig[prop] = dataShow && dataShow[prop] || jQuery.style(elem, prop);
      }
    }

    // Bail out if this is a no-op like .hide().hide()
    propTween = !jQuery.isEmptyObject(props);
    if (!propTween && jQuery.isEmptyObject(orig)) {
      return;
    }

    // Restrict "overflow" and "display" styles during box animations
    if (isBox && elem.nodeType === 1) {
      // Support: IE <=9 - 11, Edge 12 - 15
      // Record all 3 overflow attributes because IE does not infer the shorthand
      // from identically-valued overflowX and overflowY and Edge just mirrors
      // the overflowX value there.
      opts.overflow = [style.overflow, style.overflowX, style.overflowY];

      // Identify a display type, preferring old show/hide data over the CSS cascade
      restoreDisplay = dataShow && dataShow.display;
      if (restoreDisplay == null) {
        restoreDisplay = dataPriv.get(elem, "display");
      }
      display = jQuery.css(elem, "display");
      if (display === "none") {
        if (restoreDisplay) {
          display = restoreDisplay;
        } else {
          // Get nonempty value(s) by temporarily forcing visibility
          showHide([elem], true);
          restoreDisplay = elem.style.display || restoreDisplay;
          display = jQuery.css(elem, "display");
          showHide([elem]);
        }
      }

      // Animate inline elements as inline-block
      if (display === "inline" || display === "inline-block" && restoreDisplay != null) {
        if (jQuery.css(elem, "float") === "none") {
          // Restore the original display value at the end of pure show/hide animations
          if (!propTween) {
            anim.done(function () {
              style.display = restoreDisplay;
            });
            if (restoreDisplay == null) {
              display = style.display;
              restoreDisplay = display === "none" ? "" : display;
            }
          }
          style.display = "inline-block";
        }
      }
    }
    if (opts.overflow) {
      style.overflow = "hidden";
      anim.always(function () {
        style.overflow = opts.overflow[0];
        style.overflowX = opts.overflow[1];
        style.overflowY = opts.overflow[2];
      });
    }

    // Implement show/hide animations
    propTween = false;
    for (prop in orig) {
      // General show/hide setup for this element animation
      if (!propTween) {
        if (dataShow) {
          if ("hidden" in dataShow) {
            hidden = dataShow.hidden;
          }
        } else {
          dataShow = dataPriv.access(elem, "fxshow", {
            display: restoreDisplay
          });
        }

        // Store hidden/visible for toggle so `.stop().toggle()` "reverses"
        if (toggle) {
          dataShow.hidden = !hidden;
        }

        // Show elements before animating them
        if (hidden) {
          showHide([elem], true);
        }

        /* eslint-disable no-loop-func */

        anim.done(function () {
          /* eslint-enable no-loop-func */

          // The final step of a "hide" animation is actually hiding the element
          if (!hidden) {
            showHide([elem]);
          }
          dataPriv.remove(elem, "fxshow");
          for (prop in orig) {
            jQuery.style(elem, prop, orig[prop]);
          }
        });
      }

      // Per-property setup
      propTween = createTween(hidden ? dataShow[prop] : 0, prop, anim);
      if (!(prop in dataShow)) {
        dataShow[prop] = propTween.start;
        if (hidden) {
          propTween.end = propTween.start;
          propTween.start = 0;
        }
      }
    }
  }
  function propFilter(props, specialEasing) {
    var index, name, easing, value, hooks;

    // camelCase, specialEasing and expand cssHook pass
    for (index in props) {
      name = camelCase(index);
      easing = specialEasing[name];
      value = props[index];
      if (Array.isArray(value)) {
        easing = value[1];
        value = props[index] = value[0];
      }
      if (index !== name) {
        props[name] = value;
        delete props[index];
      }
      hooks = jQuery.cssHooks[name];
      if (hooks && "expand" in hooks) {
        value = hooks.expand(value);
        delete props[name];

        // Not quite $.extend, this won't overwrite existing keys.
        // Reusing 'index' because we have the correct "name"
        for (index in value) {
          if (!(index in props)) {
            props[index] = value[index];
            specialEasing[index] = easing;
          }
        }
      } else {
        specialEasing[name] = easing;
      }
    }
  }
  function Animation(elem, properties, options) {
    var result,
      stopped,
      index = 0,
      length = Animation.prefilters.length,
      deferred = jQuery.Deferred().always(function () {
        // Don't match elem in the :animated selector
        delete tick.elem;
      }),
      tick = function tick() {
        if (stopped) {
          return false;
        }
        var currentTime = fxNow || createFxNow(),
          remaining = Math.max(0, animation.startTime + animation.duration - currentTime),
          // Support: Android 2.3 only
          // Archaic crash bug won't allow us to use `1 - ( 0.5 || 0 )` (trac-12497)
          temp = remaining / animation.duration || 0,
          percent = 1 - temp,
          index = 0,
          length = animation.tweens.length;
        for (; index < length; index++) {
          animation.tweens[index].run(percent);
        }
        deferred.notifyWith(elem, [animation, percent, remaining]);

        // If there's more to do, yield
        if (percent < 1 && length) {
          return remaining;
        }

        // If this was an empty animation, synthesize a final progress notification
        if (!length) {
          deferred.notifyWith(elem, [animation, 1, 0]);
        }

        // Resolve the animation and report its conclusion
        deferred.resolveWith(elem, [animation]);
        return false;
      },
      animation = deferred.promise({
        elem: elem,
        props: jQuery.extend({}, properties),
        opts: jQuery.extend(true, {
          specialEasing: {},
          easing: jQuery.easing._default
        }, options),
        originalProperties: properties,
        originalOptions: options,
        startTime: fxNow || createFxNow(),
        duration: options.duration,
        tweens: [],
        createTween: function createTween(prop, end) {
          var tween = jQuery.Tween(elem, animation.opts, prop, end, animation.opts.specialEasing[prop] || animation.opts.easing);
          animation.tweens.push(tween);
          return tween;
        },
        stop: function stop(gotoEnd) {
          var index = 0,
            // If we are going to the end, we want to run all the tweens
            // otherwise we skip this part
            length = gotoEnd ? animation.tweens.length : 0;
          if (stopped) {
            return this;
          }
          stopped = true;
          for (; index < length; index++) {
            animation.tweens[index].run(1);
          }

          // Resolve when we played the last frame; otherwise, reject
          if (gotoEnd) {
            deferred.notifyWith(elem, [animation, 1, 0]);
            deferred.resolveWith(elem, [animation, gotoEnd]);
          } else {
            deferred.rejectWith(elem, [animation, gotoEnd]);
          }
          return this;
        }
      }),
      props = animation.props;
    propFilter(props, animation.opts.specialEasing);
    for (; index < length; index++) {
      result = Animation.prefilters[index].call(animation, elem, props, animation.opts);
      if (result) {
        if (isFunction(result.stop)) {
          jQuery._queueHooks(animation.elem, animation.opts.queue).stop = result.stop.bind(result);
        }
        return result;
      }
    }
    jQuery.map(props, createTween, animation);
    if (isFunction(animation.opts.start)) {
      animation.opts.start.call(elem, animation);
    }

    // Attach callbacks from options
    animation.progress(animation.opts.progress).done(animation.opts.done, animation.opts.complete).fail(animation.opts.fail).always(animation.opts.always);
    jQuery.fx.timer(jQuery.extend(tick, {
      elem: elem,
      anim: animation,
      queue: animation.opts.queue
    }));
    return animation;
  }
  jQuery.Animation = jQuery.extend(Animation, {
    tweeners: {
      "*": [function (prop, value) {
        var tween = this.createTween(prop, value);
        adjustCSS(tween.elem, prop, rcssNum.exec(value), tween);
        return tween;
      }]
    },
    tweener: function tweener(props, callback) {
      if (isFunction(props)) {
        callback = props;
        props = ["*"];
      } else {
        props = props.match(rnothtmlwhite);
      }
      var prop,
        index = 0,
        length = props.length;
      for (; index < length; index++) {
        prop = props[index];
        Animation.tweeners[prop] = Animation.tweeners[prop] || [];
        Animation.tweeners[prop].unshift(callback);
      }
    },
    prefilters: [defaultPrefilter],
    prefilter: function prefilter(callback, prepend) {
      if (prepend) {
        Animation.prefilters.unshift(callback);
      } else {
        Animation.prefilters.push(callback);
      }
    }
  });
  jQuery.speed = function (speed, easing, fn) {
    var opt = speed && _typeof(speed) === "object" ? jQuery.extend({}, speed) : {
      complete: fn || !fn && easing || isFunction(speed) && speed,
      duration: speed,
      easing: fn && easing || easing && !isFunction(easing) && easing
    };

    // Go to the end state if fx are off
    if (jQuery.fx.off) {
      opt.duration = 0;
    } else {
      if (typeof opt.duration !== "number") {
        if (opt.duration in jQuery.fx.speeds) {
          opt.duration = jQuery.fx.speeds[opt.duration];
        } else {
          opt.duration = jQuery.fx.speeds._default;
        }
      }
    }

    // Normalize opt.queue - true/undefined/null -> "fx"
    if (opt.queue == null || opt.queue === true) {
      opt.queue = "fx";
    }

    // Queueing
    opt.old = opt.complete;
    opt.complete = function () {
      if (isFunction(opt.old)) {
        opt.old.call(this);
      }
      if (opt.queue) {
        jQuery.dequeue(this, opt.queue);
      }
    };
    return opt;
  };
  jQuery.fn.extend({
    fadeTo: function fadeTo(speed, to, easing, callback) {
      // Show any hidden elements after setting opacity to 0
      return this.filter(isHiddenWithinTree).css("opacity", 0).show()

      // Animate to the value specified
      .end().animate({
        opacity: to
      }, speed, easing, callback);
    },
    animate: function animate(prop, speed, easing, callback) {
      var empty = jQuery.isEmptyObject(prop),
        optall = jQuery.speed(speed, easing, callback),
        doAnimation = function doAnimation() {
          // Operate on a copy of prop so per-property easing won't be lost
          var anim = Animation(this, jQuery.extend({}, prop), optall);

          // Empty animations, or finishing resolves immediately
          if (empty || dataPriv.get(this, "finish")) {
            anim.stop(true);
          }
        };
      doAnimation.finish = doAnimation;
      return empty || optall.queue === false ? this.each(doAnimation) : this.queue(optall.queue, doAnimation);
    },
    stop: function stop(type, clearQueue, gotoEnd) {
      var stopQueue = function stopQueue(hooks) {
        var stop = hooks.stop;
        delete hooks.stop;
        stop(gotoEnd);
      };
      if (typeof type !== "string") {
        gotoEnd = clearQueue;
        clearQueue = type;
        type = undefined;
      }
      if (clearQueue) {
        this.queue(type || "fx", []);
      }
      return this.each(function () {
        var dequeue = true,
          index = type != null && type + "queueHooks",
          timers = jQuery.timers,
          data = dataPriv.get(this);
        if (index) {
          if (data[index] && data[index].stop) {
            stopQueue(data[index]);
          }
        } else {
          for (index in data) {
            if (data[index] && data[index].stop && rrun.test(index)) {
              stopQueue(data[index]);
            }
          }
        }
        for (index = timers.length; index--;) {
          if (timers[index].elem === this && (type == null || timers[index].queue === type)) {
            timers[index].anim.stop(gotoEnd);
            dequeue = false;
            timers.splice(index, 1);
          }
        }

        // Start the next in the queue if the last step wasn't forced.
        // Timers currently will call their complete callbacks, which
        // will dequeue but only if they were gotoEnd.
        if (dequeue || !gotoEnd) {
          jQuery.dequeue(this, type);
        }
      });
    },
    finish: function finish(type) {
      if (type !== false) {
        type = type || "fx";
      }
      return this.each(function () {
        var index,
          data = dataPriv.get(this),
          queue = data[type + "queue"],
          hooks = data[type + "queueHooks"],
          timers = jQuery.timers,
          length = queue ? queue.length : 0;

        // Enable finishing flag on private data
        data.finish = true;

        // Empty the queue first
        jQuery.queue(this, type, []);
        if (hooks && hooks.stop) {
          hooks.stop.call(this, true);
        }

        // Look for any active animations, and finish them
        for (index = timers.length; index--;) {
          if (timers[index].elem === this && timers[index].queue === type) {
            timers[index].anim.stop(true);
            timers.splice(index, 1);
          }
        }

        // Look for any animations in the old queue and finish them
        for (index = 0; index < length; index++) {
          if (queue[index] && queue[index].finish) {
            queue[index].finish.call(this);
          }
        }

        // Turn off finishing flag
        delete data.finish;
      });
    }
  });
  jQuery.each(["toggle", "show", "hide"], function (_i, name) {
    var cssFn = jQuery.fn[name];
    jQuery.fn[name] = function (speed, easing, callback) {
      return speed == null || typeof speed === "boolean" ? cssFn.apply(this, arguments) : this.animate(genFx(name, true), speed, easing, callback);
    };
  });

  // Generate shortcuts for custom animations
  jQuery.each({
    slideDown: genFx("show"),
    slideUp: genFx("hide"),
    slideToggle: genFx("toggle"),
    fadeIn: {
      opacity: "show"
    },
    fadeOut: {
      opacity: "hide"
    },
    fadeToggle: {
      opacity: "toggle"
    }
  }, function (name, props) {
    jQuery.fn[name] = function (speed, easing, callback) {
      return this.animate(props, speed, easing, callback);
    };
  });
  jQuery.timers = [];
  jQuery.fx.tick = function () {
    var timer,
      i = 0,
      timers = jQuery.timers;
    fxNow = Date.now();
    for (; i < timers.length; i++) {
      timer = timers[i];

      // Run the timer and safely remove it when done (allowing for external removal)
      if (!timer() && timers[i] === timer) {
        timers.splice(i--, 1);
      }
    }
    if (!timers.length) {
      jQuery.fx.stop();
    }
    fxNow = undefined;
  };
  jQuery.fx.timer = function (timer) {
    jQuery.timers.push(timer);
    jQuery.fx.start();
  };
  jQuery.fx.interval = 13;
  jQuery.fx.start = function () {
    if (inProgress) {
      return;
    }
    inProgress = true;
    schedule();
  };
  jQuery.fx.stop = function () {
    inProgress = null;
  };
  jQuery.fx.speeds = {
    slow: 600,
    fast: 200,
    // Default speed
    _default: 400
  };

  // Based off of the plugin by Clint Helfers, with permission.
  jQuery.fn.delay = function (time, type) {
    time = jQuery.fx ? jQuery.fx.speeds[time] || time : time;
    type = type || "fx";
    return this.queue(type, function (next, hooks) {
      var timeout = window.setTimeout(next, time);
      hooks.stop = function () {
        window.clearTimeout(timeout);
      };
    });
  };
  (function () {
    var input = document.createElement("input"),
      select = document.createElement("select"),
      opt = select.appendChild(document.createElement("option"));
    input.type = "checkbox";

    // Support: Android <=4.3 only
    // Default value for a checkbox should be "on"
    support.checkOn = input.value !== "";

    // Support: IE <=11 only
    // Must access selectedIndex to make default options select
    support.optSelected = opt.selected;

    // Support: IE <=11 only
    // An input loses its value after becoming a radio
    input = document.createElement("input");
    input.value = "t";
    input.type = "radio";
    support.radioValue = input.value === "t";
  })();
  var boolHook,
    attrHandle = jQuery.expr.attrHandle;
  jQuery.fn.extend({
    attr: function attr(name, value) {
      return access(this, jQuery.attr, name, value, arguments.length > 1);
    },
    removeAttr: function removeAttr(name) {
      return this.each(function () {
        jQuery.removeAttr(this, name);
      });
    }
  });
  jQuery.extend({
    attr: function attr(elem, name, value) {
      var ret,
        hooks,
        nType = elem.nodeType;

      // Don't get/set attributes on text, comment and attribute nodes
      if (nType === 3 || nType === 8 || nType === 2) {
        return;
      }

      // Fallback to prop when attributes are not supported
      if (typeof elem.getAttribute === "undefined") {
        return jQuery.prop(elem, name, value);
      }

      // Attribute hooks are determined by the lowercase version
      // Grab necessary hook if one is defined
      if (nType !== 1 || !jQuery.isXMLDoc(elem)) {
        hooks = jQuery.attrHooks[name.toLowerCase()] || (jQuery.expr.match.bool.test(name) ? boolHook : undefined);
      }
      if (value !== undefined) {
        if (value === null) {
          jQuery.removeAttr(elem, name);
          return;
        }
        if (hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined) {
          return ret;
        }
        elem.setAttribute(name, value + "");
        return value;
      }
      if (hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null) {
        return ret;
      }
      ret = jQuery.find.attr(elem, name);

      // Non-existent attributes return null, we normalize to undefined
      return ret == null ? undefined : ret;
    },
    attrHooks: {
      type: {
        set: function set(elem, value) {
          if (!support.radioValue && value === "radio" && nodeName(elem, "input")) {
            var val = elem.value;
            elem.setAttribute("type", value);
            if (val) {
              elem.value = val;
            }
            return value;
          }
        }
      }
    },
    removeAttr: function removeAttr(elem, value) {
      var name,
        i = 0,
        // Attribute names can contain non-HTML whitespace characters
        // https://html.spec.whatwg.org/multipage/syntax.html#attributes-2
        attrNames = value && value.match(rnothtmlwhite);
      if (attrNames && elem.nodeType === 1) {
        while (name = attrNames[i++]) {
          elem.removeAttribute(name);
        }
      }
    }
  });

  // Hooks for boolean attributes
  boolHook = {
    set: function set(elem, value, name) {
      if (value === false) {
        // Remove boolean attributes when set to false
        jQuery.removeAttr(elem, name);
      } else {
        elem.setAttribute(name, name);
      }
      return name;
    }
  };
  jQuery.each(jQuery.expr.match.bool.source.match(/\w+/g), function (_i, name) {
    var getter = attrHandle[name] || jQuery.find.attr;
    attrHandle[name] = function (elem, name, isXML) {
      var ret,
        handle,
        lowercaseName = name.toLowerCase();
      if (!isXML) {
        // Avoid an infinite loop by temporarily removing this function from the getter
        handle = attrHandle[lowercaseName];
        attrHandle[lowercaseName] = ret;
        ret = getter(elem, name, isXML) != null ? lowercaseName : null;
        attrHandle[lowercaseName] = handle;
      }
      return ret;
    };
  });
  var rfocusable = /^(?:input|select|textarea|button)$/i,
    rclickable = /^(?:a|area)$/i;
  jQuery.fn.extend({
    prop: function prop(name, value) {
      return access(this, jQuery.prop, name, value, arguments.length > 1);
    },
    removeProp: function removeProp(name) {
      return this.each(function () {
        delete this[jQuery.propFix[name] || name];
      });
    }
  });
  jQuery.extend({
    prop: function prop(elem, name, value) {
      var ret,
        hooks,
        nType = elem.nodeType;

      // Don't get/set properties on text, comment and attribute nodes
      if (nType === 3 || nType === 8 || nType === 2) {
        return;
      }
      if (nType !== 1 || !jQuery.isXMLDoc(elem)) {
        // Fix name and attach hooks
        name = jQuery.propFix[name] || name;
        hooks = jQuery.propHooks[name];
      }
      if (value !== undefined) {
        if (hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined) {
          return ret;
        }
        return elem[name] = value;
      }
      if (hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null) {
        return ret;
      }
      return elem[name];
    },
    propHooks: {
      tabIndex: {
        get: function get(elem) {
          // Support: IE <=9 - 11 only
          // elem.tabIndex doesn't always return the
          // correct value when it hasn't been explicitly set
          // Use proper attribute retrieval (trac-12072)
          var tabindex = jQuery.find.attr(elem, "tabindex");
          if (tabindex) {
            return parseInt(tabindex, 10);
          }
          if (rfocusable.test(elem.nodeName) || rclickable.test(elem.nodeName) && elem.href) {
            return 0;
          }
          return -1;
        }
      }
    },
    propFix: {
      "for": "htmlFor",
      "class": "className"
    }
  });

  // Support: IE <=11 only
  // Accessing the selectedIndex property
  // forces the browser to respect setting selected
  // on the option
  // The getter ensures a default option is selected
  // when in an optgroup
  // eslint rule "no-unused-expressions" is disabled for this code
  // since it considers such accessions noop
  if (!support.optSelected) {
    jQuery.propHooks.selected = {
      get: function get(elem) {
        /* eslint no-unused-expressions: "off" */

        var parent = elem.parentNode;
        if (parent && parent.parentNode) {
          parent.parentNode.selectedIndex;
        }
        return null;
      },
      set: function set(elem) {
        /* eslint no-unused-expressions: "off" */

        var parent = elem.parentNode;
        if (parent) {
          parent.selectedIndex;
          if (parent.parentNode) {
            parent.parentNode.selectedIndex;
          }
        }
      }
    };
  }
  jQuery.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
    jQuery.propFix[this.toLowerCase()] = this;
  });

  // Strip and collapse whitespace according to HTML spec
  // https://infra.spec.whatwg.org/#strip-and-collapse-ascii-whitespace
  function stripAndCollapse(value) {
    var tokens = value.match(rnothtmlwhite) || [];
    return tokens.join(" ");
  }
  function getClass(elem) {
    return elem.getAttribute && elem.getAttribute("class") || "";
  }
  function classesToArray(value) {
    if (Array.isArray(value)) {
      return value;
    }
    if (typeof value === "string") {
      return value.match(rnothtmlwhite) || [];
    }
    return [];
  }
  jQuery.fn.extend({
    addClass: function addClass(value) {
      var classNames, cur, curValue, className, i, finalValue;
      if (isFunction(value)) {
        return this.each(function (j) {
          jQuery(this).addClass(value.call(this, j, getClass(this)));
        });
      }
      classNames = classesToArray(value);
      if (classNames.length) {
        return this.each(function () {
          curValue = getClass(this);
          cur = this.nodeType === 1 && " " + stripAndCollapse(curValue) + " ";
          if (cur) {
            for (i = 0; i < classNames.length; i++) {
              className = classNames[i];
              if (cur.indexOf(" " + className + " ") < 0) {
                cur += className + " ";
              }
            }

            // Only assign if different to avoid unneeded rendering.
            finalValue = stripAndCollapse(cur);
            if (curValue !== finalValue) {
              this.setAttribute("class", finalValue);
            }
          }
        });
      }
      return this;
    },
    removeClass: function removeClass(value) {
      var classNames, cur, curValue, className, i, finalValue;
      if (isFunction(value)) {
        return this.each(function (j) {
          jQuery(this).removeClass(value.call(this, j, getClass(this)));
        });
      }
      if (!arguments.length) {
        return this.attr("class", "");
      }
      classNames = classesToArray(value);
      if (classNames.length) {
        return this.each(function () {
          curValue = getClass(this);

          // This expression is here for better compressibility (see addClass)
          cur = this.nodeType === 1 && " " + stripAndCollapse(curValue) + " ";
          if (cur) {
            for (i = 0; i < classNames.length; i++) {
              className = classNames[i];

              // Remove *all* instances
              while (cur.indexOf(" " + className + " ") > -1) {
                cur = cur.replace(" " + className + " ", " ");
              }
            }

            // Only assign if different to avoid unneeded rendering.
            finalValue = stripAndCollapse(cur);
            if (curValue !== finalValue) {
              this.setAttribute("class", finalValue);
            }
          }
        });
      }
      return this;
    },
    toggleClass: function toggleClass(value, stateVal) {
      var classNames,
        className,
        i,
        self,
        type = _typeof(value),
        isValidValue = type === "string" || Array.isArray(value);
      if (isFunction(value)) {
        return this.each(function (i) {
          jQuery(this).toggleClass(value.call(this, i, getClass(this), stateVal), stateVal);
        });
      }
      if (typeof stateVal === "boolean" && isValidValue) {
        return stateVal ? this.addClass(value) : this.removeClass(value);
      }
      classNames = classesToArray(value);
      return this.each(function () {
        if (isValidValue) {
          // Toggle individual class names
          self = jQuery(this);
          for (i = 0; i < classNames.length; i++) {
            className = classNames[i];

            // Check each className given, space separated list
            if (self.hasClass(className)) {
              self.removeClass(className);
            } else {
              self.addClass(className);
            }
          }

          // Toggle whole class name
        } else if (value === undefined || type === "boolean") {
          className = getClass(this);
          if (className) {
            // Store className if set
            dataPriv.set(this, "__className__", className);
          }

          // If the element has a class name or if we're passed `false`,
          // then remove the whole classname (if there was one, the above saved it).
          // Otherwise bring back whatever was previously saved (if anything),
          // falling back to the empty string if nothing was stored.
          if (this.setAttribute) {
            this.setAttribute("class", className || value === false ? "" : dataPriv.get(this, "__className__") || "");
          }
        }
      });
    },
    hasClass: function hasClass(selector) {
      var className,
        elem,
        i = 0;
      className = " " + selector + " ";
      while (elem = this[i++]) {
        if (elem.nodeType === 1 && (" " + stripAndCollapse(getClass(elem)) + " ").indexOf(className) > -1) {
          return true;
        }
      }
      return false;
    }
  });
  var rreturn = /\r/g;
  jQuery.fn.extend({
    val: function val(value) {
      var hooks,
        ret,
        valueIsFunction,
        elem = this[0];
      if (!arguments.length) {
        if (elem) {
          hooks = jQuery.valHooks[elem.type] || jQuery.valHooks[elem.nodeName.toLowerCase()];
          if (hooks && "get" in hooks && (ret = hooks.get(elem, "value")) !== undefined) {
            return ret;
          }
          ret = elem.value;

          // Handle most common string cases
          if (typeof ret === "string") {
            return ret.replace(rreturn, "");
          }

          // Handle cases where value is null/undef or number
          return ret == null ? "" : ret;
        }
        return;
      }
      valueIsFunction = isFunction(value);
      return this.each(function (i) {
        var val;
        if (this.nodeType !== 1) {
          return;
        }
        if (valueIsFunction) {
          val = value.call(this, i, jQuery(this).val());
        } else {
          val = value;
        }

        // Treat null/undefined as ""; convert numbers to string
        if (val == null) {
          val = "";
        } else if (typeof val === "number") {
          val += "";
        } else if (Array.isArray(val)) {
          val = jQuery.map(val, function (value) {
            return value == null ? "" : value + "";
          });
        }
        hooks = jQuery.valHooks[this.type] || jQuery.valHooks[this.nodeName.toLowerCase()];

        // If set returns undefined, fall back to normal setting
        if (!hooks || !("set" in hooks) || hooks.set(this, val, "value") === undefined) {
          this.value = val;
        }
      });
    }
  });
  jQuery.extend({
    valHooks: {
      option: {
        get: function get(elem) {
          var val = jQuery.find.attr(elem, "value");
          return val != null ? val :
          // Support: IE <=10 - 11 only
          // option.text throws exceptions (trac-14686, trac-14858)
          // Strip and collapse whitespace
          // https://html.spec.whatwg.org/#strip-and-collapse-whitespace
          stripAndCollapse(jQuery.text(elem));
        }
      },
      select: {
        get: function get(elem) {
          var value,
            option,
            i,
            options = elem.options,
            index = elem.selectedIndex,
            one = elem.type === "select-one",
            values = one ? null : [],
            max = one ? index + 1 : options.length;
          if (index < 0) {
            i = max;
          } else {
            i = one ? index : 0;
          }

          // Loop through all the selected options
          for (; i < max; i++) {
            option = options[i];

            // Support: IE <=9 only
            // IE8-9 doesn't update selected after form reset (trac-2551)
            if ((option.selected || i === index) &&
            // Don't return options that are disabled or in a disabled optgroup
            !option.disabled && (!option.parentNode.disabled || !nodeName(option.parentNode, "optgroup"))) {
              // Get the specific value for the option
              value = jQuery(option).val();

              // We don't need an array for one selects
              if (one) {
                return value;
              }

              // Multi-Selects return an array
              values.push(value);
            }
          }
          return values;
        },
        set: function set(elem, value) {
          var optionSet,
            option,
            options = elem.options,
            values = jQuery.makeArray(value),
            i = options.length;
          while (i--) {
            option = options[i];

            /* eslint-disable no-cond-assign */

            if (option.selected = jQuery.inArray(jQuery.valHooks.option.get(option), values) > -1) {
              optionSet = true;
            }

            /* eslint-enable no-cond-assign */
          }

          // Force browsers to behave consistently when non-matching value is set
          if (!optionSet) {
            elem.selectedIndex = -1;
          }
          return values;
        }
      }
    }
  });

  // Radios and checkboxes getter/setter
  jQuery.each(["radio", "checkbox"], function () {
    jQuery.valHooks[this] = {
      set: function set(elem, value) {
        if (Array.isArray(value)) {
          return elem.checked = jQuery.inArray(jQuery(elem).val(), value) > -1;
        }
      }
    };
    if (!support.checkOn) {
      jQuery.valHooks[this].get = function (elem) {
        return elem.getAttribute("value") === null ? "on" : elem.value;
      };
    }
  });

  // Return jQuery for attributes-only inclusion
  var location = window.location;
  var nonce = {
    guid: Date.now()
  };
  var rquery = /\?/;

  // Cross-browser xml parsing
  jQuery.parseXML = function (data) {
    var xml, parserErrorElem;
    if (!data || typeof data !== "string") {
      return null;
    }

    // Support: IE 9 - 11 only
    // IE throws on parseFromString with invalid input.
    try {
      xml = new window.DOMParser().parseFromString(data, "text/xml");
    } catch (e) {}
    parserErrorElem = xml && xml.getElementsByTagName("parsererror")[0];
    if (!xml || parserErrorElem) {
      jQuery.error("Invalid XML: " + (parserErrorElem ? jQuery.map(parserErrorElem.childNodes, function (el) {
        return el.textContent;
      }).join("\n") : data));
    }
    return xml;
  };
  var rfocusMorph = /^(?:focusinfocus|focusoutblur)$/,
    stopPropagationCallback = function stopPropagationCallback(e) {
      e.stopPropagation();
    };
  jQuery.extend(jQuery.event, {
    trigger: function trigger(event, data, elem, onlyHandlers) {
      var i,
        cur,
        tmp,
        bubbleType,
        ontype,
        handle,
        special,
        lastElement,
        eventPath = [elem || document],
        type = hasOwn.call(event, "type") ? event.type : event,
        namespaces = hasOwn.call(event, "namespace") ? event.namespace.split(".") : [];
      cur = lastElement = tmp = elem = elem || document;

      // Don't do events on text and comment nodes
      if (elem.nodeType === 3 || elem.nodeType === 8) {
        return;
      }

      // focus/blur morphs to focusin/out; ensure we're not firing them right now
      if (rfocusMorph.test(type + jQuery.event.triggered)) {
        return;
      }
      if (type.indexOf(".") > -1) {
        // Namespaced trigger; create a regexp to match event type in handle()
        namespaces = type.split(".");
        type = namespaces.shift();
        namespaces.sort();
      }
      ontype = type.indexOf(":") < 0 && "on" + type;

      // Caller can pass in a jQuery.Event object, Object, or just an event type string
      event = event[jQuery.expando] ? event : new jQuery.Event(type, _typeof(event) === "object" && event);

      // Trigger bitmask: & 1 for native handlers; & 2 for jQuery (always true)
      event.isTrigger = onlyHandlers ? 2 : 3;
      event.namespace = namespaces.join(".");
      event.rnamespace = event.namespace ? new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)") : null;

      // Clean up the event in case it is being reused
      event.result = undefined;
      if (!event.target) {
        event.target = elem;
      }

      // Clone any incoming data and prepend the event, creating the handler arg list
      data = data == null ? [event] : jQuery.makeArray(data, [event]);

      // Allow special events to draw outside the lines
      special = jQuery.event.special[type] || {};
      if (!onlyHandlers && special.trigger && special.trigger.apply(elem, data) === false) {
        return;
      }

      // Determine event propagation path in advance, per W3C events spec (trac-9951)
      // Bubble up to document, then to window; watch for a global ownerDocument var (trac-9724)
      if (!onlyHandlers && !special.noBubble && !isWindow(elem)) {
        bubbleType = special.delegateType || type;
        if (!rfocusMorph.test(bubbleType + type)) {
          cur = cur.parentNode;
        }
        for (; cur; cur = cur.parentNode) {
          eventPath.push(cur);
          tmp = cur;
        }

        // Only add window if we got to document (e.g., not plain obj or detached DOM)
        if (tmp === (elem.ownerDocument || document)) {
          eventPath.push(tmp.defaultView || tmp.parentWindow || window);
        }
      }

      // Fire handlers on the event path
      i = 0;
      while ((cur = eventPath[i++]) && !event.isPropagationStopped()) {
        lastElement = cur;
        event.type = i > 1 ? bubbleType : special.bindType || type;

        // jQuery handler
        handle = (dataPriv.get(cur, "events") || Object.create(null))[event.type] && dataPriv.get(cur, "handle");
        if (handle) {
          handle.apply(cur, data);
        }

        // Native handler
        handle = ontype && cur[ontype];
        if (handle && handle.apply && acceptData(cur)) {
          event.result = handle.apply(cur, data);
          if (event.result === false) {
            event.preventDefault();
          }
        }
      }
      event.type = type;

      // If nobody prevented the default action, do it now
      if (!onlyHandlers && !event.isDefaultPrevented()) {
        if ((!special._default || special._default.apply(eventPath.pop(), data) === false) && acceptData(elem)) {
          // Call a native DOM method on the target with the same name as the event.
          // Don't do default actions on window, that's where global variables be (trac-6170)
          if (ontype && isFunction(elem[type]) && !isWindow(elem)) {
            // Don't re-trigger an onFOO event when we call its FOO() method
            tmp = elem[ontype];
            if (tmp) {
              elem[ontype] = null;
            }

            // Prevent re-triggering of the same event, since we already bubbled it above
            jQuery.event.triggered = type;
            if (event.isPropagationStopped()) {
              lastElement.addEventListener(type, stopPropagationCallback);
            }
            elem[type]();
            if (event.isPropagationStopped()) {
              lastElement.removeEventListener(type, stopPropagationCallback);
            }
            jQuery.event.triggered = undefined;
            if (tmp) {
              elem[ontype] = tmp;
            }
          }
        }
      }
      return event.result;
    },
    // Piggyback on a donor event to simulate a different one
    // Used only for `focus(in | out)` events
    simulate: function simulate(type, elem, event) {
      var e = jQuery.extend(new jQuery.Event(), event, {
        type: type,
        isSimulated: true
      });
      jQuery.event.trigger(e, null, elem);
    }
  });
  jQuery.fn.extend({
    trigger: function trigger(type, data) {
      return this.each(function () {
        jQuery.event.trigger(type, data, this);
      });
    },
    triggerHandler: function triggerHandler(type, data) {
      var elem = this[0];
      if (elem) {
        return jQuery.event.trigger(type, data, elem, true);
      }
    }
  });
  var rbracket = /\[\]$/,
    rCRLF = /\r?\n/g,
    rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
    rsubmittable = /^(?:input|select|textarea|keygen)/i;
  function buildParams(prefix, obj, traditional, add) {
    var name;
    if (Array.isArray(obj)) {
      // Serialize array item.
      jQuery.each(obj, function (i, v) {
        if (traditional || rbracket.test(prefix)) {
          // Treat each array item as a scalar.
          add(prefix, v);
        } else {
          // Item is non-scalar (array or object), encode its numeric index.
          buildParams(prefix + "[" + (_typeof(v) === "object" && v != null ? i : "") + "]", v, traditional, add);
        }
      });
    } else if (!traditional && toType(obj) === "object") {
      // Serialize object item.
      for (name in obj) {
        buildParams(prefix + "[" + name + "]", obj[name], traditional, add);
      }
    } else {
      // Serialize scalar item.
      add(prefix, obj);
    }
  }

  // Serialize an array of form elements or a set of
  // key/values into a query string
  jQuery.param = function (a, traditional) {
    var prefix,
      s = [],
      add = function add(key, valueOrFunction) {
        // If value is a function, invoke it and use its return value
        var value = isFunction(valueOrFunction) ? valueOrFunction() : valueOrFunction;
        s[s.length] = encodeURIComponent(key) + "=" + encodeURIComponent(value == null ? "" : value);
      };
    if (a == null) {
      return "";
    }

    // If an array was passed in, assume that it is an array of form elements.
    if (Array.isArray(a) || a.jquery && !jQuery.isPlainObject(a)) {
      // Serialize the form elements
      jQuery.each(a, function () {
        add(this.name, this.value);
      });
    } else {
      // If traditional, encode the "old" way (the way 1.3.2 or older
      // did it), otherwise encode params recursively.
      for (prefix in a) {
        buildParams(prefix, a[prefix], traditional, add);
      }
    }

    // Return the resulting serialization
    return s.join("&");
  };
  jQuery.fn.extend({
    serialize: function serialize() {
      return jQuery.param(this.serializeArray());
    },
    serializeArray: function serializeArray() {
      return this.map(function () {
        // Can add propHook for "elements" to filter or add form elements
        var elements = jQuery.prop(this, "elements");
        return elements ? jQuery.makeArray(elements) : this;
      }).filter(function () {
        var type = this.type;

        // Use .is( ":disabled" ) so that fieldset[disabled] works
        return this.name && !jQuery(this).is(":disabled") && rsubmittable.test(this.nodeName) && !rsubmitterTypes.test(type) && (this.checked || !rcheckableType.test(type));
      }).map(function (_i, elem) {
        var val = jQuery(this).val();
        if (val == null) {
          return null;
        }
        if (Array.isArray(val)) {
          return jQuery.map(val, function (val) {
            return {
              name: elem.name,
              value: val.replace(rCRLF, "\r\n")
            };
          });
        }
        return {
          name: elem.name,
          value: val.replace(rCRLF, "\r\n")
        };
      }).get();
    }
  });
  var r20 = /%20/g,
    rhash = /#.*$/,
    rantiCache = /([?&])_=[^&]*/,
    rheaders = /^(.*?):[ \t]*([^\r\n]*)$/mg,
    // trac-7653, trac-8125, trac-8152: local protocol detection
    rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
    rnoContent = /^(?:GET|HEAD)$/,
    rprotocol = /^\/\//,
    /* Prefilters
     * 1) They are useful to introduce custom dataTypes (see ajax/jsonp.js for an example)
     * 2) These are called:
     *    - BEFORE asking for a transport
     *    - AFTER param serialization (s.data is a string if s.processData is true)
     * 3) key is the dataType
     * 4) the catchall symbol "*" can be used
     * 5) execution will start with transport dataType and THEN continue down to "*" if needed
     */
    prefilters = {},
    /* Transports bindings
     * 1) key is the dataType
     * 2) the catchall symbol "*" can be used
     * 3) selection will start with transport dataType and THEN go to "*" if needed
     */
    transports = {},
    // Avoid comment-prolog char sequence (trac-10098); must appease lint and evade compression
    allTypes = "*/".concat("*"),
    // Anchor tag for parsing the document origin
    originAnchor = document.createElement("a");
  originAnchor.href = location.href;

  // Base "constructor" for jQuery.ajaxPrefilter and jQuery.ajaxTransport
  function addToPrefiltersOrTransports(structure) {
    // dataTypeExpression is optional and defaults to "*"
    return function (dataTypeExpression, func) {
      if (typeof dataTypeExpression !== "string") {
        func = dataTypeExpression;
        dataTypeExpression = "*";
      }
      var dataType,
        i = 0,
        dataTypes = dataTypeExpression.toLowerCase().match(rnothtmlwhite) || [];
      if (isFunction(func)) {
        // For each dataType in the dataTypeExpression
        while (dataType = dataTypes[i++]) {
          // Prepend if requested
          if (dataType[0] === "+") {
            dataType = dataType.slice(1) || "*";
            (structure[dataType] = structure[dataType] || []).unshift(func);

            // Otherwise append
          } else {
            (structure[dataType] = structure[dataType] || []).push(func);
          }
        }
      }
    };
  }

  // Base inspection function for prefilters and transports
  function inspectPrefiltersOrTransports(structure, options, originalOptions, jqXHR) {
    var inspected = {},
      seekingTransport = structure === transports;
    function inspect(dataType) {
      var selected;
      inspected[dataType] = true;
      jQuery.each(structure[dataType] || [], function (_, prefilterOrFactory) {
        var dataTypeOrTransport = prefilterOrFactory(options, originalOptions, jqXHR);
        if (typeof dataTypeOrTransport === "string" && !seekingTransport && !inspected[dataTypeOrTransport]) {
          options.dataTypes.unshift(dataTypeOrTransport);
          inspect(dataTypeOrTransport);
          return false;
        } else if (seekingTransport) {
          return !(selected = dataTypeOrTransport);
        }
      });
      return selected;
    }
    return inspect(options.dataTypes[0]) || !inspected["*"] && inspect("*");
  }

  // A special extend for ajax options
  // that takes "flat" options (not to be deep extended)
  // Fixes trac-9887
  function ajaxExtend(target, src) {
    var key,
      deep,
      flatOptions = jQuery.ajaxSettings.flatOptions || {};
    for (key in src) {
      if (src[key] !== undefined) {
        (flatOptions[key] ? target : deep || (deep = {}))[key] = src[key];
      }
    }
    if (deep) {
      jQuery.extend(true, target, deep);
    }
    return target;
  }

  /* Handles responses to an ajax request:
   * - finds the right dataType (mediates between content-type and expected dataType)
   * - returns the corresponding response
   */
  function ajaxHandleResponses(s, jqXHR, responses) {
    var ct,
      type,
      finalDataType,
      firstDataType,
      contents = s.contents,
      dataTypes = s.dataTypes;

    // Remove auto dataType and get content-type in the process
    while (dataTypes[0] === "*") {
      dataTypes.shift();
      if (ct === undefined) {
        ct = s.mimeType || jqXHR.getResponseHeader("Content-Type");
      }
    }

    // Check if we're dealing with a known content-type
    if (ct) {
      for (type in contents) {
        if (contents[type] && contents[type].test(ct)) {
          dataTypes.unshift(type);
          break;
        }
      }
    }

    // Check to see if we have a response for the expected dataType
    if (dataTypes[0] in responses) {
      finalDataType = dataTypes[0];
    } else {
      // Try convertible dataTypes
      for (type in responses) {
        if (!dataTypes[0] || s.converters[type + " " + dataTypes[0]]) {
          finalDataType = type;
          break;
        }
        if (!firstDataType) {
          firstDataType = type;
        }
      }

      // Or just use first one
      finalDataType = finalDataType || firstDataType;
    }

    // If we found a dataType
    // We add the dataType to the list if needed
    // and return the corresponding response
    if (finalDataType) {
      if (finalDataType !== dataTypes[0]) {
        dataTypes.unshift(finalDataType);
      }
      return responses[finalDataType];
    }
  }

  /* Chain conversions given the request and the original response
   * Also sets the responseXXX fields on the jqXHR instance
   */
  function ajaxConvert(s, response, jqXHR, isSuccess) {
    var conv2,
      current,
      conv,
      tmp,
      prev,
      converters = {},
      // Work with a copy of dataTypes in case we need to modify it for conversion
      dataTypes = s.dataTypes.slice();

    // Create converters map with lowercased keys
    if (dataTypes[1]) {
      for (conv in s.converters) {
        converters[conv.toLowerCase()] = s.converters[conv];
      }
    }
    current = dataTypes.shift();

    // Convert to each sequential dataType
    while (current) {
      if (s.responseFields[current]) {
        jqXHR[s.responseFields[current]] = response;
      }

      // Apply the dataFilter if provided
      if (!prev && isSuccess && s.dataFilter) {
        response = s.dataFilter(response, s.dataType);
      }
      prev = current;
      current = dataTypes.shift();
      if (current) {
        // There's only work to do if current dataType is non-auto
        if (current === "*") {
          current = prev;

          // Convert response if prev dataType is non-auto and differs from current
        } else if (prev !== "*" && prev !== current) {
          // Seek a direct converter
          conv = converters[prev + " " + current] || converters["* " + current];

          // If none found, seek a pair
          if (!conv) {
            for (conv2 in converters) {
              // If conv2 outputs current
              tmp = conv2.split(" ");
              if (tmp[1] === current) {
                // If prev can be converted to accepted input
                conv = converters[prev + " " + tmp[0]] || converters["* " + tmp[0]];
                if (conv) {
                  // Condense equivalence converters
                  if (conv === true) {
                    conv = converters[conv2];

                    // Otherwise, insert the intermediate dataType
                  } else if (converters[conv2] !== true) {
                    current = tmp[0];
                    dataTypes.unshift(tmp[1]);
                  }
                  break;
                }
              }
            }
          }

          // Apply converter (if not an equivalence)
          if (conv !== true) {
            // Unless errors are allowed to bubble, catch and return them
            if (conv && s["throws"]) {
              response = conv(response);
            } else {
              try {
                response = conv(response);
              } catch (e) {
                return {
                  state: "parsererror",
                  error: conv ? e : "No conversion from " + prev + " to " + current
                };
              }
            }
          }
        }
      }
    }
    return {
      state: "success",
      data: response
    };
  }
  jQuery.extend({
    // Counter for holding the number of active queries
    active: 0,
    // Last-Modified header cache for next request
    lastModified: {},
    etag: {},
    ajaxSettings: {
      url: location.href,
      type: "GET",
      isLocal: rlocalProtocol.test(location.protocol),
      global: true,
      processData: true,
      async: true,
      contentType: "application/x-www-form-urlencoded; charset=UTF-8",
      /*
      timeout: 0,
      data: null,
      dataType: null,
      username: null,
      password: null,
      cache: null,
      throws: false,
      traditional: false,
      headers: {},
      */

      accepts: {
        "*": allTypes,
        text: "text/plain",
        html: "text/html",
        xml: "application/xml, text/xml",
        json: "application/json, text/javascript"
      },
      contents: {
        xml: /\bxml\b/,
        html: /\bhtml/,
        json: /\bjson\b/
      },
      responseFields: {
        xml: "responseXML",
        text: "responseText",
        json: "responseJSON"
      },
      // Data converters
      // Keys separate source (or catchall "*") and destination types with a single space
      converters: {
        // Convert anything to text
        "* text": String,
        // Text to html (true = no transformation)
        "text html": true,
        // Evaluate text as a json expression
        "text json": JSON.parse,
        // Parse text as xml
        "text xml": jQuery.parseXML
      },
      // For options that shouldn't be deep extended:
      // you can add your own custom options here if
      // and when you create one that shouldn't be
      // deep extended (see ajaxExtend)
      flatOptions: {
        url: true,
        context: true
      }
    },
    // Creates a full fledged settings object into target
    // with both ajaxSettings and settings fields.
    // If target is omitted, writes into ajaxSettings.
    ajaxSetup: function ajaxSetup(target, settings) {
      return settings ?
      // Building a settings object
      ajaxExtend(ajaxExtend(target, jQuery.ajaxSettings), settings) :
      // Extending ajaxSettings
      ajaxExtend(jQuery.ajaxSettings, target);
    },
    ajaxPrefilter: addToPrefiltersOrTransports(prefilters),
    ajaxTransport: addToPrefiltersOrTransports(transports),
    // Main method
    ajax: function ajax(url, options) {
      // If url is an object, simulate pre-1.5 signature
      if (_typeof(url) === "object") {
        options = url;
        url = undefined;
      }

      // Force options to be an object
      options = options || {};
      var transport,
        // URL without anti-cache param
        cacheURL,
        // Response headers
        responseHeadersString,
        responseHeaders,
        // timeout handle
        timeoutTimer,
        // Url cleanup var
        urlAnchor,
        // Request state (becomes false upon send and true upon completion)
        completed,
        // To know if global events are to be dispatched
        fireGlobals,
        // Loop variable
        i,
        // uncached part of the url
        uncached,
        // Create the final options object
        s = jQuery.ajaxSetup({}, options),
        // Callbacks context
        callbackContext = s.context || s,
        // Context for global events is callbackContext if it is a DOM node or jQuery collection
        globalEventContext = s.context && (callbackContext.nodeType || callbackContext.jquery) ? jQuery(callbackContext) : jQuery.event,
        // Deferreds
        deferred = jQuery.Deferred(),
        completeDeferred = jQuery.Callbacks("once memory"),
        // Status-dependent callbacks
        _statusCode = s.statusCode || {},
        // Headers (they are sent all at once)
        requestHeaders = {},
        requestHeadersNames = {},
        // Default abort message
        strAbort = "canceled",
        // Fake xhr
        jqXHR = {
          readyState: 0,
          // Builds headers hashtable if needed
          getResponseHeader: function getResponseHeader(key) {
            var match;
            if (completed) {
              if (!responseHeaders) {
                responseHeaders = {};
                while (match = rheaders.exec(responseHeadersString)) {
                  responseHeaders[match[1].toLowerCase() + " "] = (responseHeaders[match[1].toLowerCase() + " "] || []).concat(match[2]);
                }
              }
              match = responseHeaders[key.toLowerCase() + " "];
            }
            return match == null ? null : match.join(", ");
          },
          // Raw string
          getAllResponseHeaders: function getAllResponseHeaders() {
            return completed ? responseHeadersString : null;
          },
          // Caches the header
          setRequestHeader: function setRequestHeader(name, value) {
            if (completed == null) {
              name = requestHeadersNames[name.toLowerCase()] = requestHeadersNames[name.toLowerCase()] || name;
              requestHeaders[name] = value;
            }
            return this;
          },
          // Overrides response content-type header
          overrideMimeType: function overrideMimeType(type) {
            if (completed == null) {
              s.mimeType = type;
            }
            return this;
          },
          // Status-dependent callbacks
          statusCode: function statusCode(map) {
            var code;
            if (map) {
              if (completed) {
                // Execute the appropriate callbacks
                jqXHR.always(map[jqXHR.status]);
              } else {
                // Lazy-add the new callbacks in a way that preserves old ones
                for (code in map) {
                  _statusCode[code] = [_statusCode[code], map[code]];
                }
              }
            }
            return this;
          },
          // Cancel the request
          abort: function abort(statusText) {
            var finalText = statusText || strAbort;
            if (transport) {
              transport.abort(finalText);
            }
            done(0, finalText);
            return this;
          }
        };

      // Attach deferreds
      deferred.promise(jqXHR);

      // Add protocol if not provided (prefilters might expect it)
      // Handle falsy url in the settings object (trac-10093: consistency with old signature)
      // We also use the url parameter if available
      s.url = ((url || s.url || location.href) + "").replace(rprotocol, location.protocol + "//");

      // Alias method option to type as per ticket trac-12004
      s.type = options.method || options.type || s.method || s.type;

      // Extract dataTypes list
      s.dataTypes = (s.dataType || "*").toLowerCase().match(rnothtmlwhite) || [""];

      // A cross-domain request is in order when the origin doesn't match the current origin.
      if (s.crossDomain == null) {
        urlAnchor = document.createElement("a");

        // Support: IE <=8 - 11, Edge 12 - 15
        // IE throws exception on accessing the href property if url is malformed,
        // e.g. http://example.com:80x/
        try {
          urlAnchor.href = s.url;

          // Support: IE <=8 - 11 only
          // Anchor's host property isn't correctly set when s.url is relative
          urlAnchor.href = urlAnchor.href;
          s.crossDomain = originAnchor.protocol + "//" + originAnchor.host !== urlAnchor.protocol + "//" + urlAnchor.host;
        } catch (e) {
          // If there is an error parsing the URL, assume it is crossDomain,
          // it can be rejected by the transport if it is invalid
          s.crossDomain = true;
        }
      }

      // Convert data if not already a string
      if (s.data && s.processData && typeof s.data !== "string") {
        s.data = jQuery.param(s.data, s.traditional);
      }

      // Apply prefilters
      inspectPrefiltersOrTransports(prefilters, s, options, jqXHR);

      // If request was aborted inside a prefilter, stop there
      if (completed) {
        return jqXHR;
      }

      // We can fire global events as of now if asked to
      // Don't fire events if jQuery.event is undefined in an AMD-usage scenario (trac-15118)
      fireGlobals = jQuery.event && s.global;

      // Watch for a new set of requests
      if (fireGlobals && jQuery.active++ === 0) {
        jQuery.event.trigger("ajaxStart");
      }

      // Uppercase the type
      s.type = s.type.toUpperCase();

      // Determine if request has content
      s.hasContent = !rnoContent.test(s.type);

      // Save the URL in case we're toying with the If-Modified-Since
      // and/or If-None-Match header later on
      // Remove hash to simplify url manipulation
      cacheURL = s.url.replace(rhash, "");

      // More options handling for requests with no content
      if (!s.hasContent) {
        // Remember the hash so we can put it back
        uncached = s.url.slice(cacheURL.length);

        // If data is available and should be processed, append data to url
        if (s.data && (s.processData || typeof s.data === "string")) {
          cacheURL += (rquery.test(cacheURL) ? "&" : "?") + s.data;

          // trac-9682: remove data so that it's not used in an eventual retry
          delete s.data;
        }

        // Add or update anti-cache param if needed
        if (s.cache === false) {
          cacheURL = cacheURL.replace(rantiCache, "$1");
          uncached = (rquery.test(cacheURL) ? "&" : "?") + "_=" + nonce.guid++ + uncached;
        }

        // Put hash and anti-cache on the URL that will be requested (gh-1732)
        s.url = cacheURL + uncached;

        // Change '%20' to '+' if this is encoded form body content (gh-2658)
      } else if (s.data && s.processData && (s.contentType || "").indexOf("application/x-www-form-urlencoded") === 0) {
        s.data = s.data.replace(r20, "+");
      }

      // Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
      if (s.ifModified) {
        if (jQuery.lastModified[cacheURL]) {
          jqXHR.setRequestHeader("If-Modified-Since", jQuery.lastModified[cacheURL]);
        }
        if (jQuery.etag[cacheURL]) {
          jqXHR.setRequestHeader("If-None-Match", jQuery.etag[cacheURL]);
        }
      }

      // Set the correct header, if data is being sent
      if (s.data && s.hasContent && s.contentType !== false || options.contentType) {
        jqXHR.setRequestHeader("Content-Type", s.contentType);
      }

      // Set the Accepts header for the server, depending on the dataType
      jqXHR.setRequestHeader("Accept", s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + (s.dataTypes[0] !== "*" ? ", " + allTypes + "; q=0.01" : "") : s.accepts["*"]);

      // Check for headers option
      for (i in s.headers) {
        jqXHR.setRequestHeader(i, s.headers[i]);
      }

      // Allow custom headers/mimetypes and early abort
      if (s.beforeSend && (s.beforeSend.call(callbackContext, jqXHR, s) === false || completed)) {
        // Abort if not done already and return
        return jqXHR.abort();
      }

      // Aborting is no longer a cancellation
      strAbort = "abort";

      // Install callbacks on deferreds
      completeDeferred.add(s.complete);
      jqXHR.done(s.success);
      jqXHR.fail(s.error);

      // Get transport
      transport = inspectPrefiltersOrTransports(transports, s, options, jqXHR);

      // If no transport, we auto-abort
      if (!transport) {
        done(-1, "No Transport");
      } else {
        jqXHR.readyState = 1;

        // Send global event
        if (fireGlobals) {
          globalEventContext.trigger("ajaxSend", [jqXHR, s]);
        }

        // If request was aborted inside ajaxSend, stop there
        if (completed) {
          return jqXHR;
        }

        // Timeout
        if (s.async && s.timeout > 0) {
          timeoutTimer = window.setTimeout(function () {
            jqXHR.abort("timeout");
          }, s.timeout);
        }
        try {
          completed = false;
          transport.send(requestHeaders, done);
        } catch (e) {
          // Rethrow post-completion exceptions
          if (completed) {
            throw e;
          }

          // Propagate others as results
          done(-1, e);
        }
      }

      // Callback for when everything is done
      function done(status, nativeStatusText, responses, headers) {
        var isSuccess,
          success,
          error,
          response,
          modified,
          statusText = nativeStatusText;

        // Ignore repeat invocations
        if (completed) {
          return;
        }
        completed = true;

        // Clear timeout if it exists
        if (timeoutTimer) {
          window.clearTimeout(timeoutTimer);
        }

        // Dereference transport for early garbage collection
        // (no matter how long the jqXHR object will be used)
        transport = undefined;

        // Cache response headers
        responseHeadersString = headers || "";

        // Set readyState
        jqXHR.readyState = status > 0 ? 4 : 0;

        // Determine if successful
        isSuccess = status >= 200 && status < 300 || status === 304;

        // Get response data
        if (responses) {
          response = ajaxHandleResponses(s, jqXHR, responses);
        }

        // Use a noop converter for missing script but not if jsonp
        if (!isSuccess && jQuery.inArray("script", s.dataTypes) > -1 && jQuery.inArray("json", s.dataTypes) < 0) {
          s.converters["text script"] = function () {};
        }

        // Convert no matter what (that way responseXXX fields are always set)
        response = ajaxConvert(s, response, jqXHR, isSuccess);

        // If successful, handle type chaining
        if (isSuccess) {
          // Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
          if (s.ifModified) {
            modified = jqXHR.getResponseHeader("Last-Modified");
            if (modified) {
              jQuery.lastModified[cacheURL] = modified;
            }
            modified = jqXHR.getResponseHeader("etag");
            if (modified) {
              jQuery.etag[cacheURL] = modified;
            }
          }

          // if no content
          if (status === 204 || s.type === "HEAD") {
            statusText = "nocontent";

            // if not modified
          } else if (status === 304) {
            statusText = "notmodified";

            // If we have data, let's convert it
          } else {
            statusText = response.state;
            success = response.data;
            error = response.error;
            isSuccess = !error;
          }
        } else {
          // Extract error from statusText and normalize for non-aborts
          error = statusText;
          if (status || !statusText) {
            statusText = "error";
            if (status < 0) {
              status = 0;
            }
          }
        }

        // Set data for the fake xhr object
        jqXHR.status = status;
        jqXHR.statusText = (nativeStatusText || statusText) + "";

        // Success/Error
        if (isSuccess) {
          deferred.resolveWith(callbackContext, [success, statusText, jqXHR]);
        } else {
          deferred.rejectWith(callbackContext, [jqXHR, statusText, error]);
        }

        // Status-dependent callbacks
        jqXHR.statusCode(_statusCode);
        _statusCode = undefined;
        if (fireGlobals) {
          globalEventContext.trigger(isSuccess ? "ajaxSuccess" : "ajaxError", [jqXHR, s, isSuccess ? success : error]);
        }

        // Complete
        completeDeferred.fireWith(callbackContext, [jqXHR, statusText]);
        if (fireGlobals) {
          globalEventContext.trigger("ajaxComplete", [jqXHR, s]);

          // Handle the global AJAX counter
          if (! --jQuery.active) {
            jQuery.event.trigger("ajaxStop");
          }
        }
      }
      return jqXHR;
    },
    getJSON: function getJSON(url, data, callback) {
      return jQuery.get(url, data, callback, "json");
    },
    getScript: function getScript(url, callback) {
      return jQuery.get(url, undefined, callback, "script");
    }
  });
  jQuery.each(["get", "post"], function (_i, method) {
    jQuery[method] = function (url, data, callback, type) {
      // Shift arguments if data argument was omitted
      if (isFunction(data)) {
        type = type || callback;
        callback = data;
        data = undefined;
      }

      // The url can be an options object (which then must have .url)
      return jQuery.ajax(jQuery.extend({
        url: url,
        type: method,
        dataType: type,
        data: data,
        success: callback
      }, jQuery.isPlainObject(url) && url));
    };
  });
  jQuery.ajaxPrefilter(function (s) {
    var i;
    for (i in s.headers) {
      if (i.toLowerCase() === "content-type") {
        s.contentType = s.headers[i] || "";
      }
    }
  });
  jQuery._evalUrl = function (url, options, doc) {
    return jQuery.ajax({
      url: url,
      // Make this explicit, since user can override this through ajaxSetup (trac-11264)
      type: "GET",
      dataType: "script",
      cache: true,
      async: false,
      global: false,
      // Only evaluate the response if it is successful (gh-4126)
      // dataFilter is not invoked for failure responses, so using it instead
      // of the default converter is kludgy but it works.
      converters: {
        "text script": function textScript() {}
      },
      dataFilter: function dataFilter(response) {
        jQuery.globalEval(response, options, doc);
      }
    });
  };
  jQuery.fn.extend({
    wrapAll: function wrapAll(html) {
      var wrap;
      if (this[0]) {
        if (isFunction(html)) {
          html = html.call(this[0]);
        }

        // The elements to wrap the target around
        wrap = jQuery(html, this[0].ownerDocument).eq(0).clone(true);
        if (this[0].parentNode) {
          wrap.insertBefore(this[0]);
        }
        wrap.map(function () {
          var elem = this;
          while (elem.firstElementChild) {
            elem = elem.firstElementChild;
          }
          return elem;
        }).append(this);
      }
      return this;
    },
    wrapInner: function wrapInner(html) {
      if (isFunction(html)) {
        return this.each(function (i) {
          jQuery(this).wrapInner(html.call(this, i));
        });
      }
      return this.each(function () {
        var self = jQuery(this),
          contents = self.contents();
        if (contents.length) {
          contents.wrapAll(html);
        } else {
          self.append(html);
        }
      });
    },
    wrap: function wrap(html) {
      var htmlIsFunction = isFunction(html);
      return this.each(function (i) {
        jQuery(this).wrapAll(htmlIsFunction ? html.call(this, i) : html);
      });
    },
    unwrap: function unwrap(selector) {
      this.parent(selector).not("body").each(function () {
        jQuery(this).replaceWith(this.childNodes);
      });
      return this;
    }
  });
  jQuery.expr.pseudos.hidden = function (elem) {
    return !jQuery.expr.pseudos.visible(elem);
  };
  jQuery.expr.pseudos.visible = function (elem) {
    return !!(elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length);
  };
  jQuery.ajaxSettings.xhr = function () {
    try {
      return new window.XMLHttpRequest();
    } catch (e) {}
  };
  var xhrSuccessStatus = {
      // File protocol always yields status code 0, assume 200
      0: 200,
      // Support: IE <=9 only
      // trac-1450: sometimes IE returns 1223 when it should be 204
      1223: 204
    },
    xhrSupported = jQuery.ajaxSettings.xhr();
  support.cors = !!xhrSupported && "withCredentials" in xhrSupported;
  support.ajax = xhrSupported = !!xhrSupported;
  jQuery.ajaxTransport(function (options) {
    var _callback, errorCallback;

    // Cross domain only allowed if supported through XMLHttpRequest
    if (support.cors || xhrSupported && !options.crossDomain) {
      return {
        send: function send(headers, complete) {
          var i,
            xhr = options.xhr();
          xhr.open(options.type, options.url, options.async, options.username, options.password);

          // Apply custom fields if provided
          if (options.xhrFields) {
            for (i in options.xhrFields) {
              xhr[i] = options.xhrFields[i];
            }
          }

          // Override mime type if needed
          if (options.mimeType && xhr.overrideMimeType) {
            xhr.overrideMimeType(options.mimeType);
          }

          // X-Requested-With header
          // For cross-domain requests, seeing as conditions for a preflight are
          // akin to a jigsaw puzzle, we simply never set it to be sure.
          // (it can always be set on a per-request basis or even using ajaxSetup)
          // For same-domain requests, won't change header if already provided.
          if (!options.crossDomain && !headers["X-Requested-With"]) {
            headers["X-Requested-With"] = "XMLHttpRequest";
          }

          // Set headers
          for (i in headers) {
            xhr.setRequestHeader(i, headers[i]);
          }

          // Callback
          _callback = function callback(type) {
            return function () {
              if (_callback) {
                _callback = errorCallback = xhr.onload = xhr.onerror = xhr.onabort = xhr.ontimeout = xhr.onreadystatechange = null;
                if (type === "abort") {
                  xhr.abort();
                } else if (type === "error") {
                  // Support: IE <=9 only
                  // On a manual native abort, IE9 throws
                  // errors on any property access that is not readyState
                  if (typeof xhr.status !== "number") {
                    complete(0, "error");
                  } else {
                    complete(
                    // File: protocol always yields status 0; see trac-8605, trac-14207
                    xhr.status, xhr.statusText);
                  }
                } else {
                  complete(xhrSuccessStatus[xhr.status] || xhr.status, xhr.statusText,
                  // Support: IE <=9 only
                  // IE9 has no XHR2 but throws on binary (trac-11426)
                  // For XHR2 non-text, let the caller handle it (gh-2498)
                  (xhr.responseType || "text") !== "text" || typeof xhr.responseText !== "string" ? {
                    binary: xhr.response
                  } : {
                    text: xhr.responseText
                  }, xhr.getAllResponseHeaders());
                }
              }
            };
          };

          // Listen to events
          xhr.onload = _callback();
          errorCallback = xhr.onerror = xhr.ontimeout = _callback("error");

          // Support: IE 9 only
          // Use onreadystatechange to replace onabort
          // to handle uncaught aborts
          if (xhr.onabort !== undefined) {
            xhr.onabort = errorCallback;
          } else {
            xhr.onreadystatechange = function () {
              // Check readyState before timeout as it changes
              if (xhr.readyState === 4) {
                // Allow onerror to be called first,
                // but that will not handle a native abort
                // Also, save errorCallback to a variable
                // as xhr.onerror cannot be accessed
                window.setTimeout(function () {
                  if (_callback) {
                    errorCallback();
                  }
                });
              }
            };
          }

          // Create the abort callback
          _callback = _callback("abort");
          try {
            // Do send the request (this may raise an exception)
            xhr.send(options.hasContent && options.data || null);
          } catch (e) {
            // trac-14683: Only rethrow if this hasn't been notified as an error yet
            if (_callback) {
              throw e;
            }
          }
        },
        abort: function abort() {
          if (_callback) {
            _callback();
          }
        }
      };
    }
  });

  // Prevent auto-execution of scripts when no explicit dataType was provided (See gh-2432)
  jQuery.ajaxPrefilter(function (s) {
    if (s.crossDomain) {
      s.contents.script = false;
    }
  });

  // Install script dataType
  jQuery.ajaxSetup({
    accepts: {
      script: "text/javascript, application/javascript, " + "application/ecmascript, application/x-ecmascript"
    },
    contents: {
      script: /\b(?:java|ecma)script\b/
    },
    converters: {
      "text script": function textScript(text) {
        jQuery.globalEval(text);
        return text;
      }
    }
  });

  // Handle cache's special case and crossDomain
  jQuery.ajaxPrefilter("script", function (s) {
    if (s.cache === undefined) {
      s.cache = false;
    }
    if (s.crossDomain) {
      s.type = "GET";
    }
  });

  // Bind script tag hack transport
  jQuery.ajaxTransport("script", function (s) {
    // This transport only deals with cross domain or forced-by-attrs requests
    if (s.crossDomain || s.scriptAttrs) {
      var script, _callback2;
      return {
        send: function send(_, complete) {
          script = jQuery("<script>").attr(s.scriptAttrs || {}).prop({
            charset: s.scriptCharset,
            src: s.url
          }).on("load error", _callback2 = function callback(evt) {
            script.remove();
            _callback2 = null;
            if (evt) {
              complete(evt.type === "error" ? 404 : 200, evt.type);
            }
          });

          // Use native DOM manipulation to avoid our domManip AJAX trickery
          document.head.appendChild(script[0]);
        },
        abort: function abort() {
          if (_callback2) {
            _callback2();
          }
        }
      };
    }
  });
  var oldCallbacks = [],
    rjsonp = /(=)\?(?=&|$)|\?\?/;

  // Default jsonp settings
  jQuery.ajaxSetup({
    jsonp: "callback",
    jsonpCallback: function jsonpCallback() {
      var callback = oldCallbacks.pop() || jQuery.expando + "_" + nonce.guid++;
      this[callback] = true;
      return callback;
    }
  });

  // Detect, normalize options and install callbacks for jsonp requests
  jQuery.ajaxPrefilter("json jsonp", function (s, originalSettings, jqXHR) {
    var callbackName,
      overwritten,
      responseContainer,
      jsonProp = s.jsonp !== false && (rjsonp.test(s.url) ? "url" : typeof s.data === "string" && (s.contentType || "").indexOf("application/x-www-form-urlencoded") === 0 && rjsonp.test(s.data) && "data");

    // Handle iff the expected data type is "jsonp" or we have a parameter to set
    if (jsonProp || s.dataTypes[0] === "jsonp") {
      // Get callback name, remembering preexisting value associated with it
      callbackName = s.jsonpCallback = isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback;

      // Insert callback into url or form data
      if (jsonProp) {
        s[jsonProp] = s[jsonProp].replace(rjsonp, "$1" + callbackName);
      } else if (s.jsonp !== false) {
        s.url += (rquery.test(s.url) ? "&" : "?") + s.jsonp + "=" + callbackName;
      }

      // Use data converter to retrieve json after script execution
      s.converters["script json"] = function () {
        if (!responseContainer) {
          jQuery.error(callbackName + " was not called");
        }
        return responseContainer[0];
      };

      // Force json dataType
      s.dataTypes[0] = "json";

      // Install callback
      overwritten = window[callbackName];
      window[callbackName] = function () {
        responseContainer = arguments;
      };

      // Clean-up function (fires after converters)
      jqXHR.always(function () {
        // If previous value didn't exist - remove it
        if (overwritten === undefined) {
          jQuery(window).removeProp(callbackName);

          // Otherwise restore preexisting value
        } else {
          window[callbackName] = overwritten;
        }

        // Save back as free
        if (s[callbackName]) {
          // Make sure that re-using the options doesn't screw things around
          s.jsonpCallback = originalSettings.jsonpCallback;

          // Save the callback name for future use
          oldCallbacks.push(callbackName);
        }

        // Call if it was a function and we have a response
        if (responseContainer && isFunction(overwritten)) {
          overwritten(responseContainer[0]);
        }
        responseContainer = overwritten = undefined;
      });

      // Delegate to script
      return "script";
    }
  });

  // Support: Safari 8 only
  // In Safari 8 documents created via document.implementation.createHTMLDocument
  // collapse sibling forms: the second one becomes a child of the first one.
  // Because of that, this security measure has to be disabled in Safari 8.
  // https://bugs.webkit.org/show_bug.cgi?id=137337
  support.createHTMLDocument = function () {
    var body = document.implementation.createHTMLDocument("").body;
    body.innerHTML = "<form></form><form></form>";
    return body.childNodes.length === 2;
  }();

  // Argument "data" should be string of html
  // context (optional): If specified, the fragment will be created in this context,
  // defaults to document
  // keepScripts (optional): If true, will include scripts passed in the html string
  jQuery.parseHTML = function (data, context, keepScripts) {
    if (typeof data !== "string") {
      return [];
    }
    if (typeof context === "boolean") {
      keepScripts = context;
      context = false;
    }
    var base, parsed, scripts;
    if (!context) {
      // Stop scripts or inline event handlers from being executed immediately
      // by using document.implementation
      if (support.createHTMLDocument) {
        context = document.implementation.createHTMLDocument("");

        // Set the base href for the created document
        // so any parsed elements with URLs
        // are based on the document's URL (gh-2965)
        base = context.createElement("base");
        base.href = document.location.href;
        context.head.appendChild(base);
      } else {
        context = document;
      }
    }
    parsed = rsingleTag.exec(data);
    scripts = !keepScripts && [];

    // Single tag
    if (parsed) {
      return [context.createElement(parsed[1])];
    }
    parsed = buildFragment([data], context, scripts);
    if (scripts && scripts.length) {
      jQuery(scripts).remove();
    }
    return jQuery.merge([], parsed.childNodes);
  };

  /**
   * Load a url into a page
   */
  jQuery.fn.load = function (url, params, callback) {
    var selector,
      type,
      response,
      self = this,
      off = url.indexOf(" ");
    if (off > -1) {
      selector = stripAndCollapse(url.slice(off));
      url = url.slice(0, off);
    }

    // If it's a function
    if (isFunction(params)) {
      // We assume that it's the callback
      callback = params;
      params = undefined;

      // Otherwise, build a param string
    } else if (params && _typeof(params) === "object") {
      type = "POST";
    }

    // If we have elements to modify, make the request
    if (self.length > 0) {
      jQuery.ajax({
        url: url,
        // If "type" variable is undefined, then "GET" method will be used.
        // Make value of this field explicit since
        // user can override it through ajaxSetup method
        type: type || "GET",
        dataType: "html",
        data: params
      }).done(function (responseText) {
        // Save response for use in complete callback
        response = arguments;
        self.html(selector ?
        // If a selector was specified, locate the right elements in a dummy div
        // Exclude scripts to avoid IE 'Permission Denied' errors
        jQuery("<div>").append(jQuery.parseHTML(responseText)).find(selector) :
        // Otherwise use the full result
        responseText);

        // If the request succeeds, this function gets "data", "status", "jqXHR"
        // but they are ignored because response was set above.
        // If it fails, this function gets "jqXHR", "status", "error"
      }).always(callback && function (jqXHR, status) {
        self.each(function () {
          callback.apply(this, response || [jqXHR.responseText, status, jqXHR]);
        });
      });
    }
    return this;
  };
  jQuery.expr.pseudos.animated = function (elem) {
    return jQuery.grep(jQuery.timers, function (fn) {
      return elem === fn.elem;
    }).length;
  };
  jQuery.offset = {
    setOffset: function setOffset(elem, options, i) {
      var curPosition,
        curLeft,
        curCSSTop,
        curTop,
        curOffset,
        curCSSLeft,
        calculatePosition,
        position = jQuery.css(elem, "position"),
        curElem = jQuery(elem),
        props = {};

      // Set position first, in-case top/left are set even on static elem
      if (position === "static") {
        elem.style.position = "relative";
      }
      curOffset = curElem.offset();
      curCSSTop = jQuery.css(elem, "top");
      curCSSLeft = jQuery.css(elem, "left");
      calculatePosition = (position === "absolute" || position === "fixed") && (curCSSTop + curCSSLeft).indexOf("auto") > -1;

      // Need to be able to calculate position if either
      // top or left is auto and position is either absolute or fixed
      if (calculatePosition) {
        curPosition = curElem.position();
        curTop = curPosition.top;
        curLeft = curPosition.left;
      } else {
        curTop = parseFloat(curCSSTop) || 0;
        curLeft = parseFloat(curCSSLeft) || 0;
      }
      if (isFunction(options)) {
        // Use jQuery.extend here to allow modification of coordinates argument (gh-1848)
        options = options.call(elem, i, jQuery.extend({}, curOffset));
      }
      if (options.top != null) {
        props.top = options.top - curOffset.top + curTop;
      }
      if (options.left != null) {
        props.left = options.left - curOffset.left + curLeft;
      }
      if ("using" in options) {
        options.using.call(elem, props);
      } else {
        curElem.css(props);
      }
    }
  };
  jQuery.fn.extend({
    // offset() relates an element's border box to the document origin
    offset: function offset(options) {
      // Preserve chaining for setter
      if (arguments.length) {
        return options === undefined ? this : this.each(function (i) {
          jQuery.offset.setOffset(this, options, i);
        });
      }
      var rect,
        win,
        elem = this[0];
      if (!elem) {
        return;
      }

      // Return zeros for disconnected and hidden (display: none) elements (gh-2310)
      // Support: IE <=11 only
      // Running getBoundingClientRect on a
      // disconnected node in IE throws an error
      if (!elem.getClientRects().length) {
        return {
          top: 0,
          left: 0
        };
      }

      // Get document-relative position by adding viewport scroll to viewport-relative gBCR
      rect = elem.getBoundingClientRect();
      win = elem.ownerDocument.defaultView;
      return {
        top: rect.top + win.pageYOffset,
        left: rect.left + win.pageXOffset
      };
    },
    // position() relates an element's margin box to its offset parent's padding box
    // This corresponds to the behavior of CSS absolute positioning
    position: function position() {
      if (!this[0]) {
        return;
      }
      var offsetParent,
        offset,
        doc,
        elem = this[0],
        parentOffset = {
          top: 0,
          left: 0
        };

      // position:fixed elements are offset from the viewport, which itself always has zero offset
      if (jQuery.css(elem, "position") === "fixed") {
        // Assume position:fixed implies availability of getBoundingClientRect
        offset = elem.getBoundingClientRect();
      } else {
        offset = this.offset();

        // Account for the *real* offset parent, which can be the document or its root element
        // when a statically positioned element is identified
        doc = elem.ownerDocument;
        offsetParent = elem.offsetParent || doc.documentElement;
        while (offsetParent && (offsetParent === doc.body || offsetParent === doc.documentElement) && jQuery.css(offsetParent, "position") === "static") {
          offsetParent = offsetParent.parentNode;
        }
        if (offsetParent && offsetParent !== elem && offsetParent.nodeType === 1) {
          // Incorporate borders into its offset, since they are outside its content origin
          parentOffset = jQuery(offsetParent).offset();
          parentOffset.top += jQuery.css(offsetParent, "borderTopWidth", true);
          parentOffset.left += jQuery.css(offsetParent, "borderLeftWidth", true);
        }
      }

      // Subtract parent offsets and element margins
      return {
        top: offset.top - parentOffset.top - jQuery.css(elem, "marginTop", true),
        left: offset.left - parentOffset.left - jQuery.css(elem, "marginLeft", true)
      };
    },
    // This method will return documentElement in the following cases:
    // 1) For the element inside the iframe without offsetParent, this method will return
    //    documentElement of the parent window
    // 2) For the hidden or detached element
    // 3) For body or html element, i.e. in case of the html node - it will return itself
    //
    // but those exceptions were never presented as a real life use-cases
    // and might be considered as more preferable results.
    //
    // This logic, however, is not guaranteed and can change at any point in the future
    offsetParent: function offsetParent() {
      return this.map(function () {
        var offsetParent = this.offsetParent;
        while (offsetParent && jQuery.css(offsetParent, "position") === "static") {
          offsetParent = offsetParent.offsetParent;
        }
        return offsetParent || documentElement;
      });
    }
  });

  // Create scrollLeft and scrollTop methods
  jQuery.each({
    scrollLeft: "pageXOffset",
    scrollTop: "pageYOffset"
  }, function (method, prop) {
    var top = "pageYOffset" === prop;
    jQuery.fn[method] = function (val) {
      return access(this, function (elem, method, val) {
        // Coalesce documents and windows
        var win;
        if (isWindow(elem)) {
          win = elem;
        } else if (elem.nodeType === 9) {
          win = elem.defaultView;
        }
        if (val === undefined) {
          return win ? win[prop] : elem[method];
        }
        if (win) {
          win.scrollTo(!top ? val : win.pageXOffset, top ? val : win.pageYOffset);
        } else {
          elem[method] = val;
        }
      }, method, val, arguments.length);
    };
  });

  // Support: Safari <=7 - 9.1, Chrome <=37 - 49
  // Add the top/left cssHooks using jQuery.fn.position
  // Webkit bug: https://bugs.webkit.org/show_bug.cgi?id=29084
  // Blink bug: https://bugs.chromium.org/p/chromium/issues/detail?id=589347
  // getComputedStyle returns percent when specified for top/left/bottom/right;
  // rather than make the css module depend on the offset module, just check for it here
  jQuery.each(["top", "left"], function (_i, prop) {
    jQuery.cssHooks[prop] = addGetHookIf(support.pixelPosition, function (elem, computed) {
      if (computed) {
        computed = curCSS(elem, prop);

        // If curCSS returns percentage, fallback to offset
        return rnumnonpx.test(computed) ? jQuery(elem).position()[prop] + "px" : computed;
      }
    });
  });

  // Create innerHeight, innerWidth, height, width, outerHeight and outerWidth methods
  jQuery.each({
    Height: "height",
    Width: "width"
  }, function (name, type) {
    jQuery.each({
      padding: "inner" + name,
      content: type,
      "": "outer" + name
    }, function (defaultExtra, funcName) {
      // Margin is only for outerHeight, outerWidth
      jQuery.fn[funcName] = function (margin, value) {
        var chainable = arguments.length && (defaultExtra || typeof margin !== "boolean"),
          extra = defaultExtra || (margin === true || value === true ? "margin" : "border");
        return access(this, function (elem, type, value) {
          var doc;
          if (isWindow(elem)) {
            // $( window ).outerWidth/Height return w/h including scrollbars (gh-1729)
            return funcName.indexOf("outer") === 0 ? elem["inner" + name] : elem.document.documentElement["client" + name];
          }

          // Get document width or height
          if (elem.nodeType === 9) {
            doc = elem.documentElement;

            // Either scroll[Width/Height] or offset[Width/Height] or client[Width/Height],
            // whichever is greatest
            return Math.max(elem.body["scroll" + name], doc["scroll" + name], elem.body["offset" + name], doc["offset" + name], doc["client" + name]);
          }
          return value === undefined ?
          // Get width or height on the element, requesting but not forcing parseFloat
          jQuery.css(elem, type, extra) :
          // Set width or height on the element
          jQuery.style(elem, type, value, extra);
        }, type, chainable ? margin : undefined, chainable);
      };
    });
  });
  jQuery.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (_i, type) {
    jQuery.fn[type] = function (fn) {
      return this.on(type, fn);
    };
  });
  jQuery.fn.extend({
    bind: function bind(types, data, fn) {
      return this.on(types, null, data, fn);
    },
    unbind: function unbind(types, fn) {
      return this.off(types, null, fn);
    },
    delegate: function delegate(selector, types, data, fn) {
      return this.on(types, selector, data, fn);
    },
    undelegate: function undelegate(selector, types, fn) {
      // ( namespace ) or ( selector, types [, fn] )
      return arguments.length === 1 ? this.off(selector, "**") : this.off(types, selector || "**", fn);
    },
    hover: function hover(fnOver, fnOut) {
      return this.mouseenter(fnOver).mouseleave(fnOut || fnOver);
    }
  });
  jQuery.each(("blur focus focusin focusout resize scroll click dblclick " + "mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave " + "change select submit keydown keypress keyup contextmenu").split(" "), function (_i, name) {
    // Handle event binding
    jQuery.fn[name] = function (data, fn) {
      return arguments.length > 0 ? this.on(name, null, data, fn) : this.trigger(name);
    };
  });

  // Support: Android <=4.0 only
  // Make sure we trim BOM and NBSP
  // Require that the "whitespace run" starts from a non-whitespace
  // to avoid O(N^2) behavior when the engine would try matching "\s+$" at each space position.
  var rtrim = /^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;

  // Bind a function to a context, optionally partially applying any
  // arguments.
  // jQuery.proxy is deprecated to promote standards (specifically Function#bind)
  // However, it is not slated for removal any time soon
  jQuery.proxy = function (fn, context) {
    var tmp, args, proxy;
    if (typeof context === "string") {
      tmp = fn[context];
      context = fn;
      fn = tmp;
    }

    // Quick check to determine if target is callable, in the spec
    // this throws a TypeError, but we will just return undefined.
    if (!isFunction(fn)) {
      return undefined;
    }

    // Simulated bind
    args = _slice.call(arguments, 2);
    proxy = function proxy() {
      return fn.apply(context || this, args.concat(_slice.call(arguments)));
    };

    // Set the guid of unique handler to the same of original handler, so it can be removed
    proxy.guid = fn.guid = fn.guid || jQuery.guid++;
    return proxy;
  };
  jQuery.holdReady = function (hold) {
    if (hold) {
      jQuery.readyWait++;
    } else {
      jQuery.ready(true);
    }
  };
  jQuery.isArray = Array.isArray;
  jQuery.parseJSON = JSON.parse;
  jQuery.nodeName = nodeName;
  jQuery.isFunction = isFunction;
  jQuery.isWindow = isWindow;
  jQuery.camelCase = camelCase;
  jQuery.type = toType;
  jQuery.now = Date.now;
  jQuery.isNumeric = function (obj) {
    // As of jQuery 3.0, isNumeric is limited to
    // strings and numbers (primitives or objects)
    // that can be coerced to finite numbers (gh-2662)
    var type = jQuery.type(obj);
    return (type === "number" || type === "string") &&
    // parseFloat NaNs numeric-cast false positives ("")
    // ...but misinterprets leading-number strings, particularly hex literals ("0x...")
    // subtraction forces infinities to NaN
    !isNaN(obj - parseFloat(obj));
  };
  jQuery.trim = function (text) {
    return text == null ? "" : (text + "").replace(rtrim, "$1");
  };

  // Register as a named AMD module, since jQuery can be concatenated with other
  // files that may use define, but not via a proper concatenation script that
  // understands anonymous AMD modules. A named AMD is safest and most robust
  // way to register. Lowercase jquery is used because AMD module names are
  // derived from file names, and jQuery is normally delivered in a lowercase
  // file name. Do this after creating the global so that if an AMD module wants
  // to call noConflict to hide this version of jQuery, it will work.

  // Note that for maximum portability, libraries that are not jQuery should
  // declare themselves as anonymous modules, and avoid setting a global if an
  // AMD loader is present. jQuery is a special case. For more information, see
  // https://github.com/jrburke/requirejs/wiki/Updating-existing-libraries#wiki-anon

  if (true) {
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
      return jQuery;
    }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  }
  var
    // Map over jQuery in case of overwrite
    _jQuery = window.jQuery,
    // Map over the $ in case of overwrite
    _$ = window.$;
  jQuery.noConflict = function (deep) {
    if (window.$ === jQuery) {
      window.$ = _$;
    }
    if (deep && window.jQuery === jQuery) {
      window.jQuery = _jQuery;
    }
    return jQuery;
  };

  // Expose jQuery and $ identifiers, even in AMD
  // (trac-7102#comment:10, https://github.com/jquery/jquery/pull/557)
  // and CommonJS for browser emulators (trac-13566)
  if (typeof noGlobal === "undefined") {
    window.jQuery = window.$ = jQuery;
  }
  return jQuery;
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./node_modules/jquery/dist/jquery.slim.min.js":
/*!*****************************************************!*\
  !*** ./node_modules/jquery/dist/jquery.slim.min.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*! jQuery v3.7.0 -ajax,-ajax/jsonp,-ajax/load,-ajax/script,-ajax/var/location,-ajax/var/nonce,-ajax/var/rquery,-ajax/xhr,-manipulation/_evalUrl,-deprecated/ajax-event-alias,-effects,-effects/animatedSelector,-effects/Tween | (c) OpenJS Foundation and other contributors | jquery.org/license */
!function (e, t) {
  "use strict";

  "object" == ( false ? undefined : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = e.document ? t(e, !0) : function (e) {
    if (!e.document) throw new Error("jQuery requires a window with a document");
    return t(e);
  } : t(e);
}("undefined" != typeof window ? window : this, function (ie, e) {
  "use strict";

  var oe = [],
    r = Object.getPrototypeOf,
    ae = oe.slice,
    g = oe.flat ? function (e) {
      return oe.flat.call(e);
    } : function (e) {
      return oe.concat.apply([], e);
    },
    s = oe.push,
    se = oe.indexOf,
    n = {},
    i = n.toString,
    ue = n.hasOwnProperty,
    o = ue.toString,
    a = o.call(Object),
    le = {},
    v = function v(e) {
      return "function" == typeof e && "number" != typeof e.nodeType && "function" != typeof e.item;
    },
    y = function y(e) {
      return null != e && e === e.window;
    },
    m = ie.document,
    u = {
      type: !0,
      src: !0,
      nonce: !0,
      noModule: !0
    };
  function b(e, t, n) {
    var r,
      i,
      o = (n = n || m).createElement("script");
    if (o.text = e, t) for (r in u) (i = t[r] || t.getAttribute && t.getAttribute(r)) && o.setAttribute(r, i);
    n.head.appendChild(o).parentNode.removeChild(o);
  }
  function x(e) {
    return null == e ? e + "" : "object" == _typeof(e) || "function" == typeof e ? n[i.call(e)] || "object" : _typeof(e);
  }
  var t = "3.7.0 -ajax,-ajax/jsonp,-ajax/load,-ajax/script,-ajax/var/location,-ajax/var/nonce,-ajax/var/rquery,-ajax/xhr,-manipulation/_evalUrl,-deprecated/ajax-event-alias,-effects,-effects/animatedSelector,-effects/Tween",
    l = /HTML$/i,
    ce = function ce(e, t) {
      return new ce.fn.init(e, t);
    };
  function c(e) {
    var t = !!e && "length" in e && e.length,
      n = x(e);
    return !v(e) && !y(e) && ("array" === n || 0 === t || "number" == typeof t && 0 < t && t - 1 in e);
  }
  function fe(e, t) {
    return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
  }
  ce.fn = ce.prototype = {
    jquery: t,
    constructor: ce,
    length: 0,
    toArray: function toArray() {
      return ae.call(this);
    },
    get: function get(e) {
      return null == e ? ae.call(this) : e < 0 ? this[e + this.length] : this[e];
    },
    pushStack: function pushStack(e) {
      var t = ce.merge(this.constructor(), e);
      return t.prevObject = this, t;
    },
    each: function each(e) {
      return ce.each(this, e);
    },
    map: function map(n) {
      return this.pushStack(ce.map(this, function (e, t) {
        return n.call(e, t, e);
      }));
    },
    slice: function slice() {
      return this.pushStack(ae.apply(this, arguments));
    },
    first: function first() {
      return this.eq(0);
    },
    last: function last() {
      return this.eq(-1);
    },
    even: function even() {
      return this.pushStack(ce.grep(this, function (e, t) {
        return (t + 1) % 2;
      }));
    },
    odd: function odd() {
      return this.pushStack(ce.grep(this, function (e, t) {
        return t % 2;
      }));
    },
    eq: function eq(e) {
      var t = this.length,
        n = +e + (e < 0 ? t : 0);
      return this.pushStack(0 <= n && n < t ? [this[n]] : []);
    },
    end: function end() {
      return this.prevObject || this.constructor();
    },
    push: s,
    sort: oe.sort,
    splice: oe.splice
  }, ce.extend = ce.fn.extend = function () {
    var e,
      t,
      n,
      r,
      i,
      o,
      a = arguments[0] || {},
      s = 1,
      u = arguments.length,
      l = !1;
    for ("boolean" == typeof a && (l = a, a = arguments[s] || {}, s++), "object" == _typeof(a) || v(a) || (a = {}), s === u && (a = this, s--); s < u; s++) if (null != (e = arguments[s])) for (t in e) r = e[t], "__proto__" !== t && a !== r && (l && r && (ce.isPlainObject(r) || (i = Array.isArray(r))) ? (n = a[t], o = i && !Array.isArray(n) ? [] : i || ce.isPlainObject(n) ? n : {}, i = !1, a[t] = ce.extend(l, o, r)) : void 0 !== r && (a[t] = r));
    return a;
  }, ce.extend({
    expando: "jQuery" + (t + Math.random()).replace(/\D/g, ""),
    isReady: !0,
    error: function error(e) {
      throw new Error(e);
    },
    noop: function noop() {},
    isPlainObject: function isPlainObject(e) {
      var t, n;
      return !(!e || "[object Object]" !== i.call(e)) && (!(t = r(e)) || "function" == typeof (n = ue.call(t, "constructor") && t.constructor) && o.call(n) === a);
    },
    isEmptyObject: function isEmptyObject(e) {
      var t;
      for (t in e) return !1;
      return !0;
    },
    globalEval: function globalEval(e, t, n) {
      b(e, {
        nonce: t && t.nonce
      }, n);
    },
    each: function each(e, t) {
      var n,
        r = 0;
      if (c(e)) {
        for (n = e.length; r < n; r++) if (!1 === t.call(e[r], r, e[r])) break;
      } else for (r in e) if (!1 === t.call(e[r], r, e[r])) break;
      return e;
    },
    text: function text(e) {
      var t,
        n = "",
        r = 0,
        i = e.nodeType;
      if (i) {
        if (1 === i || 9 === i || 11 === i) return e.textContent;
        if (3 === i || 4 === i) return e.nodeValue;
      } else while (t = e[r++]) n += ce.text(t);
      return n;
    },
    makeArray: function makeArray(e, t) {
      var n = t || [];
      return null != e && (c(Object(e)) ? ce.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)), n;
    },
    inArray: function inArray(e, t, n) {
      return null == t ? -1 : se.call(t, e, n);
    },
    isXMLDoc: function isXMLDoc(e) {
      var t = e && e.namespaceURI,
        n = e && (e.ownerDocument || e).documentElement;
      return !l.test(t || n && n.nodeName || "HTML");
    },
    merge: function merge(e, t) {
      for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
      return e.length = i, e;
    },
    grep: function grep(e, t, n) {
      for (var r = [], i = 0, o = e.length, a = !n; i < o; i++) !t(e[i], i) !== a && r.push(e[i]);
      return r;
    },
    map: function map(e, t, n) {
      var r,
        i,
        o = 0,
        a = [];
      if (c(e)) for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && a.push(i);else for (o in e) null != (i = t(e[o], o, n)) && a.push(i);
      return g(a);
    },
    guid: 1,
    support: le
  }), "function" == typeof Symbol && (ce.fn[Symbol.iterator] = oe[Symbol.iterator]), ce.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
    n["[object " + t + "]"] = t.toLowerCase();
  });
  var de = oe.pop,
    pe = oe.sort,
    he = oe.splice,
    ge = "[\\x20\\t\\r\\n\\f]",
    ve = new RegExp("^" + ge + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ge + "+$", "g");
  ce.contains = function (e, t) {
    var n = t && t.parentNode;
    return e === n || !(!n || 1 !== n.nodeType || !(e.contains ? e.contains(n) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(n)));
  };
  var f = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g;
  function d(e, t) {
    return t ? "\0" === e ? "\uFFFD" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e;
  }
  ce.escapeSelector = function (e) {
    return (e + "").replace(f, d);
  };
  var ye = m,
    me = s;
  !function () {
    var e,
      x,
      w,
      o,
      a,
      T,
      r,
      C,
      p,
      i,
      E = me,
      k = ce.expando,
      S = 0,
      n = 0,
      s = W(),
      c = W(),
      u = W(),
      h = W(),
      l = function l(e, t) {
        return e === t && (a = !0), 0;
      },
      f = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
      t = "(?:\\\\[\\da-fA-F]{1,6}" + ge + "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
      d = "\\[" + ge + "*(" + t + ")(?:" + ge + "*([*^$|!~]?=)" + ge + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + t + "))|)" + ge + "*\\]",
      g = ":(" + t + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + d + ")*)|.*)\\)|)",
      v = new RegExp(ge + "+", "g"),
      y = new RegExp("^" + ge + "*," + ge + "*"),
      m = new RegExp("^" + ge + "*([>+~]|" + ge + ")" + ge + "*"),
      b = new RegExp(ge + "|>"),
      A = new RegExp(g),
      D = new RegExp("^" + t + "$"),
      N = {
        ID: new RegExp("^#(" + t + ")"),
        CLASS: new RegExp("^\\.(" + t + ")"),
        TAG: new RegExp("^(" + t + "|[*])"),
        ATTR: new RegExp("^" + d),
        PSEUDO: new RegExp("^" + g),
        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + ge + "*(even|odd|(([+-]|)(\\d*)n|)" + ge + "*(?:([+-]|)" + ge + "*(\\d+)|))" + ge + "*\\)|)", "i"),
        bool: new RegExp("^(?:" + f + ")$", "i"),
        needsContext: new RegExp("^" + ge + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + ge + "*((?:-\\d)?\\d*)" + ge + "*\\)|)(?=[^-]|$)", "i")
      },
      L = /^(?:input|select|textarea|button)$/i,
      j = /^h\d$/i,
      O = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
      P = /[+~]/,
      H = new RegExp("\\\\[\\da-fA-F]{1,6}" + ge + "?|\\\\([^\\r\\n\\f])", "g"),
      q = function q(e, t) {
        var n = "0x" + e.slice(1) - 65536;
        return t || (n < 0 ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320));
      },
      R = function R() {
        V();
      },
      M = K(function (e) {
        return !0 === e.disabled && fe(e, "fieldset");
      }, {
        dir: "parentNode",
        next: "legend"
      });
    try {
      E.apply(oe = ae.call(ye.childNodes), ye.childNodes), oe[ye.childNodes.length].nodeType;
    } catch (e) {
      E = {
        apply: function apply(e, t) {
          me.apply(e, ae.call(t));
        },
        call: function call(e) {
          me.apply(e, ae.call(arguments, 1));
        }
      };
    }
    function I(t, e, n, r) {
      var i,
        o,
        a,
        s,
        u,
        l,
        c,
        f = e && e.ownerDocument,
        d = e ? e.nodeType : 9;
      if (n = n || [], "string" != typeof t || !t || 1 !== d && 9 !== d && 11 !== d) return n;
      if (!r && (V(e), e = e || T, C)) {
        if (11 !== d && (u = O.exec(t))) if (i = u[1]) {
          if (9 === d) {
            if (!(a = e.getElementById(i))) return n;
            if (a.id === i) return E.call(n, a), n;
          } else if (f && (a = f.getElementById(i)) && I.contains(e, a) && a.id === i) return E.call(n, a), n;
        } else {
          if (u[2]) return E.apply(n, e.getElementsByTagName(t)), n;
          if ((i = u[3]) && e.getElementsByClassName) return E.apply(n, e.getElementsByClassName(i)), n;
        }
        if (!(h[t + " "] || p && p.test(t))) {
          if (c = t, f = e, 1 === d && (b.test(t) || m.test(t))) {
            (f = P.test(t) && X(e.parentNode) || e) == e && le.scope || ((s = e.getAttribute("id")) ? s = ce.escapeSelector(s) : e.setAttribute("id", s = k)), o = (l = Y(t)).length;
            while (o--) l[o] = (s ? "#" + s : ":scope") + " " + G(l[o]);
            c = l.join(",");
          }
          try {
            return E.apply(n, f.querySelectorAll(c)), n;
          } catch (e) {
            h(t, !0);
          } finally {
            s === k && e.removeAttribute("id");
          }
        }
      }
      return re(t.replace(ve, "$1"), e, n, r);
    }
    function W() {
      var r = [];
      return function e(t, n) {
        return r.push(t + " ") > x.cacheLength && delete e[r.shift()], e[t + " "] = n;
      };
    }
    function B(e) {
      return e[k] = !0, e;
    }
    function F(e) {
      var t = T.createElement("fieldset");
      try {
        return !!e(t);
      } catch (e) {
        return !1;
      } finally {
        t.parentNode && t.parentNode.removeChild(t), t = null;
      }
    }
    function $(t) {
      return function (e) {
        return fe(e, "input") && e.type === t;
      };
    }
    function _(t) {
      return function (e) {
        return (fe(e, "input") || fe(e, "button")) && e.type === t;
      };
    }
    function z(t) {
      return function (e) {
        return "form" in e ? e.parentNode && !1 === e.disabled ? "label" in e ? "label" in e.parentNode ? e.parentNode.disabled === t : e.disabled === t : e.isDisabled === t || e.isDisabled !== !t && M(e) === t : e.disabled === t : "label" in e && e.disabled === t;
      };
    }
    function U(a) {
      return B(function (o) {
        return o = +o, B(function (e, t) {
          var n,
            r = a([], e.length, o),
            i = r.length;
          while (i--) e[n = r[i]] && (e[n] = !(t[n] = e[n]));
        });
      });
    }
    function X(e) {
      return e && "undefined" != typeof e.getElementsByTagName && e;
    }
    function V(e) {
      var t,
        n = e ? e.ownerDocument || e : ye;
      return n != T && 9 === n.nodeType && n.documentElement && (r = (T = n).documentElement, C = !ce.isXMLDoc(T), i = r.matches || r.webkitMatchesSelector || r.msMatchesSelector, ye != T && (t = T.defaultView) && t.top !== t && t.addEventListener("unload", R), le.getById = F(function (e) {
        return r.appendChild(e).id = ce.expando, !T.getElementsByName || !T.getElementsByName(ce.expando).length;
      }), le.disconnectedMatch = F(function (e) {
        return i.call(e, "*");
      }), le.scope = F(function () {
        return T.querySelectorAll(":scope");
      }), le.cssHas = F(function () {
        try {
          return T.querySelector(":has(*,:jqfake)"), !1;
        } catch (e) {
          return !0;
        }
      }), le.getById ? (x.filter.ID = function (e) {
        var t = e.replace(H, q);
        return function (e) {
          return e.getAttribute("id") === t;
        };
      }, x.find.ID = function (e, t) {
        if ("undefined" != typeof t.getElementById && C) {
          var n = t.getElementById(e);
          return n ? [n] : [];
        }
      }) : (x.filter.ID = function (e) {
        var n = e.replace(H, q);
        return function (e) {
          var t = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
          return t && t.value === n;
        };
      }, x.find.ID = function (e, t) {
        if ("undefined" != typeof t.getElementById && C) {
          var n,
            r,
            i,
            o = t.getElementById(e);
          if (o) {
            if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
            i = t.getElementsByName(e), r = 0;
            while (o = i[r++]) if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
          }
          return [];
        }
      }), x.find.TAG = function (e, t) {
        return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : t.querySelectorAll(e);
      }, x.find.CLASS = function (e, t) {
        if ("undefined" != typeof t.getElementsByClassName && C) return t.getElementsByClassName(e);
      }, p = [], F(function (e) {
        var t;
        r.appendChild(e).innerHTML = "<a id='" + k + "' href='' disabled='disabled'></a><select id='" + k + "-\r\\' disabled='disabled'><option selected=''></option></select>", e.querySelectorAll("[selected]").length || p.push("\\[" + ge + "*(?:value|" + f + ")"), e.querySelectorAll("[id~=" + k + "-]").length || p.push("~="), e.querySelectorAll("a#" + k + "+*").length || p.push(".#.+[+~]"), e.querySelectorAll(":checked").length || p.push(":checked"), (t = T.createElement("input")).setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), r.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && p.push(":enabled", ":disabled"), (t = T.createElement("input")).setAttribute("name", ""), e.appendChild(t), e.querySelectorAll("[name='']").length || p.push("\\[" + ge + "*name" + ge + "*=" + ge + "*(?:''|\"\")");
      }), le.cssHas || p.push(":has"), p = p.length && new RegExp(p.join("|")), l = function l(e, t) {
        if (e === t) return a = !0, 0;
        var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
        return n || (1 & (n = (e.ownerDocument || e) == (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !le.sortDetached && t.compareDocumentPosition(e) === n ? e === T || e.ownerDocument == ye && I.contains(ye, e) ? -1 : t === T || t.ownerDocument == ye && I.contains(ye, t) ? 1 : o ? se.call(o, e) - se.call(o, t) : 0 : 4 & n ? -1 : 1);
      }), T;
    }
    for (e in I.matches = function (e, t) {
      return I(e, null, null, t);
    }, I.matchesSelector = function (e, t) {
      if (V(e), C && !h[t + " "] && (!p || !p.test(t))) try {
        var n = i.call(e, t);
        if (n || le.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n;
      } catch (e) {
        h(t, !0);
      }
      return 0 < I(t, T, null, [e]).length;
    }, I.contains = function (e, t) {
      return (e.ownerDocument || e) != T && V(e), ce.contains(e, t);
    }, I.attr = function (e, t) {
      (e.ownerDocument || e) != T && V(e);
      var n = x.attrHandle[t.toLowerCase()],
        r = n && ue.call(x.attrHandle, t.toLowerCase()) ? n(e, t, !C) : void 0;
      return void 0 !== r ? r : e.getAttribute(t);
    }, I.error = function (e) {
      throw new Error("Syntax error, unrecognized expression: " + e);
    }, ce.uniqueSort = function (e) {
      var t,
        n = [],
        r = 0,
        i = 0;
      if (a = !le.sortStable, o = !le.sortStable && ae.call(e, 0), pe.call(e, l), a) {
        while (t = e[i++]) t === e[i] && (r = n.push(i));
        while (r--) he.call(e, n[r], 1);
      }
      return o = null, e;
    }, ce.fn.uniqueSort = function () {
      return this.pushStack(ce.uniqueSort(ae.apply(this)));
    }, (x = ce.expr = {
      cacheLength: 50,
      createPseudo: B,
      match: N,
      attrHandle: {},
      find: {},
      relative: {
        ">": {
          dir: "parentNode",
          first: !0
        },
        " ": {
          dir: "parentNode"
        },
        "+": {
          dir: "previousSibling",
          first: !0
        },
        "~": {
          dir: "previousSibling"
        }
      },
      preFilter: {
        ATTR: function ATTR(e) {
          return e[1] = e[1].replace(H, q), e[3] = (e[3] || e[4] || e[5] || "").replace(H, q), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
        },
        CHILD: function CHILD(e) {
          return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || I.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && I.error(e[0]), e;
        },
        PSEUDO: function PSEUDO(e) {
          var t,
            n = !e[6] && e[2];
          return N.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && A.test(n) && (t = Y(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3));
        }
      },
      filter: {
        TAG: function TAG(e) {
          var t = e.replace(H, q).toLowerCase();
          return "*" === e ? function () {
            return !0;
          } : function (e) {
            return fe(e, t);
          };
        },
        CLASS: function CLASS(e) {
          var t = s[e + " "];
          return t || (t = new RegExp("(^|" + ge + ")" + e + "(" + ge + "|$)")) && s(e, function (e) {
            return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "");
          });
        },
        ATTR: function ATTR(n, r, i) {
          return function (e) {
            var t = I.attr(e, n);
            return null == t ? "!=" === r : !r || (t += "", "=" === r ? t === i : "!=" === r ? t !== i : "^=" === r ? i && 0 === t.indexOf(i) : "*=" === r ? i && -1 < t.indexOf(i) : "$=" === r ? i && t.slice(-i.length) === i : "~=" === r ? -1 < (" " + t.replace(v, " ") + " ").indexOf(i) : "|=" === r && (t === i || t.slice(0, i.length + 1) === i + "-"));
          };
        },
        CHILD: function CHILD(p, e, t, h, g) {
          var v = "nth" !== p.slice(0, 3),
            y = "last" !== p.slice(-4),
            m = "of-type" === e;
          return 1 === h && 0 === g ? function (e) {
            return !!e.parentNode;
          } : function (e, t, n) {
            var r,
              i,
              o,
              a,
              s,
              u = v !== y ? "nextSibling" : "previousSibling",
              l = e.parentNode,
              c = m && e.nodeName.toLowerCase(),
              f = !n && !m,
              d = !1;
            if (l) {
              if (v) {
                while (u) {
                  o = e;
                  while (o = o[u]) if (m ? fe(o, c) : 1 === o.nodeType) return !1;
                  s = u = "only" === p && !s && "nextSibling";
                }
                return !0;
              }
              if (s = [y ? l.firstChild : l.lastChild], y && f) {
                d = (a = (r = (i = l[k] || (l[k] = {}))[p] || [])[0] === S && r[1]) && r[2], o = a && l.childNodes[a];
                while (o = ++a && o && o[u] || (d = a = 0) || s.pop()) if (1 === o.nodeType && ++d && o === e) {
                  i[p] = [S, a, d];
                  break;
                }
              } else if (f && (d = a = (r = (i = e[k] || (e[k] = {}))[p] || [])[0] === S && r[1]), !1 === d) while (o = ++a && o && o[u] || (d = a = 0) || s.pop()) if ((m ? fe(o, c) : 1 === o.nodeType) && ++d && (f && ((i = o[k] || (o[k] = {}))[p] = [S, d]), o === e)) break;
              return (d -= g) === h || d % h == 0 && 0 <= d / h;
            }
          };
        },
        PSEUDO: function PSEUDO(e, o) {
          var t,
            a = x.pseudos[e] || x.setFilters[e.toLowerCase()] || I.error("unsupported pseudo: " + e);
          return a[k] ? a(o) : 1 < a.length ? (t = [e, e, "", o], x.setFilters.hasOwnProperty(e.toLowerCase()) ? B(function (e, t) {
            var n,
              r = a(e, o),
              i = r.length;
            while (i--) e[n = se.call(e, r[i])] = !(t[n] = r[i]);
          }) : function (e) {
            return a(e, 0, t);
          }) : a;
        }
      },
      pseudos: {
        not: B(function (e) {
          var r = [],
            i = [],
            s = ne(e.replace(ve, "$1"));
          return s[k] ? B(function (e, t, n, r) {
            var i,
              o = s(e, null, r, []),
              a = e.length;
            while (a--) (i = o[a]) && (e[a] = !(t[a] = i));
          }) : function (e, t, n) {
            return r[0] = e, s(r, null, n, i), r[0] = null, !i.pop();
          };
        }),
        has: B(function (t) {
          return function (e) {
            return 0 < I(t, e).length;
          };
        }),
        contains: B(function (t) {
          return t = t.replace(H, q), function (e) {
            return -1 < (e.textContent || ce.text(e)).indexOf(t);
          };
        }),
        lang: B(function (n) {
          return D.test(n || "") || I.error("unsupported lang: " + n), n = n.replace(H, q).toLowerCase(), function (e) {
            var t;
            do {
              if (t = C ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang")) return (t = t.toLowerCase()) === n || 0 === t.indexOf(n + "-");
            } while ((e = e.parentNode) && 1 === e.nodeType);
            return !1;
          };
        }),
        target: function target(e) {
          var t = ie.location && ie.location.hash;
          return t && t.slice(1) === e.id;
        },
        root: function root(e) {
          return e === r;
        },
        focus: function focus(e) {
          return e === function () {
            try {
              return T.activeElement;
            } catch (e) {}
          }() && T.hasFocus() && !!(e.type || e.href || ~e.tabIndex);
        },
        enabled: z(!1),
        disabled: z(!0),
        checked: function checked(e) {
          return fe(e, "input") && !!e.checked || fe(e, "option") && !!e.selected;
        },
        selected: function selected(e) {
          return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected;
        },
        empty: function empty(e) {
          for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
          return !0;
        },
        parent: function parent(e) {
          return !x.pseudos.empty(e);
        },
        header: function header(e) {
          return j.test(e.nodeName);
        },
        input: function input(e) {
          return L.test(e.nodeName);
        },
        button: function button(e) {
          return fe(e, "input") && "button" === e.type || fe(e, "button");
        },
        text: function text(e) {
          var t;
          return fe(e, "input") && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase());
        },
        first: U(function () {
          return [0];
        }),
        last: U(function (e, t) {
          return [t - 1];
        }),
        eq: U(function (e, t, n) {
          return [n < 0 ? n + t : n];
        }),
        even: U(function (e, t) {
          for (var n = 0; n < t; n += 2) e.push(n);
          return e;
        }),
        odd: U(function (e, t) {
          for (var n = 1; n < t; n += 2) e.push(n);
          return e;
        }),
        lt: U(function (e, t, n) {
          var r;
          for (r = n < 0 ? n + t : t < n ? t : n; 0 <= --r;) e.push(r);
          return e;
        }),
        gt: U(function (e, t, n) {
          for (var r = n < 0 ? n + t : n; ++r < t;) e.push(r);
          return e;
        })
      }
    }).pseudos.nth = x.pseudos.eq, {
      radio: !0,
      checkbox: !0,
      file: !0,
      password: !0,
      image: !0
    }) x.pseudos[e] = $(e);
    for (e in {
      submit: !0,
      reset: !0
    }) x.pseudos[e] = _(e);
    function Q() {}
    function Y(e, t) {
      var n,
        r,
        i,
        o,
        a,
        s,
        u,
        l = c[e + " "];
      if (l) return t ? 0 : l.slice(0);
      a = e, s = [], u = x.preFilter;
      while (a) {
        for (o in n && !(r = y.exec(a)) || (r && (a = a.slice(r[0].length) || a), s.push(i = [])), n = !1, (r = m.exec(a)) && (n = r.shift(), i.push({
          value: n,
          type: r[0].replace(ve, " ")
        }), a = a.slice(n.length)), x.filter) !(r = N[o].exec(a)) || u[o] && !(r = u[o](r)) || (n = r.shift(), i.push({
          value: n,
          type: o,
          matches: r
        }), a = a.slice(n.length));
        if (!n) break;
      }
      return t ? a.length : a ? I.error(e) : c(e, s).slice(0);
    }
    function G(e) {
      for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
      return r;
    }
    function K(a, e, t) {
      var s = e.dir,
        u = e.next,
        l = u || s,
        c = t && "parentNode" === l,
        f = n++;
      return e.first ? function (e, t, n) {
        while (e = e[s]) if (1 === e.nodeType || c) return a(e, t, n);
        return !1;
      } : function (e, t, n) {
        var r,
          i,
          o = [S, f];
        if (n) {
          while (e = e[s]) if ((1 === e.nodeType || c) && a(e, t, n)) return !0;
        } else while (e = e[s]) if (1 === e.nodeType || c) if (i = e[k] || (e[k] = {}), u && fe(e, u)) e = e[s] || e;else {
          if ((r = i[l]) && r[0] === S && r[1] === f) return o[2] = r[2];
          if ((i[l] = o)[2] = a(e, t, n)) return !0;
        }
        return !1;
      };
    }
    function J(i) {
      return 1 < i.length ? function (e, t, n) {
        var r = i.length;
        while (r--) if (!i[r](e, t, n)) return !1;
        return !0;
      } : i[0];
    }
    function Z(e, t, n, r, i) {
      for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++) (o = e[s]) && (n && !n(o, r, i) || (a.push(o), l && t.push(s)));
      return a;
    }
    function ee(p, h, g, v, y, e) {
      return v && !v[k] && (v = ee(v)), y && !y[k] && (y = ee(y, e)), B(function (e, t, n, r) {
        var i,
          o,
          a,
          s,
          u = [],
          l = [],
          c = t.length,
          f = e || function (e, t, n) {
            for (var r = 0, i = t.length; r < i; r++) I(e, t[r], n);
            return n;
          }(h || "*", n.nodeType ? [n] : n, []),
          d = !p || !e && h ? f : Z(f, u, p, n, r);
        if (g ? g(d, s = y || (e ? p : c || v) ? [] : t, n, r) : s = d, v) {
          i = Z(s, l), v(i, [], n, r), o = i.length;
          while (o--) (a = i[o]) && (s[l[o]] = !(d[l[o]] = a));
        }
        if (e) {
          if (y || p) {
            if (y) {
              i = [], o = s.length;
              while (o--) (a = s[o]) && i.push(d[o] = a);
              y(null, s = [], i, r);
            }
            o = s.length;
            while (o--) (a = s[o]) && -1 < (i = y ? se.call(e, a) : u[o]) && (e[i] = !(t[i] = a));
          }
        } else s = Z(s === t ? s.splice(c, s.length) : s), y ? y(null, t, s, r) : E.apply(t, s);
      });
    }
    function te(e) {
      for (var i, t, n, r = e.length, o = x.relative[e[0].type], a = o || x.relative[" "], s = o ? 1 : 0, u = K(function (e) {
          return e === i;
        }, a, !0), l = K(function (e) {
          return -1 < se.call(i, e);
        }, a, !0), c = [function (e, t, n) {
          var r = !o && (n || t != w) || ((i = t).nodeType ? u(e, t, n) : l(e, t, n));
          return i = null, r;
        }]; s < r; s++) if (t = x.relative[e[s].type]) c = [K(J(c), t)];else {
        if ((t = x.filter[e[s].type].apply(null, e[s].matches))[k]) {
          for (n = ++s; n < r; n++) if (x.relative[e[n].type]) break;
          return ee(1 < s && J(c), 1 < s && G(e.slice(0, s - 1).concat({
            value: " " === e[s - 2].type ? "*" : ""
          })).replace(ve, "$1"), t, s < n && te(e.slice(s, n)), n < r && te(e = e.slice(n)), n < r && G(e));
        }
        c.push(t);
      }
      return J(c);
    }
    function ne(e, t) {
      var n,
        v,
        y,
        m,
        b,
        r,
        i = [],
        o = [],
        a = u[e + " "];
      if (!a) {
        t || (t = Y(e)), n = t.length;
        while (n--) (a = te(t[n]))[k] ? i.push(a) : o.push(a);
        (a = u(e, (v = o, m = 0 < (y = i).length, b = 0 < v.length, r = function r(e, t, n, _r, i) {
          var o,
            a,
            s,
            u = 0,
            l = "0",
            c = e && [],
            f = [],
            d = w,
            p = e || b && x.find.TAG("*", i),
            h = S += null == d ? 1 : Math.random() || .1,
            g = p.length;
          for (i && (w = t == T || t || i); l !== g && null != (o = p[l]); l++) {
            if (b && o) {
              a = 0, t || o.ownerDocument == T || (V(o), n = !C);
              while (s = v[a++]) if (s(o, t || T, n)) {
                E.call(_r, o);
                break;
              }
              i && (S = h);
            }
            m && ((o = !s && o) && u--, e && c.push(o));
          }
          if (u += l, m && l !== u) {
            a = 0;
            while (s = y[a++]) s(c, f, t, n);
            if (e) {
              if (0 < u) while (l--) c[l] || f[l] || (f[l] = de.call(_r));
              f = Z(f);
            }
            E.apply(_r, f), i && !e && 0 < f.length && 1 < u + y.length && ce.uniqueSort(_r);
          }
          return i && (S = h, w = d), c;
        }, m ? B(r) : r))).selector = e;
      }
      return a;
    }
    function re(e, t, n, r) {
      var i,
        o,
        a,
        s,
        u,
        l = "function" == typeof e && e,
        c = !r && Y(e = l.selector || e);
      if (n = n || [], 1 === c.length) {
        if (2 < (o = c[0] = c[0].slice(0)).length && "ID" === (a = o[0]).type && 9 === t.nodeType && C && x.relative[o[1].type]) {
          if (!(t = (x.find.ID(a.matches[0].replace(H, q), t) || [])[0])) return n;
          l && (t = t.parentNode), e = e.slice(o.shift().value.length);
        }
        i = N.needsContext.test(e) ? 0 : o.length;
        while (i--) {
          if (a = o[i], x.relative[s = a.type]) break;
          if ((u = x.find[s]) && (r = u(a.matches[0].replace(H, q), P.test(o[0].type) && X(t.parentNode) || t))) {
            if (o.splice(i, 1), !(e = r.length && G(o))) return E.apply(n, r), n;
            break;
          }
        }
      }
      return (l || ne(e, c))(r, t, !C, n, !t || P.test(e) && X(t.parentNode) || t), n;
    }
    Q.prototype = x.filters = x.pseudos, x.setFilters = new Q(), le.sortStable = k.split("").sort(l).join("") === k, V(), le.sortDetached = F(function (e) {
      return 1 & e.compareDocumentPosition(T.createElement("fieldset"));
    }), ce.find = I, ce.expr[":"] = ce.expr.pseudos, ce.unique = ce.uniqueSort, I.compile = ne, I.select = re, I.setDocument = V, I.escape = ce.escapeSelector, I.getText = ce.text, I.isXML = ce.isXMLDoc, I.selectors = ce.expr, I.support = ce.support, I.uniqueSort = ce.uniqueSort;
  }();
  var p = function p(e, t, n) {
      var r = [],
        i = void 0 !== n;
      while ((e = e[t]) && 9 !== e.nodeType) if (1 === e.nodeType) {
        if (i && ce(e).is(n)) break;
        r.push(e);
      }
      return r;
    },
    h = function h(e, t) {
      for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
      return n;
    },
    w = ce.expr.match.needsContext,
    T = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
  function C(e, n, r) {
    return v(n) ? ce.grep(e, function (e, t) {
      return !!n.call(e, t, e) !== r;
    }) : n.nodeType ? ce.grep(e, function (e) {
      return e === n !== r;
    }) : "string" != typeof n ? ce.grep(e, function (e) {
      return -1 < se.call(n, e) !== r;
    }) : ce.filter(n, e, r);
  }
  ce.filter = function (e, t, n) {
    var r = t[0];
    return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? ce.find.matchesSelector(r, e) ? [r] : [] : ce.find.matches(e, ce.grep(t, function (e) {
      return 1 === e.nodeType;
    }));
  }, ce.fn.extend({
    find: function find(e) {
      var t,
        n,
        r = this.length,
        i = this;
      if ("string" != typeof e) return this.pushStack(ce(e).filter(function () {
        for (t = 0; t < r; t++) if (ce.contains(i[t], this)) return !0;
      }));
      for (n = this.pushStack([]), t = 0; t < r; t++) ce.find(e, i[t], n);
      return 1 < r ? ce.uniqueSort(n) : n;
    },
    filter: function filter(e) {
      return this.pushStack(C(this, e || [], !1));
    },
    not: function not(e) {
      return this.pushStack(C(this, e || [], !0));
    },
    is: function is(e) {
      return !!C(this, "string" == typeof e && w.test(e) ? ce(e) : e || [], !1).length;
    }
  });
  var E,
    k = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
  (ce.fn.init = function (e, t, n) {
    var r, i;
    if (!e) return this;
    if (n = n || E, "string" == typeof e) {
      if (!(r = "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length ? [null, e, null] : k.exec(e)) || !r[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
      if (r[1]) {
        if (t = t instanceof ce ? t[0] : t, ce.merge(this, ce.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : m, !0)), T.test(r[1]) && ce.isPlainObject(t)) for (r in t) v(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
        return this;
      }
      return (i = m.getElementById(r[2])) && (this[0] = i, this.length = 1), this;
    }
    return e.nodeType ? (this[0] = e, this.length = 1, this) : v(e) ? void 0 !== n.ready ? n.ready(e) : e(ce) : ce.makeArray(e, this);
  }).prototype = ce.fn, E = ce(m);
  var S = /^(?:parents|prev(?:Until|All))/,
    A = {
      children: !0,
      contents: !0,
      next: !0,
      prev: !0
    };
  function D(e, t) {
    while ((e = e[t]) && 1 !== e.nodeType);
    return e;
  }
  ce.fn.extend({
    has: function has(e) {
      var t = ce(e, this),
        n = t.length;
      return this.filter(function () {
        for (var e = 0; e < n; e++) if (ce.contains(this, t[e])) return !0;
      });
    },
    closest: function closest(e, t) {
      var n,
        r = 0,
        i = this.length,
        o = [],
        a = "string" != typeof e && ce(e);
      if (!w.test(e)) for (; r < i; r++) for (n = this[r]; n && n !== t; n = n.parentNode) if (n.nodeType < 11 && (a ? -1 < a.index(n) : 1 === n.nodeType && ce.find.matchesSelector(n, e))) {
        o.push(n);
        break;
      }
      return this.pushStack(1 < o.length ? ce.uniqueSort(o) : o);
    },
    index: function index(e) {
      return e ? "string" == typeof e ? se.call(ce(e), this[0]) : se.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
    },
    add: function add(e, t) {
      return this.pushStack(ce.uniqueSort(ce.merge(this.get(), ce(e, t))));
    },
    addBack: function addBack(e) {
      return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
    }
  }), ce.each({
    parent: function parent(e) {
      var t = e.parentNode;
      return t && 11 !== t.nodeType ? t : null;
    },
    parents: function parents(e) {
      return p(e, "parentNode");
    },
    parentsUntil: function parentsUntil(e, t, n) {
      return p(e, "parentNode", n);
    },
    next: function next(e) {
      return D(e, "nextSibling");
    },
    prev: function prev(e) {
      return D(e, "previousSibling");
    },
    nextAll: function nextAll(e) {
      return p(e, "nextSibling");
    },
    prevAll: function prevAll(e) {
      return p(e, "previousSibling");
    },
    nextUntil: function nextUntil(e, t, n) {
      return p(e, "nextSibling", n);
    },
    prevUntil: function prevUntil(e, t, n) {
      return p(e, "previousSibling", n);
    },
    siblings: function siblings(e) {
      return h((e.parentNode || {}).firstChild, e);
    },
    children: function children(e) {
      return h(e.firstChild);
    },
    contents: function contents(e) {
      return null != e.contentDocument && r(e.contentDocument) ? e.contentDocument : (fe(e, "template") && (e = e.content || e), ce.merge([], e.childNodes));
    }
  }, function (r, i) {
    ce.fn[r] = function (e, t) {
      var n = ce.map(this, i, e);
      return "Until" !== r.slice(-5) && (t = e), t && "string" == typeof t && (n = ce.filter(t, n)), 1 < this.length && (A[r] || ce.uniqueSort(n), S.test(r) && n.reverse()), this.pushStack(n);
    };
  });
  var N = /[^\x20\t\r\n\f]+/g;
  function L(e) {
    return e;
  }
  function j(e) {
    throw e;
  }
  function O(e, t, n, r) {
    var i;
    try {
      e && v(i = e.promise) ? i.call(e).done(t).fail(n) : e && v(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r));
    } catch (e) {
      n.apply(void 0, [e]);
    }
  }
  ce.Callbacks = function (r) {
    var e, n;
    r = "string" == typeof r ? (e = r, n = {}, ce.each(e.match(N) || [], function (e, t) {
      n[t] = !0;
    }), n) : ce.extend({}, r);
    var i,
      t,
      o,
      a,
      s = [],
      u = [],
      l = -1,
      c = function c() {
        for (a = a || r.once, o = i = !0; u.length; l = -1) {
          t = u.shift();
          while (++l < s.length) !1 === s[l].apply(t[0], t[1]) && r.stopOnFalse && (l = s.length, t = !1);
        }
        r.memory || (t = !1), i = !1, a && (s = t ? [] : "");
      },
      f = {
        add: function add() {
          return s && (t && !i && (l = s.length - 1, u.push(t)), function n(e) {
            ce.each(e, function (e, t) {
              v(t) ? r.unique && f.has(t) || s.push(t) : t && t.length && "string" !== x(t) && n(t);
            });
          }(arguments), t && !i && c()), this;
        },
        remove: function remove() {
          return ce.each(arguments, function (e, t) {
            var n;
            while (-1 < (n = ce.inArray(t, s, n))) s.splice(n, 1), n <= l && l--;
          }), this;
        },
        has: function has(e) {
          return e ? -1 < ce.inArray(e, s) : 0 < s.length;
        },
        empty: function empty() {
          return s && (s = []), this;
        },
        disable: function disable() {
          return a = u = [], s = t = "", this;
        },
        disabled: function disabled() {
          return !s;
        },
        lock: function lock() {
          return a = u = [], t || i || (s = t = ""), this;
        },
        locked: function locked() {
          return !!a;
        },
        fireWith: function fireWith(e, t) {
          return a || (t = [e, (t = t || []).slice ? t.slice() : t], u.push(t), i || c()), this;
        },
        fire: function fire() {
          return f.fireWith(this, arguments), this;
        },
        fired: function fired() {
          return !!o;
        }
      };
    return f;
  }, ce.extend({
    Deferred: function Deferred(e) {
      var o = [["notify", "progress", ce.Callbacks("memory"), ce.Callbacks("memory"), 2], ["resolve", "done", ce.Callbacks("once memory"), ce.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", ce.Callbacks("once memory"), ce.Callbacks("once memory"), 1, "rejected"]],
        i = "pending",
        a = {
          state: function state() {
            return i;
          },
          always: function always() {
            return s.done(arguments).fail(arguments), this;
          },
          "catch": function _catch(e) {
            return a.then(null, e);
          },
          pipe: function pipe() {
            var i = arguments;
            return ce.Deferred(function (r) {
              ce.each(o, function (e, t) {
                var n = v(i[t[4]]) && i[t[4]];
                s[t[1]](function () {
                  var e = n && n.apply(this, arguments);
                  e && v(e.promise) ? e.promise().progress(r.notify).done(r.resolve).fail(r.reject) : r[t[0] + "With"](this, n ? [e] : arguments);
                });
              }), i = null;
            }).promise();
          },
          then: function then(t, n, r) {
            var u = 0;
            function l(i, o, a, s) {
              return function () {
                var n = this,
                  r = arguments,
                  e = function e() {
                    var e, t;
                    if (!(i < u)) {
                      if ((e = a.apply(n, r)) === o.promise()) throw new TypeError("Thenable self-resolution");
                      t = e && ("object" == _typeof(e) || "function" == typeof e) && e.then, v(t) ? s ? t.call(e, l(u, o, L, s), l(u, o, j, s)) : (u++, t.call(e, l(u, o, L, s), l(u, o, j, s), l(u, o, L, o.notifyWith))) : (a !== L && (n = void 0, r = [e]), (s || o.resolveWith)(n, r));
                    }
                  },
                  t = s ? e : function () {
                    try {
                      e();
                    } catch (e) {
                      ce.Deferred.exceptionHook && ce.Deferred.exceptionHook(e, t.error), u <= i + 1 && (a !== j && (n = void 0, r = [e]), o.rejectWith(n, r));
                    }
                  };
                i ? t() : (ce.Deferred.getErrorHook ? t.error = ce.Deferred.getErrorHook() : ce.Deferred.getStackHook && (t.error = ce.Deferred.getStackHook()), ie.setTimeout(t));
              };
            }
            return ce.Deferred(function (e) {
              o[0][3].add(l(0, e, v(r) ? r : L, e.notifyWith)), o[1][3].add(l(0, e, v(t) ? t : L)), o[2][3].add(l(0, e, v(n) ? n : j));
            }).promise();
          },
          promise: function promise(e) {
            return null != e ? ce.extend(e, a) : a;
          }
        },
        s = {};
      return ce.each(o, function (e, t) {
        var n = t[2],
          r = t[5];
        a[t[1]] = n.add, r && n.add(function () {
          i = r;
        }, o[3 - e][2].disable, o[3 - e][3].disable, o[0][2].lock, o[0][3].lock), n.add(t[3].fire), s[t[0]] = function () {
          return s[t[0] + "With"](this === s ? void 0 : this, arguments), this;
        }, s[t[0] + "With"] = n.fireWith;
      }), a.promise(s), e && e.call(s, s), s;
    },
    when: function when(e) {
      var n = arguments.length,
        t = n,
        r = Array(t),
        i = ae.call(arguments),
        o = ce.Deferred(),
        a = function a(t) {
          return function (e) {
            r[t] = this, i[t] = 1 < arguments.length ? ae.call(arguments) : e, --n || o.resolveWith(r, i);
          };
        };
      if (n <= 1 && (O(e, o.done(a(t)).resolve, o.reject, !n), "pending" === o.state() || v(i[t] && i[t].then))) return o.then();
      while (t--) O(i[t], a(t), o.reject);
      return o.promise();
    }
  });
  var P = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
  ce.Deferred.exceptionHook = function (e, t) {
    ie.console && ie.console.warn && e && P.test(e.name) && ie.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t);
  }, ce.readyException = function (e) {
    ie.setTimeout(function () {
      throw e;
    });
  };
  var H = ce.Deferred();
  function q() {
    m.removeEventListener("DOMContentLoaded", q), ie.removeEventListener("load", q), ce.ready();
  }
  ce.fn.ready = function (e) {
    return H.then(e)["catch"](function (e) {
      ce.readyException(e);
    }), this;
  }, ce.extend({
    isReady: !1,
    readyWait: 1,
    ready: function ready(e) {
      (!0 === e ? --ce.readyWait : ce.isReady) || (ce.isReady = !0) !== e && 0 < --ce.readyWait || H.resolveWith(m, [ce]);
    }
  }), ce.ready.then = H.then, "complete" === m.readyState || "loading" !== m.readyState && !m.documentElement.doScroll ? ie.setTimeout(ce.ready) : (m.addEventListener("DOMContentLoaded", q), ie.addEventListener("load", q));
  var R = function R(e, t, n, r, i, o, a) {
      var s = 0,
        u = e.length,
        l = null == n;
      if ("object" === x(n)) for (s in i = !0, n) R(e, t, s, n[s], !0, o, a);else if (void 0 !== r && (i = !0, v(r) || (a = !0), l && (a ? (t.call(e, r), t = null) : (l = t, t = function t(e, _t, n) {
        return l.call(ce(e), n);
      })), t)) for (; s < u; s++) t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
      return i ? e : l ? t.call(e) : u ? t(e[0], n) : o;
    },
    M = /^-ms-/,
    I = /-([a-z])/g;
  function W(e, t) {
    return t.toUpperCase();
  }
  function B(e) {
    return e.replace(M, "ms-").replace(I, W);
  }
  var F = function F(e) {
    return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
  };
  function $() {
    this.expando = ce.expando + $.uid++;
  }
  $.uid = 1, $.prototype = {
    cache: function cache(e) {
      var t = e[this.expando];
      return t || (t = {}, F(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
        value: t,
        configurable: !0
      }))), t;
    },
    set: function set(e, t, n) {
      var r,
        i = this.cache(e);
      if ("string" == typeof t) i[B(t)] = n;else for (r in t) i[B(r)] = t[r];
      return i;
    },
    get: function get(e, t) {
      return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][B(t)];
    },
    access: function access(e, t, n) {
      return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t);
    },
    remove: function remove(e, t) {
      var n,
        r = e[this.expando];
      if (void 0 !== r) {
        if (void 0 !== t) {
          n = (t = Array.isArray(t) ? t.map(B) : (t = B(t)) in r ? [t] : t.match(N) || []).length;
          while (n--) delete r[t[n]];
        }
        (void 0 === t || ce.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando]);
      }
    },
    hasData: function hasData(e) {
      var t = e[this.expando];
      return void 0 !== t && !ce.isEmptyObject(t);
    }
  };
  var _ = new $(),
    z = new $(),
    U = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
    X = /[A-Z]/g;
  function V(e, t, n) {
    var r, i;
    if (void 0 === n && 1 === e.nodeType) if (r = "data-" + t.replace(X, "-$&").toLowerCase(), "string" == typeof (n = e.getAttribute(r))) {
      try {
        n = "true" === (i = n) || "false" !== i && ("null" === i ? null : i === +i + "" ? +i : U.test(i) ? JSON.parse(i) : i);
      } catch (e) {}
      z.set(e, t, n);
    } else n = void 0;
    return n;
  }
  ce.extend({
    hasData: function hasData(e) {
      return z.hasData(e) || _.hasData(e);
    },
    data: function data(e, t, n) {
      return z.access(e, t, n);
    },
    removeData: function removeData(e, t) {
      z.remove(e, t);
    },
    _data: function _data(e, t, n) {
      return _.access(e, t, n);
    },
    _removeData: function _removeData(e, t) {
      _.remove(e, t);
    }
  }), ce.fn.extend({
    data: function data(n, e) {
      var t,
        r,
        i,
        o = this[0],
        a = o && o.attributes;
      if (void 0 === n) {
        if (this.length && (i = z.get(o), 1 === o.nodeType && !_.get(o, "hasDataAttrs"))) {
          t = a.length;
          while (t--) a[t] && 0 === (r = a[t].name).indexOf("data-") && (r = B(r.slice(5)), V(o, r, i[r]));
          _.set(o, "hasDataAttrs", !0);
        }
        return i;
      }
      return "object" == _typeof(n) ? this.each(function () {
        z.set(this, n);
      }) : R(this, function (e) {
        var t;
        if (o && void 0 === e) return void 0 !== (t = z.get(o, n)) ? t : void 0 !== (t = V(o, n)) ? t : void 0;
        this.each(function () {
          z.set(this, n, e);
        });
      }, null, e, 1 < arguments.length, null, !0);
    },
    removeData: function removeData(e) {
      return this.each(function () {
        z.remove(this, e);
      });
    }
  }), ce.extend({
    queue: function queue(e, t, n) {
      var r;
      if (e) return t = (t || "fx") + "queue", r = _.get(e, t), n && (!r || Array.isArray(n) ? r = _.access(e, t, ce.makeArray(n)) : r.push(n)), r || [];
    },
    dequeue: function dequeue(e, t) {
      t = t || "fx";
      var n = ce.queue(e, t),
        r = n.length,
        i = n.shift(),
        o = ce._queueHooks(e, t);
      "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, function () {
        ce.dequeue(e, t);
      }, o)), !r && o && o.empty.fire();
    },
    _queueHooks: function _queueHooks(e, t) {
      var n = t + "queueHooks";
      return _.get(e, n) || _.access(e, n, {
        empty: ce.Callbacks("once memory").add(function () {
          _.remove(e, [t + "queue", n]);
        })
      });
    }
  }), ce.fn.extend({
    queue: function queue(t, n) {
      var e = 2;
      return "string" != typeof t && (n = t, t = "fx", e--), arguments.length < e ? ce.queue(this[0], t) : void 0 === n ? this : this.each(function () {
        var e = ce.queue(this, t, n);
        ce._queueHooks(this, t), "fx" === t && "inprogress" !== e[0] && ce.dequeue(this, t);
      });
    },
    dequeue: function dequeue(e) {
      return this.each(function () {
        ce.dequeue(this, e);
      });
    },
    clearQueue: function clearQueue(e) {
      return this.queue(e || "fx", []);
    },
    promise: function promise(e, t) {
      var n,
        r = 1,
        i = ce.Deferred(),
        o = this,
        a = this.length,
        s = function s() {
          --r || i.resolveWith(o, [o]);
        };
      "string" != typeof e && (t = e, e = void 0), e = e || "fx";
      while (a--) (n = _.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
      return s(), i.promise(t);
    }
  });
  var Q = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
    Y = new RegExp("^(?:([+-])=|)(" + Q + ")([a-z%]*)$", "i"),
    G = ["Top", "Right", "Bottom", "Left"],
    K = m.documentElement,
    J = function J(e) {
      return ce.contains(e.ownerDocument, e);
    },
    Z = {
      composed: !0
    };
  K.getRootNode && (J = function J(e) {
    return ce.contains(e.ownerDocument, e) || e.getRootNode(Z) === e.ownerDocument;
  });
  var ee = function ee(e, t) {
    return "none" === (e = t || e).style.display || "" === e.style.display && J(e) && "none" === ce.css(e, "display");
  };
  var te = {};
  function ne(e, t) {
    for (var n, r, i, o, a, s, u, l = [], c = 0, f = e.length; c < f; c++) (r = e[c]).style && (n = r.style.display, t ? ("none" === n && (l[c] = _.get(r, "display") || null, l[c] || (r.style.display = "")), "" === r.style.display && ee(r) && (l[c] = (u = a = o = void 0, a = (i = r).ownerDocument, s = i.nodeName, (u = te[s]) || (o = a.body.appendChild(a.createElement(s)), u = ce.css(o, "display"), o.parentNode.removeChild(o), "none" === u && (u = "block"), te[s] = u)))) : "none" !== n && (l[c] = "none", _.set(r, "display", n)));
    for (c = 0; c < f; c++) null != l[c] && (e[c].style.display = l[c]);
    return e;
  }
  ce.fn.extend({
    show: function show() {
      return ne(this, !0);
    },
    hide: function hide() {
      return ne(this);
    },
    toggle: function toggle(e) {
      return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function () {
        ee(this) ? ce(this).show() : ce(this).hide();
      });
    }
  });
  var re,
    be,
    xe = /^(?:checkbox|radio)$/i,
    we = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
    Te = /^$|^module$|\/(?:java|ecma)script/i;
  re = m.createDocumentFragment().appendChild(m.createElement("div")), (be = m.createElement("input")).setAttribute("type", "radio"), be.setAttribute("checked", "checked"), be.setAttribute("name", "t"), re.appendChild(be), le.checkClone = re.cloneNode(!0).cloneNode(!0).lastChild.checked, re.innerHTML = "<textarea>x</textarea>", le.noCloneChecked = !!re.cloneNode(!0).lastChild.defaultValue, re.innerHTML = "<option></option>", le.option = !!re.lastChild;
  var Ce = {
    thead: [1, "<table>", "</table>"],
    col: [2, "<table><colgroup>", "</colgroup></table>"],
    tr: [2, "<table><tbody>", "</tbody></table>"],
    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
    _default: [0, "", ""]
  };
  function Ee(e, t) {
    var n;
    return n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && fe(e, t) ? ce.merge([e], n) : n;
  }
  function ke(e, t) {
    for (var n = 0, r = e.length; n < r; n++) _.set(e[n], "globalEval", !t || _.get(t[n], "globalEval"));
  }
  Ce.tbody = Ce.tfoot = Ce.colgroup = Ce.caption = Ce.thead, Ce.th = Ce.td, le.option || (Ce.optgroup = Ce.option = [1, "<select multiple='multiple'>", "</select>"]);
  var Se = /<|&#?\w+;/;
  function Ae(e, t, n, r, i) {
    for (var o, a, s, u, l, c, f = t.createDocumentFragment(), d = [], p = 0, h = e.length; p < h; p++) if ((o = e[p]) || 0 === o) if ("object" === x(o)) ce.merge(d, o.nodeType ? [o] : o);else if (Se.test(o)) {
      a = a || f.appendChild(t.createElement("div")), s = (we.exec(o) || ["", ""])[1].toLowerCase(), u = Ce[s] || Ce._default, a.innerHTML = u[1] + ce.htmlPrefilter(o) + u[2], c = u[0];
      while (c--) a = a.lastChild;
      ce.merge(d, a.childNodes), (a = f.firstChild).textContent = "";
    } else d.push(t.createTextNode(o));
    f.textContent = "", p = 0;
    while (o = d[p++]) if (r && -1 < ce.inArray(o, r)) i && i.push(o);else if (l = J(o), a = Ee(f.appendChild(o), "script"), l && ke(a), n) {
      c = 0;
      while (o = a[c++]) Te.test(o.type || "") && n.push(o);
    }
    return f;
  }
  var De = /^([^.]*)(?:\.(.+)|)/;
  function Ne() {
    return !0;
  }
  function Le() {
    return !1;
  }
  function je(e, t, n, r, i, o) {
    var a, s;
    if ("object" == _typeof(t)) {
      for (s in "string" != typeof n && (r = r || n, n = void 0), t) je(e, s, n, r, t[s], o);
      return e;
    }
    if (null == r && null == i ? (i = n, r = n = void 0) : null == i && ("string" == typeof n ? (i = r, r = void 0) : (i = r, r = n, n = void 0)), !1 === i) i = Le;else if (!i) return e;
    return 1 === o && (a = i, (i = function i(e) {
      return ce().off(e), a.apply(this, arguments);
    }).guid = a.guid || (a.guid = ce.guid++)), e.each(function () {
      ce.event.add(this, t, i, r, n);
    });
  }
  function Oe(e, r, t) {
    t ? (_.set(e, r, !1), ce.event.add(e, r, {
      namespace: !1,
      handler: function handler(e) {
        var t,
          n = _.get(this, r);
        if (1 & e.isTrigger && this[r]) {
          if (n) (ce.event.special[r] || {}).delegateType && e.stopPropagation();else if (n = ae.call(arguments), _.set(this, r, n), this[r](), t = _.get(this, r), _.set(this, r, !1), n !== t) return e.stopImmediatePropagation(), e.preventDefault(), t;
        } else n && (_.set(this, r, ce.event.trigger(n[0], n.slice(1), this)), e.stopPropagation(), e.isImmediatePropagationStopped = Ne);
      }
    })) : void 0 === _.get(e, r) && ce.event.add(e, r, Ne);
  }
  ce.event = {
    global: {},
    add: function add(t, e, n, r, i) {
      var o,
        a,
        s,
        u,
        l,
        c,
        f,
        d,
        p,
        h,
        g,
        v = _.get(t);
      if (F(t)) {
        n.handler && (n = (o = n).handler, i = o.selector), i && ce.find.matchesSelector(K, i), n.guid || (n.guid = ce.guid++), (u = v.events) || (u = v.events = Object.create(null)), (a = v.handle) || (a = v.handle = function (e) {
          return "undefined" != typeof ce && ce.event.triggered !== e.type ? ce.event.dispatch.apply(t, arguments) : void 0;
        }), l = (e = (e || "").match(N) || [""]).length;
        while (l--) p = g = (s = De.exec(e[l]) || [])[1], h = (s[2] || "").split(".").sort(), p && (f = ce.event.special[p] || {}, p = (i ? f.delegateType : f.bindType) || p, f = ce.event.special[p] || {}, c = ce.extend({
          type: p,
          origType: g,
          data: r,
          handler: n,
          guid: n.guid,
          selector: i,
          needsContext: i && ce.expr.match.needsContext.test(i),
          namespace: h.join(".")
        }, o), (d = u[p]) || ((d = u[p] = []).delegateCount = 0, f.setup && !1 !== f.setup.call(t, r, h, a) || t.addEventListener && t.addEventListener(p, a)), f.add && (f.add.call(t, c), c.handler.guid || (c.handler.guid = n.guid)), i ? d.splice(d.delegateCount++, 0, c) : d.push(c), ce.event.global[p] = !0);
      }
    },
    remove: function remove(e, t, n, r, i) {
      var o,
        a,
        s,
        u,
        l,
        c,
        f,
        d,
        p,
        h,
        g,
        v = _.hasData(e) && _.get(e);
      if (v && (u = v.events)) {
        l = (t = (t || "").match(N) || [""]).length;
        while (l--) if (p = g = (s = De.exec(t[l]) || [])[1], h = (s[2] || "").split(".").sort(), p) {
          f = ce.event.special[p] || {}, d = u[p = (r ? f.delegateType : f.bindType) || p] || [], s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = o = d.length;
          while (o--) c = d[o], !i && g !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (d.splice(o, 1), c.selector && d.delegateCount--, f.remove && f.remove.call(e, c));
          a && !d.length && (f.teardown && !1 !== f.teardown.call(e, h, v.handle) || ce.removeEvent(e, p, v.handle), delete u[p]);
        } else for (p in u) ce.event.remove(e, p + t[l], n, r, !0);
        ce.isEmptyObject(u) && _.remove(e, "handle events");
      }
    },
    dispatch: function dispatch(e) {
      var t,
        n,
        r,
        i,
        o,
        a,
        s = new Array(arguments.length),
        u = ce.event.fix(e),
        l = (_.get(this, "events") || Object.create(null))[u.type] || [],
        c = ce.event.special[u.type] || {};
      for (s[0] = u, t = 1; t < arguments.length; t++) s[t] = arguments[t];
      if (u.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, u)) {
        a = ce.event.handlers.call(this, u, l), t = 0;
        while ((i = a[t++]) && !u.isPropagationStopped()) {
          u.currentTarget = i.elem, n = 0;
          while ((o = i.handlers[n++]) && !u.isImmediatePropagationStopped()) u.rnamespace && !1 !== o.namespace && !u.rnamespace.test(o.namespace) || (u.handleObj = o, u.data = o.data, void 0 !== (r = ((ce.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, s)) && !1 === (u.result = r) && (u.preventDefault(), u.stopPropagation()));
        }
        return c.postDispatch && c.postDispatch.call(this, u), u.result;
      }
    },
    handlers: function handlers(e, t) {
      var n,
        r,
        i,
        o,
        a,
        s = [],
        u = t.delegateCount,
        l = e.target;
      if (u && l.nodeType && !("click" === e.type && 1 <= e.button)) for (; l !== this; l = l.parentNode || this) if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
        for (o = [], a = {}, n = 0; n < u; n++) void 0 === a[i = (r = t[n]).selector + " "] && (a[i] = r.needsContext ? -1 < ce(i, this).index(l) : ce.find(i, this, null, [l]).length), a[i] && o.push(r);
        o.length && s.push({
          elem: l,
          handlers: o
        });
      }
      return l = this, u < t.length && s.push({
        elem: l,
        handlers: t.slice(u)
      }), s;
    },
    addProp: function addProp(t, e) {
      Object.defineProperty(ce.Event.prototype, t, {
        enumerable: !0,
        configurable: !0,
        get: v(e) ? function () {
          if (this.originalEvent) return e(this.originalEvent);
        } : function () {
          if (this.originalEvent) return this.originalEvent[t];
        },
        set: function set(e) {
          Object.defineProperty(this, t, {
            enumerable: !0,
            configurable: !0,
            writable: !0,
            value: e
          });
        }
      });
    },
    fix: function fix(e) {
      return e[ce.expando] ? e : new ce.Event(e);
    },
    special: {
      load: {
        noBubble: !0
      },
      click: {
        setup: function setup(e) {
          var t = this || e;
          return xe.test(t.type) && t.click && fe(t, "input") && Oe(t, "click", !0), !1;
        },
        trigger: function trigger(e) {
          var t = this || e;
          return xe.test(t.type) && t.click && fe(t, "input") && Oe(t, "click"), !0;
        },
        _default: function _default(e) {
          var t = e.target;
          return xe.test(t.type) && t.click && fe(t, "input") && _.get(t, "click") || fe(t, "a");
        }
      },
      beforeunload: {
        postDispatch: function postDispatch(e) {
          void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result);
        }
      }
    }
  }, ce.removeEvent = function (e, t, n) {
    e.removeEventListener && e.removeEventListener(t, n);
  }, ce.Event = function (e, t) {
    if (!(this instanceof ce.Event)) return new ce.Event(e, t);
    e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? Ne : Le, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && ce.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[ce.expando] = !0;
  }, ce.Event.prototype = {
    constructor: ce.Event,
    isDefaultPrevented: Le,
    isPropagationStopped: Le,
    isImmediatePropagationStopped: Le,
    isSimulated: !1,
    preventDefault: function preventDefault() {
      var e = this.originalEvent;
      this.isDefaultPrevented = Ne, e && !this.isSimulated && e.preventDefault();
    },
    stopPropagation: function stopPropagation() {
      var e = this.originalEvent;
      this.isPropagationStopped = Ne, e && !this.isSimulated && e.stopPropagation();
    },
    stopImmediatePropagation: function stopImmediatePropagation() {
      var e = this.originalEvent;
      this.isImmediatePropagationStopped = Ne, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation();
    }
  }, ce.each({
    altKey: !0,
    bubbles: !0,
    cancelable: !0,
    changedTouches: !0,
    ctrlKey: !0,
    detail: !0,
    eventPhase: !0,
    metaKey: !0,
    pageX: !0,
    pageY: !0,
    shiftKey: !0,
    view: !0,
    "char": !0,
    code: !0,
    charCode: !0,
    key: !0,
    keyCode: !0,
    button: !0,
    buttons: !0,
    clientX: !0,
    clientY: !0,
    offsetX: !0,
    offsetY: !0,
    pointerId: !0,
    pointerType: !0,
    screenX: !0,
    screenY: !0,
    targetTouches: !0,
    toElement: !0,
    touches: !0,
    which: !0
  }, ce.event.addProp), ce.each({
    focus: "focusin",
    blur: "focusout"
  }, function (r, i) {
    function o(e) {
      if (m.documentMode) {
        var t = _.get(this, "handle"),
          n = ce.event.fix(e);
        n.type = "focusin" === e.type ? "focus" : "blur", n.isSimulated = !0, t(e), n.target === n.currentTarget && t(n);
      } else ce.event.simulate(i, e.target, ce.event.fix(e));
    }
    ce.event.special[r] = {
      setup: function setup() {
        var e;
        if (Oe(this, r, !0), !m.documentMode) return !1;
        (e = _.get(this, i)) || this.addEventListener(i, o), _.set(this, i, (e || 0) + 1);
      },
      trigger: function trigger() {
        return Oe(this, r), !0;
      },
      teardown: function teardown() {
        var e;
        if (!m.documentMode) return !1;
        (e = _.get(this, i) - 1) ? _.set(this, i, e) : (this.removeEventListener(i, o), _.remove(this, i));
      },
      _default: function _default(e) {
        return _.get(e.target, r);
      },
      delegateType: i
    }, ce.event.special[i] = {
      setup: function setup() {
        var e = this.ownerDocument || this.document || this,
          t = m.documentMode ? this : e,
          n = _.get(t, i);
        n || (m.documentMode ? this.addEventListener(i, o) : e.addEventListener(r, o, !0)), _.set(t, i, (n || 0) + 1);
      },
      teardown: function teardown() {
        var e = this.ownerDocument || this.document || this,
          t = m.documentMode ? this : e,
          n = _.get(t, i) - 1;
        n ? _.set(t, i, n) : (m.documentMode ? this.removeEventListener(i, o) : e.removeEventListener(r, o, !0), _.remove(t, i));
      }
    };
  }), ce.each({
    mouseenter: "mouseover",
    mouseleave: "mouseout",
    pointerenter: "pointerover",
    pointerleave: "pointerout"
  }, function (e, i) {
    ce.event.special[e] = {
      delegateType: i,
      bindType: i,
      handle: function handle(e) {
        var t,
          n = e.relatedTarget,
          r = e.handleObj;
        return n && (n === this || ce.contains(this, n)) || (e.type = r.origType, t = r.handler.apply(this, arguments), e.type = i), t;
      }
    };
  }), ce.fn.extend({
    on: function on(e, t, n, r) {
      return je(this, e, t, n, r);
    },
    one: function one(e, t, n, r) {
      return je(this, e, t, n, r, 1);
    },
    off: function off(e, t, n) {
      var r, i;
      if (e && e.preventDefault && e.handleObj) return r = e.handleObj, ce(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
      if ("object" == _typeof(e)) {
        for (i in e) this.off(i, t, e[i]);
        return this;
      }
      return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = Le), this.each(function () {
        ce.event.remove(this, e, n, t);
      });
    }
  });
  var Pe = /<script|<style|<link/i,
    He = /checked\s*(?:[^=]|=\s*.checked.)/i,
    qe = /^\s*<!\[CDATA\[|\]\]>\s*$/g;
  function Re(e, t) {
    return fe(e, "table") && fe(11 !== t.nodeType ? t : t.firstChild, "tr") && ce(e).children("tbody")[0] || e;
  }
  function Me(e) {
    return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e;
  }
  function Ie(e) {
    return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e;
  }
  function We(e, t) {
    var n, r, i, o, a, s;
    if (1 === t.nodeType) {
      if (_.hasData(e) && (s = _.get(e).events)) for (i in _.remove(t, "handle events"), s) for (n = 0, r = s[i].length; n < r; n++) ce.event.add(t, i, s[i][n]);
      z.hasData(e) && (o = z.access(e), a = ce.extend({}, o), z.set(t, a));
    }
  }
  function Be(n, r, i, o) {
    r = g(r);
    var e,
      t,
      a,
      s,
      u,
      l,
      c = 0,
      f = n.length,
      d = f - 1,
      p = r[0],
      h = v(p);
    if (h || 1 < f && "string" == typeof p && !le.checkClone && He.test(p)) return n.each(function (e) {
      var t = n.eq(e);
      h && (r[0] = p.call(this, e, t.html())), Be(t, r, i, o);
    });
    if (f && (t = (e = Ae(r, n[0].ownerDocument, !1, n, o)).firstChild, 1 === e.childNodes.length && (e = t), t || o)) {
      for (s = (a = ce.map(Ee(e, "script"), Me)).length; c < f; c++) u = e, c !== d && (u = ce.clone(u, !0, !0), s && ce.merge(a, Ee(u, "script"))), i.call(n[c], u, c);
      if (s) for (l = a[a.length - 1].ownerDocument, ce.map(a, Ie), c = 0; c < s; c++) u = a[c], Te.test(u.type || "") && !_.access(u, "globalEval") && ce.contains(l, u) && (u.src && "module" !== (u.type || "").toLowerCase() ? ce._evalUrl && !u.noModule && ce._evalUrl(u.src, {
        nonce: u.nonce || u.getAttribute("nonce")
      }, l) : b(u.textContent.replace(qe, ""), u, l));
    }
    return n;
  }
  function Fe(e, t, n) {
    for (var r, i = t ? ce.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || ce.cleanData(Ee(r)), r.parentNode && (n && J(r) && ke(Ee(r, "script")), r.parentNode.removeChild(r));
    return e;
  }
  ce.extend({
    htmlPrefilter: function htmlPrefilter(e) {
      return e;
    },
    clone: function clone(e, t, n) {
      var r,
        i,
        o,
        a,
        s,
        u,
        l,
        c = e.cloneNode(!0),
        f = J(e);
      if (!(le.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || ce.isXMLDoc(e))) for (a = Ee(c), r = 0, i = (o = Ee(e)).length; r < i; r++) s = o[r], u = a[r], void 0, "input" === (l = u.nodeName.toLowerCase()) && xe.test(s.type) ? u.checked = s.checked : "input" !== l && "textarea" !== l || (u.defaultValue = s.defaultValue);
      if (t) if (n) for (o = o || Ee(e), a = a || Ee(c), r = 0, i = o.length; r < i; r++) We(o[r], a[r]);else We(e, c);
      return 0 < (a = Ee(c, "script")).length && ke(a, !f && Ee(e, "script")), c;
    },
    cleanData: function cleanData(e) {
      for (var t, n, r, i = ce.event.special, o = 0; void 0 !== (n = e[o]); o++) if (F(n)) {
        if (t = n[_.expando]) {
          if (t.events) for (r in t.events) i[r] ? ce.event.remove(n, r) : ce.removeEvent(n, r, t.handle);
          n[_.expando] = void 0;
        }
        n[z.expando] && (n[z.expando] = void 0);
      }
    }
  }), ce.fn.extend({
    detach: function detach(e) {
      return Fe(this, e, !0);
    },
    remove: function remove(e) {
      return Fe(this, e);
    },
    text: function text(e) {
      return R(this, function (e) {
        return void 0 === e ? ce.text(this) : this.empty().each(function () {
          1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e);
        });
      }, null, e, arguments.length);
    },
    append: function append() {
      return Be(this, arguments, function (e) {
        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Re(this, e).appendChild(e);
      });
    },
    prepend: function prepend() {
      return Be(this, arguments, function (e) {
        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
          var t = Re(this, e);
          t.insertBefore(e, t.firstChild);
        }
      });
    },
    before: function before() {
      return Be(this, arguments, function (e) {
        this.parentNode && this.parentNode.insertBefore(e, this);
      });
    },
    after: function after() {
      return Be(this, arguments, function (e) {
        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
      });
    },
    empty: function empty() {
      for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (ce.cleanData(Ee(e, !1)), e.textContent = "");
      return this;
    },
    clone: function clone(e, t) {
      return e = null != e && e, t = null == t ? e : t, this.map(function () {
        return ce.clone(this, e, t);
      });
    },
    html: function html(e) {
      return R(this, function (e) {
        var t = this[0] || {},
          n = 0,
          r = this.length;
        if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
        if ("string" == typeof e && !Pe.test(e) && !Ce[(we.exec(e) || ["", ""])[1].toLowerCase()]) {
          e = ce.htmlPrefilter(e);
          try {
            for (; n < r; n++) 1 === (t = this[n] || {}).nodeType && (ce.cleanData(Ee(t, !1)), t.innerHTML = e);
            t = 0;
          } catch (e) {}
        }
        t && this.empty().append(e);
      }, null, e, arguments.length);
    },
    replaceWith: function replaceWith() {
      var n = [];
      return Be(this, arguments, function (e) {
        var t = this.parentNode;
        ce.inArray(this, n) < 0 && (ce.cleanData(Ee(this)), t && t.replaceChild(e, this));
      }, n);
    }
  }), ce.each({
    appendTo: "append",
    prependTo: "prepend",
    insertBefore: "before",
    insertAfter: "after",
    replaceAll: "replaceWith"
  }, function (e, a) {
    ce.fn[e] = function (e) {
      for (var t, n = [], r = ce(e), i = r.length - 1, o = 0; o <= i; o++) t = o === i ? this : this.clone(!0), ce(r[o])[a](t), s.apply(n, t.get());
      return this.pushStack(n);
    };
  });
  var $e = new RegExp("^(" + Q + ")(?!px)[a-z%]+$", "i"),
    _e = /^--/,
    ze = function ze(e) {
      var t = e.ownerDocument.defaultView;
      return t && t.opener || (t = ie), t.getComputedStyle(e);
    },
    Ue = function Ue(e, t, n) {
      var r,
        i,
        o = {};
      for (i in t) o[i] = e.style[i], e.style[i] = t[i];
      for (i in r = n.call(e), t) e.style[i] = o[i];
      return r;
    },
    Xe = new RegExp(G.join("|"), "i");
  function Ve(e, t, n) {
    var r,
      i,
      o,
      a,
      s = _e.test(t),
      u = e.style;
    return (n = n || ze(e)) && (a = n.getPropertyValue(t) || n[t], s && a && (a = a.replace(ve, "$1") || void 0), "" !== a || J(e) || (a = ce.style(e, t)), !le.pixelBoxStyles() && $e.test(a) && Xe.test(t) && (r = u.width, i = u.minWidth, o = u.maxWidth, u.minWidth = u.maxWidth = u.width = a, a = n.width, u.width = r, u.minWidth = i, u.maxWidth = o)), void 0 !== a ? a + "" : a;
  }
  function Qe(e, t) {
    return {
      get: function get() {
        if (!e()) return (this.get = t).apply(this, arguments);
        delete this.get;
      }
    };
  }
  !function () {
    function e() {
      if (l) {
        u.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", l.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", K.appendChild(u).appendChild(l);
        var e = ie.getComputedStyle(l);
        n = "1%" !== e.top, s = 12 === t(e.marginLeft), l.style.right = "60%", o = 36 === t(e.right), r = 36 === t(e.width), l.style.position = "absolute", i = 12 === t(l.offsetWidth / 3), K.removeChild(u), l = null;
      }
    }
    function t(e) {
      return Math.round(parseFloat(e));
    }
    var n,
      r,
      i,
      o,
      a,
      s,
      u = m.createElement("div"),
      l = m.createElement("div");
    l.style && (l.style.backgroundClip = "content-box", l.cloneNode(!0).style.backgroundClip = "", le.clearCloneStyle = "content-box" === l.style.backgroundClip, ce.extend(le, {
      boxSizingReliable: function boxSizingReliable() {
        return e(), r;
      },
      pixelBoxStyles: function pixelBoxStyles() {
        return e(), o;
      },
      pixelPosition: function pixelPosition() {
        return e(), n;
      },
      reliableMarginLeft: function reliableMarginLeft() {
        return e(), s;
      },
      scrollboxSize: function scrollboxSize() {
        return e(), i;
      },
      reliableTrDimensions: function reliableTrDimensions() {
        var e, t, n, r;
        return null == a && (e = m.createElement("table"), t = m.createElement("tr"), n = m.createElement("div"), e.style.cssText = "position:absolute;left:-11111px;border-collapse:separate", t.style.cssText = "border:1px solid", t.style.height = "1px", n.style.height = "9px", n.style.display = "block", K.appendChild(e).appendChild(t).appendChild(n), r = ie.getComputedStyle(t), a = parseInt(r.height, 10) + parseInt(r.borderTopWidth, 10) + parseInt(r.borderBottomWidth, 10) === t.offsetHeight, K.removeChild(e)), a;
      }
    }));
  }();
  var Ye = ["Webkit", "Moz", "ms"],
    Ge = m.createElement("div").style,
    Ke = {};
  function Je(e) {
    var t = ce.cssProps[e] || Ke[e];
    return t || (e in Ge ? e : Ke[e] = function (e) {
      var t = e[0].toUpperCase() + e.slice(1),
        n = Ye.length;
      while (n--) if ((e = Ye[n] + t) in Ge) return e;
    }(e) || e);
  }
  var Ze,
    et,
    tt = /^(none|table(?!-c[ea]).+)/,
    nt = {
      position: "absolute",
      visibility: "hidden",
      display: "block"
    },
    rt = {
      letterSpacing: "0",
      fontWeight: "400"
    };
  function it(e, t, n) {
    var r = Y.exec(t);
    return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t;
  }
  function ot(e, t, n, r, i, o) {
    var a = "width" === t ? 1 : 0,
      s = 0,
      u = 0,
      l = 0;
    if (n === (r ? "border" : "content")) return 0;
    for (; a < 4; a += 2) "margin" === n && (l += ce.css(e, n + G[a], !0, i)), r ? ("content" === n && (u -= ce.css(e, "padding" + G[a], !0, i)), "margin" !== n && (u -= ce.css(e, "border" + G[a] + "Width", !0, i))) : (u += ce.css(e, "padding" + G[a], !0, i), "padding" !== n ? u += ce.css(e, "border" + G[a] + "Width", !0, i) : s += ce.css(e, "border" + G[a] + "Width", !0, i));
    return !r && 0 <= o && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - s - .5)) || 0), u + l;
  }
  function at(e, t, n) {
    var r = ze(e),
      i = (!le.boxSizingReliable() || n) && "border-box" === ce.css(e, "boxSizing", !1, r),
      o = i,
      a = Ve(e, t, r),
      s = "offset" + t[0].toUpperCase() + t.slice(1);
    if ($e.test(a)) {
      if (!n) return a;
      a = "auto";
    }
    return (!le.boxSizingReliable() && i || !le.reliableTrDimensions() && fe(e, "tr") || "auto" === a || !parseFloat(a) && "inline" === ce.css(e, "display", !1, r)) && e.getClientRects().length && (i = "border-box" === ce.css(e, "boxSizing", !1, r), (o = s in e) && (a = e[s])), (a = parseFloat(a) || 0) + ot(e, t, n || (i ? "border" : "content"), o, r, a) + "px";
  }
  ce.extend({
    cssHooks: {
      opacity: {
        get: function get(e, t) {
          if (t) {
            var n = Ve(e, "opacity");
            return "" === n ? "1" : n;
          }
        }
      }
    },
    cssNumber: {
      animationIterationCount: !0,
      aspectRatio: !0,
      borderImageSlice: !0,
      columnCount: !0,
      flexGrow: !0,
      flexShrink: !0,
      fontWeight: !0,
      gridArea: !0,
      gridColumn: !0,
      gridColumnEnd: !0,
      gridColumnStart: !0,
      gridRow: !0,
      gridRowEnd: !0,
      gridRowStart: !0,
      lineHeight: !0,
      opacity: !0,
      order: !0,
      orphans: !0,
      scale: !0,
      widows: !0,
      zIndex: !0,
      zoom: !0,
      fillOpacity: !0,
      floodOpacity: !0,
      stopOpacity: !0,
      strokeMiterlimit: !0,
      strokeOpacity: !0
    },
    cssProps: {},
    style: function style(e, t, n, r) {
      if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
        var i,
          o,
          a,
          s = B(t),
          u = _e.test(t),
          l = e.style;
        if (u || (t = Je(s)), a = ce.cssHooks[t] || ce.cssHooks[s], void 0 === n) return a && "get" in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
        "string" === (o = _typeof(n)) && (i = Y.exec(n)) && i[1] && (n = function (e, t, n, r) {
          var i,
            o,
            a = 20,
            s = r ? function () {
              return r.cur();
            } : function () {
              return ce.css(e, t, "");
            },
            u = s(),
            l = n && n[3] || (ce.cssNumber[t] ? "" : "px"),
            c = e.nodeType && (ce.cssNumber[t] || "px" !== l && +u) && Y.exec(ce.css(e, t));
          if (c && c[3] !== l) {
            u /= 2, l = l || c[3], c = +u || 1;
            while (a--) ce.style(e, t, c + l), (1 - o) * (1 - (o = s() / u || .5)) <= 0 && (a = 0), c /= o;
            c *= 2, ce.style(e, t, c + l), n = n || [];
          }
          return n && (c = +c || +u || 0, i = n[1] ? c + (n[1] + 1) * n[2] : +n[2], r && (r.unit = l, r.start = c, r.end = i)), i;
        }(e, t, i), o = "number"), null != n && n == n && ("number" !== o || u || (n += i && i[3] || (ce.cssNumber[s] ? "" : "px")), le.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), a && "set" in a && void 0 === (n = a.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n));
      }
    },
    css: function css(e, t, n, r) {
      var i,
        o,
        a,
        s = B(t);
      return _e.test(t) || (t = Je(s)), (a = ce.cssHooks[t] || ce.cssHooks[s]) && "get" in a && (i = a.get(e, !0, n)), void 0 === i && (i = Ve(e, t, r)), "normal" === i && t in rt && (i = rt[t]), "" === n || n ? (o = parseFloat(i), !0 === n || isFinite(o) ? o || 0 : i) : i;
    }
  }), ce.each(["height", "width"], function (e, u) {
    ce.cssHooks[u] = {
      get: function get(e, t, n) {
        if (t) return !tt.test(ce.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? at(e, u, n) : Ue(e, nt, function () {
          return at(e, u, n);
        });
      },
      set: function set(e, t, n) {
        var r,
          i = ze(e),
          o = !le.scrollboxSize() && "absolute" === i.position,
          a = (o || n) && "border-box" === ce.css(e, "boxSizing", !1, i),
          s = n ? ot(e, u, n, a, i) : 0;
        return a && o && (s -= Math.ceil(e["offset" + u[0].toUpperCase() + u.slice(1)] - parseFloat(i[u]) - ot(e, u, "border", !1, i) - .5)), s && (r = Y.exec(t)) && "px" !== (r[3] || "px") && (e.style[u] = t, t = ce.css(e, u)), it(0, t, s);
      }
    };
  }), ce.cssHooks.marginLeft = Qe(le.reliableMarginLeft, function (e, t) {
    if (t) return (parseFloat(Ve(e, "marginLeft")) || e.getBoundingClientRect().left - Ue(e, {
      marginLeft: 0
    }, function () {
      return e.getBoundingClientRect().left;
    })) + "px";
  }), ce.each({
    margin: "",
    padding: "",
    border: "Width"
  }, function (i, o) {
    ce.cssHooks[i + o] = {
      expand: function expand(e) {
        for (var t = 0, n = {}, r = "string" == typeof e ? e.split(" ") : [e]; t < 4; t++) n[i + G[t] + o] = r[t] || r[t - 2] || r[0];
        return n;
      }
    }, "margin" !== i && (ce.cssHooks[i + o].set = it);
  }), ce.fn.extend({
    css: function css(e, t) {
      return R(this, function (e, t, n) {
        var r,
          i,
          o = {},
          a = 0;
        if (Array.isArray(t)) {
          for (r = ze(e), i = t.length; a < i; a++) o[t[a]] = ce.css(e, t[a], !1, r);
          return o;
        }
        return void 0 !== n ? ce.style(e, t, n) : ce.css(e, t);
      }, e, t, 1 < arguments.length);
    }
  }), ce.fn.delay = function (r, e) {
    return r = ce.fx && ce.fx.speeds[r] || r, e = e || "fx", this.queue(e, function (e, t) {
      var n = ie.setTimeout(e, r);
      t.stop = function () {
        ie.clearTimeout(n);
      };
    });
  }, Ze = m.createElement("input"), et = m.createElement("select").appendChild(m.createElement("option")), Ze.type = "checkbox", le.checkOn = "" !== Ze.value, le.optSelected = et.selected, (Ze = m.createElement("input")).value = "t", Ze.type = "radio", le.radioValue = "t" === Ze.value;
  var st,
    ut = ce.expr.attrHandle;
  ce.fn.extend({
    attr: function attr(e, t) {
      return R(this, ce.attr, e, t, 1 < arguments.length);
    },
    removeAttr: function removeAttr(e) {
      return this.each(function () {
        ce.removeAttr(this, e);
      });
    }
  }), ce.extend({
    attr: function attr(e, t, n) {
      var r,
        i,
        o = e.nodeType;
      if (3 !== o && 8 !== o && 2 !== o) return "undefined" == typeof e.getAttribute ? ce.prop(e, t, n) : (1 === o && ce.isXMLDoc(e) || (i = ce.attrHooks[t.toLowerCase()] || (ce.expr.match.bool.test(t) ? st : void 0)), void 0 !== n ? null === n ? void ce.removeAttr(e, t) : i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : i && "get" in i && null !== (r = i.get(e, t)) ? r : null == (r = ce.find.attr(e, t)) ? void 0 : r);
    },
    attrHooks: {
      type: {
        set: function set(e, t) {
          if (!le.radioValue && "radio" === t && fe(e, "input")) {
            var n = e.value;
            return e.setAttribute("type", t), n && (e.value = n), t;
          }
        }
      }
    },
    removeAttr: function removeAttr(e, t) {
      var n,
        r = 0,
        i = t && t.match(N);
      if (i && 1 === e.nodeType) while (n = i[r++]) e.removeAttribute(n);
    }
  }), st = {
    set: function set(e, t, n) {
      return !1 === t ? ce.removeAttr(e, n) : e.setAttribute(n, n), n;
    }
  }, ce.each(ce.expr.match.bool.source.match(/\w+/g), function (e, t) {
    var a = ut[t] || ce.find.attr;
    ut[t] = function (e, t, n) {
      var r,
        i,
        o = t.toLowerCase();
      return n || (i = ut[o], ut[o] = r, r = null != a(e, t, n) ? o : null, ut[o] = i), r;
    };
  });
  var lt = /^(?:input|select|textarea|button)$/i,
    ct = /^(?:a|area)$/i;
  function ft(e) {
    return (e.match(N) || []).join(" ");
  }
  function dt(e) {
    return e.getAttribute && e.getAttribute("class") || "";
  }
  function pt(e) {
    return Array.isArray(e) ? e : "string" == typeof e && e.match(N) || [];
  }
  ce.fn.extend({
    prop: function prop(e, t) {
      return R(this, ce.prop, e, t, 1 < arguments.length);
    },
    removeProp: function removeProp(e) {
      return this.each(function () {
        delete this[ce.propFix[e] || e];
      });
    }
  }), ce.extend({
    prop: function prop(e, t, n) {
      var r,
        i,
        o = e.nodeType;
      if (3 !== o && 8 !== o && 2 !== o) return 1 === o && ce.isXMLDoc(e) || (t = ce.propFix[t] || t, i = ce.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t];
    },
    propHooks: {
      tabIndex: {
        get: function get(e) {
          var t = ce.find.attr(e, "tabindex");
          return t ? parseInt(t, 10) : lt.test(e.nodeName) || ct.test(e.nodeName) && e.href ? 0 : -1;
        }
      }
    },
    propFix: {
      "for": "htmlFor",
      "class": "className"
    }
  }), le.optSelected || (ce.propHooks.selected = {
    get: function get(e) {
      var t = e.parentNode;
      return t && t.parentNode && t.parentNode.selectedIndex, null;
    },
    set: function set(e) {
      var t = e.parentNode;
      t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
    }
  }), ce.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
    ce.propFix[this.toLowerCase()] = this;
  }), ce.fn.extend({
    addClass: function addClass(t) {
      var e, n, r, i, o, a;
      return v(t) ? this.each(function (e) {
        ce(this).addClass(t.call(this, e, dt(this)));
      }) : (e = pt(t)).length ? this.each(function () {
        if (r = dt(this), n = 1 === this.nodeType && " " + ft(r) + " ") {
          for (o = 0; o < e.length; o++) i = e[o], n.indexOf(" " + i + " ") < 0 && (n += i + " ");
          a = ft(n), r !== a && this.setAttribute("class", a);
        }
      }) : this;
    },
    removeClass: function removeClass(t) {
      var e, n, r, i, o, a;
      return v(t) ? this.each(function (e) {
        ce(this).removeClass(t.call(this, e, dt(this)));
      }) : arguments.length ? (e = pt(t)).length ? this.each(function () {
        if (r = dt(this), n = 1 === this.nodeType && " " + ft(r) + " ") {
          for (o = 0; o < e.length; o++) {
            i = e[o];
            while (-1 < n.indexOf(" " + i + " ")) n = n.replace(" " + i + " ", " ");
          }
          a = ft(n), r !== a && this.setAttribute("class", a);
        }
      }) : this : this.attr("class", "");
    },
    toggleClass: function toggleClass(t, n) {
      var e,
        r,
        i,
        o,
        a = _typeof(t),
        s = "string" === a || Array.isArray(t);
      return v(t) ? this.each(function (e) {
        ce(this).toggleClass(t.call(this, e, dt(this), n), n);
      }) : "boolean" == typeof n && s ? n ? this.addClass(t) : this.removeClass(t) : (e = pt(t), this.each(function () {
        if (s) for (o = ce(this), i = 0; i < e.length; i++) r = e[i], o.hasClass(r) ? o.removeClass(r) : o.addClass(r);else void 0 !== t && "boolean" !== a || ((r = dt(this)) && _.set(this, "__className__", r), this.setAttribute && this.setAttribute("class", r || !1 === t ? "" : _.get(this, "__className__") || ""));
      }));
    },
    hasClass: function hasClass(e) {
      var t,
        n,
        r = 0;
      t = " " + e + " ";
      while (n = this[r++]) if (1 === n.nodeType && -1 < (" " + ft(dt(n)) + " ").indexOf(t)) return !0;
      return !1;
    }
  });
  var ht = /\r/g;
  ce.fn.extend({
    val: function val(n) {
      var r,
        e,
        i,
        t = this[0];
      return arguments.length ? (i = v(n), this.each(function (e) {
        var t;
        1 === this.nodeType && (null == (t = i ? n.call(this, e, ce(this).val()) : n) ? t = "" : "number" == typeof t ? t += "" : Array.isArray(t) && (t = ce.map(t, function (e) {
          return null == e ? "" : e + "";
        })), (r = ce.valHooks[this.type] || ce.valHooks[this.nodeName.toLowerCase()]) && "set" in r && void 0 !== r.set(this, t, "value") || (this.value = t));
      })) : t ? (r = ce.valHooks[t.type] || ce.valHooks[t.nodeName.toLowerCase()]) && "get" in r && void 0 !== (e = r.get(t, "value")) ? e : "string" == typeof (e = t.value) ? e.replace(ht, "") : null == e ? "" : e : void 0;
    }
  }), ce.extend({
    valHooks: {
      option: {
        get: function get(e) {
          var t = ce.find.attr(e, "value");
          return null != t ? t : ft(ce.text(e));
        }
      },
      select: {
        get: function get(e) {
          var t,
            n,
            r,
            i = e.options,
            o = e.selectedIndex,
            a = "select-one" === e.type,
            s = a ? null : [],
            u = a ? o + 1 : i.length;
          for (r = o < 0 ? u : a ? o : 0; r < u; r++) if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !fe(n.parentNode, "optgroup"))) {
            if (t = ce(n).val(), a) return t;
            s.push(t);
          }
          return s;
        },
        set: function set(e, t) {
          var n,
            r,
            i = e.options,
            o = ce.makeArray(t),
            a = i.length;
          while (a--) ((r = i[a]).selected = -1 < ce.inArray(ce.valHooks.option.get(r), o)) && (n = !0);
          return n || (e.selectedIndex = -1), o;
        }
      }
    }
  }), ce.each(["radio", "checkbox"], function () {
    ce.valHooks[this] = {
      set: function set(e, t) {
        if (Array.isArray(t)) return e.checked = -1 < ce.inArray(ce(e).val(), t);
      }
    }, le.checkOn || (ce.valHooks[this].get = function (e) {
      return null === e.getAttribute("value") ? "on" : e.value;
    });
  }), ce.parseXML = function (e) {
    var t, n;
    if (!e || "string" != typeof e) return null;
    try {
      t = new ie.DOMParser().parseFromString(e, "text/xml");
    } catch (e) {}
    return n = t && t.getElementsByTagName("parsererror")[0], t && !n || ce.error("Invalid XML: " + (n ? ce.map(n.childNodes, function (e) {
      return e.textContent;
    }).join("\n") : e)), t;
  };
  var gt = /^(?:focusinfocus|focusoutblur)$/,
    vt = function vt(e) {
      e.stopPropagation();
    };
  ce.extend(ce.event, {
    trigger: function trigger(e, t, n, r) {
      var i,
        o,
        a,
        s,
        u,
        l,
        c,
        f,
        d = [n || m],
        p = ue.call(e, "type") ? e.type : e,
        h = ue.call(e, "namespace") ? e.namespace.split(".") : [];
      if (o = f = a = n = n || m, 3 !== n.nodeType && 8 !== n.nodeType && !gt.test(p + ce.event.triggered) && (-1 < p.indexOf(".") && (p = (h = p.split(".")).shift(), h.sort()), u = p.indexOf(":") < 0 && "on" + p, (e = e[ce.expando] ? e : new ce.Event(p, "object" == _typeof(e) && e)).isTrigger = r ? 2 : 3, e.namespace = h.join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = n), t = null == t ? [e] : ce.makeArray(t, [e]), c = ce.event.special[p] || {}, r || !c.trigger || !1 !== c.trigger.apply(n, t))) {
        if (!r && !c.noBubble && !y(n)) {
          for (s = c.delegateType || p, gt.test(s + p) || (o = o.parentNode); o; o = o.parentNode) d.push(o), a = o;
          a === (n.ownerDocument || m) && d.push(a.defaultView || a.parentWindow || ie);
        }
        i = 0;
        while ((o = d[i++]) && !e.isPropagationStopped()) f = o, e.type = 1 < i ? s : c.bindType || p, (l = (_.get(o, "events") || Object.create(null))[e.type] && _.get(o, "handle")) && l.apply(o, t), (l = u && o[u]) && l.apply && F(o) && (e.result = l.apply(o, t), !1 === e.result && e.preventDefault());
        return e.type = p, r || e.isDefaultPrevented() || c._default && !1 !== c._default.apply(d.pop(), t) || !F(n) || u && v(n[p]) && !y(n) && ((a = n[u]) && (n[u] = null), ce.event.triggered = p, e.isPropagationStopped() && f.addEventListener(p, vt), n[p](), e.isPropagationStopped() && f.removeEventListener(p, vt), ce.event.triggered = void 0, a && (n[u] = a)), e.result;
      }
    },
    simulate: function simulate(e, t, n) {
      var r = ce.extend(new ce.Event(), n, {
        type: e,
        isSimulated: !0
      });
      ce.event.trigger(r, null, t);
    }
  }), ce.fn.extend({
    trigger: function trigger(e, t) {
      return this.each(function () {
        ce.event.trigger(e, t, this);
      });
    },
    triggerHandler: function triggerHandler(e, t) {
      var n = this[0];
      if (n) return ce.event.trigger(e, t, n, !0);
    }
  });
  var yt,
    mt = /\[\]$/,
    bt = /\r?\n/g,
    xt = /^(?:submit|button|image|reset|file)$/i,
    wt = /^(?:input|select|textarea|keygen)/i;
  function Tt(n, e, r, i) {
    var t;
    if (Array.isArray(e)) ce.each(e, function (e, t) {
      r || mt.test(n) ? i(n, t) : Tt(n + "[" + ("object" == _typeof(t) && null != t ? e : "") + "]", t, r, i);
    });else if (r || "object" !== x(e)) i(n, e);else for (t in e) Tt(n + "[" + t + "]", e[t], r, i);
  }
  ce.param = function (e, t) {
    var n,
      r = [],
      i = function i(e, t) {
        var n = v(t) ? t() : t;
        r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n);
      };
    if (null == e) return "";
    if (Array.isArray(e) || e.jquery && !ce.isPlainObject(e)) ce.each(e, function () {
      i(this.name, this.value);
    });else for (n in e) Tt(n, e[n], t, i);
    return r.join("&");
  }, ce.fn.extend({
    serialize: function serialize() {
      return ce.param(this.serializeArray());
    },
    serializeArray: function serializeArray() {
      return this.map(function () {
        var e = ce.prop(this, "elements");
        return e ? ce.makeArray(e) : this;
      }).filter(function () {
        var e = this.type;
        return this.name && !ce(this).is(":disabled") && wt.test(this.nodeName) && !xt.test(e) && (this.checked || !xe.test(e));
      }).map(function (e, t) {
        var n = ce(this).val();
        return null == n ? null : Array.isArray(n) ? ce.map(n, function (e) {
          return {
            name: t.name,
            value: e.replace(bt, "\r\n")
          };
        }) : {
          name: t.name,
          value: n.replace(bt, "\r\n")
        };
      }).get();
    }
  }), ce.fn.extend({
    wrapAll: function wrapAll(e) {
      var t;
      return this[0] && (v(e) && (e = e.call(this[0])), t = ce(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function () {
        var e = this;
        while (e.firstElementChild) e = e.firstElementChild;
        return e;
      }).append(this)), this;
    },
    wrapInner: function wrapInner(n) {
      return v(n) ? this.each(function (e) {
        ce(this).wrapInner(n.call(this, e));
      }) : this.each(function () {
        var e = ce(this),
          t = e.contents();
        t.length ? t.wrapAll(n) : e.append(n);
      });
    },
    wrap: function wrap(t) {
      var n = v(t);
      return this.each(function (e) {
        ce(this).wrapAll(n ? t.call(this, e) : t);
      });
    },
    unwrap: function unwrap(e) {
      return this.parent(e).not("body").each(function () {
        ce(this).replaceWith(this.childNodes);
      }), this;
    }
  }), ce.expr.pseudos.hidden = function (e) {
    return !ce.expr.pseudos.visible(e);
  }, ce.expr.pseudos.visible = function (e) {
    return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
  }, le.createHTMLDocument = ((yt = m.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === yt.childNodes.length), ce.parseHTML = function (e, t, n) {
    return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (le.createHTMLDocument ? ((r = (t = m.implementation.createHTMLDocument("")).createElement("base")).href = m.location.href, t.head.appendChild(r)) : t = m), o = !n && [], (i = T.exec(e)) ? [t.createElement(i[1])] : (i = Ae([e], t, o), o && o.length && ce(o).remove(), ce.merge([], i.childNodes)));
    var r, i, o;
  }, ce.offset = {
    setOffset: function setOffset(e, t, n) {
      var r,
        i,
        o,
        a,
        s,
        u,
        l = ce.css(e, "position"),
        c = ce(e),
        f = {};
      "static" === l && (e.style.position = "relative"), s = c.offset(), o = ce.css(e, "top"), u = ce.css(e, "left"), ("absolute" === l || "fixed" === l) && -1 < (o + u).indexOf("auto") ? (a = (r = c.position()).top, i = r.left) : (a = parseFloat(o) || 0, i = parseFloat(u) || 0), v(t) && (t = t.call(e, n, ce.extend({}, s))), null != t.top && (f.top = t.top - s.top + a), null != t.left && (f.left = t.left - s.left + i), "using" in t ? t.using.call(e, f) : c.css(f);
    }
  }, ce.fn.extend({
    offset: function offset(t) {
      if (arguments.length) return void 0 === t ? this : this.each(function (e) {
        ce.offset.setOffset(this, t, e);
      });
      var e,
        n,
        r = this[0];
      return r ? r.getClientRects().length ? (e = r.getBoundingClientRect(), n = r.ownerDocument.defaultView, {
        top: e.top + n.pageYOffset,
        left: e.left + n.pageXOffset
      }) : {
        top: 0,
        left: 0
      } : void 0;
    },
    position: function position() {
      if (this[0]) {
        var e,
          t,
          n,
          r = this[0],
          i = {
            top: 0,
            left: 0
          };
        if ("fixed" === ce.css(r, "position")) t = r.getBoundingClientRect();else {
          t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement;
          while (e && (e === n.body || e === n.documentElement) && "static" === ce.css(e, "position")) e = e.parentNode;
          e && e !== r && 1 === e.nodeType && ((i = ce(e).offset()).top += ce.css(e, "borderTopWidth", !0), i.left += ce.css(e, "borderLeftWidth", !0));
        }
        return {
          top: t.top - i.top - ce.css(r, "marginTop", !0),
          left: t.left - i.left - ce.css(r, "marginLeft", !0)
        };
      }
    },
    offsetParent: function offsetParent() {
      return this.map(function () {
        var e = this.offsetParent;
        while (e && "static" === ce.css(e, "position")) e = e.offsetParent;
        return e || K;
      });
    }
  }), ce.each({
    scrollLeft: "pageXOffset",
    scrollTop: "pageYOffset"
  }, function (t, i) {
    var o = "pageYOffset" === i;
    ce.fn[t] = function (e) {
      return R(this, function (e, t, n) {
        var r;
        if (y(e) ? r = e : 9 === e.nodeType && (r = e.defaultView), void 0 === n) return r ? r[i] : e[t];
        r ? r.scrollTo(o ? r.pageXOffset : n, o ? n : r.pageYOffset) : e[t] = n;
      }, t, e, arguments.length);
    };
  }), ce.each(["top", "left"], function (e, n) {
    ce.cssHooks[n] = Qe(le.pixelPosition, function (e, t) {
      if (t) return t = Ve(e, n), $e.test(t) ? ce(e).position()[n] + "px" : t;
    });
  }), ce.each({
    Height: "height",
    Width: "width"
  }, function (a, s) {
    ce.each({
      padding: "inner" + a,
      content: s,
      "": "outer" + a
    }, function (r, o) {
      ce.fn[o] = function (e, t) {
        var n = arguments.length && (r || "boolean" != typeof e),
          i = r || (!0 === e || !0 === t ? "margin" : "border");
        return R(this, function (e, t, n) {
          var r;
          return y(e) ? 0 === o.indexOf("outer") ? e["inner" + a] : e.document.documentElement["client" + a] : 9 === e.nodeType ? (r = e.documentElement, Math.max(e.body["scroll" + a], r["scroll" + a], e.body["offset" + a], r["offset" + a], r["client" + a])) : void 0 === n ? ce.css(e, t, i) : ce.style(e, t, n, i);
        }, s, n ? e : void 0, n);
      };
    });
  }), ce.fn.extend({
    bind: function bind(e, t, n) {
      return this.on(e, null, t, n);
    },
    unbind: function unbind(e, t) {
      return this.off(e, null, t);
    },
    delegate: function delegate(e, t, n, r) {
      return this.on(t, e, n, r);
    },
    undelegate: function undelegate(e, t, n) {
      return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
    },
    hover: function hover(e, t) {
      return this.mouseenter(e).mouseleave(t || e);
    }
  }), ce.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, n) {
    ce.fn[n] = function (e, t) {
      return 0 < arguments.length ? this.on(n, null, e, t) : this.trigger(n);
    };
  });
  var Ct = /^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;
  ce.proxy = function (e, t) {
    var n, r, i;
    if ("string" == typeof t && (n = e[t], t = e, e = n), v(e)) return r = ae.call(arguments, 2), (i = function i() {
      return e.apply(t || this, r.concat(ae.call(arguments)));
    }).guid = e.guid = e.guid || ce.guid++, i;
  }, ce.holdReady = function (e) {
    e ? ce.readyWait++ : ce.ready(!0);
  }, ce.isArray = Array.isArray, ce.parseJSON = JSON.parse, ce.nodeName = fe, ce.isFunction = v, ce.isWindow = y, ce.camelCase = B, ce.type = x, ce.now = Date.now, ce.isNumeric = function (e) {
    var t = ce.type(e);
    return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
  }, ce.trim = function (e) {
    return null == e ? "" : (e + "").replace(Ct, "$1");
  },  true && !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
    return ce;
  }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  var Et = ie.jQuery,
    kt = ie.$;
  return ce.noConflict = function (e) {
    return ie.$ === ce && (ie.$ = kt), e && ie.jQuery === ce && (ie.jQuery = Et), ce;
  }, "undefined" == typeof e && (ie.jQuery = ie.$ = ce), ce;
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
var g;

// This works in non-strict mode
g = function () {
  return this;
}();
try {
  // This works if eval is allowed (see CSP)
  g = g || new Function("return this")();
} catch (e) {
  // This works if the window reference is available
  if ((typeof window === "undefined" ? "undefined" : _typeof(window)) === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;

/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function (module) {
  if (!module.webpackPolyfill) {
    module.deprecate = function () {};
    module.paths = [];
    // module.parent = undefined by default
    if (!module.children) module.children = [];
    Object.defineProperty(module, "loaded", {
      enumerable: true,
      get: function get() {
        return module.l;
      }
    });
    Object.defineProperty(module, "id", {
      enumerable: true,
      get: function get() {
        return module.i;
      }
    });
    module.webpackPolyfill = 1;
  }
  return module;
};

/***/ }),

/***/ "./src/vendor.js":
/*!***********************!*\
  !*** ./src/vendor.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module '../scss/custom-bootstrap.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()));
__webpack_require__(/*! ../node_modules/jquery/dist/jquery.slim.min */ "./node_modules/jquery/dist/jquery.slim.min.js");
__webpack_require__(/*! ../node_modules/@popperjs/core/dist/umd/popper.min */ "./node_modules/@popperjs/core/dist/umd/popper.min.js");
__webpack_require__(/*! ../node_modules/bootstrap/dist/js/bootstrap.bundle.min */ "./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js");

/***/ })

/******/ });
//# sourceMappingURL=vendor.js.map