mw.mobileFrontend = MobileFrontend = (function() {
	return {
		init: function() {
		},
		registerModule: function(a, b) {
			this[a] = b;
		},
		message: function(name) {
			return mw.message(name).plain();
		},
		utils: jQuery,
		supportsPositionFixed: function() {
			return false;
		}
	}
})();

