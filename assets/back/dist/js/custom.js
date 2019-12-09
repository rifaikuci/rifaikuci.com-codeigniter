$(document).ready(function()
{
  $('.toggle_check').bootstrapToggle();
  $('.toggle_check').change(function () {
    var durum=$(this).prop('checked');
    var id=$(this).attr('dataID');
    var base_url=$(this).attr('dataURL');
    $.post(base_url,{id: id, durum: durum}, function(response){});
  })

$('#example1').DataTable()
$('#example2').DataTable({
'paging' :true,
'lengthChange' :false,
'searching' :false,
'ordering' : true,
'info' : true,
'autoWidth' :false

  })
  CKEDITOR.replace('editor1')



  $('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});


var slider = new Slider('#ex1', {
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
})
