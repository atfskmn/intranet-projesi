
<?php
require_once 'login.kontrol.php';
require_once 'sayfa.ust.php'; ?>

<div class='row text-center'>
  <h1 class='alert alert-primary'>telefon rehberi</h1>
</div>
<form method="get">
    Aranan isim? <input type="text" name="isim_form">
    <input type="submit" name="rehberde ara..." class="btn btn-primary"
</form>


<table class="table table-bordered table-striped">
  <thead>
    <tr>
     
      <th scope="col">Adı Soyadı</th>
      <th scope="col">Telefonu</th>
   
    </tr>
  </thead>
  <tbody>




    <?php

    require_once('db.php');

    $SORGU = $DB->prepare("SELECT * FROM users");
    $SORGU->execute();
    $kullanicilar = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    //echo '<pre>'; print_r($users);

    foreach ($kullanicilar as $kullanici) {
      echo "
    <tr>
     
      <td>{$kullanici['adsoyad']}</td>
      <td>{$kullanici['telefon']}</td>
     
   </tr> 
  ";
    }

    ?>

  </tbody>
</table>




<div class='text-center'>
  <a href='index.php' class='btn btn-warning'>ANASAYFAYADÖN</a>
</div>

<?php require 'sayfa.alt.php'; ?>