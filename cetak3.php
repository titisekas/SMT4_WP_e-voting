<?php

require_once __DIR__ . '/vendor/autoload.php';

require ('function.php');
$calons = query("SELECT * FROM calon");
$votes = query("SELECT calon.*,COUNT(id_calon) as HasilVoting
FROM vote JOIN calon ON vote.id_calon = calon.id
GROUP BY calon.id");
// var_dump($votes);
// die;
$users = query("SELECT * FROM user");

$html = '<!DOCTYPE html>
<html>

<head>
    <title>Pemilu</title>
</head>

<body>
<div class="jumbotron jumbotron-fluid about" id="about">
        <div class="container">
        <center>
        <h1 class="display-4 text-center">Hasil Voting</h1>
          </center>
          <table class="table table-dark dataUser" border="1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">Hasil Voting</th>
              </tr>
            </thead>
            <tb>
                <tbody>
            ';

            $i=1;
            foreach($votes as $v){
              $html.='
                <tr>
                  <td>'.$i++.'</td>
                  <td>'. $v["nama"] .'</td>
                  <td>'. $v['HasilVoting'] .'</td>
                </tr>
              ';
            }
  $html.='</table>
        </div>
    </div>
    </body>
    </html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Data Voting.pdf', \Mpdf\Output\Destination::INLINE);