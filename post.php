<?php
header("Content-Type: text/html;charset=UTF-8");

$short = mb_substr(trim($_POST['postcont']), 0, 420);

if(empty($short)){
    die('try writin somethin ya?');
}
elseif(!empty($short)) {
  include 'inc.php';
  
  $cleanshort = htmlspecialchars($short);
  $new = $cleanshort . '<br \><br \>' . "\n";
  $file = "stream.txt";
  $full = $dir . $file;
  $old = file_get_contents($full);
  $content = $new . $old;
  
  $latestfile = "latest.txt";
  $latestfull = $dir . $latestfile;
  
  $title = $titles[array_rand($titles)];
  $titlefile = "title.txt";
  $titlefull = $dir . $titlefile;
  
  $ret1 = file_put_contents($full, $content);
  $ret2 = file_put_contents($latestfull, $short);
  $ret3 = file_put_contents($titlefull, $title);
  
  if($ret1 === false) {
      die('file write error?');
  }
  else {
    header('Location: https://rectilinear.xyz/stream');
    echo "$ret bytes written to file";
  }
}
else {
  die('error?');
}
