 /**
 * Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/* exported initSample */

$(function(){

    /*---------- Action Sản phẩm ------------*/
    $('#addMenu').on('submit',function(e){
        e.preventDefault();
        addForm(this);
    })

    $('#updateMenu').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteMenu').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })
    /*------------- Ngôn ngữ ---------------*/

    $('#updateLangConfig').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangMenu').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangPage').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangNewsCat').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangNews').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })
    
     $('#updateLangServiceCat').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangService').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })
    
    $('#updateLangProductCat').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#updateLangProduct').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

	/*---------- Action Sản phẩm ------------*/
	$('#addAccount').on('submit',function(e){
		e.preventDefault();
		addForm(this);
	})

	$('#updateAccount').on('submit',function(e){
		e.preventDefault();
		updateForm(this);
	})

	$('#deleteAccount').on('click',function(e){
		e.preventDefault();
		deleteForm(this);
	})

    /*---------- Action Danh mục sản phẩm ------------*/
    $('#addProductCat').on('submit',function(e){
        e.preventDefault();
        addForm(this);
    })

    $('#updateProductCat').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteProductCat').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })

    /*---------- Action Sản phẩm ------------*/
    $('#addProduct').on('submit',function(e){
        e.preventDefault();
        addForm(this);
    })

    $('#updateProduct').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteProduct').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })


	/*----------- Action Bài viết ----------------*/
	$('#addPage').on('submit',function(e){
		e.preventDefault();
		addForm(this);
	})

	$('#updatePage').on('submit',function(e){
		e.preventDefault();
		updateForm(this);
	})

	$('#deletePage').on('click',function(e){
		e.preventDefault();
		deleteForm(this);
	})

	/*----------- Action Danh mục bài viết ----------------*/
	$('#addNewsCat').on('submit',function(e){
		e.preventDefault();
		addForm(this);
	})

	$('#updateNewsCat').on('submit',function(e){
		e.preventDefault();
		updateForm(this);
	})

	$('#deleteNewsCat').on('click',function(e){
		e.preventDefault();
		deleteForm(this);
	})

	/*----------- Action Tin tức ----------------*/
	$('#addNews').on('submit',function(e){
		e.preventDefault();
		addForm(this);
	})

	$('#updateNews').on('submit',function(e){
		e.preventDefault();
		updateForm(this);
	})

	$('#deleteNews').on('click',function(e){
		e.preventDefault();
		deleteForm(this);
	})
    /*----------- Action Danh mục dịch vụ ----------------*/
    $('#addServiceCat').on('submit',function(e){
        e.preventDefault();
        addForm(this);
    })

    $('#updateServiceCat').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteServiceCat').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })

    /*----------- Action Dịch vụ ----------------*/
    $('#addService').on('submit',function(e){
        e.preventDefault();
        addForm(this);
    })

    $('#updateService').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteService').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })

    /*--------- Action khách hàng ---------------*/

    $('#updateOrder').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })

    $('#deleteOrder').on('click',function(e){
        e.preventDefault();
        deleteForm(this);
    })

    /*-------- Action config --------------*/

    $('#updateConfig').on('submit',function(e){
        e.preventDefault();
        updateForm(this);
    })






	var deleteForm = function(button){
        $(button).parent('form').find('button').prop('disabled', true);
        $(button).parent('form').find('button').addClass('btn-loadding');
        var confirm1 = confirm("Xác nhận xóa?");
        if (confirm1) {
            var id = $(button).data('id');
            var action = $(button).data('action');
            $.ajax({
                url: "ajax.php",
                type: "post",
                data: "id="+id+"&action="+action,
                dataType: "json",
                success:function(json){
                    if(json['success']){
                        alert(json['success']);
                        location.href = json['url'];
                    }

                    if (json['error']) {
                        alert(json['error']);
                        $(button).parent('form').find('button').removeAttr('disabled');
                        $(button).parent('form').find('button').removeClass('btn-loadding');
                    }
                }
            });
        }
    }

    var updateForm = function(formSelf){
        $(formSelf).find('button').prop('disabled', true);
        $(formSelf).find('button').addClass('btn-loadding');
        for ( instance in CKEDITOR.instances )
        {
            CKEDITOR.instances[instance].updateElement();
        }
        var form = $(formSelf);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }

        $.ajax({
            url:"ajax.php",
            type:"post",
            data: formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            dataType:"json",
            success:function(json){
                if (json['success']) {
                    $("#success").html(json['success']);
                    alert(json['success']);
                    location.reload();
                }
                if (json['ok']) {
                	location.reload();	
                }
                if(json['error']){
                    alert(json['error']);
                    $(formSelf).find('button').removeAttr('disabled');
                    $(formSelf).find('button').removeClass('btn-loadding');
                }
            },
            error: function () {
                alert('error');
            }
        });
    }

    var addForm = function(formSelf){
        $(formSelf).find('button').prop('disabled', true);
        $(formSelf).find('button').addClass('btn-loadding');
        for ( instance in CKEDITOR.instances ){
            CKEDITOR.instances[instance].updateElement();
        }
        var form = $(formSelf);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            type: "POST",
            data: formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            url: "ajax.php",
            dataType: "json",
            success:function(json){
                if (json['success']) {
                    alert(json['success']);
                    location.href = json['url'];
                }
                if (json['error']) {
                    $(formSelf).find('button').removeAttr('disabled');
                	alert(json['error']);
                    $(formSelf).find('button').removeClass('btn-loadding');
                }
            }
        })
    }

    $("#fileUpload").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder");
        image_holder.empty();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              	for (var i = 0; i < countFiles; i++){
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                  	$("<img />", {
		                    "src": e.target.result,
		                    "class": "thumb-image"
	                  	}).appendTo(image_holder);
	                }
	                image_holder.show();
	                reader.readAsDataURL($(this)[0].files[i]);
	             }
            } else {
              	alert("This browser does not support FileReader.");
            }
        } else {
            alert("Pls select only images");
        }
    });

    var length_des_seo = $('[name="des_seo"]').val().length;
    $('[name="des_seo"]').siblings().children(".text-character").html(length_des_seo);

    var length_title_seo = $('[name="title_seo"]').val().length;
    $('[name="title_seo"]').siblings().children(".text-character").html(length_title_seo);
})

function countChar(val) {
    var len = $(val).val().length;
    var ctext = len;
    $(val).siblings().children(".text-character").html(ctext);
    
    //var len = val.value.length;
    // var str = val.value;
    // var parts = [];
    // var partSize = 160;

    // while (str) {
    //     if (str.length < partSize) {
    //         var rtext = (partSize - str.length) + " Chars Remaining";
    //         parts.push(str);
    //         break;
    //     }
    //     else {
    //         parts.push(str.substr(0, partSize));
    //         str = str.substr(partSize);
    //     }

    // }
    // var ptext = parts.length + " Parts";
    
    // $('#text-character').html(ctext);
    // $('#text-parts').val(ptext);
    // $('#text-remaining').val(rtext);

}