// navbar
(function ($) {

	"use strict";

	$('nav .dropdown').hover(function () {
		var $this = $(this);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		$this.find('.dropdown-menu').addClass('show');
	}, function () {
		var $this = $(this);
		$this.removeClass('show');
		$this.find('> a').attr('aria-expanded', false);
		$this.find('.dropdown-menu').removeClass('show');
	});

})(jQuery);

// product edit upload image

function readURL(input) {
	if (input.files && input.files[0]) {
  
	  var reader = new FileReader();
  
	  reader.onload = function(e) {
		$('.image-upload-wrap').hide();
  
		$('.file-upload-image').attr('src', e.target.result);
		$('.file-upload-content').show();
  
		$('.image-title').html(input.files[0].name);
	  };
  
	  reader.readAsDataURL(input.files[0]);
  
	} else {
	  removeUpload();
	}
  }
  
  function removeUpload() {
	$('.file-upload-input').replaceWith($('.file-upload-input').clone());
	$('.file-upload-content').hide();
	$('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
	  $('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
	  $('.image-upload-wrap').removeClass('image-dropping');
  });

// add multi product
document.getElementById("addNew").addEventListener("click",() =>{
	var html = '<div class="row justify-content-between text-left">';
			html += '<div class="form-group col-12 flex-column d-flex">';
				html += '<label class="form-control-label px-3">';
					html += 'Name<span class="text-danger"> *</span>';
				html += '</label>';
				html += '<input required type="text" name="Name[]"';
					html += 'placeholder="Enter Name Of Product" onblur="validate(1)">';
			html += '</div>';
		html += '</div>';
		html += '<div class="row justify-content-between text-left">';
			html += '<div class="form-group col-sm-6 flex-column d-flex">';
				html += '<label class="form-control-label px-3">';
					html += 'Prix<span class="text-danger"> *</span>';
				html += '</label>';
				html += '<input required type="number" name="Prix[]"';
					html += 'placeholder="Enter Prix Of Product" onblur="validate(2)">';
			html += '</div>';
			html += '<div class="form-group col-sm-6 flex-column d-flex">';
				html += '<label class="form-control-label px-3">';
					html += 'Quantity<span class="text-danger"> *</span>';
				html += '</label>';
				html += '<input required type="number" name="Quantity[]"';
					html += 'placeholder="Enter Quantity Of Product" onblur="validate(3)">';
			html += '</div>';
		html += '</div>';
		html += '<div class="row justify-content-between text-left">';
			html += '<div class="form-group col-12 flex-column d-flex">';
				html += '<label class="form-control-label px-3">';
					html += 'Description<span class="text-danger"> *</span>';
				html += '</label>';
				html += '<textarea required style="resize : none;height: 100px;" type="text" name="Description[]"';
					html += 'placeholder="Description"';
					html += 'onblur="validate(4)"></textarea>';
			html += '</div>';
		html += '</div>';
		html += '<div class="row justify-content-between text-center">';
			html += '<div class="form-group col-12 flex-column d-flex">';
				html += '<label class="form-control-label px-3 labelAdd" for="Image">'; 
					html += '<input required type="file" class = "inputAdd" name="Image[]" id="Image" accept="image/*">';
					html += 'Add Picture';
				html += '</label>';
			html += '</div>';
		html += '</div>';
    var form  = document.createElement('div');
    form.innerHTML = html;

    document.getElementById("addProductAdd").append(form);
});