<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
     {{-- <link rel="stylesheet" href="{{asset('CSS/certificate.css')}}"/> --}}
     <title> شهادة الطالب {{$student->person->name}}</title>
     <style>
          *{
     margin: 0;
     padding: 0;
     }

     body{
          height: 50%;
     }

#coverSection{
     width: 100%;
     min-height: 100vh;
     /* margin-left: 25%; */
     display: none;
}

.image-cover-section img{
     width: 100%;
     height: 100%;
}

.image-cover-section div{
     text-align: center;
     font-size: 20px;
     font-family: DejaVu Sans, sans-serif;
     direction: rtl;
     position: absolute;
     top: 50%;
     right: 50%;
     cursor: default;
}

.image-cover-section div:nth-child(3){
     top: 30%;
}
     </style>
</head>
<body>
     <section id="coverSection" style="display: block">
          <div class="image-cover-section">
               <img id="cover" src="{{$certificate->certificate}}"/>
               <div id="name_ar" style="transform: translate({{$certificate->name_ar_x}}px,{{$certificate->name_ar_y-390}}px)">
                    {{$student->person->name}}
                    {{-- الاسم بالعربية --}}
               </div>
               <div id="name_en" style="transform: translate({{$certificate->name_en_x}}px,{{$certificate->name_en_y-230}}px)">
                    {{$student->name_en}}
                    {{-- Name In English --}}
               </div>
          </div>
     </section>
</body>
</html>