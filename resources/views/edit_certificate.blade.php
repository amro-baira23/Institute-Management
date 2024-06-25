<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="{{asset('CSS/certificate.css')}}"/>
     <title>تعديل شهادة</title>
</head>
<body>
     @if (Session::has('success'))
          <div id="message" class="success">{{Session::get('success')}}</div>
     @endif
     <section id="coverSection" style="display: block">
          <div class="image-cover-section">
               <img id="cover" src="{{asset($certificate->certificate)}}"/>
               <div id="name_ar" style="transform: translate({{$certificate->name_ar_x}}px,{{$certificate->name_ar_y}}px)">الاسم بالعريبة </div>
               <div id="name_en" style="transform: translate({{$certificate->name_en_x}}px,{{$certificate->name_en_y}}px)">Name In English</div>
          </div>
     </section>

     <form action="{{url('certificate',$certificate->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <section id="hide_form" style="display: block">
               <input style="display: none" id="name_ar_x" name="name_ar_x" type="text" value="{{$certificate->name_ar_x}}"/>
               <input style="display: none" id="name_ar_y" name="name_ar_y" type="text" value="{{$certificate->name_ar_y}}"/>
               <input style="display: none" id="name_en_x" name="name_en_x" type="text" value="{{$certificate->name_en_x}}"/>
               <input style="display: none" id="name_en_y" name="name_en_y" type="text" value="{{$certificate->name_en_y}}"/>
               <button type="submit">حفظ التعديلات</button>
          </section>
     </form>
</body>


<script src="{{asset('JS/script.js')}}"></script>
<script>
     var message = document.getElementById('message');
     setTimeout(function (){
          message.style.display = 'none';
     },2000);
</script>
</html>