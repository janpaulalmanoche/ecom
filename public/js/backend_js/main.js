/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});


//for the details page price when yo select sizes and for the stock whn it is avaialble or not
$(document).ready(function(){
	// alert("test");
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == ""){
			return false;
		}
		// alert(idSize);
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
                //sucess response
				var arr = resp.split('#');//split from the has that we are echoing

				$("#getPrice").html("P"+arr[0]);//it is arr 0,because the next arr 1 will be the value o the stock
				$("#price").val(arr[0]);//set the price value to the array value is it is switch
					if(arr[1]==0){//if stock is equal to 0 hide the add to cart
						$("#cartButton").hide();//we wil hide the button add to cart in detail page,with id cartButton
						$("#Availability").text("Out Of Stock!")//and will show also this text into the spane id Availability
					}else{
                 	   $("#cartButton").show(); //but if stock is not 0 it will display the button and show ths msg
                   		 $("#Availability").text("In Stock")
				}
			},error:function(){
				alert("Error");
			}
		})
	});
});


$().ready(function(){//jquery opening

	//for regisdter
    $("#me").validate({
		rules:{
			mcode:{
				required:true

			}
		}
	})


	//for account
	$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:3,
				accept:"[a-zA-Z]+"
			},
			m_name:{
				required:true,
				minlength:3,
				accept:"[a-zA-Z]+"
			},
			l_name:{
				required:true,
				minlength:3,
				accept:"[a-zA-Z]+"
			},
			address:{
				required:true,
				minlength:6
			}

		},
		messages:{

			name:{
				required:"Please enter your name",
				minlength:"Please enter atleast 3 characters",
				accept:"input letters only"
			},
			m_name:{
				required:"Please enter your name",
				minlength:"Please enter atleast 3 characters",
				accept:"input letters only"
			},
			l_name:{
				required:"Please enter your name",
				minlength:"Please enter atleast 3 characters",
				accept:"input letters only"
			},
			// street:{
			// 	required:"Please enter street",
			// 	minlength:"Please enter atleast 3 characters"
			//
			// },
			// baranggay:{
			// 	required:"Please enter your baranggay",
			// 	minlength:"Please enter at least 6 characters",
			// 	accept:"input letters only"
			// },
			address:{
				required:"Please enter your address",
				minlength:"Please enter at least 6 characters"
			},

			city:{
				required:"Please enter city",

			}
		}
	})

	//for login
	$("#loginForm").validate({
		rules:{

			password:{
				required:true

			},
			email:{
				required:true,
				email:true

			}
		},
		messages:{
			password:{
				required:"Please provide your password"
			},
			email:{
				required:"Please enter your email",
				email:"Please enter valid email"
			}
		}
	})

	//for udpate passwor usser acccount
	$("#current_pwd").keyup(function(){
	var current_pwd = $(this).val();//getting the value inthe text field
		// alert(current_pwd);
		$.ajax({
			headers:{// to revmove errors in ajax
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},//remvoe errors
			type:'post',
			url:'/check-user-pwd', //our route in webfile
			data:{current_pwd:current_pwd}, //we are calling the var current_pwd that is gettign the value put in the text field
			success:function(resp){
			 // alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is incorrect</font>");
					// #chkPwd is our span id in our account blade to dispaly msg
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is correct</font>");
				}
			},error:function(){
				alert("Error");
			}


		});
	});//closing chk pwd
	$("#passwordForm").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$(document).ready(function () {
		$('.dynamic').change(function(){

			if($(this).val() != '')
			{
				var select = $(this).attr("id");
				var value = $(this).val();
				var dependent = $(this).data('dependent');
				var _token = $('input[name="_token"]').val();

				$.ajax({
					    url:'dynamicdependent.fetch',
					// url:"{{ route('dynamicdependent.fetch')}}",
					method:"post",
					data:{select:select, value:value, _token:
						_token, dependent:dependent},
					success:function (result)
					{
						$('#'+dependent).html(result);

					}

				})
			}

		});

	});



	//for dropdown populate
	$(document).ready(function () {

		$(document).on('change','.cctty',function (){
				// console.log("hmm its change");

				var $city=$(this).val();
				// console.log(cityy_id);

			var div=$(this).parent();

			var op="";
			$.ajax({
				type:'get',
				url:'/city-id',
				data:{'id':$city},
				success:function(data) {
					// console.log('success');
					//
					// console.log(data);
					// console.log(data.length);

					op+='<option value="" selected disabled>Chose Baranggay</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].bgg+'</option>'
					}

					div.find('.bgg').html(" ");
					div.find('.bgg').append(op);
				},
				error:function ()
				{
					
				}
			});
		});
			

		
	});




});//jquery ending
