<!DOCTYPE html>
<html>
   <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Add Question | Random Questions Generator</title>
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
                var a = $("#branch").val();
                var b = "<?php echo site_url(); ?>dashboard/getSubjects/";
                $.get(b, {branch: a}, function (data) {
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
                </ul>
                <ul class="right">
                    <li><a href="<?php echo base_url() ?>admin/profile" style="color:#FF3333;">  <i class="mdi-social-person-outline prefix"></i></a></li>
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
                           <h4 class="header2 grey-text">Add Question and properties</h4>
                          <br/>
                          <span class="custom-error center-align" id="error"><?php
                                            if ($this->session->flashdata("response") !== NULL) {
                                                echo $this->session->flashdata("response");
                                            }
                                            ?></span>

                      </center>
                   <div class="divider"></div>
                    <div class="row">
                        <br/>
                      <form  method="POST"  action="<?php echo base_url() ?>dashboard/update_question">
                        <div class="row">
                        
                               <div class="input-field col s12">
                                    <label for="message">Question</label>
                                    <?php foreach($edited as $value) { ?>
                                     <input name="que_id" type="hidden" value="<?= $value->id ?>">
          <input name="question" type="text" value="<?= $value->question ?>" required class="validate">
          <?php } ?>
        </div>
                           
                          </div>
                        <div class="row">
                          <div class="input-field col s12 m6 l6">
                           
                          
                    <select name="modules" required>
                      <option value="" disabled selected></option>
                      <option value="short">Short answer</option>
                      <option value="long">Long answer</option>
                    </select>
                                <label for="email">Choose your Modules</label>
                            <span class="grey-text" style="font-size:.8em;">* Modules are like short and essay answers.</span>  
                          </div>
                       
                            <div class="input-field col s12 m6 l6">
                           
                    <select id="branch" onchange="getSubjects()" name="branch" required>
                      <option value="" disabled selected></option>
                      <?php foreach($branch as $row) { ?>
                      <option value="<?=$row->branch ?>"><?=$row->branch?></option>
                      <?php } ?>
                     
                    </select>
                              <label for="email">Branch</label>
                          </div>
                        </div>
                           <div class="row">
                             <div class="input-field col s12 m6 l6">
                          
                    <select name="semister" required>
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
                      
                        
                          <div class="input-field col s12 m6 l6">
                         
                                            <select class="browser-default" name = "subject" id = "subject">
                                              <option value = "no" disabled selected  >Select Subject</option>
                                            </select>
                        
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                          
                          <select name="status" required>
                          <option value="" disabled selected></option>
                          <option value="easy">Easy</option>
                          <option value="medium">Medium</option>
                          <option value="hard">Hard</option>         
                          </select>  
                               <label for="email">Question status</label>     
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                                <center>
                              <button class="btn red waves-effect waves-light" type="submit" name="action">Create
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
