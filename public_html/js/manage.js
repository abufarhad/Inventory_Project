$(document).ready(function()
{
	var DOMAIN = "http://localhost/inventory_project/public_html";



 //Manage Category
 manageCategory(1);

 function manageCategory(pn)
 {
   $.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: {manageCategory:1, pageno:pn},
 			success :function(data)
 			{ 
 				
 				$("#get_category").html(data);
 				//alert(data);
 				
 			}
 		})
 }

 $("body").delegate(".page-link ", "click", function(){

 	var pn=$(this).attr("pn");
 	//alert(pn);
 	manageCategory(pn);
 } )


//Delete Category

  $("body").delegate(".del_cat ", "click", function()
  {

 	var did=$(this).attr("did");
 	//alert(did);
 	if (confirm("Are You Sure ? You Want To Delete.. !")) //Confirm js command gives us two option 
 	{
 		//alert("YES");
 		   $.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: {deleteCategory:1, id:did},
 			success :function(data)
 			{ 
 			 	//alert(data);
 				if (data=="DEPENDENT_CATEGORY") 
 				{
 					alert("Sorry ! This Category is dependent on other subcategory.. ");
 				}
 				else if(data=="CATEGORY_DELETED")
 				{
 					alert("Category Deleted Successfully ! ...");
 					manageCategory(1);
 				}
 				else if(data=="DELETED")
 				{
 					alert("Deleted Successfully..");
 				}
 				else
 				{
 					alert(data);
 				}
 			}
 		})
  	}
 	else
 	{
 		//alert("NO");
 	}
 } )

//Update Category
	//Fetch category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root = "<option value='0'>Root</option>";
				
				$("#parent_cat").html(root+data);
				
			}
		})
	}


 	//Update Category
	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				

				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})

//update_category_form 

$("#update_category_form").on("submit",function()
 {
 	if ($("#update_category").val()=="") 
 	{
 		$("#update_category").addClass("border-danger");
 		$("#cat_error").html("<span class='text-danger'>Please Enter Category name</span>");

 	}
 	else
 	{
 		$.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: $("#update_category_form").serialize(),
 			success :function(data)
 			{
 				//alert(data);
 				window.location.href ="";
 			}
 		})
 	 }
  
  })


//-----------------Brand---------------

 //Manage Brand

 manageBrand(1);

 function manageBrand(pn)
 {
   $.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: {manageBrand:1, pageno:pn},
 			success :function(data)
 			{ 
 				
 				$("#get_brand").html(data);
 				//alert(data);
 				
 			}
 		})
 }
 //pagination for brand

  $("body").delegate(".page-link ", "click", function(){

 	var pn=$(this).attr("pn");
 	//alert(pn);
 	manageBrand(pn);
 } )

  //Delete Brand

  $("body").delegate(".del_brand ", "click", function()
  {

 	var did=$(this).attr("did");
 	//alert(did);
 	if (confirm("Are You Sure ? You Want To Delete.. !")) //Confirm js command gives us two option 
 	{
 		//alert("YES");
 		   $.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: {deleteBrand:1, id:did},
 			success :function(data)
 			{ 
 			 	//alert(data);
 				if (data=="DELETED") 
 				{
 					//alert("Brand Is Deleted");
 					manageBrand(1);
 				}
 				else
 					alert(data);
 			}
 		})
  	}
 } )


//Update Brand

	$("body").delegate(".edit_brand","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateBrand:1,id:eid},
			success : function(data){
				console.log(data);
				

				$("#bid").val(data["bid"]);
				$("#update_brand").val(data["brand_name"]);
			}
		})

	})






//update_brand_form 

$("#update_brand_form").on("submit",function()
 {
 	if ($("#update_brand").val()=="") 
 	{
 		$("#update_brand").addClass("border-danger");
 		$("#brand_error").html("<span class='text-danger'>Please Enter Brand name</span>");

 	}
 	else
 	{
 		$.ajax({
 			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: $("#update_brand_form").serialize(),
 			success :function(data)
 			{
 				alert(data);
 				window.location.href ="";
 			}
 		})
 	 }
  
  })







})