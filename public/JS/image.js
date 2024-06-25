const inputPhoto = document.getElementById('file');
const previewImage = document.getElementById('photo');
const coverImage = document.getElementById('cover');
const nextButton = document.getElementById('nextBtn');
var img = document.getElementById('imageInput');

inputPhoto.addEventListener('change', function () {
     const file = this.files[0];
     if (file) {
          nextButton.removeAttribute('disabled');
          nextButton.style.cursor = 'pointer';

          const reader = new FileReader();
          reader.addEventListener("load", function () {
               previewImage.setAttribute("src", this.result);
               coverImage.setAttribute("src", this.result);
          });
          reader.readAsDataURL(file);   
     }

});

if (!inputPhoto.Value) {
     nextButton.setAttribute('disabled', false);
     nextButton.style.cursor = 'default';
}