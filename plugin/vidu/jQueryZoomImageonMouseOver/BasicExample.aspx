<%@ Page Language="C#" AutoEventWireup="true" CodeFile="BasicExample.aspx.cs" Inherits="BasicExample" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>jQuery Zoom Image on Mouse Hover</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="js/jquery.elevatezoom.min.js" type="text/javascript"></script>
</head>
<body>
    <div>
    <img id="img1" src="imagess/small/image1.png" data-zoom-image="images/large/image1.jpg"/>
    </div>
     <script type="text/javascript">
         $(function() {
         $("#img1").elevateZoom();
         }); 
</script>
</body>
</html>
