<?php


error_reporting(0);


function give_array($q, $n){

include('connection.php');

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
        "datum_unosa" => $res['datum_unosa'],
      );
  }

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
        "datum_unosa" => $res['datum_unosa'],
      );
  }





  if($q == 3){
    $change = $goriva_popusti;
  }else if($q == 4){
    $change = $goriva_mp_cene;
  }

foreach ($change as $key => $value) {

  // code...
  if($n == 1){
    $p = $goriva_popusti[$value['pma_gor_id']]['idmag_nord'];
  }else if($n == 2) {
    $p = $goriva_mp_cene[$value['pma_gor_id']]['idmag_nord'];
  }

  switch ($p) {
    case '011':
    $arr_011[$value['naziv_goriva']] = array(
      'idmag_nord' => $value['idmag_nord'],
      'naziv_goriva' => $value['naziv_goriva'],
      'pma_gor_id' => $value['pma_gor_id'],
      "datum_vazi_od" => $value['datum_vazi_od'],
      "datum_unosa" => $value['datum_unosa'],
      'iznos' => $value['iznos']
    );

      break;
      case '012':
      $arr_012[$value['naziv_goriva']] = array(
        'idmag_nord' => $value['idmag_nord'],
        'naziv_goriva' => $value['naziv_goriva'],
        'pma_gor_id' => $value['pma_gor_id'],
        "datum_vazi_od" => $value['datum_vazi_od'],
        "datum_unosa" => $value['datum_unosa'],
        'iznos' => $value['iznos']
      );
        break;
      case '013':
      $arr_013[$value['naziv_goriva']] = array(
        'idmag_nord' => $value['idmag_nord'],
        'naziv_goriva' => $value['naziv_goriva'],
        'pma_gor_id' => $value['pma_gor_id'],
        "datum_vazi_od" => $value['datum_vazi_od'],
        "datum_unosa" => $value['datum_unosa'],
        'iznos' => $value['iznos']
      );
        break;
      case '014':
      $arr_014[$value['naziv_goriva']] = array(
        'idmag_nord' => $value['idmag_nord'],
        'naziv_goriva' => $value['naziv_goriva'],
        'pma_gor_id' => $value['pma_gor_id'],
        "datum_vazi_od" => $value['datum_vazi_od'],
        "datum_unosa" => $value['datum_unosa'],
        'iznos' => $value['iznos']
      );
      break;
      case '015':
      $arr_015[$value['naziv_goriva']] = array(
        'idmag_nord' => $value['idmag_nord'],
        'naziv_goriva' => $value['naziv_goriva'],
        'pma_gor_id' => $value['pma_gor_id'],
        "datum_vazi_od" => $value['datum_vazi_od'],
        "datum_unosa" => $value['datum_unosa'],
        'iznos' => $value['iznos']
      );
      break;
      case '016':
      $arr_016[$value['naziv_goriva']] = array(
        'idmag_nord' => $value['idmag_nord'],
        'naziv_goriva' => $value['naziv_goriva'],
        'pma_gor_id' => $value['pma_gor_id'],
        "datum_vazi_od" => $value['datum_vazi_od'],
        "datum_unosa" => $value['datum_unosa'],
        'iznos' => $value['iznos']
      );
        break;

        case '018':
        $arr_018[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;

        case '151':
        $arr_151[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;

        case '153':
        $arr_153[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;

        case '154':
        $arr_154[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;

        case '156':
        $arr_156[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;
        case '157':
        $arr_157[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;
        case '158':
        $arr_158[$value['naziv_goriva']] = array(
          'idmag_nord' => $value['idmag_nord'],
          'naziv_goriva' => $value['naziv_goriva'],
          'pma_gor_id' => $value['pma_gor_id'],
          "datum_vazi_od" => $value['datum_vazi_od'],
          "datum_unosa" => $value['datum_unosa'],
          'iznos' => $value['iznos']
        );
          break;

          case '159':
          $arr_159[$value['naziv_goriva']] = array(
            'idmag_nord' => $value['idmag_nord'],
            'naziv_goriva' => $value['naziv_goriva'],
            'pma_gor_id' => $value['pma_gor_id'],
            "datum_vazi_od" => $value['datum_vazi_od'],
            "datum_unosa" => $value['datum_unosa'],
            'iznos' => $value['iznos']
          );
            break;
          case '160':
          $arr_160[$value['naziv_goriva']] = array(
            'idmag_nord' => $value['idmag_nord'],
            'naziv_goriva' => $value['naziv_goriva'],
            'pma_gor_id' => $value['pma_gor_id'],
            "datum_vazi_od" => $value['datum_vazi_od'],
            "datum_unosa" => $value['datum_unosa'],
            'iznos' => $value['iznos']
          );
            break;
          case '161':
          $arr_161[$value['naziv_goriva']] = array(
            'idmag_nord' => $value['idmag_nord'],
            'naziv_goriva' => $value['naziv_goriva'],
            'pma_gor_id' => $value['pma_gor_id'],
            "datum_vazi_od" => $value['datum_vazi_od'],
            "datum_unosa" => $value['datum_unosa'],
            'iznos' => $value['iznos']
          );
            break;
            case '162':
            $arr_162[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

              case '163':
              $arr_163[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
            case '164':
            $arr_164[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '165':
            $arr_165[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '166':
            $arr_166[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '167':
            $arr_167[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']

            );
              break;
            case '168':
            $arr_168[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '169':
            $arr_169[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '170':
            $arr_170[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;

            case '171':
            $arr_171[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;
            case '172':
            $arr_172[$value['naziv_goriva']] = array(
              'idmag_nord' => $value['idmag_nord'],
              'naziv_goriva' => $value['naziv_goriva'],
              'pma_gor_id' => $value['pma_gor_id'],
              "datum_vazi_od" => $value['datum_vazi_od'],
              "datum_unosa" => $value['datum_unosa'],
              'iznos' => $value['iznos']
            );
              break;
              case '174':
              $arr_174[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '176':
              $arr_176[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '177':
              $arr_177[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '178':
              $arr_178[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '179':
              $arr_179[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '180':
              $arr_180[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']

              );
                break;
              case '181':
              $arr_181[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '182':
              $arr_182[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '184':
              $arr_184[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '185':
              $arr_185[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '186':
              $arr_186[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '187':
              $arr_187[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
              case '188':
              $arr_188[$value['naziv_goriva']] = array(
                'idmag_nord' => $value['idmag_nord'],
                'naziv_goriva' => $value['naziv_goriva'],
                'pma_gor_id' => $value['pma_gor_id'],
                "datum_vazi_od" => $value['datum_vazi_od'],
                "datum_unosa" => $value['datum_unosa'],
                'iznos' => $value['iznos']
              );
                break;
  }

}



return compact('arr_011', 'arr_012','arr_013', 'arr_014', 'arr_015', 'arr_016','arr_018', 'arr_151', 'arr_153','arr_154',
'arr_156','arr_157','arr_158','arr_159','arr_160','arr_161','arr_167','arr_168','arr_169','arr_170','arr_172','arr_174',
'arr_176','arr_180','arr_182','arr_184','arr_185','arr_186','arr_187','arr_188'
);

}



 ?>
