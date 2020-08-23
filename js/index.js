

$(document).ready(function(){
	$(".login-form").submit(function(e){
		e.preventDefault();
		$.ajax({
			type : "POST",
			url : "php/login.php",
			data : new FormData(this),
			processData : false,
			contentType : false,
			cache : false,
			beforeSend : function(){
				$(".response").html("<i class='fa fa-spinner fa-spin text-center' style='font-size:50px'></i>");
				$(".status").html("<p class='text-info'>Connecting server...</p>");
			},
			success : function(response)
			{

				$(".response").html("");
				if(response.trim() != "Login failed")
				{
					$(".status").html("<p class='text-success'>Connected</p>");
					var all_data = JSON.parse(response);
					var i;
					for(i=0;i<all_data[0].length;i++)
					{
						var design = "<div name='"+all_data[0][i]+"' class='list border d-flex p-2 mb-2' type='folder'><i class='fa fa-folder text-warning mr-2' style='font-size:30px'></i><p class='mt-1'>"+all_data[0][i]+"</p></div>";
						$(".response").append(design);
					}
					for(i=0;i<all_data[1].length;i++)
					{
						var design = "<div name='"+all_data[1][i]+"' class='list border d-flex p-2 mb-2' type='file'><i class='fa fa-file mr-2' style='font-size:30px'></i><p class='mt-1'>"+all_data[1][i]+"</p></div>";
						$(".response").append(design);
					}

					// right click design


					$(document).ready(function(){
						$(".list").each(function(){
							$(this).on("contextmenu", function(e){
								e.preventDefault();
								var name = $(this).attr("name");
								var top = e.pageY;
								var left = e.pageX;
								$(".right-option").css({
									display : 'block',
									top : top+'px',
									left : left+'px'
								});

								// close option menu

								if($(".right-option").css('display') == 'block')
								{
									$("*").scroll(function(){
										$(".right-option").css({display : 'none'});
									});
									$(document).click(function(e){
										if($(e.target).closest(".right-option").length == 0)
										{
											$(".right-option").css({display : 'none'});
										}
									});
								}

								// set file name 

								$(".menu").each(function(){
									$(this).attr("filename", name);
									$(this).click(function(){
										$(".right-option").css({display : 'none'});
										var action = $(this).attr("action");
										var filename = $(this).attr("filename");
										url = "php/"+action+".php";
										$.ajax({
											type : "POST",
											url : url,
											data : {
												filename : filename
											},
											beforeSend : function(){
												if(action == "download")
												{
													$(".status").html("<p class='text-info'>Downloading...</p>");
												}
												else if(action == "edit")
												{
													$(".status").html("<p class='text-info'>File loading...</p>");
												}
											},
											success : function(response)
											{
												if(action == "download")
												{
													if(response.trim() == "success")
													{
														$(".status").html("<p class='text-success'>Downloaded</p>");
													}
													else
													{
														$(".status").html("<p class='text-danger'>Download failed</p>");
													}
												}
												else if(action == "edit")
												{
													if(response.trim() != "failed")
													{
														$(".status").html("<p class='text-success'>Please edit your code and save</p>");
														var all_data = JSON.parse(response.trim());
														$(".editor-menu").html("<h5>"+all_data[1]+"</h5");
														$(".editor-page").attr("contenteditable", true);
														$(".editor-page").focus();
														$(".editor-page").html(all_data[0]);
													}
													else
													{
														$(".status").html("<p class='text-danger'>Failed</p>");
													}
												}
												
											}
										});
									});
								});
							});
						});
					});
				}
				else
				{
					$(".status").html("<p class='text-danger'>Connection faild please try again later</p>");
				}
			}

		});
		// drag upload code

		$(document).ready(function(){
			$(".response").on("dragover", function(e){
				e.preventDefault();
			});
			$(".response").on("drop", function(e){
				e.preventDefault();
				var file = e.originalEvent.dataTransfer.files[0];
				var formdata = new FormData();
				formdata.append("data", file);
				$.ajax({
					type : "POST",
					url : "php/upload.php",
					data : formdata,
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".status").html("<p class='text-info'>Uploading...</p>");
					},
					success : function(response){
						if(response.trim() == "success")
						{
							$(".status").html("<p class='text-success'>Uploaded</p>");
						}
						else
						{
							$(".status").html("<p class='text-danger'>Uploading Failed</p>");
						}
					}
				});
			});
		});
	
	});
});

// save edited code

$(document).ready(function(){
	$(".save-btn").click(function(){
		var filename = $(".editor-menu").text();
		var data = $(".editor-page").html();
		$.ajax({
			type : "POST",
			url : "php/save_edited_data.php",
			data : {
				filename : filename,
				data : data
			},
			beforeSend : function(){
				$(".status").html("<p class='text-info'>Saveing...</p>");
			},
			success : function(response)
			{
				if(response.trim() == "success")
				{
					$(".status").html("<p class='text-success'>Saved</p>");
					$(".login-form").submit();
				}
				else
				{
					$(".status").html("<p class='text-danger'>connection faild try again later</p>");
				}
			}
		});
	});
});