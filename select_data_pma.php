<?php
error_reporting(0);
include('connection.php');
include('functions_pma.php');

$arr_mp = give_array(4,2);
$arr_popusti = give_array(3,1);



$sqlGorivaVrste = "SELECT * FROM `pma_goriva_vrste`
WHERE id_gor IN(1,2,3,4,5)";
$stmt=$dbpma->prepare($sqlGorivaVrste);
$stmt->execute();
while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
    $goriva_vrste[] = array(
      "sifra_goriva" => $res['sifra_gor'],
      "naziv_goriva" => $res['naziv_gor'],
      "id_goriva" => $res['id_gor']
    );
}


$sqlBoceVrste = "SELECT * FROM `pma_goriva_vrste`
WHERE id_gor IN(7,8,9)";
$stmt=$dbpma->prepare($sqlBoceVrste);
$stmt->execute();
while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
    $boce_vrste[] = array(
      "sifra_goriva" => $res['sifra_gor'],
      "naziv_goriva" => $res['naziv_gor'],
      "id_goriva" => $res['id_gor']
    );
}


if(isset($_POST['display'])){
 ?>

<div class="cont">

<div id="tabla_mp">
  <h3>MP CENA</h3>
  <table>

    <tr><th>Sifra</th><th>Gorivo</th><th>EP SU</th><th>EP MP</th>
      <th>EP NBG</th><th>EP SE</th><th>EP BV</th><th>EP ZE</th><th>EP SU-PA</th>
      <th>EP SU-AP</th><th>EP ZED</th><th>EP KA</th><th>EP ZE2</th><th>EP VR</th>
      <th>EP BT</th><th>EP NS2</th><th>EP BG2</th><th>EP TO</th><th>EP VIS</th>
      <th>EP LED</th><th>EP ZMAJ</th>
    </tr>
      <?php

foreach ($goriva_vrste as $key => $value) {

echo '
  <tr>
    <td>'.$value['sifra_goriva'].'</td>
    <td>'.$value['naziv_goriva'].'</td>
    <td  '.(($arr_mp['arr_011'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_011'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_011_'.$arr_mp['arr_011'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_011'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_012'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_012'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_012_'.$arr_mp['arr_012'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_012'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_013'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_013'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_013_'.$arr_mp['arr_013'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_013'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_014'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_014'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_014_'.$arr_mp['arr_014'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_014'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_015'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_015'][$value['naziv_goriva']]['datum_unosa'] )?' class="first"': ' class="second"').'
      id=mp_015_'.$arr_mp['arr_015'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
      .$arr_mp['arr_015'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_016'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_016'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_016_'.$arr_mp['arr_016'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_016'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_018'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_018'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_018_'.$arr_mp['arr_018'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_018'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_151'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_151'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_151_'.$arr_mp['arr_151'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_151'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_153'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_153'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_153_'.$arr_mp['arr_153'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_153'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_154'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_154'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_154_'.$arr_mp['arr_154'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_154'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_156'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_156'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_156_'.$arr_mp['arr_156'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_156'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_157'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_157'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_157_'.$arr_mp['arr_157'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_157'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_158'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_158'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_158_'.$arr_mp['arr_158'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_158'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_159'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_159'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_159_'.$arr_mp['arr_159'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_159'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_160'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_160'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_160_'.$arr_mp['arr_160'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_160'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_161'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_161'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_161_'.$arr_mp['arr_161'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_161'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_167'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_167'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_167_'.$arr_mp['arr_167'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_167'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_168'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_168'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_168_'.$arr_mp['arr_168'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_168'][$value['naziv_goriva']]['iznos'].'</td>

    <td '.(($arr_mp['arr_169'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_169'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_169_'.$arr_mp['arr_169'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
    .$arr_mp['arr_169'][$value['naziv_goriva']]['iznos'].'</td>
  </tr>

';
}
       ?>
  </table>
</div>

<div id="tabla_popusti">
<h3>POPUSTI</h3>
  <table>
      <tr>
        <th>Sifra</th>
        <th>Gorivo</th>
        <th>EP SU</th>
        <th>EP MP</th>
        <th>EP NBG</th>
        <th>EP SE</th>
        <th>EP BV</th>
        <th>EP ZE</th>
        <th>EP SU-PA</th>
        <th>EP SU-AP</th>
        <th>EP ZED</th>
        <th>EP KA</th>
        <th>EP ZE2</th>
        <th>EP VR</th>
        <th>EP BT</th>
        <th>EP NS2</th>
        <th>EP BG2</th>
        <th>EP TO</th>
        <th>EP VIS</th>
        <th>EP LED</th>
        <th>EP ZMAJ</th>
      </tr>


      <?php

    foreach ($goriva_vrste as $key => $value) {
// '.(($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').'

      echo '
        <tr>
          <td>'.$value['sifra_goriva'].'</td>
          <td>'.$value['naziv_goriva'].'</td>
          <td id=popust_011_'.$arr_popusti['arr_011'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_012_'.$arr_popusti['arr_012'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_013_'.$arr_popusti['arr_013'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_013'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_013'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_014_'.$arr_popusti['arr_014'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_015_'.$arr_popusti['arr_015'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_016_'.$arr_popusti['arr_016'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_016'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_016'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_018_'.$arr_popusti['arr_018'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_151_'.$arr_popusti['arr_151'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_151'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_151'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_153_'.$arr_popusti['arr_153'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_154_'.$arr_popusti['arr_154'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_156_'.$arr_popusti['arr_156'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_157_'.$arr_popusti['arr_157'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_158_'.$arr_popusti['arr_158'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_159_'.$arr_popusti['arr_159'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_159'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_159'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_160_'.$arr_popusti['arr_160'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_161_'.$arr_popusti['arr_161'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_167_'.$arr_popusti['arr_167'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_167'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_167'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_168_'.$arr_popusti['arr_168'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_168'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_168'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

          <td id=popust_169_'.$arr_popusti['arr_169'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
            <span '.(($arr_popusti['arr_169'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_169'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        </tr>

      ';
   }
       ?>

  </table>
</div>

  <h3>EPK CENA</h3>
  <table>
      <tr>
        <th>Sifra</th>
        <th>Gorivo</th>
        <th>EP SU</th>
        <th>EP MP</th>
        <th>EP NBG</th>
        <th>EP SE</th>
        <th>EP BV</th>
        <th>EP ZE</th>
        <th>EP SU-PA</th>
        <th>EP SU-AP</th>
        <th>EP ZED</th>
        <th>EP KA</th>
        <th>EP ZE2</th>
        <th>EP VR</th>
        <th>EP BT</th>
        <th>EP NS2</th>
        <th>EP BG2</th>
        <th>EP TO</th>
        <th>EP VIS</th>
        <th>EP LED</th>
        <th>EP ZMAJ</th>
      </tr>
      <?php
     foreach ($goriva_vrste as $key => $value) {
      $_011 = $arr_mp['arr_011'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'];
      $_012 = $arr_mp['arr_012'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'];
      $_013 = $arr_mp['arr_013'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_013'][$value['naziv_goriva']]['iznos'];
      $_014 = $arr_mp['arr_014'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'];
      $_015 = $arr_mp['arr_015'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'];
      $_016 = $arr_mp['arr_016'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_016'][$value['naziv_goriva']]['iznos'];
      $_018 = $arr_mp['arr_018'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'];
      $_151 = $arr_mp['arr_151'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_151'][$value['naziv_goriva']]['iznos'];
      $_153 = $arr_mp['arr_153'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'];
      $_154 = $arr_mp['arr_154'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'];
      $_156 = $arr_mp['arr_156'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'];
      $_157 = $arr_mp['arr_157'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'];
      $_158 = $arr_mp['arr_158'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'];
      $_159 = $arr_mp['arr_159'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_159'][$value['naziv_goriva']]['iznos'];
      $_160 = $arr_mp['arr_160'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'];
      $_161 = $arr_mp['arr_161'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'];
      $_167 = $arr_mp['arr_167'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_167'][$value['naziv_goriva']]['iznos'];
      $_168 = $arr_mp['arr_168'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_168'][$value['naziv_goriva']]['iznos'];
      $_169 = $arr_mp['arr_169'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_169'][$value['naziv_goriva']]['iznos'];

       echo '
         <tr>
           <td>'.$value['sifra_goriva'].'</td>
           <td>'.$value['naziv_goriva'].'</td>
           <td id="011"><span '.(($_011 == 0 )?'class="hide_null"': 'class=""').'>'.$_011.'</span></td>
           <td id="012"><span '.(($_012 == 0 )?'class="hide_null"': 'class=""').'>'.$_012.'</span></td>
           <td id="013"><span '.(($_013 == 0 )?'class="hide_null"': 'class=""').'>'.$_013.'</span></td>
           <td id="014"><span '.(($_014 == 0 )?'class="hide_null"': 'class=""').'>'.$_014.'</span></td>
           <td id="015"><span '.(($_015 == 0 )?'class="hide_null"': 'class=""').'>'.$_015.'</span></td>
           <td id="016"><span '.(($_016 == 0 )?'class="hide_null"': 'class=""').'>'.$_016.'</span></td>
           <td id="018"><span '.(($_018 == 0 )?'class="hide_null"': 'class=""').'>'.$_018.'</span></td>
           <td id="151"><span '.(($_151 == 0 )?'class="hide_null"': 'class=""').'>'.$_151.'</span></td>
           <td id="153"><span '.(($_153 == 0 )?'class="hide_null"': 'class=""').'>'.$_153.'</span></td>
           <td id="154"><span '.(($_154 == 0 )?'class="hide_null"': 'class=""').'>'.$_154.'</span></td>
           <td id="156"><span '.(($_156 == 0 )?'class="hide_null"': 'class=""').'>'.$_156.'</span></td>
           <td id="157"><span '.(($_157 == 0 )?'class="hide_null"': 'class=""').'>'.$_157.'</span></td>
           <td id="158"><span '.(($_158 == 0 )?'class="hide_null"': 'class=""').'>'.$_158.'</span></td>
           <td id="159"><span '.(($_159 == 0 )?'class="hide_null"': 'class=""').'>'.$_159.'</span></td>
           <td id="160"><span '.(($_160 == 0 )?'class="hide_null"': 'class=""').'>'.$_160.'</span></td>
           <td id="161"><span '.(($_161 == 0 )?'class="hide_null"': 'class=""').'>'.$_161.'</span></td>
           <td id="167"><span '.(($_167 == 0 )?'class="hide_null"': 'class=""').'>'.$_167.'</span></td>
           <td id="168"><span '.(($_168 == 0 )?'class="hide_null"': 'class=""').'>'.$_168.'</span></td>
           <td id="169"><span '.(($_169 == 0 )?'class="hide_null"': 'class=""').'>'.$_169.'</span></td>
         </tr>

       ';
    }
    ?>


  </table>

<!-- DRUGI DEO  -->
<hr id="hline" />

<div id="tabla_mp">
<h3>MP CENA</h3>
  <table >
    <tr>
      <th>Sifra</th>
      <th>Gorivo</th>
      <th>EP SVIL</th>
      <th>EP TRST</th>
      <th>PIROT</th>
      <th>PPOLJE</th>
      <th>EP SMED</th>
      <th>EP SU4</th>
      <th>BALJEV</th>
      <th>POZAR</th>
      <th>PRELJ2</th>
      <th>EP NS3</th>
      <th>EP NS4</th>
    </tr>

      <?php

    foreach ($goriva_vrste as $key => $value) {
      //print_r($arr_mp['arr_176']);
      echo '
        <tr>
          <td>'.$value['sifra_goriva'].'</td>
          <td>'.$value['naziv_goriva'].'</td>

          <td '.(($arr_mp['arr_170'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_170'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_170_'.$arr_mp['arr_170'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_170'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_172'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_172'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_172_'.$arr_mp['arr_172'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_172'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_174'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_174'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_174_'.$arr_mp['arr_174'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_174'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_176'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_176'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_176_'.$arr_mp['arr_176'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_176'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_180'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_180'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_180_'.$arr_mp['arr_180'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_180'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_182'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_182'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_182_'.$arr_mp['arr_182'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_182'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_184'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_184'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_184_'.$arr_mp['arr_184'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_184'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_185'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_185'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_185_'.$arr_mp['arr_185'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_185'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_186'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_186'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_186_'.$arr_mp['arr_186'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_186'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_187'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_187'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_187_'.$arr_mp['arr_187'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_187'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_188'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_188'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_188_'.$arr_mp['arr_188'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_188'][$value['naziv_goriva']]['iznos'].'</td>
        </tr>

      ';
    }

?>
</table>
</div>

<div id=tabla_popusti>
<h3>POPUSTI</h3>
<table >
  <tr>
    <th>Sifra</th>
    <th>Gorivo</th>
    <th>EP SVIL</th>
    <th>EP TRST</th>
    <th>PIROT</th>
    <th>PPOLJE</th>
    <th>EP SMED</th>
    <th>EP SU4</th>
    <th>BALJEV</th>
    <th>POZAR</th>
    <th>PRELJ2</th>
    <th>EP NS3</th>
    <th>EP NS4</th>
  </tr>

    <?php

foreach ($goriva_vrste as $key => $value) {

  echo '
    <tr>
      <td>'.$value['sifra_goriva'].'</td>
      <td>'.$value['naziv_goriva'].'</td>

      <td id=popust_170_'.$arr_popusti['arr_170'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_172_'.$arr_popusti['arr_172'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_174_'.$arr_popusti['arr_174'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_176_'.$arr_popusti['arr_176'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_176'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_176'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_180_'.$arr_popusti['arr_180'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_180'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_180'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_182_'.$arr_popusti['arr_182'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_184_'.$arr_popusti['arr_184'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_185_'.$arr_popusti['arr_185'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_185'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_185'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_186_'.$arr_popusti['arr_186'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_186'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_186'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_187_'.$arr_popusti['arr_187'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_187'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_187'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      <td id=popust_188_'.$arr_popusti['arr_188'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
      <span '.(($arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

    </tr>

  ';
}

     ?>
</table>
</div>

          <h3>EPK CENA</h3>
          <table >
              <tr>
                <th>Sifra</th>
                <th>Gorivo</th>
                <th>EP SVIL</th>
                <th>EP TRST</th>
                <th>PIROT</th>
                <th>PPOLJE</th>
                <th>EP SMED</th>
                <th>EP SU4</th>
                <th>BALJEV</th>
                <th>POZAR</th>
                <th>PRELJ2</th>
                <th>EP NS3</th>
                <th>EP NS4</th>
              </tr>


        <?php

foreach ($goriva_vrste as $key => $value) {

    $_170 = $arr_mp['arr_170'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'];
    $_172 = $arr_mp['arr_172'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'];
    $_174 = $arr_mp['arr_174'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'];
    $_176 = $arr_mp['arr_176'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_176'][$value['naziv_goriva']]['iznos'];
    $_180 = $arr_mp['arr_180'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_180'][$value['naziv_goriva']]['iznos'];
    $_182 = $arr_mp['arr_182'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'];
    $_184 = $arr_mp['arr_184'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'];
    $_185 = $arr_mp['arr_185'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_185'][$value['naziv_goriva']]['iznos'];
    $_186 = $arr_mp['arr_186'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_186'][$value['naziv_goriva']]['iznos'];
    $_187 = $arr_mp['arr_187'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_187'][$value['naziv_goriva']]['iznos'];
    $_188 = $arr_mp['arr_188'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'];
  echo '
    <tr>
      <td>'.$value['sifra_goriva'].'</td>
      <td>'.$value['naziv_goriva'].'</td>
      <td id=""><span '.(($_170 == 0 )?'class="hide_null"': 'class=""').'>'.$_170.'</span></td>
      <td id=""><span '.(($_172 == 0 )?'class="hide_null"': 'class=""').'>'.$_172.'</span></td>
      <td id=""><span '.(($_174 == 0 )?'class="hide_null"': 'class=""').'>'.$_174.'</span></td>
      <td id=""><span '.(($_176 == 0 )?'class="hide_null"': 'class=""').'>'.$_176.'</span></td>
      <td id=""><span '.(($_180 == 0 )?'class="hide_null"': 'class=""').'>'.$_180.'</span></td>
      <td id=""><span '.(($_182 == 0 )?'class="hide_null"': 'class=""').'>'.$_182.'</span></td>
      <td id=""><span '.(($_184 == 0 )?'class="hide_null"': 'class=""').'>'.$_184.'</span></td>
      <td id=""><span '.(($_185 == 0 )?'class="hide_null"': 'class=""').'>'.$_185.'</span></td>
      <td id=""><span '.(($_186 == 0 )?'class="hide_null"': 'class=""').'>'.$_186.'</span></td>
      <td id=""><span '.(($_187 == 0 )?'class="hide_null"': 'class=""').'>'.$_187.'</span></td>
      <td id=""><span '.(($_188 == 0 )?'class="hide_null"': 'class=""').'>'.$_188.'</span></td>
    </tr>

  ';
}

         ?>
      </table>
      <br />
      <hr id="hline" />

<!-- BOCE   -->
      <div id="tabla_mp">
        <h3>MP CENA - BOCE</h3>
        <table>

          <tr><th>Sifra</th><th>Gorivo</th><th>EP SU</th><th>EP MP</th>
            <th>EP SE</th><th>EP BV</th><th>EP SU-PA</th><th>EP ZED</th><th>EP KA</th><th>EP ZE2</th>
            <th>EP VR</th><th>EP BT</th><th>EP BG2</th><th>EP TO</th><th>EP SVIL</th><th>EP TRST</th>
            <th>EP PI</th><th>EP SU4</th><th>EP BALJEV</th><th>EP NS3</th>
          </tr>
            <?php

      foreach ($boce_vrste as $key => $value) {

      echo '
        <tr>
          <td>'.$value['sifra_goriva'].'</td>
          <td>'.$value['naziv_goriva'].'</td>
          <td  '.(($arr_mp['arr_011'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_011'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'style="color:black"').' id=mp_011_'.$arr_mp['arr_011'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_011'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_012'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_012'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_012_'.$arr_mp['arr_012'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_012'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_014'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_014'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_014_'.$arr_mp['arr_014'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_014'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_015'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_015'][$value['naziv_goriva']]['datum_unosa'] )?' class="first"': ' class="second"').'
            id=mp_015_'.$arr_mp['arr_015'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
            .$arr_mp['arr_015'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_018'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_018'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_018_'.$arr_mp['arr_018'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_018'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_153'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_153'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_153_'.$arr_mp['arr_153'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_153'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_154'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_154'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_154_'.$arr_mp['arr_154'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_154'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_156'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_156'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_156_'.$arr_mp['arr_156'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_156'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_157'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_157'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_157_'.$arr_mp['arr_157'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_157'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_158'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_158'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_158_'.$arr_mp['arr_158'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_158'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_160'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_160'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_160_'.$arr_mp['arr_160'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_160'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_161'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_161'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_161_'.$arr_mp['arr_161'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_161'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_170'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_170'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_170_'.$arr_mp['arr_170'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_170'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_172'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_172'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_172_'.$arr_mp['arr_172'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_172'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_174'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_174'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_174_'.$arr_mp['arr_174'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_174'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_182'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_182'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_182_'.$arr_mp['arr_182'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_182'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_184'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_184'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_184_'.$arr_mp['arr_184'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_184'][$value['naziv_goriva']]['iznos'].'</td>

          <td '.(($arr_mp['arr_188'][$value['naziv_goriva']]['datum_vazi_od']>$arr_mp['arr_188'][$value['naziv_goriva']]['datum_unosa'] )?'class="first"': 'class="second"').' id=mp_188_'.$arr_mp['arr_188'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>'
          .$arr_mp['arr_188'][$value['naziv_goriva']]['iznos'].'</td>
        </tr>


      ';
      }
             ?>
        </table>
      </div>


      <div id="tabla_popusti">
      <h3>POPUSTI - BOCE</h3>
        <table>
          <tr><th>Sifra</th><th>Gorivo</th><th>EP SU</th><th>EP MP</th>
            <th>EP SE</th><th>EP BV</th><th>EP SU-PA</th><th>EP ZED</th><th>EP KA</th><th>EP ZE2</th>
            <th>EP VR</th><th>EP BT</th><th>EP BG2</th><th>EP TO</th><th>EP SVIL</th><th>EP TRST</th>
            <th>EP PI</th><th>EP SU4</th><th>EP BALJEV</th><th>EP NS3</th>
          </tr>


            <?php

foreach ($boce_vrste as $key => $value) {
      // '.(($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').'

    echo '
      <tr>
        <td>'.$value['sifra_goriva'].'</td>
        <td>'.$value['naziv_goriva'].'</td>
        <td id=popust_011_'.$arr_popusti['arr_011'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_012_'.$arr_popusti['arr_012'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_014_'.$arr_popusti['arr_014'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_015_'.$arr_popusti['arr_015'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_018_'.$arr_popusti['arr_018'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_153_'.$arr_popusti['arr_153'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_154_'.$arr_popusti['arr_154'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_156_'.$arr_popusti['arr_156'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_157_'.$arr_popusti['arr_157'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
        <span '.(($arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_158_'.$arr_popusti['arr_158'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_160_'.$arr_popusti['arr_160'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_161_'.$arr_popusti['arr_161'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_170_'.$arr_popusti['arr_170'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_172_'.$arr_popusti['arr_172'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_174_'.$arr_popusti['arr_174'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_182_'.$arr_popusti['arr_182'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_184_'.$arr_popusti['arr_184'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

        <td id=popust_188_'.$arr_popusti['arr_188'][$value['naziv_goriva']]['pma_gor_id'].'_'.$value['sifra_goriva'].'>
          <span '.(($arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'] == 0 )?'class="hide_null"': 'class=""').' >'.number_format($arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'], 2).'</span></td>

      </tr>

            ';
   }
 ?>

        </table>
      </div>

        <h3>EPK CENA - BOCE</h3>
        <table>
          <tr><th>Sifra</th><th>Gorivo</th><th>EP SU</th><th>EP MP</th>
            <th>EP SE</th><th>EP BV</th><th>EP SU-PA</th><th>EP ZED</th><th>EP KA</th><th>EP ZE2</th>
            <th>EP VR</th><th>EP BT</th><th>EP BG2</th><th>EP TO</th><th>EP SVIL</th><th>EP TRST</th>
            <th>EP PI</th><th>EP SU4</th><th>EP BALJEV</th><th>EP NS3</th>
          </tr>
            <?php
           foreach ($boce_vrste as $key => $value) {
            $_011 = $arr_mp['arr_011'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_011'][$value['naziv_goriva']]['iznos'];
            $_012 = $arr_mp['arr_012'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_012'][$value['naziv_goriva']]['iznos'];
            $_014 = $arr_mp['arr_014'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_014'][$value['naziv_goriva']]['iznos'];
            $_015 = $arr_mp['arr_015'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_015'][$value['naziv_goriva']]['iznos'];
            $_018 = $arr_mp['arr_018'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_018'][$value['naziv_goriva']]['iznos'];
            $_153 = $arr_mp['arr_153'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_153'][$value['naziv_goriva']]['iznos'];
            $_154 = $arr_mp['arr_154'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_154'][$value['naziv_goriva']]['iznos'];
            $_156 = $arr_mp['arr_156'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_156'][$value['naziv_goriva']]['iznos'];
            $_157 = $arr_mp['arr_157'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_157'][$value['naziv_goriva']]['iznos'];
            $_158 = $arr_mp['arr_158'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_158'][$value['naziv_goriva']]['iznos'];
            $_160 = $arr_mp['arr_160'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_160'][$value['naziv_goriva']]['iznos'];
            $_161 = $arr_mp['arr_161'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_161'][$value['naziv_goriva']]['iznos'];
            $_170 = $arr_mp['arr_170'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_170'][$value['naziv_goriva']]['iznos'];
            $_172 = $arr_mp['arr_172'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_172'][$value['naziv_goriva']]['iznos'];
            $_174 = $arr_mp['arr_174'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_174'][$value['naziv_goriva']]['iznos'];
            $_182 = $arr_mp['arr_182'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_182'][$value['naziv_goriva']]['iznos'];
            $_184 = $arr_mp['arr_184'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_184'][$value['naziv_goriva']]['iznos'];
            $_188 = $arr_mp['arr_188'][$value['naziv_goriva']]['iznos']-$arr_popusti['arr_188'][$value['naziv_goriva']]['iznos'];
             echo '
               <tr>
                 <td>'.$value['sifra_goriva'].'</td>
                 <td>'.$value['naziv_goriva'].'</td>
                 <td id="011"><span '.(($_011 == 0 )?'class="hide_null"': 'class=""').'>'.$_011.'</span></td>
                 <td id="012"><span '.(($_012 == 0 )?'class="hide_null"': 'class=""').'>'.$_012.'</span></td>
                 <td id="014"><span '.(($_014 == 0 )?'class="hide_null"': 'class=""').'>'.$_014.'</span></td>
                 <td id="015"><span '.(($_015 == 0 )?'class="hide_null"': 'class=""').'>'.$_015.'</span></td>
                 <td id="018"><span '.(($_018 == 0 )?'class="hide_null"': 'class=""').'>'.$_018.'</span></td>
                 <td id="153"><span '.(($_153 == 0 )?'class="hide_null"': 'class=""').'>'.$_153.'</span></td>
                 <td id="154"><span '.(($_154 == 0 )?'class="hide_null"': 'class=""').'>'.$_154.'</span></td>
                 <td id="156"><span '.(($_156 == 0 )?'class="hide_null"': 'class=""').'>'.$_156.'</span></td>
                 <td id="157"><span '.(($_157 == 0 )?'class="hide_null"': 'class=""').'>'.$_157.'</span></td>
                 <td id="158"><span '.(($_158 == 0 )?'class="hide_null"': 'class=""').'>'.$_158.'</span></td>
                 <td id="160"><span '.(($_160 == 0 )?'class="hide_null"': 'class=""').'>'.$_160.'</span></td>
                 <td id="161"><span '.(($_161 == 0 )?'class="hide_null"': 'class=""').'>'.$_161.'</span></td>
                 <td id="170"><span '.(($_170 == 0 )?'class="hide_null"': 'class=""').'>'.$_167.'</span></td>
                 <td id="172"><span '.(($_172 == 0 )?'class="hide_null"': 'class=""').'>'.$_168.'</span></td>
                 <td id="174"><span '.(($_174 == 0 )?'class="hide_null"': 'class=""').'>'.$_169.'</span></td>
                 <td id="182"><span '.(($_182 == 0 )?'class="hide_null"': 'class=""').'>'.$_169.'</span></td>
                 <td id="184"><span '.(($_184 == 0 )?'class="hide_null"': 'class=""').'>'.$_169.'</span></td>
                 <td id="188"><span '.(($_188 == 0 )?'class="hide_null"': 'class=""').'>'.$_169.'</span></td>
               </tr>

             ';
          }
          ?>


        </table>

</div>

<?php } ?>
