<%@ Page Language="C#" AutoEventWireup="true"  CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>jQuery Zoom Image on Mouse Hover using jQuery Image Zoom Plugin</title>
    <link href="jQuery.fancybox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="js/jquery.elevatezoom.min.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
<style type="text/css">
 #gallery_01 img{border:2px solid white;width: 96px;}
  .active img{border:2px solid #333 !important;}
 </style>
</head>
<body>
    <div>
    <img id="img1" src="imagess/small/image1.png" data-zoom-image="images/large/image1.jpg" />
<div id="gallery_01">
<a  href="#" class="active" data-image="images/small/image1.png" 
data-zoom-image="images/large/image1.jpg">
<img src="imagess/small/image1.png"  /></a>
<a  href="#" data-image="images/small/image2.png" data-zoom-image="images/large/image2.jpg"> 
<img src="imagess/small/image2.png" /></a>
<a href="#" data-image="images/small/image3.png" data-zoom-image="images/large/image3.jpg">
     <img src="imagess/small/image3.png" /></a>
<a href="#" data-image="images/small/image4.png" data-zoom-image="images/large/image4.jpg">
<img src="imagess/small/image4.png" /></a>
</div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $("#img1").elevateZoom({ gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: "active" });
        $("#img1").bind("click", function(e) {
        var ez = $('#img1').data('elevateZoom');
  ez.closeAll(); 
	$.fancybox(ez.getGalleryList());
  return false;
}); 
}); 
</script>
</body>
</html>
