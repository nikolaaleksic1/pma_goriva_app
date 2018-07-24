<?php




$sql_popusti = "SELECT * FROM pma.pma_goriva_popusti pgp
right join pma.pma_goriva pg on pma.pgp.pma_goriva_id = pma.pg.pma_gor_id
inner join pma.pma_goriva_vrste pgv on pg.pma_gor_id_gor = pgv.sifra_gor
inner join pma.pma_prodavnice pp on pg.pma_gor_pid = pp.prodavnica_id
order by pma.pg.pma_gor_id ASC";
$stmt=$dbpma->prepare($sql_popusti);
$stmt->execute();

while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
    $goriva_popusti[$res['pma_gor_id']] = array(
      "sifra_goriva" => $res['pma_gor_id_gor'],
      "idmag_nord" => $res['idmag_nord'],
      "naziv_goriva" => $res['naziv_gor'],
      "pma_gor_id" => $res['pma_gor_id'],
      "datum_vazi_od" => $res['datum_vazi_od'],
      "iznos" => $res['iznos'],
      "datum_unosa" => $res['datum_unosa']
    );
}



function mp_select(){
  $sql_mp_cene = "SELECT * FROM pma.pma_goriva_cene pgp
  right join pma.pma_goriva pg on pma.pgp.pma_goriva_id = pma.pg.pma_gor_id
  inner join pma.pma_goriva_vrste pgv on pg.pma_gor_id_gor = pgv.sifra_gor
  inner join pma.pma_prodavnice pp on pg.pma_gor_pid = pp.prodavnica_id
  order by pma.pg.pma_gor_id ASC";
  $stmt=$dbpma->prepare($sql_mp_cene);
  $stmt->execute();

  while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
      $goriva_mp_cene[$res['pma_gor_id']] = array(
        "sifra_goriva" => $res['pma_gor_id_gor'],
        "idmag_nord" => $res['idmag_nord'],
        "naziv_goriva" => $res['naziv_gor'],
        "pma_gor_id" => $res['pma_gor_id'],
        "datum_vazi_od" => $res['datum_vazi_od'],
        "iznos" => $res['iznos'],
        "datum_unosa" => $res['datum_unosa']
      );
  }


  echo json_encode($goriva_mp_cene); 
}


 ?>
