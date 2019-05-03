$(document).ready(function()
{
	var DOMAIN = "http://localhost/inventory_project/public_html";

	$("#register_form").on("submit",function()
	{
		var status = false;
		var name = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
		
		//abufarhad15@gmail.com
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

		if(name.val() == "" || name.val().length < 6)
		{
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
			status = false;
		}
		else
		{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}

		// For email

		if(!e_patt.test(email.val() ))
		{
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter The valid Email Address</span>");
			status = false;
		}
		else
		{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}

		//For password

		if(pass1.val()=="" || pass1.val().length < 5 )
		{
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more then 5 digit password</span>");
			status = false;
		}
		else
		{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}


		//
		if(pass2.val()=="" || pass2.val().length < 5 )
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more then 5 digit password</span>");
			status = false;
		}
		else
		{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}

		//	user type 

		if(type.val()=="" )
		{
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Enter The Type of User</span>");
			status = false;
		}
		else
		{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}

		//&& pass1.val() !="" && pass2.val() !=""

		if ((pass1.val() == pass2.val()) && pass1.val() !="" && pass2.val() !="" && status == true) 
		{
			$(".overlay").show();

			$.ajax(
			{
				url     : DOMAIN +"/includes/process.php",
				method  : "POST",
				data    : $("#register_form").serialize(),
				success : function(data)
				{
					//alert(data);

					if(data.trim()=="EMAIL_ALREADY_EXISTS".trim())
					{
						$(".overlay").hide();
						alert("It seems like your email is already used");
					}
					else if (data.trim()=="SOME_ERROR".trim()) 
					{
						$(".overlay").hide();
						alert("Something Worng");
					}
					else
					{
						$(".overlay").hide();
						window.location.href=encodeURI( DOMAIN+"/index.php?msg=You Are Registerd Now You Can Login");
					}
					
				}
			})
		}
		else
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}


		
	})


	// For login Part 

	$("#form_login").on("submit",function()
	{
		
		var email = $("#log_email");
		var pass=$("#log_pass");
		var status=false;

		if(email.val() == "")
		{
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}
		else
		{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}



		if(pass.val() == "")
		{
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}
		else
		{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}

		if (status) 
		{
			//alert("ready");
			//$(".overlay").show();

			$.ajax(
			{
				url     : DOMAIN +"/includes/process.php",
				method  : "POST",
				data    : $("#form_login").serialize(),
				success : function(data)
				{
					//alert(data);
					//alert(typeof data);
					if(data.trim()=="NOT_REGISTERD".trim())
					{
					$(".overlay").hide();
					email.addClass("border-danger");
					$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
					status = false;	
					}
					else if (data.trim()=="PASSWORD_NOT_MATCHED".trim()) 
					{

						$(".overlay").hide();
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
						status=false;
					}
					else
					{
						$(".overlay").hide();
						console.log(data);
						//alert(data);
						
						window.location.href=DOMAIN+"/session_write.php?userid=1"
					}
					
				}
			})
		}

	})


//		 ***************************Fetch category************************
//Fetch Category

fetch_category();

function fetch_category()
{
	$.ajax(
			{
				url     : DOMAIN +"/includes/process.php",
				method  : "POST",
				data    : {getCategory:1 },
				success : function(data)
				{
					//alert(data);
					var root = " <option value='0'> Root</option>";
					var choose = " <option value=''> Choose category</option>";
					$("#Parent_cat").html(root+data);
					$("#select_cat").html(choose+data);

			}
		}
		)
	
}

//Fetch Brand

fetch_brand();

function fetch_brand()
{
	$.ajax(
			{
				url     : DOMAIN +"/includes/process.php",
				method  : "POST",
				data    : {getBrand:1 },
				success : function(data)
				{
					var choose = " <option value=''> Choose Brand</option>";
					$("#select_brand").html(choose+data);

			}
		}
			)
	
}



//Add Category

 $("#category_form").on("submit",function()
 {
 	if ($("#category_name").val()=="") 
 	{
 		$("#category_name").addClass("border-danger");
 		$("#cat_error").html("<span class='text-danger'>Please Enter Category name</span>");

 	}
 	else
 	{
 		$.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: $("#category_form").serialize(),
 			success :function(data)
 			{
 				
 				if (data=="CATEGORY_ADDED") 
 				{
 					$("#category_name").removeClass("border-danger");
 					$("#cat_error").html("<span class='text-success'>New Category Added Successfully ...</span>");
 					$("#category_name").val("");
 					fetch_category();

 				}
 				else
 				{
 					alert(data);

 				}
 				
 			}
 		})
 	 }
  
  })

 //Add Brand

  $("#brand_form").on("submit",function()
 {
 	if ($("#brand_name").val()=="") 
 	{
 		$("#brand_name").addClass("border-danger");
 		$("#brand_error").html("<span class='text-danger'>Please Enter Brand name</span>");

 	}
 	else
 	{
 		$.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: $("#brand_form").serialize(),
 			success :function(data)
 			{
 				
 				if (data=="BRAND_ADDED") 
 				{
 					$("#brand_name").removeClass("border-danger");
 					$("#brand_error").html("<span class='text-success'>New Brand Added Successfully ...</span>");
 					$("#brand_name").val("");
 					fetch_brand();

 				}
 				else
 				{
 					alert(data);
 				}
 				
 			}
 		})
 	 }
  
  })

//Add Product

 $("#product_form").on("submit",function()
 {
 		$.ajax({
		url		:DOMAIN+"/includes/process.php",
		method	:"POST",
		data	: $("#product_form").serialize(),
		success :function(data)
		{
			
			if (data=="NEW_PRODUCT_ADDED") 
			{
				alert("New Product Added Successfully ...");
				$("#product_name").val("");
				$("#product_qty").val("");
				$("#select_cat").val("");
				$("#select_brand").val("");
				$("#product_price").val("");
				
			}
			else
			{
				alert(data);
				console.log(data);
			}
			
		}
	})

 })




})