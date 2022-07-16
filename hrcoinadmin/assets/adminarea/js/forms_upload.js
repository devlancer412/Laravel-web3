var FormsuploadWizard = function () {
    return {
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }
			 var handleMessengeralert = function (tp,msg) {
			var mytheme ='block';
			var mypos = 'messenger-on-bottom';
			//Set theme
			Messenger.options = {
				extraClasses: 'messenger-fixed '+mypos,
				theme: mytheme
			}
			//Call
			Messenger().post({
				message:msg,
				showCloseButton: true,
				type:tp
			});
		} 
			/*-----------------------------------------------------------------------------------*/
			/*	Show country list in Uniform style
			/*-----------------------------------------------------------------------------------*/
            var wizform = $('#addform');
			var alert_success = $('.alert-success', wizform);
            var alert_error = $('.alert-danger', wizform);
			
            $("#designation").select2({
                placeholder: "Select designation"
            });
			/*-----------------------------------------------------------------------------------*/
			/*	Validate the form elements
			/*-----------------------------------------------------------------------------------*/
            wizform.validate({
                doNotHideMessage: true,
				errorClass: 'error-span',
                errorElement: 'span',
				//ignore: [],
                rules: {
                    
                    designation: {
                        required: true
                    },
			
					uploadpricelist: {
						required: false,
						//accept: "jpg|jpeg|gif|png|JPG|JPEG|PNG"
							},
					uploadcertificates: {
						required: false,
						//accept: "jpg|jpeg|gif|png|JPG|JPEG|PNG"
							},	
					uploaddiagrams: {
						required: false,
						//accept: "jpg|jpeg|gif|png|JPG|JPEG|PNG"
							},				
							
                },
				messages:{
					
					uploadpricelist: 'Please select pricelist (Only jpg,jpeg,png files are allowed)',
					
				},
                invalidHandler: function (event, validator) { 
                    alert_success.hide();
                    alert_error.show();
                },
                highlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); 
                },
                unhighlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-error'); 
                },
                success: function (label) {
                    if (label.attr("for") == "gender") { 
                        label.closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); 
                    } else { 
                        label.addClass('valid') 
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); 
                    }
                }
            });

            /*-----------------------------------------------------------------------------------*/
			/*	Initialize Bootstrap Wizard
			/*-----------------------------------------------------------------------------------*/
           
				$('#formsubmit').unbind('click').bind('click', function () {
				var progressbox 	= $('#progressbox');
				var progressbar 	= $('#progressbargallery');
				var statustxt 		= $('#statustxt');
				var output 			= $("#output");
				var completed 		= '0%';
					
			    $("#addform").ajaxForm({
					beforeSend: function() { //brfore sending form
					progressbox.show(); //show progressbar
						progressbar.width(completed); //initial value 0% of progressbar
						statustxt.html(completed); //set status text
						statustxt.css('color','#000'); //initial color of status text
					},
					uploadProgress: function(event, position, total, percentComplete) { //on progress
						progressbar.width(percentComplete + '%') //update progressbar percent complete
						statustxt.html(percentComplete + '%'); //update status text
						if(percentComplete>50)
							{
								statustxt.css('color','#fff'); //change status text to white after 50%
							}
						},
					complete: function(response) { // on complete				
						 progressbox.hide(); // hide progressbar
						  				if(response.responseText == 'success'){
										 $("#addform")[0].reset();
										 $("#designation").select2("val", "");
										 $('#pricelistpreview').html('');
										    handleMessengeralert('success','Pricelist uploaded successfully')
										 }
										 else if(response.responseText == 'emailexists'){
										    handleMessengeralert('error','Entered email id is already registered with us')
										 }else if(response.responseText == 'dataerror'){
										    handleMessengeralert('error','Please enter all required datas')
										 }
										  else {
										    handleMessengeralert('error',response.responseText)
										 }
					}
				});
            });
        }
    };
}();