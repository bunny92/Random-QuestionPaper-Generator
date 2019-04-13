<!DOCTYPE html>
<html lang="en">
<head>

</head>
    <body>
        <div class="container">
        <center>
         <h4  style="font-size: 1.2em; text-align: center;"><?php echo $_POST["semister"]; ?>&nbsp; BTech Regular Examination,&nbsp;<?=  date("jS \of F Y") ?></h4> 
         <h4  style="font-size: 1.2em; text-align: center;"><?php echo $_POST["subject"]; ?></h4>
         <h5  style="font-size: 1.1em; text-align: center;">(Common to &nbsp;<?php echo $_POST["branch"]; ?> and IT)</h5>
        </center>
        <span style="text-align: right;">Time : 3:00 Hr | Total Marks : 70</span>
          <hr>
            
            NOTE :<i>1.	Answer ques. No. one ( Part – A) and any 4 of the remaining 7 (Part – B)</i>
            <br/>
            <i>2.	All parts of a ques. must be answered in 1 place, otherwise they will not be valued.</i>
            <br/>
            <i>3.	Figures in the right hand margin indicate marks allotted.</i>
            <hr style="border: 1px dashed black;" />
            <br/>
            <br/>
            <center> <h6 style="font-size: 1.2em;"><b><u>Part – A</u></b></h6></center>
            
           
             <table style="font-size: 1.1em;" cellspacing="0">
                    <tbody>
                         <?php
                           $n = 0;
                           foreach ($response as $value) { 
                           $n++;
                                ?> 
                        <tr>
                            
                            <td><?php echo $n?>.</td>
                            <td><?php echo $value->question ?></td>
                            <td>[<?= $value->marks?>]</td>

                        </tr>
                           <?php  } ?>
                 </tbody>
            </table>
             
<!-- 
            <br/>
       
                <center> <h6 style="font-size: 1.2em;"><b><u>Part – B</u></b></h6></center>
            <br/>
            <br/>
             <table style="font-size: 1.1em;" cellspacing="0">
                    
                    <tbody>
                         <?php
                           $n = 0;
                           foreach ($response as $value) { 
                            
                           $n++;
                                ?> 
                        <tr>
                            
                            <td><?php echo $n?>.</td>
                            
                            <?php if ($value->modules == 'long'){ ?>

                            <td><?php echo $value->question ?></td>
                            <td>[<?= $value->marks?>]</td>

                            <?php } ?>

                        </tr>
                           <?php  } ?>
                 </tbody>
            </table> -->
            
        </div>
       
</body>

</html>