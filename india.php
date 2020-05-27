

        
       <?php
$page = $_SERVER['PHP_SELF'];
$sec = "50";
?> 

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <title>COVID-19 STATS</title>
        <link rel="icon" href="https://img.icons8.com/color/48/000000/coronavirus.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>

    @media screen and (min-width: 750px) {
    .abc{
        padding:100px;
    }

    }
    @media screen and (max-width: 750px) {
    .abc{
        padding:10px;
    }

    }
    
    body{
    background-color:#E0E5EC;
}

.box{
  /* Basic styling and alignment */
  padding-top:40px;
  padding-bottom:40px;
  padding-left:0px;
  padding-right:0px;
  margin-left: auto;
  margin-right: auto;
  margin-top:30px;
  border-radius:10px;
  width:auto;
  height:auto;
  text-align:center;
    /* Basic styling and alignment */
  /* For Neumorphism Effect */
  background-color:#E0E5EC;
  box-shadow: 9px 9px 16px rgb(163,177,198,0.6), -9px -9px 16px    rgba(255,255,255, 0.5);
    /* For Neumorphism Effect */
}


    </style>
    </head>
    <body>
    <div style="color:green">&nbsp;&nbsp;&nbsp;
    <a href="india.php">India</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="test.php">Global</a>
</div>
    <div style="text-align:center">
    <h1 style="color:green">INDIA</h1>
    

    <?php
error_reporting(0);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
            "x-rapidapi-key: f4bc7c23e3mshac3ebc002196239p15ff98jsn0a35541521ad"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $values = json_decode($response, true);
    
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        foreach($values as $value) {
            for($x=0;$x<=(count($value)-1);$x++){
                if($value[$x]['country_name']=='India'){
        ?>



    <div class="container box" style="padding-top:100px;">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        <div class="col ">
        <h1 style="color:#555555">Coronavirus Cases:</h1>
        <h1 style="color:#65DD9B"><b>
        <?php
        echo $value[$x]['cases'] ."<br>" ;?></b></h1>
        </div>
        <div class="col ">
        <h1 style="color:#555555">Deaths:</h1>
        <h1 style="color:red"><b>
        <?php
        //  $x=((($value[39]['deaths'])/($value[39]['cases']))*100);
        //  $y=round($x,2);
        echo $value[$x]['deaths']."<br>"   ;?></b></h1>
        </div>
        <div class="col ">
        <h1 style="color:#555555">Recovered:</h1>
        <h1 style="color:#8ACA2B"><b><?php
        // $a=((((int)$value[39]['total_recovered'])/((int)$value[39]['cases']))*100);
        // $b=round($a,2);
        echo $value[$x]['total_recovered']."<br>"   ;?></b></h1>
        </div>
        </div>
        <hr /><hr />
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
        <div class="col ">
        <h1 style="color:#555555">New cases:</h1>
        <h1 style="color:#449BE2"><b><?php
        echo $value[$x]['new_cases']."<br>"   ;?></b></h1>
        </div>
        <div class="col ">
        <h1 style="color:#555555">New Deaths:</h1>
        <h1 style="color:red"><b><?php
        echo $value[$x]['new_deaths']."<br>"   ;?></b></h1>
        </div>
        
        
    </div>
    
    </div>





        
        
        
        
        
        
        <?php
        }
        }
    break;
    }
    }
    ?>


    </div>
    <div class="abc">
    <h1 style="text-align:center;color:#81439C">State Wise Details</h1>
    <table class="table table-striped table-bordered table-hover">
    <thead class="table-fixed">
        <tr class="table-fixed table-primary">
        <th scope="col">State name</th>
        <th scope="col">cases</th>
        
        </tr>
    </thead>
    <tbody>
        
        <?php
        error_reporting(0);

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://script.googleusercontent.com/macros/echo?user_content_key=R-Q-kqvLvMAVgqPXT09FMNmJDv16kadEyi9cskrX6MQ_tN1XfuA7gXyfcKmvoRl5KO8WgyH96RRw5exuBDoSBNysTHmmeYiHm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnKXFvsR88vL4WiBr168omFadgngDnj25DLpEvLRaiIpzZr1NvbW-Bo38vshdDBv10tpytj_A4aoE&lib=Mm1FD1HVuydJN5yAB3dc_e8h00DPSBbB3",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $values = json_decode($response, true);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            
            foreach ($values as $state=>$value) {
                
                ?>
                <tr>
        <td style="font-weight: 600;"><?php echo $state;?></td>
        <td style="font-weight: 600;background-color:#9EFF98;"><?php echo $value;?></td>
        
        
        
        
        
        
        </tr><?php
        }
    
        }
        

    ?>
        
    
    </tbody>
    </table>
    </div>
    </body>
    </html>