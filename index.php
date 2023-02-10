<?php
// データベースなどから必要な情報を取得
$data = "現在の時刻: " . date("h:i:s");

// 結果をJSON形式で返す
echo json_encode(array("data" => $data));
?>
<div id="update_area">更新前</div>

<script>
// 一定間隔でupdate.phpをリクエスト
setInterval(function() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // update.phpからのレスポンスを受け取る
      var response = JSON.parse(this.responseText);
      document.getElementById("update_area").innerHTML = response.data;
    }
  };
  xhttp.open("GET", "index.php", true);
  xhttp.send();
}, 1000);
</script>