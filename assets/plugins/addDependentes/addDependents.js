$(function () {
   
  var scntDiv = $('#dynamicDiv');

  // função que organiza as ids
  function ids(){
    scntDiv.find("input:not(:first)").each(function(i){
      this.id = "item"+ parseInt(i+1);
    });
  }
  
  $(document).on('click', '#addInput', function () {
    addElement();
  });

  $(document).on('click', '#remInput', function () {
    $(this).parents('div.form-group.dynamicDiv').remove();
    ids();
    return false;
  });

  function addElement(){
    $('<div class="form-group dynamicDiv">'+
      '<input type="text" class="form-control" name="dependents[]" style="width: calc(100% - 45px);display: initial;"/> '+
      '<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
      '<i class="fas fa-trash"></i>'+
      '</a>'+
      '</div>').appendTo(scntDiv);
     
     ids();
     
     return false;
  }

  addElement();
});