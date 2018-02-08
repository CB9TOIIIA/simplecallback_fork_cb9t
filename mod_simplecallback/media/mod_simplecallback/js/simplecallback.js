(function ($) {
    /*
     jQuery Masked Input Plugin
     Copyright (c) 2007 - 2014 Josh Bush (digitalbush.com)
     Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
     Version: 1.4.0
     */
    !function(factory) {
        "function" == typeof define && define.amd ? define([ "jquery" ], factory) : factory("object" == typeof exports ? require("jquery") : jQuery);
    }(function($) {
        var caretTimeoutId, ua = navigator.userAgent, iPhone = /iphone/i.test(ua), chrome = /chrome/i.test(ua), android = /android/i.test(ua);
        $.mask = {
            definitions: {
                "9": "[0-9]",
                a: "[A-Za-z]",
                "*": "[A-Za-z0-9]"
            },
            autoclear: !0,
            dataName: "rawMaskFn",
            placeholder: "_"
        }, $.fn.extend({
            caret: function(begin, end) {
                var range;
                if (0 !== this.length && !this.is(":hidden")) return "number" == typeof begin ? (end = "number" == typeof end ? end : begin,
                    this.each(function() {
                        this.setSelectionRange ? this.setSelectionRange(begin, end) : this.createTextRange && (range = this.createTextRange(),
                            range.collapse(!0), range.moveEnd("character", end), range.moveStart("character", begin),
                            range.select());
                    })) : (this[0].setSelectionRange ? (begin = this[0].selectionStart, end = this[0].selectionEnd) : document.selection && document.selection.createRange && (range = document.selection.createRange(),
                    begin = 0 - range.duplicate().moveStart("character", -1e5), end = begin + range.text.length),
                {
                    begin: begin,
                    end: end
                });
            },
            unmask: function() {
                return this.trigger("unmask");
            },
            mask: function(mask, settings) {
                var input, defs, tests, partialPosition, firstNonMaskPos, lastRequiredNonMaskPos, len, oldVal;
                if (!mask && this.length > 0) {
                    input = $(this[0]);
                    var fn = input.data($.mask.dataName);
                    return fn ? fn() : void 0;
                }
                return settings = $.extend({
                    autoclear: $.mask.autoclear,
                    placeholder: $.mask.placeholder,
                    completed: null
                }, settings), defs = $.mask.definitions, tests = [], partialPosition = len = mask.length,
                    firstNonMaskPos = null, $.each(mask.split(""), function(i, c) {
                    "?" == c ? (len--, partialPosition = i) : defs[c] ? (tests.push(new RegExp(defs[c])),
                    null === firstNonMaskPos && (firstNonMaskPos = tests.length - 1), partialPosition > i && (lastRequiredNonMaskPos = tests.length - 1)) : tests.push(null);
                }), this.trigger("unmask").each(function() {
                    function tryFireCompleted() {
                        if (settings.completed) {
                            for (var i = firstNonMaskPos; lastRequiredNonMaskPos >= i; i++) if (tests[i] && buffer[i] === getPlaceholder(i)) return;
                            settings.completed.call(input);
                        }
                    }
                    function getPlaceholder(i) {
                        return settings.placeholder.charAt(i < settings.placeholder.length ? i : 0);
                    }
                    function seekNext(pos) {
                        for (;++pos < len && !tests[pos]; ) ;
                        return pos;
                    }
                    function seekPrev(pos) {
                        for (;--pos >= 0 && !tests[pos]; ) ;
                        return pos;
                    }
                    function shiftL(begin, end) {
                        var i, j;
                        if (!(0 > begin)) {
                            for (i = begin, j = seekNext(end); len > i; i++) if (tests[i]) {
                                if (!(len > j && tests[i].test(buffer[j]))) break;
                                buffer[i] = buffer[j], buffer[j] = getPlaceholder(j), j = seekNext(j);
                            }
                            writeBuffer(), input.caret(Math.max(firstNonMaskPos, begin));
                        }
                    }
                    function shiftR(pos) {
                        var i, c, j, t;
                        for (i = pos, c = getPlaceholder(pos); len > i; i++) if (tests[i]) {
                            if (j = seekNext(i), t = buffer[i], buffer[i] = c, !(len > j && tests[j].test(t))) break;
                            c = t;
                        }
                    }
                    function androidInputEvent() {
                        var curVal = input.val(), pos = input.caret();
                        if (curVal.length < oldVal.length) {
                            for (checkVal(!0); pos.begin > 0 && !tests[pos.begin - 1]; ) pos.begin--;
                            if (0 === pos.begin) for (;pos.begin < firstNonMaskPos && !tests[pos.begin]; ) pos.begin++;
                            input.caret(pos.begin, pos.begin);
                        } else {
                            for (checkVal(!0); pos.begin < len && !tests[pos.begin]; ) pos.begin++;
                            input.caret(pos.begin, pos.begin);
                        }
                        tryFireCompleted();
                    }
                    function blurEvent() {
                        checkVal(), input.val() != focusText && input.change();
                    }
                    function keydownEvent(e) {
                        if (!input.prop("readonly")) {
                            var pos, begin, end, k = e.which || e.keyCode;
                            oldVal = input.val(), 8 === k || 46 === k || iPhone && 127 === k ? (pos = input.caret(),
                                begin = pos.begin, end = pos.end, end - begin === 0 && (begin = 46 !== k ? seekPrev(begin) : end = seekNext(begin - 1),
                                end = 46 === k ? seekNext(end) : end), clearBuffer(begin, end), shiftL(begin, end - 1),
                                e.preventDefault()) : 13 === k ? blurEvent.call(this, e) : 27 === k && (input.val(focusText),
                                input.caret(0, checkVal()), e.preventDefault());
                        }
                    }
                    function keypressEvent(e) {
                        if (!input.prop("readonly")) {
                            var p, c, next, k = e.which || e.keyCode, pos = input.caret();
                            if (!(e.ctrlKey || e.altKey || e.metaKey || 32 > k) && k && 13 !== k) {
                                if (pos.end - pos.begin !== 0 && (clearBuffer(pos.begin, pos.end), shiftL(pos.begin, pos.end - 1)),
                                        p = seekNext(pos.begin - 1), len > p && (c = String.fromCharCode(k), tests[p].test(c))) {
                                    if (shiftR(p), buffer[p] = c, writeBuffer(), next = seekNext(p), android) {
                                        var proxy = function() {
                                            $.proxy($.fn.caret, input, next)();
                                        };
                                        setTimeout(proxy, 0);
                                    } else input.caret(next);
                                    pos.begin <= lastRequiredNonMaskPos && tryFireCompleted();
                                }
                                e.preventDefault();
                            }
                        }
                    }
                    function clearBuffer(start, end) {
                        var i;
                        for (i = start; end > i && len > i; i++) tests[i] && (buffer[i] = getPlaceholder(i));
                    }
                    function writeBuffer() {
                        input.val(buffer.join(""));
                    }
                    function checkVal(allow) {
                        var i, c, pos, test = input.val(), lastMatch = -1;
                        for (i = 0, pos = 0; len > i; i++) if (tests[i]) {
                            for (buffer[i] = getPlaceholder(i); pos++ < test.length; ) if (c = test.charAt(pos - 1),
                                    tests[i].test(c)) {
                                buffer[i] = c, lastMatch = i;
                                break;
                            }
                            if (pos > test.length) {
                                clearBuffer(i + 1, len);
                                break;
                            }
                        } else buffer[i] === test.charAt(pos) && pos++, partialPosition > i && (lastMatch = i);
                        return allow ? writeBuffer() : partialPosition > lastMatch + 1 ? settings.autoclear || buffer.join("") === defaultBuffer ? (input.val() && input.val(""),
                            clearBuffer(0, len)) : writeBuffer() : (writeBuffer(), input.val(input.val().substring(0, lastMatch + 1))),
                            partialPosition ? i : firstNonMaskPos;
                    }
                    var input = $(this), buffer = $.map(mask.split(""), function(c, i) {
                        return "?" != c ? defs[c] ? getPlaceholder(i) : c : void 0;
                    }), defaultBuffer = buffer.join(""), focusText = input.val();
                    input.data($.mask.dataName, function() {
                        return $.map(buffer, function(c, i) {
                            return tests[i] && c != getPlaceholder(i) ? c : null;
                        }).join("");
                    }), input.one("unmask", function() {
                        input.off(".mask").removeData($.mask.dataName);
                    }).on("focus.mask", function() {
                        if (!input.prop("readonly")) {
                            clearTimeout(caretTimeoutId);
                            var pos;
                            focusText = input.val(), pos = checkVal(), caretTimeoutId = setTimeout(function() {
                                writeBuffer(), pos == mask.replace("?", "").length ? input.caret(0, pos) : input.caret(pos);
                            }, 10);
                        }
                    }).on("blur.mask", blurEvent).on("keydown.mask", keydownEvent).on("keypress.mask", keypressEvent).on("input.mask paste.mask", function() {
                        input.prop("readonly") || setTimeout(function() {
                            var pos = checkVal(!0);
                            input.caret(pos), tryFireCompleted();
                        }, 0);
                    }), chrome && android && input.off("input.mask").on("input.mask", androidInputEvent),
                        checkVal();
                });
            }
        });
    });

    $(function () {

        var simplecallback = {
            show: function(id, customData) {
                if (id && $('body > #simplecallback-' + id).length > 0) {
                    $('.simplecallback-overlay').fadeIn();
                }
                var modalWindow = (id) ? $('body > #simplecallback-' + id) : $('[data-simplecallback-form-overlayed]').first();
                var modalWindowHeight = modalWindow.innerHeight();
                var customDataField = modalWindow.find('input[name="simplecallback_custom_data"]');

                if (customData) {
                    customDataField.val(customData);
                } else {
                    customDataField.val("");
                }

                modalWindow.fadeIn();
                modalWindow.animate({
                    top: $(window).scrollTop() + ($(window).height() - modalWindowHeight)/2
                });
            },
            hide: function() {
                $('body > [id^="simplecallback-"]').fadeOut();
                $('.simplecallback-overlay').fadeOut();
            }
        };

        window.simplecallback = simplecallback;

        $('[data-simplecallback-form]').each(function() {
            var maskValue = $(this).data('simplecallback-phone-mask');
            if (maskValue) {
                $(this).find('[name="simplecallback_phone"]').mask(maskValue);
            }
        });

        $('[data-simplecallback-form]').on('submit', function() {
            var form = $(this),
                actionUrl = form.attr('action'),
                captcha = form.find('.simplecallback-captcha'),
                submitBtn = form.find('[type="submit"]');

            form.addClass('simplecallback-loading');
            submitBtn.attr('disabled', true);
            var redirecttourl = form.find('#redirectsuccesssimplecallback').text();
            
            $.ajax({
                type: "POST",
                url: actionUrl,
               // data: form.serialize(),
                dataType: 'json',
                accepts: {
                    text: "application/json"
                },
                data:  new FormData(this),
                async: false,
                cache: false,
                contentType:false,
                processData:false,
                success: function(data) {
                    if(data.error === false) {
                        swal({
                            title: "Отлично!",
                            text: data.message,
                            type: "success",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        form[0].reset();
                        simplecallback.hide();
                       
                  } else {
                        swal({   title: "Ошибка!",   type: "warning",  text: data.message,   timer: 5000,   showConfirmButton: false });
                        //console.log(data.message);
                    }
                    
                    form.removeClass('simplecallback-loading');
                    submitBtn.attr('disabled', false);
                    if (redirecttourl != 'noturl') {
                        window.location.href = redirecttourl;
                    }
                }
            });

            captcha.attr('src', captcha.attr('src') + '?rand=' + Math.random());

            return false;
        });

        $('[data-simplecallback-form-overlayed]').each(function() {
            $(this).appendTo('body');
        });

        if ($('[data-simplecallback-form-overlayed]').length > 0) {
            var overlay = $('<div class="simplecallback-overlay">');
            $('body').prepend(overlay);
        }

        $(document).on('click', '[data-simplecallback-open]', function() {
            var formId = $(this).data('simplecallback-open');
            var customData = $(this).data('simplecallback-custom-data');

            simplecallback.show(formId, customData);

            return false;
        });

        $(document).on('click', '[data-simplecallback-close]', function() {
            simplecallback.hide();

            return false;
        });

        window.addEventListener("load", function (event) {
            if (window.location.hash.indexOf('#simplecallback-') > -1) {
                var moduleId = parseInt( window.location.hash.replace(/[^0-9\.]/g, ''), 10 );
                //console.log(moduleId);
                simplecallback.show(moduleId);
            }
        }, false);

        $(document).on('click', 'a[href^="#simplecallback-"]', function() {
            var moduleId = parseInt( $(this).attr('href').replace(/[^0-9\.]/g, ''), 10 );
            //console.log(moduleId);
            simplecallback.show(moduleId);

            return false;
        });

    });
})(jQuery);