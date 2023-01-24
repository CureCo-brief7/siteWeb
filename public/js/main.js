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

		reader.onload = function (e) {
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
document.getElementById("addNew").addEventListener("click", () => {
	var html = '<div class="row justify-content-between text-left">';
	html += '<div class="form-group col-12 flex-column d-flex">';
	html += '<label class="form-control-label px-3">';
	html += 'Name<span class="text-danger"> *</span>';
	html += '</label>';
	html += '<input required  class = "name_produit" type="text" name="Name[]"';
	html += 'placeholder="Enter Name Of Product" onblur="validate(1)">';
	html += '<span class = "name_error" >' + name_error + '</span>';
	html += '</div>';
	html += '</div>';
	html += '<div class="row justify-content-between text-left">';
	html += '<div class="form-group col-sm-6 flex-column d-flex">';
	html += '<label class="form-control-label px-3">';
	html += 'Prix<span class="text-danger"> *</span>';
	html += '</label>';
	html += '<input required  class = "price_produit" type="number" name="Prix[]"';
	html += 'placeholder="Enter Prix Of Product" onblur="validate(2)">';
	html += '<span class = "price_error" >' + price_error + '</span>';
	html += '</div>';
	html += '<div class="form-group col-sm-6 flex-column d-flex">';
	html += '<label class="form-control-label px-3">';
	html += 'Quantity<span class="text-danger"> *</span>';
	html += '</label>';
	html += '<input required  class = "quantite_produit" type="number" name="Quantity[]"';
	html += 'placeholder="Enter Quantity Of Product" onblur="validate(3)">';
	html += '<span class = "quantite_error" >' + quantite_error + '</span>';
	html += '</div>';
	html += '</div>';
	html += '<div class="row justify-content-between text-left">';
	html += '<div class="form-group col-12 flex-column d-flex">';
	html += '<label class="form-control-label px-3">';
	html += 'Description<span class="text-danger"> *</span>';
	html += '</label>';
	html += '<textarea  class = "Description" style="resize : none;height: 100px;" type="text" name="Description[]"';
	html += 'placeholder="Description"';
	html += 'onblur="validate(4)"></textarea>';
	html += '<span class = "Description_error" >' + desc_error + '</span>';
	html += '</div>';
	html += '</div>';
	html += '<div class="row justify-content-between text-center">';
	html += '<div class="form-group col-12 flex-column d-flex">';
	html += '<input required id = "img_produit" type="file" name = "Image[]" class="img_produit add_image_product">';
	html += '<span class = "img_error" >' + image_error + '</span>';
	html += '</div>';
	html += '</div>';
	var form = document.createElement('div');
	form.innerHTML = html;

	document.getElementById("addProductAdd").append(form);
});

// error check

form_action = document.getElementById("form_action");
let name_error = ''
let quantite_error = ''
let price_error = ''
let image_error = ''
let desc_error = ''

form_action.addEventListener('submit', e => {
	console.log("Test")
	let name = document.getElementsByClassName('name_produit')
	let quantite = document.getElementsByClassName('quantite_produit')
	let price = document.getElementsByClassName('price_produit')
	let image = document.getElementsByClassName('img_produit')
	let desc = document.getElementsByClassName('Description')
	validatename(name, name_error)
	validatequantite(quantite, quantite_error)
	validateprice(price, price_error)
	validatedesc(desc, desc_error)
	validateimage(image, image_error)
	e.preventDefault()
	if (validatename(name, name_error) && validatequantite(quantite, quantite_error) && validateprice(price, price_error) && validatedesc(desc, desc_error) && validateimage(image, image_error)) {
		form_action.submit()
	}

})

function validatename(name, name_error) {
	for (let i = 0; i < name.length; i++) {
		if (name[i].value === '') {
			name_error = 'name must be filled in'
			return false;
		} else {
			name_error = ''
			return true;
		}
	}
}

function validatequantite(quantite, quantite_error) {
	for (let i = 0; i < quantite.length; i++) {
		if (quantite[i].value === '') {
			quantite_error = 'name must be filled in'
			return false;
		} else {
			quantite_error = ''
			return true;
		}
	}
}

function validateimage(image, image_error) {
	if (image.value === '') {
		image_error = 'image must be filled in'
		return false;
	} else {
		image_error = ''
		return true;
	}
}


function validateprice(price, price_error) {
	if (price.value === '') {
		price_error = 'price must be filled in'
		return false;
	} else {
		price_error = ''
		return true;
	}
}
function validatedesc(desc, desc_error) {
	if (desc.value === '') {
		desc_error = 'description must be filled in'
		return false;
	} else {
		desc_error = ''
		return true;
	}
}