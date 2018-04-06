<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
@font-face {
    font-family: 'Helvetica';
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    src: url('{{ storage_path('fonts/6f19c9e3a03bf4bfd9187749fb698cbe.ttf') }}') format("truetype");
  }
  body {
    font-family: Helvetica, sans-serif;
  }
html { margin: 0px}
  span.cls_002{font-size:80.4px;color:white;font-weight:bold;font-style:normal;text-decoration: none}
  div.cls_002{font-size:80.4px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  span.cls_003{font-size:26.2px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  div.cls_003{font-size:26.2px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  span.cls_004{font-size:29.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  div.cls_004{font-size:29.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  span.cls_005{font-size:11.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  div.cls_005{font-size:11.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  span.cls_006{font-size:20.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  div.cls_006{font-size:20.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  span.cls_007{font-size:14.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  div.cls_007{font-size:14.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  span.cls_008{font-size:13.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  div.cls_008{font-size:13.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<div style="position:absolute;width:1121px;height:792px;border-style:solid;border-width:1px;">
  <div style="position:absolute;left:0px;top:0px">
  <img src="data:image/png;base64,{{base64_encode($course->plantilla)}}" width=1121 height=792></div>
  <div style="position:absolute;width: 100%;text-align: center;top:70px;" class="cls_002"><span class="cls_002">CERTIFICADO</span></div>
  <div style="position:absolute;width: 100%;text-align: center;top:210.00px" class="cls_003"><span class="cls_003">Este documento certifica que</span></div>
  <div style="position:absolute;width: 100%;text-align: center;top:260.00px" class="cls_004"><span class="cls_004">{{$student->name}}</span></div>
  <div style="position:absolute;width: 100%;text-align: center;top:320.00px" class="cls_003"><span class="cls_003">Identificado con el D.N.I. N° {{$student->dni}}, ha completado exitosamente el curso titulado:</span></div>
  <div style="position:absolute;width: 100%;display: table;top:360.83px;margin-left: 30px;margin-right: 30px;height:80px" class="cls_004"><span class="cls_004" style="display: table-cell;vertical-align: middle; text-align: center; ">{!!$course->nombre!!}</span></div>
  <div style="position:absolute;width: 100%;text-align: center;top:450.00px" class="cls_003" id="fechas"><span class="cls_003">Realizado del <span class="fechainicio">{{$fechainicio}}</span> al <span class="fechaconclusion">{{$fechaconclusion}}</span> con una duración de {{$course->horas}} horas.</span></div>
  <div style="position:absolute;width: 100%;text-align: center;top:510.09px" class="cls_006"><span class="cls_006">EQUIVALE A {{$course->pdu}} PDU's</span></div>
</div>
</body>
</html>
