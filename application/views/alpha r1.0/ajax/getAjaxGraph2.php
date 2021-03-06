

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
                    "quantity": <?= $data->it_qty; ?>,
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
  "text":"Total Quantity of <?= $cat->ct_name ?> <?= $sub->su_name ?> ",
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