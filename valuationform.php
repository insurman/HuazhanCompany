<?php
  require("connect.php");
  $data=mysqli_query($conn,'select * from valuation order by StartDay ASC');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <title>估價單</title>
    <style type="text/css">
      .table{
        width:100%;
        font-size: 20px;
        border:0;
        font-family: "微軟正黑體";
        text-align: center;
        letter-spacing: 2px;

      }
      .table th{
        font-size: 20px;
        font-family: "微軟正黑體";
        text-align: center;
        border: 1px #ddd solid;
      }
      .table td{
        font-size: 18px;
        font-family: "微軟正黑體";
        text-align: center;
        border: 1px #ddd solid;
        font-weight: 600;
      }
       .btn{
          font-family: "微軟正黑體";
          font-weight: bold;
          font-size: 18px;

       }
       .table .head{
        font-size: 35px;
        font-family: "微軟正黑體";
        text-align: center;
        letter-spacing: 10px;
        font-weight: bold;
       }
       .btn-danger{
        background-color:#ebedec;
        color: black;
        border: 1px #ebedec solid;
       }
       .btn-danger:hover{
        background-color: #a2a9af;
        color: black;
        border: 1px #a2a9af solid;
       }
    </style>
</head>

<body>
<div style="padding-bottom: 20px;padding-top: 20px;width: 60%; position: relative; left: 10px;">
  <a class="btn btn-danger" href="refash.php">刷新編號</a></button>

</div>
      <?php
        if (!$data) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
      }
        for($i=1;$i<=mysqli_num_rows($data);$i++){
         $rs=mysqli_fetch_assoc($data);
      ?>

<table class="table table-striped" style="width: 60%;">
    <tbody>
      <thead>
          <td class="head" colspan="5" >估價單</td>
      </thead>   
          <tr>
            <th >客戶名稱</th>
            <td ><?php echo $rs['ClientName']?></td>
            <th>Email</th>
            <td><?php echo $rs['Email']?></td>
          </tr>     
          <th>聯絡人</th>
            <td><?php echo $rs['ContactName']?></td>
            <th>手機</th>
            <td><?php echo $rs['Phone']?></td>
          </tr>
          <tr>
            <th >出發日期</th>
            <td ><?php echo $rs['StartDay']?></td>
            <th >出發時間</th>
            <td ><?php echo $rs['StartHr']?>點
            <?php echo $rs['StartMi']?>分</td>         
          </tr>
          <tr>
            <th>回程日期</th>
            <td><?php echo $rs['BackDay']?></td>
            <th>回程時間</th>
            <td><?php echo $rs['BackHr']?>點
            <?php echo $rs['BackMi']?>分</td>   
          </tr>
          <tr>
            <th>出發地點</th>
            <td><?php echo $rs['StartPlace']?></td>
            <th>目的地</th>
            <td><?php echo $rs['FinalPlace']?></td>
          </tr>
          <tr>
            <th>詳細內容</th>
            <td colspan="3"><?php echo $rs['Detail']?></td>
          </tr>
          <tr>
            <th>保險需求</th>
            <td><?php echo $rs['Requireone']?></td>
            <th>隨車小姐</th>
            <td><?php echo $rs['Lady']?></td>
          </tr>
          <tr>
            <th>發票需求</th>
            <td><?php echo $rs['TextRequire']?></td>
            <th>發票抬頭</th>
            <td><?php echo $rs['Textone']?></td>
          </tr>
            <tr>
              <td><?php echo $rs['ID']?></td>
              <td colspan="4"><a href="Delete.php?id=<?php echo $rs['ID'] ?>">刪除</a></td>
            </tr>
        </tbody>
    </table>     

<?php } ?>
</body>
</html>