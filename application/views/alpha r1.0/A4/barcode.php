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
  /* body {
        width: 8.5in;
        margin: 0in .1875in;
        } */
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 3.025in; /* plus .6 inches from padding */
        height: 1.475in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        /* margin-right: .125in;  */
        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
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
  <?php for ($i=1; $i <= $num; $i++) { 
   ?>
  <section class="sheet padding-10mm">
    <?php for($i2=0; $i2 < 14; $i2++) { ?>
       <div class="label">
        <img src="<?= base_url(); ?>/barcode/<?= $arr->ba_url; ?>" alt="logo" class="img-thumbnail"/>
        
        <br> <?= $arr->it_sku; ?>
        <br> <?= $arr->it_name; ?>
        
        <br>
      </div>
    <?php } ?>
    <!-- Write HTML just like a web page -->
       

  <div class="page-break"></div>
    <?= $i; ?>/<?= $num; ?>

  </section>
<?php } ?>
</body>
<script>

      window.print();

</script>
</html>
