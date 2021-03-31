<!-- Syntac Load View Header -->
<?php
  if(isset($header)){
      $this->load->view($header);
  } 
?>

<!-- Syntac Load Content -->
<?php
  if(isset($content)){
    $this->load->view($content);
  }
?>

<!-- Syntax Load View Footer -->
<?php
  if(isset($footer)){
    $this->load->view($footer);
  }
?>