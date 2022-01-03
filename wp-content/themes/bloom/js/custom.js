$( document ).ready(function() {
  $( "#volunteer-form" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#volunteer-form input[required-data=true], #volunteer-form select[required-data=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
				}
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag            
                }
				var focusElement = $("#firstname"); 
				$(focusElement).focus(); 
				ScrollToTop(focusElement);
		});
		
		if(proceed==false){
				var focusElement = $("#firstname"); 
				$(focusElement).focus(); 
				ScrollToTop(focusElement);
		}
        if(proceed){
			var formData = $("#volunteer-form").serialize();
			$.ajax({
				type: "POST",
				 url : "../wp-admin/admin-ajax.php",
				data: {
					formdata : formData,
					action : 'get_volunteer_form_data'
				},
				success: function(msgData) {
					if(msgData==1){
						$("#volunteer-form")[0].reset();
						$('#firstname').focus();
						window.location = 'http://oxeenit.tech/bloomnew/application-thank-you/';
						$('#msg-box').show();
						return false;
					}
				}
			});
		}
        event.preventDefault(); 
    });
	$("#volunteer-form input[required-data=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
    
    
    // var $regexfirstname=/^([a-zA-Z]{3,16})$/;
    //                 $('#firstname').on('keyup',function(){
    //                          if (!$(this).val().match($regexfirstname)) {
    //                           // there is a mismatch, hence show the error message
    //                              $('.emsg').removeClass('hidden');
    //                              $('.emsg').show();
    //                              return false;
    //                          }
    //                       else{
    //                             // else, do not display message
    //                             $('.emsg').addClass('hidden');
    //                           }
    //              });
                 
                //  var $regexlastname=/^([a-zA-Z]{3,16})$/;
                //     $('#lastname').on('keyup',function(){
                //              if (!$(this).val().match($regexlastname)) {
                //               // there is a mismatch, hence show the error message
                //                  $('.emsg1').removeClass('hidden');
                //                  $('.emsg1').show();
                //                  return false;
                //              }
                //           else{
                //                 // else, do not display message
                //                 $('.emsg1').addClass('hidden');

                //               }
                //  });
				
				
                //check invalid email
                var email_reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                $('#emailid').on('keyup',function(){
                    //if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    if (!email_reg.test($.trim($(this).val()))) {
                        $(this).css('border-color','red'); //change border color to red  
                        $('.emsg2').removeClass('hidden');
                        $('.emsg2').show();
    					return false; //set do not proceed flag            
                    }else{
                        $('.emsg2').addClass('hidden');

                    }
                
                });
                
         //check invalid email
                var email_reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                $('#inputEmail1').on('keyup',function(){
                    //if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    if (!email_reg.test($.trim($(this).val()))) {
                        $(this).css('border-color','red'); //change border color to red  
                        $('.emsg2').removeClass('hidden');
                        $('.emsg2').show();
    					return false; //set do not proceed flag            
                    }else{
                        $('.emsg2').addClass('hidden');

                    }
                
                });
    
    
	
	 // Contact Form Section Start Here
	 $( "#contact-form" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#contact-form input[required-data=true], #contact-form select[required-data=true], #contact-form textarea[required-data=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
                    proceed = false; //set do not proceed flag
				}
				
				
                //check invalid email
                 var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                 if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                     $(this).css('border-color','red'); //change border color to red  
				 	proceed = false; //set do not proceed flag            
                 }
		});
		if(proceed==false){
				var focusElement = $("#firstname"); 
				$(focusElement).focus(); 
				ScrollToTop(focusElement);
		}
		var fd = new FormData();
		var formData = $("#contact-form").serialize();
		if($('#attachments').val()!=''){
		var files = $('#attachments')[0].files[0];
		      var fsize = $('#attachments')[0].files[0].size;
		      var fname = $('#attachments')[0].files[0].name;
		      var ftype = $('#attachments')[0].files[0].type;
		      var fextension = $('#attachments').val().split('.').pop().toLowerCase();  
		      /*if($.inArray(fextension, ['gif','png','jpg','jpeg']) == -1) {
		        $('#imageextension').show();
		        return false;
		      }*/
		      if(fsize > 1048576) {
		      	 $('#imagefsize').show();
		                   // alert("File size too large! Please upload less than 1MB");
		            return false;
		         }

		  fd.append('attachments',files);
		} 
		  fd.append('action','get_contact_form_data');
		  fd.append('formdata',formData);
		 if(proceed){
           $.ajax({
				type: "POST",
				 url : "../wp-admin/admin-ajax.php",
				 data: fd,
				contentType: false,
        		processData: false,
				success: function(msgData) {
					if(msgData==1){
						$("#contact-form")[0].reset();
						$('#firstname').focus();
						window.location = 'http://oxeenit.tech/bloomnew/contact-thank-you/';
						//$('#msg-box').show();
						return false;
					}
				}
			});
		}
        event.preventDefault(); 
    });
	$("#contact-form input[required-data=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
 // Contact Form Section End Here 


  // Teacher Form Submit Start Here


  $( "#teacher-form" ).submit(function( event ){ //on form submit              
        var proceed = true;
        //return false;
	    $("#teacher-form input[required-data=true], #teacher-form select[required-data=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
                    $('#fileselect').attr("style", "display:block;color:red;");
					proceed = false; //set do not proceed flag
				}
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag            
                }
				
        });
		if(proceed==false){
				var focusElement = $("#inputFirstName"); 
				$(focusElement).focus(); 
				ScrollToTop(focusElement);
		}


	    var fd = new FormData();
		var formData = $("#teacher-form").serialize();
		if($('#inputResume').val()!=''){
		     $('#fileselect').attr("style", "display:none;");
		var files = $('#inputResume')[0].files[0];
		      var fsize = $('#inputResume')[0].files[0].size;
		      var fname = $('#inputResume')[0].files[0].name;
		      var ftype = $('#inputResume')[0].files[0].type;
		      var fextension = $('#inputResume').val().split('.').pop().toLowerCase();  
		      if($.inArray(fextension, ['gif','png','jpg','jpeg','doc','docx']) == -1) {
		        $('#inputResume').show();
		        return false;
		      }
		      if(fsize > 1048576) {
		      	 $('#imagefsize').show();
		                   // alert("File size too large! Please upload less than 1MB");
		            return false;
		         }

		  fd.append('inputResume',files);
		}
		  
		  fd.append('action','get_teacher_form_data');
		  fd.append('formdata',formData);


        if(proceed){
			//var formData = $("#teacher-form").serialize();
			$.ajax({
				type: "POST",
				 url : "../wp-admin/admin-ajax.php",
				 data: fd,
				contentType: false,
        		processData: false,
				success: function(msgData) {
					if(msgData==1){
						$("#teacher-form")[0].reset();
						$('#inputFirstName').focus();
							window.location = 'http://oxeenit.tech/bloomnew/application-thank-you/';
						//$('#msg-box').show();
						return false;
					}
				}
			});
		}
        event.preventDefault(); 
    });
	$("#teacher-form input[required-data=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});


	//Teacher Form End Here 
	
	
   
$(".numbervalidation").on("keypress keyup blur",function (event) {    
   $(this).val($(this).val().replace(/[^\d].+/, ""));
	if ((event.which < 48 || event.which > 57)) {
		event.preventDefault();
	}
});	
   
   
   $( "#partner-inquiry-form" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#partner-inquiry-form input[required-data=true], #partner-inquiry-form select[required-data=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
				}
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag            
                }
                
        });
		if(proceed==false){
				var focusElement = $("#firstname"); 
				$(focusElement).focus(); 
				ScrollToTop(focusElement);
		}
        if(proceed){
			var formData = $("#partner-inquiry-form").serialize();
			$.ajax({
				type: "POST",
				 url : "../wp-admin/admin-ajax.php",
				data: {
					formdata : formData,
					action : 'get_partner_inquiry_form_data'
				},
				success: function(msgData) {
					if(msgData==1){
						$("#partner-inquiry-form")[0].reset();
						$('#firstname').focus();
						window.location = 'http://oxeenit.tech/bloomnew/application-thank-you/';
						$('#msg-box').show();
						return false;
					}
				}
			});
		}
        event.preventDefault(); 
    });
	$("#partner-inquiry-form input[required-data=true]").keyup(function() { 
        $(this).css('border-color',''); 
	}); 
	$("#partner-inquiry-form select[required-data=true]").change(function() { 
        $(this).css('border-color',''); 
	}); 
   
   
   /*$('#list a[href*="#"]').click(function(e){
	  e.preventDefault();
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	  var targetOffest = target.offset('100').top;
	  var headerHeight = document.getElementByClassName('navbar')[0].offsetHeight;
	  $('html, body').animate({
		  scrollTop: targetOffest
	  }, 1000);
});*/



$('#tab1').click(function(e){
	$(this).addClass('active');
	$('#tab2,#tab3,#tab4,#tab5,#tab6').removeClass('active');
	  var focusElement = $("#programsTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab1(focusElement);
  });

  $('#tab2').click(function(e){
	  $(this).addClass('active');
	  $('#tab1,#tab3,#tab4,#tab5,#tab6').removeClass('active');
	  var focusElement = $("#musicmTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab(focusElement);
  });
 $('#tab3').click(function(e){
	 $(this).addClass('active');
	 $('#tab1,#tab2,#tab4,#tab5,#tab6').removeClass('active');
	  var focusElement = $("#danceTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab(focusElement);
  });
$('#tab4').click(function(e){
	$(this).addClass('active');
	$('#tab1,#tab2,#tab3,#tab5,#tab6').removeClass('active');
	  var focusElement = $("#teachersTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab(focusElement);
  }); 
$('#tab5').click(function(e){
	$(this).addClass('active');
	$('#tab1,#tab2,#tab3,#tab4,#tab6').removeClass('active');
	  var focusElement = $("#pricingTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab(focusElement);
  }); 
$('#tab6').click(function(e){
	$(this).addClass('active');
	$('#tab1,#tab2,#tab3,#tab4,#tab5').removeClass('active');
	  var focusElement = $("#nextsTab"); 
				$(focusElement).focus(); 
				ScrollToTopTab(focusElement);
  });  
  
//$('body').scrollspy({ target: '#list' })
   /************* Sukhi*********************/
	   /*if ($(window).width() > 769) {
		$('.navbar .dropdown').hover(function() {
		  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

		}, function() {
		  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

		});

		$('.navbar .dropdown > a').click(function() {
		  location.href = this.href;
		});

	  }*/
   /*********** End Here*********************/
});

function ScrollToTop(el) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 200 }, 'fast');           
} 

function ScrollToTopTab(el) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 80 }, 'fast');           
} 
function ScrollToTopTab1(el) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 180 }, 'fast');           
} 

/*jQuery(function($) {
  if ($(window).width() > 769) {
    $('.navbar .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });

  }
});
*/

/*jQuery(function($) {
  if ($(window).width() > 769) {
    $('.navbar .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });

  }
});

$('#list a[href*="#"]').click(function(e){
  e.preventDefault();
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
  var targetOffest = target.offset('100').top;
  var headerHeight = document.getElementByClassName('navbar')[0].offsetHeight;
  $('html, body').animate({
	  scrollTop: targetOffest
  }, 1000);
});

$('body').scrollspy({ target: '#list' })*/

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#list, .en-edu-b').addClass('scrolled');
        }
        else {
            $('#list, .en-edu-b').removeClass('scrolled');
        }
    });
    var width = $(window).width();
    $(window).resize(function () {
        if (width <= '720px') {
            $('#list, .en-edu-b').addClass('scrolled');
        }
    });
})


$(document).ready(function () {
    $(".nav-item.dropdown").click(function(){
     $('.nav-item.dropdown').removeClass("open");
     $(this).toggleClass("open");
    })
})
