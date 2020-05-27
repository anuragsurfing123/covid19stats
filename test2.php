

        
        <?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
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

.box {
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
    
    <div style="color:green" >&nbsp;&nbsp;&nbsp;
    <a href="india.php">India</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="test.php">Global</a>
</div>
    <div style="text-align:center" >
    

    <?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/worldstat.php",
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
    $value = json_decode($response, true);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        ?>


<h1 style="color:green">GLOBAL</h1>
    <div class="container box" style="padding-top:100px;" >
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        <div class="col  " >
        <h1 style="color:#555555">Coronavirus Cases:</h1>
        <h1 style="color:#65DD9B"><b>
        <?php
        echo $value['total_cases'] ."<br>" ;?></b></h1>
        </div>
        <div class="col  ">
        <h1 style="color:#555555">Deaths:</h1>
        <h1 style="color:red"><b>
        <?php
        // $x=((((int)$value['total_deaths'])/((int)$value['total_cases']))*100);
        // $y=round($x,2);
        echo $value['total_deaths']/*."($y%)"*/."<br>"   ;?></b></h1>
        </div>
        <div class="col  ">
        <h1 style="color:#555555">Recovered:</h1>
        <h1 style="color:#8ACA2B"><b><?php
        // $b=((((int)$value['total_recovered'])/((int)$value['total_cases']))*100);
        // $c=round($b,2);
        echo $value['total_recovered']/*."($c%)"*/."<br>"   ;?></b></h1>
        </div>
        </div>
        <hr /><hr />
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
        <div class="col  ">
        <h1 style="color:#555555">New cases:</h1>
        <h1 style="color:#449BE2"><b><?php
        echo $value['new_cases']."<br>"   ;?></b></h1>
        </div>
        <div class="col  ">
        <h1 style="color:#555555">New Deaths:</h1>
        <h1 style="color:red"><b><?php
        echo $value['new_deaths']."<br>"   ;?></b></h1>
        </div>
        
        
    </div>
    
    </div>





        
        
        
        
        
        
        <?php
        
    }
    ?>


    </div>
    <div class="abc">
    <table class="table table-striped table-bordered table-hover">
    <thead class="table-fixed">
        <tr class="table-fixed table-primary">
        <th scope="col">country name</th>
        <th scope="col">cases</th>
        <th scope="col">New Cases</th>
        <th scope="col">Deaths</th>
        <th scope="col">New Deaths</th>
        <th scope="col">Serious Critical</th>
        <th scope="col">Total Recovered</th>
        <th scope="col">Active cases</th>
        <th scope="col">Total Cases/1M Pop</th>
        </tr>
    </thead>
    <tbody>
        
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
            
            foreach ($values as $value) {
                for($x=0;$x<=(count($value)-1);$x++){?>
                <tr>
        <td style="font-weight: 600;"><?php echo $value[$x]['country_name'];?></td>
        <td style="font-weight: 600;"><?php echo $value[$x]['cases'];?></td>
        <td style="background-color:#FFEEAA;font-weight: 600"><?php  
        
        if($value[$x]['new_cases']==0){
            echo "0";
        }else{
            echo "+".$value[$x]['new_cases'];

        }
        
        ;?></td>
        <td style="font-weight: 600;"><?php echo $value[$x]['deaths'];?></td>
        <td style="background-color:#F7665E;font-weight: 600"><?php
        if($value[$x]['new_deaths']==0){
            echo "0";
        }else{
            echo "+".$value[$x]['new_deaths'];

        }
        ?></td>
        
        
        
        <td style="font-weight: 600;"><?php echo $value[$x]['serious_critical'];?></td>
        <td style="background-color:#9EFF98;font-weight: 600"><?php echo $value[$x]['total_recovered'];?></td>
        <td style="font-weight: 600;"><?php echo $value[$x]['active_cases'];?></td>
        <td style="font-weight: 600;"><?php echo $value[$x]['total_cases_per_1m_population'];?></td>
        
        </tr><?php
        }
    break;
        }
        

    }?>
        
    
    </tbody>
    </table>
    </div>
    <script>
fetch("https://pomber.github.io/covid19/timeseries.json")
  .then(response => response.json())
  .then(data => {
    data["India"].forEach(({ date, confirmed, recovered, deaths }) =>
      console.log(`${date} active cases: ${confirmed - recovered - deaths}`)
    );
  });
    </script>
    </body>
    </html>