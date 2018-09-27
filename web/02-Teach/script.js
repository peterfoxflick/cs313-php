$('.hover-bold').hover(
  function(){
    $(this).css('font-weight', 'bold');
  },
  function(){
    $(this).css('font-weight', 'normal');
  }
)


$('#alert').click(
  function(){
    alert("Alert: You clicked the button");
  }
)

$('#newColorForm').submit(function(event){
  if ($('#newColor').val()) {
    $('#section1').css('background-color','#' + $('#newColor').val() )
  } else {
    $('#section1').css('background-color', $('#newColorPicker').val() )
  }

  event.preventDefault();

})

$('#fade').click(function(){
  $('#section3 > p').fadeToggle();
}
)
