var name_ar_x = document.getElementById('name_ar_x');
var name_ar_y = document.getElementById('name_ar_y');
var name_en_x = document.getElementById('name_en_x');
var name_en_y = document.getElementById('name_en_y');

// Item that you want to drag it
var name_en = document.getElementById('name_en');
var name_ar = document.getElementById('name_ar');

var active_en = false;
var currentX_en = -4;
var currentY_en = 21;
var initialX_en = -4;
var initialY_en = 21;
var xOffset_en = 0;
var yOffset_en = 0;

if (name_en_x.value) {
     currentX_en = name_en_x.value;
     initialX_en = name_en_x.value;
     xOffset_en = name_en_x.value;
}
if (name_en_y.value) {
     currentY_en = name_en_y.value;
     initialY_en = name_en_y.value;
     yOffset_en = name_en_y.value;
}



var active_ar = false;
var currentX_ar = 2;
var currentY_ar = 0;
var initialX_ar = 2;
var initialY_ar = 0;
var xOffset_ar = 0;
var yOffset_ar = 0;

if (name_ar_x.value) {
     currentX_ar = name_ar_x.value;
     initialX_ar = name_ar_x.value;
     xOffset_ar = name_ar_x.value;
}
if (name_ar_y.value) {
     currentY_ar = name_ar_y.value;
     initialY_ar = name_ar_y.value;
     yOffset_ar = name_ar_y.value;
}

// Add Events To Item
name_en.addEventListener('mousedown', function (e) {
     dragStart(e, 'name_en');
     document.addEventListener('mouseup', function (e) {
          dragEnd(e, 'name_en');
     });
     document.addEventListener('mousemove', function (e) {
          drag(e, 'name_en');
     });
});


name_ar.addEventListener('mousedown', function (e) {
     dragStart(e, 'name_ar');
     document.addEventListener('mouseup', function (e) {
          dragEnd(e, 'name_ar');
     });
     document.addEventListener('mousemove', function (e) {
          drag(e, 'name_ar');
     });
});

// Start Dragging
function dragStart(e, type) {
     if (type == 'name_en') {
          initialX_en = e.clientX - xOffset_en;
          initialY_en = e.clientY - yOffset_en;

          if (e.target === name_en) {
               active_en = true;
          }
     }
     else if (type == 'name_ar') {
          initialX_ar = e.clientX - xOffset_ar;
          initialY_ar = e.clientY - yOffset_ar;

          if (e.target === name_ar) {
               active_ar = true;
          }
     }
}

// End Dragging
function dragEnd(e, type) {
     if (type == 'name_en') {
          initialX_en = currentX_en;
          initialY_en = currentY_en;
          active_en = false;
     }
     else if (type == 'name_ar') {
          initialX_ar = currentX_ar;
          initialY_ar = currentY_ar;
          active_ar = false;
     }
}

// Drag
function drag(e, type) {
     if (type == 'name_en') {
          if (active_en) {

               e.preventDefault();

               currentX_en = e.clientX - initialX_en;
               currentY_en = e.clientY - initialY_en;

               xOffset_en = currentX_en;
               yOffset_en = currentY_en;

          }
     }
     else if (type == 'name_ar') {
          if (active_ar) {

               e.preventDefault();

               currentX_ar = e.clientX - initialX_ar;
               currentY_ar = e.clientY - initialY_ar;

               xOffset_ar = currentX_ar;
               yOffset_ar = currentY_ar;
          }
     }
     setTranslate(currentX_en, currentY_en, currentX_ar, currentY_ar, name_en, name_ar);
     name_ar_x.setAttribute('value', currentX_ar);
     name_ar_y.setAttribute('value', currentY_ar);
     name_en_x.setAttribute('value', currentX_en);
     name_en_y.setAttribute('value', currentY_en);

}

// Update Item Location
function setTranslate(xPos_en, yPos_en, xPos_ar, yPos_ar, name_en, name_ar) {

     name_en.style.transform = "translate3d(" + xPos_en + "px, " + yPos_en + "px, 0)";
     name_ar.style.transform = "translate3d(" + xPos_ar + "px, " + yPos_ar + "px, 0)";

}