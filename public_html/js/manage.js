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

})