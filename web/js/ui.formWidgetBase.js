$.widget('ui.formWidgetBase', {

	_value: null,
	
	_name: '',
	
	_enabled: true,

	_create: function() {
		
		publisher(this);
		subscriber(this);
		
		this._value = (this.options.defaultValue === undefined)? null : this.options.defaultValue;
		this._name = this.options.name || null;
	},

	asPublisher: function() {
		
		return [this];
	},
	
	value: function() {
		
		if (!this._enabled) {
		
			return -1;
		}
		
		if (arguments.length) {
			if (this._value != arguments[0]) {
				this._value = arguments[0];
				this._publish('valueChange', this._value);
			}
			return;
		}
		
		return this._value;
	},
	
	enabled: function() {
		
		if (arguments.length) {
		
			this._enabled = arguments[0];
			
			this._publish('stateChange', this._enabled ? 'enabled' : 'disabled');
			
			return this.element;
		}
		
		return this._enabled;
	}
});
