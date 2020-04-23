<?php
function pickMovie($id){
  if($id==1){
    $pickName="Aladdin";
  }elseif ($id==2) {
    $pickName = "Titanic";
  }elseif ($id==3) {
    $pickName="Avatar";
  }elseif ($id==4) {
    $pickName="Shawshank Redemtion";
  }elseif ($id==5) {
    $pickName="The Godfather";
  }
  return $pickName;
}
