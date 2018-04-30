<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Nasty Inventory 4.0</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link href="<?= base_url(); ?>css/plugins/paper/normalize.min.css" rel="stylesheet">
  
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"> -->

  <!-- Load paper.css for happy printing -->
  <link href="<?= base_url(); ?>css/plugins/paper/paper.css" rel="stylesheet">
  
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"> -->

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        
        width: 8.5in;
        margin: 0in .1875in;
        }

    table
    {
        font-size:16px;
    }
    
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 3.025in; /* plus .6 inches from padding */
        height: 1.475in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        /* margin-right: .125in;  */
        /* float: left; */

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
      .page-break-top  {
        clear: top;
        display:block;
        page-break-after:always;
        }
  @page { size: A4 }
  
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
 
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  
  <section class="sheet padding-10mm">

  <!-- <div class="page-break-top">&nbsp;</div> -->
  
  <img src="<?= base_url(); ?>/img/logonasty.jpg">
  <br><br>
  <hr>
  <br>
    <!-- Write HTML just like a web page -->
  <table>
      <tbody>
          <tr>
              <td width="100%" float="top"><h1>REQUEST STOCK</h1></td>
              <td><img src="<?= base_url(); ?>/barcode/request/<?= $arr['request']->rb_code; ?>" alt="" width="218" height="95"></td>
          </tr>
          
      </tbody>
  </table>
  <br>
  <table>
      <tbody>
            <tr>
               <th align="left">SHIFT </th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>: </t>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
               <td colspan=4 align="right"><?php if ($arr['request']->re_shift == 1) { echo "A"; }elseif($arr['request']->re_shift == 2){echo "A"; } ?></td>
               
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
                             
               
                <th>DATE</th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>:</th>
               <td>&nbsp;</td>

            
               <td colspan=3 align="right"><?=date_format(date_create($arr['request']->re_date) , 'd-m-Y' );?></td>
            </tr>
            <tr>
              <td colspan=56>&nbsp;</td>
            </tr>
            <tr>
               <th align="left">PLANNING </th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>: </th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
               <td colspan=4 align="right"><?php if ($arr['request']->re_shift == 1) { echo "Night";}elseif($arr['request']->re_shift == 2){ echo "Morning"; } ?></td>
               
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
                             
              
                <th align="left">TIME</th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>:</th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
              
               <td align="right"><?=date_format(date_create($arr['request']->re_date) , 'G:i:s' );?></td>
            </tr>
            <tr>
              <td colspan=56>&nbsp;</td>
            </tr>
            <tr>
               <th align="left">SHIPMENT </th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>: </th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
               <td colspan=4 align="right"><?= $arr['request']->re_ship; ?></td>
               
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
                             
               
                <th align="left">DEPT</th>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <th>:</th>
               <td>&nbsp;</td>
               
     
               <td colspan=3 align="right"><?= $arr['request']->dp_dept; ?></td>
            </tr>
      </tbody>
  </table>
<br><br>
  <table border=1 bordercolor="black">
      <thead >
            <tr>
                <th>#</th>
                <th>Barcode No.</th>
                <th width="450px" align="left">Item Description</th>
                <th>Quantity Issued</th>
            </tr>
      </thead>
      <tbody>
            <?php 
                $num=0;

                foreach($arr['item'] as $key){
                $num++;
            ?>
            <tr>
                <td>
                    <?= $num; ?>
                </td>
                <td>
                    <?php if(!empty($key->ba_url)){?>                                                            
                        <img src="<?= base_url(); ?>barcode/<?= $key->ba_url; ?>" alt="logo" class="img-thumbnail"/>
                    
                    <?php }?>
                </td>
                <td>
                    <?= $key->it_name; ?> | <?= $key->ct_name; ?> | <?= $key->su_name; ?>
                </td>
                <td>
                    <?= $key->ri_qty ?> <?php if(!empty($key->un_desc)){echo $key->un_desc;}else{ echo "Error";} ?>
                </td>

            </tr>
                
            <?php } ?>
      </tbody>
  </table>
<br><br>
<br><br>
  <table>
        <thead>
            <tr>
                    <th width="400px">Request By</th>
                    <th width="400px">Prepared By</th>
                    <th width="400px">Verified By</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
            </tr>
            <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
            </tr>
            <tr>
                    <td width="400px" align="center">..................................</td>
                    <td width="400px" align="center">..................................</td>
                    <td width="400px" align="center">..................................</td>
            </tr>
            <tr>
                    <td width="400px" align="center"><?= $arr['user']->username; ?></td>
                    <td width="400px" align="center"><?= $arr['verified']->username; ?></td>
                    <td width="400px" align="center"></td>
            </tr>
        </tbody>
  </table>
  
  <div class="page-break"></div>


  </section>

</body>
<script>

      // window.print();

</script>
</html>
