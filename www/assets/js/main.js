'use strict'

$(document).ready(function() {

  $(document).on('click', '.js-user-delete', function() {
    $.ajax({
      url: '/user/' + $(this).data('id') + '/',
      method: 'DELETE'
    }).then(function() {
      window.location.reload();
    });
  });

});