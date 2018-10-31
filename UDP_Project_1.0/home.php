        
<?php 
    require_once'php/nav.php';
?>

<!--Page Content-->

<div class="container">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <div class="btn-group">
                    <h3>Borrow Books</h3>
                    
                </div>
            </div>
        </div>
    </div> 
</div>


<div class="container">
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <article class="card-group-item" >
                    <header class="card-header">
                        <h6 class="title">Categorys </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <form id="tags">
                                !-- form-check.// -->
                            </form>

                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- card-group-item.// -->

                
            </div> <!-- card.// -->
        </div>


        <div class="col-sm-9 ">

            <div id="products" class="row view-group">

                
                
               


            </div>
        </div>
            
    </div>
    </div>


<!-- Footer -->
<?php
    require_once'php/footer.php';