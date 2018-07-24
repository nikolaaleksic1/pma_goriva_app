<?php
error_reporting(0);
session_start();
include('connection.php');
include('functions_pma.php');

$_SESSION['username'] = 'nikola.dubljevic';//'nikola.aleksic';
$_SESSION['usertype'] = 'sef';//'admin';

if((isset($_SESSION['username']) && isset($_SESSION ['usertype']))) {
  $sql_managers = "SELECT pma.pm.id, pma.pm.man_username, pma.pm.man_password, pma.pm.man_status, pma.pm.region
                    FROM pma.pma_managers pm
                    WHERE  man_username = ? AND man_status = ?";
                    //'{$_SESSION['username']}'"
  $stmt=$dbpma->prepare($sql_managers);
  $stmt->execute(array($_SESSION['username'], $_SESSION['usertype']));
  while($res=$stmt->fetch(PDO::FETCH_ASSOC)){

     $user_name = $res['man_username'];
     $user_id = $res['id'];
  }

 $_SESSION['user_id'] = $user_id;

}


// if((isset($_SESSION['username']) && $_SESSION ['usertype']!='test'))





// $sqlGorivaVrste = "SELECT * FROM pma.pma_goriva_vrste";
// $stmt=$dbpma->prepare($sqlGorivaVrste);
// $stmt->execute();
// while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
//     $goriva_vrste[] = array(
//       "sifra_goriva" => $res['sifra_gor'],
//       "naziv_goriva" => $res['naziv_gor'],
//       "id_goriva" => $res['id_gor']
//     );
// }


$arr_mp = give_array(2);
// print_r($arr_mp);
$arr_popusti = give_array(1);

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>ODLUKA O PROMENI MALOPRODAJNIH CENA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
          <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->

  <style>

  label, input { display:block; }
      input.text { margin-bottom:12px; width:95%; padding: .4em; }
      fieldset { padding:0; border:0; margin-top:25px; }
      h1 { font-size: 1.2em; margin: .6em 0; }
      div#users-contain { width: 80%; margin: 20px 0; }
      div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
      div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
      .ui-dialog .ui-state-error { padding: .3em; }
      .ui-dialog .ui-highlight {background-color: red; color: #fff}
      .validateTips { border: 1px solid transparent; padding: 0.3em; }
      #save, #cancel{
        background-color: #4CAF50;
        color: #fff;
        border-radius: 6px;
        padding: 10px;
      }

.hide_null{
  display: none;
}

.first {
  color: #ff0000;
  font-weight: bold;
}

  .cont{
    margin: 20px;
    font-size: 14px;
  }

  td, tr, th {
    border: 1px solid black;
    text-align: center;
 }

 /* td {
   cursor: pointer;
 } */

 .cont th{
   background-color: #009900;
   color: #ffff1a;
 }


  @media print {
    body, page {
      margin: 0;
    }
    .cont th{
      -webkit-print-color-adjust: exact !important;
      background-color: #009900;
      color: #ffff1a;
    }

   .first {
      color: #ff0000;
      font-weight: bold;
    }

    .cont {
      margin: 10px 0 0 0;
    }

    tr td {
      text-align: center;
    }

    #hline{
      visibility: hidden;
    }
  }


  </style>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>


    $( function() {

    var dialog, form,
      cena = $( "#cena" ),
      datum = $( "#datum" ),
      allFields = $( [] ).add( cena ).add( datum ),
      tips = $( ".validateTips" );
      var myIds = {};
      var tempArray = [];
      var tempArrayPopusti = [];


    function attachDialog(elementId) {
      $( elementId ).on( "click", function() {
        console.log("elem " + elementId);
        dialog.dialog( "open" );
      });
    }

function onHover(elem){
  $(elem).hover(function() {
       $(this).css('cursor','pointer');
   });
}


    function openById(idSelector, arr){

      $(idSelector).click(function(){
        var id = $(this).attr('id');
        myIds.id = id;
      });

      $(idSelector).each(function () {
          // Getting the id of each div
          var id = $(this).attr('id');
          // Add to the array
          arr.push(id);
      });

      arr = arr.filter(function(element){
        return element !== undefined;
      })

    for(var i = 0; i < arr.length; i++){
      //console.log("Array = " + tempArray[i]);
        onHover("#"+arr[i]);
        attachDialog("#"+arr[i]);
    }
}


    GetAllData();

      function updateTips( t ) {
        tips
          .text( t )
          .addClass( "ui-highlight" );
        setTimeout(function() {
          tips.removeClass( "ui-highlight");
          t="";
          tips.text(t);
        }, 2000 );
      }



      dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 350,
        width: 300,
        modal: true,
        open: function() {
             $('#datum').datepicker({
               title:'Calendar',
               dateFormat: "dd-mm-yy"
             }).blur();
           },

          buttons: [{
                  id:"save",
                  text: "Dodaj",
                  click: function() {

                    var date = $('#datum').val();
                    var price = $('#cena').val();
                    var data = $('#dialog-form').serialize();
                    var id = myIds.id;

                    if(price !== '' && date !== ''){
                      allFields.removeClass( "ui-state-error" );
                      $.ajax({
                        type: "POST",
                        url: "insert_pma.php",
                        async: true,
                        data :{
                              price: price,
                              date: date,
                              id: id
                        },
                         success: function(data){
                           console.log("data "+ data);
                           GetAllData();
                           // $("#show").html(data);
                         }
                    });
                      dialog.dialog( "close" );
                      console.log("validno");
                    }else {
                      allFields.addClass( "ui-state-error" );
                      updateTips( "Datum i cenu morate popuniti!" );
                    }
                  }
              },
              {
                  id:"cancel",
                  text: "Cancel",
                  click: function() {
                      $(this).dialog("close");
                  }
              }],
        close: function() {
          form[ 0 ].reset();
          allFields.removeClass( "ui-state-error" );
        }

      });


      form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        addUser();
      });


      function GetAllData() {

        var id = myIds.id;
        $.ajax({
          url: "select_data_pma.php",
          type: "POST",
          async: true,
          data:{
            "display": 1
          },
          success: function(d){

            $("#show_data").html(d);

            openById('#tabla_mp td',tempArray );
            openById('#tabla_popusti td',tempArrayPopusti );

          }
        });
      }

});



    </script>


</head>
<body>

<div id="dialog-form" title="Upisati/Izmeniti Cene Gorriva">
  <p class="validateTips"></p>
  <form id="form-search" method="post" action="test_insert_pma.php" >
    <fieldset>
      <label for="cena">Cena</label>
      <input type="number" name="price" id="cena" placeholder="Upisati cenu" class="text ui-widget-content ui-corner-all"/>
      <label for="datum">Datum vazi od</label>
      <input type="text" name="date" id="datum" placeholder="Datum vazenja cene" class="text ui-widget-content ui-corner-all"/>
    </fieldset>
  </form>
</div>

<!-- <div id="show"></div> -->
<h2 style="text-align: center">ODLUKA O PROMENI MALOPRODAJNIH CENA</h2>
<p style="text-align: center">
  <b>Na osnovu slobodnog formiranja cena DOO "Euro Petrol" Subotica, menja maloprodajne cene derivata nafte,
  kao sto je navedeno u tabeli ispod. Cene vaze do sledece izmene.</b>
</p>
<page id="show_data" size="A4"></page>

<script type="text/javascript">
</script>
</body>
</html>
