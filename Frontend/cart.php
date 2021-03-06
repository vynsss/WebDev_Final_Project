<?php
    include 'include/navbar.php';
?> 
<style>
    .center{
        width: 150px;
        margin: 40px auto;
    }
    .featured-property {
        position: relative;
        background: #fff;
        margin-top: -100px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, 0.1); }
    .featured-property div {
        width: 100%; }
</style>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('images/balivilla.jpg');"
         data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white">Cart</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="featured-property d-flex">
            <div class="row justify-content-center"  >
                <div class="col-md-13 col-lg-9 mb-5">
                    <form action="#" class="contact-form">
                        <p style="color: #fff">h</p>

                        <?php
                            if(isset($_COOKIE["user_id"])){
                                $user_id = $_COOKIE["user_id"];
                                $url = fopen("https://order-service-fp.herokuapp.com/api/carts?user_id={$user_id}", "r");
                                $json = stream_get_contents($url);
                                fclose($url);
                
                
                                $data = json_decode($json);
                                $order_id = $data->cart[0]->order_id;
                                $status_id = $data->status;
                                $total = 0;
                
                                foreach($data->cart as $item) {
                                    //to see the data of product
                                    $id = $item->product_id;
                                    $url2 = "https://product-service-fp.herokuapp.com/api/product?id={$id}";
                                    $test_datas2 = fopen($url2, "r");
                                    $json_test2 = stream_get_contents($test_datas2);
                                    fclose($test_datas2);

                                    $data_test = json_decode($json_test2);
                                    
                                    print '<h2>' .$data_test->result[0]->name. '</h2>';
                                    print '<h5 style="color: #e3c4a8 ;text-align: left; text-indent: 20px">Rp ' .$data_test->result[0]->price. '</h5>';

                                    // <!--https://get.foundation/building-blocks/blocks/input-number-group.html-->
                                    // <!--itu link di atas for the buttons ada js nya tpi ga ngerti-->
                                    print '<div class="input-group input-number-group">';
                                        print '<div class="input-group-button">';
                                        print '</div>';
                                        print '<h4 style="text-indent: 550px">Quantity : ' .$item->quantity. '<span style="color: white">--</span></h4>';
                                        print '<a href="php/delete_cart.php?id='.$item->id.'" class="pl-0 pr-3" style="font-size: 25px;text-indent: 20px"><span class="icon-trash"></span></a>';
                                        print '</div>';
                                    print '<hr>';
                                    $total = $total + ($data_test->result[0]->price*$item->quantity);
                                }                                
                                print '<h4 style="text-align: right">Total : <span>Rp. ' .$total. '</span></h4>';                   
                                
                                print '<div class="row form-group">';
                                print '<div class="col-md-12">';
                                print '<p><a href="php/order_checkout.php?id='.$order_id.'" class="btn btn-primary px-4 py-3">Check Out</a></p>';
                            } else{
                                print '<h4>It seems you were away for too long! Please login again.</h4>';
                            }
                        ?>

     
                        </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
    <p style="color: white">.</p>

</div>


<?php
    include 'include/footer.php';
?>