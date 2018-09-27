
/*

Regarding to:

https://stackoverflow.com/questions/2008052/

*/

$.ajaxSetup({
  contentType: "application/x-www-form-urlencoded; charset=UTF-8"
});



/*


Regarding to:

https://stackoverflow.com/questions/2153917/

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
        contentType:"application/json; charset=utf-8",
        url: url,
        type: method,
        dataType: type,
        data: data,
        success: callback
      });
    };
  });


/*

Regarding to:

https://stackoverflow.com/questions/951791/


*/



window.onerror = function(msg, url, line, col, error) {
  var extra = !col ? '' : '\ncolumn: ' + col;
  extra += !error ? '' : '\nerror: ' + error;
  // TODO: Disable in release
  // alert(msg + "\nurl: " + url + "\nline: " + line + extra);
};