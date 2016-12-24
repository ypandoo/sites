<?php
  $CI=&get_instance();
  $CI->load->library('session');
  if($CI->session->has_userdata('admin'))
    $name = $CI->session->admin;
  else {
    redirect('/admin/login', 'refresh');
  }
?>

<script type="text/javascript">
function logout(){
  $.ajax({
      type:'POST',
      dataType: 'JSON',
      url:'<?php echo site_url('user/logout/') ?>',
  })
  .done(function (results) {
      window.location.reload();
  })
}
</script>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">微山南管理系统</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $name ?>，欢迎您！</a></li>
        <li><a onclick="logout()" style="cursor:pointer">登出</a></li>
      </ul>
    </div>
  </div>
</nav>
