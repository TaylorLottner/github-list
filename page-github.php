<?php
/**
template name: Github项目模板
*/
get_header(); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/TaylorLottner/github-list/style.min.css">
<div class="container">
<?php
    require_once('api.php');
    $json = file_get_contents('github.json');
    $data=json_decode($json,true);
    $length=sizeof($data);   
    for($i=0;$i<$length;$i++)
    {
?>
  <div class="card">
    <div class="imgBx">
      <img src="https://cdn.jsdelivr.net/gh/TaylorLottner/github-list/github.svg" alt="">
    </div>
    <div class="contentBx">
      <h2><?php echo $data[$i]['name'] ?></h2>
      <h3 class="new-item-badge"><?php 
      if($data[$i]['language']==NULL)
      echo "NULL"; 
      else echo  $data[$i]['language'];
      ?></h3>
      <h4><?php echo $data[$i]['stargazers_count'] ?> stars / <?php echo $data[$i]['forks'] ?> forks</h4>
      <p><?php 
      if($data[$i]['description']==NULL)
      echo "欢迎大佬参观哟~嘻嘻(●'◡'●); 
      else echo  $data[$i]['description'];
      ?></p>
      <a href="<?php echo $data[$i]['html_url'] ?>"><span>Read More</span></a>
    </div> 
  </div>
  <?php } ?>
</div>
<?php get_footer(); ?>
