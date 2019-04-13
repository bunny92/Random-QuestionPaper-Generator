<!DOCTYPE html>
<html>
   <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Dashboard | Random Questions Generator</title>
  <meta name="msapplication-TileColor" content="#FC0624">
  <!-- CORE CSS-->
  <link href="<?php echo base_url()?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url()?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  
        <style>
            body {
                font-family: 'Open Sans';
                background-color: white;
                display: flex;
                min-height: 100vh;
                flex-direction: column;
                }
            .content::-webkit-scrollbar {
                display: none;
            }
            .blink {
                animation: blink-animation 1s steps(5, start) infinite;
                -webkit-animation: blink-animation 1s steps(5, start) infinite;
            }
            @keyframes blink-animation {
                to {
                    visibility: hidden;
                }
            }
            @-webkit-keyframes blink-animation {
                to {
                    visibility: hidden;
                }
            }
                 main {
                        flex: 1 0 auto;
                      }
           
        </style>
       
    </head>

    <body style="background-color:#EEE">
        <!-- Navbar -->
        <div  id="nav_bar">
            <nav class="white" >
                <ul class="right">
                      <li><a href="#" style="color:#FF3333;">Administrator</a></li>
                    <li><a href="<?php  echo base_url()?>admin/logout" style="color:#FF3333;"><i class="mdi-action-settings-power"></i></a></li> 
                </ul>
            </nav>
        </div>
        <!-- End of  Nav bar -->
        <main>
            <div class="row" >
                <div class="row" style="margin-bottom:0px; padding-bottom:0px;">
                    <br/>
                    <div class="center-align grey-text text-darken-2" style="font-size:2em;padding:11px;">Random Question Paper Genrator</div>
                </div>
                <br/>
                <div class="col s12 m10 l10 offset-l1 offset-m1">
                <div class="row">
                    <div class="col s12 m4 l4">
                        <a href="<?= base_url()?>dashboard/add_questions"><div class="card-panel">
                            <div class="box">
                               
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/create.png" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;"></span>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col s12 m4 l4">
                        <a href="<?= base_url() ?>dashboard/generate_questions"><div class="card-panel">
                            <div class="box">
                               
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/generate.png" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;"></span>
                              </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col s12 m4 l4">
                        <a href="<?= base_url() ?>dashboard/view_questions"><div class="card-panel">
                            <div class="box">
                               
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/view.png" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;"></span>
                                </div>
                            </div>
                            </div></a>
                        
                    </div>
                </div></div>
                

            </div>

        </main>
        <!-- START FOOTER -->
  <footer class="page-footer white">
    <div class="footer-copyright white">
      <div class="container">
        <span class="grey-text">Copyright © 2017 Generate Questions Randomly All rights reserved.</span>
        <span class="right grey-text" style="font-size:.7em;"> Design and Developed by B*</span>
        </div>
    </div>
  </footer>
       <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url()?>js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url()?>js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url()?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url()?>js/plugins.js"></script>

</body>
</html>
