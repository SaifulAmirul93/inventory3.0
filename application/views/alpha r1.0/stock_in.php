

<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Stock-In
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-caret-square-o-down"></i> Stock-In
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       




                                        <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Stock-In Form</h3>
                                            </div>
                                        </div>
                                        <form role="form" method="post" action="<?= site_url('Inventory/stock_in'); ?>">
                                        
                                        <div class="row">
                                                <div class="form-group">
                                                        <div class="col-md-8"> 
                                                                <div class="form-group input-group">
                                                                    
                                                                    <!-- <div class="col-md-8"> -->
                                                                    
                                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                                            <input class="form-control input-lg" name="search" id="search" placeholder="Item Barcode" autofocus>
                                                                            
                                                        
                                                                        
                                                                    <!-- </div> -->           
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                        </div>
                                         
                                         <div class="row">
                                                <div class="form-group">
                                                 
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                        
                                                        
                                                                 <select class="form-control input-lg" name="status" id="status" required>
                                                                    <option value="">Received From</option>
                                                                    <option value="-1">Supplier</option>                                                                                                                                     
                                                                    <option value="1">Inventory</option>
                                                                    <option value="2">Production</option>
                                                                    <option value="3">Marketing</option>
                                                                    <option value="4">Distribution</option>
                                                                 </select> 
                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                            <input class="form-control input-lg" name="date" id="date" value="<?= date("Y-m-d"); ?>" disabled>

                                            
                                                            </div>
                                                        
                                                    </div>
                                                </div>

                                         </div>
                                <div id="supplier">
                                                
                                </div>
                                

                                <div class="row">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><i class="fa fa-list fa-fw"></i> Item List</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                            <table class="table table-bordered " width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="col-md-4">Item Detail</th>
                                                                                        <th class="col-md-2">Shelf No.</th>
                                                                                        <th class="col-md-2">Current Stock</th>
                                                                                        <th >Qty Take-In</th>   
                                                                                    
                                                                                        <th >Purchase Price</th>   
                                                                                        
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="ItemList">
                                                                                   
                                                                                </tbody>
                                                                            </table>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                     

                                        <div class="clear" style="height: 20px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Input</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div> 
                                        </div>  
                                        <div class="clear" style="height: 50px;"></div>                
                    </form>
            
                    </div>
                  
            </div>

            </div>
            <!-- /.container-fluid -->





        </div>
        <!-- /#page-wrapper -->
	</div>
<script>

$(document).ready(function () {

    num = 1;

    $('#search').scannerDetection({
	timeBeforeScanTest: 200, // wait for the next character for upto 200ms
	avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
	onComplete: function(barcode){
     $.post('<?= site_url('Inventory/getAjaxItem'); ?>', {search : barcode, num : num}, function(data) {
                
                $("#ItemList").append(data);
                $('#search').val("");  

            });
    num ++;	 	
    } // main callback function	
        // resetSearch();
    });
    $(document).keypress(function(e){
          var keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $("#search").focus();
            }  
    });
    $('#status').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSupplier'); ?>', {receive2 : temp}, function(data) {
                
                $("#supplier").html(data);
            });
        });



});
</script>