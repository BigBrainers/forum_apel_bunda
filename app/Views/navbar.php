
   <script>
$(document).ready(function(){
  var width = $(window).width();

   var scroll_start = -1;
   var startchange = $('#startChange');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar-cust").css('background-color', 'rgb(51, 48, 48, 0.7)');
          $(".navbar-cust").css('padding', '.5rem 9rem');
          $(".navbar-cust").css('height', '50px');
          $(".ab-logo").css('height', '20px');
       } else {
         if( width < 680 ){
          $(".navbar-cust").css('background-color', 'rgb(51, 48, 48, 0.7)');
          $(".navbar-cust").css('padding', '.5rem 9rem');
          $(".navbar-cust").css('height', '50px');
          $(".ab-logo").css('height', '20px');
         }else{
          $('.navbar-cust').css('background-color', 'rgb(28,117,48,1)');
          $(".navbar-cust").css('padding', '3rem 9rem');
          $(".navbar-cust").css('height', '140px');
          $(".ab-logo").css('height', '45px');
         }
       }
   });
    }
if ($('.navbar-cust').length > 0) {
    var last_scroll_top = 0;
    $(window).on('scroll', function() {
        scroll_top = $(this).scrollTop();
        if(scroll_top < last_scroll_top) {
            $('.navbar-cust').removeClass('scrolled-down').addClass('scrolled-up');
        }
        else {
            $('.navbar-cust').removeClass('scrolled-up').addClass('scrolled-down');
        }
        last_scroll_top = scroll_top;
    });
}
});
</script>
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-cust fixed-top">
  <a class="navbar-brand mx-auto" href="<?= base_url('home/') ?>">
    <img src="/images/fp.png" class="ab-logo" alt="">  Apel Bunda
  </a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item float-left">
      <?php if (session('id')){
              echo '<a class="nav-link active btn-modal" style="cursor: pointer;">Add Question</a>';
            }
          ?>
        
      </li>
      <?php if (session()->get('isAdmin')){?>
      <li class="nav-item float-left">
        <a class="nav-link active" href="<?= base_url('admin/') ?>">Admin</a>
      </li>
      <li class="nav-item float-left">
        <a class="nav-link active" href="<?= base_url('user/') ?>">User</a>
      </li>
      <?php } else{?>
        <li class="nav-item float-left">
        <a class="nav-link active" href="<?= base_url('user/') ?>">Dashboard</a>
      </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if (!session('id')){
              echo "Guest";
            }else{
              echo session()->get()['username'];
            } 
          ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php if (!session('id')) { ?>
                    <a class="dropdown-item" href="<?= base_url("/login")?>">Login</a>
                    <a class="dropdown-item" href="<?= base_url("/register")?>">Register</a>
                <?php }else{?>
                  <a class="dropdown-item" href="<?= base_url("/user/profile/". session()->get('username')."")?>">Profile</a>
                  <a class="dropdown-item bg-danger text-white" href="<?= base_url("login/logout")?>">Logout</a>
                <?php }?>
          </div>
      </li>
	</ul>
  </div>
</nav>