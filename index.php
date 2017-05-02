<?php
  require './model/UserInfoModel.php';
  require './view/index.html';
  $user_model = new UserInfoModel();
  $result = $user_model->get_blogger_name();
  echo $result;