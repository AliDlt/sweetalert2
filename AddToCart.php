add_filter('wc_add_to_cart_message_html', 'wc_add_to_cart_message_filter', 10, 2);
function wc_add_to_cart_message_filter()
{
    add_action('wp_footer', 'item_count_check');
    function item_count_check()
    {
        ?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            function addcartsweet() {
                Swal.fire({
                    icon: 'success',
                    title: '<?php the_title(); ?>',
                    text: 'محصول با موفقیت اضافه شد.',
                    type: 'success',
                    showCancelButton: true,
                    cancelButtonText: 'باشه',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'مشاهده سبد خرید'
                }).then(function (result) {
                    if (result.value) {
                        location.assign("<?php echo esc_url(wc_get_page_permalink('cart')) ?>")
                    }
                });
            }

            addcartsweet();
        </script>
        <?php
    }
}