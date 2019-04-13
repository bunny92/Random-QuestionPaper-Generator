<!DOCTYPE html>
<html>
   <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Generate Question Paper | Random Questions Generator</title>
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
          
            .custom-error{font-size:18px;color:red;padding-left:4px}
        </style>
       <script type="text/javascript">
          function getSubjects() {
                var branch = $("#branch").val();
                var semister = $("#semister").val();
                var b = "<?php echo site_url(); ?>dashboard/getSubjects_question/";
                $.get(b, {branch: branch, semister: semister}, function (data) {
                     
                     $("#subject").html(data);
                });
               
            }

       </script>
    </head>

    <body style="background-color:#EEE">
        <!-- Navbar -->
        <div  id="nav_bar">
            <nav class="white" >
                <ul class="left">
                <li><a href="<?php echo base_url() ?>dashboard" style="color:#FF3333;">HOME</a></li>
                     <li><a href="<?= base_url() ?>dashboard/view_questions" style="color:#FF3333;">View Questions</a></li>
                     <li><a href="<?= base_url()?>dashboard/add_questions" style="color:#FF3333;">Add Questions</a></li>
                </ul>
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
                    <div class="center-align grey-text text-darken-2" style="font-size:1.1em;padding:11px;">Random Question Paper Genrator</div>
                      
                </div>
                <div class="col s12 m10 l10 offset-l1 offset-m1">
                <div class="row">
                    <div class="col s12 m8 l8 offset-l2 offset-m2">
                     
                  <div class="card-panel">
                      <center>
                           <h4 class="header2 grey-text">Generate Question paper</h4>
                          <br/>
                          <span class="custom-error center-align" id="error"><?php
                                            if ($this->session->flashdata("response") !== NULL) {
                                                echo $this->session->flashdata("response");
                                            }?></span>

                      </center>
                   <div class="divider"></div>
                      <br/>
                    <div class="row">
                      <form  method="POST"  action="<?php echo base_url() ?>dashboard/save_download">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                           
                    <select name="branch" required id="branch">
                      <option value="" disabled selected></option>
                     <?php foreach($branch as $row) { ?>
                      <option value="<?=$row->branch ?>"><?=$row->branch?></option>
                      <?php } ?>
                    </select>
                              <label for="email">Branch</label>
                          </div>
                                             
                          <div class="input-field col s12 m6 l6">
                          
                    <select name="semister" id ="semister" required onchange="getSubjects()">
                      <option value="" disabled selected></option>
                      <option value="1y1s">1Y - 1S</option>
                      <option value="1y2s">1Y - 2S</option>
                      <option value="2y1s">2Y - 1S</option>
                      <option value="2y2s">2Y - 2S</option>
                      <option value="3y1s">3Y - 1S</option>
                      <option value="3y2s">3Y - 2S</option>
                      <option value="4y1s">4Y - 1S</option>
                      <option value="4y2s">4Y - 2S</option>
                    </select>
                               <label for="email">Semister</label>
                          </div>
                          </div>
                       <div class="row">
                          <div class="input-field col s12 m6 l6">
                          
                                    <select class="browser-default" name = "subject" id = "subject">
                                              <option value = "no" disabled selected  >Select Subject</option>
                                            </select>
                           
                          </div>
                      
                          <div class="input-field col s12 m6 l6">
                          
                          <select name="status" required>
                          <option value="" disabled selected></option>
                          <option value="easy">Easy</option>
                          <option value="medium">Medium</option>
                          <option value="hard">Hard</option>         
                          </select>  
                               <label for="email">Question status</label>     
                          </div>
                        </div>
                          <div class="input-field col s12 m6 l6">
                          
                          <select id="exam" name="examination" required>
                          <option value="" disabled selected></option>
                          <option value="I-Mid">I-Mid</option>
                          <option value="II-Mid">II-Mid</option>
                          <option value="Semister">Semister</option>         
                          </select>  
                               <label for="exam">Examination</label>     
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                                <center>
                              <button class="btn red waves-effect waves-light" type="submit" name="action">Generate Question Paper
                              </button>  
                                </center>
                              
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                 </div>
                    
                </div>
               </div>
                

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
