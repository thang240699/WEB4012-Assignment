<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/bootstrap/js/popper.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/select2/select2.min.js')); ?>"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/slick/slick.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/js/slick-custom.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/lightbox2/js/lightbox.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/sweetalert/sweetalert.min.js')); ?>"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });


</script>
<script>
    //addcart
    $(document).ready(function () {
        $('.addcart').click(function () {
            var id = $(this).attr('id');
            var qty = $('#quantity').val();
            if (typeof qty == 'undefined') {
                qty = 1;
            }
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: '<?php echo e(route('add.cart')); ?>',
                data:
                    {
                        id: id,
                        qty: qty,
                        _token: '<?php echo csrf_token(); ?>'
                    }, success: function (result) {
                    var count = Object.keys(result).length;
                    $('#count').html(count);
                }
            });
        });
        //update cart

    });
    <?php if(session('status')): ?>
        swal("<?php echo e(session('message')); ?>");
    <?php endif; ?>
    //Show Items in Cart
    // $( ".cart-box").click(function(e) { //when user clicks on cart box
    //     e.preventDefault();
    //     $("#shopping-cart-results" ).load( "resources/views/layouts/cart_process.blade.php"); //Make ajax request using jQuery Load() & update results
    // });
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('public/vendor/parallax100/parallax100.js')); ?>"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/layouts/script.blade.php ENDPATH**/ ?>