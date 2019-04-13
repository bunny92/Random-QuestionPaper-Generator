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
  <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
       
    </head>

    <body style="background-color:#EEE">
        <!-- Navbar -->
        <div  id="nav_bar">
            <nav class="white" >
                <ul class="left">
                <li><a href="<?php echo base_url() ?>dashboard" style="color:#FF3333;">HOME</a></li>
                      <li><a href="<?= base_url()?>dashboard/add_questions"style="color:#FF3333;">Add Questions</a></li>
                      <li><a href="<?= base_url() ?>dashboard/generate_questions" style="color:#FF3333;">Generate Questions</a></li>
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
                    <div class="center-align grey-text text-darken-2" style="font-size:1.1em;padding:11px;">List Of questions</div>
                </div>
                 <br/>
                <center>
                 <span class="custom-error center-align" id="error"><?php
                                            if ($this->session->flashdata("response") !== NULL) {
                                                echo $this->session->flashdata("response");
                                            }?></span>
                </center>
                         
                 <div class="divider"></div>
                <br/>
                <div class="col s12 m10 l10 offset-l1 offset-m1">
                 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sn.</th>
                            <th>Question</th>
                            <th>Modules</th>
                            <th>Semister</th>
                            <th>Subject</th>
                            <th>Branch</th>
                            <th>Date</th>
                           
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
    $n =0;
                            foreach ($details as $value) {
                                $n++;
                                ?> 
                        <tr>
                            
                            <td><?php echo $n ?></td>
                            <td><?php echo $value->question ?></td>
                            <td><?php echo $value->modules ?></td>
                            <td><?php echo $value->semister ?></td>
                            <td><?php echo $value->subject ?></td>
                            <td><?php echo $value->branch ?></td>
                            <td><?php echo $value->create_date ?></td>
                            
                            <td><a href="<?php echo base_url() ?>dashboard/delete_que/<?= $value->id ?>" style="color:red;">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
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
    <script type="text/javascript" src="<?php echo base_url() ?>js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo base_url() ?>js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url() ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url() ?>js/plugins.js"></script>    
</body>

</body>
</html>
