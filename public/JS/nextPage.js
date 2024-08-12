const coverSection = document.getElementById('coverSection');
const imageSection = document.getElementById('imageSection');
const buttonSection = document.getElementById('buttonSection');
const hideForm = document.getElementById('hide_form');

nextButton.addEventListener('click', () => {
     nextButton.style.display = 'none';
     imageSection.style.display = 'none';
     buttonSection.style.display = 'none';

     hideForm.style.display = 'block';
     coverSection.style.display = 'block';
});