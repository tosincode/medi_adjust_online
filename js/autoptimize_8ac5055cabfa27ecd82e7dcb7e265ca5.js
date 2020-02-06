/*! jQuery Migrate v1.4.1 | (c) jQuery Foundation and other contributors | jquery.org/license */
"undefined" == typeof jQuery.migrateMute && (jQuery.migrateMute = !0),
    function(a, b, c) {
        function d(c) {
            var d = b.console;
            f[c] || (f[c] = !0, a.migrateWarnings.push(c), d && d.warn && !a.migrateMute && (d.warn("JQMIGRATE: " + c), a.migrateTrace && d.trace && d.trace()))
        }

        function e(b, c, e, f) {
            if (Object.defineProperty) try {
                return void Object.defineProperty(b, c, {
                    configurable: !0,
                    enumerable: !0,
                    get: function() {
                        return d(f), e
                    },
                    set: function(a) {
                        d(f), e = a
                    }
                })
            } catch (g) {}
            a._definePropertyBroken = !0, b[c] = e
        }
        a.migrateVersion = "1.4.1";
        var f = {};
        a.migrateWarnings = [], b.console && b.console.log && b.console.log("JQMIGRATE: Migrate is installed" + (a.migrateMute ? "" : " with logging active") + ", version " + a.migrateVersion), a.migrateTrace === c && (a.migrateTrace = !0), a.migrateReset = function() {
            f = {}, a.migrateWarnings.length = 0
        }, "BackCompat" === document.compatMode && d("jQuery is not compatible with Quirks Mode");
        var g = a("<input/>", {
                size: 1
            }).attr("size") && a.attrFn,
            h = a.attr,
            i = a.attrHooks.value && a.attrHooks.value.get || function() {
                return null
            },
            j = a.attrHooks.value && a.attrHooks.value.set || function() {
                return c
            },
            k = /^(?:input|button)$/i,
            l = /^[238]$/,
            m = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
            n = /^(?:checked|selected)$/i;
        e(a, "attrFn", g || {}, "jQuery.attrFn is deprecated"), a.attr = function(b, e, f, i) {
            var j = e.toLowerCase(),
                o = b && b.nodeType;
            return i && (h.length < 4 && d("jQuery.fn.attr( props, pass ) is deprecated"), b && !l.test(o) && (g ? e in g : a.isFunction(a.fn[e]))) ? a(b)[e](f) : ("type" === e && f !== c && k.test(b.nodeName) && b.parentNode && d("Can't change the 'type' of an input or button in IE 6/7/8"), !a.attrHooks[j] && m.test(j) && (a.attrHooks[j] = {
                get: function(b, d) {
                    var e, f = a.prop(b, d);
                    return f === !0 || "boolean" != typeof f && (e = b.getAttributeNode(d)) && e.nodeValue !== !1 ? d.toLowerCase() : c
                },
                set: function(b, c, d) {
                    var e;
                    return c === !1 ? a.removeAttr(b, d) : (e = a.propFix[d] || d, e in b && (b[e] = !0), b.setAttribute(d, d.toLowerCase())), d
                }
            }, n.test(j) && d("jQuery.fn.attr('" + j + "') might use property instead of attribute")), h.call(a, b, e, f))
        }, a.attrHooks.value = {
            get: function(a, b) {
                var c = (a.nodeName || "").toLowerCase();
                return "button" === c ? i.apply(this, arguments) : ("input" !== c && "option" !== c && d("jQuery.fn.attr('value') no longer gets properties"), b in a ? a.value : null)
            },
            set: function(a, b) {
                var c = (a.nodeName || "").toLowerCase();
                return "button" === c ? j.apply(this, arguments) : ("input" !== c && "option" !== c && d("jQuery.fn.attr('value', val) no longer sets properties"), void(a.value = b))
            }
        };
        var o, p, q = a.fn.init,
            r = a.find,
            s = a.parseJSON,
            t = /^\s*</,
            u = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/,
            v = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/g,
            w = /^([^<]*)(<[\w\W]+>)([^>]*)$/;
        a.fn.init = function(b, e, f) {
            var g, h;
            return b && "string" == typeof b && !a.isPlainObject(e) && (g = w.exec(a.trim(b))) && g[0] && (t.test(b) || d("$(html) HTML strings must start with '<' character"), g[3] && d("$(html) HTML text after last tag is ignored"), "#" === g[0].charAt(0) && (d("HTML string cannot start with a '#' character"), a.error("JQMIGRATE: Invalid selector string (XSS)")), e && e.context && e.context.nodeType && (e = e.context), a.parseHTML) ? q.call(this, a.parseHTML(g[2], e && e.ownerDocument || e || document, !0), e, f) : (h = q.apply(this, arguments), b && b.selector !== c ? (h.selector = b.selector, h.context = b.context) : (h.selector = "string" == typeof b ? b : "", b && (h.context = b.nodeType ? b : e || document)), h)
        }, a.fn.init.prototype = a.fn, a.find = function(a) {
            var b = Array.prototype.slice.call(arguments);
            if ("string" == typeof a && u.test(a)) try {
                document.querySelector(a)
            } catch (c) {
                a = a.replace(v, function(a, b, c, d) {
                    return "[" + b + c + '"' + d + '"]'
                });
                try {
                    document.querySelector(a), d("Attribute selector with '#' must be quoted: " + b[0]), b[0] = a
                } catch (e) {
                    d("Attribute selector with '#' was not fixed: " + b[0])
                }
            }
            return r.apply(this, b)
        };
        var x;
        for (x in r) Object.prototype.hasOwnProperty.call(r, x) && (a.find[x] = r[x]);
        a.parseJSON = function(a) {
            return a ? s.apply(this, arguments) : (d("jQuery.parseJSON requires a valid JSON string"), null)
        }, a.uaMatch = function(a) {
            a = a.toLowerCase();
            var b = /(chrome)[ \/]([\w.]+)/.exec(a) || /(webkit)[ \/]([\w.]+)/.exec(a) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(a) || /(msie) ([\w.]+)/.exec(a) || a.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(a) || [];
            return {
                browser: b[1] || "",
                version: b[2] || "0"
            }
        }, a.browser || (o = a.uaMatch(navigator.userAgent), p = {}, o.browser && (p[o.browser] = !0, p.version = o.version), p.chrome ? p.webkit = !0 : p.webkit && (p.safari = !0), a.browser = p), e(a, "browser", a.browser, "jQuery.browser is deprecated"), a.boxModel = a.support.boxModel = "CSS1Compat" === document.compatMode, e(a, "boxModel", a.boxModel, "jQuery.boxModel is deprecated"), e(a.support, "boxModel", a.support.boxModel, "jQuery.support.boxModel is deprecated"), a.sub = function() {
            function b(a, c) {
                return new b.fn.init(a, c)
            }
            a.extend(!0, b, this), b.superclass = this, b.fn = b.prototype = this(), b.fn.constructor = b, b.sub = this.sub, b.fn.init = function(d, e) {
                var f = a.fn.init.call(this, d, e, c);
                return f instanceof b ? f : b(f)
            }, b.fn.init.prototype = b.fn;
            var c = b(document);
            return d("jQuery.sub() is deprecated"), b
        }, a.fn.size = function() {
            return d("jQuery.fn.size() is deprecated; use the .length property"), this.length
        };
        var y = !1;
        a.swap && a.each(["height", "width", "reliableMarginRight"], function(b, c) {
            var d = a.cssHooks[c] && a.cssHooks[c].get;
            d && (a.cssHooks[c].get = function() {
                var a;
                return y = !0, a = d.apply(this, arguments), y = !1, a
            })
        }), a.swap = function(a, b, c, e) {
            var f, g, h = {};
            y || d("jQuery.swap() is undocumented and deprecated");
            for (g in b) h[g] = a.style[g], a.style[g] = b[g];
            f = c.apply(a, e || []);
            for (g in b) a.style[g] = h[g];
            return f
        }, a.ajaxSetup({
            converters: {
                "text json": a.parseJSON
            }
        });
        var z = a.fn.data;
        a.fn.data = function(b) {
            var e, f, g = this[0];
            return !g || "events" !== b || 1 !== arguments.length || (e = a.data(g, b), f = a._data(g, b), e !== c && e !== f || f === c) ? z.apply(this, arguments) : (d("Use of jQuery.fn.data('events') is deprecated"), f)
        };
        var A = /\/(java|ecma)script/i;
        a.clean || (a.clean = function(b, c, e, f) {
            c = c || document, c = !c.nodeType && c[0] || c, c = c.ownerDocument || c, d("jQuery.clean() is deprecated");
            var g, h, i, j, k = [];
            if (a.merge(k, a.buildFragment(b, c).childNodes), e)
                for (i = function(a) {
                        return !a.type || A.test(a.type) ? f ? f.push(a.parentNode ? a.parentNode.removeChild(a) : a) : e.appendChild(a) : void 0
                    }, g = 0; null != (h = k[g]); g++) a.nodeName(h, "script") && i(h) || (e.appendChild(h), "undefined" != typeof h.getElementsByTagName && (j = a.grep(a.merge([], h.getElementsByTagName("script")), i), k.splice.apply(k, [g + 1, 0].concat(j)), g += j.length));
            return k
        });
        var B = a.event.add,
            C = a.event.remove,
            D = a.event.trigger,
            E = a.fn.toggle,
            F = a.fn.live,
            G = a.fn.die,
            H = a.fn.load,
            I = "ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",
            J = new RegExp("\\b(?:" + I + ")\\b"),
            K = /(?:^|\s)hover(\.\S+|)\b/,
            L = function(b) {
                return "string" != typeof b || a.event.special.hover ? b : (K.test(b) && d("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'"), b && b.replace(K, "mouseenter$1 mouseleave$1"))
            };
        a.event.props && "attrChange" !== a.event.props[0] && a.event.props.unshift("attrChange", "attrName", "relatedNode", "srcElement"), a.event.dispatch && e(a.event, "handle", a.event.dispatch, "jQuery.event.handle is undocumented and deprecated"), a.event.add = function(a, b, c, e, f) {
            a !== document && J.test(b) && d("AJAX events should be attached to document: " + b), B.call(this, a, L(b || ""), c, e, f)
        }, a.event.remove = function(a, b, c, d, e) {
            C.call(this, a, L(b) || "", c, d, e)
        }, a.each(["load", "unload", "error"], function(b, c) {
            a.fn[c] = function() {
                var a = Array.prototype.slice.call(arguments, 0);
                return "load" === c && "string" == typeof a[0] ? H.apply(this, a) : (d("jQuery.fn." + c + "() is deprecated"), a.splice(0, 0, c), arguments.length ? this.bind.apply(this, a) : (this.triggerHandler.apply(this, a), this))
            }
        }), a.fn.toggle = function(b, c) {
            if (!a.isFunction(b) || !a.isFunction(c)) return E.apply(this, arguments);
            d("jQuery.fn.toggle(handler, handler...) is deprecated");
            var e = arguments,
                f = b.guid || a.guid++,
                g = 0,
                h = function(c) {
                    var d = (a._data(this, "lastToggle" + b.guid) || 0) % g;
                    return a._data(this, "lastToggle" + b.guid, d + 1), c.preventDefault(), e[d].apply(this, arguments) || !1
                };
            for (h.guid = f; g < e.length;) e[g++].guid = f;
            return this.click(h)
        }, a.fn.live = function(b, c, e) {
            return d("jQuery.fn.live() is deprecated"), F ? F.apply(this, arguments) : (a(this.context).on(b, this.selector, c, e), this)
        }, a.fn.die = function(b, c) {
            return d("jQuery.fn.die() is deprecated"), G ? G.apply(this, arguments) : (a(this.context).off(b, this.selector || "**", c), this)
        }, a.event.trigger = function(a, b, c, e) {
            return c || J.test(a) || d("Global events are undocumented and deprecated"), D.call(this, a, b, c || document, e)
        }, a.each(I.split("|"), function(b, c) {
            a.event.special[c] = {
                setup: function() {
                    var b = this;
                    return b !== document && (a.event.add(document, c + "." + a.guid, function() {
                        a.event.trigger(c, Array.prototype.slice.call(arguments, 1), b, !0)
                    }), a._data(this, c, a.guid++)), !1
                },
                teardown: function() {
                    return this !== document && a.event.remove(document, c + "." + a._data(this, c)), !1
                }
            }
        }), a.event.special.ready = {
            setup: function() {
                this === document && d("'ready' event is deprecated")
            }
        };
        var M = a.fn.andSelf || a.fn.addBack,
            N = a.fn.find;
        if (a.fn.andSelf = function() {
                return d("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"), M.apply(this, arguments)
            }, a.fn.find = function(a) {
                var b = N.apply(this, arguments);
                return b.context = this.context, b.selector = this.selector ? this.selector + " " + a : a, b
            }, a.Callbacks) {
            var O = a.Deferred,
                P = [
                    ["resolve", "done", a.Callbacks("once memory"), a.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", a.Callbacks("once memory"), a.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", a.Callbacks("memory"), a.Callbacks("memory")]
                ];
            a.Deferred = function(b) {
                var c = O(),
                    e = c.promise();
                return c.pipe = e.pipe = function() {
                    var b = arguments;
                    return d("deferred.pipe() is deprecated"), a.Deferred(function(d) {
                        a.each(P, function(f, g) {
                            var h = a.isFunction(b[f]) && b[f];
                            c[g[1]](function() {
                                var b = h && h.apply(this, arguments);
                                b && a.isFunction(b.promise) ? b.promise().done(d.resolve).fail(d.reject).progress(d.notify) : d[g[0] + "With"](this === e ? d.promise() : this, h ? [b] : arguments)
                            })
                        }), b = null
                    }).promise()
                }, c.isResolved = function() {
                    return d("deferred.isResolved is deprecated"), "resolved" === c.state()
                }, c.isRejected = function() {
                    return d("deferred.isRejected is deprecated"), "rejected" === c.state()
                }, b && b.call(c, c), c
            }
        }
    }(jQuery, window);
! function(a) {
    a.fn.hoverIntent = function(b, c, d) {
        var e = {
            interval: 100,
            sensitivity: 6,
            timeout: 0
        };
        e = "object" == typeof b ? a.extend(e, b) : a.isFunction(c) ? a.extend(e, {
            over: b,
            out: c,
            selector: d
        }) : a.extend(e, {
            over: b,
            out: b,
            selector: c
        });
        var f, g, h, i, j = function(a) {
                f = a.pageX, g = a.pageY
            },
            k = function(b, c) {
                return c.hoverIntent_t = clearTimeout(c.hoverIntent_t), Math.sqrt((h - f) * (h - f) + (i - g) * (i - g)) < e.sensitivity ? (a(c).off("mousemove.hoverIntent", j), c.hoverIntent_s = !0, e.over.apply(c, [b])) : (h = f, i = g, c.hoverIntent_t = setTimeout(function() {
                    k(b, c)
                }, e.interval), void 0)
            },
            l = function(a, b) {
                return b.hoverIntent_t = clearTimeout(b.hoverIntent_t), b.hoverIntent_s = !1, e.out.apply(b, [a])
            },
            m = function(b) {
                var c = a.extend({}, b),
                    d = this;
                d.hoverIntent_t && (d.hoverIntent_t = clearTimeout(d.hoverIntent_t)), "mouseenter" === b.type ? (h = c.pageX, i = c.pageY, a(d).on("mousemove.hoverIntent", j), d.hoverIntent_s || (d.hoverIntent_t = setTimeout(function() {
                    k(c, d)
                }, e.interval))) : (a(d).off("mousemove.hoverIntent", j), d.hoverIntent_s && (d.hoverIntent_t = setTimeout(function() {
                    l(c, d)
                }, e.timeout)))
            };
        return this.on({
            "mouseenter.hoverIntent": m,
            "mouseleave.hoverIntent": m
        }, e.selector)
    }
}(jQuery);;
/*!
 * FitVids 1.1
 *
 * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 *
 */
(function($) {
    'use strict';
    $.fn.fitVids = function(options) {
        var settings = {
            customSelector: null,
            ignore: null
        };
        if (!document.getElementById('fit-vids-style')) {
            var head = document.head || document.getElementsByTagName('head')[0];
            var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
            var div = document.createElement("div");
            div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
            head.appendChild(div.childNodes[1]);
        }
        if (options) {
            $.extend(settings, options);
        }
        return this.each(function() {
            var selectors = ['iframe[src*="player.vimeo.com"]', 'iframe[src*="youtube.com"]', 'iframe[src*="youtube-nocookie.com"]', 'iframe[src*="kickstarter.com"][src*="video.html"]', 'object', 'embed'];
            if (settings.customSelector) {
                selectors.push(settings.customSelector);
            }
            var ignoreList = '.fitvidsignore';
            if (settings.ignore) {
                ignoreList = ignoreList + ', ' + settings.ignore;
            }
            var $allVideos = $(this).find(selectors.join(','));
            $allVideos = $allVideos.not('object object');
            $allVideos = $allVideos.not(ignoreList);
            $allVideos.each(function() {
                var $this = $(this);
                if ($this.parents(ignoreList).length > 0) {
                    return;
                }
                if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) {
                    return;
                }
                if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width')))) {
                    $this.attr('height', 9);
                    $this.attr('width', 16);
                }
                var height = (this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10)))) ? parseInt($this.attr('height'), 10) : $this.height(),
                    width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
                    aspectRatio = height / width;
                if (!$this.attr('id')) {
                    var videoID = 'fitvid' + Math.floor(Math.random() * 999999);
                    $this.attr('id', videoID);
                }
                $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100) + '%');
                $this.removeAttr('height').removeAttr('width');
            });
        });
    };
})(window.jQuery || window.Zepto);

! function(a) {
    a.flexslider = function(b, c) {
        var d = a(b);
        d.vars = a.extend({}, a.flexslider.defaults, c);
        var j, e = d.vars.namespace,
            f = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
            g = ("ontouchstart" in window || f || window.DocumentTouch && document instanceof DocumentTouch) && d.vars.touch,
            h = "click touchend MSPointerUp",
            i = "",
            k = "vertical" === d.vars.direction,
            l = d.vars.reverse,
            m = d.vars.itemWidth > 0,
            n = "fade" === d.vars.animation,
            o = "" !== d.vars.asNavFor,
            p = {},
            q = !0;
        a.data(b, "flexslider", d), p = {
            init: function() {
                d.animating = !1, d.currentSlide = parseInt(d.vars.startAt ? d.vars.startAt : 0, 10), isNaN(d.currentSlide) && (d.currentSlide = 0), d.animatingTo = d.currentSlide, d.atEnd = 0 === d.currentSlide || d.currentSlide === d.last, d.containerSelector = d.vars.selector.substr(0, d.vars.selector.search(" ")), d.slides = a(d.vars.selector, d), d.container = a(d.containerSelector, d), d.count = d.slides.length, d.syncExists = a(d.vars.sync).length > 0, "slide" === d.vars.animation && (d.vars.animation = "swing"), d.prop = k ? "top" : "marginLeft", d.args = {}, d.manualPause = !1, d.stopped = !1, d.started = !1, d.startTimeout = null, d.transitions = !d.vars.video && !n && d.vars.useCSS && function() {
                    var a = document.createElement("div"),
                        b = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
                    for (var c in b)
                        if (void 0 !== a.style[b[c]]) return d.pfx = b[c].replace("Perspective", "").toLowerCase(), d.prop = "-" + d.pfx + "-transform", !0;
                    return !1
                }(), d.ensureAnimationEnd = "", "" !== d.vars.controlsContainer && (d.controlsContainer = a(d.vars.controlsContainer).length > 0 && a(d.vars.controlsContainer)), "" !== d.vars.manualControls && (d.manualControls = a(d.vars.manualControls).length > 0 && a(d.vars.manualControls)), d.vars.randomize && (d.slides.sort(function() {
                    return Math.round(Math.random()) - .5
                }), d.container.empty().append(d.slides)), d.doMath(), d.setup("init"), d.vars.controlNav && p.controlNav.setup(), d.vars.directionNav && p.directionNav.setup(), d.vars.keyboard && (1 === a(d.containerSelector).length || d.vars.multipleKeyboard) && a(document).bind("keyup", function(a) {
                    var b = a.keyCode;
                    if (!d.animating && (39 === b || 37 === b)) {
                        var c = 39 === b ? d.getTarget("next") : 37 === b ? d.getTarget("prev") : !1;
                        d.flexAnimate(c, d.vars.pauseOnAction)
                    }
                }), d.vars.mousewheel && d.bind("mousewheel", function(a, b) {
                    a.preventDefault();
                    var f = 0 > b ? d.getTarget("next") : d.getTarget("prev");
                    d.flexAnimate(f, d.vars.pauseOnAction)
                }), d.vars.pausePlay && p.pausePlay.setup(), d.vars.slideshow && d.vars.pauseInvisible && p.pauseInvisible.init(), d.vars.slideshow && (d.vars.pauseOnHover && d.hover(function() {
                    d.manualPlay || d.manualPause || d.pause()
                }, function() {
                    d.manualPause || d.manualPlay || d.stopped || d.play()
                }), d.vars.pauseInvisible && p.pauseInvisible.isHidden() || (d.vars.initDelay > 0 ? d.startTimeout = setTimeout(d.play, d.vars.initDelay) : d.play())), o && p.asNav.setup(), g && d.vars.touch && p.touch(), (!n || n && d.vars.smoothHeight) && a(window).bind("resize orientationchange focus", p.resize), d.find("img").attr("draggable", "false"), setTimeout(function() {
                    d.vars.start(d)
                }, 200)
            },
            asNav: {
                setup: function() {
                    d.asNav = !0, d.animatingTo = Math.floor(d.currentSlide / d.move), d.currentItem = d.currentSlide, d.slides.removeClass(e + "active-slide").eq(d.currentItem).addClass(e + "active-slide"), f ? (b._slider = d, d.slides.each(function() {
                        var b = this;
                        b._gesture = new MSGesture, b._gesture.target = b, b.addEventListener("MSPointerDown", function(a) {
                            a.preventDefault(), a.currentTarget._gesture && a.currentTarget._gesture.addPointer(a.pointerId)
                        }, !1), b.addEventListener("MSGestureTap", function(b) {
                            b.preventDefault();
                            var c = a(this),
                                e = c.index();
                            a(d.vars.asNavFor).data("flexslider").animating || c.hasClass("active") || (d.direction = d.currentItem < e ? "next" : "prev", d.flexAnimate(e, d.vars.pauseOnAction, !1, !0, !0))
                        })
                    })) : d.slides.on(h, function(b) {
                        b.preventDefault();
                        var c = a(this),
                            f = c.index(),
                            g = c.offset().left - a(d).scrollLeft();
                        0 >= g && c.hasClass(e + "active-slide") ? d.flexAnimate(d.getTarget("prev"), !0) : a(d.vars.asNavFor).data("flexslider").animating || c.hasClass(e + "active-slide") || (d.direction = d.currentItem < f ? "next" : "prev", d.flexAnimate(f, d.vars.pauseOnAction, !1, !0, !0))
                    })
                }
            },
            controlNav: {
                setup: function() {
                    d.manualControls ? p.controlNav.setupManual() : p.controlNav.setupPaging()
                },
                setupPaging: function() {
                    var f, g, b = "thumbnails" === d.vars.controlNav ? "control-thumbs" : "control-paging",
                        c = 1;
                    if (d.controlNavScaffold = a('<ol class="' + e + "control-nav " + e + b + '"></ol>'), d.pagingCount > 1)
                        for (var j = 0; j < d.pagingCount; j++) {
                            if (g = d.slides.eq(j), f = "thumbnails" === d.vars.controlNav ? '<img src="' + g.attr("data-thumb") + '"/>' : "<a>" + c + "</a>", "thumbnails" === d.vars.controlNav && !0 === d.vars.thumbCaptions) {
                                var k = g.attr("data-thumbcaption");
                                "" != k && void 0 != k && (f += '<span class="' + e + 'caption">' + k + "</span>")
                            }
                            d.controlNavScaffold.append("<li>" + f + "</li>"), c++
                        }
                    d.controlsContainer ? a(d.controlsContainer).append(d.controlNavScaffold) : d.append(d.controlNavScaffold), p.controlNav.set(), p.controlNav.active(), d.controlNavScaffold.delegate("a, img", h, function(b) {
                        if (b.preventDefault(), "" === i || i === b.type) {
                            var c = a(this),
                                f = d.controlNav.index(c);
                            c.hasClass(e + "active") || (d.direction = f > d.currentSlide ? "next" : "prev", d.flexAnimate(f, d.vars.pauseOnAction))
                        }
                        "" === i && (i = b.type), p.setToClearWatchedEvent()
                    })
                },
                setupManual: function() {
                    d.controlNav = d.manualControls, p.controlNav.active(), d.controlNav.bind(h, function(b) {
                        if (b.preventDefault(), "" === i || i === b.type) {
                            var c = a(this),
                                f = d.controlNav.index(c);
                            c.hasClass(e + "active") || (d.direction = f > d.currentSlide ? "next" : "prev", d.flexAnimate(f, d.vars.pauseOnAction))
                        }
                        "" === i && (i = b.type), p.setToClearWatchedEvent()
                    })
                },
                set: function() {
                    var b = "thumbnails" === d.vars.controlNav ? "img" : "a";
                    d.controlNav = a("." + e + "control-nav li " + b, d.controlsContainer ? d.controlsContainer : d)
                },
                active: function() {
                    d.controlNav.removeClass(e + "active").eq(d.animatingTo).addClass(e + "active")
                },
                update: function(b, c) {
                    d.pagingCount > 1 && "add" === b ? d.controlNavScaffold.append(a("<li><a>" + d.count + "</a></li>")) : 1 === d.pagingCount ? d.controlNavScaffold.find("li").remove() : d.controlNav.eq(c).closest("li").remove(), p.controlNav.set(), d.pagingCount > 1 && d.pagingCount !== d.controlNav.length ? d.update(c, b) : p.controlNav.active()
                }
            },
            directionNav: {
                setup: function() {
                    var b = a('<ul class="' + e + 'direction-nav"><li><a class="' + e + 'prev" href="#">' + d.vars.prevText + '</a></li><li><a class="' + e + 'next" href="#">' + d.vars.nextText + "</a></li></ul>");
                    d.controlsContainer ? (a(d.controlsContainer).append(b), d.directionNav = a("." + e + "direction-nav li a", d.controlsContainer)) : (d.append(b), d.directionNav = a("." + e + "direction-nav li a", d)), p.directionNav.update(), d.directionNav.bind(h, function(b) {
                        b.preventDefault();
                        var c;
                        ("" === i || i === b.type) && (c = a(this).hasClass(e + "next") ? d.getTarget("next") : d.getTarget("prev"), d.flexAnimate(c, d.vars.pauseOnAction)), "" === i && (i = b.type), p.setToClearWatchedEvent()
                    })
                },
                update: function() {
                    var a = e + "disabled";
                    1 === d.pagingCount ? d.directionNav.addClass(a).attr("tabindex", "-1") : d.vars.animationLoop ? d.directionNav.removeClass(a).removeAttr("tabindex") : 0 === d.animatingTo ? d.directionNav.removeClass(a).filter("." + e + "prev").addClass(a).attr("tabindex", "-1") : d.animatingTo === d.last ? d.directionNav.removeClass(a).filter("." + e + "next").addClass(a).attr("tabindex", "-1") : d.directionNav.removeClass(a).removeAttr("tabindex")
                }
            },
            pausePlay: {
                setup: function() {
                    var b = a('<div class="' + e + 'pauseplay"><a></a></div>');
                    d.controlsContainer ? (d.controlsContainer.append(b), d.pausePlay = a("." + e + "pauseplay a", d.controlsContainer)) : (d.append(b), d.pausePlay = a("." + e + "pauseplay a", d)), p.pausePlay.update(d.vars.slideshow ? e + "pause" : e + "play"), d.pausePlay.bind(h, function(b) {
                        b.preventDefault(), ("" === i || i === b.type) && (a(this).hasClass(e + "pause") ? (d.manualPause = !0, d.manualPlay = !1, d.pause()) : (d.manualPause = !1, d.manualPlay = !0, d.play())), "" === i && (i = b.type), p.setToClearWatchedEvent()
                    })
                },
                update: function(a) {
                    "play" === a ? d.pausePlay.removeClass(e + "pause").addClass(e + "play").html(d.vars.playText) : d.pausePlay.removeClass(e + "play").addClass(e + "pause").html(d.vars.pauseText)
                }
            },
            touch: function() {
                function r(f) {
                    d.animating ? f.preventDefault() : (window.navigator.msPointerEnabled || 1 === f.touches.length) && (d.pause(), g = k ? d.h : d.w, i = Number(new Date), o = f.touches[0].pageX, p = f.touches[0].pageY, e = m && l && d.animatingTo === d.last ? 0 : m && l ? d.limit - (d.itemW + d.vars.itemMargin) * d.move * d.animatingTo : m && d.currentSlide === d.last ? d.limit : m ? (d.itemW + d.vars.itemMargin) * d.move * d.currentSlide : l ? (d.last - d.currentSlide + d.cloneOffset) * g : (d.currentSlide + d.cloneOffset) * g, a = k ? p : o, c = k ? o : p, b.addEventListener("touchmove", s, !1), b.addEventListener("touchend", t, !1))
                }

                function s(b) {
                    o = b.touches[0].pageX, p = b.touches[0].pageY, h = k ? a - p : a - o, j = k ? Math.abs(h) < Math.abs(o - c) : Math.abs(h) < Math.abs(p - c);
                    var f = 500;
                    (!j || Number(new Date) - i > f) && (b.preventDefault(), !n && d.transitions && (d.vars.animationLoop || (h /= 0 === d.currentSlide && 0 > h || d.currentSlide === d.last && h > 0 ? Math.abs(h) / g + 2 : 1), d.setProps(e + h, "setTouch")))
                }

                function t() {
                    if (b.removeEventListener("touchmove", s, !1), d.animatingTo === d.currentSlide && !j && null !== h) {
                        var k = l ? -h : h,
                            m = k > 0 ? d.getTarget("next") : d.getTarget("prev");
                        d.canAdvance(m) && (Number(new Date) - i < 550 && Math.abs(k) > 50 || Math.abs(k) > g / 2) ? d.flexAnimate(m, d.vars.pauseOnAction) : n || d.flexAnimate(d.currentSlide, d.vars.pauseOnAction, !0)
                    }
                    b.removeEventListener("touchend", t, !1), a = null, c = null, h = null, e = null
                }

                function u(a) {
                    a.stopPropagation(), d.animating ? a.preventDefault() : (d.pause(), b._gesture.addPointer(a.pointerId), q = 0, g = k ? d.h : d.w, i = Number(new Date), e = m && l && d.animatingTo === d.last ? 0 : m && l ? d.limit - (d.itemW + d.vars.itemMargin) * d.move * d.animatingTo : m && d.currentSlide === d.last ? d.limit : m ? (d.itemW + d.vars.itemMargin) * d.move * d.currentSlide : l ? (d.last - d.currentSlide + d.cloneOffset) * g : (d.currentSlide + d.cloneOffset) * g)
                }

                function v(a) {
                    a.stopPropagation();
                    var c = a.target._slider;
                    if (c) {
                        var d = -a.translationX,
                            f = -a.translationY;
                        return q += k ? f : d, h = q, j = k ? Math.abs(q) < Math.abs(-d) : Math.abs(q) < Math.abs(-f), a.detail === a.MSGESTURE_FLAG_INERTIA ? (setImmediate(function() {
                            b._gesture.stop()
                        }), void 0) : ((!j || Number(new Date) - i > 500) && (a.preventDefault(), !n && c.transitions && (c.vars.animationLoop || (h = q / (0 === c.currentSlide && 0 > q || c.currentSlide === c.last && q > 0 ? Math.abs(q) / g + 2 : 1)), c.setProps(e + h, "setTouch"))), void 0)
                    }
                }

                function w(b) {
                    b.stopPropagation();
                    var d = b.target._slider;
                    if (d) {
                        if (d.animatingTo === d.currentSlide && !j && null !== h) {
                            var f = l ? -h : h,
                                k = f > 0 ? d.getTarget("next") : d.getTarget("prev");
                            d.canAdvance(k) && (Number(new Date) - i < 550 && Math.abs(f) > 50 || Math.abs(f) > g / 2) ? d.flexAnimate(k, d.vars.pauseOnAction) : n || d.flexAnimate(d.currentSlide, d.vars.pauseOnAction, !0)
                        }
                        a = null, c = null, h = null, e = null, q = 0
                    }
                }
                var a, c, e, g, h, i, j = !1,
                    o = 0,
                    p = 0,
                    q = 0;
                f ? (b.style.msTouchAction = "none", b._gesture = new MSGesture, b._gesture.target = b, b.addEventListener("MSPointerDown", u, !1), b._slider = d, b.addEventListener("MSGestureChange", v, !1), b.addEventListener("MSGestureEnd", w, !1)) : b.addEventListener("touchstart", r, !1)
            },
            resize: function() {
                !d.animating && d.is(":visible") && (m || d.doMath(), n ? p.smoothHeight() : m ? (d.slides.width(d.computedW), d.update(d.pagingCount), d.setProps()) : k ? (d.viewport.height(d.h), d.setProps(d.h, "setTotal")) : (d.vars.smoothHeight && p.smoothHeight(), d.newSlides.width(d.computedW), d.setProps(d.computedW, "setTotal")))
            },
            smoothHeight: function(a) {
                if (!k || n) {
                    var b = n ? d : d.viewport;
                    a ? b.animate({
                        height: d.slides.eq(d.animatingTo).height()
                    }, a) : b.height(d.slides.eq(d.animatingTo).height())
                }
            },
            sync: function(b) {
                var c = a(d.vars.sync).data("flexslider"),
                    e = d.animatingTo;
                switch (b) {
                    case "animate":
                        c.flexAnimate(e, d.vars.pauseOnAction, !1, !0);
                        break;
                    case "play":
                        c.playing || c.asNav || c.play();
                        break;
                    case "pause":
                        c.pause()
                }
            },
            uniqueID: function(b) {
                return b.find("[id]").each(function() {
                    var b = a(this);
                    b.attr("id", b.attr("id") + "_clone")
                }), b
            },
            pauseInvisible: {
                visProp: null,
                init: function() {
                    var a = ["webkit", "moz", "ms", "o"];
                    if ("hidden" in document) return "hidden";
                    for (var b = 0; b < a.length; b++) a[b] + "Hidden" in document && (p.pauseInvisible.visProp = a[b] + "Hidden");
                    if (p.pauseInvisible.visProp) {
                        var c = p.pauseInvisible.visProp.replace(/[H|h]idden/, "") + "visibilitychange";
                        document.addEventListener(c, function() {
                            p.pauseInvisible.isHidden() ? d.startTimeout ? clearTimeout(d.startTimeout) : d.pause() : d.started ? d.play() : d.vars.initDelay > 0 ? setTimeout(d.play, d.vars.initDelay) : d.play()
                        })
                    }
                },
                isHidden: function() {
                    return document[p.pauseInvisible.visProp] || !1
                }
            },
            setToClearWatchedEvent: function() {
                clearTimeout(j), j = setTimeout(function() {
                    i = ""
                }, 3e3)
            }
        }, d.flexAnimate = function(b, c, f, h, i) {
            if (d.vars.animationLoop || b === d.currentSlide || (d.direction = b > d.currentSlide ? "next" : "prev"), o && 1 === d.pagingCount && (d.direction = d.currentItem < b ? "next" : "prev"), !d.animating && (d.canAdvance(b, i) || f) && d.is(":visible")) {
                if (o && h) {
                    var j = a(d.vars.asNavFor).data("flexslider");
                    if (d.atEnd = 0 === b || b === d.count - 1, j.flexAnimate(b, !0, !1, !0, i), d.direction = d.currentItem < b ? "next" : "prev", j.direction = d.direction, Math.ceil((b + 1) / d.visible) - 1 === d.currentSlide || 0 === b) return d.currentItem = b, d.slides.removeClass(e + "active-slide").eq(b).addClass(e + "active-slide"), !1;
                    d.currentItem = b, d.slides.removeClass(e + "active-slide").eq(b).addClass(e + "active-slide"), b = Math.floor(b / d.visible)
                }
                if (d.animating = !0, d.animatingTo = b, c && d.pause(), d.vars.before(d), d.syncExists && !i && p.sync("animate"), d.vars.controlNav && p.controlNav.active(), m || d.slides.removeClass(e + "active-slide").eq(b).addClass(e + "active-slide"), d.atEnd = 0 === b || b === d.last, d.vars.directionNav && p.directionNav.update(), b === d.last && (d.vars.end(d), d.vars.animationLoop || d.pause()), n) g ? (d.slides.eq(d.currentSlide).css({
                    opacity: 0,
                    zIndex: 1
                }), d.slides.eq(b).css({
                    opacity: 1,
                    zIndex: 2
                }), d.wrapup(q)) : (d.slides.eq(d.currentSlide).css({
                    zIndex: 1
                }).animate({
                    opacity: 0
                }, d.vars.animationSpeed, d.vars.easing), d.slides.eq(b).css({
                    zIndex: 2
                }).animate({
                    opacity: 1
                }, d.vars.animationSpeed, d.vars.easing, d.wrapup));
                else {
                    var r, s, t, q = k ? d.slides.filter(":first").height() : d.computedW;
                    m ? (r = d.vars.itemMargin, t = (d.itemW + r) * d.move * d.animatingTo, s = t > d.limit && 1 !== d.visible ? d.limit : t) : s = 0 === d.currentSlide && b === d.count - 1 && d.vars.animationLoop && "next" !== d.direction ? l ? (d.count + d.cloneOffset) * q : 0 : d.currentSlide === d.last && 0 === b && d.vars.animationLoop && "prev" !== d.direction ? l ? 0 : (d.count + 1) * q : l ? (d.count - 1 - b + d.cloneOffset) * q : (b + d.cloneOffset) * q, d.setProps(s, "", d.vars.animationSpeed), d.transitions ? (d.vars.animationLoop && d.atEnd || (d.animating = !1, d.currentSlide = d.animatingTo), d.container.unbind("webkitTransitionEnd transitionend"), d.container.bind("webkitTransitionEnd transitionend", function() {
                        clearTimeout(d.ensureAnimationEnd), d.wrapup(q)
                    }), clearTimeout(d.ensureAnimationEnd), d.ensureAnimationEnd = setTimeout(function() {
                        d.wrapup(q)
                    }, d.vars.animationSpeed + 100)) : d.container.animate(d.args, d.vars.animationSpeed, d.vars.easing, function() {
                        d.wrapup(q)
                    })
                }
                d.vars.smoothHeight && p.smoothHeight(d.vars.animationSpeed)
            }
        }, d.wrapup = function(a) {
            n || m || (0 === d.currentSlide && d.animatingTo === d.last && d.vars.animationLoop ? d.setProps(a, "jumpEnd") : d.currentSlide === d.last && 0 === d.animatingTo && d.vars.animationLoop && d.setProps(a, "jumpStart")), d.animating = !1, d.currentSlide = d.animatingTo, d.vars.after(d)
        }, d.animateSlides = function() {
            !d.animating && q && d.flexAnimate(d.getTarget("next"))
        }, d.pause = function() {
            clearInterval(d.animatedSlides), d.animatedSlides = null, d.playing = !1, d.vars.pausePlay && p.pausePlay.update("play"), d.syncExists && p.sync("pause")
        }, d.play = function() {
            d.playing && clearInterval(d.animatedSlides), d.animatedSlides = d.animatedSlides || setInterval(d.animateSlides, d.vars.slideshowSpeed), d.started = d.playing = !0, d.vars.pausePlay && p.pausePlay.update("pause"), d.syncExists && p.sync("play")
        }, d.stop = function() {
            d.pause(), d.stopped = !0
        }, d.canAdvance = function(a, b) {
            var c = o ? d.pagingCount - 1 : d.last;
            return b ? !0 : o && d.currentItem === d.count - 1 && 0 === a && "prev" === d.direction ? !0 : o && 0 === d.currentItem && a === d.pagingCount - 1 && "next" !== d.direction ? !1 : a !== d.currentSlide || o ? d.vars.animationLoop ? !0 : d.atEnd && 0 === d.currentSlide && a === c && "next" !== d.direction ? !1 : d.atEnd && d.currentSlide === c && 0 === a && "next" === d.direction ? !1 : !0 : !1
        }, d.getTarget = function(a) {
            return d.direction = a, "next" === a ? d.currentSlide === d.last ? 0 : d.currentSlide + 1 : 0 === d.currentSlide ? d.last : d.currentSlide - 1
        }, d.setProps = function(a, b, c) {
            var e = function() {
                var c = a ? a : (d.itemW + d.vars.itemMargin) * d.move * d.animatingTo,
                    e = function() {
                        if (m) return "setTouch" === b ? a : l && d.animatingTo === d.last ? 0 : l ? d.limit - (d.itemW + d.vars.itemMargin) * d.move * d.animatingTo : d.animatingTo === d.last ? d.limit : c;
                        switch (b) {
                            case "setTotal":
                                return l ? (d.count - 1 - d.currentSlide + d.cloneOffset) * a : (d.currentSlide + d.cloneOffset) * a;
                            case "setTouch":
                                return l ? a : a;
                            case "jumpEnd":
                                return l ? a : d.count * a;
                            case "jumpStart":
                                return l ? d.count * a : a;
                            default:
                                return a
                        }
                    }();
                return -1 * e + "px"
            }();
            d.transitions && (e = k ? "translate3d(0," + e + ",0)" : "translate3d(" + e + ",0,0)", c = void 0 !== c ? c / 1e3 + "s" : "0s", d.container.css("-" + d.pfx + "-transition-duration", c), d.container.css("transition-duration", c)), d.args[d.prop] = e, (d.transitions || void 0 === c) && d.container.css(d.args), d.container.css("transform", e)
        }, d.setup = function(b) {
            if (n) d.slides.css({
                width: "100%",
                "float": "left",
                marginRight: "-100%",
                position: "relative"
            }), "init" === b && (g ? d.slides.css({
                opacity: 0,
                display: "block",
                webkitTransition: "opacity " + d.vars.animationSpeed / 1e3 + "s ease",
                zIndex: 1
            }).eq(d.currentSlide).css({
                opacity: 1,
                zIndex: 2
            }) : d.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(d.currentSlide).css({
                zIndex: 2
            }).animate({
                opacity: 1
            }, d.vars.animationSpeed, d.vars.easing)), d.vars.smoothHeight && p.smoothHeight();
            else {
                var c, f;
                "init" === b && (d.viewport = a('<div class="' + e + 'viewport"></div>').css({
                    overflow: "hidden",
                    position: "relative"
                }).appendTo(d).append(d.container), d.cloneCount = 0, d.cloneOffset = 0, l && (f = a.makeArray(d.slides).reverse(), d.slides = a(f), d.container.empty().append(d.slides))), d.vars.animationLoop && !m && (d.cloneCount = 2, d.cloneOffset = 1, "init" !== b && d.container.find(".clone").remove(), p.uniqueID(d.slides.first().clone().addClass("clone").attr("aria-hidden", "true")).appendTo(d.container), p.uniqueID(d.slides.last().clone().addClass("clone").attr("aria-hidden", "true")).prependTo(d.container)), d.newSlides = a(d.vars.selector, d), c = l ? d.count - 1 - d.currentSlide + d.cloneOffset : d.currentSlide + d.cloneOffset, k && !m ? (d.container.height(200 * (d.count + d.cloneCount) + "%").css("position", "absolute").width("100%"), setTimeout(function() {
                    d.newSlides.css({
                        display: "block"
                    }), d.doMath(), d.viewport.height(d.h), d.setProps(c * d.h, "init")
                }, "init" === b ? 100 : 0)) : (d.container.width(200 * (d.count + d.cloneCount) + "%"), d.setProps(c * d.computedW, "init"), setTimeout(function() {
                    d.doMath(), d.newSlides.css({
                        width: d.computedW,
                        "float": "left",
                        display: "block"
                    }), d.vars.smoothHeight && p.smoothHeight()
                }, "init" === b ? 100 : 0))
            }
            m || d.slides.removeClass(e + "active-slide").eq(d.currentSlide).addClass(e + "active-slide"), d.vars.init(d)
        }, d.doMath = function() {
            var a = d.slides.first(),
                b = d.vars.itemMargin,
                c = d.vars.minItems,
                e = d.vars.maxItems;
            d.w = void 0 === d.viewport ? d.width() : d.viewport.width(), d.h = a.height(), d.boxPadding = a.outerWidth() - a.width(), m ? (d.itemT = d.vars.itemWidth + b, d.minW = c ? c * d.itemT : d.w, d.maxW = e ? e * d.itemT - b : d.w, d.itemW = d.minW > d.w ? (d.w - b * (c - 1)) / c : d.maxW < d.w ? (d.w - b * (e - 1)) / e : d.vars.itemWidth > d.w ? d.w : d.vars.itemWidth, d.visible = Math.floor(d.w / d.itemW), d.move = d.vars.move > 0 && d.vars.move < d.visible ? d.vars.move : d.visible, d.pagingCount = Math.ceil((d.count - d.visible) / d.move + 1), d.last = d.pagingCount - 1, d.limit = 1 === d.pagingCount ? 0 : d.vars.itemWidth > d.w ? d.itemW * (d.count - 1) + b * (d.count - 1) : (d.itemW + b) * d.count - d.w - b) : (d.itemW = d.w, d.pagingCount = d.count, d.last = d.count - 1), d.computedW = d.itemW - d.boxPadding
        }, d.update = function(a, b) {
            d.doMath(), m || (a < d.currentSlide ? d.currentSlide += 1 : a <= d.currentSlide && 0 !== a && (d.currentSlide -= 1), d.animatingTo = d.currentSlide), d.vars.controlNav && !d.manualControls && ("add" === b && !m || d.pagingCount > d.controlNav.length ? p.controlNav.update("add") : ("remove" === b && !m || d.pagingCount < d.controlNav.length) && (m && d.currentSlide > d.last && (d.currentSlide -= 1, d.animatingTo -= 1), p.controlNav.update("remove", d.last))), d.vars.directionNav && p.directionNav.update()
        }, d.addSlide = function(b, c) {
            var e = a(b);
            d.count += 1, d.last = d.count - 1, k && l ? void 0 !== c ? d.slides.eq(d.count - c).after(e) : d.container.prepend(e) : void 0 !== c ? d.slides.eq(c).before(e) : d.container.append(e), d.update(c, "add"), d.slides = a(d.vars.selector + ":not(.clone)", d), d.setup(), d.vars.added(d)
        }, d.removeSlide = function(b) {
            var c = isNaN(b) ? d.slides.index(a(b)) : b;
            d.count -= 1, d.last = d.count - 1, isNaN(b) ? a(b, d.slides).remove() : k && l ? d.slides.eq(d.last).remove() : d.slides.eq(b).remove(), d.doMath(), d.update(c, "remove"), d.slides = a(d.vars.selector + ":not(.clone)", d), d.setup(), d.vars.removed(d)
        }, p.init()
    }, a(window).blur(function() {
        focused = !1
    }).focus(function() {
        focused = !0
    }), a.flexslider.defaults = {
        namespace: "flex-",
        selector: ".slides > li",
        animation: "fade",
        easing: "swing",
        direction: "horizontal",
        reverse: !1,
        animationLoop: !0,
        smoothHeight: !1,
        startAt: 0,
        slideshow: !0,
        slideshowSpeed: 7e3,
        animationSpeed: 600,
        initDelay: 0,
        randomize: !1,
        thumbCaptions: !1,
        pauseOnAction: !0,
        pauseOnHover: !1,
        pauseInvisible: !0,
        useCSS: !0,
        touch: !0,
        video: !1,
        controlNav: !0,
        directionNav: !0,
        prevText: "Previous",
        nextText: "Next",
        keyboard: !0,
        multipleKeyboard: !1,
        mousewheel: !1,
        pausePlay: !1,
        pauseText: "Pause",
        playText: "Play",
        controlsContainer: "",
        manualControls: "",
        sync: "",
        asNavFor: "",
        itemWidth: 0,
        itemMargin: 0,
        minItems: 1,
        maxItems: 0,
        move: 0,
        allowOneSlide: !0,
        start: function() {},
        before: function() {},
        after: function() {},
        end: function() {},
        added: function() {},
        removed: function() {},
        init: function() {}
    }, a.fn.flexslider = function(b) {
        if (void 0 === b && (b = {}), "object" == typeof b) return this.each(function() {
            var c = a(this),
                d = b.selector ? b.selector : ".slides > li",
                e = c.find(d);
            1 === e.length && b.allowOneSlide === !0 || 0 === e.length ? (e.fadeIn(400), b.start && b.start(c)) : void 0 === c.data("flexslider") && new a.flexslider(this, b)
        });
        var c = a(this).data("flexslider");
        switch (b) {
            case "play":
                c.play();
                break;
            case "pause":
                c.pause();
                break;
            case "stop":
                c.stop();
                break;
            case "next":
                c.flexAnimate(c.getTarget("next"), !0);
                break;
            case "prev":
            case "previous":
                c.flexAnimate(c.getTarget("prev"), !0);
                break;
            default:
                "number" == typeof b && c.flexAnimate(b, !0)
        }
    }
}(jQuery);
/*! rangeslider.js - v0.3.9 | (c) 2015 @andreruffert | MIT license | https://github.com/andreruffert/rangeslider.js */
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : jQuery)
}(function(a) {
    "use strict";

    function b() {
        var a = document.createElement("input");
        return a.setAttribute("type", "range"), "text" !== a.type
    }

    function c(a, b) {
        var c = Array.prototype.slice.call(arguments, 2);
        return setTimeout(function() {
            return a.apply(null, c)
        }, b)
    }

    function d(a, b) {
        return b = b || 100,
            function() {
                if (!a.debouncing) {
                    var c = Array.prototype.slice.apply(arguments);
                    a.lastReturnVal = a.apply(window, c), a.debouncing = !0
                }
                return clearTimeout(a.debounceTimeout), a.debounceTimeout = setTimeout(function() {
                    a.debouncing = !1
                }, b), a.lastReturnVal
            }
    }

    function e(a) {
        return 0 === a.offsetWidth || 0 === a.offsetHeight || a.open === !1 ? !0 : !1
    }

    function f(a) {
        for (var b = [], c = a.parentNode; e(c);) b.push(c), c = c.parentNode;
        return b
    }

    function g(a, b) {
        function c(a) {
            "undefined" != typeof a.open && (a.open = a.open ? !1 : !0)
        }
        var d = f(a),
            e = d.length,
            g = [],
            h = a[b];
        if (e) {
            for (var i = 0; e > i; i++) g[i] = d[i].style.display, d[i].style.display = "block", d[i].style.height = "0", d[i].style.overflow = "hidden", d[i].style.visibility = "hidden", c(d[i]);
            h = a[b];
            for (var j = 0; e > j; j++) c(d[j]), d[j].style.display = g[j], d[j].style.height = "", d[j].style.overflow = "", d[j].style.visibility = ""
        }
        return h
    }

    function h(b, e) {
        if (this.$window = a(window), this.$document = a(document), this.$element = a(b), this.options = a.extend({}, l, e), this.polyfill = this.options.polyfill, this.onInit = this.options.onInit, this.onSlide = this.options.onSlide, this.onSlideEnd = this.options.onSlideEnd, this.polyfill && k) return !1;
        this.identifier = "js-" + i + "-" + j++, this.startEvent = this.options.startEvent.join("." + this.identifier + " ") + "." + this.identifier, this.moveEvent = this.options.moveEvent.join("." + this.identifier + " ") + "." + this.identifier, this.endEvent = this.options.endEvent.join("." + this.identifier + " ") + "." + this.identifier, this.min = parseFloat(this.$element[0].getAttribute("min") || 0), this.max = parseFloat(this.$element[0].getAttribute("max") || 100), this.value = parseFloat(this.$element[0].value || this.min + (this.max - this.min) / 2), this.step = parseFloat(this.$element[0].getAttribute("step") || 1), this.toFixed = (this.step + "").replace(".", "").length - 1, this.$fill = a('<div class="' + this.options.fillClass + '" />'), this.$handle = a('<div class="' + this.options.handleClass + '" />'), this.$range = a('<div class="' + this.options.rangeClass + '" id="' + this.identifier + '" />').insertAfter(this.$element).prepend(this.$fill, this.$handle), this.$element.css({
            position: "absolute",
            width: "1px",
            height: "1px",
            overflow: "hidden",
            opacity: "0"
        }), this.handleDown = a.proxy(this.handleDown, this), this.handleMove = a.proxy(this.handleMove, this), this.handleEnd = a.proxy(this.handleEnd, this), this.init();
        var f = this;
        this.$window.on("resize." + this.identifier, d(function() {
            c(function() {
                f.update()
            }, 300)
        }, 20)), this.$document.on(this.startEvent, "#" + this.identifier + ":not(." + this.options.disabledClass + ")", this.handleDown), this.$element.on("change." + this.identifier, function(a, b) {
            if (!b || b.origin !== f.identifier) {
                var c = a.target.value,
                    d = f.getPositionFromValue(c);
                f.setPosition(d)
            }
        })
    }
    var i = "rangeslider",
        j = 0,
        k = b(),
        l = {
            polyfill: !0,
            rangeClass: "rangeslider",
            disabledClass: "rangeslider--disabled",
            fillClass: "rangeslider__fill",
            handleClass: "rangeslider__handle",
            startEvent: ["mousedown", "touchstart", "pointerdown"],
            moveEvent: ["mousemove", "touchmove", "pointermove"],
            endEvent: ["mouseup", "touchend", "pointerup"]
        };
    h.prototype.init = function() {
        this.onInit && "function" == typeof this.onInit && this.onInit(), this.update()
    }, h.prototype.update = function() {
        this.handleWidth = g(this.$handle[0], "offsetWidth"), this.rangeWidth = g(this.$range[0], "offsetWidth"), this.maxHandleX = this.rangeWidth - this.handleWidth, this.grabX = this.handleWidth / 2, this.position = this.getPositionFromValue(this.value), this.$element[0].disabled ? this.$range.addClass(this.options.disabledClass) : this.$range.removeClass(this.options.disabledClass), this.setPosition(this.position)
    }, h.prototype.handleDown = function(a) {
        if (a.preventDefault(), this.$document.on(this.moveEvent, this.handleMove), this.$document.on(this.endEvent, this.handleEnd), !((" " + a.target.className + " ").replace(/[\n\t]/g, " ").indexOf(this.options.handleClass) > -1)) {
            var b = this.getRelativePosition(a),
                c = this.$range[0].getBoundingClientRect().left,
                d = this.getPositionFromNode(this.$handle[0]) - c;
            this.setPosition(b - this.grabX), b >= d && b < d + this.handleWidth && (this.grabX = b - d)
        }
    }, h.prototype.handleMove = function(a) {
        a.preventDefault();
        var b = this.getRelativePosition(a);
        this.setPosition(b - this.grabX)
    }, h.prototype.handleEnd = function(a) {
        a.preventDefault(), this.$document.off(this.moveEvent, this.handleMove), this.$document.off(this.endEvent, this.handleEnd), this.$element.trigger("change", {
            origin: this.identifier
        }), this.onSlideEnd && "function" == typeof this.onSlideEnd && this.onSlideEnd(this.position, this.value)
    }, h.prototype.cap = function(a, b, c) {
        return b > a ? b : a > c ? c : a
    }, h.prototype.setPosition = function(a) {
        var b, c;
        b = this.getValueFromPosition(this.cap(a, 0, this.maxHandleX)), c = this.getPositionFromValue(b), this.$fill[0].style.width = c + this.grabX + "px", this.$handle[0].style.left = c + "px", this.setValue(b), this.position = c, this.value = b, this.onSlide && "function" == typeof this.onSlide && this.onSlide(c, b)
    }, h.prototype.getPositionFromNode = function(a) {
        for (var b = 0; null !== a;) b += a.offsetLeft, a = a.offsetParent;
        return b
    }, h.prototype.getRelativePosition = function(a) {
        var b = this.$range[0].getBoundingClientRect().left,
            c = 0;
        return "undefined" != typeof a.pageX ? c = a.pageX : "undefined" != typeof a.originalEvent.clientX ? c = a.originalEvent.clientX : a.originalEvent.touches && a.originalEvent.touches[0] && "undefined" != typeof a.originalEvent.touches[0].clientX ? c = a.originalEvent.touches[0].clientX : a.currentPoint && "undefined" != typeof a.currentPoint.x && (c = a.currentPoint.x), c - b
    }, h.prototype.getPositionFromValue = function(a) {
        var b, c;
        return b = (a - this.min) / (this.max - this.min), c = b * this.maxHandleX
    }, h.prototype.getValueFromPosition = function(a) {
        var b, c;
        return b = a / (this.maxHandleX || 1), c = this.step * Math.round(b * (this.max - this.min) / this.step) + this.min, Number(c.toFixed(this.toFixed))
    }, h.prototype.setValue = function(a) {
        a !== this.value && this.$element.val(a).trigger("input", {
            origin: this.identifier
        })
    }, h.prototype.destroy = function() {
        this.$document.off("." + this.identifier), this.$window.off("." + this.identifier), this.$element.off("." + this.identifier).removeAttr("style").removeData("plugin_" + i), this.$range && this.$range.length && this.$range[0].parentNode.removeChild(this.$range[0])
    }, a.fn[i] = function(b) {
        return this.each(function() {
            var c = a(this),
                d = c.data("plugin_" + i);
            d || c.data("plugin_" + i, d = new h(this, b)), "string" == typeof b && d[b]()
        })
    }
});

;
(function(e, s) {
    "use strict";
    var n = function() {
        var n = {
                bcClass: "sf-breadcrumb",
                menuClass: "sf-js-enabled",
                anchorClass: "sf-with-ul",
                menuArrowClass: "sf-arrows"
            },
            o = function() {
                var n = /iPhone|iPad|iPod/i.test(navigator.userAgent);
                return n && e(s).load(function() {
                    e("body").children().on("click", e.noop)
                }), n
            }(),
            t = function() {
                var e = document.documentElement.style;
                return "behavior" in e && "fill" in e && /iemobile/i.test(navigator.userAgent)
            }(),
            i = function() {
                return !!s.PointerEvent
            }(),
            r = function(e, s) {
                var o = n.menuClass;
                s.cssArrows && (o += " " + n.menuArrowClass), e.toggleClass(o)
            },
            a = function(s, o) {
                return s.find("li." + o.pathClass).slice(0, o.pathLevels).addClass(o.hoverClass + " " + n.bcClass).filter(function() {
                    return e(this).children(o.popUpSelector).hide().show().length
                }).removeClass(o.pathClass)
            },
            l = function(e) {
                e.children("a").toggleClass(n.anchorClass)
            },
            h = function(e) {
                var s = e.css("ms-touch-action"),
                    n = e.css("touch-action");
                n = n || s, n = "pan-y" === n ? "auto" : "pan-y", e.css({
                    "ms-touch-action": n,
                    "touch-action": n
                })
            },
            u = function(s, n) {
                var r = "li:has(" + n.popUpSelector + ")";
                e.fn.hoverIntent && !n.disableHI ? s.hoverIntent(c, f, r) : s.on("mouseenter.superfish", r, c).on("mouseleave.superfish", r, f);
                var a = "MSPointerDown.superfish";
                i && (a = "pointerdown.superfish"), o || (a += " touchend.superfish"), t && (a += " mousedown.superfish"), s.on("focusin.superfish", "li", c).on("focusout.superfish", "li", f).on(a, "a", n, p)
            },
            p = function(s) {
                var n = e(this),
                    o = n.siblings(s.data.popUpSelector);
                o.length > 0 && o.is(":hidden") && (n.one("click.superfish", !1), "MSPointerDown" === s.type || "pointerdown" === s.type ? n.trigger("focus") : e.proxy(c, n.parent("li"))())
            },
            c = function() {
                var s = e(this),
                    n = m(s);
                clearTimeout(n.sfTimer), s.siblings().superfish("hide").end().superfish("show")
            },
            f = function() {
                var s = e(this),
                    n = m(s);
                o ? e.proxy(d, s, n)() : (clearTimeout(n.sfTimer), n.sfTimer = setTimeout(e.proxy(d, s, n), n.delay))
            },
            d = function(s) {
                s.retainPath = e.inArray(this[0], s.$path) > -1, this.superfish("hide"), this.parents("." + s.hoverClass).length || (s.onIdle.call(v(this)), s.$path.length && e.proxy(c, s.$path)())
            },
            v = function(e) {
                return e.closest("." + n.menuClass)
            },
            m = function(e) {
                return v(e).data("sf-options")
            };
        return {
            hide: function(s) {
                if (this.length) {
                    var n = this,
                        o = m(n);
                    if (!o) return this;
                    var t = o.retainPath === !0 ? o.$path : "",
                        i = n.find("li." + o.hoverClass).add(this).not(t).removeClass(o.hoverClass).children(o.popUpSelector),
                        r = o.speedOut;
                    s && (i.show(), r = 0), o.retainPath = !1, o.onBeforeHide.call(i), i.stop(!0, !0).animate(o.animationOut, r, function() {
                        var s = e(this);
                        o.onHide.call(s)
                    })
                }
                return this
            },
            show: function() {
                var e = m(this);
                if (!e) return this;
                var s = this.addClass(e.hoverClass),
                    n = s.children(e.popUpSelector);
                return e.onBeforeShow.call(n), n.stop(!0, !0).animate(e.animation, e.speed, function() {
                    e.onShow.call(n)
                }), this
            },
            destroy: function() {
                return this.each(function() {
                    var s, o = e(this),
                        t = o.data("sf-options");
                    return t ? (s = o.find(t.popUpSelector).parent("li"), clearTimeout(t.sfTimer), r(o, t), l(s), h(o), o.off(".superfish").off(".hoverIntent"), s.children(t.popUpSelector).attr("style", function(e, s) {
                        return s.replace(/display[^;]+;?/g, "")
                    }), t.$path.removeClass(t.hoverClass + " " + n.bcClass).addClass(t.pathClass), o.find("." + t.hoverClass).removeClass(t.hoverClass), t.onDestroy.call(o), o.removeData("sf-options"), void 0) : !1
                })
            },
            init: function(s) {
                return this.each(function() {
                    var o = e(this);
                    if (o.data("sf-options")) return !1;
                    var t = e.extend({}, e.fn.superfish.defaults, s),
                        i = o.find(t.popUpSelector).parent("li");
                    t.$path = a(o, t), o.data("sf-options", t), r(o, t), l(i), h(o), u(o, t), i.not("." + n.bcClass).superfish("hide", !0), t.onInit.call(this)
                })
            }
        }
    }();
    e.fn.superfish = function(s) {
        return n[s] ? n[s].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof s && s ? e.error("Method " + s + " does not exist on jQuery.fn.superfish") : n.init.apply(this, arguments)
    }, e.fn.superfish.defaults = {
        popUpSelector: "ul,.sf-mega",
        hoverClass: "sfHover",
        pathClass: "overrideThisToUse",
        pathLevels: 1,
        delay: 800,
        animation: {
            opacity: "show"
        },
        animationOut: {
            opacity: "hide"
        },
        speed: "normal",
        speedOut: "fast",
        cssArrows: !0,
        disableHI: !1,
        onInit: e.noop,
        onBeforeShow: e.noop,
        onShow: e.noop,
        onBeforeHide: e.noop,
        onHide: e.noop,
        onIdle: e.noop,
        onDestroy: e.noop
    }
})(jQuery, window);;
(function($) {
    $.fn.supersubs = function(options) {
        var opts = $.extend({}, $.fn.supersubs.defaults, options);
        return this.each(function() {
            var $$ = $(this);
            var o = $.meta ? $.extend({}, opts, $$.data()) : opts;
            var $ULs = $$.find('ul').show();
            var fontsize = $('<li id="menu-fontsize">&#8212;</li>').css({
                'padding': 0,
                'position': 'absolute',
                'top': '-999em',
                'width': 'auto'
            }).appendTo($$)[0].clientWidth;
            $('#menu-fontsize').remove();
            $ULs.each(function(i) {
                var $ul = $(this);
                var $LIs = $ul.children();
                var $As = $LIs.children('a');
                var liFloat = $LIs.css('white-space', 'nowrap').css('float');
                $ul.add($LIs).add($As).css({
                    'float': 'none',
                    'width': 'auto'
                });
                var emWidth = $ul[0].clientWidth / fontsize;
                emWidth += o.extraWidth;
                if (emWidth > o.maxWidth) {
                    emWidth = o.maxWidth;
                } else if (emWidth < o.minWidth) {
                    emWidth = o.minWidth;
                }
                emWidth += 'em';
                $ul.css('width', emWidth);
                $LIs.css({
                    'float': liFloat,
                    'width': '100%',
                    'white-space': 'normal'
                }).each(function() {
                    var $childUl = $(this).children('ul');
                    var offsetDirection = $childUl.css('left') !== undefined ? 'left' : 'right';
                    $childUl.css(offsetDirection, '100%');
                });
            }).hide();
        });
    };
    $.fn.supersubs.defaults = {
        minWidth: 9,
        maxWidth: 25,
        extraWidth: 0
    };
})(jQuery);
/*! 
 * Master Slider – Responsive Touch Swipe Slider
 * Copyright © 2015 All Rights Reserved. 
 *
 * @author Averta [www.averta.net]
 * @version 2.15.1
 * @date Jul 2015
 */
window.averta = {},
    function($) {
        function getVendorPrefix() {
            if ("result" in arguments.callee) return arguments.callee.result;
            var regex = /^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/,
                someScript = document.getElementsByTagName("script")[0];
            for (var prop in someScript.style)
                if (regex.test(prop)) return arguments.callee.result = prop.match(regex)[0];
            return arguments.callee.result = "WebkitOpacity" in someScript.style ? "Webkit" : "KhtmlOpacity" in someScript.style ? "Khtml" : ""
        }

        function checkStyleValue(prop) {
            var b = document.body || document.documentElement,
                s = b.style,
                p = prop;
            if ("string" == typeof s[p]) return !0;
            v = ["Moz", "Webkit", "Khtml", "O", "ms"], p = p.charAt(0).toUpperCase() + p.substr(1);
            for (var i = 0; i < v.length; i++)
                if ("string" == typeof s[v[i] + p]) return !0;
            return !1
        }

        function supportsTransitions() {
            return checkStyleValue("transition")
        }

        function supportsTransforms() {
            return checkStyleValue("transform")
        }

        function supports3DTransforms() {
            if (!supportsTransforms()) return !1;
            var has3d, el = document.createElement("i"),
                transforms = {
                    WebkitTransform: "-webkit-transform",
                    OTransform: "-o-transform",
                    MSTransform: "-ms-transform",
                    msTransform: "-ms-transform",
                    MozTransform: "-moz-transform",
                    Transform: "transform",
                    transform: "transform"
                };
            el.style.display = "block", document.body.insertBefore(el, null);
            for (var t in transforms) void 0 !== el.style[t] && (el.style[t] = "translate3d(1px,1px,1px)", has3d = window.getComputedStyle(el).getPropertyValue(transforms[t]));
            return document.body.removeChild(el), null != has3d && has3d.length > 0 && "none" !== has3d
        }
        window["package"] = function(name) {
            window[name] || (window[name] = {})
        };
        var extend = function(target, object) {
            for (var key in object) target[key] = object[key]
        };
        Function.prototype.extend = function(superclass) {
            "function" == typeof superclass.prototype.constructor ? (extend(this.prototype, superclass.prototype), this.prototype.constructor = this) : (this.prototype.extend(superclass), this.prototype.constructor = this)
        };
        var trans = {
            Moz: "-moz-",
            Webkit: "-webkit-",
            Khtml: "-khtml-",
            O: "-o-",
            ms: "-ms-",
            Icab: "-icab-"
        };
        window._mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), window._touch = "ontouchstart" in document, $(document).ready(function() {
            window._jcsspfx = getVendorPrefix(), window._csspfx = trans[window._jcsspfx], window._cssanim = supportsTransitions(), window._css3d = supports3DTransforms(), window._css2d = supportsTransforms()
        }), window.parseQueryString = function(url) {
            var queryString = {};
            return url.replace(new RegExp("([^?=&]+)(=([^&]*))?", "g"), function($0, $1, $2, $3) {
                queryString[$1] = $3
            }), queryString
        };
        var fps60 = 50 / 3;
        if (window.requestAnimationFrame || (window.requestAnimationFrame = function() {
                return window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
                    window.setTimeout(callback, fps60)
                }
            }()), window.getComputedStyle || (window.getComputedStyle = function(el) {
                return this.el = el, this.getPropertyValue = function(prop) {
                    var re = /(\-([a-z]){1})/g;
                    return "float" == prop && (prop = "styleFloat"), re.test(prop) && (prop = prop.replace(re, function() {
                        return arguments[2].toUpperCase()
                    })), el.currentStyle[prop] ? el.currentStyle[prop] : null
                }, el.currentStyle
            }), Array.prototype.indexOf || (Array.prototype.indexOf = function(elt) {
                var len = this.length >>> 0,
                    from = Number(arguments[1]) || 0;
                for (from = 0 > from ? Math.ceil(from) : Math.floor(from), 0 > from && (from += len); len > from; from++)
                    if (from in this && this[from] === elt) return from;
                return -1
            }), window.isMSIE = function(version) {
                if (!$.browser.msie) return !1;
                if (!version) return !0;
                var ieVer = $.browser.version.slice(0, $.browser.version.indexOf("."));
                return "string" == typeof version ? eval(-1 !== version.indexOf("<") || -1 !== version.indexOf(">") ? ieVer + version : version + "==" + ieVer) : version == ieVer
            }, $.removeDataAttrs = function($target, exclude) {
                var i, attrName, dataAttrsToDelete = [],
                    dataAttrs = $target[0].attributes,
                    dataAttrsLen = dataAttrs.length;
                for (exclude = exclude || [], i = 0; dataAttrsLen > i; i++) attrName = dataAttrs[i].name, "data-" === attrName.substring(0, 5) && -1 === exclude.indexOf(attrName) && dataAttrsToDelete.push(dataAttrs[i].name);
                $.each(dataAttrsToDelete, function(index, attrName) {
                    $target.removeAttr(attrName)
                })
            }, jQuery) {
            $.jqLoadFix = function() {
                if (this.complete) {
                    var that = this;
                    setTimeout(function() {
                        $(that).load()
                    }, 1)
                }
            }, jQuery.uaMatch = jQuery.uaMatch || function(ua) {
                ua = ua.toLowerCase();
                var match = /(chrome)[ \/]([\w.]+)/.exec(ua) || /(webkit)[ \/]([\w.]+)/.exec(ua) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) || /(msie) ([\w.]+)/.exec(ua) || ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [];
                return {
                    browser: match[1] || "",
                    version: match[2] || "0"
                }
            }, matched = jQuery.uaMatch(navigator.userAgent), browser = {}, matched.browser && (browser[matched.browser] = !0, browser.version = matched.version), browser.chrome ? browser.webkit = !0 : browser.webkit && (browser.safari = !0);
            var isIE11 = !!navigator.userAgent.match(/Trident\/7\./);
            isIE11 && (browser.msie = "true", delete browser.mozilla), jQuery.browser = browser, $.fn.preloadImg = function(src, _event) {
                return this.each(function() {
                    var $this = $(this),
                        self = this,
                        img = new Image;
                    img.onload = function(event) {
                        null == event && (event = {}), $this.attr("src", src), event.width = img.width, event.height = img.height, $this.data("width", img.width), $this.data("height", img.height), setTimeout(function() {
                            _event.call(self, event)
                        }, 50), img = null
                    }, img.src = src
                }), this
            }
        }
    }(jQuery),
    function() {
        "use strict";
        averta.EventDispatcher = function() {
            this.listeners = {}
        }, averta.EventDispatcher.extend = function(_proto) {
            var instance = new averta.EventDispatcher;
            for (var key in instance) "constructor" != key && (_proto[key] = averta.EventDispatcher.prototype[key])
        }, averta.EventDispatcher.prototype = {
            constructor: averta.EventDispatcher,
            addEventListener: function(event, listener, ref) {
                this.listeners[event] || (this.listeners[event] = []), this.listeners[event].push({
                    listener: listener,
                    ref: ref
                })
            },
            removeEventListener: function(event, listener, ref) {
                if (this.listeners[event]) {
                    for (var i = 0; i < this.listeners[event].length; ++i) listener === this.listeners[event][i].listener && ref === this.listeners[event][i].ref && this.listeners[event].splice(i--, 1);
                    0 === this.listeners[event].length && (this.listeners[event] = null)
                }
            },
            dispatchEvent: function(event) {
                if (event.target = this, this.listeners[event.type])
                    for (var i = 0, l = this.listeners[event.type].length; l > i; ++i) this.listeners[event.type][i].listener.call(this.listeners[event.type][i].ref, event)
            }
        }
    }(),
    function($) {
        "use strict";
        var isTouch = "ontouchstart" in document,
            isPointer = window.navigator.pointerEnabled,
            isMSPoiner = !isPointer && window.navigator.msPointerEnabled,
            usePointer = isPointer || isMSPoiner,
            ev_start = (isPointer ? "pointerdown " : "") + (isMSPoiner ? "MSPointerDown " : "") + (isTouch ? "touchstart " : "") + "mousedown",
            ev_move = (isPointer ? "pointermove " : "") + (isMSPoiner ? "MSPointerMove " : "") + (isTouch ? "touchmove " : "") + "mousemove",
            ev_end = (isPointer ? "pointerup " : "") + (isMSPoiner ? "MSPointerUp " : "") + (isTouch ? "touchend " : "") + "mouseup",
            ev_cancel = (isPointer ? "pointercancel " : "") + (isMSPoiner ? "MSPointerCancel " : "") + "touchcancel";
        averta.TouchSwipe = function($element) {
            this.$element = $element, this.enabled = !0, $element.bind(ev_start, {
                target: this
            }, this.__touchStart), $element[0].swipe = this, this.onSwipe = null, this.swipeType = "horizontal", this.noSwipeSelector = "input, textarea, button, .no-swipe, .ms-no-swipe", this.lastStatus = {}
        };
        var p = averta.TouchSwipe.prototype;
        p.getDirection = function(new_x, new_y) {
            switch (this.swipeType) {
                case "horizontal":
                    return new_x <= this.start_x ? "left" : "right";
                case "vertical":
                    return new_y <= this.start_y ? "up" : "down";
                case "all":
                    return Math.abs(new_x - this.start_x) > Math.abs(new_y - this.start_y) ? new_x <= this.start_x ? "left" : "right" : new_y <= this.start_y ? "up" : "down"
            }
        }, p.priventDefultEvent = function(new_x, new_y) {
            var dx = Math.abs(new_x - this.start_x),
                dy = Math.abs(new_y - this.start_y),
                horiz = dx > dy;
            return "horizontal" === this.swipeType && horiz || "vertical" === this.swipeType && !horiz
        }, p.createStatusObject = function(evt) {
            var temp_x, temp_y, status_data = {};
            return temp_x = this.lastStatus.distanceX || 0, temp_y = this.lastStatus.distanceY || 0, status_data.distanceX = evt.pageX - this.start_x, status_data.distanceY = evt.pageY - this.start_y, status_data.moveX = status_data.distanceX - temp_x, status_data.moveY = status_data.distanceY - temp_y, status_data.distance = parseInt(Math.sqrt(Math.pow(status_data.distanceX, 2) + Math.pow(status_data.distanceY, 2))), status_data.duration = (new Date).getTime() - this.start_time, status_data.direction = this.getDirection(evt.pageX, evt.pageY), status_data
        }, p.__reset = function(event, jqevt) {
            this.reset = !1, this.lastStatus = {}, this.start_time = (new Date).getTime(), this.start_x = isTouch ? event.touches[0].pageX : usePointer ? event.pageX : jqevt.pageX, this.start_y = isTouch ? event.touches[0].pageY : usePointer ? event.pageY : jqevt.pageY
        }, p.__touchStart = function(event) {
            var swipe = event.data.target,
                jqevt = event;
            if (swipe.enabled && !($(event.target).closest(swipe.noSwipeSelector, swipe.$element).length > 0)) {
                if (event = event.originalEvent, usePointer && $(this).css("-ms-touch-action", "horizontal" === swipe.swipeType ? "pan-y" : "pan-x"), !swipe.onSwipe) return void $.error("Swipe listener is undefined");
                if (!swipe.touchStarted) {
                    swipe.start_x = isTouch ? event.touches[0].pageX : usePointer ? event.pageX : jqevt.pageX, swipe.start_y = isTouch ? event.touches[0].pageY : usePointer ? event.pageY : jqevt.pageY, swipe.start_time = (new Date).getTime(), $(document).bind(ev_end, {
                        target: swipe
                    }, swipe.__touchEnd).bind(ev_move, {
                        target: swipe
                    }, swipe.__touchMove).bind(ev_cancel, {
                        target: swipe
                    }, swipe.__touchCancel);
                    var evt = isTouch ? event.touches[0] : usePointer ? event : jqevt,
                        status = swipe.createStatusObject(evt);
                    status.phase = "start", swipe.onSwipe.call(null, status), isTouch || jqevt.preventDefault(), swipe.lastStatus = status, swipe.touchStarted = !0
                }
            }
        }, p.__touchMove = function(event) {
            var swipe = event.data.target,
                jqevt = event;
            if (event = event.originalEvent, swipe.touchStarted) {
                clearTimeout(swipe.timo), swipe.timo = setTimeout(function() {
                    swipe.__reset(event, jqevt)
                }, 60);
                var evt = isTouch ? event.touches[0] : usePointer ? event : jqevt,
                    status = swipe.createStatusObject(evt);
                swipe.priventDefultEvent(evt.pageX, evt.pageY) && jqevt.preventDefault(), status.phase = "move", swipe.lastStatus = status, swipe.onSwipe.call(null, status)
            }
        }, p.__touchEnd = function(event) {
            var swipe = event.data.target,
                jqevt = event;
            event = event.originalEvent, clearTimeout(swipe.timo);
            var status = (isTouch ? event.touches[0] : usePointer ? event : jqevt, swipe.lastStatus);
            isTouch || jqevt.preventDefault(), status.phase = "end", swipe.touchStarted = !1, swipe.priventEvt = null, $(document).unbind(ev_end, swipe.__touchEnd).unbind(ev_move, swipe.__touchMove).unbind(ev_cancel, swipe.__touchCancel), status.speed = status.distance / status.duration, swipe.onSwipe.call(null, status)
        }, p.__touchCancel = function(event) {
            var swipe = event.data.target;
            swipe.__touchEnd(event)
        }, p.enable = function() {
            this.enabled || (this.enabled = !0)
        }, p.disable = function() {
            this.enabled && (this.enabled = !1)
        }
    }(jQuery),
    function() {
        "use strict";
        averta.Ticker = function() {};
        var st = averta.Ticker,
            list = [],
            len = 0,
            __stopped = !0;
        st.add = function(listener, ref) {
            return list.push([listener, ref]), 1 === list.length && st.start(), len = list.length
        }, st.remove = function(listener, ref) {
            for (var i = 0, l = list.length; l > i; ++i) list[i] && list[i][0] === listener && list[i][1] === ref && list.splice(i, 1);
            len = list.length, 0 === len && st.stop()
        }, st.start = function() {
            __stopped && (__stopped = !1, __tick())
        }, st.stop = function() {
            __stopped = !0
        };
        var __tick = function() {
            if (!st.__stopped) {
                for (var item, i = 0; i !== len; i++) item = list[i], item[0].call(item[1]);
                requestAnimationFrame(__tick)
            }
        }
    }(),
    function() {
        "use strict";
        Date.now || (Date.now = function() {
            return (new Date).getTime()
        }), averta.Timer = function(delay, autoStart) {
            this.delay = delay, this.currentCount = 0, this.paused = !1, this.onTimer = null, this.refrence = null, autoStart && this.start()
        }, averta.Timer.prototype = {
            constructor: averta.Timer,
            start: function() {
                this.paused = !1, this.lastTime = Date.now(), averta.Ticker.add(this.update, this)
            },
            stop: function() {
                this.paused = !0, averta.Ticker.remove(this.update, this)
            },
            reset: function() {
                this.currentCount = 0, this.paused = !0, this.lastTime = Date.now()
            },
            update: function() {
                this.paused || Date.now() - this.lastTime < this.delay || (this.currentCount++, this.lastTime = Date.now(), this.onTimer && this.onTimer.call(this.refrence, this.getTime()))
            },
            getTime: function() {
                return this.delay * this.currentCount
            }
        }
    }(),
    function() {
        "use strict";
        window.CSSTween = function(element, duration, delay, ease) {
            this.$element = element, this.duration = duration || 1e3, this.delay = delay || 0, this.ease = ease || "linear"
        };
        var p = CSSTween.prototype;
        p.to = function(callback, target) {
            return this.to_cb = callback, this.to_cb_target = target, this
        }, p.from = function(callback, target) {
            return this.fr_cb = callback, this.fr_cb_target = target, this
        }, p.onComplete = function(callback, target) {
            return this.oc_fb = callback, this.oc_fb_target = target, this
        }, p.chain = function(csstween) {
            return this.chained_tween = csstween, this
        }, p.reset = function() {
            clearTimeout(this.start_to), clearTimeout(this.end_to)
        }, p.start = function() {
            var element = this.$element[0];
            clearTimeout(this.start_to), clearTimeout(this.end_to), this.fresh = !0, this.fr_cb && (element.style[window._jcsspfx + "TransitionDuration"] = "0ms", this.fr_cb.call(this.fr_cb_target));
            var that = this;
            return this.onTransComplete = function() {
                that.fresh && (that.reset(), element.style[window._jcsspfx + "TransitionDuration"] = "", element.style[window._jcsspfx + "TransitionProperty"] = "", element.style[window._jcsspfx + "TransitionTimingFunction"] = "", element.style[window._jcsspfx + "TransitionDelay"] = "", that.fresh = !1, that.chained_tween && that.chained_tween.start(), that.oc_fb && that.oc_fb.call(that.oc_fb_target))
            }, this.start_to = setTimeout(function() {
                that.$element && (element.style[window._jcsspfx + "TransitionDuration"] = that.duration + "ms", element.style[window._jcsspfx + "TransitionProperty"] = that.transProperty || "all", element.style[window._jcsspfx + "TransitionDelay"] = that.delay > 0 ? that.delay + "ms" : "", element.style[window._jcsspfx + "TransitionTimingFunction"] = that.ease, that.to_cb && that.to_cb.call(that.to_cb_target), that.end_to = setTimeout(function() {
                    that.onTransComplete()
                }, that.duration + (that.delay || 0)))
            }, 100), this
        }
    }(),
    function() {
        "use strict";

        function transPos(element, properties) {
            if (void 0 !== properties.x || void 0 !== properties.y)
                if (_cssanim) {
                    var trans = window._jcsspfx + "Transform";
                    void 0 !== properties.x && (properties[trans] = (properties[trans] || "") + " translateX(" + properties.x + "px)", delete properties.x), void 0 !== properties.y && (properties[trans] = (properties[trans] || "") + " translateY(" + properties.y + "px)", delete properties.y)
                } else {
                    if (void 0 !== properties.x) {
                        var posx = "auto" !== element.css("right") ? "right" : "left";
                        properties[posx] = properties.x + "px", delete properties.x
                    }
                    if (void 0 !== properties.y) {
                        var posy = "auto" !== element.css("bottom") ? "bottom" : "top";
                        properties[posy] = properties.y + "px", delete properties.y
                    }
                } return properties
        }
        var _cssanim = null;
        window.CTween = {}, CTween.setPos = function(element, pos) {
            element.css(transPos(element, pos))
        }, CTween.animate = function(element, duration, properties, options) {
            if (null == _cssanim && (_cssanim = window._cssanim), options = options || {}, transPos(element, properties), _cssanim) {
                var tween = new CSSTween(element, duration, options.delay, EaseDic[options.ease]);
                return options.transProperty && (tween.transProperty = options.transProperty), tween.to(function() {
                    element.css(properties)
                }), options.complete && tween.onComplete(options.complete, options.target), tween.start(), tween.stop = tween.reset, tween
            }
            var onCl;
            return options.delay && element.delay(options.delay), options.complete && (onCl = function() {
                options.complete.call(options.target)
            }), element.stop(!0).animate(properties, duration, options.ease || "linear", onCl), element
        }, CTween.fadeOut = function(target, duration, remove) {
            var options = {};
            remove === !0 ? options.complete = function() {
                target.remove()
            } : 2 === remove && (options.complete = function() {
                target.css("display", "none")
            }), CTween.animate(target, duration || 1e3, {
                opacity: 0
            }, options)
        }, CTween.fadeIn = function(target, duration, reset) {
            reset !== !1 && target.css("opacity", 0).css("display", ""), CTween.animate(target, duration || 1e3, {
                opacity: 1
            })
        }
    }(),
    function() {
        window.EaseDic = {
            linear: "linear",
            ease: "ease",
            easeIn: "ease-in",
            easeOut: "ease-out",
            easeInOut: "ease-in-out",
            easeInCubic: "cubic-bezier(.55,.055,.675,.19)",
            easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
            easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
            easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
            easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
            easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
            easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
            easeOutExpo: "cubic-bezier(.19,1,.22,1)",
            easeInOutExpo: "cubic-bezier(1,0,0,1)",
            easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
            easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
            easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
            easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
            easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
            easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
            easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
            easeOutQuint: "cubic-bezier(.23,1,.32,1)",
            easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
            easeInSine: "cubic-bezier(.47,0,.745,.715)",
            easeOutSine: "cubic-bezier(.39,.575,.565,1)",
            easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
            easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
            easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
            easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
        }
    }(),
    function() {
        "use strict";
        window.MSAligner = function(type, $container, $img) {
            this.$container = $container, this.$img = $img, this.type = type || "stretch", this.widthOnly = !1, this.heightOnly = !1
        };
        var p = MSAligner.prototype;
        p.init = function(w, h) {
            switch (this.baseWidth = w, this.baseHeight = h, this.imgRatio = w / h, this.imgRatio2 = h / w, this.type) {
                case "tile":
                    this.$container.css("background-image", "url(" + this.$img.attr("src") + ")"), this.$img.remove();
                    break;
                case "center":
                    this.$container.css("background-image", "url(" + this.$img.attr("src") + ")"), this.$container.css({
                        backgroundPosition: "center center",
                        backgroundRepeat: "no-repeat"
                    }), this.$img.remove();
                    break;
                case "stretch":
                    this.$img.css({
                        width: "100%",
                        height: "100%"
                    });
                    break;
                case "fill":
                case "fit":
                    this.needAlign = !0, this.align()
            }
        }, p.align = function() {
            if (this.needAlign) {
                var cont_w = this.$container.width(),
                    cont_h = this.$container.height(),
                    contRatio = cont_w / cont_h;
                "fill" == this.type ? this.imgRatio < contRatio ? (this.$img.width(cont_w), this.$img.height(cont_w * this.imgRatio2)) : (this.$img.height(cont_h), this.$img.width(cont_h * this.imgRatio)) : "fit" == this.type && (this.imgRatio < contRatio ? (this.$img.height(cont_h), this.$img.width(cont_h * this.imgRatio)) : (this.$img.width(cont_w), this.$img.height(cont_w * this.imgRatio2))), this.setMargin()
            }
        }, p.setMargin = function() {
            var cont_w = this.$container.width(),
                cont_h = this.$container.height();
            this.$img.css("margin-top", (cont_h - this.$img[0].offsetHeight) / 2 + "px"), this.$img.css("margin-left", (cont_w - this.$img[0].offsetWidth) / 2 + "px")
        }
    }(),
    function() {
        "use strict";
        var _options = {
                bouncing: !0,
                snapping: !1,
                snapsize: null,
                friction: .05,
                outFriction: .05,
                outAcceleration: .09,
                minValidDist: .3,
                snappingMinSpeed: 2,
                paging: !1,
                endless: !1,
                maxSpeed: 160
            },
            Controller = function(min, max, options) {
                if (null === max || null === min) throw new Error("Max and Min values are required.");
                this.options = options || {};
                for (var key in _options) key in this.options || (this.options[key] = _options[key]);
                this._max_value = max, this._min_value = min, this.value = min, this.end_loc = min, this.current_snap = this.getSnapNum(min), this.__extrStep = 0, this.__extraMove = 0, this.__animID = -1
            },
            p = Controller.prototype;
        p.changeTo = function(value, animate, speed, snap_num, dispatch) {
            if (this.stopped = !1, this._internalStop(), value = this._checkLimits(value), speed = Math.abs(speed || 0), this.options.snapping && (snap_num = snap_num || this.getSnapNum(value), dispatch !== !1 && this._callsnapChange(snap_num), this.current_snap = snap_num), animate) {
                this.animating = !0;
                var self = this,
                    active_id = ++self.__animID,
                    amplitude = value - self.value,
                    timeStep = 0,
                    targetPosition = value,
                    animFrict = 1 - self.options.friction,
                    timeconst = animFrict + (speed - 20) * animFrict * 1.3 / self.options.maxSpeed,
                    tick = function() {
                        if (active_id === self.__animID) {
                            var dis = value - self.value;
                            if (!(Math.abs(dis) > self.options.minValidDist && self.animating)) return self.animating && (self.value = value, self._callrenderer()), self.animating = !1, active_id !== self.__animID && (self.__animID = -1), void self._callonComplete("anim");
                            window.requestAnimationFrame(tick), self.value = targetPosition - amplitude * Math.exp(- ++timeStep * timeconst), self._callrenderer()
                        }
                    };
                return void tick()
            }
            this.value = value, this._callrenderer()
        }, p.drag = function(move) {
            this.start_drag && (this.drag_start_loc = this.value, this.start_drag = !1), this.animating = !1, this._deceleration = !1, this.value -= move, !this.options.endless && (this.value > this._max_value || this.value < 0) ? this.options.bouncing ? (this.__isout = !0, this.value += .6 * move) : this.value = this.value > this._max_value ? this._max_value : 0 : !this.options.endless && this.options.bouncing && (this.__isout = !1), this._callrenderer()
        }, p.push = function(speed) {
            if (this.stopped = !1, this.options.snapping && Math.abs(speed) <= this.options.snappingMinSpeed) return void this.cancel();
            if (this.__speed = speed, this.__startSpeed = speed, this.end_loc = this._calculateEnd(), this.options.snapping) {
                var snap_loc = this.getSnapNum(this.value),
                    end_snap = this.getSnapNum(this.end_loc);
                if (this.options.paging) return snap_loc = this.getSnapNum(this.drag_start_loc), this.__isout = !1, void(speed > 0 ? this.gotoSnap(snap_loc + 1, !0, speed) : this.gotoSnap(snap_loc - 1, !0, speed));
                if (snap_loc === end_snap) return void this.cancel();
                this._callsnapChange(end_snap), this.current_snap = end_snap
            }
            this.animating = !1, this.__needsSnap = this.options.endless || this.end_loc > this._min_value && this.end_loc < this._max_value, this.options.snapping && this.__needsSnap && (this.__extraMove = this._calculateExtraMove(this.end_loc)), this._startDecelaration()
        }, p.bounce = function(speed) {
            this.animating || (this.stopped = !1, this.animating = !1, this.__speed = speed, this.__startSpeed = speed, this.end_loc = this._calculateEnd(), this._startDecelaration())
        }, p.stop = function() {
            this.stopped = !0, this._internalStop()
        }, p.cancel = function() {
            this.start_drag = !0, this.__isout ? (this.__speed = 4e-4, this._startDecelaration()) : this.options.snapping && this.gotoSnap(this.getSnapNum(this.value), !0)
        }, p.renderCallback = function(listener, ref) {
            this.__renderHook = {
                fun: listener,
                ref: ref
            }
        }, p.snappingCallback = function(listener, ref) {
            this.__snapHook = {
                fun: listener,
                ref: ref
            }
        }, p.snapCompleteCallback = function(listener, ref) {
            this.__compHook = {
                fun: listener,
                ref: ref
            }
        }, p.getSnapNum = function(value) {
            return Math.floor((value + this.options.snapsize / 2) / this.options.snapsize)
        }, p.nextSnap = function() {
            this._internalStop();
            var curr_snap = this.getSnapNum(this.value);
            !this.options.endless && (curr_snap + 1) * this.options.snapsize > this._max_value ? (this.__speed = 8, this.__needsSnap = !1, this._startDecelaration()) : this.gotoSnap(curr_snap + 1, !0)
        }, p.prevSnap = function() {
            this._internalStop();
            var curr_snap = this.getSnapNum(this.value);
            !this.options.endless && (curr_snap - 1) * this.options.snapsize < this._min_value ? (this.__speed = -8, this.__needsSnap = !1, this._startDecelaration()) : this.gotoSnap(curr_snap - 1, !0)
        }, p.gotoSnap = function(snap_num, animate, speed) {
            this.changeTo(snap_num * this.options.snapsize, animate, speed, snap_num)
        }, p.destroy = function() {
            this._internalStop(), this.__renderHook = null, this.__snapHook = null, this.__compHook = null
        }, p._internalStop = function() {
            this.start_drag = !0, this.animating = !1, this._deceleration = !1, this.__extrStep = 0
        }, p._calculateExtraMove = function(value) {
            var m = value % this.options.snapsize;
            return m < this.options.snapsize / 2 ? -m : this.options.snapsize - m
        }, p._calculateEnd = function(step) {
            for (var temp_speed = this.__speed, temp_value = this.value, i = 0; Math.abs(temp_speed) > this.options.minValidDist;) temp_value += temp_speed, temp_speed *= this.options.friction, i++;
            return step ? i : temp_value
        }, p._checkLimits = function(value) {
            return this.options.endless ? value : value < this._min_value ? this._min_value : value > this._max_value ? this._max_value : value
        }, p._callrenderer = function() {
            this.__renderHook && this.__renderHook.fun.call(this.__renderHook.ref, this, this.value)
        }, p._callsnapChange = function(targetSnap) {
            this.__snapHook && targetSnap !== this.current_snap && this.__snapHook.fun.call(this.__snapHook.ref, this, targetSnap, targetSnap - this.current_snap)
        }, p._callonComplete = function(type) {
            this.__compHook && !this.stopped && this.__compHook.fun.call(this.__compHook.ref, this, this.current_snap, type)
        }, p._computeDeceleration = function() {
            if (this.options.snapping && this.__needsSnap) {
                var xtr_move = (this.__startSpeed - this.__speed) / this.__startSpeed * this.__extraMove;
                this.value += this.__speed + xtr_move - this.__extrStep, this.__extrStep = xtr_move
            } else this.value += this.__speed;
            if (this.__speed *= this.options.friction, this.options.endless || this.options.bouncing || (this.value <= this._min_value ? (this.value = this._min_value, this.__speed = 0) : this.value >= this._max_value && (this.value = this._max_value, this.__speed = 0)), this._callrenderer(), !this.options.endless && this.options.bouncing) {
                var out_value = 0;
                this.value < this._min_value ? out_value = this._min_value - this.value : this.value > this._max_value && (out_value = this._max_value - this.value), this.__isout = Math.abs(out_value) >= this.options.minValidDist, this.__isout && (this.__speed * out_value <= 0 ? this.__speed += out_value * this.options.outFriction : this.__speed = out_value * this.options.outAcceleration)
            }
        }, p._startDecelaration = function() {
            if (!this._deceleration) {
                this._deceleration = !0;
                var self = this,
                    tick = function() {
                        self._deceleration && (self._computeDeceleration(), Math.abs(self.__speed) > self.options.minValidDist || self.__isout ? window.requestAnimationFrame(tick) : (self._deceleration = !1, self.__isout = !1, self.value = self.__needsSnap && self.options.snapping && !self.options.paging ? self._checkLimits(self.end_loc + self.__extraMove) : Math.round(self.value), self._callrenderer(), self._callonComplete("decel")))
                    };
                tick()
            }
        }, window.Controller = Controller
    }(),
    function(window, document, $) {
        window.MSLayerController = function(slide) {
            this.slide = slide, this.slider = slide.slider, this.layers = [], this.layersCount = 0, this.preloadCount = 0, this.$layers = $("<div></div>").addClass("ms-slide-layers"), this.$staticLayers = $("<div></div>").addClass("ms-static-layers"), this.$fixedLayers = $("<div></div>").addClass("ms-fixed-layers"), this.$animLayers = $("<div></div>").addClass("ms-anim-layers")
        };
        var p = MSLayerController.prototype;
        p.addLayer = function(layer) {
            switch (layer.slide = this.slide, layer.controller = this, layer.$element.data("position")) {
                case "static":
                    this.hasStaticLayer = !0, layer.$element.appendTo(this.$staticLayers);
                    break;
                case "fixed":
                    this.hasFixedLayer = !0, layer.$element.appendTo(this.$fixedLayers);
                    break;
                default:
                    layer.$element.appendTo(this.$animLayers)
            }
            layer.create(), this.layers.push(layer), this.layersCount++, layer.parallax && (this.hasParallaxLayer = !0), layer.needPreload && this.preloadCount++
        }, p.create = function() {
            this.slide.$element.append(this.$layers), this.$layers.append(this.$animLayers), this.hasStaticLayer && this.$layers.append(this.$staticLayers), "center" == this.slider.options.layersMode && (this.$layers.css("max-width", this.slider.options.width + "px"), this.hasFixedLayer && this.$fixedLayers.css("max-width", this.slider.options.width + "px"))
        }, p.loadLayers = function(callback) {
            if (this._onReadyCallback = callback, 0 === this.preloadCount) return void this._onlayersReady();
            for (var i = 0; i !== this.layersCount; ++i) this.layers[i].needPreload && this.layers[i].loadImage()
        }, p.prepareToShow = function() {
            this.hasParallaxLayer && this._enableParallaxEffect(), this.hasFixedLayer && this.$fixedLayers.prependTo(this.slide.view.$element)
        }, p.showLayers = function() {
            this.layersHideTween && this.layersHideTween.stop(!0), this.fixedLayersHideTween && this.fixedLayersHideTween.stop(!0), this._resetLayers(), this.$animLayers.css("opacity", "").css("display", ""), this.hasFixedLayer && this.$fixedLayers.css("opacity", "").css("display", ""), this.ready && (this._initLayers(), this._locateLayers(), this._startLayers())
        }, p.hideLayers = function() {
            if (this.slide.selected || this.slider.options.instantStartLayers) {
                var that = this;
                that.layersHideTween = CTween.animate(this.$animLayers, 500, {
                    opacity: 0
                }, {
                    complete: function() {
                        that._resetLayers()
                    }
                }), this.hasFixedLayer && (this.fixedLayersHideTween = CTween.animate(this.$fixedLayers, 500, {
                    opacity: 0
                }, {
                    complete: function() {
                        that.$fixedLayers.detach()
                    }
                })), this.hasParallaxLayer && this._disableParallaxEffect()
            }
        }, p.animHideLayers = function() {
            if (this.ready)
                for (var i = 0; i !== this.layersCount; ++i) this.layers[i].hide()
        }, p.setSize = function(width, height, hard) {
            if (this.ready && (this.slide.selected || this.hasStaticLayer) && (hard && this._initLayers(!0), this._locateLayers(!this.slide.selected)), this.slider.options.autoHeight && this.updateHeight(), "center" == this.slider.options.layersMode) {
                var left = Math.max(0, (width - this.slider.options.width) / 2) + "px";
                this.$layers[0].style.left = left, this.$fixedLayers[0].style.left = left
            }
        }, p.updateHeight = function() {
            var h = this.slide.getHeight() + "px";
            this.$layers[0].style.height = h, this.$fixedLayers[0].style.height = h
        }, p._onlayersReady = function() {
            this.ready = !0, this.hasStaticLayer && !this.slide.isSleeping && this._initLayers(!1, !0), this._onReadyCallback.call(this.slide)
        }, p.onSlideSleep = function() {}, p.onSlideWakeup = function() {
            this.hasStaticLayer && this.ready && this._initLayers(!1, !0)
        }, p.destroy = function() {
            this.slide.selected && this.hasParallaxLayer && this._disableParallaxEffect();
            for (var i = 0; i < this.layersCount; ++i) this.layers[i].$element.stop(!0).remove();
            this.$layers.remove(), this.$staticLayers.remove(), this.$fixedLayers.remove(), this.$animLayers.remove()
        }, p._startLayers = function() {
            for (var i = 0; i !== this.layersCount; ++i) this.layers[i].start()
        }, p._initLayers = function(force, onlyStatics) {
            if (!(this.init && !force || this.slider.init_safemode)) {
                this.init = onlyStatics !== !0;
                var i = 0;
                if (onlyStatics && !this.staticsInit)
                    for (this.staticsInit = !0; i !== this.layersCount; ++i) this.layers[i].staticLayer && this.layers[i].init();
                else if (this.staticsInit && !force)
                    for (; i !== this.layersCount; ++i) this.layers[i].staticLayer || this.layers[i].init();
                else
                    for (; i !== this.layersCount; ++i) this.layers[i].init()
            }
        }, p._locateLayers = function(onlyStatics) {
            var i = 0;
            if (onlyStatics)
                for (; i !== this.layersCount; ++i) this.layers[i].staticLayer && this.layers[i].locate();
            else
                for (; i !== this.layersCount; ++i) this.layers[i].locate()
        }, p._resetLayers = function() {
            this.$animLayers.css("display", "none").css("opacity", 1);
            for (var i = 0; i !== this.layersCount; ++i) this.layers[i].reset()
        }, p._applyParallax = function(x, y, fast) {
            for (var i = 0; i !== this.layersCount; ++i) null != this.layers[i].parallax && this.layers[i].moveParallax(x, y, fast)
        }, p._enableParallaxEffect = function() {
            "swipe" === this.slider.options.parallaxMode ? this.slide.view.addEventListener(MSViewEvents.SCROLL, this._swipeParallaxMove, this) : this.slide.$element.on("mousemove", {
                that: this
            }, this._mouseParallaxMove).on("mouseleave", {
                that: this
            }, this._resetParalax)
        }, p._disableParallaxEffect = function() {
            "swipe" === this.slider.options.parallaxMode ? this.slide.view.removeEventListener(MSViewEvents.SCROLL, this._swipeParallaxMove, this) : this.slide.$element.off("mousemove", this._mouseParallaxMove).off("mouseleave", this._resetParalax)
        }, p._resetParalax = function(e) {
            var that = e.data.that;
            that._applyParallax(0, 0)
        }, p._mouseParallaxMove = function(e) {
            var that = e.data.that,
                os = that.slide.$element.offset(),
                slider = that.slider;
            if ("mouse:y-only" !== slider.options.parallaxMode) var x = e.pageX - os.left - that.slide.__width / 2;
            else var x = 0;
            if ("mouse:x-only" !== slider.options.parallaxMode) var y = e.pageY - os.top - that.slide.__height / 2;
            else var y = 0;
            that._applyParallax(-x, -y)
        }, p._swipeParallaxMove = function() {
            var value = this.slide.position - this.slide.view.__contPos;
            "v" === this.slider.options.dir ? this._applyParallax(0, value, !0) : this._applyParallax(value, 0, !0)
        }
    }(window, document, jQuery),
    function($) {
        window.MSLayerEffects = {};
        var installed, _fade = {
            opacity: 0
        };
        MSLayerEffects.setup = function() {
            if (!installed) {
                installed = !0;
                var st = MSLayerEffects,
                    transform_css = window._jcsspfx + "Transform",
                    transform_orig_css = window._jcsspfx + "TransformOrigin",
                    o = $.browser.opera;
                _2d = window._css2d && window._cssanim && !o, st.defaultValues = {
                    left: 0,
                    top: 0,
                    opacity: isMSIE("<=9") ? 1 : "",
                    right: 0,
                    bottom: 0
                }, st.defaultValues[transform_css] = "", st.rf = 1, st.presetEffParams = {
                    random: "30|300",
                    "long": 300,
                    "short": 30,
                    "false": !1,
                    "true": !0,
                    tl: "top left",
                    bl: "bottom left",
                    tr: "top right",
                    br: "bottom right",
                    rt: "top right",
                    lb: "bottom left",
                    lt: "top left",
                    rb: "bottom right",
                    t: "top",
                    b: "bottom",
                    r: "right",
                    l: "left",
                    c: "center"
                }, st.fade = function() {
                    return _fade
                }, st.left = _2d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "translateX(" + -dist * st.rf + "px)", r
                } : function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r.left = -dist * st.rf + "px", r
                }, st.right = _2d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "translateX(" + dist * st.rf + "px)", r
                } : function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r.left = dist * st.rf + "px", r
                }, st.top = _2d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "translateY(" + -dist * st.rf + "px)", r
                } : function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r.top = -dist * st.rf + "px", r
                }, st.bottom = _2d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "translateY(" + dist * st.rf + "px)", r
                } : function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r.top = dist * st.rf + "px", r
                }, st.from = _2d ? function(leftdis, topdis, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "translateX(" + leftdis * st.rf + "px) translateY(" + topdis * st.rf + "px)", r
                } : function(leftdis, topdis, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r.top = topdis * st.rf + "px", r.left = leftdis * st.rf + "px", r
                }, st.rotate = _2d ? function(deg, orig) {
                    var r = {
                        opacity: 0
                    };
                    return r[transform_css] = " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function() {
                    return _fade
                }, st.rotateleft = _2d ? function(deg, dist, orig, fade) {
                    var r = st.left(dist, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, dist, orig, fade) {
                    return st.left(dist, fade)
                }, st.rotateright = _2d ? function(deg, dist, orig, fade) {
                    var r = st.right(dist, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, dist, orig, fade) {
                    return st.right(dist, fade)
                }, st.rotatetop = _2d ? function(deg, dist, orig, fade) {
                    var r = st.top(dist, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, dist, orig, fade) {
                    return st.top(dist, fade)
                }, st.rotatebottom = _2d ? function(deg, dist, orig, fade) {
                    var r = st.bottom(dist, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, dist, orig, fade) {
                    return st.bottom(dist, fade)
                }, st.rotatefrom = _2d ? function(deg, leftdis, topdis, orig, fade) {
                    var r = st.from(leftdis, topdis, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, leftdis, topdis, orig, fade) {
                    return st.from(leftdis, topdis, fade)
                }, st.skewleft = _2d ? function(deg, dist, fade) {
                    var r = st.left(dist, fade);
                    return r[transform_css] += " skewX(" + deg + "deg)", r
                } : function(deg, dist, fade) {
                    return st.left(dist, fade)
                }, st.skewright = _2d ? function(deg, dist, fade) {
                    var r = st.right(dist, fade);
                    return r[transform_css] += " skewX(" + -deg + "deg)", r
                } : function(deg, dist, fade) {
                    return st.right(dist, fade)
                }, st.skewtop = _2d ? function(deg, dist, fade) {
                    var r = st.top(dist, fade);
                    return r[transform_css] += " skewY(" + deg + "deg)", r
                } : function(deg, dist, fade) {
                    return st.top(dist, fade)
                }, st.skewbottom = _2d ? function(deg, dist, fade) {
                    var r = st.bottom(dist, fade);
                    return r[transform_css] += " skewY(" + -deg + "deg)", r
                } : function(deg, dist, fade) {
                    return st.bottom(dist, fade)
                }, st.scale = _2d ? function(x, y, orig, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, orig, fade) {
                    return fade === !1 ? {} : {
                        opacity: 0
                    }
                }, st.scaleleft = _2d ? function(x, y, dist, orig, fade) {
                    var r = st.left(dist, fade);
                    return r[transform_css] = " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, dist, orig, fade) {
                    return st.left(dist, fade)
                }, st.scaleright = _2d ? function(x, y, dist, orig, fade) {
                    var r = st.right(dist, fade);
                    return r[transform_css] = " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, dist, orig, fade) {
                    return st.right(dist, fade)
                }, st.scaletop = _2d ? function(x, y, dist, orig, fade) {
                    var r = st.top(dist, fade);
                    return r[transform_css] = " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, dist, orig, fade) {
                    return st.top(dist, fade)
                }, st.scalebottom = _2d ? function(x, y, dist, orig, fade) {
                    var r = st.bottom(dist, fade);
                    return r[transform_css] = " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, dist, orig, fade) {
                    return st.bottom(dist, fade)
                }, st.scalefrom = _2d ? function(x, y, leftdis, topdis, orig, fade) {
                    var r = st.from(leftdis, topdis, fade);
                    return r[transform_css] += " scaleX(" + x + ") scaleY(" + y + ")", orig && (r[transform_orig_css] = orig), r
                } : function(x, y, leftdis, topdis, orig, fade) {
                    return st.from(leftdis, topdis, fade)
                }, st.rotatescale = _2d ? function(deg, x, y, orig, fade) {
                    var r = st.scale(x, y, orig, fade);
                    return r[transform_css] += " rotate(" + deg + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function(deg, x, y, orig, fade) {
                    return st.scale(x, y, orig, fade)
                }, st.front = window._css3d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "perspective(2000px) translate3d(0 , 0 ," + dist + "px ) rotate(0.001deg)", r
                } : function() {
                    return _fade
                }, st.back = window._css3d ? function(dist, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "perspective(2000px) translate3d(0 , 0 ," + -dist + "px ) rotate(0.001deg)", r
                } : function() {
                    return _fade
                }, st.rotatefront = window._css3d ? function(deg, dist, orig, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "perspective(2000px) translate3d(0 , 0 ," + dist + "px ) rotate(" + (deg || .001) + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function() {
                    return _fade
                }, st.rotateback = window._css3d ? function(deg, dist, orig, fade) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return r[transform_css] = "perspective(2000px) translate3d(0 , 0 ," + -dist + "px ) rotate(" + (deg || .001) + "deg)", orig && (r[transform_orig_css] = orig), r
                } : function() {
                    return _fade
                }, st.rotate3dleft = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.left(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.left(dist, fade)
                }, st.rotate3dright = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.right(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.right(dist, fade)
                }, st.rotate3dtop = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.top(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.top(dist, fade)
                }, st.rotate3dbottom = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.bottom(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.bottom(dist, fade)
                }, st.rotate3dfront = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.front(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.front(dist, fade)
                }, st.rotate3dback = window._css3d ? function(x, y, z, dist, orig, fade) {
                    var r = st.back(dist, fade);
                    return r[transform_css] += (x ? " rotateX(" + x + "deg)" : " ") + (y ? " rotateY(" + y + "deg)" : "") + (z ? " rotateZ(" + z + "deg)" : ""), orig && (r[transform_orig_css] = orig), r
                } : function(x, y, z, dist, orig, fade) {
                    return st.back(dist, fade)
                }, st.t = window._css3d ? function(fade, tx, ty, tz, r, rx, ry, rz, scx, scy, skx, sky, ox, oy, oz) {
                    var _r = fade === !1 ? {} : {
                            opacity: 0
                        },
                        transform = "perspective(2000px) ";
                    "n" !== tx && (transform += "translateX(" + tx * st.rf + "px) "), "n" !== ty && (transform += "translateY(" + ty * st.rf + "px) "), "n" !== tz && (transform += "translateZ(" + tz * st.rf + "px) "), "n" !== r && (transform += "rotate(" + r + "deg) "), "n" !== rx && (transform += "rotateX(" + rx + "deg) "), "n" !== ry && (transform += "rotateY(" + ry + "deg) "), "n" !== rz && (transform += "rotateZ(" + rz + "deg) "), "n" !== skx && (transform += "skewX(" + skx + "deg) "), "n" !== sky && (transform += "skewY(" + sky + "deg) "), "n" !== scx && (transform += "scaleX(" + scx + ") "), "n" !== scy && (transform += "scaleY(" + scy + ")"), _r[transform_css] = transform;
                    var trans_origin = "";
                    return trans_origin += "n" !== ox ? ox + "% " : "50% ", trans_origin += "n" !== oy ? oy + "% " : "50% ", trans_origin += "n" !== oz ? oz + "px" : "", _r[transform_orig_css] = trans_origin, _r
                } : function(fade, tx, ty, tz, r) {
                    var r = fade === !1 ? {} : {
                        opacity: 0
                    };
                    return "n" !== tx && (r.left = tx * st.rf + "px"), "n" !== ty && (r.top = ty * st.rf + "px"), r
                }
            }
        }
    }(jQuery),
    function($) {
        window.MSLayerElement = function() {
            this.start_anim = {
                name: "fade",
                duration: 1e3,
                ease: "linear",
                delay: 0
            }, this.end_anim = {
                duration: 1e3,
                ease: "linear"
            }, this.type = "text", this.resizable = !0, this.minWidth = -1, this.isVisible = !0, this.__cssConfig = ["margin-top", "padding-top", "margin-bottom", "padding-left", "margin-right", "padding-right", "margin-left", "padding-bottom", "font-size", "line-height", "width", "left", "right", "top", "bottom"], this.baseStyle = {}
        };
        var p = MSLayerElement.prototype;
        p.setStartAnim = function(anim) {
            $.extend(this.start_anim, anim), $.extend(this.start_anim, this._parseEff(this.start_anim.name)), this.$element.css("visibility", "hidden")
        }, p.setEndAnim = function(anim) {
            $.extend(this.end_anim, anim)
        }, p.create = function() {
            if (this.$element.css("display", "none"), this.resizable = this.$element.data("resize") !== !1, this.fixed = this.$element.data("fixed") === !0, void 0 !== this.$element.data("widthlimit") && (this.minWidth = this.$element.data("widthlimit")), this.end_anim.name || (this.end_anim.name = this.start_anim.name), this.end_anim.time && (this.autoHide = !0), this.staticLayer = "static" === this.$element.data("position"), this.fixedLayer = "fixed" === this.$element.data("position"), this.layersCont = this.controller.$layers, this.staticLayer && this.$element.css("display", "").css("visibility", ""), void 0 !== this.$element.data("action")) {
                var slideController = this.slide.slider.slideController;
                this.$element.on("click", function(event) {
                    slideController.runAction($(this).data("action")), event.preventDefault()
                }).addClass("ms-action-layer")
            }
            $.extend(this.end_anim, this._parseEff(this.end_anim.name)), this.slider = this.slide.slider;
            var layerOrigin = this.layerOrigin = this.$element.data("origin");
            if (layerOrigin) {
                var vOrigin = layerOrigin.charAt(0),
                    hOrigin = layerOrigin.charAt(1),
                    offsetX = this.$element.data("offset-x"),
                    offsetY = this.$element.data("offset-y");
                switch (void 0 === offsetY && (offsetY = 0), vOrigin) {
                    case "t":
                        this.$element[0].style.top = offsetY + "px";
                        break;
                    case "b":
                        this.$element[0].style.bottom = offsetY + "px";
                        break;
                    case "m":
                        this.$element[0].style.top = offsetY + "px", this.middleAlign = !0
                }
                switch (void 0 === offsetX && (offsetX = 0), hOrigin) {
                    case "l":
                        this.$element[0].style.left = offsetX + "px";
                        break;
                    case "r":
                        this.$element[0].style.right = offsetX + "px";
                        break;
                    case "c":
                        this.$element[0].style.left = offsetX + "px", this.centerAlign = !0
                }
            }
            this.parallax = this.$element.data("parallax"), null != this.parallax && (this.parallax /= 100, this.$parallaxElement = $("<div></div>").addClass("ms-parallax-layer"), this.link ? (this.link.wrap(this.$parallaxElement), this.$parallaxElement = this.link.parent()) : (this.$element.wrap(this.$parallaxElement), this.$parallaxElement = this.$element.parent()), this._lastParaX = 0, this._lastParaY = 0, this._paraX = 0, this._paraY = 0, this.alignedToBot = this.layerOrigin && -1 !== this.layerOrigin.indexOf("b"), this.alignedToBot && this.$parallaxElement.css("bottom", 0), this.parallaxRender = window._css3d ? this._parallaxCSS3DRenderer : window._css2d ? this._parallaxCSS2DRenderer : this._parallax2DRenderer, "swipe" !== this.slider.options.parallaxMode && averta.Ticker.add(this.parallaxRender, this)), $.removeDataAttrs(this.$element, ["data-src"])
        }, p.init = function() {
            this.initialized = !0;
            var value;
            this.$element.css("visibility", "");
            for (var i = 0, l = this.__cssConfig.length; l > i; i++) {
                var key = this.__cssConfig[i];
                "text" === this.type && "width" === key ? value = this.$element[0].style.width : (value = this.$element.css(key), "width" !== key && "height" !== key || "0px" !== value || (value = this.$element.data(key) + "px")), "auto" != value && "" != value && "normal" != value && (this.baseStyle[key] = parseInt(value))
            }
            this.middleAlign && (this.baseHeight = this.$element.outerHeight(!1)), this.centerAlign && (this.baseWidth = this.$element.outerWidth(!1))
        }, p.locate = function() {
            if (this.slide.ready) {
                var factor, isPosition, width = parseFloat(this.layersCont.css("width")),
                    height = parseFloat(this.layersCont.css("height"));
                !this.staticLayer && "none" === this.$element.css("display") && this.isVisible && this.$element.css("display", "").css("visibility", "hidden"), factor = this.resizeFactor = width / this.slide.slider.options.width;
                for (var key in this.baseStyle) isPosition = "top" === key || "left" === key || "bottom" === key || "right" === key, factor = this.fixed && isPosition ? 1 : this.resizeFactor, (this.resizable || isPosition) && ("top" === key && this.middleAlign ? (this.$element[0].style.top = "0px", this.baseHeight = this.$element.outerHeight(!1), this.$element[0].style.top = this.baseStyle.top * factor + (height - this.baseHeight) / 2 + "px") : "left" === key && this.centerAlign ? (this.$element[0].style.left = "0px", this.baseWidth = this.$element.outerWidth(!1), this.$element[0].style.left = this.baseStyle.left * factor + (width - this.baseWidth) / 2 + "px") : this.$element.css(key, this.baseStyle[key] * factor + "px"));
                this.visible(this.minWidth < width)
            }
        }, p.start = function() {
            if (!this.isShowing && !this.staticLayer) {
                this.isShowing = !0;
                var key, base;
                MSLayerEffects.rf = this.resizeFactor;
                var effect_css = MSLayerEffects[this.start_anim.eff_name].apply(null, this._parseEffParams(this.start_anim.eff_params)),
                    start_css_eff = {};
                for (key in effect_css) this._checkPosKey(key, effect_css) || (null != MSLayerEffects.defaultValues[key] && (start_css_eff[key] = MSLayerEffects.defaultValues[key]), key in this.baseStyle && (base = this.baseStyle[key], this.middleAlign && "top" === key && (base += (parseInt(this.layersCont.height()) - this.$element.outerHeight(!1)) / 2), this.centerAlign && "left" === key && (base += (parseInt(this.layersCont.width()) - this.$element.outerWidth(!1)) / 2), effect_css[key] = base + parseFloat(effect_css[key]) + "px", start_css_eff[key] = base + "px"), this.$element.css(key, effect_css[key]));
                var that = this;
                clearTimeout(this.to), this.to = setTimeout(function() {
                    that.$element.css("visibility", ""), that._playAnimation(that.start_anim, start_css_eff)
                }, that.start_anim.delay || .01), this.clTo = setTimeout(function() {
                    that.show_cl = !0
                }, (this.start_anim.delay || .01) + this.start_anim.duration), this.autoHide && (clearTimeout(this.hto), this.hto = setTimeout(function() {
                    that.hide()
                }, that.end_anim.time))
            }
        }, p.hide = function() {
            if (!this.staticLayer) {
                this.isShowing = !1;
                var effect_css = MSLayerEffects[this.end_anim.eff_name].apply(null, this._parseEffParams(this.end_anim.eff_params));
                for (key in effect_css) this._checkPosKey(key, effect_css) || (key === window._jcsspfx + "TransformOrigin" && this.$element.css(key, effect_css[key]), key in this.baseStyle && (effect_css[key] = this.baseStyle[key] + parseFloat(effect_css[key]) + "px"));
                this._playAnimation(this.end_anim, effect_css), clearTimeout(this.to), clearTimeout(this.hto), clearTimeout(this.clTo)
            }
        }, p.reset = function() {
            this.staticLayer || (this.isShowing = !1, this.$element[0].style.display = "none", this.$element.css("opacity", ""), this.$element[0].style.transitionDuration = "", this.show_tween && this.show_tween.stop(!0), clearTimeout(this.to), clearTimeout(this.hto))
        }, p.destroy = function() {
            this.reset(), this.$element.remove()
        }, p.visible = function(value) {
            this.isVisible != value && (this.isVisible = value, this.$element.css("display", value ? "" : "none"))
        }, p.moveParallax = function(x, y, fast) {
            this._paraX = x, this._paraY = y, fast && (this._lastParaX = x, this._lastParaY = y, this.parallaxRender())
        }, p._playAnimation = function(animation, css) {
            var options = {};
            animation.ease && (options.ease = animation.ease), options.transProperty = window._csspfx + "transform,opacity", this.show_tween = CTween.animate(this.$element, animation.duration, css, options)
        }, p._randomParam = function(value) {
            var min = Number(value.slice(0, value.indexOf("|"))),
                max = Number(value.slice(value.indexOf("|") + 1));
            return min + Math.random() * (max - min)
        }, p._parseEff = function(eff_name) {
            var eff_params = [];
            if (-1 !== eff_name.indexOf("(")) {
                var value, temp = eff_name.slice(0, eff_name.indexOf("(")).toLowerCase();
                eff_params = eff_name.slice(eff_name.indexOf("(") + 1, -1).replace(/\"|\'|\s/g, "").split(","), eff_name = temp;
                for (var i = 0, l = eff_params.length; l > i; ++i) value = eff_params[i], value in MSLayerEffects.presetEffParams && (value = MSLayerEffects.presetEffParams[value]), eff_params[i] = value
            }
            return {
                eff_name: eff_name,
                eff_params: eff_params
            }
        }, p._parseEffParams = function(params) {
            for (var eff_params = [], i = 0, l = params.length; l > i; ++i) {
                var value = params[i];
                "string" == typeof value && -1 !== value.indexOf("|") && (value = this._randomParam(value)), eff_params[i] = value
            }
            return eff_params
        }, p._checkPosKey = function(key, style) {
            return "left" === key && !(key in this.baseStyle) && "right" in this.baseStyle ? (style.right = -parseInt(style.left) + "px", delete style.left, !0) : "top" === key && !(key in this.baseStyle) && "bottom" in this.baseStyle ? (style.bottom = -parseInt(style.top) + "px", delete style.top, !0) : !1
        }, p._parallaxCalc = function() {
            var x_def = this._paraX - this._lastParaX,
                y_def = this._paraY - this._lastParaY;
            this._lastParaX += x_def / 12, this._lastParaY += y_def / 12, Math.abs(x_def) < .019 && (this._lastParaX = this._paraX), Math.abs(y_def) < .019 && (this._lastParaY = this._paraY)
        }, p._parallaxCSS3DRenderer = function() {
            this._parallaxCalc(), this.$parallaxElement[0].style[window._jcsspfx + "Transform"] = "translateX(" + this._lastParaX * this.parallax + "px) translateY(" + this._lastParaY * this.parallax + "px) translateZ(0)"
        }, p._parallaxCSS2DRenderer = function() {
            this._parallaxCalc(), this.$parallaxElement[0].style[window._jcsspfx + "Transform"] = "translateX(" + this._lastParaX * this.parallax + "px) translateY(" + this._lastParaY * this.parallax + "px)"
        }, p._parallax2DRenderer = function() {
            this._parallaxCalc(), this.alignedToBot ? this.$parallaxElement[0].style.bottom = this._lastParaY * this.parallax + "px" : this.$parallaxElement[0].style.top = this._lastParaY * this.parallax + "px", this.$parallaxElement[0].style.left = this._lastParaX * this.parallax + "px"
        }
    }(jQuery),
    function($) {
        window.MSImageLayerElement = function() {
            MSLayerElement.call(this), this.needPreload = !0, this.__cssConfig = ["width", "height", "margin-top", "padding-top", "margin-bottom", "padding-left", "margin-right", "padding-right", "margin-left", "padding-bottom", "left", "right", "top", "bottom"], this.type = "image"
        }, MSImageLayerElement.extend(MSLayerElement);
        var p = MSImageLayerElement.prototype,
            _super = MSLayerElement.prototype;
        p.create = function() {
            if (this.link) {
                var p = this.$element.parent();
                p.append(this.link), this.link.append(this.$element), this.link.removeClass("ms-layer"), this.$element.addClass("ms-layer"), p = null
            }
            if (_super.create.call(this), void 0 != this.$element.data("src")) this.img_src = this.$element.data("src"), this.$element.removeAttr("data-src");
            else {
                var that = this;
                this.$element.on("load", function() {
                    that.controller.preloadCount--, 0 === that.controller.preloadCount && that.controller._onlayersReady()
                }).each($.jqLoadFix)
            }
            $.browser.msie && this.$element.on("dragstart", function(event) {
                event.preventDefault()
            })
        }, p.loadImage = function() {
            var that = this;
            this.$element.preloadImg(this.img_src, function() {
                that.controller.preloadCount--, 0 === that.controller.preloadCount && that.controller._onlayersReady()
            })
        }
    }(jQuery),
    function($) {
        window.MSVideoLayerElement = function() {
            MSLayerElement.call(this), this.__cssConfig.push("height"), this.type = "video"
        }, MSVideoLayerElement.extend(MSLayerElement);
        var p = MSVideoLayerElement.prototype,
            _super = MSLayerElement.prototype;
        p.__playVideo = function() {
            this.img && CTween.fadeOut(this.img, 500, 2), CTween.fadeOut(this.video_btn, 500, 2), this.video_frame.attr("src", "about:blank").css("display", "block"), -1 == this.video_url.indexOf("?") && (this.video_url += "?"), this.video_frame.attr("src", this.video_url + "&autoplay=1")
        }, p.start = function() {
            _super.start.call(this), this.$element.data("autoplay") && this.__playVideo()
        }, p.reset = function() {
            return _super.reset.call(this), (this.needPreload || this.$element.data("btn")) && (this.video_btn.css("opacity", 1).css("display", "block"), this.video_frame.attr("src", "about:blank").css("display", "none")), this.needPreload ? void this.img.css("opacity", 1).css("display", "block") : void this.video_frame.attr("src", this.video_url)
        }, p.create = function() {
            _super.create.call(this), this.video_frame = this.$element.find("iframe").css({
                width: "100%",
                height: "100%"
            }), this.video_url = this.video_frame.attr("src");
            var has_img = 0 != this.$element.has("img").length;
            if (has_img || this.$element.data("btn")) {
                this.video_frame.attr("src", "about:blank").css("display", "none");
                var that = this;
                if (this.video_btn = $("<div></div>").appendTo(this.$element).addClass("ms-video-btn").click(function() {
                        that.__playVideo()
                    }), has_img) {
                    if (this.needPreload = !0, this.img = this.$element.find("img:first").addClass("ms-video-img"), void 0 !== this.img.data("src")) this.img_src = this.img.data("src"), this.img.removeAttr("data-src");
                    else {
                        var that = this;
                        this.img.attr("src", this.img_src).on("load", function() {
                            that.controller.preloadCount--, 0 === that.controller.preloadCount && that.controller._onlayersReady()
                        }).each($.jqLoadFix)
                    }
                    $.browser.msie && this.img.on("dragstart", function(event) {
                        event.preventDefault()
                    })
                }
            }
        }, p.loadImage = function() {
            var that = this;
            this.img.preloadImg(this.img_src, function() {
                that.controller.preloadCount--, 0 === that.controller.preloadCount && that.controller._onlayersReady()
            })
        }
    }(jQuery),
    function($) {
        "use strict";
        window.MSHotspotLayer = function() {
            MSLayerElement.call(this), this.__cssConfig = ["margin-top", "padding-top", "margin-bottom", "padding-left", "margin-right", "padding-right", "margin-left", "padding-bottom", "left", "right", "top", "bottom"], this.ease = "Expo", this.hide_start = !0, this.type = "hotspot"
        }, MSHotspotLayer.extend(MSLayerElement);
        var p = MSHotspotLayer.prototype,
            _super = MSLayerElement.prototype;
        p._showTT = function() {
            this.show_cl && (clearTimeout(this.hto), this._tween && this._tween.stop(!0), this.hide_start && (this.align = this._orgAlign, this._locateTT(), this.tt.css({
                display: "block"
            }), this._tween = CTween.animate(this.tt, 900, this.to, {
                ease: "easeOut" + this.ease
            }), this.hide_start = !1))
        }, p._hideTT = function() {
            if (this.show_cl) {
                this._tween && this._tween.stop(!0);
                var that = this;
                clearTimeout(this.hto), this.hto = setTimeout(function() {
                    that.hide_start = !0, that._tween = CTween.animate(that.tt, 900, that.from, {
                        ease: "easeOut" + that.ease,
                        complete: function() {
                            that.tt.css("display", "none")
                        }
                    })
                }, 200)
            }
        }, p._updateClassName = function(name) {
            this._lastClass && this.tt.removeClass(this._lastClass), this.tt.addClass(name), this._lastClass = name
        }, p._alignPolicy = function() {
            {
                var w = (this.tt.outerHeight(!1), Math.max(this.tt.outerWidth(!1), parseInt(this.tt.css("max-width")))),
                    ww = window.innerWidth;
                window.innerHeight
            }
            switch (this.align) {
                case "top":
                    if (this.base_t < 0) return "bottom";
                    break;
                case "right":
                    if (this.base_l + w > ww || this.base_t < 0) return "bottom";
                    break;
                case "left":
                    if (this.base_l < 0 || this.base_t < 0) return "bottom"
            }
            return null
        }, p._locateTT = function() {
            var os = this.$element.offset(),
                os2 = this.slide.slider.$element.offset(),
                dist = 50,
                space = 15;
            this.pos_x = os.left - os2.left - this.slide.slider.$element.scrollLeft(), this.pos_y = os.top - os2.top - this.slide.slider.$element.scrollTop(), this.from = {
                opacity: 0
            }, this.to = {
                opacity: 1
            }, this._updateClassName("ms-tooltip-" + this.align), this.tt_arrow.css("margin-left", "");
            var arrow_w = 15,
                arrow_h = 15;
            switch (this.align) {
                case "top":
                    var w = Math.min(this.tt.outerWidth(!1), parseInt(this.tt.css("max-width")));
                    this.base_t = this.pos_y - this.tt.outerHeight(!1) - arrow_h - space, this.base_l = this.pos_x - w / 2, this.base_l + w > window.innerWidth && (this.tt_arrow.css("margin-left", -arrow_w / 2 + this.base_l + w - window.innerWidth + "px"), this.base_l = window.innerWidth - w), this.base_l < 0 && (this.base_l = 0, this.tt_arrow.css("margin-left", -arrow_w / 2 + this.pos_x - this.tt.outerWidth(!1) / 2 + "px")), window._css3d ? (this.from[window._jcsspfx + "Transform"] = "translateY(-" + dist + "px)", this.to[window._jcsspfx + "Transform"] = "") : (this.from.top = this.base_t - dist + "px", this.to.top = this.base_t + "px");
                    break;
                case "bottom":
                    var w = Math.min(this.tt.outerWidth(!1), parseInt(this.tt.css("max-width")));
                    this.base_t = this.pos_y + arrow_h + space, this.base_l = this.pos_x - w / 2, this.base_l + w > window.innerWidth && (this.tt_arrow.css("margin-left", -arrow_w / 2 + this.base_l + w - window.innerWidth + "px"), this.base_l = window.innerWidth - w), this.base_l < 0 && (this.base_l = 0, this.tt_arrow.css("margin-left", -arrow_w / 2 + this.pos_x - this.tt.outerWidth(!1) / 2 + "px")), window._css3d ? (this.from[window._jcsspfx + "Transform"] = "translateY(" + dist + "px)", this.to[window._jcsspfx + "Transform"] = "") : (this.from.top = this.base_t + dist + "px", this.to.top = this.base_t + "px");
                    break;
                case "right":
                    this.base_l = this.pos_x + arrow_w + space, this.base_t = this.pos_y - this.tt.outerHeight(!1) / 2, window._css3d ? (this.from[window._jcsspfx + "Transform"] = "translateX(" + dist + "px)", this.to[window._jcsspfx + "Transform"] = "") : (this.from.left = this.base_l + dist + "px", this.to.left = this.base_l + "px");
                    break;
                case "left":
                    this.base_l = this.pos_x - arrow_w - this.tt.outerWidth(!1) - space, this.base_t = this.pos_y - this.tt.outerHeight(!1) / 2, window._css3d ? (this.from[window._jcsspfx + "Transform"] = "translateX(-" + dist + "px)", this.to[window._jcsspfx + "Transform"] = "") : (this.from.left = this.base_l - dist + "px", this.to.left = this.base_l + "px")
            }
            var policyAlign = this._alignPolicy();
            return null !== policyAlign ? (this.align = policyAlign, void this._locateTT()) : (this.tt.css("top", parseInt(this.base_t) + "px").css("left", parseInt(this.base_l) + "px"), void this.tt.css(this.from))
        }, p.start = function() {
            _super.start.call(this), this.tt.appendTo(this.slide.slider.$element), this.tt.css("display", "none")
        }, p.reset = function() {
            _super.reset.call(this), this.tt.detach()
        }, p.create = function() {
            var that = this;
            this._orgAlign = this.align = void 0 !== this.$element.data("align") ? this.$element.data("align") : "top", this.data = this.$element.html(), this.$element.html("").on("mouseenter", function() {
                that._showTT()
            }).on("mouseleave", function() {
                that._hideTT()
            }), this.point = $('<div><div class="ms-point-center"></div><div class="ms-point-border"></div></div>').addClass("ms-tooltip-point").appendTo(this.$element);
            var link = this.$element.data("link"),
                target = this.$element.data("target");
            link && this.point.on("click", function() {
                window.open(link, target || "_self")
            }), this.tt = $("<div></div>").addClass("ms-tooltip").css("display", "hidden").css("opacity", 0), void 0 !== this.$element.data("width") && this.tt.css("width", this.$element.data("width")).css("max-width", this.$element.data("width")), this.tt_arrow = $("<div></div>").addClass("ms-tooltip-arrow").appendTo(this.tt), this._updateClassName("ms-tooltip-" + this.align), this.ttcont = $("<div></div>").addClass("ms-tooltip-cont").html(this.data).appendTo(this.tt), this.$element.data("stay-hover") === !0 && this.tt.on("mouseenter", function() {
                that.hide_start || (clearTimeout(that.hto), that._tween.stop(!0), that._showTT())
            }).on("mouseleave", function() {
                that._hideTT()
            }), _super.create.call(this)
        }
    }(jQuery),
    function() {
        window.MSButtonLayer = function() {
            MSLayerElement.call(this), this.type = "button"
        }, MSButtonLayer.extend(MSLayerElement);
        var p = MSButtonLayer.prototype,
            _super = MSLayerElement.prototype,
            positionKies = ["top", "left", "bottom", "right"];
        p.create = function() {
            _super.create.call(this), this.$element.wrap('<div class="ms-btn-container"></div>').css("position", "relative"), this.$container = this.$element.parent()
        }, p.locate = function() {
            _super.locate.call(this);
            for (var key, tempValue, i = 0; 4 > i; i++) key = positionKies[i], key in this.baseStyle && (tempValue = this.$element.css(key), this.$element.css(key, ""), this.$container.css(key, tempValue));
            this.$container.width(this.$element.outerWidth(!0)).height(this.$element.outerHeight(!0))
        }
    }(jQuery), window.MSSliderEvent = function(type) {
        this.type = type
    }, MSSliderEvent.CHANGE_START = "ms_changestart", MSSliderEvent.CHANGE_END = "ms_changeend", MSSliderEvent.WAITING = "ms_waiting", MSSliderEvent.AUTOPLAY_CHANGE = "ms_autoplaychange", MSSliderEvent.VIDEO_PLAY = "ms_videoPlay", MSSliderEvent.VIDEO_CLOSE = "ms_videoclose", MSSliderEvent.INIT = "ms_init", MSSliderEvent.HARD_UPDATE = "ms_hard_update", MSSliderEvent.RESIZE = "ms_resize", MSSliderEvent.RESERVED_SPACE_CHANGE = "ms_rsc", MSSliderEvent.DESTROY = "ms_destroy",
    function(window, document, $) {
        "use strict";
        window.MSSlide = function() {
            this.$element = null, this.$loading = $("<div></div>").addClass("ms-slide-loading"), this.view = null, this.index = -1, this.__width = 0, this.__height = 0, this.fillMode = "fill", this.selected = !1, this.pselected = !1, this.autoAppend = !0, this.isSleeping = !0, this.moz = $.browser.mozilla
        };
        var p = MSSlide.prototype;
        p.onSwipeStart = function() {
            this.link && (this.linkdis = !0), this.video && (this.videodis = !0)
        }, p.onSwipeMove = function(e) {
            var move = Math.max(Math.abs(e.data.distanceX), Math.abs(e.data.distanceY));
            this.swipeMoved = move > 4
        }, p.onSwipeCancel = function() {
            return this.swipeMoved ? void(this.swipeMoved = !1) : (this.link && (this.linkdis = !1), void(this.video && (this.videodis = !1)))
        }, p.setupLayerController = function() {
            this.hasLayers = !0, this.layerController = new MSLayerController(this)
        }, p.assetsLoaded = function() {
            this.ready = !0, this.slider.api._startTimer(), (this.selected || this.pselected && this.slider.options.instantStartLayers) && (this.hasLayers && this.layerController.showLayers(), this.vinit && (this.bgvideo.play(), this.autoPauseBgVid || (this.bgvideo.currentTime = 0))), this.isSleeping || this.setupBG(), CTween.fadeOut(this.$loading, 300, !0), (0 === this.slider.options.preload || "all" === this.slider.options.preload) && this.index < this.view.slideList.length - 1 ? this.view.slideList[this.index + 1].loadImages() : "all" === this.slider.options.preload && this.index === this.view.slideList.length - 1 && this.slider._removeLoading()
        }, p.setBG = function(img) {
            this.hasBG = !0;
            var that = this;
            this.$imgcont = $("<div></div>").addClass("ms-slide-bgcont"), this.$element.append(this.$loading).append(this.$imgcont), this.$bg_img = $(img).css("visibility", "hidden"), this.$imgcont.append(this.$bg_img), this.bgAligner = new MSAligner(that.fillMode, that.$imgcont, that.$bg_img), this.bgAligner.widthOnly = this.slider.options.autoHeight, that.slider.options.autoHeight && (that.pselected || that.selected) && that.slider.setHeight(that.slider.options.height), void 0 !== this.$bg_img.data("src") ? (this.bg_src = this.$bg_img.data("src"), this.$bg_img.removeAttr("data-src")) : this.$bg_img.one("load", function(event) {
                that._onBGLoad(event)
            }).each($.jqLoadFix)
        }, p.setupBG = function() {
            !this.initBG && this.bgLoaded && (this.initBG = !0, this.$bg_img.css("visibility", ""), this.bgWidth = this.bgNatrualWidth || this.$bg_img.width(), this.bgHeight = this.bgNatrualHeight || this.$bg_img.height(), CTween.fadeIn(this.$imgcont, 300), this.slider.options.autoHeight && this.$imgcont.height(this.bgHeight * this.ratio), this.bgAligner.init(this.bgWidth, this.bgHeight), this.setSize(this.__width, this.__height), this.slider.options.autoHeight && (this.pselected || this.selected) && this.slider.setHeight(this.getHeight()))
        }, p.loadImages = function() {
            if (!this.ls) {
                if (this.ls = !0, this.bgvideo && this.bgvideo.load(), this.hasBG && this.bg_src) {
                    var that = this;
                    this.$bg_img.preloadImg(this.bg_src, function(event) {
                        that._onBGLoad(event)
                    })
                }
                this.hasLayers && this.layerController.loadLayers(this._onLayersLoad), this.hasBG || this.hasLayers || this.assetsLoaded()
            }
        }, p._onLayersLoad = function() {
            this.layersLoaded = !0, (!this.hasBG || this.bgLoaded) && this.assetsLoaded()
        }, p._onBGLoad = function(event) {
            this.bgNatrualWidth = event.width, this.bgNatrualHeight = event.height, this.bgLoaded = !0, $.browser.msie && this.$bg_img.on("dragstart", function(event) {
                event.preventDefault()
            }), (!this.hasLayers || this.layerController.ready) && this.assetsLoaded()
        }, p.setBGVideo = function($video) {
            if ($video[0].play) {
                if (window._mobile) return void $video.remove();
                this.bgvideo = $video[0];
                var that = this;
                $video.addClass("ms-slide-bgvideo"), $video.data("loop") !== !1 && this.bgvideo.addEventListener("ended", function() {
                    that.bgvideo.play()
                }), $video.data("mute") !== !1 && (this.bgvideo.muted = !0), $video.data("autopause") === !0 && (this.autoPauseBgVid = !0), this.bgvideo_fillmode = $video.data("fill-mode") || "fill", "none" !== this.bgvideo_fillmode && (this.bgVideoAligner = new MSAligner(this.bgvideo_fillmode, this.$element, $video), this.bgvideo.addEventListener("loadedmetadata", function() {
                    that.vinit || (that.vinit = !0, that.video_aspect = that.bgVideoAligner.baseHeight / that.bgVideoAligner.baseWidth, that.bgVideoAligner.init(that.bgvideo.videoWidth, that.bgvideo.videoHeight), that._alignBGVideo(), CTween.fadeIn($(that.bgvideo), 200), that.selected && that.bgvideo.play())
                })), $video.css("opacity", 0), this.$bgvideocont = $("<div></div>").addClass("ms-slide-bgvideocont").append($video), this.hasBG ? this.$imgcont.before(this.$bgvideocont) : this.$bgvideocont.appendTo(this.$element)
            }
        }, p._alignBGVideo = function() {
            this.bgvideo_fillmode && "none" !== this.bgvideo_fillmode && this.bgVideoAligner.align()
        }, p.setSize = function(width, height, hard) {
            this.__width = width, this.slider.options.autoHeight && (this.bgLoaded ? (this.ratio = this.__width / this.bgWidth, height = Math.floor(this.ratio * this.bgHeight), this.$imgcont.height(height)) : (this.ratio = width / this.slider.options.width, height = this.slider.options.height * this.ratio)), this.__height = height, this.$element.width(width).height(height), this.hasBG && this.bgLoaded && this.bgAligner.align(), this._alignBGVideo(), this.hasLayers && this.layerController.setSize(width, height, hard)
        }, p.getHeight = function() {
            return this.hasBG && this.bgLoaded ? this.bgHeight * this.ratio : Math.max(this.$element[0].clientHeight, this.slider.options.height * this.ratio)
        }, p.__playVideo = function() {
            this.vplayed || this.videodis || (this.vplayed = !0, this.slider.api.paused || (this.slider.api.pause(), this.roc = !0), this.vcbtn.css("display", ""), CTween.fadeOut(this.vpbtn, 500, !1), CTween.fadeIn(this.vcbtn, 500), CTween.fadeIn(this.vframe, 500), this.vframe.css("display", "block").attr("src", this.video + "&autoplay=1"), this.view.$element.addClass("ms-def-cursor"), this.moz && this.view.$element.css("perspective", "none"), this.view.swipeControl && this.view.swipeControl.disable(), this.slider.slideController.dispatchEvent(new MSSliderEvent(MSSliderEvent.VIDEO_PLAY)))
        }, p.__closeVideo = function() {
            if (this.vplayed) {
                this.vplayed = !1, this.roc && this.slider.api.resume();
                var that = this;
                CTween.fadeIn(this.vpbtn, 500), CTween.animate(this.vcbtn, 500, {
                    opacity: 0
                }, {
                    complete: function() {
                        that.vcbtn.css("display", "none")
                    }
                }), CTween.animate(this.vframe, 500, {
                    opacity: 0
                }, {
                    complete: function() {
                        that.vframe.attr("src", "about:blank").css("display", "none")
                    }
                }), this.moz && this.view.$element.css("perspective", ""), this.view.swipeControl && this.view.swipeControl.enable(), this.view.$element.removeClass("ms-def-cursor"), this.slider.slideController.dispatchEvent(new MSSliderEvent(MSSliderEvent.VIDEO_CLOSE))
            }
        }, p.create = function() {
            var that = this;
            this.hasLayers && this.layerController.create(), this.link && this.link.addClass("ms-slide-link").html("").click(function(e) {
                that.linkdis && e.preventDefault()
            }), this.video && (-1 === this.video.indexOf("?") && (this.video += "?"), this.vframe = $("<iframe></iframe>").addClass("ms-slide-video").css({
                width: "100%",
                height: "100%",
                display: "none"
            }).attr("src", "about:blank").attr("allowfullscreen", "true").appendTo(this.$element), this.vpbtn = $("<div></div>").addClass("ms-slide-vpbtn").click(function() {
                that.__playVideo()
            }).appendTo(this.$element), this.vcbtn = $("<div></div>").addClass("ms-slide-vcbtn").click(function() {
                that.__closeVideo()
            }).appendTo(this.$element).css("display", "none"), window._touch && this.vcbtn.removeClass("ms-slide-vcbtn").addClass("ms-slide-vcbtn-mobile").append('<div class="ms-vcbtn-txt">Close video</div>').appendTo(this.view.$element.parent())), !this.slider.options.autoHeight && this.hasBG && (this.$imgcont.css("height", "100%"), ("center" === this.fillMode || "stretch" === this.fillMode) && (this.fillMode = "fill")), this.slider.options.autoHeight && this.$element.addClass("ms-slide-auto-height"), this.sleep(!0)
        }, p.destroy = function() {
            this.hasLayers && (this.layerController.destroy(), this.layerController = null), this.$element.remove(), this.$element = null
        }, p.prepareToSelect = function() {
            this.pselected || this.selected || (this.pselected = !0, (this.link || this.video) && (this.view.addEventListener(MSViewEvents.SWIPE_START, this.onSwipeStart, this), this.view.addEventListener(MSViewEvents.SWIPE_MOVE, this.onSwipeMove, this), this.view.addEventListener(MSViewEvents.SWIPE_CANCEL, this.onSwipeCancel, this), this.linkdis = !1, this.swipeMoved = !1), this.loadImages(), this.hasLayers && this.layerController.prepareToShow(), this.ready && (this.bgvideo && this.bgvideo.play(), this.hasLayers && this.slider.options.instantStartLayers && this.layerController.showLayers()), this.moz && this.$element.css("margin-top", ""))
        }, p.select = function() {
            this.selected || (this.selected = !0, this.pselected = !1, this.$element.addClass("ms-sl-selected"), this.hasLayers && (this.slider.options.autoHeight && this.layerController.updateHeight(), this.slider.options.instantStartLayers || this.layerController.showLayers()), this.ready && this.bgvideo && this.bgvideo.play(), this.videoAutoPlay && (this.videodis = !1, this.vpbtn.trigger("click")))
        }, p.unselect = function() {
            this.pselected = !1, this.moz && this.$element.css("margin-top", "0.1px"), (this.link || this.video) && (this.view.removeEventListener(MSViewEvents.SWIPE_START, this.onSwipeStart, this), this.view.removeEventListener(MSViewEvents.SWIPE_MOVE, this.onSwipeMove, this), this.view.removeEventListener(MSViewEvents.SWIPE_CANCEL, this.onSwipeCancel, this)), this.bgvideo && (this.bgvideo.pause(), !this.autoPauseBgVid && this.vinit && (this.bgvideo.currentTime = 0)), this.hasLayers && this.layerController.hideLayers(), this.selected && (this.selected = !1, this.$element.removeClass("ms-sl-selected"), this.video && this.vplayed && (this.__closeVideo(), this.roc = !1))
        }, p.sleep = function(force) {
            (!this.isSleeping || force) && (this.isSleeping = !0, this.autoAppend && this.$element.detach(), this.hasLayers && this.layerController.onSlideSleep())
        }, p.wakeup = function() {
            this.isSleeping && (this.isSleeping = !1, this.autoAppend && this.view.$slideCont.append(this.$element), this.moz && this.$element.css("margin-top", "0.1px"), this.setupBG(), this.hasBG && this.bgAligner.align(), this.hasLayers && this.layerController.onSlideWakeup())
        }
    }(window, document, jQuery),
    function($) {
        "use strict";
        var SliderViewList = {};
        window.MSSlideController = function(slider) {
            this._delayProgress = 0, this._timer = new averta.Timer(100), this._timer.onTimer = this.onTimer, this._timer.refrence = this, this.currentSlide = null, this.slider = slider, this.so = slider.options, averta.EventDispatcher.call(this)
        }, MSSlideController.registerView = function(name, _class) {
            if (name in SliderViewList) throw new Error(name + ", is already registered.");
            SliderViewList[name] = _class
        }, MSSlideController.SliderControlList = {}, MSSlideController.registerControl = function(name, _class) {
            if (name in MSSlideController.SliderControlList) throw new Error(name + ", is already registered.");
            MSSlideController.SliderControlList[name] = _class
        };
        var p = MSSlideController.prototype;
        p.setupView = function() {
            var that = this;
            this.resize_listener = function() {
                that.__resize()
            };
            var viewOptions = {
                spacing: this.so.space,
                mouseSwipe: this.so.mouse,
                loop: this.so.loop,
                autoHeight: this.so.autoHeight,
                swipe: this.so.swipe,
                speed: this.so.speed,
                dir: this.so.dir,
                viewNum: this.so.inView,
                critMargin: this.so.critMargin
            };
            this.so.viewOptions && $.extend(viewOptions, this.so.viewOptions), this.so.autoHeight && (this.so.heightLimit = !1);
            var viewClass = SliderViewList[this.slider.options.view] || MSBasicView;
            if (!viewClass._3dreq || window._css3d && !$.browser.msie || (viewClass = viewClass._fallback || MSBasicView), this.view = new viewClass(viewOptions), this.so.overPause) {
                var that = this;
                this.slider.$element.mouseenter(function() {
                    that.is_over = !0, that._stopTimer()
                }).mouseleave(function() {
                    that.is_over = !1, that._startTimer()
                })
            }
        }, p.onChangeStart = function() {
            this.change_started = !0, this.currentSlide && this.currentSlide.unselect(), this.currentSlide = this.view.currentSlide, this.currentSlide.prepareToSelect(), this.so.endPause && this.currentSlide.index === this.slider.slides.length - 1 && (this.pause(), this.skipTimer()), this.so.autoHeight && this.slider.setHeight(this.currentSlide.getHeight()), this.so.deepLink && this.__updateWindowHash(), this.dispatchEvent(new MSSliderEvent(MSSliderEvent.CHANGE_START))
        }, p.onChangeEnd = function() {
            if (this.change_started = !1, this._startTimer(), this.currentSlide.select(), this.so.preload > 1) {
                var loc, i, slide, l = this.so.preload - 1;
                for (i = 1; l >= i; ++i) {
                    if (loc = this.view.index + i, loc >= this.view.slideList.length) {
                        if (!this.so.loop) {
                            i = l;
                            continue
                        }
                        loc -= this.view.slideList.length
                    }
                    slide = this.view.slideList[loc], slide && slide.loadImages()
                }
                for (l > this.view.slideList.length / 2 && (l = Math.floor(this.view.slideList.length / 2)), i = 1; l >= i; ++i) {
                    if (loc = this.view.index - i, 0 > loc) {
                        if (!this.so.loop) {
                            i = l;
                            continue
                        }
                        loc = this.view.slideList.length + loc
                    }
                    slide = this.view.slideList[loc], slide && slide.loadImages()
                }
            }
            this.dispatchEvent(new MSSliderEvent(MSSliderEvent.CHANGE_END))
        }, p.onSwipeStart = function() {
            this.skipTimer()
        }, p.skipTimer = function() {
            this._timer.reset(), this._delayProgress = 0, this.dispatchEvent(new MSSliderEvent(MSSliderEvent.WAITING))
        }, p.onTimer = function() {
            if (this._timer.getTime() >= 1e3 * this.view.currentSlide.delay && (this.skipTimer(), this.view.next(), this.hideCalled = !1), this._delayProgress = this._timer.getTime() / (10 * this.view.currentSlide.delay), this.so.hideLayers && !this.hideCalled && 1e3 * this.view.currentSlide.delay - this._timer.getTime() <= 300) {
                var currentSlide = this.view.currentSlide;
                currentSlide.hasLayers && currentSlide.layerController.animHideLayers(), this.hideCalled = !0
            }
            this.dispatchEvent(new MSSliderEvent(MSSliderEvent.WAITING))
        }, p._stopTimer = function() {
            this._timer && this._timer.stop()
        }, p._startTimer = function() {
            this.paused || this.is_over || !this.currentSlide || !this.currentSlide.ready || this.change_started || this._timer.start()
        }, p.__appendSlides = function() {
            var slide, loc, i = 0,
                l = this.view.slideList.length - 1;
            for (i; l > i; ++i) slide = this.view.slideList[i], slide.detached || (slide.$element.detach(), slide.detached = !0);
            for (this.view.appendSlide(this.view.slideList[this.view.index]), l = 3, i = 1; l >= i; ++i) {
                if (loc = this.view.index + i, loc >= this.view.slideList.length) {
                    if (!this.so.loop) {
                        i = l;
                        continue
                    }
                    loc -= this.view.slideList.length
                }
                slide = this.view.slideList[loc], slide.detached = !1, this.view.appendSlide(slide)
            }
            for (l > this.view.slideList.length / 2 && (l = Math.floor(this.view.slideList.length / 2)), i = 1; l >= i; ++i) {
                if (loc = this.view.index - i, 0 > loc) {
                    if (!this.so.loop) {
                        i = l;
                        continue
                    }
                    loc = this.view.slideList.length + loc
                }
                slide = this.view.slideList[loc], slide.detached = !1, this.view.appendSlide(slide)
            }
        }, p.__resize = function(hard) {
            this.created && (this.width = this.slider.$element[0].clientWidth || this.so.width, this.so.fullwidth || (this.width = Math.min(this.width, this.so.width)), this.so.fullheight ? (this.so.heightLimit = !1, this.so.autoHeight = !1, this.height = this.slider.$element[0].clientHeight) : this.height = this.width / this.slider.aspect, this.so.autoHeight ? (this.currentSlide.setSize(this.width, null, hard), this.view.setSize(this.width, this.currentSlide.getHeight(), hard)) : this.view.setSize(this.width, Math.max(this.so.minHeight, this.so.heightLimit ? Math.min(this.height, this.so.height) : this.height), hard), this.slider.$controlsCont && this.so.centerControls && this.so.fullwidth && this.view.$element.css("left", Math.min(0, -(this.slider.$element[0].clientWidth - this.so.width) / 2) + "px"), this.dispatchEvent(new MSSliderEvent(MSSliderEvent.RESIZE)))
        }, p.__dispatchInit = function() {
            this.dispatchEvent(new MSSliderEvent(MSSliderEvent.INIT))
        }, p.__updateWindowHash = function() {
            var hash = window.location.hash,
                dl = this.so.deepLink,
                dlt = this.so.deepLinkType,
                eq = "path" === dlt ? "/" : "=",
                sep = "path" === dlt ? "/" : "&",
                sliderHash = dl + eq + (this.view.index + 1),
                regTest = new RegExp(dl + eq + "[0-9]+", "g");
            window.location.hash = "" === hash ? sep + sliderHash : regTest.test(hash) ? hash.replace(regTest, sliderHash) : hash + sep + sliderHash
        }, p.__curentSlideInHash = function() {
            var hash = window.location.hash,
                dl = this.so.deepLink,
                dlt = this.so.deepLinkType,
                eq = "path" === dlt ? "/" : "=",
                regTest = new RegExp(dl + eq + "[0-9]+", "g");
            if (regTest.test(hash)) {
                var index = Number(hash.match(regTest)[0].match(/[0-9]+/g).pop());
                if (!isNaN(index)) return index - 1
            }
            return -1
        }, p.__onHashChanged = function() {
            var index = this.__curentSlideInHash(); - 1 !== index && this.gotoSlide(index)
        }, p.setup = function() {
            this.created = !0, this.paused = !this.so.autoplay, this.view.addEventListener(MSViewEvents.CHANGE_START, this.onChangeStart, this), this.view.addEventListener(MSViewEvents.CHANGE_END, this.onChangeEnd, this), this.view.addEventListener(MSViewEvents.SWIPE_START, this.onSwipeStart, this), this.currentSlide = this.view.slideList[this.so.start - 1], this.__resize();
            var slideInHash = this.__curentSlideInHash(),
                startSlide = -1 !== slideInHash ? slideInHash : this.so.start - 1;
            if (this.view.create(startSlide), 0 === this.so.preload && this.view.slideList[0].loadImages(), this.scroller = this.view.controller, this.so.wheel) {
                var that = this,
                    last_time = (new Date).getTime();
                this.wheellistener = function(event) {
                    var e = window.event || event.orginalEvent || event;
                    e.preventDefault();
                    var current_time = (new Date).getTime();
                    if (!(400 > current_time - last_time)) {
                        last_time = current_time;
                        var delta = Math.abs(e.detail || e.wheelDelta);
                        $.browser.mozilla && (delta *= 100);
                        var scrollThreshold = 15;
                        return e.detail < 0 || e.wheelDelta > 0 ? delta >= scrollThreshold && that.previous(!0) : delta >= scrollThreshold && that.next(!0), !1
                    }
                }, $.browser.mozilla ? this.slider.$element[0].addEventListener("DOMMouseScroll", this.wheellistener) : this.slider.$element.bind("mousewheel", this.wheellistener)
            }
            0 === this.slider.$element[0].clientWidth && (this.slider.init_safemode = !0), this.__resize();
            var that = this;
            this.so.deepLink && $(window).on("hashchange", function() {
                that.__onHashChanged()
            })
        }, p.index = function() {
            return this.view.index
        }, p.count = function() {
            return this.view.slidesCount
        }, p.next = function(checkLoop) {
            this.skipTimer(), this.view.next(checkLoop)
        }, p.previous = function(checkLoop) {
            this.skipTimer(), this.view.previous(checkLoop)
        }, p.gotoSlide = function(index) {
            index = Math.min(index, this.count() - 1), this.skipTimer(), this.view.gotoSlide(index)
        }, p.destroy = function(reset) {
            this.dispatchEvent(new MSSliderEvent(MSSliderEvent.DESTROY)), this.slider.destroy(reset)
        }, p._destroy = function() {
            this._timer.reset(), this._timer = null, $(window).unbind("resize", this.resize_listener), this.view.destroy(), this.view = null, this.so.wheel && ($.browser.mozilla ? this.slider.$element[0].removeEventListener("DOMMouseScroll", this.wheellistener) : this.slider.$element.unbind("mousewheel", this.wheellistener), this.wheellistener = null), this.so = null
        }, p.runAction = function(action) {
            var actionParams = [];
            if (-1 !== action.indexOf("(")) {
                var temp = action.slice(0, action.indexOf("("));
                actionParams = action.slice(action.indexOf("(") + 1, -1).replace(/\"|\'|\s/g, "").split(","), action = temp
            }
            action in this ? this[action].apply(this, actionParams) : console
        }, p.update = function(hard) {
            this.slider.init_safemode && hard && (this.slider.init_safemode = !1), this.__resize(hard), hard && this.dispatchEvent(new MSSliderEvent(MSSliderEvent.HARD_UPDATE))
        }, p.locate = function() {
            this.__resize()
        }, p.resume = function() {
            this.paused && (this.paused = !1, this._startTimer())
        }, p.pause = function() {
            this.paused || (this.paused = !0, this._stopTimer())
        }, p.currentTime = function() {
            return this._delayProgress
        }, averta.EventDispatcher.extend(p)
    }(jQuery),
    function($) {
        "use strict";
        var LayerTypes = {
            image: MSImageLayerElement,
            text: MSLayerElement,
            video: MSVideoLayerElement,
            hotspot: MSHotspotLayer,
            button: MSButtonLayer
        };
        window.MasterSlider = function() {
            this.options = {
                autoplay: !1,
                loop: !1,
                mouse: !0,
                swipe: !0,
                grabCursor: !0,
                space: 0,
                fillMode: "fill",
                start: 1,
                view: "basic",
                width: 300,
                height: 150,
                inView: 15,
                critMargin: 1,
                heightLimit: !0,
                smoothHeight: !0,
                autoHeight: !1,
                minHeight: -1,
                fullwidth: !1,
                fullheight: !1,
                autofill: !1,
                layersMode: "center",
                hideLayers: !1,
                endPause: !1,
                centerControls: !0,
                overPause: !0,
                shuffle: !1,
                speed: 17,
                dir: "h",
                preload: 0,
                wheel: !1,
                layout: "boxed",
                autofillTarget: null,
                fullscreenMargin: 0,
                instantStartLayers: !1,
                parallaxMode: "mouse",
                rtl: !1,
                deepLink: null,
                deepLinkType: "path",
                disablePlugins: []
            }, this.slides = [], this.activePlugins = [], this.$element = null, this.lastMargin = 0, this.leftSpace = 0, this.topSpace = 0, this.rightSpace = 0, this.bottomSpace = 0, this._holdOn = 0;
            var that = this;
            this.resize_listener = function() {
                that._resize()
            }, $(window).bind("resize", this.resize_listener)
        }, MasterSlider.author = "Averta Ltd. (www.averta.net)", MasterSlider.version = "2.15.1", MasterSlider.releaseDate = "Jul 2015", MasterSlider._plugins = [];
        var MS = MasterSlider;
        MS.registerPlugin = function(plugin) {
            -1 === MS._plugins.indexOf(plugin) && MS._plugins.push(plugin)
        };
        var p = MasterSlider.prototype;
        p.__setupSlides = function() {
            var new_slide, that = this,
                ind = 0;
            this.$element.children(".ms-slide").each(function() {
                var $slide_ele = $(this);
                new_slide = new MSSlide, new_slide.$element = $slide_ele, new_slide.slider = that, new_slide.delay = void 0 !== $slide_ele.data("delay") ? $slide_ele.data("delay") : 3, new_slide.fillMode = void 0 !== $slide_ele.data("fill-mode") ? $slide_ele.data("fill-mode") : that.options.fillMode, new_slide.index = ind++;
                var slide_img = $slide_ele.children("img:not(.ms-layer)");
                slide_img.length > 0 && new_slide.setBG(slide_img[0]);
                var slide_video = $slide_ele.children("video");
                if (slide_video.length > 0 && new_slide.setBGVideo(slide_video), that.controls)
                    for (var i = 0, l = that.controls.length; l > i; ++i) that.controls[i].slideAction(new_slide);
                $slide_ele.children("a").each(function() {
                    var $this = $(this);
                    "video" === this.getAttribute("data-type") ? (new_slide.video = this.getAttribute("href"), new_slide.videoAutoPlay = $this.data("autoplay"), $this.remove()) : $this.hasClass("ms-layer") || (new_slide.link = $(this))
                });
                that.__createSlideLayers(new_slide, $slide_ele.find(".ms-layer")), that.slides.push(new_slide), that.slideController.view.addSlide(new_slide)
            })
        }, p.__createSlideLayers = function(slide, layers) {
            0 != layers.length && (slide.setupLayerController(), layers.each(function(index, domEle) {
                var $parent_ele, $layer_element = $(this);
                "A" === domEle.nodeName && "image" === $layer_element.find(">img").data("type") && ($parent_ele = $(this), $layer_element = $parent_ele.find("img"));
                var layer = new(LayerTypes[$layer_element.data("type") || "text"]);
                layer.$element = $layer_element, layer.link = $parent_ele;
                var eff_parameters = {},
                    end_eff_parameters = {};
                void 0 !== $layer_element.data("effect") && (eff_parameters.name = $layer_element.data("effect")), void 0 !== $layer_element.data("ease") && (eff_parameters.ease = $layer_element.data("ease")), void 0 !== $layer_element.data("duration") && (eff_parameters.duration = $layer_element.data("duration")), void 0 !== $layer_element.data("delay") && (eff_parameters.delay = $layer_element.data("delay")), $layer_element.data("hide-effect") && (end_eff_parameters.name = $layer_element.data("hide-effect")), $layer_element.data("hide-ease") && (end_eff_parameters.ease = $layer_element.data("hide-ease")), void 0 !== $layer_element.data("hide-duration") && (end_eff_parameters.duration = $layer_element.data("hide-duration")), void 0 !== $layer_element.data("hide-time") && (end_eff_parameters.time = $layer_element.data("hide-time")), layer.setStartAnim(eff_parameters), layer.setEndAnim(end_eff_parameters), slide.layerController.addLayer(layer)
            }))
        }, p._removeLoading = function() {
            $(window).unbind("resize", this.resize_listener), this.$element.removeClass("before-init").css("visibility", "visible").css("height", "").css("opacity", 0), CTween.fadeIn(this.$element), this.$loading.remove(), this.slideController && this.slideController.__resize()
        }, p._resize = function() {
            if (this.$loading) {
                var h = this.$loading[0].clientWidth / this.aspect;
                h = this.options.heightLimit ? Math.min(h, this.options.height) : h, this.$loading.height(h), this.$element.height(h)
            }
        }, p._shuffleSlides = function() {
            for (var r, slides = this.$element.children(".ms-slide"), i = 0, l = slides.length; l > i; ++i) r = Math.floor(Math.random() * (l - 1)), i != r && (this.$element[0].insertBefore(slides[i], slides[r]), slides = this.$element.children(".ms-slide"))
        }, p._setupSliderLayout = function() {
            this._updateSideMargins(), this.lastMargin = this.leftSpace;
            var lo = this.options.layout;
            "boxed" !== lo && "partialview" !== lo && (this.options.fullwidth = !0), ("fullscreen" === lo || "autofill" === lo) && (this.options.fullheight = !0, "autofill" === lo && (this.$autofillTarget = $(this.options.autofillTarget), 0 === this.$autofillTarget.length && (this.$autofillTarget = this.$element.parent()))), "partialview" === lo && this.$element.addClass("ms-layout-partialview"), ("fullscreen" === lo || "fullwidth" === lo || "autofill" === lo) && ($(window).bind("resize", {
                that: this
            }, this._updateLayout), this._updateLayout()), $(window).bind("resize", this.slideController.resize_listener)
        }, p._updateLayout = function(event) {
            var that = event ? event.data.that : this,
                lo = that.options.layout,
                $element = that.$element,
                $win = $(window);
            if ("fullscreen" === lo) document.body.style.overflow = "hidden", $element.height($win.height() - that.options.fullscreenMargin - that.topSpace - that.bottomSpace), document.body.style.overflow = "";
            else if ("autofill" === lo) return void $element.height(that.$autofillTarget.height() - that.options.fullscreenMargin - that.topSpace - that.bottomSpace).width(that.$autofillTarget.width() - that.leftSpace - that.rightSpace);
            $element.width($win.width() - that.leftSpace - that.rightSpace);
            var margin = -$element.offset().left + that.leftSpace + that.lastMargin;
            $element.css("margin-left", margin), that.lastMargin = margin
        }, p._init = function() {
            if (!(this._holdOn > 0) && this._docReady) {
                if (this.initialized = !0, "all" !== this.options.preload && this._removeLoading(), this.options.shuffle && this._shuffleSlides(), MSLayerEffects.setup(), this.slideController.setupView(), this.view = this.slideController.view, this.$controlsCont = $("<div></div>").addClass("ms-inner-controls-cont"), this.options.centerControls && this.$controlsCont.css("max-width", this.options.width + "px"), this.$controlsCont.prepend(this.view.$element), this.$msContainer = $("<div></div>").addClass("ms-container").prependTo(this.$element).append(this.$controlsCont), this.controls)
                    for (var i = 0, l = this.controls.length; l > i; ++i) this.controls[i].setup();
                if (this._setupSliderLayout(), this.__setupSlides(), this.slideController.setup(), this.controls)
                    for (i = 0, l = this.controls.length; l > i; ++i) this.controls[i].create();
                if (this.options.autoHeight && this.slideController.view.$element.height(this.slideController.currentSlide.getHeight()), this.options.swipe && !window._touch && this.options.grabCursor && this.options.mouse) {
                    var $view = this.view.$element;
                    $view.mousedown(function() {
                        $view.removeClass("ms-grab-cursor"), $view.addClass("ms-grabbing-cursor"), $.browser.msie && window.ms_grabbing_curosr && ($view[0].style.cursor = "url(" + window.ms_grabbing_curosr + "), move")
                    }).addClass("ms-grab-cursor"), $(document).mouseup(function() {
                        $view.removeClass("ms-grabbing-cursor"), $view.addClass("ms-grab-cursor"), $.browser.msie && window.ms_grab_curosr && ($view[0].style.cursor = "url(" + window.ms_grab_curosr + "), move")
                    })
                }
                this.slideController.__dispatchInit()
            }
        }, p.setHeight = function(value) {
            this.options.smoothHeight ? (this.htween && (this.htween.reset ? this.htween.reset() : this.htween.stop(!0)), this.htween = CTween.animate(this.slideController.view.$element, 500, {
                height: value
            }, {
                ease: "easeOutQuart"
            })) : this.slideController.view.$element.height(value)
        }, p.reserveSpace = function(side, space) {
            var sideSpace = side + "Space",
                pos = this[sideSpace];
            return this[sideSpace] += space, this._updateSideMargins(), pos
        }, p._updateSideMargins = function() {
            this.$element.css("margin", this.topSpace + "px " + this.rightSpace + "px " + this.bottomSpace + "px " + this.leftSpace + "px")
        }, p._realignControls = function() {
            this.rightSpace = this.leftSpace = this.topSpace = this.bottomSpace = 0, this._updateSideMargins(), this.api.dispatchEvent(new MSSliderEvent(MSSliderEvent.RESERVED_SPACE_CHANGE))
        }, p.control = function(control, options) {
            if (control in MSSlideController.SliderControlList) {
                this.controls || (this.controls = []);
                var ins = new MSSlideController.SliderControlList[control](options);
                return ins.slider = this, this.controls.push(ins), this
            }
        }, p.holdOn = function() {
            this._holdOn++
        }, p.release = function() {
            this._holdOn--, this._init()
        }, p.setup = function(target, options) {
            if (this.$element = "string" == typeof target ? $("#" + target) : target.eq(0), this.setupMarkup = this.$element.html(), 0 !== this.$element.length) {
                this.$element.addClass("master-slider").addClass("before-init"), $.browser.msie ? this.$element.addClass("ms-ie").addClass("ms-ie" + $.browser.version.slice(0, $.browser.version.indexOf("."))) : $.browser.webkit ? this.$element.addClass("ms-wk") : $.browser.mozilla && this.$element.addClass("ms-moz");
                var ua = navigator.userAgent.toLowerCase(),
                    isAndroid = ua.indexOf("android") > -1;
                isAndroid && this.$element.addClass("ms-android");
                var that = this;
                $.extend(this.options, options), this.aspect = this.options.width / this.options.height, this.$loading = $("<div></div>").addClass("ms-loading-container").insertBefore(this.$element).append($("<div></div>").addClass("ms-loading")), this.$loading.parent().css("position", "relative"), this.options.autofill && (this.options.fullwidth = !0, this.options.fullheight = !0), this.options.fullheight && this.$element.addClass("ms-fullheight"), this._resize(), this.slideController = new MSSlideController(this), this.api = this.slideController;
                for (var i = 0, l = MS._plugins.length; i !== l; i++) {
                    var plugin = MS._plugins[i]; - 1 === this.options.disablePlugins.indexOf(plugin.name) && this.activePlugins.push(new plugin(this))
                }
                return $(document).ready(function() {
                    that._docReady = !0, that._init()
                }), this
            }
        }, p.destroy = function(insertMarkup) {
            for (var i = 0, l = this.activePlugins.length; i !== l; i++) this.activePlugins[i].destroy();
            if (this.controls)
                for (i = 0, l = this.controls.length; i !== l; i++) this.controls[i].destroy();
            this.slideController && this.slideController._destroy(), this.$loading && this.$loading.remove(), insertMarkup ? this.$element.html(this.setupMarkup).css("visibility", "hidden") : this.$element.remove();
            var lo = this.options.layout;
            ("fullscreen" === lo || "fullwidth" === lo) && $(window).unbind("resize", this._updateLayout), this.view = null, this.slides = null, this.options = null, this.slideController = null, this.api = null, this.resize_listener = null, this.activePlugins = null
        }
    }(jQuery),
    function($, window, document, undefined) {
        function MasterSliderPlugin(element, options) {
            this.element = element, this.$element = $(element), this.settings = $.extend({}, defaults, options), this._defaults = defaults, this._name = pluginName, this.init()
        }
        var pluginName = "masterslider",
            defaults = {
                controls: {}
            };
        $.extend(MasterSliderPlugin.prototype, {
            init: function() {
                var self = this;
                this._slider = new MasterSlider;
                for (var control in this.settings.controls) this._slider.control(control, this.settings.controls[control]);
                this._slider.setup(this.$element, this.settings);
                var _superDispatch = this._slider.api.dispatchEvent;
                this._slider.api.dispatchEvent = function(event) {
                    self.$element.trigger(event.type), _superDispatch.call(this, event)
                }
            },
            api: function() {
                return this._slider.api
            },
            slider: function() {
                return this._slider
            }
        }), $.fn[pluginName] = function(options) {
            var args = arguments,
                plugin = "plugin_" + pluginName;
            if (options === undefined || "object" == typeof options) return this.each(function() {
                $.data(this, plugin) || $.data(this, plugin, new MasterSliderPlugin(this, options))
            });
            if ("string" == typeof options && "_" !== options[0] && "init" !== options) {
                var returns;
                return this.each(function() {
                    var instance = $.data(this, plugin);
                    instance instanceof MasterSliderPlugin && "function" == typeof instance[options] && (returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1))), instance instanceof MasterSliderPlugin && "function" == typeof instance._slider.api[options] && (returns = instance._slider.api[options].apply(instance._slider.api, Array.prototype.slice.call(args, 1))), "destroy" === options && $.data(this, plugin, null)
                }), returns !== undefined ? returns : this
            }
        }
    }(jQuery, window, document), window.MSViewEvents = function(type, data) {
        this.type = type, this.data = data
    }, MSViewEvents.SWIPE_START = "swipeStart", MSViewEvents.SWIPE_END = "swipeEnd", MSViewEvents.SWIPE_MOVE = "swipeMove", MSViewEvents.SWIPE_CANCEL = "swipeCancel", MSViewEvents.SCROLL = "scroll", MSViewEvents.CHANGE_START = "slideChangeStart", MSViewEvents.CHANGE_END = "slideChangeEnd",
    function($) {
        "use strict";
        window.MSBasicView = function(options) {
            this.options = {
                loop: !1,
                dir: "h",
                autoHeight: !1,
                spacing: 5,
                mouseSwipe: !0,
                swipe: !0,
                speed: 17,
                minSlideSpeed: 2,
                viewNum: 20,
                critMargin: 1
            }, $.extend(this.options, options), this.dir = this.options.dir, this.loop = this.options.loop, this.spacing = this.options.spacing, this.__width = 0, this.__height = 0, this.__cssProb = "h" === this.dir ? "left" : "top", this.__offset = "h" === this.dir ? "offsetLeft" : "offsetTop", this.__dimension = "h" === this.dir ? "__width" : "__height", this.__translate_end = window._css3d ? " translateZ(0px)" : "", this.$slideCont = $("<div></div>").addClass("ms-slide-container"), this.$element = $("<div></div>").addClass("ms-view").addClass("ms-basic-view").append(this.$slideCont), this.currentSlide = null, this.index = -1, this.slidesCount = 0, this.slides = [], this.slideList = [], this.viewSlidesList = [], this.css3 = window._cssanim, this.start_buffer = 0, this.firstslide_snap = 0, this.slideChanged = !1, this.controller = new Controller(0, 0, {
                snapping: !0,
                snapsize: 100,
                paging: !0,
                snappingMinSpeed: this.options.minSlideSpeed,
                friction: (100 - .5 * this.options.speed) / 100,
                endless: this.loop
            }), this.controller.renderCallback("h" === this.dir ? this._horizUpdate : this._vertiUpdate, this), this.controller.snappingCallback(this.__snapUpdate, this), this.controller.snapCompleteCallback(this.__snapCompelet, this), averta.EventDispatcher.call(this)
        };
        var p = MSBasicView.prototype;
        p.__snapCompelet = function() {
            this.slideChanged && (this.slideChanged = !1, this.__locateSlides(), this.start_buffer = 0, this.dispatchEvent(new MSViewEvents(MSViewEvents.CHANGE_END)))
        }, p.__snapUpdate = function(controller, snap, change) {
            if (this.loop) {
                var target_index = this.index + change;
                this.updateLoop(target_index), target_index >= this.slidesCount && (target_index -= this.slidesCount), 0 > target_index && (target_index = this.slidesCount + target_index), this.index = target_index
            } else {
                if (0 > snap || snap >= this.slidesCount) return;
                this.index = snap
            }
            this._checkCritMargins(), $.browser.mozilla && (this.slideList[this.index].$element[0].style.marginTop = "0.1px", this.currentSlide && (this.currentSlide.$element[0].style.marginTop = ""));
            var new_slide = this.slideList[this.index];
            new_slide !== this.currentSlide && (this.currentSlide = new_slide, this.autoUpdateZIndex && this.__updateSlidesZindex(), this.slideChanged = !0, this.dispatchEvent(new MSViewEvents(MSViewEvents.CHANGE_START)))
        }, p._checkCritMargins = function() {
            if (!this.normalMode) {
                var hlf = Math.floor(this.options.viewNum / 2),
                    inView = this.viewSlidesList.indexOf(this.slideList[this.index]),
                    size = this[this.__dimension] + this.spacing,
                    cm = this.options.critMargin;
                return this.loop ? void((cm >= inView || inView >= this.viewSlidesList.length - cm) && (size *= inView - hlf, this.__locateSlides(!1, size + this.start_buffer), this.start_buffer += size)) : void((cm > inView && this.index >= cm || inView >= this.viewSlidesList.length - cm && this.index < this.slidesCount - cm) && this.__locateSlides(!1))
            }
        }, p._vertiUpdate = function(controller, value) {
            return this.__contPos = value, this.dispatchEvent(new MSViewEvents(MSViewEvents.SCROLL)), this.css3 ? void(this.$slideCont[0].style[window._jcsspfx + "Transform"] = "translateY(" + -value + "px)" + this.__translate_end) : void(this.$slideCont[0].style.top = -value + "px")
        }, p._horizUpdate = function(controller, value) {
            return this.__contPos = value, this.dispatchEvent(new MSViewEvents(MSViewEvents.SCROLL)), this.css3 ? void(this.$slideCont[0].style[window._jcsspfx + "Transform"] = "translateX(" + -value + "px)" + this.__translate_end) : void(this.$slideCont[0].style.left = -value + "px")
        }, p.__updateViewList = function() {
            if (this.normalMode) return void(this.viewSlidesList = this.slides);
            var temp = this.viewSlidesList.slice();
            this.viewSlidesList = [];
            var l, i = 0,
                hlf = Math.floor(this.options.viewNum / 2);
            if (this.loop)
                for (; i !== this.options.viewNum; i++) this.viewSlidesList.push(this.slides[this.currentSlideLoc - hlf + i]);
            else {
                for (i = 0; i !== hlf && this.index - i !== -1; i++) this.viewSlidesList.unshift(this.slideList[this.index - i]);
                for (i = 1; i !== hlf && this.index + i !== this.slidesCount; i++) this.viewSlidesList.push(this.slideList[this.index + i])
            }
            for (i = 0, l = temp.length; i !== l; i++) - 1 === this.viewSlidesList.indexOf(temp[i]) && temp[i].sleep();
            temp = null, this.currentSlide && this.__updateSlidesZindex()
        }, p.__locateSlides = function(move, start) {
            this.__updateViewList(), start = this.loop ? start || 0 : this.slides.indexOf(this.viewSlidesList[0]) * (this[this.__dimension] + this.spacing);
            for (var slide, l = this.viewSlidesList.length, i = 0; i !== l; i++) {
                var pos = start + i * (this[this.__dimension] + this.spacing);
                slide = this.viewSlidesList[i], slide.wakeup(), slide.position = pos, slide.$element[0].style[this.__cssProb] = pos + "px"
            }
            move !== !1 && this.controller.changeTo(this.slideList[this.index].position, !1, null, null, !1)
        }, p.__createLoopList = function() {
            var return_arr = [],
                i = 0,
                count = this.slidesCount / 2,
                before_count = this.slidesCount % 2 === 0 ? count - 1 : Math.floor(count),
                after_count = this.slidesCount % 2 === 0 ? count : Math.floor(count);
            for (this.currentSlideLoc = before_count, i = 1; before_count >= i; ++i) return_arr.unshift(this.slideList[this.index - i < 0 ? this.slidesCount - i + this.index : this.index - i]);
            for (return_arr.push(this.slideList[this.index]), i = 1; after_count >= i; ++i) return_arr.push(this.slideList[this.index + i >= this.slidesCount ? this.index + i - this.slidesCount : this.index + i]);
            return return_arr
        }, p.__getSteps = function(index, target) {
            var right = index > target ? this.slidesCount - index + target : target - index,
                left = Math.abs(this.slidesCount - right);
            return left > right ? right : -left
        }, p.__pushEnd = function() {
            var first_slide = this.slides.shift(),
                last_slide = this.slides[this.slidesCount - 2];
            if (this.slides.push(first_slide), this.normalMode) {
                var pos = last_slide.$element[0][this.__offset] + this.spacing + this[this.__dimension];
                first_slide.$element[0].style[this.__cssProb] = pos + "px", first_slide.position = pos
            }
        }, p.__pushStart = function() {
            var last_slide = this.slides.pop(),
                first_slide = this.slides[0];
            if (this.slides.unshift(last_slide), this.normalMode) {
                var pos = first_slide.$element[0][this.__offset] - this.spacing - this[this.__dimension];
                last_slide.$element[0].style[this.__cssProb] = pos + "px", last_slide.position = pos
            }
        }, p.__updateSlidesZindex = function() {
            {
                var slide, l = this.viewSlidesList.length;
                Math.floor(l / 2)
            }
            if (this.loop)
                for (var loc = this.viewSlidesList.indexOf(this.currentSlide), i = 0; i !== l; i++) slide = this.viewSlidesList[i], this.viewSlidesList[i].$element.css("z-index", loc >= i ? i + 1 : l - i);
            else {
                for (var beforeNum = this.currentSlide.index - this.viewSlidesList[0].index, i = 0; i !== l; i++) this.viewSlidesList[i].$element.css("z-index", beforeNum >= i ? i + 1 : l - i);
                this.currentSlide.$element.css("z-index", l)
            }
        }, p.addSlide = function(slide) {
            slide.view = this, this.slides.push(slide), this.slideList.push(slide), this.slidesCount++
        }, p.appendSlide = function(slide) {
            this.$slideCont.append(slide.$element)
        }, p.updateLoop = function(index) {
            if (this.loop)
                for (var steps = this.__getSteps(this.index, index), i = 0, l = Math.abs(steps); l > i; ++i) 0 > steps ? this.__pushStart() : this.__pushEnd()
        }, p.gotoSlide = function(index, fast) {
            this.updateLoop(index), this.index = index;
            var target_slide = this.slideList[index];
            this._checkCritMargins(), this.controller.changeTo(target_slide.position, !fast, null, null, !1), target_slide !== this.currentSlide && (this.slideChanged = !0, this.currentSlide = target_slide, this.autoUpdateZIndex && this.__updateSlidesZindex(), this.dispatchEvent(new MSViewEvents(MSViewEvents.CHANGE_START)), fast && this.dispatchEvent(new MSViewEvents(MSViewEvents.CHANGE_END)))
        }, p.next = function(checkLoop) {
            return checkLoop && !this.loop && this.index + 1 >= this.slidesCount ? void this.controller.bounce(10) : void this.gotoSlide(this.index + 1 >= this.slidesCount ? 0 : this.index + 1)
        }, p.previous = function(checkLoop) {
            return checkLoop && !this.loop && this.index - 1 < 0 ? void this.controller.bounce(-10) : void this.gotoSlide(this.index - 1 < 0 ? this.slidesCount - 1 : this.index - 1)
        }, p.setupSwipe = function() {
            this.swipeControl = new averta.TouchSwipe(this.$element), this.swipeControl.swipeType = "h" === this.dir ? "horizontal" : "vertical";
            var that = this;
            this.swipeControl.onSwipe = "h" === this.dir ? function(status) {
                that.horizSwipeMove(status)
            } : function(status) {
                that.vertSwipeMove(status)
            }
        }, p.vertSwipeMove = function(status) {
            var phase = status.phase;
            if ("start" === phase) this.controller.stop(), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_START, status));
            else if ("move" === phase && (!this.loop || Math.abs(this.currentSlide.position - this.controller.value + status.moveY) < this.cont_size / 2)) this.controller.drag(status.moveY), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_MOVE, status));
            else if ("end" === phase || "cancel" === phase) {
                var speed = status.distanceY / status.duration * 50 / 3;
                Math.abs(speed) > .1 ? (this.controller.push(-speed), speed > this.controller.options.snappingMinSpeed && this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_END, status))) : (this.controller.cancel(), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_CANCEL, status)))
            }
        }, p.horizSwipeMove = function(status) {
            var phase = status.phase;
            if ("start" === phase) this.controller.stop(), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_START, status));
            else if ("move" === phase && (!this.loop || Math.abs(this.currentSlide.position - this.controller.value + status.moveX) < this.cont_size / 2)) this.controller.drag(status.moveX), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_MOVE, status));
            else if ("end" === phase || "cancel" === phase) {
                var speed = status.distanceX / status.duration * 50 / 3;
                Math.abs(speed) > .1 ? (this.controller.push(-speed), speed > this.controller.options.snappingMinSpeed && this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_END, status))) : (this.controller.cancel(), this.dispatchEvent(new MSViewEvents(MSViewEvents.SWIPE_CANCEL, status)))
            }
        }, p.setSize = function(width, height, hard) {
            if (this.lastWidth !== width || height !== this.lastHeight || hard) {
                this.$element.width(width).height(height);
                for (var i = 0; i < this.slidesCount; ++i) this.slides[i].setSize(width, height, hard);
                this.__width = width, this.__height = height, this.__created && (this.__locateSlides(), this.cont_size = (this.slidesCount - 1) * (this[this.__dimension] + this.spacing), this.loop || (this.controller._max_value = this.cont_size), this.controller.options.snapsize = this[this.__dimension] + this.spacing, this.controller.changeTo(this.currentSlide.position, !1, null, null, !1), this.controller.cancel(), this.lastWidth = width, this.lastHeight = height)
            }
        }, p.create = function(index) {
            this.__created = !0, this.index = Math.min(index || 0, this.slidesCount - 1), this.lastSnap = this.index, this.loop && (this.slides = this.__createLoopList()), this.normalMode = this.slidesCount <= this.options.viewNum;
            for (var i = 0; i < this.slidesCount; ++i) this.slides[i].create();
            this.__locateSlides(), this.controller.options.snapsize = this[this.__dimension] + this.spacing, this.loop || (this.controller._max_value = (this.slidesCount - 1) * (this[this.__dimension] + this.spacing)), this.gotoSlide(this.index, !0), this.options.swipe && (window._touch || this.options.mouseSwipe) && this.setupSwipe()
        }, p.destroy = function() {
            if (this.__created) {
                for (var i = 0; i < this.slidesCount; ++i) this.slides[i].destroy();
                this.slides = null, this.slideList = null, this.$element.remove(), this.controller.destroy(), this.controller = null
            }
        }, averta.EventDispatcher.extend(p), MSSlideController.registerView("basic", MSBasicView)
    }(jQuery),
    function() {
        "use strict";
        window.MSWaveView = function(options) {
            MSBasicView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-wave-view"), this.$slideCont.css(window._csspfx + "transform-style", "preserve-3d"), this.autoUpdateZIndex = !0
        }, MSWaveView.extend(MSBasicView), MSWaveView._3dreq = !0, MSWaveView._fallback = MSBasicView;
        var p = MSWaveView.prototype,
            _super = MSBasicView.prototype;
        p._horizUpdate = function(controller, value) {
            _super._horizUpdate.call(this, controller, value);
            for (var slide, distance, cont_scroll = -value, i = 0; i < this.slidesCount; ++i) slide = this.slideList[i], distance = -cont_scroll - slide.position, this.__updateSlidesHoriz(slide, distance)
        }, p._vertiUpdate = function(controller, value) {
            _super._vertiUpdate.call(this, controller, value);
            for (var slide, distance, cont_scroll = -value, i = 0; i < this.slidesCount; ++i) slide = this.slideList[i], distance = -cont_scroll - slide.position, this.__updateSlidesVertic(slide, distance)
        }, p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            slide.$element.css(window._csspfx + "transform", "translateZ(" + 3 * -value + "px) rotateY(0.01deg)")
        }, p.__updateSlidesVertic = function(slide, distance) {
            this.__updateSlidesHoriz(slide, distance)
        }, MSSlideController.registerView("wave", MSWaveView)
    }(jQuery),
    function() {
        window.MSFadeBasicView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-fade-basic-view")
        }, MSFadeBasicView.extend(MSWaveView); {
            var p = MSFadeBasicView.prototype;
            MSFadeBasicView.prototype
        }
        p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(.6 * distance / this.__width);
            value = 1 - Math.min(value, .6), slide.$element.css("opacity", value)
        }, p.__updateSlidesVertic = function(slide, distance) {
            this.__updateSlidesHoriz(slide, distance)
        }, MSSlideController.registerView("fadeBasic", MSFadeBasicView), MSWaveView._fallback = MSFadeBasicView
    }(),
    function() {
        window.MSFadeWaveView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-fade-wave-view")
        }, MSFadeWaveView.extend(MSWaveView), MSFadeWaveView._3dreq = !0, MSFadeWaveView._fallback = MSFadeBasicView; {
            var p = MSFadeWaveView.prototype;
            MSWaveView.prototype
        }
        p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            value = Math.min(value, 100), slide.$element.css("opacity", 1 - value / 300), slide.$element[0].style[window._jcsspfx + "Transform"] = "scale(" + (1 - value / 800) + ") rotateY(0.01deg) "
        }, p.__updateSlidesVertic = function(slide, distance) {
            this.__updateSlidesHoriz(slide, distance)
        }, MSSlideController.registerView("fadeWave", MSFadeWaveView)
    }(),
    function() {
        "use strict";
        window.MSFlowView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-flow-view")
        }, MSFlowView.extend(MSWaveView), MSFlowView._3dreq = !0, MSFlowView._fallback = MSFadeBasicView; {
            var p = MSFlowView.prototype;
            MSWaveView.prototype
        }
        p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width),
                rvalue = Math.min(.3 * value, 30) * (0 > distance ? -1 : 1),
                zvalue = 1.2 * value;
            slide.$element[0].style[window._jcsspfx + "Transform"] = "translateZ(" + 5 * -zvalue + "px) rotateY(" + rvalue + "deg) "
        }, p.__updateSlidesVertic = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width),
                rvalue = Math.min(.3 * value, 30) * (0 > distance ? -1 : 1),
                zvalue = 1.2 * value;
            slide.$element[0].style[window._jcsspfx + "Transform"] = "translateZ(" + 5 * -zvalue + "px) rotateX(" + -rvalue + "deg) "
        }, MSSlideController.registerView("flow", MSFlowView)
    }(jQuery),
    function() {
        window.MSFadeFlowView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-fade-flow-view")
        }, MSFadeFlowView.extend(MSWaveView), MSFadeFlowView._3dreq = !0; {
            var p = MSFadeFlowView.prototype;
            MSWaveView.prototype
        }
        p.__calculate = function(distance) {
            var value = Math.min(Math.abs(100 * distance / this.__width), 100),
                rvalue = Math.min(.5 * value, 50) * (0 > distance ? -1 : 1);
            return {
                value: value,
                rvalue: rvalue
            }
        }, p.__updateSlidesHoriz = function(slide, distance) {
            var clc = this.__calculate(distance);
            slide.$element.css("opacity", 1 - clc.value / 300), slide.$element[0].style[window._jcsspfx + "Transform"] = "translateZ(" + -clc.value + "px) rotateY(" + clc.rvalue + "deg) "
        }, p.__updateSlidesVertic = function(slide, distance) {
            var clc = this.__calculate(distance);
            slide.$element.css("opacity", 1 - clc.value / 300), slide.$element[0].style[window._jcsspfx + "Transform"] = "translateZ(" + -clc.value + "px) rotateX(" + -clc.rvalue + "deg) "
        }, MSSlideController.registerView("fadeFlow", MSFadeFlowView)
    }(),
    function($) {
        "use strict";
        window.MSMaskView = function(options) {
            MSBasicView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-mask-view")
        }, MSMaskView.extend(MSBasicView);
        var p = MSMaskView.prototype,
            _super = MSBasicView.prototype;
        p.addSlide = function(slide) {
            slide.view = this, slide.$frame = $("<div></div>").addClass("ms-mask-frame").append(slide.$element), slide.$element[0].style.position = "relative", slide.autoAppend = !1, this.slides.push(slide), this.slideList.push(slide), this.slidesCount++
        }, p.setSize = function(width, height) {
            for (var slider = this.slides[0].slider, i = 0; i < this.slidesCount; ++i) this.slides[i].$frame[0].style.width = width + "px", slider.options.autoHeight || (this.slides[i].$frame[0].style.height = height + "px");
            _super.setSize.call(this, width, height)
        }, p._horizUpdate = function(controller, value) {
            _super._horizUpdate.call(this, controller, value);
            var i = 0;
            if (this.css3)
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style[window._jcsspfx + "Transform"] = "translateX(" + (value - this.slideList[i].position) + "px)" + this.__translate_end;
            else
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style.left = value - this.slideList[i].position + "px"
        }, p._vertiUpdate = function(controller, value) {
            _super._vertiUpdate.call(this, controller, value);
            var i = 0;
            if (this.css3)
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style[window._jcsspfx + "Transform"] = "translateY(" + (value - this.slideList[i].position) + "px)" + this.__translate_end;
            else
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style.top = value - this.slideList[i].position + "px"
        }, p.__pushEnd = function() {
            var first_slide = this.slides.shift(),
                last_slide = this.slides[this.slidesCount - 2];
            if (this.slides.push(first_slide), this.normalMode) {
                var pos = last_slide.$frame[0][this.__offset] + this.spacing + this[this.__dimension];
                first_slide.$frame[0].style[this.__cssProb] = pos + "px", first_slide.position = pos
            }
        }, p.__pushStart = function() {
            var last_slide = this.slides.pop(),
                first_slide = this.slides[0];
            if (this.slides.unshift(last_slide), this.normalMode) {
                var pos = first_slide.$frame[0][this.__offset] - this.spacing - this[this.__dimension];
                last_slide.$frame[0].style[this.__cssProb] = pos + "px", last_slide.position = pos
            }
        }, p.__updateViewList = function() {
            if (this.normalMode) return void(this.viewSlidesList = this.slides);
            var temp = this.viewSlidesList.slice();
            this.viewSlidesList = [];
            var l, i = 0,
                hlf = Math.floor(this.options.viewNum / 2);
            if (this.loop)
                for (; i !== this.options.viewNum; i++) this.viewSlidesList.push(this.slides[this.currentSlideLoc - hlf + i]);
            else {
                for (i = 0; i !== hlf && this.index - i !== -1; i++) this.viewSlidesList.unshift(this.slideList[this.index - i]);
                for (i = 1; i !== hlf && this.index + i !== this.slidesCount; i++) this.viewSlidesList.push(this.slideList[this.index + i])
            }
            for (i = 0, l = temp.length; i !== l; i++) - 1 === this.viewSlidesList.indexOf(temp[i]) && (temp[i].sleep(), temp[i].$frame.detach());
            temp = null
        }, p.__locateSlides = function(move, start) {
            this.__updateViewList(), start = this.loop ? start || 0 : this.slides.indexOf(this.viewSlidesList[0]) * (this[this.__dimension] + this.spacing);
            for (var slide, l = this.viewSlidesList.length, i = 0; i !== l; i++) {
                var pos = start + i * (this[this.__dimension] + this.spacing);
                if (slide = this.viewSlidesList[i], this.$slideCont.append(slide.$frame), slide.wakeup(!1), slide.position = pos, slide.selected && slide.bgvideo) try {
                    slide.bgvideo.play()
                } catch (e) {}
                slide.$frame[0].style[this.__cssProb] = pos + "px"
            }
            move !== !1 && this.controller.changeTo(this.slideList[this.index].position, !1, null, null, !1)
        }, MSSlideController.registerView("mask", MSMaskView)
    }(jQuery),
    function() {
        "use strict";
        window.MSParallaxMaskView = function(options) {
            MSMaskView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-parallax-mask-view")
        }, MSParallaxMaskView.extend(MSMaskView), MSParallaxMaskView.parallaxAmount = .5;
        var p = MSParallaxMaskView.prototype,
            _super = MSBasicView.prototype;
        p._horizUpdate = function(controller, value) {
            _super._horizUpdate.call(this, controller, value);
            var i = 0;
            if (this.css3)
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style[window._jcsspfx + "Transform"] = "translateX(" + (value - this.slideList[i].position) * MSParallaxMaskView.parallaxAmount + "px)" + this.__translate_end;
            else
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style.left = (value - this.slideList[i].position) * MSParallaxMaskView.parallaxAmount + "px"
        }, p._vertiUpdate = function(controller, value) {
            _super._vertiUpdate.call(this, controller, value);
            var i = 0;
            if (this.css3)
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style[window._jcsspfx + "Transform"] = "translateY(" + (value - this.slideList[i].position) * MSParallaxMaskView.parallaxAmount + "px)" + this.__translate_end;
            else
                for (i = 0; i < this.slidesCount; ++i) this.slideList[i].$element[0].style.top = (value - this.slideList[i].position) * MSParallaxMaskView.parallaxAmount + "px"
        }, MSSlideController.registerView("parallaxMask", MSParallaxMaskView)
    }(jQuery),
    function() {
        "use strict";
        window.MSFadeView = function(options) {
            MSBasicView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-fade-view"), this.controller.renderCallback(this.__update, this)
        }, MSFadeView.extend(MSBasicView);
        var p = MSFadeView.prototype,
            _super = MSBasicView.prototype;
        p.__update = function(controller, value) {
            for (var slide, distance, cont_scroll = -value, i = 0; i < this.slidesCount; ++i) slide = this.slideList[i], distance = -cont_scroll - slide.position, this.__updateSlides(slide, distance)
        }, p.__updateSlides = function(slide, distance) {
            var value = Math.abs(distance / this[this.__dimension]);
            0 >= 1 - value ? slide.$element.fadeTo(0, 0).css("visibility", "hidden") : slide.$element.fadeTo(0, 1 - value).css("visibility", "")
        }, p.__locateSlides = function(move, start) {
            this.__updateViewList(), start = this.loop ? start || 0 : this.slides.indexOf(this.viewSlidesList[0]) * (this[this.__dimension] + this.spacing);
            for (var slide, l = this.viewSlidesList.length, i = 0; i !== l; i++) {
                var pos = start + i * this[this.__dimension];
                slide = this.viewSlidesList[i], slide.wakeup(), slide.position = pos
            }
            move !== !1 && this.controller.changeTo(this.slideList[this.index].position, !1, null, null, !1)
        }, p.__pushEnd = function() {
            var first_slide = this.slides.shift(),
                last_slide = this.slides[this.slidesCount - 2];
            this.slides.push(first_slide), first_slide.position = last_slide.position + this[this.__dimension]
        }, p.__pushStart = function() {
            var last_slide = this.slides.pop(),
                first_slide = this.slides[0];
            this.slides.unshift(last_slide), last_slide.position = first_slide.position - this[this.__dimension]
        }, p.create = function(index) {
            _super.create.call(this, index), this.spacing = 0, this.controller.options.minValidDist = 10
        }, MSSlideController.registerView("fade", MSFadeView)
    }(jQuery),
    function() {
        "use strict";
        window.MSScaleView = function(options) {
            MSBasicView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-scale-view"), this.controller.renderCallback(this.__update, this)
        }, MSScaleView.extend(MSFadeView);
        var p = MSScaleView.prototype,
            _super = MSFadeView.prototype;
        p.__updateSlides = function(slide, distance) {
            var value = Math.abs(distance / this[this.__dimension]),
                element = slide.$element[0];
            0 >= 1 - value ? (element.style.opacity = 0, element.style.visibility = "hidden", element.style[window._jcsspfx + "Transform"] = "") : (element.style.opacity = 1 - value, element.style.visibility = "", element.style[window._jcsspfx + "Transform"] = "perspective(2000px) translateZ(" + value * (0 > distance ? -.5 : .5) * 300 + "px)")
        }, p.create = function(index) {
            _super.create.call(this, index), this.controller.options.minValidDist = .03
        }, MSSlideController.registerView("scale", MSScaleView)
    }(jQuery),
    function() {
        "use strict";
        window.MSStackView = function(options) {
            MSBasicView.call(this, options), this.$element.removeClass("ms-basic-view").addClass("ms-stack-view"), this.controller.renderCallback(this.__update, this), this.autoUpdateZIndex = !0
        }, MSStackView.extend(MSFadeView), MSStackView._3dreq = !0, MSStackView._fallback = MSFadeView;
        var p = MSStackView.prototype,
            _super = MSFadeView.prototype;
        p.__updateSlidesZindex = function() {
            for (var slide, l = this.viewSlidesList.length, i = 0; i !== l; i++) slide = this.viewSlidesList[i], this.viewSlidesList[i].$element.css("z-index", l - i)
        }, p.__updateSlides = function(slide, distance) {
            var value = Math.abs(distance / this[this.__dimension]),
                element = slide.$element[0];
            0 >= 1 - value ? (element.style.opacity = 1, element.style.visibility = "hidden", element.style[window._jcsspfx + "Transform"] = "") : (element.style.visibility = "", element.style[window._jcsspfx + "Transform"] = 0 > distance ? "perspective(2000px) translateZ(" + -300 * value + "px)" : this.__translate + "(" + -value * this[this.__dimension] + "px)")
        }, p.create = function(index) {
            _super.create.call(this, index), this.controller.options.minValidDist = .03, this.__translate = "h" === this.dir ? "translateX" : "translateY"
        }, MSSlideController.registerView("stack", MSStackView)
    }(jQuery),
    function() {
        "use strict";
        var perspective = 2e3;
        window.MSFocusView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-focus-view"), this.options.centerSpace = this.options.centerSpace || 1
        }, MSFocusView.extend(MSWaveView), MSFocusView._3dreq = !0, MSFocusView._fallback = MSFadeBasicView; {
            var p = MSFocusView.prototype;
            MSWaveView.prototype
        }
        p.__calcview = function(z, w) {
            var a = w / 2 * z / (z + perspective);
            return a * (z + perspective) / perspective
        }, p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            value = 15 * -Math.min(value, 100), slide.$element.css(window._csspfx + "transform", "translateZ(" + (value + 1) + "px) rotateY(0.01deg) translateX(" + (0 > distance ? 1 : -1) * -this.__calcview(value, this.__width) * this.options.centerSpace + "px)")
        }, p.__updateSlidesVertic = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            value = 15 * -Math.min(value, 100), slide.$element.css(window._csspfx + "transform", "translateZ(" + (value + 1) + "px) rotateY(0.01deg) translateY(" + (0 > distance ? 1 : -1) * -this.__calcview(value, this.__width) * this.options.centerSpace + "px)")
        }, MSSlideController.registerView("focus", MSFocusView)
    }(),
    function() {
        window.MSPartialWaveView = function(options) {
            MSWaveView.call(this, options), this.$element.removeClass("ms-wave-view").addClass("ms-partial-wave-view")
        }, MSPartialWaveView.extend(MSWaveView), MSPartialWaveView._3dreq = !0, MSPartialWaveView._fallback = MSFadeBasicView; {
            var p = MSPartialWaveView.prototype;
            MSWaveView.prototype
        }
        p.__updateSlidesHoriz = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            slide.hasBG && slide.$bg_img.css("opacity", (100 - Math.abs(120 * distance / this.__width / 3)) / 100), slide.$element.css(window._csspfx + "transform", "translateZ(" + 3 * -value + "px) rotateY(0.01deg) translateX(" + .75 * distance + "px)")
        }, p.__updateSlidesVertic = function(slide, distance) {
            var value = Math.abs(100 * distance / this.__width);
            slide.hasBG && slide.$bg_img.css("opacity", (100 - Math.abs(120 * distance / this.__width / 3)) / 100), slide.$element.css(window._csspfx + "transform", "translateZ(" + 3 * -value + "px) rotateY(0.01deg) translateY(" + .75 * distance + "px)")
        }, MSSlideController.registerView("partialWave", MSPartialWaveView)
    }(),
    function($) {
        "use strict";
        var BaseControl = function() {
                this.options = {
                    prefix: "ms-",
                    autohide: !0,
                    overVideo: !0,
                    customClass: null
                }
            },
            p = BaseControl.prototype;
        p.slideAction = function() {}, p.setup = function() {
            this.cont = this.options.insertTo ? $(this.options.insertTo) : this.slider.$controlsCont, this.options.overVideo || this._hideOnvideoStarts()
        }, p.checkHideUnder = function() {
            this.options.hideUnder && (this.needsRealign = !this.options.insetTo && ("left" === this.options.align || "right" === this.options.align) && this.options.inset === !1, $(window).bind("resize", {
                that: this
            }, this.onResize), this.onResize())
        }, p.onResize = function(event) {
            var that = event && event.data.that || this,
                w = window.innerWidth;
            w <= that.options.hideUnder && !that.detached ? (that.hide(!0), that.detached = !0, that.onDetach()) : w >= that.options.hideUnder && that.detached && (that.detached = !1, that.visible(), that.onAppend())
        }, p.create = function() {
            this.options.autohide && (this.hide(!0), this.slider.$controlsCont.mouseenter($.proxy(this._onMouseEnter, this)).mouseleave($.proxy(this._onMouseLeave, this)).mousedown($.proxy(this._onMouseDown, this)), this.$element && this.$element.mouseenter($.proxy(this._onMouseEnter, this)).mouseleave($.proxy(this._onMouseLeave, this)).mousedown($.proxy(this._onMouseDown, this)), $(document).mouseup($.proxy(this._onMouseUp, this))), this.options.align && this.$element.addClass("ms-align-" + this.options.align), this.options.customClass && this.$element && this.$element.addClass(this.options.customClass)
        }, p._onMouseEnter = function() {
            this._disableAH || this.mdown || this.visible(), this.mleave = !1
        }, p._onMouseLeave = function() {
            this.mdown || this.hide(), this.mleave = !0
        }, p._onMouseDown = function() {
            this.mdown = !0
        }, p._onMouseUp = function() {
            this.mdown && this.mleave && this.hide(), this.mdown = !1
        }, p.onAppend = function() {
            this.needsRealign && this.slider._realignControls()
        }, p.onDetach = function() {
            this.needsRealign && this.slider._realignControls()
        }, p._hideOnvideoStarts = function() {
            var that = this;
            this.slider.api.addEventListener(MSSliderEvent.VIDEO_PLAY, function() {
                that._disableAH = !0, that.hide()
            }), this.slider.api.addEventListener(MSSliderEvent.VIDEO_CLOSE, function() {
                that._disableAH = !1, that.visible()
            })
        }, p.hide = function(fast) {
            if (fast) this.$element.css("opacity", 0), this.$element.css("display", "none");
            else {
                clearTimeout(this.hideTo);
                var $element = this.$element;
                this.hideTo = setTimeout(function() {
                    CTween.fadeOut($element, 400, !1)
                }, 20)
            }
            this.$element.addClass("ms-ctrl-hide")
        }, p.visible = function() {
            this.detached || (clearTimeout(this.hideTo), this.$element.css("display", ""), CTween.fadeIn(this.$element, 400, !1), this.$element.removeClass("ms-ctrl-hide"))
        }, p.destroy = function() {
            this.options && this.options.hideUnder && $(window).unbind("resize", this.onResize)
        }, window.BaseControl = BaseControl
    }(jQuery),
    function($) {
        "use strict";
        var MSArrows = function(options) {
            BaseControl.call(this), $.extend(this.options, options)
        };
        MSArrows.extend(BaseControl);
        var p = MSArrows.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            var that = this;
            this.$next = $("<div></div>").addClass(this.options.prefix + "nav-next").bind("click", function() {
                that.slider.api.next(!0)
            }), this.$prev = $("<div></div>").addClass(this.options.prefix + "nav-prev").bind("click", function() {
                that.slider.api.previous(!0)
            }), _super.setup.call(this), this.cont.append(this.$next), this.cont.append(this.$prev), this.checkHideUnder()
        }, p.hide = function(fast) {
            return fast ? (this.$prev.css("opacity", 0).css("display", "none"), void this.$next.css("opacity", 0).css("display", "none")) : (CTween.fadeOut(this.$prev, 400, !1), CTween.fadeOut(this.$next, 400, !1), this.$prev.addClass("ms-ctrl-hide"), void this.$next.addClass("ms-ctrl-hide"))
        }, p.visible = function() {
            this.detached || (CTween.fadeIn(this.$prev, 400), CTween.fadeIn(this.$next, 400), this.$prev.removeClass("ms-ctrl-hide").css("display", ""), this.$next.removeClass("ms-ctrl-hide").css("display", ""))
        }, p.destroy = function() {
            _super.destroy(), this.$next.remove(), this.$prev.remove()
        }, window.MSArrows = MSArrows, MSSlideController.registerControl("arrows", MSArrows)
    }(jQuery),
    function($) {
        "use strict";
        var MSThumblist = function(options) {
            BaseControl.call(this), this.options.dir = "h", this.options.wheel = "v" === options.dir, this.options.arrows = !1, this.options.speed = 17, this.options.align = null, this.options.inset = !1, this.options.margin = 10, this.options.space = 10, this.options.width = 100, this.options.height = 100, this.options.type = "thumbs", this.options.hover = !1, $.extend(this.options, options), this.thumbs = [], this.index_count = 0, this.__dimen = "h" === this.options.dir ? "width" : "height", this.__alignsize = "h" === this.options.dir ? "height" : "width", this.__jdimen = "h" === this.options.dir ? "outerWidth" : "outerHeight", this.__pos = "h" === this.options.dir ? "left" : "top", this.click_enable = !0
        };
        MSThumblist.extend(BaseControl);
        var p = MSThumblist.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            if (this.$element = $("<div></div>").addClass(this.options.prefix + "thumb-list"), "tabs" === this.options.type && this.$element.addClass(this.options.prefix + "tabs"), this.$element.addClass("ms-dir-" + this.options.dir), _super.setup.call(this), this.$element.appendTo(this.slider.$controlsCont === this.cont ? this.slider.$element : this.cont), this.$thumbscont = $("<div></div>").addClass("ms-thumbs-cont").appendTo(this.$element), this.options.arrows) {
                var that = this;
                this.$fwd = $("<div></div>").addClass("ms-thumblist-fwd").appendTo(this.$element).click(function() {
                    that.controller.push(-15)
                }), this.$bwd = $("<div></div>").addClass("ms-thumblist-bwd").appendTo(this.$element).click(function() {
                    that.controller.push(15)
                })
            }
            if (!this.options.insetTo && this.options.align) {
                var align = this.options.align;
                this.options.inset ? this.$element.css(align, this.options.margin) : "top" === align ? this.$element.detach().prependTo(this.slider.$element).css({
                    "margin-bottom": this.options.margin,
                    position: "relative"
                }) : "bottom" === align ? this.$element.css({
                    "margin-top": this.options.margin,
                    position: "relative"
                }) : (this.slider.api.addEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.align()), "v" === this.options.dir ? this.$element.width(this.options.width) : this.$element.height(this.options.height)
            }
            this.checkHideUnder()
        }, p.align = function() {
            if (!this.detached) {
                var align = this.options.align,
                    pos = this.slider.reserveSpace(align, this.options[this.__alignsize] + 2 * this.options.margin);
                this.$element.css(align, -pos - this.options[this.__alignsize] - this.options.margin)
            }
        }, p.slideAction = function(slide) {
            var thumb_ele = slide.$element.find(".ms-thumb"),
                that = this,
                thumb_frame = $("<div></div>").addClass("ms-thumb-frame").append(thumb_ele).append($('<div class="ms-thumb-ol"></div>')).bind(this.options.hover ? "hover" : "click", function() {
                    that.changeSlide(thumb_frame)
                });
            if (this.options.align && thumb_frame.width(this.options.width - ("v" === this.options.dir && "tabs" === this.options.type ? 12 : 0)).height(this.options.height).css("margin-" + ("v" === this.options.dir ? "bottom" : "right"), this.options.space), thumb_frame[0].index = this.index_count++, this.$thumbscont.append(thumb_frame), this.options.fillMode && thumb_ele.is("img")) {
                var aligner = new window.MSAligner(this.options.fillMode, thumb_frame, thumb_ele);
                thumb_ele[0].aligner = aligner, thumb_ele.one("load", function() {
                    var $this = $(this);
                    $this[0].aligner.init($this.width(), $this.height()), $this[0].aligner.align()
                }).each($.jqLoadFix)
            }
            $.browser.msie && thumb_ele.on("dragstart", function(event) {
                event.preventDefault()
            }), this.thumbs.push(thumb_frame)
        }, p.create = function() {
            _super.create.call(this), this.__translate_end = window._css3d ? " translateZ(0px)" : "", this.controller = new Controller(0, 0, {
                snappingMinSpeed: 2,
                friction: (100 - .5 * this.options.speed) / 100
            }), this.controller.renderCallback("h" === this.options.dir ? this._hMove : this._vMove, this);
            var that = this;
            this.resize_listener = function() {
                that.__resize()
            }, $(window).bind("resize", this.resize_listener), this.thumbSize = this.thumbs[0][this.__jdimen](!0), this.setupSwipe(), this.__resize();
            var that = this;
            this.options.wheel && (this.wheellistener = function(event) {
                var e = window.event || event.orginalEvent || event,
                    delta = Math.max(-1, Math.min(1, e.wheelDelta || -e.detail));
                return that.controller.push(10 * -delta), !1
            }, $.browser.mozilla ? this.$element[0].addEventListener("DOMMouseScroll", this.wheellistener) : this.$element.bind("mousewheel", this.wheellistener)), this.slider.api.addEventListener(MSSliderEvent.CHANGE_START, this.update, this), this.slider.api.addEventListener(MSSliderEvent.HARD_UPDATE, this.realignThumbs, this), this.cindex = this.slider.api.index(), this.select(this.thumbs[this.cindex])
        }, p._hMove = function(controller, value) {
            return this.__contPos = value, window._cssanim ? void(this.$thumbscont[0].style[window._jcsspfx + "Transform"] = "translateX(" + -value + "px)" + this.__translate_end) : void(this.$thumbscont[0].style.left = -value + "px")
        }, p._vMove = function(controller, value) {
            return this.__contPos = value, window._cssanim ? void(this.$thumbscont[0].style[window._jcsspfx + "Transform"] = "translateY(" + -value + "px)" + this.__translate_end) : void(this.$thumbscont[0].style.top = -value + "px")
        }, p.setupSwipe = function() {
            this.swipeControl = new averta.TouchSwipe(this.$element), this.swipeControl.swipeType = "h" === this.options.dir ? "horizontal" : "vertical";
            var that = this;
            this.swipeControl.onSwipe = "h" === this.options.dir ? function(status) {
                that.horizSwipeMove(status)
            } : function(status) {
                that.vertSwipeMove(status)
            }
        }, p.vertSwipeMove = function(status) {
            if (!this.dTouch) {
                var phase = status.phase;
                if ("start" === phase) this.controller.stop();
                else if ("move" === phase) this.controller.drag(status.moveY);
                else if ("end" === phase || "cancel" === phase) {
                    var speed = Math.abs(status.distanceY / status.duration * 50 / 3);
                    speed > .1 ? this.controller.push(-status.distanceY / status.duration * 50 / 3) : (this.click_enable = !0, this.controller.cancel())
                }
            }
        }, p.horizSwipeMove = function(status) {
            if (!this.dTouch) {
                var phase = status.phase;
                if ("start" === phase) this.controller.stop(), this.click_enable = !1;
                else if ("move" === phase) this.controller.drag(status.moveX);
                else if ("end" === phase || "cancel" === phase) {
                    var speed = Math.abs(status.distanceX / status.duration * 50 / 3);
                    speed > .1 ? this.controller.push(-status.distanceX / status.duration * 50 / 3) : (this.click_enable = !0, this.controller.cancel())
                }
            }
        }, p.update = function() {
            var nindex = this.slider.api.index();
            this.cindex !== nindex && (null != this.cindex && this.unselect(this.thumbs[this.cindex]), this.cindex = nindex, this.select(this.thumbs[this.cindex]), this.dTouch || this.updateThumbscroll())
        }, p.realignThumbs = function() {
            this.$element.find(".ms-thumb").each(function(index, thumb) {
                thumb.aligner && thumb.aligner.align()
            })
        }, p.updateThumbscroll = function() {
            var pos = this.thumbSize * this.cindex;
            if (0 / 0 == this.controller.value && (this.controller.value = 0), pos - this.controller.value < 0) return void this.controller.gotoSnap(this.cindex, !0);
            if (pos + this.thumbSize - this.controller.value > this.$element[this.__dimen]()) {
                var first_snap = this.cindex - Math.floor(this.$element[this.__dimen]() / this.thumbSize) + 1;
                return void this.controller.gotoSnap(first_snap, !0)
            }
        }, p.changeSlide = function(thumb) {
            this.click_enable && this.cindex !== thumb[0].index && this.slider.api.gotoSlide(thumb[0].index)
        }, p.unselect = function(ele) {
            ele.removeClass("ms-thumb-frame-selected")
        }, p.select = function(ele) {
            ele.addClass("ms-thumb-frame-selected")
        }, p.__resize = function() {
            var size = this.$element[this.__dimen]();
            if (this.ls !== size) {
                this.ls = size, this.thumbSize = this.thumbs[0][this.__jdimen](!0);
                var len = this.slider.api.count() * this.thumbSize;
                this.$thumbscont[0].style[this.__dimen] = len + "px", size >= len ? (this.dTouch = !0, this.controller.stop(), this.$thumbscont[0].style[this.__pos] = .5 * (size - len) + "px", this.$thumbscont[0].style[window._jcsspfx + "Transform"] = "") : (this.dTouch = !1, this.click_enable = !0, this.$thumbscont[0].style[this.__pos] = "", this.controller._max_value = len - size, this.controller.options.snapsize = this.thumbSize, this.updateThumbscroll())
            }
        }, p.destroy = function() {
            _super.destroy(), this.options.wheel && ($.browser.mozilla ? this.$element[0].removeEventListener("DOMMouseScroll", this.wheellistener) : this.$element.unbind("mousewheel", this.wheellistener), this.wheellistener = null), $(window).unbind("resize", this.resize_listener), this.$element.remove(), this.slider.api.removeEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.slider.api.removeEventListener(MSSliderEvent.CHANGE_START, this.update, this)
        }, window.MSThumblist = MSThumblist, MSSlideController.registerControl("thumblist", MSThumblist)
    }(jQuery),
    function($) {
        "use strict";
        var MSBulltes = function(options) {
            BaseControl.call(this), this.options.dir = "h", this.options.inset = !0, this.options.margin = 10, this.options.space = 10, $.extend(this.options, options), this.bullets = []
        };
        MSBulltes.extend(BaseControl);
        var p = MSBulltes.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            if (_super.setup.call(this), this.$element = $("<div></div>").addClass(this.options.prefix + "bullets").addClass("ms-dir-" + this.options.dir).appendTo(this.cont), this.$bullet_cont = $("<div></div>").addClass("ms-bullets-count").appendTo(this.$element), !this.options.insetTo && this.options.align) {
                var align = this.options.align;
                this.options.inset && this.$element.css(align, this.options.margin)
            }
            this.checkHideUnder()
        }, p.create = function() {
            _super.create.call(this);
            var that = this;
            this.slider.api.addEventListener(MSSliderEvent.CHANGE_START, this.update, this), this.cindex = this.slider.api.index();
            for (var i = 0; i < this.slider.api.count(); ++i) {
                var bullet = $("<div></div>").addClass("ms-bullet");
                bullet[0].index = i, bullet.on("click", function() {
                    that.changeSlide(this.index)
                }), this.$bullet_cont.append(bullet), this.bullets.push(bullet), "h" === this.options.dir ? bullet.css("margin", this.options.space / 2) : bullet.css("margin", this.options.space)
            }
            "h" === this.options.dir ? this.$element.width(bullet.outerWidth(!0) * this.slider.api.count()) : this.$element.css("margin-top", -this.$element.outerHeight(!0) / 2), this.select(this.bullets[this.cindex])
        }, p.update = function() {
            var nindex = this.slider.api.index();
            this.cindex !== nindex && (null != this.cindex && this.unselect(this.bullets[this.cindex]), this.cindex = nindex, this.select(this.bullets[this.cindex]))
        }, p.changeSlide = function(index) {
            this.cindex !== index && this.slider.api.gotoSlide(index)
        }, p.unselect = function(ele) {
            ele.removeClass("ms-bullet-selected")
        }, p.select = function(ele) {
            ele.addClass("ms-bullet-selected")
        }, p.destroy = function() {
            _super.destroy(), this.slider.api.removeEventListener(MSSliderEvent.CHANGE_START, this.update, this), this.$element.remove()
        }, window.MSBulltes = MSBulltes, MSSlideController.registerControl("bullets", MSBulltes)
    }(jQuery),
    function($) {
        "use strict";
        var MSScrollbar = function(options) {
            BaseControl.call(this), this.options.dir = "h", this.options.autohide = !0, this.options.width = 4, this.options.color = "#3D3D3D", this.options.margin = 10, $.extend(this.options, options), this.__dimen = "h" === this.options.dir ? "width" : "height", this.__jdimen = "h" === this.options.dir ? "outerWidth" : "outerHeight", this.__pos = "h" === this.options.dir ? "left" : "top", this.__translate_end = window._css3d ? " translateZ(0px)" : "", this.__translate_start = "h" === this.options.dir ? " translateX(" : "translateY("
        };
        MSScrollbar.extend(BaseControl);
        var p = MSScrollbar.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            if (this.$element = $("<div></div>").addClass(this.options.prefix + "sbar").addClass("ms-dir-" + this.options.dir), _super.setup.call(this), this.$element.appendTo(this.slider.$controlsCont === this.cont ? this.slider.$element : this.cont), this.$bar = $("<div></div>").addClass(this.options.prefix + "bar").appendTo(this.$element), this.slider.options.loop && (this.disable = !0, this.$element.remove()), "v" === this.options.dir ? this.$bar.width(this.options.width) : this.$bar.height(this.options.width), this.$bar.css("background-color", this.options.color), !this.options.insetTo && this.options.align) {
                this.$element.css("v" === this.options.dir ? {
                    right: "auto",
                    left: "auto"
                } : {
                    top: "auto",
                    bottom: "auto"
                });
                var align = this.options.align;
                this.options.inset ? this.$element.css(align, this.options.margin) : "top" === align ? this.$element.prependTo(this.slider.$element).css({
                    "margin-bottom": this.options.margin,
                    position: "relative"
                }) : "bottom" === align ? this.$element.css({
                    "margin-top": this.options.margin,
                    position: "relative"
                }) : (this.slider.api.addEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.align())
            }
            this.checkHideUnder()
        }, p.align = function() {
            if (!this.detached) {
                var align = this.options.align,
                    pos = this.slider.reserveSpace(align, 2 * this.options.margin + this.options.width);
                this.$element.css(align, -pos - this.options.margin - this.options.width)
            }
        }, p.create = function() {
            if (!this.disable) {
                this.scroller = this.slider.api.scroller, this.slider.api.view.addEventListener(MSViewEvents.SCROLL, this._update, this), this.slider.api.addEventListener(MSSliderEvent.RESIZE, this._resize, this), this._resize(), this.options.autohide && this.$bar.css("opacity", "0")
            }
        }, p._resize = function() {
            this.vdimen = this.$element[this.__dimen](), this.bar_dimen = this.slider.api.view["__" + this.__dimen] * this.vdimen / this.scroller._max_value, this.$bar[this.__dimen](this.bar_dimen)
        }, p._update = function() {
            var value = this.scroller.value * (this.vdimen - this.bar_dimen) / this.scroller._max_value;
            if (this.lvalue !== value) {
                if (this.lvalue = value, this.options.autohide) {
                    clearTimeout(this.hto), this.$bar.css("opacity", "1");
                    var that = this;
                    this.hto = setTimeout(function() {
                        that.$bar.css("opacity", "0")
                    }, 150)
                }
                return 0 > value ? void(this.$bar[0].style[this.__dimen] = this.bar_dimen + value + "px") : (value > this.vdimen - this.bar_dimen && (this.$bar[0].style[this.__dimen] = this.vdimen - value + "px"), window._cssanim ? void(this.$bar[0].style[window._jcsspfx + "Transform"] = this.__translate_start + value + "px)" + this.__translate_end) : void(this.$bar[0].style[this.__pos] = value + "px"))
            }
        }, p.destroy = function() {
            _super.destroy(), this.slider.api.view.removeEventListener(MSViewEvents.SCROLL, this._update, this), this.slider.api.removeEventListener(MSSliderEvent.RESIZE, this._resize, this), this.slider.api.removeEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.$element.remove()
        }, window.MSScrollbar = MSScrollbar, MSSlideController.registerControl("scrollbar", MSScrollbar)
    }(jQuery),
    function($) {
        "use strict";
        var MSTimerbar = function(options) {
            BaseControl.call(this), this.options.autohide = !1, this.options.width = 4, this.options.color = "#FFFFFF", this.options.inset = !0, this.options.margin = 0, $.extend(this.options, options)
        };
        MSTimerbar.extend(BaseControl);
        var p = MSTimerbar.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            if (_super.setup.call(this), this.$element = $("<div></div>").addClass(this.options.prefix + "timerbar"), _super.setup.call(this), this.$element.appendTo(this.slider.$controlsCont === this.cont ? this.slider.$element : this.cont), this.$bar = $("<div></div>").addClass("ms-time-bar").appendTo(this.$element), "v" === this.options.dir ? (this.$bar.width(this.options.width), this.$element.width(this.options.width)) : (this.$bar.height(this.options.width), this.$element.height(this.options.width)), this.$bar.css("background-color", this.options.color), !this.options.insetTo && this.options.align) {
                this.$element.css({
                    top: "auto",
                    bottom: "auto"
                });
                var align = this.options.align;
                this.options.inset ? this.$element.css(align, this.options.margin) : "top" === align ? this.$element.prependTo(this.slider.$element).css({
                    "margin-bottom": this.options.margin,
                    position: "relative"
                }) : "bottom" === align ? this.$element.css({
                    "margin-top": this.options.margin,
                    position: "relative"
                }) : (this.slider.api.addEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.align())
            }
            this.checkHideUnder()
        }, p.align = function() {
            if (!this.detached) {
                var align = this.options.align,
                    pos = this.slider.reserveSpace(align, 2 * this.options.margin + this.options.width);
                this.$element.css(align, -pos - this.options.margin - this.options.width)
            }
        }, p.create = function() {
            _super.create.call(this), this.slider.api.addEventListener(MSSliderEvent.WAITING, this._update, this), this._update()
        }, p._update = function() {
            this.$bar[0].style.width = this.slider.api._delayProgress + "%"
        }, p.destroy = function() {
            _super.destroy(), this.slider.api.removeEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.slider.api.removeEventListener(MSSliderEvent.WAITING, this._update, this), this.$element.remove()
        }, window.MSTimerbar = MSTimerbar, MSSlideController.registerControl("timebar", MSTimerbar)
    }(jQuery),
    function($) {
        "use strict";
        var MSCircleTimer = function(options) {
            BaseControl.call(this), this.options.color = "#A2A2A2", this.options.stroke = 10, this.options.radius = 4, this.options.autohide = !1, $.extend(this.options, options)
        };
        MSCircleTimer.extend(BaseControl);
        var p = MSCircleTimer.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            return _super.setup.call(this), this.$element = $("<div></div>").addClass(this.options.prefix + "ctimer").appendTo(this.cont), this.$canvas = $("<canvas></canvas>").addClass("ms-ctimer-canvas").appendTo(this.$element), this.$bar = $("<div></div>").addClass("ms-ctimer-bullet").appendTo(this.$element), this.$canvas[0].getContext ? (this.ctx = this.$canvas[0].getContext("2d"), this.prog = 0, this.__w = 2 * (this.options.radius + this.options.stroke / 2), this.$canvas[0].width = this.__w, this.$canvas[0].height = this.__w, void this.checkHideUnder()) : (this.destroy(), void(this.disable = !0))
        }, p.create = function() {
            if (!this.disable) {
                _super.create.call(this), this.slider.api.addEventListener(MSSliderEvent.WAITING, this._update, this);
                var that = this;
                this.$element.click(function() {
                    that.slider.api.paused ? that.slider.api.resume() : that.slider.api.pause()
                }), this._update()
            }
        }, p._update = function() {
            var that = this;
            $(this).stop(!0).animate({
                prog: .01 * this.slider.api._delayProgress
            }, {
                duration: 200,
                step: function() {
                    that._draw()
                }
            })
        }, p._draw = function() {
            this.ctx.clearRect(0, 0, this.__w, this.__w), this.ctx.beginPath(), this.ctx.arc(.5 * this.__w, .5 * this.__w, this.options.radius, 1.5 * Math.PI, 1.5 * Math.PI + 2 * Math.PI * this.prog, !1), this.ctx.strokeStyle = this.options.color, this.ctx.lineWidth = this.options.stroke, this.ctx.stroke()
        }, p.destroy = function() {
            _super.destroy(), this.disable || ($(this).stop(!0), this.slider.api.removeEventListener(MSSliderEvent.WAITING, this._update, this), this.$element.remove())
        }, window.MSCircleTimer = MSCircleTimer, MSSlideController.registerControl("circletimer", MSCircleTimer)
    }(jQuery),
    function($) {
        "use strict";
        window.MSLightbox = function(options) {
            BaseControl.call(this, options), this.options.autohide = !1, $.extend(this.options, options), this.data_list = []
        }, MSLightbox.fadeDuratation = 400, MSLightbox.extend(BaseControl);
        var p = MSLightbox.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            _super.setup.call(this), this.$element = $("<div></div>").addClass(this.options.prefix + "lightbox-btn").appendTo(this.cont), this.checkHideUnder()
        }, p.slideAction = function(slide) {
            $("<div></div>").addClass(this.options.prefix + "lightbox-btn").appendTo(slide.$element).append($(slide.$element.find(".ms-lightbox")))
        }, p.create = function() {
            _super.create.call(this)
        }, MSSlideController.registerControl("lightbox", MSLightbox)
    }(jQuery),
    function($) {
        "use strict";
        window.MSSlideInfo = function(options) {
            BaseControl.call(this, options), this.options.autohide = !1, this.options.align = null, this.options.inset = !1, this.options.margin = 10, this.options.size = 100, this.options.dir = "h", $.extend(this.options, options), this.data_list = []
        }, MSSlideInfo.fadeDuratation = 400, MSSlideInfo.extend(BaseControl);
        var p = MSSlideInfo.prototype,
            _super = BaseControl.prototype;
        p.setup = function() {
            if (this.$element = $("<div></div>").addClass(this.options.prefix + "slide-info").addClass("ms-dir-" + this.options.dir), _super.setup.call(this), this.$element.appendTo(this.slider.$controlsCont === this.cont ? this.slider.$element : this.cont), !this.options.insetTo && this.options.align) {
                var align = this.options.align;
                this.options.inset ? this.$element.css(align, this.options.margin) : "top" === align ? this.$element.prependTo(this.slider.$element).css({
                    "margin-bottom": this.options.margin,
                    position: "relative"
                }) : "bottom" === align ? this.$element.css({
                    "margin-top": this.options.margin,
                    position: "relative"
                }) : (this.slider.api.addEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.align()), "v" === this.options.dir ? this.$element.width(this.options.size) : this.$element.css("min-height", this.options.size)
            }
            this.checkHideUnder()
        }, p.align = function() {
            if (!this.detached) {
                var align = this.options.align,
                    pos = this.slider.reserveSpace(align, this.options.size + 2 * this.options.margin);
                this.$element.css(align, -pos - this.options.size - this.options.margin)
            }
        }, p.slideAction = function(slide) {
            var info_ele = $(slide.$element.find(".ms-info"));
            info_ele.detach(), this.data_list[slide.index] = info_ele
        }, p.create = function() {
            _super.create.call(this), this.slider.api.addEventListener(MSSliderEvent.CHANGE_START, this.update, this), this.cindex = this.slider.api.index(), this.switchEle(this.data_list[this.cindex])
        }, p.update = function() {
            var nindex = this.slider.api.index();
            this.switchEle(this.data_list[nindex]), this.cindex = nindex
        }, p.switchEle = function(ele) {
            if (this.current_ele) {
                this.current_ele[0].tween && this.current_ele[0].tween.stop(!0), this.current_ele[0].tween = CTween.animate(this.current_ele, MSSlideInfo.fadeDuratation, {
                    opacity: 0
                }, {
                    complete: function() {
                        this.detach(), this[0].tween = null, ele.css("position", "relative")
                    },
                    target: this.current_ele
                }), ele.css("position", "absolute")
            }
            this.__show(ele)
        }, p.__show = function(ele) {
            ele.appendTo(this.$element).css("opacity", "0"), this.current_ele && ele.height(Math.max(ele.height(), this.current_ele.height())), clearTimeout(this.tou), this.tou = setTimeout(function() {
                CTween.fadeIn(ele, MSSlideInfo.fadeDuratation), ele.css("height", "")
            }, MSSlideInfo.fadeDuratation), ele[0].tween && ele[0].tween.stop(!0), this.current_ele = ele
        }, p.destroy = function() {
            _super.destroy(), clearTimeout(this.tou), this.current_ele && this.current_ele[0].tween && this.current_ele[0].tween.stop("true"), this.$element.remove(), this.slider.api.removeEventListener(MSSliderEvent.RESERVED_SPACE_CHANGE, this.align, this), this.slider.api.removeEventListener(MSSliderEvent.CHANGE_START, this.update, this)
        }, MSSlideController.registerControl("slideinfo", MSSlideInfo)
    }(jQuery),
    function($) {
        window.MSGallery = function(id, slider) {
            this.id = id, this.slider = slider, this.telement = $("#" + id), this.botcont = $("<div></div>").addClass("ms-gallery-botcont").appendTo(this.telement), this.thumbcont = $("<div></div>").addClass("ms-gal-thumbcont hide-thumbs").appendTo(this.botcont), this.playbtn = $("<div></div>").addClass("ms-gal-playbtn").appendTo(this.botcont), this.thumbtoggle = $("<div></div>").addClass("ms-gal-thumbtoggle").appendTo(this.botcont), slider.control("thumblist", {
                insertTo: this.thumbcont,
                autohide: !1,
                dir: "h"
            }), slider.control("slidenum", {
                insertTo: this.botcont,
                autohide: !1
            }), slider.control("slideinfo", {
                insertTo: this.botcont,
                autohide: !1
            }), slider.control("timebar", {
                insertTo: this.botcont,
                autohide: !1
            }), slider.control("bullets", {
                insertTo: this.botcont,
                autohide: !1
            })
        };
        var p = MSGallery.prototype;
        p._init = function() {
            var that = this;
            this.slider.api.paused || this.playbtn.addClass("btn-pause"), this.playbtn.click(function() {
                that.slider.api.paused ? (that.slider.api.resume(), that.playbtn.addClass("btn-pause")) : (that.slider.api.pause(), that.playbtn.removeClass("btn-pause"))
            }), this.thumbtoggle.click(function() {
                that.vthumbs ? (that.thumbtoggle.removeClass("btn-hide"), that.vthumbs = !1, that.thumbcont.addClass("hide-thumbs")) : (that.thumbtoggle.addClass("btn-hide"), that.thumbcont.removeClass("hide-thumbs"), that.vthumbs = !0)
            })
        }, p.setup = function() {
            var that = this;
            $(document).ready(function() {
                that._init()
            })
        }
    }(jQuery),
    function($) {
        var getPhotosetURL = function(key, id, count) {
                return "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=" + key + "&photoset_id=" + id + "&per_page=" + count + "&extras=url_o,description,date_taken,owner_name,views&format=json&jsoncallback=?"
            },
            getUserPublicURL = function(key, id, count) {
                return "https://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=" + key + "&user_id=" + id + "&per_page=" + count + "&extras=url_o,description,date_taken,owner_name,views&format=json&jsoncallback=?"
            },
            getImageSource = function(fid, server, id, secret, size, data) {
                return "_o" === size && data ? data.url_o : "https://farm" + fid + ".staticflickr.com/" + server + "/" + id + "_" + secret + size + ".jpg"
            };
        window.MSFlickrV2 = function(slider, options) {
            var _options = {
                count: 10,
                type: "photoset",
                thumbSize: "q",
                imgSize: "c"
            };
            if (this.slider = slider, this.slider.holdOn(), !options.key) return void this.errMsg("Flickr API Key required. Please add it in settings.");
            $.extend(_options, options), this.options = _options;
            var that = this;
            "photoset" === this.options.type ? $.getJSON(getPhotosetURL(this.options.key, this.options.id, this.options.count), function(data) {
                that._photosData(data)
            }) : $.getJSON(getUserPublicURL(this.options.key, this.options.id, this.options.count), function(data) {
                that.options.type = "photos", that._photosData(data)
            }), "" !== this.options.imgSize && "-" !== this.options.imgSize && (this.options.imgSize = "_" + this.options.imgSize), this.options.thumbSize = "_" + this.options.thumbSize, this.slideTemplate = this.slider.$element.find(".ms-slide")[0].outerHTML, this.slider.$element.find(".ms-slide").remove()
        };
        var p = MSFlickrV2.prototype;
        p._photosData = function(data) {
            if ("fail" === data.stat) return void this.errMsg("Flickr API ERROR#" + data.code + ": " + data.message); {
                var that = this;
                this.options.author || this.options.desc
            }
            $.each(data[this.options.type].photo, function(i, item) {
                var slide_cont = that.slideTemplate.replace(/{{[\w-]+}}/g, function(match) {
                    return match = match.replace(/{{|}}/g, ""), shortCodes[match] ? shortCodes[match](item, that) : "{{" + match + "}}"
                });
                $(slide_cont).appendTo(that.slider.$element)
            }), that._initSlider()
        }, p.errMsg = function(msg) {
            this.slider.$element.css("display", "block"), this.errEle || (this.errEle = $('<div style="font-family:Arial; color:red; font-size:12px; position:absolute; top:10px; left:10px"></div>').appendTo(this.slider.$loading)), this.errEle.html(msg)
        }, p._initSlider = function() {
            this.slider.release()
        };
        var shortCodes = {
            image: function(data, that) {
                return getImageSource(data.farm, data.server, data.id, data.secret, that.options.imgSize, data)
            },
            thumb: function(data, that) {
                return getImageSource(data.farm, data.server, data.id, data.secret, that.options.thumbSize)
            },
            title: function(data) {
                return data.title
            },
            "owner-name": function(data) {
                return data.ownername
            },
            "date-taken": function(data) {
                return data.datetaken
            },
            views: function(data) {
                return data.views
            },
            description: function(data) {
                return data.description._content
            }
        }
    }(jQuery),
    function($) {
        window.MSFacebookGallery = function(slider, options) {
            var _options = {
                count: 10,
                type: "photostream",
                thumbSize: "320",
                imgSize: "orginal",
                https: !1,
                token: ""
            };
            this.slider = slider, this.slider.holdOn(), $.extend(_options, options), this.options = _options, this.graph = "https://graph.facebook.com";
            var that = this;
            "photostream" === this.options.type ? $.getJSON(this.graph + "/" + this.options.username + "/photos/uploaded/?fields=source,name,link,images,from&limit=" + this.options.count + "&access_token=" + this.options.token, function(data) {
                that._photosData(data)
            }) : $.getJSON(this.graph + "/" + this.options.albumId + "/photos?fields=source,name,link,images,from&limit=" + this.options.count + "&access_token=" + this.options.token, function(data) {
                that._photosData(data)
            }), this.slideTemplate = this.slider.$element.find(".ms-slide")[0].outerHTML, this.slider.$element.find(".ms-slide").remove()
        };
        var p = MSFacebookGallery.prototype;
        p._photosData = function(content) {
            if (content.error) return void this.errMsg("Facebook API ERROR#" + content.error.code + "(" + content.error.type + "): " + content.error.message);
            for (var that = this, i = (this.options.author || this.options.desc, 0), l = content.data.length; i !== l; i++) {
                var slide_cont = that.slideTemplate.replace(/{{[\w-]+}}/g, function(match) {
                    return match = match.replace(/{{|}}/g, ""), shortCodes[match] ? shortCodes[match](content.data[i], that) : "{{" + match + "}}"
                });
                $(slide_cont).appendTo(that.slider.$element)
            }
            that._initSlider()
        }, p.errMsg = function(msg) {
            this.slider.$element.css("display", "block"), this.errEle || (this.errEle = $('<div style="font-family:Arial; color:red; font-size:12px; position:absolute; top:10px; left:10px"></div>').appendTo(this.slider.$loading)), this.errEle.html(msg)
        }, p._initSlider = function() {
            this.slider.release()
        };
        var getImageSource = function(images, size) {
                if ("orginal" === size) return images[0].source;
                for (var i = 0, l = images.length; i !== l; i++)
                    if (-1 !== images[i].source.indexOf(size + "x" + size)) return images[i].source;
                return images[0].source
            },
            shortCodes = {
                image: function(data, that) {
                    return getImageSource(data.images, that.options.imgSize)
                },
                thumb: function(data, that) {
                    return getImageSource(data.images, that.options.thumbSize)
                },
                name: function(data) {
                    return data.name
                },
                "owner-name": function(data) {
                    return data.from.name
                },
                link: function(data) {
                    return data.link
                }
            }
    }(jQuery),
    function($) {
        "use strict";
        window.MSScrollParallax = function(slider, parallax, bgparallax, fade) {
            this.fade = fade, this.slider = slider, this.parallax = parallax / 100, this.bgparallax = bgparallax / 100, slider.api.addEventListener(MSSliderEvent.INIT, this.init, this), slider.api.addEventListener(MSSliderEvent.DESTROY, this.destory, this), slider.api.addEventListener(MSSliderEvent.CHANGE_END, this.resetLayers, this), slider.api.addEventListener(MSSliderEvent.CHANGE_START, this.updateCurrentSlide, this)
        }, window.MSScrollParallax.setup = function(slider, parallax, bgparallax, fade) {
            return window._mobile ? void 0 : (null == parallax && (parallax = 50), null == bgparallax && (bgparallax = 40), new MSScrollParallax(slider, parallax, bgparallax, fade))
        };
        var p = window.MSScrollParallax.prototype;
        p.init = function() {
            this.slider.$element.addClass("ms-scroll-parallax"), this.sliderOffset = this.slider.$element.offset().top, this.updateCurrentSlide();
            for (var slide, slides = this.slider.api.view.slideList, i = 0, l = slides.length; i !== l; i++) slide = slides[i], slide.hasLayers && (slide.layerController.$layers.wrap('<div class="ms-scroll-parallax-cont"></div>'), slide.$scrollParallaxCont = slide.layerController.$layers.parent());
            $(window).on("scroll", {
                that: this
            }, this.moveParallax).trigger("scroll")
        }, p.resetLayers = function() {
            if (this.lastSlide) {
                var layers = this.lastSlide.$scrollParallaxCont;
                window._css2d ? (layers && (layers[0].style[window._jcsspfx + "Transform"] = ""), this.lastSlide.hasBG && (this.lastSlide.$imgcont[0].style[window._jcsspfx + "Transform"] = "")) : (layers && (layers[0].style.top = ""), this.lastSlide.hasBG && (this.lastSlide.$imgcont[0].style.top = "0px"))
            }
        }, p.updateCurrentSlide = function() {
            this.lastSlide = this.currentSlide, this.currentSlide = this.slider.api.currentSlide, this.moveParallax({
                data: {
                    that: this
                }
            })
        }, p.moveParallax = function(e) {
            var that = e.data.that,
                slider = that.slider,
                offset = that.sliderOffset,
                scrollTop = $(window).scrollTop(),
                layers = that.currentSlide.$scrollParallaxCont,
                out = offset - scrollTop;
            0 >= out ? (layers && (window._css3d ? layers[0].style[window._jcsspfx + "Transform"] = "translateY(" + -out * that.parallax + "px) translateZ(0.4px)" : window._css2d ? layers[0].style[window._jcsspfx + "Transform"] = "translateY(" + -out * that.parallax + "px)" : layers[0].style.top = -out * that.parallax + "px"), that.updateSlidesBG(-out * that.bgparallax + "px", !0), layers && that.fade && layers.css("opacity", 1 - Math.min(1, -out / slider.api.height))) : (layers && (window._css2d ? layers[0].style[window._jcsspfx + "Transform"] = "" : layers[0].style.top = ""), that.updateSlidesBG("0px", !1), layers && that.fade && layers.css("opacity", 1))
        }, p.updateSlidesBG = function(pos, fixed) {
            for (var slides = this.slider.api.view.slideList, position = !fixed || $.browser.msie || $.browser.opera ? "" : "fixed", i = 0, l = slides.length; i !== l; i++) slides[i].hasBG && (slides[i].$imgcont[0].style.position = position, slides[i].$imgcont[0].style.top = pos), slides[i].$bgvideocont && (slides[i].$bgvideocont[0].style.position = position, slides[i].$bgvideocont[0].style.top = pos)
        }, p.destory = function() {
            slider.api.removeEventListener(MSSliderEvent.INIT, this.init, this), slider.api.removeEventListener(MSSliderEvent.DESTROY, this.destory, this), slider.api.removeEventListener(MSSliderEvent.CHANGE_END, this.resetLayers, this), slider.api.removeEventListener(MSSliderEvent.CHANGE_START, this.updateCurrentSlide, this), $(window).off("scroll", this.moveParallax)
        }
    }(jQuery),
    function($, document, window) {
        var PId = 0;
        if (window.MasterSlider) {
            var KeyboardNav = function(slider) {
                this.slider = slider, this.PId = PId++, this.slider.options.keyboard && slider.api.addEventListener(MSSliderEvent.INIT, this.init, this)
            };
            KeyboardNav.name = "MSKeyboardNav";
            var p = KeyboardNav.prototype;
            p.init = function() {
                var api = this.slider.api;
                $(document).on("keydown.kbnav" + this.PId, function(event) {
                    var which = event.which;
                    37 === which || 40 === which ? api.previous(!0) : (38 === which || 39 === which) && api.next(!0)
                })
            }, p.destroy = function() {
                $(document).off("keydown.kbnav" + this.PId), this.slider.api.removeEventListener(MSSliderEvent.INIT, this.init, this)
            }, MasterSlider.registerPlugin(KeyboardNav)
        }
    }(jQuery, document, window),
    function($, document, window) {
        var PId = 0,
            $window = $(window),
            $doc = $(document);
        if (window.MasterSlider) {
            var StartOnAppear = function(slider) {
                this.PId = PId++, this.slider = slider, this.$slider = slider.$element, this.slider.options.startOnAppear && (slider.holdOn(), $doc.ready($.proxy(this.init, this)))
            };
            StartOnAppear.name = "MSStartOnAppear";
            var p = StartOnAppear.prototype;
            p.init = function() {
                this.slider.api;
                $window.on("scroll.soa" + this.PId, $.proxy(this._onScroll, this)).trigger("scroll")
            }, p._onScroll = function() {
                var vpBottom = $window.scrollTop() + $window.height(),
                    top = this.$slider.offset().top;
                vpBottom > top && ($window.off("scroll.soa" + this.PId), this.slider.release())
            }, p.destroy = function() {}, MasterSlider.registerPlugin(StartOnAppear)
        }
    }(jQuery, document, window),
    function(document, window) {
        var filterUnits = {
                "hue-rotate": "deg",
                blur: "px"
            },
            initialValues = {
                opacity: 1,
                contrast: 1,
                brightness: 1,
                saturate: 1,
                "hue-rotate": 0,
                invert: 0,
                sepia: 0,
                blur: 0,
                grayscale: 0
            };
        if (window.MasterSlider) {
            var Filters = function(slider) {
                this.slider = slider, this.slider.options.filters && slider.api.addEventListener(MSSliderEvent.INIT, this.init, this)
            };
            Filters.name = "MSFilters";
            var p = Filters.prototype;
            p.init = function() {
                var api = this.slider.api,
                    view = api.view;
                this.filters = this.slider.options.filters, this.slideList = view.slideList, this.slidesCount = view.slidesCount, this.dimension = view[view.__dimension], this.target = "slide" === this.slider.options.filterTarget ? "$element" : "$bg_img", this.filterName = $.browser.webkit ? "WebkitFilter" : "filter";
                var superFun = view.controller.__renderHook.fun,
                    superRef = view.controller.__renderHook.ref;
                view.controller.renderCallback(function(controller, value) {
                    superFun.call(superRef, controller, value), this.applyEffect(value)
                }, this), this.applyEffect(view.controller.value)
            }, p.applyEffect = function(value) {
                for (var factor, slide, i = 0; i < this.slidesCount; ++i) slide = this.slideList[i], factor = Math.min(1, Math.abs(value - slide.position) / this.dimension), slide[this.target] && ($.browser.msie ? null != this.filters.opacity && slide[this.target].opacity(1 - this.filters.opacity * factor) : slide[this.target][0].style[this.filterName] = this.generateStyle(factor))
            }, p.generateStyle = function(factor) {
                var unit, style = "";
                for (var filter in this.filters) unit = filterUnits[filter] || "", style += filter + "(" + (initialValues[filter] + (this.filters[filter] - initialValues[filter]) * factor) + ") ";
                return style
            }, p.destroy = function() {
                this.slider.api.removeEventListener(MSSliderEvent.INIT, this.init, this)
            }, MasterSlider.registerPlugin(Filters)
        }
    }(document, window, jQuery),
    function($, document, window) {
        if (window.MasterSlider) {
            var ScrollToAction = function(slider) {
                this.slider = slider, slider.api.addEventListener(MSSliderEvent.INIT, this.init, this)
            };
            ScrollToAction.name = "MSScrollToAction";
            var p = ScrollToAction.prototype;
            p.init = function() {
                var api = this.slider.api;
                api.scrollToEnd = _scrollToEnd, api.scrollTo = _scrollTo
            }, p.destroy = function() {};
            var _scrollTo = function(target, duration) {
                    var target = (this.slider.$element, $(target).eq(0));
                    0 !== target.length && (null == duration && (duration = 1.4), $("html, body").animate({
                        scrollTop: target.offset().top
                    }, 1e3 * duration, "easeInOutQuad"))
                },
                _scrollToEnd = function(duration) {
                    var sliderEle = this.slider.$element;
                    null == duration && (duration = 1.4), $("html, body").animate({
                        scrollTop: sliderEle.offset().top + sliderEle.outerHeight(!1)
                    }, 1e3 * duration, "easeInOutQuad")
                };
            MasterSlider.registerPlugin(ScrollToAction)
        }
    }(jQuery, document, window);;

jQuery.easing["jswing"] = jQuery.easing["swing"];
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(a, b, c, d, e) {
        return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
    },
    easeInQuad: function(a, b, c, d, e) {
        return d * (b /= e) * b + c
    },
    easeOutQuad: function(a, b, c, d, e) {
        return -d * (b /= e) * (b - 2) + c
    },
    easeInOutQuad: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b + c;
        return -d / 2 * (--b * (b - 2) - 1) + c
    },
    easeInCubic: function(a, b, c, d, e) {
        return d * (b /= e) * b * b + c
    },
    easeOutCubic: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b + 1) + c
    },
    easeInOutCubic: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b + 2) + c
    },
    easeInQuart: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b + c
    },
    easeOutQuart: function(a, b, c, d, e) {
        return -d * ((b = b / e - 1) * b * b * b - 1) + c
    },
    easeInOutQuart: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b * b + c;
        return -d / 2 * ((b -= 2) * b * b * b - 2) + c
    },
    easeInQuint: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b * b + c
    },
    easeOutQuint: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b * b * b + 1) + c
    },
    easeInOutQuint: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b * b * b + 2) + c
    },
    easeInSine: function(a, b, c, d, e) {
        return -d * Math.cos(b / e * (Math.PI / 2)) + d + c
    },
    easeOutSine: function(a, b, c, d, e) {
        return d * Math.sin(b / e * (Math.PI / 2)) + c
    },
    easeInOutSine: function(a, b, c, d, e) {
        return -d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
    },
    easeInExpo: function(a, b, c, d, e) {
        return b == 0 ? c : d * Math.pow(2, 10 * (b / e - 1)) + c
    },
    easeOutExpo: function(a, b, c, d, e) {
        return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
    },
    easeInOutExpo: function(a, b, c, d, e) {
        if (b == 0) return c;
        if (b == e) return c + d;
        if ((b /= e / 2) < 1) return d / 2 * Math.pow(2, 10 * (b - 1)) + c;
        return d / 2 * (-Math.pow(2, -10 * --b) + 2) + c
    },
    easeInCirc: function(a, b, c, d, e) {
        return -d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
    },
    easeOutCirc: function(a, b, c, d, e) {
        return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
    },
    easeInOutCirc: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return -d / 2 * (Math.sqrt(1 - b * b) - 1) + c;
        return d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
    },
    easeInElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e) == 1) return c + d;
        if (!g) g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return -(h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g)) + c
    },
    easeOutElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e) == 1) return c + d;
        if (!g) g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c
    },
    easeInOutElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e / 2) == 2) return c + d;
        if (!g) g = e * .3 * 1.5;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        if (b < 1) return -.5 * h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + c;
        return h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) * .5 + d + c
    },
    easeInBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        return d * (b /= e) * b * ((f + 1) * b - f) + c
    },
    easeOutBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        return d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
    },
    easeInOutBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        if ((b /= e / 2) < 1) return d / 2 * b * b * (((f *= 1.525) + 1) * b - f) + c;
        return d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
    },
    easeInBounce: function(a, b, c, d, e) {
        return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
    },
    easeOutBounce: function(a, b, c, d, e) {
        if ((b /= e) < 1 / 2.75) {
            return d * 7.5625 * b * b + c
        } else if (b < 2 / 2.75) {
            return d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c
        } else if (b < 2.5 / 2.75) {
            return d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c
        } else {
            return d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
        }
    },
    easeInOutBounce: function(a, b, c, d, e) {
        if (b < e / 2) return jQuery.easing.easeInBounce(a, b * 2, 0, d, e) * .5 + c;
        return jQuery.easing.easeOutBounce(a, b * 2 - e, 0, d, e) * .5 + d * .5 + c
    }
})
/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
;;
(function($) {
    "use strict";
    $('.content-main h6 a').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).parent().next(".content-hidden").toggleClass('active');
    });
    $('.default-master-slider').masterslider({
        width: 1400,
        height: 800,
        space: 5,
        layout: 'fullwidth',
        fullwidth: true,
        layersMode: "center",
        loop: true,
        preload: 0,
        autoplay: false,
        controls: {
            arrows: {
                autohide: false
            },
            bullets: {}
        }
    });
    $('.secondary-master-slider').masterslider({
        width: 1400,
        height: 800,
        space: 5,
        layout: 'fullwidth',
        fullwidth: true,
        layersMode: "center",
        loop: true,
        preload: 0,
        autoplay: true,
        controls: {
            bullets: {
                autohide: false
            }
        }
    });
    $('.app-master-slider').masterslider({
        width: 1400,
        height: 600,
        space: 5,
        layout: 'fullwidth',
        fullwidth: true,
        loop: true,
        preload: 0,
        autoplay: true,
        controls: {
            bullets: {
                autohide: false
            }
        }
    });
    $('.app-master-slider-secondary').masterslider({
        width: 1400,
        height: 600,
        space: 5,
        layout: 'fullwidth',
        fullwidth: true,
        loop: true,
        preload: 0,
        autoplay: true,
        controls: {
            arrows: {
                autohide: false
            },
            bullets: {}
        }
    });
    $('.small-height-slider').masterslider({
        width: 1400,
        height: 480,
        space: 5,
        layout: 'fullwidth',
        fullwidth: true,
        loop: true,
        preload: 0,
        autoplay: true,
        controls: {
            arrows: {
                autohide: false
            },
            bullets: {
                autohide: false
            }
        }
    });
}(jQuery));
/*!
 * Bootstrap v3.3.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
if (typeof jQuery === 'undefined') {
    throw new Error('Bootstrap\'s JavaScript requires jQuery')
} +
function($) {
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1)) {
        throw new Error('Bootstrap\'s JavaScript requires jQuery version 1.9.1 or higher')
    }
}(jQuery); + function($) {
    'use strict';

    function transitionEnd() {
        var el = document.createElement('bootstrap')
        var transEndEventNames = {
            WebkitTransition: 'webkitTransitionEnd',
            MozTransition: 'transitionend',
            OTransition: 'oTransitionEnd otransitionend',
            transition: 'transitionend'
        }
        for (var name in transEndEventNames) {
            if (el.style[name] !== undefined) {
                return {
                    end: transEndEventNames[name]
                }
            }
        }
        return false
    }
    $.fn.emulateTransitionEnd = function(duration) {
        var called = false
        var $el = this
        $(this).one('bsTransitionEnd', function() {
            called = true
        })
        var callback = function() {
            if (!called) $($el).trigger($.support.transition.end)
        }
        setTimeout(callback, duration)
        return this
    }
    $(function() {
        $.support.transition = transitionEnd()
        if (!$.support.transition) return
        $.event.special.bsTransitionEnd = {
            bindType: $.support.transition.end,
            delegateType: $.support.transition.end,
            handle: function(e) {
                if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        }
    })
}(jQuery); + function($) {
    'use strict';
    var dismiss = '[data-dismiss="alert"]'
    var Alert = function(el) {
        $(el).on('click', dismiss, this.close)
    }
    Alert.VERSION = '3.3.1'
    Alert.TRANSITION_DURATION = 150
    Alert.prototype.close = function(e) {
        var $this = $(this)
        var selector = $this.attr('data-target')
        if (!selector) {
            selector = $this.attr('href')
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '')
        }
        var $parent = $(selector)
        if (e) e.preventDefault()
        if (!$parent.length) {
            $parent = $this.closest('.alert')
        }
        $parent.trigger(e = $.Event('close.bs.alert'))
        if (e.isDefaultPrevented()) return
        $parent.removeClass('in')

        function removeElement() {
            $parent.detach().trigger('closed.bs.alert').remove()
        }
        $.support.transition && $parent.hasClass('fade') ? $parent.one('bsTransitionEnd', removeElement).emulateTransitionEnd(Alert.TRANSITION_DURATION) : removeElement()
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.alert')
            if (!data) $this.data('bs.alert', (data = new Alert(this)))
            if (typeof option == 'string') data[option].call($this)
        })
    }
    var old = $.fn.alert
    $.fn.alert = Plugin
    $.fn.alert.Constructor = Alert
    $.fn.alert.noConflict = function() {
        $.fn.alert = old
        return this
    }
    $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)
}(jQuery); + function($) {
    'use strict';
    var Button = function(element, options) {
        this.$element = $(element)
        this.options = $.extend({}, Button.DEFAULTS, options)
        this.isLoading = false
    }
    Button.VERSION = '3.3.1'
    Button.DEFAULTS = {
        loadingText: 'loading...'
    }
    Button.prototype.setState = function(state) {
        var d = 'disabled'
        var $el = this.$element
        var val = $el.is('input') ? 'val' : 'html'
        var data = $el.data()
        state = state + 'Text'
        if (data.resetText == null) $el.data('resetText', $el[val]())
        setTimeout($.proxy(function() {
            $el[val](data[state] == null ? this.options[state] : data[state])
            if (state == 'loadingText') {
                this.isLoading = true
                $el.addClass(d).attr(d, d)
            } else if (this.isLoading) {
                this.isLoading = false
                $el.removeClass(d).removeAttr(d)
            }
        }, this), 0)
    }
    Button.prototype.toggle = function() {
        var changed = true
        var $parent = this.$element.closest('[data-toggle="buttons"]')
        if ($parent.length) {
            var $input = this.$element.find('input')
            if ($input.prop('type') == 'radio') {
                if ($input.prop('checked') && this.$element.hasClass('active')) changed = false
                else $parent.find('.active').removeClass('active')
            }
            if (changed) $input.prop('checked', !this.$element.hasClass('active')).trigger('change')
        } else {
            this.$element.attr('aria-pressed', !this.$element.hasClass('active'))
        }
        if (changed) this.$element.toggleClass('active')
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.button')
            var options = typeof option == 'object' && option
            if (!data) $this.data('bs.button', (data = new Button(this, options)))
            if (option == 'toggle') data.toggle()
            else if (option) data.setState(option)
        })
    }
    var old = $.fn.button
    $.fn.button = Plugin
    $.fn.button.Constructor = Button
    $.fn.button.noConflict = function() {
        $.fn.button = old
        return this
    }
    $(document).on('click.bs.button.data-api', '[data-toggle^="button"]', function(e) {
        var $btn = $(e.target)
        if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
        Plugin.call($btn, 'toggle')
        e.preventDefault()
    }).on('focus.bs.button.data-api blur.bs.button.data-api', '[data-toggle^="button"]', function(e) {
        $(e.target).closest('.btn').toggleClass('focus', /^focus(in)?$/.test(e.type))
    })
}(jQuery); + function($) {
    'use strict';
    var Carousel = function(element, options) {
        this.$element = $(element)
        this.$indicators = this.$element.find('.carousel-indicators')
        this.options = options
        this.paused = this.sliding = this.interval = this.$active = this.$items = null
        this.options.keyboard && this.$element.on('keydown.bs.carousel', $.proxy(this.keydown, this))
        this.options.pause == 'hover' && !('ontouchstart' in document.documentElement) && this.$element.on('mouseenter.bs.carousel', $.proxy(this.pause, this)).on('mouseleave.bs.carousel', $.proxy(this.cycle, this))
    }
    Carousel.VERSION = '3.3.1'
    Carousel.TRANSITION_DURATION = 600
    Carousel.DEFAULTS = {
        interval: 5000,
        pause: 'hover',
        wrap: true,
        keyboard: true
    }
    Carousel.prototype.keydown = function(e) {
        if (/input|textarea/i.test(e.target.tagName)) return
        switch (e.which) {
            case 37:
                this.prev();
                break
            case 39:
                this.next();
                break
            default:
                return
        }
        e.preventDefault()
    }
    Carousel.prototype.cycle = function(e) {
        e || (this.paused = false)
        this.interval && clearInterval(this.interval)
        this.options.interval && !this.paused && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))
        return this
    }
    Carousel.prototype.getItemIndex = function(item) {
        this.$items = item.parent().children('.item')
        return this.$items.index(item || this.$active)
    }
    Carousel.prototype.getItemForDirection = function(direction, active) {
        var delta = direction == 'prev' ? -1 : 1
        var activeIndex = this.getItemIndex(active)
        var itemIndex = (activeIndex + delta) % this.$items.length
        return this.$items.eq(itemIndex)
    }
    Carousel.prototype.to = function(pos) {
        var that = this
        var activeIndex = this.getItemIndex(this.$active = this.$element.find('.item.active'))
        if (pos > (this.$items.length - 1) || pos < 0) return
        if (this.sliding) return this.$element.one('slid.bs.carousel', function() {
            that.to(pos)
        })
        if (activeIndex == pos) return this.pause().cycle()
        return this.slide(pos > activeIndex ? 'next' : 'prev', this.$items.eq(pos))
    }
    Carousel.prototype.pause = function(e) {
        e || (this.paused = true)
        if (this.$element.find('.next, .prev').length && $.support.transition) {
            this.$element.trigger($.support.transition.end)
            this.cycle(true)
        }
        this.interval = clearInterval(this.interval)
        return this
    }
    Carousel.prototype.next = function() {
        if (this.sliding) return
        return this.slide('next')
    }
    Carousel.prototype.prev = function() {
        if (this.sliding) return
        return this.slide('prev')
    }
    Carousel.prototype.slide = function(type, next) {
        var $active = this.$element.find('.item.active')
        var $next = next || this.getItemForDirection(type, $active)
        var isCycling = this.interval
        var direction = type == 'next' ? 'left' : 'right'
        var fallback = type == 'next' ? 'first' : 'last'
        var that = this
        if (!$next.length) {
            if (!this.options.wrap) return
            $next = this.$element.find('.item')[fallback]()
        }
        if ($next.hasClass('active')) return (this.sliding = false)
        var relatedTarget = $next[0]
        var slideEvent = $.Event('slide.bs.carousel', {
            relatedTarget: relatedTarget,
            direction: direction
        })
        this.$element.trigger(slideEvent)
        if (slideEvent.isDefaultPrevented()) return
        this.sliding = true
        isCycling && this.pause()
        if (this.$indicators.length) {
            this.$indicators.find('.active').removeClass('active')
            var $nextIndicator = $(this.$indicators.children()[this.getItemIndex($next)])
            $nextIndicator && $nextIndicator.addClass('active')
        }
        var slidEvent = $.Event('slid.bs.carousel', {
            relatedTarget: relatedTarget,
            direction: direction
        })
        if ($.support.transition && this.$element.hasClass('slide')) {
            $next.addClass(type)
            $next[0].offsetWidth
            $active.addClass(direction)
            $next.addClass(direction)
            $active.one('bsTransitionEnd', function() {
                $next.removeClass([type, direction].join(' ')).addClass('active')
                $active.removeClass(['active', direction].join(' '))
                that.sliding = false
                setTimeout(function() {
                    that.$element.trigger(slidEvent)
                }, 0)
            }).emulateTransitionEnd(Carousel.TRANSITION_DURATION)
        } else {
            $active.removeClass('active')
            $next.addClass('active')
            this.sliding = false
            this.$element.trigger(slidEvent)
        }
        isCycling && this.cycle()
        return this
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.carousel')
            var options = $.extend({}, Carousel.DEFAULTS, $this.data(), typeof option == 'object' && option)
            var action = typeof option == 'string' ? option : options.slide
            if (!data) $this.data('bs.carousel', (data = new Carousel(this, options)))
            if (typeof option == 'number') data.to(option)
            else if (action) data[action]()
            else if (options.interval) data.pause().cycle()
        })
    }
    var old = $.fn.carousel
    $.fn.carousel = Plugin
    $.fn.carousel.Constructor = Carousel
    $.fn.carousel.noConflict = function() {
        $.fn.carousel = old
        return this
    }
    var clickHandler = function(e) {
        var href
        var $this = $(this)
        var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''))
        if (!$target.hasClass('carousel')) return
        var options = $.extend({}, $target.data(), $this.data())
        var slideIndex = $this.attr('data-slide-to')
        if (slideIndex) options.interval = false
        Plugin.call($target, options)
        if (slideIndex) {
            $target.data('bs.carousel').to(slideIndex)
        }
        e.preventDefault()
    }
    $(document).on('click.bs.carousel.data-api', '[data-slide]', clickHandler).on('click.bs.carousel.data-api', '[data-slide-to]', clickHandler)
    $(window).on('load', function() {
        $('[data-ride="carousel"]').each(function() {
            var $carousel = $(this)
            Plugin.call($carousel, $carousel.data())
        })
    })
}(jQuery); + function($) {
    'use strict';
    var Collapse = function(element, options) {
        this.$element = $(element)
        this.options = $.extend({}, Collapse.DEFAULTS, options)
        this.$trigger = $(this.options.trigger).filter('[href="#' + element.id + '"], [data-target="#' + element.id + '"]')
        this.transitioning = null
        if (this.options.parent) {
            this.$parent = this.getParent()
        } else {
            this.addAriaAndCollapsedClass(this.$element, this.$trigger)
        }
        if (this.options.toggle) this.toggle()
    }
    Collapse.VERSION = '3.3.1'
    Collapse.TRANSITION_DURATION = 350
    Collapse.DEFAULTS = {
        toggle: true,
        trigger: '[data-toggle="collapse"]'
    }
    Collapse.prototype.dimension = function() {
        var hasWidth = this.$element.hasClass('width')
        return hasWidth ? 'width' : 'height'
    }
    Collapse.prototype.show = function() {
        if (this.transitioning || this.$element.hasClass('in')) return
        var activesData
        var actives = this.$parent && this.$parent.find('> .panel').children('.in, .collapsing')
        if (actives && actives.length) {
            activesData = actives.data('bs.collapse')
            if (activesData && activesData.transitioning) return
        }
        var startEvent = $.Event('show.bs.collapse')
        this.$element.trigger(startEvent)
        if (startEvent.isDefaultPrevented()) return
        if (actives && actives.length) {
            Plugin.call(actives, 'hide')
            activesData || actives.data('bs.collapse', null)
        }
        var dimension = this.dimension()
        this.$element.removeClass('collapse').addClass('collapsing')[dimension](0).attr('aria-expanded', true)
        this.$trigger.removeClass('collapsed').attr('aria-expanded', true)
        this.transitioning = 1
        var complete = function() {
            this.$element.removeClass('collapsing').addClass('collapse in')[dimension]('')
            this.transitioning = 0
            this.$element.trigger('shown.bs.collapse')
        }
        if (!$.support.transition) return complete.call(this)
        var scrollSize = $.camelCase(['scroll', dimension].join('-'))
        this.$element.one('bsTransitionEnd', $.proxy(complete, this)).emulateTransitionEnd(Collapse.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
    }
    Collapse.prototype.hide = function() {
        if (this.transitioning || !this.$element.hasClass('in')) return
        var startEvent = $.Event('hide.bs.collapse')
        this.$element.trigger(startEvent)
        if (startEvent.isDefaultPrevented()) return
        var dimension = this.dimension()
        this.$element[dimension](this.$element[dimension]())[0].offsetHeight
        this.$element.addClass('collapsing').removeClass('collapse in').attr('aria-expanded', false)
        this.$trigger.addClass('collapsed').attr('aria-expanded', false)
        this.transitioning = 1
        var complete = function() {
            this.transitioning = 0
            this.$element.removeClass('collapsing').addClass('collapse').trigger('hidden.bs.collapse')
        }
        if (!$.support.transition) return complete.call(this)
        this.$element[dimension](0).one('bsTransitionEnd', $.proxy(complete, this)).emulateTransitionEnd(Collapse.TRANSITION_DURATION)
    }
    Collapse.prototype.toggle = function() {
        this[this.$element.hasClass('in') ? 'hide' : 'show']()
    }
    Collapse.prototype.getParent = function() {
        return $(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each($.proxy(function(i, element) {
            var $element = $(element)
            this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
        }, this)).end()
    }
    Collapse.prototype.addAriaAndCollapsedClass = function($element, $trigger) {
        var isOpen = $element.hasClass('in')
        $element.attr('aria-expanded', isOpen)
        $trigger.toggleClass('collapsed', !isOpen).attr('aria-expanded', isOpen)
    }

    function getTargetFromTrigger($trigger) {
        var href
        var target = $trigger.attr('data-target') || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')
        return $(target)
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.collapse')
            var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data && options.toggle && option == 'show') options.toggle = false
            if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.collapse
    $.fn.collapse = Plugin
    $.fn.collapse.Constructor = Collapse
    $.fn.collapse.noConflict = function() {
        $.fn.collapse = old
        return this
    }
    $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function(e) {
        var $this = $(this)
        if (!$this.attr('data-target')) e.preventDefault()
        var $target = getTargetFromTrigger($this)
        var data = $target.data('bs.collapse')
        var option = data ? 'toggle' : $.extend({}, $this.data(), {
            trigger: this
        })
        Plugin.call($target, option)
    })
}(jQuery); + function($) {
    'use strict';
    var backdrop = '.dropdown-backdrop'
    var toggle = '[data-toggle="dropdown"]'
    var Dropdown = function(element) {
        $(element).on('click.bs.dropdown', this.toggle)
    }
    Dropdown.VERSION = '3.3.1'
    Dropdown.prototype.toggle = function(e) {
        var $this = $(this)
        if ($this.is('.disabled, :disabled')) return
        var $parent = getParent($this)
        var isActive = $parent.hasClass('open')
        clearMenus()
        if (!isActive) {
            if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
                $('<div class="dropdown-backdrop"/>').insertAfter($(this)).on('click', clearMenus)
            }
            var relatedTarget = {
                relatedTarget: this
            }
            $parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))
            if (e.isDefaultPrevented()) return
            $this.trigger('focus').attr('aria-expanded', 'true')
            $parent.toggleClass('open').trigger('shown.bs.dropdown', relatedTarget)
        }
        return false
    }
    Dropdown.prototype.keydown = function(e) {
        if (!/(38|40|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return
        var $this = $(this)
        e.preventDefault()
        e.stopPropagation()
        if ($this.is('.disabled, :disabled')) return
        var $parent = getParent($this)
        var isActive = $parent.hasClass('open')
        if ((!isActive && e.which != 27) || (isActive && e.which == 27)) {
            if (e.which == 27) $parent.find(toggle).trigger('focus')
            return $this.trigger('click')
        }
        var desc = ' li:not(.divider):visible a'
        var $items = $parent.find('[role="menu"]' + desc + ', [role="listbox"]' + desc)
        if (!$items.length) return
        var index = $items.index(e.target)
        if (e.which == 38 && index > 0) index--
        if (e.which == 40 && index < $items.length - 1) index++
        if (!~index) index = 0
        $items.eq(index).trigger('focus')
    }

    function clearMenus(e) {
        if (e && e.which === 3) return
        $(backdrop).remove()
        $(toggle).each(function() {
            var $this = $(this)
            var $parent = getParent($this)
            var relatedTarget = {
                relatedTarget: this
            }
            if (!$parent.hasClass('open')) return
            $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))
            if (e.isDefaultPrevented()) return
            $this.attr('aria-expanded', 'false')
            $parent.removeClass('open').trigger('hidden.bs.dropdown', relatedTarget)
        })
    }

    function getParent($this) {
        var selector = $this.attr('data-target')
        if (!selector) {
            selector = $this.attr('href')
            selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '')
        }
        var $parent = selector && $(selector)
        return $parent && $parent.length ? $parent : $this.parent()
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.dropdown')
            if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
            if (typeof option == 'string') data[option].call($this)
        })
    }
    var old = $.fn.dropdown
    $.fn.dropdown = Plugin
    $.fn.dropdown.Constructor = Dropdown
    $.fn.dropdown.noConflict = function() {
        $.fn.dropdown = old
        return this
    }
    $(document).on('click.bs.dropdown.data-api', clearMenus).on('click.bs.dropdown.data-api', '.dropdown form', function(e) {
        e.stopPropagation()
    }).on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle).on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown).on('keydown.bs.dropdown.data-api', '[role="menu"]', Dropdown.prototype.keydown).on('keydown.bs.dropdown.data-api', '[role="listbox"]', Dropdown.prototype.keydown)
}(jQuery); + function($) {
    'use strict';
    var Modal = function(element, options) {
        this.options = options
        this.$body = $(document.body)
        this.$element = $(element)
        this.$backdrop = this.isShown = null
        this.scrollbarWidth = 0
        if (this.options.remote) {
            this.$element.find('.modal-content').load(this.options.remote, $.proxy(function() {
                this.$element.trigger('loaded.bs.modal')
            }, this))
        }
    }
    Modal.VERSION = '3.3.1'
    Modal.TRANSITION_DURATION = 300
    Modal.BACKDROP_TRANSITION_DURATION = 150
    Modal.DEFAULTS = {
        backdrop: true,
        keyboard: true,
        show: true
    }
    Modal.prototype.toggle = function(_relatedTarget) {
        return this.isShown ? this.hide() : this.show(_relatedTarget)
    }
    Modal.prototype.show = function(_relatedTarget) {
        var that = this
        var e = $.Event('show.bs.modal', {
            relatedTarget: _relatedTarget
        })
        this.$element.trigger(e)
        if (this.isShown || e.isDefaultPrevented()) return
        this.isShown = true
        this.checkScrollbar()
        this.setScrollbar()
        this.$body.addClass('modal-open')
        this.escape()
        this.resize()
        this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))
        this.backdrop(function() {
            var transition = $.support.transition && that.$element.hasClass('fade')
            if (!that.$element.parent().length) {
                that.$element.appendTo(that.$body)
            }
            that.$element.show().scrollTop(0)
            if (that.options.backdrop) that.adjustBackdrop()
            that.adjustDialog()
            if (transition) {
                that.$element[0].offsetWidth
            }
            that.$element.addClass('in').attr('aria-hidden', false)
            that.enforceFocus()
            var e = $.Event('shown.bs.modal', {
                relatedTarget: _relatedTarget
            })
            transition ? that.$element.find('.modal-dialog').one('bsTransitionEnd', function() {
                that.$element.trigger('focus').trigger(e)
            }).emulateTransitionEnd(Modal.TRANSITION_DURATION) : that.$element.trigger('focus').trigger(e)
        })
    }
    Modal.prototype.hide = function(e) {
        if (e) e.preventDefault()
        e = $.Event('hide.bs.modal')
        this.$element.trigger(e)
        if (!this.isShown || e.isDefaultPrevented()) return
        this.isShown = false
        this.escape()
        this.resize()
        $(document).off('focusin.bs.modal')
        this.$element.removeClass('in').attr('aria-hidden', true).off('click.dismiss.bs.modal')
        $.support.transition && this.$element.hasClass('fade') ? this.$element.one('bsTransitionEnd', $.proxy(this.hideModal, this)).emulateTransitionEnd(Modal.TRANSITION_DURATION) : this.hideModal()
    }
    Modal.prototype.enforceFocus = function() {
        $(document).off('focusin.bs.modal').on('focusin.bs.modal', $.proxy(function(e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
                this.$element.trigger('focus')
            }
        }, this))
    }
    Modal.prototype.escape = function() {
        if (this.isShown && this.options.keyboard) {
            this.$element.on('keydown.dismiss.bs.modal', $.proxy(function(e) {
                e.which == 27 && this.hide()
            }, this))
        } else if (!this.isShown) {
            this.$element.off('keydown.dismiss.bs.modal')
        }
    }
    Modal.prototype.resize = function() {
        if (this.isShown) {
            $(window).on('resize.bs.modal', $.proxy(this.handleUpdate, this))
        } else {
            $(window).off('resize.bs.modal')
        }
    }
    Modal.prototype.hideModal = function() {
        var that = this
        this.$element.hide()
        this.backdrop(function() {
            that.$body.removeClass('modal-open')
            that.resetAdjustments()
            that.resetScrollbar()
            that.$element.trigger('hidden.bs.modal')
        })
    }
    Modal.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove()
        this.$backdrop = null
    }
    Modal.prototype.backdrop = function(callback) {
        var that = this
        var animate = this.$element.hasClass('fade') ? 'fade' : ''
        if (this.isShown && this.options.backdrop) {
            var doAnimate = $.support.transition && animate
            this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />').prependTo(this.$element).on('click.dismiss.bs.modal', $.proxy(function(e) {
                if (e.target !== e.currentTarget) return
                this.options.backdrop == 'static' ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this)
            }, this))
            if (doAnimate) this.$backdrop[0].offsetWidth
            this.$backdrop.addClass('in')
            if (!callback) return
            doAnimate ? this.$backdrop.one('bsTransitionEnd', callback).emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) : callback()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass('in')
            var callbackRemove = function() {
                that.removeBackdrop()
                callback && callback()
            }
            $.support.transition && this.$element.hasClass('fade') ? this.$backdrop.one('bsTransitionEnd', callbackRemove).emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) : callbackRemove()
        } else if (callback) {
            callback()
        }
    }
    Modal.prototype.handleUpdate = function() {
        if (this.options.backdrop) this.adjustBackdrop()
        this.adjustDialog()
    }
    Modal.prototype.adjustBackdrop = function() {
        this.$backdrop.css('height', 0).css('height', this.$element[0].scrollHeight)
    }
    Modal.prototype.adjustDialog = function() {
        var modalIsOverflowing = this.$element[0].scrollHeight > document.documentElement.clientHeight
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && modalIsOverflowing ? this.scrollbarWidth : '',
            paddingRight: this.bodyIsOverflowing && !modalIsOverflowing ? this.scrollbarWidth : ''
        })
    }
    Modal.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: '',
            paddingRight: ''
        })
    }
    Modal.prototype.checkScrollbar = function() {
        this.bodyIsOverflowing = document.body.scrollHeight > document.documentElement.clientHeight
        this.scrollbarWidth = this.measureScrollbar()
    }
    Modal.prototype.setScrollbar = function() {
        var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
        if (this.bodyIsOverflowing) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
    }
    Modal.prototype.resetScrollbar = function() {
        this.$body.css('padding-right', '')
    }
    Modal.prototype.measureScrollbar = function() {
        var scrollDiv = document.createElement('div')
        scrollDiv.className = 'modal-scrollbar-measure'
        this.$body.append(scrollDiv)
        var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
        this.$body[0].removeChild(scrollDiv)
        return scrollbarWidth
    }

    function Plugin(option, _relatedTarget) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.modal')
            var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
            if (typeof option == 'string') data[option](_relatedTarget)
            else if (options.show) data.show(_relatedTarget)
        })
    }
    var old = $.fn.modal
    $.fn.modal = Plugin
    $.fn.modal.Constructor = Modal
    $.fn.modal.noConflict = function() {
        $.fn.modal = old
        return this
    }
    $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function(e) {
        var $this = $(this)
        var href = $this.attr('href')
        var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, '')))
        var option = $target.data('bs.modal') ? 'toggle' : $.extend({
            remote: !/#/.test(href) && href
        }, $target.data(), $this.data())
        if ($this.is('a')) e.preventDefault()
        $target.one('show.bs.modal', function(showEvent) {
            if (showEvent.isDefaultPrevented()) return
            $target.one('hidden.bs.modal', function() {
                $this.is(':visible') && $this.trigger('focus')
            })
        })
        Plugin.call($target, option, this)
    })
}(jQuery); + function($) {
    'use strict';
    var Tooltip = function(element, options) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null
        this.init('tooltip', element, options)
    }
    Tooltip.VERSION = '3.3.1'
    Tooltip.TRANSITION_DURATION = 150
    Tooltip.DEFAULTS = {
        animation: true,
        placement: 'top',
        selector: false,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: 'hover focus',
        title: '',
        delay: 0,
        html: false,
        container: false,
        viewport: {
            selector: 'body',
            padding: 0
        }
    }
    Tooltip.prototype.init = function(type, element, options) {
        this.enabled = true
        this.type = type
        this.$element = $(element)
        this.options = this.getOptions(options)
        this.$viewport = this.options.viewport && $(this.options.viewport.selector || this.options.viewport)
        var triggers = this.options.trigger.split(' ')
        for (var i = triggers.length; i--;) {
            var trigger = triggers[i]
            if (trigger == 'click') {
                this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this))
            } else if (trigger != 'manual') {
                var eventIn = trigger == 'hover' ? 'mouseenter' : 'focusin'
                var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout'
                this.$element.on(eventIn + '.' + this.type, this.options.selector, $.proxy(this.enter, this))
                this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this))
            }
        }
        this.options.selector ? (this._options = $.extend({}, this.options, {
            trigger: 'manual',
            selector: ''
        })) : this.fixTitle()
    }
    Tooltip.prototype.getDefaults = function() {
        return Tooltip.DEFAULTS
    }
    Tooltip.prototype.getOptions = function(options) {
        options = $.extend({}, this.getDefaults(), this.$element.data(), options)
        if (options.delay && typeof options.delay == 'number') {
            options.delay = {
                show: options.delay,
                hide: options.delay
            }
        }
        return options
    }
    Tooltip.prototype.getDelegateOptions = function() {
        var options = {}
        var defaults = this.getDefaults()
        this._options && $.each(this._options, function(key, value) {
            if (defaults[key] != value) options[key] = value
        })
        return options
    }
    Tooltip.prototype.enter = function(obj) {
        var self = obj instanceof this.constructor ? obj : $(obj.currentTarget).data('bs.' + this.type)
        if (self && self.$tip && self.$tip.is(':visible')) {
            self.hoverState = 'in'
            return
        }
        if (!self) {
            self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
            $(obj.currentTarget).data('bs.' + this.type, self)
        }
        clearTimeout(self.timeout)
        self.hoverState = 'in'
        if (!self.options.delay || !self.options.delay.show) return self.show()
        self.timeout = setTimeout(function() {
            if (self.hoverState == 'in') self.show()
        }, self.options.delay.show)
    }
    Tooltip.prototype.leave = function(obj) {
        var self = obj instanceof this.constructor ? obj : $(obj.currentTarget).data('bs.' + this.type)
        if (!self) {
            self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
            $(obj.currentTarget).data('bs.' + this.type, self)
        }
        clearTimeout(self.timeout)
        self.hoverState = 'out'
        if (!self.options.delay || !self.options.delay.hide) return self.hide()
        self.timeout = setTimeout(function() {
            if (self.hoverState == 'out') self.hide()
        }, self.options.delay.hide)
    }
    Tooltip.prototype.show = function() {
        var e = $.Event('show.bs.' + this.type)
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(e)
            var inDom = $.contains(this.$element[0].ownerDocument.documentElement, this.$element[0])
            if (e.isDefaultPrevented() || !inDom) return
            var that = this
            var $tip = this.tip()
            var tipId = this.getUID(this.type)
            this.setContent()
            $tip.attr('id', tipId)
            this.$element.attr('aria-describedby', tipId)
            if (this.options.animation) $tip.addClass('fade')
            var placement = typeof this.options.placement == 'function' ? this.options.placement.call(this, $tip[0], this.$element[0]) : this.options.placement
            var autoToken = /\s?auto?\s?/i
            var autoPlace = autoToken.test(placement)
            if (autoPlace) placement = placement.replace(autoToken, '') || 'top'
            $tip.detach().css({
                top: 0,
                left: 0,
                display: 'block'
            }).addClass(placement).data('bs.' + this.type, this)
            this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)
            var pos = this.getPosition()
            var actualWidth = $tip[0].offsetWidth
            var actualHeight = $tip[0].offsetHeight
            if (autoPlace) {
                var orgPlacement = placement
                var $container = this.options.container ? $(this.options.container) : this.$element.parent()
                var containerDim = this.getPosition($container)
                placement = placement == 'bottom' && pos.bottom + actualHeight > containerDim.bottom ? 'top' : placement == 'top' && pos.top - actualHeight < containerDim.top ? 'bottom' : placement == 'right' && pos.right + actualWidth > containerDim.width ? 'left' : placement == 'left' && pos.left - actualWidth < containerDim.left ? 'right' : placement
                $tip.removeClass(orgPlacement).addClass(placement)
            }
            var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight)
            this.applyPlacement(calculatedOffset, placement)
            var complete = function() {
                var prevHoverState = that.hoverState
                that.$element.trigger('shown.bs.' + that.type)
                that.hoverState = null
                if (prevHoverState == 'out') that.leave(that)
            }
            $.support.transition && this.$tip.hasClass('fade') ? $tip.one('bsTransitionEnd', complete).emulateTransitionEnd(Tooltip.TRANSITION_DURATION) : complete()
        }
    }
    Tooltip.prototype.applyPlacement = function(offset, placement) {
        var $tip = this.tip()
        var width = $tip[0].offsetWidth
        var height = $tip[0].offsetHeight
        var marginTop = parseInt($tip.css('margin-top'), 10)
        var marginLeft = parseInt($tip.css('margin-left'), 10)
        if (isNaN(marginTop)) marginTop = 0
        if (isNaN(marginLeft)) marginLeft = 0
        offset.top = offset.top + marginTop
        offset.left = offset.left + marginLeft
        $.offset.setOffset($tip[0], $.extend({
            using: function(props) {
                $tip.css({
                    top: Math.round(props.top),
                    left: Math.round(props.left)
                })
            }
        }, offset), 0)
        $tip.addClass('in')
        var actualWidth = $tip[0].offsetWidth
        var actualHeight = $tip[0].offsetHeight
        if (placement == 'top' && actualHeight != height) {
            offset.top = offset.top + height - actualHeight
        }
        var delta = this.getViewportAdjustedDelta(placement, offset, actualWidth, actualHeight)
        if (delta.left) offset.left += delta.left
        else offset.top += delta.top
        var isVertical = /top|bottom/.test(placement)
        var arrowDelta = isVertical ? delta.left * 2 - width + actualWidth : delta.top * 2 - height + actualHeight
        var arrowOffsetPosition = isVertical ? 'offsetWidth' : 'offsetHeight'
        $tip.offset(offset)
        this.replaceArrow(arrowDelta, $tip[0][arrowOffsetPosition], isVertical)
    }
    Tooltip.prototype.replaceArrow = function(delta, dimension, isHorizontal) {
        this.arrow().css(isHorizontal ? 'left' : 'top', 50 * (1 - delta / dimension) + '%').css(isHorizontal ? 'top' : 'left', '')
    }
    Tooltip.prototype.setContent = function() {
        var $tip = this.tip()
        var title = this.getTitle()
        $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
        $tip.removeClass('fade in top bottom left right')
    }
    Tooltip.prototype.hide = function(callback) {
        var that = this
        var $tip = this.tip()
        var e = $.Event('hide.bs.' + this.type)

        function complete() {
            if (that.hoverState != 'in') $tip.detach()
            that.$element.removeAttr('aria-describedby').trigger('hidden.bs.' + that.type)
            callback && callback()
        }
        this.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $tip.removeClass('in')
        $.support.transition && this.$tip.hasClass('fade') ? $tip.one('bsTransitionEnd', complete).emulateTransitionEnd(Tooltip.TRANSITION_DURATION) : complete()
        this.hoverState = null
        return this
    }
    Tooltip.prototype.fixTitle = function() {
        var $e = this.$element
        if ($e.attr('title') || typeof($e.attr('data-original-title')) != 'string') {
            $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
        }
    }
    Tooltip.prototype.hasContent = function() {
        return this.getTitle()
    }
    Tooltip.prototype.getPosition = function($element) {
        $element = $element || this.$element
        var el = $element[0]
        var isBody = el.tagName == 'BODY'
        var elRect = el.getBoundingClientRect()
        if (elRect.width == null) {
            elRect = $.extend({}, elRect, {
                width: elRect.right - elRect.left,
                height: elRect.bottom - elRect.top
            })
        }
        var elOffset = isBody ? {
            top: 0,
            left: 0
        } : $element.offset()
        var scroll = {
            scroll: isBody ? document.documentElement.scrollTop || document.body.scrollTop : $element.scrollTop()
        }
        var outerDims = isBody ? {
            width: $(window).width(),
            height: $(window).height()
        } : null
        return $.extend({}, elRect, scroll, outerDims, elOffset)
    }
    Tooltip.prototype.getCalculatedOffset = function(placement, pos, actualWidth, actualHeight) {
        return placement == 'bottom' ? {
            top: pos.top + pos.height,
            left: pos.left + pos.width / 2 - actualWidth / 2
        } : placement == 'top' ? {
            top: pos.top - actualHeight,
            left: pos.left + pos.width / 2 - actualWidth / 2
        } : placement == 'left' ? {
            top: pos.top + pos.height / 2 - actualHeight / 2,
            left: pos.left - actualWidth
        } : {
            top: pos.top + pos.height / 2 - actualHeight / 2,
            left: pos.left + pos.width
        }
    }
    Tooltip.prototype.getViewportAdjustedDelta = function(placement, pos, actualWidth, actualHeight) {
        var delta = {
            top: 0,
            left: 0
        }
        if (!this.$viewport) return delta
        var viewportPadding = this.options.viewport && this.options.viewport.padding || 0
        var viewportDimensions = this.getPosition(this.$viewport)
        if (/right|left/.test(placement)) {
            var topEdgeOffset = pos.top - viewportPadding - viewportDimensions.scroll
            var bottomEdgeOffset = pos.top + viewportPadding - viewportDimensions.scroll + actualHeight
            if (topEdgeOffset < viewportDimensions.top) {
                delta.top = viewportDimensions.top - topEdgeOffset
            } else if (bottomEdgeOffset > viewportDimensions.top + viewportDimensions.height) {
                delta.top = viewportDimensions.top + viewportDimensions.height - bottomEdgeOffset
            }
        } else {
            var leftEdgeOffset = pos.left - viewportPadding
            var rightEdgeOffset = pos.left + viewportPadding + actualWidth
            if (leftEdgeOffset < viewportDimensions.left) {
                delta.left = viewportDimensions.left - leftEdgeOffset
            } else if (rightEdgeOffset > viewportDimensions.width) {
                delta.left = viewportDimensions.left + viewportDimensions.width - rightEdgeOffset
            }
        }
        return delta
    }
    Tooltip.prototype.getTitle = function() {
        var title
        var $e = this.$element
        var o = this.options
        title = $e.attr('data-original-title') || (typeof o.title == 'function' ? o.title.call($e[0]) : o.title)
        return title
    }
    Tooltip.prototype.getUID = function(prefix) {
        do prefix += ~~(Math.random() * 1000000)
        while (document.getElementById(prefix))
        return prefix
    }
    Tooltip.prototype.tip = function() {
        return (this.$tip = this.$tip || $(this.options.template))
    }
    Tooltip.prototype.arrow = function() {
        return (this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow'))
    }
    Tooltip.prototype.enable = function() {
        this.enabled = true
    }
    Tooltip.prototype.disable = function() {
        this.enabled = false
    }
    Tooltip.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    }
    Tooltip.prototype.toggle = function(e) {
        var self = this
        if (e) {
            self = $(e.currentTarget).data('bs.' + this.type)
            if (!self) {
                self = new this.constructor(e.currentTarget, this.getDelegateOptions())
                $(e.currentTarget).data('bs.' + this.type, self)
            }
        }
        self.tip().hasClass('in') ? self.leave(self) : self.enter(self)
    }
    Tooltip.prototype.destroy = function() {
        var that = this
        clearTimeout(this.timeout)
        this.hide(function() {
            that.$element.off('.' + that.type).removeData('bs.' + that.type)
        })
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.tooltip')
            var options = typeof option == 'object' && option
            var selector = options && options.selector
            if (!data && option == 'destroy') return
            if (selector) {
                if (!data) $this.data('bs.tooltip', (data = {}))
                if (!data[selector]) data[selector] = new Tooltip(this, options)
            } else {
                if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)))
            }
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.tooltip
    $.fn.tooltip = Plugin
    $.fn.tooltip.Constructor = Tooltip
    $.fn.tooltip.noConflict = function() {
        $.fn.tooltip = old
        return this
    }
}(jQuery); + function($) {
    'use strict';
    var Popover = function(element, options) {
        this.init('popover', element, options)
    }
    if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js')
    Popover.VERSION = '3.3.1'
    Popover.DEFAULTS = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, {
        placement: 'right',
        trigger: 'click',
        content: '',
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    })
    Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)
    Popover.prototype.constructor = Popover
    Popover.prototype.getDefaults = function() {
        return Popover.DEFAULTS
    }
    Popover.prototype.setContent = function() {
        var $tip = this.tip()
        var title = this.getTitle()
        var content = this.getContent()
        $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
        $tip.find('.popover-content').children().detach().end()[this.options.html ? (typeof content == 'string' ? 'html' : 'append') : 'text'](content)
        $tip.removeClass('fade top bottom left right in')
        if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide()
    }
    Popover.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    }
    Popover.prototype.getContent = function() {
        var $e = this.$element
        var o = this.options
        return $e.attr('data-content') || (typeof o.content == 'function' ? o.content.call($e[0]) : o.content)
    }
    Popover.prototype.arrow = function() {
        return (this.$arrow = this.$arrow || this.tip().find('.arrow'))
    }
    Popover.prototype.tip = function() {
        if (!this.$tip) this.$tip = $(this.options.template)
        return this.$tip
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.popover')
            var options = typeof option == 'object' && option
            var selector = options && options.selector
            if (!data && option == 'destroy') return
            if (selector) {
                if (!data) $this.data('bs.popover', (data = {}))
                if (!data[selector]) data[selector] = new Popover(this, options)
            } else {
                if (!data) $this.data('bs.popover', (data = new Popover(this, options)))
            }
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.popover
    $.fn.popover = Plugin
    $.fn.popover.Constructor = Popover
    $.fn.popover.noConflict = function() {
        $.fn.popover = old
        return this
    }
}(jQuery); + function($) {
    'use strict';

    function ScrollSpy(element, options) {
        var process = $.proxy(this.process, this)
        this.$body = $('body')
        this.$scrollElement = $(element).is('body') ? $(window) : $(element)
        this.options = $.extend({}, ScrollSpy.DEFAULTS, options)
        this.selector = (this.options.target || '') + ' .nav li > a'
        this.offsets = []
        this.targets = []
        this.activeTarget = null
        this.scrollHeight = 0
        this.$scrollElement.on('scroll.bs.scrollspy', process)
        this.refresh()
        this.process()
    }
    ScrollSpy.VERSION = '3.3.1'
    ScrollSpy.DEFAULTS = {
        offset: 10
    }
    ScrollSpy.prototype.getScrollHeight = function() {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }
    ScrollSpy.prototype.refresh = function() {
        var offsetMethod = 'offset'
        var offsetBase = 0
        if (!$.isWindow(this.$scrollElement[0])) {
            offsetMethod = 'position'
            offsetBase = this.$scrollElement.scrollTop()
        }
        this.offsets = []
        this.targets = []
        this.scrollHeight = this.getScrollHeight()
        var self = this
        this.$body.find(this.selector).map(function() {
            var $el = $(this)
            var href = $el.data('target') || $el.attr('href')
            var $href = /^#./.test(href) && $(href)
            return ($href && $href.length && $href.is(':visible') && [
                [$href[offsetMethod]().top + offsetBase, href]
            ]) || null
        }).sort(function(a, b) {
            return a[0] - b[0]
        }).each(function() {
            self.offsets.push(this[0])
            self.targets.push(this[1])
        })
    }
    ScrollSpy.prototype.process = function() {
        var scrollTop = this.$scrollElement.scrollTop() + this.options.offset
        var scrollHeight = this.getScrollHeight()
        var maxScroll = this.options.offset + scrollHeight - this.$scrollElement.height()
        var offsets = this.offsets
        var targets = this.targets
        var activeTarget = this.activeTarget
        var i
        if (this.scrollHeight != scrollHeight) {
            this.refresh()
        }
        if (scrollTop >= maxScroll) {
            return activeTarget != (i = targets[targets.length - 1]) && this.activate(i)
        }
        if (activeTarget && scrollTop < offsets[0]) {
            this.activeTarget = null
            return this.clear()
        }
        for (i = offsets.length; i--;) {
            activeTarget != targets[i] && scrollTop >= offsets[i] && (!offsets[i + 1] || scrollTop <= offsets[i + 1]) && this.activate(targets[i])
        }
    }
    ScrollSpy.prototype.activate = function(target) {
        this.activeTarget = target
        this.clear()
        var selector = this.selector + '[data-target="' + target + '"],' +
            this.selector + '[href="' + target + '"]'
        var active = $(selector).parents('li').addClass('active')
        if (active.parent('.dropdown-menu').length) {
            active = active.closest('li.dropdown').addClass('active')
        }
        active.trigger('activate.bs.scrollspy')
    }
    ScrollSpy.prototype.clear = function() {
        $(this.selector).parentsUntil(this.options.target, '.active').removeClass('active')
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.scrollspy')
            var options = typeof option == 'object' && option
            if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.scrollspy
    $.fn.scrollspy = Plugin
    $.fn.scrollspy.Constructor = ScrollSpy
    $.fn.scrollspy.noConflict = function() {
        $.fn.scrollspy = old
        return this
    }
    $(window).on('load.bs.scrollspy.data-api', function() {
        $('[data-spy="scroll"]').each(function() {
            var $spy = $(this)
            Plugin.call($spy, $spy.data())
        })
    })
}(jQuery); + function($) {
    'use strict';
    var Tab = function(element) {
        this.element = $(element)
    }
    Tab.VERSION = '3.3.1'
    Tab.TRANSITION_DURATION = 150
    Tab.prototype.show = function() {
        var $this = this.element
        var $ul = $this.closest('ul:not(.dropdown-menu)')
        var selector = $this.data('target')
        if (!selector) {
            selector = $this.attr('href')
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '')
        }
        if ($this.parent('li').hasClass('active')) return
        var $previous = $ul.find('.active:last a')
        var hideEvent = $.Event('hide.bs.tab', {
            relatedTarget: $this[0]
        })
        var showEvent = $.Event('show.bs.tab', {
            relatedTarget: $previous[0]
        })
        $previous.trigger(hideEvent)
        $this.trigger(showEvent)
        if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) return
        var $target = $(selector)
        this.activate($this.closest('li'), $ul)
        this.activate($target, $target.parent(), function() {
            $previous.trigger({
                type: 'hidden.bs.tab',
                relatedTarget: $this[0]
            })
            $this.trigger({
                type: 'shown.bs.tab',
                relatedTarget: $previous[0]
            })
        })
    }
    Tab.prototype.activate = function(element, container, callback) {
        var $active = container.find('> .active')
        var transition = callback && $.support.transition && (($active.length && $active.hasClass('fade')) || !!container.find('> .fade').length)

        function next() {
            $active.removeClass('active').find('> .dropdown-menu > .active').removeClass('active').end().find('[data-toggle="tab"]').attr('aria-expanded', false)
            element.addClass('active').find('[data-toggle="tab"]').attr('aria-expanded', true)
            if (transition) {
                element[0].offsetWidth
                element.addClass('in')
            } else {
                element.removeClass('fade')
            }
            if (element.parent('.dropdown-menu')) {
                element.closest('li.dropdown').addClass('active').end().find('[data-toggle="tab"]').attr('aria-expanded', true)
            }
            callback && callback()
        }
        $active.length && transition ? $active.one('bsTransitionEnd', next).emulateTransitionEnd(Tab.TRANSITION_DURATION) : next()
        $active.removeClass('in')
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.tab')
            if (!data) $this.data('bs.tab', (data = new Tab(this)))
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.tab
    $.fn.tab = Plugin
    $.fn.tab.Constructor = Tab
    $.fn.tab.noConflict = function() {
        $.fn.tab = old
        return this
    }
    var clickHandler = function(e) {
        e.preventDefault()
        Plugin.call($(this), 'show')
    }
    $(document).on('click.bs.tab.data-api', '[data-toggle="tab"]', clickHandler).on('click.bs.tab.data-api', '[data-toggle="pill"]', clickHandler)
}(jQuery); + function($) {
    'use strict';
    var Affix = function(element, options) {
        this.options = $.extend({}, Affix.DEFAULTS, options)
        this.$target = $(this.options.target).on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this)).on('click.bs.affix.data-api', $.proxy(this.checkPositionWithEventLoop, this))
        this.$element = $(element)
        this.affixed = this.unpin = this.pinnedOffset = null
        this.checkPosition()
    }
    Affix.VERSION = '3.3.1'
    Affix.RESET = 'affix affix-top affix-bottom'
    Affix.DEFAULTS = {
        offset: 0,
        target: window
    }
    Affix.prototype.getState = function(scrollHeight, height, offsetTop, offsetBottom) {
        var scrollTop = this.$target.scrollTop()
        var position = this.$element.offset()
        var targetHeight = this.$target.height()
        if (offsetTop != null && this.affixed == 'top') return scrollTop < offsetTop ? 'top' : false
        if (this.affixed == 'bottom') {
            if (offsetTop != null) return (scrollTop + this.unpin <= position.top) ? false : 'bottom'
            return (scrollTop + targetHeight <= scrollHeight - offsetBottom) ? false : 'bottom'
        }
        var initializing = this.affixed == null
        var colliderTop = initializing ? scrollTop : position.top
        var colliderHeight = initializing ? targetHeight : height
        if (offsetTop != null && colliderTop <= offsetTop) return 'top'
        if (offsetBottom != null && (colliderTop + colliderHeight >= scrollHeight - offsetBottom)) return 'bottom'
        return false
    }
    Affix.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset) return this.pinnedOffset
        this.$element.removeClass(Affix.RESET).addClass('affix')
        var scrollTop = this.$target.scrollTop()
        var position = this.$element.offset()
        return (this.pinnedOffset = position.top - scrollTop)
    }
    Affix.prototype.checkPositionWithEventLoop = function() {
        setTimeout($.proxy(this.checkPosition, this), 1)
    }
    Affix.prototype.checkPosition = function() {
        if (!this.$element.is(':visible')) return
        var height = this.$element.height()
        var offset = this.options.offset
        var offsetTop = offset.top
        var offsetBottom = offset.bottom
        var scrollHeight = $('body').height()
        if (typeof offset != 'object') offsetBottom = offsetTop = offset
        if (typeof offsetTop == 'function') offsetTop = offset.top(this.$element)
        if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element)
        var affix = this.getState(scrollHeight, height, offsetTop, offsetBottom)
        if (this.affixed != affix) {
            if (this.unpin != null) this.$element.css('top', '')
            var affixType = 'affix' + (affix ? '-' + affix : '')
            var e = $.Event(affixType + '.bs.affix')
            this.$element.trigger(e)
            if (e.isDefaultPrevented()) return
            this.affixed = affix
            this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null
            this.$element.removeClass(Affix.RESET).addClass(affixType).trigger(affixType.replace('affix', 'affixed') + '.bs.affix')
        }
        if (affix == 'bottom') {
            this.$element.offset({
                top: scrollHeight - height - offsetBottom
            })
        }
    }

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.affix')
            var options = typeof option == 'object' && option
            if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }
    var old = $.fn.affix
    $.fn.affix = Plugin
    $.fn.affix.Constructor = Affix
    $.fn.affix.noConflict = function() {
        $.fn.affix = old
        return this
    }
    $(window).on('load', function() {
        $('[data-spy="affix"]').each(function() {
            var $spy = $(this)
            var data = $spy.data()
            data.offset = data.offset || {}
            if (data.offsetBottom != null) data.offset.bottom = data.offsetBottom
            if (data.offsetTop != null) data.offset.top = data.offsetTop
            Plugin.call($spy, data)
        })
    })
}(jQuery);;
(function($) {
    "use strict";
    var defaults = {};
    $.fn.uouAccordions = function(options) {
        var config = $.extend({}, defaults, options);
        return this.each(function() {
            var $self = $(this),
                $links = $self.find('> li > a'),
                $content = $self.find('> li > div');
            $links.on('click', function(event) {
                event.preventDefault();
                var $this = $(this),
                    $li = $this.parent('li'),
                    $div = $this.siblings('div'),
                    $siblings = $li.siblings('li').children('div');
                if (!$li.hasClass('active')) {
                    $siblings.slideUp(250, function() {
                        $(this).parent('li').removeClass('active');
                    });
                    $div.slideDown(250, function() {
                        $li.addClass('active');
                    });
                } else {
                    $div.slideUp(250, function() {
                        $li.removeClass('active');
                    });
                }
            });
        });
    };
}(jQuery));;
(function($) {
    "use strict";
    var defaults = {
        accordionOn: ['xs']
    };
    $.fn.uouTabs = function(options) {
        var config = $.extend({}, defaults, options),
            accordion = '';
        $.each(config.accordionOn, function(index, value) {
            accordion += ' accordion-' + value;
        });
        return this.each(function() {
            var $self = $(this),
                $links = $self.children('.tabs').find('> li > a'),
                $content = $self.children('.content'),
                $tabs = $content.children('div');
            $self.addClass(accordion);
            $links.each(function(i) {
                var $this = $(this),
                    id = $this.attr('href'),
                    active = '',
                    first = '',
                    last = '';
                if ($this.parent('li').hasClass('active')) {
                    active = ' active';
                }
                if (i === 0) {
                    first = ' first';
                } else if (i === $links.length - 1) {
                    last = ' last';
                }
                $this.clone(false).addClass('accordion-link' + active + first + last).insertBefore(id);
            });
            var $accordionLinks = $content.children('.accordion-link');
            $links.on('click', function(event) {
                event.preventDefault();
                var $this = $(this),
                    $li = $this.parent('li'),
                    $siblings = $li.siblings('li'),
                    id = $this.attr('href'),
                    $accordionLink = $content.children('a[href="' + id + '"]');
                if (!$li.hasClass('active')) {
                    $li.addClass('active');
                    $siblings.removeClass('active');
                    $tabs.removeClass('active');
                    $(id).addClass('active');
                    $accordionLinks.removeClass('active');
                    $accordionLink.addClass('active');
                }
            });
            $accordionLinks.on('click', function(event) {
                event.preventDefault();
                var $this = $(this),
                    id = $this.attr('href'),
                    $tabLink = $self.find('li > a[href="' + id + '"]').parent('li');
                if (!$this.hasClass('active')) {
                    $accordionLinks.removeClass('active');
                    $this.addClass('active');
                    $tabs.removeClass('active');
                    $(id).addClass('active');
                    $links.parent('li').removeClass('active');
                    $tabLink.addClass('active');
                }
            });
        });
    };
}(jQuery));
(function(jQuery) {
    var domfocus = false;
    var mousefocus = false;
    var zoomactive = false;
    var tabindexcounter = 5000;
    var ascrailcounter = 2000;
    var globalmaxzindex = 0;
    var $ = jQuery;

    function getScriptPath() {
        var scripts = document.getElementsByTagName('script');
        var path = scripts[scripts.length - 1].src.split('?')[0];
        return (path.split('/').length > 0) ? path.split('/').slice(0, -1).join('/') + '/' : '';
    }
    var scriptpath = getScriptPath();
    if (!Array.prototype.forEach) {
        Array.prototype.forEach = function(fn, scope) {
            for (var i = 0, len = this.length; i < len; ++i) {
                fn.call(scope, this[i], i, this);
            }
        }
    }
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    var setAnimationFrame = window.requestAnimationFrame || false;
    var clearAnimationFrame = window.cancelAnimationFrame || false;
    vendors.forEach(function(v) {
        if (!setAnimationFrame) setAnimationFrame = window[v + 'RequestAnimationFrame'];
        if (!clearAnimationFrame) clearAnimationFrame = window[v + 'CancelAnimationFrame'] || window[v + 'CancelRequestAnimationFrame'];
    });
    var clsMutationObserver = window.MutationObserver || window.WebKitMutationObserver || false;
    var _globaloptions = {
        zindex: "auto",
        cursoropacitymin: 0,
        cursoropacitymax: 1,
        cursorcolor: "#424242",
        cursorwidth: "5px",
        cursorborder: "1px solid #fff",
        cursorborderradius: "5px",
        scrollspeed: 60,
        mousescrollstep: 8 * 3,
        touchbehavior: false,
        hwacceleration: true,
        usetransition: true,
        boxzoom: false,
        dblclickzoom: true,
        gesturezoom: true,
        grabcursorenabled: true,
        autohidemode: true,
        background: "",
        iframeautoresize: true,
        cursorminheight: 32,
        preservenativescrolling: true,
        railoffset: false,
        bouncescroll: true,
        spacebarenabled: true,
        railpadding: {
            top: 0,
            right: 0,
            left: 0,
            bottom: 0
        },
        disableoutline: true,
        horizrailenabled: true,
        railalign: "right",
        railvalign: "bottom",
        enabletranslate3d: true,
        enablemousewheel: true,
        enablekeyboard: true,
        smoothscroll: true,
        sensitiverail: true,
        enablemouselockapi: true,
        cursorfixedheight: false,
        directionlockdeadzone: 6,
        hidecursordelay: 400,
        nativeparentscrolling: true,
        enablescrollonselection: true,
        overflowx: true,
        overflowy: true,
        cursordragspeed: 0.3,
        rtlmode: false,
        cursordragontouch: false
    }
    var browserdetected = false;
    var getBrowserDetection = function() {
        if (browserdetected) return browserdetected;
        var domtest = document.createElement('DIV');
        var d = {};
        d.haspointerlock = "pointerLockElement" in document || "mozPointerLockElement" in document || "webkitPointerLockElement" in document;
        d.isopera = ("opera" in window);
        d.isopera12 = (d.isopera && ("getUserMedia" in navigator));
        d.isie = (("all" in document) && ("attachEvent" in domtest) && !d.isopera);
        d.isieold = (d.isie && !("msInterpolationMode" in domtest.style));
        d.isie7 = d.isie && !d.isieold && (!("documentMode" in document) || (document.documentMode == 7));
        d.isie8 = d.isie && ("documentMode" in document) && (document.documentMode == 8);
        d.isie9 = d.isie && ("performance" in window) && (document.documentMode >= 9);
        d.isie10 = d.isie && ("performance" in window) && (document.documentMode >= 10);
        d.isie9mobile = /iemobile.9/i.test(navigator.userAgent);
        if (d.isie9mobile) d.isie9 = false;
        d.isie7mobile = (!d.isie9mobile && d.isie7) && /iemobile/i.test(navigator.userAgent);
        d.ismozilla = ("MozAppearance" in domtest.style);
        d.iswebkit = ("WebkitAppearance" in domtest.style);
        d.ischrome = ("chrome" in window);
        d.ischrome22 = (d.ischrome && d.haspointerlock);
        d.ischrome26 = (d.ischrome && ("transition" in domtest.style));
        d.cantouch = ("ontouchstart" in document.documentElement) || ("ontouchstart" in window);
        d.hasmstouch = (window.navigator.msPointerEnabled || false);
        d.ismac = /^mac$/i.test(navigator.platform);
        d.isios = (d.cantouch && /iphone|ipad|ipod/i.test(navigator.platform));
        d.isios4 = ((d.isios) && !("seal" in Object));
        d.isandroid = (/android/i.test(navigator.userAgent));
        d.trstyle = false;
        d.hastransform = false;
        d.hastranslate3d = false;
        d.transitionstyle = false;
        d.hastransition = false;
        d.transitionend = false;
        var check = ['transform', 'msTransform', 'webkitTransform', 'MozTransform', 'OTransform'];
        for (var a = 0; a < check.length; a++) {
            if (typeof domtest.style[check[a]] != "undefined") {
                d.trstyle = check[a];
                break;
            }
        }
        d.hastransform = (d.trstyle != false);
        if (d.hastransform) {
            domtest.style[d.trstyle] = "translate3d(1px,2px,3px)";
            d.hastranslate3d = /translate3d/.test(domtest.style[d.trstyle]);
        }
        d.transitionstyle = false;
        d.prefixstyle = '';
        d.transitionend = false;
        var check = ['transition', 'webkitTransition', 'MozTransition', 'OTransition', 'OTransition', 'msTransition', 'KhtmlTransition'];
        var prefix = ['', '-webkit-', '-moz-', '-o-', '-o', '-ms-', '-khtml-'];
        var evs = ['transitionend', 'webkitTransitionEnd', 'transitionend', 'otransitionend', 'oTransitionEnd', 'msTransitionEnd', 'KhtmlTransitionEnd'];
        for (var a = 0; a < check.length; a++) {
            if (check[a] in domtest.style) {
                d.transitionstyle = check[a];
                d.prefixstyle = prefix[a];
                d.transitionend = evs[a];
                break;
            }
        }
        if (d.ischrome26) {
            d.prefixstyle = prefix[1];
        }
        d.hastransition = (d.transitionstyle);

        function detectCursorGrab() {
            var lst = ['-moz-grab', '-webkit-grab', 'grab'];
            if ((d.ischrome && !d.ischrome22) || d.isie) lst = [];
            for (var a = 0; a < lst.length; a++) {
                var p = lst[a];
                domtest.style['cursor'] = p;
                if (domtest.style['cursor'] == p) return p;
            }
            return 'url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur),n-resize';
        }
        d.cursorgrabvalue = detectCursorGrab();
        d.hasmousecapture = ("setCapture" in domtest);
        d.hasMutationObserver = (clsMutationObserver !== false);
        domtest = null;
        browserdetected = d;
        return d;
    }
    var NiceScrollClass = function(myopt, me) {
        var self = this;
        this.version = '3.4.0';
        this.name = 'nicescroll';
        this.me = me;
        this.opt = {
            doc: $("body"),
            win: false
        };
        $.extend(this.opt, _globaloptions);
        this.opt.snapbackspeed = 80;
        if (myopt || false) {
            for (var a in self.opt) {
                if (typeof myopt[a] != "undefined") self.opt[a] = myopt[a];
            }
        }
        this.doc = self.opt.doc;
        this.iddoc = (this.doc && this.doc[0]) ? this.doc[0].id || '' : '';
        this.ispage = /BODY|HTML/.test((self.opt.win) ? self.opt.win[0].nodeName : this.doc[0].nodeName);
        this.haswrapper = (self.opt.win !== false);
        this.win = self.opt.win || (this.ispage ? $(window) : this.doc);
        this.docscroll = (this.ispage && !this.haswrapper) ? $(window) : this.win;
        this.body = $("body");
        this.viewport = false;
        this.isfixed = false;
        this.iframe = false;
        this.isiframe = ((this.doc[0].nodeName == 'IFRAME') && (this.win[0].nodeName == 'IFRAME'));
        this.istextarea = (this.win[0].nodeName == 'TEXTAREA');
        this.forcescreen = false;
        this.canshowonmouseevent = (self.opt.autohidemode != "scroll");
        this.onmousedown = false;
        this.onmouseup = false;
        this.onmousemove = false;
        this.onmousewheel = false;
        this.onkeypress = false;
        this.ongesturezoom = false;
        this.onclick = false;
        this.onscrollstart = false;
        this.onscrollend = false;
        this.onscrollcancel = false;
        this.onzoomin = false;
        this.onzoomout = false;
        this.view = false;
        this.page = false;
        this.scroll = {
            x: 0,
            y: 0
        };
        this.scrollratio = {
            x: 0,
            y: 0
        };
        this.cursorheight = 20;
        this.scrollvaluemax = 0;
        this.checkrtlmode = false;
        this.scrollrunning = false;
        this.scrollmom = false;
        this.observer = false;
        this.observerremover = false;
        do {
            this.id = "ascrail" + (ascrailcounter++);
        } while (document.getElementById(this.id));
        this.rail = false;
        this.cursor = false;
        this.cursorfreezed = false;
        this.selectiondrag = false;
        this.zoom = false;
        this.zoomactive = false;
        this.hasfocus = false;
        this.hasmousefocus = false;
        this.visibility = true;
        this.locked = false;
        this.hidden = false;
        this.cursoractive = true;
        this.overflowx = self.opt.overflowx;
        this.overflowy = self.opt.overflowy;
        this.nativescrollingarea = false;
        this.checkarea = 0;
        this.events = [];
        this.saved = {};
        this.delaylist = {};
        this.synclist = {};
        this.lastdeltax = 0;
        this.lastdeltay = 0;
        this.detected = getBrowserDetection();
        var cap = $.extend({}, this.detected);
        this.canhwscroll = (cap.hastransform && self.opt.hwacceleration);
        this.ishwscroll = (this.canhwscroll && self.haswrapper);
        this.istouchcapable = false;
        if (cap.cantouch && cap.ischrome && !cap.isios && !cap.isandroid) {
            this.istouchcapable = true;
            cap.cantouch = false;
        }
        if (cap.cantouch && cap.ismozilla && !cap.isios) {
            this.istouchcapable = true;
            cap.cantouch = false;
        }
        if (!self.opt.enablemouselockapi) {
            cap.hasmousecapture = false;
            cap.haspointerlock = false;
        }
        this.delayed = function(name, fn, tm, lazy) {
            var dd = self.delaylist[name];
            var nw = (new Date()).getTime();
            if (!lazy && dd && dd.tt) return false;
            if (dd && dd.tt) clearTimeout(dd.tt);
            if (dd && dd.last + tm > nw && !dd.tt) {
                self.delaylist[name] = {
                    last: nw + tm,
                    tt: setTimeout(function() {
                        self.delaylist[name].tt = 0;
                        fn.call();
                    }, tm)
                }
            } else if (!dd || !dd.tt) {
                self.delaylist[name] = {
                    last: nw,
                    tt: 0
                }
                setTimeout(function() {
                    fn.call();
                }, 0);
            }
        };
        this.debounced = function(name, fn, tm) {
            var dd = self.delaylist[name];
            var nw = (new Date()).getTime();
            self.delaylist[name] = fn;
            if (!dd) {
                setTimeout(function() {
                    var fn = self.delaylist[name];
                    self.delaylist[name] = false;
                    fn.call();
                }, tm);
            }
        }
        this.synched = function(name, fn) {
            function requestSync() {
                if (self.onsync) return;
                setAnimationFrame(function() {
                    self.onsync = false;
                    for (name in self.synclist) {
                        var fn = self.synclist[name];
                        if (fn) fn.call(self);
                        self.synclist[name] = false;
                    }
                });
                self.onsync = true;
            };
            self.synclist[name] = fn;
            requestSync();
            return name;
        };
        this.unsynched = function(name) {
            if (self.synclist[name]) self.synclist[name] = false;
        }
        this.css = function(el, pars) {
            for (var n in pars) {
                self.saved.css.push([el, n, el.css(n)]);
                el.css(n, pars[n]);
            }
        };
        this.scrollTop = function(val) {
            return (typeof val == "undefined") ? self.getScrollTop() : self.setScrollTop(val);
        };
        this.scrollLeft = function(val) {
            return (typeof val == "undefined") ? self.getScrollLeft() : self.setScrollLeft(val);
        };
        BezierClass = function(st, ed, spd, p1, p2, p3, p4) {
            this.st = st;
            this.ed = ed;
            this.spd = spd;
            this.p1 = p1 || 0;
            this.p2 = p2 || 1;
            this.p3 = p3 || 0;
            this.p4 = p4 || 1;
            this.ts = (new Date()).getTime();
            this.df = this.ed - this.st;
        };
        BezierClass.prototype = {
            B2: function(t) {
                return 3 * t * t * (1 - t)
            },
            B3: function(t) {
                return 3 * t * (1 - t) * (1 - t)
            },
            B4: function(t) {
                return (1 - t) * (1 - t) * (1 - t)
            },
            getNow: function() {
                var nw = (new Date()).getTime();
                var pc = 1 - ((nw - this.ts) / this.spd);
                var bz = this.B2(pc) + this.B3(pc) + this.B4(pc);
                return (pc < 0) ? this.ed : this.st + Math.round(this.df * bz);
            },
            update: function(ed, spd) {
                this.st = this.getNow();
                this.ed = ed;
                this.spd = spd;
                this.ts = (new Date()).getTime();
                this.df = this.ed - this.st;
                return this;
            }
        };
        if (this.ishwscroll) {
            this.doc.translate = {
                x: 0,
                y: 0,
                tx: "0px",
                ty: "0px"
            };
            if (cap.hastranslate3d && cap.isios) this.doc.css("-webkit-backface-visibility", "hidden");

            function getMatrixValues() {
                var tr = self.doc.css(cap.trstyle);
                if (tr && (tr.substr(0, 6) == "matrix")) {
                    return tr.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, '').split(/, +/);
                }
                return false;
            }
            this.getScrollTop = function(last) {
                if (!last) {
                    var mtx = getMatrixValues();
                    if (mtx) return (mtx.length == 16) ? -mtx[13] : -mtx[5];
                    if (self.timerscroll && self.timerscroll.bz) return self.timerscroll.bz.getNow();
                }
                return self.doc.translate.y;
            };
            this.getScrollLeft = function(last) {
                if (!last) {
                    var mtx = getMatrixValues();
                    if (mtx) return (mtx.length == 16) ? -mtx[12] : -mtx[4];
                    if (self.timerscroll && self.timerscroll.bh) return self.timerscroll.bh.getNow();
                }
                return self.doc.translate.x;
            };
            if (document.createEvent) {
                this.notifyScrollEvent = function(el) {
                    var e = document.createEvent("UIEvents");
                    e.initUIEvent("scroll", false, true, window, 1);
                    el.dispatchEvent(e);
                };
            } else if (document.fireEvent) {
                this.notifyScrollEvent = function(el) {
                    var e = document.createEventObject();
                    el.fireEvent("onscroll");
                    e.cancelBubble = true;
                };
            } else {
                this.notifyScrollEvent = function(el, add) {};
            }
            if (cap.hastranslate3d && self.opt.enabletranslate3d) {
                this.setScrollTop = function(val, silent) {
                    self.doc.translate.y = val;
                    self.doc.translate.ty = (val * -1) + "px";
                    self.doc.css(cap.trstyle, "translate3d(" + self.doc.translate.tx + "," + self.doc.translate.ty + ",0px)");
                    if (!silent) self.notifyScrollEvent(self.win[0]);
                };
                this.setScrollLeft = function(val, silent) {
                    self.doc.translate.x = val;
                    self.doc.translate.tx = (val * -1) + "px";
                    self.doc.css(cap.trstyle, "translate3d(" + self.doc.translate.tx + "," + self.doc.translate.ty + ",0px)");
                    if (!silent) self.notifyScrollEvent(self.win[0]);
                };
            } else {
                this.setScrollTop = function(val, silent) {
                    self.doc.translate.y = val;
                    self.doc.translate.ty = (val * -1) + "px";
                    self.doc.css(cap.trstyle, "translate(" + self.doc.translate.tx + "," + self.doc.translate.ty + ")");
                    if (!silent) self.notifyScrollEvent(self.win[0]);
                };
                this.setScrollLeft = function(val, silent) {
                    self.doc.translate.x = val;
                    self.doc.translate.tx = (val * -1) + "px";
                    self.doc.css(cap.trstyle, "translate(" + self.doc.translate.tx + "," + self.doc.translate.ty + ")");
                    if (!silent) self.notifyScrollEvent(self.win[0]);
                };
            }
        } else {
            this.getScrollTop = function() {
                return self.docscroll.scrollTop();
            };
            this.setScrollTop = function(val) {
                return self.docscroll.scrollTop(val);
            };
            this.getScrollLeft = function() {
                return self.docscroll.scrollLeft();
            };
            this.setScrollLeft = function(val) {
                return self.docscroll.scrollLeft(val);
            };
        }
        this.getTarget = function(e) {
            if (!e) return false;
            if (e.target) return e.target;
            if (e.srcElement) return e.srcElement;
            return false;
        };
        this.hasParent = function(e, id) {
            if (!e) return false;
            var el = e.target || e.srcElement || e || false;
            while (el && el.id != id) {
                el = el.parentNode || false;
            }
            return (el !== false);
        };

        function getZIndex() {
            var dom = self.win;
            if ("zIndex" in dom) return dom.zIndex();
            while (dom.length > 0) {
                if (dom[0].nodeType == 9) return false;
                var zi = dom.css('zIndex');
                if (!isNaN(zi) && zi != 0) return parseInt(zi);
                dom = dom.parent();
            }
            return false;
        };
        var _convertBorderWidth = {
            "thin": 1,
            "medium": 3,
            "thick": 5
        };

        function getWidthToPixel(dom, prop, chkheight) {
            var wd = dom.css(prop);
            var px = parseFloat(wd);
            if (isNaN(px)) {
                px = _convertBorderWidth[wd] || 0;
                var brd = (px == 3) ? ((chkheight) ? (self.win.outerHeight() - self.win.innerHeight()) : (self.win.outerWidth() - self.win.innerWidth())) : 1;
                if (self.isie8 && px) px += 1;
                return (brd) ? px : 0;
            }
            return px;
        };
        this.getOffset = function() {
            if (self.isfixed) return {
                top: parseFloat(self.win.css('top')),
                left: parseFloat(self.win.css('left'))
            };
            if (!self.viewport) return self.win.offset();
            var ww = self.win.offset();
            var vp = self.viewport.offset();
            return {
                top: ww.top - vp.top + self.viewport.scrollTop(),
                left: ww.left - vp.left + self.viewport.scrollLeft()
            };
        };
        this.updateScrollBar = function(len) {
            if (self.ishwscroll) {
                self.rail.css({
                    height: self.win.innerHeight()
                });
                if (self.railh) self.railh.css({
                    width: self.win.innerWidth()
                });
            } else {
                var wpos = self.getOffset();
                var pos = {
                    top: wpos.top,
                    left: wpos.left
                };
                pos.top += getWidthToPixel(self.win, 'border-top-width', true);
                var brd = (self.win.outerWidth() - self.win.innerWidth()) / 2;
                pos.left += (self.rail.align) ? self.win.outerWidth() - getWidthToPixel(self.win, 'border-right-width') - self.rail.width : getWidthToPixel(self.win, 'border-left-width');
                var off = self.opt.railoffset;
                if (off) {
                    if (off.top) pos.top += off.top;
                    if (self.rail.align && off.left) pos.left += off.left;
                }
                if (!self.locked) self.rail.css({
                    top: pos.top,
                    left: pos.left,
                    height: (len) ? len.h : self.win.innerHeight()
                });
                if (self.zoom) {
                    self.zoom.css({
                        top: pos.top + 1,
                        left: (self.rail.align == 1) ? pos.left - 20 : pos.left + self.rail.width + 4
                    });
                }
                if (self.railh && !self.locked) {
                    var pos = {
                        top: wpos.top,
                        left: wpos.left
                    };
                    var y = (self.railh.align) ? pos.top + getWidthToPixel(self.win, 'border-top-width', true) + self.win.innerHeight() - self.railh.height : pos.top + getWidthToPixel(self.win, 'border-top-width', true);
                    var x = pos.left + getWidthToPixel(self.win, 'border-left-width');
                    self.railh.css({
                        top: y,
                        left: x,
                        width: self.railh.width
                    });
                }
            }
        };
        this.doRailClick = function(e, dbl, hr) {
            var fn, pg, cur, pos;
            if (self.locked) return;
            self.cancelEvent(e);
            if (dbl) {
                fn = (hr) ? self.doScrollLeft : self.doScrollTop;
                cur = (hr) ? ((e.pageX - self.railh.offset().left - (self.cursorwidth / 2)) * self.scrollratio.x) : ((e.pageY - self.rail.offset().top - (self.cursorheight / 2)) * self.scrollratio.y);
                fn(cur);
            } else {
                fn = (hr) ? self.doScrollLeftBy : self.doScrollBy;
                cur = (hr) ? self.scroll.x : self.scroll.y;
                pos = (hr) ? e.pageX - self.railh.offset().left : e.pageY - self.rail.offset().top;
                pg = (hr) ? self.view.w : self.view.h;
                (cur >= pos) ? fn(pg): fn(-pg);
            }
        }
        self.hasanimationframe = (setAnimationFrame);
        self.hascancelanimationframe = (clearAnimationFrame);
        if (!self.hasanimationframe) {
            setAnimationFrame = function(fn) {
                return setTimeout(fn, 15 - Math.floor((+new Date) / 1000) % 16)
            };
            clearAnimationFrame = clearInterval;
        } else if (!self.hascancelanimationframe) clearAnimationFrame = function() {
            self.cancelAnimationFrame = true
        };
        this.init = function() {
            self.saved.css = [];
            if (cap.isie7mobile) return true;
            if (cap.hasmstouch) self.css((self.ispage) ? $("html") : self.win, {
                '-ms-touch-action': 'none'
            });
            self.zindex = "auto";
            if (!self.ispage && self.opt.zindex == "auto") {
                self.zindex = getZIndex() || "auto";
            } else {
                self.zindex = self.opt.zindex;
            }
            if (!self.ispage && self.zindex != "auto") {
                if (self.zindex > globalmaxzindex) globalmaxzindex = self.zindex;
            }
            if (self.isie && self.zindex == 0 && self.opt.zindex == "auto") {
                self.zindex = "auto";
            }
            if (!self.ispage || (!cap.cantouch && !cap.isieold && !cap.isie9mobile)) {
                var cont = self.docscroll;
                if (self.ispage) cont = (self.haswrapper) ? self.win : self.doc;
                if (!cap.isie9mobile) self.css(cont, {
                    'overflow-y': 'hidden'
                });
                if (self.ispage && cap.isie7) {
                    if (self.doc[0].nodeName == 'BODY') self.css($("html"), {
                        'overflow-y': 'hidden'
                    });
                    else if (self.doc[0].nodeName == 'HTML') self.css($("body"), {
                        'overflow-y': 'hidden'
                    });
                }
                if (cap.isios && !self.ispage && !self.haswrapper) self.css($("body"), {
                    "-webkit-overflow-scrolling": "touch"
                });
                var cursor = $(document.createElement('div'));
                cursor.css({
                    position: "relative",
                    top: 0,
                    "float": "right",
                    width: self.opt.cursorwidth,
                    height: "0px",
                    'background-color': self.opt.cursorcolor,
                    border: self.opt.cursorborder,
                    'background-clip': 'padding-box',
                    '-webkit-border-radius': self.opt.cursorborderradius,
                    '-moz-border-radius': self.opt.cursorborderradius,
                    'border-radius': self.opt.cursorborderradius
                });
                cursor.hborder = parseFloat(cursor.outerHeight() - cursor.innerHeight());
                self.cursor = cursor;
                var rail = $(document.createElement('div'));
                rail.attr('id', self.id);
                rail.addClass('nicescroll-rails');
                var v, a, kp = ["left", "right"];
                for (var n in kp) {
                    a = kp[n];
                    v = self.opt.railpadding[a];
                    (v) ? rail.css("padding-" + a, v + "px"): self.opt.railpadding[a] = 0;
                }
                rail.append(cursor);
                rail.width = Math.max(parseFloat(self.opt.cursorwidth), cursor.outerWidth()) + self.opt.railpadding['left'] + self.opt.railpadding['right'];
                rail.css({
                    width: rail.width + "px",
                    'zIndex': self.zindex,
                    "background": self.opt.background,
                    cursor: "default"
                });
                rail.visibility = true;
                rail.scrollable = true;
                rail.align = (self.opt.railalign == "left") ? 0 : 1;
                self.rail = rail;
                self.rail.drag = false;
                var zoom = false;
                if (self.opt.boxzoom && !self.ispage && !cap.isieold) {
                    zoom = document.createElement('div');
                    self.bind(zoom, "click", self.doZoom);
                    self.zoom = $(zoom);
                    self.zoom.css({
                        "cursor": "pointer",
                        'z-index': self.zindex,
                        'backgroundImage': 'url(' + scriptpath + 'zoomico.png)',
                        'height': 18,
                        'width': 18,
                        'backgroundPosition': '0px 0px'
                    });
                    if (self.opt.dblclickzoom) self.bind(self.win, "dblclick", self.doZoom);
                    if (cap.cantouch && self.opt.gesturezoom) {
                        self.ongesturezoom = function(e) {
                            if (e.scale > 1.5) self.doZoomIn(e);
                            if (e.scale < 0.8) self.doZoomOut(e);
                            return self.cancelEvent(e);
                        };
                        self.bind(self.win, "gestureend", self.ongesturezoom);
                    }
                }
                self.railh = false;
                if (self.opt.horizrailenabled) {
                    self.css(cont, {
                        'overflow-x': 'hidden'
                    });
                    var cursor = $(document.createElement('div'));
                    cursor.css({
                        position: "relative",
                        top: 0,
                        height: self.opt.cursorwidth,
                        width: "0px",
                        'background-color': self.opt.cursorcolor,
                        border: self.opt.cursorborder,
                        'background-clip': 'padding-box',
                        '-webkit-border-radius': self.opt.cursorborderradius,
                        '-moz-border-radius': self.opt.cursorborderradius,
                        'border-radius': self.opt.cursorborderradius
                    });
                    cursor.wborder = parseFloat(cursor.outerWidth() - cursor.innerWidth());
                    self.cursorh = cursor;
                    var railh = $(document.createElement('div'));
                    railh.attr('id', self.id + '-hr');
                    railh.addClass('nicescroll-rails');
                    railh.height = Math.max(parseFloat(self.opt.cursorwidth), cursor.outerHeight());
                    railh.css({
                        height: railh.height + "px",
                        'zIndex': self.zindex,
                        "background": self.opt.background
                    });
                    railh.append(cursor);
                    railh.visibility = true;
                    railh.scrollable = true;
                    railh.align = (self.opt.railvalign == "top") ? 0 : 1;
                    self.railh = railh;
                    self.railh.drag = false;
                }
                if (self.ispage) {
                    rail.css({
                        position: "fixed",
                        top: "0px",
                        height: "100%"
                    });
                    (rail.align) ? rail.css({
                        right: "0px"
                    }): rail.css({
                        left: "0px"
                    });
                    self.body.append(rail);
                    if (self.railh) {
                        railh.css({
                            position: "fixed",
                            left: "0px",
                            width: "100%"
                        });
                        (railh.align) ? railh.css({
                            bottom: "0px"
                        }): railh.css({
                            top: "0px"
                        });
                        self.body.append(railh);
                    }
                } else {
                    if (self.ishwscroll) {
                        if (self.win.css('position') == 'static') self.css(self.win, {
                            'position': 'relative'
                        });
                        var bd = (self.win[0].nodeName == 'HTML') ? self.body : self.win;
                        if (self.zoom) {
                            self.zoom.css({
                                position: "absolute",
                                top: 1,
                                right: 0,
                                "margin-right": rail.width + 4
                            });
                            bd.append(self.zoom);
                        }
                        rail.css({
                            position: "absolute",
                            top: 0
                        });
                        (rail.align) ? rail.css({
                            right: 0
                        }): rail.css({
                            left: 0
                        });
                        bd.append(rail);
                        if (railh) {
                            railh.css({
                                position: "absolute",
                                left: 0,
                                bottom: 0
                            });
                            (railh.align) ? railh.css({
                                bottom: 0
                            }): railh.css({
                                top: 0
                            });
                            bd.append(railh);
                        }
                    } else {
                        self.isfixed = (self.win.css("position") == "fixed");
                        var rlpos = (self.isfixed) ? "fixed" : "absolute";
                        if (!self.isfixed) self.viewport = self.getViewport(self.win[0]);
                        if (self.viewport) {
                            self.body = self.viewport;
                            if ((/relative|absolute/.test(self.viewport.css("position"))) == false) self.css(self.viewport, {
                                "position": "relative"
                            });
                        }
                        rail.css({
                            position: rlpos
                        });
                        if (self.zoom) self.zoom.css({
                            position: rlpos
                        });
                        self.updateScrollBar();
                        self.body.append(rail);
                        if (self.zoom) self.body.append(self.zoom);
                        if (self.railh) {
                            railh.css({
                                position: rlpos
                            });
                            self.body.append(railh);
                        }
                    }
                    if (cap.isios) self.css(self.win, {
                        '-webkit-tap-highlight-color': 'rgba(0,0,0,0)',
                        '-webkit-touch-callout': 'none'
                    });
                    if (cap.isie && self.opt.disableoutline) self.win.attr("hideFocus", "true");
                    if (cap.iswebkit && self.opt.disableoutline) self.win.css({
                        "outline": "none"
                    });
                }
                if (self.opt.autohidemode === false) {
                    self.autohidedom = false;
                    self.rail.css({
                        opacity: self.opt.cursoropacitymax
                    });
                    if (self.railh) self.railh.css({
                        opacity: self.opt.cursoropacitymax
                    });
                } else if (self.opt.autohidemode === true) {
                    self.autohidedom = $().add(self.rail);
                    if (cap.isie8) self.autohidedom = self.autohidedom.add(self.cursor);
                    if (self.railh) self.autohidedom = self.autohidedom.add(self.railh);
                    if (self.railh && cap.isie8) self.autohidedom = self.autohidedom.add(self.cursorh);
                } else if (self.opt.autohidemode == "scroll") {
                    self.autohidedom = $().add(self.rail);
                    if (self.railh) self.autohidedom = self.autohidedom.add(self.railh);
                } else if (self.opt.autohidemode == "cursor") {
                    self.autohidedom = $().add(self.cursor);
                    if (self.railh) self.autohidedom = self.autohidedom.add(self.cursorh);
                } else if (self.opt.autohidemode == "hidden") {
                    self.autohidedom = false;
                    self.hide();
                    self.locked = false;
                }
                if (cap.isie9mobile) {
                    self.scrollmom = new ScrollMomentumClass2D(self);
                    self.onmangotouch = function(e) {
                        var py = self.getScrollTop();
                        var px = self.getScrollLeft();
                        if ((py == self.scrollmom.lastscrolly) && (px == self.scrollmom.lastscrollx)) return true;
                        var dfy = py - self.mangotouch.sy;
                        var dfx = px - self.mangotouch.sx;
                        var df = Math.round(Math.sqrt(Math.pow(dfx, 2) + Math.pow(dfy, 2)));
                        if (df == 0) return;
                        var dry = (dfy < 0) ? -1 : 1;
                        var drx = (dfx < 0) ? -1 : 1;
                        var tm = +new Date();
                        if (self.mangotouch.lazy) clearTimeout(self.mangotouch.lazy);
                        if (((tm - self.mangotouch.tm) > 80) || (self.mangotouch.dry != dry) || (self.mangotouch.drx != drx)) {
                            self.scrollmom.stop();
                            self.scrollmom.reset(px, py);
                            self.mangotouch.sy = py;
                            self.mangotouch.ly = py;
                            self.mangotouch.sx = px;
                            self.mangotouch.lx = px;
                            self.mangotouch.dry = dry;
                            self.mangotouch.drx = drx;
                            self.mangotouch.tm = tm;
                        } else {
                            self.scrollmom.stop();
                            self.scrollmom.update(self.mangotouch.sx - dfx, self.mangotouch.sy - dfy);
                            var gap = tm - self.mangotouch.tm;
                            self.mangotouch.tm = tm;
                            var ds = Math.max(Math.abs(self.mangotouch.ly - py), Math.abs(self.mangotouch.lx - px));
                            self.mangotouch.ly = py;
                            self.mangotouch.lx = px;
                            if (ds > 2) {
                                self.mangotouch.lazy = setTimeout(function() {
                                    self.mangotouch.lazy = false;
                                    self.mangotouch.dry = 0;
                                    self.mangotouch.drx = 0;
                                    self.mangotouch.tm = 0;
                                    self.scrollmom.doMomentum(30);
                                }, 100);
                            }
                        }
                    }
                    var top = self.getScrollTop();
                    var lef = self.getScrollLeft();
                    self.mangotouch = {
                        sy: top,
                        ly: top,
                        dry: 0,
                        sx: lef,
                        lx: lef,
                        drx: 0,
                        lazy: false,
                        tm: 0
                    };
                    self.bind(self.docscroll, "scroll", self.onmangotouch);
                } else {
                    if (cap.cantouch || self.istouchcapable || self.opt.touchbehavior || cap.hasmstouch) {
                        self.scrollmom = new ScrollMomentumClass2D(self);
                        self.ontouchstart = function(e) {
                            if (e.pointerType && e.pointerType != 2) return false;
                            if (!self.locked) {
                                if (cap.hasmstouch) {
                                    var tg = (e.target) ? e.target : false;
                                    while (tg) {
                                        var nc = $(tg).getNiceScroll();
                                        if ((nc.length > 0) && (nc[0].me == self.me)) break;
                                        if (nc.length > 0) return false;
                                        if ((tg.nodeName == 'DIV') && (tg.id == self.id)) break;
                                        tg = (tg.parentNode) ? tg.parentNode : false;
                                    }
                                }
                                self.cancelScroll();
                                var tg = self.getTarget(e);
                                if (tg) {
                                    var skp = (/INPUT/i.test(tg.nodeName)) && (/range/i.test(tg.type));
                                    if (skp) return self.stopPropagation(e);
                                }
                                if (!("clientX" in e) && ("changedTouches" in e)) {
                                    e.clientX = e.changedTouches[0].clientX;
                                    e.clientY = e.changedTouches[0].clientY;
                                }
                                if (self.forcescreen) {
                                    var le = e;
                                    var e = {
                                        "original": (e.original) ? e.original : e
                                    };
                                    e.clientX = le.screenX;
                                    e.clientY = le.screenY;
                                }
                                self.rail.drag = {
                                    x: e.clientX,
                                    y: e.clientY,
                                    sx: self.scroll.x,
                                    sy: self.scroll.y,
                                    st: self.getScrollTop(),
                                    sl: self.getScrollLeft(),
                                    pt: 2,
                                    dl: false
                                };
                                if (self.ispage || !self.opt.directionlockdeadzone) {
                                    self.rail.drag.dl = "f";
                                } else {
                                    var view = {
                                        w: $(window).width(),
                                        h: $(window).height()
                                    };
                                    var page = {
                                        w: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                                        h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                                    }
                                    var maxh = Math.max(0, page.h - view.h);
                                    var maxw = Math.max(0, page.w - view.w);
                                    if (!self.rail.scrollable && self.railh.scrollable) self.rail.drag.ck = (maxh > 0) ? "v" : false;
                                    else if (self.rail.scrollable && !self.railh.scrollable) self.rail.drag.ck = (maxw > 0) ? "h" : false;
                                    else self.rail.drag.ck = false;
                                    if (!self.rail.drag.ck) self.rail.drag.dl = "f";
                                }
                                if (self.opt.touchbehavior && self.isiframe && cap.isie) {
                                    var wp = self.win.position();
                                    self.rail.drag.x += wp.left;
                                    self.rail.drag.y += wp.top;
                                }
                                self.hasmoving = false;
                                self.lastmouseup = false;
                                self.scrollmom.reset(e.clientX, e.clientY);
                                if (!cap.cantouch && !this.istouchcapable && !cap.hasmstouch) {
                                    var ip = (tg) ? /INPUT|SELECT|TEXTAREA/i.test(tg.nodeName) : false;
                                    if (!ip) {
                                        if (!self.ispage && cap.hasmousecapture) tg.setCapture();
                                        return self.cancelEvent(e);
                                    }
                                    if (/SUBMIT|CANCEL|BUTTON/i.test($(tg).attr('type'))) {
                                        pc = {
                                            "tg": tg,
                                            "click": false
                                        };
                                        self.preventclick = pc;
                                    }
                                }
                            }
                        };
                        self.ontouchend = function(e) {
                            if (e.pointerType && e.pointerType != 2) return false;
                            if (self.rail.drag && (self.rail.drag.pt == 2)) {
                                self.scrollmom.doMomentum();
                                self.rail.drag = false;
                                if (self.hasmoving) {
                                    self.hasmoving = false;
                                    self.lastmouseup = true;
                                    self.hideCursor();
                                    if (cap.hasmousecapture) document.releaseCapture();
                                    if (!cap.cantouch) return self.cancelEvent(e);
                                }
                            }
                        };
                        var moveneedoffset = (self.opt.touchbehavior && self.isiframe && !cap.hasmousecapture);
                        self.ontouchmove = function(e, byiframe) {
                            if (e.pointerType && e.pointerType != 2) return false;
                            if (self.rail.drag && (self.rail.drag.pt == 2)) {
                                if (cap.cantouch && (typeof e.original == "undefined")) return true;
                                self.hasmoving = true;
                                if (self.preventclick && !self.preventclick.click) {
                                    self.preventclick.click = self.preventclick.tg.onclick || false;
                                    self.preventclick.tg.onclick = self.onpreventclick;
                                }
                                var ev = $.extend({
                                    "original": e
                                }, e);
                                e = ev;
                                if (("changedTouches" in e)) {
                                    e.clientX = e.changedTouches[0].clientX;
                                    e.clientY = e.changedTouches[0].clientY;
                                }
                                if (self.forcescreen) {
                                    var le = e;
                                    var e = {
                                        "original": (e.original) ? e.original : e
                                    };
                                    e.clientX = le.screenX;
                                    e.clientY = le.screenY;
                                }
                                var ofx = ofy = 0;
                                if (moveneedoffset && !byiframe) {
                                    var wp = self.win.position();
                                    ofx = -wp.left;
                                    ofy = -wp.top;
                                }
                                var fy = e.clientY + ofy;
                                var my = (fy - self.rail.drag.y);
                                var fx = e.clientX + ofx;
                                var mx = (fx - self.rail.drag.x);
                                var ny = self.rail.drag.st - my;
                                if (self.ishwscroll && self.opt.bouncescroll) {
                                    if (ny < 0) {
                                        ny = Math.round(ny / 2);
                                    } else if (ny > self.page.maxh) {
                                        ny = self.page.maxh + Math.round((ny - self.page.maxh) / 2);
                                    }
                                } else {
                                    if (ny < 0) {
                                        ny = 0;
                                        fy = 0
                                    }
                                    if (ny > self.page.maxh) {
                                        ny = self.page.maxh;
                                        fy = 0
                                    }
                                }
                                if (self.railh && self.railh.scrollable) {
                                    var nx = self.rail.drag.sl - mx;
                                    if (self.ishwscroll && self.opt.bouncescroll) {
                                        if (nx < 0) {
                                            nx = Math.round(nx / 2);
                                        } else if (nx > self.page.maxw) {
                                            nx = self.page.maxw + Math.round((nx - self.page.maxw) / 2);
                                        }
                                    } else {
                                        if (nx < 0) {
                                            nx = 0;
                                            fx = 0
                                        }
                                        if (nx > self.page.maxw) {
                                            nx = self.page.maxw;
                                            fx = 0
                                        }
                                    }
                                }
                                var grabbed = false;
                                if (self.rail.drag.dl) {
                                    grabbed = true;
                                    if (self.rail.drag.dl == "v") nx = self.rail.drag.sl;
                                    else if (self.rail.drag.dl == "h") ny = self.rail.drag.st;
                                } else {
                                    var ay = Math.abs(my);
                                    var ax = Math.abs(mx);
                                    var dz = self.opt.directionlockdeadzone;
                                    if (self.rail.drag.ck == "v") {
                                        if (ay > dz && (ax <= (ay * 0.3))) {
                                            self.rail.drag = false;
                                            return true;
                                        } else if (ax > dz) {
                                            self.rail.drag.dl = "f";
                                            $("body").scrollTop($("body").scrollTop());
                                        }
                                    } else if (self.rail.drag.ck == "h") {
                                        if (ax > dz && (ay <= (az * 0.3))) {
                                            self.rail.drag = false;
                                            return true;
                                        } else if (ay > dz) {
                                            self.rail.drag.dl = "f";
                                            $("body").scrollLeft($("body").scrollLeft());
                                        }
                                    }
                                }
                                self.synched("touchmove", function() {
                                    if (self.rail.drag && (self.rail.drag.pt == 2)) {
                                        if (self.prepareTransition) self.prepareTransition(0);
                                        if (self.rail.scrollable) self.setScrollTop(ny);
                                        self.scrollmom.update(fx, fy);
                                        if (self.railh && self.railh.scrollable) {
                                            self.setScrollLeft(nx);
                                            self.showCursor(ny, nx);
                                        } else {
                                            self.showCursor(ny);
                                        }
                                        if (cap.isie10) document.selection.clear();
                                    }
                                });
                                if (cap.ischrome && self.istouchcapable) grabbed = false;
                                if (grabbed) return self.cancelEvent(e);
                            }
                        };
                    }
                    self.onmousedown = function(e, hronly) {
                        if (self.rail.drag && self.rail.drag.pt != 1) return;
                        if (self.locked) return self.cancelEvent(e);
                        self.cancelScroll();
                        self.rail.drag = {
                            x: e.clientX,
                            y: e.clientY,
                            sx: self.scroll.x,
                            sy: self.scroll.y,
                            pt: 1,
                            hr: (!!hronly)
                        };
                        var tg = self.getTarget(e);
                        if (!self.ispage && cap.hasmousecapture) tg.setCapture();
                        if (self.isiframe && !cap.hasmousecapture) {
                            self.saved["csspointerevents"] = self.doc.css("pointer-events");
                            self.css(self.doc, {
                                "pointer-events": "none"
                            });
                        }
                        return self.cancelEvent(e);
                    };
                    self.onmouseup = function(e) {
                        if (self.rail.drag) {
                            if (cap.hasmousecapture) document.releaseCapture();
                            if (self.isiframe && !cap.hasmousecapture) self.doc.css("pointer-events", self.saved["csspointerevents"]);
                            if (self.rail.drag.pt != 1) return;
                            self.rail.drag = false;
                            return self.cancelEvent(e);
                        }
                    };
                    self.onmousemove = function(e) {
                        if (self.rail.drag) {
                            if (self.rail.drag.pt != 1) return;
                            if (cap.ischrome && e.which == 0) return self.onmouseup(e);
                            self.cursorfreezed = true;
                            if (self.rail.drag.hr) {
                                self.scroll.x = self.rail.drag.sx + (e.clientX - self.rail.drag.x);
                                if (self.scroll.x < 0) self.scroll.x = 0;
                                var mw = self.scrollvaluemaxw;
                                if (self.scroll.x > mw) self.scroll.x = mw;
                            } else {
                                self.scroll.y = self.rail.drag.sy + (e.clientY - self.rail.drag.y);
                                if (self.scroll.y < 0) self.scroll.y = 0;
                                var my = self.scrollvaluemax;
                                if (self.scroll.y > my) self.scroll.y = my;
                            }
                            self.synched('mousemove', function() {
                                if (self.rail.drag && (self.rail.drag.pt == 1)) {
                                    self.showCursor();
                                    if (self.rail.drag.hr) self.doScrollLeft(Math.round(self.scroll.x * self.scrollratio.x), self.opt.cursordragspeed);
                                    else self.doScrollTop(Math.round(self.scroll.y * self.scrollratio.y), self.opt.cursordragspeed);
                                }
                            });
                            return self.cancelEvent(e);
                        }
                    };
                    if (cap.cantouch || self.opt.touchbehavior) {
                        self.onpreventclick = function(e) {
                            if (self.preventclick) {
                                self.preventclick.tg.onclick = self.preventclick.click;
                                self.preventclick = false;
                                return self.cancelEvent(e);
                            }
                        }
                        self.bind(self.win, "mousedown", self.ontouchstart);
                        self.onclick = (cap.isios) ? false : function(e) {
                            if (self.lastmouseup) {
                                self.lastmouseup = false;
                                return self.cancelEvent(e);
                            } else {
                                return true;
                            }
                        };
                        if (self.opt.grabcursorenabled && cap.cursorgrabvalue) {
                            self.css((self.ispage) ? self.doc : self.win, {
                                'cursor': cap.cursorgrabvalue
                            });
                            self.css(self.rail, {
                                'cursor': cap.cursorgrabvalue
                            });
                        }
                    } else {
                        function checkSelectionScroll(e) {
                            if (!self.selectiondrag) return;
                            if (e) {
                                var ww = self.win.outerHeight();
                                var df = (e.pageY - self.selectiondrag.top);
                                if (df > 0 && df < ww) df = 0;
                                if (df >= ww) df -= ww;
                                self.selectiondrag.df = df;
                            }
                            if (self.selectiondrag.df == 0) return;
                            var rt = -Math.floor(self.selectiondrag.df / 6) * 2;
                            self.doScrollBy(rt);
                            self.debounced("doselectionscroll", function() {
                                checkSelectionScroll()
                            }, 50);
                        }
                        if ("getSelection" in document) {
                            self.hasTextSelected = function() {
                                return (document.getSelection().rangeCount > 0);
                            }
                        } else if ("selection" in document) {
                            self.hasTextSelected = function() {
                                return (document.selection.type != "None");
                            }
                        } else {
                            self.hasTextSelected = function() {
                                return false;
                            }
                        }
                        self.onselectionstart = function(e) {
                            if (self.ispage) return;
                            self.selectiondrag = self.win.offset();
                        }
                        self.onselectionend = function(e) {
                            self.selectiondrag = false;
                        }
                        self.onselectiondrag = function(e) {
                            if (!self.selectiondrag) return;
                            if (self.hasTextSelected()) self.debounced("selectionscroll", function() {
                                checkSelectionScroll(e)
                            }, 250);
                        }
                    }
                    if (cap.hasmstouch) {
                        self.css(self.rail, {
                            '-ms-touch-action': 'none'
                        });
                        self.css(self.cursor, {
                            '-ms-touch-action': 'none'
                        });
                        self.bind(self.win, "MSPointerDown", self.ontouchstart);
                        self.bind(document, "MSPointerUp", self.ontouchend);
                        self.bind(document, "MSPointerMove", self.ontouchmove);
                        self.bind(self.cursor, "MSGestureHold", function(e) {
                            e.preventDefault()
                        });
                        self.bind(self.cursor, "contextmenu", function(e) {
                            e.preventDefault()
                        });
                    }
                    if (this.istouchcapable) {
                        self.bind(self.win, "touchstart", self.ontouchstart);
                        self.bind(document, "touchend", self.ontouchend);
                        self.bind(document, "touchcancel", self.ontouchend);
                        self.bind(document, "touchmove", self.ontouchmove);
                    }
                    self.bind(self.cursor, "mousedown", self.onmousedown);
                    self.bind(self.cursor, "mouseup", self.onmouseup);
                    if (self.railh) {
                        self.bind(self.cursorh, "mousedown", function(e) {
                            self.onmousedown(e, true)
                        });
                        self.bind(self.cursorh, "mouseup", function(e) {
                            if (self.rail.drag && self.rail.drag.pt == 2) return;
                            self.rail.drag = false;
                            self.hasmoving = false;
                            self.hideCursor();
                            if (cap.hasmousecapture) document.releaseCapture();
                            return self.cancelEvent(e);
                        });
                    }
                    if (self.opt.cursordragontouch || !cap.cantouch && !self.opt.touchbehavior) {
                        self.rail.css({
                            "cursor": "default"
                        });
                        self.railh && self.railh.css({
                            "cursor": "default"
                        });
                        self.jqbind(self.rail, "mouseenter", function() {
                            if (self.canshowonmouseevent) self.showCursor();
                            self.rail.active = true;
                        });
                        self.jqbind(self.rail, "mouseleave", function() {
                            self.rail.active = false;
                            if (!self.rail.drag) self.hideCursor();
                        });
                        if (self.opt.sensitiverail) {
                            self.bind(self.rail, "click", function(e) {
                                self.doRailClick(e, false, false)
                            });
                            self.bind(self.rail, "dblclick", function(e) {
                                self.doRailClick(e, true, false)
                            });
                            self.bind(self.cursor, "click", function(e) {
                                self.cancelEvent(e)
                            });
                            self.bind(self.cursor, "dblclick", function(e) {
                                self.cancelEvent(e)
                            });
                        }
                        if (self.railh) {
                            self.jqbind(self.railh, "mouseenter", function() {
                                if (self.canshowonmouseevent) self.showCursor();
                                self.rail.active = true;
                            });
                            self.jqbind(self.railh, "mouseleave", function() {
                                self.rail.active = false;
                                if (!self.rail.drag) self.hideCursor();
                            });
                            if (self.opt.sensitiverail) {
                                self.bind(self.railh, "click", function(e) {
                                    self.doRailClick(e, false, true)
                                });
                                self.bind(self.railh, "dblclick", function(e) {
                                    self.doRailClick(e, true, true)
                                });
                                self.bind(self.cursorh, "click", function(e) {
                                    self.cancelEvent(e)
                                });
                                self.bind(self.cursorh, "dblclick", function(e) {
                                    self.cancelEvent(e)
                                });
                            }
                        }
                    }
                    if (!cap.cantouch && !self.opt.touchbehavior) {
                        self.bind((cap.hasmousecapture) ? self.win : document, "mouseup", self.onmouseup);
                        self.bind(document, "mousemove", self.onmousemove);
                        if (self.onclick) self.bind(document, "click", self.onclick);
                        if (!self.ispage && self.opt.enablescrollonselection) {
                            self.bind(self.win[0], "mousedown", self.onselectionstart);
                            self.bind(document, "mouseup", self.onselectionend);
                            self.bind(self.cursor, "mouseup", self.onselectionend);
                            if (self.cursorh) self.bind(self.cursorh, "mouseup", self.onselectionend);
                            self.bind(document, "mousemove", self.onselectiondrag);
                        }
                        if (self.zoom) {
                            self.jqbind(self.zoom, "mouseenter", function() {
                                if (self.canshowonmouseevent) self.showCursor();
                                self.rail.active = true;
                            });
                            self.jqbind(self.zoom, "mouseleave", function() {
                                self.rail.active = false;
                                if (!self.rail.drag) self.hideCursor();
                            });
                        }
                    } else {
                        self.bind((cap.hasmousecapture) ? self.win : document, "mouseup", self.ontouchend);
                        self.bind(document, "mousemove", self.ontouchmove);
                        if (self.onclick) self.bind(document, "click", self.onclick);
                        if (self.opt.cursordragontouch) {
                            self.bind(self.cursor, "mousedown", self.onmousedown);
                            self.bind(self.cursor, "mousemove", self.onmousemove);
                            self.cursorh && self.bind(self.cursorh, "mousedown", self.onmousedown);
                            self.cursorh && self.bind(self.cursorh, "mousemove", self.onmousemove);
                        }
                    }
                    if (self.opt.enablemousewheel) {
                        if (!self.isiframe) self.bind((cap.isie && self.ispage) ? document : self.docscroll, "mousewheel", self.onmousewheel);
                        self.bind(self.rail, "mousewheel", self.onmousewheel);
                        if (self.railh) self.bind(self.railh, "mousewheel", self.onmousewheelhr);
                    }
                    if (!self.ispage && !cap.cantouch && !(/HTML|BODY/.test(self.win[0].nodeName))) {
                        if (!self.win.attr("tabindex")) self.win.attr({
                            "tabindex": tabindexcounter++
                        });
                        self.jqbind(self.win, "focus", function(e) {
                            domfocus = (self.getTarget(e)).id || true;
                            self.hasfocus = true;
                            if (self.canshowonmouseevent) self.noticeCursor();
                        });
                        self.jqbind(self.win, "blur", function(e) {
                            domfocus = false;
                            self.hasfocus = false;
                        });
                        self.jqbind(self.win, "mouseenter", function(e) {
                            mousefocus = (self.getTarget(e)).id || true;
                            self.hasmousefocus = true;
                            if (self.canshowonmouseevent) self.noticeCursor();
                        });
                        self.jqbind(self.win, "mouseleave", function() {
                            mousefocus = false;
                            self.hasmousefocus = false;
                        });
                    };
                }
                self.onkeypress = function(e) {
                    if (self.locked && self.page.maxh == 0) return true;
                    e = (e) ? e : window.e;
                    var tg = self.getTarget(e);
                    if (tg && /INPUT|TEXTAREA|SELECT|OPTION/.test(tg.nodeName)) {
                        var tp = tg.getAttribute('type') || tg.type || false;
                        if ((!tp) || !(/submit|button|cancel/i.tp)) return true;
                    }
                    if (self.hasfocus || (self.hasmousefocus && !domfocus) || (self.ispage && !domfocus && !mousefocus)) {
                        var key = e.keyCode;
                        if (self.locked && key != 27) return self.cancelEvent(e);
                        var ctrl = e.ctrlKey || false;
                        var shift = e.shiftKey || false;
                        var ret = false;
                        switch (key) {
                            case 38:
                            case 63233:
                                self.doScrollBy(24 * 3);
                                ret = true;
                                break;
                            case 40:
                            case 63235:
                                self.doScrollBy(-24 * 3);
                                ret = true;
                                break;
                            case 37:
                            case 63232:
                                if (self.railh) {
                                    (ctrl) ? self.doScrollLeft(0): self.doScrollLeftBy(24 * 3);
                                    ret = true;
                                }
                                break;
                            case 39:
                            case 63234:
                                if (self.railh) {
                                    (ctrl) ? self.doScrollLeft(self.page.maxw): self.doScrollLeftBy(-24 * 3);
                                    ret = true;
                                }
                                break;
                            case 33:
                            case 63276:
                                self.doScrollBy(self.view.h);
                                ret = true;
                                break;
                            case 34:
                            case 63277:
                                self.doScrollBy(-self.view.h);
                                ret = true;
                                break;
                            case 36:
                            case 63273:
                                (self.railh && ctrl) ? self.doScrollPos(0, 0): self.doScrollTo(0);
                                ret = true;
                                break;
                            case 35:
                            case 63275:
                                (self.railh && ctrl) ? self.doScrollPos(self.page.maxw, self.page.maxh): self.doScrollTo(self.page.maxh);
                                ret = true;
                                break;
                            case 32:
                                if (self.opt.spacebarenabled) {
                                    (shift) ? self.doScrollBy(self.view.h): self.doScrollBy(-self.view.h);
                                    ret = true;
                                }
                                break;
                            case 27:
                                if (self.zoomactive) {
                                    self.doZoom();
                                    ret = true;
                                }
                                break;
                        }
                        if (ret) return self.cancelEvent(e);
                    }
                };
                if (self.opt.enablekeyboard) self.bind(document, (cap.isopera && !cap.isopera12) ? "keypress" : "keydown", self.onkeypress);
                self.bind(window, 'resize', self.lazyResize);
                self.bind(window, 'orientationchange', self.lazyResize);
                self.bind(window, "load", self.lazyResize);
                if (cap.ischrome && !self.ispage && !self.haswrapper) {
                    var tmp = self.win.attr("style");
                    var ww = parseFloat(self.win.css("width")) + 1;
                    self.win.css('width', ww);
                    self.synched("chromefix", function() {
                        self.win.attr("style", tmp)
                    });
                }
                self.onAttributeChange = function(e) {
                    self.lazyResize(250);
                }
                if (!self.ispage && !self.haswrapper) {
                    if (clsMutationObserver !== false) {
                        self.observer = new clsMutationObserver(function(mutations) {
                            mutations.forEach(self.onAttributeChange);
                        });
                        self.observer.observe(self.win[0], {
                            childList: true,
                            characterData: false,
                            attributes: true,
                            subtree: false
                        });
                        self.observerremover = new clsMutationObserver(function(mutations) {
                            mutations.forEach(function(mo) {
                                if (mo.removedNodes.length > 0) {
                                    for (var dd in mo.removedNodes) {
                                        if (mo.removedNodes[dd] == self.win[0]) return self.remove();
                                    }
                                }
                            });
                        });
                        self.observerremover.observe(self.win[0].parentNode, {
                            childList: true,
                            characterData: false,
                            attributes: false,
                            subtree: false
                        });
                    } else {
                        self.bind(self.win, (cap.isie && !cap.isie9) ? "propertychange" : "DOMAttrModified", self.onAttributeChange);
                        if (cap.isie9) self.win[0].attachEvent("onpropertychange", self.onAttributeChange);
                        self.bind(self.win, "DOMNodeRemoved", function(e) {
                            if (e.target == self.win[0]) self.remove();
                        });
                    }
                }
                if (!self.ispage && self.opt.boxzoom) self.bind(window, "resize", self.resizeZoom);
                if (self.istextarea) self.bind(self.win, "mouseup", self.lazyResize);
                self.checkrtlmode = true;
                self.lazyResize(30);
            }
            if (this.doc[0].nodeName == 'IFRAME') {
                function oniframeload(e) {
                    self.iframexd = false;
                    try {
                        var doc = 'contentDocument' in this ? this.contentDocument : this.contentWindow.document;
                        var a = doc.domain;
                    } catch (e) {
                        self.iframexd = true;
                        doc = false
                    };
                    if (self.iframexd) {
                        if ("console" in window) console.log('NiceScroll error: policy restriced iframe');
                        return true;
                    }
                    self.forcescreen = true;
                    if (self.isiframe) {
                        self.iframe = {
                            "doc": $(doc),
                            "html": self.doc.contents().find('html')[0],
                            "body": self.doc.contents().find('body')[0]
                        };
                        self.getContentSize = function() {
                            return {
                                w: Math.max(self.iframe.html.scrollWidth, self.iframe.body.scrollWidth),
                                h: Math.max(self.iframe.html.scrollHeight, self.iframe.body.scrollHeight)
                            }
                        }
                        self.docscroll = $(self.iframe.body);
                    }
                    if (!cap.isios && self.opt.iframeautoresize && !self.isiframe) {
                        self.win.scrollTop(0);
                        self.doc.height("");
                        var hh = Math.max(doc.getElementsByTagName('html')[0].scrollHeight, doc.body.scrollHeight);
                        self.doc.height(hh);
                    }
                    self.lazyResize(30);
                    if (cap.isie7) self.css($(self.iframe.html), {
                        'overflow-y': 'hidden'
                    });
                    self.css($(self.iframe.body), {
                        'overflow-y': 'hidden'
                    });
                    if ('contentWindow' in this) {
                        self.bind(this.contentWindow, "scroll", self.onscroll);
                    } else {
                        self.bind(doc, "scroll", self.onscroll);
                    }
                    if (self.opt.enablemousewheel) {
                        self.bind(doc, "mousewheel", self.onmousewheel);
                    }
                    if (self.opt.enablekeyboard) self.bind(doc, (cap.isopera) ? "keypress" : "keydown", self.onkeypress);
                    if (cap.cantouch || self.opt.touchbehavior) {
                        self.bind(doc, "mousedown", self.onmousedown);
                        self.bind(doc, "mousemove", function(e) {
                            self.onmousemove(e, true)
                        });
                        if (self.opt.grabcursorenabled && cap.cursorgrabvalue) self.css($(doc.body), {
                            'cursor': cap.cursorgrabvalue
                        });
                    }
                    self.bind(doc, "mouseup", self.onmouseup);
                    if (self.zoom) {
                        if (self.opt.dblclickzoom) self.bind(doc, 'dblclick', self.doZoom);
                        if (self.ongesturezoom) self.bind(doc, "gestureend", self.ongesturezoom);
                    }
                };
                if (this.doc[0].readyState && this.doc[0].readyState == "complete") {
                    setTimeout(function() {
                        oniframeload.call(self.doc[0], false)
                    }, 500);
                }
                self.bind(this.doc, "load", oniframeload);
            }
        };
        this.showCursor = function(py, px) {
            if (self.cursortimeout) {
                clearTimeout(self.cursortimeout);
                self.cursortimeout = 0;
            }
            if (!self.rail) return;
            if (self.autohidedom) {
                self.autohidedom.stop().css({
                    opacity: self.opt.cursoropacitymax
                });
                self.cursoractive = true;
            }
            if (!self.rail.drag || self.rail.drag.pt != 1) {
                if ((typeof py != "undefined") && (py !== false)) {
                    self.scroll.y = Math.round(py * 1 / self.scrollratio.y);
                }
                if (typeof px != "undefined") {
                    self.scroll.x = Math.round(px * 1 / self.scrollratio.x);
                }
            }
            self.cursor.css({
                height: self.cursorheight,
                top: self.scroll.y
            });
            if (self.cursorh) {
                (!self.rail.align && self.rail.visibility) ? self.cursorh.css({
                    width: self.cursorwidth,
                    left: self.scroll.x + self.rail.width
                }): self.cursorh.css({
                    width: self.cursorwidth,
                    left: self.scroll.x
                });
                self.cursoractive = true;
            }
            if (self.zoom) self.zoom.stop().css({
                opacity: self.opt.cursoropacitymax
            });
        };
        this.hideCursor = function(tm) {
            if (self.cursortimeout) return;
            if (!self.rail) return;
            if (!self.autohidedom) return;
            self.cursortimeout = setTimeout(function() {
                if (!self.rail.active || !self.showonmouseevent) {
                    self.autohidedom.stop().animate({
                        opacity: self.opt.cursoropacitymin
                    });
                    if (self.zoom) self.zoom.stop().animate({
                        opacity: self.opt.cursoropacitymin
                    });
                    self.cursoractive = false;
                }
                self.cursortimeout = 0;
            }, tm || self.opt.hidecursordelay);
        };
        this.noticeCursor = function(tm, py, px) {
            self.showCursor(py, px);
            if (!self.rail.active) self.hideCursor(tm);
        };
        this.getContentSize = (self.ispage) ? function() {
            return {
                w: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
            }
        } : (self.haswrapper) ? function() {
            return {
                w: self.doc.outerWidth() + parseInt(self.win.css('paddingLeft')) + parseInt(self.win.css('paddingRight')),
                h: self.doc.outerHeight() + parseInt(self.win.css('paddingTop')) + parseInt(self.win.css('paddingBottom'))
            }
        } : function() {
            return {
                w: self.docscroll[0].scrollWidth,
                h: self.docscroll[0].scrollHeight
            }
        };
        this.onResize = function(e, page) {
            if (!self.win) return false;
            if (!self.haswrapper && !self.ispage) {
                if (self.win.css('display') == 'none') {
                    if (self.visibility) self.hideRail().hideRailHr();
                    return false;
                } else {
                    if (!self.hidden && !self.visibility) self.showRail().showRailHr();
                }
            }
            var premaxh = self.page.maxh;
            var premaxw = self.page.maxw;
            var preview = {
                h: self.view.h,
                w: self.view.w
            };
            self.view = {
                w: (self.ispage) ? self.win.width() : parseInt(self.win[0].clientWidth),
                h: (self.ispage) ? self.win.height() : parseInt(self.win[0].clientHeight)
            };
            self.page = (page) ? page : self.getContentSize();
            self.page.maxh = Math.max(0, self.page.h - self.view.h);
            self.page.maxw = Math.max(0, self.page.w - self.view.w);
            if ((self.page.maxh == premaxh) && (self.page.maxw == premaxw) && (self.view.w == preview.w)) {
                if (!self.ispage) {
                    var pos = self.win.offset();
                    if (self.lastposition) {
                        var lst = self.lastposition;
                        if ((lst.top == pos.top) && (lst.left == pos.left)) return self;
                    }
                    self.lastposition = pos;
                } else {
                    return self;
                }
            }
            if (self.page.maxh == 0) {
                self.hideRail();
                self.scrollvaluemax = 0;
                self.scroll.y = 0;
                self.scrollratio.y = 0;
                self.cursorheight = 0;
                self.setScrollTop(0);
                self.rail.scrollable = false;
            } else {
                self.rail.scrollable = true;
            }
            if (self.page.maxw == 0) {
                self.hideRailHr();
                self.scrollvaluemaxw = 0;
                self.scroll.x = 0;
                self.scrollratio.x = 0;
                self.cursorwidth = 0;
                self.setScrollLeft(0);
                self.railh.scrollable = false;
            } else {
                self.railh.scrollable = true;
            }
            self.locked = (self.page.maxh == 0) && (self.page.maxw == 0);
            if (self.locked) {
                if (!self.ispage) self.updateScrollBar(self.view);
                return false;
            }
            if (!self.hidden && !self.visibility) {
                self.showRail().showRailHr();
            } else if (!self.hidden && !self.railh.visibility) self.showRailHr();
            if (self.istextarea && self.win.css('resize') && self.win.css('resize') != 'none') self.view.h -= 20;
            self.cursorheight = Math.min(self.view.h, Math.round(self.view.h * (self.view.h / self.page.h)));
            self.cursorheight = (self.opt.cursorfixedheight) ? self.opt.cursorfixedheight : Math.max(self.opt.cursorminheight, self.cursorheight);
            self.cursorwidth = Math.min(self.view.w, Math.round(self.view.w * (self.view.w / self.page.w)));
            self.cursorwidth = (self.opt.cursorfixedheight) ? self.opt.cursorfixedheight : Math.max(self.opt.cursorminheight, self.cursorwidth);
            self.scrollvaluemax = self.view.h - self.cursorheight - self.cursor.hborder;
            if (self.railh) {
                self.railh.width = (self.page.maxh > 0) ? (self.view.w - self.rail.width) : self.view.w;
                self.scrollvaluemaxw = self.railh.width - self.cursorwidth - self.cursorh.wborder;
            }
            if (self.checkrtlmode && self.railh) {
                self.checkrtlmode = false;
                if (self.opt.rtlmode && self.scroll.x == 0) self.setScrollLeft(self.page.maxw);
            }
            if (!self.ispage) self.updateScrollBar(self.view);
            self.scrollratio = {
                x: (self.page.maxw / self.scrollvaluemaxw),
                y: (self.page.maxh / self.scrollvaluemax)
            };
            var sy = self.getScrollTop();
            if (sy > self.page.maxh) {
                self.doScrollTop(self.page.maxh);
            } else {
                self.scroll.y = Math.round(self.getScrollTop() * (1 / self.scrollratio.y));
                self.scroll.x = Math.round(self.getScrollLeft() * (1 / self.scrollratio.x));
                if (self.cursoractive) self.noticeCursor();
            }
            if (self.scroll.y && (self.getScrollTop() == 0)) self.doScrollTo(Math.floor(self.scroll.y * self.scrollratio.y));
            return self;
        };
        this.resize = self.onResize;
        this.lazyResize = function(tm) {
            tm = (isNaN(tm)) ? 30 : tm;
            self.delayed('resize', self.resize, tm);
            return self;
        }

        function _modernWheelEvent(dom, name, fn, bubble) {
            self._bind(dom, name, function(e) {
                var e = (e) ? e : window.event;
                var event = {
                    original: e,
                    target: e.target || e.srcElement,
                    type: "wheel",
                    deltaMode: e.type == "MozMousePixelScroll" ? 0 : 1,
                    deltaX: 0,
                    deltaZ: 0,
                    preventDefault: function() {
                        e.preventDefault ? e.preventDefault() : e.returnValue = false;
                        return false;
                    },
                    stopImmediatePropagation: function() {
                        (e.stopImmediatePropagation) ? e.stopImmediatePropagation(): e.cancelBubble = true;
                    }
                };
                if (name == "mousewheel") {
                    event.deltaY = -1 / 40 * e.wheelDelta;
                    e.wheelDeltaX && (event.deltaX = -1 / 40 * e.wheelDeltaX);
                } else {
                    event.deltaY = e.detail;
                }
                return fn.call(dom, event);
            }, bubble);
        };
        this._bind = function(el, name, fn, bubble) {
            self.events.push({
                e: el,
                n: name,
                f: fn,
                b: bubble,
                q: false
            });
            if (el.addEventListener) {
                el.addEventListener(name, fn, bubble || false);
            } else if (el.attachEvent) {
                el.attachEvent("on" + name, fn);
            } else {
                el["on" + name] = fn;
            }
        };
        this.jqbind = function(dom, name, fn) {
            self.events.push({
                e: dom,
                n: name,
                f: fn,
                q: true
            });
            $(dom).bind(name, fn);
        }
        this.bind = function(dom, name, fn, bubble) {
            var el = ("jquery" in dom) ? dom[0] : dom;
            if (name == 'mousewheel') {
                if ("onwheel" in self.win) {
                    self._bind(el, "wheel", fn, bubble || false);
                } else {
                    var wname = (typeof document.onmousewheel != "undefined") ? "mousewheel" : "DOMMouseScroll";
                    _modernWheelEvent(el, wname, fn, bubble || false);
                    if (wname == "DOMMouseScroll") _modernWheelEvent(el, "MozMousePixelScroll", fn, bubble || false);
                }
            } else if (el.addEventListener) {
                if (cap.cantouch && /mouseup|mousedown|mousemove/.test(name)) {
                    var tt = (name == 'mousedown') ? 'touchstart' : (name == 'mouseup') ? 'touchend' : 'touchmove';
                    self._bind(el, tt, function(e) {
                        if (e.touches) {
                            if (e.touches.length < 2) {
                                var ev = (e.touches.length) ? e.touches[0] : e;
                                ev.original = e;
                                fn.call(this, ev);
                            }
                        } else if (e.changedTouches) {
                            var ev = e.changedTouches[0];
                            ev.original = e;
                            fn.call(this, ev);
                        }
                    }, bubble || false);
                }
                self._bind(el, name, fn, bubble || false);
                if (cap.cantouch && name == "mouseup") self._bind(el, "touchcancel", fn, bubble || false);
            } else {
                self._bind(el, name, function(e) {
                    e = e || window.event || false;
                    if (e) {
                        if (e.srcElement) e.target = e.srcElement;
                    }
                    if (!("pageY" in e)) {
                        e.pageX = e.clientX + document.documentElement.scrollLeft;
                        e.pageY = e.clientY + document.documentElement.scrollTop;
                    }
                    return ((fn.call(el, e) === false) || bubble === false) ? self.cancelEvent(e) : true;
                });
            }
        };
        this._unbind = function(el, name, fn, bub) {
            if (el.removeEventListener) {
                el.removeEventListener(name, fn, bub);
            } else if (el.detachEvent) {
                el.detachEvent('on' + name, fn);
            } else {
                el['on' + name] = false;
            }
        };
        this.unbindAll = function() {
            for (var a = 0; a < self.events.length; a++) {
                var r = self.events[a];
                (r.q) ? r.e.unbind(r.n, r.f): self._unbind(r.e, r.n, r.f, r.b);
            }
        };
        this.cancelEvent = function(e) {
            var e = (e.original) ? e.original : (e) ? e : window.event || false;
            if (!e) return false;
            if (e.preventDefault) e.preventDefault();
            if (e.stopPropagation) e.stopPropagation();
            if (e.preventManipulation) e.preventManipulation();
            e.cancelBubble = true;
            e.cancel = true;
            e.returnValue = false;
            return false;
        };
        this.stopPropagation = function(e) {
            var e = (e.original) ? e.original : (e) ? e : window.event || false;
            if (!e) return false;
            if (e.stopPropagation) return e.stopPropagation();
            if (e.cancelBubble) e.cancelBubble = true;
            return false;
        }
        this.showRail = function() {
            if ((self.page.maxh != 0) && (self.ispage || self.win.css('display') != 'none')) {
                self.visibility = true;
                self.rail.visibility = true;
                self.rail.css('display', 'block');
            }
            return self;
        };
        this.showRailHr = function() {
            if (!self.railh) return self;
            if ((self.page.maxw != 0) && (self.ispage || self.win.css('display') != 'none')) {
                self.railh.visibility = true;
                self.railh.css('display', 'block');
            }
            return self;
        };
        this.hideRail = function() {
            self.visibility = false;
            self.rail.visibility = false;
            self.rail.css('display', 'none');
            return self;
        };
        this.hideRailHr = function() {
            if (!self.railh) return self;
            self.railh.visibility = false;
            self.railh.css('display', 'none');
            return self;
        };
        this.show = function() {
            self.hidden = false;
            self.locked = false;
            return self.showRail().showRailHr();
        };
        this.hide = function() {
            self.hidden = true;
            self.locked = true;
            return self.hideRail().hideRailHr();
        };
        this.toggle = function() {
            return (self.hidden) ? self.show() : self.hide();
        };
        this.remove = function() {
            self.stop();
            if (self.cursortimeout) clearTimeout(self.cursortimeout);
            self.doZoomOut();
            self.unbindAll();
            if (self.observer !== false) self.observer.disconnect();
            if (self.observerremover !== false) self.observerremover.disconnect();
            self.events = [];
            if (self.cursor) {
                self.cursor.remove();
                self.cursor = null;
            }
            if (self.cursorh) {
                self.cursorh.remove();
                self.cursorh = null;
            }
            if (self.rail) {
                self.rail.remove();
                self.rail = null;
            }
            if (self.railh) {
                self.railh.remove();
                self.railh = null;
            }
            if (self.zoom) {
                self.zoom.remove();
                self.zoom = null;
            }
            for (var a = 0; a < self.saved.css.length; a++) {
                var d = self.saved.css[a];
                d[0].css(d[1], (typeof d[2] == "undefined") ? '' : d[2]);
            }
            self.saved = false;
            self.me.data('__nicescroll', '');
            self.me = null;
            self.doc = null;
            self.docscroll = null;
            self.win = null;
            return self;
        };
        this.scrollstart = function(fn) {
            this.onscrollstart = fn;
            return self;
        }
        this.scrollend = function(fn) {
            this.onscrollend = fn;
            return self;
        }
        this.scrollcancel = function(fn) {
            this.onscrollcancel = fn;
            return self;
        }
        this.zoomin = function(fn) {
            this.onzoomin = fn;
            return self;
        }
        this.zoomout = function(fn) {
            this.onzoomout = fn;
            return self;
        }
        this.isScrollable = function(e) {
            var dom = (e.target) ? e.target : e;
            if (dom.nodeName == 'OPTION') return true;
            while (dom && (dom.nodeType == 1) && !(/BODY|HTML/.test(dom.nodeName))) {
                var dd = $(dom);
                var ov = dd.css('overflowY') || dd.css('overflowX') || dd.css('overflow') || '';
                if (/scroll|auto/.test(ov)) return (dom.clientHeight != dom.scrollHeight);
                dom = (dom.parentNode) ? dom.parentNode : false;
            }
            return false;
        };
        this.getViewport = function(me) {
            var dom = (me && me.parentNode) ? me.parentNode : false;
            while (dom && (dom.nodeType == 1) && !(/BODY|HTML/.test(dom.nodeName))) {
                var dd = $(dom);
                var ov = dd.css('overflowY') || dd.css('overflowX') || dd.css('overflow') || '';
                if ((/scroll|auto/.test(ov)) && (dom.clientHeight != dom.scrollHeight)) return dd;
                if (dd.getNiceScroll().length > 0) return dd;
                dom = (dom.parentNode) ? dom.parentNode : false;
            }
            return false;
        };

        function execScrollWheel(e, hr, chkscroll) {
            var px, py;
            var rt = 1;
            if (e.deltaMode == 0) {
                px = -Math.floor(e.deltaX * (self.opt.mousescrollstep / (18 * 3)));
                py = -Math.floor(e.deltaY * (self.opt.mousescrollstep / (18 * 3)));
            } else if (e.deltaMode == 1) {
                px = -Math.floor(e.deltaX * self.opt.mousescrollstep);
                py = -Math.floor(e.deltaY * self.opt.mousescrollstep);
            }
            if (hr && (px == 0) && py) {
                px = py;
                py = 0;
            }
            if (px) {
                if (self.scrollmom) {
                    self.scrollmom.stop()
                }
                self.lastdeltax += px;
                self.debounced("mousewheelx", function() {
                    var dt = self.lastdeltax;
                    self.lastdeltax = 0;
                    if (!self.rail.drag) {
                        self.doScrollLeftBy(dt)
                    }
                }, 120);
            }
            if (py) {
                if (self.opt.nativeparentscrolling && chkscroll && !self.ispage && !self.zoomactive) {
                    if (py < 0) {
                        if (self.getScrollTop() >= self.page.maxh) return true;
                    } else {
                        if (self.getScrollTop() <= 0) return true;
                    }
                }
                if (self.scrollmom) {
                    self.scrollmom.stop()
                }
                self.lastdeltay += py;
                self.debounced("mousewheely", function() {
                    var dt = self.lastdeltay;
                    self.lastdeltay = 0;
                    if (!self.rail.drag) {
                        self.doScrollBy(dt)
                    }
                }, 120);
            }
            e.stopImmediatePropagation();
            return e.preventDefault();
        };
        this.onmousewheel = function(e) {
            if (self.locked) return true;
            if (self.rail.drag) return self.cancelEvent(e);
            if (!self.rail.scrollable) {
                if (self.railh && self.railh.scrollable) {
                    return self.onmousewheelhr(e);
                } else {
                    return true;
                }
            }
            var nw = +(new Date());
            var chk = false;
            if (self.opt.preservenativescrolling && ((self.checkarea + 600) < nw)) {
                self.nativescrollingarea = self.isScrollable(e);
                chk = true;
            }
            self.checkarea = nw;
            if (self.nativescrollingarea) return true;
            var ret = execScrollWheel(e, false, chk);
            if (ret) self.checkarea = 0;
            return ret;
        };
        this.onmousewheelhr = function(e) {
            if (self.locked || !self.railh.scrollable) return true;
            if (self.rail.drag) return self.cancelEvent(e);
            var nw = +(new Date());
            var chk = false;
            if (self.opt.preservenativescrolling && ((self.checkarea + 600) < nw)) {
                self.nativescrollingarea = self.isScrollable(e);
                chk = true;
            }
            self.checkarea = nw;
            if (self.nativescrollingarea) return true;
            if (self.locked) return self.cancelEvent(e);
            return execScrollWheel(e, true, chk);
        };
        this.stop = function() {
            self.cancelScroll();
            if (self.scrollmon) self.scrollmon.stop();
            self.cursorfreezed = false;
            self.scroll.y = Math.round(self.getScrollTop() * (1 / self.scrollratio.y));
            self.noticeCursor();
            return self;
        };
        this.getTransitionSpeed = function(dif) {
            var sp = Math.round(self.opt.scrollspeed * 10);
            var ex = Math.min(sp, Math.round((dif / 20) * self.opt.scrollspeed));
            return (ex > 20) ? ex : 0;
        }
        if (!self.opt.smoothscroll) {
            this.doScrollLeft = function(x, spd) {
                var y = self.getScrollTop();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollTop = function(y, spd) {
                var x = self.getScrollLeft();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollPos = function(x, y, spd) {
                var nx = (x > self.page.maxw) ? self.page.maxw : x;
                if (nx < 0) nx = 0;
                var ny = (y > self.page.maxh) ? self.page.maxh : y;
                if (ny < 0) ny = 0;
                self.synched('scroll', function() {
                    self.setScrollTop(ny);
                    self.setScrollLeft(nx);
                });
            }
            this.cancelScroll = function() {};
        } else if (self.ishwscroll && cap.hastransition && self.opt.usetransition) {
            this.prepareTransition = function(dif, istime) {
                var ex = (istime) ? ((dif > 20) ? dif : 0) : self.getTransitionSpeed(dif);
                var trans = (ex) ? cap.prefixstyle + 'transform ' + ex + 'ms ease-out' : '';
                if (!self.lasttransitionstyle || self.lasttransitionstyle != trans) {
                    self.lasttransitionstyle = trans;
                    self.doc.css(cap.transitionstyle, trans);
                }
                return ex;
            };
            this.doScrollLeft = function(x, spd) {
                var y = (self.scrollrunning) ? self.newscrolly : self.getScrollTop();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollTop = function(y, spd) {
                var x = (self.scrollrunning) ? self.newscrollx : self.getScrollLeft();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollPos = function(x, y, spd) {
                var py = self.getScrollTop();
                var px = self.getScrollLeft();
                if (((self.newscrolly - py) * (y - py) < 0) || ((self.newscrollx - px) * (x - px) < 0)) self.cancelScroll();
                if (self.opt.bouncescroll == false) {
                    if (y < 0) y = 0;
                    else if (y > self.page.maxh) y = self.page.maxh;
                    if (x < 0) x = 0;
                    else if (x > self.page.maxw) x = self.page.maxw;
                }
                if (self.scrollrunning && x == self.newscrollx && y == self.newscrolly) return false;
                self.newscrolly = y;
                self.newscrollx = x;
                self.newscrollspeed = spd || false;
                if (self.timer) return false;
                self.timer = setTimeout(function() {
                    var top = self.getScrollTop();
                    var lft = self.getScrollLeft();
                    var dst = {};
                    dst.x = x - lft;
                    dst.y = y - top;
                    dst.px = lft;
                    dst.py = top;
                    var dd = Math.round(Math.sqrt(Math.pow(dst.x, 2) + Math.pow(dst.y, 2)));
                    var ms = (self.newscrollspeed && self.newscrollspeed > 1) ? self.newscrollspeed : self.getTransitionSpeed(dd);
                    if (self.newscrollspeed && self.newscrollspeed <= 1) ms *= self.newscrollspeed;
                    self.prepareTransition(ms, true);
                    if (self.timerscroll && self.timerscroll.tm) clearInterval(self.timerscroll.tm);
                    if (ms > 0) {
                        if (!self.scrollrunning && self.onscrollstart) {
                            var info = {
                                "type": "scrollstart",
                                "current": {
                                    "x": lft,
                                    "y": top
                                },
                                "request": {
                                    "x": x,
                                    "y": y
                                },
                                "end": {
                                    "x": self.newscrollx,
                                    "y": self.newscrolly
                                },
                                "speed": ms
                            };
                            self.onscrollstart.call(self, info);
                        }
                        if (cap.transitionend) {
                            if (!self.scrollendtrapped) {
                                self.scrollendtrapped = true;
                                self.bind(self.doc, cap.transitionend, self.onScrollEnd, false);
                            }
                        } else {
                            if (self.scrollendtrapped) clearTimeout(self.scrollendtrapped);
                            self.scrollendtrapped = setTimeout(self.onScrollEnd, ms);
                        }
                        var py = top;
                        var px = lft;
                        self.timerscroll = {
                            bz: new BezierClass(py, self.newscrolly, ms, 0, 0, 0.58, 1),
                            bh: new BezierClass(px, self.newscrollx, ms, 0, 0, 0.58, 1)
                        };
                        if (!self.cursorfreezed) self.timerscroll.tm = setInterval(function() {
                            self.showCursor(self.getScrollTop(), self.getScrollLeft())
                        }, 60);
                    }
                    self.synched("doScroll-set", function() {
                        self.timer = 0;
                        if (self.scrollendtrapped) self.scrollrunning = true;
                        self.setScrollTop(self.newscrolly);
                        self.setScrollLeft(self.newscrollx);
                        if (!self.scrollendtrapped) self.onScrollEnd();
                    });
                }, 50);
            };
            this.cancelScroll = function() {
                if (!self.scrollendtrapped) return true;
                var py = self.getScrollTop();
                var px = self.getScrollLeft();
                self.scrollrunning = false;
                if (!cap.transitionend) clearTimeout(cap.transitionend);
                self.scrollendtrapped = false;
                self._unbind(self.doc, cap.transitionend, self.onScrollEnd);
                self.prepareTransition(0);
                self.setScrollTop(py);
                if (self.railh) self.setScrollLeft(px);
                if (self.timerscroll && self.timerscroll.tm) clearInterval(self.timerscroll.tm);
                self.timerscroll = false;
                self.cursorfreezed = false;
                self.showCursor(py, px);
                return self;
            };
            this.onScrollEnd = function() {
                if (self.scrollendtrapped) self._unbind(self.doc, cap.transitionend, self.onScrollEnd);
                self.scrollendtrapped = false;
                self.prepareTransition(0);
                if (self.timerscroll && self.timerscroll.tm) clearInterval(self.timerscroll.tm);
                self.timerscroll = false;
                var py = self.getScrollTop();
                var px = self.getScrollLeft();
                self.setScrollTop(py);
                if (self.railh) self.setScrollLeft(px);
                self.noticeCursor(false, py, px);
                self.cursorfreezed = false;
                if (py < 0) py = 0
                else if (py > self.page.maxh) py = self.page.maxh;
                if (px < 0) px = 0
                else if (px > self.page.maxw) px = self.page.maxw;
                if ((py != self.newscrolly) || (px != self.newscrollx)) return self.doScrollPos(px, py, self.opt.snapbackspeed);
                if (self.onscrollend && self.scrollrunning) {
                    var info = {
                        "type": "scrollend",
                        "current": {
                            "x": px,
                            "y": py
                        },
                        "end": {
                            "x": self.newscrollx,
                            "y": self.newscrolly
                        }
                    };
                    self.onscrollend.call(self, info);
                }
                self.scrollrunning = false;
            };
        } else {
            this.doScrollLeft = function(x, spd) {
                var y = (self.scrollrunning) ? self.newscrolly : self.getScrollTop();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollTop = function(y, spd) {
                var x = (self.scrollrunning) ? self.newscrollx : self.getScrollLeft();
                self.doScrollPos(x, y, spd);
            }
            this.doScrollPos = function(x, y, spd) {
                var y = ((typeof y == "undefined") || (y === false)) ? self.getScrollTop(true) : y;
                if ((self.timer) && (self.newscrolly == y) && (self.newscrollx == x)) return true;
                if (self.timer) clearAnimationFrame(self.timer);
                self.timer = 0;
                var py = self.getScrollTop();
                var px = self.getScrollLeft();
                if (((self.newscrolly - py) * (y - py) < 0) || ((self.newscrollx - px) * (x - px) < 0)) self.cancelScroll();
                self.newscrolly = y;
                self.newscrollx = x;
                if (!self.bouncescroll || !self.rail.visibility) {
                    if (self.newscrolly < 0) {
                        self.newscrolly = 0;
                    } else if (self.newscrolly > self.page.maxh) {
                        self.newscrolly = self.page.maxh;
                    }
                }
                if (!self.bouncescroll || !self.railh.visibility) {
                    if (self.newscrollx < 0) {
                        self.newscrollx = 0;
                    } else if (self.newscrollx > self.page.maxw) {
                        self.newscrollx = self.page.maxw;
                    }
                }
                self.dst = {};
                self.dst.x = x - px;
                self.dst.y = y - py;
                self.dst.px = px;
                self.dst.py = py;
                var dst = Math.round(Math.sqrt(Math.pow(self.dst.x, 2) + Math.pow(self.dst.y, 2)));
                self.dst.ax = self.dst.x / dst;
                self.dst.ay = self.dst.y / dst;
                var pa = 0;
                var pe = dst;
                if (self.dst.x == 0) {
                    pa = py;
                    pe = y;
                    self.dst.ay = 1;
                    self.dst.py = 0;
                } else if (self.dst.y == 0) {
                    pa = px;
                    pe = x;
                    self.dst.ax = 1;
                    self.dst.px = 0;
                }
                var ms = self.getTransitionSpeed(dst);
                if (spd && spd <= 1) ms *= spd;
                if (ms > 0) {
                    self.bzscroll = (self.bzscroll) ? self.bzscroll.update(pe, ms) : new BezierClass(pa, pe, ms, 0, 1, 0, 1);
                } else {
                    self.bzscroll = false;
                }
                if (self.timer) return;
                if ((py == self.page.maxh && y >= self.page.maxh) || (px == self.page.maxw && x >= self.page.maxw)) self.checkContentSize();
                var sync = 1;

                function scrolling() {
                    if (self.cancelAnimationFrame) return true;
                    self.scrollrunning = true;
                    sync = 1 - sync;
                    if (sync) return (self.timer = setAnimationFrame(scrolling) || 1);
                    var done = 0;
                    var sc = sy = self.getScrollTop();
                    if (self.dst.ay) {
                        sc = (self.bzscroll) ? self.dst.py + (self.bzscroll.getNow() * self.dst.ay) : self.newscrolly;
                        var dr = sc - sy;
                        if ((dr < 0 && sc < self.newscrolly) || (dr > 0 && sc > self.newscrolly)) sc = self.newscrolly;
                        self.setScrollTop(sc);
                        if (sc == self.newscrolly) done = 1;
                    } else {
                        done = 1;
                    }
                    var scx = sx = self.getScrollLeft();
                    if (self.dst.ax) {
                        scx = (self.bzscroll) ? self.dst.px + (self.bzscroll.getNow() * self.dst.ax) : self.newscrollx;
                        var dr = scx - sx;
                        if ((dr < 0 && scx < self.newscrollx) || (dr > 0 && scx > self.newscrollx)) scx = self.newscrollx;
                        self.setScrollLeft(scx);
                        if (scx == self.newscrollx) done += 1;
                    } else {
                        done += 1;
                    }
                    if (done == 2) {
                        self.timer = 0;
                        self.cursorfreezed = false;
                        self.bzscroll = false;
                        self.scrollrunning = false;
                        if (sc < 0) sc = 0;
                        else if (sc > self.page.maxh) sc = self.page.maxh;
                        if (scx < 0) scx = 0;
                        else if (scx > self.page.maxw) scx = self.page.maxw;
                        if ((scx != self.newscrollx) || (sc != self.newscrolly)) self.doScrollPos(scx, sc);
                        else {
                            if (self.onscrollend) {
                                var info = {
                                    "type": "scrollend",
                                    "current": {
                                        "x": sx,
                                        "y": sy
                                    },
                                    "end": {
                                        "x": self.newscrollx,
                                        "y": self.newscrolly
                                    }
                                };
                                self.onscrollend.call(self, info);
                            }
                        }
                    } else {
                        self.timer = setAnimationFrame(scrolling) || 1;
                    }
                };
                self.cancelAnimationFrame = false;
                self.timer = 1;
                if (self.onscrollstart && !self.scrollrunning) {
                    var info = {
                        "type": "scrollstart",
                        "current": {
                            "x": px,
                            "y": py
                        },
                        "request": {
                            "x": x,
                            "y": y
                        },
                        "end": {
                            "x": self.newscrollx,
                            "y": self.newscrolly
                        },
                        "speed": ms
                    };
                    self.onscrollstart.call(self, info);
                }
                scrolling();
                if ((py == self.page.maxh && y >= py) || (px == self.page.maxw && x >= px)) self.checkContentSize();
                self.noticeCursor();
            };
            this.cancelScroll = function() {
                if (self.timer) clearAnimationFrame(self.timer);
                self.timer = 0;
                self.bzscroll = false;
                self.scrollrunning = false;
                return self;
            };
        }
        this.doScrollBy = function(stp, relative) {
            var ny = 0;
            if (relative) {
                ny = Math.floor((self.scroll.y - stp) * self.scrollratio.y)
            } else {
                var sy = (self.timer) ? self.newscrolly : self.getScrollTop(true);
                ny = sy - stp;
            }
            if (self.bouncescroll) {
                var haf = Math.round(self.view.h / 2);
                if (ny < -haf) ny = -haf
                else if (ny > (self.page.maxh + haf)) ny = (self.page.maxh + haf);
            }
            self.cursorfreezed = false;
            py = self.getScrollTop(true);
            if (ny < 0 && py <= 0) return self.noticeCursor();
            else if (ny > self.page.maxh && py >= self.page.maxh) {
                self.checkContentSize();
                return self.noticeCursor();
            }
            self.doScrollTop(ny);
        };
        this.doScrollLeftBy = function(stp, relative) {
            var nx = 0;
            if (relative) {
                nx = Math.floor((self.scroll.x - stp) * self.scrollratio.x)
            } else {
                var sx = (self.timer) ? self.newscrollx : self.getScrollLeft(true);
                nx = sx - stp;
            }
            if (self.bouncescroll) {
                var haf = Math.round(self.view.w / 2);
                if (nx < -haf) nx = -haf
                else if (nx > (self.page.maxw + haf)) nx = (self.page.maxw + haf);
            }
            self.cursorfreezed = false;
            px = self.getScrollLeft(true);
            if (nx < 0 && px <= 0) return self.noticeCursor();
            else if (nx > self.page.maxw && px >= self.page.maxw) return self.noticeCursor();
            self.doScrollLeft(nx);
        };
        this.doScrollTo = function(pos, relative) {
            var ny = (relative) ? Math.round(pos * self.scrollratio.y) : pos;
            if (ny < 0) ny = 0
            else if (ny > self.page.maxh) ny = self.page.maxh;
            self.cursorfreezed = false;
            self.doScrollTop(pos);
        };
        this.checkContentSize = function() {
            var pg = self.getContentSize();
            if ((pg.h != self.page.h) || (pg.w != self.page.w)) self.resize(false, pg);
        };
        self.onscroll = function(e) {
            if (self.rail.drag) return;
            if (!self.cursorfreezed) {
                self.synched('scroll', function() {
                    self.scroll.y = Math.round(self.getScrollTop() * (1 / self.scrollratio.y));
                    if (self.railh) self.scroll.x = Math.round(self.getScrollLeft() * (1 / self.scrollratio.x));
                    self.noticeCursor();
                });
            }
        };
        self.bind(self.docscroll, "scroll", self.onscroll);
        this.doZoomIn = function(e) {
            if (self.zoomactive) return;
            self.zoomactive = true;
            self.zoomrestore = {
                style: {}
            };
            var lst = ['position', 'top', 'left', 'zIndex', 'backgroundColor', 'marginTop', 'marginBottom', 'marginLeft', 'marginRight'];
            var win = self.win[0].style;
            for (var a in lst) {
                var pp = lst[a];
                self.zoomrestore.style[pp] = (typeof win[pp] != "undefined") ? win[pp] : '';
            }
            self.zoomrestore.style.width = self.win.css('width');
            self.zoomrestore.style.height = self.win.css('height');
            self.zoomrestore.padding = {
                w: self.win.outerWidth() - self.win.width(),
                h: self.win.outerHeight() - self.win.height()
            };
            if (cap.isios4) {
                self.zoomrestore.scrollTop = $(window).scrollTop();
                $(window).scrollTop(0);
            }
            self.win.css({
                "position": (cap.isios4) ? "absolute" : "fixed",
                "top": 0,
                "left": 0,
                "z-index": globalmaxzindex + 100,
                "margin": "0px"
            });
            var bkg = self.win.css("backgroundColor");
            if (bkg == "" || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(bkg)) self.win.css("backgroundColor", "#fff");
            self.rail.css({
                "z-index": globalmaxzindex + 101
            });
            self.zoom.css({
                "z-index": globalmaxzindex + 102
            });
            self.zoom.css('backgroundPosition', '0px -18px');
            self.resizeZoom();
            if (self.onzoomin) self.onzoomin.call(self);
            return self.cancelEvent(e);
        };
        this.doZoomOut = function(e) {
            if (!self.zoomactive) return;
            self.zoomactive = false;
            self.win.css("margin", "");
            self.win.css(self.zoomrestore.style);
            if (cap.isios4) {
                $(window).scrollTop(self.zoomrestore.scrollTop);
            }
            self.rail.css({
                "z-index": self.zindex
            });
            self.zoom.css({
                "z-index": self.zindex
            });
            self.zoomrestore = false;
            self.zoom.css('backgroundPosition', '0px 0px');
            self.onResize();
            if (self.onzoomout) self.onzoomout.call(self);
            return self.cancelEvent(e);
        };
        this.doZoom = function(e) {
            return (self.zoomactive) ? self.doZoomOut(e) : self.doZoomIn(e);
        };
        this.resizeZoom = function() {
            if (!self.zoomactive) return;
            var py = self.getScrollTop();
            self.win.css({
                width: $(window).width() - self.zoomrestore.padding.w + "px",
                height: $(window).height() - self.zoomrestore.padding.h + "px"
            });
            self.onResize();
            self.setScrollTop(Math.min(self.page.maxh, py));
        };
        this.init();
        $.nicescroll.push(this);
    };
    var ScrollMomentumClass2D = function(nc) {
        var self = this;
        this.nc = nc;
        this.lastx = 0;
        this.lasty = 0;
        this.speedx = 0;
        this.speedy = 0;
        this.lasttime = 0;
        this.steptime = 0;
        this.snapx = false;
        this.snapy = false;
        this.demulx = 0;
        this.demuly = 0;
        this.lastscrollx = -1;
        this.lastscrolly = -1;
        this.chkx = 0;
        this.chky = 0;
        this.timer = 0;
        this.time = function() {
            return +new Date();
        };
        this.reset = function(px, py) {
            self.stop();
            var now = self.time();
            self.steptime = 0;
            self.lasttime = now;
            self.speedx = 0;
            self.speedy = 0;
            self.lastx = px;
            self.lasty = py;
            self.lastscrollx = -1;
            self.lastscrolly = -1;
        };
        this.update = function(px, py) {
            var now = self.time();
            self.steptime = now - self.lasttime;
            self.lasttime = now;
            var dy = py - self.lasty;
            var dx = px - self.lastx;
            var sy = self.nc.getScrollTop();
            var sx = self.nc.getScrollLeft();
            var newy = sy + dy;
            var newx = sx + dx;
            self.snapx = (newx < 0) || (newx > self.nc.page.maxw);
            self.snapy = (newy < 0) || (newy > self.nc.page.maxh);
            self.speedx = dx;
            self.speedy = dy;
            self.lastx = px;
            self.lasty = py;
        };
        this.stop = function() {
            self.nc.unsynched("domomentum2d");
            if (self.timer) clearTimeout(self.timer);
            self.timer = 0;
            self.lastscrollx = -1;
            self.lastscrolly = -1;
        };
        this.doSnapy = function(nx, ny) {
            var snap = false;
            if (ny < 0) {
                ny = 0;
                snap = true;
            } else if (ny > self.nc.page.maxh) {
                ny = self.nc.page.maxh;
                snap = true;
            }
            if (nx < 0) {
                nx = 0;
                snap = true;
            } else if (nx > self.nc.page.maxw) {
                nx = self.nc.page.maxw;
                snap = true;
            }
            if (snap) self.nc.doScrollPos(nx, ny, self.nc.opt.snapbackspeed);
        };
        this.doMomentum = function(gp) {
            var t = self.time();
            var l = (gp) ? t + gp : self.lasttime;
            var sl = self.nc.getScrollLeft();
            var st = self.nc.getScrollTop();
            var pageh = self.nc.page.maxh;
            var pagew = self.nc.page.maxw;
            self.speedx = (pagew > 0) ? Math.min(60, self.speedx) : 0;
            self.speedy = (pageh > 0) ? Math.min(60, self.speedy) : 0;
            var chk = l && (t - l) <= 50;
            if ((st < 0) || (st > pageh) || (sl < 0) || (sl > pagew)) chk = false;
            var sy = (self.speedy && chk) ? self.speedy : false;
            var sx = (self.speedx && chk) ? self.speedx : false;
            if (sy || sx) {
                var tm = Math.max(16, self.steptime);
                if (tm > 50) {
                    var xm = tm / 50;
                    self.speedx *= xm;
                    self.speedy *= xm;
                    tm = 50;
                }
                self.demulxy = 0;
                self.lastscrollx = self.nc.getScrollLeft();
                self.chkx = self.lastscrollx;
                self.lastscrolly = self.nc.getScrollTop();
                self.chky = self.lastscrolly;
                var nx = self.lastscrollx;
                var ny = self.lastscrolly;
                var onscroll = function() {
                    var df = ((self.time() - t) > 600) ? 0.04 : 0.02;
                    if (self.speedx) {
                        nx = Math.floor(self.lastscrollx - (self.speedx * (1 - self.demulxy)));
                        self.lastscrollx = nx;
                        if ((nx < 0) || (nx > pagew)) df = 0.10;
                    }
                    if (self.speedy) {
                        ny = Math.floor(self.lastscrolly - (self.speedy * (1 - self.demulxy)));
                        self.lastscrolly = ny;
                        if ((ny < 0) || (ny > pageh)) df = 0.10;
                    }
                    self.demulxy = Math.min(1, self.demulxy + df);
                    self.nc.synched("domomentum2d", function() {
                        if (self.speedx) {
                            var scx = self.nc.getScrollLeft();
                            if (scx != self.chkx) self.stop();
                            self.chkx = nx;
                            self.nc.setScrollLeft(nx);
                        }
                        if (self.speedy) {
                            var scy = self.nc.getScrollTop();
                            if (scy != self.chky) self.stop();
                            self.chky = ny;
                            self.nc.setScrollTop(ny);
                        }
                        if (!self.timer) {
                            self.nc.hideCursor();
                            self.doSnapy(nx, ny);
                        }
                    });
                    if (self.demulxy < 1) {
                        self.timer = setTimeout(onscroll, tm);
                    } else {
                        self.stop();
                        self.nc.hideCursor();
                        self.doSnapy(nx, ny);
                    }
                };
                onscroll();
            } else {
                self.doSnapy(self.nc.getScrollLeft(), self.nc.getScrollTop());
            }
        }
    };
    var _scrollTop = jQuery.fn.scrollTop;
    jQuery.cssHooks["pageYOffset"] = {
        get: function(elem, computed, extra) {
            var nice = $.data(elem, '__nicescroll') || false;
            return (nice && nice.ishwscroll) ? nice.getScrollTop() : _scrollTop.call(elem);
        },
        set: function(elem, value) {
            var nice = $.data(elem, '__nicescroll') || false;
            (nice && nice.ishwscroll) ? nice.setScrollTop(parseInt(value)): _scrollTop.call(elem, value);
            return this;
        }
    };
    jQuery.fn.scrollTop = function(value) {
        if (typeof value == "undefined") {
            var nice = (this[0]) ? $.data(this[0], '__nicescroll') || false : false;
            return (nice && nice.ishwscroll) ? nice.getScrollTop() : _scrollTop.call(this);
        } else {
            return this.each(function() {
                var nice = $.data(this, '__nicescroll') || false;
                (nice && nice.ishwscroll) ? nice.setScrollTop(parseInt(value)): _scrollTop.call($(this), value);
            });
        }
    }
    var _scrollLeft = jQuery.fn.scrollLeft;
    $.cssHooks.pageXOffset = {
        get: function(elem, computed, extra) {
            var nice = $.data(elem, '__nicescroll') || false;
            return (nice && nice.ishwscroll) ? nice.getScrollLeft() : _scrollLeft.call(elem);
        },
        set: function(elem, value) {
            var nice = $.data(elem, '__nicescroll') || false;
            (nice && nice.ishwscroll) ? nice.setScrollLeft(parseInt(value)): _scrollLeft.call(elem, value);
            return this;
        }
    };
    jQuery.fn.scrollLeft = function(value) {
        if (typeof value == "undefined") {
            var nice = (this[0]) ? $.data(this[0], '__nicescroll') || false : false;
            return (nice && nice.ishwscroll) ? nice.getScrollLeft() : _scrollLeft.call(this);
        } else {
            return this.each(function() {
                var nice = $.data(this, '__nicescroll') || false;
                (nice && nice.ishwscroll) ? nice.setScrollLeft(parseInt(value)): _scrollLeft.call($(this), value);
            });
        }
    }
    var NiceScrollArray = function(doms) {
        var self = this;
        this.length = 0;
        this.name = "nicescrollarray";
        this.each = function(fn) {
            for (var a = 0; a < self.length; a++) fn.call(self[a]);
            return self;
        };
        this.push = function(nice) {
            self[self.length] = nice;
            self.length++;
        };
        this.eq = function(idx) {
            return self[idx];
        };
        if (doms) {
            for (a = 0; a < doms.length; a++) {
                var nice = $.data(doms[a], '__nicescroll') || false;
                if (nice) {
                    this[this.length] = nice;
                    this.length++;
                }
            };
        }
        return this;
    };

    function mplex(el, lst, fn) {
        for (var a = 0; a < lst.length; a++) fn(el, lst[a]);
    };
    mplex(NiceScrollArray.prototype, ['show', 'hide', 'toggle', 'onResize', 'resize', 'remove', 'stop', 'doScrollPos'], function(e, n) {
        e[n] = function() {
            var args = arguments;
            return this.each(function() {
                this[n].apply(this, args);
            });
        };
    });
    jQuery.fn.getNiceScroll = function(index) {
        if (typeof index == "undefined") {
            return new NiceScrollArray(this);
        } else {
            var nice = $.data(this[index], '__nicescroll') || false;
            return nice;
        }
    };
    jQuery.extend(jQuery.expr[':'], {
        nicescroll: function(a) {
            return ($.data(a, '__nicescroll')) ? true : false;
        }
    });
    $.fn.niceScroll = function(wrapper, opt) {
        if (typeof opt == "undefined") {
            if ((typeof wrapper == "object") && !("jquery" in wrapper)) {
                opt = wrapper;
                wrapper = false;
            }
        }
        var ret = new NiceScrollArray();
        if (typeof opt == "undefined") opt = {};
        if (wrapper || false) {
            opt.doc = $(wrapper);
            opt.win = $(this);
        }
        var docundef = !("doc" in opt);
        if (!docundef && !("win" in opt)) opt.win = $(this);
        this.each(function() {
            var nice = $(this).data('__nicescroll') || false;
            if (!nice) {
                opt.doc = (docundef) ? $(this) : opt.doc;
                nice = new NiceScrollClass(opt, $(this));
                $(this).data('__nicescroll', nice);
            }
            ret.push(nice);
        });
        return (ret.length == 1) ? ret[0] : ret;
    };
    window.NiceScroll = {
        getjQuery: function() {
            return jQuery
        }
    };
    if (!$.nicescroll) {
        $.nicescroll = new NiceScrollArray();
        $.nicescroll.options = _globaloptions;
    }
})(jQuery);;;
(function($) {
    "use strict";
    var $body = $('body');
    $(document).ready(function() {
        $(".swipebox").swipebox();
    });
    $(window).load(function() {
        $('#portfolio').each(function() {
            var $container = $('.portfolio-filters-content');
            $container.masonry({
                itemSelector: 'article'
            });
            var filterFns = {};
            $('#portfolio .filters li a').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                filterValue = filterFns[filterValue] || filterValue;
                $container.isotope({
                    filter: filterValue
                });
                $('#portfolio .filters li a').each(function() {
                    $(this).removeClass("active");
                });
                $(this).addClass("active");
                return false;
            });
        });
    });
    var dragging = false;
    $body.on('touchmove', function() {
        dragging = true;
    });
    $body.on('touchstart', function() {
        dragging = false;
    });
}(jQuery));
/*!
 * Isotope PACKAGED v2.2.0
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */
(function(t) {
    function e() {}

    function i(t) {
        function i(e) {
            e.prototype.option || (e.prototype.option = function(e) {
                t.isPlainObject(e) && (this.options = t.extend(!0, this.options, e))
            })
        }

        function n(e, i) {
            t.fn[e] = function(n) {
                if ("string" == typeof n) {
                    for (var s = o.call(arguments, 1), a = 0, u = this.length; u > a; a++) {
                        var p = this[a],
                            h = t.data(p, e);
                        if (h)
                            if (t.isFunction(h[n]) && "_" !== n.charAt(0)) {
                                var f = h[n].apply(h, s);
                                if (void 0 !== f) return f
                            } else r("no such method '" + n + "' for " + e + " instance");
                        else r("cannot call methods on " + e + " prior to initialization; " + "attempted to call '" + n + "'")
                    }
                    return this
                }
                return this.each(function() {
                    var o = t.data(this, e);
                    o ? (o.option(n), o._init()) : (o = new i(this, n), t.data(this, e, o))
                })
            }
        }
        if (t) {
            var r = "undefined" == typeof console ? e : function(t) {
                console.error(t)
            };
            return t.bridget = function(t, e) {
                i(e), n(t, e)
            }, t.bridget
        }
    }
    var o = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], i) : "object" == typeof exports ? i(require("jquery")) : i(t.jQuery)
})(window),
function(t) {
    function e(e) {
        var i = t.event;
        return i.target = i.target || i.srcElement || e, i
    }
    var i = document.documentElement,
        o = function() {};
    i.addEventListener ? o = function(t, e, i) {
        t.addEventListener(e, i, !1)
    } : i.attachEvent && (o = function(t, i, o) {
        t[i + o] = o.handleEvent ? function() {
            var i = e(t);
            o.handleEvent.call(o, i)
        } : function() {
            var i = e(t);
            o.call(t, i)
        }, t.attachEvent("on" + i, t[i + o])
    });
    var n = function() {};
    i.removeEventListener ? n = function(t, e, i) {
        t.removeEventListener(e, i, !1)
    } : i.detachEvent && (n = function(t, e, i) {
        t.detachEvent("on" + e, t[e + i]);
        try {
            delete t[e + i]
        } catch (o) {
            t[e + i] = void 0
        }
    });
    var r = {
        bind: o,
        unbind: n
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", r) : "object" == typeof exports ? module.exports = r : t.eventie = r
}(window),
function() {
    function t() {}

    function e(t, e) {
        for (var i = t.length; i--;)
            if (t[i].listener === e) return i;
        return -1
    }

    function i(t) {
        return function() {
            return this[t].apply(this, arguments)
        }
    }
    var o = t.prototype,
        n = this,
        r = n.EventEmitter;
    o.getListeners = function(t) {
        var e, i, o = this._getEvents();
        if (t instanceof RegExp) {
            e = {};
            for (i in o) o.hasOwnProperty(i) && t.test(i) && (e[i] = o[i])
        } else e = o[t] || (o[t] = []);
        return e
    }, o.flattenListeners = function(t) {
        var e, i = [];
        for (e = 0; t.length > e; e += 1) i.push(t[e].listener);
        return i
    }, o.getListenersAsObject = function(t) {
        var e, i = this.getListeners(t);
        return i instanceof Array && (e = {}, e[t] = i), e || i
    }, o.addListener = function(t, i) {
        var o, n = this.getListenersAsObject(t),
            r = "object" == typeof i;
        for (o in n) n.hasOwnProperty(o) && -1 === e(n[o], i) && n[o].push(r ? i : {
            listener: i,
            once: !1
        });
        return this
    }, o.on = i("addListener"), o.addOnceListener = function(t, e) {
        return this.addListener(t, {
            listener: e,
            once: !0
        })
    }, o.once = i("addOnceListener"), o.defineEvent = function(t) {
        return this.getListeners(t), this
    }, o.defineEvents = function(t) {
        for (var e = 0; t.length > e; e += 1) this.defineEvent(t[e]);
        return this
    }, o.removeListener = function(t, i) {
        var o, n, r = this.getListenersAsObject(t);
        for (n in r) r.hasOwnProperty(n) && (o = e(r[n], i), -1 !== o && r[n].splice(o, 1));
        return this
    }, o.off = i("removeListener"), o.addListeners = function(t, e) {
        return this.manipulateListeners(!1, t, e)
    }, o.removeListeners = function(t, e) {
        return this.manipulateListeners(!0, t, e)
    }, o.manipulateListeners = function(t, e, i) {
        var o, n, r = t ? this.removeListener : this.addListener,
            s = t ? this.removeListeners : this.addListeners;
        if ("object" != typeof e || e instanceof RegExp)
            for (o = i.length; o--;) r.call(this, e, i[o]);
        else
            for (o in e) e.hasOwnProperty(o) && (n = e[o]) && ("function" == typeof n ? r.call(this, o, n) : s.call(this, o, n));
        return this
    }, o.removeEvent = function(t) {
        var e, i = typeof t,
            o = this._getEvents();
        if ("string" === i) delete o[t];
        else if (t instanceof RegExp)
            for (e in o) o.hasOwnProperty(e) && t.test(e) && delete o[e];
        else delete this._events;
        return this
    }, o.removeAllListeners = i("removeEvent"), o.emitEvent = function(t, e) {
        var i, o, n, r, s = this.getListenersAsObject(t);
        for (n in s)
            if (s.hasOwnProperty(n))
                for (o = s[n].length; o--;) i = s[n][o], i.once === !0 && this.removeListener(t, i.listener), r = i.listener.apply(this, e || []), r === this._getOnceReturnValue() && this.removeListener(t, i.listener);
        return this
    }, o.trigger = i("emitEvent"), o.emit = function(t) {
        var e = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(t, e)
    }, o.setOnceReturnValue = function(t) {
        return this._onceReturnValue = t, this
    }, o._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, o._getEvents = function() {
        return this._events || (this._events = {})
    }, t.noConflict = function() {
        return n.EventEmitter = r, t
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return t
    }) : "object" == typeof module && module.exports ? module.exports = t : n.EventEmitter = t
}.call(this),
    function(t) {
        function e(t) {
            if (t) {
                if ("string" == typeof o[t]) return t;
                t = t.charAt(0).toUpperCase() + t.slice(1);
                for (var e, n = 0, r = i.length; r > n; n++)
                    if (e = i[n] + t, "string" == typeof o[e]) return e
            }
        }
        var i = "Webkit Moz ms Ms O".split(" "),
            o = document.documentElement.style;
        "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function() {
            return e
        }) : "object" == typeof exports ? module.exports = e : t.getStyleProperty = e
    }(window),
    function(t) {
        function e(t) {
            var e = parseFloat(t),
                i = -1 === t.indexOf("%") && !isNaN(e);
            return i && e
        }

        function i() {}

        function o() {
            for (var t = {
                    width: 0,
                    height: 0,
                    innerWidth: 0,
                    innerHeight: 0,
                    outerWidth: 0,
                    outerHeight: 0
                }, e = 0, i = s.length; i > e; e++) {
                var o = s[e];
                t[o] = 0
            }
            return t
        }

        function n(i) {
            function n() {
                if (!d) {
                    d = !0;
                    var o = t.getComputedStyle;
                    if (p = function() {
                            var t = o ? function(t) {
                                return o(t, null)
                            } : function(t) {
                                return t.currentStyle
                            };
                            return function(e) {
                                var i = t(e);
                                return i || r("Style returned " + i + ". Are you running this code in a hidden iframe on Firefox? " + "See http://bit.ly/getsizebug1"), i
                            }
                        }(), h = i("boxSizing")) {
                        var n = document.createElement("div");
                        n.style.width = "200px", n.style.padding = "1px 2px 3px 4px", n.style.borderStyle = "solid", n.style.borderWidth = "1px 2px 3px 4px", n.style[h] = "border-box";
                        var s = document.body || document.documentElement;
                        s.appendChild(n);
                        var a = p(n);
                        f = 200 === e(a.width), s.removeChild(n)
                    }
                }
            }

            function a(t) {
                if (n(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
                    var i = p(t);
                    if ("none" === i.display) return o();
                    var r = {};
                    r.width = t.offsetWidth, r.height = t.offsetHeight;
                    for (var a = r.isBorderBox = !(!h || !i[h] || "border-box" !== i[h]), d = 0, l = s.length; l > d; d++) {
                        var c = s[d],
                            m = i[c];
                        m = u(t, m);
                        var y = parseFloat(m);
                        r[c] = isNaN(y) ? 0 : y
                    }
                    var g = r.paddingLeft + r.paddingRight,
                        v = r.paddingTop + r.paddingBottom,
                        _ = r.marginLeft + r.marginRight,
                        I = r.marginTop + r.marginBottom,
                        z = r.borderLeftWidth + r.borderRightWidth,
                        L = r.borderTopWidth + r.borderBottomWidth,
                        x = a && f,
                        E = e(i.width);
                    E !== !1 && (r.width = E + (x ? 0 : g + z));
                    var b = e(i.height);
                    return b !== !1 && (r.height = b + (x ? 0 : v + L)), r.innerWidth = r.width - (g + z), r.innerHeight = r.height - (v + L), r.outerWidth = r.width + _, r.outerHeight = r.height + I, r
                }
            }

            function u(e, i) {
                if (t.getComputedStyle || -1 === i.indexOf("%")) return i;
                var o = e.style,
                    n = o.left,
                    r = e.runtimeStyle,
                    s = r && r.left;
                return s && (r.left = e.currentStyle.left), o.left = i, i = o.pixelLeft, o.left = n, s && (r.left = s), i
            }
            var p, h, f, d = !1;
            return a
        }
        var r = "undefined" == typeof console ? i : function(t) {
                console.error(t)
            },
            s = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
        "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], n) : "object" == typeof exports ? module.exports = n(require("desandro-get-style-property")) : t.getSize = n(t.getStyleProperty)
    }(window),
    function(t) {
        function e(t) {
            "function" == typeof t && (e.isReady ? t() : s.push(t))
        }

        function i(t) {
            var i = "readystatechange" === t.type && "complete" !== r.readyState;
            e.isReady || i || o()
        }

        function o() {
            e.isReady = !0;
            for (var t = 0, i = s.length; i > t; t++) {
                var o = s[t];
                o()
            }
        }

        function n(n) {
            return "complete" === r.readyState ? o() : (n.bind(r, "DOMContentLoaded", i), n.bind(r, "readystatechange", i), n.bind(t, "load", i)), e
        }
        var r = t.document,
            s = [];
        e.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], n) : "object" == typeof exports ? module.exports = n(require("eventie")) : t.docReady = n(t.eventie)
    }(window),
    function(t) {
        function e(t, e) {
            return t[s](e)
        }

        function i(t) {
            if (!t.parentNode) {
                var e = document.createDocumentFragment();
                e.appendChild(t)
            }
        }

        function o(t, e) {
            i(t);
            for (var o = t.parentNode.querySelectorAll(e), n = 0, r = o.length; r > n; n++)
                if (o[n] === t) return !0;
            return !1
        }

        function n(t, o) {
            return i(t), e(t, o)
        }
        var r, s = function() {
            if (t.matches) return "matches";
            if (t.matchesSelector) return "matchesSelector";
            for (var e = ["webkit", "moz", "ms", "o"], i = 0, o = e.length; o > i; i++) {
                var n = e[i],
                    r = n + "MatchesSelector";
                if (t[r]) return r
            }
        }();
        if (s) {
            var a = document.createElement("div"),
                u = e(a, "div");
            r = u ? e : n
        } else r = o;
        "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function() {
            return r
        }) : "object" == typeof exports ? module.exports = r : window.matchesSelector = r
    }(Element.prototype),
    function(t, e) {
        "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function(i, o) {
            return e(t, i, o)
        }) : "object" == typeof exports ? module.exports = e(t, require("doc-ready"), require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.docReady, t.matchesSelector)
    }(window, function(t, e, i) {
        var o = {};
        o.extend = function(t, e) {
            for (var i in e) t[i] = e[i];
            return t
        }, o.modulo = function(t, e) {
            return (t % e + e) % e
        };
        var n = Object.prototype.toString;
        o.isArray = function(t) {
            return "[object Array]" == n.call(t)
        }, o.makeArray = function(t) {
            var e = [];
            if (o.isArray(t)) e = t;
            else if (t && "number" == typeof t.length)
                for (var i = 0, n = t.length; n > i; i++) e.push(t[i]);
            else e.push(t);
            return e
        }, o.indexOf = Array.prototype.indexOf ? function(t, e) {
            return t.indexOf(e)
        } : function(t, e) {
            for (var i = 0, o = t.length; o > i; i++)
                if (t[i] === e) return i;
            return -1
        }, o.removeFrom = function(t, e) {
            var i = o.indexOf(t, e); - 1 != i && t.splice(i, 1)
        }, o.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function(t) {
            return t instanceof HTMLElement
        } : function(t) {
            return t && "object" == typeof t && 1 == t.nodeType && "string" == typeof t.nodeName
        }, o.setText = function() {
            function t(t, i) {
                e = e || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), t[e] = i
            }
            var e;
            return t
        }(), o.getParent = function(t, e) {
            for (; t != document.body;)
                if (t = t.parentNode, i(t, e)) return t
        }, o.getQueryElement = function(t) {
            return "string" == typeof t ? document.querySelector(t) : t
        }, o.handleEvent = function(t) {
            var e = "on" + t.type;
            this[e] && this[e](t)
        }, o.filterFindElements = function(t, e) {
            t = o.makeArray(t);
            for (var n = [], r = 0, s = t.length; s > r; r++) {
                var a = t[r];
                if (o.isElement(a))
                    if (e) {
                        i(a, e) && n.push(a);
                        for (var u = a.querySelectorAll(e), p = 0, h = u.length; h > p; p++) n.push(u[p])
                    } else n.push(a)
            }
            return n
        }, o.debounceMethod = function(t, e, i) {
            var o = t.prototype[e],
                n = e + "Timeout";
            t.prototype[e] = function() {
                var t = this[n];
                t && clearTimeout(t);
                var e = arguments,
                    r = this;
                this[n] = setTimeout(function() {
                    o.apply(r, e), delete r[n]
                }, i || 100)
            }
        }, o.toDashed = function(t) {
            return t.replace(/(.)([A-Z])/g, function(t, e, i) {
                return e + "-" + i
            }).toLowerCase()
        };
        var r = t.console;
        return o.htmlInit = function(i, n) {
            e(function() {
                for (var e = o.toDashed(n), s = document.querySelectorAll(".js-" + e), a = "data-" + e + "-options", u = 0, p = s.length; p > u; u++) {
                    var h, f = s[u],
                        d = f.getAttribute(a);
                    try {
                        h = d && JSON.parse(d)
                    } catch (l) {
                        r && r.error("Error parsing " + a + " on " + f.nodeName.toLowerCase() + (f.id ? "#" + f.id : "") + ": " + l);
                        continue
                    }
                    var c = new i(f, h),
                        m = t.jQuery;
                    m && m.data(f, n, c)
                }
            })
        }, o
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function(i, o, n, r) {
            return e(t, i, o, n, r)
        }) : "object" == typeof exports ? module.exports = e(t, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (t.Outlayer = {}, t.Outlayer.Item = e(t, t.EventEmitter, t.getSize, t.getStyleProperty, t.fizzyUIUtils))
    }(window, function(t, e, i, o, n) {
        function r(t) {
            for (var e in t) return !1;
            return e = null, !0
        }

        function s(t, e) {
            t && (this.element = t, this.layout = e, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }
        var a = t.getComputedStyle,
            u = a ? function(t) {
                return a(t, null)
            } : function(t) {
                return t.currentStyle
            },
            p = o("transition"),
            h = o("transform"),
            f = p && h,
            d = !!o("perspective"),
            l = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            } [p],
            c = ["transform", "transition", "transitionDuration", "transitionProperty"],
            m = function() {
                for (var t = {}, e = 0, i = c.length; i > e; e++) {
                    var n = c[e],
                        r = o(n);
                    r && r !== n && (t[n] = r)
                }
                return t
            }();
        n.extend(s.prototype, e.prototype), s.prototype._create = function() {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, s.prototype.handleEvent = function(t) {
            var e = "on" + t.type;
            this[e] && this[e](t)
        }, s.prototype.getSize = function() {
            this.size = i(this.element)
        }, s.prototype.css = function(t) {
            var e = this.element.style;
            for (var i in t) {
                var o = m[i] || i;
                e[o] = t[i]
            }
        }, s.prototype.getPosition = function() {
            var t = u(this.element),
                e = this.layout.options,
                i = e.isOriginLeft,
                o = e.isOriginTop,
                n = parseInt(t[i ? "left" : "right"], 10),
                r = parseInt(t[o ? "top" : "bottom"], 10);
            n = isNaN(n) ? 0 : n, r = isNaN(r) ? 0 : r;
            var s = this.layout.size;
            n -= i ? s.paddingLeft : s.paddingRight, r -= o ? s.paddingTop : s.paddingBottom, this.position.x = n, this.position.y = r
        }, s.prototype.layoutPosition = function() {
            var t = this.layout.size,
                e = this.layout.options,
                i = {},
                o = e.isOriginLeft ? "paddingLeft" : "paddingRight",
                n = e.isOriginLeft ? "left" : "right",
                r = e.isOriginLeft ? "right" : "left",
                s = this.position.x + t[o];
            s = e.percentPosition && !e.isHorizontal ? 100 * (s / t.width) + "%" : s + "px", i[n] = s, i[r] = "";
            var a = e.isOriginTop ? "paddingTop" : "paddingBottom",
                u = e.isOriginTop ? "top" : "bottom",
                p = e.isOriginTop ? "bottom" : "top",
                h = this.position.y + t[a];
            h = e.percentPosition && e.isHorizontal ? 100 * (h / t.height) + "%" : h + "px", i[u] = h, i[p] = "", this.css(i), this.emitEvent("layout", [this])
        };
        var y = d ? function(t, e) {
            return "translate3d(" + t + "px, " + e + "px, 0)"
        } : function(t, e) {
            return "translate(" + t + "px, " + e + "px)"
        };
        s.prototype._transitionTo = function(t, e) {
            this.getPosition();
            var i = this.position.x,
                o = this.position.y,
                n = parseInt(t, 10),
                r = parseInt(e, 10),
                s = n === this.position.x && r === this.position.y;
            if (this.setPosition(t, e), s && !this.isTransitioning) return this.layoutPosition(), void 0;
            var a = t - i,
                u = e - o,
                p = {},
                h = this.layout.options;
            a = h.isOriginLeft ? a : -a, u = h.isOriginTop ? u : -u, p.transform = y(a, u), this.transition({
                to: p,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, s.prototype.goTo = function(t, e) {
            this.setPosition(t, e), this.layoutPosition()
        }, s.prototype.moveTo = f ? s.prototype._transitionTo : s.prototype.goTo, s.prototype.setPosition = function(t, e) {
            this.position.x = parseInt(t, 10), this.position.y = parseInt(e, 10)
        }, s.prototype._nonTransition = function(t) {
            this.css(t.to), t.isCleaning && this._removeStyles(t.to);
            for (var e in t.onTransitionEnd) t.onTransitionEnd[e].call(this)
        }, s.prototype._transition = function(t) {
            if (!parseFloat(this.layout.options.transitionDuration)) return this._nonTransition(t), void 0;
            var e = this._transn;
            for (var i in t.onTransitionEnd) e.onEnd[i] = t.onTransitionEnd[i];
            for (i in t.to) e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
            if (t.from) {
                this.css(t.from);
                var o = this.element.offsetHeight;
                o = null
            }
            this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
        };
        var g = h && n.toDashed(h) + ",opacity";
        s.prototype.enableTransition = function() {
            this.isTransitioning || (this.css({
                transitionProperty: g,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(l, this, !1))
        }, s.prototype.transition = s.prototype[p ? "_transition" : "_nonTransition"], s.prototype.onwebkitTransitionEnd = function(t) {
            this.ontransitionend(t)
        }, s.prototype.onotransitionend = function(t) {
            this.ontransitionend(t)
        };
        var v = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        s.prototype.ontransitionend = function(t) {
            if (t.target === this.element) {
                var e = this._transn,
                    i = v[t.propertyName] || t.propertyName;
                if (delete e.ingProperties[i], r(e.ingProperties) && this.disableTransition(), i in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[i]), i in e.onEnd) {
                    var o = e.onEnd[i];
                    o.call(this), delete e.onEnd[i]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, s.prototype.disableTransition = function() {
            this.removeTransitionStyles(), this.element.removeEventListener(l, this, !1), this.isTransitioning = !1
        }, s.prototype._removeStyles = function(t) {
            var e = {};
            for (var i in t) e[i] = "";
            this.css(e)
        };
        var _ = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return s.prototype.removeTransitionStyles = function() {
            this.css(_)
        }, s.prototype.removeElem = function() {
            this.element.parentNode.removeChild(this.element), this.css({
                display: ""
            }), this.emitEvent("remove", [this])
        }, s.prototype.remove = function() {
            if (!p || !parseFloat(this.layout.options.transitionDuration)) return this.removeElem(), void 0;
            var t = this;
            this.once("transitionEnd", function() {
                t.removeElem()
            }), this.hide()
        }, s.prototype.reveal = function() {
            delete this.isHidden, this.css({
                display: ""
            });
            var t = this.layout.options,
                e = {},
                i = this.getHideRevealTransitionEndProperty("visibleStyle");
            e[i] = this.onRevealTransitionEnd, this.transition({
                from: t.hiddenStyle,
                to: t.visibleStyle,
                isCleaning: !0,
                onTransitionEnd: e
            })
        }, s.prototype.onRevealTransitionEnd = function() {
            this.isHidden || this.emitEvent("reveal")
        }, s.prototype.getHideRevealTransitionEndProperty = function(t) {
            var e = this.layout.options[t];
            if (e.opacity) return "opacity";
            for (var i in e) return i
        }, s.prototype.hide = function() {
            this.isHidden = !0, this.css({
                display: ""
            });
            var t = this.layout.options,
                e = {},
                i = this.getHideRevealTransitionEndProperty("hiddenStyle");
            e[i] = this.onHideTransitionEnd, this.transition({
                from: t.visibleStyle,
                to: t.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: e
            })
        }, s.prototype.onHideTransitionEnd = function() {
            this.isHidden && (this.css({
                display: "none"
            }), this.emitEvent("hide"))
        }, s.prototype.destroy = function() {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, s
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(i, o, n, r, s) {
            return e(t, i, o, n, r, s)
        }) : "object" == typeof exports ? module.exports = e(t, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.eventie, t.EventEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
    }(window, function(t, e, i, o, n, r) {
        function s(t, e) {
            var i = n.getQueryElement(t);
            if (!i) return a && a.error("Bad element for " + this.constructor.namespace + ": " + (i || t)), void 0;
            this.element = i, u && (this.$element = u(this.element)), this.options = n.extend({}, this.constructor.defaults), this.option(e);
            var o = ++h;
            this.element.outlayerGUID = o, f[o] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        var a = t.console,
            u = t.jQuery,
            p = function() {},
            h = 0,
            f = {};
        return s.namespace = "outlayer", s.Item = r, s.defaults = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, n.extend(s.prototype, i.prototype), s.prototype.option = function(t) {
            n.extend(this.options, t)
        }, s.prototype._create = function() {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), n.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, s.prototype.reloadItems = function() {
            this.items = this._itemize(this.element.children)
        }, s.prototype._itemize = function(t) {
            for (var e = this._filterFindItemElements(t), i = this.constructor.Item, o = [], n = 0, r = e.length; r > n; n++) {
                var s = e[n],
                    a = new i(s, this);
                o.push(a)
            }
            return o
        }, s.prototype._filterFindItemElements = function(t) {
            return n.filterFindElements(t, this.options.itemSelector)
        }, s.prototype.getItemElements = function() {
            for (var t = [], e = 0, i = this.items.length; i > e; e++) t.push(this.items[e].element);
            return t
        }, s.prototype.layout = function() {
            this._resetLayout(), this._manageStamps();
            var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, t), this._isLayoutInited = !0
        }, s.prototype._init = s.prototype.layout, s.prototype._resetLayout = function() {
            this.getSize()
        }, s.prototype.getSize = function() {
            this.size = o(this.element)
        }, s.prototype._getMeasurement = function(t, e) {
            var i, r = this.options[t];
            r ? ("string" == typeof r ? i = this.element.querySelector(r) : n.isElement(r) && (i = r), this[t] = i ? o(i)[e] : r) : this[t] = 0
        }, s.prototype.layoutItems = function(t, e) {
            t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
        }, s.prototype._getItemsForLayout = function(t) {
            for (var e = [], i = 0, o = t.length; o > i; i++) {
                var n = t[i];
                n.isIgnored || e.push(n)
            }
            return e
        }, s.prototype._layoutItems = function(t, e) {
            if (this._emitCompleteOnItems("layout", t), t && t.length) {
                for (var i = [], o = 0, n = t.length; n > o; o++) {
                    var r = t[o],
                        s = this._getItemLayoutPosition(r);
                    s.item = r, s.isInstant = e || r.isLayoutInstant, i.push(s)
                }
                this._processLayoutQueue(i)
            }
        }, s.prototype._getItemLayoutPosition = function() {
            return {
                x: 0,
                y: 0
            }
        }, s.prototype._processLayoutQueue = function(t) {
            for (var e = 0, i = t.length; i > e; e++) {
                var o = t[e];
                this._positionItem(o.item, o.x, o.y, o.isInstant)
            }
        }, s.prototype._positionItem = function(t, e, i, o) {
            o ? t.goTo(e, i) : t.moveTo(e, i)
        }, s.prototype._postLayout = function() {
            this.resizeContainer()
        }, s.prototype.resizeContainer = function() {
            if (this.options.isResizingContainer) {
                var t = this._getContainerSize();
                t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
            }
        }, s.prototype._getContainerSize = p, s.prototype._setContainerMeasure = function(t, e) {
            if (void 0 !== t) {
                var i = this.size;
                i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
            }
        }, s.prototype._emitCompleteOnItems = function(t, e) {
            function i() {
                n.emitEvent(t + "Complete", [e])
            }

            function o() {
                s++, s === r && i()
            }
            var n = this,
                r = e.length;
            if (!e || !r) return i(), void 0;
            for (var s = 0, a = 0, u = e.length; u > a; a++) {
                var p = e[a];
                p.once(t, o)
            }
        }, s.prototype.ignore = function(t) {
            var e = this.getItem(t);
            e && (e.isIgnored = !0)
        }, s.prototype.unignore = function(t) {
            var e = this.getItem(t);
            e && delete e.isIgnored
        }, s.prototype.stamp = function(t) {
            if (t = this._find(t)) {
                this.stamps = this.stamps.concat(t);
                for (var e = 0, i = t.length; i > e; e++) {
                    var o = t[e];
                    this.ignore(o)
                }
            }
        }, s.prototype.unstamp = function(t) {
            if (t = this._find(t))
                for (var e = 0, i = t.length; i > e; e++) {
                    var o = t[e];
                    n.removeFrom(this.stamps, o), this.unignore(o)
                }
        }, s.prototype._find = function(t) {
            return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = n.makeArray(t)) : void 0
        }, s.prototype._manageStamps = function() {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var t = 0, e = this.stamps.length; e > t; t++) {
                    var i = this.stamps[t];
                    this._manageStamp(i)
                }
            }
        }, s.prototype._getBoundingRect = function() {
            var t = this.element.getBoundingClientRect(),
                e = this.size;
            this._boundingRect = {
                left: t.left + e.paddingLeft + e.borderLeftWidth,
                top: t.top + e.paddingTop + e.borderTopWidth,
                right: t.right - (e.paddingRight + e.borderRightWidth),
                bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
            }
        }, s.prototype._manageStamp = p, s.prototype._getElementOffset = function(t) {
            var e = t.getBoundingClientRect(),
                i = this._boundingRect,
                n = o(t),
                r = {
                    left: e.left - i.left - n.marginLeft,
                    top: e.top - i.top - n.marginTop,
                    right: i.right - e.right - n.marginRight,
                    bottom: i.bottom - e.bottom - n.marginBottom
                };
            return r
        }, s.prototype.handleEvent = function(t) {
            var e = "on" + t.type;
            this[e] && this[e](t)
        }, s.prototype.bindResize = function() {
            this.isResizeBound || (e.bind(t, "resize", this), this.isResizeBound = !0)
        }, s.prototype.unbindResize = function() {
            this.isResizeBound && e.unbind(t, "resize", this), this.isResizeBound = !1
        }, s.prototype.onresize = function() {
            function t() {
                e.resize(), delete e.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var e = this;
            this.resizeTimeout = setTimeout(t, 100)
        }, s.prototype.resize = function() {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
        }, s.prototype.needsResizeLayout = function() {
            var t = o(this.element),
                e = this.size && t;
            return e && t.innerWidth !== this.size.innerWidth
        }, s.prototype.addItems = function(t) {
            var e = this._itemize(t);
            return e.length && (this.items = this.items.concat(e)), e
        }, s.prototype.appended = function(t) {
            var e = this.addItems(t);
            e.length && (this.layoutItems(e, !0), this.reveal(e))
        }, s.prototype.prepended = function(t) {
            var e = this._itemize(t);
            if (e.length) {
                var i = this.items.slice(0);
                this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
            }
        }, s.prototype.reveal = function(t) {
            this._emitCompleteOnItems("reveal", t);
            for (var e = t && t.length, i = 0; e && e > i; i++) {
                var o = t[i];
                o.reveal()
            }
        }, s.prototype.hide = function(t) {
            this._emitCompleteOnItems("hide", t);
            for (var e = t && t.length, i = 0; e && e > i; i++) {
                var o = t[i];
                o.hide()
            }
        }, s.prototype.revealItemElements = function(t) {
            var e = this.getItems(t);
            this.reveal(e)
        }, s.prototype.hideItemElements = function(t) {
            var e = this.getItems(t);
            this.hide(e)
        }, s.prototype.getItem = function(t) {
            for (var e = 0, i = this.items.length; i > e; e++) {
                var o = this.items[e];
                if (o.element === t) return o
            }
        }, s.prototype.getItems = function(t) {
            t = n.makeArray(t);
            for (var e = [], i = 0, o = t.length; o > i; i++) {
                var r = t[i],
                    s = this.getItem(r);
                s && e.push(s)
            }
            return e
        }, s.prototype.remove = function(t) {
            var e = this.getItems(t);
            if (this._emitCompleteOnItems("remove", e), e && e.length)
                for (var i = 0, o = e.length; o > i; i++) {
                    var r = e[i];
                    r.remove(), n.removeFrom(this.items, r)
                }
        }, s.prototype.destroy = function() {
            var t = this.element.style;
            t.height = "", t.position = "", t.width = "";
            for (var e = 0, i = this.items.length; i > e; e++) {
                var o = this.items[e];
                o.destroy()
            }
            this.unbindResize();
            var n = this.element.outlayerGUID;
            delete f[n], delete this.element.outlayerGUID, u && u.removeData(this.element, this.constructor.namespace)
        }, s.data = function(t) {
            t = n.getQueryElement(t);
            var e = t && t.outlayerGUID;
            return e && f[e]
        }, s.create = function(t, e) {
            function i() {
                s.apply(this, arguments)
            }
            return Object.create ? i.prototype = Object.create(s.prototype) : n.extend(i.prototype, s.prototype), i.prototype.constructor = i, i.defaults = n.extend({}, s.defaults), n.extend(i.defaults, e), i.prototype.settings = {}, i.namespace = t, i.data = s.data, i.Item = function() {
                r.apply(this, arguments)
            }, i.Item.prototype = new r, n.htmlInit(i, t), u && u.bridget && u.bridget(t, i), i
        }, s.Item = r, s
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], e) : "object" == typeof exports ? module.exports = e(require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.Item = e(t.Outlayer))
    }(window, function(t) {
        function e() {
            t.Item.apply(this, arguments)
        }
        e.prototype = new t.Item, e.prototype._create = function() {
            this.id = this.layout.itemGUID++, t.Item.prototype._create.call(this), this.sortData = {}
        }, e.prototype.updateSortData = function() {
            if (!this.isIgnored) {
                this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
                var t = this.layout.options.getSortData,
                    e = this.layout._sorters;
                for (var i in t) {
                    var o = e[i];
                    this.sortData[i] = o(this.element, this)
                }
            }
        };
        var i = e.prototype.destroy;
        return e.prototype.destroy = function() {
            i.apply(this, arguments), this.css({
                display: ""
            })
        }, e
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], e) : "object" == typeof exports ? module.exports = e(require("get-size"), require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.LayoutMode = e(t.getSize, t.Outlayer))
    }(window, function(t, e) {
        function i(t) {
            this.isotope = t, t && (this.options = t.options[this.namespace], this.element = t.element, this.items = t.filteredItems, this.size = t.size)
        }
        return function() {
            function t(t) {
                return function() {
                    return e.prototype[t].apply(this.isotope, arguments)
                }
            }
            for (var o = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], n = 0, r = o.length; r > n; n++) {
                var s = o[n];
                i.prototype[s] = t(s)
            }
        }(), i.prototype.needsVerticalResizeLayout = function() {
            var e = t(this.isotope.element),
                i = this.isotope.size && e;
            return i && e.innerHeight != this.isotope.size.innerHeight
        }, i.prototype._getMeasurement = function() {
            this.isotope._getMeasurement.apply(this, arguments)
        }, i.prototype.getColumnWidth = function() {
            this.getSegmentSize("column", "Width")
        }, i.prototype.getRowHeight = function() {
            this.getSegmentSize("row", "Height")
        }, i.prototype.getSegmentSize = function(t, e) {
            var i = t + e,
                o = "outer" + e;
            if (this._getMeasurement(i, o), !this[i]) {
                var n = this.getFirstItemSize();
                this[i] = n && n[o] || this.isotope.size["inner" + e]
            }
        }, i.prototype.getFirstItemSize = function() {
            var e = this.isotope.filteredItems[0];
            return e && e.element && t(e.element)
        }, i.prototype.layout = function() {
            this.isotope.layout.apply(this.isotope, arguments)
        }, i.prototype.getSize = function() {
            this.isotope.getSize(), this.size = this.isotope.size
        }, i.modes = {}, i.create = function(t, e) {
            function o() {
                i.apply(this, arguments)
            }
            return o.prototype = new i, e && (o.options = e), o.prototype.namespace = t, i.modes[t] = o, o
        }, i
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], e) : "object" == typeof exports ? module.exports = e(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : t.Masonry = e(t.Outlayer, t.getSize, t.fizzyUIUtils)
    }(window, function(t, e, i) {
        var o = t.create("masonry");
        return o.prototype._resetLayout = function() {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var t = this.cols;
            for (this.colYs = []; t--;) this.colYs.push(0);
            this.maxY = 0
        }, o.prototype.measureColumns = function() {
            if (this.getContainerWidth(), !this.columnWidth) {
                var t = this.items[0],
                    i = t && t.element;
                this.columnWidth = i && e(i).outerWidth || this.containerWidth
            }
            var o = this.columnWidth += this.gutter,
                n = this.containerWidth + this.gutter,
                r = n / o,
                s = o - n % o,
                a = s && 1 > s ? "round" : "floor";
            r = Math[a](r), this.cols = Math.max(r, 1)
        }, o.prototype.getContainerWidth = function() {
            var t = this.options.isFitWidth ? this.element.parentNode : this.element,
                i = e(t);
            this.containerWidth = i && i.innerWidth
        }, o.prototype._getItemLayoutPosition = function(t) {
            t.getSize();
            var e = t.size.outerWidth % this.columnWidth,
                o = e && 1 > e ? "round" : "ceil",
                n = Math[o](t.size.outerWidth / this.columnWidth);
            n = Math.min(n, this.cols);
            for (var r = this._getColGroup(n), s = Math.min.apply(Math, r), a = i.indexOf(r, s), u = {
                    x: this.columnWidth * a,
                    y: s
                }, p = s + t.size.outerHeight, h = this.cols + 1 - r.length, f = 0; h > f; f++) this.colYs[a + f] = p;
            return u
        }, o.prototype._getColGroup = function(t) {
            if (2 > t) return this.colYs;
            for (var e = [], i = this.cols + 1 - t, o = 0; i > o; o++) {
                var n = this.colYs.slice(o, o + t);
                e[o] = Math.max.apply(Math, n)
            }
            return e
        }, o.prototype._manageStamp = function(t) {
            var i = e(t),
                o = this._getElementOffset(t),
                n = this.options.isOriginLeft ? o.left : o.right,
                r = n + i.outerWidth,
                s = Math.floor(n / this.columnWidth);
            s = Math.max(0, s);
            var a = Math.floor(r / this.columnWidth);
            a -= r % this.columnWidth ? 0 : 1, a = Math.min(this.cols - 1, a);
            for (var u = (this.options.isOriginTop ? o.top : o.bottom) + i.outerHeight, p = s; a >= p; p++) this.colYs[p] = Math.max(u, this.colYs[p])
        }, o.prototype._getContainerSize = function() {
            this.maxY = Math.max.apply(Math, this.colYs);
            var t = {
                height: this.maxY
            };
            return this.options.isFitWidth && (t.width = this._getContainerFitWidth()), t
        }, o.prototype._getContainerFitWidth = function() {
            for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];) t++;
            return (this.cols - t) * this.columnWidth - this.gutter
        }, o.prototype.needsResizeLayout = function() {
            var t = this.containerWidth;
            return this.getContainerWidth(), t !== this.containerWidth
        }, o
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode"), require("masonry-layout")) : e(t.Isotope.LayoutMode, t.Masonry)
    }(window, function(t, e) {
        function i(t, e) {
            for (var i in e) t[i] = e[i];
            return t
        }
        var o = t.create("masonry"),
            n = o.prototype._getElementOffset,
            r = o.prototype.layout,
            s = o.prototype._getMeasurement;
        i(o.prototype, e.prototype), o.prototype._getElementOffset = n, o.prototype.layout = r, o.prototype._getMeasurement = s;
        var a = o.prototype.measureColumns;
        o.prototype.measureColumns = function() {
            this.items = this.isotope.filteredItems, a.call(this)
        };
        var u = o.prototype._manageStamp;
        return o.prototype._manageStamp = function() {
            this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, u.apply(this, arguments)
        }, o
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
    }(window, function(t) {
        var e = t.create("fitRows");
        return e.prototype._resetLayout = function() {
            this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
        }, e.prototype._getItemLayoutPosition = function(t) {
            t.getSize();
            var e = t.size.outerWidth + this.gutter,
                i = this.isotope.size.innerWidth + this.gutter;
            0 !== this.x && e + this.x > i && (this.x = 0, this.y = this.maxY);
            var o = {
                x: this.x,
                y: this.y
            };
            return this.maxY = Math.max(this.maxY, this.y + t.size.outerHeight), this.x += e, o
        }, e.prototype._getContainerSize = function() {
            return {
                height: this.maxY
            }
        }, e
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
    }(window, function(t) {
        var e = t.create("vertical", {
            horizontalAlignment: 0
        });
        return e.prototype._resetLayout = function() {
            this.y = 0
        }, e.prototype._getItemLayoutPosition = function(t) {
            t.getSize();
            var e = (this.isotope.size.innerWidth - t.size.outerWidth) * this.options.horizontalAlignment,
                i = this.y;
            return this.y += t.size.outerHeight, {
                x: e,
                y: i
            }
        }, e.prototype._getContainerSize = function() {
            return {
                height: this.y
            }
        }, e
    }),
    function(t, e) {
        "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], function(i, o, n, r, s, a) {
            return e(t, i, o, n, r, s, a)
        }) : "object" == typeof exports ? module.exports = e(t, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("./item"), require("./layout-mode"), require("./layout-modes/masonry"), require("./layout-modes/fit-rows"), require("./layout-modes/vertical")) : t.Isotope = e(t, t.Outlayer, t.getSize, t.matchesSelector, t.fizzyUIUtils, t.Isotope.Item, t.Isotope.LayoutMode)
    }(window, function(t, e, i, o, n, r, s) {
        function a(t, e) {
            return function(i, o) {
                for (var n = 0, r = t.length; r > n; n++) {
                    var s = t[n],
                        a = i.sortData[s],
                        u = o.sortData[s];
                    if (a > u || u > a) {
                        var p = void 0 !== e[s] ? e[s] : e,
                            h = p ? 1 : -1;
                        return (a > u ? 1 : -1) * h
                    }
                }
                return 0
            }
        }
        var u = t.jQuery,
            p = String.prototype.trim ? function(t) {
                return t.trim()
            } : function(t) {
                return t.replace(/^\s+|\s+$/g, "")
            },
            h = document.documentElement,
            f = h.textContent ? function(t) {
                return t.textContent
            } : function(t) {
                return t.innerText
            },
            d = e.create("isotope", {
                layoutMode: "masonry",
                isJQueryFiltering: !0,
                sortAscending: !0
            });
        d.Item = r, d.LayoutMode = s, d.prototype._create = function() {
            this.itemGUID = 0, this._sorters = {}, this._getSorters(), e.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
            for (var t in s.modes) this._initLayoutMode(t)
        }, d.prototype.reloadItems = function() {
            this.itemGUID = 0, e.prototype.reloadItems.call(this)
        }, d.prototype._itemize = function() {
            for (var t = e.prototype._itemize.apply(this, arguments), i = 0, o = t.length; o > i; i++) {
                var n = t[i];
                n.id = this.itemGUID++
            }
            return this._updateItemsSortData(t), t
        }, d.prototype._initLayoutMode = function(t) {
            var e = s.modes[t],
                i = this.options[t] || {};
            this.options[t] = e.options ? n.extend(e.options, i) : i, this.modes[t] = new e(this)
        }, d.prototype.layout = function() {
            return !this._isLayoutInited && this.options.isInitLayout ? (this.arrange(), void 0) : (this._layout(), void 0)
        }, d.prototype._layout = function() {
            var t = this._getIsInstant();
            this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, t), this._isLayoutInited = !0
        }, d.prototype.arrange = function(t) {
            function e() {
                o.reveal(i.needReveal), o.hide(i.needHide)
            }
            this.option(t), this._getIsInstant();
            var i = this._filter(this.items);
            this.filteredItems = i.matches;
            var o = this;
            this._bindArrangeComplete(), this._isInstant ? this._noTransition(e) : e(), this._sort(), this._layout()
        }, d.prototype._init = d.prototype.arrange, d.prototype._getIsInstant = function() {
            var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            return this._isInstant = t, t
        }, d.prototype._bindArrangeComplete = function() {
            function t() {
                e && i && o && n.emitEvent("arrangeComplete", [n.filteredItems])
            }
            var e, i, o, n = this;
            this.once("layoutComplete", function() {
                e = !0, t()
            }), this.once("hideComplete", function() {
                i = !0, t()
            }), this.once("revealComplete", function() {
                o = !0, t()
            })
        }, d.prototype._filter = function(t) {
            var e = this.options.filter;
            e = e || "*";
            for (var i = [], o = [], n = [], r = this._getFilterTest(e), s = 0, a = t.length; a > s; s++) {
                var u = t[s];
                if (!u.isIgnored) {
                    var p = r(u);
                    p && i.push(u), p && u.isHidden ? o.push(u) : p || u.isHidden || n.push(u)
                }
            }
            return {
                matches: i,
                needReveal: o,
                needHide: n
            }
        }, d.prototype._getFilterTest = function(t) {
            return u && this.options.isJQueryFiltering ? function(e) {
                return u(e.element).is(t)
            } : "function" == typeof t ? function(e) {
                return t(e.element)
            } : function(e) {
                return o(e.element, t)
            }
        }, d.prototype.updateSortData = function(t) {
            var e;
            t ? (t = n.makeArray(t), e = this.getItems(t)) : e = this.items, this._getSorters(), this._updateItemsSortData(e)
        }, d.prototype._getSorters = function() {
            var t = this.options.getSortData;
            for (var e in t) {
                var i = t[e];
                this._sorters[e] = l(i)
            }
        }, d.prototype._updateItemsSortData = function(t) {
            for (var e = t && t.length, i = 0; e && e > i; i++) {
                var o = t[i];
                o.updateSortData()
            }
        };
        var l = function() {
            function t(t) {
                if ("string" != typeof t) return t;
                var i = p(t).split(" "),
                    o = i[0],
                    n = o.match(/^\[(.+)\]$/),
                    r = n && n[1],
                    s = e(r, o),
                    a = d.sortDataParsers[i[1]];
                return t = a ? function(t) {
                    return t && a(s(t))
                } : function(t) {
                    return t && s(t)
                }
            }

            function e(t, e) {
                var i;
                return i = t ? function(e) {
                    return e.getAttribute(t)
                } : function(t) {
                    var i = t.querySelector(e);
                    return i && f(i)
                }
            }
            return t
        }();
        d.sortDataParsers = {
            parseInt: function(t) {
                return parseInt(t, 10)
            },
            parseFloat: function(t) {
                return parseFloat(t)
            }
        }, d.prototype._sort = function() {
            var t = this.options.sortBy;
            if (t) {
                var e = [].concat.apply(t, this.sortHistory),
                    i = a(e, this.options.sortAscending);
                this.filteredItems.sort(i), t != this.sortHistory[0] && this.sortHistory.unshift(t)
            }
        }, d.prototype._mode = function() {
            var t = this.options.layoutMode,
                e = this.modes[t];
            if (!e) throw Error("No layout mode: " + t);
            return e.options = this.options[t], e
        }, d.prototype._resetLayout = function() {
            e.prototype._resetLayout.call(this), this._mode()._resetLayout()
        }, d.prototype._getItemLayoutPosition = function(t) {
            return this._mode()._getItemLayoutPosition(t)
        }, d.prototype._manageStamp = function(t) {
            this._mode()._manageStamp(t)
        }, d.prototype._getContainerSize = function() {
            return this._mode()._getContainerSize()
        }, d.prototype.needsResizeLayout = function() {
            return this._mode().needsResizeLayout()
        }, d.prototype.appended = function(t) {
            var e = this.addItems(t);
            if (e.length) {
                var i = this._filterRevealAdded(e);
                this.filteredItems = this.filteredItems.concat(i)
            }
        }, d.prototype.prepended = function(t) {
            var e = this._itemize(t);
            if (e.length) {
                this._resetLayout(), this._manageStamps();
                var i = this._filterRevealAdded(e);
                this.layoutItems(this.filteredItems), this.filteredItems = i.concat(this.filteredItems), this.items = e.concat(this.items)
            }
        }, d.prototype._filterRevealAdded = function(t) {
            var e = this._filter(t);
            return this.hide(e.needHide), this.reveal(e.matches), this.layoutItems(e.matches, !0), e.matches
        }, d.prototype.insert = function(t) {
            var e = this.addItems(t);
            if (e.length) {
                var i, o, n = e.length;
                for (i = 0; n > i; i++) o = e[i], this.element.appendChild(o.element);
                var r = this._filter(e).matches;
                for (i = 0; n > i; i++) e[i].isLayoutInstant = !0;
                for (this.arrange(), i = 0; n > i; i++) delete e[i].isLayoutInstant;
                this.reveal(r)
            }
        };
        var c = d.prototype.remove;
        return d.prototype.remove = function(t) {
            t = n.makeArray(t);
            var e = this.getItems(t);
            c.call(this, t);
            var i = e && e.length;
            if (i)
                for (var o = 0; i > o; o++) {
                    var r = e[o];
                    n.removeFrom(this.filteredItems, r)
                }
        }, d.prototype.shuffle = function() {
            for (var t = 0, e = this.items.length; e > t; t++) {
                var i = this.items[t];
                i.sortData.random = Math.random()
            }
            this.options.sortBy = "random", this._sort(), this._layout()
        }, d.prototype._noTransition = function(t) {
            var e = this.options.transitionDuration;
            this.options.transitionDuration = 0;
            var i = t.call(this);
            return this.options.transitionDuration = e, i
        }, d.prototype.getFilteredItemElements = function() {
            for (var t = [], e = 0, i = this.filteredItems.length; i > e; e++) t.push(this.filteredItems[e].element);
            return t
        }, d
    });
/*! Swipebox v1.4.1 | Constantin Saguin csag.co | MIT License | github.com/brutaldesign/swipebox */
! function(a, b, c, d) {
    c.swipebox = function(e, f) {
        var g, h, i = {
                useCSS: !0,
                useSVG: !0,
                initialIndexOnArray: 0,
                removeBarsOnMobile: !0,
                hideCloseButtonOnMobile: !1,
                hideBarsDelay: 3e3,
                videoMaxWidth: 1140,
                vimeoColor: "cccccc",
                beforeOpen: null,
                afterOpen: null,
                afterClose: null,
                loopAtEnd: !1,
                autoplayVideos: !1,
                queryStringData: {},
                toggleClassOnLoad: ""
            },
            j = this,
            k = [],
            l = e.selector,
            m = c(l),
            n = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i),
            o = null !== n || b.createTouch !== d || "ontouchstart" in a || "onmsgesturechange" in a || navigator.msMaxTouchPoints,
            p = !!b.createElementNS && !!b.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
            q = a.innerWidth ? a.innerWidth : c(a).width(),
            r = a.innerHeight ? a.innerHeight : c(a).height(),
            s = 0,
            t = '<div id="swipebox-overlay">					<div id="swipebox-container">						<div id="swipebox-slider"></div>						<div id="swipebox-top-bar">							<div id="swipebox-title"></div>						</div>						<div id="swipebox-bottom-bar">							<div id="swipebox-arrows">								<a id="swipebox-prev"></a>								<a id="swipebox-next"></a>							</div>						</div>						<a id="swipebox-close"></a>					</div>			</div>';
        j.settings = {}, c.swipebox.close = function() {
            g.closeSlide()
        }, c.swipebox.extend = function() {
            return g
        }, j.init = function() {
            j.settings = c.extend({}, i, f), c.isArray(e) ? (k = e, g.target = c(a), g.init(j.settings.initialIndexOnArray)) : c(b).on("click", l, function(a) {
                if ("slide current" === a.target.parentNode.className) return !1;
                c.isArray(e) || (g.destroy(), h = c(l), g.actions()), k = [];
                var b, d, f;
                f || (d = "data-rel", f = c(this).attr(d)), f || (d = "rel", f = c(this).attr(d)), h = f && "" !== f && "nofollow" !== f ? m.filter("[" + d + '="' + f + '"]') : c(l), h.each(function() {
                    var a = null,
                        b = null;
                    c(this).attr("title") && (a = c(this).attr("title")), c(this).attr("href") && (b = c(this).attr("href")), k.push({
                        href: b,
                        title: a
                    })
                }), b = h.index(c(this)), a.preventDefault(), a.stopPropagation(), g.target = c(a.target), g.init(b)
            })
        }, g = {
            init: function(a) {
                j.settings.beforeOpen && j.settings.beforeOpen(), this.target.trigger("swipebox-start"), c.swipebox.isOpen = !0, this.build(), this.openSlide(a), this.openMedia(a), this.preloadMedia(a + 1), this.preloadMedia(a - 1), j.settings.afterOpen && j.settings.afterOpen()
            },
            build: function() {
                var a, b = this;
                c("body").append(t), p && j.settings.useSVG === !0 && (a = c("#swipebox-close").css("background-image"), a = a.replace("png", "svg"), c("#swipebox-prev, #swipebox-next, #swipebox-close").css({
                    "background-image": a
                })), n && j.settings.removeBarsOnMobile && c("#swipebox-bottom-bar, #swipebox-top-bar").remove(), c.each(k, function() {
                    c("#swipebox-slider").append('<div class="slide"></div>')
                }), b.setDim(), b.actions(), o && b.gesture(), b.keyboard(), b.animBars(), b.resize()
            },
            setDim: function() {
                var b, d, e = {};
                "onorientationchange" in a ? a.addEventListener("orientationchange", function() {
                    0 === a.orientation ? (b = q, d = r) : (90 === a.orientation || -90 === a.orientation) && (b = r, d = q)
                }, !1) : (b = a.innerWidth ? a.innerWidth : c(a).width(), d = a.innerHeight ? a.innerHeight : c(a).height()), e = {
                    width: b,
                    height: d
                }, c("#swipebox-overlay").css(e)
            },
            resize: function() {
                var b = this;
                c(a).resize(function() {
                    b.setDim()
                }).resize()
            },
            supportTransition: function() {
                var a, c = "transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" ");
                for (a = 0; a < c.length; a++)
                    if (b.createElement("div").style[c[a]] !== d) return c[a];
                return !1
            },
            doCssTrans: function() {
                return j.settings.useCSS && this.supportTransition() ? !0 : void 0
            },
            gesture: function() {
                var a, b, d, e, f, g, h = this,
                    i = !1,
                    j = !1,
                    l = 10,
                    m = 50,
                    n = {},
                    o = {},
                    p = c("#swipebox-top-bar, #swipebox-bottom-bar"),
                    r = c("#swipebox-slider");
                p.addClass("visible-bars"), h.setTimeout(), c("body").bind("touchstart", function(h) {
                    return c(this).addClass("touching"), a = c("#swipebox-slider .slide").index(c("#swipebox-slider .slide.current")), o = h.originalEvent.targetTouches[0], n.pageX = h.originalEvent.targetTouches[0].pageX, n.pageY = h.originalEvent.targetTouches[0].pageY, c("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + s + "%, 0, 0)",
                        transform: "translate3d(" + s + "%, 0, 0)"
                    }), c(".touching").bind("touchmove", function(h) {
                        if (h.preventDefault(), h.stopPropagation(), o = h.originalEvent.targetTouches[0], !j && (f = d, d = o.pageY - n.pageY, Math.abs(d) >= m || i)) {
                            var p = .75 - Math.abs(d) / r.height();
                            r.css({
                                top: d + "px"
                            }), r.css({
                                opacity: p
                            }), i = !0
                        }
                        e = b, b = o.pageX - n.pageX, g = 100 * b / q, !j && !i && Math.abs(b) >= l && (c("#swipebox-slider").css({
                            "-webkit-transition": "",
                            transition: ""
                        }), j = !0), j && (b > 0 ? 0 === a ? c("#swipebox-overlay").addClass("leftSpringTouch") : (c("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), c("#swipebox-slider").css({
                            "-webkit-transform": "translate3d(" + (s + g) + "%, 0, 0)",
                            transform: "translate3d(" + (s + g) + "%, 0, 0)"
                        })) : 0 > b && (k.length === a + 1 ? c("#swipebox-overlay").addClass("rightSpringTouch") : (c("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), c("#swipebox-slider").css({
                            "-webkit-transform": "translate3d(" + (s + g) + "%, 0, 0)",
                            transform: "translate3d(" + (s + g) + "%, 0, 0)"
                        }))))
                    }), !1
                }).bind("touchend", function(a) {
                    if (a.preventDefault(), a.stopPropagation(), c("#swipebox-slider").css({
                            "-webkit-transition": "-webkit-transform 0.4s ease",
                            transition: "transform 0.4s ease"
                        }), d = o.pageY - n.pageY, b = o.pageX - n.pageX, g = 100 * b / q, i)
                        if (i = !1, Math.abs(d) >= 2 * m && Math.abs(d) > Math.abs(f)) {
                            var k = d > 0 ? r.height() : -r.height();
                            r.animate({
                                top: k + "px",
                                opacity: 0
                            }, 300, function() {
                                h.closeSlide()
                            })
                        } else r.animate({
                            top: 0,
                            opacity: 1
                        }, 300);
                    else j ? (j = !1, b >= l && b >= e ? h.getPrev() : -l >= b && e >= b && h.getNext()) : p.hasClass("visible-bars") ? (h.clearTimeout(), h.hideBars()) : (h.showBars(), h.setTimeout());
                    c("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + s + "%, 0, 0)",
                        transform: "translate3d(" + s + "%, 0, 0)"
                    }), c("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), c(".touching").off("touchmove").removeClass("touching")
                })
            },
            setTimeout: function() {
                if (j.settings.hideBarsDelay > 0) {
                    var b = this;
                    b.clearTimeout(), b.timeout = a.setTimeout(function() {
                        b.hideBars()
                    }, j.settings.hideBarsDelay)
                }
            },
            clearTimeout: function() {
                a.clearTimeout(this.timeout), this.timeout = null
            },
            showBars: function() {
                var a = c("#swipebox-top-bar, #swipebox-bottom-bar");
                this.doCssTrans() ? a.addClass("visible-bars") : (c("#swipebox-top-bar").animate({
                    top: 0
                }, 500), c("#swipebox-bottom-bar").animate({
                    bottom: 0
                }, 500), setTimeout(function() {
                    a.addClass("visible-bars")
                }, 1e3))
            },
            hideBars: function() {
                var a = c("#swipebox-top-bar, #swipebox-bottom-bar");
                this.doCssTrans() ? a.removeClass("visible-bars") : (c("#swipebox-top-bar").animate({
                    top: "-50px"
                }, 500), c("#swipebox-bottom-bar").animate({
                    bottom: "-50px"
                }, 500), setTimeout(function() {
                    a.removeClass("visible-bars")
                }, 1e3))
            },
            animBars: function() {
                var a = this,
                    b = c("#swipebox-top-bar, #swipebox-bottom-bar");
                b.addClass("visible-bars"), a.setTimeout(), c("#swipebox-slider").click(function() {
                    b.hasClass("visible-bars") || (a.showBars(), a.setTimeout())
                }), c("#swipebox-bottom-bar").hover(function() {
                    a.showBars(), b.addClass("visible-bars"), a.clearTimeout()
                }, function() {
                    j.settings.hideBarsDelay > 0 && (b.removeClass("visible-bars"), a.setTimeout())
                })
            },
            keyboard: function() {
                var b = this;
                c(a).bind("keyup", function(a) {
                    a.preventDefault(), a.stopPropagation(), 37 === a.keyCode ? b.getPrev() : 39 === a.keyCode ? b.getNext() : 27 === a.keyCode && b.closeSlide()
                })
            },
            actions: function() {
                var a = this,
                    b = "touchend click";
                k.length < 2 ? (c("#swipebox-bottom-bar").hide(), d === k[1] && c("#swipebox-top-bar").hide()) : (c("#swipebox-prev").bind(b, function(b) {
                    b.preventDefault(), b.stopPropagation(), a.getPrev(), a.setTimeout()
                }), c("#swipebox-next").bind(b, function(b) {
                    b.preventDefault(), b.stopPropagation(), a.getNext(), a.setTimeout()
                })), c("#swipebox-close").bind(b, function() {
                    a.closeSlide()
                })
            },
            setSlide: function(a, b) {
                b = b || !1;
                var d = c("#swipebox-slider");
                s = 100 * -a, this.doCssTrans() ? d.css({
                    "-webkit-transform": "translate3d(" + 100 * -a + "%, 0, 0)",
                    transform: "translate3d(" + 100 * -a + "%, 0, 0)"
                }) : d.animate({
                    left: 100 * -a + "%"
                }), c("#swipebox-slider .slide").removeClass("current"), c("#swipebox-slider .slide").eq(a).addClass("current"), this.setTitle(a), b && d.fadeIn(), c("#swipebox-prev, #swipebox-next").removeClass("disabled"), 0 === a ? c("#swipebox-prev").addClass("disabled") : a === k.length - 1 && j.settings.loopAtEnd !== !0 && c("#swipebox-next").addClass("disabled")
            },
            openSlide: function(b) {
                c("html").addClass("swipebox-html"), o ? (c("html").addClass("swipebox-touch"), j.settings.hideCloseButtonOnMobile && c("html").addClass("swipebox-no-close-button")) : c("html").addClass("swipebox-no-touch"), c(a).trigger("resize"), this.setSlide(b, !0)
            },
            preloadMedia: function(a) {
                var b = this,
                    c = null;
                k[a] !== d && (c = k[a].href), b.isVideo(c) ? b.openMedia(a) : setTimeout(function() {
                    b.openMedia(a)
                }, 1e3)
            },
            openMedia: function(a) {
                var b, e, f = this;
                return k[a] !== d && (b = k[a].href), 0 > a || a >= k.length ? !1 : (e = c("#swipebox-slider .slide").eq(a), void(f.isVideo(b) ? e.html(f.getVideo(b)) : (e.addClass("slide-loading"), f.loadMedia(b, function() {
                    e.removeClass("slide-loading"), e.html(this)
                }))))
            },
            setTitle: function(a) {
                var b = null;
                c("#swipebox-title").empty(), k[a] !== d && (b = k[a].title), b ? (c("#swipebox-top-bar").show(), c("#swipebox-title").append(b)) : c("#swipebox-top-bar").hide()
            },
            isVideo: function(a) {
                if (a) {
                    if (a.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || a.match(/vimeo\.com\/([0-9]*)/) || a.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) return !0;
                    if (a.toLowerCase().indexOf("swipeboxvideo=1") >= 0) return !0
                }
            },
            parseUri: function(a, d) {
                var e = b.createElement("a"),
                    f = {};
                return e.href = decodeURIComponent(a), f = JSON.parse('{"' + e.search.toLowerCase().replace("?", "").replace(/&/g, '","').replace(/=/g, '":"') + '"}'), c.isPlainObject(d) && (f = c.extend(f, d, j.settings.queryStringData)), c.map(f, function(a, b) {
                    return a && a > "" ? encodeURIComponent(b) + "=" + encodeURIComponent(a) : void 0
                }).join("&")
            },
            getVideo: function(a) {
                var b = "",
                    c = a.match(/((?:www\.)?youtube\.com|(?:www\.)?youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/),
                    d = a.match(/(?:www\.)?youtu\.be\/([a-zA-Z0-9\-_]+)/),
                    e = a.match(/(?:www\.)?vimeo\.com\/([0-9]*)/),
                    f = "";
                return c || d ? (d && (c = d), f = g.parseUri(a, {
                    autoplay: j.settings.autoplayVideos ? "1" : "0",
                    v: ""
                }), b = '<iframe width="560" height="315" src="//' + c[1] + "/embed/" + c[2] + "?" + f + '" frameborder="0" allowfullscreen></iframe>') : e ? (f = g.parseUri(a, {
                    autoplay: j.settings.autoplayVideos ? "1" : "0",
                    byline: "0",
                    portrait: "0",
                    color: j.settings.vimeoColor
                }), b = '<iframe width="560" height="315"  src="//player.vimeo.com/video/' + e[1] + "?" + f + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>') : b = '<iframe width="560" height="315" src="' + a + '" frameborder="0" allowfullscreen></iframe>', '<div class="swipebox-video-container" style="max-width:' + j.settings.videoMaxWidth + 'px"><div class="swipebox-video">' + b + "</div></div>"
            },
            loadMedia: function(a, b) {
                if (0 === a.trim().indexOf("#")) b.call(c("<div>", {
                    "class": "swipebox-inline-container"
                }).append(c(a).clone().toggleClass(j.settings.toggleClassOnLoad)));
                else if (!this.isVideo(a)) {
                    var d = c("<img>").on("load", function() {
                        b.call(d)
                    });
                    d.attr("src", a)
                }
            },
            getNext: function() {
                var a, b = this,
                    d = c("#swipebox-slider .slide").index(c("#swipebox-slider .slide.current"));
                d + 1 < k.length ? (a = c("#swipebox-slider .slide").eq(d).contents().find("iframe").attr("src"), c("#swipebox-slider .slide").eq(d).contents().find("iframe").attr("src", a), d++, b.setSlide(d), b.preloadMedia(d + 1)) : j.settings.loopAtEnd === !0 ? (a = c("#swipebox-slider .slide").eq(d).contents().find("iframe").attr("src"), c("#swipebox-slider .slide").eq(d).contents().find("iframe").attr("src", a), d = 0, b.preloadMedia(d), b.setSlide(d), b.preloadMedia(d + 1)) : (c("#swipebox-overlay").addClass("rightSpring"), setTimeout(function() {
                    c("#swipebox-overlay").removeClass("rightSpring")
                }, 500))
            },
            getPrev: function() {
                var a, b = c("#swipebox-slider .slide").index(c("#swipebox-slider .slide.current"));
                b > 0 ? (a = c("#swipebox-slider .slide").eq(b).contents().find("iframe").attr("src"), c("#swipebox-slider .slide").eq(b).contents().find("iframe").attr("src", a), b--, this.setSlide(b), this.preloadMedia(b - 1)) : (c("#swipebox-overlay").addClass("leftSpring"), setTimeout(function() {
                    c("#swipebox-overlay").removeClass("leftSpring")
                }, 500))
            },
            closeSlide: function() {
                c("html").removeClass("swipebox-html"), c("html").removeClass("swipebox-touch"), c(a).trigger("resize"), this.destroy()
            },
            destroy: function() {
                c(a).unbind("keyup"), c("body").unbind("touchstart"), c("body").unbind("touchmove"), c("body").unbind("touchend"), c("#swipebox-slider").unbind(), c("#swipebox-overlay").remove(), c.isArray(e) || e.removeData("_swipebox"), this.target && this.target.trigger("swipebox-destroy"), c.swipebox.isOpen = !1, j.settings.afterClose && j.settings.afterClose()
            }
        }, j.init()
    }, c.fn.swipebox = function(a) {
        if (!c.data(this, "_swipebox")) {
            var b = new c.swipebox(this, a);
            this.data("_swipebox", b)
        }
        return this.data("_swipebox")
    }
}(window, document, jQuery);;
(function($, window, google, undefined) {
    'use strict';
    var html_dropdown, html_ullist, Maplace;
    html_dropdown = {
        activateCurrent: function(index) {
            this.html_element.find('select').val(index);
        },
        getHtml: function() {
            var self = this,
                html = '',
                title, a;
            if (this.ln > 1) {
                html += '<select class="dropdown controls ' + this.o.controls_cssclass + '">';
                if (this.ShowOnMenu(this.view_all_key)) {
                    html += '<option value="' + this.view_all_key + '">' + this.o.view_all_text + '</option>';
                }
                for (a = 0; a < this.ln; a += 1) {
                    if (this.ShowOnMenu(a)) {
                        html += '<option value="' + (a + 1) + '">' + (this.o.locations[a].title || ('#' + (a + 1))) + '</option>';
                    }
                }
                html += '</select>';
                html = $(html).bind('change', function() {
                    self.ViewOnMap(this.value);
                });
            }
            title = this.o.controls_title;
            if (this.o.controls_title) {
                title = $('<div class="controls_title"></div>').css(this.o.controls_applycss ? {
                    fontWeight: 'bold',
                    fontSize: this.o.controls_on_map ? '12px' : 'inherit',
                    padding: '3px 10px 5px 0'
                } : {}).append(this.o.controls_title);
            }
            this.html_element = $('<div class="wrap_controls"></div>').append(title).append(html);
            return this.html_element;
        }
    };
    html_ullist = {
        html_a: function(i, hash, ttl) {
            var self = this,
                index = hash || (i + 1),
                title = ttl || this.o.locations[i].title,
                el_a = $('<a data-load="' + index + '" id="ullist_a_' + index + '" href="#' + index + '" title="' + title + '"><span>' + (title || ('#' + (i + 1))) + '</span></a>');
            el_a.css(this.o.controls_applycss ? {
                color: '#666',
                display: 'block',
                padding: '5px',
                fontSize: this.o.controls_on_map ? '12px' : 'inherit',
                textDecoration: 'none'
            } : {});
            el_a.on('click', function(e) {
                e.preventDefault();
                var i = $(this).attr('data-load');
                self.ViewOnMap(i);
            });
            return el_a;
        },
        activateCurrent: function(index) {
            this.html_element.find('li').removeClass('active');
            this.html_element.find('#ullist_a_' + index).parent().addClass('active');
        },
        getHtml: function() {
            var html = $("<ul class='ullist controls " + this.o.controls_cssclass + "'></ul>").css(this.o.controls_applycss ? {
                    margin: 0,
                    padding: 0,
                    listStyleType: 'none'
                } : {}),
                title, a;
            if (this.ShowOnMenu(this.view_all_key)) {
                html.append($('<li></li>').append(html_ullist.html_a.call(this, false, this.view_all_key, this.o.view_all_text)));
            }
            for (a = 0; a < this.ln; a++) {
                if (this.ShowOnMenu(a)) {
                    html.append($('<li></li>').append(html_ullist.html_a.call(this, a)));
                }
            }
            title = this.o.controls_title;
            if (this.o.controls_title) {
                title = $('<div class="controls_title"></div>').css(this.o.controls_applycss ? {
                    fontWeight: 'bold',
                    padding: '3px 10px 5px 0',
                    fontSize: this.o.controls_on_map ? '12px' : 'inherit'
                } : {}).append(this.o.controls_title);
            }
            this.html_element = $('<div class="wrap_controls"></div>').append(title).append(html);
            return this.html_element;
        }
    };
    Maplace = (function() {
        function Maplace(args) {
            this.VERSION = '0.1.33';
            this.loaded = false;
            this.markers = [];
            this.circles = [];
            this.oMap = false;
            this.view_all_key = 'all';
            this.infowindow = null;
            this.maxZIndex = 0;
            this.ln = 0;
            this.oMap = false;
            this.oBounds = null;
            this.map_div = null;
            this.canvas_map = null;
            this.controls_wrapper = null;
            this.current_control = null;
            this.current_index = null;
            this.Polyline = null;
            this.Polygon = null;
            this.Fusion = null;
            this.directionsService = null;
            this.directionsDisplay = null;
            this.o = {
                debug: false,
                map_div: '#gmap',
                controls_div: '#controls',
                generate_controls: true,
                controls_type: 'dropdown',
                controls_cssclass: '',
                controls_title: '',
                controls_on_map: true,
                controls_applycss: true,
                controls_position: google.maps.ControlPosition.RIGHT_TOP,
                type: 'marker',
                view_all: true,
                view_all_text: 'View All',
                pan_on_click: true,
                start: 0,
                locations: [],
                shared: {},
                map_options: {
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                },
                stroke_options: {
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#0000FF',
                    fillOpacity: 0.4
                },
                directions_options: {
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    optimizeWaypoints: false,
                    provideRouteAlternatives: false,
                    avoidHighways: false,
                    avoidTolls: false
                },
                circle_options: {
                    radius: 100,
                    visible: true
                },
                styles: {},
                fusion_options: {},
                directions_panel: null,
                draggable: false,
                editable: false,
                show_infowindows: true,
                show_markers: true,
                infowindow_type: 'bubble',
                listeners: {},
                beforeViewAll: function() {},
                afterViewAll: function() {},
                beforeShow: function(index, location, marker) {},
                afterShow: function(index, location, marker) {},
                afterCreateMarker: function(index, location, marker) {},
                beforeCloseInfowindow: function(index, location) {},
                afterCloseInfowindow: function(index, location) {},
                beforeOpenInfowindow: function(index, location, marker) {},
                afterOpenInfowindow: function(index, location, marker) {},
                afterRoute: function(distance, status, result) {},
                onPolylineClick: function(obj) {},
                onPolygonClick: function(obj) {},
                circleRadiusChanged: function(index, circle, marker) {},
                circleCenterChanged: function(index, circle, marker) {},
                drag: function(index, location, marker) {},
                dragEnd: function(index, location, marker) {},
                dragStart: function(index, location, marker) {}
            };
            this.AddControl('dropdown', html_dropdown);
            this.AddControl('list', html_ullist);
            if (args && args.type === 'directions') {
                !args.show_markers && (args.show_markers = false);
                !args.show_infowindows && (args.show_infowindows = false);
            }
            $.extend(true, this.o, args);
        }
        Maplace.prototype.controls = {};
        Maplace.prototype.create_objMap = function() {
            var self = this,
                count = 0,
                i;
            for (i in this.o.styles) {
                if (this.o.styles.hasOwnProperty(i)) {
                    if (count === 0) {
                        this.o.map_options.mapTypeControlOptions = {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
                        };
                    }
                    count++;
                    this.o.map_options.mapTypeControlOptions.mapTypeIds.push('map_style_' + count);
                }
            }
            if (!this.loaded) {
                try {
                    this.map_div.css({
                        position: 'relative',
                        overflow: 'hidden'
                    });
                    this.canvas_map = $('<div>').addClass('canvas_map').css({
                        width: '100%',
                        height: '100%'
                    }).appendTo(this.map_div);
                    this.oMap = new google.maps.Map(this.canvas_map.get(0), this.o.map_options);
                } catch (err) {
                    this.debug('create_objMap::' + this.map_div.selector, err.toString());
                }
            } else {
                self.oMap.setOptions(this.o.map_options);
            }
            count = 0;
            for (i in this.o.styles) {
                if (this.o.styles.hasOwnProperty(i)) {
                    count++;
                    this.oMap.mapTypes.set('map_style_' + count, new google.maps.StyledMapType(this.o.styles[i], {
                        name: i
                    }));
                    this.oMap.setMapTypeId('map_style_' + count);
                }
            }
        };
        Maplace.prototype.add_markers_to_objMap = function() {
            var a, point, type = this.o.type || 'marker';
            switch (type) {
                case 'marker':
                    for (a = 0; a < this.ln; a++) {
                        point = this.create_objPoint(a);
                        this.create.marker.call(this, a, point);
                    }
                    break;
                default:
                    this.create[type].apply(this);
                    break;
            }
        };
        Maplace.prototype.create_objPoint = function(index) {
            var point = $.extend({}, this.o.locations[index]),
                visibility = point.visible === undefined ? undefined : point.visible;
            !point.type && (point.type = this.o.type);
            point.map = this.oMap;
            point.position = new google.maps.LatLng(point.lat, point.lon);
            point.zIndex = point.zIndex === undefined ? 10000 : (point.zIndex + 100);
            point.visible = visibility === undefined ? this.o.show_markers : visibility;
            this.o.maxZIndex = point.zIndex > this.maxZIndex ? point.zIndex : this.maxZIndex;
            if (point.image) {
                point.icon = new google.maps.MarkerImage(point.image, new google.maps.Size(point.image_w || 32, point.image_h || 32), new google.maps.Point(0, 0), new google.maps.Point((point.image_w || 32) / 2, (point.image_h || 32) / 2));
            }
            return point;
        };
        Maplace.prototype.create_objCircle = function(point) {
            var def_stroke_opz, def_circle_opz, circle;
            circle = $.extend({}, point);
            def_stroke_opz = $.extend({}, this.o.stroke_options);
            def_circle_opz = $.extend({}, this.o.circle_options);
            $.extend(def_stroke_opz, point.stroke_options || {});
            $.extend(circle, def_stroke_opz);
            $.extend(def_circle_opz, point.circle_options || {});
            $.extend(circle, def_circle_opz);
            circle.center = point.position;
            circle.draggable = false;
            circle.zIndex = point.zIndex > 0 ? point.zIndex - 10 : 1;
            return circle;
        };
        Maplace.prototype.add_markerEv = function(index, point, marker) {
            var self = this;
            google.maps.event.addListener(marker, 'click', function(ev) {
                self.o.beforeShow(index, point, marker);
                if (self.o.show_infowindows && (point.show_infowindow === false ? false : true)) {
                    self.open_infowindow(index, marker, ev);
                }
                if (self.o.pan_on_click && (point.pan_on_click === false ? false : true)) {
                    self.oMap.panTo(point.position);
                    point.zoom && self.oMap.setZoom(point.zoom);
                }
                if (self.current_control && self.o.generate_controls && self.current_control.activateCurrent) {
                    self.current_control.activateCurrent.call(self, index + 1);
                }
                self.current_index = index;
                self.o.afterShow(index, point, marker);
            });
            if (point.draggable) {
                this.add_dragEv(index, point, marker);
            }
        };
        Maplace.prototype.add_circleEv = function(index, circle, marker) {
            var self = this;
            google.maps.event.addListener(marker, 'click', function() {
                self.ViewOnMap(index + 1);
            });
            google.maps.event.addListener(marker, 'center_changed', function() {
                self.o.circleCenterChanged(index, circle, marker);
            });
            google.maps.event.addListener(marker, 'radius_changed', function() {
                self.o.circleRadiusChanged(index, circle, marker);
            });
            if (circle.draggable) {
                this.add_dragEv(index, circle, marker);
            }
        };
        Maplace.prototype.add_dragEv = function(index, obj, marker) {
            var self = this;
            google.maps.event.addListener(marker, 'drag', function(ev) {
                var pos, extraType;
                if (marker.getPosition) {
                    pos = marker.getPosition();
                } else if (marker.getCenter) {
                    pos = marker.getCenter();
                } else {
                    return;
                }
                if (self.circles[index]) {
                    self.circles[index].setCenter(pos);
                }
                if (self.Polyline) {
                    extraType = 'Polyline';
                } else if (self.Polygon) {
                    extraType = 'Polygon';
                }
                if (extraType) {
                    var path = self[extraType].getPath(),
                        pathArray = path.getArray(),
                        arr = [],
                        i = 0;
                    for (; i < pathArray.length; ++i) {
                        arr[i] = index === i ? new google.maps.LatLng(pos.lat(), pos.lng()) : new google.maps.LatLng(pathArray[i].lat(), pathArray[i].lng());
                    }
                    self[extraType].setPath(new google.maps.MVCArray(arr));
                    self.add_polyEv(extraType);
                }
                self.o.drag(index, obj, marker);
            });
            google.maps.event.addListener(marker, 'dragend', function() {
                self.o.dragEnd(index, obj, marker);
            });
            google.maps.event.addListener(marker, 'dragstart', function() {
                self.o.dragStart(index, obj, marker);
            });
            google.maps.event.addListener(marker, 'center_changed', function() {
                if (self.markers[index] && marker.getCenter) {
                    self.markers[index].setPosition(marker.getCenter());
                }
                self.o.drag(index, obj, marker);
            });
        };
        Maplace.prototype.add_polyEv = function(typeName) {
            var self = this;
            google.maps.event.addListener(this[typeName].getPath(), 'set_at', function(index, obj) {
                var item = self[typeName].getPath().getAt(index),
                    newPos = new google.maps.LatLng(item.lat(), item.lng());
                self.markers[index] && self.markers[index].setPosition(newPos);
                self.circles[index] && self.circles[index].setCenter(newPos);
                self.o['on' + typeName + 'Changed'](index, obj, self[typeName].getPath().getArray());
            });
        };
        Maplace.prototype.create = {
            marker: function(index, point, marker) {
                var self = this,
                    circle;
                if (point.type == 'circle' && !marker) {
                    circle = this.create_objCircle(point);
                    if (!point.visible) {
                        circle.draggable = point.draggable;
                    }
                    marker = new google.maps.Circle(circle);
                    this.add_circleEv(index, circle, marker);
                    this.circles[index] = marker;
                }
                point.type = 'marker';
                marker = new google.maps.Marker(point);
                this.add_markerEv(index, point, marker);
                this.oBounds.extend(point.position);
                this.markers[index] = marker;
                this.o.afterCreateMarker(index, point, marker);
                return marker;
            },
            circle: function() {
                var self = this,
                    a, point, circle, marker;
                for (a = 0; a < this.ln; a++) {
                    point = this.create_objPoint(a);
                    if (point.type == 'circle') {
                        circle = this.create_objCircle(point);
                        if (!point.visible) {
                            circle.draggable = point.draggable;
                        }
                        marker = new google.maps.Circle(circle);
                        this.add_circleEv(a, circle, marker);
                        this.circles[a] = marker;
                    }
                    point.type = 'marker';
                    this.create.marker.call(this, a, point, marker);
                }
            },
            polyline: function() {
                var self = this,
                    a, point, stroke = $.extend({}, this.o.stroke_options);
                stroke.path = [];
                stroke.draggable = this.o.draggable;
                stroke.editable = this.o.editable;
                stroke.map = this.oMap;
                stroke.zIndex = this.o.maxZIndex + 100;
                for (a = 0; a < this.ln; a++) {
                    point = this.create_objPoint(a);
                    this.create.marker.call(this, a, point);
                    stroke.path.push(point.position);
                }
                this.Polyline ? this.Polyline.setOptions(stroke) : this.Polyline = new google.maps.Polyline(stroke);
                this.add_polyEv('Polyline');
            },
            polygon: function() {
                var self = this,
                    a, point, stroke = $.extend({}, this.o.stroke_options);
                stroke.path = [];
                stroke.draggable = this.o.draggable;
                stroke.editable = this.o.editable;
                stroke.map = this.oMap;
                stroke.zIndex = this.o.maxZIndex + 100;
                for (a = 0; a < this.ln; a++) {
                    point = this.create_objPoint(a);
                    this.create.marker.call(this, a, point);
                    stroke.path.push(point.position);
                }
                this.Polygon ? this.Polygon.setOptions(stroke) : this.Polygon = new google.maps.Polygon(stroke);
                google.maps.event.addListener(this.Polygon, 'click', function(obj) {
                    self.o.onPolygonClick(obj);
                });
                this.add_polyEv('Polygon');
            },
            fusion: function() {
                this.o.fusion_options.styles = [this.o.stroke_options];
                this.o.fusion_options.map = this.oMap;
                this.Fusion ? this.Fusion.setOptions(this.o.fusion_options) : this.Fusion = new google.maps.FusionTablesLayer(this.o.fusion_options);
            },
            directions: function() {
                var self = this,
                    a, point, stopover, origin, destination, waypoints = [],
                    distance = 0;
                for (a = 0; a < this.ln; a++) {
                    point = this.create_objPoint(a);
                    if (a === 0) {
                        origin = point.position;
                    } else if (a === (this.ln - 1)) {
                        destination = point.position;
                    } else {
                        stopover = this.o.locations[a].stopover === true ? true : false;
                        waypoints.push({
                            location: point.position,
                            stopover: stopover
                        });
                    }
                    this.create.marker.call(this, a, point);
                }
                this.o.directions_options.origin = origin;
                this.o.directions_options.destination = destination;
                this.o.directions_options.waypoints = waypoints;
                this.directionsService || (this.directionsService = new google.maps.DirectionsService());
                this.directionsDisplay ? this.directionsDisplay.setOptions({
                    draggable: this.o.draggable
                }) : this.directionsDisplay = new google.maps.DirectionsRenderer({
                    draggable: this.o.draggable
                });
                this.directionsDisplay.setMap(this.oMap);
                if (this.o.directions_panel) {
                    this.o.directions_panel = $(this.o.directions_panel);
                    this.directionsDisplay.setPanel(this.o.directions_panel.get(0));
                }
                if (this.o.draggable) {
                    google.maps.event.addListener(this.directionsDisplay, 'directions_changed', function() {
                        distance = self.compute_distance(self.directionsDisplay.directions);
                        self.o.afterRoute(distance);
                    });
                }
                this.directionsService.route(this.o.directions_options, function(result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        distance = self.compute_distance(result);
                        self.directionsDisplay.setDirections(result);
                    }
                    self.o.afterRoute(distance, status, result);
                });
            }
        };
        Maplace.prototype.compute_distance = function(result) {
            var total = 0,
                i, myroute = result.routes[0],
                rlen = myroute.legs.length;
            for (i = 0; i < rlen; i++) {
                total += myroute.legs[i].distance.value;
            }
            return total;
        };
        Maplace.prototype.type_to_open = {
            bubble: function(location) {
                this.infowindow = new google.maps.InfoWindow({
                    content: location.html || ''
                });
            }
        };
        Maplace.prototype.open_infowindow = function(index, marker, ev) {
            this.CloseInfoWindow();
            var point = this.o.locations[index],
                type = this.o.infowindow_type;
            if (point.html && this.type_to_open[type]) {
                this.o.beforeOpenInfowindow(index, point, marker);
                this.type_to_open[type].call(this, point);
                this.infowindow.open(this.oMap, marker);
                this.o.afterOpenInfowindow(index, point, marker);
            }
        };
        Maplace.prototype.get_html_controls = function() {
            if (this.controls[this.o.controls_type] && this.controls[this.o.controls_type].getHtml) {
                this.current_control = this.controls[this.o.controls_type];
                return this.current_control.getHtml.apply(this);
            }
            return '';
        };
        Maplace.prototype.generate_controls = function() {
            if (!this.o.controls_on_map) {
                this.controls_wrapper.empty();
                this.controls_wrapper.append(this.get_html_controls());
                return;
            }
            var cntr = $('<div class="on_gmap ' + this.o.controls_type + ' gmap_controls"></div>').css(this.o.controls_applycss ? {
                    margin: '5px'
                } : {}),
                inner = $(this.get_html_controls()).css(this.o.controls_applycss ? {
                    background: '#fff',
                    padding: '5px',
                    border: '1px solid rgb(113,123,135)',
                    boxShadow: 'rgba(0, 0, 0, 0.4) 0px 2px 4px',
                    maxHeight: this.map_div.find('.canvas_map').outerHeight() - 80,
                    minWidth: 100,
                    overflowY: 'auto',
                    overflowX: 'hidden'
                } : {});
            cntr.append(inner);
            this.oMap.controls[this.o.controls_position].push(cntr.get(0));
        };
        Maplace.prototype.init_map = function() {
            var self = this;
            this.Polyline && this.Polyline.setMap(null);
            this.Polygon && this.Polygon.setMap(null);
            this.Fusion && this.Fusion.setMap(null);
            this.directionsDisplay && this.directionsDisplay.setMap(null);
            for (var i = this.markers.length - 1; i >= 0; i -= 1) {
                try {
                    this.markers[i] && this.markers[i].setMap(null);
                } catch (err) {
                    self.debug('init_map::markers::setMap', err.stack);
                }
            }
            this.markers.length = 0;
            this.markers = [];
            for (var i = this.circles.length - 1; i >= 0; i -= 1) {
                try {
                    this.circles[i] && this.circles[i].setMap(null);
                } catch (err) {
                    self.debug('init_map::circles::setMap', err.stack);
                }
            }
            this.circles.length = 0;
            this.circles = [];
            if (this.o.controls_on_map && this.oMap.controls) {
                this.oMap.controls[this.o.controls_position].forEach(function(element, index) {
                    try {
                        self.oMap.controls[this.o.controls_position].removeAt(index);
                    } catch (err) {
                        self.debug('init_map::removeAt', err.stack);
                    }
                });
            }
            this.oBounds = new google.maps.LatLngBounds();
        };
        Maplace.prototype.perform_load = function() {
            if (this.ln === 1) {
                if (this.o.map_options.set_center) {
                    this.oMap.setCenter(new google.maps.LatLng(this.o.map_options.set_center[0], this.o.map_options.set_center[1]));
                } else {
                    this.oMap.fitBounds(this.oBounds);
                    this.ViewOnMap(1);
                }
                this.o.map_options.zoom && this.oMap.setZoom(this.o.map_options.zoom);
            } else if (this.ln === 0) {
                if (this.o.map_options.set_center) {
                    this.oMap.setCenter(new google.maps.LatLng(this.o.map_options.set_center[0], this.o.map_options.set_center[1]));
                } else {
                    this.oMap.fitBounds(this.oBounds);
                }
                this.oMap.setZoom(this.o.map_options.zoom || 1);
            } else {
                this.oMap.fitBounds(this.oBounds);
                if (typeof(this.o.start - 0) === 'number' && this.o.start > 0 && this.o.start <= this.ln) {
                    this.ViewOnMap(this.o.start);
                } else if (this.o.map_options.set_center) {
                    this.oMap.setCenter(new google.maps.LatLng(this.o.map_options.set_center[0], this.o.map_options.set_center[1]));
                } else {
                    this.ViewOnMap(this.view_all_key);
                }
                this.o.map_options.zoom && this.oMap.setZoom(this.o.map_options.zoom);
            }
        };
        Maplace.prototype.debug = function(code, msg) {
            this.o.debug && console.log(code, msg);
            return this;
        };
        Maplace.prototype.AddControl = function(name, func) {
            if (!name || !func) {
                self.debug('AddControl', 'Missing "name" and "func" callback.');
                return false;
            }
            this.controls[name] = func;
            return this;
        };
        Maplace.prototype.CloseInfoWindow = function() {
            if (this.infowindow && (this.current_index || this.current_index === 0)) {
                this.o.beforeCloseInfowindow(this.current_index, this.o.locations[this.current_index]);
                this.infowindow.close();
                this.infowindow = null;
                this.o.afterCloseInfowindow(this.current_index, this.o.locations[this.current_index]);
            }
            return this;
        };
        Maplace.prototype.ShowOnMenu = function(index) {
            if (index === this.view_all_key && this.o.view_all && this.ln > 1) {
                return true;
            }
            index = parseInt(index, 10);
            if (typeof(index - 0) === 'number' && index >= 0 && index < this.ln) {
                var on_menu = this.o.locations[index].on_menu === false ? false : true;
                if (on_menu) {
                    return true;
                }
            }
            return false;
        };
        Maplace.prototype.ViewOnMap = function(index) {
            if (index === this.view_all_key) {
                this.o.beforeViewAll();
                this.current_index = index;
                if (this.o.locations.length > 0 && this.o.generate_controls && this.current_control && this.current_control.activateCurrent) {
                    this.current_control.activateCurrent.apply(this, [index]);
                }
                this.oMap.fitBounds(this.oBounds);
                this.CloseInfoWindow();
                this.o.afterViewAll();
            } else {
                index = parseInt(index, 10);
                if (typeof(index - 0) === 'number' && index > 0 && index <= this.ln) {
                    try {
                        google.maps.event.trigger(this.markers[index - 1], 'click');
                    } catch (err) {
                        this.debug('ViewOnMap::trigger', err.stack);
                    }
                }
            }
            return this;
        };
        Maplace.prototype.SetLocations = function(locs, reload) {
            this.o.locations = locs;
            reload && this.Load();
            return this;
        };
        Maplace.prototype.AddLocations = function(locs, reload) {
            var self = this;
            if ($.isArray(locs)) {
                $.each(locs, function(index, value) {
                    self.o.locations.push(value);
                });
            }
            if ($.isPlainObject(locs)) {
                this.o.locations.push(locs);
            }
            reload && this.Load();
            return this;
        };
        Maplace.prototype.AddLocation = function(location, index, reload) {
            var self = this;
            if ($.isPlainObject(location)) {
                this.o.locations.splice(index, 0, location);
            }
            reload && this.Load();
            return this;
        };
        Maplace.prototype.RemoveLocations = function(locs, reload) {
            var self = this,
                k = 0;
            if ($.isArray(locs)) {
                $.each(locs, function(index, value) {
                    if ((value - k) < self.ln) {
                        self.o.locations.splice(value - k, 1);
                    }
                    k++;
                });
            } else {
                if (locs < this.ln) {
                    this.o.locations.splice(locs, 1);
                }
            }
            reload && this.Load();
            return this;
        };
        Maplace.prototype.Loaded = function() {
            return this.loaded;
        };
        Maplace.prototype._init = function() {
            this.ln = this.o.locations.length;
            for (var i = 0; i < this.ln; i++) {
                var common = $.extend({}, this.o.shared);
                this.o.locations[i] = $.extend(common, this.o.locations[i]);
                if (this.o.locations[i].html) {
                    this.o.locations[i].html = this.o.locations[i].html.replace('%index', i + 1);
                    this.o.locations[i].html = this.o.locations[i].html.replace('%title', (this.o.locations[i].title || ''));
                }
            }
            this.map_div = $(this.o.map_div);
            this.controls_wrapper = $(this.o.controls_div);
            return this;
        };
        Maplace.prototype.Load = function(args) {
            $.extend(true, this.o, args);
            args && args.locations && (this.o.locations = args.locations);
            this._init();
            this.o.visualRefresh === false ? (google.maps.visualRefresh = false) : (google.maps.visualRefresh = true);
            this.init_map();
            this.create_objMap();
            this.add_markers_to_objMap();
            if ((this.ln > 1 && this.o.generate_controls) || this.o.force_generate_controls) {
                this.o.generate_controls = true;
                this.generate_controls();
            } else {
                this.o.generate_controls = false;
            }
            var self = this;
            if (!this.loaded) {
                google.maps.event.addListenerOnce(this.oMap, 'idle', function() {
                    self.perform_load();
                });
                google.maps.event.addListener(this.oMap, 'resize', function() {
                    self.canvas_map.css({
                        width: self.map_div.width(),
                        height: self.map_div.height()
                    });
                });
                var i;
                for (i in this.o.listeners) {
                    var map = this.oMap,
                        myListener = this.o.listeners[i];
                    if (this.o.listeners.hasOwnProperty(i)) {
                        google.maps.event.addListener(this.oMap, i, function(event) {
                            myListener(map, event);
                        });
                    }
                }
            } else {
                this.perform_load();
            }
            this.loaded = true;
            return this;
        };
        return Maplace;
    })();
    if (typeof define == 'function' && define.amd) {
        define(function() {
            return Maplace;
        });
    } else {
        window.Maplace = Maplace;
    }
})(jQuery, this, google);;
(function(factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module !== 'undefined' && module.exports) {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function($) {
    var _previousResizeWidth = -1,
        _updateTimeout = -1;
    var _parse = function(value) {
        return parseFloat(value) || 0;
    };
    var _rows = function(elements) {
        var tolerance = 1,
            $elements = $(elements),
            lastTop = null,
            rows = [];
        $elements.each(function() {
            var $that = $(this),
                top = $that.offset().top - _parse($that.css('margin-top')),
                lastRow = rows.length > 0 ? rows[rows.length - 1] : null;
            if (lastRow === null) {
                rows.push($that);
            } else {
                if (Math.floor(Math.abs(lastTop - top)) <= tolerance) {
                    rows[rows.length - 1] = lastRow.add($that);
                } else {
                    rows.push($that);
                }
            }
            lastTop = top;
        });
        return rows;
    };
    var _parseOptions = function(options) {
        var opts = {
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        };
        if (typeof options === 'object') {
            return $.extend(opts, options);
        }
        if (typeof options === 'boolean') {
            opts.byRow = options;
        } else if (options === 'remove') {
            opts.remove = true;
        }
        return opts;
    };
    var matchHeight = $.fn.matchHeight = function(options) {
        var opts = _parseOptions(options);
        if (opts.remove) {
            var that = this;
            this.css(opts.property, '');
            $.each(matchHeight._groups, function(key, group) {
                group.elements = group.elements.not(that);
            });
            return this;
        }
        if (this.length <= 1 && !opts.target) {
            return this;
        }
        matchHeight._groups.push({
            elements: this,
            options: opts
        });
        matchHeight._apply(this, opts);
        return this;
    };
    matchHeight.version = 'master';
    matchHeight._groups = [];
    matchHeight._throttle = 80;
    matchHeight._maintainScroll = false;
    matchHeight._beforeUpdate = null;
    matchHeight._afterUpdate = null;
    matchHeight._rows = _rows;
    matchHeight._parse = _parse;
    matchHeight._parseOptions = _parseOptions;
    matchHeight._apply = function(elements, options) {
        var opts = _parseOptions(options),
            $elements = $(elements),
            rows = [$elements];
        var scrollTop = $(window).scrollTop(),
            htmlHeight = $('html').outerHeight(true);
        var $hiddenParents = $elements.parents().filter(':hidden');
        $hiddenParents.each(function() {
            var $that = $(this);
            $that.data('style-cache', $that.attr('style'));
        });
        $hiddenParents.css('display', 'block');
        if (opts.byRow && !opts.target) {
            $elements.each(function() {
                var $that = $(this),
                    display = $that.css('display');
                if (display !== 'inline-block' && display !== 'flex' && display !== 'inline-flex') {
                    display = 'block';
                }
                $that.data('style-cache', $that.attr('style'));
                $that.css({
                    'display': display,
                    'padding-top': '0',
                    'padding-bottom': '0',
                    'margin-top': '0',
                    'margin-bottom': '0',
                    'border-top-width': '0',
                    'border-bottom-width': '0',
                    'height': '100px',
                    'overflow': 'hidden'
                });
            });
            rows = _rows($elements);
            $elements.each(function() {
                var $that = $(this);
                $that.attr('style', $that.data('style-cache') || '');
            });
        }
        $.each(rows, function(key, row) {
            var $row = $(row),
                targetHeight = 0;
            if (!opts.target) {
                if (opts.byRow && $row.length <= 1) {
                    $row.css(opts.property, '');
                    return;
                }
                $row.each(function() {
                    var $that = $(this),
                        style = $that.attr('style'),
                        display = $that.css('display');
                    if (display !== 'inline-block' && display !== 'flex' && display !== 'inline-flex') {
                        display = 'block';
                    }
                    var css = {
                        'display': display
                    };
                    css[opts.property] = '';
                    $that.css(css);
                    if ($that.outerHeight(false) > targetHeight) {
                        targetHeight = $that.outerHeight(false);
                    }
                    if (style) {
                        $that.attr('style', style);
                    } else {
                        $that.css('display', '');
                    }
                });
            } else {
                targetHeight = opts.target.outerHeight(false);
            }
            $row.each(function() {
                var $that = $(this),
                    verticalPadding = 0;
                if (opts.target && $that.is(opts.target)) {
                    return;
                }
                if ($that.css('box-sizing') !== 'border-box') {
                    verticalPadding += _parse($that.css('border-top-width')) + _parse($that.css('border-bottom-width'));
                    verticalPadding += _parse($that.css('padding-top')) + _parse($that.css('padding-bottom'));
                }
                $that.css(opts.property, (targetHeight - verticalPadding) + 'px');
            });
        });
        $hiddenParents.each(function() {
            var $that = $(this);
            $that.attr('style', $that.data('style-cache') || null);
        });
        if (matchHeight._maintainScroll) {
            $(window).scrollTop((scrollTop / htmlHeight) * $('html').outerHeight(true));
        }
        return this;
    };
    matchHeight._applyDataApi = function() {
        var groups = {};
        $('[data-match-height], [data-mh]').each(function() {
            var $this = $(this),
                groupId = $this.attr('data-mh') || $this.attr('data-match-height');
            if (groupId in groups) {
                groups[groupId] = groups[groupId].add($this);
            } else {
                groups[groupId] = $this;
            }
        });
        $.each(groups, function() {
            this.matchHeight(true);
        });
    };
    var _update = function(event) {
        if (matchHeight._beforeUpdate) {
            matchHeight._beforeUpdate(event, matchHeight._groups);
        }
        $.each(matchHeight._groups, function() {
            matchHeight._apply(this.elements, this.options);
        });
        if (matchHeight._afterUpdate) {
            matchHeight._afterUpdate(event, matchHeight._groups);
        }
    };
    matchHeight._update = function(throttle, event) {
        if (event && event.type === 'resize') {
            var windowWidth = $(window).width();
            if (windowWidth === _previousResizeWidth) {
                return;
            }
            _previousResizeWidth = windowWidth;
        }
        if (!throttle) {
            _update(event);
        } else if (_updateTimeout === -1) {
            _updateTimeout = setTimeout(function() {
                _update(event);
                _updateTimeout = -1;
            }, matchHeight._throttle);
        }
    };
    $(matchHeight._applyDataApi);
    $(window).bind('load', function(event) {
        matchHeight._update(false, event);
    });
    $(window).bind('resize orientationchange', function(event) {
        matchHeight._update(true, event);
    });
});;
(function($) {
    "use strict";
    $(".blog-post-content").fitVids();
    $(".video-post").fitVids();
    var $body = $('body');
    var dragging = false;
    $body.on('touchmove', function() {
        dragging = true;
    });
    $body.on('touchstart', function() {
        dragging = false;
    });
    $('.has-bg-image').each(function() {
        var $this = $(this),
            image = $this.data('bg-image'),
            color = $this.data('bg-color'),
            opacity = $this.data('bg-opacity'),
            $content = $('<div/>', {
                'class': 'content'
            }),
            $background = $('<div/>', {
                'class': 'background'
            });
        if (opacity) {
            $this.children().wrapAll($content);
            $this.append($background);
            $this.css({
                'background-image': 'url(' + image + ')'
            });
            $background.css({
                'background-color': '#' + color,
                'opacity': opacity
            });
        } else {
            $this.css({
                'background-image': 'url(' + image + ')',
                'background-color': '#' + color
            });
        }
    });
    if ($.fn.superfish) {
        $('.sf-menu').superfish();
    } else {
        console.warn('not loaded -> superfish.min.js and hoverIntent.js');
    }
    $('.mobileMenu' + '.mobile-sidebar-toggle').on('click', function() {
        $body.toggleClass('mobile-sidebar-active');
        return false;
    });
    $('.mobile-sidebar-open').on('click', function() {
        $body.addClass('mobile-sidebar-active');
        return false;
    });
    $('.mobile-sidebar-close').on('click', function() {
        $body.removeClass('mobile-sidebar-active');
        return false;
    });
    if ($.fn.uouTabs) {
        $('.uou-tabs').uouTabs();
    } else {
        console.warn('not loaded -> uou-tabs.js');
    }
    if ($.fn.uouAccordions) {
        $('.uou-accordions').uouAccordions();
    } else {
        console.warn('not loaded -> uou-accordions.js');
    }
    $('.alert').each(function() {
        var $this = $(this);
        if ($this.hasClass('alert-dismissible')) {
            $this.children('.close').on('click', function(event) {
                event.preventDefault();
                $this.remove();
            });
        }
    });
    if ($.fn.flexslider) {
        $('.default-slider').flexslider({
            slideshowSpeed: 10000,
            animationSpeed: 1000,
            prevText: '',
            nextText: ''
        });
    } else {
        console.warn('not loaded -> jquery.flexslider-min.js');
    }
    if ($.fn.rangeslider) {
        $('input[type="range"]').rangeslider({
            polyfill: false,
            onInit: function() {
                this.$range.wrap('<div class="uou-rangeslider"></div>').parent().append('<div class="tooltip">' + this.$element.data('unit-before') + '<span></span>' + this.$element.data('unit-after') + '</div>');
            },
            onSlide: function(value, position) {
                var $span = this.$range.parent().find('.tooltip span');
                $span.html(position);
            }
        });
    } else {
        console.warn('not loaded -> rangeslider.min.js');
    }

    function selectPlaceholder(el) {
        var $el = $(el);
        if ($el.val() === 'placeholder') {
            $el.addClass('placeholder');
        } else {
            $el.removeClass('placeholder');
        }
    }
    $('select').each(function() {
        selectPlaceholder(this);
    }).change(function() {
        selectPlaceholder(this);
    });
    var $block = $(this);
    $block.find('.uou-block-1a' + '.search').each(function() {
        var $this = $(this);
        $this.find('.toggle').on('click', function(event) {
            event.preventDefault();
            $this.addClass('active');
            setTimeout(function() {
                $this.find('.search-input').focus();
            }, 100);
        });
        $this.find('input[type="text"]').on('blur', function() {
            $this.removeClass('active');
        });
    });
    $block.find('.uou-block-1a' + '.language').each(function() {
        var $this = $(this);
        $this.find('.toggle').on('click', function(event) {
            event.preventDefault();
            if (!$this.hasClass('active')) {
                $this.addClass('active');
            } else {
                $this.removeClass('active');
            }
        });
    });
    var $block = $(this);
    $block.find('.language').each(function() {
        var $this = $(this);
        $this.find('.toggle').on('click', function(event) {
            event.preventDefault();
            if (!$this.hasClass('active')) {
                $this.addClass('active');
            } else {
                $this.removeClass('active');
            }
        });
    });
    var $block = $(this);
    $block.find('.uou-block-1e' + '.language').each(function() {
        var $this = $(this);
        $this.find('.toggle').on('click', function(event) {
            event.preventDefault();
            if (!$this.hasClass('active')) {
                $this.addClass('active');
            } else {
                $this.removeClass('active');
            }
        });
    });
    $('.uou-block-5b').each(function() {
        var $block = $(this),
            $tabs = $block.find('.tabs > li');
        $tabs.on('click', function() {
            var $this = $(this),
                target = $this.data('target');
            if (!$this.hasClass('active')) {
                $block.find('.' + target).addClass('active').siblings('blockquote').removeClass('active');
                $tabs.removeClass('active');
                $this.addClass('active');
                return false;
            }
        });
    });
    $('.uou-block-5c').each(function() {
        var $block = $(this);
        if ($.fn.flexslider) {
            $block.find('.flexslider').flexslider({
                slideshowSpeed: 10000,
                animationSpeed: 1000,
                prevText: '',
                nextText: '',
                controlNav: false,
                smoothHeight: true
            });
        } else {
            console.warn('not loaded -> jquery.flexslider-min.js');
        }
    });
    $('.uou-block-7g').each(function() {
        var $block = $(this),
            $badge = $block.find('.badge'),
            badgeColor = $block.data('badge-color');
        if (badgeColor) {
            $badge.css('background-color', '#' + badgeColor);
        }
    });
    $('.uou-block-7h').each(function() {
        var $block = $(this);
        if ($.fn.flexslider) {
            $block.find('.flexslider').flexslider({
                slideshowSpeed: 10000,
                animationSpeed: 1000,
                prevText: '',
                nextText: '',
                directionNav: false,
                smoothHeight: true
            });
        } else {
            console.warn('not loaded -> jquery.flexslider-min.js');
        }
    });
    $('.uou-block-11a').each(function() {
        var $block = $(this);
        $block.find('.main-nav').each(function() {
            var $this = $(this).children('ul');
            $this.find('li').each(function() {
                var $this = $(this);
                if ($this.children('ul').length > 0) {
                    $this.addClass('has-submenu');
                    $this.append('<span class="arrow"></span>');
                }
            });
            var $submenus = $this.find('.has-submenu');
            $submenus.children('.arrow').on('click', function(event) {
                var $this = $(this),
                    $li = $this.parent('li');
                if (!$li.hasClass('active')) {
                    $li.addClass('active');
                    $li.children('ul').slideDown();
                } else {
                    $li.removeClass('active');
                    $li.children('ul').slideUp();
                }
            });
        });
    });
}(jQuery));;
(function($) {
    "use strict";
    var $body = $('body');
    var dragging = false;
    $body.on('touchmove', function() {
        dragging = true;
    });
    $body.on('touchstart', function() {
        dragging = false;
    });
    $('.has-bg-image').each(function() {
        var $this = $(this),
            image = $this.data('bg-image'),
            color = $this.data('bg-color'),
            opacity = $this.data('bg-opacity'),
            $content = $('<div/>', {
                'class': 'content'
            }),
            $background = $('<div/>', {
                'class': 'background'
            });
        if (opacity) {
            $this.children().wrapAll($content);
            $this.append($background);
            $this.css({
                'background-image': 'url(' + image + ')'
            });
            $background.css({
                'background-color': '#' + color,
                'opacity': opacity
            });
        } else {
            $this.css({
                'background-image': 'url(' + image + ')',
                'background-color': '#' + color
            });
        }
    });
    if ($.fn.superfish) {
        $('.sf-menu').superfish();
    } else {
        console.warn('not loaded -> superfish.min.js and hoverIntent.js');
    }
    $('.mobile-sidebar-toggle').on('click', function() {
        $body.toggleClass('mobile-sidebar-active');
        return false;
    });
    $('.mobile-sidebar-open').on('click', function() {
        $body.addClass('mobile-sidebar-active');
        return false;
    });
    $('.mobile-sidebar-close').on('click', function() {
        $body.removeClass('mobile-sidebar-active');
        return false;
    });
    if ($.fn.uouTabs) {
        $('.uou-tabs').uouTabs();
    } else {
        console.warn('not loaded -> uou-tabs.js');
    }
    if ($.fn.uouAccordions) {
        $('.uou-accordions').uouAccordions();
    } else {
        console.warn('not loaded -> uou-accordions.js');
    }
    $('.alert').each(function() {
        var $this = $(this);
        if ($this.hasClass('alert-dismissible')) {
            $this.children('.close').on('click', function(event) {
                event.preventDefault();
                $this.remove();
            });
        }
    });
    if ($.fn.flexslider) {
        $('.default-slider').flexslider({
            slideshowSpeed: 10000,
            animationSpeed: 1000,
            prevText: '',
            nextText: ''
        });
    } else {
        console.warn('not loaded -> jquery.flexslider-min.js');
    }
    if ($.fn.rangeslider) {
        $('input[type="range"]').rangeslider({
            polyfill: false,
            onInit: function() {
                this.$range.wrap('<div class="uou-rangeslider"></div>').parent().append('<div class="tooltip">' + this.$element.data('unit-before') + '<span></span>' + this.$element.data('unit-after') + '</div>');
            },
            onSlide: function(value, position) {
                var $span = this.$range.parent().find('.tooltip span');
                $span.html(position);
            }
        });
    } else {
        console.warn('not loaded -> rangeslider.min.js');
    }

    function selectPlaceholder(el) {
        var $el = $(el);
        if ($el.val() === 'placeholder') {
            $el.addClass('placeholder');
        } else {
            $el.removeClass('placeholder');
        }
    }
    $('select').each(function() {
        selectPlaceholder(this);
    }).change(function() {
        selectPlaceholder(this);
    });
    $('.uou-block-1a').each(function() {
        var $block = $(this);
        $block.find('.search').each(function() {
            var $this = $(this);
            $this.find('.toggle').on('click', function(event) {
                event.preventDefault();
                $this.addClass('active');
                setTimeout(function() {
                    $this.find('.search-input').focus();
                }, 100);
            });
            $this.find('input[type="text"]').on('blur', function() {
                $this.removeClass('active');
            });
        });
        $block.find('.language').each(function() {
            var $this = $(this);
            $this.find('.toggle').on('click', function(event) {
                event.preventDefault();
                if (!$this.hasClass('active')) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });
        });
    });
    $('.uou-block-1b').each(function() {
        var $block = $(this);
        $block.find('.language').each(function() {
            var $this = $(this);
            $this.find('.toggle').on('click', function(event) {
                event.preventDefault();
                if (!$this.hasClass('active')) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });
        });
    });
    $('.uou-block-1e').each(function() {
        var $block = $(this);
        $block.find('.language').each(function() {
            var $this = $(this);
            $this.find('.toggle').on('click', function(event) {
                event.preventDefault();
                if (!$this.hasClass('active')) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });
        });
    });
    $('.uou-block-1f').each(function() {
        var $block = $(this);
        $block.find('.language').each(function() {
            var $this = $(this);
            $this.find('.toggle').on('click', function(event) {
                event.preventDefault();
                if (!$this.hasClass('active')) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });
        });
    });
    $('.uou-block-5b').each(function() {
        var $block = $(this),
            $tabs = $block.find('.tabs > li');
        $tabs.on('click', function() {
            var $this = $(this),
                target = $this.data('target');
            if (!$this.hasClass('active')) {
                $block.find('.' + target).addClass('active').siblings('blockquote').removeClass('active');
                $tabs.removeClass('active');
                $this.addClass('active');
                return false;
            }
        });
    });
    $('.uou-block-5c').each(function() {
        var $block = $(this);
        if ($.fn.flexslider) {
            $block.find('.flexslider').flexslider({
                slideshowSpeed: 10000,
                animationSpeed: 1000,
                prevText: '',
                nextText: '',
                controlNav: false,
                smoothHeight: true
            });
        } else {
            console.warn('not loaded -> jquery.flexslider-min.js');
        }
    });
    $(function() {
        $('.matchHeight').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    });
    $('.uou-block-7g').each(function() {
        var $block = $(this),
            $badge = $block.find('.badge'),
            badgeColor = $block.data('badge-color');
        if (badgeColor) {
            $badge.css('background-color', '#' + badgeColor);
        }
    });
    $('.uou-block-7h').each(function() {
        var $block = $(this);
        if ($.fn.flexslider) {
            $block.find('.flexslider').flexslider({
                slideshowSpeed: 10000,
                animationSpeed: 1000,
                prevText: '',
                nextText: '',
                directionNav: false,
                smoothHeight: true
            });
        } else {
            console.warn('not loaded -> jquery.flexslider-min.js');
        }
    });
    $('.uou-block-11a').each(function() {
        var $block = $(this);
        $block.find('.main-nav').each(function() {
            var $this = $(this).children('ul');
            $this.find('li').each(function() {
                var $this = $(this);
                if ($this.children('ul').length > 0) {
                    $this.addClass('has-submenu');
                    $this.append('<span class="arrow"></span>');
                }
            });
            var $submenus = $this.find('.has-submenu');
            $submenus.children('.arrow').on('click', function(event) {
                var $this = $(this),
                    $li = $this.parent('li');
                if (!$li.hasClass('active')) {
                    $li.addClass('active');
                    $li.children('ul').slideDown();
                } else {
                    $li.removeClass('active');
                    $li.children('ul').slideUp();
                }
            });
        });
    });
}(jQuery));
! function(a, b) {
    "use strict";

    function c() {
        if (!e) {
            e = !0;
            var a, c, d, f, g = -1 !== navigator.appVersion.indexOf("MSIE 10"),
                h = !!navigator.userAgent.match(/Trident.*rv:11\./),
                i = b.querySelectorAll("iframe.wp-embedded-content");
            for (c = 0; c < i.length; c++) {
                if (d = i[c], !d.getAttribute("data-secret")) f = Math.random().toString(36).substr(2, 10), d.src += "#?secret=" + f, d.setAttribute("data-secret", f);
                if (g || h) a = d.cloneNode(!0), a.removeAttribute("security"), d.parentNode.replaceChild(a, d)
            }
        }
    }
    var d = !1,
        e = !1;
    if (b.querySelector)
        if (a.addEventListener) d = !0;
    if (a.wp = a.wp || {}, !a.wp.receiveEmbedMessage)
        if (a.wp.receiveEmbedMessage = function(c) {
                var d = c.data;
                if (d)
                    if (d.secret || d.message || d.value)
                        if (!/[^a-zA-Z0-9]/.test(d.secret)) {
                            var e, f, g, h, i, j = b.querySelectorAll('iframe[data-secret="' + d.secret + '"]'),
                                k = b.querySelectorAll('blockquote[data-secret="' + d.secret + '"]');
                            for (e = 0; e < k.length; e++) k[e].style.display = "none";
                            for (e = 0; e < j.length; e++)
                                if (f = j[e], c.source === f.contentWindow) {
                                    if (f.removeAttribute("style"), "height" === d.message) {
                                        if (g = parseInt(d.value, 10), g > 1e3) g = 1e3;
                                        else if (~~g < 200) g = 200;
                                        f.height = g
                                    }
                                    if ("link" === d.message)
                                        if (h = b.createElement("a"), i = b.createElement("a"), h.href = f.getAttribute("src"), i.href = d.value, i.host === h.host)
                                            if (b.activeElement === f) a.top.location.href = d.value
                                } else;
                        }
            }, d) a.addEventListener("message", a.wp.receiveEmbedMessage, !1), b.addEventListener("DOMContentLoaded", c, !1), a.addEventListener("load", c, !1)
}(window, document);

function MarkerClusterer(map, opt_markers, opt_options) {
    this.extend(MarkerClusterer, google.maps.OverlayView);
    this.map_ = map;
    this.markers_ = [];
    this.clusters_ = [];
    this.sizes = [53, 56, 66, 78, 90];
    this.styles_ = [];
    this.ready_ = false;
    var options = opt_options || {};
    this.gridSize_ = options['gridSize'] || 60;
    this.minClusterSize_ = options['minimumClusterSize'] || 2;
    this.maxZoom_ = options['maxZoom'] || null;
    this.styles_ = options['styles'] || [];
    this.imagePath_ = options['imagePath'] || this.MARKER_CLUSTER_IMAGE_PATH_;
    this.imageExtension_ = options['imageExtension'] || this.MARKER_CLUSTER_IMAGE_EXTENSION_;
    this.zoomOnClick_ = true;
    if (options['zoomOnClick'] != undefined) {
        this.zoomOnClick_ = options['zoomOnClick'];
    }
    this.averageCenter_ = false;
    if (options['averageCenter'] != undefined) {
        this.averageCenter_ = options['averageCenter'];
    }
    this.setupStyles_();
    this.setMap(map);
    this.prevZoom_ = this.map_.getZoom();
    var that = this;
    google.maps.event.addListener(this.map_, 'zoom_changed', function() {
        var zoom = that.map_.getZoom();
        if (that.prevZoom_ != zoom) {
            that.prevZoom_ = zoom;
            that.resetViewport();
        }
    });
    google.maps.event.addListener(this.map_, 'idle', function() {
        that.redraw();
    });
    if (opt_markers && opt_markers.length) {
        this.addMarkers(opt_markers, false);
    }
}
MarkerClusterer.prototype.MARKER_CLUSTER_IMAGE_PATH_ = 'https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m';
MarkerClusterer.prototype.MARKER_CLUSTER_IMAGE_EXTENSION_ = 'png';
MarkerClusterer.prototype.extend = function(obj1, obj2) {
    return (function(object) {
        for (var property in object.prototype) {
            this.prototype[property] = object.prototype[property];
        }
        return this;
    }).apply(obj1, [obj2]);
};
MarkerClusterer.prototype.onAdd = function() {
    this.setReady_(true);
};
MarkerClusterer.prototype.draw = function() {};
MarkerClusterer.prototype.setupStyles_ = function() {
    if (this.styles_.length) {
        return;
    }
    for (var i = 0, size; size = this.sizes[i]; i++) {
        this.styles_.push({
            url: this.imagePath_ + (i + 1) + '.' + this.imageExtension_,
            height: size,
            width: size
        });
    }
};
MarkerClusterer.prototype.fitMapToMarkers = function() {
    var markers = this.getMarkers();
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, marker; marker = markers[i]; i++) {
        bounds.extend(marker.getPosition());
    }
    this.map_.fitBounds(bounds);
};
MarkerClusterer.prototype.setStyles = function(styles) {
    this.styles_ = styles;
};
MarkerClusterer.prototype.getStyles = function() {
    return this.styles_;
};
MarkerClusterer.prototype.isZoomOnClick = function() {
    return this.zoomOnClick_;
};
MarkerClusterer.prototype.isAverageCenter = function() {
    return this.averageCenter_;
};
MarkerClusterer.prototype.getMarkers = function() {
    return this.markers_;
};
MarkerClusterer.prototype.getTotalMarkers = function() {
    return this.markers_.length;
};
MarkerClusterer.prototype.setMaxZoom = function(maxZoom) {
    this.maxZoom_ = maxZoom;
};
MarkerClusterer.prototype.getMaxZoom = function() {
    return this.maxZoom_;
};
MarkerClusterer.prototype.calculator_ = function(markers, numStyles) {
    var index = 0;
    var count = markers.length;
    var dv = count;
    while (dv !== 0) {
        dv = parseInt(dv / 10, 10);
        index++;
    }
    index = Math.min(index, numStyles);
    return {
        text: count,
        index: index
    };
};
MarkerClusterer.prototype.setCalculator = function(calculator) {
    this.calculator_ = calculator;
};
MarkerClusterer.prototype.getCalculator = function() {
    return this.calculator_;
};
MarkerClusterer.prototype.addMarkers = function(markers, opt_nodraw) {
    for (var i = 0, marker; marker = markers[i]; i++) {
        this.pushMarkerTo_(marker);
    }
    if (!opt_nodraw) {
        this.redraw();
    }
};
MarkerClusterer.prototype.pushMarkerTo_ = function(marker) {
    marker.isAdded = false;
    if (marker['draggable']) {
        var that = this;
        google.maps.event.addListener(marker, 'dragend', function() {
            marker.isAdded = false;
            that.repaint();
        });
    }
    this.markers_.push(marker);
};
MarkerClusterer.prototype.addMarker = function(marker, opt_nodraw) {
    this.pushMarkerTo_(marker);
    if (!opt_nodraw) {
        this.redraw();
    }
};
MarkerClusterer.prototype.removeMarker_ = function(marker) {
    var index = -1;
    if (this.markers_.indexOf) {
        index = this.markers_.indexOf(marker);
    } else {
        for (var i = 0, m; m = this.markers_[i]; i++) {
            if (m == marker) {
                index = i;
                break;
            }
        }
    }
    if (index == -1) {
        return false;
    }
    marker.setMap(null);
    this.markers_.splice(index, 1);
    return true;
};
MarkerClusterer.prototype.removeMarker = function(marker, opt_nodraw) {
    var removed = this.removeMarker_(marker);
    if (!opt_nodraw && removed) {
        this.resetViewport();
        this.redraw();
        return true;
    } else {
        return false;
    }
};
MarkerClusterer.prototype.removeMarkers = function(markers, opt_nodraw) {
    var removed = false;
    for (var i = 0, marker; marker = markers[i]; i++) {
        var r = this.removeMarker_(marker);
        removed = removed || r;
    }
    if (!opt_nodraw && removed) {
        this.resetViewport();
        this.redraw();
        return true;
    }
};
MarkerClusterer.prototype.setReady_ = function(ready) {
    if (!this.ready_) {
        this.ready_ = ready;
        this.createClusters_();
    }
};
MarkerClusterer.prototype.getTotalClusters = function() {
    return this.clusters_.length;
};
MarkerClusterer.prototype.getMap = function() {
    return this.map_;
};
MarkerClusterer.prototype.setMap = function(map) {
    this.map_ = map;
};
MarkerClusterer.prototype.getGridSize = function() {
    return this.gridSize_;
};
MarkerClusterer.prototype.setGridSize = function(size) {
    this.gridSize_ = size;
};
MarkerClusterer.prototype.getMinClusterSize = function() {
    return this.minClusterSize_;
};
MarkerClusterer.prototype.setMinClusterSize = function(size) {
    this.minClusterSize_ = size;
};
MarkerClusterer.prototype.getExtendedBounds = function(bounds) {
    var projection = this.getProjection();
    var tr = new google.maps.LatLng(bounds.getNorthEast().lat(), bounds.getNorthEast().lng());
    var bl = new google.maps.LatLng(bounds.getSouthWest().lat(), bounds.getSouthWest().lng());
    var trPix = projection.fromLatLngToDivPixel(tr);
    trPix.x += this.gridSize_;
    trPix.y -= this.gridSize_;
    var blPix = projection.fromLatLngToDivPixel(bl);
    blPix.x -= this.gridSize_;
    blPix.y += this.gridSize_;
    var ne = projection.fromDivPixelToLatLng(trPix);
    var sw = projection.fromDivPixelToLatLng(blPix);
    bounds.extend(ne);
    bounds.extend(sw);
    return bounds;
};
MarkerClusterer.prototype.isMarkerInBounds_ = function(marker, bounds) {
    return bounds.contains(marker.getPosition());
};
MarkerClusterer.prototype.clearMarkers = function() {
    this.resetViewport(true);
    this.markers_ = [];
};
MarkerClusterer.prototype.resetViewport = function(opt_hide) {
    for (var i = 0, cluster; cluster = this.clusters_[i]; i++) {
        cluster.remove();
    }
    for (var i = 0, marker; marker = this.markers_[i]; i++) {
        marker.isAdded = false;
        if (opt_hide) {
            marker.setMap(null);
        }
    }
    this.clusters_ = [];
};
MarkerClusterer.prototype.repaint = function() {
    var oldClusters = this.clusters_.slice();
    this.clusters_.length = 0;
    this.resetViewport();
    this.redraw();
    window.setTimeout(function() {
        for (var i = 0, cluster; cluster = oldClusters[i]; i++) {
            cluster.remove();
        }
    }, 0);
};
MarkerClusterer.prototype.redraw = function() {
    this.createClusters_();
};
MarkerClusterer.prototype.distanceBetweenPoints_ = function(p1, p2) {
    if (!p1 || !p2) {
        return 0;
    }
    var R = 6371;
    var dLat = (p2.lat() - p1.lat()) * Math.PI / 180;
    var dLon = (p2.lng() - p1.lng()) * Math.PI / 180;
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(p1.lat() * Math.PI / 180) * Math.cos(p2.lat() * Math.PI / 180) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d;
};
MarkerClusterer.prototype.addToClosestCluster_ = function(marker) {
    var distance = 40000;
    var clusterToAddTo = null;
    var pos = marker.getPosition();
    for (var i = 0, cluster; cluster = this.clusters_[i]; i++) {
        var center = cluster.getCenter();
        if (center) {
            var d = this.distanceBetweenPoints_(center, marker.getPosition());
            if (d < distance) {
                distance = d;
                clusterToAddTo = cluster;
            }
        }
    }
    if (clusterToAddTo && clusterToAddTo.isMarkerInClusterBounds(marker)) {
        clusterToAddTo.addMarker(marker);
    } else {
        var cluster = new Cluster(this);
        cluster.addMarker(marker);
        this.clusters_.push(cluster);
    }
};
MarkerClusterer.prototype.createClusters_ = function() {
    if (!this.ready_) {
        return;
    }
    var mapBounds = new google.maps.LatLngBounds(this.map_.getBounds().getSouthWest(), this.map_.getBounds().getNorthEast());
    var bounds = this.getExtendedBounds(mapBounds);
    for (var i = 0, marker; marker = this.markers_[i]; i++) {
        if (!marker.isAdded && this.isMarkerInBounds_(marker, bounds)) {
            this.addToClosestCluster_(marker);
        }
    }
};

function Cluster(markerClusterer) {
    this.markerClusterer_ = markerClusterer;
    this.map_ = markerClusterer.getMap();
    this.gridSize_ = markerClusterer.getGridSize();
    this.minClusterSize_ = markerClusterer.getMinClusterSize();
    this.averageCenter_ = markerClusterer.isAverageCenter();
    this.center_ = null;
    this.markers_ = [];
    this.bounds_ = null;
    this.clusterIcon_ = new ClusterIcon(this, markerClusterer.getStyles(), markerClusterer.getGridSize());
}
Cluster.prototype.isMarkerAlreadyAdded = function(marker) {
    if (this.markers_.indexOf) {
        return this.markers_.indexOf(marker) != -1;
    } else {
        for (var i = 0, m; m = this.markers_[i]; i++) {
            if (m == marker) {
                return true;
            }
        }
    }
    return false;
};
Cluster.prototype.addMarker = function(marker) {
    if (this.isMarkerAlreadyAdded(marker)) {
        return false;
    }
    if (!this.center_) {
        this.center_ = marker.getPosition();
        this.calculateBounds_();
    } else {
        if (this.averageCenter_) {
            var l = this.markers_.length + 1;
            var lat = (this.center_.lat() * (l - 1) + marker.getPosition().lat()) / l;
            var lng = (this.center_.lng() * (l - 1) + marker.getPosition().lng()) / l;
            this.center_ = new google.maps.LatLng(lat, lng);
            this.calculateBounds_();
        }
    }
    marker.isAdded = true;
    this.markers_.push(marker);
    var len = this.markers_.length;
    if (len < this.minClusterSize_ && marker.getMap() != this.map_) {
        marker.setMap(this.map_);
    }
    if (len == this.minClusterSize_) {
        for (var i = 0; i < len; i++) {
            this.markers_[i].setMap(null);
        }
    }
    if (len >= this.minClusterSize_) {
        marker.setMap(null);
    }
    this.updateIcon();
    return true;
};
Cluster.prototype.getMarkerClusterer = function() {
    return this.markerClusterer_;
};
Cluster.prototype.getBounds = function() {
    var bounds = new google.maps.LatLngBounds(this.center_, this.center_);
    var markers = this.getMarkers();
    for (var i = 0, marker; marker = markers[i]; i++) {
        bounds.extend(marker.getPosition());
    }
    return bounds;
};
Cluster.prototype.remove = function() {
    this.clusterIcon_.remove();
    this.markers_.length = 0;
    delete this.markers_;
};
Cluster.prototype.getSize = function() {
    return this.markers_.length;
};
Cluster.prototype.getMarkers = function() {
    return this.markers_;
};
Cluster.prototype.getCenter = function() {
    return this.center_;
};
Cluster.prototype.calculateBounds_ = function() {
    var bounds = new google.maps.LatLngBounds(this.center_, this.center_);
    this.bounds_ = this.markerClusterer_.getExtendedBounds(bounds);
};
Cluster.prototype.isMarkerInClusterBounds = function(marker) {
    return this.bounds_.contains(marker.getPosition());
};
Cluster.prototype.getMap = function() {
    return this.map_;
};
Cluster.prototype.updateIcon = function() {
    var zoom = this.map_.getZoom();
    var mz = this.markerClusterer_.getMaxZoom();
    if (mz && zoom > mz) {
        for (var i = 0, marker; marker = this.markers_[i]; i++) {
            marker.setMap(this.map_);
        }
        return;
    }
    if (this.markers_.length < this.minClusterSize_) {
        this.clusterIcon_.hide();
        return;
    }
    var numStyles = this.markerClusterer_.getStyles().length;
    var sums = this.markerClusterer_.getCalculator()(this.markers_, numStyles);
    this.clusterIcon_.setCenter(this.center_);
    this.clusterIcon_.setSums(sums);
    this.clusterIcon_.show();
};

function ClusterIcon(cluster, styles, opt_padding) {
    cluster.getMarkerClusterer().extend(ClusterIcon, google.maps.OverlayView);
    this.styles_ = styles;
    this.padding_ = opt_padding || 0;
    this.cluster_ = cluster;
    this.center_ = null;
    this.map_ = cluster.getMap();
    this.div_ = null;
    this.sums_ = null;
    this.visible_ = false;
    this.setMap(this.map_);
}
ClusterIcon.prototype.triggerClusterClick = function(event) {
    var markerClusterer = this.cluster_.getMarkerClusterer();
    google.maps.event.trigger(markerClusterer, 'clusterclick', this.cluster_, event);
    if (markerClusterer.isZoomOnClick()) {
        this.map_.fitBounds(this.cluster_.getBounds());
    }
};
ClusterIcon.prototype.onAdd = function() {
    this.div_ = document.createElement('DIV');
    if (this.visible_) {
        var pos = this.getPosFromLatLng_(this.center_);
        this.div_.style.cssText = this.createCss(pos);
        this.div_.innerHTML = this.sums_.text;
    }
    var panes = this.getPanes();
    panes.overlayMouseTarget.appendChild(this.div_);
    var that = this;
    google.maps.event.addDomListener(this.div_, 'click', function(event) {
        that.triggerClusterClick(event);
    });
};
ClusterIcon.prototype.getPosFromLatLng_ = function(latlng) {
    var pos = this.getProjection().fromLatLngToDivPixel(latlng);
    if (typeof this.iconAnchor_ === 'object' && this.iconAnchor_.length === 2) {
        pos.x -= this.iconAnchor_[0];
        pos.y -= this.iconAnchor_[1];
    } else {
        pos.x -= parseInt(this.width_ / 2, 10);
        pos.y -= parseInt(this.height_ / 2, 10);
    }
    return pos;
};
ClusterIcon.prototype.draw = function() {
    if (this.visible_) {
        var pos = this.getPosFromLatLng_(this.center_);
        this.div_.style.top = pos.y + 'px';
        this.div_.style.left = pos.x + 'px';
    }
};
ClusterIcon.prototype.hide = function() {
    if (this.div_) {
        this.div_.style.display = 'none';
    }
    this.visible_ = false;
};
ClusterIcon.prototype.show = function() {
    if (this.div_) {
        var pos = this.getPosFromLatLng_(this.center_);
        this.div_.style.cssText = this.createCss(pos);
        this.div_.style.display = '';
    }
    this.visible_ = true;
};
ClusterIcon.prototype.remove = function() {
    this.setMap(null);
};
ClusterIcon.prototype.onRemove = function() {
    if (this.div_ && this.div_.parentNode) {
        this.hide();
        this.div_.parentNode.removeChild(this.div_);
        this.div_ = null;
    }
};
ClusterIcon.prototype.setSums = function(sums) {
    this.sums_ = sums;
    this.text_ = sums.text;
    this.index_ = sums.index;
    if (this.div_) {
        this.div_.innerHTML = sums.text;
    }
    this.useStyle();
};
ClusterIcon.prototype.useStyle = function() {
    var index = Math.max(0, this.sums_.index - 1);
    index = Math.min(this.styles_.length - 1, index);
    var style = this.styles_[index];
    this.url_ = style['url'];
    this.height_ = style['height'];
    this.width_ = style['width'];
    this.textColor_ = style['textColor'];
    this.anchor_ = style['anchor'];
    this.textSize_ = style['textSize'];
    this.backgroundPosition_ = style['backgroundPosition'];
    this.iconAnchor_ = style['iconAnchor'];
};
ClusterIcon.prototype.setCenter = function(center) {
    this.center_ = center;
};
ClusterIcon.prototype.createCss = function(pos) {
    var style = [];
    style.push('background-image:url(' + this.url_ + ');');
    var backgroundPosition = this.backgroundPosition_ ? this.backgroundPosition_ : '0 0';
    style.push('background-position:' + backgroundPosition + ';');
    if (typeof this.anchor_ === 'object') {
        if (typeof this.anchor_[0] === 'number' && this.anchor_[0] > 0 && this.anchor_[0] < this.height_) {
            style.push('height:' + (this.height_ - this.anchor_[0]) + 'px; padding-top:' + this.anchor_[0] + 'px;');
        } else if (typeof this.anchor_[0] === 'number' && this.anchor_[0] < 0 && -this.anchor_[0] < this.height_) {
            style.push('height:' + this.height_ + 'px; line-height:' + (this.height_ + this.anchor_[0]) + 'px;');
        } else {
            style.push('height:' + this.height_ + 'px; line-height:' + this.height_ + 'px;');
        }
        if (typeof this.anchor_[1] === 'number' && this.anchor_[1] > 0 && this.anchor_[1] < this.width_) {
            style.push('width:' + (this.width_ - this.anchor_[1]) + 'px; padding-left:' + this.anchor_[1] + 'px;');
        } else {
            style.push('width:' + this.width_ + 'px; text-align:center;');
        }
    } else {
        style.push('height:' + this.height_ + 'px; line-height:' +
            this.height_ + 'px; width:' + this.width_ + 'px; text-align:center;');
    }
    var txtColor = this.textColor_ ? this.textColor_ : 'black';
    var txtSize = this.textSize_ ? this.textSize_ : 11;
    style.push('cursor:pointer; top:' + pos.y + 'px; left:' +
        pos.x + 'px; color:' + txtColor + '; position:absolute; font-size:' +
        txtSize + 'px; font-family:Arial,sans-serif; font-weight:bold');
    return style.join('');
};
window['MarkerClusterer'] = MarkerClusterer;
MarkerClusterer.prototype['addMarker'] = MarkerClusterer.prototype.addMarker;
MarkerClusterer.prototype['addMarkers'] = MarkerClusterer.prototype.addMarkers;
MarkerClusterer.prototype['clearMarkers'] = MarkerClusterer.prototype.clearMarkers;
MarkerClusterer.prototype['fitMapToMarkers'] = MarkerClusterer.prototype.fitMapToMarkers;
MarkerClusterer.prototype['getCalculator'] = MarkerClusterer.prototype.getCalculator;
MarkerClusterer.prototype['getGridSize'] = MarkerClusterer.prototype.getGridSize;
MarkerClusterer.prototype['getExtendedBounds'] = MarkerClusterer.prototype.getExtendedBounds;
MarkerClusterer.prototype['getMap'] = MarkerClusterer.prototype.getMap;
MarkerClusterer.prototype['getMarkers'] = MarkerClusterer.prototype.getMarkers;
MarkerClusterer.prototype['getMaxZoom'] = MarkerClusterer.prototype.getMaxZoom;
MarkerClusterer.prototype['getStyles'] = MarkerClusterer.prototype.getStyles;
MarkerClusterer.prototype['getTotalClusters'] = MarkerClusterer.prototype.getTotalClusters;
MarkerClusterer.prototype['getTotalMarkers'] = MarkerClusterer.prototype.getTotalMarkers;
MarkerClusterer.prototype['redraw'] = MarkerClusterer.prototype.redraw;
MarkerClusterer.prototype['removeMarker'] = MarkerClusterer.prototype.removeMarker;
MarkerClusterer.prototype['removeMarkers'] = MarkerClusterer.prototype.removeMarkers;
MarkerClusterer.prototype['resetViewport'] = MarkerClusterer.prototype.resetViewport;
MarkerClusterer.prototype['repaint'] = MarkerClusterer.prototype.repaint;
MarkerClusterer.prototype['setCalculator'] = MarkerClusterer.prototype.setCalculator;
MarkerClusterer.prototype['setGridSize'] = MarkerClusterer.prototype.setGridSize;
MarkerClusterer.prototype['setMaxZoom'] = MarkerClusterer.prototype.setMaxZoom;
MarkerClusterer.prototype['onAdd'] = MarkerClusterer.prototype.onAdd;
MarkerClusterer.prototype['draw'] = MarkerClusterer.prototype.draw;
Cluster.prototype['getCenter'] = Cluster.prototype.getCenter;
Cluster.prototype['getSize'] = Cluster.prototype.getSize;
Cluster.prototype['getMarkers'] = Cluster.prototype.getMarkers;
ClusterIcon.prototype['onAdd'] = ClusterIcon.prototype.onAdd;
ClusterIcon.prototype['draw'] = ClusterIcon.prototype.draw;
ClusterIcon.prototype['onRemove'] = ClusterIcon.prototype.onRemove;
/*!
 * Cube Portfolio - Responsive jQuery Grid Plugin
 *
 * version: 3.1.1 (7 September, 2015)
 * require: jQuery v1.7+
 *
 * Copyright 2013-2015, Mihai Buricea (http://scriptpie.com/cubeportfolio/live-preview/)
 * Licensed under CodeCanyon License (http://codecanyon.net/licenses)
 *
 */
! function(a, b, c, d) {
    "use strict";

    function e(b, c, d) {
        var f, g = this,
            h = "cbp";
        if (a.data(b, "cubeportfolio")) throw new Error("cubeportfolio is already initialized. Destroy it before initialize again!");
        a.data(b, "cubeportfolio", g), g.options = a.extend({}, a.fn.cubeportfolio.options, c), g.isAnimating = !0, g.defaultFilter = g.options.defaultFilter, g.registeredEvents = [], g.queue = [], g.addedWrapp = !1, a.isFunction(d) && g.registerEvent("initFinish", d, !0), g.obj = b, g.$obj = a(b), f = g.$obj.children(), g.options.caption && ("expand" === g.options.caption || e.Private.modernBrowser || (g.options.caption = "minimal"), h += " cbp-caption-active cbp-caption-" + g.options.caption), g.$obj.addClass(h), (0 === f.length || f.first().hasClass("cbp-item")) && (g.wrapInner(g.obj, "cbp-wrapper"), g.addedWrapp = !0), g.$ul = g.$obj.children().addClass("cbp-wrapper"), g.wrapInner(g.obj, "cbp-wrapper-outer"), g.wrapper = g.$obj.children(".cbp-wrapper-outer"), g.blocks = g.$ul.children(".cbp-item"), g.blocksOn = g.blocks, g.wrapInner(g.blocks, "cbp-item-wrapper"), g.plugins = a.map(e.Plugins, function(a) {
            return a(g)
        }), g.loadImages(g.$obj, g.display)
    }
    a.extend(e.prototype, {
        storeData: function(b, c) {
            var d = this;
            c = c || 0, b.each(function(b, e) {
                var f = a(e),
                    g = f.width(),
                    h = f.height();
                f.data("cbp", {
                    index: c + b,
                    wrapper: f.children(".cbp-item-wrapper"),
                    widthInitial: g,
                    heightInitial: h,
                    width: g,
                    height: h,
                    widthAndGap: g + d.options.gapVertical,
                    heightAndGap: h + d.options.gapHorizontal,
                    left: null,
                    leftNew: null,
                    top: null,
                    topNew: null,
                    pack: !1
                })
            })
        },
        wrapInner: function(a, b) {
            var e, f, g;
            if (b = b || "", !(a.length && a.length < 1))
                for (a.length === d && (a = [a]), f = a.length - 1; f >= 0; f--) {
                    for (e = a[f], g = c.createElement("div"), g.setAttribute("class", b); e.childNodes.length;) g.appendChild(e.childNodes[0]);
                    e.appendChild(g)
                }
        },
        loadImages: function(b, c) {
            var d = this;
            requestAnimationFrame(function() {
                var e = b.find("img").map(function(a, b) {
                        return d.checkSrc(b.src)
                    }),
                    f = e.length;
                0 === f && c.call(d), a.each(e, function(a, b) {
                    b.one("load.cbp error.cbp", function() {
                        f--, 0 === f && c.call(d)
                    })
                })
            })
        },
        checkSrc: function(b) {
            if ("" === b) return null;
            var c = new Image;
            return c.src = b, c.complete && c.naturalWidth !== d && 0 !== c.naturalWidth ? null : a(c)
        },
        display: function() {
            var a = this;
            a.width = a.$obj.outerWidth(), a.storeData(a.blocks), a.filterFromUrl(), a.triggerEvent("initStartRead"), a.triggerEvent("initStartWrite"), "slider" === a.options.layoutMode && a.registerEvent("gridAdjust", function() {
                a.sliderMarkup()
            }, !0), a.layoutAndAdjustment(), a.triggerEvent("initEndRead"), a.triggerEvent("initEndWrite"), a.$obj.addClass("cbp-ready"), a.runQueue("delayFrame", a.delayFrame)
        },
        delayFrame: function() {
            var a = this;
            requestAnimationFrame(function() {
                a.resizeEvent(), a.triggerEvent("initFinish"), a.isAnimating = !1, a.$obj.trigger("initComplete.cbp")
            })
        },
        resizeEvent: function() {
            var a, b = this;
            e.Private.initResizeEvent({
                instance: b,
                fn: function() {
                    var b = this;
                    a = b.$obj.outerWidth(), b.width !== a && ("alignCenter" === b.options.gridAdjustment && (b.wrapper[0].style.maxWidth = ""), b.width = a, b.layoutAndAdjustment(), "slider" === b.options.layoutMode && b.updateSlider(), b.triggerEvent("resizeGrid")), b.triggerEvent("resizeWindow")
                }
            })
        },
        gridAdjust: function() {
            var b = this;
            "responsive" === b.options.gridAdjustment ? b.responsiveLayout() : (b.blocks.removeAttr("style"), b.blocks.each(function(c, d) {
                var e = a(d).data("cbp"),
                    f = d.getBoundingClientRect(),
                    g = b.columnWidthTruncate(f.right - f.left),
                    h = Math.round(f.bottom - f.top);
                e.height = h, e.heightAndGap = h + b.options.gapHorizontal, e.width = g, e.widthAndGap = g + b.options.gapVertical
            }), b.widthAvailable = b.width + b.options.gapVertical), b.triggerEvent("gridAdjust")
        },
        layoutAndAdjustment: function() {
            var a = this;
            a.gridAdjust(), a.layout()
        },
        layout: function() {
            var a = this;
            a.computeBlocks(a.filterConcat(a.defaultFilter)), "slider" === a.options.layoutMode ? (a.sliderLayoutReset(), a.sliderLayout()) : (a.mosaicLayoutReset(), a.mosaicLayout()), a.positionateItems(), a.resizeMainContainer()
        },
        computeFilter: function(a) {
            var b = this;
            b.computeBlocks(a), b.mosaicLayoutReset(), b.mosaicLayout(), b.filterLayout()
        },
        filterLayout: function() {
            var b = this;
            b.blocksOff.addClass("cbp-item-off"), b.blocksOn.removeClass("cbp-item-off").each(function(b, c) {
                var d = a(c).data("cbp");
                d.left = d.leftNew, d.top = d.topNew, c.style.left = d.left + "px", c.style.top = d.top + "px"
            }), b.resizeMainContainer(), b.filterFinish()
        },
        filterFinish: function() {
            var a = this;
            a.blocksAreSorted && a.sortBlocks(a.blocks, "index"), a.isAnimating = !1, a.$obj.trigger("filterComplete.cbp"), a.triggerEvent("filterFinish")
        },
        computeBlocks: function(a) {
            var b = this;
            b.blocksOnInitial = b.blocksOn, b.blocksOn = b.blocks.filter(a), b.blocksOff = b.blocks.not(a), b.triggerEvent("computeBlocksFinish", a)
        },
        responsiveLayout: function() {
            var b = this;
            b.cols = b[a.isArray(b.options.mediaQueries) ? "getColumnsBreakpoints" : "getColumnsAuto"](), b.columnWidth = b.columnWidthTruncate((b.width + b.options.gapVertical) / b.cols), b.widthAvailable = b.columnWidth * b.cols, "mosaic" === b.options.layoutMode && b.getMosaicWidthReference(), b.blocks.each(function(c, d) {
                var e, f = a(d).data("cbp"),
                    g = 1;
                "mosaic" === b.options.layoutMode && (g = b.getColsMosaic(f.widthInitial)), e = b.columnWidth * g - b.options.gapVertical, d.style.width = e + "px", f.width = e, f.widthAndGap = e + b.options.gapVertical, d.style.height = ""
            }), b.blocks.each(function(c, d) {
                var e = a(d).data("cbp"),
                    f = d.getBoundingClientRect(),
                    g = Math.round(f.bottom - f.top);
                e.height = g, e.heightAndGap = g + b.options.gapHorizontal
            })
        },
        getMosaicWidthReference: function() {
            var b = this,
                c = [];
            b.blocks.each(function(b, d) {
                var e = a(d).data("cbp");
                c.push(e.widthInitial)
            }), c.sort(function(a, b) {
                return a - b
            }), b.mosaicWidthReference = c[0] ? c[0] : b.columnWidth
        },
        getColsMosaic: function(a) {
            var b = this;
            if (a === b.width) return b.cols;
            var c = a / b.mosaicWidthReference;
            return c = c % 1 >= .79 ? Math.ceil(c) : Math.floor(c), Math.min(Math.max(c, 1), b.cols)
        },
        getColumnsAuto: function() {
            var a = this;
            if (0 === a.blocks.length) return 1;
            var b = a.blocks.first().data("cbp").widthInitial + a.options.gapVertical;
            return Math.max(Math.round(a.width / b), 1)
        },
        getColumnsBreakpoints: function() {
            var b, c = this,
                e = c.width;
            return a.each(c.options.mediaQueries, function(a, c) {
                return e >= c.width ? (b = c.cols, !1) : void 0
            }), b === d && (b = c.options.mediaQueries[c.options.mediaQueries.length - 1].cols), b
        },
        columnWidthTruncate: function(a) {
            return Math.floor(a)
        },
        positionateItems: function() {
            var b, c = this;
            c.blocksOn.removeClass("cbp-item-off").each(function(c, d) {
                b = a(d).data("cbp"), b.left = b.leftNew, b.top = b.topNew, d.style.left = b.left + "px", d.style.top = b.top + "px"
            }), c.blocksOff.addClass("cbp-item-off"), c.blocksAreSorted && c.sortBlocks(c.blocks, "index")
        },
        resizeMainContainer: function() {
            var b, c = this,
                f = Math.max(c.freeSpaces.slice(-1)[0].topStart - c.options.gapHorizontal, 0);
            "alignCenter" === c.options.gridAdjustment && (b = 0, c.blocksOn.each(function(c, d) {
                var e = a(d).data("cbp"),
                    f = e.left + e.width;
                f > b && (b = f)
            }), c.wrapper[0].style.maxWidth = b + "px"), f !== c.height && (c.obj.style.height = f + "px", c.height !== d && (e.Private.modernBrowser ? c.$obj.one(e.Private.transitionend, function() {
                c.$obj.trigger("pluginResize.cbp")
            }) : c.$obj.trigger("pluginResize.cbp")), c.height = f)
        },
        filterFromUrl: function() {
            var a = this,
                b = /#cbpf=(.*?)([#\?&]|$)/gi.exec(location.href);
            null !== b && (a.defaultFilter = decodeURIComponent(b[1]))
        },
        filterConcat: function(a) {
            return a.replace(/\|/gi, "")
        },
        pushQueue: function(a, b) {
            var c = this;
            c.queue[a] = c.queue[a] || [], c.queue[a].push(b)
        },
        runQueue: function(b, c) {
            var d = this,
                e = d.queue[b] || [];
            a.when.apply(a, e).then(a.proxy(c, d))
        },
        clearQueue: function(a) {
            var b = this;
            b.queue[a] = []
        },
        registerEvent: function(a, b, c) {
            var d = this;
            d.registeredEvents[a] || (d.registeredEvents[a] = []), d.registeredEvents[a].push({
                func: b,
                oneTime: c || !1
            })
        },
        triggerEvent: function(a, b) {
            var c, d, e = this;
            if (e.registeredEvents[a])
                for (c = 0, d = e.registeredEvents[a].length; d > c; c++) e.registeredEvents[a][c].func.call(e, b), e.registeredEvents[a][c].oneTime && (e.registeredEvents[a].splice(c, 1), c--, d--)
        },
        addItems: function(b, c) {
            var d = this;
            d.wrapInner(b, "cbp-item-wrapper"), b.addClass("cbp-item-loading").css({
                top: "100%",
                left: 0
            }).appendTo(d.$ul), e.Private.modernBrowser ? b.last().one(e.Private.animationend, function() {
                d.addItemsFinish(b, c)
            }) : d.addItemsFinish(b, c), d.loadImages(b, function() {
                d.$obj.addClass("cbp-addItems"), d.storeData(b, d.blocks.length), a.merge(d.blocks, b), d.triggerEvent("addItemsToDOM", b), d.layoutAndAdjustment(), "slider" === d.options.layoutMode && d.updateSlider(), d.elems && e.Public.showCounter.call(d.obj, d.elems)
            })
        },
        addItemsFinish: function(b, c) {
            var d = this;
            d.isAnimating = !1, d.$obj.removeClass("cbp-addItems"), b.removeClass("cbp-item-loading"), a.isFunction(c) && c.call(d)
        }
    }), a.fn.cubeportfolio = function(a, b, c) {
        return this.each(function() {
            if ("object" == typeof a || !a) return e.Public.init.call(this, a, b);
            if (e.Public[a]) return e.Public[a].call(this, b, c);
            throw new Error("Method " + a + " does not exist on jquery.cubeportfolio.js")
        })
    }, e.Plugins = {}, a.fn.cubeportfolio.Constructor = e
}(jQuery, window, document),
function(a) {
    "use strict";

    function b(b) {
        var c = this;
        c.parent = b, c.filters = a(b.options.filters), c.filterData = [], c.registerFilter()
    }
    var c = a.fn.cubeportfolio.Constructor;
    b.prototype.registerFilter = function() {
        var b = this,
            c = b.parent,
            d = c.defaultFilter.split("|");
        b.wrap = b.filters.find(".cbp-l-filters-dropdownWrap").on({
            "mouseenter.cbp": function() {
                a(this).addClass("cbp-l-filters-dropdownWrap-open")
            },
            "mouseleave.cbp": function() {
                a(this).removeClass("cbp-l-filters-dropdownWrap-open")
            }
        }), b.filters.each(function(e, f) {
            var g = a(f),
                h = "*",
                i = g.find(".cbp-filter-item"),
                j = {};
            g.hasClass("cbp-l-filters-dropdown") && (j.wrap = g.find(".cbp-l-filters-dropdownWrap"), j.header = g.find(".cbp-l-filters-dropdownHeader"), j.headerText = j.header.text()), c.$obj.cubeportfolio("showCounter", i), a.each(d, function(a, b) {
                return i.filter('[data-filter="' + b + '"]').length ? (h = b, d.splice(a, 1), !1) : void 0
            }), a.data(f, "filterName", h), b.filterData.push(f), b.filtersCallback(j, i.filter('[data-filter="' + h + '"]')), i.on("click.cbp", function() {
                var d = a(this);
                if (!d.hasClass("cbp-filter-item-active") && !c.isAnimating) {
                    b.filtersCallback(j, d), a.data(f, "filterName", d.data("filter"));
                    var e = a.map(b.filterData, function(b) {
                        var c = a.data(b, "filterName");
                        return "" !== c && "*" !== c ? c : null
                    });
                    e.length < 1 && (e = ["*"]);
                    var g = e.join("|");
                    c.defaultFilter !== g && c.$obj.cubeportfolio("filter", g)
                }
            })
        })
    }, b.prototype.filtersCallback = function(b, c) {
        a.isEmptyObject(b) || (b.wrap.trigger("mouseleave.cbp"), b.headerText ? b.headerText = "" : b.header.text(c.text())), c.addClass("cbp-filter-item-active").siblings().removeClass("cbp-filter-item-active")
    }, b.prototype.destroy = function() {
        var a = this;
        a.filters.off(".cbp"), a.wrap.off(".cbp")
    }, c.Plugins.Filters = function(a) {
        return "" === a.options.filters ? null : new b(a)
    }
}(jQuery, window, document),
function(a, b) {
    "use strict";

    function c(b) {
        var c = this;
        c.parent = b, c.loadMore = a(b.options.loadMore).find(".cbp-l-loadMore-link"), b.options.loadMoreAction.length && c[b.options.loadMoreAction]()
    }
    var d = a.fn.cubeportfolio.Constructor;
    c.prototype.click = function() {
        var b = this,
            c = 0;
        b.loadMore.on("click.cbp", function(d) {
            var e = a(this);
            d.preventDefault(), b.parent.isAnimating || e.hasClass("cbp-l-loadMore-stop") || (e.addClass("cbp-l-loadMore-loading"), c++, a.ajax({
                url: b.loadMore.attr("href"),
                type: "GET",
                dataType: "HTML"
            }).done(function(d) {
                var f, g;
                f = a(d).filter(function() {
                    return a(this).is("div.cbp-loadMore-block" + c)
                }), b.parent.$obj.cubeportfolio("appendItems", f.children(), function() {
                    e.removeClass("cbp-l-loadMore-loading"), g = a(d).filter(function() {
                        return a(this).is("div.cbp-loadMore-block" + (c + 1))
                    }), 0 === g.length && e.addClass("cbp-l-loadMore-stop")
                })
            }).fail(function() {}))
        })
    }, c.prototype.auto = function() {
        var c = this;
        c.parent.$obj.on("initComplete.cbp", function() {
            Object.create({
                init: function() {
                    var d = this;
                    d.isActive = !1, d.numberOfClicks = 0, c.loadMore.addClass("cbp-l-loadMore-loading"), d.window = a(b), d.addEvents(), d.getNewItems()
                },
                addEvents: function() {
                    var a, b = this;
                    c.loadMore.on("click.cbp", function(a) {
                        a.preventDefault()
                    }), b.window.on("scroll.loadMoreObject", function() {
                        clearTimeout(a), a = setTimeout(function() {
                            c.parent.isAnimating || b.getNewItems()
                        }, 80)
                    }), c.parent.$obj.on("filterComplete.cbp", function() {
                        b.getNewItems()
                    })
                },
                getNewItems: function() {
                    var b, d, e = this;
                    e.isActive || c.loadMore.hasClass("cbp-l-loadMore-stop") || (b = c.loadMore.offset().top, d = e.window.scrollTop() + e.window.height(), b > d || (e.isActive = !0, e.numberOfClicks++, a.ajax({
                        url: c.loadMore.attr("href"),
                        type: "GET",
                        dataType: "HTML",
                        cache: !0
                    }).done(function(b) {
                        var d, f;
                        d = a(b).filter(function() {
                            return a(this).is("div.cbp-loadMore-block" + e.numberOfClicks)
                        }), c.parent.$obj.cubeportfolio("appendItems", d.html(), function() {
                            f = a(b).filter(function() {
                                return a(this).is("div.cbp-loadMore-block" + (e.numberOfClicks + 1))
                            }), 0 === f.length ? (c.loadMore.addClass("cbp-l-loadMore-stop"), e.window.off("scroll.loadMoreObject"), c.parent.$obj.off("filterComplete.cbp")) : (e.isActive = !1, e.window.trigger("scroll.loadMoreObject"))
                        })
                    }).fail(function() {
                        e.isActive = !1
                    })))
                }
            }).init()
        })
    }, c.prototype.destroy = function() {
        var c = this;
        c.loadMore.off(".cbp"), a(b).off("scroll.loadMoreObject")
    }, d.Plugins.LoadMore = function(a) {
        return "" === a.options.loadMore ? null : new c(a)
    }
}(jQuery, window, document), jQuery.fn.cubeportfolio.options = {
        filters: "",
        loadMore: "",
        loadMoreAction: "click",
        search: "",
        layoutMode: "grid",
        sortToPreventGaps: !1,
        drag: !0,
        auto: !1,
        autoTimeout: 5e3,
        autoPauseOnHover: !0,
        showNavigation: !0,
        showPagination: !0,
        rewindNav: !0,
        scrollByPage: !1,
        defaultFilter: "*",
        filterDeeplinking: !1,
        animationType: "fadeOut",
        gridAdjustment: "responsive",
        mediaQueries: !1,
        gapHorizontal: 10,
        gapVertical: 10,
        caption: "pushTop",
        displayType: "lazyLoading",
        displayTypeSpeed: 400,
        lightboxDelegate: ".cbp-lightbox",
        lightboxGallery: !0,
        lightboxTitleSrc: "data-title",
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        singlePageDelegate: ".cbp-singlePage",
        singlePageDeeplinking: !0,
        singlePageStickyNavigation: !0,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageAnimation: "left",
        singlePageCallback: function() {},
        singlePageInlineDelegate: ".cbp-singlePageInline",
        singlePageInlinePosition: "top",
        singlePageInlineInFocus: !0,
        singlePageInlineCallback: function() {}
    },
    function(a, b, c) {
        "use strict";

        function d(a) {
            var b = this;
            b.parent = a, a.options.lightboxShowCounter === !1 && (a.options.lightboxCounter = ""), a.options.singlePageShowCounter === !1 && (a.options.singlePageCounter = ""), a.registerEvent("initStartRead", function() {
                b.run()
            }, !0)
        }
        var e = a.fn.cubeportfolio.Constructor,
            f = {
                init: function(b, d) {
                    var e, f = this;
                    if (f.cubeportfolio = b, f.type = d, f.isOpen = !1, f.options = f.cubeportfolio.options, "lightbox" === d && f.cubeportfolio.registerEvent("resizeWindow", function() {
                            f.resizeImage()
                        }), "singlePageInline" === d) return f.startInline = -1, f.height = 0, f.createMarkupSinglePageInline(), void f.cubeportfolio.registerEvent("resizeGrid", function() {
                        f.isOpen && f.close()
                    });
                    if (f.createMarkup(), "singlePage" === d && (f.cubeportfolio.registerEvent("resizeWindow", function() {
                            if (f.options.singlePageStickyNavigation) {
                                var a = f.wrap[0].clientWidth;
                                a > 0 && (f.navigationWrap.width(a), f.navigation.width(a))
                            }
                        }), f.options.singlePageDeeplinking)) {
                        f.url = location.href, "#" === f.url.slice(-1) && (f.url = f.url.slice(0, -1));
                        var g = f.url.split("#cbp="),
                            h = g.shift();
                        if (a.each(g, function(b, c) {
                                return f.cubeportfolio.blocksOn.each(function(b, d) {
                                    var g = a(d).find(f.options.singlePageDelegate + '[href="' + c + '"]');
                                    return g.length ? (e = g, !1) : void 0
                                }), e ? !1 : void 0
                            }), e) {
                            f.url = h;
                            var i = e,
                                j = i.attr("data-cbp-singlePage"),
                                k = [];
                            j ? k = i.closest(a(".cbp-item")).find('[data-cbp-singlePage="' + j + '"]') : f.cubeportfolio.blocksOn.each(function(b, c) {
                                var d = a(c);
                                d.not(".cbp-item-off") && d.find(f.options.singlePageDelegate).each(function(b, c) {
                                    a(c).attr("data-cbp-singlePage") || k.push(c)
                                })
                            }), f.openSinglePage(k, e[0])
                        } else if (g.length) {
                            var l = c.createElement("a");
                            l.setAttribute("href", g[0]), f.openSinglePage([l], l)
                        }
                    }
                },
                createMarkup: function() {
                    var b = this,
                        d = "";
                    "singlePage" === b.type && "left" !== b.options.singlePageAnimation && (d = " cbp-popup-singlePage-" + b.options.singlePageAnimation), b.wrap = a("<div/>", {
                        "class": "cbp-popup-wrap cbp-popup-" + b.type + d,
                        "data-action": "lightbox" === b.type ? "close" : ""
                    }).on("click.cbp", function(c) {
                        if (!b.stopEvents) {
                            var d = a(c.target).attr("data-action");
                            b[d] && (b[d](), c.preventDefault())
                        }
                    }), b.content = a("<div/>", {
                        "class": "cbp-popup-content"
                    }).appendTo(b.wrap), a("<div/>", {
                        "class": "cbp-popup-loadingBox"
                    }).appendTo(b.wrap), "ie8" === e.Private.browser && (b.bg = a("<div/>", {
                        "class": "cbp-popup-ie8bg",
                        "data-action": "lightbox" === b.type ? "close" : ""
                    }).appendTo(b.wrap)), b.navigationWrap = a("<div/>", {
                        "class": "cbp-popup-navigation-wrap"
                    }).appendTo(b.wrap), b.navigation = a("<div/>", {
                        "class": "cbp-popup-navigation"
                    }).appendTo(b.navigationWrap), b.closeButton = a("<div/>", {
                        "class": "cbp-popup-close",
                        title: "Close (Esc arrow key)",
                        "data-action": "close"
                    }).appendTo(b.navigation), b.nextButton = a("<div/>", {
                        "class": "cbp-popup-next",
                        title: "Next (Right arrow key)",
                        "data-action": "next"
                    }).appendTo(b.navigation), b.prevButton = a("<div/>", {
                        "class": "cbp-popup-prev",
                        title: "Previous (Left arrow key)",
                        "data-action": "prev"
                    }).appendTo(b.navigation), "singlePage" === b.type && (b.options.singlePageCounter && (b.counter = a(b.options.singlePageCounter).appendTo(b.navigation), b.counter.text("")), b.content.on("click.cbp", b.options.singlePageDelegate, function(a) {
                        a.preventDefault();
                        var c, d = b.dataArray.length,
                            e = this.getAttribute("href");
                        for (c = 0; d > c && b.dataArray[c].url !== e; c++);
                        b.singlePageJumpTo(c - b.current)
                    }), b.wrap.on("mousewheel.cbp DOMMouseScroll.cbp", function(a) {
                        a.stopImmediatePropagation()
                    })), a(c).on("keydown.cbp", function(a) {
                        b.isOpen && (b.stopEvents || (37 === a.keyCode ? b.prev() : 39 === a.keyCode ? b.next() : 27 === a.keyCode && b.close()))
                    })
                },
                createMarkupSinglePageInline: function() {
                    var b = this;
                    b.wrap = a("<div/>", {
                        "class": "cbp-popup-singlePageInline"
                    }).on("click.cbp", function(c) {
                        if (!b.stopEvents) {
                            var d = a(c.target).attr("data-action");
                            d && b[d] && (b[d](), c.preventDefault())
                        }
                    }), b.content = a("<div/>", {
                        "class": "cbp-popup-content"
                    }).appendTo(b.wrap), b.navigation = a("<div/>", {
                        "class": "cbp-popup-navigation"
                    }).appendTo(b.wrap), b.closeButton = a("<div/>", {
                        "class": "cbp-popup-close",
                        title: "Close (Esc arrow key)",
                        "data-action": "close"
                    }).appendTo(b.navigation)
                },
                destroy: function() {
                    var b = this,
                        d = a("body");
                    a(c).off("keydown.cbp"), d.off("click.cbp", b.options.lightboxDelegate), d.off("click.cbp", b.options.singlePageDelegate), b.content.off("click.cbp", b.options.singlePageDelegate), b.cubeportfolio.$obj.off("click.cbp", b.options.singlePageInlineDelegate), b.cubeportfolio.$obj.off("click.cbp", b.options.lightboxDelegate), b.cubeportfolio.$obj.off("click.cbp", b.options.singlePageDelegate), b.cubeportfolio.$obj.removeClass("cbp-popup-isOpening"), b.cubeportfolio.$obj.find(".cbp-item").removeClass("cbp-singlePageInline-active"), b.wrap.remove()
                },
                openLightbox: function(d, e) {
                    var f, g, h = this,
                        i = 0,
                        j = [];
                    if (!h.isOpen) {
                        if (h.isOpen = !0, h.stopEvents = !1, h.dataArray = [], h.current = null, f = e.getAttribute("href"), null === f) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                        a.each(d, function(b, c) {
                            var d, e = c.getAttribute("href"),
                                g = e,
                                k = "isImage";
                            if (-1 === a.inArray(e, j)) {
                                if (f === e) h.current = i;
                                else if (!h.options.lightboxGallery) return;
                                /youtube/i.test(e) ? (d = e.substring(e.lastIndexOf("v=") + 2), /autoplay=/i.test(d) || (d += "&autoplay=1"), d = d.replace(/\?|&/, "?"), g = "//www.youtube.com/embed/" + d, k = "isYoutube") : /vimeo/i.test(e) ? (d = e.substring(e.lastIndexOf("/") + 1), /autoplay=/i.test(d) || (d += "&autoplay=1"), d = d.replace(/\?|&/, "?"), g = "//player.vimeo.com/video/" + d, k = "isVimeo") : /ted\.com/i.test(e) ? (g = "http://embed.ted.com/talks/" + e.substring(e.lastIndexOf("/") + 1) + ".html", k = "isTed") : /soundcloud\.com/i.test(e) ? (g = e, k = "isSoundCloud") : /(\.mp4)|(\.ogg)|(\.ogv)|(\.webm)/i.test(e) ? (g = e.split(-1 !== e.indexOf("|") ? "|" : "%7C"), k = "isSelfHostedVideo") : /\.mp3$/i.test(e) && (g = e, k = "isSelfHostedAudio"), h.dataArray.push({
                                    src: g,
                                    title: c.getAttribute(h.options.lightboxTitleSrc),
                                    type: k
                                }), i++
                            }
                            j.push(e)
                        }), h.counterTotal = h.dataArray.length, 1 === h.counterTotal ? (h.nextButton.hide(), h.prevButton.hide(), h.dataActionImg = "") : (h.nextButton.show(), h.prevButton.show(), h.dataActionImg = 'data-action="next"'), h.wrap.appendTo(c.body), h.scrollTop = a(b).scrollTop(), h.originalStyle = a("html").attr("style"), a("html").css({
                            overflow: "hidden",
                            paddingRight: b.innerWidth - a(c).width()
                        }), h.wrap.show(), g = h.dataArray[h.current], h[g.type](g)
                    }
                },
                openSinglePage: function(d, f) {
                    var g, h = this,
                        i = 0,
                        j = [];
                    if (!h.isOpen) {
                        if (h.cubeportfolio.singlePageInline && h.cubeportfolio.singlePageInline.isOpen && h.cubeportfolio.singlePageInline.close(), h.isOpen = !0, h.stopEvents = !1, h.dataArray = [], h.current = null, g = f.getAttribute("href"), null === g) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                        if (a.each(d, function(b, c) {
                                var d = c.getAttribute("href"); - 1 === a.inArray(d, j) && (g === d && (h.current = i), h.dataArray.push({
                                    url: d,
                                    element: c
                                }), i++), j.push(d)
                            }), h.counterTotal = h.dataArray.length, 1 === h.counterTotal ? (h.nextButton.hide(), h.prevButton.hide()) : (h.nextButton.show(), h.prevButton.show()), h.wrap.appendTo(c.body), h.scrollTop = a(b).scrollTop(), a("html").css({
                                overflow: "hidden",
                                paddingRight: b.innerWidth - a(c).width()
                            }), h.wrap.scrollTop(0), h.wrap.show(), h.finishOpen = 2, h.navigationMobile = a(), h.wrap.one(e.Private.transitionend, function() {
                                var b;
                                h.options.singlePageStickyNavigation && (h.wrap.addClass("cbp-popup-singlePage-sticky"), b = h.wrap[0].clientWidth, h.navigationWrap.width(b), ("android" === e.Private.browser || "ios" === e.Private.browser) && (h.navigationMobile = a("<div/>", {
                                    "class": "cbp-popup-singlePage cbp-popup-singlePage-sticky",
                                    id: h.wrap.attr("id")
                                }).on("click.cbp", function(b) {
                                    if (!h.stopEvents) {
                                        var c = a(b.target).attr("data-action");
                                        h[c] && (h[c](), b.preventDefault())
                                    }
                                }), h.navigationMobile.appendTo(c.body).append(h.navigationWrap))), h.finishOpen--, h.finishOpen <= 0 && h.updateSinglePageIsOpen.call(h)
                            }), "ie8" === e.Private.browser || "ie9" === e.Private.browser) {
                            if (h.options.singlePageStickyNavigation) {
                                var k = h.wrap[0].clientWidth;
                                h.navigationWrap.width(k), setTimeout(function() {
                                    h.wrap.addClass("cbp-popup-singlePage-sticky")
                                }, 1e3)
                            }
                            h.finishOpen--
                        }
                        h.wrap.addClass("cbp-popup-loading"), h.wrap.offset(), h.wrap.addClass("cbp-popup-singlePage-open"), h.options.singlePageDeeplinking && (h.url = h.url.split("#cbp=")[0], location.href = h.url + "#cbp=" + h.dataArray[h.current].url), a.isFunction(h.options.singlePageCallback) && h.options.singlePageCallback.call(h, h.dataArray[h.current].url, h.dataArray[h.current].element)
                    }
                },
                openSinglePageInline: function(c, d, e) {
                    var f, g, h, i, j = this;
                    if (e = e || !1, j.fromOpen = e, j.storeBlocks = c, j.storeCurrentBlock = d, j.isOpen) return g = a(d).closest(".cbp-item").index(), void(j.dataArray[j.current].url !== d.getAttribute("href") || j.current !== g ? j.cubeportfolio.singlePageInline.close("open", {
                        blocks: c,
                        currentBlock: d,
                        fromOpen: !0
                    }) : j.close());
                    if (j.isOpen = !0, j.stopEvents = !1, j.dataArray = [], j.current = null, f = d.getAttribute("href"), null === f) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                    if (h = a(d).closest(".cbp-item")[0], c.each(function(a, b) {
                            h === b && (j.current = a)
                        }), j.dataArray[j.current] = {
                            url: f,
                            element: d
                        }, i = a(j.dataArray[j.current].element).parents(".cbp-item").addClass("cbp-singlePageInline-active"), j.counterTotal = c.length, j.wrap.insertBefore(j.cubeportfolio.wrapper), "top" === j.options.singlePageInlinePosition ? (j.startInline = 0, j.top = 0, j.firstRow = !0, j.lastRow = !1) : "bottom" === j.options.singlePageInlinePosition ? (j.startInline = j.counterTotal, j.top = j.cubeportfolio.height, j.firstRow = !1, j.lastRow = !0) : "above" === j.options.singlePageInlinePosition ? (j.startInline = j.cubeportfolio.cols * Math.floor(j.current / j.cubeportfolio.cols), j.top = a(c[j.current]).data("cbp").top, 0 === j.startInline ? j.firstRow = !0 : (j.top -= j.options.gapHorizontal, j.firstRow = !1), j.lastRow = !1) : (j.top = a(c[j.current]).data("cbp").top + a(c[j.current]).data("cbp").height, j.startInline = Math.min(j.cubeportfolio.cols * (Math.floor(j.current / j.cubeportfolio.cols) + 1), j.counterTotal), j.firstRow = !1, j.lastRow = j.startInline === j.counterTotal ? !0 : !1), j.wrap[0].style.height = j.wrap.outerHeight(!0) + "px", j.deferredInline = a.Deferred(), j.options.singlePageInlineInFocus) {
                        j.scrollTop = a(b).scrollTop();
                        var k = j.cubeportfolio.$obj.offset().top + j.top - 100;
                        j.scrollTop !== k ? a("html,body").animate({
                            scrollTop: k
                        }, 350).promise().then(function() {
                            j.resizeSinglePageInline(), j.deferredInline.resolve()
                        }) : (j.resizeSinglePageInline(), j.deferredInline.resolve())
                    } else j.resizeSinglePageInline(), j.deferredInline.resolve();
                    j.cubeportfolio.$obj.addClass("cbp-popup-singlePageInline-open"), j.wrap.css({
                        top: j.top
                    }), a.isFunction(j.options.singlePageInlineCallback) && j.options.singlePageInlineCallback.call(j, j.dataArray[j.current].url, j.dataArray[j.current].element)
                },
                resizeSinglePageInline: function() {
                    var a = this;
                    a.height = a.firstRow || a.lastRow ? a.wrap.outerHeight(!0) : a.wrap.outerHeight(!0) - a.options.gapHorizontal, a.storeBlocks.each(function(b, c) {
                        b < a.startInline ? e.Private.modernBrowser ? c.style[e.Private.transform] = "" : c.style.marginTop = "" : e.Private.modernBrowser ? c.style[e.Private.transform] = "translate3d(0px, " + a.height + "px, 0)" : c.style.marginTop = a.height + "px"
                    }), a.cubeportfolio.obj.style.height = a.cubeportfolio.height + a.height + "px"
                },
                revertResizeSinglePageInline: function() {
                    var b = this;
                    b.deferredInline = a.Deferred(), b.storeBlocks.each(function(a, b) {
                        e.Private.modernBrowser ? b.style[e.Private.transform] = "" : b.style.marginTop = ""
                    }), b.cubeportfolio.obj.style.height = b.cubeportfolio.height + "px"
                },
                appendScriptsToWrap: function(a) {
                    var b = this,
                        d = 0,
                        e = function(f) {
                            var g = c.createElement("script"),
                                h = f.src;
                            g.type = "text/javascript", g.readyState ? g.onreadystatechange = function() {
                                ("loaded" == g.readyState || "complete" == g.readyState) && (g.onreadystatechange = null, d++, a[d] && e(a[d]))
                            } : g.onload = function() {
                                d++, a[d] && e(a[d])
                            }, h ? g.src = h : g.text = f.text, b.content[0].appendChild(g)
                        };
                    e(a[0])
                },
                updateSinglePage: function(b, c, d) {
                    var e, f = this;
                    f.content.addClass("cbp-popup-content").removeClass("cbp-popup-content-basic"), d === !1 && f.content.removeClass("cbp-popup-content").addClass("cbp-popup-content-basic"), f.counter && (e = a(f.getCounterMarkup(f.options.singlePageCounter, f.current + 1, f.counterTotal)), f.counter.text(e.text())), f.content.html(b), c && f.appendScriptsToWrap(c), f.cubeportfolio.$obj.trigger("updateSinglePageStart.cbp"), f.finishOpen--, f.finishOpen <= 0 && f.updateSinglePageIsOpen.call(f)
                },
                updateSinglePageIsOpen: function() {
                    var b, c = this;
                    c.wrap.addClass("cbp-popup-ready"), c.wrap.removeClass("cbp-popup-loading"), b = c.content.find(".cbp-slider"), b ? (b.find(".cbp-slider-item").addClass("cbp-item"), c.slider = b.cubeportfolio({
                        layoutMode: "slider",
                        mediaQueries: [{
                            width: 1,
                            cols: 1
                        }],
                        gapHorizontal: 0,
                        gapVertical: 0,
                        caption: "",
                        coverRatio: ""
                    })) : c.slider = null, ("android" === e.Private.browser || "ios" === e.Private.browser) && a("html").css({
                        position: "fixed"
                    }), c.cubeportfolio.$obj.trigger("updateSinglePageComplete.cbp")
                },
                updateSinglePageInline: function(a, b) {
                    var c = this;
                    c.content.html(a), b && c.appendScriptsToWrap(b), c.cubeportfolio.$obj.trigger("updateSinglePageInlineStart.cbp"), c.singlePageInlineIsOpen.call(c)
                },
                singlePageInlineIsOpen: function() {
                    function a() {
                        b.wrap.addClass("cbp-popup-singlePageInline-ready"), b.wrap[0].style.height = "", b.resizeSinglePageInline(), b.cubeportfolio.$obj.trigger("updateSinglePageInlineComplete.cbp")
                    }
                    var b = this;
                    b.cubeportfolio.loadImages(b.wrap, function() {
                        var c = b.content.find(".cbp-slider");
                        c.length ? (c.find(".cbp-slider-item").addClass("cbp-item"), c.one("initComplete.cbp", function() {
                            b.deferredInline.done(a)
                        }), c.on("pluginResize.cbp", function() {
                            b.deferredInline.done(a)
                        }), b.slider = c.cubeportfolio({
                            layoutMode: "slider",
                            displayType: "default",
                            mediaQueries: [{
                                width: 1,
                                cols: 1
                            }],
                            gapHorizontal: 0,
                            gapVertical: 0,
                            caption: "",
                            coverRatio: ""
                        })) : (b.slider = null, b.deferredInline.done(a))
                    })
                },
                isImage: function(b) {
                    {
                        var c = this;
                        new Image
                    }
                    c.tooggleLoading(!0), c.cubeportfolio.loadImages(a('<div><img src="' + b.src + '"></div>'), function() {
                        c.updateImagesMarkup(b.src, b.title, c.getCounterMarkup(c.options.lightboxCounter, c.current + 1, c.counterTotal)), c.tooggleLoading(!1)
                    })
                },
                isVimeo: function(a) {
                    var b = this;
                    b.updateVideoMarkup(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                isYoutube: function(a) {
                    var b = this;
                    b.updateVideoMarkup(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                isTed: function(a) {
                    var b = this;
                    b.updateVideoMarkup(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                isSoundCloud: function(a) {
                    var b = this;
                    b.updateVideoMarkup(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                isSelfHostedVideo: function(a) {
                    var b = this;
                    b.updateSelfHostedVideo(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                isSelfHostedAudio: function(a) {
                    var b = this;
                    b.updateSelfHostedAudio(a.src, a.title, b.getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
                },
                getCounterMarkup: function(a, b, c) {
                    if (!a.length) return "";
                    var d = {
                        current: b,
                        total: c
                    };
                    return a.replace(/\{\{current}}|\{\{total}}/gi, function(a) {
                        return d[a.slice(2, -2)]
                    })
                },
                updateSelfHostedVideo: function(a, b, c) {
                    var d, e = this;
                    e.wrap.addClass("cbp-popup-lightbox-isIframe");
                    var f = '<div class="cbp-popup-lightbox-iframe"><video controls="controls" height="auto" style="width: 100%">';
                    for (d = 0; d < a.length; d++) /(\.mp4)/i.test(a[d]) ? f += '<source src="' + a[d] + '" type="video/mp4">' : /(\.ogg)|(\.ogv)/i.test(a[d]) ? f += '<source src="' + a[d] + '" type="video/ogg">' : /(\.webm)/i.test(a[d]) && (f += '<source src="' + a[d] + '" type="video/webm">');
                    f += 'Your browser does not support the video tag.</video><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>", e.content.html(f), e.wrap.addClass("cbp-popup-ready"), e.preloadNearbyImages()
                },
                updateSelfHostedAudio: function(a, b, c) {
                    var d = this;
                    d.wrap.addClass("cbp-popup-lightbox-isIframe");
                    var e = '<div class="cbp-popup-lightbox-iframe"><audio controls="controls" height="auto" style="width: 100%"><source src="' + a + '" type="audio/mpeg">Your browser does not support the audio tag.</audio><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>";
                    d.content.html(e), d.wrap.addClass("cbp-popup-ready"), d.preloadNearbyImages()
                },
                updateVideoMarkup: function(a, b, c) {
                    var d = this;
                    d.wrap.addClass("cbp-popup-lightbox-isIframe");
                    var e = '<div class="cbp-popup-lightbox-iframe"><iframe src="' + a + '" frameborder="0" allowfullscreen scrolling="no"></iframe><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>";
                    d.content.html(e), d.wrap.addClass("cbp-popup-ready"), d.preloadNearbyImages()
                },
                updateImagesMarkup: function(a, b, c) {
                    var d = this;
                    d.wrap.removeClass("cbp-popup-lightbox-isIframe");
                    var e = '<div class="cbp-popup-lightbox-figure"><img src="' + a + '" class="cbp-popup-lightbox-img" ' + d.dataActionImg + ' /><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>";
                    d.content.html(e), d.wrap.addClass("cbp-popup-ready"), d.resizeImage(), d.preloadNearbyImages()
                },
                next: function() {
                    var a = this;
                    a[a.type + "JumpTo"](1)
                },
                prev: function() {
                    var a = this;
                    a[a.type + "JumpTo"](-1)
                },
                lightboxJumpTo: function(a) {
                    var b, c = this;
                    c.current = c.getIndex(c.current + a), b = c.dataArray[c.current], c[b.type](b)
                },
                singlePageJumpTo: function(b) {
                    var c = this;
                    c.current = c.getIndex(c.current + b), a.isFunction(c.options.singlePageCallback) && (c.resetWrap(), c.wrap.scrollTop(0), c.wrap.addClass("cbp-popup-loading"), c.options.singlePageCallback.call(c, c.dataArray[c.current].url, c.dataArray[c.current].element), c.options.singlePageDeeplinking && (location.href = c.url + "#cbp=" + c.dataArray[c.current].url))
                },
                resetWrap: function() {
                    var a = this;
                    "singlePage" === a.type && a.options.singlePageDeeplinking && (location.href = a.url + "#")
                },
                getIndex: function(a) {
                    var b = this;
                    return a %= b.counterTotal, 0 > a && (a = b.counterTotal + a), a
                },
                close: function(c, d) {
                    function f() {
                        h.content.html(""), h.wrap.detach(), h.cubeportfolio.$obj.removeClass("cbp-popup-singlePageInline-open cbp-popup-singlePageInline-close"), "promise" === c && a.isFunction(d.callback) && d.callback.call(h.cubeportfolio)
                    }

                    function g() {
                        h.options.singlePageInlineInFocus && "promise" !== c ? a("html,body").animate({
                            scrollTop: h.scrollTop
                        }, 350).promise().then(function() {
                            f()
                        }) : f()
                    }
                    var h = this;
                    h.isOpen = !1, "singlePageInline" === h.type ? "open" === c ? (h.wrap.removeClass("cbp-popup-singlePageInline-ready"), a(h.dataArray[h.current].element).closest(".cbp-item").removeClass("cbp-singlePageInline-active"), h.openSinglePageInline(d.blocks, d.currentBlock, d.fromOpen)) : (h.height = 0, h.revertResizeSinglePageInline(), h.wrap.removeClass("cbp-popup-singlePageInline-ready"), h.cubeportfolio.$obj.addClass("cbp-popup-singlePageInline-close"),
                        h.startInline = -1, h.cubeportfolio.$obj.find(".cbp-item").removeClass("cbp-singlePageInline-active"), e.Private.modernBrowser ? h.wrap.one(e.Private.transitionend, function() {
                            g()
                        }) : g()) : "singlePage" === h.type ? (h.resetWrap(), h.wrap.removeClass("cbp-popup-ready"), ("android" === e.Private.browser || "ios" === e.Private.browser) && (a("html").css({
                        position: ""
                    }), h.navigationWrap.appendTo(h.wrap), h.navigationMobile.remove()), a(b).scrollTop(h.scrollTop), setTimeout(function() {
                        h.stopScroll = !0, h.navigationWrap.css({
                            top: h.wrap.scrollTop()
                        }), h.wrap.removeClass("cbp-popup-singlePage-open cbp-popup-singlePage-sticky"), ("ie8" === e.Private.browser || "ie9" === e.Private.browser) && (h.content.html(""), h.wrap.detach(), a("html").css({
                            overflow: "",
                            paddingRight: "",
                            position: ""
                        }), h.navigationWrap.removeAttr("style"))
                    }, 0), h.wrap.one(e.Private.transitionend, function() {
                        h.content.html(""), h.wrap.detach(), a("html").css({
                            overflow: "",
                            paddingRight: "",
                            position: ""
                        }), h.navigationWrap.removeAttr("style")
                    })) : (h.originalStyle ? a("html").attr("style", h.originalStyle) : a("html").css({
                        overflow: "",
                        paddingRight: ""
                    }), a(b).scrollTop(h.scrollTop), h.content.html(""), h.wrap.detach())
                },
                tooggleLoading: function(a) {
                    var b = this;
                    b.stopEvents = a, b.wrap[a ? "addClass" : "removeClass"]("cbp-popup-loading")
                },
                resizeImage: function() {
                    if (this.isOpen) {
                        var c = a(b).height(),
                            d = this.content.find("img"),
                            e = parseInt(d.css("margin-top"), 10) + parseInt(d.css("margin-bottom"), 10);
                        d.css("max-height", c - e + "px")
                    }
                },
                preloadNearbyImages: function() {
                    var a = [],
                        b = this;
                    a.push(b.getIndex(b.current + 1)), a.push(b.getIndex(b.current + 2)), a.push(b.getIndex(b.current + 3)), a.push(b.getIndex(b.current - 1)), a.push(b.getIndex(b.current - 2)), a.push(b.getIndex(b.current - 3));
                    for (var c = a.length - 1; c >= 0; c--) "isImage" === b.dataArray[a[c]].type && b.cubeportfolio.checkSrc(b.dataArray[a[c]].src)
                }
            },
            g = !1,
            h = !1;
        d.prototype.run = function() {
            var b = this,
                d = b.parent,
                e = a(c.body);
            d.lightbox = null, d.options.lightboxDelegate && !g && (g = !0, d.lightbox = Object.create(f), d.lightbox.init(d, "lightbox"), e.on("click.cbp", d.options.lightboxDelegate, function(c) {
                c.preventDefault();
                var e = a(this),
                    f = e.attr("data-cbp-lightbox"),
                    g = b.detectScope(e),
                    h = g.data("cubeportfolio"),
                    i = [];
                h ? h.blocksOn.each(function(b, c) {
                    var e = a(c);
                    e.not(".cbp-item-off") && e.find(d.options.lightboxDelegate).each(function(b, c) {
                        f ? a(c).attr("data-cbp-lightbox") === f && i.push(c) : i.push(c)
                    })
                }) : i = g.find(f ? d.options.lightboxDelegate + "[data-cbp-lightbox=" + f + "]" : d.options.lightboxDelegate), d.lightbox.openLightbox(i, e[0])
            })), d.singlePage = null, d.options.singlePageDelegate && !h && (h = !0, d.singlePage = Object.create(f), d.singlePage.init(d, "singlePage"), e.on("click.cbp", d.options.singlePageDelegate, function(c) {
                c.preventDefault();
                var e = a(this),
                    f = e.attr("data-cbp-singlePage"),
                    g = b.detectScope(e),
                    h = g.data("cubeportfolio"),
                    i = [];
                h ? h.blocksOn.each(function(b, c) {
                    var e = a(c);
                    e.not(".cbp-item-off") && e.find(d.options.singlePageDelegate).each(function(b, c) {
                        f ? a(c).attr("data-cbp-singlePage") === f && i.push(c) : i.push(c)
                    })
                }) : i = g.find(f ? d.options.singlePageDelegate + "[data-cbp-singlePage=" + f + "]" : d.options.singlePageDelegate), d.singlePage.openSinglePage(i, e[0])
            })), d.singlePageInline = null, d.options.singlePageDelegate && (d.singlePageInline = Object.create(f), d.singlePageInline.init(d, "singlePageInline"), d.$obj.on("click.cbp", d.options.singlePageInlineDelegate, function(a) {
                a.preventDefault(), d.singlePageInline.openSinglePageInline(d.blocksOn, this)
            }))
        }, d.prototype.detectScope = function(b) {
            var d, e, f;
            return d = b.closest(".cbp-popup-singlePageInline"), d.length ? (f = b.closest(".cbp", d[0]), f.length ? f : d) : (e = b.closest(".cbp-popup-singlePage"), e.length ? (f = b.closest(".cbp", e[0]), f.length ? f : e) : (f = b.closest(".cbp"), f.length ? f : a(c.body)))
        }, d.prototype.destroy = function() {
            var b = this.parent;
            a(c.body).off("click.cbp"), g = !1, h = !1, b.lightbox && b.lightbox.destroy(), b.singlePage && b.singlePage.destroy(), b.singlePageInline && b.singlePageInline.destroy()
        }, e.Plugins.PopUp = function(a) {
            return new d(a)
        }
    }(jQuery, window, document),
    function(a, b, c, d) {
        "use strict";
        var e = a.fn.cubeportfolio.Constructor;
        e.Private = {
            resizeEventArray: [],
            initResizeEvent: function(a) {
                var b = e.Private;
                0 === b.resizeEventArray.length && b.resizeEvent(), b.resizeEventArray.push(a)
            },
            destroyResizeEvent: function(c) {
                var d = e.Private,
                    f = a.map(d.resizeEventArray, function(a) {
                        return a.instance !== c ? a : void 0
                    });
                d.resizeEventArray = f, 0 === d.resizeEventArray.length && a(b).off("resize.cbp")
            },
            resizeEvent: function() {
                var c, d = e.Private;
                a(b).on("resize.cbp", function() {
                    clearTimeout(c), c = setTimeout(function() {
                        b.innerHeight != screen.height && a.each(d.resizeEventArray, function(a, b) {
                            b.fn.call(b.instance)
                        })
                    }, 50)
                })
            },
            checkInstance: function(b) {
                var c = a.data(this, "cubeportfolio");
                if (!c) throw new Error("cubeportfolio is not initialized. Initialize it before calling " + b + " method!");
                return c
            },
            browserInfo: function() {
                var a, c, f, g = e.Private,
                    h = navigator.appVersion;
                g.browser = -1 !== h.indexOf("MSIE 8.") ? "ie8" : -1 !== h.indexOf("MSIE 9.") ? "ie9" : -1 !== h.indexOf("MSIE 10.") ? "ie10" : b.ActiveXObject || "ActiveXObject" in b ? "ie11" : /android/gi.test(h) ? "android" : /iphone|ipad|ipod/gi.test(h) ? "ios" : /chrome/gi.test(h) ? "chrome" : "", f = g.styleSupport("perspective"), typeof f !== d && (a = g.styleSupport("transition"), g.transitionend = {
                    WebkitTransition: "webkitTransitionEnd",
                    transition: "transitionend"
                } [a], c = g.styleSupport("animation"), g.animationend = {
                    WebkitAnimation: "webkitAnimationEnd",
                    animation: "animationend"
                } [c], g.animationDuration = {
                    WebkitAnimation: "webkitAnimationDuration",
                    animation: "animationDuration"
                } [c], g.animationDelay = {
                    WebkitAnimation: "webkitAnimationDelay",
                    animation: "animationDelay"
                } [c], g.transform = g.styleSupport("transform"), a && c && g.transform && (g.modernBrowser = !0))
            },
            styleSupport: function(a) {
                var b, d = "Webkit" + a.charAt(0).toUpperCase() + a.slice(1),
                    e = c.createElement("div");
                return a in e.style ? b = a : d in e.style && (b = d), e = null, b
            }
        }, e.Private.browserInfo()
    }(jQuery, window, document),
    function(a, b, c, d) {
        "use strict";
        var e = a.fn.cubeportfolio.Constructor;
        e.Public = {
            init: function(a, b) {
                new e(this, a, b)
            },
            destroy: function(b) {
                var c = e.Private.checkInstance.call(this, "destroy");
                c.triggerEvent("beforeDestroy"), a.removeData(this, "cubeportfolio"), c.blocks.removeData("cbp"), c.$obj.removeClass("cbp-ready").removeAttr("style"), c.$ul.removeClass("cbp-wrapper"), e.Private.destroyResizeEvent(c), c.$obj.off(".cbp"), c.blocks.removeClass("cbp-item-off").removeAttr("style"), c.blocks.find(".cbp-item-wrapper").children().unwrap(), c.options.caption && c.$obj.removeClass("cbp-caption-active cbp-caption-" + c.options.caption), c.destroySlider(), c.$ul.unwrap(), c.addedWrapp && c.blocks.unwrap(), a.each(c.plugins, function(a, b) {
                    "function" == typeof b.destroy && b.destroy()
                }), a.isFunction(b) && b.call(c), c.triggerEvent("afterDestroy")
            },
            filter: function(b, c) {
                var f, g = e.Private.checkInstance.call(this, "filter");
                if (!g.isAnimating) {
                    if (g.isAnimating = !0, a.isFunction(c) && g.registerEvent("filterFinish", c, !0), a.isFunction(b)) {
                        if (f = b.call(g, g.blocks), f === d) throw new Error("When you call cubeportfolio API `filter` method with a param of type function you must return the blocks that will be visible.")
                    } else {
                        if (g.options.filterDeeplinking) {
                            var h = location.href.replace(/#cbpf=(.*?)([#\?&]|$)/gi, "");
                            location.href = h + "#cbpf=" + encodeURIComponent(b), g.singlePage && g.singlePage.url && (g.singlePage.url = location.href)
                        }
                        g.defaultFilter = b, f = g.filterConcat(g.defaultFilter)
                    }
                    g.singlePageInline && g.singlePageInline.isOpen ? g.singlePageInline.close("promise", {
                        callback: function() {
                            g.computeFilter(f)
                        }
                    }) : g.computeFilter(f)
                }
            },
            showCounter: function(b, c) {
                var d = e.Private.checkInstance.call(this, "showCounter");
                d.elems = b, a.each(b, function() {
                    var b, c = a(this),
                        e = c.data("filter");
                    b = d.blocks.filter(e).length, c.find(".cbp-filter-counter").text(b)
                }), a.isFunction(c) && c.call(d)
            },
            appendItems: function(b, c) {
                var d = e.Private.checkInstance.call(this, "appendItems"),
                    f = a(b).filter(".cbp-item");
                return d.isAnimating || f.length < 1 ? void(a.isFunction(c) && c.call(d)) : (d.isAnimating = !0, void(d.singlePageInline && d.singlePageInline.isOpen ? d.singlePageInline.close("promise", {
                    callback: function() {
                        d.addItems(f, c)
                    }
                }) : d.addItems(f, c)))
            }
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var c = this;
            c.parent = b, c.searchInput = a(b.options.search), c.searchInput.each(function(b, c) {
                var d = c.getAttribute("data-search");
                d || (d = "*"), a.data(c, "searchData", {
                    value: c.value,
                    el: d
                })
            });
            var d = null;
            c.searchInput.on("keyup.cbp paste.cbp", function(b) {
                b.preventDefault();
                var e = a(this);
                clearTimeout(d), d = setTimeout(function() {
                    c.runEvent.call(c, e)
                }, 300)
            }), c.searchInput.next(".cbp-search-icon").on("click.cbp", function(b) {
                b.preventDefault(), c.runEvent.call(c, a(this).prev().val(""))
            })
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.runEvent = function(b) {
            var c = this,
                d = b.val(),
                e = b.data("searchData"),
                f = new RegExp(d, "i");
            e.value === d || c.parent.isAnimating || (e.value = d, d.length > 0 ? b.attr("value", d) : b.removeAttr("value"), c.parent.$obj.cubeportfolio("filter", function(b) {
                return b.filter(function(b, c) {
                    var d = a(c).find(e.el).text();
                    return d.search(f) > -1 ? !0 : void 0
                })
            }, function() {
                b.trigger("keyup.cbp")
            }))
        }, b.prototype.destroy = function() {
            var b = this;
            b.searchInput.off(".cbp"), b.searchInput.next(".cbp-search-icon").off(".cbp"), b.searchInput.each(function(b, c) {
                a.removeData(c)
            })
        }, c.Plugins.Search = function(a) {
            return "" === a.options.search ? null : new b(a)
        }
    }(jQuery, window, document), "function" != typeof Object.create && (Object.create = function(a) {
        function b() {}
        return b.prototype = a, new b
    }),
    function() {
        for (var a = 0, b = ["moz", "webkit"], c = 0; c < b.length && !window.requestAnimationFrame; ++c) window.requestAnimationFrame = window[b[c] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[b[c] + "CancelAnimationFrame"] || window[b[c] + "CancelRequestAnimationFrame"];
        window.requestAnimationFrame || (window.requestAnimationFrame = function(b) {
            var c = (new Date).getTime(),
                d = Math.max(0, 16 - (c - a)),
                e = window.setTimeout(function() {
                    b(c + d)
                }, d);
            return a = c + d, e
        }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(a) {
            clearTimeout(a)
        })
    }(),
    function(a) {
        "use strict";

        function b(a) {
            var b = this;
            b.parent = a, a.filterLayout = b.filterLayout, a.registerEvent("computeBlocksFinish", function(b) {
                a.blocksOn2On = a.blocksOnInitial.filter(b), a.blocksOn2Off = a.blocksOnInitial.not(b)
            })
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.filterLayout = function() {
            function b() {
                d.blocks.removeClass("cbp-item-on2off cbp-item-off2on cbp-item-on2on").each(function(b, d) {
                    var e = a(d).data("cbp");
                    e.left = e.leftNew, e.top = e.topNew, d.style.left = e.left + "px", d.style.top = e.top + "px", d.style[c.Private.transform] = ""
                }), d.blocksOff.addClass("cbp-item-off"), d.$obj.removeClass("cbp-animation-" + d.options.animationType), d.filterFinish()
            }
            var d = this;
            d.$obj.addClass("cbp-animation-" + d.options.animationType), d.blocksOn2On.addClass("cbp-item-on2on").each(function(b, d) {
                var e = a(d).data("cbp");
                d.style[c.Private.transform] = "translate3d(" + (e.leftNew - e.left) + "px, " + (e.topNew - e.top) + "px, 0)"
            }), d.blocksOn2Off.addClass("cbp-item-on2off"), d.blocksOff2On = d.blocksOn.filter(".cbp-item-off").removeClass("cbp-item-off").addClass("cbp-item-off2on").each(function(b, c) {
                var d = a(c).data("cbp");
                c.style.left = d.leftNew + "px", c.style.top = d.topNew + "px"
            }), d.blocksOn2Off.length ? d.blocksOn2Off.last().data("cbp").wrapper.one(c.Private.animationend, b) : d.blocksOff2On.length ? d.blocksOff2On.last().data("cbp").wrapper.one(c.Private.animationend, b) : b(), d.resizeMainContainer()
        }, b.prototype.destroy = function() {
            var a = this.parent;
            a.$obj.removeClass("cbp-animation-" + a.options.animationType)
        }, c.Plugins.AnimationClassic = function(d) {
            return !c.Private.modernBrowser || a.inArray(d.options.animationType, ["boxShadow", "fadeOut", "flipBottom", "flipOut", "quicksand", "scaleSides", "skew"]) < 0 ? null : new b(d)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(a) {
            var b = this;
            b.parent = a, a.filterLayout = b.filterLayout
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.filterLayout = function() {
            function b() {
                d.wrapper[0].removeChild(e), "sequentially" === d.options.animationType && d.blocksOn.each(function(b, d) {
                    a(d).data("cbp").wrapper[0].style[c.Private.animationDelay] = ""
                }), d.$obj.removeClass("cbp-animation-" + d.options.animationType), d.filterFinish()
            }
            var d = this,
                e = d.$ul[0].cloneNode(!0);
            e.setAttribute("class", "cbp-wrapper-helper"), d.wrapper[0].insertBefore(e, d.$ul[0]), requestAnimationFrame(function() {
                d.$obj.addClass("cbp-animation-" + d.options.animationType), d.blocksOff.addClass("cbp-item-off"), d.blocksOn.removeClass("cbp-item-off").each(function(b, e) {
                    var f = a(e).data("cbp");
                    f.left = f.leftNew, f.top = f.topNew, e.style.left = f.left + "px", e.style.top = f.top + "px", "sequentially" === d.options.animationType && (f.wrapper[0].style[c.Private.animationDelay] = 60 * b + "ms")
                }), d.blocksOn.length ? d.blocksOn.last().data("cbp").wrapper.one(c.Private.animationend, b) : d.blocksOnInitial.length ? d.blocksOnInitial.last().data("cbp").wrapper.one(c.Private.animationend, b) : b(), d.resizeMainContainer()
            })
        }, b.prototype.destroy = function() {
            var a = this.parent;
            a.$obj.removeClass("cbp-animation-" + a.options.animationType)
        }, c.Plugins.AnimationClone = function(d) {
            return !c.Private.modernBrowser || a.inArray(d.options.animationType, ["fadeOutTop", "slideLeft", "sequentially"]) < 0 ? null : new b(d)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(a) {
            var b = this;
            b.parent = a, a.filterLayout = b.filterLayout
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.filterLayout = function() {
            function b() {
                d.wrapper[0].removeChild(e[0]), d.$obj.removeClass("cbp-animation-" + d.options.animationType), d.blocks.each(function(b, d) {
                    a(d).data("cbp").wrapper[0].style[c.Private.animationDelay] = ""
                }), d.filterFinish()
            }
            var d = this,
                e = d.$ul.clone(!0, !0);
            e[0].setAttribute("class", "cbp-wrapper-helper"), d.wrapper[0].insertBefore(e[0], d.$ul[0]);
            var f = e.find(".cbp-item").not(".cbp-item-off");
            d.sortBlocks(f, "top"), f.children(".cbp-item-wrapper").each(function(a, b) {
                b.style[c.Private.animationDelay] = 50 * a + "ms"
            }), requestAnimationFrame(function() {
                d.$obj.addClass("cbp-animation-" + d.options.animationType), d.blocksOff.addClass("cbp-item-off"), d.blocksOn.removeClass("cbp-item-off").each(function(b, d) {
                    var e = a(d).data("cbp");
                    e.left = e.leftNew, e.top = e.topNew, d.style.left = e.left + "px", d.style.top = e.top + "px", e.wrapper[0].style[c.Private.animationDelay] = 50 * b + "ms"
                });
                var e = d.blocksOn.length,
                    g = f.length;
                0 === e && 0 === g ? b() : g > e ? f.last().children(".cbp-item-wrapper").one(c.Private.animationend, b) : d.blocksOn.last().data("cbp").wrapper.one(c.Private.animationend, b), d.resizeMainContainer()
            })
        }, b.prototype.destroy = function() {
            var a = this.parent;
            a.$obj.removeClass("cbp-animation-" + a.options.animationType)
        }, c.Plugins.AnimationCloneDelay = function(d) {
            return !c.Private.modernBrowser || a.inArray(d.options.animationType, ["3dflip", "flipOutDelay", "foldLeft", "frontRow", "rotateRoom", "rotateSides", "scaleDown", "slideDelay", "unfold"]) < 0 ? null : new b(d)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(a) {
            var b = this;
            b.parent = a, a.filterLayout = b.filterLayout
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.filterLayout = function() {
            function b() {
                d.wrapper[0].removeChild(e), d.$obj.removeClass("cbp-animation-" + d.options.animationType), d.filterFinish()
            }
            var d = this,
                e = d.$ul[0].cloneNode(!0);
            e.setAttribute("class", "cbp-wrapper-helper"), d.wrapper[0].insertBefore(e, d.$ul[0]), requestAnimationFrame(function() {
                d.$obj.addClass("cbp-animation-" + d.options.animationType), d.blocksOff.addClass("cbp-item-off"), d.blocksOn.removeClass("cbp-item-off").each(function(b, c) {
                    var d = a(c).data("cbp");
                    d.left = d.leftNew, d.top = d.topNew, c.style.left = d.left + "px", c.style.top = d.top + "px"
                }), d.blocksOn.length ? d.$ul.one(c.Private.animationend, b) : d.blocksOnInitial.length ? a(e).one(c.Private.animationend, b) : b(), d.resizeMainContainer()
            })
        }, b.prototype.destroy = function() {
            var a = this.parent;
            a.$obj.removeClass("cbp-animation-" + a.options.animationType)
        }, c.Plugins.AnimationWrapper = function(d) {
            return !c.Private.modernBrowser || a.inArray(d.options.animationType, ["bounceBottom", "bounceLeft", "bounceTop", "moveLeft"]) < 0 ? null : new b(d)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var c = this;
            c.parent = b, b.registerEvent("initFinish", function() {
                b.$obj.on("click.cbp", ".cbp-caption-defaultWrap", function(c) {
                    if (c.preventDefault(), !b.isAnimating) {
                        b.isAnimating = !0;
                        var d = a(this),
                            e = d.next(),
                            f = d.parent(),
                            g = {
                                position: "relative",
                                height: e.outerHeight(!0)
                            },
                            h = {
                                position: "relative",
                                height: 0
                            };
                        if (b.$obj.addClass("cbp-caption-expand-active"), f.hasClass("cbp-caption-expand-open")) {
                            var i = h;
                            h = g, g = i, f.removeClass("cbp-caption-expand-open")
                        }
                        e.css(g), b.$obj.one("pluginResize.cbp", function() {
                            b.isAnimating = !1, b.$obj.removeClass("cbp-caption-expand-active"), 0 === g.height && (f.removeClass("cbp-caption-expand-open"), e.attr("style", ""))
                        }), b.layoutAndAdjustment(), e.css(h), requestAnimationFrame(function() {
                            f.addClass("cbp-caption-expand-open"), e.css(g), "slider" === b.options.layoutMode && b.updateSlider(), b.triggerEvent("resizeGrid")
                        })
                    }
                })
            }, !0)
        }
        var c = a.fn.cubeportfolio.Constructor;
        b.prototype.destroy = function() {
            this.parent.$obj.find(".cbp-caption-defaultWrap").off("click.cbp").parent().removeClass("cbp-caption-expand-active")
        }, c.Plugins.CaptionExpand = function(a) {
            return "expand" !== a.options.caption ? null : new b(a)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var d = a.Deferred();
            b.pushQueue("delayFrame", d), b.registerEvent("initEndWrite", function() {
                b.blocksOn.each(function(a, d) {
                    d.style[c.Private.animationDelay] = a * b.options.displayTypeSpeed + "ms"
                }), b.$obj.addClass("cbp-displayType-bottomToTop"), b.blocksOn.last().one(c.Private.animationend, function() {
                    b.$obj.removeClass("cbp-displayType-bottomToTop"), b.blocksOn.each(function(a, b) {
                        b.style[c.Private.animationDelay] = ""
                    }), d.resolve()
                })
            }, !0)
        }
        var c = a.fn.cubeportfolio.Constructor;
        c.Plugins.BottomToTop = function(a) {
            return c.Private.modernBrowser && "bottomToTop" === a.options.displayType && 0 !== a.blocksOn.length ? new b(a) : null
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var d = a.Deferred();
            b.pushQueue("delayFrame", d), b.registerEvent("initEndWrite", function() {
                b.obj.style[c.Private.animationDuration] = b.options.displayTypeSpeed + "ms", b.$obj.addClass("cbp-displayType-fadeInToTop"), b.$obj.one(c.Private.animationend, function() {
                    b.$obj.removeClass("cbp-displayType-fadeInToTop"), b.obj.style[c.Private.animationDuration] = "", d.resolve()
                })
            }, !0)
        }
        var c = a.fn.cubeportfolio.Constructor;
        c.Plugins.FadeInToTop = function(a) {
            return c.Private.modernBrowser && "fadeInToTop" === a.options.displayType && 0 !== a.blocksOn.length ? new b(a) : null
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var d = a.Deferred();
            b.pushQueue("delayFrame", d), b.registerEvent("initEndWrite", function() {
                b.obj.style[c.Private.animationDuration] = b.options.displayTypeSpeed + "ms", b.$obj.addClass("cbp-displayType-lazyLoading"), b.$obj.one(c.Private.animationend, function() {
                    b.$obj.removeClass("cbp-displayType-lazyLoading"), b.obj.style[c.Private.animationDuration] = "", d.resolve()
                })
            }, !0)
        }
        var c = a.fn.cubeportfolio.Constructor;
        c.Plugins.LazyLoading = function(a) {
            return !c.Private.modernBrowser || "lazyLoading" !== a.options.displayType && "fadeIn" !== a.options.displayType || 0 === a.blocksOn.length ? null : new b(a)
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";

        function b(b) {
            var d = a.Deferred();
            b.pushQueue("delayFrame", d), b.registerEvent("initEndWrite", function() {
                b.blocksOn.each(function(a, d) {
                    d.style[c.Private.animationDelay] = a * b.options.displayTypeSpeed + "ms"
                }), b.$obj.addClass("cbp-displayType-sequentially"), b.blocksOn.last().one(c.Private.animationend, function() {
                    b.$obj.removeClass("cbp-displayType-sequentially"), b.blocksOn.each(function(a, b) {
                        b.style[c.Private.animationDelay] = ""
                    }), d.resolve()
                })
            }, !0)
        }
        var c = a.fn.cubeportfolio.Constructor;
        c.Plugins.DisplaySequentially = function(a) {
            return c.Private.modernBrowser && "sequentially" === a.options.displayType && 0 !== a.blocksOn.length ? new b(a) : null
        }
    }(jQuery, window, document),
    function(a) {
        "use strict";
        var b = a.fn.cubeportfolio.Constructor;
        a.extend(b.prototype, {
            mosaicLayoutReset: function() {
                var b = this;
                b.blocksAreSorted = !1, b.blocksOn.each(function(b, c) {
                    a(c).data("cbp").pack = !1
                })
            },
            mosaicLayout: function() {
                var a, b = this,
                    c = b.blocksOn.length,
                    d = {};
                for (b.freeSpaces = [{
                        leftStart: 0,
                        leftEnd: b.widthAvailable,
                        topStart: 0,
                        topEnd: Math.pow(2, 18)
                    }], a = 0; c > a; a++) {
                    if (d = b.getSpaceIndexAndBlock(), null === d) return b.sortBlocksToPreventGaps(), void b.mosaicLayout();
                    b.generateF1F2(d.spaceIndex, d.dataBlock), b.generateG1G2G3G4(d.dataBlock), b.cleanFreeSpaces(), b.addHeightToBlocks()
                }
                b.blocksAreSorted && b.sortBlocks(b.blocksOn, "topNew")
            },
            getSpaceIndexAndBlock: function() {
                var b = this,
                    c = null;
                return a.each(b.freeSpaces, function(d, e) {
                    var f = e.leftEnd - e.leftStart,
                        g = e.topEnd - e.topStart;
                    return b.blocksOn.each(function(b, h) {
                        var i = a(h).data("cbp");
                        if (i.pack !== !0) return i.widthAndGap <= f && i.heightAndGap <= g ? (i.pack = !0, c = {
                            spaceIndex: d,
                            dataBlock: i
                        }, i.leftNew = e.leftStart, i.topNew = e.topStart, !1) : void 0
                    }), !b.blocksAreSorted && b.options.sortToPreventGaps && d > 0 ? (c = null, !1) : null !== c ? !1 : void 0
                }), c
            },
            generateF1F2: function(a, b) {
                var c = this,
                    d = c.freeSpaces[a],
                    e = {
                        leftStart: d.leftStart + b.widthAndGap,
                        leftEnd: d.leftEnd,
                        topStart: d.topStart,
                        topEnd: d.topEnd
                    },
                    f = {
                        leftStart: d.leftStart,
                        leftEnd: d.leftEnd,
                        topStart: d.topStart + b.heightAndGap,
                        topEnd: d.topEnd
                    };
                c.freeSpaces.splice(a, 1), e.leftEnd > e.leftStart && e.topEnd > e.topStart && (c.freeSpaces.splice(a, 0, e), a++), f.leftEnd > f.leftStart && f.topEnd > f.topStart && c.freeSpaces.splice(a, 0, f)
            },
            generateG1G2G3G4: function(b) {
                var c = this,
                    d = [];
                a.each(c.freeSpaces, function(a, e) {
                    var f = c.intersectSpaces(e, b);
                    return null === f ? void d.push(e) : (c.generateG1(e, f, d), c.generateG2(e, f, d), c.generateG3(e, f, d), void c.generateG4(e, f, d))
                }), c.freeSpaces = d
            },
            intersectSpaces: function(a, b) {
                var c = {
                    leftStart: b.leftNew,
                    leftEnd: b.leftNew + b.widthAndGap,
                    topStart: b.topNew,
                    topEnd: b.topNew + b.heightAndGap
                };
                if (a.leftStart === c.leftStart && a.leftEnd === c.leftEnd && a.topStart === c.topStart && a.topEnd === c.topEnd) return null;
                var d = Math.max(a.leftStart, c.leftStart),
                    e = Math.min(a.leftEnd, c.leftEnd),
                    f = Math.max(a.topStart, c.topStart),
                    g = Math.min(a.topEnd, c.topEnd);
                return d >= e || f >= g ? null : {
                    leftStart: d,
                    leftEnd: e,
                    topStart: f,
                    topEnd: g
                }
            },
            generateG1: function(a, b, c) {
                a.topStart !== b.topStart && c.push({
                    leftStart: a.leftStart,
                    leftEnd: a.leftEnd,
                    topStart: a.topStart,
                    topEnd: b.topStart
                })
            },
            generateG2: function(a, b, c) {
                a.leftEnd !== b.leftEnd && c.push({
                    leftStart: b.leftEnd,
                    leftEnd: a.leftEnd,
                    topStart: a.topStart,
                    topEnd: a.topEnd
                })
            },
            generateG3: function(a, b, c) {
                a.topEnd !== b.topEnd && c.push({
                    leftStart: a.leftStart,
                    leftEnd: a.leftEnd,
                    topStart: b.topEnd,
                    topEnd: a.topEnd
                })
            },
            generateG4: function(a, b, c) {
                a.leftStart !== b.leftStart && c.push({
                    leftStart: a.leftStart,
                    leftEnd: b.leftStart,
                    topStart: a.topStart,
                    topEnd: a.topEnd
                })
            },
            cleanFreeSpaces: function() {
                var a = this;
                a.freeSpaces.sort(function(a, b) {
                    return a.topStart > b.topStart ? 1 : a.topStart < b.topStart ? -1 : a.leftStart > b.leftStart ? 1 : a.leftStart < b.leftStart ? -1 : 0
                }), a.correctSubPixelValues(), a.removeNonMaximalFreeSpaces()
            },
            correctSubPixelValues: function() {
                var a, b, c, d, e = this;
                for (a = 0, b = e.freeSpaces.length - 1; b > a; a++) c = e.freeSpaces[a], d = e.freeSpaces[a + 1], d.topStart - c.topStart <= 1 && (d.topStart = c.topStart)
            },
            removeNonMaximalFreeSpaces: function() {
                var b = this;
                b.uniqueFreeSpaces(), b.freeSpaces = a.map(b.freeSpaces, function(c, d) {
                    return a.each(b.freeSpaces, function(a, b) {
                        return d !== a && b.leftStart <= c.leftStart && b.leftEnd >= c.leftEnd && b.topStart <= c.topStart && b.topEnd >= c.topEnd ? (c = null, !1) : void 0
                    }), c
                })
            },
            uniqueFreeSpaces: function() {
                var b = this,
                    c = [];
                a.each(b.freeSpaces, function(b, d) {
                    a.each(c, function(a, b) {
                        return b.leftStart === d.leftStart && b.leftEnd === d.leftEnd && b.topStart === d.topStart && b.topEnd === d.topEnd ? (d = null, !1) : void 0
                    }), null !== d && c.push(d)
                }), b.freeSpaces = c
            },
            addHeightToBlocks: function() {
                var b = this;
                if (!(b.freeSpaces.length > 1)) {
                    var c = b.freeSpaces[0].topStart;
                    b.blocksOn.each(function(b, d) {
                        var e = a(d).data("cbp");
                        if (e.pack === !0) {
                            var f = c - e.topNew - e.heightAndGap;
                            0 > f && (d.style.height = e.height + f + "px")
                        }
                    })
                }
            },
            sortBlocksToPreventGaps: function() {
                var b = this;
                b.blocksAreSorted = !0, b.blocksOn.sort(function(b, c) {
                    var d = a(b).data("cbp"),
                        e = a(c).data("cbp");
                    return d.widthAndGap < e.widthAndGap ? 1 : d.widthAndGap > e.widthAndGap ? -1 : d.heightAndGap < e.heightAndGap ? 1 : d.heightAndGap > e.heightAndGap ? -1 : d.index > e.index ? 1 : d.index < e.index ? -1 : void 0
                }), b.blocksOn.each(function(b, c) {
                    a(c).data("cbp").pack = !1, c.style.height = ""
                })
            },
            sortBlocks: function(b, c) {
                b.sort(function(b, d) {
                    var e = a(b).data("cbp"),
                        f = a(d).data("cbp");
                    return e[c] > f[c] ? 1 : e[c] < f[c] ? -1 : e.leftNew > f.leftNew ? 1 : e.leftNew < f.leftNew ? -1 : 0
                })
            }
        })
    }(jQuery, window, document),
    function(a, b, c, d) {
        "use strict";
        var e = a.fn.cubeportfolio.Constructor;
        a.extend(e.prototype, {
            sliderMarkup: function() {
                var b = this;
                b.sliderStopEvents = !1, b.sliderActive = 0, b.$obj.one("initComplete.cbp", function() {
                    b.$obj.addClass("cbp-mode-slider")
                }), b.nav = a("<div/>", {
                    "class": "cbp-nav"
                }), b.nav.on("click.cbp", "[data-slider-action]", function(c) {
                    if (c.preventDefault(), c.stopImmediatePropagation(), c.stopPropagation(), !b.sliderStopEvents) {
                        var d = a(this),
                            e = d.attr("data-slider-action");
                        b[e + "Slider"] && b[e + "Slider"](d)
                    }
                }), b.options.showNavigation && (b.controls = a("<div/>", {
                    "class": "cbp-nav-controls"
                }), b.navPrev = a("<div/>", {
                    "class": "cbp-nav-prev",
                    "data-slider-action": "prev"
                }).appendTo(b.controls), b.navNext = a("<div/>", {
                    "class": "cbp-nav-next",
                    "data-slider-action": "next"
                }).appendTo(b.controls), b.controls.appendTo(b.nav)), b.options.showPagination && (b.navPagination = a("<div/>", {
                    "class": "cbp-nav-pagination"
                }).appendTo(b.nav)), (b.controls || b.navPagination) && b.nav.appendTo(b.$obj), b.updateSliderPagination(), b.options.auto && (b.options.autoPauseOnHover && (b.mouseIsEntered = !1, b.$obj.on("mouseenter.cbp", function() {
                    b.mouseIsEntered = !0, b.stopSliderAuto()
                }).on("mouseleave.cbp", function() {
                    b.mouseIsEntered = !1, b.startSliderAuto()
                })), b.startSliderAuto()), b.options.drag && e.Private.modernBrowser && b.dragSlider()
            },
            updateSlider: function() {
                var a = this;
                a.updateSliderPosition(), a.updateSliderPagination()
            },
            updateSliderPagination: function() {
                var b, c, d = this;
                if (d.options.showPagination) {
                    for (b = Math.ceil(d.blocksOn.length / d.cols), d.navPagination.empty(), c = b - 1; c >= 0; c--) a("<div/>", {
                        "class": "cbp-nav-pagination-item",
                        "data-slider-action": "jumpTo"
                    }).appendTo(d.navPagination);
                    d.navPaginationItems = d.navPagination.children()
                }
                d.enableDisableNavSlider()
            },
            destroySlider: function() {
                var b = this;
                "slider" === b.options.layoutMode && (b.$obj.off(".cbp"), b.$obj.removeClass("cbp-mode-slider"), b.options.showNavigation && (b.nav.off(".cbp"), b.nav.remove()), b.navPagination && b.navPagination.remove(), b.$ul.removeAttr("style"), b.$ul.off(".cbp"), a(c).off(".cbp"), b.options.auto && b.stopSliderAuto())
            },
            nextSlider: function() {
                var a = this;
                if (a.isEndSlider()) {
                    if (!a.isRewindNav()) return;
                    a.sliderActive = 0
                } else a.options.scrollByPage ? a.sliderActive = Math.min(a.sliderActive + a.cols, a.blocksOn.length - a.cols) : a.sliderActive += 1;
                a.goToSlider()
            },
            prevSlider: function() {
                var a = this;
                if (a.isStartSlider()) {
                    if (!a.isRewindNav()) return;
                    a.sliderActive = a.blocksOn.length - a.cols
                } else a.options.scrollByPage ? a.sliderActive = Math.max(0, a.sliderActive - a.cols) : a.sliderActive -= 1;
                a.goToSlider()
            },
            jumpToSlider: function(a) {
                var b = this,
                    c = Math.min(a.index() * b.cols, b.blocksOn.length - b.cols);
                c !== b.sliderActive && (b.sliderActive = c, b.goToSlider())
            },
            jumpDragToSlider: function(a) {
                var b, c, d, e = this,
                    f = a > 0 ? !0 : !1;
                e.options.scrollByPage ? (b = e.cols * e.columnWidth, c = e.cols) : (b = e.columnWidth, c = 1), a = Math.abs(a), d = Math.floor(a / b) * c, a % b > 20 && (d += c), e.sliderActive = f ? Math.min(e.sliderActive + d, e.blocksOn.length - e.cols) : Math.max(0, e.sliderActive - d), e.goToSlider()
            },
            isStartSlider: function() {
                return 0 === this.sliderActive
            },
            isEndSlider: function() {
                var a = this;
                return a.sliderActive + a.cols > a.blocksOn.length - 1
            },
            goToSlider: function() {
                var a = this;
                a.enableDisableNavSlider(), a.updateSliderPosition()
            },
            startSliderAuto: function() {
                var a = this;
                return a.isDrag ? void a.stopSliderAuto() : void(a.timeout = setTimeout(function() {
                    a.nextSlider(), a.startSliderAuto()
                }, a.options.autoTimeout))
            },
            stopSliderAuto: function() {
                clearTimeout(this.timeout)
            },
            enableDisableNavSlider: function() {
                var a, b, c = this;
                c.isRewindNav() || (b = c.isStartSlider() ? "addClass" : "removeClass", c.navPrev[b]("cbp-nav-stop"), b = c.isEndSlider() ? "addClass" : "removeClass", c.navNext[b]("cbp-nav-stop")), c.options.showPagination && (a = c.options.scrollByPage ? Math.ceil(c.sliderActive / c.cols) : c.isEndSlider() ? c.navPaginationItems.length - 1 : Math.floor(c.sliderActive / c.cols), c.navPaginationItems.removeClass("cbp-nav-pagination-active").eq(a).addClass("cbp-nav-pagination-active"))
            },
            isRewindNav: function() {
                var a = this;
                return a.options.showNavigation ? a.blocksOn.length <= a.cols ? !1 : a.options.rewindNav ? !0 : !1 : !0
            },
            sliderItemsLength: function() {
                return this.blocksOn.length <= this.cols
            },
            sliderLayout: function() {
                var b = this;
                b.blocksOn.each(function(c, d) {
                    var e = a(d).data("cbp");
                    e.leftNew = b.columnWidth * c, e.topNew = 0, b.sliderFreeSpaces.push({
                        topStart: e.heightAndGap
                    })
                }), b.getFreeSpacesForSlider(), b.$ul.width(b.columnWidth * b.blocksOn.length - b.options.gapVertical)
            },
            getFreeSpacesForSlider: function() {
                var a = this;
                a.freeSpaces = a.sliderFreeSpaces.slice(a.sliderActive, a.sliderActive + a.cols), a.freeSpaces.sort(function(a, b) {
                    return a.topStart > b.topStart ? 1 : a.topStart < b.topStart ? -1 : void 0
                })
            },
            updateSliderPosition: function() {
                var a = this,
                    b = -a.sliderActive * a.columnWidth;
                e.Private.modernBrowser ? a.$ul[0].style[e.Private.transform] = "translate3d(" + b + "px, 0px, 0)" : a.$ul[0].style.left = b + "px", a.getFreeSpacesForSlider(), a.resizeMainContainer()
            },
            dragSlider: function() {
                function f(b) {
                    if (!q.sliderItemsLength()) {
                        if (u ? p = b : b.preventDefault(), q.options.auto && q.stopSliderAuto(), s) return void a(m).one("click.cbp", function() {
                            return !1
                        });
                        m = a(b.target), k = j(b).x, l = 0, n = -q.sliderActive * q.columnWidth, o = q.columnWidth * (q.blocksOn.length - q.cols), r.on(t.move, h), r.on(t.end, g), q.$obj.addClass("cbp-mode-slider-dragStart")
                    }
                }

                function g() {
                    q.$obj.removeClass("cbp-mode-slider-dragStart"), s = !0, 0 !== l ? (m.one("click.cbp", function() {
                        return !1
                    }), q.jumpDragToSlider(l), q.$ul.one(e.Private.transitionend, i)) : i.call(q), r.off(t.move), r.off(t.end)
                }

                function h(a) {
                    l = k - j(a).x, (l > 8 || -8 > l) && a.preventDefault(), q.isDrag = !0;
                    var b = n - l;
                    0 > l && n > l ? b = (n - l) / 5 : l > 0 && -o > n - l && (b = -o + (o + n - l) / 5), e.Private.modernBrowser ? q.$ul[0].style[e.Private.transform] = "translate3d(" + b + "px, 0px, 0)" : q.$ul[0].style.left = b + "px"
                }

                function i() {
                    if (s = !1, q.isDrag = !1, q.options.auto) {
                        if (q.mouseIsEntered) return;
                        q.startSliderAuto()
                    }
                }

                function j(a) {
                    return a.originalEvent !== d && a.originalEvent.touches !== d && (a = a.originalEvent.touches[0]), {
                        x: a.pageX,
                        y: a.pageY
                    }
                }
                var k, l, m, n, o, p, q = this,
                    r = a(c),
                    s = !1,
                    t = {},
                    u = !1;
                q.isDrag = !1, "ontouchstart" in b || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0 ? (t = {
                    start: "touchstart.cbp",
                    move: "touchmove.cbp",
                    end: "touchend.cbp"
                }, u = !0) : t = {
                    start: "mousedown.cbp",
                    move: "mousemove.cbp",
                    end: "mouseup.cbp"
                }, q.$ul.on(t.start, f)
            },
            sliderLayoutReset: function() {
                var a = this;
                a.freeSpaces = [], a.sliderFreeSpaces = []
            }
        })
    }(jQuery, window, document);
(function($, window, document, undefined) {
    'use strict';
    $('#js-grid-meet-the-team').cubeportfolio({
        defaultFilter: '*',
        filters: '#js-filters-meet-the-team',
        layoutMode: 'grid',
        animationType: 'sequentially',
        gapHorizontal: 50,
        gapVertical: 40,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 5
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'fadeIn',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function(url, element) {
            var t = this;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            }).done(function(result) {
                t.updateSinglePage(result);
            }).fail(function() {
                t.updateSinglePage('Error! Please refresh the page!');
            });
        },
    });
})(jQuery, window, document);

function initialize() {
    var center = new google.maps.LatLng(medicaldirectory_data.ins_lat, medicaldirectory_data.ins_lng);
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var markers = [];
    var infowindow = new google.maps.InfoWindow();
    var dirs = medicaldirectory_data.dirs;
    if (dirs != '') {
        for (i = 0; i < dirs.length; i++) {
            var latLng = new google.maps.LatLng(dirs[i].lat, dirs[i].lng);
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: dirs[i].marker_icon,
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent('<div id="map-marker-info" style="overflow: auto; cursor: default; clear: both; position: relative; border-radius: 4px; padding: 15px; border-color: rgb(255, 255, 255); border-style: solid; background-color: rgb(255, 255, 255); border-width: 1px; width: 275px; min-height: 130px;"><div style="overflow: hidden;" class="map-marker-info"><a  style="text-decoration: none;" href="' + dirs[i].link + '"> <span style="background-image: url(' + dirs[i].image + ')" class="list-cover has-image"></span><span class="address"><strong>' + dirs[i].title + '</strong></span> <span class="address" style="margin-top:15px">' + dirs[i].address + '</span></a></div></div>');
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    var markerCluster = new MarkerClusterer(map, markers);
}

function cs_toggle_street_view(btn) {
    var toggle = panorama.getVisible();
    if (toggle == false) {
        if (btn == 'streetview') {
            panorama.setVisible(true);
        }
    } else {
        if (btn == 'mapview') {
            panorama.setVisible(false);
        }
    }
}
google.maps.event.addDomListener(window, 'load', initialize);
jQuery("#search_toggle_div").on('click', function(e) {
    setTimeout(function() {
        initialize();
        google.maps.event.trigger(map, 'resize');
    }, 500)
});

function initialize_address() {
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
    });
}
google.maps.event.addDomListener(window, 'load', initialize_address);
jQuery('input[name="range"]').on("change", function() {
    jQuery('#rvalue').html(jQuery(this).val());
    jQuery('#range_value').val(jQuery(this).val());
});

function toggle_top_map(divId) {
    jQuery("#" + divId).toggle('slow');
    setTimeout(function() {
        initialize();
        google.maps.event.trigger(map, 'resize');
    }, 500);
}

function toggle_top_search(divId) {
    jQuery("#" + divId).toggle('slow');
    initialize();
    google.maps.event.trigger(map, 'resize');
}

function send_message_iv() {
    var formc = jQuery("#message-pop");
    if (jQuery.trim(jQuery("#message-content", formc).val()) == "") {
        alert("Please put your message");
    } else {
        var ajaxurl = medicaldirectory_data.ajaxurl;
        var loader_image = medicaldirectory_data.loading_image;
        jQuery('#update_message_popup').html(loader_image);
        var search_params = {
            "action": "iv_directories_message_send",
            "form_data": jQuery("#message-pop").serialize(),
        };
        jQuery.ajax({
            url: ajaxurl,
            dataType: "json",
            type: "post",
            data: search_params,
            success: function(response) {
                jQuery('#update_message_popup').html(response.msg);
                jQuery("#message-pop").trigger('reset');
            }
        });
    }
}

function send_message_claim() {
    var isLogged = medicaldirectory_data.current_user_id;
    if (isLogged == "0") {
        alert(medicaldirectory_data.Login_claim);
    } else {
        var form = jQuery("#message-claim");
        if (jQuery.trim(jQuery("#message-content", form).val()) == "") {
            alert("Please put your message");
        } else {
            var ajaxurl = medicaldirectory_data.ajaxurl;
            var loader_image = medicaldirectory_data.loading_image;
            jQuery('#update_message_claim').html(loader_image);
            var search_params = {
                "action": "iv_directories_claim_send",
                "form_data": jQuery("#message-claim").serialize(),
            };
            jQuery.ajax({
                url: ajaxurl,
                dataType: "json",
                type: "post",
                data: search_params,
                success: function(response) {
                    jQuery('#update_message_claim').html('   ' + response.msg);
                    jQuery("#message-claim").trigger('reset');
                }
            });
        }
    }
}

function save_favorite(id) {
    var isLogged = medicaldirectory_data.current_user_id;
    if (isLogged == "0") {
        alert(medicaldirectory_data.login_favorite);
    } else {
        var ajaxurl = medicaldirectory_data.ajaxurl;
        var search_params = {
            "action": "iv_directories_save_favorite",
            "data": "id=" + id,
        };
        jQuery.ajax({
            url: ajaxurl,
            dataType: "json",
            type: "post",
            data: search_params,
            success: function(response) {
                jQuery("#fav_dir" + id).html('<a data-toggle="tooltip" data-placement="bottom" title="' + medicaldirectory_data.Add_to_Favorites + '" href="javascript:;" onclick="save_unfavorite(' + id + ')" ><span class="hide-sm"><i class="fa fa-heart  red-heart fa-lg"></i>&nbsp;&nbsp; </span></a>');
            }
        });
    }
}

function save_unfavorite(id) {
    var isLogged = medicaldirectory_data.current_user_id;
    if (isLogged == "0") {
        alert(medicaldirectory_data.login_message);
    } else {
        var ajaxurl = medicaldirectory_data.ajaxurl;
        var search_params = {
            "action": "iv_directories_save_un_favorite",
            "data": "id=" + id,
        };
        jQuery.ajax({
            url: ajaxurl,
            dataType: "json",
            type: "post",
            data: search_params,
            success: function(response) {
                jQuery("#fav_dir" + id).html('<a data-toggle="tooltip" data-placement="bottom" title="' + medicaldirectory_data.Add_to_Favorites + '" href="javascript:;" onclick="save_favorite(' + id + ')" ><span class="hide-sm"><i class="fa fa-heart fa-lg "></i>&nbsp;&nbsp; </span></a>');
            }
        });
    }
}
(function($, window, document, undefined) {
    var slider = $('.cbp-slider');
    slider.find('.cbp-slider-item').addClass('cbp-item');
    slider.cubeportfolio({
        layoutMode: 'slider',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
    });
})

function save_rating(post_id, rating_text, rating_value) {
    var isLogged = medicaldirectory_data.current_user_id;
    if (isLogged == "0") {
        alert(medicaldirectory_data.login_review);
    } else {
        var ajaxurl = medicaldirectory_data.ajaxurl;
        var search_params = {
            "action": "iv_directories_save_rating",
            "data": "id=" + post_id + "&rating_text=" + rating_text + "&rating_value=" + rating_value,
        };
        jQuery.ajax({
            url: ajaxurl,
            dataType: "json",
            type: "post",
            data: search_params,
            success: function(response) {
                var ii = 0;
                for (ii = 0; ii <= 5; ii++) {
                    jQuery("#" + rating_text + "_" + ii).removeClass("fa-star");
                    jQuery("#" + rating_text + "_" + ii).addClass("fa-star-o");
                }
                for (ii = 0; ii <= rating_value; ii++) {
                    jQuery("#" + rating_text + "_" + ii).removeClass("fa-star-o");
                    jQuery("#" + rating_text + "_" + ii).removeClass("fa-star");
                    jQuery("#" + rating_text + "_" + ii).addClass("fa-star");
                }
            }
        });
    }
};