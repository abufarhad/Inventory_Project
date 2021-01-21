$(document).ready(function()
{
	var DOMAIN = "http://localhost/inventory_project/public_html";

	addNewRow();

	$("#add").click(function()
	{
		addNewRow();
	})

	function addNewRow()
	{
		$.ajax( 

		{
			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			data	: {getNewOrderItem:1},
 			success :function(data)
 			{ 
 				
 				$("#invoice_item").append(data);

 				var n=0;
 				$(".number").each( function()
 				{
 					$(this).html(++n);
 				})
 				//alert(data);
 				
 			}
		})
	}



	$("#remove").click(function()
	{
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})



	$("#invoice_item").delegate(".pid ", "change",function()
	{
		var pid= $(this).val();
		//alert(pid);
		var tr=$(this).parent().parent();
		$(".overlay").show();
		
		$.ajax( 
		{
			url		:DOMAIN+"/includes/process.php",
 			method	:"POST",
 			dataType:"json",
 			data	: {getPriceAndQty:1, id:pid},
 			success :function(data)
 			{ 
 				tr.find(".Tqty").val(data["product_stock"]);
 				tr.find(".pro_name").val(data["product_name"]);
 				tr.find(".qty").val(1);
 				tr.find(".price").val(data["product_price"]);
 				tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
 				calculate(0,0);

 				//console.log(data);
 			}
		})

	})


	$("#invoice_item").delegate(".qty", "keyup", function()
	{
		var qty= $(this);
		var tr= $(this).parent().parent();
		if (isNaN(qty.val()) )					//if is not a number 
		 {
		 	alert("Please Enter a valid quantity");
		 	qty.val(1);
		 }
		 else
		 {
		 	if ((qty.val()-0) > (tr.find(".Tqty").val()-0) ) 
		 	{
		 		alert("Sorry ! This Much quantity is not available in our store.")
		 		qty.val(1);
		 	}
		 	else
		 	{
		 		tr.find(".amt").html( qty.val() * tr.find(".price").val()  );
		 		calculate(0,0);
		 	}
		 }
		//alert( tr.find(".Tqty").val() );

	})



	function calculate(dis,paid)
	{

		var sub_total=0;
		var gst=0;
		var net_total=0;
		var discount=dis;
		var paid_amt=paid;
		var due=0;



		$(".amt" ).each(function()
		{
		 sub_total+= ($(this).html()*1 );

		}) 

		gst=0.18*sub_total;
		net_total=gst+sub_total ;
		net_total=net_total- discount;
		due=net_total- paid_amt;

		 $("#sub_total").val(sub_total);
		 $("#gst").val(gst);
		 $("#discount").val(discount);
		 $("#net_total").val(net_total);
		// $("#paid")
		 $("#due").val(due);

		$("#discount").keyup(function(){
			var discount = $(this).val();
			calculate(discount,0);
		})


		$("#paid").keyup(function(){
			var paid = $(this).val();
			var discount= $("#discount").val();
			calculate(discount, paid);
		})
	}

});

