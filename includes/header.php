<head>
	<title>Inside Dinagat</title>
	<link rel="icon" href="images/logo1.png" type="image/gif" sizes="16x16">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- <link rel="stylesheet" href="plugins/toastr/toastr.min.css"> -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">

  <style type="text/css">
iframe{
  height: 70vh;
  width: 100%;
}
img {
  object-fit: cover;
  border-radius: 4px;
}
section{
  min-height: 70vh;
}
#companyLogoStore{
  width: 200px;height:200px;bottom:100px;left: -66px;z-index: 2;position: relative;
}
.text-holder-ig {
    background: #4b8758de;
    padding: 8px 18px;
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    position: absolute;
    bottom: -10px;
    left: 29%;
    color: #fff;
}
.Inside-gallery .inner-wrap-gallery {
    display: flex!important;
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
     position: relative;
    padding: 0 10px 5px 10px;
    background: #b0ebbd21;
}

.Inside-gallery .img-holder-wrap {
    max-width: 100%;
    max-height: 100%;
    height: 190px;
    overflow: hidden;
    object-fit: contain!important;
     border-radius:2px;

}
.form-group {
  margin: 0 !important;
}

    .card-prod {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: /*300px*/;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: flex;
  gap:10px;

}

.price-prod {
  color: grey;
  font-size: 20px;
  text-align: center;
}

.card-prod button {
  border: none;
  outline: 0;
  padding: 5px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card-prod button:hover {
  opacity: 0.7;
}
#deltable{
  width: 100%;
}
.CnameDesign{
    position: absolute;
    bottom: -16px;
    left: 0px;
    font-size: 32px;
    font-weight: bold;
    background-color: #04040480;
    padding: 5px;
    width: 100%;
    text-align: left;
    text-indent: 171px;
    z-index: 1;
   
}
#product_containerD{
  z-index: 3;
  position: relative;
  padding: 10px;
  margin:5px;
}
#product_containerD:hover{
  border:pink solid 2px !important;
  transform: scale(1.08);
  z-index: 10;
}
#stablishmentIcon:hover{
    border:pink solid 1px !important;
  transform: scale(1.08);
  z-index: 10;
}
#hahacharlang{
  display: none;
}
#hahacharlang:hover{
  display: block;
}
#menu_prod_cover{
  background-color: #000000e8;
  position: absolute;
  top:0px;
  width: 100%;
  bottom:0px;
  color:white;
  text-align: center;
  padding-top:50%;
  font-size:25px;
  font-weight: 700;
  z-index: 3;
  display: none;

}
#prod_cover{
  background-color: #000000e8;
  position: absolute;
  top:0px;
  width: 100%;
  height: :0px;
  color:transparent;
  text-align: center;
  font-size:16px;
  font-weight: 700;
  z-index: 3;
  display: none;
  padding: 10px;

}
.card:hover #menu_prod_cover{
  display: block;
}
#roomcont{
  cursor: pointer;
  position:relative;
  z-index: 1;
}
#roomcont:hover #prod_cover{
display: block;
z-index: 2;
animation-name: example;
animation-duration: 1s;  
animation-fill-mode: forwards;
}
@keyframes example {
  from {height: 10%;}
  to {height: 20%;}
  to {height: 40%;}
  to {height: 60%;}
  to {height:80%;}
  to {height: 100%;color:white;}
}
#packimgcontouter{
  padding: 5px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;

}
#packimgcontouter .packimgscont{
flex-basis: 30%;
padding:5px;
overflow: hidden;
height:122px;

}
#packimgcontouter .packimgscont:first-child{
  flex-basis:100%;
  height:210px;
  }
.reservationTable thead{
background-color: blue;
color:white;
} 
.reservationTable tbody tr:hover{
  background-color: lightblue;
  cursor: pointer;
}
@media screen 
 and (max-width: 1000px) 
 and (min-width: 200px) 
{ 
  #gal{
    min-height: 50vh;
  }
  .my_row{
    display: flex !important;
    -ms-flex: flex !important;
    gap:0px !important;
  }
  .my_col-6{
    width: 45% !important;
  }
  .my_col-66{
    width: 40% !important;
  }

  .gtitle{
    font-size:30px;
  }
  section.features .appFeatures-item-wrapper .app-item-title {
    font-size: 20px!important;
    font-weight: 600!important;
}
  #packagebody p ,#packagebody h6{
    font-size: 14px;
  }
  #packagebody h1,{
    font-size: 30px !important;
  }
   #packagebody h2{
    font-size:  25px !important;
   }
    #packagebody h3, #packagebody h4,#packagebody h5 {
      font-size: 20px !important;
    }
  iframe{
    height: 300px !important  ;
  }
   #desktopView{
    display: none;
   }
   .navbar img{
    width: 100%;
   }
   .navbar .navbar-toggler {
    width: 100px;
    height: 100px;
   }
   .row{
    gap:1em;
   }
   .card .card-body{
    padding: 1em !important;
   }
   .gallery-wrappers,.mySlides{
    height: 299px !important;
   }
/*   .wrapper .container{
    padding: 2em;
   }*/
   .Gallery .text-title{
    font-size:20px !important;
   }
   .Gallery .mySlides h1{
    font-size: 16px;
   }
   .Gallery .column{
    width: 47%;
   }
   .Gallery .next1 , .Gallery .prev1{
    top:50%;
   }
   .main-footer .text{
    justify-content: center;
    text-align: center !important;
   }
   section.Gallery .gallery-wrap {
    padding: 0px !important;
}
.html5-video-player {
  height: 300px;
  }
}
@media screen 
 and (max-width: 2000px) 
 and (min-width: 1200px) 
{ 
   #phoneView{
    display: none;
   }

}
.ratess {
    float: left;
    height: 46px;
    padding: 0 10px;
    position: absolute;
    width: 100%;
    right:20px;
}
.ratess:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.ratess:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:25px;
    color:#ccc;
    /*background-color: yellow;*/
    margin-top: -10px;
}
.ratess:not(:checked) > label:before {
    content: '★  ';
}
.ratess > input:checked ~ label {
    color: #ffc700;    
}
.ratess:not(:checked) > label:hover,
.ratess:not(:checked) > label:hover ~ label {
    color:red;  
}
.ratess > input:checked + label:hover,
.ratess > input:checked + label:hover ~ label,
.ratess > input:checked ~ label:hover,
.ratess > input:checked ~ label:hover ~ label,
.ratess > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


.ratess1 {
    float: left;
    height: 46px;
    padding: 0 10px;
    position: absolute;
    width: 100%;
    top:84px;
    right: 70px;
}
.ratess1:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.ratess1:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:25px;
    color:#ccc;
    /*background-color: yellow;*/
    margin-top: -10px;
}
.ratess1:not(:checked) > label:before {
    content: '★  ';
}
.ratess1 > input:checked ~ label {
    color: #ffc700;    
}
.ratess1:not(:checked) > label:hover,
.ratess1:not(:checked) > label:hover ~ label {
    color:red;  
}
.ratess1 > input:checked + label:hover,
.ratess1 > input:checked + label:hover ~ label,
.ratess1 > input:checked ~ label:hover,
.ratess1 > input:checked ~ label:hover ~ label,
.ratess1 > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
</head>