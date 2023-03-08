/* Validataon */

function validate(evt) {
    var theEvent = evt || window.Event;
  
    // Handle paste
    if (theEvent.type === 'paste') {
        key = Event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]/;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
}


  
