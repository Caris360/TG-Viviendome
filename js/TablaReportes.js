function TablaClientes(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/listar_clientes_data.php"
      },
      "columns": [{
         "data": "TIPO_DOCUMENTO"
      },
      {
         "data": "IDENTIFICACION_CLIENTE"
      },
      {
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "DIRECCION"
      },
      {
         "data": "NUMERO_CONTACTO"
      },
      {
         "data": "CORREO"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaAcademias(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_academias_data.php"
      },
      "columns": [{
         "data": "NOMBRE_ACADEMIA"
      },
      {
         "data": "CANTIDAD_GRUPOS"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaGrupos(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_grupos_data.php"
      },
      "columns": [{
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_ACADEMIA"
      },
      {
         "data": "VALOR_INSCRIPCION"
      },
      {
         "data": "VALOR_TOTAL"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaClases(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_clases_data.php"
      },
      "columns": [{
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "FECHA_CLASE"
      },
      {
         "data": "HORA"
      },
      {
         "data": "VALOR"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaTalleres(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_talleres_data.php"
      },
      "columns": [{
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "VALOR"
      },
      {
         "data": "FECHA_TALLER"
      },
      {
         "data": "HORA"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaProductos(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_productos_data.php"
      },
      "columns": [{
         "data": "NOMBRE_PRODUCTO"
      },
      {
         "data": "VALOR_UNITARIO"
      },
      {
         "data": "STOCK"
      },
      {
         "data": "COMPLEMENTO"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaInscripcionPaga(ID, Consulta) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_inscripciones_data.php",
         "data": { 'Consulta': Consulta }
      },
      "columns": [{
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "VALOR"
      },
      {
         "data": "FECHA_INSCRIPCION"
      },
      {
         "data": "ESTADO_INSCRIPCION"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaInscripcionDebe(ID, Consulta) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_inscripciones_data.php",
         "data": { 'Consulta': Consulta }
      },
      "columns": [{
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "VALOR"
      },
      {
         "data": "VALOR_PENDIENTE"
      },
      {
         "data": "FECHA_INSCRIPCION"
      },
      {
         "data": "ESTADO_INSCRIPCION"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaInscripcion(ID, Consulta) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_inscripciones_data.php",
         "data": { 'Consulta': Consulta }
      },
      "columns": [{
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "VALOR"
      },
      {
         "data": "VALOR_PENDIENTE"
      },
      {
         "data": "FECHA_INSCRIPCION"
      },
      {
         "data": "ESTADO_INSCRIPCION"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaPagos(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_pagos_data.php"
      },
      "columns": [{
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "FACTURA"
      },
      {
         "data": "METODO_PAGO"
      },
      {
         "data": "VALOR_ULTIMO_PAGO"
      },
      {
         "data": "VALOR_CAMBIO"
      },
      {
         "data": "FECHA_ULTIMO_PAGO"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaPagoClientes(ID, documento) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_pagos_persona_data.php",
         "data": { 'documento': documento }
      },
      "columns": [{
         "data": "NOMBRE_PUBLICO"
      },
      {
         "data": "NOMBRE_GRUPO"
      },
      {
         "data": "NOMBRE_TALLER"
      },
      {
         "data": "FACTURA"
      },
      {
         "data": "METODO_PAGO"
      },
      {
         "data": "VALOR_ULTIMO_PAGO"
      },
      {
         "data": "VALOR_CAMBIO"
      },
      {
         "data": "FECHA_ULTIMO_PAGO"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}

function TablaFactura(ID) {
   $(ID).DataTable({
      "ajax": {
         "method": "POST",
         "url": "/config/reporte_facturas_data.php"
      },
      "columns": [{
         "data": "ID_FACTURA"
      },
      {
         "data": "FECHA_FACTURA"
      },
      {
         "data": "VALOR_TOTAL"
      }
      ],
      responsive: true,
      dom: 'Blfrtip',
      'pageLength': 5,
      "lengthMenu": [5, 7],
      "language": {
         "lengthMenu": "Mostrando _MENU_ registros por pagina",
         "zeroRecords": "No se ha encontrado nada",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "Vacio",
         "infoFiltered": "(filtrando de _MAX_ registros)",
         "search": "Buscar:",
         "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
         }
      },
      Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
   });
}