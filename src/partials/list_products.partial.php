<?php

function list_products($products)
{
    ?>
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><!-- one product -->
            <?php
            for ($i = 0; $i < count($products); $i++) { ?>
                <div class="col"><!-- one product -->
                    <div class="card shadow-sm">
                        <img src="/assets/images/300x300.svg" alt="Thumbnail" class="img-thumbnail">

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy now</button>
                                </div>
                                <small class="text-body-secondary">9 &euro;</small>
                            </div>
                        </div>
                    </div>
                </div><!-- one product -->
            <?php } ?>
        </div><!-- row products -->
    </div><!-- container products -->
<?php
}
?>

