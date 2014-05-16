Class.refactor(Request.Contao, {
		send: function(options){
			if (options) {
				// Try to replace the action with the dma-action
				try	{
					if (options.data.name.indexOf('dma_eg_')>=0 && (options.data.action=='reloadPagetree' || options.data.action=='reloadFiletree')) {
						options.data.action = options.data.action + 'DMA';
					}
				} catch(e) {}
			}
			this.parent(options);
		}
});

