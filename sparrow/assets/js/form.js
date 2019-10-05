jQuery(document).ready(function($){
    var form = $('#contactForm');
    var action = form.attr('action');

    form.on('submit', function(event){
       var form_data = {
           contactName: $('#contactName').val(),
           contactEmail: $('#contactEmail').val(),
           contactSubject: $('#contactSubject').val(),
           contactMessage: $('#contactMessage').val(),
       };

       $.ajax({
           url: action,
           type:'POST',
           data: form_data,
       })
       .done(function(){
           console.log('Отправлено!');
       })
       .fail(function(){
           console.log('Fatal error!')
       });

       event.preventDefault();
    });
});