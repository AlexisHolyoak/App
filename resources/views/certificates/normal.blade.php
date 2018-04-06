<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
span.cls_001{font-family:Arial,serif;font-size:32.4px;color:white;font-weight:bold;font-style:normal;text-decoration: none}
div.cls_001{font-family:Arial,serif;font-size:32.4px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_002{font-family:Arial,serif;font-size:56.4px;color:white;font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:Arial,serif;font-size:56.4px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_003{font-family:Arial,serif;font-size:18.2px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-family:Arial,serif;font-size:18.2px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_004{font-family:Arial,serif;font-size:23.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_004{font-family:Arial,serif;font-size:23.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_005{font-family:Arial,serif;font-size:11.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_005{font-family:Arial,serif;font-size:11.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-family:Arial,serif;font-size:16.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_006{font-family:Arial,serif;font-size:16.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_007{font-family:Arial,serif;font-size:14.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_007{font-family:Arial,serif;font-size:14.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_008{font-family:Arial,serif;font-size:13.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_008{font-family:Arial,serif;font-size:13.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
</head>
<body>
<div style="position:relative;left:50%;margin-left:-420px;top:0px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="data:image/png;base64,{{base64_encode($course->plantilla)}}" width=841 height=595></div>
<div style="position:absolute;width: 100%;text-align: center;top:42.17px;" class="cls_002"><span class="cls_002">CERTIFICADO</span></div>
<!--<div style="position:absolute;width: 100%;text-align: center;top:100.17px;" class="cls_001"><span class="cls_001">DE COMPLETADO</span></div>-->
<div style="position:absolute;width: 100%;text-align: center;top:180.00px" class="cls_003"><span class="cls_003">Este documento certifica que</span></div>
<div style="position:absolute;width: 100%;text-align: center;top:215.00px" class="cls_004"><span class="cls_004">{{$student->name}}</span></div>
<div style="position:absolute;width: 100%;text-align: center;top:260.00px" class="cls_003"><span class="cls_003">Identificado con el D.N.I. N° {{$student->dni}}, ha completado exitosamente el curso titulado:</span></div>
<div style="position:absolute;width: 100%;display: table;top:275.00px; height:75px" class="cls_004"><span class="cls_004" style="display: table-cell;vertical-align: middle; text-align: center; ">{{$course->nombre}}</span></div>
<div style="position:absolute;width: 100%;text-align: center;top:350.13px" class="cls_003" id="fechas"><span class="cls_003">Realizado del <span class="fechainicio">{{$group->fechainicio}}</span> al <span class="fechaconclusion">{{$group->fechaconclusion}}</span> con una duración de {{$course->horas}} horas.</span></div>
<div style="position:absolute;left:320.75px;top:385.09px" class="cls_006"><span class="cls_006">EQUIVALE A {{$course->pdu}} PDU's</span></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("body").html(
   $("body").html().replace(/<sup>&reg;<\/sup>/gi, '&reg;').
        replace(/&reg;/gi, '<sup>&reg;</sup>').
        replace(/®/gi, '<sup>&reg;</sup>')
  );
  $('.fechainicio').text(moment($('.fechainicio').text(), "DD-MM-YYYY").format('L'));
  $('.fechaconclusion').text(moment($('.fechaconclusion').text(), "YYYY-MM-DD").format('L'));
});
</script>
</body>
</html>
