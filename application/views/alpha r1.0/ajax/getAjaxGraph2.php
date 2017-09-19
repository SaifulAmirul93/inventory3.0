
<?php if($status){
  if($status==1)
  {
    $stat="Check-In";
  }
  else if($status==2)
  {
    $stat="Check-Out";
  }
  else{
    $stat="";
  }
}

  if($month){
     if($month==1)
  {
    $m="Jan";
  }
  else if($month==2)
  {
    $m="Feb";
  }
  else if($month==3)
  {
    $m="March";
  }
  else if($month==4)
  {
    $m="Apr";
  }
  else if($month==5)
  {
    $m="May";
  }
  else if($month==6)
  {
    $m="June";
  }
  else if($month==7)
  {
    $m="July";
  }
  else if($month==8)
  {
    $m="August";
  }
  else if($month==9)
  {
    $m="Sept";
  }
  else if($month==10)
  {
    $m="Oct";
  }
  else if($month==11)
  {
    $m="Nov";
  }
  else if($month==12)
  {
    $m="Dec";
  }
  else{
    $m="";
  }

  }


?>
<script type="text/javascript">




var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "marginRight": 70,
  "dataProvider": [

  <?php 
              $n = 0;
              if (sizeof($arr) != 0) {

                // if(is_array($arr1))
                // {
                $num=0;
                  foreach ($arr as $data) {
                      if ($n != 0) {
                      echo "},";
                      }else{ $n++;}
                      echo "{";   
                      ?>
                    "item": "<?= $data->it_name; ?>",
                    "quantity": <?= $data->total; ?>,
                   "color": "<?= $data->it_color; ?>"
                    <?php
                  }
              } else{
                  echo "{";
              }            
        ?>

  }

  ],
   "titles": [ {
  "text":"Total Quantity <?= $stat; ?> of <?php if($cat != null){ echo $cat->ct_name; } ?> <?php if($sub != null){ echo $sub->su_name; } ?> for <?= $m; ?>  <?php echo $year; ?>",
    "size": 15
    
  } ],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Quantity"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "quantity"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});

</script>