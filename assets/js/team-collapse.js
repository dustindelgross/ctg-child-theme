jQuery(document).ready(function(){
	
		

		
		jQuery('.leadButton').on('click', function(){

			  switch (true) {

				case jQuery('.leadership').hasClass('isOpen'):
				jQuery('.leadership').slideUp(function(){
					jQuery(this).removeClass('isOpen').addClass('isClosed');
				  });
				break;

				case jQuery('.sales').hasClass('isOpen'):
				  jQuery('.sales').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.leadership').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				break;

				case jQuery('.marketing').hasClass('isOpen'):
				jQuery('.marketing').slideUp(function(){
					jQuery(this).removeClass('isOpen').addClass('isClosed');
				  });
				jQuery('.leadership').delay(600).slideDown(function(){
					jQuery(this).removeClass('isClosed').addClass('isOpen');
				  });
				break;

				case jQuery('.ops').hasClass('isOpen'):  
				jQuery('.ops').slideUp(function(){
					jQuery(this).removeClass('isOpen').addClass('isClosed');
				  });
				jQuery('.leadership').delay(600).slideDown(function(){
					jQuery(this).removeClass('isClosed').addClass('isOpen');
				  });
				break;

				default:
				jQuery('.leadership').slideDown(function(){
					jQuery(this).removeClass('isClosed').addClass('isOpen');
				  });
			  }
		  });

		
		jQuery('.salesButton').on('click', function(){

			switch (true) {
				case jQuery('.sales').hasClass('isOpen'):
				  jQuery('.sales').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				break;

				case jQuery('.leadership').hasClass('isOpen'):
				  jQuery('.leadership').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.sales').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				break;

				case jQuery('.marketing').hasClass('isOpen'):
				  jQuery('.marketing').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.sales').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				break;

				case jQuery('.ops').hasClass('isOpen'):
				  jQuery('.ops').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.sales').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				break;

				default:
				  jQuery('.sales').slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
				});
			  }
		  });

			jQuery('.opsButton').on('click', function(){ 
			  switch (true) {  
				case jQuery('.sales').hasClass('isOpen'): 
				  jQuery('.sales').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.ops').delay(600).slideDown(function(){  
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				  break;

				case jQuery('.leadership').hasClass('isOpen'):   
				  jQuery('.leadership').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.ops').delay(600).slideDown(function(){  
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				  break;

				case jQuery('.marketing').hasClass('isOpen'):  
				jQuery('.marketing').slideUp(function(){
					jQuery(this).removeClass('isOpen').addClass('isClosed');
				  });
				jQuery('.ops').delay(600).slideDown(function(){
					jQuery(this).removeClass('isClosed').addClass('isOpen');
				  });
				break;

				case jQuery('.ops').hasClass('isOpen'):  
				jQuery('.ops').slideUp(function(){
					jQuery(this).removeClass('isOpen').addClass('isClosed');
				  });
				break;

				default:    
				jQuery('.ops').slideDown(function(){
					jQuery(this).removeClass('isClosed').addClass('isOpen');
				  });
			  }

		  });

		jQuery('.marketingButton').on('click', function(){

			  switch (true) {
				case jQuery('.sales').hasClass('isOpen'):
				  jQuery('.sales').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.marketing').delay(600).slideDown(function (){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				  break;

				case jQuery('.leadership').hasClass('isOpen'):
				  jQuery('.leadership').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.marketing').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				  break;

				case jQuery('.marketing').hasClass('isOpen'):
				  jQuery('.marketing').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  break;

				case jQuery('.ops').hasClass('isOpen'):
				  jQuery('.ops').slideUp(function(){
					  jQuery(this).removeClass('isOpen').addClass('isClosed');
					});
				  jQuery('.marketing').delay(600).slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
				  break;

				default:
				  jQuery('.marketing').slideDown(function(){
					  jQuery(this).removeClass('isClosed').addClass('isOpen');
					});
			}
		});
	
});