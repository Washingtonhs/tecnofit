$(function () {

  //DataTable settings
  $("#example1").DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "ordering": true,
    "autoWidth": false,
    "language": {
        "sProcessing": "Processando...",
        "sLengthMenu": "Mostrar _MENU_ itens",
        "sZeroRecords": "Nenhum resultado encontrado",
        "sEmptyTable": "Não há dados disponíveis nesta tabela",
        "sInfo": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
        "sInfoFiltered": "(filtrando um total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Pesquisar: ",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Carregando...",
        "oPaginate": {
            "sFirst": "Primeiro",
            "sLast": "Último",
            "sNext": "Próximo",
            "sPrevious": "Anterior"
        }
    },
    "drawCallback": function( ) {
      deleteSweetAlert();
    }
  })

  //SweetAlert2 - Delete Data
  function deleteSweetAlert() {
    $(".btn.delete").click(function(event) {
      event.preventDefault();
      var that = $(this);
      Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter isso!",
        color: '#716add',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sim, exclua isto!',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        allowEscapeKey: true,
        preConfirm: function() {
          return new Promise(function(resolve) {
          $('button.swal2-cancel').remove();
          $.ajax({
            url: that.attr('href'),
            type: 'delete',
            dataType: 'json'
          })
          .done(function(response){
            if(response.success)
            {
              Swal.fire('Excluído!', 'Excluído com sucesso!', 'success')
              .then(function() {
                location.reload(true);
              });           
            }
            else
            {
              Swal.fire('Oops...', 'Algo deu errado. Tente novamente mais tarde!', 'error')
              .then(function() {
                location.reload(true);
              });
            }
          })
          .fail(function(){
            Swal.fire('Oops...', 'Algo deu errado. Tente novamente mais tarde!', 'error')
            .then(function() {
              location.reload(true);
            });
          });
          });
        },
        allowOutsideClick: false
      });
    });
  }

  //Initialize Select2 Elements
  $('.select2').select2();

  // Summernote - Super Simple WYSIWYG editor
  $('textarea.summernote').summernote({
    height: 350,
    placeholder: 'Insira aqui seu texto...',
    lang: 'pt-BR',
    codemirror: {
      theme: 'monokai'
    },
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline','strikethrough']],
      ['style2', ['superscript','subscript']],
      ['clear', ['undo','redo','clear']],
      ['font', ['fontname','fontsize']],
      ['color', ['color','forecolor']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview']],
    ],
    popover: {
      image: [
        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
        ['float', ['floatLeft', 'floatRight', 'floatNone']],
        ['remove', ['removeMedia']]
      ],
      link: [
        ['link', ['linkDialogShow', 'unlink']]
      ],
      table: [
        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
      ]
      }
  });

  /* Active menu atual */
  var urlAtual = window.location.href;
  var linkAtual = $("ul.nav.nav-treeview li.nav-item a[href='"+urlAtual+"']");
  linkAtual.addClass("active");
  linkAtual.parents("li.nav-item.has-treeview")
  .addClass("menu-open")
  .children("a.nav-link")
  .addClass("active");

 // Bootstrap 4 custom file input
  $(function () {
    bsCustomFileInput.init();
  });

  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })

  $('[data-mask]').inputmask();
  $("[data-mask-money]").inputmask( 'currency',{
      autoUnmask: true,
      radixPoint:",",
      groupSeparator: ".",
      allowMinus: false,
      // prefix: 'R$ ',
      digits: 2,
      digitsOptional: false,
      rightAlign: false,
      unmaskAsNumber: true
    });

  $('.dpdatetime').datetimepicker({
      format: 'DD/MM/YYYY HH:mm',
      pickDate: false,
      pickSeconds: false,
      pick12HourFormat: false,
      icons: { time: 'far fa-clock' }
  });

  $('.dpdate').datetimepicker({
    format: 'DD/MM/YYYY',
    pickDate: false,
    pickSeconds: false,
    pick12HourFormat: false
  });

  $('.dptime').datetimepicker({
    format: 'HH:mm',
    pickDate: false,
    pickSeconds: false,
    pick12HourFormat: false,
    icons: { time: 'far fa-clock' }
  });

});

//print contract
function printDiv(divName) {
  var printContents = $('#' + divName).html();
  var originalContents = $('body').html();
  
  $('body').html(printContents);
  $('body').addClass('printContract');
  window.print();
  $('body').removeClass('printContract');
  $('body').html(originalContents);
}