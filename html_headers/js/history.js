app.history={
    locationWrapper : {
        put: function(hash, win) {
            (win || window).location.hash = this.encoder(hash);
        },
        get: function(win) {
            var hash = ((win || window).location.hash).replace(/^#/, '');
            try {
                return $.browser.mozilla ? hash : decodeURIComponent(hash);
            }
            catch (error) {
                return hash;
            }
        },
        oldValue:null,
        encoder: encodeURIComponent
    },

    iframeWrapper : {
        id: "__jQuery_history",
        init: function() {
            var html = '<iframe id="'+ this.id +'" style="display:none" src="javascript:false;" />';
            $("body").prepend(html);
            return this;
        },
        _document: function() {
            return $("#"+ this.id)[0].contentWindow.document;
        },
        put: function(hash) {
            var doc = this._document();
            doc.open();
            doc.close();
            this.locationWrapper.put(hash, doc);
        },
        get: function() {
            return this.locationWrapper.get(this._document());
        }
    },

    initObjects : function(options) {
        options = $.extend({
                unescape: false
            }, options || {});

        this.locationWrapper.encoder = encoder(options.unescape);

        function encoder(unescape_) {
            if(unescape_ === true) {
                return function(hash){ return hash; };
            }
            if(typeof unescape_ == "string" &&
               (unescape_ = this.partialDecoder(unescape_.split("")))
               || typeof unescape_ == "function") {
                return function(hash) { return unescape_(encodeURIComponent(hash)); };
            }
            return encodeURIComponent;
        }

        function partialDecoder(chars) {
            var re = new RegExp($.map(chars, encodeURIComponent).join("|"), "ig");
            return function(enc) { return enc.replace(re, decodeURIComponent); };
        }
    },
    
    implementations :{
        base : {
            callback: undefined,
            type: undefined,

            check: function() {},
            load:  function(hash) {},
            init:  function(callback, options) {
                if($.browser.msie && ($.browser.version < 8 || document.documentMode < 8)) {
                    this.type = 'iframeTimer';
                } else if("onhashchange" in window) {
                    this.type = 'hashchangeEvent';
                } else {
                    this.type = 'timer';
                }
                this.initObjects(options);
                this.callback = callback;
                this._options = options;
                for (var i in this.implementations[this.type]){
                    this[i]=this.implementations[this.type][i];
                }
                this._init();
                return this;
            },

            _init: function() {},
            _options: {}
        },
        timer : {
            _appState: undefined,
            _init: function() {
                var current_hash = this.history.locationWrapper.get();
                this.history._appState = current_hash;
                this.history.callback(current_hash);
                setInterval(app.history.check, 100);
            },
            check: function() {
                var current_hash = app.history.locationWrapper.get();
                if(current_hash != app.history._appState) {
                    app.history._appState = current_hash;
                    app.history.callback(current_hash,app.history.locationWrapper.oldValue);
                    app.history.locationWrapper.oldValue=current_hash;
                }
            },
            load: function(hash) {
                if(hash != this._appState) {
                    this.locationWrapper.put(hash);
                    this._appState = hash;
                    this.callback(hash);
                }
            }
        },
        iframeTimer : {
            _appState: undefined,
            _init: function() {
                var current_hash = this.locationWrapper.get();
                this._appState = current_hash;
                this.iframeWrapper.init().put(current_hash);
                this.callback(current_hash);
                setInterval(this.check, 100);
            },
            check: function() {
                var iframe_hash = app.history.iframeWrapper.get(),
                    location_hash = app.history.locationWrapper.get();

                if (location_hash != iframe_hash) {
                    if (location_hash == app.history._appState) {    // user used Back or Forward button
                        app.history._appState = iframe_hash;
                        app.history.locationWrapper.put(iframe_hash);
                        app.history.callback(iframe_hash,app.history.locationWrapper.oldValue); 
                        app.history.locationWrapper.oldValue=iframe_hash;
                    } else {                              // user loaded new bookmark
                        app.history._appState = location_hash;  
                        app.history.iframeWrapper.put(location_hash);
                        app.history.callback(location_hash,app.history.locationWrapper.oldValue);
                        app.history.locationWrapper.oldValue=location_hash;
                    }
                }
            },
            load: function(hash) {
                if(hash != this._appState) {
                    this.locationWrapper.put(hash);
                    this.iframeWrapper.put(hash);
                    this._appState = hash;
                    this.callback(hash);
                }
            }
        },
        hashchangeEvent : {
            _init: function() {
                $(window).bind('hashchange', function(){app.history.check()});
                return app.history.check();
            },
            check: function() {
                app.history.callback(app.history.locationWrapper.get(),app.history.locationWrapper.oldValue);
                app.history.locationWrapper.oldValue=app.history.locationWrapper.get();
                return app.history.locationWrapper.get();
            },
            load: function(hash) {
                this.locationWrapper.put(hash);
                return hash;
            }
        }
    }
};

    for (var i in app.history.implementations['base']){
        app.history[i]=app.history.implementations['base'][i];
    }
$(document).ready(function(){
    app.history.init(app.ajax.parseHash);
});