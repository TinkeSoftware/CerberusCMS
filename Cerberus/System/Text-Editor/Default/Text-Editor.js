function insertSmilie(element, smilie) {
  insert(element, '', ' ' + smilie);
}

function insert(element, start, eind) {
  element = document.getElementById(element);
  if (document.selection) {
    element.focus();
    sel = document.selection.createRange();
    sel.text = start + sel.text + eind;
  } else if (element.selectionStart || element.selectionStart == '0') {
    element.focus();
    var startPos = element.selectionStart;
    var endPos = element.selectionEnd;
    element.value = element.value.substring(0, startPos) + start + element.value.substring(startPos, endPos) + eind + element.value.substring(endPos, element.value.length);
  } else {
    element.value += start + eind;
  }
}

window.onload = function() {
 document.getElementById('txtTekst').onkeydown = function(e) {
  var ev = e || window.event;
  if (ev.keyCode == 66 && (ev.metaKey || ev.ctrlKey)) {
   insert('txtTekst', '[b]', '[/b]');
   return false;
  }
 }
}