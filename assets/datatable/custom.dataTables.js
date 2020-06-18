$('#tableNasabah').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1,4,5],
      "orderable": false,
      "searchable": false,
    },
  ]
});
$('#tableSimpanan').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1,2],
      "orderable": false,
      "searchable": false,
    },
  ]
});

$('#tablePinjaman').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1],
      "orderable": false,
      "searchable": false,
    },
  ]
});