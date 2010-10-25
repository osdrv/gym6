var subscriber = function (_obj) {
	
	_extends = {

		_name: '',

		_subscribe_handlers: {},

		_notify: function(_publisher, _event, _value) {
			
			var _events = ['*', _event],
			self = this;
			
			$.each(_events, function(_i, _event_type) {
				
				var _event_type = _publisher._name + '.' + _event_type;
				
				if ($.isArray(self._subscribe_handlers[_event_type])) {
					$.each(self._subscribe_handlers[_event_type], function(_i, _h) {
						_h.call(self, _event, _value);
					})
				}
			});
		},

		addSubscribeHandler: function(_publisher, _event, _handler) {
			
			if (!$.isFunction(_handler) || !$.isFunction(_publisher.subscribe)) {
				throw "smthng went wrong";
				return;
			}
			
			var _named_event = _publisher._name + '.' + _event;
			
			if (!$.isArray(this._subscribe_handlers[_named_event])) this._subscribe_handlers[_named_event] = new Array();
			
			this._subscribe_handlers[_named_event].push(_handler);
			
			_publisher.subscribe(_event, this);
		},
		
		removeSubscribeHandler: function(_publisher, _event) {
			
			delete this._subscribe_handlers[_event];
			_publisher.unsubscribe(_event, this);
		}
	};
	
	$.each(_extends, function(_name, _value) {
		if (!_obj[_name]) {
			_obj[_name] = _value;
		}
	})
	
	return _obj;
},

Subscriber = function() { subscriber(this) };