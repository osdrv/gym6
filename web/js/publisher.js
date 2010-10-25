var publisher = function(_obj) {
	
	_extends = {

		_name: '',

		_subscribers: {},

		subscribe: function(_event, _subscriber) {
			if (!$.isArray(this._subscribers[_event])) {

				this._subscribers[_event] = new Array();
			}

			this._subscribers[_event].push(_subscriber);
		},
		
		_publish: function(_event, _value) {

			var _events = ['*', _event],
			self = this;
			
			$.each(_events, function(_i, _event_type) {

				if ($.isArray(self._subscribers[_event_type])) {
					
					$.each(self._subscribers[_event_type], function(_o, _subscriber) {
						
						if (!$.isFunction(_subscriber._notify)) {

							return;
						}

						_subscriber._notify(self, _event, _value);
					});
				}
			});
		}
	};
	
	$.each(_extends, function(_name, _value) {
		if (!_obj[_name]) {
		
			_obj[_name] = _value;
		}
	})
	
	return _obj;
},

Publisher = function() { publisher(this) };

