Class.refactor(Request.Contao, {
		send: function(options){
			if (options) {
				// Try to replace the action with the dma-action
				try	{
					if ('dma_eg_'.indexOf(options.data.name)) {
						options.data.action = options.data.action + 'DMA';
					}
				} catch(e) {}
			}
			this.parent(options);
		}
});