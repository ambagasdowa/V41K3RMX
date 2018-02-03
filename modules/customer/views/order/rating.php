<div class="container">
 <form>
<input type="text" class="kv-uni-star rating-loading" value="2" data-size="xs" title="">
</form>
</diV>

<script>
    $(document).on('ready', function () {
        
        $('.kv-uni-star').rating({
            theme: 'krajee-uni',
            filledStar: '&#x2605;',
            emptyStar: '&#x2606;'
        });
        

        $('.kv-uni-star').on(
                'change', function () {
                    console.log('Rating selected: ' + $(this).val());
                });
    });
</script>