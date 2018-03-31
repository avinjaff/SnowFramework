/*


Regarding to:

https://stackoverflow.com/questions/2153917/how-to-send-a-put-delete-request-in-jquery

And also:

https://homework.nwsnet.de/releases/9132/

We can extend jQuery to make shortcuts for PUT and DELETE
then you can use:

$.put('http://stackoverflow.com/posts/22786755/edit', {text:'new text'}, function(result){
   console.log(result);
})


*/


jQuery.each( [ "put", "delete" ], function( i, method ) {
    jQuery[ method ] = function( url, data, callback, type ) {
      if ( jQuery.isFunction( data ) ) {
        type = type || callback;
        callback = data;
        data = undefined;
      }
      return jQuery.ajax({
        url: url,
        type: method,
        dataType: type,
        data: data,
        success: callback
      });
    };
  });