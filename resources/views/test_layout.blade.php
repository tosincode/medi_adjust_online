<!DOCTYPE html><html lang="en"><head>
    <meta charset="UTF-8">
    <title>Forked from - New snippet 622</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.10.min.css">
<style></style>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

</head>
<body>

@yield('index_content')
<script src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled-4.8.10.min.js"></script>


<script>$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});</script>
</body>
</html>