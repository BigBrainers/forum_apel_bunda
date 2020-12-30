<script>
$(document).ready(function(){
if ($('.navbar-bottom').length > 0) {
    var last_scroll_top = 0;
    $(window).on('scroll', function() {
        scroll_top = $(this).scrollTop();
        if(scroll_top < last_scroll_top) {
            $('.navbar-bottom').removeClass('b-scrolled-down').addClass('scrolled-up');
        }
        else {
            $('.navbar-bottom').removeClass('scrolled-up').addClass('b-scrolled-down');
        }
        last_scroll_top = scroll_top;
    });
}
});
</script>
<nav class="navbar navbar-dark navbar-bottom navbar-expand fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="<?= base_url('/user') ?>" class="nav-link"> <?php echo file_get_contents("icons/house.svg"); ?></a>
        </li>
        <li class="nav-item">
            <a type="button" class="nav-link btn-modal"> <?php echo file_get_contents("icons/plus.svg"); ?></a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/user/profile') ?>" class="nav-link"> <?php echo file_get_contents("icons/person.svg"); ?></a>
        </li>
    </ul>
</nav>