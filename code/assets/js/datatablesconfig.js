$(document).ready(() => {
    $(".datatablecarlist").DataTable({
         "aoColumnDefs": [
             { "bSortable": false, "aTargets": [3, 10, 11, 12] },
             { "bSearchable": false, "aTargets": [3, 10, 11, 12] }
         ],
         language: { url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Czech.json" }
     })

     $(".datatableuserlist").DataTable({
         "aoColumnDefs": [
             { "bSortable": false, "aTargets": [6,7,8] },
             { "bSearchable": false, "aTargets": [6,7,8] }
         ],
         language: { url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Czech.json" }
     })

     $(".datatablereservation").DataTable({
         "aoColumnDefs": [
             { "bSortable": false, "aTargets": [8,9] },
             { "bSearchable": false, "aTargets": [8,9] }
         ],
         language: { url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Czech.json" }
     })

     $(".datatablereservationuser").DataTable({
         "aoColumnDefs": [
             { "bSortable": false, "aTargets": [7,8] },
             { "bSearchable": false, "aTargets": [7,8] }
         ],
         language: { url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Czech.json" }
     })

          $(".datatableuserreservation").DataTable({

         language: { url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Czech.json" }
     })

 })