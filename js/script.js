/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */

// MAREKsszzzzz STUKKKKJEEE AFBLIJVEEEENN tycho.
window.onload = function () {
    "use strict";
    var i,
        edit_name = document.getElementsByClassName('edit_name')[0]
                    .getElementsByTagName('i')[0],
        edit_email = document.getElementsByClassName('edit_email')[0]
                    .getElementsByTagName('i')[0],
        edit_phone = document.getElementsByClassName('edit_phone')[0]
                    .getElementsByTagName('i')[0],
        edit_location = document.getElementsByClassName('edit_location')[0]
                        .getElementsByTagName('i')[0],
        edit_text = [edit_name, edit_email, edit_phone, edit_location],
        old_value = [document.getElementsByClassName('edit_name')[0]
                    .getElementsByTagName('p')[0].innerHTML,
                     document.getElementsByClassName('edit_email')[0]
                    .getElementsByTagName('p')[0].innerHTML,
                     document.getElementsByClassName('edit_phone')[0]
                    .getElementsByTagName('p')[0].innerHTML,
                     document.getElementsByClassName('edit_location')[0]
                    .getElementsByTagName('p')[0].innerHTML
                    ];
    
    function editText(edit_area, old) {
        var tag_element = document.getElementsByClassName(edit_area)[0]
                          .getElementsByTagName('p')[0],
            parent_element = document.getElementsByClassName(edit_area)[0]
                             .getElementsByTagName('h4')[0],
            edit = document.getElementsByClassName(edit_area)[0]
                    .getElementsByTagName('i')[0],
            checker = document.getElementsByName(edit_area);
        if (checker.length === 0) {
            var input = document.createElement("input");
            tag_element.remove();
            input.type = "text";
            input.name = edit_area;
            input.value = old;
            input.size = 20;
            parent_element.parentNode.insertBefore(input, parent_element.nextSibling);
        } else {
            var old_txt = document.createElement("p"),
                old_input = document.getElementsByClassName(edit_area)[0]
                            .getElementsByTagName('input')[0];
            old_input.remove();
            old_txt.innerHTML = old;
            parent_element.parentNode.insertBefore(old_txt, parent_element.nextSibling);
        }
    }
    
    function makeClickHandler(i) {
        return function () {
            if (i === 0) {
                editText('edit_name', old_value[i]);
            } else if (i === 1) {
                editText('edit_email', old_value[i]);
            } else if (i === 2) {
                editText('edit_phone', old_value[i]);
            } else if (i === 3) {
                editText('edit_location', old_value[i]);
            }
        };
    }

    for (i = 0; i < edit_text.length; i++) {
        edit_text[i].addEventListener("click", makeClickHandler(i));
    }
// EINDE MAREKSSS STUK.
    
};