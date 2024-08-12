<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="{{asset('CSS/certificate.css')}}"/>
     <title>إضافة شهادة</title>
</head>
<body>
     @if (Session::has('success'))
          <div id="message" class="success">{{Session::get('success')}}</div>
     @endif
     <section id="imageSection" class="image-section">
          <img id="photo"/>
     </section>
     <button type="button" class="next-btn" id="nextBtn">التالي</button>

     <section id="coverSection">
          <div class="image-cover-section">
               <img id="cover"/>
               <div id="name_ar">الاسم بالعريبة</div>
               <div id="name_en">Name In English</div>
          </div>
     </section>

     <form action="{{url('certificate')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <section class="upload-file-btn" id="buttonSection">
               <input id="file" type="file" name="certificate"/>
               <button type="button">ارفع صورة</button>
          </section>
          {{-- <input style="display: block" id="imageInput" name="certificate" type="file"/> --}}
          <section id="hide_form">
               <input style="display: none" id="name_ar_x" name="name_ar_x" type="text" value=""/>
               <input style="display: none" id="name_ar_y" name="name_ar_y" type="text" value=""/>
               <input style="display: none" id="name_en_x" name="name_en_x" type="text" value=""/>
               <input style="display: none" id="name_en_y" name="name_en_y" type="text" value=""/>
               <button type="submit">حفظ البيانات</button>
          </section>
     </form>
</body>

<script src="{{asset('JS/image.js')}}"></script>
<script src="{{asset('JS/nextPage.js')}}"></script>
<script src="{{asset('JS/script.js')}}"></script>
<script>
     var message = document.getElementById('message');
     setTimeout(function (){
          message.style.display = 'none';
     },2000);
</script>
</html>